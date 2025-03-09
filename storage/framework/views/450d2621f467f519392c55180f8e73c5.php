<div class="messenger-sendCard">
    <form id="message-form" method="POST" action="<?php echo e(route('send.message')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <label><span class="fas fa-plus-circle"></span><input disabled='disabled' type="file" class="upload-attachment" name="file" accept=".<?php echo e(implode(', .',config('chatify.attachments.allowed_images'))); ?>, .<?php echo e(implode(', .',config('chatify.attachments.allowed_files'))); ?>" /></label>
        <button class="emoji-button"><span class="fas fa-smile"></span></button>
        <textarea readonly='readonly' name="message" class="m-send app-scroll" placeholder="Type a message.."></textarea>
        <button disabled='disabled' class="send-button"><span class="fas fa-paper-plane"></span></button>

        <button type="button" id="location" class="location-btn">
            <i class="fas fa-map-marker-alt"></i>
        </button>
    </form>
</div>
<script>
    // button send localisation" ##############################################
document.getElementById('location').addEventListener('click', function() {
  
  if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
          const latitude = position.coords.latitude;
          const longitude = position.coords.longitude;
          
          sendLocation(latitude, longitude);
      }, function(error) {
          console.log("waaaaaaaaaaaaaaaaaaaaaa:", error);
      });
  } else {
      alert("Geolocation is not supported on your browser.");
  }
});

function sendLocation(latitude, longitude) {
  const locationMessage = `<a target="_blank" rel="noopener noreferrer" href="https://www.google.com/maps?q=${latitude},${longitude}">Location</a>`;
  let formData = new FormData();
  formData.append("id", getMessengerId());
  formData.append("temporaryMsgId", `temp_${Date.now()}`);
  formData.append("_token", csrfToken);
  formData.append("message", locationMessage);

  $.ajax({
      url: $("#message-form").attr("action"),
      method: "POST",
      data: formData,
      dataType: "JSON",
      processData: false,
      contentType: false,
      beforeSend: () => {
          console.log("Sending location message...");
          $(".messages").find(".message-hint").hide();
          messagesContainer.find(".messages").append(
              sendTempMessageCard(locationMessage, `temp_${Date.now()}`)
          );
          scrollToBottom(messagesContainer);
      },
      success: (data) => {
          if (data.error > 0) {
              console.error(data.error_msg);
          } else {
              updateContactItem(getMessengerId());
              let tempMsgCardElement = messagesContainer.find(
                  `.message-card[data-id=${data.tempID}]`
              );
              tempMsgCardElement.before(data.message);
              tempMsgCardElement.remove();
              scrollToBottom(messagesContainer);
              sendContactItemUpdates(true);
          }
      },
      error: () => {
          console.error("Failed to send location message.");
      },
  });
}
</script>




<?php /**PATH C:\Users\safiy\Desktop\vb\Plateforme-Vibe-main\resources\views/vendor/Chatify/layouts/sendForm.blade.php ENDPATH**/ ?>