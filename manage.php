<?php require($_SERVER['DOCUMENT_ROOT'] . "/static/important/config.inc.php"); ?>
<?php require($_SERVER['DOCUMENT_ROOT'] . "/static/lib/profile.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>FulpTube</title>
    <link href="/static/fulptubefull.css" rel="stylesheet">
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
    <?php $user = getUserFromName($_SESSION['siteusername'], $conn); ?>
    <script>function onLogin(token){ document.getElementById('submitform').submit(); }</script>
</head>
<body class="ltr site-left-aligned exp-watch7-comment-ui hitchhiker-enabled guide-enabled guide-expanded page-loaded" dir="ltr">
<div id="body-container">
    <?php require($_SERVER['DOCUMENT_ROOT'] . "/static/important/header.php"); ?>
    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST' && @$_POST['bioset']) {
        updateUserBio($_SESSION['siteusername'], $_POST['bio'], $conn);
        header("Location: index.php");
    } else if($_SERVER['REQUEST_METHOD'] == 'POST' && @$_POST['pfpset']) {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        //This is terribly awful and i will probably put this in a function soon
        $target_dir = "dynamic/pfp/";
        $imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));
        $target_name = md5_file($_FILES["fileToUpload"]["tmp_name"]) . "." . $imageFileType;

        $target_file = $target_dir . $target_name;

        $uploadOk = true;
        $movedFile = false;

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            $fileerror = 'unsupported file type. must be jpg, png, jpeg, or gif';
            $uploadOk = false;
        }

        if (file_exists($target_file)) {
            $movedFile = true;
        } else {
            $movedFile = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        }

        if ($uploadOk) {
            if ($movedFile) {
                $stmt = $conn->prepare("UPDATE users SET pfp = ? WHERE `users`.`username` = ?;");
                $stmt->bind_param("ss", $target_name, $_SESSION['siteusername']);
                $stmt->execute();
                $stmt->close();
            } else {
                $fileerror = 'fatal error';
            }
        }
    }
    ?>
    <div id="page-container">
        <div id="page" class="  watch   clearfix">
            <center>
                <form method="post" enctype="multipart/form-data">
                    <b>Profile Picture</b><br>
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="submit" value="Upload Image" name="pfpset">
                </form><br>
                <form method="post" enctype="multipart/form-data">
                    <b>Bio</b><br>
                    <textarea cols="56" id="biomd" placeholder="Bio" name="bio"><?php echo $user['bio'];?></textarea><br>
                    <input name="bioset" type="submit" value="Set">
                </form><br>
            </center>
        </div>
        <div id="footer-ads">
            <div id="ad_creative_3" class="ad-div " style="z-index: 1">
                <iframe id="ad_creative_iframe_3" scrolling="no" style="z-index: 1" src="https://web.archive.org/web/20130715000613/http://ad.doubleclick.net/N6762/adi/mkt.ythome_1x1/;sz=1x1;tile=3;plat=pc;kcr=us;kga=-1;kgg=-1;klg=en;kmyd=ad_creative_3;ord=4534036351165981?" width="1" height="1" frameborder="0"></iframe>
                <script>
                    (function() {
                        var ord = Math.floor(Math.random() * 10000000000000000);
                        var adIframe = document.getElementById("ad_creative_iframe_3");
                        adIframe.src = "https://web.archive.org/web/20130715000613/http://ad.doubleclick.net/N6762/adi/mkt.ythome_1x1/;sz=1x1;tile=3;plat=pc;kcr=us;kga=-1;kgg=-1;klg=en;kmyd=ad_creative_3;ord=" + ord + "?";
                    })();
                </script>
            </div>
        </div>
    </div>
</div>
</body>
</html>
