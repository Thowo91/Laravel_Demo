<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function pdfTest(\Codedge\Fpdf\Fpdf\Fpdf $fpdf) {

        ob_get_clean();

        $fpdf->AddPage();
        $fpdf->SetFont('Courier', '', 18);
        $fpdf->Cell(180, 10, 'Hello World!', 'LT', '', 'C');
        $fpdf->Ln();
        $fpdf->SetFontSize(12);
        $fpdf->Cell(50, 10, 'zweite Zeile');

        $fpdf->AddPage();
        $fpdf->SetFont('Arial','',14);
        $fpdf->Write(5,'Visit ');
        $fpdf->SetTextColor(0,0,255);
        $fpdf->SetFont('','U');
        $fpdf->Write(5,'www.fpdf.org','http://www.fpdf.de');
        $fpdf->Ln();

        $fpdf->SetTextColor(0);
        $fpdf->SetFont('');
        $fpdf->MultiCell(0,10,'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.   

Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.   

Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse
        ');

        $fpdf->AddPage();
        $fpdf->SetFont('');
        for($farbwert = 0; $farbwert <= 255; $farbwert += 10) {
            $fpdf->SetTextColor($farbwert);
            $fpdf->Write(5, 'Grauer Text');
            $fpdf->Ln();
        }
        $fpdf->SetTextColor(0);

        $fpdf->AddPage();
        $header = ['Country', 'Capital'];
        $data = [['Germany', 'Berlin'], ['England', 'London'], ['France', 'Paris']];
        $this->BasicTable($fpdf, $header, $data);


        $fpdf->Output('I', 'test.pdf', true);
    }

    function BasicTable(Fpdf $fpdf, $header, $data)
    {
        // Header
        foreach($header as $col)
            $fpdf->Cell(40,7,$col,1);
        $fpdf->Ln();
        // Data
        foreach($data as $row)
        {
            foreach($row as $col)
                $fpdf->Cell(40,6,$col,1);
            $fpdf->Ln();
        }
    }

}
