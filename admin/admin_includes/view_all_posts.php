<table class="table table-stripped">
    <tr>
        <td>ID</td>
        <td>Author</td>
        <td>Title</td>
        <td>Category</td>
        <td>Status</td>
        <td>Img</td>
        <td>Comment</td>
        <td>Date</td>
        <td colspan="2">Operations</td>
    </tr>
    <tr>

    <?php 
    
        $query = "SELECT * FROM posts";
        $result = mysqli_query($con,$query);

        while($row = mysqli_fetch_assoc($result)) {

            $old = $row['post_img'];
            $cat_id = $row['post_cat_id'];

        ?>

        <td><?php echo $row['post_id']; ?></td>
        <td><?php echo $row['post_author']; ?></td>
        <td><?php echo $row['post_title']; ?></td>


        <?php 
        
            $query = "SELECT * FROM categories WHERE  cat_id='$cat_id'";
            $data = mysqli_query($con,$query);

            while($value = mysqli_fetch_assoc($data)) {

            ?> 

                <td><?php echo $value['cat_title']; ?></td>

            

        <?php

        }
        
        ?>

        



        <td><?php echo $row['post_status']; ?></td>
        <td><img width="50" height="50" class="img_responsive" src="../images/<?php echo $row['post_img']; ?>"></td>
        <td><?php echo $row['post_comment_count']; ?></td>
        <td><?php echo $row['post_date']; ?></td>
        <td><a href="posts.php?del=<?php echo $row['post_id']; ?>" class="btn btn-danger"><span class="fa fa-trash"></span></a></td>
        <td><a href="posts.php?opt=edit_post&p_id=<?php echo $row['post_id']; ?>" class="btn btn-success"><span class="fa fa-pencil"></span></a></td>

    </tr>
    <?php

    }

    ?>  
</table>

<?php

if(isset($_GET['del'])) {

    
    
    $del_id = $_GET['del'];
    $sql = "DELETE FROM posts WHERE post_id='$del_id'";
    $result = mysqli_query($con,$sql);

    if($result) {

        unlink(__DIR__ . '/../../images/'.$old);
        header("location:posts.php");
    }

}   

?> 