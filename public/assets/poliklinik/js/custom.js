// $('#example').tooltip({
//   boundary: 'window'
// });

// tooltip

$(document).ready(function () {
  $('[data-toggle="tooltip"]').tooltip();
});

$(function () {
  $('.example-popover').popover({
    container: 'body'
  })
})