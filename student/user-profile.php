<?php include "header.php"; ?>



                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">User Profile</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<?php 
    require_once"../dbcon.php";
    $session_user = $_SESSION['student_id'];
    $user_data = mysqli_query($con,"SELECT * FROM `students` WHERE `id` = '$session_user' OR `email` = '$session_user'");
    $user_row  = mysqli_fetch_assoc($user_data);
?>


<div class="row">
    <div class="col-sm-6">
        <table class="table table-bordered table-striped">
            
            <tr>
                <td>Name</td>
                <td><?php echo ucwords($user_row['fname'].' '.$user_row['lname']); ?></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><?php echo $user_row['username']; ?></td>
            </tr>
            <tr>
                <td>Roll</td>
                <td><?php echo $user_row['roll']; ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $user_row['email']; ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td><?php echo ucwords($user_row['status']); ?></td>
            </tr>
            <tr>
                <td>Signup Date</td>
                <td><?php echo $user_row['datetime']; ?></td>
            </tr>
        </table>
        
        
    </div>
    <div class="col-sm-6">
        <a href="">
            <img src="../images/books/20200201105505.jpg" style="width: 130px" class="img-thumbnail">
        </a>
        <br><br>

    </div>
                                       


                                      

<!-- Modal -->
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<?php include "footer.php"; ?>          