<?php

    require_once('../../../shared/db.php');

    $userInputName = json_decode($_REQUEST['data'],true)['name'];
    $nameArr = explode(' ', json_encode($userInputName));
    rsort($nameArr);
    $nameStr = implode(', ', $nameArr);
    $results = $db->prepare("INSERT INTO names (name) VALUES ($nameStr)");
    $results->execute();

    
    $ar['msg'] = $nameStr;
    echo(json_encode($ar));