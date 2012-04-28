<?php

function getFragmentReceivedHourly($xdata_h, $ydata_h, $ipaddress, $hour) {
    $graph_h = new Graph(480, 320);
    $graph_h->SetScale('intint', 0, 0, 0, count($xdata_h) - 1);
    $graph_h->img->SetMargin(100, 50, 50, 50);
    $graph_h->xaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_h->xaxis->SetLabelMargin(10);
    $graph_h->xaxis->SetTitleMargin(10);
    $graph_h->title->Set("Fragments reveived  in this hour: " . $hour);
    $graph_h->yaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_h->yaxis->SetLabelMargin(10);
    $graph_h->yaxis->SetTitleMargin(60);
    $graph_h->xaxis->title->Set('Min(s)');
    $graph_h->yaxis->title->Set('No. of framents');
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
    $graph_h->Stroke('tmp/fragment_received_hourly.jpeg');
}

function getFragmentReceivedDaily($xdata_d, $ydata_d, $ipaddress, $day) {
    $graph_h = new Graph(480, 320);
    $graph_h->SetScale('intint', 0, 0, 0, count($xdata_d) - 1);
    $graph_h->img->SetMargin(100, 50, 50, 50);
    $graph_h->xaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_h->xaxis->SetLabelMargin(10);
    $graph_h->xaxis->SetTitleMargin(10);
    $graph_h->title->Set("Fragments reveived  in this day: " . $day);
    $graph_h->yaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_h->yaxis->SetLabelMargin(10);
    $graph_h->yaxis->SetTitleMargin(60);
    $graph_h->xaxis->title->Set('Hour(s)');
    $graph_h->yaxis->title->Set('No. of fragments');
    $graph_h->xaxis->SetTickLabels($xdata_d);
// Create the linear plot
    $lineplot_h = new BarPlot($ydata_d);
    $lineplot_h->SetLegend($ipaddress);
    $lineplot_h->SetColor("blue");
    $lineplot_h->SetWeight(5);
    $lineplot_h->SetFillColor('blue@0.5');

// Add the plot to the graph
    $graph_h->Add($lineplot_h);

// Display the graph
    $graph_h->Stroke('tmp/fragment_received_daily.jpeg');
}


function getFragmentReceivedMonthly($xdata_m, $ydata_m, $ipaddress, $month) {
    $graph_m = new Graph(480, 320);
    $graph_m->SetScale('intint', 0, 0, 0, count($xdata_m) - 1);
    $graph_m->img->SetMargin(100, 50, 50, 50);
    $graph_m->xaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_m->xaxis->SetLabelMargin(10);
    $graph_m->xaxis->SetTitleMargin(10);
    $graph_m->title->Set("Fragments received  in this month: " . $month);
    $graph_m->yaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_m->yaxis->SetLabelMargin(10);
    $graph_m->yaxis->SetTitleMargin(60);
    $graph_m->xaxis->title->Set('Day(s)');
    $graph_m->yaxis->title->Set('No of Fragments');
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
    $graph_m->Stroke('tmp/fragment_received_monthly.jpeg');
}

function getFragmentReceivedYearly($xdata_y, $ydata_y, $ipaddress, $year) {
    $graph_y = new Graph(480, 320);
    $graph_y->SetScale('intint', 0, 0, 0, count($xdata_y) - 1);
    $graph_y->img->SetMargin(100, 50, 50, 50);
    $graph_y->xaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_y->xaxis->SetLabelMargin(10);
    $graph_y->xaxis->SetTitleMargin(10);
    $graph_y->title->Set("Fragments received  in this year: " . $year);
    $graph_y->yaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_y->yaxis->SetLabelMargin(10);
    $graph_y->yaxis->SetTitleMargin(60);
    $graph_y->xaxis->title->Set('Month(s)');
    $graph_y->yaxis->title->Set('No of Fragments');
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
    $graph_y->Stroke('tmp/fragment_received_yearly.jpeg');
}

function getFragmentsCreatedHourly($xdata_h, $ydata_h, $ipaddress, $hour) {
    $graph_h = new Graph(480, 320);
    $graph_h->SetScale('intint', 0, 0, 0, count($xdata_h) - 1);
    $graph_h->img->SetMargin(100, 50, 50, 50);
    $graph_h->xaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_h->xaxis->SetLabelMargin(10);
    $graph_h->xaxis->SetTitleMargin(10);
    $graph_h->title->Set("Fragments created in this hour: " . $hour);
    $graph_h->yaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_h->yaxis->SetLabelMargin(10);
    $graph_h->yaxis->SetTitleMargin(60);
    $graph_h->xaxis->title->Set('Min(s)');
    $graph_h->yaxis->title->Set('No. of Fragments');
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
    $graph_h->Stroke('tmp/fragments_created_hourly.jpeg');
}

