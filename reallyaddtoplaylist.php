<?php require($_SERVER['DOCUMENT_ROOT'] . "/static/important/config.inc.php"); ?>
<?php require($_SERVER['DOCUMENT_ROOT'] . "/static/lib/profile.php"); ?>
<?php
$playlist = getPlaylistFromID($_GET['playlist'], $conn);

if($playlist['author'] == $_SESSION['siteusername']) {
    $stmt = $conn->prepare("UPDATE playlists SET videos = ? WHERE rid = ?");
    $stmt->bind_param("ss", $videos, $_GET['playlist']);
    $videos = $playlist['videos'] . "|" . $_GET['id'];
    $stmt->execute();
    $stmt->close();
}

header('Location: playlists.php');
?>