<?php
$data = array();

// Open CSV file of outlets
$csvfile = fopen("./res/data.csv", "r");
if ($csvfile) {
    while (($line = fgets($csvfile)) !== false) {
        $subArray = array(
            "outlet" => explode(",", $line)[0],
            "category" => explode(",", $line)[1],
            "food" => explode(",", $line)[2],
            "price" => floatval(str_replace('£', '', explode(",", $line)[3]))
        );
        array_push($data, $subArray); // Add sub array to main data array
    }
    fclose($csvfile);
} else {
    // error opening the file.
}

// Produce set of outlets as array
$outlets = array_unique(array_column($data, "outlet"));

// Check for o parameter passed with GET
$outlet = "";
$exists = true;
if(isset($_GET['o'])) {
    $outlet = $_GET['o'];
    if (!(in_array($outlet, $outlets))) {
        $exists = false;
    }
} else {
    $exists = false;
}