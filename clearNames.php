<?php

    require_once('../../../shared/db.php');

    $results = execute('DELETE FROM names');
    $ar['msg'] = "Table Cleared";
    echo(json_encode($ar))



