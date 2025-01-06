<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;

if (!function_exists('generate_pdf')) {
    function generate_pdf($html, $filename = 'report', $paper_size = 'A4', $orientation = 'landscape')
    {
        require_once APPPATH . '../vendor/autoload.php';

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper_size, $orientation);
        $dompdf->render();

        // Output the generated PDF to browser
        $dompdf->stream($filename, array("Attachment" => false));
    }
}
