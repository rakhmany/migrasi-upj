<!-- SECTION Banner Video section-banner lgfullscreen--->

<div class="banner-container">

    <video id="homeVideo" autoplay loop muted playsinline>

      <source src="asset/ComingSoon.mp4" type="video/mp4">

      Browser Anda tidak mendukung video.

    </video>

    <button class="sound-toggle" onclick="toggleSound()">🔇</button>

</div>



<div class="content">

    <h1>Selamat Datang di Homepage</h1>

    <p>Ini adalah halaman responsif dengan banner video dan backsound syahdu.</p>

</div>



<script>

    const video = document.getElementById('homeVideo');

    const button = document.querySelector('.sound-toggle');



    function toggleSound() {

      video.muted = !video.muted;

      button.textContent = video.muted ? '🔇' : '🔊';

    }

</script>



<style>

    body, html {

      margin: 0;

      padding: 0;

      font-family: sans-serif;

      background-color: #f5f5f5;

    }



    .banner-container {

      position: relative;

      width: 100%;

      height: auto;

      overflow: hidden;

    }



    video {

      width: 100%;

      height: auto;

      display: block;

    }



    .sound-toggle {

      position: absolute;

      bottom: 20px;

      right: 20px;

      background-color: rgba(0,0,0,0.6);

      color: white;

      border: none;

      padding: 10px 15px;

      cursor: pointer;

      border-radius: 5px;

      font-size: 16px;

      z-index: 10;

    }



    .content {

      padding: 20px;

      text-align: center;

    }



    @media (max-width: 768px) {

      .sound-toggle {

        padding: 8px 12px;

        font-size: 14px;

        bottom: 10px;

        right: 10px;

      }



      .content h1 {

        font-size: 22px;

      }



      .content p {

        font-size: 16px;

      }

    }

</style>

<!-- End SECTION Banner Video -->