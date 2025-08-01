<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\Models\User;

class ImportJsonTest extends TestCase
{
    use RefreshDatabase;

    public function test_json_upload_works()
    {
        $this->withoutMiddleware(); // bypass auth

        // this is the private/uploads folder in the storage directory
        // directory where json is imported: SALN-Filing-Web-Platform/storage/app/private/uploads
        Storage::disk('local');
        $jsonSample = 'tests/Fixtures/json_sample1.json'; // change to whichever json file you want to import
        $jsonPath    = base_path($jsonSample);
        $jsonContent = file_get_contents($jsonPath);
        $jsonFile    = UploadedFile::fake()->createWithContent('sample.json', $jsonContent);

        $response = $this->post('/home/import-json', [
            'json_file' => $jsonFile,
        ]);

        $response->assertStatus(302)
            ->assertRedirect('/home');

        // check if the imported json exists in that specified directory
        /** @var \Illuminate\Filesystem\FilesystemAdapter $disk */
        $disk = Storage::disk('local');
        $disk->assertExists('uploads/' . $jsonFile->hashName());

        $this->assertTrue(session()->has('prefill'));

    }

}
