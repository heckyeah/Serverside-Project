// Show cover modal
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

// Add ingredients to list function
$( function() {
  //select the item i want to incrament
  var i = $('#ingredients select').size() + 1;
  
  // lisen for clicks on the add button
  $('#add').live('click', function() {
    // if the amount of added items exceeds capacity
    if( i <= 10 ) {
      // If true run code
      $('<span><select name="ingredients_' + i +'" style="width: 90%;"><option value="1-2">1-2</option><option value="3-4">3-4</option><option value="5+">5+</option></select><a href="#" id="remove" class="btn-remove" style="width: 0;" ><i class="fa fa-times"></i></a></span>').appendTo('#ingredients');
      $('.error_message').css('display', 'none');
      i++;
      return false;
    } else {
      // Show error if it exceeds the capacity and hide the add button
      $('.error_message').css('display', 'block');
      $('#add').css('display', 'none');
    }
  });

  // remove an item selector
  $('#remove').live('click', function() { 
    // If there is more then one drop down then show remove icon on them
    if( i > 2 ) {
      // If true remove the span and its contents
      $(this).parents('span').remove();
      // And hide the error message
      $('.error_message').css('display', 'none');
      // and if the button is hidden then show it
      $('#add').css('display', 'block');
      i--;
    }
    return false;
  });

});