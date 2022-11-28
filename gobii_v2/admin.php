<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Loading Tracking</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="data_loader_new.css"> 
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="data_loader.js"></script>

        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" type="text/css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/1.0.7/css/responsive.dataTables.min.css" type="text/css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css" type="text/css" />
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/1.0.7/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
</head>
<body>
   <!--<nav>
                <img src="image/gobii.png" height="56"  alt="">
                <h1 class="header">GOBii Project</h1>
    </nav>-->
    <!--<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        -->
    <div class="navbar navbar-default navbar-static-top " role="navigation">
	    <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed ml-auto hidden-sm-up float-xs-right" data-toggle="collapse" data-target=".navbar-collapse">
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
                  
    
    <div class="container">  
        <br>
       
        <h2 class="well" >Data Loading Tracking Data Table</h2>
   
    	<br><br> 
        
        
            <div class="row">
                    <?php
                    //connect to database
                    $link = mysqli_connect("localhost", "root", "g0b11", "gobii");
                    //$link = mysqli_connect("localhost", "root", "", "Gobii_data_loader");
             
                    // Check connection
                    if($link === false){
                        die("ERROR: Could not connect. " . mysqli_connect_error());
                    } 
                
                    $stmt = $link->prepare("SELECT * FROM tb_data_loader");
            
                
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if($result->num_rows === 0) exit('No rows');
                    //print "<table class='table'>";
                    $data = array();
                    echo '<table id="gobii_data" class="display responsive" style="width:100%">';
                    echo "<thead>
                    <tr>
                        <th class='all'>ID</th>
                        <th class='all'>Crops</th>
                        <th class='none'>Other Crop</th>
                        <th class='all'>Institution</th>
                        <th class='none'>Other Institution</th>
                        <th class='all'>Environment</th>
                        <th class='none'>Release Version</th>
                        <th class='all'>Project Name</th>
                        <th class='none'>Experiment Name</th>
                        <th class='all'>Dataset Name</th>
                        <th class='none'>Dataset Status</th>
                        <th class='all'>Comment</th>
                        <th class='none'>Number Samples</th>
                        <th class='all'>Number Makers</th>
                        <th class='none'>Dataset Matrix Loaded</th>
                        <th class='all'>Matrix Size</th>
                        <th class='none'>Date Return Vendor</th>
                        <th class='all'>Date Loaded</th>
                        <th class='none'>First Name</th>
                        <th class='all'>Last Name</th>
                        <th class='all'>Date Submitted</th>
                        <th class='all'>Year Quarter</th>
  
                    </tr>
                    </thead>";

                    echo '<tbody>';

                    while($row = $result->fetch_assoc()) {
                            //$data[] = $row;
                        $id = $row['id'];
                        $crops = $row['crops'];
                        $othercrop = $row['othercrop'] || '';
                        $institution = $row['institution'];
                        $otherinstitution = $row['otherinstitution'] || '';
                        $environment = $row['environment'];
                        $release_version = $row['release_version'];
                        $project_name = $row['project_name'];
                        $experiment_name = $row['experiment_name'];
                        $dataset_name = $row['dataset_name'];
                        $dataset_status = $row['dataset_status'];
                        $comment = $row['comment'];
                        $number_samples = $row['number_samples'];
                        $number_markers = $row['number_markers'];
                        $dataset_matrix_loaded = $row['dataset_matrix_loaded'];
                        $matrix_size = $row['matrix_size'];
                        $date_return_vendor = $row['date_return_vendor'];
                        $date_loaded = $row['date_loaded'];
                        $first_name = $row['first_name'];
                        $last_name = $row['last_name'];
                        $date_submitted = $row['date_submitted'];
                        $year_quarter = $row['year_quarter'];
                        
                        echo "
                        <tr>
                        <td>$id</td>
                        <td>$crops</td>
                        <td>$othercrop</td>
                        <td>$institution</td>
                        <td>$otherinstitution</td>
                        <td>$environment</td>
                        <td>$release_version</td>
                        <td>$project_name </td>
                        <td>$experiment_name </td>
                        <td>$dataset_name</td>
                        <td>$dataset_status</td>
                        <td>$comment</td>
                        <td>$number_samples</td>
                        <td>$number_markers</td>
                        <td>$dataset_matrix_loaded </td>
                        <td>$matrix_size</td>
                        <td>$date_return_vendor</td>
                        <td>$date_loaded</td>
                        <td>$first_name</td>
                        <td>$last_name</td>
                        <td>$date_submitted</td>
                        <td>$year_quarter</td>
                        </tr>\n";
                    }
                    echo "
                    </tbody>
                    <tfoot>
                        <tr>
                        <th>ID</th>
                        <th>Crops</th>
                        <th>Other Crop</th>
                        <th>Institution</th>
                        <th>Other Institution</th>
                        <th>Environment</th>
                        <th>Release Version</th>
                        <th>Project Name</th>
                        <th>Experiment Name</th>
                        <th>Dataset Name</th>
                        <th>Dataset Status</th>
                        <th>Comment</th>
                        <th>Number Samples</th>
                        <th>Number Makers</th>
                        <th>Dataset Matrix Loaded</th>
                        <th>Matrix Size</th>
                        <th>Date Return Vendor</th>
                        <th>Date Loaded</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Date Submitted</th>
                        <th>Year Quarter</th>
                        </tr>
                    </tfoot>\n";
                    echo "</table>\n";
                    //print json_encode($data);
                    $stmt->close();
                    $link->close(); 
            ?>
            </div>
       <br><br><br><br><br>
</div>
<div class="footer">
    <p class="text-center">GOBII © 2019</p> 
                   
</div> 
<script>
$(document).ready(function() {
    $('#gobii_data').DataTable( {
        dom: 'Bfrtip',
        buttons: [
             'csv', 'excel'
        ]
    } );
} );
</script>
</body>

</html>
