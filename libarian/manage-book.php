<?php include "header.php"; ?>



                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">Manage Books</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                                <div class="row animated fadeInUp">
                                    <div class="col-sm-12">
                    <h4 class="section-subtitle"><b><i class="fa fa-book"></i> Manage Books</b></h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Book Name</th>
                                        <th>Book Image</th>
                                        <th>Author Name</th>
                                        <th>Publication Name</th>
                                        <th>Purchase Date</th>
                                        <th>Book Price</th>
                                        <th>Book Quantity</th>
                                        <th>Available Quantity</th>
                                        <th>Action</th>
                                        
                                    </thead>
                                    <tbody>
                                        <?php

                                        $result = mysqli_query($con,"SELECT * FROM `books`");
                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>

                                            <tr>
                                            <td><?= $row['book_name']?>
                                            </td>
                                            <td><img src="../images/books/<?= $row['book_image']?>" alt="" style="width: 50px">
                                            </td>
                                            <td><?= $row['book_author_name']?>
                                            </td>
                                            <td><?= $row['book_publication_name']?>
                                            </td>
                                            <td><?= date('d-M-Y',strtotime($row['book_purchase_date'])) ?>
                                            </td>
                                            <td><?= $row['book_price']?>
                                            </td>
                                            <td><?= $row['book_qty']?>
                                            </td>
                                            <td><?= $row['available_qty']?>
                                            </td>
                                            <td>
                                                <a href="javascript:avoid(0)" title="" class="btn btn-info" data-toggle="modal" data-target="#book-<?= $row['id']?>"><i class="fa fa-eye"></i></a>
                                                <a href="" class="btn btn-warning" data-toggle="modal" data-target="#book-update-<?= $row['id']?>"><i class="fa fa-pencil"></i></a>
                                                <a href="delete.php?bookdelete=<?= base64_encode($row['id']); ?>" class="btn btn-danger" onclick="return confirm('Are You Sure Want to Delete?')"><i class="fa fa-trash-o"></i></a>
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

                                        ?>


<!-- Modal -->
                            <div class="modal fade" id="book-update-<?= $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header state modal-info">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-center" id="modal-info-label"><i class="fa fa-pencil"></i>Update Book Information </h4>
                                        </div>
                                        <div class="modal-body">
                                           <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST" action="">
                                        <div class="form-group">
                                            <label for="book_name" class=" control-label">Book Name</label>
                                            <div class="">
                                                <input type="text" class="form-control" id="book_name" name="book_name" placeholder="Book Name" value="<?= $book['book_name'] ?>">
                                                <input type="hidden" class="form-control"  name="id"  value="<?= $book['id'] ?>">
                                             
                                            </div>

                                        </div>

                                        
                                        <div class="form-group">
                                            <label for="book_author_name" class="control-label">Author Name</label>
                                            <div class="">
                                                <input type="text" class="form-control" id="book_author_name" name="book_author_name" placeholder="Book Author Name" 
                                                value="<?= $book['book_author_name'] ?>">
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_publication_name" class=" control-label">Publication Name</label>
                                            <div class="">
                                                <input type="text" class="form-control" id="book_publication_name" name="book_publication_name" placeholder="Book Publication Name" value="<?= $book['book_publication_name']  ?>">
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_purchase_date" class=" control-label">Purchase Date</label>
                                            <div class="">
                                                <input type="date" class="form-control" id="book_purchase_date" name="book_purchase_date" placeholder="Book Purchase Date" value="<?= $book['book_purchase_date']  ?>">
                                               
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_price" class="control-label">Book Price</label>
                                            <div class="">
                                                <input type="number" class="form-control" id="book_price" name="book_price" placeholder="Book Price" value="<?= $book['book_price']  ?>">
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_qty" class="control-label">Book Quantity</label>
                                            <div class="">
                                                <input type="number" class="form-control" id="book_qty" name="book_qty" placeholder="Book Quantity" value="<?= $book['book_qty'] ?>">
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="available_qty" class="control-label">Available Quantity</label>
                                            <div>
                                                <input type="number" class="form-control" id="available_qty" name="available_qty" placeholder="Available Quantity" value="<?= $book['available_qty']  ?>">
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="update" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                        }


    if(isset($_POST['update'])){
    $id = $_POST['id'];
    $book_name = $_POST['book_name'];
    $book_author_name = $_POST['book_author_name'];
    $book_publication_name = $_POST['book_publication_name'];
    $book_purchase_date = $_POST['book_purchase_date'];
    $book_price = $_POST['book_price'];
    $book_qty = $_POST['book_qty'];
    $available_qty = $_POST['available_qty'];
    $libarian_username = $_SESSION['libarian_username'];

    $result = mysqli_query($con,"UPDATE `books` SET `book_name`='$book_name',`book_author_name`='$book_author_name',`book_publication_name`='$book_publication_name',`book_purchase_date`='$book_purchase_date',`book_price`='$book_price',`book_qty`='$book_qty',`available_qty`='$available_qty',`libarian_username`='$libarian_username' WHERE `id` = '$id'");
    if($result){
                ?>
                <script type="text/javascript">
                    alert('Book Update Successfully!');
                    javascript:history.go(-1);
                </script>

                <?php
            }else{
                ?>
                <script type="text/javascript">
                    alert('Book Update not Successfully!');
                </script>

                <?php
            }

}



                                        ?>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<?php include "footer.php"; ?>          