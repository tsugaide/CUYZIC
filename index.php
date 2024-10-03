<?php 

include "conn.php";

$query = "SELECT * FROM tbl_music";
$result = mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="output.css" />
    <link rel="manifest" href="manifest.json">
    <title>CUYZIC</title>
  </head>
  <body class="bg-black overflow-hidden">
    <div id="loading" class=" bg-black h-screen w-screen absolute z-50 flex-col justify-between items-center flex">
      <div class=" bg-green-600 h-40 w-screen rounded-bl-[50%] rounded-br-[50%]"></div>
      <img src="icon.png" alt="" class=" bg-green-600 w-28 rounded-full ">
      <div class=" bg-green-600 h-40 w-screen rounded-tl-[50%] rounded-tr-[50%]"></div>
    </div>
    <div class="flex justify-center">
      <div
        class="bg-[#121212] w-80 mt-8 rounded-3xl flex flex-col items-center"
      >
        <figure class="w-60 h-56">
          <img
            id="myGambar"
            src="img/Screenshot (31).png"
            alt=""
            class="bg-cover mt-7 w-full h-full rounded-xl block"
          />
          <audio
            id="myAudio"
            src="lagu/Y2meta.app - DJ DITINGGAL BANG DIKA SLOWED VIRAL TIK TOK TERBARU 2024!! (128 kbps).mp3"
            preload="metadata"
          ></audio>
          <figcaption id="myJudul" class="text-[#ffffffb7] font-medium mt-3">
            Dj Bang Dika
          </figcaption>
        </figure>
        <input type="range" class="mt-28 w-60 h-1" id="range" value="0" />
        <h1 id="time" class="mt-3 text-[#ffffffb7] text-xs">0:00</h1>
        <div class="flex items-center gap-8 my-8">
          <div id="kiri" class="w-7 rotate-180">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <path
                fill="#ffffff"
                d="M52.5 440.6c-9.5 7.9-22.8 9.7-34.1 4.4S0 428.4 0 416V96C0 83.6 7.2 72.3 18.4 67s24.5-3.6 34.1 4.4L224 214.3V256v41.7L52.5 440.6zM256 352V256 128 96c0-12.4 7.2-23.7 18.4-29s24.5-3.6 34.1 4.4l192 160c7.3 6.1 11.5 15.1 11.5 24.6s-4.2 18.5-11.5 24.6l-192 160c-9.5 7.9-22.8 9.7-34.1 4.4s-18.4-16.6-18.4-29V352z"
              />
            </svg>
          </div>
          <div id="tengah" class="w-7 h-7 flex items-center cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
              <path
                fill="#000000"
                d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80V432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z"
              />
            </svg>
          </div>
          <div id="kanan" class="w-7">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <path
                fill="#ffffff"
                d="M52.5 440.6c-9.5 7.9-22.8 9.7-34.1 4.4S0 428.4 0 416V96C0 83.6 7.2 72.3 18.4 67s24.5-3.6 34.1 4.4L224 214.3V256v41.7L52.5 440.6zM256 352V256 128 96c0-12.4 7.2-23.7 18.4-29s24.5-3.6 34.1 4.4l192 160c7.3 6.1 11.5 15.1 11.5 24.6s-4.2 18.5-11.5 24.6l-192 160c-9.5 7.9-22.8 9.7-34.1 4.4s-18.4-16.6-18.4-29V352z"
              />
            </svg>
          </div>
        </div>
      </div>
    </div>
    <div id="daftarLagu" class="flex flex-col justify-center items-center gap-2 mt-8">
      <?php
        if (mysqli_num_rows($result)>0) {?>
      <?php while($row = mysqli_fetch_assoc($result)) {?>
        <div
          class="bg-[#0c0c0ccc] flex items-center rounded-md w-80 p-2 hover:bg-[#181818cc]"
          data-lagu ='<?= $row["lagu"]?>'
          data-img ='<?= $row["gambar"]?>'
          data-judul ='<?= $row["judul"]?>'
        >
          <audio class="audio" src='lagu/<?= $row["lagu"]?>'></audio>
          <img src='img/<?= $row["gambar"]?>'  alt="" class="w-16 bg-cover" />
          <h1 class="text-white ml-3 text-sm font-bold"><?= $row["judul"]?></h1>
          <h1 class="text-white ml-16 waktu">6:35</h1>
        </div>
        <?php }?>
      <?php }?>
    </div>
    <nav>
      <div
        class="bg-green-600 w-12 h-12 rounded-full text-center fixed bottom-0 left-[50%] translate-x-[-50%]"
      >
        <a href="upload.php" target="_self" class="text-white text-4xl">+</a>
      </div>
    </nav>
  </body>
  <script src="script.js"></script>
  <script src="app.js"></script>
</html>
