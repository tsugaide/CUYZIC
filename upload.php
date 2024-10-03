<?php 
include "conn.php";

  if(isset($_POST["submit"])){
    $judul = $_POST["judul"];
    $direktori_music = "lagu/";
    $direktori_gambar = "img/";
    $name_music = $_FILES["lagu"]["name"];
    $name_gambar = $_FILES["gambar"]["name"];

    if($_FILES["lagu"]["type"] === "audio/mpeg" && ($_FILES["gambar"]["type"] === "image/jpeg" ||$_FILES["gambar"]["type"] === "image/png" || $_FILES["gambar"]["type"] === "image/jpg")){
      move_uploaded_file($_FILES['lagu']['tmp_name'],$direktori_music.$name_music);
      move_uploaded_file($_FILES['gambar']['tmp_name'],$direktori_gambar.$name_gambar);

      $query = "INSERT INTO tbl_music (lagu,gambar,judul) VALUES ('$name_music','$name_gambar','$judul')";
      mysqli_query($conn, $query);

      echo "berhasil";
    };
    
    
  };



?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="output.css" />
    <link rel="manifest" href="manifest.json">

    <title>Upload</title>
  </head>
  <body class="bg-black">
    <h1 class="text-green-600 text-center text-2xl font-bold mt-5">
      Upload Your Muzic
    </h1>
    <form action="" method="post" class="mt-10 ml-5" enctype="multipart/form-data">
      <input
        type="file"
        name="lagu"
        id="lagu"
        class="text-white bg-slate-950 px-4 py-3 rounded-md"
        require
      />
      <input
        type="file"
        name="gambar"
        id="gambar"
        class="mt-4 text-white bg-slate-950 px-4 py-3 rounded-md"
        require
      />
      <label for="judul" class="text-green-600 block mt-5">Judul</label>
      <input
        type="text"
        name="judul"
        id="judul"
        class="mt-2 w-80 border-gray-900 outline-none border-b-2 bg-transparent text-white"
        require
      />
      <input
        type="submit"
        class="text-black font-bold bg-green-600 p-2 rounded-lg mt-12 ml-60"
        name="submit"
      />
    </form>
  </body>
  <script src="app.js"></script>
</html>
