<?php require($_SERVER['DOCUMENT_ROOT'] . "/static/important/config.inc.php"); ?>
<?php require($_SERVER['DOCUMENT_ROOT'] . "/static/lib/profile.php"); ?>
<?php $video = getVideoFromId($_GET['v'], $conn); 
header('Content-Type: application/json');
?>
<?php echo json_encode($video); ?>