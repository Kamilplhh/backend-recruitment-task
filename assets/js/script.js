$(".remove").click(function () {
    let id = $(this).val();
    id = parseInt(id);
    
    if (Number.isInteger(id)) {
        alert('User will be removed');
        $.post( "UserController.php", {index: id});
    }
    else {
        alert('Something didn`t work');
    }
    
    location.reload();
});
