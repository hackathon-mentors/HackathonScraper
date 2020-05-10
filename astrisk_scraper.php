<?php
    include('simple_html_dom.php');

    $html = "https://weareasterisk.com/attend";
    $fileHeaders = get_headers($html);

    # A lot of code is reused here. See if you can optimize this
    # Make sure you handle the event where there are no events listed on the page
    # Create system to check if there have been updates to each page. If update then scrape data. 
    # Import data into database
    # Account for duplicate hackathon between sources

?>