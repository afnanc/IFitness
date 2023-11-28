function showExerciseTable(tableId) {
	var tables = document.querySelectorAll(".exercise-table");
	tables.forEach(function (table) {
		table.style.display = "none";
	});
	var selectedTable = document.getElementById(tableId);
	if (selectedTable) {
		selectedTable.style.display = "block";
	}
}
document
	.querySelector(".food-dropdown-content")
	.addEventListener("click", function (event) {
		event.preventDefault();

		var tableMap = {
			showLactose: "lactose",
			showGluten: "gluten",
			showVegetarian: "vegetarian",
			showVegan: "vegan",
			showKeto: "keto",
			showDiabetes: "diabetes",
			showLowCarb: "lowcarb",
		};

		var clickedItemId = event.target.id;
		if (tableMap[clickedItemId]) {
			showFoodTable(tableMap[clickedItemId]);
		}
	});

document
	.querySelector(".dropdown-content")
	.addEventListener("click", function (event) {
		event.preventDefault();

		var tableMap = {
			showBack: "backExercises",
			showChest: "chestExercises",
			showLegs: "legExercises",
			showBiceps: "bicepExercises",
			showTriceps: "tricepExercises",
			showShoulders: "shoulderExercises",
			showCore: "coreExercises",
			showChestBack: "chestBackExercises",
			showArms: "armExercises",
			showLegsCore: "legsCoreExercises",
			showChestTriceps: "chestTricepExercises",
			showBackBiceps: "backBicepExercises",
			showLegsShoulders: "legsShouldersExercises",
		};

		var clickedItemId = event.target.id;
		if (tableMap[clickedItemId]) {
			showExerciseTable(tableMap[clickedItemId]);
		}
	});

function calculateCalories() {
	var age = parseInt(document.getElementById("age").value);
	var heightFeet = parseInt(document.getElementById("heightFeet").value);
	var heightInches = parseInt(document.getElementById("heightInches").value);
	var currentWeight = parseInt(document.getElementById("currentWeight").value);
	var gender = document.getElementById("gender").value; // Update to use "gender" ID
	var activityLevel = document.getElementById("activityLevel").value;
	var weightGoal = document.getElementById("goalWeight").value; // Update to use "goalWeight" ID

	if (
		isNaN(age) ||
		isNaN(heightFeet) ||
		isNaN(heightInches) ||
		isNaN(currentWeight) ||
		gender === "" ||
		activityLevel === "" ||
		weightGoal === ""
	) {
		alert("Please enter all information.");
		return;
	}
	var heightCm = (heightFeet * 12 + heightInches) * 2.54;
	var weightKg = currentWeight * 0.453592;

	// Basal Metabolic Rate (Mifflin-St Jeor Equation)
	var bmr =
		gender === "male"
			? 10 * weightKg + 6.25 * heightCm - 5 * age + 5 // For men
			: 10 * weightKg + 6.25 * heightCm - 5 * age - 161; // For women

	var multiplier = 1.2; // sedentary
	if (activityLevel === "lightly_active") multiplier = 1.375;
	if (activityLevel === "moderately_active") multiplier = 1.55;
	if (activityLevel === "very_active") multiplier = 1.725;
	if (activityLevel === "extra_active") multiplier = 1.9;

	var maintenanceCalories = bmr * multiplier;
	var deficitCalories = maintenanceCalories - 500;
	var bulkingCalories = maintenanceCalories + 500;

	var results = `
        <div id="calorieResults" class="exercise-table2">
            <h2>Calorie Goals</h2>
            <table>
                <thead>
                    <tr>
                        <th>Calorie Goal</th>
                        <th>Calories</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Maintenance</td>
                        <td>${Math.round(maintenanceCalories)}</td>
                    </tr>
                    <tr>
                        <td>Weight Loss (Deficit)</td>
                        <td>${Math.round(deficitCalories)}</td>
                    </tr>
                    <tr>
                        <td>Weight Gain (Bulking)</td>
                        <td>${Math.round(bulkingCalories)}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    `;

	var container = document.getElementById("resultsContainer");
	if (!container) {
		container = document.createElement("div");
		container.id = "resultsContainer";
		document.querySelector(".tables-container").appendChild(container);
	}
	container.innerHTML = results;
	container.style.display = "block";
}

