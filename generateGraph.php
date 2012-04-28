<?php
function generateDatagramReceivedHourly($ipaddress) {
    $ydata_h = array();
    $xdata_h = array();

    $graph_data_h = get_packet_forwarding_info($ipaddress);

    if ($graph_data_h) {
        while ($row_h = mysql_fetch_array($graph_data_h)) {
            array_push($ydata_h, trim($row_h['ip_in_receives']));
            array_push($xdata_h, date('i', strtotime(trim($row_h['date_time']))));
            $hour = date('H:D', strtotime(trim($row_h['date_time'])));
        }
        if (count($xdata_h) >= 1 && max($ydata_h) > 1) {
            getDatagramReceivedHourly($xdata_h, $ydata_h, $ipaddress, $hour);
            
            echo "<tr><td valign=\"top\">";
            echo "<h2>Datagram Received of $ipaddress at Hour:$hour</h2>";
            $max = max($ydata_h);
            $min = min($ydata_h);
            $index_mx = array_search($max, $ydata_h);
            $index_mn = array_search($min, $ydata_h);
            $total = array_sum($ydata_h);
            $no_samples = count($xdata_h);
            $avg = floor($total / $no_samples);
            echo "<ul class=\"graphs\">";
            echo "<li><b>Max Datagram Received at: </b>$xdata_h[$index_mx] &<b>received: </b>$max per 5min</li>";
            echo "<li><b>Min Datagram Received at: </b>$xdata_h[$index_mn] &<b>received: </b>$min per 5min</li>";
            echo "<li><b>Total Datagram received:  </b>$total</li>";
            echo "<li><b>Average Datagram received:</b>$avg</li>";
            echo "</ul>";
            echo "</td><td>";
            echo "<img src='tmp/datagram_recieved_hourly.jpeg'>";
            echo "</td></tr>";
            
        } else {
            echo "<tr><td colspan='2'><h2>No received datagram in this hour</h2></td></tr>";
        }
    } else {
        echo "<tr><td colspan='2'><h2>Database Empty...!!!</h2></td></tr>";
    }
}

function generateDatagramReceivedDaily($ipaddress) {
    $ydata_d = array();
    $xdata_d = array();

    $graph_data_d = get_packet_forwarding_info_daily($ipaddress);

    if ($graph_data_d) {
        while ($row_d = mysql_fetch_array($graph_data_d)) {
            array_push($ydata_d, trim($row_d['ip_in_receives']));
            array_push($xdata_d, date('H', strtotime(trim($row_d['date_time']))));
            $day = date('D-M', strtotime(trim($row_d['date_time'])));
        }
        if (count($xdata_d) >= 1 && max($ydata_d) > 1) {
            getDatagramReceivedDaily($xdata_d, $ydata_d, $ipaddress, $day);
           
            echo "<tr><td valign=\"top\">";
            echo "<h2>Datagram Received of $ipaddress at $day</h2>";
            $max = max($ydata_d);
            $min = min($ydata_d);
            $index_mx = array_search($max, $ydata_d);
            $index_mn = array_search($min, $ydata_d);
            $total = array_sum($ydata_d);
            $no_samples = count($xdata_d);
            $avg = floor($total / $no_samples);
            echo "<ul class=\"graphs\">";
            echo "<li><b>Max Datagram Received at: </b>$xdata_d[$index_mx] & <b>received: </b>$max per hour</li>";
            echo "<li><b>Min Datagram Received at: </b>$xdata_d[$index_mn] & <b>received: </b>$min per hour</li>";
            echo "<li><b>Total Datagram received:  </b>$total</li>";
            echo "<li><b>Average Datagram received:</b>$avg</li>";
            echo "</ul>";
            echo "</td><td>";
            echo "<img src='tmp/datagram_recieved_daily.jpeg'>";
            echo "</td></tr>";
           
        } else {
            echo "<tr><td colspan='2'><h2>No received datagram in this day</h2></td></tr>";
        }
    } else {
        echo "<tr><td colspan='2'><h2>Database Empty...!!!</h2></td></tr>";
    }
}

function generateDatagramReceivedMonthly($ipaddress) {
    $ydata_m = array();
    $xdata_m = array();

    $graph_data_m = get_packet_forwarding_info_monthly($ipaddress);

    if ($graph_data_m) {
        while ($row_m = mysql_fetch_array($graph_data_m)) {
            array_push($ydata_m, trim($row_m['ip_in_receives']));
            array_push($xdata_m, date('d', strtotime(trim($row_m['date_time']))));
            $month = date('M-Y', strtotime(trim($row_m['date_time'])));
        }
        if (count($xdata_m) >= 1 && max($ydata_m) > 1) {
            getDatagramReceivedMonthly($xdata_m, $ydata_m, $ipaddress, $month);
            
            echo "<tr><td valign=\"top\">";
            echo "<h2>Datagram Received of $ipaddress at $month</h2>";
            $max = max($ydata_m);
            $min = min($ydata_m);
            $index_mx = array_search($max, $ydata_m);
            $index_mn = array_search($min, $ydata_m);
            $total = array_sum($ydata_m);
            $no_samples = count($xdata_m);
            $avg = floor($total / $no_samples);
            echo "<ul class=\"graphs\">";
            echo "<li><b>Max Datagram Received at: </b>$xdata_m[$index_mx] & <b>received: </b>$max per day</li>";
            echo "<li><b>Min Datagram Received at: </b>$xdata_m[$index_mn] & <b>received: </b>$min per day</li>";
            echo "<li><b>Total Datagram received:  </b>$total</li>";
            echo "<li><b>Average Datagram received:</b>$avg</li>";
            echo "</ul>";
            echo "</td><td>";
            echo "<img src='tmp/datagram_recieved_monthly.jpeg'>";
            echo "</td></tr>";
            
            
        } else {
            echo "<tr><td colspan='2'><h2>No received datagram in this month</h2></td></tr>";
        }
    } else {
        echo "<tr><td colspan='2'><h2>Database Empty...!!!</h2></td></tr>";
    }
}

