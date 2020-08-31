<!DOCTYPE html>
<html>
<head>
	
	<script src="https://kit.fontawesome.com/a837cb4006.js"></script>
	 	<link rel="icon" href="icon3.png" sizes="32x32" type="image/png"> 
	<title></title>
<style type="text/css">
		html,body{
		height: 100%;
		width:100%;
		}
		@font-face{
			font-family: Segoe UI;
			src:"fonts/Segoe UI.TTF";
		}
		.header{
			width: 100%;
			height:80px;
			background: rgb(30, 136, 229);
			left: 0px;
			position: absolute;
			top: 0px;
			font-family: 'Proxima Nova', Georgia, sans-serif;
			color: #ffffff;
		}
		#title{
			margin-left: 60px;
			margin-top: 34px;
			font-weight: 400;
			color:red;
		}
		.title{
			width: 300px;
			background: rgb(28, 129, 217);
			height: 100%;
			position: absolute;
			color: red;
		}
		.fa-database{
			position: absolute;
			top:33px;
			left: 35px;
			font-size: 20px;
			left: 300px;
		}
		.content{
			width:95%;
			min-height: 300px;
			height: auto;
			margin-top: 130px;	
			padding: 10px;
			float:left;
			
		}
		.form{
			min-width: 200px;
			width: 25%;
			font-family: Segoe UI;
			padding: 10px;
			box-shadow: 5px 5px 25px gray;
			padding-bottom: 30px;
			float: right;
			margin-right: 10px;
			margin-top: 0px;
			border-radius: 10px;
			position: absolute;
			right: 10px;
			top: 205px;
		}
		.form input[type="text"],.form input[type="number"],.form input[type="date"]{
			width: 96%;
			padding: 3px;
			margin-bottom: 20px;
			border: none;
			border-bottom: 1px solid gray;
			outline: none;
		}
		.form input[type="text"]:hover{
			border-bottom: 1px solid rgb(28, 129, 217);
		}
		.form input[type="text"]:focus{
			border-bottom: 1px solid rgb(28, 129, 217);
		}
		.form input[type="number"]:hover{
			border-bottom: 1px solid rgb(28, 129, 217);
		}
		.form input[type="number"]:focus{
			border-bottom: 1px solid rgb(28, 129, 217);
		}
		label{
			font-size: 15px;
			color:gray;
		}
		.form h4{
			font-family: Segoe UI;
		}
		#save{
			color: #ffffff;
			padding: 5px;
			border: none;
			width: 100px;
			padding-top: 10px;
			padding-bottom: 10px;
		}
		.fa-save{
			font-size: 18px;
			color:rgb(81,81,81);
			cursor: pointer;
		}
		.fa-save:hover{
			font-size: 20px;
			font-weight: 700;
		}
		table{
			box-shadow: 5px 5px 25px gray;
			border-collapse: collapse;
			font-family: 'Proxima Nova', Georgia, sans-serif;
			width: 70%;
			float: left;
		}
		td{
			text-align: center;
			padding: 5px;
			font-weight: 400;
			padding-top: 20px;
			padding-bottom: 20px;
		}
		tr{
			border: 1px solid #eee;
			font-size: 16px;
		}
		tr:nth-child(even) {
   			background: rgba(230, 231, 231,0.5);
		}
		th{
			padding: 20px;
			font-size: 16px;
		}
		.fa-edit{
			color: rgb(28, 129, 217);
			font-size: 25px;
			font-weight: 700;
		}
		.fa-edit:hover,.fa-trash-alt:hover{
			font-weight: 400;
		}
		.fa-trash-alt{
			color: red;
			font-size: 25px;
			font-weight: 700;
		}
		.fa-user-plus{
			color: black;
			font-size: 25px;
			margin-left: 10px;
		}
		.fa-user-plus:hover{
			color: rgb(28, 129, 217);
		}
		.fa-file-excel{
			font-size: 25px;
			margin-left: 10px;
			color:#4CAF50;
			
		}
		#gen_excel{
			position: absolute;
			top: 165px;
			left: 60px;
		}
		#gen_pdf{
			position: absolute;
			top: 165px;
			left: 95px;
		}
		.fa-file-excel:hover{
			color:#4CAF50;
			font-weight: 400;
		}
		.fa-file-pdf{
			font-size: 25px;
			margin-left: 10px;
			margin-right: 10px;
			color:#F44336;
		}
		.fa-file-pdf:hover{
			color:#F44336;
			font-weight: 400;
		}
		a{
			color:black;
		}
		.coder{
			position: absolute;
			right: 50px;
			top:14px;
		}
		.notification{
			position: absolute;
			right: 0px;
			background: green;
			top: 90px;
			width: 150px;
			padding: 3px;
			font-family: Segoe UI;
		}
		#save{
			background: rgba(30, 136, 229,0.8);
			border-radius: 15px;
		}
		#save:hover{
			background: rgba(30, 136, 229,1);
			border-radius: 15px;
		}
		.search{
			float:right;
			margin-top: -30px;
			width: 450px;
			margin-right: 3px;
			margin-bottom: 10px;
		}
		#search{
			width: 420px;
			border: none;
			border-bottom: 1px solid rgb(81,81,81);
			margin-right: 5px;
			outline: none;
			font-size: 17px;
		}
		::placeholder{
			font-family: Segoe UI;
			color:black;
		}
		#search:focus{
			border-bottom: 1px solid rgb(30, 136, 229);
		}
		.fa-search:hover{
			color:red;
			font-size: 18px;
		}
		#crud_title{
			color:white;
			left:320px;
			position: absolute;
			top: 13px;
			font-family: 'Proxima Nova', Georgia, sans-serif;
			font-weight: 400;
			text-align: center;
			width: 55%;
		}
	</style>		
</head>
<body>
<div class="header">
		<div class="title">
			<img src="logo.png" width="150px" height="auto" style="margin-top: 23px;margin-left: 50px;">
		</div>
		<p class="coder"><i class="fas fa-code"></i> by: Brixio Bodino</p>
	</div>
	<h3 id="crud_title">CRUD Operation</h3>
<div class="content">
	<?php include('functions.php'); ?>


</div>
<script type="text/javascript">
	function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
	}

	
</script>
</body>
</html>