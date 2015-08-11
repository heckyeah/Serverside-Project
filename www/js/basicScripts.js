// Show cover modal
$( function() {
  // Click to show modal
  $("a.click").click( function( event ) {
    event.stopPropagation();
    // write classes and css to tags
    $("body", "html").addClass("overflow");
    $(".message").addClass("active");
    $(".message_container").addClass("show");
  });
  // Make sure that clicking the modal wont close the modal
  $(".message").click( function( event ) {
    event.stopPropagation();
  });
  // make the background close the modal on click
  $(".message_container, a.shut").click( function() {
    // change body css and remove classes
    $("body", "html").removeClass("overflow");
    $(".message").removeClass("active");
    $(".message_container").removeClass("show");
  });
});

// Show cover modal
$( function() {
  // Click to show modal
  $("button.click").click( function( event ) {
    event.stopPropagation();
    // write classes and css to tags
    $("body", "html").addClass("overflow");
    $(".ingredients").addClass("active");
    $(".ingredients_container").addClass("show");
  });
  // Make sure that clicking the modal wont close the modal
  $(".ingredients").click( function( event ) {
    event.stopPropagation();
  });
  // make the background close the modal on click
  $("#ingredient-close, a.shut").click( function() {
    // change body css and remove classes
    $("body", "html").removeClass("overflow");
    $(".ingredients").removeClass("active");
    $(".ingredients_container").removeClass("show");
  });
});