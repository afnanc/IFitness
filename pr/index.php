<?php
    session_start();
    require_once("../common.php");
    if (!is_loggedin()) {
        redirect_to("/CPS714/iFitness/login/");
    }
?>
<?php require "../connection.php"; ?>
<?php
    // PHP Code to add to PR Table
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try{
            $username = $_SESSION['username'];
            $mg = $_POST['mg'];
            $workout = $_POST['workout'];
            $weight = $_POST['weight'];
            $reps = $_POST['reps'];
            $lr = $_POST['lr'];
    
            //echo " " . $_SESSION['username'] . " " . $mg . " " . $workout . " " . $weight . " " . $reps . " " . $lr;
    
            $statement = $pdo->prepare("INSERT INTO Progress_Report (Username, Muscle_Group, Workout, Weight, Reps, Last_Recorded)VALUES('$username', '$mg', '$workout', '$weight', '$reps', '$lr')");
            $statement->execute();
    
            // Redirect to this page, prevent refresh duplication, this code has to be at the top or it throws errors
            header( "Location: {$_SERVER['REQUEST_URI']}", true, 303 );
            exit();
        }
        catch(Exception $e){
            echo "Something went wrong! (Perhaps inserting same workout on same date)";
        }

        
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progress Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <link rel="stylesheet" type="text/css" href="../global.css">
</head>

<style>
    .bubble-container {
        /* background-color: #f0f0f0;
        border: 2px solid #0099cc; */
        background-color: #495E57;
        border: 4px solid #495E57; 
        padding: 10px; /* Add padding inside the bubble */
        max-width: 400px;
        margin: 10px;
        border-radius: 8px;
        color: #F5F7F8;
        
    }
</style>

<body>
    <?php include("../header.php"); ?>
    <div class="container-lg" >
        <h1 class="text-center">Progress</h1>
        <br>
        <div class="content" >
            <div class="flex-item">
                <!-- Form For Inserting PR -->
                <form method="post" class="bubble-container"> 
                    <label for="mg">Choose Muscle Group:</label> 
                        <select name="mg" id="mg"> 
                            <option value="Shoulder">Shoulder</option> 
                            <option value="Chest">Chest</option> 
                            <option value="Back">Back</option> 
                            <option value="Tricep">Tricep</option> 
                            <option value="Bicep">Bicep</option> 
                            <option value="Legs">Legs</option> 
                        </select>
                    <br>
                    <br>
                    <input type="text" name="workout" placeholder="workout" required class="mb-3"><br> <!-- workout (dropdown) -->
                    <input type="text" name="weight" placeholder="weight" required class="mb-3"><br> <!-- weight -->
                    <input type="text" name="reps" placeholder="reps" required class="mb-3"><br> <!-- reps -->
                    <input type="date" name="lr" placeholder="YYYY-MM-DD" required class="mb-3"><br> <!-- last recorded (current date) -->
                    <input type="submit" value="Submit" onClick="Submit" class="btn btn-dark">
                </form>
                
                
                <?php
                require "deletePR.php";
                ?>
            </div>

            <!-- Take PR Data from Table and send to JS -->
            <?php
                $username = $_SESSION['username'];
                $muscleGroups = array();
                $workouts = array();

                $statement = $pdo->prepare("SELECT * FROM Progress_Report WHERE Username = '$username';");
                $statement->execute();
                $results = $statement->fetchAll(PDO::FETCH_ASSOC);
                
                foreach ($results as $row) {
                    array_push($muscleGroups, $row['Muscle_Group']);
                    array_push($workouts, $row['Workout']);
                }
                // // Debug code
                // print_r($muscleGroups);
                // echo "<br>";
                // print_r($workouts);
                // echo "<br>";
            ?>

            <!-- Take PR Data from PHP and create arrays for dynamic dropdown -->
            <script>
                const muscleGroup = <?php echo json_encode($muscleGroups); ?>;
                const workouts = <?php echo json_encode($workouts); ?>;

                var exerciseObject = {};
                for (var i = 0; i < muscleGroup.length; i++) {
                    var key = muscleGroup[i];
                    var value = workouts[i];

                    if (!exerciseObject[key]) {
                        exerciseObject[key] = [];
                    }
                    if (!exerciseObject[key].includes(value)) {
                        exerciseObject[key].push(value);
                    }
                }

                window.onload = function() {
                    var muscleGroupSel = document.getElementById("subject");
                    var workoutSel = document.getElementById("topic");
                    for (var x in exerciseObject) {
                        muscleGroupSel.options[muscleGroupSel.options.length] = new Option(x, x);
                    }
                    muscleGroupSel.onchange = function() {
                        //empty Chapters- and Topics- dropdowns
                        workoutSel.length = 1;
                        //display correct values
                        for (var y in exerciseObject[this.value]) {
                            workoutSel.options[workoutSel.options.length] = new Option(exerciseObject[this.value][y], exerciseObject[this.value][y]);
                        }
                    }
                }
            </script>

            <div class="flex-item">
                <!-- Form dropdown for Graph displaying -->
                <form method="get">
                Muscle Group: <select name="subject" id="subject">
                    <option value="" selected="selected">Select Muscle Group</option>
                </select><br>
                Workout: <select name="topic" id="topic">
                    <option value="" selected="selected">Please select Muscle Group first</option>
                </select>
                <input type="submit" value="Submit" class="btn btn-dark">  
                <br><br>
                
                <!-- Take Form Data and grab corresponding data from PR Table and send to JS -->
                <?php
                    $arrayWeight = array();
                    $arrayDate = array();

                    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["subject"]) && isset($_GET["topic"])) {
                        $muscleGroup = $_GET["subject"];
                        $workout = $_GET["topic"];

                        echo "<b>Muscle Group: </b>" . $muscleGroup . "<br>";
                        echo "<b>Workout: </b>" . $workout . "<br>";
                        
                        
                        $statement = $pdo->prepare("SELECT * FROM Progress_Report WHERE Username = '$username' AND Muscle_Group = '$muscleGroup' AND Workout = '$workout'");
                        $statement->execute();
                        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
                        
                        foreach ($results as $row) {
                            array_push($arrayWeight, $row['Weight']);
                            array_push($arrayDate, $row['Last_Recorded']);
                        }
                    }
                        
                    // //Debug code
                    // print_r($arrayWeight);
                    // echo "<br>";
                    // print_r($arrayDate);
                ?>

                <!-- Graph -->
                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                <!-- Take PR Data from PHP and create arrays for graph -->
                <script>
                    const xValues = <?php echo json_encode($arrayDate); ?>;
                    const yValues = <?php echo json_encode($arrayWeight); ?>;

                    new Chart("myChart", {
                    type: "line",
                    data: {
                        labels: xValues,
                        datasets: [
                            {
                                fill: false,
                                lineTension: 0,
                                backgroundColor: "#495E57",
                                borderColor: "#495E57",
                                data: yValues
                            }
                        ]
                    },
                    options: {
                        legend: {display: false}
                    }
                    });
                </script>
            </div>
        </div>
    </div>
    <?php include("../footer.php"); ?>

</body>



</html>