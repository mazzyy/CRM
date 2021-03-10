<?php

include("inc/db.php");
session_start();
                        
        $public_chat = "SELECT tbl_users.u_name, message, datetime FROM `public_chat` INNER JOIN tbl_users ON public_chat.u_id = tbl_users.u_id ORDER BY datetime DESC ";
            $result_chat = mysqli_query($conn, $public_chat);

              if(mysqli_num_rows($result_chat) > 0){

              while($row = mysqli_fetch_array($result_chat)) {
                $username = $row['u_name'];
                $msg = $row['message'];
                $date = $row['datetime'];
                        
                        ?>
                     
                       
                     <!-- Message. Default to the left -->
                    <div class="direct-chat-msg">
                        <div class="direct-chat-infos clearfix">
                          <span class="direct-chat-name float-left"><?php echo ucfirst($username); ?></span>
                          <span class="direct-chat-timestamp float-right">
                              <?php echo  date('d-M-Y h:i a',strtotime($date)); ?>
                          
                                <!-- 23 Jan 2:00 pm-->
                          </span>
                        </div>
                        <!-- /.direct-chat-infos -->
                        <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                          <?php echo $msg; ?>
                        </div>
                        <!-- /.direct-chat-text -->
                      </div>
                      <!-- /.direct-chat-msg -->
                      
                      <?php
                        
                  }
              }
                
                        
                        ?>