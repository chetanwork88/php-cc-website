//on the click of the submit button 
$("#add_comment").click(function() {
    //get the form values
    var blog_id = $('#blog_id').val();
    var comment = $('#blog_add_comment').val();


    //make the postdata
    var postData = 'blog_id=' + blog_id + '&blog_add_comment=' + comment;

    //call your input.php script in the background, when it returns it will call the success function if the request was successful or the error one if there was an issue (like a 404, 500 or any other error status)

    $.ajax({
        url: "blog_review_db.php",
        type: "POST",
        data: postData,
        success: function(data, status, xhr) {
            //if success then just output the text to the status div then clear the form inputs to prepare for new data
            $("#status_text").html('comment added successfully.');
            $('#blog_id').val('');
            $('#blog_add_comment').val('');
        },
        error: function(jqXHR, status, errorThrown) {
            //if fail show error and server status
            $("#status_text").html('Error while adding comment');
        }
    });
});