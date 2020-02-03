<?php include "header.php"; ?>



                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                    <div class="col-sm-12">
                        <div class="row text-center">
                            <?php
                            $students = mysqli_query($con,"SELECT * FROM `students`");
                            $total_students= mysqli_num_rows($students);


                            ?>
                    <!--BOX Style 1-->
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="panel widgetbox wbox-1 bg-darker-2 color-light">
                            <a href="students.php">
                                <div class="panel-content">
                                    <h1 class="title color-light-1"> <i class="fa fa-users"></i> <?= $total_students ?> </h1>
                                    <h4 class="subtitle">Total Students</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                     <?php
                            $libarians = mysqli_query($con,"SELECT * FROM `libarian`");
                            $total_libarians = mysqli_num_rows($libarians);


                            ?>
                    <!--BOX Style 1-->
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="panel widgetbox wbox-1 bg-darker-2 color-light">
                            <a href="#">
                                <div class="panel-content">
                                    <h1 class="title color-light-1"> <i class="fa fa-users"></i> <?= $total_libarians ?> </h1>
                                    <h4 class="subtitle">Total Libarians</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php
                            $books = mysqli_query($con,"SELECT * FROM `books`");
                            $total_books = mysqli_num_rows($books);

                            $book_qty = mysqli_query($con,"SELECT SUM(`book_qty`) as total FROM `books`");
                            $total_book_qty = mysqli_fetch_assoc($book_qty);
                            $avb_books = mysqli_query($con,"SELECT SUM(`available_qty`) as available FROM `books`");
                            $avb_books_qty = mysqli_fetch_assoc($avb_books);


                            ?>
                    <!--BOX Style 1-->
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="panel widgetbox wbox-1 bg-darker-2 color-light">
                            <a href="manage-book.php">
                                <div class="panel-content">
                                    <h1 class="title color-light-1"> <i class="fa fa-book"></i> <?= $total_books.'('.$total_book_qty['total'].'-'.$avb_books_qty['available'].')' ?> </h1>
                                    <h4 class="subtitle">Total Books</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                        
                    </div>

                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<?php include "footer.php"; ?>          