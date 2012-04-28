<?php

/*
 * Graph generation library
 */
require_once ('includes/jpgraph/jpgraph.php');
require_once ('includes/jpgraph/jpgraph_line.php');
require_once ('includes/jpgraph/jpgraph_bar.php');

//hourly received datagram

function getDatagramReceivedHourly($xdata_h, $ydata_h, $ipaddress, $hour) {
    $graph_h = new Graph(480, 320, 'datagram_recieved_hourly.jpeg', 1);
    $graph_h->SetScale('intint', 0, 0, 0, count($xdata_h) - 1);
    $graph_h->img->SetMargin(100, 50, 50, 50);
    $graph_h->xaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_h->xaxis->SetLabelMargin(10);
    $graph_h->xaxis->SetTitleMargin(10);
    $graph_h->title->Set("Datagram Recieved  in this hour: " . $hour);
    $graph_h->yaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_h->yaxis->SetLabelMargin(10);
    $graph_h->yaxis->SetTitleMargin(60);
    $graph_h->xaxis->title->Set('Min(s)');
    $graph_h->yaxis->title->Set('No of Datagrams');
    $graph_h->xaxis->SetTickLabels($xdata_h);
// Create the linear plot
    $lineplot_h = new BarPlot($ydata_h);
    $lineplot_h->SetLegend($ipaddress);
    $lineplot_h->SetColor("blue");
    $lineplot_h->SetWeight(5);
    $lineplot_h->SetFillColor('blue@0.5');
// Add the plot to the graph
    $graph_h->Add($lineplot_h);
// Display the graph
    $graph_h->Stroke('tmp/datagram_recieved_hourly.jpeg');
}

//Daily received datagram
function getDatagramReceivedDaily($xdata_d, $ydata_d, $ipaddress, $day) {
    $graph_d = new Graph(480, 320);
    $graph_d->SetScale('intint', 0, 0, 0, count($xdata_d) - 1);
    $graph_d->img->SetMargin(100, 50, 50, 50);
    $graph_d->xaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_d->xaxis->SetLabelMargin(10);
    $graph_d->xaxis->SetTitleMargin(10);
    $graph_d->title->Set("Datagram Recieved in this day: " . $day);
    $graph_d->xaxis->title->Set('Hour(s)');
    $graph_d->yaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_d->yaxis->SetLabelMargin(10);
    $graph_d->yaxis->SetTitleMargin(60);
    $graph_d->yaxis->title->Set('No of Datagrams');
    $graph_d->xaxis->SetTickLabels($xdata_d);
// Create the linear plot
    $lineplot_d = new BarPlot($ydata_d);
    $lineplot_d->SetLegend($ipaddress);
    $lineplot_d->SetColor("blue");
    $lineplot_d->SetWeight(5);
    $lineplot_d->SetFillColor('blue@0.5');

// Add the plot to the graph
    $graph_d->Add($lineplot_d);

// Display the graph
    $graph_d->Stroke('tmp/datagram_recieved_daily.jpeg');
}


function getDatagramReceivedMonthly($xdata_m, $ydata_m, $ipaddress, $month) {
    $graph_m = new Graph(480, 320);
    $graph_m->SetScale('intint', 0, 0, 0, count($xdata_m) - 1);
    $graph_m->img->SetMargin(100, 50, 50, 50);
    $graph_m->xaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_m->xaxis->SetLabelMargin(10);
    $graph_m->xaxis->SetTitleMargin(10);
    $graph_m->title->Set("Datagram Recieved in this month: " . $month);
    $graph_m->xaxis->title->Set('Day(s)');
    $graph_m->yaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_m->yaxis->SetLabelMargin(10);
    $graph_m->yaxis->SetTitleMargin(60);
    $graph_m->yaxis->title->Set('No of Datagrams');
    $graph_m->xaxis->SetTickLabels($xdata_m);
// Create the linear plot
    $lineplot_m = new BarPlot($ydata_m);
    $lineplot_m->SetLegend($ipaddress);
    $lineplot_m->SetColor("blue");
    $lineplot_m->SetWeight(5);
    $lineplot_m->SetFillColor('blue@0.5');

// Add the plot to the graph
    $graph_m->Add($lineplot_m);

// Display the graph
    $graph_m->Stroke('tmp/datagram_recieved_monthly.jpeg');
}

