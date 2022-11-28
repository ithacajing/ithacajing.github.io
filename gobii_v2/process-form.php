<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Form</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="data_loader_new.css"> 
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
    .info{
        font-size: 24px;
        color: blue;
        margin-top: 100px;
    }

    </style>

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
                  <li><a href="index.html">Form</a></li>
                  <!--<li><a href="dashboard.html">Dashboard</a></li>-->
                  <li><a href="d3.html">D3 Dashboard</a></li>
                  <li><a href="admin.php">Data Table</a></li>
                </ul>
              </div>
            </div>
          </div>
    <div class="container" id="formbody">
    
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
$year_quarter = "2019 Q2";

$ERRORS = 0;

if (isset($_POST['result'])) {

    echo '<h2>Thank You For Your Submission</h2>
    <p style="font-size:20px;"><b>Here is the information you have submitted:</b></p>';

    if(isset($_POST['crop']) && trim($_POST['crop']) != "")  {
        $selected_crop = $_POST['crop'];
        echo "Crop: "; 
        echo "<b>".$selected_crop."</b>"; 
        }
        else{ 
	        $ERRORS++;
            $selected_crop = '';
            echo "Please choose a certain crop."; 
    }
    echo "<br>";

    if($_POST['crop'] == 'otherCrop' && !empty($_POST['othercrop']))  {
        $selected_othercrop = $_POST['othercrop'];
        echo "The Crop Name is: "; 
        echo "<b>".$selected_othercrop."</b>"; 
        echo "<br>";
        
        }

    if(!empty($_POST['institution']))  {
        $selected_institution = $_POST['institution'];
        echo "Institution: "; 
        echo "<b>".$selected_institution."</b>";
        }
        else{ $selected_institution = '';
            echo "<br>Please choose an institution."; }
    echo "<br>";

    if($_POST['institution'] == 'otherInstitution' && !empty($_POST['otherinstitution']))  {
        $selected_otherinstitution = $_POST['otherinstitution'];
        echo "The Instition's Name: "; 
        echo "<b>".$selected_otherinstitution."</b>";
        echo "<br>";
        }
        
    if(!empty($_POST['environment']))  {
        $selected_environment = $_POST['environment'];
        echo "Environment: "; 
        echo "<b>".$selected_environment."</b>";
        }
        else{ echo "<br>Please choose an enviroment."; }
    echo "<br>";

    if(!empty($_POST['version']))  {
        $selected_version = $_POST['version'];
        echo "Release Version: "; 
        echo "<b>".$selected_version."</b>";
        }
        else{ echo "<br>Please enter the version name."; }
    echo "<br>";   
    if(!empty($_POST['projectN']))  {
        $selected_projectN = $_POST['projectN'];
        echo "Project Name: "; 
        echo "<b>".$selected_projectN."</b>";
        }
        else{ echo "<br>Please enter the project name."; }
    
    echo "<br>";        
    if(!empty($_POST['experimentN']))  {
        $selected_experimentN = $_POST['experimentN'];
        echo "Experiment Name: "; 
        echo "<b>".$selected_experimentN."</b>";
        }
        else{ echo "<br>Please enter the experiment name."; }
    
    echo "<br>";        
    if(!empty($_POST['datasetN']))  {
        $selected_datasetN = $_POST['datasetN'];
        echo "Dataset Name: "; 
        echo "<b>".$selected_datasetN."</b>";
        }
        else{ echo "<br>Please enter the dataset name."; } 
    echo "<br>";    
    if(isset($_POST['datasetstatus']))  {
        $selected_datasetstatus = $_POST['datasetstatus'];
        echo "Dataset Status: "; 
        echo "<b>".$selected_datasetstatus."</b>"; 
        }
        else{ echo "Please choose the dataset status."; }
    echo "<br>";  
    if(!empty($_POST['datasetNote']))  {
        $selected_datasetNote = $_POST['datasetNote'];
        echo "Comment: "; 
        echo "<b>".$selected_datasetNote."</b>";
        }
        else{ echo "<br>Please describe something specific about the Dataset."; }  
    echo "<br>";
    if(!empty($_POST['Nsamples']))  {
        $selected_Nsamples = $_POST['Nsamples'];
        echo "Number of Samples: "; 
        echo "<b>".$selected_Nsamples."</b>";
        }
        else{ echo "<br>Please enter the number of samples."; }  
    echo "<br>";

    if(!empty($_POST['Nmarkers']))  {
        $selected_Nmarkers = $_POST['Nmarkers'];
        echo "Number of Markers: "; 
        echo "<b>".$selected_Nmarkers."</b>";
        }
        else{ echo "<br>Please enter the number of markers."; }  
    echo "<br>";

    if(isset($_POST['dml']))  {
        $selected_dml = $_POST['dml'];
        echo "Dataset matrix loaded: "; 
        echo "<b>".$selected_dml."</b>"; 
        }
        else{ echo "Please choose the datadset matrix loaded status."; }
    echo "<br>";

    if(!empty($_POST['matrixsize']))  {
        $selected_matrixsize = $_POST['matrixsize'];
        echo "Matrix size (MB): "; 
        echo "<b>".$selected_matrixsize."</b>";
        }
        else{ echo "<br>Please enter the matrix size."; }  
    echo "<br>";

    if(!empty($_POST['datevendor']))  {
        $selected_datevendor = $_POST['datevendor'];
        echo "Date of dataset matrix returned from vendor: ";
        echo "<b>".$selected_datevendor."</b>";
        }
        else{ echo "<br>Please enter the date of dataset matrix returned from vendor."; }  
    echo "<br>";

    if(!empty($_POST['datematrixl']))  {
        $selected_datematrixl = $_POST['datematrixl'];

        echo "Date of dataset matrix loaded: ";
        

        echo "<b>".$selected_datematrixl."</b>";

        }
        else{ echo "<br>Please enter the date of dataset matrix loaded."; }  
    echo "<br>";

    if(!empty($_POST['fname']))  {
        $selected_fname = $_POST['fname'];
        echo "First Name: "; 
        echo "<b>".$selected_fname."</b>";
        }
        else{ echo "<br>Please enter your First Name."; }
    echo "<br>";

    if(!empty($_POST['lname']))  {
        $selected_lname = $_POST['lname'];
        echo "Last Name: "; 
        echo "<b>".$selected_lname."</b>";
        }
        else{  $selected_lname = '';
            echo "<br>Please enter your Last Name."; 
        }
    echo "<br>";  

    if(!empty($_POST['datesubmitted']))  {
        $selected_datesubmitted = $_POST['datesubmitted'];
        echo "Date submitted: ";
        echo "<b>".$selected_datesubmitted."</b>";
        }
        else{
            $selected_datesubmitted = '';
            echo "<br>Please enter the submitted date."; }

    # date of load mm/dd/yyyy
    $year_quarter = get_year_quarter($selected_datematrixl);

    echo "<br>";    
    } else {
        $ERRORS++; 
    }

