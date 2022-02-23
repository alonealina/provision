
function sendBtnClick() {
  let name = $('input[name="name"]').val();
  let company = $('input[name="company"]').val();
  let mail = $('input[name="mail"]').val();
  let content = document.getElementById('mail_content').value;

  if (name.length === 0 || mail.length === 0 || content.length === 0) {
    alert("Please enter your name, email address, and inquiry details.");
    return;
  }
  $('.contact_div').html('Sending...');
  $.ajax({
    type: "POST",
    url: "mail_send.php",
    data: { "name" : name, "company" : company, "mail" : mail, "content" : content },
    dataType : "json"
  }).done(function(data){
    if (data) {
      $('.contact_div').html('The transmission is complete.<br>It takes 3 business days to respond.<br>I hope you can wait a little longer.');
    } else {

    }
  }).fail(function(XMLHttpRequest, status, e){
    alert("Failed to send email");
  });
};
