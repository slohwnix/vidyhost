<?php
// Afficher les vidéos uploadées
$files = scandir('videos');
foreach ($files as $file) {
  if (!in_array($file, array('.', '..'))) {
    echo '<video controls><source src="videos/' . $file . '" type="video/mp4"></video>';
  }
}
?>
