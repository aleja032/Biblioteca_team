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

// lent book completed
$(document).on('click', '#complete', function(){
    let id = $(this).data('id');
    let returnDate = new Date().toISOString().split('T')[0]; // Get current date in YYYY-MM-DD format
    let idBook = "HPTAAAAA DE DONDE SACO ESTA MRDA"; //xdddddddddddddddddddddddd
    $.ajax({
        url: '../backend/process_info/update_lent.php',
        type: 'POST',
        data: { id : id,
                return_date : returnDate,
                id_book : idBook
        },
        success:function(response){
            console.log(id);
            console.log(response);
        }
    })
});

// delete book
$(document).on('click', '#delete', function(){
    let id = $(this).data('id');
    $.ajax({
        url: '../backend/process_info/delete_book.php',
        type: 'POST',
        data: {id : id},
        success:function(response){
            console.log(id);
            console.log(response);
        }
    })
});