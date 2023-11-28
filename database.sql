DROP TABLE `Food`, `Progress_Report`, `Body_Measure`, `Users`;

CREATE TABLE Users (
    Username VARCHAR(50) UNIQUE,
    First_Name VARCHAR(50),
    Last_Name VARCHAR(50),
    Hash VARCHAR(100) NOT NULL,
    Last_Visited DATE, # YYYY-MM-DD
    Email VARCHAR(50) UNIQUE,
    Tel_No VARCHAR(20) NOT NULL,
    Address VARCHAR(100) NOT NULL,  
    City_Code VARCHAR(10)
);

CREATE TABLE Body_Measure (
    Username VARCHAR(50) UNIQUE,
    Height INTEGER NOT NULL,
    Weight DECIMAL(10,2) NOT NULL,
    Last_Recorded DATE, # YYYY-MM-DD
    BMI DECIMAL(10,2),
    PRIMARY KEY (Username),
    FOREIGN KEY (Username) REFERENCES Users(Username)
);

CREATE TABLE Progress_Report (
    Username VARCHAR(50) NOT NULL,
    Muscle_Group VARCHAR(50) NOT NULL,
    Workout VARCHAR(50),
    Weight INT NOT NULL,
    Reps INT NOT NULL,
    Last_Recorded DATE NOT NULL,
    PRIMARY KEY (Username, Muscle_Group, Workout, Last_Recorded),
    FOREIGN KEY (Username) REFERENCES Users(Username)
);

CREATE TABLE Food (
    Username VARCHAR(50) NOT NULL,
    Name VARCHAR(50) NOT NULL,
    Calories INT NOT NULL,
    Last_Recorded DATE NOT NULL,
    PRIMARY KEY (Username),
    FOREIGN KEY (Username) REFERENCES Users(Username)
);

INSERT INTO Users (Username, First_Name, Last_Name, Hash, Last_Visited, Email, Tel_No, Address, City_Code)VALUES("Jasz", "Jaskeerat", "Singh", "$2y$10$XacFpMPw/aq.3R8no5z16u0sH2kJvZ6qeOhnK9UF2aQ564mAo/p7S", "2023-05-20", "jaskeerat@torontomu.ca", "1234567890", "SeaSaw Street", "ABCDEF");
INSERT INTO Users (Username, First_Name, Last_Name, Hash, Last_Visited, Email, Tel_No, Address, City_Code)VALUES("s3kullar", "Simardeep", "Kullar", "$2y$10$KjkKxp0cl34NLWc6ZcyOg.vgvmY4g7y9VbaBAKublJRZU85R/AqJ6", "2023-09-11", "simardeep.kullar@torontomu.ca", "0987654321", "Hawt Street", "ABC123");
INSERT INTO Users (Username, First_Name, Last_Name, Hash, Last_Visited, Email, Tel_No, Address, City_Code)VALUES("afnC", "Afnan", "Chowdhury", "$2y$10$SDBo/pRYN5KfQjNZMBSZweGh.pvTW/6UgTIWGuwV8ao/1ICoYh8TK", "2023-10-22", "afnan.chowdhury@torontomu.ca", "1223345678", "Hero Street", "CCH133");

INSERT INTO Body_Measure (Username, Height, Weight, Last_Recorded, BMI)VALUES("Jasz", 180, 170, "2023-05-20", 23.70);
INSERT INTO Body_Measure (Username, Height, Weight, Last_Recorded, BMI)VALUES("s3kullar", 185, 200, "2023-09-11", 26.40);
INSERT INTO Body_Measure (Username, Height, Weight, Last_Recorded, BMI)VALUES("afnC", 168, 143, "2023-10-22", 23.1);

INSERT INTO Progress_Report (Username, Muscle_Group, Workout, Weight, Reps, Last_Recorded)VALUES("Jasz", "Back", "T-Bar", 75, 10, "2023-05-20");
INSERT INTO Progress_Report (Username, Muscle_Group, Workout, Weight, Reps, Last_Recorded)VALUES("s3kullar", "Chest", "Bench Press", 180, 10, "2023-05-20");
INSERT INTO Progress_Report (Username, Muscle_Group, Workout, Weight, Reps, Last_Recorded)VALUES("s3kullar", "Chest", "Bench Press", 195, 8, "2023-07-20");
INSERT INTO Progress_Report (Username, Muscle_Group, Workout, Weight, Reps, Last_Recorded)VALUES("s3kullar", "Chest", "Bench Press", 205, 8, "2023-09-20");
INSERT INTO Progress_Report (Username, Muscle_Group, Workout, Weight, Reps, Last_Recorded)VALUES("s3kullar", "Chest", "Bench Press", 215, 8, "2023-11-20");
INSERT INTO Progress_Report (Username, Muscle_Group, Workout, Weight, Reps, Last_Recorded)VALUES("s3kullar", "Chest", "Incline Press", 185, 8, "2023-06-20");
INSERT INTO Progress_Report (Username, Muscle_Group, Workout, Weight, Reps, Last_Recorded)VALUES("s3kullar", "Chest", "Incline Press", 185, 8, "2023-07-20");
INSERT INTO Progress_Report (Username, Muscle_Group, Workout, Weight, Reps, Last_Recorded)VALUES("s3kullar", "Chest", "Incline Press", 195, 8, "2023-08-20");
INSERT INTO Progress_Report (Username, Muscle_Group, Workout, Weight, Reps, Last_Recorded)VALUES("s3kullar", "Chest", "Incline Press", 200, 8, "2023-09-20");
INSERT INTO Progress_Report (Username, Muscle_Group, Workout, Weight, Reps, Last_Recorded)VALUES("s3kullar", "Back", "T-Bar", 75, 10, "2023-05-20");
INSERT INTO Progress_Report (Username, Muscle_Group, Workout, Weight, Reps, Last_Recorded)VALUES("afnC", "Shoulder", "Shoulder Press", 50, 8, "2023-10-22");

INSERT INTO Food (Username, Name, Calories, Last_Recorded)VALUES("Jasz", "Tandoori Chicken", 500, "2023-05-20");
INSERT INTO Food (Username, Name, Calories, Last_Recorded)VALUES("s3kullar", "BBQ Chicken", 700, "2023-09-11");
INSERT INTO Food (Username, Name, Calories, Last_Recorded)VALUES("afnC", "Chilli Fish", 650, "2023-10-22");
