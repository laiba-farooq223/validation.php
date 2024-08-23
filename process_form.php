<?php
//Define variables and set to empty values
$name=$email=$password="";
$nameErr=$emailErr=$passwordErr="";

//function to sanitize data
function test_input($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    //Validation name
    if(empty($_POST["name"])){
        $nameErr="Name is required";
    }else{
        $name=test_input($_POST["name"]);
        //Check if name only contains letters and whitespace
        if(!preg_match("/^[a-zA-Z-']*$/",$name)){
            $nameErr="Only letters and white space allowed";
        }
    }
    // Validation email
    if(emoty($_POST["email"])){
        $emailErr="Email is required";
    } else{
        $email=test_input($_POST["email"]);
        //Check if emailis well-formed
        if(!filter_var($email,FILTER_VALIDATION_EMAIL)){
            $emailErr="Invalid email format";
        }
    }
    // Validation password
    if(emoty($_POST["password"])){
        $emailErr="password is required";
    } else{
        $email=test_input($_POST["password"]);
        //Check password strength(minimum 8 characters, at least 1 number)
        if(strlen($password)<8||!preg_match("/[0-9]/",$password)){
            $passwordErr="password must be at least 8 characters long and include at least one
            number";
        }
}