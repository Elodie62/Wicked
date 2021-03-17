<div class="wickedLogo">
    <img src="wicked.png" alt="" />
</div>

<nav class="navbar navbar-expand-lg">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="Home.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Visit.php">Visit </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    The show
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="The story.php">The story </a>
                    <a class="dropdown-item" href="cast&creative.php">Cast & Creative </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="Video.php">Videos</a>
                </div>
            </li>
        </ul>

    </div>


    <?php
    if (isset($_SESSION['Email']) && !empty($_SESSION['Email'])) { ?>
        <ul class="nav navbar-nav navbar-right">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    <?php if (isset($_SESSION['Email'])) { ?>

                        <span style="font-size: 1.5em; color: white;">
                            <i class="far fa-user"></i>
                        </span>

                        <?= $_SESSION['Pseudo'] ?> <?php } ?>

                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="Page profil.php">My profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="Change password.php">Edit my profil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </li>
        </ul>

    <?php
    } else { ?>
        <a href="login.php"><button class="button">Login</button></a>

    <?php } ?>

</nav>