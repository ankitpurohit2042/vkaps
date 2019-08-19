<?php
include("db.php");
// header('Content-Type: radio/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=dinesh.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'csv');
//fputcsv means The fgetcsv() function parses a line from an open file, checking for CSV fields. The fgetcsv() function stops returning on a new line

// output the column headings   
fputcsv($output, array('S No', 'Full name', 'Email','Address', 'Gender', 'State', 'city', 'contact'));

// fetch the data
$query = "SELECT id,full_name,user_name,address,gender,state,city,contact FROM users";
$result = mysqli_query($con,$query);

// loop over the rows, outputting them
while ($data = mysqli_fetch_assoc($result)) 
	{
		fputcsv($output, $data);
	}
	?>