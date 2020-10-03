$(window).on("load", function() {
  $(".loader").fadeOut(500),
    function() {
      $(".loader").fadeOut(800);
    };
  $(".items").isotope({
    filter: "*",
    animationOptions: {
      duration: 1500,
      easing: "linear",
      queue: false
    }
  });
});

$(document).ready(function() {
 
  var types = new Typed(".typed", {
    strings: ["Web developer.", "Student.", "Front-end developer.", "Hard worker.", "Web developer."],
    typeSpeed: 55,
    loop: false,
    startDelay: 1000,
    showCursor: false
  });
  $(".owl-carousel").owlCarousel({
    loop: true,
    items: 4,
    margin:10,
    nav: true,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    responsiveClass:true,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:4
            
        }
    }
  });
  

  var skillsTopOffset = $(".skillsSection").offset().top;
  $(window).scroll(function() {
    if (window.pageYOffset > skillsTopOffset - $(window).height() + 200) {
      $(".chart").easyPieChart({
        easing: "easeInOut",
        barColor: "#fff",
        trackColor: false,
        scaleColor: false,
        lineWidth: 4,
        size: 152,
        onStep: function(from, to, percent) {
          $(this.el)
            .find(".percent")
            .text(Math.round(percent));
        }
      });
    }
  });
 

  $("#filters a").click(function() {
    $("#filters .current").removeClass("current");
    $(this).addClass("current");
    var selecter = $(this).attr("data-filter");

    $(".items").isotope({
      filter: selecter,
      animationOptions: {
        duration: 1500,
        easing: "linear",
        queue: false
      }
    });
    return false;
  });

  const nav = $("#navigation");
  const navTop = nav.offset().top;
  $(window).on("scroll", stickyNavigation);
  function stickyNavigation() {
    var body = $("body");
    if ($(window).scrollTop() >= navTop) {
      body.css("padding-top", nav.outerHeight() + "px");
      body.addClass("fixedNav");
    } else {
      body.css("padding-top", 0);

      body.removeClass("fixedNav");
    }
  }
 
  $(window).scroll(function() {
    var scrollTop = $(this).scrollTop();
  
    $('.fl-fl').css({
      opacity: function() {
        var elementHeight = $(this).height(),
            opacity = ((1 - (elementHeight - scrollTop) / elementHeight) * 0.4) + 0.0;
            
        return opacity;
      }
    });
  });
  

});

let scrollIndicator = document.getElementById('mouseScrollIcon')
var scrollImageShown = true;

window.onscroll = function(){
  if(window.pageYOffset >= 1 && scrollImageShown == true){
    scrollIndicator.setAttribute("id", "mouseScrollIconDisabled")
    scrollImageShown = false
  }
  else if(window.pageYOffset < 1 && scrollImageShown == false){
    scrollIndicator.setAttribute("id", "mouseScrollIcon")
    scrollImageShown = true
  }
}

