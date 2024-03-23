
 <?php require("dbconn.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<title>Online Bumula Bursaries Management System</title>
	<link rel="stylesheet" media="all" href="styles/css/style.css">
	<link href="bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript" src="styles/bootstrap/js/bootstrap.min.js"> </script>
	<script type="text/javascript" src="styles/js/jquery-1.6.js"> </script>
	<link href="themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />
	<script src="themes/1/js-image-slider.js" type="text/javascript"></script>   
    <link href="generic.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
    table th{
    		background-color: #339213;
    		color: white;
    	}


    #btnApply {
	background-color: #339213;
    border: #FFF 2px solid;
    padding: 2px 10px;
    font-size: 0.8em;
    text-decoration: none;
    border-radius: 4px;
}


    </style>

</head>
<body >
<div class="container" style="width: 95%;"> 
<?php include"mainmenunav.php"; ?>
<div class="well">

			<div id="sliderFrame">
        <div class="slider carousel" id="slider">
		
	<!-- 	Append this section to change the images -->
             <!--This image is having a link on it.Use <a href="www.link.com" /a> -->
           <img src="Images/1.jpg" alt="Welcome To Online Bumula Bursaries Management System" />
            <img src="Images/2.jpg" alt="Your Education our Priority" />
            <img src="Images/3.jpg" alt="Transparency and Equity for all" />
            <img src="Images/4.jpg" alt=" Bumula CDF your academic partner" />  
       
	   </div>
        <div id="htmlcaption" style="display: none;">
            </div>
		</div>	


</div>
	<div class="well pull-left" style="margin-right:1%;width: 38%;min-width: 250px;">
	<h3>About us</h3>
			<div class="panel">
				<p>Welcome to < Bumula Constituency Bursaries Management System</b>.
					This system is developed for college/universities and secondary students to apply the CDF bursaries online,get informed when the application is ongoing and when<a href="Login.php"> disbursement</a> is made.It is restricted for students whose resident i Bumula constituency.</p>
			</div>
		</div> 		
			
		<div class="apply well pull-left" style="margin-right: 3px;width: 55%;min-width: 260px;">
	
		<h4><strong>Bursary application updates</strong></h4>
		<p style="color: ;">(kindly click the <a href='apply'>Apply Now</a> button to begin application process)</p>
			
		
		<div class="panel">
    <form Action="" method="POST">
    <?php
$host = "localhost";
$user = "root";
$pass = "Allanware5895";
$db_name = "william";

// Create a MySQLi connection
$conn = new mysqli($host, $user, $pass, $db_name);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo '<table class="table table-condensed table-responsive" border="1" style="min-width:450px;">';
echo "<tr>";
echo "<th>Name</th>";
echo "<th>Deadline</th>";
echo "<th>Action</th>";
echo "</tr>";

try {
    $query = "SELECT * FROM notification";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row["NAME"] . "</td>";
            echo "<td>" . $row["DEADLINE"] . "</td>";
            echo "<td>  
                <form>
                    <button id='btnApply' name='next' formaction='Login.php'>Apply Now</button>
                </form>
            </td></tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No bursary applications ongoing</td></tr>";
    }
} catch (Exception $e) {
    echo "<tr><td colspan='3'>Error fetching data: " . $e->getMessage() . "</td></tr>";
}

echo "</table>";
?>

    </form>
</div>

			?>
		</form>
			</div>			

		</div>
	
</div>
<footer>
		<div class="wrapper footer" align="center" style="padding-top: 10px;padding-bottom: 10px;">
			Copyright &copy; <?php echo date("Y")?> All Rights Reserved | Designed by Allan Wanyonyi.		
		</div>	
	</footer><!--  end footer  -->	

</body>
</html>