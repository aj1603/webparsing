<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileDownloadController extends Controller
{
    public function download() {
        // Create a BinaryFileResponse object
        $response = new BinaryFileResponse('app/public/products.xlsx');

        // Set custom headers
        $response->headers->set('Content-Type', 'application/octet-stream');
        $response->headers->set('Content-Disposition', 'attachment; filename="products.xlsx"');
        $response->headers->set('Expires', '0');
        $response->headers->set('Cache-Control', 'must-revalidate');
        $response->headers->set('Pragma', 'public');

        // Send the response
        return $response;
    }
}
