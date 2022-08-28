<script>
  var video = document.getElementById('video');
  function videos() {
    // 'use strict';
    var playlist = [
      '<?php echo get_template_directory_uri(); ?>/mp4/video02.mp4',
      '<?php echo get_template_directory_uri(); ?>/mp4/video01.mp4',
      '<?php echo get_template_directory_uri(); ?>/mp4/video03.mp4',
    ]

    video.controls = false;
    video.src = playlist[0];
    var index = 0;

    window.addEventListener('DOMContentLoaded', function() {
      // console.log(vE);
      const videoElement = document.querySelector("video");
      const vE = document.getElementById('top_visual');
      const vElHei = vE.clientHeight;
      window.addEventListener('scroll',()=> {
        let scrollPage = window.pageYOffset;
        // console.log(scrollPage);
        if( scrollPage > vElHei ) {
          // console.log(vElHei);
          // videoElement.muted = false;
          // videoElement.autoplay = false;
          video.pause();
          //https://qiita.com/y___k/items/35e622c9c3d1ff9a87c7#%E3%82%B5%E3%83%B3%E3%83%97%E3%83%AB%E3%82%B3%E3%83%BC%E3%83%89%EF%BC%91
        }
        else {
          // videoElement.muted = true;
          // videoElement.autoplay = true;
          video.play();
        }
      });
    });

    video.addEventListener('ended', videoInterval);
    function videoInterval() {
      index++;
      if (index < playlist.length) {
        video.src = playlist[index];
        video.play();
      } else {
        video.src = playlist[0];
        video.play();
        index = 0;
      }
    }
    // setInterval(function() {
    //   index++;
    //   if (index < playlist.length) {
    //     video.src = playlist[index];
    //     video.play();
    //   } else {
    //     video.src = playlist[0];
    //     video.play();
    //     index = 0;
    //   }
    // }, 5000)
  }
  videos();
</script>