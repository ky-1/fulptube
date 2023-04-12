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
    } else if($_SERVER['REQUEST_METHOD'] == 'POST' && @$_POST['bannerset']) {
      ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);

      //This is terribly awful and i will probably put this in a function soon
      $target_dir = "dynamic/banners/";
      $imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));
      $target_name = md5_file($_FILES["fileToUpload"]["tmp_name"]) . "." . $imageFileType;

      $target_file = $target_dir . $target_name;

      $uploadOk = true;
      $movedFile = false;

      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
          && $imageFileType != "gif" ) {
          $fileerror = 'unsupported file type. must be jpg, png, jpeg, or gif';
          $uploadOk = false;
          goto skip;
      }

      if (file_exists($target_file)) {
          $movedFile = true;
      } else {
          $movedFile = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
      }

      if ($uploadOk) {
          if ($movedFile) {
              $stmt = $conn->prepare("UPDATE users SET banner = ? WHERE `users`.`username` = ?;");
              $stmt->bind_param("ss", $target_name, $_SESSION['siteusername']);
              $stmt->execute();
              $stmt->close();
          } else {
              $fileerror = 'fatal error';
          }
      }

      skip:
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
                                                        <a class="guide-item yt-uix-sessionlink yt-valign guide-item-selected" href="/newmanage" title="" data-channel-id="HCtnHdj3df7iM" data-sessionlink="feature=g-channel&amp;ei=9TzjUbGrIYmZyQHHtICoDg&amp;ved=CEkQgB8oAA">
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
                                                        <a class="guide-item yt-uix-sessionlink yt-valign" href="/playlists" title="" data-channel-id="HCtnHdj3df7iM" data-sessionlink="feature=g-channel&amp;ei=9TzjUbGrIYmZyQHHtICoDg&amp;ved=CEkQgB8oAA">
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
                    <h1>Manage your User</h1><br>
                    <h1>Your Current Profile Picture</h1>
                    <div style="width: 150px; padding: 5px; background-color: whitesmoke;">
                        <img style="width: 150px;" src="/dynamic/pfp/<?php echo $user['pfp']; ?>">
                    </div><br>
                    <div style="width: 350px; padding: 5px; background-color: whitesmoke;">
                    <form method="post" enctype="multipart/form-data">
                        <b>Banner</b><br>
                        <small>Note: The optimal banner resolution is 638x176. Anything higher-lower res will be stretched to fit properly.
                        <input type="file" name="fileToUpload" id="fileToUpload">
                        <input type="submit" value="Upload Banner" name="bannerset">
                    </form>
                    </div><br>
                    <div style="width: 350px; padding: 5px; background-color: whitesmoke;">
                    <form method="post" enctype="multipart/form-data">
                        <b>Profile Picture</b><br>
                        <input type="file" name="fileToUpload" id="fileToUpload">
                        <input type="submit" value="Upload Image" name="pfpset">
                    </form>
                    </div><br>
                    <div style="width: 350px; padding: 5px; background-color: whitesmoke;">
                    <form method="post" enctype="multipart/form-data">
                        <b>Bio</b><br>
                        <textarea style="width: 345px;" id="biomd" placeholder="Bio" name="bio"><?php echo $user['bio'];?></textarea><br>
                        <input name="bioset" type="submit" value="Set">
                    </form>
                    </div><br>

                    <div style="width: 350px; padding: 5px; background-color: whitesmoke;">
                    <form method="post" enctype="multipart/form-data">
                        <b>Toggle Flash On & Off</b><br>
                        <?php if(!isset($_SESSION['flash'])) { echo "Flash is not enabled"; } else { echo "Flash is enabled"; } ?><br>
                        <button style="background-color: #f8f8f8; color: #333; border-color: #d3d3d3;" type="button" class=" yt-uix-button yt-uix-button-primary yt-uix-button-size-default" href="/signup" role="button">
                            <span class="yt-uix-button-content">
                                <a style="color: #333; text-decoration: none;" href="/toggleflash">Toggle</a>
                            </span>
                        </button>
                    </form>
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
