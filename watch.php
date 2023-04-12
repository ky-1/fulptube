<?php require($_SERVER['DOCUMENT_ROOT'] . "/static/important/config.inc.php"); ?>
<?php require($_SERVER['DOCUMENT_ROOT'] . "/static/lib/profile.php"); ?>
<?php addView($_GET['v'], @$_SESSION['siteusername'], $conn); ?>
<?php addToHistory($_GET['v'], @$_SESSION['siteusername'], $conn); ?>
<!DOCTYPE html>
<html>
<head>
    <title>FulpTube</title>
    <link href="/static/fulptubefull.css" rel="stylesheet">
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/mediaelement@4.2.16/build/mediaelement-and-player.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.16/build/mediaelementplayer.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.16/build/mediaelementplayer-legacy.min.css" rel="stylesheet">
    <script>function onLogin(token){ document.getElementById('submitform').submit(); }</script>
    <?php $video = getVideoFromId($_GET['v'], $conn); ?>
    <meta property="og:title" content="<?php echo addslashes($video['title']); ?>">
    <meta property="og:description" content="<?php echo addslashes($video['description']); ?>">
    <meta property="og:image" content="https://fulptube.rocks/dynamic/thumbs/<?php echo addslashes($video['thumbnail']); ?>">
    <meta property="og:site_name" content="FulpTube" />
    <style>
      .mejs__controls:not([style*="display: none"]) {
        background: rgba(0, 0, 0,1) !important;
        background: -webkit-linear-gradient(rgba(0,0,0,1),rgba(0,0,0,1)) !important;
        background: linear-gradient(rgba(0,0,0,1),rgba(0,0,0,1)) !important;
      }
    </style>
