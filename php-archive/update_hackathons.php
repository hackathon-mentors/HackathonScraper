<?php
    include('mlh_scraper.php');
    include('sqlFunctions.php');
    include('creds.php');

    // # Connect to database;
    $con = new mysqli($my_server,$my_user,$my_password,$my_db);

    if ($con -> connect_errno) {
        echo "Failed to connect to MySQL: " . $con -> connect_error;
        exit();
    }

    # delete current records
    $query = "DELETE FROM wp_posts WHERE ID >= 6000;";
    $query = "DELETE FROM `wp_postmeta` WHERE meta_id >= 12000;";
    $queryExec = mysqli_multi_query($con, $query);

    # Construct query to create posts;
    for ($i = 0; $i < sizeof($hackathons); $i++) {
        // Perform a query, check for error
        if (!$con -> query(create_hackathon_post($i, $hackathons))) {
            echo("Error description: " . $con -> error);
        }
        if (!$con -> query(create_hackathon_postmeta($i, $hackathons))) {
            echo("Error description: " . $con -> error);
        }
        if (!$con -> query(create_hackathon_attachment($i, $hackathons))) {
            echo("Error description: " . $con -> error);
        }
        // $sql = create_hackathon_post($i, $hackathons);
        // $sql .= create_hackathon_postmeta($i, $hackathons);
        // $sql .= create_hackathon_attachment($i, $hackathons);

        // $queryExec = mysqli_multi_query($con, $sql)) {
    }

    // Close connection
    $con -> close();
?>