function displayFoodPlan() {
	var age = parseInt(document.getElementById("age").value);
	var heightFeet = parseInt(document.getElementById("heightFeet").value);
	var heightInches = parseInt(document.getElementById("heightInches").value);
	var currentWeight = parseInt(document.getElementById("currentWeight").value);
	var gender = document.getElementById("gender").value;
	var activityLevel = document.getElementById("activityLevel").value;
	var weightGoal = document.getElementById("goalWeight").value;

	if (
		isNaN(age) ||
		isNaN(heightFeet) ||
		isNaN(heightInches) ||
		isNaN(currentWeight) ||
		gender === "" ||
		activityLevel === "" ||
		weightGoal === ""
	) {
		alert("Please enter all information.");
		return;
	}

	// Convert height to centimeters
	var heightCm = (heightFeet * 12 + heightInches) * 2.54;

	// Convert weight to kilograms (1 pound = 0.453592 kg)
	var weightKg = currentWeight * 0.453592;

	var bmr =
		gender === "male"
			? 10 * weightKg + 6.25 * heightCm - 5 * age + 5 // For men
			: 10 * weightKg + 6.25 * heightCm - 5 * age - 161; // For women

	// Adjust BMR based on activity level
	var multiplier = 1.2; // sedentary
	if (activityLevel === "lightly_active") multiplier = 1.375;
	if (activityLevel === "moderately_active") multiplier = 1.55;
	if (activityLevel === "very_active") multiplier = 1.725;
	if (activityLevel === "extra_active") multiplier = 1.9;

	var maintenanceCalories = bmr * multiplier;

	// Adjust calories based on weight goal
	var calorieAdjustment = 0;
	if (weightGoal === "lose") {
		calorieAdjustment = -500; // Decifit weight loss
	} else if (weightGoal === "gain") {
		calorieAdjustment = 500; // Addition for weight gain
	}

	var totalCalories = maintenanceCalories + calorieAdjustment;

	// Macro Percentages
	var proteinPercentage = 25;
	var fatPercentage = 30;
	var carbPercentage = 45;

	var proteinGrams = Math.round(
		((proteinPercentage / 100) * totalCalories) / 4
	); // protein
	var fatGrams = Math.round(((fatPercentage / 100) * totalCalories) / 9); // fat
	var carbGrams = Math.round(((carbPercentage / 100) * totalCalories) / 4); // carbs

	var results = `
			<div id="macroResults" class="exercise-table2">
				<h2>Macronutrient Breakdown</h2>
				<table>
					<thead>
						<tr>
							<th>Macronutrient</th>
							<th>Grams</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Protein</td>
							<td>${proteinGrams}</td>
						</tr>
						<tr>
							<td>Fat</td>
							<td>${fatGrams}</td>
						</tr>
						<tr>
							<td>Carbohydrates</td>
							<td>${carbGrams}</td>
						</tr>
					</tbody>
				</table>
			</div>
		`;

	var container = document.getElementById("resultsContainer2");
	if (!container) {
		container = document.createElement("div");
		container.id = "resultsContainer2";
		document.querySelector(".tables-container").appendChild(container);
	}
	container.innerHTML = results;
	container.style.display = "block";
}

function showFoodTable(tableId) {
	var tables = document.querySelectorAll(".food-table");
	tables.forEach(function (table) {
		table.style.display = "none";
	});
	var selectedTable = document.getElementById(tableId);
	if (selectedTable) {
		selectedTable.style.display = "block";
	}
}

// Handle food dropdown

function displayBMI() {
	var heightFeet = parseInt(document.getElementById("heightFeet").value);
	var heightInches = parseInt(document.getElementById("heightInches").value);
	var currentWeight =
		parseInt(document.getElementById("currentWeight").value) * 0.453592;
	var totalHeight = (heightFeet * 12 + heightInches) * 2.54;

	if (
		isNaN(currentWeight) ||
		isNaN(totalHeight) ||
		totalHeight <= 0 ||
		currentWeight <= 0
	) {
		alert("Please enter valid weight and height.");
		return;
	}

	// Calculate BMI
	var bmi = currentWeight / ((totalHeight * totalHeight) / 10000);

	// Display the BMI value in the resultsContainer3
	var results = `
        <div id="resultsContainer3" class="exercise-table2">
            <h2>BMI Calculation</h2>
            <p>Your BMI is: ${bmi.toFixed(2)}</p>
        </div>
    `;

	var container = document.getElementById("resultsContainer3");
	if (!container) {
		container = document.createElement("div");
		container.id = "resultsContainer3";
		document.querySelector(".tables-container").appendChild(container);
	}
	container.innerHTML = results;
	container.style.display = "block";
}
