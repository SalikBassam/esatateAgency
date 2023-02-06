<?php 
require "connectDb.php";

if (isset($_POST['add'])) {
    $img = mysqli_real_escape_string($conn ,$_FILES['img']['tmp_name']);
    $title = mysqli_real_escape_string($conn ,$_POST['title']);
    $Description = mysqli_real_escape_string($conn ,$_POST['Description']);
    $surface = mysqli_real_escape_string($conn ,$_POST['surface']);
    $Adress = mysqli_real_escape_string($conn ,$_POST['Adress']);
    $Amount = mysqli_real_escape_string($conn ,$_POST['Amount']);
    $Ad = mysqli_real_escape_string($conn ,$_POST['Ad']);
    $Type = mysqli_real_escape_string($conn ,$_POST['type']);
    
    
    
    
    $query = "INSERT INTO annonce(title,image_path,description,surface,address,amount,date_annonce,type_annonce)
     VALUES('$title','$img','$Description','$surface','$Adress','$Amount','$Ad','$Type')";
    $query_run = mysqli_query($conn,$query);
if ($query_run){
    header("Location:index.php");
}
}


if (isset($_POST["delete"])) {
    $element_id = mysqli_real_escape_string($conn , $_POST["delete"]);
    $query = "DELETE FROM annonce WHERE id='$element_id' ";
    $query_runn = mysqli_query($conn,$query);
    if ($query_runn){
       header("Location:index.php");
    } else {
       echo "Error: " . mysqli_error($conn);
    }
 }
 
 
 
