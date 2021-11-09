<?php require_once('./admin_includes/header.php'); ?>

<?php require_once('./admin_includes/nav.php'); ?>

    <?php 
    
    if(isset($_POST['btn_add_user'])) {

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $user_role = $_POST['user_role'];
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];

        /* echo "{$first_name} {$last_name} {$user_role} {$user_name} {$user_email} {$user_password}"; */


        /* $post_image = $_FILES['image']['name'];
        $post_temp = $_FILES['image']['tmp_name'];

        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        /* $post_date = date('d-m-y'); */
        /* $post_comment = 4; */

       $sql = "INSERT INTO users (user_name,user_password,first_name,last_name,user_email,user_role) VALUES ('$user_name', '$user_password', '$first_name', '$last_name', '$user_email', '$user_role')";
 
        $result = mysqli_query($con,$sql);
        if($result){

            echo "Record Has Been Saved In The Database";

            //move_uploaded_file($post_temp,"../images/$post_image");

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
                            <label> First Name</label>
                            <input type="text" name="first_name" placeholder="First Name" class="form-control mb-2">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="last_name" placeholder="Last Name" class="form-control mb-2">
                        </div>
                        <div class="form-group">
                            <label>User Role</label>
                            <select name="user_role" id="" class="form-control" >
                                <option name="subscriber">Select User</option>
                                <option name="admin">Admin</option>
                                <option name="subscriber">Subscriber</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" name="user_name" placeholder="User Name" class="form-control mb-2">
                        </div>
                        <div class="form-group">
                            <label>User Email</label>
                            <input type="email" name="user_email" placeholder="User Email" class="form-control mb-2">
                        </div>
                        <div class="form-group">
                            <label>User Password</label>
                            <input type="password" name="user_password" placeholder="Password" class="form-control mb-2">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit" name="btn_add_user"> Add User</button>
                        </div>
                    </form>

                        
                    </div>

                </div>
                <!-- /.row -->
                
            </div>
            <!-- /.container-fluid -->

  

<?php require_once('./admin_includes/footer.php'); ?> 