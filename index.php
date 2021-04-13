<?php
    require_once("src/latte.php");
    $latte = new Latte\Engine;

    $latte->setTempDirectory('temp');

    $params = [
        'weight' => 80,
        'height' => 185,
        'age' => 30,
        'bmi' => null
    ];
    
    if(isset($_POST["submit"])) {
        $bmi = round($_POST["sweight"] / pow($_POST["sheight"]/100, 2), 2);
        $weight = $_POST["sweight"];
        $height = $_POST["sheight"];
        $age = $_POST["sage"];

        $status_arr = [
            "Underweight", 
            "Normal weight", 
            "Overweight", 
            "Obesity", 
            "Severe obesity"
        ];
        
        $colors = [
            "ff5e00", 
            "00f700", 
            "ffc400", 
            "ff5e00", 
            "ff0000"
        ];
        
        $params = [
            'weight' => $weight,
            'height' => $height,
            'age' => $age,
            'bmi' => $bmi,
            'status_arr' => $status_arr,
            'colors' => $colors
        ];
    }

    $params['title'] = "BMI Calculator";
    
    $latte->render('template/bmiTemplate.latte', $params);