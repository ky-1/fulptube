<?php require($_SERVER['DOCUMENT_ROOT'] . "/static/important/config.inc.php"); ?>
<?php require($_SERVER['DOCUMENT_ROOT'] . "/static/lib/profile.php"); ?>

<?php
$name = $_GET['id'];

if(!isset($_SESSION['siteusername']) || !isset($_GET['id'])) {
    die("You are not logged in or you did not put in an argument");
}

$stmt = $conn->prepare("SELECT * FROM commentlikes WHERE sender = ? AND reciever = ? AND type = 'd'");
$stmt->bind_param("ss", $_SESSION['siteusername'], $name);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 1) {
        removeCommentLike($_SESSION['siteusername'], $name, $conn);
    }

$stmt = $conn->prepare("SELECT * FROM commentlikes WHERE sender = ? AND reciever = ? AND type = 'l'");
$stmt->bind_param("ss", $_SESSION['siteusername'], $name);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 1) {
        removeCommentLike($_SESSION['siteusername'], $name, $conn);
    } else {
        addCommentDislike($_SESSION['siteusername'], $name, $conn);
    }
$stmt->close();

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>