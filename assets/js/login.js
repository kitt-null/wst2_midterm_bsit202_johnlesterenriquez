$('.register').click(function(){
    $.ajax({
    url:'router/router.php?ind=register',
    data:$('#registration').serialize(),
    type:'POST',
    beforeSend:function(){
        $('.register').html('Registration in Process')
    },
    success:function(e){
        if(e == 'success'){
            $('#email').val('')
            $('#password').val('')
            $('#name').val('')
        }else if(e == 'existing'){
            $('#preloader').html()
        }
    }
})
})