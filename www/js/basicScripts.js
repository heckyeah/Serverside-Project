$(function() {
  $("a.click").click(function(event) {
    event.stopPropagation();
    $("body", "html").css({'overflow':'hidden'});
    $(".message").addClass("active");
    $(".message_container").addClass("show");
  });
  $(".message").click(function(event) {
    event.stopPropagation();
  });
  $(document).click(function() {
    $("body", "html").css({'overflow':'auto'});
    $(".message").removeClass("active");
    $(".message_container").removeClass("show");
  });
});
