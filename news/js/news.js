$(function() {

  let page = 1;

  $.ajax({
    type: "GET",
    url: "news_list_get.php",
    data: { "page" : page },
    dataType : "json",
  }).done(function(data){
    if (data) {
      console.log(data)
      $('.news').html(data);
    } else {
      console.log(data)
    }
  }).fail(function(XMLHttpRequest, status, e){
    alert("ニュースの取得に失敗しました");
    console.log(e)
  });

});



function clickNews(id) {

  $.ajax({
    type: "GET",
    url: "news_detail_get.php",
    data: {
      "id": id
    },
    dataType: "json",
  }).done(function (data) {
    if (data) {
      console.log(data)
      $('.news').html(data);
      $('.news').addClass("news_detail");
      $('.btn1').removeClass("none");
    } else {
      console.log(data)
    }
  }).fail(function (XMLHttpRequest, status, e) {
    alert("ニュースの取得に失敗しました");
    console.log(e)
  });
}

function clickBackBtn(id) {


  let page = 1;

  $.ajax({
    type: "GET",
    url: "news_list_get.php",
    data: { "page" : page },
    dataType : "json",
  }).done(function(data){
    if (data) {
      console.log(data)
      $('.news').html(data);
      $('.news').removeClass("news_detail");
      $('.btn1').addClass("none");
    } else {
      console.log(data)
    }
  }).fail(function(XMLHttpRequest, status, e){
    alert("ニュースの取得に失敗しました");
    console.log(e)
  });



}

