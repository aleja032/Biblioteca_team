// add new user
$(document).ready(function(){
    $('#form_user').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: '../backend/process_info/add_user.php',
            type: 'POST',
            data: $(this).serialize(),
            success:function(response){
                console.log(response);
            }
        })
    })
})

// add new book
$(document).ready(function(){
    $('#form_book').submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'../backend/process_info/add_book.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response){
                console.log(response);
            }
        })
    })
})

// lend a book
$(document).ready(function(){
    $('#form_lend').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: '../backend/process_info/add_lend.php',
            type: 'POST',
            data: $(this).serialize(),
            success:function(response){
                console.log(response);
            }
        })
    })
})

// delete book
$(document).on('click', '.delete_item', function(){
    let id = $(this).data('id');
    $.ajax({
        url: '../backend/process_info/delete_book.php',
        type: 'POST',
        data: {id : id},
        success:function(response){
            console.log(response);
        }
    })
});