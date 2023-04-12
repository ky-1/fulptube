<?php require($_SERVER['DOCUMENT_ROOT'] . "/static/important/config.inc.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>FulpTube</title>
    <link href="/static/fulptubefull.css" rel="stylesheet">
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
    <script>function onLogin(token){ document.getElementById('submitform').submit(); }</script>
</head>
<body class="ltr site-left-aligned exp-watch7-comment-ui hitchhiker-enabled guide-enabled guide-expanded page-loaded" dir="ltr">
<div id="body-container">
    <?php require($_SERVER['DOCUMENT_ROOT'] . "/static/important/header.php"); ?>
    <?php
    if(!isset($_SESSION['siteusername'])) { header("Location: signup.php"); die(); }
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        echo "Don't exit this page.";

        $uploadOk = true;
        $movedFile = false;

        $songFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));
        $target_name = md5_file($_FILES["fileToUpload"]["tmp_name"]) . "." . $songFileType;

        $fout = json_decode(shell_exec('ffprobe -v quiet -print_format json -show_format -show_streams "' . $_FILES['fileToUpload']['tmp_name'] . '"'));
        $w = $fout->streams[0]->width;
        $h = $fout->streams[0]->height;

        echo $_FILES['fileToUpload']['tmp_name'];

        if(!isset($fout->streams[0]->width)) {
            $w = $fout->streams[1]->width;
            $h = $fout->streams[1]->height;
        }

        if($w > 1296 || $h > 720) {
            $fileerror = "Video is too big.";
            $uploadOk = false;
            goto skip;
        }


        $dur = shell_exec('ffprobe -i ' . $_FILES['fileToUpload']['tmp_name'] . ' -show_entries format=duration -v quiet -of csv="p=0"');
        $dur = round($dur);

        if($songFileType != "mp4") {
            $fileerror = 'unsupported file type. must be mp4<hr>';
            $uploadOk = false;
        }

        if ($uploadOk) {
            echo shell_exec("ffmpeg -i " . $_FILES["fileToUpload"]["tmp_name"] . " -vf 'select=eq(n\,34)' -vframes 1 " . $_SERVER['DOCUMENT_ROOT'] . "/dynamic/thumbs/" . md5_file($_FILES["fileToUpload"]["tmp_name"]) . ".png");
            echo shell_exec("ffmpeg -i " . $_FILES["fileToUpload"]["tmp_name"] . " -preset ultrafast -threads 4 -s 640x480 -b:v 750k -c:a copy " . $_SERVER['DOCUMENT_ROOT'] . "/dynamic/videos/" . md5_file($_FILES["fileToUpload"]["tmp_name"]) . ".mp4");

            $stmt = $conn->prepare("INSERT INTO videos (title, author, filename, thumbnail, description, tags, rid, duration) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssss", $title, $_SESSION['siteusername'], $filename, $thumbnail, $description, $tags, $rid, $dur);
            $rid = base64_encode(time() . rand(0, 9)) . rand(0, 9) . rand(0, 9);
            $title = htmlspecialchars($_POST['title']);
            $description = htmlspecialchars($_POST['comment']);
            $tags = htmlspecialchars($_POST['tags']);
            $filename = md5_file($_FILES["fileToUpload"]["tmp_name"]) . ".mp4";
            $thumbnail = md5_file($_FILES["fileToUpload"]["tmp_name"]) . ".png";

            $stmt->execute();
            $stmt->close();

            echo "You can now exit this page.";
        }
        skip:
    }
    ?>
    <div id="page-container">
        <div id="page" class="  watch   clearfix"><div id="guide"></div><div id="content" class="">
            <center>
                <form method="post" enctype="multipart/form-data" id="submitform">
                    <?php if(isset($fileerror)) { echo $fileerror . "<br>"; } ?>
                    <b>Title</b> <input type="text" name="title" required="required" row="20"><br>
                    <b>Tags</b> <input type="text" name="tags" required="required" row="20"><br>
                    <input type="file" name="fileToUpload" id="fileToUpload"><br>
                    <small>Thumbnails are auto generated. <br>All videos are downscaled to 480p by using FFmpeg. <br>MP4 is only supported.</small><br><br>
                    <textarea cols="32" id="com" placeholder="Comment" name="comment"></textarea><br><br>
                    <script src="/js/commd.js"></script>
                    <input type="submit" value="Upload">
                    <!-- class="g-recaptcha" data-sitekey="<?php // echo $config['recaptcha_sitekey']; ?>" data-callback="onLogin" -->
                </form>
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
