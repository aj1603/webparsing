<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Fprice;

class FpriceController extends Controller
{
    public function create()
    {
        $fprices = DB::select('SELECT * from fprice');
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

    public function edit($id)
    {
        $fprice = DB::select("SELECT * from fprice WHERE id=1");
        return view('fprice.edit', ['fprice' => $fprice]);
        // dd($fprice);
    }

    //     public function update(Request $request, $id)
//   {
//     $request->validate([
//       'title' => 'required|max:255',
//       'body' => 'required',
//     ]);
//     $post = Post::find($id);
//     $post->update($request->all());
//     return redirect()->route('posts.index')
//       ->with('success', 'Post updated successfully.');
//   }
    public function update(Request $request, $id)
    {
        $request->validate([
            'new_fprice' => 'required',
        ]);

        $tfprice = $request['new_fprice'];

        DB::update("UPDATE fprice SET fprice = $tfprice");

        return redirect()->route('products.index')
            ->with('success', 'Succsesfylly updated!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
            ->with('success', 'Succsesfylly deleted!');
    }
}
