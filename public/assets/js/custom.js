// parallax
$(window).scroll(function () {
  var wScroll = $(this).scrollTop();

  // tulisan welcome
  $('.jumbotron .container  h1').css({
    'transform': 'translate(0px, ' + wScroll / 1.2 + '%)'
  });

  // navbar
  // $('.navbar .container .navbar-nav').css({
  //     'transform' : 'translate(0px, '+ wScroll + '%)'
  // });


});


// navbar scroll
$(window).scroll(function () {
  $('nav').toggleClass('scrolled', $(this).scrollTop() > 560);
});

// tooltip
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

// jam 
// window.setTimeout("waktu()", 1000);

// function waktu() {
//   var waktu = new Date();
//   setTimeout("waktu()", 1000);
//   document.getElementById("jam").innerHTML = waktu.getHours();
//   document.getElementById("menit").innerHTML = waktu.getMinutes();
//   document.getElementById("detik").innerHTML = waktu.getSeconds();
// }

// sweetalert CRUD sukses
const swal = $('.swal').data('swal');
if (swal) {
  Swal.fire({
    title: 'Berhasil !!!',
    text: swal,
    icon: 'success',
    showConfirmButton: false,
    timer: 2000,
    timerProgressBar: true,
    // timer: 1500
  })
}

// sweetalert  gagal
const ggl = $('.ggl').data('swal');
if (ggl) {
  Swal.fire({
    title: 'Gagal !!!',
    text: ggl,
    icon: 'error',
    showConfirmButton: true,
  })
}

// sweetalert  gagal
const inf = $('.inf').data('swal');
if (inf) {
  Swal.fire({
    title: 'Info !!!',
    text: inf,
    icon: 'info',
    showConfirmButton: true,
  })
}

//sweetalert delete
$(document).on('click', '.btn-hapus', function (e) {
  //hentikan aski default
  e.preventDefault();
  const href = $(this).attr('href');

  Swal.fire({
    title: 'Apakah anda yakin?',
    text: "Data yang sudah di hapus tidak bisa di kembalikan!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Batalkan !!',
    confirmButtonText: 'Ya, hapus ini !!',
    showClass: {
      popup: 'animate__animated animate__jackInTheBox'
    },
    hideClass: {
      popup: 'animate__animated animate__flipOutX'
    }
  }).then((result) => {
    if (result.isConfirmed) {
      document.location.href = href;
    }
  })
})


$(function () {
  $('.muncul').popover({
    container: 'body'
  })
})