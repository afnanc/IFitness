<?php
$username = $_SESSION['username'];

$statement = $pdo->prepare("SELECT * FROM Progress_Report WHERE Username = '$username';");
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);

?>


<form method="get">
    <label for="recordDropdown">Delete a Record:</label>
    <select id="recordDropdown" name="recordDropdown">
        <?php
        foreach ($results as $index => $record) {
            // Assuming there's a column named 'record_id'; adjust as needed
            $recordId1 = $record['Workout'];
            $recordId2 = $record['Muscle_Group'];
            $recordId3 = $record['Weight'];
            $recordId4 = $record['Reps'];
            $recordId4 = $record['Last_Recorded'];
            $concatenatedString = $recordId2 . ' ' . $recordId1 . ' ' . $recordId3 . ' ' . $recordId4 . ' ' . $recordId5;

            echo "<option value='$recordId1,$recordId2,$recordId4'> $concatenatedString </option>";
        }
        ?>
    </select>
    <input type="submit" value="Delete" class="btn btn-dark">  
</form>


<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["recordDropdown"])) {
    // where $_GET["recordDropdown"] is record number
    $recordNumber = $_GET["recordDropdown"];
    $resultArray = explode(',', $recordNumber);
    //echo "DELETE FROM Progress_Report WHERE Username = '$username' AND Workout= '$resultArray[0]' AND Muscle_Group= '$resultArray[1]' AND Workout= '$resultArray[2]'";
    $statement = $pdo->prepare("DELETE FROM Progress_Report WHERE Username = '$username' AND Workout= '$resultArray[0]' AND Muscle_Group= '$resultArray[1]' AND Last_Recorded= '$resultArray[2]'");
    $statement->execute();
    echo "Successfully Deleted!";
    // add refresh 
    
    

}

?>

