<?php include "header.php"; 
        
        if(isset($_POST['issue-book'])){
 
            $student_id      = $_POST['student_id'];
            $book_id         = $_POST['book_id'];
            $book_issue_date = $_POST['book_issue_date'];
            $result = mysqli_query($con,"INSERT INTO `issue_books`(`student_id`, `book_id`, `book_issue_date`) VALUES ('$student_id','$book_id','$book_issue_date')");

            if($result){
                 mysqli_query($con,"UPDATE `books` SET `available_qty`=`available_qty`-1 WHERE `id` = '$book_id'");
                ?>
                <script type="text/javascript">
                    alert('Book Issued Successfully!');
                </script>

                <?php
            }else{
                ?>
                <script type="text/javascript">
                    alert('Book Issued not Successfully!');
                </script>

                <?php
            }
}
?>



                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">Issue Book</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                    <div class="col-md-6 col-sm-offset-3">
                        <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-inline" method="POST" action="">
                                        <h5 class="mb-lg"><i class="fa fa-book"></i> Issue Book</h5>
                                        <div class="form-group">
                                            
                                        
                                            <select name="student-id" id="" class="form-control">
                                                <option value="">Select</option>
                                                <?php

                                        $result = mysqli_query($con,"SELECT * FROM `students` WHERE `status` = '1'");
                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                                <option value="<?= $row['id'] ?>"><?= ucwords($row['fname'].' '.$row['lname']).' - ('.$row['roll'].')' ?></option>
                                                <?php  } ?>                                         
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <button name="search" type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <?php  

                            if(isset($_POST['search'])){
                                $id = $_POST['student-id'];
                                $result = mysqli_query($con,"SELECT * FROM `students` WHERE `id` ='$id' AND `status` = '1'");
                                $row = mysqli_fetch_assoc($result);
                               ?>
                               <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST" action="">
                                        
                                        <div class="form-group">
                                            <label for="name">Student Name</label>
                                            <input type="text" class="form-control" id="name" value="<?= ucwords($row['fname'].' '.$row['lname']) ?>" readonly>
                                            <input type="hidden" name="student_id" value="<?= $row['id'] ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label for="book_id">Book Name</label>
                                             <select name="book_id" id="book_id" class="form-control">
                                                <option value="">Select</option>
                                                <?php

                                        $result = mysqli_query($con,"SELECT * FROM `books` WHERE `available_qty` > 0");
                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                                <option value="<?= $row['id'] ?>"><?= $row['book_name'] ?></option>
                                                <?php  } ?>                                         
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Book Issue Date</label>
                                            <input type="text" class="form-control" value="<?= date('d-M-Y'); ?>" name="book_issue_date" readonly>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary" name="issue-book"><i class="fa fa-save"></i> Save Issue Book</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                     <?php  
                            }

                             ?>


                        </div>
                    </div>
                        
                    </div>

                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<?php include "footer.php"; ?>          