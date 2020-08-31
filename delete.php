<?php
include('includes/dbconnections.php');
global $conn;
				$id = (int) $_GET['id'];
				$sql = "DELETE FROM employees WHERE id=".$id;
				header('location:index.php');
				//VAR_DUMP($sql);
				if(!mysqli_query($conn,$sql))
				{
					die('Error DELETE record'); 
				}
?>