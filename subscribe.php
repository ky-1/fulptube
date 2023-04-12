<?php require($_SERVER['DOCUMENT_ROOT'] . "/static/important/config.inc.php"); ?>
<?php require($_SERVER['DOCUMENT_ROOT'] . "/static/lib/profile.php"); ?>

<?php
$name = $_GET['user'];

if(!isset($_SESSION['siteusername']) || !isset($_GET['user'])) {
    die("You are not logged in or you did not put in an argument");
}

if($name == $_SESSION['siteusername']) {
    die("You can't subscribe to yourself!");
}

$stmt = $conn->prepare("SELECT * FROM subscribers WHERE sender = ? AND reciever = ?");
$stmt->bind_param("ss", $_SESSION['siteusername'], $name);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 1) die('You already are subscribed to this person!');
$stmt->close();

$stmt = $conn->prepare("INSERT INTO subscribers (sender, reciever) VALUES (?, ?)");
$stmt->bind_param("ss", $_SESSION['siteusername'], $name);

$stmt->execute();
$stmt->close();

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>