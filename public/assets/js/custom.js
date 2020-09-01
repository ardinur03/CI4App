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

// tooltip
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

// jam 
window.setTimeout("waktu()", 1000);

function waktu() {
  var waktu = new Date();
  setTimeout("waktu()", 1000);
  document.getElementById("jam").innerHTML = waktu.getHours();
  document.getElementById("menit").innerHTML = waktu.getMinutes();
  document.getElementById("detik").innerHTML = waktu.getSeconds();
}