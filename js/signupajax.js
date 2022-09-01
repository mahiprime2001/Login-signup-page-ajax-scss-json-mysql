$(document).on('click','#submit',function(e){
			
    e.preventDefault();
    
    var username = $('#name').val();
    var email 	 = $('#email').val();
    var password = $('#password').val();
    
    var atpos  = email.indexOf('@');
    var dotpos = email.lastIndexOf('.com');

    $select = mysqli_query($conn, "SELECT * FROM user_form WHERE email = '$email'AND  password = '$pass'");
    
    if(username == ''){ // check username not empty
        alert('please enter username !!'); 
    }
    else if(!/^[a-z A-Z]+$/.test(username)){ // check username allowed capital and small letters 
        alert('username only capital and small letters are allowed !!'); 
    }
    else if(email == ''){ //check email not empty
        alert('please enter email address !!'); 
    }
    else if(atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length){ //check valid email format
        alert('please enter valid email address !!'); 
    }
    else if(password == ''){ //check password not empty
        alert('please enter password !!'); 
    }
    else if(password.length < 6){ //check password value length six 
        alert('password must be 6 !!');
    }else if(mysqli_num_rows($select) > 0){
          $message = 'Email already exist'; 
       }
    else{			
        $.ajax({
            url: 'register.class.php',
            type: 'post',
            data: 
                {newusername:username, 
                 newemail:email, 
                 newpassword:password
                },
            success: function(response){
                $('#message').html(response);
            }
        });
        
        $('#signup_page')[0].reset();
    }
});