function getFragmentsCreatedDaily($xdata_d, $ydata_d, $ipaddress, $day) {
    $graph_d = new Graph(480, 320);
    $graph_d->SetScale('intint', 0, 0, 0, count($xdata_d) - 1);
    $graph_d->img->SetMargin(100, 50, 50, 50);
    $graph_d->xaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_d->xaxis->SetLabelMargin(10);
    $graph_d->xaxis->SetTitleMargin(10);
    $graph_d->title->Set("Fragments created  in this day: " . $day);
    $graph_d->yaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_d->yaxis->SetLabelMargin(10);
    $graph_d->yaxis->SetTitleMargin(60);
    $graph_d->xaxis->title->Set('Hour(s)');
    $graph_d->yaxis->title->Set('No. of Fragments');
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
    $graph_d->Stroke('tmp/fragments_created_daily.jpeg');
}


function getFragmentsCreatedMonthly($xdata_m, $ydata_m, $ipaddress, $month) {
    $graph_m = new Graph(480, 320);
    $graph_m->SetScale('intint', 0, 0, 0, count($xdata_m) - 1);
    $graph_m->img->SetMargin(100, 50, 50, 50);
    $graph_m->xaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_m->xaxis->SetLabelMargin(10);
    $graph_m->xaxis->SetTitleMargin(10);
    $graph_m->title->Set("Fragments created  in this month: " . $month);
    $graph_m->yaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_m->yaxis->SetLabelMargin(10);
    $graph_m->yaxis->SetTitleMargin(60);
    $graph_m->xaxis->title->Set('Day(s)');
    $graph_m->yaxis->title->Set('No. of Fragments');
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
    $graph_m->Stroke('tmp/fragments_created_monthly.jpeg');
}

function getFragmentsCreatedYearly($xdata_y, $ydata_y, $ipaddress, $year) {
    $graph_y = new Graph(480, 320);
    $graph_y->SetScale('intint', 0, 0, 0, count($xdata_y) - 1);
    $graph_y->img->SetMargin(100, 50, 50, 50);
    $graph_y->xaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_y->xaxis->SetLabelMargin(10);
    $graph_y->xaxis->SetTitleMargin(10);
    $graph_y->title->Set("Fragments created  in this year: " . $year);
    $graph_y->yaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_y->yaxis->SetLabelMargin(10);
    $graph_y->yaxis->SetTitleMargin(60);
    $graph_y->xaxis->title->Set('Month(s)');
    $graph_y->yaxis->title->Set('No. of Fragments');
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
    $graph_y->Stroke('tmp/fragments_created_yeary.jpeg');
}

function getReassembleOkHourly($xdata_h, $ydata_h, $ipaddress, $hour) {
    $graph_h = new Graph(480, 320);
    $graph_h->SetScale('intint', 0, 0, 0, count($xdata_h) - 1);
    $graph_h->img->SetMargin(100, 50, 50, 50);
    $graph_h->xaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_h->xaxis->SetLabelMargin(10);
    $graph_h->xaxis->SetTitleMargin(10);
    $graph_h->title->Set("Reassembled fragments  in this hour: " . $hour);
    $graph_h->yaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_h->yaxis->SetLabelMargin(10);
    $graph_h->yaxis->SetTitleMargin(60);
    $graph_h->xaxis->title->Set('Min(s)');
    $graph_h->yaxis->title->Set('No. of fragments');
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
    $graph_h->Stroke('tmp/reassembled_ok_hourly.jpeg');
}

function getReassembleOkDaily($xdata_d, $ydata_d, $ipaddress, $day) {
    $graph_d = new Graph(480, 320);
    $graph_d->SetScale('intint', 0, 0, 0, count($xdata_d) - 1);
    $graph_d->img->SetMargin(100, 50, 50, 50);
    $graph_d->xaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_d->xaxis->SetLabelMargin(10);
    $graph_d->xaxis->SetTitleMargin(10);
    $graph_d->title->Set("Reassembled fragments  in this day: " . $day);
    $graph_d->yaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_d->yaxis->SetLabelMargin(10);
    $graph_d->yaxis->SetTitleMargin(60);
    $graph_d->xaxis->title->Set('Hour(s)');
    $graph_d->yaxis->title->Set('No. of fragments');
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
    $graph_d->Stroke('tmp/reassembled_ok_daily.jpeg');
}


function getReassembledOkMonthly($xdata_m, $ydata_m, $ipaddress, $month) {
    $graph_m = new Graph(480, 320);
    $graph_m->SetScale('intint', 0, 0, 0, count($xdata_m) - 1);
    $graph_m->img->SetMargin(100, 50, 50, 50);
    $graph_m->xaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_m->xaxis->SetLabelMargin(10);
    $graph_m->xaxis->SetTitleMargin(10);
    $graph_m->title->Set("Reassembled fragments  in this month: " . $month);
    $graph_m->yaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_m->yaxis->SetLabelMargin(10);
    $graph_m->yaxis->SetTitleMargin(60);
    $graph_m->xaxis->title->Set('Day(s)');
    $graph_m->yaxis->title->Set('No. of fragments');
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
    $graph_m->Stroke('tmp/reassembled_ok_monthly.jpeg');
}

