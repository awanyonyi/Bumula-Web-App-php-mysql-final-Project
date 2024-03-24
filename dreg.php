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
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>OSMS</title>
	<meta charset="utf-8">
	<meta name="author" content="pixelhint.com">
	<meta name="description" content="La casa free real state fully responsive html5/css3 home page website template"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</head>
<body>

	<section class="">
		<?php
			include 'header.php';
		?>

			<section class="caption">
				<h2 class="caption" style="text-align: center">To Complete Your Donation</h2>
				<h3 class="properties" style="text-align: center">Please fill in your details here</h3>
			</section>
	</section><!--  end hero section  -->
	
	<section class="listings">
		<div class="wrapper">
			<ul class="properties_list">
			<?php
// Assuming you have already established a mysqli connection
// with the variable name "$conn"

// Create a PDO connection using the same database credentials
// Replace the placeholders with your actual database details
$db_host = "localhost";
$db_name = "william";
$db_user = "root";
$db_pass = "Allanware5895";

try {
    $pdo_conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    echo "PDO connection created successfully.";
} catch (PDOException $e) {
    echo "Error creating PDO connection: " . $e->getMessage();
}
?>

				
				
				
				<form method="post">
					<table>
						<tr>
							<td>Full Name:</td>
							<td><input type="text" name="fname" required></td>
						</tr>
						<tr>
							<td>Phone Number:</td>
							<td><input type="text" name="phone" required></td>
						</tr>
						<tr>
							<td>Email Address:</td>
							<td><input type="email" name="email" required></td>
				 		</tr>
						<tr>
							<td>ID Number:</td>
							<td><input type="text" name="id_no" required></td>
						</tr>
						<tr>
							<td>Gender:</td>
							<td>
								<select name="gender">
									<option> Select Gender </option>
									<option> Male </option>
									<option> Female </option>
								</select>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="text-align:right"><input type="submit" name="save" value="Submit Details"></td>
						</tr>
					</table>
				</form>
				
				<?php
if (isset($_POST['save'])) {
    $fname = $_POST['fname'];
    $id_no = $_POST['id_no'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    try {
        // Create a PDO connection (assuming you've already established it)
        $pdo = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare the query
        $stmt = $pdo->prepare("INSERT INTO staff (fname, id_no, gender, email, phone, status)
                              VALUES (:fname, :id_no, :gender, :email, :phone, 'Confirmed')");
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':id_no', $id_no);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->execute();

        // Check if the query was successful
        if ($stmt->rowCount() > 0) {
            echo "<script type=\"text/javascript\">
                    alert(\"Successfully Registered. Proceed to Login\");
                    window.location = (\"donorlog.php\");
                  </script>";
        } else {
            echo "<script type=\"text/javascript\">
                    alert(\"Registration Failed. Try Again\");
                    window.location = (\"dreg.php\");
                  </script>";
        }
    } catch (PDOException $e) {
        // Log the error message
        error_log("Error executing query: " . $e->getMessage());
        die("An error occurred. Please check the logs for details.");
    }
}
?>



			</ul>
		</div>
	</section>	<!--  end listing section  -->

	<footer>
		<div class="wrapper footer">
			
		</div>

		<div class="copyrights wrapper">
			Copyright &copy; <?php echo date("Y")?> All Rights Reserved | Designed by William Wafula.
		</div>
	</footer><!--  end footer  -->
	
</body>
</html>