if($ERRORS === 0){
    	//connect to database
        $link = mysqli_connect("localhost", "gloader", "g0b11", "gobii");
        //$link = mysqli_connect("localhost", "root", "", "Gobii_data_loader");
 
    	// Check connection
    	if($link === false){
        	die("ERROR: Could not connect. " . mysqli_connect_error());
    	} 
    
        $stmt = $link->prepare("INSERT INTO tb_data_loader (crops, othercrop, institution, otherinstitution, environment, release_version, project_name, experiment_name, dataset_name, dataset_status, comment, number_samples, number_markers, dataset_matrix_loaded, matrix_size, date_return_vendor, date_loaded, first_name, last_name, date_submitted, year_quarter) 
	    VALUES (?, ?, ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

    	if (
		$stmt && 
    		$stmt->bind_param("sssssssssssiisdssssss",$selected_crop, $selected_othercrop, $selected_institution, $selected_otherinstitution, $selected_environment, $selected_version, $selected_projectN, 
            $selected_experimentN, $selected_datasetN, $selected_datasetstatus, $selected_datasetNote, $selected_Nsamples, $selected_Nmarkers, $selected_dml, $selected_matrixsize, $selected_datevendor, $selected_datematrixl, $selected_fname, $selected_lname, $selected_datesubmitted, $year_quarter)
		&&
    		$stmt->execute()) {
	 		echo "<div id='php_msg'><p><h4>Records was inserted successfully.</h4></p>
        		<p> <h4> <a href='index.html'>Go back to the Form.</a></h4></p>
        		</div>";
    	} else{
        	echo "ERROR: Could not able to execute. " . mysqli_error($link);
           }
           
    	$stmt->close();
        $link->close(); 
        
    } else {

        echo "<p class='info'>Please click the web browser Back button and check your input, and then submit the data.</p>";
    }
    

function get_year_quarter($date){
    $parsed_date = date_parse($date);

    $year = $parsed_date['year'];
    $month = (int) $parsed_date['month'];
    $quarter = '';
    
    if ( $month <=3 ) {
        $quarter = "Q1";
    } elseif ($month >= 4 && $month <= 6){
        $quarter = "Q2";
    } elseif ($month >= 7 && $month <= 9){
        $quarter = "Q3";
    } elseif ($month >= 10 && $month <= 12){ 
        $quarter = "Q4";
    }

    $year_quarter = $year . " " . $quarter;
    
    return $year_quarter;

}
   
?>
</div>
<div class="footer">
    <p class="text-center">GOBII © 2019</p> 
                   
</div>    
</body>
</html>
