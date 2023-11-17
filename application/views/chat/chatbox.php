<div class="col-xl-4">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title mb-4">
        <?php
     
        // Check if the $chat_messages array is not empty and if the 'name' field exists in the first message
        if (!empty($sendmessage) && isset($sendmessage[0]->name)) {
            
             echo $sendmessage[0]->name; // Display the user's name from the first message
        } else {
            echo 'Unknown User'; // Fallback if the name is not available
        }
        ?>
        
        </h4>
            <hr>
            <div  class="chat-conversation">
            <!-- <div class="chat-conversation"> -->
                <ul id="chatbox-container" class="conversation-list" data-simplebar style="max-height: 300px; overflow-y: auto;">
                    <?php foreach ($sendmessage as $message) { ?>
                        <?php if ($message->sender_id == 1) { ?>
                            <!-- Your Message (aligned to the right) -->
                            <li class="clearfix odd">
                                <div class="chat-avatar">
                                    <!-- Display sender's avatar here -->
                                    <img src="<?= base_url('/uploads/profile/user_profile.png') ?>" class="avatar-xs rounded-circle" alt="male">
                                    <span class="time"><?= date("h:i", strtotime($message->added_date)) ?></span>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <span class="user-name mb-2">You</span>
                                        <div class="msger-sender-msg msger-msg-right"><?= $message->message ?></div>
                                    </div>
                                </div>
                            </li>
                        <?php } else { ?>
                            <!-- Other User's Message (aligned to the left) -->
                            <li class="clearfix">
                                <div class="chat-avatar">
                                    <!-- Display other user's avatar here -->
                                    <img src="<?= base_url('/uploads/profile/user_profile.png') ?>" class="avatar-xs rounded-circle" alt="male">
                                    <!-- <span class="time">10:08</span> -->
                                    <span class="time"><?= date("h:i", strtotime($message->added_date)) ?></span>   
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <span class="user-name mb-2"><?= $message->name ?></span>
                                        <div class="msger-receiver-msg msger-msg-left"><?= $message->message ?></div>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </div>
            <form id="chatbox" class="msger-inputarea" method="POST" action="<?php echo base_url('backend/chat/sendmessage/' . $room_id .'/'. $message->receiver_id); ?>">
            <input type="text" name="message" class="msger-input" placeholder="Enter your message...">
                        <button type="submit" class="msger-send-btn">Send</button>
            </form>
        </div>
    </div>
</div>

<script>
const messages = document.getElementById('chatbox-container');

function appendMessage() {
	const message = document.getElementsByClassName('conversation-list')[0];
  const newMessage = message.cloneNode(true);
  messages.appendChild(newMessage);
}

function getMessages() {
	// Prior to getting your messages.
  shouldScroll = messages.scrollTop + messages.clientHeight === messages.scrollHeight;
  /*
   * Get your messages, we'll just simulate it by appending a new one syncronously.
   */
  appendMessage();
  // After getting your messages.
  if (!shouldScroll) {
    scrollToBottom();
  }
}

function scrollToBottom() {
  messages.scrollTop = messages.scrollHeight;
}

scrollToBottom();

</script> 