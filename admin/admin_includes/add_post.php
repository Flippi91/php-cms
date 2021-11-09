<?php require_once('./admin_includes/header.php'); ?>

<?php require_once('./admin_includes/nav.php'); ?>

    <?php 
    
    if(isset($_POST['btn_add_post'])) {

        $post_title = $_POST['post_title'];
        $post_cat_id = $_POST['cat_name'];
        $post_author = $_POST['post_author'];
        $post_status = $_POST['post_status'];

        $post_image = $_FILES['image']['name'];
        $post_temp = $_FILES['image']['tmp_name'];

        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        /* $post_date = date('d-m-y'); */
        /* $post_comment = 4; */

        $sql = "INSERT INTO posts (post_cat_id,post_title,post_author,post_date,post_img,post_content,post_tags,post_status) VALUES ('$post_cat_id', '$post_title', '$post_author', now(), '$post_image', '$post_content', '$post_tags', '$post_status')";

        $result = mysqli_query($con,$sql);
        if($result){

            echo "Record Has Been Saved In The Database";

            move_uploaded_file($post_temp,"../images/$post_image");

        } else {
            echo "Query Failed";
        }

       

        /* echo "{$post_title} {$post_cat_id} {$post_author} {$post_status} {$post_tags} {$post_content} {$post_date} {$post_comment}"; */
    }
    
    ?>



            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col">
                        
                    <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Post Title</label>
                                <input type="text" name="post_title" placeholder="Post Title" class="form-control mb-2">
                            </div>
                            <div class="form-group">
                            <label>Post Category ID</label>
                            <select name="cat_name" id="" class="form-control mb-2">

                            <?php 
                            
                                $sql = "SELECT * FROM categories";
                                $value = mysqli_query($con,$sql);

                                while($row = mysqli_fetch_assoc($value)) {

                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];

                                ?>

                                    <option value="<?php echo $cat_id?>"><?php echo $cat_title ?></option>

                                <?php

                                }
                            
                                ?>
                                </select>
                            </div>                            
                            <div class="form-group">
                                <label>Post Author</label>
                                <input type="text" name="post_author" placeholder="Post Author" class="form-control mb-2">
                            </div>
                            <div class="form-group">
                                <label>Post Status</label>
                                <input type="text" name="post_status" placeholder="Post Status" class="form-control mb-2">
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" placeholder="Post Image" class="form-control mb-2">
                            </div>
                            <div class="form-group">
                                <label>Post Tags</label>
                                <input type="text" name="post_tags" placeholder="Post Tags" class="form-control mb-2">
                            </div>
                            <div class="form-group">
                                <label>Post Content</label>
                                <textarea name="post_content" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" type="submit" name="btn_add_post"> Add Post</button>
                            </div>
                        </form>

                        
                    </div>

                </div>
                <!-- /.row -->
                
            </div>
            <!-- /.container-fluid -->

  

<?php require_once('./admin_includes/footer.php'); ?> 