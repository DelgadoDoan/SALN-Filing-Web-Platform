<?php

namespace App\Http\Controllers;

use App\Models\JsonFile;
use Illuminate\Http\Request;

class JsonSubmissionController extends Controller
{
    //
    public function storeJson(Request $request){
        $request->validate([
            'json_file' => 'required|file|mimes:json,txt',
        ]);

        $jsonPath = $request->file('json_file')->getRealPath();
        $jsonContent = file_get_contents($jsonPath);

        // Validate JSON format
        json_decode($jsonContent);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return back()->withErrors(['Invalid JSON format.']);
        }

        // Store in DB
        $submission = JsonFile::create([
            'payload' => $jsonContent,
        ]);

        return redirect()->route('submit.json')->with('success', 'JSON saved! ID: ' . $submission->id);        
    }
}
