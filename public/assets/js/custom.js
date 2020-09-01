// parallax
$(window).scroll(function() {
  var wScroll = $(this).scrollTop();

  // tulisan welcome
  $('.jumbotron .container  h1').css({
      'transform' : 'translate(0px, '+ wScroll/1.2 + '%)'
  });

  // navbar
  // $('.navbar .container .navbar-nav').css({
  //     'transform' : 'translate(0px, '+ wScroll + '%)'
  // });

  
});


// navbar scroll
$(window).scroll(function() {
  $('nav').toggleClass('scrolled', $(this).scrollTop() > 560);
});