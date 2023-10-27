<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Fprice;

class FpriceController extends Controller
{
    public function create()
    {
        $fprices = DB::select("SELECT id, fprice from fprices");
        // dd($fprices);
        return view('fprice.create', ['fprices' => $fprices]);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'fprice' => 'required',
        ]);
        ($formFields);

        $fullfprice = $formFields['fprice'];
        DB::insert("INSERT INTO fprice (fprice) VALUES ($fullfprice)");

        $fprices = DB::select('SELECT (fprice) from fprice');
        return view('fprice.create', ['fprices' => $fprices]);
    }

    public function edit(Request $request, $id)
    {
        $fprices = DB::select("SELECT id, fprice from fprices where id = $id");
        return view('fprice.edit', ['fprices' => $fprices]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'new_fprice' => 'required',
        ]);
        $tfprice = $request['new_fprice'];

        DB::update("UPDATE fprices SET fprice = $tfprice where id=$id");
        return redirect()->route('fprice.create');
    }
}
