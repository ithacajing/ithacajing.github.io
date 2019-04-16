<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Form</title>
</head>
<body>
    <h1>Thank You</h1>
    <p>Here is the information you have submitted:</p>
<?php

  if (isset($_POST['result'])) {
    if(isset($_POST['crop']))  {
    $selected_crop = $_POST['crop'];
    echo "You have selected: "; 
    echo "<b>".$selected_crop."</b>"; 
    }
    else{ echo "Please choose a certain crop."; }
    echo "<br>";
    if(isset($_POST['institution']))  {
        $selected_institution = $_POST['institution'];
        echo "You have selected: "; 
        echo "<b>".$selected_institution."</b>";
        }
        else{ echo "<br>Please choose an institution."; }
    echo "<br>";
    if(isset($_POST['enviroment']))  {
        $selected_enviroment = $_POST['enviroment'];
        echo "You have selected: "; 
        echo "<b>".$selected_enviroment."</b>";
        }
        else{ echo "<br>Please choose an enviroment."; }
    echo "<br>";
    if(isset($_POST['version']))  {
        $selected_version = $_POST['version'];
        echo "You have selected: "; 
        echo "<b>".$selected_version."</b>";
        }
        else{ echo "<br>Please choose a version."; }   
    echo "<br>";        
    if(!empty($_POST['projectN']))  {
        $selected_projectN = $_POST['projectN'];
        echo "You project name is: "; 
        echo "<b>".$selected_projectN."</b>";
        }
        else{ echo "<br>Please enter the project name."; }
    
    echo "<br>";        
    if(!empty($_POST['experimentN']))  {
        $selected_experimentN = $_POST['experimentN'];
        echo "You experiment name is: "; 
        echo "<b>".$selected_experimentN."</b>";
        }
        else{ echo "<br>Please enter the experiment name."; }
    
    echo "<br>";        
    if(!empty($_POST['datasetN']))  {
        $selected_datasetN = $_POST['datasetN'];
        echo "You dataset name is: "; 
        echo "<b>".$selected_datasetN."</b>";
        }
        else{ echo "<br>Please enter the dataset name."; } 
    echo "<br>";    
    if(isset($_POST['datasetstatus']))  {
        $selected_datasetstatus = $_POST['datasetstatus'];
        echo "You have selected: "; 
        echo "<b>".$selected_datasetstatus."</b>"; 
        }
        else{ echo "Please choose the dataset status."; }
    echo "<br>";  
    if(!empty($_POST['Nsamples']))  {
        $selected_Nsamples = $_POST['Nsamples'];
        echo "Your number of samples are: "; 
        echo "<b>".$selected_Nsamples."</b>";
        }
        else{ echo "<br>Please enter the number of samples."; }  
    echo "<br>";
    if(!empty($_POST['Nmarkers']))  {
        $selected_Nmarkers = $_POST['Nmarkers'];
        echo "Your number of markers are: "; 
        echo "<b>".$selected_Nmarkers."</b>";
        }
        else{ echo "<br>Please enter the number of markers."; }  
    echo "<br>";
    if(isset($_POST['dml']))  {
        $selected_dml = $_POST['dml'];
        echo "Your datadset matrix loaded status is: "; 
        echo "<b>".$selected_dml."</b>"; 
        }
        else{ echo "Please choose the datadset matrix loaded status."; }
    echo "<br>";
    if(!empty($_POST['matrixsize']))  {
        $selected_matrixsize = $_POST['matrixsize'];
        echo "Your matrix size is: "; 
        echo "<b>".$selected_matrixsize."</b>";
        }
        else{ echo "<br>Please enter the matrix size."; }  
    echo "<br>";
    if(!empty($_POST['datevendor']))  {
        $selected_datevendor = $_POST['datevendor'];
        echo "The date of dataset matrix returned from vendor is: ";
        echo "<b>".$selected_datevendor."</b>";
        }
        else{ echo "<br>Please enter the date of dataset matrix returned from vendor."; }  
    echo "<br>";
    if(!empty($_POST['datematrixl']))  {
        $selected_datematrixl = $_POST['datematrixl'];
        echo "The date of dataset matrix loaded is: ";
        echo "<b>".$selected_datematrixl."</b>";
        }
        else{ echo "<br>Please enter the date of dataset matrix loaded."; }  
    echo "<br>";
    if(!empty($_POST['submitperson'])) {
        echo "The data submitted by: ";
        foreach ($_POST['submitperson'] as $select)
        {
        echo "<b>".$select."</b>";
        }
        }
        else { echo "Please Select the person.<br/>";}
    echo "<br>";
    if(!empty($_POST['datesubmitted']))  {
        $selected_datesubmitted = $_POST['datesubmitted'];
        echo "The submitted date is: ";
        echo "<b>".$selected_datesubmitted."</b>";
        }
        else{ echo "<br>Please enter the submitted date."; }
    echo "<br>";    
    }
    //connect to database
    $link = mysqli_connect("localhost", "root", "", "Gobii_data_loader");
 
    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    } 
    // Print host information
    echo "Connect Successfully. Host info: " . 
    mysqli_get_host_info($link);
    
    // Attempt insert query execution
    $sql = "INSERT INTO tb_data_loader_new (crops, institution, enviroment, release_version, project_name, experiment_name, 
                        dataset_name, dataset_status, number_samples, number_markers, dataset_matrix_loaded, matrix_size, 
                        date_return_vendor, date_loaded, submitted_person, date_submitted) 
    VALUES ('$selected_crop', '$selected_institution', '$selected_enviroment', '$selected_version', '$selected_projectN', 
            '$selected_experimentN', '$selected_datasetN', '$selected_datasetstatus', '$selected_Nsamples', '$selected_Nmarkers', 
            '$selected_dml', '$selected_matrixsize', '$selected_datevendor', '$selected_datematrixl', '$select', '$selected_datesubmitted')";
    if(mysqli_query($link, $sql)){
        echo "Records inserted successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
   
?>
    
</body>
</html>
