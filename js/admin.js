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