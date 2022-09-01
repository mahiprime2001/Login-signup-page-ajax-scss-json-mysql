$(document).ready(function(){
    $('login').click(function(){
        var email = $('#email').val();
        var password = $('#password').val();

        if ($.trim(email).length > 0 && $.trim(password).length > 0){
            $.ajax({
                URL:"login.class.php",
                method: "POST",
                data:{email:email, password:password},
                cache: false,
                beforeSend: function(){
                    $('#login').var("connecting ...");
                },
                success:function(data){
                    if(data){
                        $("body").load("user_profile").hide().fadeIn(1500);
                    }
                    else{
                        var options = {
                            distance: '40',
                            direction: 'left',
                            times: '3'
                        }
                        $('#box').effect("shake",options, 800);
                        $('#submit').val('login');
                        $('#error').html("<span class'text-danger'>Invalid email or password</span>");
                    }
                }
            })
        }
        else{
            return false;
        }
    })
})