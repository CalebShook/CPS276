<?

    $row=15;
    $cell=5;

?>

<html>

    <title>Dynamic Table</title>

    <table border=10>
        <? for($i=0; $i<$row; $i++) { ?>

            <tr>
                <td> 
                    <? for($j=0; $j<$cell; $j++) { ?>

                        
                            <td>Row <?=$i+1?> Cell <?=$j+1?></td>
                        

                        <? } ?>
                </td>
            </tr>

        <? } ?>

</html>