<?php
            $stmt = $conn->prepare("SELECT * FROM videos WHERE author = ? AND visibility = 'v' ORDER BY id DESC");
            $stmt->bind_param("s", $_GET['n']);
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()) { ?> 
          <!-- VIDEO START -->
                <li class="feed-list-item feed-item-container" data-channel-key="UCPxRNGp9nGNjFynhXhiduUg">
    <div class="feed-item-dismissable  ">
              <div class="feed-author-bubble-container">
<a href="/user?n=<?php echo htmlspecialchars($_GET['n']); ?>" class="feed-author-bubble yt-uix-sessionlink   " data-sessionlink="feature=c4-feed-u&amp;ei=cgjlUbLtAoPYywGgjYHIDA&amp;ved=CCAQpR4">  <span class="feed-item-author ">
          <span class="video-thumb  yt-thumb yt-thumb-28">
      <span class="yt-thumb-square">
        <span class="yt-thumb-clip">
          <span class="yt-thumb-clip-inner">
            <img src="/dynamic/pfp/<?php echo getPFPFromUser($row['author'], $conn);  ?>" data-thumb="http://web.archive.org/web/20130716084641/https://lh5.googleusercontent.com/-fX4FqdPggZ8/AAAAAAAAAAI/AAAAAAAAAAA/cCmmCjFcZSE/s28-c-k/photo.jpg" alt="Paul Bartels" data-group-key="thumb-group-0" width="28">
            <span class="vertical-align"></span>
          </span>
        </span>
      </span>
    </span>

  </span>
</a>  </div>


        <div class="feed-item-main">
          <div class="feed-item-header ">
              
  <span class="feed-item-actions-line">
      <span class="feed-item-owner"><a title="Paul Bartels" class="yt-uix-sessionlink spf-nolink" href="/user?n=<?php echo htmlspecialchars($row['author']); ?>" data-sessionlink="feature=c4-feed-u&amp;ei=cgjlUbLtAoPYywGgjYHIDA&amp;ved=CCAQpR4" dir="ltr"><?php echo htmlspecialchars($row['author']); ?></a></span> uploaded a video


  </span>
                <span class="feed-item-time">
      <?php echo time_elapsed_string($row['publish']); ?>
    </span>
          </div>
          <div class="feed-item-main-content">
    <div class="feed-item-content-wrapper clearfix context-data-item" data-context-item-type="video" data-context-item-views="9,409,409 views" data-context-item-title="Asiana Pilots names from KTVU News" data-context-item-id="L1JYHNX8pdo" data-context-item-time="0:37" data-context-item-user="Paul Bartels" data-context-item-actionuser="Paul Bartels">
    <div class="feed-item-thumb">
          <a class="ux-thumb-wrap  yt-uix-contextlink yt-uix-sessionlink  contains-addto" data-sessionlink="feature=c4-feed-u&amp;ei=cgjlUbLtAoPYywGgjYHIDA&amp;ved=CCIQph4oAA" href="/watch?v=<?php echo htmlspecialchars($row['rid']); ?>" tabindex="-1">
          <span class="video-thumb  yt-thumb yt-thumb-185">
      <span class="yt-thumb-default">
        <span class="yt-thumb-clip">
          <span class="yt-thumb-clip-inner">
            <img tabindex="-1" src="/dynamic/thumbs/<?php echo htmlspecialchars($row['thumbnail']); ?>" data-thumb="//wg" alt="" data-group-key="thumb-group-0" width="185">
            <span class="vertical-align"></span>
          </span>
        </span>
      </span>
    </span>
    <span class="video-time"><?php echo timestamp($row['duration']); ?></span>
  <button class="addto-button video-actions spf-nolink addto-watch-later-button-sign-in yt-uix-button yt-uix-button-default yt-uix-button-size-small yt-uix-tooltip" title="Watch Later" onclick=";return false;" type="button" data-button-menu-id="shared-addto-watch-later-login" data-video-ids="L1JYHNX8pdo" role="button">    <span class="yt-uix-button-content">
  <img src="/static/pixel-vfl3z5WfW.gif" alt="Watch Later">
    </span>
<img class="yt-uix-button-arrow" src="/static/pixel-vfl3z5WfW.gif" alt="" title=""></button>
  </a>
    </div>
    <div class="feed-item-content">
      
      <h4 class="feed-item-lockup-title">
        <a class="feed-video-title title yt-uix-contextlink yt-uix-sessionlink yt-ui-ellipsis yt-ui-ellipsis-2" title="Asiana Pilots names from KTVU News" href="/watch?v=<?php echo htmlspecialchars($row['rid']); ?>" data-sessionlink="feature=c4-feed-u&amp;ei=cgjlUbLtAoPYywGgjYHIDA&amp;ved=CCIQph4oAA"><span class="yt-ui-ellipsis-wrapper" data-original-html="Asiana Pilots names from KTVU News
        "><?php echo htmlspecialchars($row['title']); ?>
        </span></a>
      </h4>
          <div class="metadata spf-nolink">
        <span class="view-count">
        <?php echo getViews($row['rid'], $conn); ?> views
  </span>
      <div class="description lines-3">
        <p><?php if(empty($video['description'])) { echo "<i>This video has no description.</i>"; } else { parseText($video['description']); } ?></p>
      </div>
  </div><br><br>

  
    </div>
  </div>
          </div>
        </div>
      </div>
  </li>
    <!-- VIDEO END -->
<?php } ?>
<!-- Must be wrapped in <ul id="channel-feed" class="feed-list context-data-container"> -->