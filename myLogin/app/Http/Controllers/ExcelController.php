<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Validator;
class ExcelController extends Controller
{
    public  function export(){
        return Excel::download(new ProductsExport, 'products.csv');
    }

    public function getImportView(){
        return view('excel.import');
    }

    public function postImportView(Request $request){
        /*dd($request->csv->getClientOriginalExtension());
        $request->validate([
           'csv' => 'required|in:csv'
        ]);*/
        $validator = Validator::make(
            [
                'file'      => $request->csv,
                'extension' => $request->csv->getClientOriginalExtension()
            ],
            [
                'file'          => 'required',
                'extension'      => 'required|in:csv',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if (Excel::import(new ProductsImport, $request->csv)){
             session()->flash('status','IMPORT COMPLETE');
             return redirect('/');
        }
        return redirect()->back()->withErrors('KHÔNG THỂ IMPORT');
    }
}
