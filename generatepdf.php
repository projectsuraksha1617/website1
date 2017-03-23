<?php
session_start();
$tid=$_SESSION['tid'];


require "fpdf181/fpdf.php";

$mysql=mysqli_connect("simunet.in","simuneti_meghana","Projectsuraksha@2017","simuneti_suraksha") or die("Can't connect to DB");
$result=mysqli_query($mysql,"select date,tid,Case_Type,Name,Mobile from history where tid='$tid'");
while($row = mysqli_fetch_array($result))
{
$date=$row['date'];
$tid=$row['tid'];
$type=$row['Case_Type'];  	
$name =$row['Name'];
$Mobile =$row['Mobile'];
}


$result1=mysqli_query($mysql,"select Name,Status,Mobile,Details from pdf where tid='$tid'");
while($row = mysqli_fetch_array($result1))
{
$cop=$row['Name'];
$cop_mob=$row['Mobile'];
}

			
$pdf= new FPDF('P','mm',array(210,230));
$pdf->SetTopMargin(20);
$pdf->AddPage();
$pdf->SetFont('Times','B',16);
$pdf->MultiCell(70,20,"Respected Sir/Madam,");
$pdf->SetFont('Times','',16);
$pdf->MultiCell(180,15,"                With reference to the case $type of reference number $tid has been successfully resolved from the police end.");
$pdf->SetFont('Times','B',16);
//$pdf->MultiCell(180,15,"Contact the police for any information");
//$pdf->SetFont('Times','',16);
//$pdf->MultiCell(180,10,"Police Name : $cop",0,'C');
//$pdf->MultiCell(180,10," Contact : $cop_mob",0,'C');
$pdf->SetFont('Times','B',16);
$pdf->MultiCell(180,15,"Details of the case");
$pdf->SetFont('Times','',16);
$pdf->MultiCell(180,15,"It has been verified that the case registered with the number $Mobile belonging to Mr/Ms $name is valid.\nTo whomsever it may concern, it is hereby instructed to consider this legal document as a valid proof for further process.Thank you");
//$pdf->MultiCell(180,10,"     Thankyou",0,'C');
$pdf->SetFont('Times','I',10);
$pdf->MultiCell(180,29,"This document is electronically generated and does not need any signature from higher officials.");
$pdf->output();
?>