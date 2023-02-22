<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
use App\Exports\UsersExport;
 
use App\Imports\UsersImport;

use App\Exports\SchoolsExport;
 
use App\Imports\SchoolsImport;
 
use Maatwebsite\Excel\Facades\Excel;
 
use App\Models\User;

class ExcelCSVController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function index()
    {
       return view('admin.excel-csv-import');
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */

    public function UsersImportExcelCSV(Request $request) 
    {
        $validatedData = $request->validate([
 
           'file' => 'required',
 
        ]);
 
        Excel::import(new UsersImport,$request->file('file'));
 
            
        return redirect()->route('files')->with('status', 'The excel/csv users have been imported to database');
    }
 
    /**
    * @return \Illuminate\Support\Collection
    */
    public function UsersExportExcelCSV($slug) 
    {
        return Excel::download(new UsersExport, 'users.'.$slug);
    }

    /**
    * @return \Illuminate\Support\Collection
    */

    public function SchoolsImportExcelCSV(Request $request) 
    {
        $validatedData = $request->validate([
 
           'file' => 'required',
 
        ]);
 
        Excel::import(new SchoolsImport,$request->file('file'));
 
            
        return redirect()->route('files')->with('status', 'The excel/csv schools have been imported to database');
    }
 
    /**
    * @return \Illuminate\Support\Collection
    */
    public function SchoolsExportExcelCSV($slug) 
    {
        return Excel::download(new SchoolsExport, 'schools.'.$slug);
    }
}
