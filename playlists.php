<?php require($_SERVER['DOCUMENT_ROOT'] . "/static/important/config.inc.php"); ?>
<?php require($_SERVER['DOCUMENT_ROOT'] . "/static/lib/profile.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>FulpTube</title>
    <link href="/static/fulptubefull.css" rel="stylesheet">
    <?php $user = getUserFromName($_SESSION['siteusername'], $conn); ?>
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
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(!isset($_SESSION['siteusername'])){ $error = "you are not logged in"; goto skipcomment; }
        if(!$_POST['comment']){ $error = "your description cannot be blank"; goto skipcomment; }
        if(strlen($_POST['comment']) > 1024){ $error = "your comment must be shorter than 1000 characters"; goto skipcomment; }

        $stmt = $conn->prepare("INSERT INTO `playlists` (title, description, rid, author) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $_POST['title'], $_POST['comment'], $rid, $_SESSION['siteusername']);
        $rid = base64_encode(time() . rand(0, 9)) . rand(0, 9) . rand(0, 9);
        $text = htmlspecialchars($_POST['comment']);
        $stmt->execute();
        $stmt->close();
        skipcomment:
        header("Location: playlists.php");
    }
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
                                                        <a class="guide-item yt-uix-sessionlink yt-valign " href="/newmanage" title="" data-channel-id="HCtnHdj3df7iM" data-sessionlink="feature=g-channel&amp;ei=9TzjUbGrIYmZyQHHtICoDg&amp;ved=CEkQgB8oAA">
                                                                  <span class="yt-valign-container yt-valign ">
                                                                    
                                                                    </span>
                                                                  </span>
                                                                </span>
                                                            </span>
                                                                    <span class="yt-valign-container display-name">
                                                                      <span>Overview</span>
                                                                    </span>
                                                                  </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li id="guide-subscriptions-section" class="guide-section without-filter guide-section-no-counts">
                                    <div id="guide-subs-footer-container">
                                        <div id="guide-subscriptions-container">
                                            <div class="guide-channels-content yt-scrollbar spf-nolink">
                                                <ul id="guide-channels" class="guide-channels-list guide-item-container yt-uix-scroller filter-has-matches">
                                                    <li class="guide-channel">
                                                        <a class="guide-item yt-uix-sessionlink yt-valign" href="/managevideos" title="" data-channel-id="HCtnHdj3df7iM" data-sessionlink="feature=g-channel&amp;ei=9TzjUbGrIYmZyQHHtICoDg&amp;ved=CEkQgB8oAA">
                                                                  <span class="yt-valign-container yt-valign ">
                                                                    
                                                                    </span>
                                                                  </span>
                                                                </span>
                                                            </span>
                                                                    <span class="yt-valign-container display-name">
                                                                      <span>Videos</span>
                                                                    </span>
                                                                  </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li id="guide-subscriptions-section" class="guide-section without-filter guide-section-no-counts">
                                    <div id="guide-subs-footer-container">
                                        <div id="guide-subscriptions-container">
                                            <div class="guide-channels-content yt-scrollbar spf-nolink">
                                                <ul id="guide-channels" class="guide-channels-list guide-item-container yt-uix-scroller filter-has-matches">
                                                    <li class="guide-channel">
                                                        <a class="guide-item yt-uix-sessionlink yt-valign guide-item-selected" href="/playlists" title="" data-channel-id="HCtnHdj3df7iM" data-sessionlink="feature=g-channel&amp;ei=9TzjUbGrIYmZyQHHtICoDg&amp;ved=CEkQgB8oAA">
                                                                  <span class="yt-valign-container yt-valign ">
                                                                    
                                                                    </span>
                                                                  </span>
                                                                </span>
                                                            </span>
                                                                    <span class="yt-valign-container display-name">
                                                                      <span>Playlists</span>
                                                                    </span>
                                                                  </span>
                                                        </a>
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
                                    <?php require($_SERVER['DOCUMENT_ROOT'] . "/static/important/getsubs.php"); ?>
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
                    <div style="width: 650px; padding: 5px; background-color: white;">
                        <button onclick="toggleForm()" style="float: right;background-color: #f8f8f8; color: #333; border-color: #d3d3d3;" type="button" class=" yt-uix-button yt-uix-button-primary yt-uix-button-size-default" href="/signup" role="button">
                            <span class="yt-uix-button-content">
                                <a style="color: #333; text-decoration: none;" href="#"><b>+</b></a>
                            </span>
                        </button>
                        <div id="playform" style="display: none;">
                            <form method="post" enctype="multipart/form-data" id="submitform">
                                <?php if(isset($fileerror)) { echo $fileerror . "<br>"; } ?>
                                <div style="width: 640px; padding: 5px; background-color: whitesmoke;">
                                    <h1>Create a Playlist</h1>
                                    <input placeholder="Playlist Title" type="text" name="title" required="required" row="20"><br>
                                </div><br>
                                <div style="width: 640px; padding: 5px; background-color: whitesmoke;">
                                    <textarea style="width: 630px;" id="com" placeholder="Description" name="comment"></textarea><br><br>
                                    <input type="submit" value="Create">
                                </div><br>
                                <script src="/js/commd.js"></script>
                                <!-- class="g-recaptcha" data-sitekey="<?php // echo $config['recaptcha_sitekey']; ?>" data-callback="onLogin" -->
                            </form>
                        </div>
                        <script>
                            var display = false;

                            function toggleForm() {
                                if(display == false) {
                                    document.getElementById("playform").style.display = "block";
                                    display = true;
                                } else {
                                    document.getElementById("playform").style.display = "none";
                                    display = false;
                                }
                            }
                        </script>
                        <h1>Playlists</h1>
                        <table style="width:100%">
                            <tr>
                                <th style="margin: 5px; width: 20%;"></th>
                                <th style="width: 80%;"></th>
                            </tr>
                            <?php
                                $stmt = $conn->prepare("SELECT * FROM playlists WHERE author = ? ORDER BY id DESC");
                                $stmt->bind_param("s", $_SESSION['siteusername']);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                echo $result->num_rows . " playlists(s)<br><br>";
                                while($row = $result->fetch_assoc()) { 
                                    $buffer = explode("|", $row['videos']);
                                    $videos = count($buffer);
                            ?> 
                            <tr style="margin-top: 5px;">
                                <td style="vertical-align: top;">
                                    <img style="width: 90%; height: 73px;" src="/dynamic/thumbs/<?php echo $row['thumbnail'];?>">
                                </td>

                                <td style="vertical-align: top;">
                                    <h1><?php echo htmlspecialchars($row['title']); ?></h1>
                                    <div id="watch-description-text">
                                        <p id="eow-description"><?php if(empty($row['description'])) { echo "<i>This playlist has no description.</i>"; } else { echo parseText($row['description']); } ?></p>
                                        <?php echo $videos - 1; ?> video(s)<br>
                                    </div><br>
                                    <a href="viewplaylist?id=<?php echo $row['rid']; ?>">View</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </table> 
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
