<footer class="footer">
  <div class="container-fluid py-3 d-flex justify-content-between align-items-center">
    <p class="mb-0">Playing Now: <strong><?php echo $sub[1]; ?></strong></p>
    <audio controls class="audio-player">
      <source src="admin/<?php echo $sub[4]; ?>" type="audio/mpeg">
      Your browser does not support the audio tag.
    </audio>
    <div class="cont">
    <?php echo $sub[2]; ?>
    </div>
  </div>
</footer> 
