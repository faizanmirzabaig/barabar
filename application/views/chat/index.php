<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">

                <table id="datatable-excel" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sr. No.</th> 
                            <!-- <th>Chat Id</th> -->
                            <th>User Name</th>
                            <!-- <th>Reciever Id</th> -->
                            <!-- <th>Message</th> --> 
                            <th>Communicate</th>
                            <!-- <th>Communicate</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=0;
                            foreach ($chat as $key => $site) {
                                $i++;
                                ?>
                            <tr>
                            <td><?= $i ?></td>
                            <!-- <td><?= $site->room_id ?></td> -->
                            <td><?= $site->name ?></td>
                            <!-- <td><?= $site->receiver_id ?></td> -->
                            <!-- <td><?= $site->message ?></td> -->
                            <td>
                                <a href="<?= base_url('backend/chat/chatbox/'. $site->room_id) ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Chat">
                                    <span class="fa fa-comment"></span>
                                    <span class="badge badge-danger" id="messageLink" data-count="0"><?= $site->msg_count ?></span>
                                </a>
                            </td>   
                        </tr>
                            <?php }
                        ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>




<!-- <div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">

                        <table id="datatable" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        
                        <h2>Chat with Users</h2>
                        
                            <div id="chatHistory">
                            <?php if (!empty($chat_history)) { ?>
                                <ul>
                                <?php foreach ($chat_history as $chat) { ?>
                                    <li><?php echo $chat->message; ?></li>
                                <?php } ?>
                                </ul>
                            <?php } else { ?>
                                <p>No chat history available.</p>
                            <?php } ?>
                            </div>
                            <div class="chat-input">
                            <input type="text" id="message" class="form-control" placeholder="Type your message...">
                            <button type="button" class="btn btn-primary" id="sendBtn">Send</button>
                            </div>
                            </table>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>


<script>
  $(document).ready(function() {
    // Function to send a message to the user
    function sendMessage() {
      var message = $('#message').val();
      if (message.trim() !== '') {
        $.ajax({
          url: '<?php echo base_url("Chat/send_message"); ?>',
          method: 'POST',
          dataType: 'json',
          data: {
            message: message
          },
          success: function(data) {
            // After sending the message, you can handle the response as required.
            // For example, you can reload the chat history or display a success message.
            location.reload(); // Reload the page to update the chat history
          },
          error: function(xhr, status, error) {
            console.error("Error sending message: " + error);
          }
        });
      }
    }

    // Send message when the send button is clicked
    $('#sendBtn').on('click', function() {
      sendMessage();
    });

    // Send message when the Enter key is pressed in the message input field
    $('#message').on('keypress', function(event) {
      if (event.which === 13) {
        sendMessage();
      }
    });
  });
  $(document).ready(function() {
        // Scroll to the bottom of the chatbox when the page loads
        var chatboxContainer = document.getElementById('chatbox-container');
        chatboxContainer.scrollTop = chatboxContainer.scrollHeight;
    });

</script> 
