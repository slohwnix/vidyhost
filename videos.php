<?php
$files = scandir('videos');
$videos = array();
foreach ($files as $file) {
  if (!in_array($file, array('.', '..'))) {
    $videos[] = $file;
  }
}
echo json_encode($videos);
?>