function generateDatagramReceivedYearly($ipaddress) {
    $ydata_y = array();
    $xdata_y = array();

    $graph_data_y = get_packet_forwarding_info_yearly($ipaddress);

    if ($graph_data_y) {
        while ($row_y = mysql_fetch_array($graph_data_y)) {
            array_push($ydata_y, trim($row_y['ip_in_receives']));
            array_push($xdata_y, date('M', strtotime(trim($row_y['date_time']))));
            $year = date('Y', strtotime(trim($row_y['date_time'])));
        }
        if (count($xdata_y) >= 1 && max($ydata_y) > 1) {
            getDatagramReceivedYearly($xdata_y, $ydata_y, $ipaddress, $year);
            
            echo "<tr><td valign=\"top\">";
            echo "<h2>Datagram Received of $ipaddress at $year</h2>";
            $max = max($ydata_y);
            $min = min($ydata_y);
            $index_mx = array_search($max, $ydata_y);
            $index_mn = array_search($min, $ydata_y);
            $total = array_sum($ydata_y);
            $no_samples = count($xdata_y);
            $avg = floor($total / $no_samples);
            echo "<ul class=\"graphs\">";
            echo "<li><b>Max Datagram Received at: </b>$xdata_y[$index_mx] & <b>received: </b>$max per month</li>";
            echo "<li><b>Min Datagram Received at: </b>$xdata_y[$index_mn] & <b>received: </b>$min per month</li>";
            echo "<li><b>Total Datagram received:  </b>$total</li>";
            echo "<li><b>Average Datagram received:</b>$avg</li>";
            echo "</ul>";
            echo "</td><td>";
            echo "<img src='tmp/datagram_recieved_yearly.jpeg'>";
            echo "</td></tr>";
            
        } else {
            echo "<tr><td colspan='2'><h2>No received datagram in this year</h2></td></tr>";
        }
    } else {
        echo "<tr><td colspan='2'><h2>Database Empty...!!!</h2></td></tr>";
    }
}

function generateDatagramDroppedHourly($ipaddress) {
    $ydata1_h = array();
    $ydata2_h = array();
    $ydata3_h = array();
    $ydata4_h = array();
    $xdata_h = array();

    $graph_data_h = get_packet_forwarding_info($ipaddress);

    if ($graph_data_h) {
        while ($row_h = mysql_fetch_array($graph_data_h)) {
            array_push($ydata1_h, trim($row_h['ip_in_discards']));
            array_push($ydata2_h, trim($row_h['ipInUnknownProtos']));
            array_push($ydata3_h, trim($row_h['ipInAddrErrors']));
            array_push($ydata4_h, trim($row_h['ipInHdrErrors']));
            array_push($xdata_h, date('i', strtotime(trim($row_h['date_time']))));
            $hour = date('H:D', strtotime(trim($row_h['date_time'])));
        }
        if (count($xdata_h) >= 1 && max($ydata1_h) > 1) {
            getDatagramDroppedHourly($xdata_h, $ydata1_h, $ydata2_h, $ydata3_h, $ydata4_h, $hour);
            
            echo "<tr><td valign=\"top\">";
            echo "<h2>Datagram Dropped of $ipaddress at hour: $hour</h2>";
            $max = max($ydata1_h);
            $min = min($ydata1_h);
            $index_mx = array_search($max, $ydata1_h);
            $index_mn = array_search($min, $ydata1_h);
            $total = array_sum($ydata1_h);
            $no_samples = count($xdata_h);
            $avg = floor($total / $no_samples);
            echo "<ul class=\"graphs\">";
            echo "<li><b>Max Datagram Dropped at: </b>$xdata_h[$index_mx] & <b>received: </b>$max per 5min</li>";
            echo "<li><b>Min Datagram Dropped at: </b>$xdata_h[$index_mn] & <b>received: </b>$min per 5min</li>";
            echo "<li><b>Total Datagram Dropped:  </b>$total</li>";
            echo "<li><b>Average Datagram Dropped:</b>$avg</li>";
            echo "</ul>";
            echo "</td><td>";
            echo "<img src='tmp/datagram_dropped_hourly.jpeg'>";
            echo "</td></tr>";
           
        } else {
            echo "<tr><td colspan='2'><h2>No drooped datagram in this hour<h2></td></tr>";
        }
    } else {
        echo "<tr><td colspan='2'><h2>Database Empty...!!!</h2></td></tr>";
    }
}

function generateDatagramDroppedDaily($ipaddress) {
    $ydata1_d = array();
    $ydata2_d = array();
    $ydata3_d = array();
    $ydata4_d = array();
    $xdata_d = array();

    $graph_data_d = get_packet_forwarding_info_daily($ipaddress);

    if ($graph_data_d) {
        while ($row_d = mysql_fetch_array($graph_data_d)) {
            array_push($ydata1_d, trim($row_d['ip_in_discards']));
            array_push($ydata2_d, trim($row_d['ipInUnknownProtos']));
            array_push($ydata3_d, trim($row_d['ipInAddrErrors']));
            array_push($ydata4_d, trim($row_d['ipinHdrErrors']));
            array_push($xdata_d, date('H', strtotime(trim($row_d['date_time']))));
            $day = date('M-d', strtotime(trim($row_d['date_time'])));
        }
        if (count($xdata_d) >= 1 && max($ydata1_d) > 1) {
            getDatagramDroppedDaily($xdata_d, $ydata1_d, $ydata2_d, $ydata3_d, $ydata4_d, $day);
            
            echo "<tr><td  valign=\"top\">";
            echo "<h2>Datagram Dropped of $ipaddress at $day</h2>";
            $max = max($ydata1_d);
            $min = min($ydata1_d);
            $index_mx = array_search($max, $ydata1_d);
            $index_mn = array_search($min, $ydata1_d);
            $total = array_sum($ydata1_d);
            $no_samples = count($xdata_d);
            $avg = floor($total / $no_samples);
            echo "<ul class=\"graphs\">";
            echo "<li><b>Max Datagram Dropped at: </b>$xdata_d[$index_mx] & <b>received: </b>$max per hour</li>";
            echo "<li><b>Min Datagram Dropped at: </b>$xdata_d[$index_mn] & <b>received: </b>$min per hour</li>";
            echo "<li><b>Total Datagram Dropped:  </b>$total</li>";
            echo "<li><b>Average Datagram Dropped:</b>$avg</li>";
            echo "</ul>";
            echo "</td><td>";
            echo "<img src='tmp/datagram_dropped_daily.jpeg'>";
            echo "</td></tr>";
            
            
        } else {
            echo "<tr><td colspan='2'><h2>No dropped datagram in this day<h2></td></tr>";
        }
    } else {
        echo "<tr><td colspan='2'><h2>Database Empty...!!!</h2></td></tr>";
    }
}

