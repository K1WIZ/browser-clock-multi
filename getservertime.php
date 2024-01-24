<?php
    // getservertime.php
    $offset = isset($_GET['offset']) ? floatval($_GET['offset']) : 0;

    // Split the offset into hours and minutes
    $hours = intval($offset);
    $minutes = ($offset - $hours) * 60; // Convert fractional hours to minutes

    // Create a DateTime object for the current UTC time
    $utcTime = new DateTime(null, new DateTimeZone('UTC'));

    // Apply the hours and minutes offset
    $utcTime->modify($hours . ' hours');
    $utcTime->modify($minutes . ' minutes');

    // Format and echo the time
    echo $utcTime->format("Y-m-d H:i:s");
?>
