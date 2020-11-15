<!DOCTYPE html>
<html lang="en">

<?php
    // Turn on error reporting
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    // Set the time zone
    date_default_timezone_set('America/Los_Angeles');

    // Include files
    require ('../includes/database-credentials.php');
?>

<head>
    <!--
        Name: Dailee Howard
        Date: October 31st, 2020
        File: admin.php
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/admin.css">

    <link rel="icon" type="image/png" href="../images/book.png">

    <title>Guestbook Submissions</title>
</head>

<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Resume</a></li>
                <li><a href="https://dhoward.greenriverdev.com/305/portfolio/pages/guestbook.html">Guestbook</a></li>
                <li><a href="https://dhoward.greenriverdev.com/305/portfolio/pages/admin.php">Admin</a></li>
            </ul>
        </nav>
    </div>

    <div class="container" id="main">
        <h1>Guestbook Submissions</h1>
        <table id="submission-table" class="display" style="width: 100%">
            <thead>
            <tr>
                <td class="column-title">Submission ID</td>
                <td class="column-title">Full Name</td>
                <td class="column-title">Job Title</td>
                <td class="column-title">Company</td>
                <td class="column-title">LinkedIn Profile</td>
                <td class="column-title">Email</td>
                <td class="column-title">Meeting Event</td>
                <td class="column-title">Message</td>
                <td class="column-title">Mailing List</td>
            </tr>
            </thead>

            <tbody>
            <?php
            $sql = "SELECT * FROM guestbook ORDER BY  submission_id DESC";
            $result = mysqli_query($cnxn, $sql);

            foreach ($result as $row)
            {
                $submission_id = $row['submission_id'];
                $submission_date = date("M d, Y g:i a", strtotime($row['submission_date']));
                $full_name = $row['first_name'] . " " . $row['last_name'];
                $job_title = $row['job_title'];
                $company = $row['company'];
                $linked_in = $row['linked_in'];
                $email = $row['email'];
                $meeting_event = $row['meeting_event'];
                $message = $row['message'];
                $mailing_list = $row['mailing_list'];

                echo "<tr>";
                echo "<td>$submission_id</td>";
                echo "<td>$submission_date</td>";
                echo "<td>$full_name</td>";
                echo "<td>$job_title</td>";
                echo "<td>$company</td>";
                echo "<td>$linked_in</td>";
                echo "<td>$email</td>";
                echo "<td>$meeting_event</td>";
                echo "<td>$message</td>";
                echo "<td>$mailing_list</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script>
        $('#submission-table').DataTable();
    </script>
</body>

</html>