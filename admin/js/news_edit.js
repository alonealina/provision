$(function() {

  var url = new URL(window.location.href);
  var params = url.searchParams;
  let id = params.get('id');
  $('#news_form').append('<input type="hidden" name="id" value="' + id + '">');

  $.ajax({
    type: "GET",
    url: "news_detail_get.php",
    data: { "id" : id },
    dataType : "json",
  }).done(function(data){
    if (data) {
      console.log(data)
      $('#news_title').after(data.title);
      $('#news_content').after(data.content);
      $('.news_select').html(data.release);
    } else {
      console.log(data)
    }
  }).fail(function(XMLHttpRequest, status, e){
    alert("ニュースの取得に失敗しました");
    console.log(e)
  });

});



function addBtnClick() {
  let name = $('input[name="name"]').val();
  let company = $('input[name="company"]').val();
  let mail = $('input[name="mail"]').val();
  let content = document.getElementById('mail_content').value;
  console.log(name);
  console.log(company);
  console.log(mail);
  console.log(content);
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
