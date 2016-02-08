
<?php 
error_reporting(0);
session_start(); 
include("../functions/functions.php");

if(!isset($_SESSION['admin_email'])){
	header("location: admin_login.php");
}
else {
?>
<!DOCTYPE html> 
<html>

	<head>
		<title>Welcome to Admin Panel</title> 
	<link rel="stylesheet" href="admin_style.css" media="all"/>
	</head>
	
<body>

	<div class="container">
		<div id="head">
			<a href="index.php"><img src="logo.jpg"/></a>
		</div>
		
		<div id="sidebar">
			<h2>Manage Content:</h2>
		
			<ul id="menu">
				<li><a href="index.php?view_users">View Users</a></li>
				<li><a href="index.php?view_posts">View Posts</a></li>
				<li><a href="index.php?view_comments">View Comments</a></li>
				<li><a href="index.php?view_topics">View Topics</a></li>
				<li><a href="index.php?add_topic">Add New Topic</a></li>
				<li><a href="admin_logout.php">Admin Logout</a></li>
			</ul>
		</div>
		
		<div id="content">
		<h2 style="color:blue; text-align:center; padding:5px;">
		<?php
				$admin_email= $_SESSION['admin_email'];
				$welcome_sql="SELECT admin_email from admins WHERE admin_email='$admin_email'";
				$run_query=mysqli_query($con, $welcome_sql);
				while($row=mysqli_fetch_array($run_query)){	
					$email = $row['admin_email'];
					echo "Welcome ".$email." : Manage your content!";
				}
		//echo $_GET['welcome']. ": Manage your content!";?> 
		</h2>
			<?php 
			if(isset($_GET['view_users'])){
			include("includes/view_users.php");
			}
			if(isset($_GET['view_posts'])){
			include("includes/view_posts.php");
			}
			
			?>
		</div>
		
		
		
		
		<div id="foot">
			<h2 style="color:white; padding:10px; text-align:center;">
			&copy; <?php echo date("Y");?>-Parth and Winston
			</h2>
		</div>
	</div>


</body>
</html>

<?php } ?>