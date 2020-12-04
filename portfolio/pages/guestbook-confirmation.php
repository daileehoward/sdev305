<?php
    /*
        Name: Dailee Howard
        Date: October 31st, 2020
        File: guestbook-confirmation.php
    */

    // Turn on error reporting
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    // Redirect if form hasn't been submitted
    if (empty($_POST))
    {
        header("location: guestbook.html");
    }

    // Set the time zone
    date_default_timezone_set('America/Los_Angeles');

    // Include file
    require('../../../../database-credentials.php');
    require('../includes/guestbookFunctions.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
              integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="../styles/guestbook.css">

        <link rel="icon" type="image/png" href="../images/book.png">
        <title>Thank You!</title>
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

        <div class="container p-3" id="main">
            <div class="jumbotron">
                <h1 class="display-3 heading">Thank you <?php echo $_POST['firstName'] ?>!</h1>
                <p class="lead heading">We'll keep in touch...</p>

                <div class="row justify-content-center p-3">
                    <input class="btn btn-primary" type="url" id="returnToGuestbook" value="Return to Guestbook"
                           onclick="goToGuestbookPage()">
                </div>
            </div>
        </div>

        <?php
            // Get data from POST array
            $isValid = true;

            //Check first name
            if (validName($_POST['firstName']))
            {
                $firstName = $_POST['firstName'];
            }
            else
            {
                echo "<p>Invalid first name</p>";
                $isValid = false;
            }

            // Check last name
            if (validName($_POST['lastName']))
            {
                $lastName = $_POST['lastName'];
            }
            else
            {
                echo "<p>Invalid last name</p>";
                $isValid = false;
            }

            $jobTitle = $_POST['jobTitle'];
            $company = $_POST['company'];

            if (validLinkedIn($_POST['linkedIn']))
            {
                $linkedIn = $_POST['linkedIn'];
            }
            else
            {
                echo "<p>Invalid Linked In</p>";
                $isValid = false;
            }

            if (validEmail($_POST['email']))
            {
                $email = $_POST['email'];
            }
            else
            {
                echo "<p>Invalid email</p>";
                $isValid = false;
            }

            if (validMeetingEvent($_POST['meetingEvent']))
            {
                $meetingEvent = $_POST['meetingEvent'];
            }
            else
            {
                echo "<p>Invalid meeting event</p>";
                $isValid = false;
            }

            $message = $_POST['message'];

            if (missingEmail($_POST['mailingList'], $_POST['email']))
            {
                $email = $_POST['email'];
                $mailingList = $_POST['mailingList'];
            }
            else
            {
                echo "<p>Missing email</p>";
                $isValid = false;
            }

            if (!$isValid)
            {
                return;
            }

            $fromName = $firstName . " " . $lastName;
            $fromEmail = $email;

            // Save order to database
            $sql = "INSERT INTO guestbook(first_name, last_name, job_title, company, linked_in, email, meeting_event, 
                        message, mailing_list) 
                        VALUES ('$firstName', '$lastName', '$jobTitle', '$company', '$linkedIn', '$email', '$meetingEvent', 
                        '$message', '$mailingList')";
            $success = mysqli_query($cnxn, $sql);

            if (!$success)
            {
                echo "<p>Sorry, something went wrong...";
                return;
            }

            // Send email
            $to = "Dhoward18@mail.greenriver.edu";
            $subject = "New Guestbook Signature:";
            $emailMessage = "Submission from $firstName $lastName\r\n";
            $headers = "Name: $fromName <$fromEmail>";

            $success = mail($to, $subject, $message, $headers);

            // Check success
            if ($success)
            {
                echo "<p>Your submission has been sent!</p>";
            }
            else
            {
                echo "<p>Sorry, there was a problem...</p>";
            }
        ?>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
                integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
                crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
                integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
                crossorigin="anonymous"></script>
        <script src="..//scripts/guestbook-confirmation.js"></script>
    </body>
</html>