function getDatagramReceivedYearly($xdata_y, $ydata_y, $ipaddress, $year) {
    $graph_y = new Graph(480, 320);
    $graph_y->SetScale('intint', 0, 0, 0, count($xdata_y) - 1);
    $graph_y->img->SetMargin(100, 50, 50, 50);
    $graph_y->xaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_y->xaxis->SetLabelMargin(10);
    $graph_y->xaxis->SetTitleMargin(10);
    $graph_y->title->Set("Datagram Recieved in this year: " . $year);
    $graph_y->xaxis->title->Set('Month(s)');
    $graph_y->yaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_y->yaxis->SetLabelMargin(10);
    $graph_y->yaxis->SetTitleMargin(60);
    $graph_y->yaxis->title->Set('No of Datagrams');
    $graph_y->xaxis->SetTickLabels($xdata_y);
// Create the linear plot
    $lineplot_y = new BarPlot($ydata_y);
    $lineplot_y->SetLegend($ipaddress);
    $lineplot_y->SetColor("blue");
    $lineplot_y->SetWeight(5);
    $lineplot_y->SetFillColor('blue@0.5');

// Add the plot to the graph
    $graph_y->Add($lineplot_y);

// Display the graph
    $graph_y->Stroke('tmp/datagram_recieved_yearly.jpeg');
}

function getDatagramDroppedHourly($xdata_h, $ydata1_h, $ydata2_h, $ydata3_h, $ydata4_h, $hour) {
    $graph_h = new Graph(480, 320);

    $graph_h->SetScale('intint', 0, 0, 0, count($xdata_h) - 1);
    $graph_h->SetYScale(0, 'int');
    $graph_h->SetYScale(1, 'int');
    $graph_h->SetYScale(2, 'int');
//$graph_h->SetYDeltaDist(50);
    $graph_h->img->SetMargin(100, 50, 50, 50);
    $graph_h->xaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_h->xaxis->SetLabelMargin(10);
    $graph_h->xaxis->SetTitleMargin(10);
    $graph_h->title->Set("Dropped Datagram in this hour: " . $hour);
    $graph_h->yaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_h->yaxis->SetLabelMargin(10);
    $graph_h->yaxis->SetTitleMargin(60);
    $graph_h->xaxis->title->Set('Min(s)');
    $graph_h->yaxis->title->Set('No. of Datagrams');
    $graph_h->xaxis->SetTickLabels($xdata_h);

    $barplot1_h = new BarPlot($ydata1_h);
    $barplot1_h->SetLegend('Dropped Datagram');
    $barplot1_h->SetColor("blue");
    $barplot1_h->SetWeight(5);
#$barplot1_h->mark->SetWidth(100);
    $barplot1_h->SetFillColor('blue@0.5');
    $graph_h->Add($barplot1_h);

    $barplot2_h = new BarPlot($ydata2_h);
    $barplot2_h->SetLegend('Dropped for unknown protocols');
    $barplot2_h->SetColor("red");
    $barplot2_h->SetWeight(5);
    $barplot2_h->SetFillColor('red@0.5');
    $graph_h->AddY(0, $barplot2_h);

    $barplot3_h = new BarPlot($ydata3_h);
    $barplot3_h->SetLegend('Invalid address');
    $barplot3_h->SetColor("green");
    $barplot3_h->SetWeight(5);
    $barplot3_h->SetFillColor('green@0.5');
    $graph_h->AddY(1, $barplot3_h);


    $barplot4_h = new BarPlot($ydata4_h);
    $barplot4_h->SetLegend('Invalid header error');
    $barplot4_h->SetColor("orange");
    $barplot4_h->SetWeight(5);
    $barplot4_h->SetFillColor('orange@0.5');
    $graph_h->AddY(2, $barplot4_h);

    $graph_h->Stroke('tnp/datagram_dropped_hourly.jpeg');
}

