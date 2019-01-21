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


//if window width is changed, adjust the menu
 $(document).ready(function(){

   var menu = document.querySelector('.main-menu');

      function windowSize() {
        windowWidth = window.innerWidth ? window.innerWidth : $(window).width();
        return windowWidth;
      }

      $(window).resize(function() {

            windowSize();

            if (windowSize() >= 640) {
              menu.style.display = 'block';
              document.querySelector('body').style.overflow = 'auto';
            } else {
              menu.style.display = 'none';
            }

      });


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

  // x.style.top + '1px';
  // x.style.top -= '1px';

  x.classList.toggle("change");

  var menu = document.querySelector('.main-menu');

  if (menu.style.display == "block") {
    menu.style.display = "none";
    document.querySelector('body').style.overflow = 'auto';
  } else  {
    menu.style.display = "block";
    document.querySelector('body').style.overflow = 'hidden';
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

//gallery////////////////////////////////////////

/*sorting the images into place (see function below for function call)
https://stackoverflow.com/questions/9778899/how-to-order-divs-by-id-in-javascript*/
// function sortdivs(){
//   var mylist = document.querySelector('.single_thumbs');
//   var divs = mylist.getElementsByTagName('div');
//   var listitems = [];
//   for (i = 0; i < divs.length; i++) {
//     listitems.push(divs.item(i));
//   }
//   listitems.sort(function(a,b) {
//     var compA = a.getAttribute('id').toUpperCase();
//     var compB = b.getAttribute('id').toUpperCase();
//     return (compA < compB) ? -1 : (compA > compB) ? 1 : 0;
//   })
//   for (i = 0; i < listitems.length; i++) {
//     mylist.appendChild(listitems[i]);
//   }
// }
//
// //work:single: gallery function
// var bigimage = document.querySelector('.single_image');
// bigimage.classList.remove('single_image');
// bigimage.className = 'single_big';
//
// var $bigimage = $('.single_big');
//
// $bigimage.parent().before($bigimage);
// //this is only to move bigimage into a class, so that the prev/next controls can be absolutely positioned to it
// $($bigimage).prependTo(".image_area");
//
//
// function enlarge(x){
//   var ensmall = document.querySelector('.single_big');
//   ensmall.classList.remove('single_big');
//   ensmall.className = 'single_image';
//
//   $(ensmall).prependTo(".single_thumbs");
//
//   var smallimage = document.getElementById(x);
//
//   smallimage.className = 'single_big';
//   var $bigimage = $('.single_big');
//
//   $bigimage.parent().before($bigimage);
//   //this is only to move bigimage into a class, so that the prev/next controls can be absolutely positioned to it
//   $($bigimage).prependTo(".image_area");
//
//   sortdivs();
// }
//
// function nextimage() {
//   var children = document.querySelector(".single_thumbs").children.length + 1;
//   var current = parseInt(document.querySelector('.single_big').id);
//   var nextid = (current+1);
//
//   if (nextid > children) {
//     nextid = 1;
//   }
//
//   enlarge(nextid);
// }
//
// function previmage() {
//
//   var children = document.querySelector(".single_thumbs").children.length + 1;
//   var current = parseInt(document.querySelector('.single_big').id);
//   var previd = (current-1);
//
//   if (previd == 0) {
//     previd = children;
//   }
//
//   enlarge(previd);
// }
