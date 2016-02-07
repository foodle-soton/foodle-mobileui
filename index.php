<?php
include_once "mobileCheck.php";
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
        <h1>Welcome to Foodlr</h1>
    </div>

    <div class="wrapper">
        <h4>Click on the menu icon above to select a food outlet!</h4>
    </div>

<?php include_once "footer.php"; ?>