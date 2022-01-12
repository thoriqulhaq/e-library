<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;



class DownloadFileController extends Controller

{

    public function downloadFile(Request $request)
    {


        $filePath = 'books/' . $request->File_Upload;

        $headers = [
            'Content-Type' => 'application/pdf',
        ];


        return \Response::make(Storage::disk('s3')->get($filePath), 200, $headers);
    }
}