function getDatagramDroppedDaily($xdata_d, $ydata1_d, $ydata2_d, $ydata3_d, $ydata4_d, $day) {
    $graph_d = new Graph(480, 320);
    $graph_d->SetScale('intint', 0, 0, 0, count($xdata_d) - 1);
    $graph_d->SetYScale(0, 'int');
    $graph_d->SetYScale(1, 'int');
    $graph_d->SetYScale(2, 'int');
//$graph_d->SetYDeltaDist(50);
    $graph_d->img->SetMargin(100, 50, 50, 50);
    $graph_d->xaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_d->xaxis->SetLabelMargin(10);
    $graph_d->xaxis->SetTitleMargin(10);
    $graph_d->title->Set("Dropped Datagram in this day: " . $day);
    $graph_d->yaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_d->yaxis->SetLabelMargin(10);
    $graph_d->yaxis->SetTitleMargin(60);
    $graph_d->xaxis->title->Set('Hour(s)');
    $graph_d->yaxis->title->Set('No. of Datagrams');
    $graph_d->xaxis->SetTickLabels($xdata_d);

    $barplot1_d = new BarPlot($ydata1_d);
    $barplot1_d->SetLegend('Dropped Datagram');
    $barplot1_d->SetColor("blue");
    $barplot1_d->SetWeight(5);
    $barplot1_d->SetFillColor('blue@0.5');
    $graph_d->Add($barplot1_d);

    $barplot2_d = new BarPlot($ydata2_d);
    $barplot2_d->SetLegend('Dropped for unknown protocols');
    $barplot2_d->SetColor("red");
    $barplot2_d->SetWeight(5);
    $barplot2_d->SetFillColor('red@0.5');
    $graph_d->AddY(0, $barplot2_d);

    $barplot3_d = new BarPlot($ydata3_d);
    $barplot3_d->SetLegend('Invalid address');
    $barplot3_d->SetColor("green");
    $barplot3_d->SetWeight(5);
    $barplot3_d->SetFillColor('green@0.5');
    $graph_d->AddY(1, $barplot3_d);


    $barplot4_d = new BarPlot($ydata4_d);
    $barplot4_d->SetLegend('Invalid header error');
    $barplot4_d->SetColor("orange");
    $barplot4_d->SetWeight(5);
    $barplot4_d->SetFillColor('orange@0.5');
    $graph_d->AddY(2, $barplot4_d);
    $graph_d->Stroke('tmp/datagram_dropped_daily.jpeg');
}


