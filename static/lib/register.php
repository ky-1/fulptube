<?php
function register($username, $email, $hashedpassword, $conn) {
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashedpassword);
    $stmt->execute();
    $stmt->close();
    return true;
}

function validateCaptcha($privatekey, $response) {
    $responseData = json_decode(file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$privatekey.'&response='.$response));
    return $responseData->success;
}
?>