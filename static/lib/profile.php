<?php
function getUserFromId($id, $connection) {
        $stmt = $connection->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
	if($result->num_rows === 0) return('That user does not exist.');
	$stmt->close();

	return $user;
}

function ifSubscribed($user, $reciever, $connection) {
    $stmt = $connection->prepare("SELECT * FROM subscribers WHERE sender = ? AND reciever = ?");
    $stmt->bind_param("ss", $user, $reciever);
    $stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
if($result->num_rows === 1) { return true; } else { return false; }
$stmt->close();

return $user;
}

function removeLike($sender, $reciever, $conn) {
    $stmt = $conn->prepare("DELETE FROM likes WHERE sender = ? AND reciever = ?");
    $stmt->bind_param("ss", $sender, $reciever);
    $stmt->execute();
    $stmt->close();
}

function removeVideo($rid, $conn) {
    $stmt = $conn->prepare("DELETE FROM videos WHERE rid = ?");
    $stmt->bind_param("s", $rid);
    $stmt->execute();
    $stmt->close();
}


function addDislike($sender, $reciever, $conn) {
    $stmt = $conn->prepare("INSERT INTO likes (sender, reciever, type) VALUES (?, ?, 'd')");
    $stmt->bind_param("ss", $sender, $reciever);
    $stmt->execute();
    $stmt->close();
}

function removeCommentLike($sender, $reciever, $conn) {
    $stmt = $conn->prepare("DELETE FROM commentlikes WHERE sender = ? AND reciever = ?");
    $stmt->bind_param("ss", $sender, $reciever);
    $stmt->execute();
    $stmt->close();
}

function addCommentDislike($sender, $reciever, $conn) {
    $stmt = $conn->prepare("INSERT INTO commentlikes (sender, reciever, type) VALUES (?, ?, 'd')");
    $stmt->bind_param("ss", $sender, $reciever);
    $stmt->execute();
    $stmt->close();
}

function addLike($sender, $reciever, $conn) {
    $stmt = $conn->prepare("INSERT INTO likes (sender, reciever, type) VALUES (?, ?, 'l')");
    $stmt->bind_param("ss", $sender, $reciever);
    $stmt->execute();
    $stmt->close();
}

function ifLiked($user, $videoid, $connection) {
    $stmt = $connection->prepare("SELECT * FROM likes WHERE sender = ? AND reciever = ? AND type = 'l'");
    $stmt->bind_param("ss", $user, $videoid);
    $stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
if($result->num_rows === 1) { return true; } else { return false; }
$stmt->close();

return $user;
}

