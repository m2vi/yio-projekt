<?php

require('../../../../../lib/fpdf182/fpdf.php');

$image = base64_decode($_POST['imgb64']);

class PDF_HTML extends FPDF
{
   var $B = 0;
   var $I = 0;
   var $U = 0;
   var $HREF = '';
   var $ALIGN = '';

   function WriteHTML($html)
   {
      //HTML parser
      $html = str_replace("\n", ' ', $html);
      $a = preg_split('/<(.*)>/U', $html, -1, PREG_SPLIT_DELIM_CAPTURE);
      foreach ($a as $i => $e) {
         if ($i % 2 == 0) {
            //Text
            if ($this->HREF)
               $this->PutLink($this->HREF, $e);
            elseif ($this->ALIGN == 'center')
               $this->Cell(0, 5, $e, 0, 1, 'C');
            else
               $this->Write(5, $e);
         } else {
            //Tag
            if ($e[0] == '/')
               $this->CloseTag(strtoupper(substr($e, 1)));
            else {
               //Extract properties
               $a2 = explode(' ', $e);
               $tag = strtoupper(array_shift($a2));
               $prop = array();
               foreach ($a2 as $v) {
                  if (preg_match('/([^=]*)=["\']?([^"\']*)/', $v, $a3))
                     $prop[strtoupper($a3[1])] = $a3[2];
               }
               $this->OpenTag($tag, $prop);
            }
         }
      }
   }

   function OpenTag($tag, $prop)
   {
      //Opening tag
      if ($tag == 'B' || $tag == 'I' || $tag == 'U')
         $this->SetStyle($tag, true);
      if ($tag == 'A')
         $this->HREF = $prop['HREF'];
      if ($tag == 'BR')
         $this->Ln(5);
      if ($tag == 'P')
         $this->ALIGN = $prop['ALIGN'];
      if ($tag == 'HR') {
         if (!empty($prop['WIDTH']))
            $Width = $prop['WIDTH'];
         else
            $Width = $this->w - $this->lMargin - $this->rMargin;
         $this->Ln(2);
         $x = $this->GetX();
         $y = $this->GetY();
         $this->SetLineWidth(0.4);
         $this->Line($x, $y, $x + $Width, $y);
         $this->SetLineWidth(0.2);
         $this->Ln(2);
      }
   }

   function CloseTag($tag)
   {
      //Closing tag
      if ($tag == 'B' || $tag == 'I' || $tag == 'U')
         $this->SetStyle($tag, false);
      if ($tag == 'A')
         $this->HREF = '';
      if ($tag == 'P')
         $this->ALIGN = '';
   }

   function SetStyle($tag, $enable)
   {
      //Modify style and select corresponding font
      $this->$tag += ($enable ? 1 : -1);
      $style = '';
      foreach (array('B', 'I', 'U') as $s)
         if ($this->$s > 0)
            $style .= $s;
      $this->SetFont('', $style);
   }

   function PutLink($URL, $txt)
   {
      //Put a hyperlink
      $this->SetTextColor(0, 0, 255);
      $this->SetStyle('U', true);
      $this->Write(5, $txt, $URL);
      $this->SetStyle('U', false);
      $this->SetTextColor(0);
   }

   // Page header
   function Header()
   {
      global $id;
      // Logo
      // $this->Image('logo.png', 10, 6, 30);
      // Arial bold 15
      $this->SetFont('Arial', 'B', 15);
      // Move to the right
      $this->Cell(80);
      // Title
      $this->Cell(30, 10, 'ID: ' . $id, 1, 0, 'C');
      // Line break
      $this->Ln(20);
   }

   // Page footer
   function Footer()
   {
      // Position at 1.5 cm from bottom
      $this->SetY(-15);
      // Arial italic 8
      $this->SetFont('Arial', 'I', 8);
      // Page number
      $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
   }
}


$id = 5;
$firstname = "Kevin";
$lastname = "Ramage";
$email = "Nothing";
$text = 'Text: <br><p align="justify"></p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum';
// $html = '<b>Firstname: </b>' . $firstname . '<br><b>Lastname: </b>' . $lastname . '<br><b>Email: </b>' . $email . '<p align="center">LOL</p>';
$html =
   'Firstname: ' . $firstname .
   '<br>Lastname: ' . $lastname .
   '<br>Email : ' . $email . '<br><br><hr><br>' . $text;

$pdf = new PDF_HTML();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial');
$pdf->WriteHTML($html);
$pdf->Output();