function generateDatagramDroppedMonthly($ipaddress) {
    $ydata1_m = array();
    $ydata2_m = array();
    $ydata3_m = array();
    $ydata4_m = array();
    $xdata_m = array();

    $graph_data_m = get_packet_forwarding_info_monthly($ipaddress);

    if ($graph_data_m) {
        while ($row_m = mysql_fetch_array($graph_data_m)) {
            array_push($ydata1_m, trim($row_m['ip_in_discards']));
            array_push($ydata2_m, trim($row_m['ipInUnknownProtos']));
            array_push($ydata3_m, trim($row_m['ipInAddrErrors']));
            array_push($ydata4_m, trim($row_m['ipinHdrErrors']));
            array_push($xdata_m, date('d', strtotime(trim($row_m['date_time']))));
            $month = date('m-Y', strtotime(trim($row_m['date_time'])));
        }
        if (count($xdata_m) >= 1 && max($ydata1_m) > 1) {
            getDatagramDroppedMonthly($xdata_m, $ydata1_m, $ydata2_m, $ydata3_m, $ydata4_m, $month);
            
            echo "<tr><td valign=\"top\">";
            echo "<h2>Datagram Dropped of $ipaddress at $month</h2>";
            $max = max($ydata1_m);
            $min = min($ydata1_m);
            $index_mx = array_search($max, $ydata1_d);
            $index_mn = array_search($min, $ydata1_d);
            $total = array_sum($ydata1_m);
            $no_samples = count($xdata_m);
            $avg = floor($total / $no_samples);
            echo "<ul class=\"graphs\">";
            echo "<li><b>Max Datagram Dropped at: </b>$xdata_m[$index_mx] & <b>received: </b>$max per day</li>";
            echo "<li><b>Min Datagram Dropped at: </b>$xdata_m[$index_mn] & <b>received: </b>$min per day</li>";
            echo "<li><b>Total Datagram Dropped:  </b>$total</li>";
            echo "<li><b>Average Datagram Dropped:</b>$avg</li>";
            echo "</ul>";
            echo "</td><td>";
            echo "<img src='tmp/datagram_dropped_monthly.jpeg'>";
            echo "</td></tr>";
           
            
        } else {
            echo "<tr><td colspan='2'><h2>No dropped datagram in this month<h2></td></tr>";
        }
    } else {
        echo "<tr><td colspan='2'><h2>Database Empty...!!!</h2></td></tr>";
    }
}

function generateDatagramDroppedYearly($ipaddress) {
    $ydata1_y = array();
    $ydata2_y = array();
    $ydata3_y = array();
    $ydata4_y = array();
    $xdata_y = array();

    $graph_data_y = get_packet_forwarding_info_yearly($ipaddress);

    if ($graph_data_y) {
        while ($row_y = mysql_fetch_array($graph_data_y)) {
            array_push($ydata1_y, trim($row_y['ip_in_discards']));
            array_push($ydata2_y, trim($row_y['ipInUnknownProtos']));
            array_push($ydata3_y, trim($row_y['ipInAddrErrors']));
            array_push($ydata4_y, trim($row_y['ipInHdrErrors']));
            array_push($xdata_y, date('m', strtotime(trim($row_y['date_time']))));
            $year = date('Y', strtotime(trim($row_y['date_time'])));
        }
        if (count($xdata_y) >= 1 && max($ydata1_y) > 1) {
            getDatagramDroppedYearly($xdata_y, $ydata1_y, $ydata2_y, $ydata3_y, $ydata4_y, $year);
            
            echo "<tr><td valign=\"top\">";
            echo "<h2>Datagram Dropped of $ipaddress at $month</h2>";
            $max = max($ydata1_y);
            $min = min($ydata1_y);
            $index_mx = array_search($max, $ydata1_d);
            $index_mn = array_search($min, $ydata1_d);
            $total = array_sum($ydata1_y);
            $no_samples = count($xdata_y);
            $avg = floor($total / $no_samples);
            echo "<ul class=\"graphs\">";
            echo "<li><b>Max Datagram Dropped at: </b>$xdata_y[$index_mx] & <b> </b>$max per month</li>";
            echo "<li><b>Min Datagram Dropped at: </b>$xdata_y[$index_mn] & <b> </b>$min per month</li>";
            echo "<li><b>Total Datagram Dropped:  </b>$total</li>";
            echo "<li><b>Average Datagram Dropped:</b>$avg</li>";
            echo "</ul>";
            echo "</td><td>";
            echo "<img src='tmp/datagram_dropped_yearly.jpeg'>";
            echo "</td></tr>";
            
            
        } else {
            echo "<tr><td colspan='2'><h2>No dropped datagram in this year<h2></td></tr>";
        }
    } else {
        echo "<tr><td colspan='2'><h2>Database Empty...!!!</h2></td></tr>";
    }
}

function generateFragmentReceivedHourly($ipaddress) {
    $ydata_h = array();
    $xdata_h = array();

    $graph_hata_h = get_packet_fragmentation_info($ipaddress);

    if ($graph_hata_h) {
        while ($row_h = mysql_fetch_array($graph_hata_h)) {
            array_push($ydata_h, trim($row_h['ip_reasmble_rqds']));
            array_push($xdata_h, date('i', strtotime(trim($row_h['date_time']))));
            $hour = date('H:D', strtotime(trim($row_h['date_time'])));
        }
        if (count($xdata_h) >= 1 && max($ydata_h) > 1) {
            getFragmentReceivedHourly($xdata_h, $ydata_h, $ipaddress, $hour);
            
            echo "<tr><td valign=\"top\">";
            echo "<h2>Fragments received of $ipaddress at Hour: $hour</h2>";
            $max = max($ydata_h);
            $min = min($ydata_h);
            $index_mx = array_search($max, $ydata_h);
            $index_mn = array_search($min, $ydata_h);
            $total = array_sum($ydata_h);
            $no_samples = count($xdata_h);
            $avg = floor($total / $no_samples);
            echo "<ul class=\"graphs\">";
            echo "<li><b>Max Fragments Received at: </b>$xdata_h[$index_mx] & $max per 5min</li>";
            echo "<li><b>Min Fragments Received at: </b>$xdata_h[$index_mn] & $min per 5min</li>";
            echo "<li><b>Total Fragments received:  </b>$total</li>";
            echo "<li><b>Average Fragments received: </b>$avg</li>";
            echo "</ul>";
            echo "</td><td>";
            echo "<img src='tmp/fragment_received_hourly.jpeg'>";
            echo "</td></tr>";
            
        } else {
            echo "<tr><td colspan='2'><h2>No received fragments in this hour<h2></td></tr>";
        }
    } else {
        echo "<tr><td colspan='2'><h2>Database Empty...!!!</h2></td></tr>";
    }
}

