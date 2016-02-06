<?php
// Open CSV file of outlets
$csvfile = file_get_contents('./data.csv');

$data = array(
    array(
        "outlet" => "Piazza",
        "category" => "Joe's Wraps",
        "food" => "Cajun Chicken",
        "price" => 2.50
    ),
    array(
        "outlet" => "Piazza",
        "category" => "Chicago Town",
        "food" => "Pepperoni Pizza",
        "price" => 2.50
    ),
    array(
        "outlet" => "Cafe",
        "category" => "Breakfast",
        "food" => "Sausage",
        "price" => 0.50
    )
);

$outlets = array_unique(array_column($data, "outlet"));

var_dump($outlets);


// Check for o parameter passed with GET
$outlet = "";
if(isset($_GET['o'])) {
    $outlet = $_GET['o'];
}



include_once "header.php"; ?>
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
                <a class="navbar-brand" href="#">Foodlr</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <p class="navbar-text">Choose a food outlet:</p>
                    <!-- PULL HEADINGS HERE OUT OF DATABASE -->
                    <li><a href="#">Link1</a></li>
                    <li><a href="#">Link2</a></li>
                    <li><a href="#">Link3</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <!-- MAIN CONTENT WRAPPER -->
    <div class="wrapper">
        <!-- MAIN HEADING -->
        <h1><?php echo $outlet ?></h1>

        <!-- CUISINES -->

        <!-- TEMPLATE -->
        <h3>Street Food</h3>
        <table>
            <tr>
                <td class="colHeading">Item</td>
                <td class="colHeading">Cost</td>
            </tr>
            <tr>
                <td>Baguette</td>
                <td>£2.30</td>
            </tr>
            <tr>
                <td>Coffee</td>
                <td>£1.50</td>
            </tr>
        </table>

        <h3>Joe's Wraps</h3>
        <table>
            <tr>
                <td class="colHeading">Item</td>
                <td class="colHeading">Cost</td>
            </tr>
            <tr>
                <td>Baguette</td>
                <td>£2.30</td>
            </tr>
            <tr>
                <td>Coffee</td>
                <td>£1.50</td>
            </tr>
        </table>
    </div>


<?php include_once "footer.php"; ?>
