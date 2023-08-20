$(document).ready(function() {
  $("input[type='radio']").click(function() {
    var sim = $("input[type='radio']:checked").val();
    //alert(sim);
    if (sim < 3) {
      $('.myratings').css('color', 'red');
      $(".myratings").text(sim);
    } else {
      $('.myratings').css('color', 'green');
      $(".myratings").text(sim);
    }
  });
  if (msg) {
    $('#msg').modal('show');
  }
  $('.flipbook').click(function() {
    var file = $(this).attr('data-src');
    console.log(file);
    $('.file-container').FlipBook({
      pdf: file,
    });
  })
});