</head>
<body class="ltr site-left-aligned exp-watch7-comment-ui hitchhiker-enabled guide-enabled guide-expanded page-loaded" dir="ltr">
<div id="body-container">
    <?php require($_SERVER['DOCUMENT_ROOT'] . "/static/important/header.php"); ?>
    <div id="page-container">
        <div id="page" class="  watch   clearfix" style="width: 172px; position: absolute; left: 55px;">
          <div id="guide"></div>
            <div id="content" class="">   
              <div id="watch7-container" class="  transition-content  " itemscope="" itemid="" itemtype="http://schema.org/VideoObject">
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
                                                        <!-- _HISTORY -->
                                                        <a class="guide-item yt-uix-sessionlink yt-valign  " href="/history" title="History" data-channel-id="UCBR8-60-B28hp2BmDPdntcQ" data-sessionlink="feature=g-channel&amp;ei=9TzjUbGrIYmZyQHHtICoDg&amp;ved=CFAQgB8oBw">
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
                                                              <span>Your History</span>
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
                                        CHANNELS FOR YOU
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
            </div>
                    <div>
                      <div id="player" class="" style="margin-top: 20px;">
                          <div id="playlist">
                          </div>
                          <div id="player-unavailable" class="    hid  ">
                          </div>
                          <!-- START VIDEO -->
                          <?php if(!isset($_SESSION['flash'])) { ?>
                            <iframe src="/player/embed.php?video=<?php echo $video['filename']; ?>" scrolling="no" style="width: 640px; height: 390px;"></iframe>
                          <?php } else { ?>
                            <iframe src="/player/flashembed.php?video=<?php echo $video['filename']; ?>" scrolling="no" style="width: 640px; height: 390px;"></iframe> 
                          <?php } ?>
                          <div id="player-branded-banner">
                          </div>
                      </div>
                      <div id="watch7-main-container">
                          <div id="watch7-main" class="clearfix">
                              <div id="watch7-content" class="watch-content">
                                  <div class="yt-uix-button-panel">
                                      <div id="watch7-headline" class="clearfix  yt-uix-expander yt-uix-expander-collapsed">
                                          <h1 id="watch-headline-title" class="yt">
                                            <span id="eow-title" class="watch-title  yt-uix-expander-head" dir="ltr">
                                              <?php echo $video['title']; ?>
                                            </span>
                                          </h1>
                                      </div>

        <div id="watch7-user-header"><a href="/user?n=<?php echo $video['author']; ?>" class="yt-user-photo ">    
        <span class="video-thumb  yt-thumb yt-thumb-48">
        <span class="yt-thumb-square">
          <span class="yt-thumb-clip">
            <span class="yt-thumb-clip-inner">
              <img src="/dynamic/pfp/<?php echo getPFPFromUser($video['author'], $conn);  ?>" width="48">
              <span class="vertical-align"></span>
            </span>
          </span>
        </span>
      </span>
        </a><a href="/user?n=<?php echo htmlspecialchars($video['author']); ?>" class="yt-uix-sessionlink yt-user-name " data-sessionlink="feature=watch&amp;ei=n-PiUdfCIcfckwLEyoDACw" dir="ltr">
        <?php echo htmlspecialchars($video['author']); ?></a><span class="yt-user-separator">·</span><a class="yt-uix-sessionlink yt-user-videos" href="/web/20130714174503/http://www.youtube.com/user/Mangoman8362/videos" data-sessionlink="feature=watch&amp;ei=n-PiUdfCIcfckwLEyoDACw"><?php echo getVideosAFromUser($video['author'], $conn); ?> videos</a><br><span id="watch7-subscription-container"><span class=" yt-uix-button-subscription-container with-preferences">
        <button class="yt-uix-subscription-button yt-uix-button yt-uix-button-subscribe-branded yt-uix-button-size-default" type="button">    <span class="yt-uix-button-icon-wrapper">
        <img class="yt-uix-button-icon yt-uix-button-icon-subscribe" src="/static/pixel-vfl3z5WfW.gif" alt="" title="">
        <span class="yt-uix-button-valign"></span>
      </span>
      <span class="yt-uix-button-content">
      <?php if(ifSubscribed(@$_SESSION['siteusername'], $video['author'], $conn) == false) {?> 
        <span class="subscribe-label"><a style="color: white;" href="/subscribe?user=<?php echo $video['author']; ?>">Subscribe</a>
      <?php } else { ?>
        <span class="subscribe-label"><a style="color: white;" href="/unsubscribe?user=<?php echo $video['author']; ?>">Unsubscribe</a>
      <?php } ?>
  </span>
  <span class="subscribed-label">Subscribed</span><span class="unsubscribe-label" aria-label="Unsubscribe">Unsubscribe</span>
      </span>
  </button><button class="yt-uix-subscription-preferences-button yt-uix-button yt-uix-button-default yt-uix-button-size-default yt-uix-button-empty" type="button" data-channel-external-id="UCPxRNGp9nGNjFynhXhiduUg" role="button">    <span class="yt-uix-button-icon-wrapper">
        <img class="yt-uix-button-icon yt-uix-button-icon-subscription-preferences" src="/static/pixel-vfl3z5WfW.gif" alt="" title="">
        <span class="yt-uix-button-valign"></span>
      </span>
  </button><span class="yt-subscription-button-subscriber-count-branded-horizontal"><?php echo getSubscribers($video['author'], $conn); ?></span>  <span class="yt-subscription-button-disabled-mask" title=""></span>

    <div class="yt-uix-overlay " data-overlay-style="primary" data-overlay-shape="tiny">

          <div class="yt-dialog hid">
      <div class="yt-dialog-base">
        <span class="yt-dialog-align"></span>
        <div class="yt-dialog-fg">
          <div class="yt-dialog-fg-content">
              <div class="yt-dialog-header">
                <h2 class="yt-dialog-title">
                        Subscription preferences


                </h2>
              </div>
            <div class="yt-dialog-loading">
                <div class="yt-dialog-waiting-content">
      <div class="yt-spinner-img"></div><div class="yt-dialog-waiting-text">Loading...</div>
    </div>

            </div>
            <div class="yt-dialog-content">
                <div class="subscription-preferences-overlay-content-container">
      <div class="subscription-preferences-overlay-loading ">
          <p class="yt-spinner">
        <img src="/static/pixel-vfl3z5WfW.gif" class="yt-spinner-img" alt="Loading icon">

      <span class="yt-spinner-message">
  Loading...
      </span>
    </p>

      </div>
      <div class="subscription-preferences-overlay-content">
      </div>
    </div>

            </div>
            <div class="yt-dialog-working">
                <div id="yt-dialog-working-overlay">
    </div>
    <div id="yt-dialog-working-bubble">
      <div class="yt-dialog-waiting-content">
        <div class="yt-spinner-img"></div><div class="yt-dialog-waiting-text">Working...</div>
      </div>
    </div>

            </div>
          </div>
        </div>
      </div>
    </div>


    </div>

  </span></span><div id="watch7-views-info">      <span class="watch-view-count ">
      <?php echo getViews($_GET['v'], $conn); ?> views
    </span>

                                              <div class="video-extras-sparkbars">
                                                  <div class="video-extras-sparkbar-likes" style="width: 93.1823826476%"></div>
                                                  <div class="video-extras-sparkbar-dislikes" style="width: 6.81761735243%"></div>
                                              </div>
                                              <span class="video-extras-likes-dislikes">
        <img class="icon-watch-stats-like" src="/static/pixel-vfl3z5WfW.gif" alt="Like">
    <span class="likes-count"><?php echo getLikes($_GET['v'], $conn); ?></span>
  &nbsp;&nbsp;&nbsp;   <img class="icon-watch-stats-dislike" src="/static/pixel-vfl3z5WfW.gif" alt="Dislike">
    <span class="dislikes-count"><?php echo getDislikes($_GET['v'], $conn); ?></span>

    </span>

                                          </div></div>
                                      <div id="watch7-action-buttons" class="clearfix">
                                          <div id="watch7-sentiment-actions">
        <span id="watch-like-dislike-buttons" class="yt-uix-button-group " data-button-toggle-group="optional"><span class="yt-uix-clickcard"><button class="yt-uix-clickcard-target yt-uix-button yt-uix-button-text yt-uix-button-size-default yt-uix-tooltip" title="" id="watch-like" type="button" data-button-toggle="true" data-orientation="vertical" data-force-position="true" data-position="bottomright" data-unlike-tooltip="Unlike" data-like-tooltip="I like this" role="button">    <span class="yt-uix-button-icon-wrapper">
        <img class="yt-uix-button-icon yt-uix-button-icon-watch-like" src="/static/pixel-vfl3z5WfW.gif" alt="" title="">
        <span class="yt-uix-button-valign"></span>
      </span>
      
      <a style="color: black;" href="/like.php?id=<?php echo $_GET['v']; ?>">
      <span class="yt-uix-button-content">
          Like
      </span>
  </a>
  </button>  <div class="watch7-hovercard yt-uix-clickcard-content">
      <h3 class="watch7-hovercard-header">Sign in to YouTube</h3>
      <div class="watch7-hovercard-message">
        Sign in with your Google Account (YouTube, Google+, Gmail, Orkut, Picasa, or Chrome) to like <span class="yt-user-name " dir="ltr">Paul Bartels</span>'s video.

      </div>
      <ul class="watch7-hovercard-icon-strip clearfix">
        <li class="watch7-hovercard-icon">
          <div class="watch7-hovercard-youtube-icon"></div>
        </li>
        <li class="watch7-hovercard-icon">
          <div class="watch7-hovercard-gplus-icon"></div>
        </li>
        <li class="watch7-hovercard-icon">
          <div class="watch7-hovercard-gmail-icon"></div>
        </li>
        <li class="watch7-hovercard-icon">
          <div class="watch7-hovercard-picasa-icon"></div>
        </li>
        <li class="watch7-hovercard-icon">
          <div class="watch7-hovercard-chrome-icon"></div>
        </li>
      </ul>
      <div class="watch7-hovercard-account-line">
        <a href="https://web.archive.org/web/20130714174503/https://accounts.google.com/ServiceLogin?passive=true&amp;service=youtube&amp;continue=http%3A%2F%2Fwww.youtube.com%2Fsignin%3Faction_handle_signin%3Dtrue%26feature%3D__FEATURE__%26hl%3Den_US%26next%3D%252Fwatch%253Fv%253DL1JYHNX8pdo%26nomobiletemp%3D1&amp;hl=en_US&amp;uilel=3" class="yt-uix-button   yt-uix-sessionlink yt-uix-button-primary yt-uix-button-size-default" data-sessionlink="ei=n-PiUdfCIcfckwLEyoDACw"><span class="yt-uix-button-content">Sign in</span></a>
      </div>
    </div>
  </span><span class="yt-uix-clickcard"><button class="yt-uix-clickcard-target yt-uix-button yt-uix-button-text yt-uix-button-size-default yt-uix-tooltip yt-uix-button-empty" title="I dislike this" id="watch-dislike" type="button" data-button-toggle="true" data-position="bottomright" data-orientation="vertical" data-force-position="true" role="button" data-tooltip-text="I dislike this">    <span class="yt-uix-button-icon-wrapper">
        <a style="color: black;" href="/dislike.php?id=<?php echo $_GET['v']; ?>"><img class="yt-uix-button-icon yt-uix-button-icon-watch-dislike" src="/static/pixel-vfl3z5WfW.gif" alt="I dislike this" title=""></a>
        <span class="yt-uix-button-valign"></span>
      </span>
  </button>  <div class="watch7-hovercard yt-uix-clickcard-content">
      <h3 class="watch7-hovercard-header">Sign in to YouTube</h3>
      <div class="watch7-hovercard-message">
        Sign in with your Google Account (YouTube, Google+, Gmail, Orkut, Picasa, or Chrome) to dislike <span class="yt-user-name " dir="ltr">Paul Bartels</span>'s video.

      </div>
      <ul class="watch7-hovercard-icon-strip clearfix">
        <li class="watch7-hovercard-icon">
          <div class="watch7-hovercard-youtube-icon"></div>
        </li>
        <li class="watch7-hovercard-icon">
          <div class="watch7-hovercard-gplus-icon"></div>
        </li>
        <li class="watch7-hovercard-icon">
          <div class="watch7-hovercard-gmail-icon"></div>
        </li>
        <li class="watch7-hovercard-icon">
          <div class="watch7-hovercard-picasa-icon"></div>
        </li>
        <li class="watch7-hovercard-icon">
          <div class="watch7-hovercard-chrome-icon"></div>
        </li>
      </ul>
      <div class="watch7-hovercard-account-line">
        <a href="https://web.archive.org/web/20130714174503/https://accounts.google.com/ServiceLogin?passive=true&amp;service=youtube&amp;continue=http%3A%2F%2Fwww.youtube.com%2Fsignin%3Faction_handle_signin%3Dtrue%26feature%3D__FEATURE__%26hl%3Den_US%26next%3D%252Fwatch%253Fv%253DL1JYHNX8pdo%26nomobiletemp%3D1&amp;hl=en_US&amp;uilel=3" class="yt-uix-button   yt-uix-sessionlink yt-uix-button-primary yt-uix-button-size-default" data-sessionlink="ei=n-PiUdfCIcfckwLEyoDACw"><span class="yt-uix-button-content">Sign in</span></a>
      </div>
    </div>
  </span></span>
                                          </div>
                                          <div id="watch7-secondary-actions" class="yt-uix-button-group" data-button-toggle-group="required">
          <span>
      <button class="action-panel-trigger  yt-uix-button-toggled yt-uix-button yt-uix-button-text yt-uix-button-size-default yt-uix-tooltip" type="button" title="" onclick=
      "
        document.getElementById('eow-description').innerHTML = '<?php echo str_replace(PHP_EOL, "", addslashes($video['description'])); ?>';
      "  data-button-toggle="true" data-trigger-for="action-panel-details" role="button">    <span class="yt-uix-button-content">
  About
      </span>
  </button>
    </span>

                                              <span>
      <button class="action-panel-trigger   yt-uix-button yt-uix-button-text yt-uix-button-size-default yt-uix-tooltip" type="button" title="" onclick=
      "
        document.getElementById('eow-description').innerHTML = '<ul style=\'columns: 3;\'><li><a href=\'https:/\/www.reddit.com/submit?url=Watch this FulpTube video! https:/\/updatethislink.com/watch\'>Reddit</a></li><li><a href=\'https:/\/twitter.com/intent/tweet?text=Watch this FulpTube video! https:/\/updatethislink.com/watch\'>Twitter</a></li><li><a href=\'https:/\/www.spacemy.xyz/blogs/new.php?text=Watch this FulpTube video! https:/\/updatethislink.com/watch\'>SpaceMy</li></ul>';
      "  data-button-toggle="true" data-trigger-for="action-panel-share" role="button">    <span class="yt-uix-button-content">
  Share
      </span>
  </button>
    </span>

                                              <span class="yt-uix-clickcard">
      <button class="action-panel-trigger   yt-uix-clickcard-target yt-uix-button yt-uix-button-text yt-uix-button-size-default yt-uix-tooltip" type="button" title="" data-orientation="vertical" data-position="bottomleft" data-trigger-for="action-panel-none" data-upsell="playlist" data-button-toggle="true" role="button">    <span class="yt-uix-button-content">
        <a href="addtoplaylist?id=<?php echo $_GET['v']; ?>" style="color: black; text-decoration: none;">Add to</a>
      </span>
  </button>
          <div class="watch7-hovercard yt-uix-clickcard-content">
      <h3 class="watch7-hovercard-header">Sign in to YouTube</h3>
      <div class="watch7-hovercard-message">
        Sign in with your Google Account (YouTube, Google+, Gmail, Orkut, Picasa, or Chrome) to add <span class="yt-user-name " dir="ltr">Paul Bartels</span>'s video to your playlist.

      </div>
      <ul class="watch7-hovercard-icon-strip clearfix">
        <li class="watch7-hovercard-icon">
          <div class="watch7-hovercard-youtube-icon"></div>
        </li>
        <li class="watch7-hovercard-icon">
          <div class="watch7-hovercard-gplus-icon"></div>
        </li>
        <li class="watch7-hovercard-icon">
          <div class="watch7-hovercard-gmail-icon"></div>
        </li>
        <li class="watch7-hovercard-icon">
          <div class="watch7-hovercard-picasa-icon"></div>
        </li>
        <li class="watch7-hovercard-icon">
          <div class="watch7-hovercard-chrome-icon"></div>
        </li>
      </ul>
      <div class="watch7-hovercard-account-line">
        <a href="https://web.archive.org/web/20130714174503/https://accounts.google.com/ServiceLogin?passive=true&amp;service=youtube&amp;continue=http%3A%2F%2Fwww.youtube.com%2Fsignin%3Faction_handle_signin%3Dtrue%26feature%3D__FEATURE__%26hl%3Den_US%26next%3D%252Fwatch%253Fv%253DL1JYHNX8pdo%26nomobiletemp%3D1&amp;hl=en_US&amp;uilel=3" class="yt-uix-button   yt-uix-sessionlink yt-uix-button-primary yt-uix-button-size-default" data-sessionlink="ei=n-PiUdfCIcfckwLEyoDACw"><span class="yt-uix-button-content">Sign in</span></a>
      </div>
    </div>

    </span>

                                              <span>
      <button class="action-panel-trigger   yt-uix-button yt-uix-button-text yt-uix-button-size-default yt-uix-tooltip yt-uix-button-empty" type="button" title="Transcript" 
      onclick="
        document.getElementById('watch-description-clip').innterHTML = 'TESTING!!';
      " 
      data-button-toggle="true" data-trigger-for="action-panel-transcript" role="button" data-tooltip-text="Transcript">    <span class="yt-uix-button-icon-wrapper">
        <img class="yt-uix-button-icon yt-uix-button-icon-action-panel-transcript" src="/static/pixel-vfl3z5WfW.gif" alt="Transcript" title="">
        <span class="yt-uix-button-valign"></span>
      </span>
  </button>
    </span>

                                              <span>
      <button class="action-panel-trigger   yt-uix-button yt-uix-button-text yt-uix-button-size-default yt-uix-tooltip yt-uix-button-empty" type="button" title="Statistics" onclick="alert('<?php echo $video['title']; ?>\n<?php echo getViews($video['rid'], $conn); ?> views\nBy <?php echo $video['author']; ?>');" data-button-toggle="true" data-trigger-for="action-panel-stats" role="button" data-tooltip-text="Statistics">    <span class="yt-uix-button-icon-wrapper">
        <img class="yt-uix-button-icon yt-uix-button-icon-action-panel-stats" src="/static/pixel-vfl3z5WfW.gif" alt="Statistics" title="">
        <span class="yt-uix-button-valign"></span>
      </span>
  </button>
    </span>


                                              <span>
      <button class="action-panel-trigger   yt-uix-button yt-uix-button-text yt-uix-button-size-default yt-uix-tooltip yt-uix-button-empty" type="button" title="Report" onclick="alert('This feature has not been implemented yet!');" data-button-toggle="true" data-trigger-for="action-panel-report" role="button">    <span class="yt-uix-button-icon-wrapper">
        <img class="yt-uix-button-icon yt-uix-button-icon-action-panel-report" src="/static/pixel-vfl3z5WfW.gif" alt="Report" title="">
        <span class="yt-uix-button-valign"></span>
      </span>
  </button>
    </span>

                                          </div>
                                      </div>

                                      <div id="watch7-action-panels" class="yt-uix-button-panel">
                                          <div id="action-panel-details" class="action-panel-content" data-panel-loaded="true">
                                              <div id="watch-description" class="yt-uix-expander yt-uix-expander-collapsed yt-uix-button-panel">
                                                  <div id="watch-description-content">
                                                      <div id="watch-description-clip">
                                                          <p id="watch-uploader-info">
                                                              <strong>Published <span id="eow-date" class="watch-video-date"><?php echo time_elapsed_string($video['publish']); ?></span>
                                                              </strong>
                                                          </p><br>
                                                          <div id="watch-description-text">
                                                              <p id="eow-description"><?php if(empty($video['description'])) { echo "<i>This video has no description.</i>"; } else { echo parseText($video['description']); } ?></p>
                                                          </div>
                                                          <div id="watch-description-extras">
                                                              <ul class="watch-extras-section">
                                                                  <li>
                                                                      <h4 class="title">
                                                                          Category
                                                                      </h4>
                                                                      <div class="content">
                                                                          <p id="eow-category"><a href="/web/20130714174503/http://www.youtube.com/people">People &amp; Blogs</a></p>

                                                                      </div>
                                                                  </li>


                                                                  <li>
                                                                      <h4 class="title">License</h4>
                                                                      <div class="content">
                                                                          <p id="eow-reuse">
                                                                              Standard YouTube License
                                                                          </p>

                                                                      </div></li>

                                                              </ul>
                                                          </div>

                                                      </div>
                                                      <ul id="watch-description-extra-info">

                                                      </ul>
                                                  </div>

                                                  <div id="watch-description-toggle" class="yt-uix-expander-head yt-uix-button-panel">
                                                      <div id="watch-description-expand" class="expand">
                                                          <button class="metadata-inline yt-uix-button yt-uix-button-text yt-uix-button-size-default" type="button" onclick=";return false;" role="button">    <span class="yt-uix-button-content">
  Show more
      </span>
                                                          </button>
                                                      </div>
                                                      <div id="watch-description-collapse" class="collapse">
                                                          <button class="metadata-inline yt-uix-button yt-uix-button-text yt-uix-button-size-default" type="button" onclick=";return false;" role="button">    <span class="yt-uix-button-content">
  Show less
      </span>
                                                          </button>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>

                                          <div id="action-panel-share" class="action-panel-content hid">
                                              <div id="watch-actions-share-loading">
                                                  <div class="action-panel-loading">
                                                      <p class="yt-spinner">
                                                          <img src="/static/pixel-vfl3z5WfW.gif" class="yt-spinner-img" alt="Loading icon">

                                                          <span class="yt-spinner-message">
  Loading...
      </span>
                                                      </p>

                                                  </div>
                                              </div>
                                              <div id="watch-actions-share-panel"></div>

                                          </div>

                                          <div id="action-panel-addto" class="action-panel-content hid" data-auth-required="true">
                                              <div class="action-panel-loading">
                                                  <p class="yt-spinner">
                                                      <img src="/static/pixel-vfl3z5WfW.gif" class="yt-spinner-img" alt="Loading icon">

                                                      <span class="yt-spinner-message">
  Loading...
      </span>
                                                  </p>

                                              </div>
                                          </div>

                                          <div id="action-panel-transcript" class="action-panel-content hid">
                                              <div id="watch-actions-transcript-loading">
                                                  <div class="action-panel-loading">
                                                      <p class="yt-spinner">
                                                          <img src="/static/pixel-vfl3z5WfW.gif" class="yt-spinner-img" alt="Loading icon">

                                                          <span class="yt-spinner-message">
  Loading...
      </span>
                                                      </p>

                                                  </div>
                                              </div>
                                              <div id="watch-actions-transcript" class="watch-actions-panel hid">
                                                  <div id="caption-line-template" class="hid">
                                                      <!--
                                                      <div class="caption-line-time">
                                                        <div class="caption-line-start">__start__</div>
                                                      </div>
                                                      <div class="editable-line-text">
                                                        <span class="editable-line-text-original">__original__</span>
                                                        <label class="editable-line-text-current hid">__current__</label>
                                                        <textarea class="editable-line-text-input hid">__input__</textarea>
                                                      </div>
                                                      -->
                                                  </div>



                                                  <div id="watch-transcript-container">
                                                      <div id="watch-transcript-not-found" class="hid">
                                                          The interactive transcript could not be loaded.
                                                      </div>


                                                  </div>
                                              </div>

                                          </div>

                                          <div id="action-panel-stats" class="action-panel-content hid">
                                              <div class="action-panel-loading">
                                                  <p class="yt-spinner">
                                                      <img src="/static/pixel-vfl3z5WfW.gif" class="yt-spinner-img" alt="Loading icon">

                                                      <span class="yt-spinner-message">
  Loading...
      </span>
                                                  </p>

                                              </div>
                                          </div>

                                          <div id="action-panel-report" class="action-panel-content hid" data-auth-required="true">
                                              <div class="action-panel-loading">
                                                  <p class="yt-spinner">
                                                      <img src="/static/pixel-vfl3z5WfW.gif" class="yt-spinner-img" alt="Loading icon">

                                                      <span class="yt-spinner-message">
  Loading...
      </span>
                                                  </p>

                                              </div>
                                          </div>

                                          <div id="action-panel-login" class="action-panel-content hid">
                                              <div class="action-panel-login">
                                                  <a href="https://web.archive.org/web/20130714174503/https://accounts.google.com/ServiceLogin?passive=true&amp;service=youtube&amp;continue=http%3A%2F%2Fwww.youtube.com%2Fsignin%3Faction_handle_signin%3Dtrue%26feature%3D__FEATURE__%26hl%3Den_US%26next%3D%252Fwatch%253Fv%253DL1JYHNX8pdo%26nomobiletemp%3D1&amp;hl=en_US&amp;uilel=3" class="yt-uix-button   yt-uix-sessionlink yt-uix-button-default yt-uix-button-size-default" data-sessionlink="ei=n-PiUdfCIcfckwLEyoDACw"><span class="yt-uix-button-content">Sign in</span></a>
                                              </div>
                                          </div>

                                          <div id="action-panel-ratings-disabled" class="action-panel-content hid">
                                              <div id="watch-actions-ratings-disabled" class="watch-actions-panel">
                                                  <em>Ratings have been disabled for this video.</em>
                                              </div>

                                          </div>

                                          <div id="action-panel-rental-required" class="action-panel-content hid">
                                              <div id="watch-actions-rental-required" class="watch-actions-panel">
                                                  <strong>Rating is available when the video has been rented.</strong>
                                              </div>

                                          </div>

                                          <div id="action-panel-error" class="action-panel-content hid">
                                              <div class="action-panel-error">
                                                  This feature is not available right now. Please try again later.
                                              </div>
                                          </div>

                                          <div id="watch7-action-panel-footer">
                                              <hr class="yt-horizontal-rule ">

                                          </div>
                                      </div>

                                  </div>
                                  <div id="watch-discussion"> 
                                  <?php 
                                      if($_SERVER['REQUEST_METHOD'] == 'POST') {
                                        if(!isset($_SESSION['siteusername'])){ $error = "you are not logged in"; goto skipcomment; }
                                        if(!$_POST['comment']){ $error = "your comment cannot be blank"; goto skipcomment; }
                                        if(strlen($_POST['comment']) > 1000){ $error = "your comment must be shorter than 1000 characters"; goto skipcomment; }
                                        if(!isset($_POST['g-recaptcha-response'])){ $error = "captcha validation failed"; goto skipcomment; }
                                        if(!validateCaptcha($config['recaptcha_secret'], $_POST['g-recaptcha-response'])) { $error = "captcha validation failed"; goto skipcomment; }

                                        $stmt = $conn->prepare("INSERT INTO `comments` (toid, author, comment) VALUES (?, ?, ?)");
                                        $stmt->bind_param("sss", $_GET['v'], $_SESSION['siteusername'], $text);
                                        $text = htmlspecialchars($_POST['comment']);
                                        $stmt->execute();
                                        $stmt->close();
                                        skipcomment:
                                    }
                                  ?>
                                  <?php if($video['commenting'] == "a") {?>
                                  <form method="post" enctype="multipart/form-data" id="submitform">
                                      <?php if(isset($error)) { echo $error . "<br>"; } ?>
                                      <?php if(!isset($_SESSION['siteusername'])) { ?> You are not logged in. <?php } else { ?>
                                      <img style="width: 50px;" src=""><textarea style="width: 100%; resize: vertical;"cols="32" id="com" placeholder="Share your thoughts" name="comment"></textarea><br><br> 
                                      <input type="submit" value="Post" class="g-recaptcha" data-sitekey="<?php echo $config['recaptcha_sitekey']; ?>" data-callback="onLogin">
                                      <?php } ?>
                                  </form><br>
                                  <?php } else { ?>
                                    Comments are disabled for this video.<br><br>
                                  <?php } ?>

                                  <?php if($video['commenting'] == "a") { ?>
                                  <table style="width:100%">
                                    <tr>
                                      <th style="margin: 5px; width: 7.5%;"></th>
                                      <th style="width: 92.5%;"></th>
                                    </tr>
                                    <?php
                                      $stmt = $conn->prepare("SELECT * FROM comments WHERE toid = ? ORDER BY id DESC");
                                      $stmt->bind_param("s", $_GET['v']);
                                      $stmt->execute();
                                      $result = $stmt->get_result();
                                      echo $result->num_rows . " comment(s)<br><br>";
                                      while($row = $result->fetch_assoc()) { ?> 
                                    <tr style="margin-top: 5px;">
                                      <td style="vertical-align: top;"><img style="width: 40px;" src="/dynamic/pfp/<?php echo getPFPFromUser($row['author'], $conn);?>"></td>
                                      <td style="vertical-align: top;">
                                        <b>
                                        <?php if($row['author'] == $video['author']) { echo "<span style='background-color: gainsboro;'>"; }?>
                                          <a href="/user?n=<?php echo htmlspecialchars($row['author']); ?>"><?php echo htmlspecialchars($row['author']); ?></a>
                                          <?php if($row['author'] == $video['author']) { echo "</span>"; } ?> 
                                        </b> 
                                        <small style="color: gray;"><?php echo time_elapsed_string($row['date']); ?></small><br>
                                        <span style="margin-top: 10px;"><?php echo parseText($row['comment']); ?></span>
                                        <br><a href="/likecomment.php?id=<?php echo $row['id']; ?>"><img style="width: 17px;" src="/static/like.png"></a>
                                        <a href="/dislikecomment.php?id=<?php echo $row['id']; ?>"><img style="margin-left: -5px;width: 17px;" src="/static/dislike.png"></a>
                                        <small style="color: gray;"><?php echo getCommentLikes($row['id'], $conn); ?></small>
                                        <br><br>
                                      </td>
                                    </tr>
                                    <?php } ?>
                                  </table> 
                                  <?php } ?>
                                  </div>


                              </div>
                              <div id="watch7-sidebar" class="watch-sidebar ">
                                  <?php if(isset($_GET['playlist'])) { ?>
                                  <div style="overflow-y: scroll;overflow-x: hidden;border: 1px solid #e8e8e8;width:404px; height: 390px; padding-left: 15px;padding-top: 5px;background-color: whitesmoke; position: relative;left:-10px;">
                                    <?php $playlist = getPlaylistFromID($_GET['playlist'], $conn); ?>
                                    <?php $buffer = explode("|", $playlist['videos']); ?>
                                    <h1 style="font-size: 20px;"><?php echo htmlspecialchars($playlist['title']); ?></h1>
                                    <div id="watch-description-text">
                                        <p id="eow-description"><?php if(empty($playlist['description'])) { echo "<i>This playlist has no description.</i>"; } else { echo parseText($playlist['description']); } ?></p>
                                    </div>
                                    <button style="background-color: #f8f8f8; color: #333; border-color: #d3d3d3;" type="button" class=" yt-uix-button yt-uix-button-primary yt-uix-button-size-default" href="/signup" role="button">
                                        <span class="yt-uix-button-content">
                                            <b><?php echo count($buffer) - 1; ?> videos</b>
                                        </span>
                                    </button>
                                    <button style="background-color: #f8f8f8; color: #333; border-color: #d3d3d3;" type="button" class=" yt-uix-button yt-uix-button-primary yt-uix-button-size-default" href="/signup" role="button">
                                        <span class="yt-uix-button-content">
                                            <b>by <?php echo htmlspecialchars($playlist['author']); ?></b>
                                        </span>
                                    </button>
                                    <button style="background-color: #f8f8f8; color: #333; border-color: #d3d3d3;" type="button" class=" yt-uix-button yt-uix-button-primary yt-uix-button-size-default" href="/signup" role="button">
                                        <span class="yt-uix-button-content">
                                            <b>Share</b>
                                        </span>
                                    </button><br><br>
                                    <ul id="watch-related" class="video-list">
                                      <?php
                                          $stmt = $conn->prepare("SELECT * FROM `videos` ORDER BY id DESC");
                                          $stmt->execute();
                                          $result = $stmt->get_result();
                                          while($row = $result->fetch_assoc()) { 
                                              $id = 0;
                                              if(in_array($row['rid'], $buffer)) {
                                                  $id++;
                                              ?> 
                                                  <!-- VIDEO START -->
                                                  <li class="video-list-item related-list-item"><a href="/watch?v=<?php echo $row['rid']; ?>&playlist=<?php echo $playlist['rid']; ?>&order=<?php echo $id; ?>" class="related-video yt-uix-contextlink  yt-uix-sessionlink" data-sessionlink="feature=related&amp;ei=n-PiUdfCIcfckwLEyoDACw&amp;ved=CAMQzRooAA"><span class="ux-thumb-wrap contains-addto ">    <span class="video-thumb  yt-thumb yt-thumb-120">
                                                      <span class="yt-thumb-default">
                                                          <span class="yt-thumb-clip">
                                                          <span class="yt-thumb-clip-inner">
                                                              <img alt="" src="/dynamic/thumbs/<?php echo $row['thumbnail']; ?>" data-thumb="/thumbs/" data-group-key="thumb-group-0" width="120">
                                                              <span class="vertical-align"></span>
                                                          </span>
                                                          </span>
                                                      </span>
                                                      </span>
                                                      <span class="video-time"><?php echo timestamp($row['duration']); ?></span>

                                                      <button class="addto-button video-actions spf-nolink addto-watch-later-button-sign-in yt-uix-button yt-uix-button-default yt-uix-button-size-small yt-uix-tooltip" title="Watch Later" type="button" onclick=";return false;" data-button-menu-id="shared-addto-watch-later-login" data-video-ids="wrJ5YGkIp-4" role="button">    <span class="yt-uix-button-content">
                                                      <img src="/static/pixel-vfl3z5WfW.gif" alt="Watch Later">

                                                      </span>
                                                      <img class="yt-uix-button-arrow" src="/static/pixel-vfl3z5WfW.gif" alt="" title=""></button>
                                                      </span><span dir="ltr" class="title"><?php echo $row['title']; ?></span>
                                                      <span class="stat attribution">by <span class="yt-user-name " dir="ltr"><?php echo $row['author']; ?></span></span>    
                                                      <span class="stat view-count">
                                                          <?php echo getViews($row['rid'], $conn); ?> views
                                                          </span>
                                                      </a>
                                                  </li>
                                                  <!-- VIDEO END -->
                                              <?php } ?>
                                          <?php } ?>
                                      </ul>
                                  </div><br>
                                  <?php } ?>
                                  <div id="watch7-sidebar-discussion"></div>
                                  <div class="watch-sidebar-section">
                                      <div class="watch-sidebar-body">
                                          <ul id="watch-related" class="video-list">
                                          <?php
                                            $stmt = $conn->prepare("SELECT * FROM `playlists` ORDER BY rand() LIMIT 2");
                                            
                                            $stmt->execute();
                                            $result = $stmt->get_result();
                                            while($row = $result->fetch_assoc()) { ?> 
                                              <?php $buffer = explode("|", $row['videos']); ?>
                                              <!-- playlist start -->
                                              <?php @$video = getVideoFromId($buffer[1], $conn); ?>
                                              <li class="video-list-item">
                                                    <a href="/viewplaylist?id=<?php echo $row['rid']; ?>" class="related-playlist yt-pl-thumb-link  yt-uix-sessionlink" data-sessionlink="feature=list_other&amp;ei=E4RnUf7tEaSnkgLb24GADg&amp;ved=CAgQzhooAA">  <span class="yt-pl-thumb ">
                                                <span class="video-thumb  yt-thumb yt-thumb-120">
                                              <span class="yt-thumb-related-playlist">
                                                <span class="yt-thumb-clip">
                                                  <span class="yt-thumb-clip-inner">
                                                    <img src="/dynamic/thumbs/<?php echo $video['thumbnail']; ?>"  alt="Thumbnail" data-group-key="thumb-group-0" width="120">
                                                    <span class="vertical-align"></span>
                                                  </span>
                                                </span>
                                              </span>
                                            </span>


                                            <span class="sidebar sidebar-height-76">
                                                <span class="video-count-wrapper" style="padding-top: 5px;">
                                                  <span class="video-count-block">
                                                    <span class="count-label">
                                                      <?php echo count($buffer) - 1; ?>
                                                    </span>
                                                    <span class="text-label">
                                                      videos
                                                    </span>
                                                  </span>
                                                </span>
                                              <span class="side-thumbs">
                                                  <span class="sidethumb ">

                                                  </span>
                                                  <span class="sidethumb ">

                                                  </span>
                                              </span>
                                            </span>
                                          </span>
                                        <span dir="ltr" class="title" title="YouTube Mix"><?php echo htmlspecialchars($row['title']); ?></span></a>
                                                  </li>
                                            <!-- playlist end-->
                                            <?php } ?>
                                              <?php
                                              $stmt = $conn->prepare("SELECT * FROM videos WHERE visibility = 'v' ORDER BY rand() LIMIT 10");
                                              $stmt->execute();
                                              $result = $stmt->get_result();
                                              while($row = $result->fetch_assoc()) { ?> 
                                              <!-- VIDEO START -->
                                              <li class="video-list-item related-list-item"><a href="/watch?v=<?php echo $row['rid']; ?>" class="related-video yt-uix-contextlink  yt-uix-sessionlink" data-sessionlink="feature=related&amp;ei=n-PiUdfCIcfckwLEyoDACw&amp;ved=CAMQzRooAA"><span class="ux-thumb-wrap contains-addto ">    <span class="video-thumb  yt-thumb yt-thumb-120">
                                                    <span class="yt-thumb-default">
                                                      <span class="yt-thumb-clip">
                                                        <span class="yt-thumb-clip-inner">
                                                          <img alt="" src="/dynamic/thumbs/<?php echo $row['thumbnail']; ?>" data-thumb="/thumbs/" data-group-key="thumb-group-0" width="120">
                                                          <span class="vertical-align"></span>
                                                        </span>
                                                      </span>
                                                    </span>
                                                  </span>
                                                  <span class="video-time"><?php echo timestamp($row['duration']); ?></span>

                                                    <button class="addto-button video-actions spf-nolink addto-watch-later-button-sign-in yt-uix-button yt-uix-button-default yt-uix-button-size-small yt-uix-tooltip" title="Watch Later" type="button" onclick=";return false;" data-button-menu-id="shared-addto-watch-later-login" data-video-ids="wrJ5YGkIp-4" role="button">    <span class="yt-uix-button-content">
                                                    <img src="/static/pixel-vfl3z5WfW.gif" alt="Watch Later">

                                                  </span>
                                                  <img class="yt-uix-button-arrow" src="/static/pixel-vfl3z5WfW.gif" alt="" title=""></button>
                                                  </span><span dir="ltr" class="title"><?php echo $row['title']; ?></span><span class="stat attribution">by <span class="yt-user-name " dir="ltr"><?php echo $row['author']; ?></span></span>    <span class="stat view-count">
                                                      <?php echo getViews($row['rid'], $conn); ?> views
                                                      </span>
                                                  </a>
                                              </li>
                                              <!-- VIDEO END -->
                                              <?php } ?>
                                          </ul>
                                      </div>
                              </div>
                            </div>
                        </div>
                    </div>

                    <div style="visibility: hidden; height: 0px; padding: 0px; overflow: hidden;">
                    </div>

                </div>
            </div></div>
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
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
