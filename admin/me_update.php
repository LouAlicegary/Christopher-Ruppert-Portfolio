<?php
$id = $_REQUEST['id'] ;
$value = $_REQUEST['value'] ;
$column = $_REQUEST['columnName'] ;
//$columnPosition = $_REQUEST['columnPosition'] ;
//$columnId = $_REQUEST['columnId'] ;
//$rowId = $_REQUEST['rowId'] ;
$column_name = trim($column);


//include("config.php");

// mysql_query(" UPDATE $sTable SET $column = $value WHERE trl_id = $id ");
//mysql_query("UPDATE tw_tg_sim_lines$process_id SET $column_name = '$value' WHERE trl_id = '$id'");


// Connects to your Database
$username = "ruppert";
$password = "CRupp3rt!";
mysql_connect("ruppert.db.9721098.hostedresource.com", $username, $password) or die(mysql_error());
mysql_select_db("ruppert") or die(mysql_error()); 

$data = mysql_query("update works set " . $column_name . "= '" . $value . "' where id=" . $id) or die(mysql_error());

/*
$info = mysql_fetch_array( $data );
$max_id = $info['id'];
$max_id = intval($max_id) + 1;
echo("<br>1 Record Written to 'items' with ID = " . $max_id . "<br />");
$data = mysql_query("INSERT INTO items (id, item_filename, groups) VALUES ('" . $max_id . "','" . $filename . "','" . $varGroup . "')") or die(mysql_error());

$data = mysql_query("SELECT MAX(display_order) AS display_order FROM item_details JOIN items ON item_details.id = items.id WHERE items.groups = " . $varGroup) or die(mysql_error());
$info = mysql_fetch_array( $data );
$max_disp = $info['display_order'];
$max_disp = intval($max_disp) + 1;
$varYear = intval($varYear);
//$varYearUNIX = (($varYearUNIX-1970) * 31557600) + 1;
echo("1 Record Written to 'item_details' with Max Display Order = " . $max_disp . "<br />");
$data = mysql_query("INSERT INTO item_details (id, title, subtitle, create_date, display_order) VALUES ('" . $max_id . "','" . $varTitle . "','" . $varSubtitle . "','" . $varYear . "','" . $max_disp . "')") or die(mysql_error());
*/




//$return_val = 'ID: ' . $id . ' VALUE: ' . $value .  ' COLNAME: ' . $column_name; // . ' COLPOS: ' . columnPosition . ' COLID: ' . columnId . ' ROWID: ' . rowId;
//echo 'ID: ' + $id + ' VALUE: ' + $value +  ' ' + $columnName + ' ' + columnPosition + ' ' + columnId + ' ' + rowId ;
//echo $return_val; //$id;
echo "Record updated.";

?>