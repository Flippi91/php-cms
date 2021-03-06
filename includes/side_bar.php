<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">

<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>

    <form action="search.php" method="POST">
        <div class="input-group">
            <input type="text" class="form-control" name="search">
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit" name="btn_search">
                    <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
        </div>
    </form>
    <!-- /.input-group -->
</div>

<!-- Side Widget Well Login Field-->
<div class="well">
    <h4>Login</h4>
    <form action="includes/login.php" method="POST">
        <div class="form-group">
            <label>User Name</label>
            <input type="text" name="username" class="form-control" placeholder="User Name">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Password" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success" name="btn_login"> Login</button>
        </div>

    </form>
</div>

<!-- Blog Categories Well -->
<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">
                <?php 
                $query = "SELECT * FROM categories";
                    $result = mysqli_query($con, $query);

                    while($row = mysqli_fetch_assoc($result)) {

                        $cat_id = $row ['cat_id'];
                        $cat_title = $row ['cat_title'];
                        echo "<li><a href='category.php?category={$cat_id};'>{$cat_title}</a></li>";
                    }

                    ?>
            </ul>
        </div>
    </div>
    <!-- /.row -->
</div>


<div class="well">
    <h4>Side Widget Well</h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
</div>

</div>

</div>
<!-- /.row -->