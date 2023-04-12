<?php require($_SERVER['DOCUMENT_ROOT'] . "/static/important/config.inc.php"); ?>
<?php require($_SERVER['DOCUMENT_ROOT'] . "/static/lib/profile.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>FulpTube</title>
    <link href="/static/fulptubefull.css" rel="stylesheet">
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
    <script>function onLogin(token){ document.getElementById('submitform').submit(); }</script>
    <style>
    #myProgress {
        width: 50%;
        background-color: grey;
    }

    #myBar {
        width: 1%;
        height: 10px;
        background-color: green;
    }
    </style>
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

        $stmt = $conn->prepare("SELECT password FROM `users` WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if(!mysqli_num_rows($result)){ { $error = "incorrect username or password"; goto skip; } }
        $row = $result->fetch_assoc();
        $hash = $row['password'];

        if(!password_verify($password, $hash)){ $error = "incorrect username or password"; goto skip; }
        $_SESSION['siteusername'] = $username;

        header("Location: newmanage");
    }
    skip:
    ?>
    <div id="page-container">
        <div id="page" class="  home  clearfix"><div id="guide">        <div id="guide-container" class="">
                    <div id="guide-main" class="    guide-module     spf-nolink ">
                        <div class="guide-module-toggle">
                            <span class="guide-module-toggle-icon">
                              <span class="guide-module-toggle-arrow"></span>
                              <img src="/static/pixel-vfl3z5WfW.gif" alt="">
                              <img src="/static/pixel-vfl3z5WfW.gif" alt="" id="collapsed-notification-icon">
                            </span>
                            <div class="guide-module-toggle-label">
                                <h3>
                                    <span>
                                          Guide
                                    </span>
                                </h3>
                            </div>
                        </div>
                        <div class="guide-module-content yt-scrollbar">
                            <ul class="guide-toplevel">
                                <li id="guide-subscriptions-section" class="guide-section without-filter guide-section-no-counts">
                                    <div id="guide-subs-footer-container">
                                        <div id="guide-subscriptions-container">
                                            <div class="guide-channels-content yt-scrollbar spf-nolink">
                                                <ul id="guide-channels" class="guide-channels-list guide-item-container yt-uix-scroller filter-has-matches">
                                                    <li class="guide-channel">
                                                        <a class="guide-item yt-uix-sessionlink yt-valign  guide-item-selected" href="" title="Popular on YouTube" data-channel-id="HCtnHdj3df7iM" data-sessionlink="feature=g-channel&amp;ei=9TzjUbGrIYmZyQHHtICoDg&amp;ved=CEkQgB8oAA">
                                                                  <span class="yt-valign-container yt-valign ">
                                                                      <span class="thumb">    <span class="video-thumb  yt-thumb yt-thumb-18">
                                                                  <span class="yt-thumb-square">
                                                                    <span class="yt-thumb-clip">
                                                                      <span class="yt-thumb-clip-inner">
                                                                        <img alt="Thumbnail" data-thumb-manual="1" src="//web.archive.org/web/20130715000613/http://i1.ytimg.com/li/tnHdj3df7iM/default.jpg" data-thumb="//web.archive.org/web/20130715000613/http://i1.ytimg.com/li/tnHdj3df7iM/default.jpg" width="18">
                                                                        <span class="vertical-align"></span>
                                                                      </span>
                                                                    </span>
                                                                  </span>
                                                                </span>
                                                            </span>
                                                                    <span class="yt-valign-container display-name">
                                                                      <span>Popular on FulpTube</span>
                                                                    </span>
                                                                  </span>
                                                        </a>
                                                    </li>
                                                    <li class="guide-channel">
                                                        <a class="guide-item yt-uix-sessionlink yt-valign  " href="" title="Music" data-channel-id="HCp-Rdqh3z4Uc" data-sessionlink="feature=g-channel&amp;ei=9TzjUbGrIYmZyQHHtICoDg&amp;ved=CEoQgB8oAQ">
                                                                  <span class="yt-valign-container yt-valign ">
                                                                      <span class="thumb">    <span class="video-thumb  yt-thumb yt-thumb-18">
                                                                  <span class="yt-thumb-square">
                                                                    <span class="yt-thumb-clip">
                                                                      <span class="yt-thumb-clip-inner">
                                                                        <img alt="Thumbnail" data-thumb-manual="1" src="//web.archive.org/web/20130715000613/http://i1.ytimg.com/li/p-Rdqh3z4Uc/default.jpg" data-thumb="//web.archive.org/web/20130715000613/http://i1.ytimg.com/li/p-Rdqh3z4Uc/default.jpg" width="18">
                                                                        <span class="vertical-align"></span>
                                                                      </span>
                                                                    </span>
                                                                  </span>
                                                                </span>
                                                            </span>
                                                                    <span class="yt-valign-container display-name">
                                                                      <span>Music</span>
                                                                    </span>
                                                                  </span>
                                                        </a>
                                                    </li>
                                                    <li class="guide-channel">
                                                        <a class="guide-item yt-uix-sessionlink yt-valign  " href="" title="Sports" data-channel-id="HC7Dr1BKwqctY" data-sessionlink="feature=g-channel&amp;ei=9TzjUbGrIYmZyQHHtICoDg&amp;ved=CEsQgB8oAg">
                                                                      <span class="yt-valign-container yt-valign ">
                                                                          <span class="thumb">    <span class="video-thumb  yt-thumb yt-thumb-18">
                                                                      <span class="yt-thumb-square">
                                                                        <span class="yt-thumb-clip">
                                                                          <span class="yt-thumb-clip-inner">
                                                                            <img alt="Thumbnail" data-thumb-manual="1" src="//web.archive.org/web/20130715000613/http://i1.ytimg.com/li/7Dr1BKwqctY/default.jpg" data-thumb="//web.archive.org/web/20130715000613/http://i1.ytimg.com/li/7Dr1BKwqctY/default.jpg" width="18">
                                                                            <span class="vertical-align"></span>
                                                                          </span>
                                                                        </span>
                                                                      </span>
                                                                    </span>
                                                                </span>
                                                                        <span class="yt-valign-container display-name">
                                                                          <span>Sports</span>
                                                                        </span>
                                                                      </span>
                                                        </a>
                                                    </li>
                                                    <li class="guide-channel">
                                                        <a class="guide-item yt-uix-sessionlink yt-valign  " href="" title="Gaming" data-channel-id="HChfZhJdhTqX8" data-sessionlink="feature=g-channel&amp;ei=9TzjUbGrIYmZyQHHtICoDg&amp;ved=CEwQgB8oAw">
                                                                  <span class="yt-valign-container yt-valign ">
                                                                      <span class="thumb">    <span class="video-thumb  yt-thumb yt-thumb-18">
                                                                  <span class="yt-thumb-square">
                                                                    <span class="yt-thumb-clip">
                                                                      <span class="yt-thumb-clip-inner">
                                                                        <img alt="Thumbnail" data-thumb-manual="1" src="//web.archive.org/web/20130715000613/http://i1.ytimg.com/li/hfZhJdhTqX8/default.jpg" data-thumb="//web.archive.org/web/20130715000613/http://i1.ytimg.com/li/hfZhJdhTqX8/default.jpg" width="18">
                                                                        <span class="vertical-align"></span>
                                                                      </span>
                                                                    </span>
                                                                  </span>
                                                                </span>
                                                            </span>
                                                                    <span class="yt-valign-container display-name">
                                                                      <span>Gaming</span>
                                                                    </span>
                                                                  </span>
                                                        </a>
                                                    </li>
                                                    <li class="guide-channel">
                                                        <a class="guide-item yt-uix-sessionlink yt-valign  " href="" title="Movies" data-channel-id="UCczhp4wznQWonO7Pb8HQ2MQ" data-sessionlink="feature=g-channel&amp;ei=9TzjUbGrIYmZyQHHtICoDg&amp;ved=CE0QgB8oBA">
                                                                  <span class="yt-valign-container yt-valign ">
                                                                      <span class="thumb">    <span class="video-thumb  yt-thumb yt-thumb-18">
                                                                  <span class="yt-thumb-square">
                                                                    <span class="yt-thumb-clip">
                                                                      <span class="yt-thumb-clip-inner">
                                                                        <img alt="Thumbnail" data-thumb-manual="1" src="//web.archive.org/web/20130715000613/http://i1.ytimg.com/i/czhp4wznQWonO7Pb8HQ2MQ/1.jpg" data-thumb="//web.archive.org/web/20130715000613/http://i1.ytimg.com/i/czhp4wznQWonO7Pb8HQ2MQ/1.jpg" width="18">
                                                                        <span class="vertical-align"></span>
                                                                      </span>
                                                                    </span>
                                                                  </span>
                                                                </span>
                                                            </span>
                                                                    <span class="yt-valign-container display-name">
                                                                      <span>Movies</span>
                                                                    </span>
                                                                  </span>
                                                        </a>
                                                    </li>
                                                    <li class="guide-channel">
                                                        <a class="guide-item yt-uix-sessionlink yt-valign  " href="" title="TV Shows" data-channel-id="UCl8dMTqDrJQ0c8y23UBu4kQ" data-sessionlink="feature=g-channel&amp;ei=9TzjUbGrIYmZyQHHtICoDg&amp;ved=CE4QgB8oBQ">
                                                                    <span class="yt-valign-container yt-valign ">
                                                                      <span class="thumb">    <span class="video-thumb  yt-thumb yt-thumb-18">
                                                                  <span class="yt-thumb-square">
                                                                    <span class="yt-thumb-clip">
                                                                      <span class="yt-thumb-clip-inner">
                                                                        <img alt="Thumbnail" data-thumb-manual="1" src="//web.archive.org/web/20130715000613/http://i1.ytimg.com/i/l8dMTqDrJQ0c8y23UBu4kQ/1.jpg" data-thumb="//web.archive.org/web/20130715000613/http://i1.ytimg.com/i/l8dMTqDrJQ0c8y23UBu4kQ/1.jpg" width="18">
                                                                        <span class="vertical-align"></span>
                                                                      </span>
                                                                    </span>
                                                                  </span>
                                                                </span>
                                                            </span>
                                                                    <span class="yt-valign-container display-name">
                                                                      <span>TV Shows</span>
                                                                    </span>
                                                                  </span>
                                                        </a>
                                                    </li>
                                                    <li class="guide-channel">
                                                        <a class="guide-item yt-uix-sessionlink yt-valign  " href="" title="News" data-channel-id="HCPvDBPPFfuaM" data-sessionlink="feature=g-channel&amp;ei=9TzjUbGrIYmZyQHHtICoDg&amp;ved=CE8QgB8oBg">
                                                                      <span class="yt-valign-container yt-valign ">
                                                                          <span class="thumb">    <span class="video-thumb  yt-thumb yt-thumb-18">
                                                                      <span class="yt-thumb-square">
                                                                        <span class="yt-thumb-clip">
                                                                          <span class="yt-thumb-clip-inner">
                                                                            <img alt="Thumbnail" data-thumb-manual="1" src="//web.archive.org/web/20130715000613/http://i1.ytimg.com/li/PvDBPPFfuaM/default.jpg" data-thumb="//web.archive.org/web/20130715000613/http://i1.ytimg.com/li/PvDBPPFfuaM/default.jpg" width="18">
                                                                            <span class="vertical-align"></span>
                                                                          </span>
                                                                        </span>
                                                                      </span>
                                                                    </span>
                                                                </span>
                                                                        <span class="yt-valign-container display-name">
                                                                          <span>News</span>
                                                                        </span>
                                                                      </span>
                                                        </a>
                                                    </li>
                                                    <li class="guide-channel">
                                                        <a class="guide-item yt-uix-sessionlink yt-valign  " href="" title="Spotlight" data-channel-id="UCBR8-60-B28hp2BmDPdntcQ" data-sessionlink="feature=g-channel&amp;ei=9TzjUbGrIYmZyQHHtICoDg&amp;ved=CFAQgB8oBw">
                                                                  <span class="yt-valign-container yt-valign ">
                                                                      <span class="thumb">    <span class="video-thumb  yt-thumb yt-thumb-18">
                                                                  <span class="yt-thumb-square">
                                                                    <span class="yt-thumb-clip">
                                                                      <span class="yt-thumb-clip-inner">
                                                                        <img alt="Thumbnail" data-thumb-manual="1" src="//web.archive.org/web/20130715000613/http://i1.ytimg.com/i/BR8-60-B28hp2BmDPdntcQ/1.jpg" data-thumb="//web.archive.org/web/20130715000613/http://i1.ytimg.com/i/BR8-60-B28hp2BmDPdntcQ/1.jpg" width="18">
                                                                        <span class="vertical-align"></span>
                                                                      </span>
                                                                    </span>
                                                                  </span>
                                                                </span>
                                                                </span>
                                                                    <span class="yt-valign-container display-name">
                                                                      <span>Spotlight</span>
                                                                    </span>
                                                                  </span>
                                                        </a>
                                                    </li>

                                                    <li id="guide-filter-no-results">
                                                        No channels found
                                                    </li>
                                                    <li id="guide-filter-loading-results">
                                                        <p class="yt-spinner">
                                                            <img src="/static/pixel-vfl3z5WfW.gif" class="yt-spinner-img" alt="Loading icon">
                                                            <span class="yt-spinner-message">
                                                                        Loading subscriptions
                                                                    </span>
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <hr class="guide-section-separator">
                                    </div>
                                </li>
                                <li id="guide-subscription-suggestions-section" class="guide-section guide-section-no-counts">
                                    <h3>
                                        Channels for you
                                    </h3>
                                    <div class="guide-recommendations-list spf-nolink">
                                        <div class="guide-channels-content yt-scrollbar spf-nolink">
                                            <ul class="guide-channels-list guide-item-container yt-uix-scroller filter-has-matches" data-scroller-mousewheel-listener="" data-scroller-scroll-listener="">
                                                <li class="guide-channel">
                                                    <a class="guide-item yt-uix-sessionlink yt-valign  " href="" title="The Ricky Gervais Channel" data-channel-id="UCry7B7DGVgUIa6k4Tis_DJQ" data-sessionlink="feature=g-chrec&amp;ei=9TzjUbGrIYmZyQHHtICoDg&amp;ved=CFIQgB8oAA">
                                                                <span class="yt-valign-container yt-valign ">
                                                                  <span class="thumb">    <span class="video-thumb  yt-thumb yt-thumb-18">
                                                                      <span class="yt-thumb-square">
                                                                        <span class="yt-thumb-clip">
                                                                          <span class="yt-thumb-clip-inner">
                                                                            <img alt="Thumbnail" data-thumb-manual="1" src="" data-thumb="//web.archive.org/web/20130715000613/http://i1.ytimg.com/i/ry7B7DGVgUIa6k4Tis_DJQ/1.jpg" width="18">
                                                                            <span class="vertical-align"></span>
                                                                          </span>
                                                                        </span>
                                                                      </span>
                                                                    </span>
                                                                </span>
                                                                <span class="yt-valign-container display-name">
                                                                  <span>FulpTube</span>
                                                                </span>
                                                              </span>
                                                    </a>
                                                </li>
                                                <li id="guide-filter-no-results">
                                                    No channels found
                                                </li>
                                                <li id="guide-filter-loading-results">
                                                    <p class="yt-spinner">
                                                        <img src="/static/pixel-vfl3z5WfW.gif" class="yt-spinner-img" alt="Loading icon">

                                                        <span class="yt-spinner-message">
                                                                    Loading subscriptions
                                                                </span>
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                    <hr class="guide-section-separator">
                                    <ul id="gh-management" class="guide-item-container">
                                        <li class="guide-channel">
                                            <a class="guide-item yt-uix-sessionlink yt-valign  " href="/channels" title="Browse channels" data-channel-id="guide_builder" data-sessionlink="feature=g-manage&amp;ei=9TzjUbGrIYmZyQHHtICoDg&amp;ved=CFgQhx8oAA">
                                                      <span class="yt-valign-container yt-valign ">
                                                          <span class="thumb guide-management-plus-icon">
                                                            <img src="/static/pixel-vfl3z5WfW.gif" alt="">
                                                          </span>
                                                        <span class="yt-valign-container ">
                                                          <span>Browse channels</span>
                                                        </span>
                                                      </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="watch-context-container" class="guide-module collapsed hid"></div>
                </div>
            </div><div id="content" class="">
                <div style="padding: 15px; padding-left: 178px; margin-left: 10px;">
                    <img style="position: absolute;width: 580px;" src="/static/login.png">
                    <div style="position: absolute;left: 770px;width: 350px; padding: 5px; background-color: whitesmoke;">
                    <h1>Login</h1><br>
                    <form action="" method="post" id="submitform">
                        <table>
                            <tbody><tr class="email">
                                <td class="label"><label for="email">User Name:</label></td>
                                <td class="input"><input type="text" name="username" id="email"></td>
                            </tr>
                            <tr class="password">
                                <td class="label"><label for="password">Password:</label></td>
                                <td class="input"><input name="password" type="password" id="password"></td>
                            </tr>
                            <tr class="remember">
                                <td colspan="2"><input type="checkbox" name="Remember" value="Remember" id="checkbox">
                                    <label for="checkbox">Remember my E-mail</label></td>
                            </tr>
                            <tr class="buttons">
                                <td colspan="2"><input type="submit" value="Login"></td>
                            </tr>
                            <tr class="forgot">

                            </tr>
                            </tbody></table>
                    </form>
                    ...or <a href="/newsignup">sign up</a> instead
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="footer-ads">
        <div id="ad_creative_3" class="ad-div " style="z-index: 1">
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
