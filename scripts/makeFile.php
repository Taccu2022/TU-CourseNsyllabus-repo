<?php

function makeDr_writable($dbfile)
{
  // Check if the directory exists
  if (!is_dir($dbfile)) {
    if (mkdir($dbfile, 0777, true)) {
      $forbiddenContent = '<?php header("HTTP/1.0 403 Forbidden"); ?>';
      $forbiddenPagePath = $dbfile . 'index.php';
      file_put_contents($forbiddenPagePath, $forbiddenContent);
      echo "Forbidden page (index.php) created in $dbfile.";
    } else {
      echo "Error: Failed to create the upload directory.";
    }
  } else if (!is_writable($dbfile)) {
    if (chmod($dbfile, 0777)) {
      $forbiddenContent = '<?php header("HTTP/1.0 403 Forbidden"); ?>';
      $forbiddenPagePath = $dbfile . 'index.php';
      file_put_contents($forbiddenPagePath, $forbiddenContent);
      echo "Forbidden page (index.php) created in $dbfile.";
      echo "Directory is now writable.";
    } else {
      echo "Failed to change directory permissions.";
    }
  }
}

?>