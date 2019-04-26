<?php
require_once 'dbconnection.php';
$link = mysqli_connect("localhost", "root", "ashok@12345","regi") or die("Error " . mysqli_error($link));
if( isset($_POST['submit']) ) {	
    echo '<script>alert("Thank you!, You are successfully posted....."); </script>';
    // prevent sql injections/ clear user invalid inputs
    $category = trim($_POST['category']);
    $category = strip_tags($category);
    $category = htmlspecialchars($category);

    $headline = trim($_POST['headline']);
    $headline = strip_tags($headline);
    $headline = htmlspecialchars($headline);

    $file = trim($_POST['file']);
    $file = strip_tags($file);
    $file = htmlspecialchars($file);

    $content = trim($_POST['content']);
    $content = strip_tags($content);
    $content = htmlspecialchars($content);

     $error=false;


    if (empty($category)){
        $error = true;
        $categoryError = "Please enter category.";
    }  
    if (empty($headline)){
        $error = true;
        $headlineError = "Please enter headline.";
    } 

    if (empty($file)){
        $error = true;
        $fileError = "Please enter file.";
    } 
    if (empty($content)){
        $error = true;
        $contentError = "Please enter content.";
    } 

    if (!$error) {
        $query = "INSERT INTO post(category,headline,file,content) VALUES('$category','$headline','$file','$content')";
        $res = mysqli_query($link,$query);
        if ($res) {
            $errTyp = "success";
            $errMSG = "Successfully created a login";
            unset($category);
            unset($headline);
            unset($file);
            header("Refresh:3");
        } else {
            $errTyp = "danger";
            $errMSG = "Something went wrong, try again later...";	
            header("Refresh:3");
        }	
            
    }
    
}
?>
