<?php
require_once ('webroot.php');
require_once ('includes/basics.php');
require_once ('includes/jpgraph/jpgraph.php');
require_once ('includes/jpgraph/jpgraph_line.php');
require_once ('includes/jpgraph/jpgraph_bar.php');
require_once ('getGraphLibDatagramInfo.php');
require_once ('getGraphLibFragmentsInfo.php');
require_once ('generateGraph.php');
if (!isset($_SESSION['username'])) {
    header('index.php');
}
if (!isset($_SESSION['ipaddress'])) {
    $_SESSION['ipaddress'] = $_GET['address'];
}
$recent = $_GET['recent'];
$ipaddress = $_SESSION['ipaddress'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <title>IP Monitoring System | Statistics</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link  href="http://fonts.googleapis.com/css?family=Ubuntu:300,300italic,regular,italic,500,500italic,bold,bolditalic" rel="stylesheet" type="text/css" />
    </head>

    <body>

        <div class="header">

            <div class="container">

                <div class="nav">

                    <ul>
                        <li><a class="viewnetworkinfo" href="networkmonitor.php">View Network Info</a></li>
                        <li><a class="faq" href="#">FAQ</a></li>
                        <li><form action="logout.php"><input type="submit" value="Logout"/></form></li>
                    </ul>

                </div>

                <h1>IP Monitoring System</h1>

            </div><!--Container-->

        </div><!--Header-->
        <div class="content">

            <div class="container">

                <?php
                echo "<h1 class=\"selected_ip\" id='ip'>" . $ipaddress . "</h1>";
                ?>
                <form  method="get" action="showgraph.php">
                    <p> <select id="selected" name="option">
                            <option value="input_datagrams">Input Datagram</option>
                            <option value="dropped_datagrams">Dropped Datagrams</option>
                            <option value="received_fragments">Fragments Received</option>
                            <option value="reasmbled_fragments_ok">Successfully reassembled fragments</option>
                            <option value="reasmble_fails">Failed reassembling</option>
                            <option value="total_fragments">Total No. of fragments </option>
                        </select>
                        <?php
                        echo "<input type='hidden' name='address' value='" . $ipaddress . "'/>";
                        echo "<input type='hidden' name='recent' value='false'/>";
                        ?>
                        <input type="submit" name="submit" value="Submit"/>
                    </p>
                </form>
                <div class="clear"></div>
                <div class="clear"></div>
                <div id="graph">
                    <?php
                    if (isset($_GET['option']) || $recent == "true") {
                        $option = $_GET['option'];
                        switch ($option) {

//for hourly graph
                            case 'input_datagrams':
                                echo "<table class=\"graph_table\">";

//for daily graph

                                generateDatagramReceivedDaily($ipaddress);
//For monthly graph

                                generateDatagramReceivedMonthly($ipaddress);
// For yearly graph

                                generateDatagramReceivedYearly($ipaddress);
                                echo "</table>";
                                break;

//Show dropped datagrams
                            case 'dropped_datagrams':
                                echo "<table class=\"graph_table\">";
//Hourly dropped data           
//Daily dropped graph
                                generateDatagramDroppedDaily($ipaddress);
//Monthly dropped graph
                                generateDatagramDroppedMonthly($ipaddress);
//Yearly dropped graph
                                generateDatagramDroppedYearly($ipaddress);
                                echo "</table>";
                                break;


                            case 'received_fragments':
                                echo "<table class=\"graph_table\">";

//Hourly received fraagments
//Daily received fragments graph
                                generateFragmentReceivedDaily($ipaddress);
//Monthly received fragments graphs
                                generateFragmentReceivedMonthly($ipaddress);
//Yearly received fragments
                                generateFragmentReceivedYearly($ipaddress);
                                echo "</table>";

                                break;
                            case 'reasmbled_fragments_ok':
                                echo "<table class=\"graph_table\">";

//Hourly reasmbled fragments graph
// Daliy graph
                                generateReassembledOksDaily($ipaddress);
//Monthly graph
                                generateReassembledOksMonthly($ipaddress);
//Yearly graph

                                generateReassembledOksYearly($ipaddress);
                                echo "</table>";

                                break;
                            case 'reasmble_fails':
                                echo "<table class=\"graph_table\">";

//Hourly fails
//Daily
                                generateReassembledFailsDaily($ipaddress);
//Monthly
                                generateReassembledFailsMonthly($ipaddress);
//Yearly
                                generateReassembledFailsYearly($ipaddress);
                                echo "</table>";

                                break;

                            case 'total_fragments':
                                echo "<table class=\"graph_table\">";

                                generateFragmentCreatedDaily($ipaddress);
                                generateFragmentCreatedMonthly($ipaddress);
                                generateFragmentCreatedYearly($ipaddress);
                                echo "</table>";
                                break;
                            default:
                                echo "<table class=\"graph_table\">";
                                generateDatagramReceivedHourly($ipaddress);
                                generateDatagramDroppedHourly($ipaddress);
                                generateFragmentReceivedHourly($ipaddress);
                                generateFragmentCreatedHourly($ipaddress);
                                generateReassembledOksHourly($ipaddress);
                                generateReassembledFailsHourly($ipaddress);
                                echo "</table>";
                                break;
                        }
                    }
                    ?>
                </div>
            </div>
            <!--Container-->

        </div><!--Content-->



        <div class="footer">

            <div class="container">

                <p>2011 &copy; IP Monitoring System</p>

            </div><!--Container-->

        </div><!--Footer-->

    </body>

</html>

