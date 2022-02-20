<?

    $outer=4;
    $inner=5;

?>

<html>

<title>Unordered Lists</title>
    
<? for($i=0; $i<$outer; $i++) { ?>
    
    <ul>
        <li>
            <?=$i?>
        </li>

    <? for($j=0; $j<$inner; $j++) { ?>
        
        <ul>
            <li>
                <?=$j?>
            </li>
        </ul>

        <? } ?>

    </ul>

    <? } ?>


</html>