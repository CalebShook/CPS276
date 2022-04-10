<?php

require_once('../../../shared/db.php');

$results = execute('SELECT name FROM names');

if(!empty($results)) {
    $namesAr = [];
    foreach($results as $i) {
        $namesAr[] = $i['name'];
    }
    $resultsStr = implode('<br>', $namesAr);
    $ar['names']=$resultsStr;
    echo(json_encode($ar));
} 
else {
    $ar = [];
    $ar['msg'] = "No Data";
    $ar['masterstatus'] = "error";
    echo(json_encode($ar));
}


