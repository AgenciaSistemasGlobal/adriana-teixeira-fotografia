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

  function readEditURL(input, img) {

      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $(img).attr('src', e.target.result);
              $(img).html('')
          }

          reader.readAsDataURL(input.files[0]);
      }
  }

   function readURL(input, img) {

    for (var i = 0; i < input.files.length; i++) {
      
      if (input.files[i]) {

        var reader = new FileReader();

        reader.onload = function (e) {
      
          $(img).append('<div class="col-lg-3 col-md-3"><img src="' + e.target.result + '" class="img-responsive thumbnail"></div>');
        }

        reader.readAsDataURL(input.files[i]);
      }
    }
  }

  $(".uploadPreview").change(function(){
      readURL(this, '#' + $(this).attr('data-imgpreview'));
  });

  $(".uploadPreviewEdit").change(function(){
      readEditURL(this, '#' + $(this).attr('data-imgpreview'));
  });  

  $('.apartir-de input[type="radio"]').click(function () {
    $('input:not(:checked)').parent().removeClass("checked");
    $('input:checked').parent().addClass("checked");

    $('#imgPreviewNovaFoto').attr('src', $('.apartir-de.checked>img').attr('src'));
    $('.uploadPreview').removeAttr('required');
  });   
});