function getVideoFromId($id, $connection) {
    $stmt = $connection->prepare("SELECT * FROM videos WHERE rid = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

return $user;
}

function getPlaylistFromID($id, $connection) {
    $stmt = $connection->prepare("SELECT * FROM playlists WHERE rid = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

return $user;
}

function getGroupFromId($id, $connection) {
        $stmt = $connection->prepare("SELECT * FROM groups WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    if($result->num_rows === 0) { $group['name'] = "None"; $group['id'] = 0; };
    $stmt->close();

    return $user;
}

function getInfoFromBlog($id, $connection) {
        $stmt = $connection->prepare("SELECT * FROM blogs WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    if($result->num_rows === 0) return('That blog does not exist.');
    $stmt->close();

    return $user;
}

function logDB($text, $mysqli) {
    $stmt = $mysqli->prepare("INSERT INTO logs (event) VALUES (?)");
    $stmt->bind_param("s", $text);
    $stmt->execute();
    $stmt->close();
}

function addView($vidid, $user, $conn) {
    $stmt = $conn->prepare("SELECT * FROM views WHERE viewer = ? AND videoid = ?");
    $stmt->bind_param("ss", $user, $vidid);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0) {
        addViewReal($vidid, $user, $conn);
    }
    $stmt->close();
}

function addViewReal($vidid, $user, $conn) {
    $stmt = $conn->prepare("INSERT INTO views (viewer, videoid) VALUES (?, ?)");
    $stmt->bind_param("ss", $user, $vidid);
    $stmt->execute();
    $stmt->close();
}

function addToHistory($vidid, $user, $conn) {
    $stmt = $conn->prepare("INSERT INTO history (video, author) VALUES (?, ?)");
    $stmt->bind_param("ss", $vidid, $user);
    $stmt->execute();
    $stmt->close();
}

function archiveAllUserInfo($username, $connection) {
    $stmt = $connection->prepare("UPDATE comments SET comment = '[archived]' WHERE author = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->close();

    $stmt = $connection->prepare("UPDATE blogs SET message = '[archived]' WHERE author = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->close();

    $stmt = $connection->prepare("UPDATE blogcomments SET comment = '[archived]' WHERE author = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->close();

    $stmt = $connection->prepare("UPDATE groupcomments SET comment = '[archived]' WHERE author = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->close();

    $stmt = $connection->prepare("UPDATE groups SET description = '[archived]', name = '[archived]', pic = '51zLZbEVSTL._AC_SX679_.jpg' WHERE owner = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->close();

    return true;
}

function getAllFileSize($username, $conn) {
    $stmt = $conn->prepare("SELECT * FROM files WHERE owner = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $filesize = 0;
    while($row = $result->fetch_assoc()) {
        $filesize = $filesize + filesize("../dynamic/files/" . $row['filename']);
    }
    $stmt->close();
    return $filesize;
}

function delPostsFromUser($username, $conn) {
    $stmt = $conn->prepare("DELETE FROM comments WHERE author = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->close();

    $stmt = $conn->prepare("DELETE FROM blogs WHERE author = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->close();

    $stmt = $conn->prepare("DELETE FROM blogcomments WHERE author = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->close();

    $stmt = $conn->prepare("DELETE FROM groupcomments WHERE author = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->close();

    $stmt = $conn->prepare("DELETE FROM groups WHERE owner = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->close();

    return true;
}

function delAccount($username, $connection) {
        $stmt = $connection->prepare("DELETE FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->close();
}

function isAdmin($username, $conn) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND status = 'admin'");
    $stmt->bind_param("s", $_SESSION['siteusername']);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0) { return false; } else { return true; }
    $stmt->close();
}

function UpdateLoginTime($username, $connection) {
    $stmt = $connection->prepare("UPDATE users SET lastlogin = now() WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->close();
}

function updateVideoCommenting($id, $type, $connection) {
    $stmt = $connection->prepare("UPDATE videos SET commenting = ? WHERE rid = ?");
    $stmt->bind_param("ss", $type, $id);
    $stmt->execute();
    $stmt->close();
}

function deleteComment($id, $conn) {
    $stmt = $conn->prepare("DELETE FROM comments WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

function pinComment($id, $conn) {
    $stmt = $conn->prepare("UPDATE comments SET status = 'p' WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

function unpinComment($id, $conn) {
    $stmt = $conn->prepare("UPDATE comments SET status = 'n' WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

function getUserFromName($name, $connection) {
        $stmt = $connection->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $name);
        $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    if($result->num_rows === 0) return('That user does not exist.');
    $stmt->close();

    return $user;
}

function getPosts($name, $connection) {
    $stmt = $connection->prepare("SELECT id FROM reply WHERE author = ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();
    $number = 0;
    while($row = $result->fetch_assoc()) {
        $number++;
    }
    return $number;
    $stmt->close();
}

function getIDFromUser($name, $connection) {
    $stmt = $connection->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()) {
        $id = $row['id'];
    }
    return $id;
    $stmt->close();
}

function getLikesFromBlog($id, $connection) {
    $stmt = $connection->prepare("SELECT * FROM bloglikes WHERE toid = ? AND type = 'l'");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = mysqli_num_rows($result); 
    $stmt->close();

    return $rows;
}

function getVideosAFromUser($id, $connection) {
    $stmt = $connection->prepare("SELECT * FROM videos WHERE author = ? AND visibility = 'v'");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = mysqli_num_rows($result); 
    $stmt->close();

    return $rows;
}

function getSubscribers($id, $connection) {
    $stmt = $connection->prepare("SELECT * FROM subscribers WHERE reciever = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = mysqli_num_rows($result); 
    $stmt->close();

    return $rows;
}

function getCommentLikes($id, $connection) {
    $stmt = $connection->prepare("SELECT * FROM commentlikes WHERE reciever = ? AND type = 'l'");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = mysqli_num_rows($result); 
    $stmt->close();

    return $rows;
}

function getLikes($id, $connection) {
    $stmt = $connection->prepare("SELECT * FROM likes WHERE reciever = ? AND type = 'l'");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = mysqli_num_rows($result); 
    $stmt->close();

    return $rows;
}

function getDislikes($id, $connection) {
    $stmt = $connection->prepare("SELECT * FROM likes WHERE reciever = ? AND type = 'd'");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = mysqli_num_rows($result); 
    $stmt->close();

    return $rows;
}

function getViews($vidid, $connection) {
    $stmt = $connection->prepare("SELECT * FROM views WHERE videoid = ?");
    $stmt->bind_param("s", $vidid);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = mysqli_num_rows($result); 
    $stmt->close();

    return $rows;
}

function getDislikesFromBlog($id, $connection) {
    $stmt = $connection->prepare("SELECT * FROM bloglikes WHERE toid = ? AND type = 'd'");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = mysqli_num_rows($result); 
    $stmt->close();

    return $rows;
}

function getLikesFromVideos($id, $connection) {
    $stmt = $connection->prepare("SELECT * FROM videolikes WHERE toid = ? AND type = 'l'");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = mysqli_num_rows($result);
    $stmt->close();

    return $rows;
}

function getDislikesFromVideos($id, $connection) {
    $stmt = $connection->prepare("SELECT * FROM videolikes WHERE toid = ? AND type = 'd'");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = mysqli_num_rows($result);
    $stmt->close();

    return $rows;
}

function getNameFromUser($id, $connection) {
    $stmt = $connection->prepare("SELECT username FROM users WHERE id = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()) {
        $id = $row['username'];
    }
    return $id;
    $stmt->close();
}

function getPFPFromUser($name, $connection) {
    $stmt = $connection->prepare("SELECT pfp FROM users WHERE username = ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()) {
        $pfp = $row['pfp'];
    }
    return $pfp;
    $stmt->close();
}

function updateCategoryTime($id, $conn) {
    $stmt = $conn->prepare("UPDATE categories SET lastmodified = now() WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    return true;
}

function updateThreadTime($id, $conn) {
    $stmt = $conn->prepare("UPDATE threads SET lastmodified = now() WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    return true;
}

function updateSteamURL($url, $username, $connection) {
    $stmt = $connection->prepare("UPDATE users SET steamurl = ? WHERE username = ?");
    $stmt->bind_param("ss", $url, $username);
    $stmt->execute();
    $stmt->close();
}

function convertYoutube($string) {
	return preg_replace(
		"/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
		"<iframe width='290' height='200' src='//www.youtube.com/embed/$2' allowfullscreen></iframe>",
		$string
	);
}


function parseEmoticons($input) {
    $find = array(":troll:", ":nes:", ":cookie:", ":cookiemonster:", ":dance:", ":mac:", ":jon:");
    $replace = array(" <img src='/static/troll.png'> ", " <img src='/static/nes.gif'> ", " <img src='/static/cookie.gif'> ", " <img src='/static/CookieMonster.gif'> ", " <img src='/static/dance.gif'> ", " <img src='/static/macemoji.png'> ", " <img src='/static/jonnose.png'> ");
    $input = str_replace($find, $replace, $input);
    return $input;
}

function parseText($text) {
    $text = htmlspecialchars($text);
    $text = str_replace(PHP_EOL, "<br>", $text);
    return $text;
}

function stripURLTHingies($url) {
    $replace = array("https://steamcommunity.com/id/", "/");
    return str_replace($replace, "", $url);
}

function redirectToLogin() {
    header("Location: ../login.php");
}

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function updateUserBio($username, $bio, $connection) {
    $stmt = $connection->prepare("UPDATE users SET bio = ? WHERE username = ?");
    $stmt->bind_param("ss", $bio, $username);
    $stmt->execute();
$stmt->close();

return true;
}

function updateUserCSS($username, $css, $connection) {
    $stmt = $connection->prepare("UPDATE users SET css = ? WHERE username = ?");
    $stmt->bind_param("ss", $css, $username);
    $stmt->execute();
$stmt->close();

return true;
}

function updateUserBG($username, $bg, $connection) {
$stmt = $connection->prepare("UPDATE users SET bg = ? WHERE username = ?");
$stmt->bind_param("ss", $bg, $username);
$stmt->execute();
$stmt->close();

return true;
}

function updateUserGender($username, $gender, $connection) {
    $stmt = $connection->prepare("UPDATE users SET gender = ? WHERE username = ?");
    $stmt->bind_param("ss", $gender, $username);
    $stmt->execute();
$stmt->close();

return true;
}

function updateUserSong($username, $gender, $connection) {
$stmt = $connection->prepare("UPDATE users SET song = ? WHERE username = ?");
$stmt->bind_param("ss", $gender, $username);
$stmt->execute();
$stmt->close();

return true;
}

function updateUserAge($username, $age, $connection) {
    $stmt = $connection->prepare("UPDATE users SET age = ? WHERE username = ?");
    $stmt->bind_param("ss", $age, $username);
    $stmt->execute();
$stmt->close();

return true;
}

function updateUserLocation($username, $location, $connection) {
    $stmt = $connection->prepare("UPDATE users SET location = ? WHERE username = ?");
    $stmt->bind_param("ss", $location, $username);
    $stmt->execute();
$stmt->close();

return true;
}

function updateUserInterest($username, $interests, $connection) {
    $stmt = $connection->prepare("UPDATE users SET interests = ? WHERE username = ?");
    $stmt->bind_param("ss", $interests, $username);
    $stmt->execute();
$stmt->close();

return true;
}

function updateUserInterestMusic($username, $interests, $connection) {
    $stmt = $connection->prepare("UPDATE users SET interestsmusic = ? WHERE username = ?");
    $stmt->bind_param("ss", $interests, $username);
    $stmt->execute();
$stmt->close();

return true;
}

function timestamp(int $seconds) {
    if ($seconds > 60*60*24) {
        // over a day
        return sprintf("%d:%s:%s:%s",
            floor($seconds/60/60/24),                                 // Days
            str_pad( floor($seconds/60/60%24), 2, "0", STR_PAD_LEFT), // Hours
            str_pad( floor($seconds/60%60),    2, "0", STR_PAD_LEFT), // Minutes
            str_pad(       $seconds%60,        2, "0", STR_PAD_LEFT)  // Seconds
        );
    } else if ($seconds > 60*60) {
        // over an hour
        return sprintf("%d:%s:%s",
                    floor($seconds/60/60),                        // Hours
            str_pad(floor($seconds/60%60), 2, "0", STR_PAD_LEFT), // Minutes
            str_pad(      $seconds%60,     2, "0", STR_PAD_LEFT)  // Seconds
        );
    } else {
        // less than an hour
        return sprintf("%d:%s",
                    floor($seconds/60),                       // Minutes
            str_pad(      $seconds%60,  2, "0", STR_PAD_LEFT) // Seconds
        );
    }
}

if(isset($_SESSION['siteusername'])) {
    UpdateLoginTime($_SESSION['siteusername'], $conn); 
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);