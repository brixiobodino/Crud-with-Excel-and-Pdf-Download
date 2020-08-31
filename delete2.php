<?php
    $con = mysqli_connect("localhost","root","")
    or die("Failed to connect to the server: " . mysql_error());
    mysqli_select_db($con,"steven") 
    or die("Failed to connect to the database: " . mysql_error());
    $id = (int)$_GET['id']; 
   
   if(empty($id)){
        $query = mysqli_query($con,"SELECT * FROM employees");
        $name="belon";
    }else{
        $query = mysqli_query($con,"SELECT * FROM employees WHERE id=".$id);
        //$name = mysqli_query($con,"SELECT fullname FROM employees WHERE id=".$id);
    }

    $numrows = mysqli_num_rows($query);
    if($numrows > 0){
        require("FPDF-master/fpdf.php");
            $pdf = new FPDF();
             // adding logo
            
            $pdf->addpage("L","Letter");
             $logoFile = "logo3.png";
            $logoXPos = 110; //  position of logo in x coordinate
            $logoYPos = 10; //  position of logo in y coordinate
            $logoWidth = 50; // size of image 
            $pdf->Image( $logoFile, $logoXPos, $logoYPos, $logoWidth ); // displaying of logo
            $pdf->Ln(10); // Line break of 10 pixels
             $pdf->SetFont( 'Arial', 'I', 10 ); // fonts used in qoute
             $pdf->SetTextColor(176, 190, 197); // color of fonts used in qoute
            $pdf->MultiCell(0,10,'"If debugging is the process of removing bugs, programming must be the process of putting them in  ~ Edsger Dijkstra"',0,'C'); // the text in qoute
            $pdf->Ln(1); // Line break of 1 pixels
            $pdf->SetTextColor(255, 131, 45); // color of fonts used in author
            $pdf->SetFont( 'Arial', '', 12 ); // fonts used in author
            $pdf->Write( 19, "Author and Developer : Brixio Bodino"); // text in author
            $pdf->Ln(5);   // Line break of 5 pixels
            $pdf->Write( 19, "Date : 11/17/2018"); // text in date
            $pdf->Ln(20); // Line break of 20 pixels
            $pdf->SetTextColor(0,0,0); // color of fonts used in title
            $pdf->SetFont( 'Arial', '', 20 ); // fonts used in title
            $pdf->Write( 19, "Crud Operation Using Php and AJAX" ); // text in title
            $pdf->Ln(20);   // Line break of 20 pixels
            $pdf->SetFont( 'Arial', '', 12 );
            $pdf->Write( 6, "Crud means Create,Update and Delete while AJAX means Asyncronous Javascript and XML. This page demonstrate the use of AJAX in performing CRUD operation." );
            $pdf->Ln( 12 );
            $pdf->Write( 6, "The table below is the output of the page performing CRUD." );
             $pdf->Ln( 16 );
            $pdf->SetFont("Arial","B","15");
            $width_cell=array(20,60,55,43,40,40);
            $pdf->SetFont("Arial","","10");
            $pdf->SetTextColor(0,0,0);
            $pdf->SetFillColor(30, 136, 229);
            $pdf->Cell($width_cell[0],10,'ID',1,0,"C",true);
            $pdf->Cell($width_cell[1],10,'Fullname',1,0,"C",true);
            $pdf->Cell($width_cell[2],10,'Address',1,0,"C",true);
            $pdf->Cell($width_cell[3],10,'Age',1,0,"C",true);
            $pdf->Cell($width_cell[4],10,'Birthdate',1,0,"C",true);
            $pdf->Cell($width_cell[5],10,'contact_Number',1,1,"C",true);
        
        while($row = mysqli_fetch_assoc($query)) {
       
            $pdf->SetFillColor(255, 171, 145);
            $pdf->Cell($width_cell[0],10,$row['id'],1,0,"C",true);
            $pdf->Cell($width_cell[1],10,$row['fullname'],1,0,"C",true);
            $pdf->Cell($width_cell[2],10,$row['address'],1,0,"C",true);
            $pdf->Cell($width_cell[3],10,$row['age'],1,0,"C",true);
            $pdf->Cell($width_cell[4],10,$row['Birthdate'],1,0,"C",true);
            $pdf->Cell($width_cell[5],10,$row['contact_number'],1,1,"C",true);
            if(empty($id)){
                $name="belon";
            }else{
                $name = $row['fullname'];
            }
        }
       $pdf->Output();
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename='.$name.'.pdf');
    }
    else{
    echo "<h4>Sorry, No records to download.</h4>";
    }
?>















