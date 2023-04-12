<div id="yt-masthead-container" class="yt-grid-box yt-base-gutter"><div id="yt-masthead" class="">
        <div id="yt-masthead-signin">
            <!--
            <button type="button" onclick="hideMenu();" class=" yt-uix-button yt-uix-button-primary yt-uix-button-size-default" style="position: absolute; left: 200px; background-color: transparent; border: 0px solid black;" href="/signup" role="button">
                <span class="yt-uix-button-content">
                    <a style=" color: #333; text-decoration: none;" href="#"><img style="height: 17px;" src="/static/menu.png"></a>
                </span>
                <script>
                    function hideMenu() {
                        var toggled = true;
                        var menu = document.getElementById("guide-container");
                        
                        if (menu.style.display === "none") {
                            menu.style.display = "block";
                        } else {
                            menu.style.display = "none";
                        }
                    }
                </script>
            </button>
            -->
        </div>
        <a id="logo-container" href="/" title="FulpTube home" class=" ">
            <img id="logo" style="margin-left: 50px;background-image: none;" src="/static/vidshr.png" alt="">
        </a>
        <?php if(!isset($_SESSION['siteusername'])) { ?>
            <div id="yt-masthead-signin">
                <button type="button" class=" yt-uix-button yt-uix-button-primary yt-uix-button-size-default" href="/signup" role="button">
                    <span class="yt-uix-button-content">
                        <a style="color: white; text-decoration: none;" href="/newlogin">Sign In</a>
                    </span>
                </button>
            </div>
        <?php } else { ?>
            <div id="yt-masthead-signin">
                <div class="dropdown">
                    <button style="background-color: #f8f8f8; color: #333; border-color: #d3d3d3;" type="button" class=" yt-uix-button yt-uix-button-primary yt-uix-button-size-default" href="/signup" role="button">
                        <span class="yt-uix-button-content">
                        <a style="color: #333; text-decoration: none;" href="/user?n=<?php echo htmlspecialchars($_SESSION['siteusername']); ?>">
                            <span style="position: relative; top: 2px;">
                                <?php echo htmlspecialchars($_SESSION['siteusername']); ?>
                            </span>
                            <img style="width: 24px; height: 24px; vertical-align: middle;position: relative; left:9px;" src="/dynamic/pfp/<?php echo getPFPFromUser($_SESSION['siteusername'], $conn); ?>">
                            </a>
                        </span>
                    </button>
                    <div class="dropdown-content">
                        <ul style="columns: 2;">
                            <li>
                                <a style="color: #333; text-decoration: none;" href="/logout">Sign Out</a>
                            </li>
                            <li>
                                <a style="color: #333; text-decoration: none;" href="/newmanage">Manage</a>
                            </li>
                            <li>
                                <a style="color: #333; text-decoration: none;" href="/managevideos">Dashboard</a>
                            </li>
                            <li>
                                <a style="color: #333; text-decoration: none;" href="/playlists">Playlists</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div id="yt-masthead-content"><span id="masthead-upload-button-group">
                            <a href="/newupload" class="yt-uix-button   yt-uix-sessionlink yt-uix-button-default yt-uix-button-size-default" data-sessionlink="feature=mhsb&amp;ei=9TzjUbGrIYmZyQHHtICoDg">
                                <span class="yt-uix-button-content">
                                    Upload
                                </span>
                            </a>
                        </span>
            <form id="masthead-search" class="search-form consolidated-form" action="/search" method="get">
                <button dir="ltr" tabindex="2" id="search-btn" type="submit" class="search-btn-component search-button yt-uix-button yt-uix-button-default yt-uix-button-size-default" role="button">
                    <span class="yt-uix-button-content">
                        Search
                    </span>
                </button>
                <div id="masthead-search-terms" class="masthead-search-terms-border " dir="ltr">
                    <label>
                        <input id="masthead-search-term" class="search-term yt-uix-form-input-bidi" name="search_query" value="" type="text" tabindex="1" title="Search" dir="ltr" autocomplete="off" spellcheck="false" style="outline: currentcolor none medium;">
                    </label>
                </div>
                <input type="hidden" name="oq"><input type="hidden" name="gs_l">
            </form>
        </div>
    </div>
</div>