function generateFragmentReceivedDaily($ipaddress) {
    $ydata_d = array();
    $xdata_d = array();

    $graph_data_d = get_packet_fragmentation_info_daily($ipaddress);

    if ($graph_data_d) {
        while ($row_d = mysql_fetch_array($graph_data_d)) {
            array_push($ydata_d, trim($row_d['ip_reasmble_rqds']));
            array_push($xdata_d, date('H', strtotime(trim($row_d['date_time']))));
            $day = date('d-M', strtotime(trim($row_d['date_time'])));
        }
        if (count($xdata_d) >= 1 && max($ydata_d) > 1) {
            getFragmentReceivedDaily($xdata_d, $ydata_d, $ipaddress, $day);
            
            echo "<tr><td valign=\"top\">";
            echo "<h2>Fragments received $ipaddress at $day</h2>";
            $max = max($ydata_d);
            $min = min($ydata_d);
            $index_mx = array_search($max, $ydata_d);
            $index_mn = array_search($min, $ydata_d);
            $total = array_sum($ydata_d);
            $no_samples = count($xdata_d);
            $avg = floor($total / $no_samples);
            echo "<ul class=\"graphs\">";
            echo "<li><b>Max Fragments Received at: </b>$xdata_d[$index_mx] & <b>received: </b>$max per hour</li>";
            echo "<li><b>Min Fragments Received at: </b>$xdata_d[$index_mn] & <b>received: </b>$min per hour</li>";
            echo "<li><b>Total Fragments received:  </b>$total</li>";
            echo "<li><b>Average Fragments received:</b>$avg</li>";
            echo "</ul>";
            echo "</td><td>";
            echo "<img src='tmp/fragment_received_daily.jpeg'>";
            echo "</td></tr>";
           
        } else {
            echo "<tr><td colspan='2'><h2>No received fragments in this hour<h2></td></tr>";
        }
    } else {
        echo "<tr><td colspan='2'><h2>Database Empty...!!!</h2></td></tr>";
    }
}

function generateFragmentReceivedMonthly($ipaddress) {

    $ydata_m = array();
    $xdata_m = array();

    $graph_data_m = get_packet_fragmentation_info_monthly($ipaddress);

    if ($graph_data_m) {
        while ($row_m = mysql_fetch_array($graph_data_m)) {
            array_push($ydata_m, trim($row_m['ip_reasmble_rqds']));
            array_push($xdata_m, date('d', strtotime(trim($row_m['date_time']))));
            $month = date('M-Y', strtotime(trim($row_m['date_time'])));
        }
        if (count($xdata_m) >= 1 && max($ydata_m) > 1) {
            getFragmentReceivedMonthly($xdata_m, $ydata_m, $ipaddress, $month);
            
            echo "<tr><td valign=\"top\">";
            echo "<h2>Fragments received of $ipaddress at $month</h2>";
            $max = max($ydata_m);
            $min = min($ydata_m);
            $index_mx = array_search($max, $ydata_m);
            $index_mn = array_search($min, $ydata_m);
            $total = array_sum($ydata_m);
            $no_samples = count($xdata_m);
            $avg = floor($total / $no_samples);
            echo "<ul class=\"graphs\">";
            echo "<li><b>Max Fragments Received at: </b>$xdata_m[$index_mx] & <b>received: </b>$max per day</li>";
            echo "<li><b>Min Fragments Received at: </b>$xdata_m[$index_mn] & <b>received: </b>$min per day</li>";
            echo "<li><b>Total Fragments received:  </b>$total</li>";
            echo "<li><b>Average Fragments received:</b>$avg</li>";
            echo "</ul>";
            echo "</td><td>";
            echo "<img src='tmp/fragment_received_monthly.jpeg'>";
            echo "</td></tr>";
            
            
        } else {
            echo "<tr><td colspan='2'><h2>No received fragments in this month</h2></td></tr>";
        }
    } else {
        echo "<tr><td colspan='2'><h2>Database Empty...!!!</h2></td></tr>";
    }
}

function generateFragmentReceivedYearly($ipaddress) {
    $ydata_y = array();
    $xdata_y = array();

    $graph_yata_y = get_packet_fragmentation_info_yearly($ipaddress);

    if ($graph_yata_y) {
        while ($row_y = mysql_fetch_array($graph_yata_y)) {
            array_push($ydata_y, trim($row_y['ip_reasmble_rqds']));
            array_push($xdata_y, date('m', strtotime(trim($row_y['date_time']))));
            $year = date('Y', strtotime(trim($row_y['date_time'])));
        }
        if (count($xdata_y) >= 1 && max($ydata_y) > 1) {
            getFragmentReceivedYearly($xdata_y, $ydata_y, $ipaddress, $year);
            
            echo "<tr><td valign=\"top\">";
            echo "<h2>Fragments received of $ipaddress at $year</h2>";
            $max = max($ydata_y);
            $min = min($ydata_y);
            $index_mx = array_search($max, $ydata_y);
            $index_mn = array_search($min, $ydata_y);
            $total = array_sum($ydata_y);
            $no_samples = count($xdata_y);
            $avg = floor($total / $no_samples);
            echo "<ul class=\"graphs\">";
            echo "<li><b>Max Fragments Received at: </b>$xdata_y[$index_mx] & <b>received: </b>$max per month</li>";
            echo "<li><b>Min Fragments Received at: </b>$xdata_y[$index_mn] & <b>received: </b>$min per month</li>";
            echo "<li><b>Total Fragments received:  </b>$total</li>";
            echo "<li><b>Average Fragments received:</b>$avg</li>";
            echo "</ul>";
            echo "</td><td>";
            echo "<img src='tmp/fragment_received_yearly.jpeg'>";
            echo "</td></tr>";
           
            
        } else {
            echo "<tr><td colspan='2'><h2>No received fragments in this year</h2></td></tr>";
        }
    } else {
        echo "<tr><td colspan='2'><h2>Database Empty...!!!</h2></td></tr>";
    }
}

