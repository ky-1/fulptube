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
    if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['password'] && $_POST['username']) {
        $email = htmlspecialchars(@$_POST['email']);
        $username = htmlspecialchars(@$_POST['username']);
        $password = @$_POST['password'];
        $passwordhash = password_hash(@$password, PASSWORD_DEFAULT);

        if($_POST['password'] !== $_POST['confirm']){ $error = "password and confirmation password do not match"; goto skip; }

        if(strlen($username) > 21) { $error = "your username must be shorter than 21 characters"; goto skip; }
        if(strlen($password) < 8) { $error = "your password must be at least 8 characters long"; goto skip; }
        if(!preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $password)) { $error = "please include both letters and numbers in your password"; goto skip; }
        if(!isset($_POST['g-recaptcha-response'])){ $error = "captcha validation failed"; goto skip; }
        if(!validateCaptcha($config['recaptcha_secret'], $_POST['g-recaptcha-response'])) { $error = "captcha validation failed"; goto skip; }

        $stmt = $conn->prepare("SELECT username FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows) { $error = "there's already a user with that same name!"; goto skip; }
 
        if(register($username, $email, $passwordhash, $conn)) {
            $_SESSION['siteusername'] = htmlspecialchars($username);
            header("Location: manage");
        } else {
            $error = "There was an unknown error making your account.";
        }
    }
    skip:
    ?>
    <div id="page-container">
        <div id="page" class="  watch   clearfix">
            <center>
                <form action="" method="post" id="submitform">
                    <?php if(isset($error)) { echo $error . "<br>";}?>
                    <table>
                        <tbody><tr class="email">
                            <td class="label"><label for="email">E-Mail:</label></td>
                            <td class="input"><input type="email" name="email" id="email"></td>
                        </tr>
                        <tr class="password">
                            <td class="label"><label for="password">Password:</label></td>
                            <td class="input"><input name="password" type="password" id="password"></td>
                        </tr>
                        <tr class="password">
                            <td class="label"><label for="confirm">Confirm Password:</label></td>
                            <td class="input"><input name="confirm" type="password" id="confirm"></td>
                        </tr>
                        <tr class="username">
                            <td class="label"><label for="username">Username:</label></td>
                            <td class="input"><input name="username" type="text" id="username"></td>
                        </tr>
                        <tr class="remember">
                        </tr>
                        <tr class="buttons">
                            <td colspan="2"><input type="submit" value="Register" class="g-recaptcha" data-sitekey="<?php echo $config['recaptcha_sitekey']; ?>" data-callback="onLogin"></td>
                            ...or <a href="/newlogin">login</a> instead
                        </tr>
                        <tr class="forgot">

                        </tr>
                        </tbody></table>
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
