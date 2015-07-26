$(function() {
  $("a.click").click(function(event) {
    event.stopPropagation();
    $(".message").addClass("active");
    $(".message_container").addClass("show");
  });
  $(".message").click(function(event) {
    event.stopPropagation();
  });
  $(document).click(function() {
    $(".message").removeClass("active");
    $(".message_container").removeClass("show");
  });
});
