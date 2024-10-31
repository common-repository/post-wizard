jQuery(document).ready(function($) {

    // CREATE THE BUTTON
    // Create the button
    let button = '<a href="#" class="page-title-action" id="post-wizard-button"><svg id="Ebene_1" data-name="Ebene 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 67 63" width="15px" height="15px"><g id="Group-Copy"><path id="Path-212" d="M240.59,214.78c1.25-1,2.35-2.18,4.07-2.76,4.07-1.37,4.36-3.21,5.61-2.73s7.87,20,7.87,21.46.75,9.09,1.21,10.26,3.92,8.28,5.33,10.94c.08.16-1.91,1.27-4.48,1.72a63.45,63.45,0,0,1-6.93.51,26.46,26.46,0,0,0,9,1.57c3-.17,4.93-.7,5.05-.55.87,1.15,12.15,10,15.78,10.49,2.26.3-14.44,6-33.28,6.47-11.45.28-23-.35-33.51-8.24q14.17-4.29,18.23-10.25a91.48,91.48,0,0,0,4.62-10.95c.45-1.59,4.94-11.45,4.25-10.3-1.23,2.09-4.22,4.53-5,5.23s2.16-4,2.37-5.23c.64-3.76,2-4.84,1.19-8.47-.16-.71-.36-1.69-.58-2.93a41.48,41.48,0,0,0,3.92-2.56c-.5.2-1.49.24-2.35.47a12.56,12.56,0,0,0-4.41,1.95,8,8,0,0,1-4,1.53Q238.88,216.11,240.59,214.78Z" transform="translate(-216.28 -209.21)" style="fill-rule: evenodd"/></g></svg>\n<span>Post Wizard</span></a>';
    // Insert the button after the "Add New" button
    $('.page-title-action').after(button);
    // Show the overlay and popup when the button is clicked
    $('#post-wizard-button').click(function(e) {
        e.preventDefault();
        $('#post-wizard-overlay, #post-wizard-popup').show();
    });
    // Hide the overlay and popup when the overlay is clicked
    $('#post-wizard-overlay').click(function() {
        $('#post-wizard-overlay, #post-wizard-popup').hide();
    });

});
