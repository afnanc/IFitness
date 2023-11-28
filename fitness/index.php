<?php
session_start();
require_once("../common.php");
if (!is_loggedin()) {
	redirect_to("/CPS714/iFitness/login/");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Workouts</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="../global.css">
	<link rel="stylesheet" href="fitness.css" />
</head>

<body>
	<?php include("../header.php"); ?>
	<div class="mb-5" style="flex: 1">

		<div class="container mt-4 left-aligned-container">
			<h2>Workout Generator</h2>
			<p>Select any of the workout categories to generate a detailed workout</p>
			<div>
				<div class="dropdown">
					<button class="btn btn-dark dropdown-button">Select A Workout</button>
					<div class="dropdown-content">
						<a href="#" id="showBack">Back</a>
						<a href="#" id="showChest">Chest</a>
						<a href="#" id="showLegs">Legs</a>
						<a href="#" id="showBiceps">Biceps</a>
						<a href="#" id="showTriceps">Triceps</a>
						<a href="#" id="showShoulders">Shoulders</a>
						<a href="#" id="showCore">Core</a>
						<a href="#" id="showChestBack">Chest and Back</a>
						<a href="#" id="showArms">Arms</a>
						<a href="#" id="showLegsCore">Legs and Core</a>
						<a href="#" id="showChestTriceps">Chest and Triceps</a>
						<a href="#" id="showBackBiceps">Back and Biceps</a>
						<a href="#" id="showLegsShoulders">Legs and Shoulders</a>
					</div>
				</div>
			</div>
		</div>
		<div class="tables-container">
			<div id="backExercises" class="exercise-table">
				<h2>Back</h2>
				<table>
					<tr>
						<th>Exercise</th>
						<th>Sets</th>
						<th>Reps</th>
					</tr>
					<tr>
						<td>T-Bar Row</td>
						<td>3</td>
						<td>8</td>
					</tr>
					<tr>
						<td>Seated Row</td>
						<td>3</td>
						<td>10</td>
					</tr>
					<tr>
						<td>D-Handle Lat Pulldown</td>
						<td>3</td>
						<td>10</td>
					</tr>
					<tr>
						<td>Wide Grip Lat Pulldown</td>
						<td>3</td>
						<td>12</td>
					</tr>
				</table>
			</div>
			<div id="chestExercises" class="exercise-table">
				<h2>Chest</h2>
				<table>
					<tr>
						<th>Exercise</th>
						<th>Sets</th>
						<th>Reps</th>
					</tr>
					<tr>
						<td>Incline Dumbbell Press</td>
						<td>3</td>
						<td>8</td>
					</tr>
					<tr>
						<td>Flat Dumbbell Press</td>
						<td>3</td>
						<td>10</td>
					</tr>
					<tr>
						<td>Pec fly</td>
						<td>3</td>
						<td>10</td>
					</tr>
					<tr>
						<td>Smith Machine Incline Press</td>
						<td>3</td>
						<td>12</td>
					</tr>
				</table>
			</div>
			<div id="legExercises" class="exercise-table">
				<h2>Legs</h2>
				<table>
					<tr>
						<th>Exercise</th>
						<th>Sets</th>
						<th>Reps</th>
					</tr>
					<tr>
						<td>Barbell Squats</td>
						<td>3</td>
						<td>8</td>
					</tr>
					<tr>
						<td>Leg Press</td>
						<td>3</td>
						<td>10</td>
					</tr>
					<tr>
						<td>Leg Extensions</td>
						<td>3</td>
						<td>10</td>
					</tr>
					<tr>
						<td>Seated Calves Raises</td>
						<td>3</td>
						<td>12</td>
					</tr>
					<tr>
						<td>Lunges</td>
						<td>3</td>
						<td>10</td>
					</tr>
				</table>
			</div>
			<div id="bicepExercises" class="exercise-table">
				<h2>Biceps</h2>
				<table>
					<tr>
						<th>Exercise</th>
						<th>Sets</th>
						<th>Reps</th>
					</tr>
					<tr>
						<td>Hammer Curls</td>
						<td>3</td>
						<td>10</td>
					</tr>
					<tr>
						<td>Straight Bar Curls</td>
						<td>3</td>
						<td>10</td>
					</tr>
					<tr>
						<td>Incline Cable Curls</td>
						<td>3</td>
						<td>10</td>
					</tr>
					<tr>
						<td>Preacher Curl</td>
						<td>3</td>
						<td>12</td>
					</tr>
					<tr>
						<td>Straight Bar Curls</td>
						<td>3</td>
						<td>10</td>
					</tr>
				</table>
			</div>
			<div id="tricepExercises" class="exercise-table">
				<h2>Triceps</h2>
				<table>
					<tr>
						<th>Exercise</th>
						<th>Sets</th>
						<th>Reps</th>
					</tr>
					<tr>
						<td>Cable Extensions</td>
						<td>3</td>
						<td>8</td>
					</tr>
					<tr>
						<td>Rope Pushdowns</td>
						<td>3</td>
						<td>10</td>
					</tr>
					<tr>
						<td>Straight Bar Pushdowns</td>
						<td>3</td>
						<td>10</td>
					</tr>
					<tr>
						<td>Skull Crushers</td>
						<td>3</td>
						<td>12</td>
					</tr>
				</table>
			</div>
			<div id="shoulderExercises" class="exercise-table">
				<h2>Shoulders</h2>
				<table>
					<tr>
						<th>Exercise</th>
						<th>Sets</th>
						<th>Reps</th>
					</tr>
					<tr>
						<td>Upright Barbell Press</td>
						<td>3</td>
						<td>8</td>
					</tr>
					<tr>
						<td>Cable Lateral Raises</td>
						<td>3</td>
						<td>12</td>
					</tr>
					<tr>
						<td>Rear Delt Flys</td>
						<td>3</td>
						<td>10</td>
					</tr>
					<tr>
						<td>Machine Lateral Raises</td>
						<td>3</td>
						<td>12</td>
					</tr>
				</table>
			</div>
			<div id="coreExercises" class="exercise-table">
				<h2>Core</h2>
				<table>
					<tr>
						<th>Exercise</th>
						<th>Sets</th>
						<th>Reps</th>
					</tr>
					<tr>
						<td>Russian Twists</td>
						<td>3</td>
						<td>15</td>
					</tr>
					<tr>
						<td>Leg Raises</td>
						<td>3</td>
						<td>15</td>
					</tr>
					<tr>
						<td>Crunches</td>
						<td>3</td>
						<td>25</td>
					</tr>
					<tr>
						<td>Mountain Climbers</td>
						<td>3</td>
						<td>30</td>
					</tr>
				</table>
			</div>
			<div id="chestBackExercises" class="exercise-table">
				<h2>Chest and Back</h2>
				<table>
					<tr>
						<th>Exercise</th>
						<th>Sets</th>
						<th>Reps</th>
					</tr>
					<tr>
						<td>T-Bar Row</td>
						<td>3</td>
						<td>8</td>
					</tr>
					<tr>
						<td>Seated Row</td>
						<td>3</td>
						<td>10</td>
					</tr>
					<tr>
						<td>D-Handle Lat Pulldown</td>
						<td>3</td>
						<td>10</td>
					</tr>
					<tr>
						<td>Incline Dumbbell Press</td>
						<td>3</td>
						<td>8</td>
					</tr>
					<tr>
						<td>Flat Dumbbell Press</td>
						<td>3</td>
						<td>10</td>
					</tr>
					<tr>
						<td>Pec fly</td>
						<td>3</td>
						<td>10</td>
					</tr>
					<tr>
						<td>Smith Machine Incline Press</td>
						<td>3</td>
						<td>12</td>
					</tr>
				</table>
			</div>
			<div id="armExercises" class="exercise-table">
				<h2>Arms</h2>
				<table>
					<tr>
						<th>Exercise</th>
						<th>Sets</th>
						<th>Reps</th>
					</tr>
					<tr>
						<td>Hammer Curls</td>
						<td>3</td>
						<td>10</td>
					</tr>
					<tr>
						<td>Straight Bar Curls</td>
						<td>3</td>
						<td>10</td>
					</tr>
					<tr>
						<td>Incline Cable Curls</td>
						<td>3</td>
						<td>10</td>
					</tr>
					<tr>
						<td>Preacher Curl</td>
						<td>3</td>
						<td>12</td>
					</tr>
					<tr>
						<td>Straight Bar Curls</td>
						<td>3</td>
						<td>10</td>
					</tr>
					<tr>
						<td>Cable Extensions</td>
						<td>3</td>
						<td>8</td>
					</tr>
					<tr>
						<td>Rope Pushdowns</td>
						<td>3</td>
						<td>10</td>
					</tr>
					<tr>
						<td>Straight Bar Pushdowns</td>
						<td>3</td>
						<td>10</td>
					</tr>
				</table>
			</div>
			<div id="legsCoreExercises" class="exercise-table">
				<h2>Legs and Core</h2>
				<table>
					<tr>
						<th>Exercise</th>
						<th>Sets</th>
						<th>Reps</th>
					</tr>
					<tr>
						<td>Russian Twists</td>
						<td>3</td>
						<td>15</td>
					</tr>
					<tr>
						<td>Leg Raises</td>
						<td>3</td>
						<td>15</td>
					</tr>
					<tr>
						<td>Crunches</td>
						<td>3</td>
						<td>25</td>
					</tr>
					<tr>
						<td>Mountain Climbers</td>
						<td>3</td>
						<td>30</td>
					</tr>

					<tr>
						<td>Barbell Squats</td>
						<td>3</td>
						<td>8</td>
					</tr>
					<tr>
						<td>Leg Press</td>
						<td>3</td>
						<td>10</td>
					</tr>
					<tr>
						<td>Leg Extensions</td>
						<td>3</td>
						<td>10</td>
					</tr>
					<tr>
						<td>Seated Calves Raises</td>
						<td>3</td>
						<td>12</td>
					</tr>
					<tr>
						<td>Lunges</td>
						<td>3</td>
						<td>10</td>
					</tr>
				</table>
			</div>
			<div id="chestTricepExercises" class="exercise-table">
				<h2>Chest and Tricep</h2>
				<table>
					<tr>
						<th>Exercise</th>
						<th>Sets</th>
						<th>Reps</th>
					</tr>
					<tr>
						<td>Incline Dumbbell Press</td>
						<td>3</td>
						<td>8</td>
					</tr>
					<tr>
						<td>Flat Dumbbell Press</td>
						<td>3</td>
						<td>10</td>
					</tr>
					<tr>
						<td>Pec fly</td>
						<td>3</td>
						<td>10</td>
					</tr>
					<tr>
						<td>Smith Machine Incline Press</td>
						<td>3</td>
						<td>12</td>
					</tr>
					<tr>
						<td>Cable Extensions</td>
						<td>3</td>
						<td>8</td>
					</tr>
					<tr>
						<td>Rope Pushdowns</td>
						<td>3</td>
						<td>10</td>
					</tr>
					<tr>
						<td>Straight Bar Pushdowns</td>
						<td>3</td>
						<td>10</td>
					</tr>
				</table>
			</div>
			<div id="backBicepExercises" class="exercise-table">
				<h2>Back and Biceps</h2>
				<table>
					<tr>
						<th>Exercise</th>
						<th>Sets</th>
						<th>Reps</th>
					</tr>
					<tr>
						<td>T-Bar Row</td>
						<td>3</td>
						<td>8</td>
					</tr>
					<tr>
						<td>Seated Row</td>
						<td>3</td>
						<td>10</td>
					</tr>
					<tr>
						<td>D-Handle Lat Pulldown</td>
						<td>3</td>
						<td>10</td>
					</tr>
					<tr>
						<td>Wide Grip Lat Pulldown</td>
						<td>3</td>
						<td>12</td>
					</tr>
					<tr>
						<td>Hammer Curls</td>
						<td>3</td>
						<td>10</td>
					</tr>
					<tr>
						<td>Straight Bar Curls</td>
						<td>3</td>
						<td>10</td>
					</tr>
					<tr>
						<td>Incline Cable Curls</td>
						<td>3</td>
						<td>10</td>
					</tr>
					<tr>
						<td>Preacher Curl</td>
						<td>3</td>
						<td>12</td>
					</tr>
				</table>
			</div>
			<div id="legsShouldersExercises" class="exercise-table">
				<h2>Legs and Shoulders</h2>
				<table>
					<tr>
						<th>Exercise</th>
						<th>Sets</th>
						<th>Reps</th>
					</tr>
					<tr>
						<td>Barbell Squats</td>
						<td>3</td>
						<td>8</td>
					</tr>
					<tr>
						<td>Leg Press</td>
						<td>3</td>
						<td>10</td>
					</tr>
					<tr>
						<td>Leg Extensions</td>
						<td>3</td>
						<td>10</td>
					</tr>
					<tr>
						<td>Seated Calves Raises</td>
						<td>3</td>
						<td>12</td>
					</tr>
					<tr>
						<td>Lunges</td>
						<td>3</td>
						<td>10</td>
					</tr>
					<tr>
						<td>Upright Barbell Press</td>
						<td>3</td>
						<td>8</td>
					</tr>
					<tr>
						<td>Cable Lateral Raises</td>
						<td>3</td>
						<td>12</td>
					</tr>
					<tr>
						<td>Rear Delt Flys</td>
						<td>3</td>
						<td>10</td>
					</tr>
					<tr>
						<td>Machine Lateral Raises</td>
						<td>3</td>
						<td>12</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="container mt-4 left-aligned-container">
			<h2>Food Items for Dietary Restrictions</h2>
			<p>See food options accordingly to any of the following dietary restrictions. Please account for personal allergies.</p>
			<div>
				<div class="dropdown">
					<button class="btn btn-dark dropdown-button">Select A Meal Type</button>
					<div class="dropdown-content food-dropdown-content">
						<a href="#" id="showLactose">Lactose Intolerance</a>
						<a href="#" id="showGluten">Gluten Intolerance</a>
						<a href="#" id="showVegetarian">Vegetarian</a>
						<a href="#" id="showVegan">Vegan</a>
						<a href="#" id="showKeto">Keto</a>
						<a href="#" id="showDiabetes">Diabetes</a>
						<a href="#" id="showLowCarb">Low Carb</a>
					</div>
				</div>
			</div>
		</div>
		<div class="tables-container">
			<div id="lactose" class="food-table">
				<h2>Lactose Intolerance Options</h2>
				<table>
					<tr>
						<th>Food Type</th>
						<th>Food Items</th>
					</tr>
					<tr>
						<td>Lactose-free milk</td>
						<td>Almond Milk, Soy Milk, Cocunut Milk, Oat Milk, Cashew Milk</td>
					</tr>
					<tr>
						<td>Fermented Diary Products</td>
						<td>Yogurt, Sour Cream, Kefir, Leben, Mursik</td>
					</tr>
					<tr>
						<td>Hard-mature Cheeses</td>
						<td>Parmesan Cheese, Granna Padano</td>
					</tr>
					<tr>
						<td>Butter</td>
						<td>Clarified Butter, Ghee</td>
					</tr>
				</table>
			</div>
			<div id="gluten" class="food-table">
				<h2>Gluten Intolerance Options</h2>
				<table>
					<tr>
						<th>Food Type</th>
						<th>Food Items</th>
					</tr>
					<tr>
						<td>Gluten-free Grains</td>
						<td>Quinoa, Oats, Buckwheat, Corn, Brown Rice</td>
					</tr>
					<tr>
						<td>Gluten-free Starches</td>
						<td>Corn, Arrowroot, Tapioca, Potato</td>
					</tr>
					<tr>
						<td>Gluten-free Flours</td>
						<td>Almond Flour, Sorghum Flour, Teff Flour, Chickpea Flour</td>
					</tr>
				</table>
			</div>
			<div id="vegetarian" class="food-table">
				<h2>Vegetarian Options</h2>
				<table>
					<tr>
						<th>Food Type</th>
						<th>Food Items</th>
					</tr>
					<tr>
						<td>Soy-based Protein</td>
						<td>Tofu, Soy Crumbles, Edamame</td>
					</tr>
					<tr>
						<td>Bean-based Protein</td>
						<td>Lentils, Black Beans, Bean Burgers</td>
					</tr>
					<tr>
						<td>Grain-based Protein</td>
						<td>Setian, Spelt, Ezekiel Bread</td>
					</tr>
					<tr>
						<td>Nut/Seed-based Protein</td>
						<td>Almonds, Cashews, Pistachios, Chia Seeds</td>
					</tr>
				</table>
			</div>
			<div id="vegan" class="food-table">
				<h2>Vegan Options</h2>
				<table>
					<tr>
						<th>Food Type</th>
						<th>Food Items</th>
					</tr>
					<tr>
						<td>Acidic Fruits</td>
						<td>Oranges, Grapefruit, Tomatoes, Berries</td>
					</tr>
					<tr>
						<td>Oily Fruits</td>
						<td>Avocados, Olives, Coconuts</td>
					</tr>
					<tr>
						<td>Sweet Fruits</td>
						<td>Bananas, Dates, Grapes</td>
					</tr>
					<tr>
						<td>Vegetable Fruits</td>
						<td>Cucumbers, Bell Peppers</td>
					</tr>
				</table>
			</div>
			<div id="keto" class="food-table">
				<h2>Keto Options</h2>
				<table>
					<tr>
						<th>Food Type</th>
						<th>Food Items</th>
					</tr>
					<tr>
						<td>Protein</td>
						<td>Meat, Chicken, Fish, Eggs, Cheese, Tofu</td>
					</tr>
					<tr>
						<td>Fats</td>
						<td>Nuts, Seeds, Cream Cheese, Butter, Avocado</td>
					</tr>
					<tr>
						<td>Nonstarchy Vegetables</td>
						<td>Cucumbers, Leafy Greens, Onions, Tomatoes</td>
					</tr>
					<tr>
						<td>Low Sugar Fruits</td>
						<td>Blueberries, Raspberries</td>
					</tr>
				</table>
			</div>
			<div id="diabetes" class="food-table">
				<h2>Diabetes Options</h2>
				<table>
					<tr>
						<th>Food Type</th>
						<th>Food Items</th>
					</tr>
					<tr>
						<td>Low Glycemic Index</td>
						<td>Pasta, Cherries, Apples, Oranges</td>
					</tr>
					<tr>
						<td>High Fibre Foods</td>
						<td>Grains, Legumes, Melons</td>
					</tr>
					<tr>
						<td>Nonstarchy Vegetables</td>
						<td>Cucumbers, Leafy Greens, Onions, Tomatoes</td>
					</tr>
					<tr>
						<td>Lean Proteins</td>
						<td>Cottage Cheese, Salmon, Lentils, Fish</td>
					</tr>
				</table>
			</div>
			<div id="lowcarb" class="food-table">
				<h2>Low Carb Options</h2>
				<table>
					<tr>
						<th>Food Type</th>
						<th>Food Items</th>
					</tr>
					<tr>
						<td>Animal-based Proteins</td>
						<td>Red Meat, Fish, Eggs</td>
					</tr>
					<tr>
						<td>Fruits</td>
						<td>Apples, Bananas, Grapes, Pineapples</td>
					</tr>
					<tr>
						<td>Nuts</td>
						<td>Walnuts, Cashews, Peanuts, Hazelnuts</td>
					</tr>
					<tr>
						<td>Healthy Fats</td>
						<td>Acovado, Olives</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="container mt-5 left-aligned-container">
			<h2 class="mb-4">Calorie and Food Plan Tracker</h2>
			<form id="trackerForm">
				<div class="mb-3 row">
					<label for="age" class="col-sm-2 col-form-label">Age:</label>
					<div class="col-sm-3">
						<input type="number" class="form-control" id="age" name="age" required />
					</div>
				</div>
				<div class="mb-3 row">
					<label for="heightFeet" class="col-sm-2 col-form-label">Height:</label>
					<div class="col-sm-1">
						<input type="number" class="form-control" id="heightFeet" name="heightFeet" placeholder="ft" required />
					</div>
					<div class="col-sm-1">
						<input type="number" class="form-control" id="heightInches" name="heightInches" placeholder="in" required />
					</div>
				</div>
				<div class="mb-3 row">
					<label for="gender" class="col-sm-2 col-form-label">Biological Sex:</label>
					<div class="col-sm-3">
						<select class="form-select" id="gender" name="biologicalSex" required>
							<option value="Select" selected>
								Select
							</option>
							<option value="male">Male</option>
							<option value="female">Female</option>
						</select>



					</div>
				</div>
				<div class="mb-3 row">
					<label for="currentWeight" class="col-sm-2 col-form-label">Current Weight (LB):</label>
					<div class="col-sm-3">
						<input type="number" class="form-control" id="currentWeight" name="currentWeight" required />
					</div>
				</div>
				<div class="mb-3 row">
					<label for="goalWeight" class="col-sm-2 col-form-label">Goal Weight (LB):</label>
					<div class="col-sm-3">
						<input type="number" class="form-control" id="goalWeight" name="goalWeight" required />
					</div>
				</div>
				<div class="mb-3 row">
					<label for="activityLevel" class="col-sm-2 col-form-label">Activity Level:</label>
					<div class="col-sm-3">
						<select class="form-select" id="activityLevel" name="activityLevel" required>
							<option value="Select" selected>
								Select
							</option>
							<option value="sedentary">
								Sedentary (little or no exercise)
							</option>
							<option value="lightly_active">
								Lightly active (light exercise/sports 1-3 days a week)
							</option>
							<option value="moderately_active">
								Moderately active (moderate exercise/sports 3-5 days a week)
							</option>
							<option value="very_active">
								Very active (hard exercise/sports 6-7 days a week)
							</option>
							<option value="extra_active">
								Extra active (very hard exercise & a physical job)
							</option>
						</select>
					</div>
				</div>
				<button type="button" onclick="calculateCalories()" class="btn btn-dark">Calculate Calories</button>
				<button type="button" onclick="displayFoodPlan()" class="btn btn-dark">Display Macros</button>
				<button type="button" onclick="displayBMI()" class="btn btn-dark">Display BMI</button>
			</form>
			<div class="tables-container mt-3">
				<div id="resultsContainer"></div>
			</div>
			<div class="tables-container mt-3">
				<div id="resultsContainer2"></div>
			</div>
			<div class="tables-container mt-3">
				<div id="resultsContainer3"></div>
			</div>
		</div>
	</div>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
	<script src="script.js"></script>
	<?php include("../footer.php"); ?>
</body>

</html>