<?php
header("content-type: text/plain");
ob_start();
$vid = $_GET["video_id"];
$asset = file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/dynamic/videos/" . $vid);
echo $asset;
?>