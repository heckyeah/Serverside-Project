// Show the content
$( function() {
  // Click to show modal
  $("a.click").click( function( event ) {
    event.stopPropagation();
    // write classes and css to tags
    $("body", "html").css({'overflow':'hidden'});
    $(".message").addClass("active");
    $(".message_container").addClass("show");
  });
  // Make sure that clicking the modal wont close the modal
  $(".message").click( function( event ) {
    event.stopPropagation();
  });
  // make the background close the modal on click
  $("body, a.shut").click( function() {
    // change body css and remove classes
    $("body", "html").css({'overflow':'auto'});
    $(".message").removeClass("active");
    $(".message_container").removeClass("show");
  });
});