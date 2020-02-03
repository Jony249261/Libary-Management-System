<?php include "header.php"; ?>



                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">All Books</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                                <div class="row animated fadeInUp">
                                    <div class="col-sm-12">
                    <h4 class="section-subtitle"><b><i class="fa fa-book"></i> All Available Books</b></h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered text-center" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Book Name</th>
                                        <th>Book Image</th>
                                        <th>Author Name</th>
                                        <th>Publication Name</th>
                                        <th>Available Quantity</th>
                                        <th>View</th>
                                        
                                    </thead>
                                    <tbody>
                                        <?php

                                        $result = mysqli_query($con,"SELECT * FROM `books` WHERE `available_qty` > 0");
                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>

                                            <tr>
                                            <td><?= $row['book_name']?>
                                            </td>
                                            <td><img src="../images/books/<?= $row['book_image']?>" alt="" style="width: 75px; height: 75px">
                                            </td>
                                            <td><?= $row['book_author_name']?>
                                            </td>
                                            <td><?= $row['book_publication_name']?>
                                            </td>
                                            <td><?= $row['available_qty']?>
                                            </td>
                                            <td>
                                                <a href="javascript:avoid(0)" title="" class="btn btn-warning" data-toggle="modal" data-target="#book-<?= $row['id']?>"><i class="fa fa-eye"></i></a>
                                                
                                                
                                            </td>
                                            

                                        </tr>
                                            <?php
                                        }

                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                </div>

                                        <?php

                                        $result = mysqli_query($con,"SELECT * FROM `books`");
                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>


<!-- Modal -->
                            <div class="modal fade" id="book-<?= $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header state modal-info">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-center" id="modal-info-label"><i class="fa fa-book"></i>Book Information</h4>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-bordered table-striped table-hover nowrap">
                                                <tr>
                                                    <th>Book Name</th>
                                                    <td><?= $row['book_name']?></td>
                                                </tr>
                                                 <tr>
                                                    <th>Book Image</th>
                                                    <td><img src="../images/books/<?= $row['book_image']?>" alt="" style="width: 50px"></td>
                                                </tr>
                                                 <tr>
                                                    <th>Author Name</th>
                                                    <td><?= $row['book_author_name']?></td>
                                                </tr>
                                                 <tr>
                                                    <th>Publication Name</th>
                                                    <td><?= $row['book_publication_name']?></td>
                                                </tr>
                                                 <tr>
                                                    <th>Purchase Date</th>
                                                    <td><?= date('d-M-Y',strtotime($row['book_purchase_date'])) ?></td>
                                                </tr>
                                                 <tr>
                                                    <th>Book Price</th>
                                                    <td><?= $row['book_price']?></td>
                                                </tr>
                                                 <tr>
                                                    <th>Book Quantity</th>
                                                    <td><?= $row['book_qty']?></td>
                                                </tr>
                                                <tr>
                                                    <th>Available Quantity</th>
                                                    <td><?= $row['available_qty']?></td>
                                                </tr>
                                            </table>
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                        }

                                        ?>


                                        <?php

                                        $result = mysqli_query($con,"SELECT * FROM `books`");
                                        while ($row = mysqli_fetch_assoc($result)) {

                                            $id = $row['id'];
                                        
                                            $book_info = mysqli_query($con,"SELECT * FROM `books` WHERE `id` ='$id'");
                                            $book = mysqli_fetch_assoc($book_info);
                                        }

                                        ?>


<!-- Modal -->
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<?php include "footer.php"; ?>          