<div class="compact-shelf shelf-item yt-uix-shelfslider c4-box yt-uix-shelfslider-at-head">
    
    <h2 class="branded-page-module-title">
        <a class="yt-uix-sessionlink " href="#" title="Recent uploads" data-sessionlink="ei=_EvbUdbcOqWsyAGp-oGgAQ&amp;ved=CFkQzh4">
          Playlists
        </a>

        <a href="#" class="yt-uix-button  shelves-play yt-uix-sessionlink yt-uix-button-default yt-uix-button-short" data-sessionlink="ei=_EvbUdbcOqWsyAGp-oGgAQ"><img class="yt-uix-button-icon yt-uix-button-icon-play-all" src="/static/pixel-vfl3z5WfW.gif" alt="" title=""><span class="yt-uix-button-content">Play</span></a>
    </h2>


      <div class="yt-uix-shelfslider-body context-data-container" data-context-subsource="Recent uploads" style="overflow-x: scroll;">
    <ul class="yt-uix-shelfslider-list" style="left: 0.233337px;">
        <?php
        $stmt = $conn->prepare("SELECT * FROM playlists WHERE author = ? ORDER BY id DESC LIMIT 12");
        $stmt->bind_param("s", $_GET['n']);
        $stmt->execute();
        $result = $stmt->get_result();
        while($row = $result->fetch_assoc()) { ?> 
                <?php $buffer = explode("|", $row['videos']); ?>
                <?php @$video = getVideoFromId($buffer[1], $conn); ?>
        <!-- VIDEO SLIDESHOW START -->
        <li class="channels-content-item yt-uix-shelfslider-item ">
    <div class="yt-lockup2 clearfix  yt-lockup2-playlist yt-lockup2-grid context-data-item" data-context-item-title="Favorite videos" data-context-item-id="FLupvZG-5ko_eiXAupbDfxWw" data-context-item-videos="[&quot;CR67XIUBvMg&quot;, &quot;zgM9pO-LSIo&quot;, &quot;NvfIiOK-4LQ&quot;, &quot;Fk73QCMS6qQ&quot;, &quot;ru7fDD9rb6o&quot;]" data-context-item-count-label="videos" data-context-item-type="playlist" data-context-item-user="CNN" data-context-item-count="298">
    <div class="yt-lockup2-thumbnail">
            <a href="/viewplaylist?id=<?php echo $row['rid']; ?>" class="yt-pl-thumb-link yt-uix-contextlink yt-uix-sessionlink " data-sessionlink="feature=c4-overview&amp;ei=_EvbUdbcOqWsyAGp-oGgAQ">
      <span class="yt-pl-thumb ">
                <span class="video-thumb  yt-thumb yt-thumb-185">
      <span class="yt-thumb-default">
        <span class="yt-thumb-clip">
          <span class="yt-thumb-clip-inner">
            <img src="/dynamic/thumbs/<?php echo $video['thumbnail']; ?>" alt="Thumbnail" data-group-key="thumb-group-2" width="185">
            <span class="vertical-align"></span>
          </span>
        </span>
      </span>
    </span>
    <span class="sidebar">
      <span class="video-count-wrapper yt-valign">
        <span class="yt-valign-trick"></span>
        <span class="video-count-block yt-valign-container">
          <span class="count-label">
            <?php echo count($buffer) - 1; ?>
          </span>
          <span class="text-label">
            videos
          </span>
        </span>
      </span>
    </span>
      <span class="yt-pl-thumb-overlay">
        <span class="yt-pl-thumb-overlay-content">
          <img src="//web.archive.org/web/20130708233211im_/http://s.ytimg.com/yts/img/pixel-vfl3z5WfW.gif" alt="">
Play all
        </span>
      </span>
  </span>
  </a>
    </div>
    <div class="yt-lockup2-content">
        <h3 class="yt-lockup2-title"><a class="yt-uix-sessionlink yt-uix-tile-link yt-uix-contextlink yt-ui-ellipsis yt-ui-ellipsis-2" dir="ltr" title="Favorite videos" data-sessionlink="ei=_EvbUdbcOqWsyAGp-oGgAQ" href="/web/20130708233211/http://www.youtube.com/playlist?list=FLupvZG-5ko_eiXAupbDfxWw" data-translation-src=""><span class="yt-ui-ellipsis-wrapper" data-original-html="Favorite videos">
        <?php echo htmlspecialchars($row['title']); ?></span></a></h3>
  <div class="yt-lockup2-meta">
    <ul class="yt-lockup2-meta-info">

    </ul>
    <ul class="yt-lockup2-meta-info">
      <li>
      <?php echo count($buffer) - 1; ?> videos
      </li>
    </ul>
  </div>
    </div>
  </div>
        </li>
        <!-- VIDEO SLIDESHOW END -->
        <?php } ?>
    </ul>
  </div>

  </div>