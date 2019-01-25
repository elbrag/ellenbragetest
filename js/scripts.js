//masonry gallery in single//////////////////////////////////
jQuery(window).on('load', function() {
    $('#singleimages').masonry({
    // options
    itemSelector: '.gall_img',
    columnWidth: '.gall_img',
    percentPosition: true,
    horizontalOrder: true,
    isAnimated: false
});

});
////////////////////////////////////////////////////

$(document).click(function(){

    $('.graphic_elem').addClass('clicked');
    setTimeout(function(){
      $('.graphic_elem').removeClass('clicked');
    }, 200);

});



//go to top-button///////////////////////////////////////////////https://getflywheel.com/layout/add-sticky-back-top-button-website/
var topButton = $("#topButton");

    $(document).ready(function() {
    var offset = 250;
    var duration = 300;

$(window).scroll(function() {

    if ($(this).scrollTop() > offset) {
      topButton.fadeIn(duration);
    } else {
      topButton.fadeOut(duration);
    }

});

topButton.click(function(event) {

  event.preventDefault();
  $('html, body').animate({scrollTop: 0}, duration);

return false;

})

});
/////////////////////////////////////////////////////////////////////////


 $(document).ready(function(){


      function windowSize() {
        windowWidth = window.innerWidth ? window.innerWidth : $(window).width();
        return windowWidth;
      }

      var texttag = document.querySelector('.single_description');
      var textToLimit = texttag.innerHTML;
      var buttonposition = $('#readmore').position();

      if (windowSize() < 640) {
        var wordLimit = 40;
      } else if (windowSize() > 1200) {
        var wordLimit = 115;
      } else {
        var wordLimit = 100;
      }

      windowSize();

      function limitWords(texttag, textToLimit, wordLimit) {
        var finalText = "";
        var text2 = textToLimit.replace(/\s+/g, ' ');
        var text3 = text2.split(' ');
        var numberOfWords = text3.length;

        if(numberOfWords > wordLimit) {
          for ( var i= 0; i < wordLimit; i++ ) {
            finalText = finalText+" "+ text3[i] + " ";
            texttag.innerHTML = finalText+"…";
          }
        } else {
            texttag.innerHTML = textToLimit;
            $('#readmore').hide();
          }

          $('#readmore').click(function(e) {
            if (texttag.innerHTML == textToLimit) {
              texttag.innerHTML = finalText+"…";
              $('#readmore').html('Read more');

              /*I include a width check here because in big widths, a short text would cause the scroll-back to actually scroll down, not up. Therefore, you have to have scrolled past 100 to get the scroll-back */
              if ((windowSize() > 640)) {
                if (document.body.scrollTop > 100) {
                  $('body, html').animate({scrollTop: $('.single_description').offset().top}, 300);
                }
              } else {
                $('body, html').animate({scrollTop: $('.single_description').offset().top}, 300);
              }


            } else {
              texttag.innerHTML = textToLimit;
              $('#readmore').html('Read less');
            }
          });
      }

      limitWords(texttag, textToLimit, wordLimit);



        });

//hamburger menu

var menuicon = document.getElementById('menu-symb');

function openMenu(x){

  x.classList.toggle("change");


  var menu = $('.main-menu');

  // $('.main-menu').toggleClass('open');

  var transEnd = "transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd";

  if (menu.hasClass('open')){
    $('.main-ul').removeClass('show');
    menu.addClass('closed');
    $('header').addClass('closing');

    menu.one(transEnd, function() {
        menu.removeClass('open');
  			menu.removeClass('closed');
        $('header').removeClass('open closing');
  			menu.off(transEnd);
  		});

  } else {
    menu.removeClass('closed');
    menu.addClass('open');
    $('header').addClass('open');

    menu.one(transEnd, function() {
      $('.main-ul').addClass('show');
    });
  }

};

/*theme slider*//////////////////////////////////////////////////


var cur_theme = document.getElementById('cur_theme');
var prev_theme = document.getElementById('prev_theme');
var next_theme = document.getElementById('next_theme');
var loader = document.getElementById('loading');


function slidenext(){
  loader.style.display = 'flex';

  var pos = 0;
  var pos2 = -700;
  var id = setInterval(frame, 0);
  function frame() {
    if (pos == 1000) {
      clearInterval(id);
    } else {
      pos+=10;
      pos2+=10;
      cur_theme.style.right = pos + 'px';
      next_theme.style.opacity = '1';
      if (pos2 < 0) {
        next_theme.style.right = (pos2+10) + 'px';
      }
    }
  }
}
function slideprev(){

  loader.style.display = 'flex';

  var pos = 0;
  var pos2 = -700;
  var id = setInterval(frame, 0);
  function frame() {
    if (pos == 1000) {
      clearInterval(id);
    } else {
      pos+=10;
      pos2+=10;
      cur_theme.style.left = pos + 'px';
      prev_theme.style.opacity = '1';
      if (pos2 < 0) {
        prev_theme.style.left = (pos2+10) + 'px';
      }
    }
  }
}

