$(document).ready(function(){


  $(".submenu > a").click(function(e) {
    e.preventDefault();
    var $li = $(this).parent("li");
    var $ul = $(this).next("ul");

    if($li.hasClass("open")) {
      $ul.slideUp(350);
      $li.removeClass("open");
    } else {
      $(".nav > li > ul").slideUp(350);
      $(".nav > li").removeClass("open");
      $ul.slideDown(350);
      $li.addClass("open");
    }
  });

  function readURL(input, img) {

      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $(img).attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
      }
  }

  $(".uploadPreview").change(function(){
      readURL(this, '#' + $(this).attr('data-imgpreview'));
  });
  
});