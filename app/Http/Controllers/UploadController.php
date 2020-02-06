<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public static function upload($data = [])
    {
        if (!empty($data['new_name'])) {
            $new_name = $data['new_name'] === null ? time() : $data['new_name'];
        }
        if (request()->hasFile($data['file']) && $data['upload_type'] == 'single') {
            if (!empty($data['delete_file'])) {
                Storage::delete($data['delete_file']);
            }
            return request()->file($data['file'])->store($data['path']);
        }
    }
}
