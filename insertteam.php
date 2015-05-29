<?php
    require_once('database.php');
    
    $target_dir = "images/";
    $target_file = mysqli_real_escape_string($link, $target_dir . basename($_FILES["fileToUpload"]["name"]));
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    
    if(isset($_POST["submit"])&& basename($_FILES["fileToUpload"]["name"])!='') {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        }
        else{
            die ('File is not an image.');
            $uploadOk = 0;
        }
    }
    for ($seq = 0; file_exists($target_file); $seq++){
        if(file_exists($target_file)){
            $target_file = $target_dir . basename( $_FILES["fileToUpload"]["name"]) . $seq . '.' . $imageFileType;
        } 
        
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        die ('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
        $uploadOk = 0;
    } 
    
    if ($uploadOk == 0){
        die ('Sorry, your file was not uploaded.');
    }
    else{
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        }
        else{
            die ('Sorry, there was an error uploading your file.');
        }
    }
    
    if (empty($_POST['teams_name']) || empty($_POST['city'])) 
    {
        die('Name and/or city is required!');
    }
    
    $number = 0;
    $nam = mysqli_real_escape_string($link, strip_tags($_POST['teams_name']));
    $city = mysqli_real_escape_string($link, strip_tags($_POST['city']));
    
    $sql = "INSERT INTO teams (teams_name, city, logo_name) VALUES ('".$nam."', '".$city."', '".$target_file."')";
    if (!$link->query($sql)) 
    {
         die('error: ' . mysqli_error($link));
    }else{
        header("Location:index.php"); 
    }
    $link->close();