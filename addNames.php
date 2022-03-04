<?

$nameList=empty($_REQUEST['firstNameField']) ? '' : $_REQUEST['firstNameField'];
$name='';

if(!empty($_GET['add'])) {
    $tempAr = explode(" ", $_GET['nameField']);
    rsort($tempAr);
    $temp = implode(", " , $tempAr);
    $nameList = $_GET['nameListArea'] . "\n" . $temp;
}

if(!empty($_GET['delete'])) {
    $nameList = "";
}

?>

<html> 

    <form action='addNames.php' method='get'>

        <title>Add Names</title>

        <h1>Add Names</h1>
        <br>

        <hr>

        <br>
        Enter name
        <br>
        <input type='text' name='nameField' value="<?=$name?>" placeholder="First Name" />
        <input type='submit' name='add' value='Add Name' />
        <input type='submit' name='delete' value='Delete List' />
        <br><br><br>
        
        List of Names 
        <br>
        <textarea name="nameListArea" rows="5" cols="50"><?=$nameList?></textarea>    
    </form>

</html>