<div class="compact-shelf shelf-item yt-uix-shelfslider c4-box yt-uix-shelfslider-at-head">
    
    <h2 class="branded-page-module-title">
        <a class="yt-uix-sessionlink " href="#" title="Recent uploads" data-sessionlink="ei=_EvbUdbcOqWsyAGp-oGgAQ&amp;ved=CFkQzh4">
          Recent uploads
        </a>

        <a href="#" class="yt-uix-button  shelves-play yt-uix-sessionlink yt-uix-button-default yt-uix-button-short" data-sessionlink="ei=_EvbUdbcOqWsyAGp-oGgAQ"><img class="yt-uix-button-icon yt-uix-button-icon-play-all" src="/static/pixel-vfl3z5WfW.gif" alt="" title=""><span class="yt-uix-button-content">Play</span></a>
    </h2>


      <div class="yt-uix-shelfslider-body context-data-container" data-context-subsource="Recent uploads" style="overflow-x: scroll;">
    <ul class="yt-uix-shelfslider-list" style="left: 0.233337px;">
        <?php
        $stmt = $conn->prepare("SELECT * FROM videos WHERE author = ? AND visibility = 'v' ORDER BY id DESC LIMIT 12");
        $stmt->bind_param("s", $_GET['n']);
        $stmt->execute();
        $result = $stmt->get_result();
        while($row = $result->fetch_assoc()) { ?> 
        <!-- VIDEO SLIDESHOW START -->
        <li class="channels-content-item yt-uix-shelfslider-item ">
          <span class="context-data-item" data-context-item-title="" data-context-item-id="MICPcOKJtBA" data-context-item-time="3:27" data-context-item-type="video" data-context-item-user="CNN" data-context-item-views="17 views">
            <div class="channel-video-thumb-container">
              <a href="/watch?v=<?php echo $row['rid']; ?>" class="ux-thumb-wrap yt-uix-sessionlink yt-uix-contextlink contains-addto spf-link" data-sessionlink="feature=c4-overview-u&amp;ei=_EvbUdbcOqWsyAGp-oGgAQ&amp;ved=CFoQ-SUoAA">    <span class="video-thumb  yt-thumb yt-thumb-185">
              <span class="yt-thumb-default">
                <span class="yt-thumb-clip">
                  <span class="yt-thumb-clip-inner">
                    <img src="/dynamic/thumbs/<?php echo $row['thumbnail']; ?>" alt="Thumbnail" data-group-key="thumb-group-0" width="185">
                    <span class="vertical-align"></span>
                  </span>
                </span>
              </span>
            </span>
        <span class="video-time"><?php echo timestamp($row['duration']); ?></span>

          <button class="addto-button video-actions spf-nolink addto-watch-later-button-sign-in yt-uix-button yt-uix-button-default yt-uix-button-short yt-uix-tooltip" type="button" title="Watch Later" onclick=";return false;" data-video-ids="MICPcOKJtBA" data-button-menu-id="shared-addto-watch-later-login" role="button">    <span class="yt-uix-button-content">
          <img src="/static/pixel-vfl3z5WfW.gif" alt="Watch Later">
        
            </span>
        <img class="yt-uix-button-arrow" src="/static/pixel-vfl3z5WfW.gif" alt="" title=""></button>
        </a>
            </div>
            <span class="content-item-detail">
              <a href="/watch?v=<?php echo htmlspecialchars($row['rid']); ?>" title="" class="content-item-title spf-link yt-uix-sessionlink yt-uix-contextlink yt-ui-ellipsis yt-ui-ellipsis-2" dir="ltr" data-sessionlink="feature=c4-overview-u&amp;ei=_EvbUdbcOqWsyAGp-oGgAQ&amp;ved=CFoQ-SUoAA"><span class="yt-ui-ellipsis-wrapper" data-original-html="
              "><?php echo htmlspecialchars($row['title']); ?>
              </span></a>
              <span class="content-item-metadata">
                  <span class="content-item-view-count">
                    <?php echo getViews($row['rid'], $conn); ?> views
                  </span>
                    <span class="metadata-separator">|</span>
                      <span class="content-item-time-created"><?php echo time_elapsed_string($row['publish']); ?></span>
              </span>
            </span>
          </span>
        </li>
        <!-- VIDEO SLIDESHOW END -->
        <?php } ?>
    </ul>
  </div>

  </div>