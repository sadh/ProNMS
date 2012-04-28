<?php

function get_user_by_username_and_password($username, $password) {
    return mysql_query("SELECT * FROM users WHERE (name = '" . mysql_real_escape_string($username) . "') and (password = md5('" . mysql_real_escape_string($password) . "'))");
}

function show_users($user) {
    if (preg_match("/all/", $user)) {
        $query = "SELECT name,password,level FROM users WHERE 1 ";
    } else {
        $query = "SELECT name,password,level FROM users WHERE (name = '" . mysql_real_escape_string($user) . "') ";
    }

    $result = mysql_query($query);
    return formatted_result($result);
}

function add_user($username, $password, $level) {
    $query = "INSERT INTO users(id,name,password,level) VALUES(NULL,('" . mysql_real_escape_string($username) . "'),md5('" . mysql_real_escape_string($password) . "'),('" . mysql_real_escape_string($level) . "'))";
    $result = mysql_query($query);
    if ($result) {
        return("User added");
    } else {
        return("failed");
    }
}

function delete_user($username) {
    $query = "DELETE FROM users WHERE name=('" . mysql_real_escape_string($username) . "')";
    $result = mysql_query($query);
    if ($result) {
        return("User deleted");
    } else {
        return("failed");
    }
}

function update_user($username, $new_username, $password, $level) {
    $query = "UPDATE users SET name=('" . mysql_real_escape_string($new_username) . "'),password=md5('" . mysql_real_escape_string($password) . "'),level=('" . mysql_real_escape_string($level) . "') WHERE name=('" . mysql_real_escape_string($username) . "')";
    $result = mysql_query($query);
    if ($result) {
        return("User added");
    } else {
        return("failed");
    }
}

function get_host_info($ip) {
    $query = "SELECT * FROM host_table WHERE (ipaddress='" . mysql_real_escape_string($ip) . "')";
    $result = mysql_query($query);
    return formatted_result($result);
}

function get_interface_ipaddress($ip) {
    $query = "select ifindex,address,netmask,reassmble from host_ip_table where ipaddress=('" . mysql_real_escape_string($ip) . "') ORDER BY `host_ip_table`.`ifindex` ASC";
    $result = mysql_query($query);

    return formatted_result($result);
}

function get_interface_info($ip) {
    $query = "select ifindex,if_descr,if_status from host_int_info  where ipaddress=('" . mysql_real_escape_string($ip) . "') ORDER BY `host_int_info`.`ifindex` ASC";
    $result = mysql_query($query);

    return formatted_result($result);
}

function get_packet_forwarding_info($ip) {
    $query = "select * from packet_forwarding_stats where ipaddress =('" . mysql_escape_string($ip) . "') ORDER BY date_time ASC";
    $result = mysql_query($query);

    return formatted_result($result);
}

function get_packet_forwarding_info_daily($ip) {
    $query = "select * from packet_forwarding_stats_daily where ipaddress =('" . mysql_escape_string($ip) . "') ORDER BY date_time ASC";
    $result = mysql_query($query);

    return formatted_result($result);
}



function get_packet_forwarding_info_monthly($ip) {
    $query = "select * from packet_forwarding_stats_monthly where ipaddress =('" . mysql_escape_string($ip) . "') ORDER BY date_time ASC";
    $result = mysql_query($query);

    return formatted_result($result);
}

function get_packet_forwarding_info_yearly($ip) {
    $query = "select * from packet_forwarding_stats_yearly where ipaddress =('" . mysql_escape_string($ip) . "') ORDER BY date_time ASC";
    $result = mysql_query($query);

    return formatted_result($result);
}

function get_packet_fragmentation_info($ip) {
    $query = "select * from packet_fragmentation_stats where ipaddress =('" . mysql_escape_string($ip) . "') ORDER BY date_time ASC";
    $result = mysql_query($query);

    return formatted_result($result);
}

function get_packet_fragmentation_info_daily($ip) {
    $query = "select * from packet_fragmentation_stats_daily where ipaddress =('" . mysql_escape_string($ip) . "') ORDER BY date_time ASC";
    $result = mysql_query($query);

    return formatted_result($result);
}


function get_packet_fragmentation_info_monthly($ip) {
    $query = "select * from packet_fragmentation_stats_monthly where ipaddress =('" . mysql_escape_string($ip) . "') ORDER BY date_time ASC";
    $result = mysql_query($query);

    return formatted_result($result);
}

function get_packet_fragmentation_info_yearly($ip) {
    $query = "select * from packet_fragmentation_stats_yearly where ipaddress =('" . mysql_escape_string($ip) . "') ORDER BY date_time ASC";
    $result = mysql_query($query);

    return formatted_result($result);
}

function translate_sysuptime($uptime){
    $time = $uptime*0.01;
    $years = floor($time/(365*24*60*60));
    $months = floor(($time - $years*365*24*60*60)/(30*60*60*24));
    $days = floor(($time - $years*365*24*60*60 -$months*30*60*60*24)/(60*60*24));
    $hours = floor(($time - $years*365*24*60*60 -$months*30*60*60*24 - $days*60*60*24)/(60*60));
    return $years." years ".$months." months ".$days." days ".$hours." hours";
}

function formatted_result($result) {
    if ($result) {
        return $result;
    } else {
        return false;
    }
}

function redirect_to($location = "index.php") {
    header("location:$location");
    exit;
}

