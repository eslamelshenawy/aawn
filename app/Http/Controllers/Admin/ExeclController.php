<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Products;

class ExeclController extends Controller
{
    public function importExportExcelORCSV()
    {
        return view('admin.file_import_export');
    }

    public function importFileIntoDB(Request $request)
    {

        if ($request->hasFile('sample_file')) {

            $path = $request->file('sample_file')->getRealPath();

            $data = \Excel::load($path, function($reader) {
            })->get();

            if ($data->count()) {

               /* foreach ($data as $key => $value) {

                    $arr[] = ['title' => $value->title, 'body' => $value->body];

                }

                if (!empty($arr)) {*/

                    return $data;

/*                }*/

            }

        }

    }
}
