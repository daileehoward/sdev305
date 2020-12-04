<?php
    /*
     * Dailee Howard
     * November 28th, 2020
     * login.php
     */

    // Turn on error reporting
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    // Start the session
    session_start();

    $username = "";
    $error = false;

    // If the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        // Get the username and password
        $username = strtolower(trim($_POST['username']));
        $password = trim($_POST['password']);

        // Actual username and password are stored in a separate file
        require($_SERVER['HOME'] . '/login-credentials.php');

        if ($username == $adminUsername && $password == $adminPassword)
        {
            $_SESSION['loggedin'] = true;

            //Redirect to page the user was on or the index page
            if (!isset($_SESSION['page']))
            {
                $_SESSION['page'] = 'index.html';
            }

            header("location: " . $_SESSION['page']);
        }

        // Set an error flag
        $error = true;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Admin Login</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
              integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="../styles/resume.css">
        <style>
            .error
            {
                color: darkred;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <nav>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="https://dhoward.greenriverdev.com/305/portfolio/pages/index.html">Resume</a></li>
                    <li><a href="https://dhoward.greenriverdev.com/305/portfolio/pages/guestbook.html">Guestbook</a></li>
                    <li><a href="https://dhoward.greenriverdev.com/305/portfolio/pages/admin.php">Guestbook Submissions</a></li>
                    <li><a href="https://dhoward.greenriverdev.com/305/portfolio/pages/login.php">Admin Login</a></li>
                    <li><a href="https://dhoward.greenriverdev.com/305/portfolio/pages/logout.php">Admin Logout</a></li>
                </ul>
            </nav>
        </div>

        <div class="container">
            <h1>Admin Login Page</h1>

            <form action="#" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" <?php echo "value='$username'"?>>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" >
                </div>

                <?php
                    if ($error)
                    {
                        echo '<span class="error">Incorrect login</span><br>';
                    }
                ?>

                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>

        <script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>
