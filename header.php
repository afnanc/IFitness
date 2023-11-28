<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oxanium&display=swap" rel="stylesheet">
</head>
<style>
    .custom-navbar {
        /* background: linear-gradient(to bottom, #0000ff, #00bfff); */
        /* background: linear-gradient(to bottom, #222222, #440044); */
        
        background-color: #495E57;

    }
</style>


<?php
if (count(get_included_files()) == 1) exit("Direct access denied.");
?>
<nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav" style="width: 100%; margin: 0 auto; display: flex; justify-content: space-around;">
                <li class="nav-item">
                    <a class="nav-link" href="/CPS714/iFitness/">Home</a>
                </li>
                <?php if (isset($_SESSION['username'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link margin-top-2" href="/CPS714/iFitness/PR">Progress</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bold center green-background logo" href="/CPS714/iFitness/fitness">iFitness</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link margin-top-2" href="/CPS714/iFitness/profile">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link margin-top-2" href="/CPS714/iFitness/logout.php">Logout</a>
                    </li>

                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link margin-top-2" href="/CPS714/iFitness/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link margin-top-2" href="/CPS714/iFitness/register">Register</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>