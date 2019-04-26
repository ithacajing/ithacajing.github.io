<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Form</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="data_loader_new.css"> 
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a href="" class="logo"><img src="image/gobii.png" /></a>
              </div>
              <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="index.html">Home</a></li>
                  <li><a href="dashboard.html">Dashboard</a></li>
                  <li><a href="d3.html">D3 Chart</a></li>
                </ul>
              </div>
            </div>
          </div>
    <div class="container" id="formbody">
    <h2>Thank You For Your Submission</h2>
    <p style="font-size:20px;"><b>Here is the information you have submitted:</b></p>
<?php

//var_dump($_REQUEST);
$selected_crop = '';
$selected_othercrop = '';
$selected_institution = '';
$selected_otherinstitution = '';
$selected_environment = '';
$selected_version = '';
$selected_projectN = '';
$selected_experimentN = '';
$selected_datasetN = '';
$selected_datasetstatus = '';
$selected_datasetNote = '';
$selected_Nsamples = '';
$selected_Nmarkers = '';
$selected_dml = '';
$selected_matrixsize = '';
$selected_datevendor = '';
$selected_datematrixl = '';
$selected_fname = '';
$selected_lname = '';
$selected_datesubmitted = '';

  if (isset($_POST['result'])) {
    if(isset($_POST['crop']))  {
        $selected_crop = $_POST['crop'];
        echo "You have selected: "; 
        echo "<b>".$selected_crop."</b>"; 
        }
        else{ 
            $selected_crop = '';
            echo "Please choose a certain crop."; 
    }
    echo "<br>";
    if(isset($_POST['othercrop']))  {
        $selected_othercrop = $_POST['othercrop'];
        echo "The other crop name is: "; 
        echo "<b>".$selected_othercrop."</b>"; 
        }
        else{ $selected_othercrop = '';
            echo "Please enter the other crop name."; 
        }
    echo "<br>";
    if(isset($_POST['institution']))  {
        $selected_institution = $_POST['institution'];
        echo "You have selected: "; 
        echo "<b>".$selected_institution."</b>";
        }
        else{ $selected_institution = '';
            echo "<br>Please choose an institution."; }
    echo "<br>";
    if(isset($_POST['otherinstitution']))  {
        $selected_otherinstitution = $_POST['otherinstitution'];
        echo "The other instition name is: "; 
        echo "<b>".$selected_otherinstitution."</b>";
        }
        else{ echo "<br>Please enter the other institution name."; }
    echo "<br>";
    if(isset($_POST['environment']))  {
        $selected_environment = $_POST['environment'];
        echo "You have selected: "; 
        echo "<b>".$selected_environment."</b>";
        }
        else{ echo "<br>Please choose an enviroment."; }
    echo "<br>";
    if(!empty($_POST['version']))  {
        $selected_version = $_POST['version'];
        echo "You have selected: "; 
        echo "<b>".$selected_version."</b>";
        }
        else{ echo "<br>Please enter the version name."; }
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
    if(!empty($_POST['datasetNote']))  {
        $selected_datasetNote = $_POST['datasetNote'];
        echo "Dataset note: "; 
        echo "<b>".$selected_datasetNote."</b>";
        }
        else{ echo "<br>Please describe something specific about the Dataset."; }  
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
    if(!empty($_POST['fname']))  {
        $selected_fname = $_POST['fname'];
        echo "The first name is: "; 
        echo "<b>".$selected_fname."</b>";
        }
        else{ echo "<br>Please enter your first name."; }
    echo "<br>";
    if(!empty($_POST['lname']))  {
        $selected_lname = $_POST['lname'];
        echo "The last name is: "; 
        echo "<b>".$selected_lname."</b>";
        }
        else{  $selected_lname = '';
            echo "<br>Please enter your last name."; 
        }
    echo "<br>";    
    /*if(!empty($_POST['submitperson'])) {
        echo "The data submitted by: ";
        foreach ($_POST['submitperson'] as $select)
        {
        echo "<b>".$select."</b>";
        }
        }
        else { echo "Please Select the person.<br/>";}*/
    echo "<br>";
    if(!empty($_POST['datesubmitted']))  {
        $selected_datesubmitted = $_POST['datesubmitted'];
        echo "The submitted date is: ";
        echo "<b>".$selected_datesubmitted."</b>";
        }
        else{
            $selected_datesubmitted = '';
            echo "<br>Please enter the submitted date."; }
    echo "<br>";    
    }
    //connect to database
    $link = mysqli_connect("localhost", "root", "", "Gobii_data_loader");
    //$db_connection = pg_connect("host=localhost dbname=cbsugobiixvm09.biohpc.cornell.edu:8081 user=appuser password=g0b11isw3s0m3");
 
    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    } 
    // Print host information
   // echo "Connect Successfully. Host info: " . 
    //mysqli_get_host_info($link);
    

    // Attempt insert query execution
    $sql = "INSERT INTO tb_data_loader_new (crops, othercrop, institution, otherinstitution, enviroment, release_version, project_name, experiment_name, 
                        dataset_name, dataset_status, comment, number_samples, number_markers, dataset_matrix_loaded, matrix_size, 
                        date_return_vendor, date_loaded, first_name, last_name, date_submitted) 
    VALUES ('$selected_crop', '$selected_othercrop', '$selected_institution', '$selected_otherinstitution', '$selected_environment', '$selected_version', '$selected_projectN', 
            '$selected_experimentN', '$selected_datasetN', '$selected_datasetstatus', '$selected_datasetNote', '$selected_Nsamples', '$selected_Nmarkers', 
            '$selected_dml', '$selected_matrixsize', '$selected_datevendor', '$selected_datematrixl', '$selected_fname', '$selected_lname', '$selected_datesubmitted')";
    if(mysqli_query($link, $sql)){
        echo "<div id='php_msg'><p>Records inserted successfully.</p>
        <p> <a href='index.html'>Go back to the Form</a></p>
        </div>";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }

    // thank you modal show
    //header("Location: index.html");

   
?>
</div>
<div class="footer">
    <p class="text-center">GOBII © 2019</p> 
                   
</div>    
</body>
</html>
