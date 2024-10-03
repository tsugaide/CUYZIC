const audio = document.getElementById("myAudio");
const gambar = document.getElementById("myGambar");
const judul = document.getElementById("myJudul");
const range = document.getElementById("range");
const time = document.getElementById("time");
const kanan = document.getElementById("kanan");
const kiri = document.getElementById("kiri");
const daftarLagu = document.querySelectorAll("#daftarLagu div");
const loading = document.getElementById("loading").classList;
const body = document.body.classList;

setTimeout(() => {
  loading.remove(loading[loading.length - 1]);
  loading.add("hidden");
  body.remove(body[body.length - 1]);
}, 2500);

let durasi;
let no = -1;

const play = document.getElementById("tengah");
play.addEventListener("click", function () {
  const checkDuration = setInterval(() => {
    if (audio.duration && !isNaN(audio.duration)) {
      durasi = Math.floor(audio.duration);
      range.max = durasi;
      clearInterval(checkDuration);
    }
  }, 100);

  if (audio.paused) {
    audio.play();
    play.innerHTML = `
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
            <path d="M48 64C21.5 64 0 85.5 0 112V400c0 26.5 21.5 48 48 48H80c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48H48zm192 0c-26.5 0-48 21.5-48 48V400c0 26.5 21.5 48 48 48h32c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48H240z"
            />
        </svg>
    `;

    setInterval(() => {
      range.value = audio.currentTime;

      const minutes = Math.floor((durasi - range.value) / 60);
      const second = Math.floor((durasi - range.value) % 60);
      if (second > 9) {
        time.textContent = `${minutes} : ${second}`;
      } else {
        time.textContent = `${minutes} : 0${second}`;
      }
    }, 1000);
  } else {
    audio.pause();
    play.innerHTML = `
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
              <path
                fill="#000000"
                d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80V432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z"
              />
        </svg>
    `;
    clearInterval();
  }
});

audio.addEventListener("ended", function () {
  no++;
  audio.src = `lagu/${daftarLagu[no].dataset.lagu}`;
  gambar.src = `img/${daftarLagu[no].dataset.img}`;
  judul.textContent = `${daftarLagu[no].dataset.judul}`;
  range.value = 0;
  audio.play();
});

range.addEventListener("input", function () {
  audio.currentTime = range.value;
});

daftarLagu.forEach((item) => {
  item.addEventListener("click", function () {
    audio.src = `lagu/${item.dataset.lagu}`;
    gambar.src = `img/${item.dataset.img}`;
    judul.textContent = `${item.dataset.judul}`;
  });
});

const daftarAudio = document.querySelectorAll(".audio");
const daftarwaktu = document.querySelectorAll(".waktu");

daftarAudio.forEach((element, index) => {
  element.addEventListener("canplaythrough", function () {
    const drs = element.duration;

    if (daftarwaktu[index]) {
      daftarwaktu[index].textContent = `${Math.floor(drs / 60)}:${Math.floor(
        drs % 60
      )}`;
    }
  });
});

kanan.addEventListener("click", function () {
  no++;
  audio.pause();
  audio.src = `lagu/${daftarLagu[no].dataset.lagu}`;
  gambar.src = `img/${daftarLagu[no].dataset.img}`;
  judul.textContent = `${daftarLagu[no].dataset.judul}`;
  range.value = 0;
  play.innerHTML = `
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
              <path
                fill="#000000"
                d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80V432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z"
              />
            </svg>
    `;
});
kiri.addEventListener("click", function () {
  no--;
  audio.pause();
  audio.pause;
  audio.src = `lagu/${daftarLagu[no].dataset.lagu}`;
  gambar.src = `img/${daftarLagu[no].dataset.img}`;
  judul.textContent = `${daftarLagu[no].dataset.judul}`;
  range.value = 0;
  play.innerHTML = `
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
              <path
                fill="#000000"
                d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80V432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z"
              />
            </svg>
    `;
});
