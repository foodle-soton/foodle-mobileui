<?php
include_once "mobileCheck.php"; // Redirect to www.foodlr.org if not a mobile device
include_once "getData.php";
include_once "header.php";
?>
    <!-- NAV BAR -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./">Foodlr</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <p class="navbar-text">Choose a food outlet:</p>
                    <!-- PULL HEADINGS HERE OUT OF CSV -->
                    <?php
                        foreach($outlets as $o)
                            echo "<li><a href=\"./outlets.php?o=" . str_replace(' ', '', str_replace('\'', '', $o)) . "\">" . ucfirst($o) . "</a></li>";
                    ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <!-- MAIN CONTENT WRAPPER -->
    <div class="wrapper">
        <!-- MAIN HEADING -->
        <h1><?php if($exists) echo ucfirst($outlet) . "<a href=\"#\"><img src=\"http://www.broadmeadowmedical.com.au/wp-content/uploads/2013/04/Google_Maps_Icon.png\" height=\"45px\" /></a>" ?></h1>

        <!-- CATEGORIES -->
        <?php
            if ($exists) {
                $outletFoods = array();

                // Get all entries for given outlet
                foreach ($data as $row) {
                    if ($row["outlet"] == $outlet) {
                        array_push($outletFoods, $row);
                    }
                }

                // Build categories as tables
                $lastSeen = "";
                $firstRun = true;
                foreach ($outletFoods as $row) {
                    if ($lastSeen != $row["category"]) {
                        if ($firstRun) {
                            $firstRun = false;
                        } else {
                            echo "</table>\n";
                        }
                        $lastSeen = $row["category"];
                        echo "<h3>" . $row["category"] . "</h3>\n";
                        echo "<table>\n";
                        echo "<tr><td class=\"colHeading\">Item</td><td class=\"colHeading\">Cost</td></tr>\n";
                    }
                    echo "<tr>\n<td>" . $row["food"] . "</td>\n";
                    echo "<td>£" . number_format($row["price"], 2) . "</td>\n</tr>\n";

                }
                echo "</table>\n";
            } else {
                echo "<h1>404</h1>\nThat's an error.";
            }
        ?>
    </div>

<?php include_once "footer.php"; ?>
