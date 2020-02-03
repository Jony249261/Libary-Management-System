<?php ?>
<?php 
   require_once '../dbcon.php';
   if(isset($_POST['student_register'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    $roll = $_POST['roll'];
    $reg = $_POST['reg'];
    $phone = $_POST['phone'];

    $input_errors = array();
    if(empty($fname)){
        $input_errors['fname'] = "Frist name field is required";
    }
    if(empty($lname)){
        $input_errors['lname'] = "Last name field is required";
    }
    if(empty($email)){
        $input_errors['email'] = "Email field is required";
    }
    if(empty($username)){
        $input_errors['username'] = "Username name field is required";
    }
    if(empty($password)){
        $input_errors['password'] = "Password field is required";
    }
    if(empty($c_password)){
        $input_errors['c_password'] = "Conform Password field is required";
    }
    if(empty($roll)){
        $input_errors['roll'] = "Roll field is required";
    }
    if(empty($reg)){
        $input_errors['reg'] = "Registration field is required";
    }
     if(empty($phone)){
        $input_errors['phone'] = "Phone field is required";
    }
if(count($input_errors)==0){
    $email_check = mysqli_query($con, "SELECT * FROM `students` WHERE `email` = '$email';");

    $email_check_row = mysqli_num_rows($email_check);
    if($email_check_row==0){
     
        $username_check = mysqli_query($con, "SELECT * FROM `students` WHERE `username` = '$username';");
        $username_check_row = mysqli_num_rows($username_check);
        if($username_check_row==0){
            if(strlen($username)>6){
                if(strlen($password)>6){

                     if($password == $c_password){
                        $password_hash = md5($password);
    $result = mysqli_query($con,"INSERT INTO `students`(`fname`, `lname`, `roll`, `email`, `username`, `password`, `phone`,`reg`) VALUES ('$fname','$lname','$roll','$email','$username','$password_hash','$phone','$reg')");
    if($result){
        $success = "Data Insert Successfully!";
    }else{
        $error ="Data Insert Doesn't Successfully!";
    }
}else{
    $c_password_m = "Password Does Not Match";
}


                }else{
                    $password_len = "password Must Greater Than 6 character";
                }
            }else{
                $username_len = "Username Must Greater Than 6 character";
            }
        }else{
            $username_exist = "This Username Already Exist!";
        }


    }else{
        $email_exist = "This Email Already Exist!";
    }

   
}


    

   }
?>

<!doctype html>
<html lang="en" class="fixed accounts sign-in">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Helsinki</title>

    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">
</head>

<body>
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo">
             <h1 class="text-center">LMS</h1>
             <?php 
             if(isset($success)){
            ?>
                         <div class="alert alert-success alert-dismissible">
                            <?php echo "$success"; ?>
    <button type="button" class="close" data-dismiss="alert">×</button>
  </div>
            <?php 
         }
         ?>
          <?php 
             if(isset($error)){
            ?>
                         <div class="alert alert-danger alert-dismissible">
                            <?php echo "$error"; ?>
    <button type="button" class="close" data-dismiss="alert">×</button>
  </div>
            <?php 
         }
         ?>
         <?php 
             if(isset($email_exist)){
            ?>
                         <div class="alert alert-danger alert-dismissible">
                            <?php echo "$email_exist"; ?>
    <button type="button" class="close" data-dismiss="alert">×</button>
  </div>
            <?php 
         }
         ?>
         <?php 
             if(isset($username_exist)){
            ?>
                         <div class="alert alert-danger alert-dismissible">
                            <?php echo "$username_exist"; ?>
    <button type="button" class="close" data-dismiss="alert">×</button>
  </div>
            <?php 
         }
         ?>
         <?php 
             if(isset($username_len)){
            ?>
                         <div class="alert alert-danger alert-dismissible">
                            <?php echo "$username_len"; ?>
    <button type="button" class="close" data-dismiss="alert">×</button>
  </div>
            <?php 
         }
         ?>

          <?php 
             if(isset($password_len)){
            ?>
                         <div class="alert alert-danger alert-dismissible">
                            <?php echo "$password_len"; ?>
    <button type="button" class="close" data-dismiss="alert">×</button>
  </div>
            <?php 
         }
         ?>
          <?php 
             if(isset($c_password_m)){
            ?>
                         <div class="alert alert-danger alert-dismissible">
                            <?php echo "$c_password_m"; ?>
    <button type="button" class="close" data-dismiss="alert">×</button>
  </div>
            <?php 
         }
         ?>

        </div>
        <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form method="POST" action="">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="fname" value="<?php if(isset($fname)){echo $fname;} ?>" placeholder="Frist Name" >
                                <i class="fa fa-user"></i>
                            </span>
                            <?php
                                if(isset($input_errors['fname'])){
                                    echo '<span class="input_error">'. $input_errors['fname'].'<span>';
                                }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="lname" placeholder="Last Name" value="<?php if(isset($lname)){echo $lname;} ?>">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php
                                if(isset($input_errors['lname'])){
                                    echo '<span class="input_error">'. $input_errors['lname'].'<span>';
                                }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php if(isset($email)){echo $email;} ?>">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <?php
                                if(isset($input_errors['email'])){
                                    echo '<span class="input_error">'. $input_errors['email'].'<span>';
                                }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="username" placeholder="User Name" value="<?php if(isset($username)){echo $username;} ?>">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php
                                if(isset($input_errors['username'])){
                                    echo '<span class="input_error">'. $input_errors['username'].'<span>';
                                }
                            ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" name="password" placeholder="Password" value="<?php if(isset($password)){echo $password;} ?>">
                                <i class="fa fa-key"></i>
                            </span>
                            <?php
                                if(isset($input_errors['password'])){
                                    echo '<span class="input_error">'. $input_errors['password'].'<span>';
                                }
                            ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" name="c_password" placeholder="ConformPassword" value="<?php if(isset($c_password)){echo $c_password;} ?>">
                                <i class="fa fa-key"></i>
                            </span>
                           <?php
                                if(isset($input_errors['c_password'])){
                                    echo '<span class="input_error">'. $input_errors['c_password'].'<span>';
                                }
                            ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="roll" placeholder="Roll is (0-9) 6 digit " pattern="[0-9]{6}" value="<?php if(isset($roll)){echo $roll;} ?>">
                                <i class="fa fa-key"></i>
                            </span>
                            <?php
                                if(isset($input_errors['roll'])){
                                    echo '<span class="input_error">'. $input_errors['roll'].'<span>';
                                }
                            ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="reg" placeholder="Reg. No" pattern="[0-9]{6}" value="<?php if(isset($reg)){echo $reg;} ?>">
                                <i class="fa fa-key"></i>
                            </span>
                            <?php
                                if(isset($input_errors['reg'])){
                                    echo '<span class="input_error">'. $input_errors['reg'].'<span>';
                                }
                            ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="phone" placeholder="01......."pattern="[0-9]{11}" value="<?php if(isset($phone)){echo $phone;} ?>">
                                <i class="fas fa-phone"></i>
                            </span>
                            <?php
                                if(isset($input_errors['phone'])){
                                    echo '<span class="input_error">'. $input_errors['phone'].'<span>';
                                }
                            ?>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-success btn-block" type="submit" name="student_register" value="Register"> 
                        </div>
                        <div class="form-group text-center">
                            Have an account?, <a href="sign-in.php">Sign In</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="../assets/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="../assets/javascripts/template-script.min.js"></script>
<script src="../assets/javascripts/template-init.min.js"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
</body>

</html>
