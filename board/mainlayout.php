<nav class="navbar navbar-expand-lg bg-white fixed-top">
    <a class="navbar-brand" href="index.html">PssvNdera</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto navbar-right-top">
            <li class="nav-item">
                <div id="custom-search" class="top-search-bar">
                    <input class="form-control" type="text" placeholder="Search..">
                </div>
            </li>
            <li class="nav-item dropdown nav-user">
                <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i></a>
                <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                  <?php
                    $admin = DB::query('SELECT * FROM user WHERE id=:id', array(':id'=>Login::isLoggedIn()));
                    foreach ($admin as $key) {
                    ?>
                    <div class="nav-user-info">
                        <h5 class="mb-0 text-white nav-user-name"><?php echo $key['username'] ?> </h5>
                        <?php
                        }
                         ?>
                        <span class="status"></span><span class="ml-2">Available</span>
                    </div>
                    <a class="dropdown-item" href="#"><i class="fas fa-lock mr-2"></i>Change Password</a>
                    <form class="" action="" method="post">
                      <button class="dropdown-item" type="submit" name="logout"><i class="fas fa-power-off mr-2"></i>Logout</button>
                    </form>
                    <?php include('include/logout.php') ?>

                </div>
            </li>
        </ul>
    </div>
</nav>
