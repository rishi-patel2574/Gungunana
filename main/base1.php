<footer class="footer">
  <div class="container-fluid py-3 d-flex align-items-center justify-content-between">
    
    <!-- Left: Song Info -->
    <div class="song-info d-flex align-items-center">
      <div class="song-img me-2">
        <img src="admin/<?php echo $sub[5]; ?>" class="img-profile">
      </div>
      <div>
        <h4 class="mb-0"><strong><?php echo $sub[1]; ?></strong></h4>
        <small class="text-muted"> <?php echo $sub[2]; ?> </small>
      </div>
    </div>

    <!-- Center: Player Controls -->
    <div class="player-controls d-flex flex-column align-items-center">
      <div class="d-flex justify-content-center">
        <button id="prevBtn" class="btn btn-control"><img src="img/previous.png" class="btn-song"></button>
        <button id="playPauseBtn" class="btn btn-control mx-2"><img src="img/play.png" class="btn-song"></button>
        <button id="nextBtn" class="btn btn-control"><img src="img/next.png" class="btn-song"></button>
      </div>
      <!-- Time Display & Progress Bar -->
      <div class="d-flex align-items-center w-100">
      <?php
        if($_SESSION['sub'] == "YES") 
        {
      ?>
        <span id="currentTime" class="me-2">0:00</span>
        <input type="range" id="seekBar" value="0" min="0" step="1" class="seek-bar flex-grow-1">
        <span id="totalTime" class="ms-2">0:00</span>
      <?php
        }
      ?>
      </div>
    </div>

    <!-- Right: Volume Control -->
    <div class="volume-control d-flex align-items-center">
      <img src="img/volume.png" class="btn-song me-2" alt="Volume">
      <input type="range" id="volumeBar" value="100" min="0" max="100" step="1" class="volume-bar">
    </div>
  </div>

  <audio id="audioPlayer" class="audio-player">
    <source src="admin/<?php echo $sub[4]; ?>" type="audio/mpeg">
    Your browser does not support the audio tag.
  </audio>
</footer>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const audio = document.getElementById("audioPlayer");
    const playPauseBtn = document.getElementById("playPauseBtn");
    const seekBar = document.getElementById("seekBar");
    const currentTimeDisplay = document.getElementById("currentTime");
    const totalTimeDisplay = document.getElementById("totalTime");
    const volumeBar = document.getElementById("volumeBar");

    // Format time helper function
    function formatTime(seconds) {
        let min = Math.floor(seconds / 60);
        let sec = Math.floor(seconds % 60);
        return `${min}:${sec < 10 ? '0' : ''}${sec}`;
    }

    // Update total duration when metadata loads
    audio.onloadedmetadata = function () {
        seekBar.max = audio.duration;
        totalTimeDisplay.textContent = formatTime(audio.duration);
    };

    // Play/Pause functionality
    playPauseBtn.addEventListener("click", function () {
        if (audio.paused) {
            audio.play();
            playPauseBtn.innerHTML = '<img src="img/pause.png" class="btn-song">';
        } else {
            audio.pause();
            playPauseBtn.innerHTML = '<img src="img/play.png" class="btn-song">';
        }
    });

    // Update seek bar & current time display as song plays
    audio.addEventListener("timeupdate", function () {
        seekBar.value = audio.currentTime;
        currentTimeDisplay.textContent = formatTime(audio.currentTime);
    });

    // Seek when user interacts with the seek bar
    seekBar.addEventListener("input", function () {
        audio.currentTime = seekBar.value;
    });

    // Volume control
    volumeBar.addEventListener("input", function () {
        audio.volume = volumeBar.value / 100;
    });
});
</script>












<?php
      $sql9 = "SELECT * FROM s_details ORDER BY s_id";
      $result9 = mysqli_query($conn, $sql9);
      $count = false;
      while ($r9 = mysqli_fetch_row($result9))
      {
        if($count == true)
        {
          $q1 = $r9[0];
          $q2 = $r9[1];
          $q3 = $r9[2];
          $q4 = $r9[3];
          $q5 = $r9[4];
          $q6 = $r9[5];
          $count = false;
        }
        if ($r9[0]==$sub[0])
        {
          $count = true;
        }
      }
    ?>
    function next()
    {
      document.getElementById("myImage").src = "admin/<?php echo $q6; ?>";
      alert("<?php echo $q6; ?>");
      <?php
        $sql10 = "SELECT * FROM s_details ORDER BY s_id";
        $result10 = mysqli_query($conn, $sql10);
        $count = false;
        while ($r9 = mysqli_fetch_row($result10))
        {
          if($count == true)
          {
            $q1 = $r9[0];
            $q2 = $r9[1];
            $q3 = $r9[2];
            $q4 = $r9[3];
            $q5 = $r9[4];
            $q6 = $r9[5];
            $count = false;
          }
          if ($q6==$r9[0])
          {
            $count = true;
          }
        }
      ?>
    }