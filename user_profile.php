<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:index.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Update user profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">

</head>
<body class="bg-img">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
    <div class="view-account">
        <section class="module">
            <div class="module-inner">
                <div class="content-panel">
                    <h2 class="title">Profile</h2>
                    <form class="form-horizontal">
                    <?php
                        $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id= '$user_id'") or die('query failed');
                        if (mysqli_num_rows($select)>0){
                           $fetch = mysqli_fetch_assoc($select);
                        }
                     ?>
                        <fieldset class="fieldset">
                            <h3 class="fieldset-title">Welcome</h3>
                            <div class="form-group avatar">
                                <figure class="figure col-md-2 col-sm-3 col-xs-12">
                                    <img class="img-rounded img-responsive" src="images/user-profile-icon.svg" alt="">
                                </figure>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label" style="color:black;">User Name</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <h3 class="form-control" style="font-size: 25px;"><?php echo $fetch['name']; ?></h3>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label" style="color: black;">Email</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <h3 class="form-control" style="font-size: 25px;"><?php echo $fetch['email']; ?></h3>
                                </div>
                            </div>
                        </fieldset>
                        <hr>
                        <div class="form-group">
                            <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                            <a href="home.php?logout=<?php echo $user_id;?>" class="nxt-btn" style="color:black; background-color:red; size: 20px">logout</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>

<script type="text/javascript">

</script>
</body>
</html>