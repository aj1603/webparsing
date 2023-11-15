<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Jobs\WomencoatProductsJob;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function womencoatproducts(Request $request)
    {
        // Dispatch the job to run asynchronously
        dispatch(new WomencoatProductsJob());

        // Return a response if needed
        return response()->json(['message' => 'The womencoatproducts job has been dispatched.']);
    }
}
