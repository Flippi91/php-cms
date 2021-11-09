
<?php require_once('./admin_includes/header.php'); ?>

<?php require_once('./admin_includes/nav.php'); ?>


<?php

    if(isset($_GET['p_id'])) {


        $post_id = $_GET['p_id'];
        $sql = "SELECT * FROM posts WHERE post_id='$post_id'";
        $result = mysqli_query($con,$sql);

        while($row = mysqli_fetch_assoc($result)) {

            $post_id = $row['post_id']; 
            $post_author = $row['post_author']; 
            $post_title = $row['post_title']; 
            $post_cat_id = $row['post_cat_id']; 
            $post_status = $row['post_status']; 
            $img = $row['post_img'];
            $post_tags = $row['post_tags'];
            $post_content = $row['post_content'];
    
            
           
        }
    }

    // Update Record

    if(isset($_POST['btn_edit_post'])) {

        $post_title = $_POST['post_title'];
        $post_cat_id = $_POST['cat_name'];
        $post_author = $_POST['post_author'];
        $post_status = $_POST['post_status'];

        $post_image = $_FILES['image']['name'];
        $post_temp = $_FILES['image']['tmp_name'];

        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        

        if(empty($post_image)) {

            $query = "SELECT * FROM posts WHERE post_id='$post_id'";
            $result = mysqli_query($con,$query);

            while($row = mysqli_fetch_assoc($result)) {

                $post_image = $row['post_img'];

            }

        }
        
        $sql = "UPDATE posts SET post_cat_id='$post_cat_id', post_title='$post_title', post_author='$post_author', post_date= now(), post_img='$post_image', post_tags='$post_tags', post_content='$post_content', post_status='$post_status' WHERE post_id='$post_id'";

        $result = mysqli_query($con,$sql);

        if($result) {
            header("location: ./posts.php");
            move_uploaded_file($post_temp, "../images/$post_image");
        }
    }

?>




            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col">
                        
                    <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Post Title</label>
                                <input type="text" name="post_title" placeholder="Post Title" class="form-control mb-2" value="<?php echo $post_title ?>">
                            </div>
                            <div class="form-group">
                                <label>Post Category ID</label>
                                <select name="cat_name" id="" class="form-control">
                                

                                <?php
                                
                                    $query = "SELECT * FROM categories";
                                    $data = mysqli_query($con,$query);

                                    while($row = mysqli_fetch_assoc($data)) {

                                        $cat_id = $row['post_cat_id'];

                                    ?>

                                    <option value="<?php echo $row['cat_id'] ?>"><?php echo $row['cat_title']; ?></option>


                                    <?php   
                                    }
                                
                                ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Post Author</label>
                                <input type="text" name="post_author" placeholder="Post Author" class="form-control mb-2" value="<?php echo $post_author ?>">
                            </div>
                            <div class="form-group">
                                <label>Post Status</label>
                                <input type="text" name="post_status" placeholder="Post Status" class="form-control mb-2" value="<?php echo $post_status ?>">
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" placeholder="Post Image" class="form-control mb-2">
                                <img width="150" height="120" class="img_responsive" src="../images/<?php echo $img ?>">
                                
                            </div>
                            <div class="form-group">
                                <label>Post Tags</label>
                                <input type="text" name="post_tags" placeholder="Post Tags" class="form-control mb-2" value="<?php echo  $post_tags ?>">
                            </div>
                            <div class="form-group">
                                <label>Post Content</label>
                                <textarea name="post_content" class="form-control" id="" cols="30" rows="10"><?php echo  $post_content ?></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" type="submit" name="btn_edit_post"> Edit Post</button>
                            </div>
                        </form>

                        
                    </div>

                </div>
                <!-- /.row -->
                
            </div>
            <!-- /.container-fluid -->

  

<?php require_once('./admin_includes/footer.php'); ?> 