function getReassembledOkYearly($xdata_y, $ydata_y, $ipaddress, $year) {
    $graph_y = new Graph(480, 320);
    $graph_y->SetScale('intint', 0, 0, 0, count($xdata_y) - 1);
    $graph_y->img->SetMargin(100, 50, 50, 50);
    $graph_y->xaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_y->xaxis->SetLabelMargin(10);
    $graph_y->xaxis->SetTitleMargin(10);
    $graph_y->title->Set("Reassembled fragments in this year: " . $year);
    $graph_y->yaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_y->yaxis->SetLabelMargin(10);
    $graph_y->yaxis->SetTitleMargin(60);
    $graph_y->xaxis->title->Set('Months(s)');
    $graph_y->yaxis->title->Set('No. of fragments');
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
    $graph_y->Stroke('tmp/reassembled_ok_yearly.jpeg');
}

function getReassembleFailedHourly($xdata_h, $ydata_h, $ipaddress, $hour) {
    $graph_h = new Graph(480, 320);
    $graph_h->SetScale('intint', 0, 0, 0, count($xdata_h) - 1);
    $graph_h->img->SetMargin(100, 50, 50, 50);
    $graph_h->xaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_h->xaxis->SetLabelMargin(10);
    $graph_h->xaxis->SetTitleMargin(10);
    $graph_h->title->Set("Reassemble failed fragments  in this hour: " . $hour);
    $graph_h->yaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_h->yaxis->SetLabelMargin(10);
    $graph_h->yaxis->SetTitleMargin(60);
    $graph_h->xaxis->title->Set('Min(s)');
    $graph_h->yaxis->title->Set('No. of fragments');
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
    $graph_h->Stroke('tmp/reassembled_failed_hourly.jpeg');
}

function getReassembleFailedDaily($xdata_d, $ydata_d, $ipaddress, $day) {
    $graph_d = new Graph(480, 320);
    $graph_d->SetScale('intint', 0, 0, 0, count($xdata_d) - 1);
    $graph_d->img->SetMargin(100, 50, 50, 50);
    $graph_d->xaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_d->xaxis->SetLabelMargin(10);
    $graph_d->xaxis->SetTitleMargin(10);
    $graph_d->title->Set("Reassemble failed fragments  in this day: " . $day);
    $graph_d->yaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_d->yaxis->SetLabelMargin(10);
    $graph_d->yaxis->SetTitleMargin(60);
    $graph_d->xaxis->title->Set('Hour(s)');
    $graph_d->yaxis->title->Set('No. of fragments');
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
    $graph_d->Stroke('tmp/reassembled_failed_daily.jpeg');
}


function getReassembledFailedMonthly($xdata_m, $ydata_m, $ipaddress, $month) {
    $graph_m = new Graph(480, 320);
    $graph_m->SetScale('intint', 0, 0, 0, count($xdata_m) - 1);
    $graph_m->img->SetMargin(100, 50, 50, 50);
    $graph_m->xaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_m->xaxis->SetLabelMargin(10);
    $graph_m->xaxis->SetTitleMargin(10);
    $graph_m->title->Set("Reassemble failed fragments  in this month: " . $month);
    $graph_m->yaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_m->yaxis->SetLabelMargin(10);
    $graph_m->yaxis->SetTitleMargin(60);
    $graph_m->xaxis->title->Set('Day(s)');
    $graph_m->yaxis->title->Set('No. of fragments');
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
    $graph_m->Stroke('tmp/reassembled_failed_monthly.jpeg');
}

function getReassembledFailedYearly($xdata_y, $ydata_y, $ipaddress, $year) {
    $graph_y = new Graph(480, 320);
    $graph_y->SetScale('intint', 0, 0, 0, count($xdata_y) - 1);
    $graph_y->img->SetMargin(100, 50, 50, 50);
    $graph_y->xaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_y->xaxis->SetLabelMargin(10);
    $graph_y->xaxis->SetTitleMargin(10);
    $graph_y->title->Set("Reassemble failed fragments in this year: " . $year);
    $graph_y->yaxis->SetFont(FF_FONT1, FS_BOLD);
    $graph_y->yaxis->SetLabelMargin(10);
    $graph_y->yaxis->SetTitleMargin(60);
    $graph_y->xaxis->title->Set('months(s)');
    $graph_y->yaxis->title->Set('No. of fragments');
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
    $graph_y->Stroke('tmp/reassembled_failed_yearly.jpeg');
}
