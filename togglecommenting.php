<?php require($_SERVER['DOCUMENT_ROOT'] . "/static/important/config.inc.php"); ?>
<?php require($_SERVER['DOCUMENT_ROOT'] . "/static/lib/profile.php"); ?>
<?php $video = getVideoFromId($_GET['id'], $conn); ?>
<?php

if($video['author'] == $_SESSION['siteusername']) {
    if($video['commenting'] == "a") {
        updateVideoCommenting($_GET['id'], "d", $conn);
    } else {
        updateVideoCommenting($_GET['id'], "a", $conn);
    }
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>