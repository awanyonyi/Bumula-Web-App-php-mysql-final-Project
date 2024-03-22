<?php
	session_start();
	error_reporting(E_ALL | E_NOTICE);

?>
<header>
			<div class="wrapper">
				<h1 class="logo">Bumula Bursary Management System</h1>
				<a href="#" class="hamburger"></a>
				<nav>
				<?php
// Start the session only if it hasn't been started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// After successful login, set session variables
$_SESSION['email'] = 'allanwanyonyi5895@gmail.com'; // Replace with actual email
$_SESSION['pass'] = 'N1131780020';   // Replace with actual hashed password
?>

<?php
    // Assuming this is part of a larger PHP script
    // ...

    if (!$_SESSION['email'] && !$_SESSION['pass']) {
        // Display navigation links for non-logged-in users
        echo '<ul>';
        echo '<li><a href="index.php">Home</a></li>';
        echo '<li><a href="status.php">View Status</a></li>';
        echo '<li><a href="message_admin.php">Message Admin</a></li>';
        echo '</ul>';
        echo '<a href="admin/logout.php">Logout</a>';
    } else {
        // Display navigation links for logged-in users
        // ...
    }
?>