function generateFragmentCreatedHourly($ipaddress) {
    $ydata_h = array();
    $xdata_h = array();

    $graph_data_h = get_packet_fragmentation_info($ipaddress);

    if ($graph_data_h) {
        while ($row_h = mysql_fetch_array($graph_data_h)) {
            array_push($ydata_h, trim($row_h['ip_frag_creates']));
            array_push($xdata_h, date('i', strtotime(trim($row_h['date_time']))));
            $hour = date('H:D', strtotime(trim($row_h['date_time'])));
        }
        if (count($xdata_h) >= 1 && max($ydata_h) > 1) {
            getFragmentsCreatedHourly($xdata_h, $ydata_h, $ipaddress, $hour);
           
            echo "<tr><td valign=\"top\">";
            echo "<h2>Fragments created of $ipaddress at Hour: $hour</h2>";
            $max = max($ydata_h);
            $min = min($ydata_h);
            $index_mx = array_search($max, $ydata_h);
            $index_mn = array_search($min, $ydata_h);
            $total = array_sum($ydata_h);
            $no_samples = count($xdata_h);
            $avg = floor($total / $no_samples);
            echo "<ul class=\"graphs\">";
            echo "<li><b>Max Fragments Created at: </b>$xdata_h[$index_mx] &<b>received: </b>$max per 5min</li>";
            echo "<li><b>Min Fragments Created at: </b>$xdata_h[$index_mn] &<b>received: </b>$min per 5min</li>";
            echo "<li><b>Total Fragments Created:  </b>$total</li>";
            echo "<li><b>Average Fragments Created: </b>$avg</li>";
            echo "</ul>";
            echo "</td><td>";
            echo "<img src='tmp/fragments_created_hourly.jpeg'>";
            echo "</td></tr>";
           
            
        } else {
            echo "<tr><td colspan='2'><h2>No  fragment created in this hour</h2></td></tr>";
        }
    } else {
        echo "<tr><td colspan='2'><h2>Database Empty...!!!</h2></td></tr>";
    }
}

function generateFragmentCreatedDaily($ipaddress) {

    $ydata_d = array();
    $xdata_d = array();

    $graph_data_d = get_packet_fragmentation_info_daily($ipaddress);

    if ($graph_data_d) {
        while ($row_d = mysql_fetch_array($graph_data_d)) {
            array_push($ydata_d, trim($row_d['ip_reasmble_rqds']));
            array_push($xdata_d, date('H', strtotime(trim($row_d['date_time']))));
            $day = date('d-M', strtotime(trim($row_d['date_time'])));
        }
        if (count($xdata_d) >= 1 && max($ydata_d) > 1) {
            getFragmentsCreatedDaily($xdata_d, $ydata_d, $ipaddress, $day);
           
            echo "<tr><td valign=\"top\">";
            echo "<h2>Fragments created of $ipaddress at $day</h2>";
            $max = max($ydata_d);
            $min = min($ydata_d);
            $index_mx = array_search($max, $ydata_d);
            $index_mn = array_search($min, $ydata_d);
            $total = array_sum($ydata_d);
            $no_samples = count($xdata_d);
            $avg = floor($total / $no_samples);
            echo "<ul class=\"graphs\">";
            echo "<li><b>Max Fragments Created at: </b>$xdata_d[$index_mx] & <b>received: </b>$max per hour</li>";
            echo "<li><b>Min Fragments Created at: </b>$xdata_d[$index_mn] & <b>received: </b>$min per hour</li>";
            echo "<li><b>Total Fragments Created:  </b>$total</li>";
            echo "<li><b>Average Fragments Created: </b>$avg</li>";
            echo "</ul>";
            echo "</td><td>";
            echo "<img src='tmp/fragments_created_daily.jpeg'>";
            echo "</td></tr>";
           
            
        } else {
            echo "<tr><td colspan='2'><h2>No  fragment created in this day</h2></td></tr>";
        }
    } else {
        echo "<tr><td colspan='2'><h2>Database Empty...!!!</h2></td></tr>";
    }
}

function generateFragmentCreatedMonthly($ipaddress) {
    $ydata_m = array();
    $xdata_m = array();

    $graph_data_m = get_packet_fragmentation_info_monthly($ipaddress);

    if ($graph_data_m) {
        while ($row_m = mysql_fetch_array($graph_data_m)) {
            array_push($ydata_m, trim($row_m['ip_frag_creates']));
            array_push($xdata_m, date('d', strtotime(trim($row_m['date_time']))));
            $month = date('m-Y', strtotime(trim($row_m['date_time'])));
        }
        if (count($xdata_m) >= 1 && max($ydata_m) > 1) {
            getFragmentsCreatedMonthly($xdata_m, $ydata_m, $ipaddress, $month);
           
            echo "<tr><td valign=\"top\">";
            echo "<h2>Fragments created of $ipaddress at $month</h2>";
            $max = max($ydata_m);
            $min = min($ydata_m);
            $index_mx = array_search($max, $ydata_m);
            $index_mn = array_search($min, $ydata_m);
            $total = array_sum($ydata_m);
            $no_samples = count($xdata_m);
            $avg = floor($total / $no_samples);
            echo "<ul class=\"graphs\">";
            echo "<li><b>Max Fragments Created at: </b>$xdata_m[$index_mx] & <b>received: </b>$max per day</li>";
            echo "<li><b>Min Fragments Created at: </b>$xdata_m[$index_mn] & <b>received: </b>$min per day</li>";
            echo "<li><b>Total Fragments Created:  </b>$total</li>";
            echo "<li><b>Average Fragments Created:</b>$avg</li>";
            echo "</ul>";
            echo "</td><td>";
            echo "<img src='tmp/fragments_created_monthly.jpeg'>";
            echo "</td></tr>";
            
            
        } else {
            echo "<tr><td colspan='2'><h2>No  fragment created in this month</h2></td></tr>";
        }
    } else {
        echo "<tr><td colspan='2'><h2>Database Empty...!!!</h2></td></tr>";
    }
}

