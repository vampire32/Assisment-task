// header script
$(function() {
  $(".navbar-set li > a").each(function() {
      var href = $(this).attr('href');
      var heading = $(this).text();
      $('.sidenav').append('<a href="' + href + '">' + heading + '<\/a>');
  });
});



function openNav() {
  document.getElementById("mySidenav").style.left = "0px";
}

function closeNav() {
  document.getElementById("mySidenav").style.left = "-250px";
}







// blogslider start
$('.feature-slider').slick({
  dots: false,
  arrows:true,
  infinite: false,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

// blogslider end

// product slider jas start

 $('.slider-for').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: '.slider-for',
  dots: true,
  centerMode: true,
  focusOnSelect: true
});
// product slider jas end

// simple slick slider start
$(".regular").slick({
  dots: true,
  infinite: true,
  speed:300,
  autoplay:true,
  slidesToShow: 3,
  slidesToScroll: 3
});

// simple slick slider end

// wow animation js 

$(function () {
    new WOW().init();
  });


// responsive menu js 

$(function () {
  $('#menu').slicknav();
});



// slick slider in tabs js start

function openCity(evt, cityName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace("active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += "active";
}


// slick slider in tabs js end

$(".btr-exp-sec-img ").mousemove(function(event) {
  var mousex = event.pageX - $(this).offset().left;
  var mousey = event.pageY - $(this).offset().top;
  var imgx = (mousex - 10) / 100;
  var imgy = (mousey - 10) / 100;
  $(this).find('   a   ').css({
      "transform": "translate(" + imgx + "%   ," + imgy + "%   )",
      "transition": "none"
  });
  $(this).find('   .img-2 ').css({
      "transform": "translate(" + imgx + "%   ," + imgy + "%   )",
      "transition": "none"
  });
  $(this).find('   .img-4 ').css({
      "transform": "translate(" + imgx + "%   ," + imgy + "%   )",
      "transition": "none"
  });
  $(this).find('   .img-5 ').css({
      "transform": "translate(" + imgx + "%   ," + imgy + "%   )",
      "transition": "none"
  });

});

$(".btr-exp-sec-img ").mouseout(function() {
  $(this).find('img').css({
      "transform": "translate(0px,0px)",
      "transition": "0.5s ease-out"
  });
});

// inner pages
