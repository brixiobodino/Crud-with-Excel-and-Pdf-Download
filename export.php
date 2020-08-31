<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "contact");
$output = '';
$id=(int)$_GET['id'];
if (empty($id)) {
  $query = "SELECT * FROM employees";
}else{
   $query = "SELECT * FROM employees WHERE id=".$id;
}
 
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
     <tr>  
        <th>Id</th>  
        <th>Full Name</th>  
        <th>Address</th>  
        <th>Contact</th>  
        <th>Age</th>  
    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>                
        <td>'.$row["id"].'</td> 
        <td>'.$row["fullname"].'</td>  
        <td>'.$row["address"].'</td>  
        <td>'.$row["contact_number"].'</td>  
        <td>'.$row["age"].'</td>  
    </tr>

   ';
   if (empty($id)) {
      $name = "bodino";
    }else{
     $name=$row["fullname"];
    }
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename='.$name.'.xls');
  echo $output;
 }
?>
