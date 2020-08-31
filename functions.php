<?php
	include('includes/dbconnections.php');
	function getParam($page)
	{
		//echo $page;
		if(isset($_REQUEST[$page]))
		{
			$page = $_REQUEST[$page];
		} else 
			{	
				$page = '';
			}
			return $page;
	}

	$task = getParam('task'); 
	
	switch($task)
	{
		case 'new':
		case 'edit':
		form();
		view();
		break;
		case 'save':
		save();
		view();
		form();
		break;
		
		
		break;
		default:
		view();
		form();
		break;
	}

	function view()
	{
		global $conn;
		$sql = "SELECT * FROM employees";
		$result = mysqli_query($conn,$sql);

?>	
		<p><a class="a" href="index.php?task=new"><i class="fas fa-user-plus" title="add new"></i></a></p>
		 <p id="delete_this"></p>
         <a  href="export.php?id=''"><i class="fas fa-file-excel" title="download as excel" id='gen_excel'></i></a>
         <a href="export_pdf.php?id=''"><i class="fas fa-file-pdf" title="download as pdf" id='gen_pdf'></i></a>
         </p>	
		<div class="relative">
			<table>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Address</th>
					<th>Age</th>
					<th>Birth Date</th>
					<th>Contact Number</th>
					<th colspan="3">Action</th>
				</tr>
				
				<?php
					if (mysqli_num_rows($result)> 0)
					{
						while($row = mysqli_fetch_assoc($result))
						{
				?>
							<tr>
								<td><?php echo  $row["id"]; ?></td>
								<td><?php echo  $row["fullname"]; ?></td>
								<td><?php echo  $row["address"]; ?></td>
								<td><?php echo  $row["age"]; ?></td>
								<td><?php echo  $row["birthdate"]; ?></td>
								<td><?php echo  $row["contact_number"]; ?></td>
								<td><a href="index.php?task=edit&id=<?php echo $row["id"]; ?>"><i class="fas fa-edit" title="edit record"></i></a></td>
								<td><a href="delete.php?id=<?php echo $row["id"]; ?>"><i class="fas fa-trash-alt" title="delete record"></i></a></td>
								<td>
								<a href="export.php?id=<?php echo $row["id"]; ?>"><i class="fas fa-file-excel" title="download as excel"></i></a>
							</td>
							<td>
								<a class="a" href="export_pdf.php?id=<?php echo $row["id"]; ?>"><i class="fas fa-file-pdf" title="download as pdf" >
							</td>
							</tr>
				<?php
						}
					} else {
				?>
								<tr><td colspan="6">No records yet!</td></tr>
				<?php
							}
				?>
			</table>
		</div>
		<?php	
		}function form(){
				global $conn;
				$id = getParam('id'); 
				$sql = "SELECT * FROM employees WHERE id=$id";
				$result = mysqli_query($conn,$sql);
				if($result)
				{
					//echo count($result);
					$row = mysqli_fetch_object($result);	
				}
				//var_dump($row->fullname);
				
		?>
		<div class="form" id="form">
				<form method="post" action="" id="data_form">
					<?php if($id )
				{
					echo '<h4>Edit: '.$row->fullname.'</h4>';
					$op="Update";
				} else {
							echo '<h4>Add New Record</h4>';
							$op="Save";
						}
						?>
					<label for="fullname">Name: </label><br>
					<input type="text" name="fullname"  value="<?php echo isset($row->fullname)?$row->fullname : '' ;?>" required autocomplete="off"/><br>
					<label for="fullname">Address: </label><br>
					<input type="text" name="address"  value="<?php echo isset($row->address)?$row->address : '' ;?>" required autocomplete="off"/><br>
					<label for="fullname">Contact Number: </label><br>
					<input type="text" name="contact_number"  value="<?php echo isset($row->contact_number)?$row->contact_number : '' ;?>" required autocomplete="off" onkeypress="return isNumberKey(event)"/><br>
					<label for="fullname">Age: </label><br>
					<input type="number" name="age"  value="<?php echo isset($row->age)?$row->age : '' ;?>" autocomplete="off" required /><br>
					<label for="fullname">Birth Date: </label><br>
					<input type="date" name="bday"  value="<?php echo isset($row->birthdate)?$row->birthdate : '' ;?>" autocomplete="off" required /><br>
					<input type="submit" value="<?php echo $op; ?>" id="save" style="display: block;" onclick="save_info('');load_data('load');" title="save record" />
					<input type="hidden" value="<?php echo isset($row->id)?$row->id:'';?>" name="id" />
					<input type="hidden" value="save" name="task" />
				</form>
				
			</div>

		<?php
			}function save(){
				global $conn;
				$id = getParam('id'); 
				$fullname = getParam('fullname'); 
				$contact_number = getParam('contact_number'); 
				$address = getParam('address'); 
				$age = getParam('age'); 
				$bday = getParam('bday'); 
				if($id)
				{
					$sql = "UPDATE employees SET  fullname = '".$fullname."', contact_number= '".$contact_number."',address = '".$address."',age = '".$age."',birthdate = '".$bday."'  WHERE id=".$id;
				} else {
							$sql = "INSERT INTO employees (fullname,contact_number,address,age,birthdate) VALUE ('".$fullname."','".$contact_number."','".$address."','".$age."','".$bday."')";
						}	
						
				if(!mysqli_query($conn,$sql))
				{
					die('Error insert records'); 
				}
			}

			
		?>