function generateFragmentCreatedYearly($ipaddress) {
    $ydata_y = array();
    $xdata_y = array();

    $graph_yata_y = get_packet_fragmentation_info_yearly($ipaddress);

    if ($graph_yata_y) {
        while ($row_y = mysql_fetch_array($graph_yata_y)) {
            array_push($ydata_y, trim($row_y['ip_frag_creates']));
            array_push($xdata_y, date('m', strtotime(trim($row_y['date_time']))));
            $year = date('Y', strtotime(trim($row_y['date_time'])));
        }
        if (count($xdata_y) >= 1 && max($ydata_y) > 1) {
            getFragmentsCreatedYearly($xdata_y, $ydata_y, $ipaddress, $year);
            
            echo "<tr><td valign=\"top\">";
            echo "<h2>Fragments created of $ipaddress at $year</h2>";
            $max = max($ydata_y);
            $min = min($ydata_y);
            $index_mx = array_search($max, $ydata_y);
            $index_mn = array_search($min, $ydata_y);
            $total = array_sum($ydata_y);
            $no_samples = count($xdata_y);
            $avg = floor($total / $no_samples);
            echo "<ul class=\"graphs\">";
            echo "<li><b>Max Fragments Created at: </b>$xdata_y[$index_mx] & <b>received: </b>$max per month</li>";
            echo "<li><b>Min Fragments created at: </b>$xdata_y[$index_mn] & <b>received: </b>$min per month</li>";
            echo "<li><b>Total Fragments Created:  </b>$total</li>";
            echo "<li><b>Average Fragments Created:</b>$avg</li>";
            echo "</ul>";
            echo "</td><td>";
            echo "<img src='tmp/fragments_created_yearly.jpeg'>";
            echo "</td></tr>";
           
            
        } else {
            echo "<tr><td colspan='2'><h2>No  fragment created in this year</h2></td></tr>";
        }
    } else {
        echo "<tr><td colspan='2'><h2>Database Empty...!!!</h2></td></tr>";
    }
}

function generateReassembledOksHourly($ipaddress) {
    $ydata_h = array();
    $xdata_h = array();

    $graph_data_h = get_packet_fragmentation_info($ipaddress);

    if ($graph_data_h) {
        while ($row_h = mysql_fetch_array($graph_data_h)) {
            array_push($ydata_h, trim($row_h['ip_reasmble_oks']));
            array_push($xdata_h, date('i', strtotime(trim($row_h['date_time']))));
            $hour = date('H:D', strtotime(trim($row_h['date_time'])));
        }
        if (count($xdata_h) >= 1 && max($ydata_h) > 1) {
            getReassembleOkHourly($xdata_h, $ydata_h, $ipaddress, $hour);
           
            echo "<tr><td valign=\"top\">";
            echo "<h2>Successful reassemble of $ipaddress at Hour: $hour</h2>";
            $max = max($ydata_h);
            $min = min($ydata_h);
            $index_mx = array_search($max, $ydata_h);
            $index_mn = array_search($min, $ydata_h);
            $total = array_sum($ydata_h);
            $no_samples = count($xdata_h);
            $avg = floor($total / $no_samples);
            echo "<ul class=\"graphs\">";
            echo "<li><b>Max Successfully Reassembled at: </b>$xdata_h[$index_mx] &<b>received: </b>$max per 5min</li>";
            echo "<li><b>Min Successfully Reassembled at: </b>$xdata_h[$index_mn] &<b>received: </b>$min per 5min</li>";
            echo "<li><b>Total Successfully Reassembled:  </b>$total</li>";
            echo "<li><b>Average Successfully Reassembled: </b>$avg</li>";
            echo "</ul>";
            echo "</td><td>";
            echo "<img src='tmp/reassembled_ok_hourly.jpeg'>";
            echo "</td></tr>";
            

        } else {
            echo "<tr><td colspan='2'><h2>No reasmbled fragments in this hour</h2></td></tr>";
        }
    } else {
        echo "<tr><td colspan='2'><h2>Database Empty...!!!</h2></td></tr>";
    }
}

function generateReassembledOksDaily($ipaddress) {
    $ydata_d = array();
    $xdata_d = array();
    $graph_data_d = get_packet_fragmentation_info_daily($ipaddress);
    if ($graph_data_d) {
        while ($row_d = mysql_fetch_array($graph_data_d)) {
            array_push($ydata_d, trim($row_d['ip_reasmble_oks']));
            array_push($xdata_d, date('H', strtotime(trim($row_d['date_time']))));
            $day = date('D', strtotime(trim($row_d['date_time'])));
        }
        if (count($xdata_d) >= 1 && max($ydata_d) > 1) {
            getReassembleOkDaily($xdata_d, $ydata_d, $ipaddress, $day);
           
            echo "<tr><td  valign=\"top\">";
            echo "<h2>Successful reassemble of $ipaddress at $day</h2>";
            $max = max($ydata_d);
            $min = min($ydata_d);
            $index_mx = array_search($max, $ydata_d);
            $index_mn = array_search($min, $ydata_d);
            $total = array_sum($ydata_d);
            $no_samples = count($xdata_d);
            $avg = floor($total / $no_samples);
            echo "<ul class=\"graphs\">";
            echo "<li><b>Max succesfully reassembled at: </b>$xdata_d[$index_mx] & <b>rate: </b>$max per hour</li>";
            echo "<li><b>Min succesfully reassembled at: </b>$xdata_d[$index_mn] & <b>rate: </b>$min per hour</li>";
            echo "<li><b>Total succesfully reassembled:  </b>$total</li>";
            echo "<li><b>Average succesfully reassembled: </b>$avg</li>";
            echo "</ul>";
            echo "</td><td>";
            echo "<img src='tmp/reassembled_ok_daily.jpeg'>";
            echo "</td></tr>";
           
            
        } else {
            echo "<tr><td colspan='2'><h2>No reasmbled fragments in this day</h2></td></tr>";
        }
    } else {
        echo "<tr><td colspan='2'><h2>Database Empty...!!!</h2></td></tr>";
    }
}

