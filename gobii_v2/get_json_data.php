
<?php
    	//connect to database
        //$link = mysqli_connect("localhost", "gloader", "g0b11", "gobii");
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
        while($row = $result->fetch_assoc()) {
                $data[] = $row;
               /* $crops = $row['crops'];
                $year_quarter = $row['year_quarter'];
                $date_loaded = $row['date_loaded'];
                print "<tr><td>$crops</td><td>$year_quarter</tb><td>$date_loaded</td></tr>";*/
        }
        //print "</table>";
        print json_encode($data);
    	$stmt->close();
        $link->close(); 
?>
