<?php 
                                        if(isset($_SESSION['siteusername'])) {
                                          $stmt = $conn->prepare("SELECT * FROM subscribers WHERE sender = ?");
                                          $stmt->bind_param("s", $_SESSION['siteusername']);
                                          $stmt->execute();
                                          $result = $stmt->get_result();
                                          while($row = $result->fetch_assoc()) {
                                        ?>
                                        <li class="guide-channel">
                                            <a class="guide-item yt-uix-sessionlink yt-valign  " href="/user?n=<?php echo $row['reciever']; ?>" title="Music" data-channel-id="HCp-Rdqh3z4Uc" data-sessionlink="feature=g-channel&amp;ei=9TzjUbGrIYmZyQHHtICoDg&amp;ved=CEoQgB8oAQ">
                                                      <span class="yt-valign-container yt-valign ">
                                                          <span class="thumb">    <span class="video-thumb  yt-thumb yt-thumb-18">
                                                      <span class="yt-thumb-square">
                                                        <span class="yt-thumb-clip">
                                                          <span class="yt-thumb-clip-inner">
                                                            <img alt="Thumbnail" data-thumb-manual="1" src="/dynamic/pfp/<?php echo getPFPFromUser($row['reciever'], $conn); ?>" data-thumb="//web.archive.org/web/20130715000613/http://i1.ytimg.com/li/p-Rdqh3z4Uc/default.jpg" width="18">
                                                            <span class="vertical-align"></span>
                                                          </span>
                                                        </span>
                                                      </span>
                                                    </span>
                                                </span>
                                                        <span class="yt-valign-container display-name">
                                                          <span><?php echo $row['reciever']; ?></span>
                                                        </span>
                                                      </span>
                                            </a>
                                        </li>
                                        <?php }
                                        } ?>