function generateReassembledOksMonthly($ipaddress) {
    $ydata_m = array();
    $xdata_m = array();

    $graph_mata_m = get_packet_fragmentation_info_monthly($ipaddress);

    if ($graph_mata_m) {
        while ($row_m = mysql_fetch_array($graph_mata_m)) {
            array_push($ydata_m, trim($row_m['ip_reasmble_oks']));
            array_push($xdata_m, date('d', strtotime(trim($row_m['date_time']))));
            $month = date('M', strtotime(trim($row_m['date_time'])));
        }
        if (count($xdata_m) >= 1 && max($ydata_m) > 1) {
            getReassembledOkMonthly($xdata_m, $ydata_m, $ipaddress, $month);
            
            echo "<tr><td>";
            echo "<h2>Successful reassemble of $ipaddress at $month</h2>";
            $max = max($ydata_m);
            $min = min($ydata_m);
            $index_mx = array_search($max, $ydata_m);
            $index_mn = array_search($min, $ydata_m);
            $total = array_sum($ydata_m);
            $no_samples = count($xdata_m);
            $avg = floor($total / $no_samples);
            echo "<ul class=\"graphs\">";
            echo "<li><b>Max successfully reassembled at: </b>$xdata_m[$index_mx] & <b>rate: </b>$max per day</li>";
            echo "<li><b>Min successfully reassembled at: </b>$xdata_m[$index_mn] & <b>rate: </b>$min per day</li>";
            echo "<li><b>Total successfully reassembled:  </b>$total</li>";
            echo "<li><b>Average successfully reassembled: </b>$avg</li>";
            echo "</ul>";
            echo "</td><td>";
            echo "<img src='tmp/reassembled_ok_monthly.jpeg'>";
            echo "</td></tr>";
            
            
        } else {
            echo "<tr><td colspan='2'><h2>No reasmbled fragments in this month</h2></td></tr>";
        }
    } else {
        echo "<tr><td colspan='2'><h2>Database Empty...!!!</h2></td></tr>";
    }
}

function generateReassembledOksYearly($ipaddress) {
    $ydata_y = array();
    $xdata_y = array();

    $graph_yata_y = get_packet_fragmentation_info_yearly($ipaddress);

    if ($graph_yata_y) {
        while ($row_y = mysql_fetch_array($graph_yata_y)) {
            array_push($ydata_y, trim($row_y['ip_reasmble_oks']));
            array_push($xdata_y, date('m', strtotime(trim($row_y['date_time']))));
            $year = date('Y', strtotime(trim($row_y['date_time'])));
        }
        if (count($xdata_y) >= 1 && max($ydata_y) > 1) {
            getReassembledOkYearly($xdata_y, $ydata_y, $ipaddress, $year);
           
            echo "<tr><td valign=\"top\">";
            echo "<h2>Successful reassemble of $ipaddress at $year</h2>";
            $max = max($ydata_y);
            $min = min($ydata_y);
            $index_mx = array_search($max, $ydata_y);
            $index_mn = array_search($min, $ydata_y);
            $total = array_sum($ydata_y);
            $no_samples = count($xdata_y);
            $avg = floor($total / $no_samples);
            echo "<ul class=\"graphs\">";
            echo "<li><b>Max successfully reassembled at: </b>$xdata_y[$index_mx] & <b>rate: </b>$max per month</li>";
            echo "<li><b>Min successfully reassembled at: </b>$xdata_y[$index_mn] & <b>rate: </b>$min per month</li>";
            echo "<li><b>Total successfully reassembled:  </b>$total</li>";
            echo "<li><b>Average successfully reassembled: </b>$avg</li>";
            echo "</ul>";
            echo "</td><td>";
            echo "<img src='tmp/reassembled_ok_yearly.jpeg'>";
            echo "</td></tr>";
            
            
        } else {
            echo "<tr><td colspan='2'><h2>No reasmbled fragments in this year</h2></td></tr>";
        }
    } else {
        echo "<tr><td colspan='2'><h2>Database Empty...!!!</h2></td></tr>";
    }
}

function generateReassembledFailsHourly($ipaddress) {
    $ydata_h = array();
    $xdata_h = array();

    $graph_hata_h = get_packet_fragmentation_info($ipaddress);

    if ($graph_hata_h) {
        while ($row_h = mysql_fetch_array($graph_hata_h)) {
            array_push($ydata_h, trim($row_h['ip_reasmble_fails']));
            array_push($xdata_h, date('i', strtotime(trim($row_h['date_time']))));
            $hour = date('H:D', strtotime(trim($row_h['date_time'])));
        }
        if (count($xdata_h) >= 1 && max($ydata_h) > 1) {
            getReassembleFailedHourly($xdata_h, $ydata_h, $ipaddress, $hour);
            
            echo "<tr><td valign=\"top\">";
            echo "<h2>Reassemble failed of $ipaddress at Hour: $hour</h2>";
            $max = max($ydata_h);
            $min = min($ydata_h);
            $index_mx = array_search($max, $ydata_h);
            $index_mn = array_search($min, $ydata_h);
            $total = array_sum($ydata_h);
            $no_samples = count($xdata_h);
            $avg = floor($total / $no_samples);
            echo "<ul class=\"graphs\">";
            echo "<li><b>Max  Reassemble failed at: </b>$xdata_h[$index_mx] &<b>received: </b>$max per 5min</li>";
            echo "<li><b>Min Reassemble failed at: </b>$xdata_h[$index_mn] &<b>received: </b>$min per 5min</li>";
            echo "<li><b>Total Reassemble failed:  </b>$total</li>";
            echo "<li><b>Average Reassemble failed: </b>$avg</li>";
            echo "</ul>";
            echo "</td><td>";
            echo "<img src='tmp/reassembled_failed_hourly.jpeg'>";
            echo "</td></tr>";
            
            
        } else {
            echo "<tr><td colspan='2'><h2>No  reassemble fail in this hour</h2></td></tr>";
        }
    } else {
        echo "<tr><td colspan='2'><h2>Database Empty...!!!</h2></td></tr>";
    }
}

