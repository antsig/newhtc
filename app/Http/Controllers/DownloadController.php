<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Download;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function hitAndDownload($id)
    {
        $download = Download::findOrFail($id);
        
        // Increment hits
        $download->increment('hits');

        // Check if file exists in storage
        if (Storage::disk('public')->exists($download->nama_file)) {
            return Storage::disk('public')->download($download->nama_file);
        }

        return redirect()->back()->with('error', 'File tidak ditemukan.');
    }
}
