<?php 

require_once('./includes/header.php');

if(isset($_POST['btn_edit_category'])) {
    $up_id = $_POST['edit_id'];
    $up_cat = $_POST['edit_category'];
    /* echo "this is ID{$up_id}This is Category{$up_cat}"; */
    $sql = "update categories set cat_title='$up_cat' where cat_id='$up_id'";
    $result = mysqli_query($con,$sql);

    if($result) {
        echo '<p class="alert alert-success"> Your Category Has Been Updated : )</p>';
        header("location:categories.php");
    } else {
        echo "Query Filed";
    }


}

?> 