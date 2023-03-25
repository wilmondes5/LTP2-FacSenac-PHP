<?php
require('fpdf185/fpdf.php');

class PDF extends FPDF
{
// Load data
function LoadData($file)
{
    // Read file lines
    $lines = file($file);
    $data = array();
    foreach($lines as $line)
        $data[] = explode(';',trim($line));
    return $data;
}

// Simple table
function BasicTable($header, $data)
{
    // Header
    foreach($header as $col)
        $this->Cell(90,7,$col,1);
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(90,9,$col,1);
        $this->Ln();
    }
}

// Better table
function ImprovedTable($header, $data)
{
    // Column widths
    $w = array(40, 35, 40, 45);
    // Header
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR');
        $this->Cell($w[1],6,$row[1],'LR');
        if(is_numeric($row[2])){
            $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
        }else{
            $this->Cell($w[2],6,$row[2],'LR',0,'R');
        }
        if(is_numeric($row[3])){
            $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
        }else{
            $this->Cell($w[3],6,$row[3],'LR',0,'R');
        }
        $this->Ln();
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}


// Colored table
function FancyTable($header, $data)
{
    // Colors, line width and bold font
    $this->SetFillColor(0,0,255);
    $this->SetTextColor(244);
    $this->SetDrawColor(128,128,128);
    $this->SetLineWidth(.4);
    $this->SetFont('','B');
    // Header
    $w = array(40, 35, 75, 45);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Color and font restoration
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Data
    $fill = false;
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR');
        $this->Cell($w[1],6,$row[1],'LR');
        if(is_numeric($row[2])){
            $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
        }else{
            $this->Cell($w[2],6,$row[2],'LR',0,'R');
        }
        if(is_numeric($row[3])){
            $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
        }else{
            $this->Cell($w[3],6,$row[3],'LR',0,'R');
        }
        $this->Ln();
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}
}

$pdf = new PDF();
// Column headings
$header = array('Nome', 'Curso', 'Disciplina', 'Media');
// Data loading
$data = $pdf->LoadData('alunos.csv');
$pdf->SetFont('times','',13);
$pdf->AddPage();
$pdf->FancyTable($header,$data);
$pdf->Output();
?>