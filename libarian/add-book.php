<?php  require_once 'header.php';
   if(isset($_POST['submit'])){
    $book_name = $_POST['book_name'];
    $author_name = $_POST['author_name'];
    $book_publication_name = $_POST['book_publication_name'];
    $book_purchase_date = $_POST['book_purchase_date'];
    $book_price = $_POST['book_price'];
    $book_qty = $_POST['book_qty'];
    $available_qty = $_POST['available_qty'];
    $libarian_username = $_SESSION['libarian_username'];
    $image = explode('.', $_FILES['book_image']['name']);
    $image_ext = end($image);
    $image = date('Ymdhis.').$image_ext;
     $input_errors = array();
    if(empty($book_name)){
        $input_errors['book_name'] = "Book name field is required";
    }
    if(empty($author_name)){
        $input_errors['author_name'] = "Author name field is required";
    }
    if(empty($book_publication_name)){
        $input_errors['book_publication_name'] = "Book Publication Name field is required";
    }
    if(empty($book_purchase_date)){
        $input_errors['book_purchase_date'] = "Book Purchase date  field is required";
    }
    if(empty($book_price)){
        $input_errors['book_price'] = "Book Price field is required";
    }
    if(empty($book_qty)){
        $input_errors['book_qty'] = "Book Quantity field is required";
    }
    if(empty($available_qty)){
        $input_errors['available_qty'] = "Book Available Quantity field is required";
    }
    if(empty($image)){
        $input_errors['image'] = "Image field is required";
    }
    
    if(count($input_errors)==0){
    $result = mysqli_query($con,"INSERT INTO `books`(`book_name`, `book_image`, `book_author_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_qty`, `available_qty`, `libarian_username`) VALUES ('$book_name','$image','$author_name','$book_publication_name','$book_purchase_date','$book_price','$book_qty','$available_qty','$libarian_username')");
    if($result){
        move_uploaded_file($_FILES['book_image']['tmp_name'], '../images/books/'.$image);
        $success = "Data Insert Successfully!";
    }else{
        $error ="Data Insert Doesn't Successfully!";
    }
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
                            <li><a href="javascript:avoid(0)">Add Book</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="panel">
                        

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


                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="">
                                        <h5 class="mb-lg"><i class="fa fa-book"></i> Add Book</h5>
                                        <div class="form-group">
                                            <label for="book_name" class="col-sm-4 control-label">Book Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="book_name" name="book_name" placeholder="Book Name" value="<?php if(isset($book_name)){echo $book_name;} ?>">
                                                <?php
                                if(isset($input_errors['book_name'])){
                                    echo '<span class="input_error">'. $input_errors['book_name'].'<span>';
                                }
                            ?>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label for="book_image" class="col-sm-4 control-label">Book Image</label>
                                            <div class="col-sm-8">
                                                <input type="file" class="form-control" id="book_image" name="book_image" placeholder="Book Image" required="" value="<?php if(isset($c_password)){echo $c_password;} ?>">
                                                <?php
                                if(isset($input_errors['image'])){
                                    echo '<span class="input_error">'. $input_errors['image'].'<span>';
                                }
                            ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="author_name" class="col-sm-4 control-label">Author Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="author_name" name="author_name" placeholder="Book Author Name" value="<?php if(isset($author_name)){echo $author_name;} ?>">
                                                <?php
                                if(isset($input_errors['author_name'])){
                                    echo '<span class="input_error">'. $input_errors['author_name'].'<span>';
                                }
                            ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_publication_name" class="col-sm-4 control-label">Publication Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="book_publication_name" name="book_publication_name" placeholder="Book Publication Name" value="<?php if(isset($book_publication_name)){echo $book_publication_name;} ?>">
                                                <?php
                                if(isset($input_errors['book_publication_name'])){
                                    echo '<span class="input_error">'. $input_errors['book_publication_name'].'<span>';
                                }
                            ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_purchase_date" class="col-sm-4 control-label">Purchase Date</label>
                                            <div class="col-sm-8">
                                                <input type="date" class="form-control" id="book_purchase_date" name="book_purchase_date" placeholder="Book Purchase Date" value="<?php if(isset($book_purchase_date)){echo $book_purchase_date;} ?>">
                                                <?php
                                if(isset($input_errors['book_purchase_date'])){
                                    echo '<span class="input_error">'. $input_errors['book_purchase_date'].'<span>';
                                }
                            ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_price" class="col-sm-4 control-label">Book Price</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" id="book_price" name="book_price" placeholder="Book Price" value="<?php if(isset($book_price)){echo $book_price;} ?>">
                                                <?php
                                if(isset($input_errors['book_price'])){
                                    echo '<span class="input_error">'. $input_errors['book_price'].'<span>';
                                }
                            ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_qty" class="col-sm-4 control-label">Book Quantity</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" id="book_qty" name="book_qty" placeholder="Book Quantity" value="<?php if(isset($book_qty)){echo $book_qty;} ?>">
                                                <?php
                                if(isset($input_errors['book_qty'])){
                                    echo '<span class="input_error">'. $input_errors['book_qty'].'<span>';
                                }
                            ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="available_qty" class="col-sm-4 control-label">Available Quantity</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" id="available_qty" name="available_qty" placeholder="Available Quantity" value="<?php if(isset($available_qty)){echo $available_qty;} ?>">
                                                <?php
                                if(isset($input_errors['available_qty'])){
                                    echo '<span class="input_error">'. $input_errors['available_qty'].'<span>';
                                }
                            ?>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-sm-offset-4 col-sm-8">
                                                <button type="submit" class="btn btn-primary" name="submit"><i class="fa fa-save"></i> Save Book</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                    </div>

                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<?php include "footer.php"; ?>          