function generateReassembledFailsDaily($ipaddress) {
    $ydata_d = array();
    $xdata_d = array();

    $graph_data_d = get_packet_fragmentation_info_daily($ipaddress);

    if ($graph_data_d) {
        while ($row_d = mysql_fetch_array($graph_data_d)) {
            array_push($ydata_d, trim($row_d['ip_reasmble_fails']));
            array_push($xdata_d, date('H', strtotime(trim($row_d['date_time']))));
            $day = date('d', strtotime(trim($row_d['date_time'])));
        }
        if (count($xdata_d) >= 1 && max($ydata_d) > 1) {
            getReassembleFailedDaily($xdata_d, $ydata_d, $ipaddress, $day);
           
            echo "<tr><td valign=\"top\">";
            echo "<h2>Reassemble failed of $ipaddress at $day</h2>";
            $max = max($ydata_d);
            $min = min($ydata_d);
            $index_mx = array_search($max, $ydata_d);
            $index_mn = array_search($min, $ydata_d);
            $total = array_sum($ydata_d);
            $no_samples = count($xdata_d);
            $avg = floor($total / $no_samples);
            echo "<ul class=\"graphs\">";
            echo "<li><b>Max Reassemble failed at: </b>$xdata_d[$index_mx] & <b>rate: </b>$max per hour</li>";
            echo "<li><b>Min Reassemble failed at: </b>$xdata_d[$index_mn] & <b>rate: </b>$min per hour</li>";
            echo "<li><b>Total Reassemble failed:  </b>$total</li>";
            echo "<li><b>Average Reassemble failed: </b>$avg</li>";
            echo "</ul>";
            echo "</td><td>";
            echo "<img src='tmp/reassembled_failed_daily.jpeg'>";
            echo "</td></tr>";
           
            
        } else {
            echo "<tr><td colspan='2'><h2>No  reassemble fail in this day</h2></td></tr>";
        }
    } else {
        echo "<tr><td colspan='2'><h2>Database Empty...!!!</h2></td></tr>";
    }
}

function generateReassembledFailsMonthly($ipaddress) {
    $ydata_m = array();
    $xdata_m = array();

    $graph_mata_m = get_packet_fragmentation_info_monthly($ipaddress);

    if ($graph_mata_m) {
        while ($row_m = mysql_fetch_array($graph_mata_m)) {
            array_push($ydata_m, trim($row_m['ip_reasmble_fails']));
            array_push($xdata_m, date('d', strtotime(trim($row_m['date_time']))));
            $month = date('M', strtotime(trim($row_m['date_time'])));
        }
        if (count($xdata_m) >= 1 && max($ydata_m) > 1) {
            getReassembledFailedMonthly($xdata_m, $ydata_m, $ipaddress, $month);
            
            echo "<tr><td valign=\"top\">";
            echo "<h2>Reassemble failed of $ipaddress at $month</h2>";
            $max = max($ydata_m);
            $min = min($ydata_m);
            $index_mx = array_search($max, $ydata_m);
            $index_mn = array_search($min, $ydata_m);
            $total = array_sum($ydata_m);
            $no_samples = count($xdata_m);
            $avg = floor($total / $no_samples);
            echo "<ul class=\"graphs\">";
            echo "<li><b>Max Reassemble failed at: </b>$xdata_m[$index_mx] & <b>rate: </b>$max per day</li>";
            echo "<li><b>Min Reassemble failed at: </b>$xdata_m[$index_mn] & <b>rate: </b>$min per day</li>";
            echo "<li><b>Total Reassemble failed:  </b>$total</li>";
            echo "<li><b>Average Reassemble failed: </b>$avg</li>";
            echo "</ul>";
            echo "</td><td>";
            echo "<img src='tmp/reassembled_failed_monthly.jpeg'>";
            echo "</td></tr>";
           
            
        } else {
            echo "<tr><td colspan='2'><h2>No  reassemble fail in this month</h2></td></tr>";
        }
    } else {
        echo "<tr><td colspan='2'><h2>Database Empty...!!!</h2></td></tr>";
    }
}

function generateReassembledFailsYearly($ipaddress) {
    $ydata_y = array();
    $xdata_y = array();

    $graph_yata_y = get_packet_fragmentation_info_yearly($ipaddress);

    if ($graph_yata_y) {
        while ($row_y = mysql_fetch_array($graph_yata_y)) {
            array_push($ydata_y, trim($row_y['ip_reasmble_fails']));
            array_push($xdata_y, date('m', strtotime(trim($row_y['date_time']))));
            $year = date('Y', strtotime(trim($row_y['date_time'])));
        }
        if (count($xdata_y) >= 1 && max($ydata_y) > 1) {
            getReassembledFailedYearly($xdata_y, $ydata_y, $ipaddress, $year);
           
            echo "<tr><td valign=\"top\">";
            echo "<h2>Reassemble failed of $ipaddress at $year</h2>";
            $max = max($ydata_y);
            $min = min($ydata_y);
            $index_mx = array_search($max, $ydata_y);
            $index_mn = array_search($min, $ydata_y);
            $total = array_sum($ydata_y);
            $no_samples = count($xdata_y);
            $avg = floor($total / $no_samples);
            echo "<ul class=\"graphs\">";
            echo "<li><b>Max Reassemble failed at: </b>$xdata_y[$index_mx] & <b>rate: </b>$max per month</li>";
            echo "<li><b>Min Reassemble failed at: </b>$xdata_y[$index_mn] & <b>rate: </b>$min per month</li>";
            echo "<li><b>Total Reassemble failed:  </b>$total</li>";
            echo "<li><b>Average Reassemble failed: </b>$avg</li>";
            echo "</ul>";
            echo "</td><td>";
            echo "<img src='tmp/reassembled_failed_yearly.jpeg'>";
            echo "</td></tr>";
           
            
        } else {
            echo "<tr><td colspan='2'><h2>No  reassemble fail in this year</h2></td></tr>";
        }
    } else {
       echo "<tr><td colspan='2'><h2>Database Empty...!!!</h2></td></tr>";
    }
}