function getDatagramDroppedMonthly($xdata_m, $ydata1_m, $ydata2_m, $ydata3_m, $ydata4_m, $month) {
    $graph_m = new Graph(480, 320);

    $graph_m->SetScale('intint', 0, 0, 0, count($xdata_m) - 1);
    $graph_m->SetYScale(0, 'int');
    $graph_m->SetYScale(1, 'int');
    $graph_m->SetYScale(2, 'int');
//$graph_m->SetYDeltaDist(50);
    $graph_m->img->SetMargin(100, 50, 50, 50);
    $graph_m->xaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_m->xaxis->SetLabelMargin(10);
    $graph_m->xaxis->SetTitleMargin(10);
    $graph_m->title->Set("Dropped Datagram in this month: " . $month);
    $graph_m->yaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_m->yaxis->SetLabelMargin(10);
    $graph_m->yaxis->SetTitleMargin(60);
    $graph_m->xaxis->title->Set('Day(s)');
    $graph_m->yaxis->title->Set('No of dropped Datagrams');
    $graph_m->xaxis->SetTickLabels($xdata_m);

    $barplot1_m = new BarPlot($ydata1_m);
    $barplot1_m->SetLegend('Dropped Datagram');
    $barplot1_m->SetColor("blue");
    $barplot1_m->SetWeight(5);
#$barplot1_m->mark->SetWidth(100);
    $barplot1_m->SetFillColor('blue@0.5');
    $graph_m->Add($barplot1_m);

    $barplot2_m = new BarPlot($ydata2_m);
    $barplot2_m->SetLegend('Dropped for unknown protocols');
    $barplot2_m->SetColor("red");
    $barplot2_m->SetWeight(5);
    $barplot2_m->SetFillColor('red@0.5');
    $graph_m->AddY(0, $barplot2_m);

    $barplot3_m = new BarPlot($ydata3_m);
    $barplot3_m->SetLegend('Invalid destination address');
    $barplot3_m->SetColor("green");
    $barplot3_m->SetWeight(5);
    $barplot3_m->SetFillColor('green@0.5');
    $graph_m->AddY(1, $barplot3_m);


    $barplot4_m = new BarPlot($ydata4_m);
    $barplot4_m->SetLegend('Invalid header error');
    $barplot4_m->SetColor("orange");
    $barplot4_m->SetWeight(5);
    $barplot4_m->SetFillColor('orange@0.5');
    $graph_m->AddY(2, $barplot4_m);

    $graph_m->Stroke('tmp/datagram_dropped_monthly.jpeg');
}

function getDatagramDroppedYearly($xdata_y, $ydata1_y, $ydata2_y, $ydata3_y, $ydata4_y, $year) {
    $graph_y = new Graph(480, 320);
    $graph_y->SetScale('intint', 0, 0, 0, count($xdata_y) - 1);
    $graph_y->SetYScale(0, 'int');
    $graph_y->SetYScale(1, 'int');
    $graph_y->SetYScale(2, 'int');
    $graph_y->img->SetMargin(100, 50, 50, 50);
    $graph_y->xaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_y->xaxis->SetLabelMargin(10);
    $graph_y->xaxis->SetTitleMargin(10);
    $graph_y->title->Set("Dropped Datagram in this year: " . $year);
    $graph_y->yaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_y->yaxis->SetLabelMargin(10);
    $graph_y->yaxis->SetTitleMargin(60);
    $graph_y->xaxis->title->Set('Month(s)');
    $graph_y->yaxis->title->Set('No of Datagrams');
    $graph_y->xaxis->SetTickLabels($xdata_y);

    $barplot1_y = new BarPlot($ydata1_y);
    $barplot1_y->SetLegend('Dropped Datagram');
    $barplot1_y->SetColor("blue");
    $barplot1_y->SetWeight(5);
#$barplot1_y->mark->SetWidth(100);
    $barplot1_y->SetFillColor('blue@0.5');
    $graph_y->Add($barplot1_y);

    $barplot2_y = new BarPlot($ydata2_y);
    $barplot2_y->SetLegend('Dropped for unknown protocols');
    $barplot2_y->SetColor("red");
    $barplot2_y->SetWeight(5);
    $barplot2_y->SetFillColor('red@0.5');
    $graph_y->AddY(0, $barplot2_y);

    $barplot3_y = new BarPlot($ydata3_y);
    $barplot3_y->SetLegend('Invalid address');
    $barplot3_y->SetColor("green");
    $barplot3_y->SetWeight(5);
    $barplot3_y->SetFillColor('green@0.5');
    $graph_y->AddY(1, $barplot3_y);


    $barplot4_y = new BarPlot($ydata4_y);
    $barplot4_y->SetLegend('Invalid header error');
    $barplot4_y->SetColor("orange");
    $barplot4_y->SetWeight(5);
    $barplot4_y->SetFillColor('orange@0.5');
    $graph_y->AddY(2, $barplot4_y);
    $graph_y->Stroke('tmp/datagram_dropped_yearly.jpeg');
}
