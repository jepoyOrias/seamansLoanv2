<?php

namespace App\Http\Controllers;
use App\Models\PersonalInformation;
use App\Models\Requirements;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class RequirementsController extends Controller
{
    public function downloadUserRequirements($userId)
    {
                // Find the requirements for the given user ID
                $requirements = Requirements::where('personal_information_id', $userId)->firstOrFail();

                // Initialize an array to store image file paths
                $imageFilePaths = [];
        
                // Loop through each requirement and add its image path to the array
                foreach ($requirements->getAttributes() as $key => $value) {
                    if (!empty($value) && in_array($key, ['contract', 'oec', 'passport', 'seamans_book', 'e_reg', 'sirb', 'bill', 'valid_id_1', 'valid_id_2', 'marriage_contract','signature'])) {
                        $imageFilePaths[] = storage_path('app/public/' . $value);
                    }
                }
                
        
                // Create a unique filename for the zip archive
                $zipFileName = $requirements->personalInformation->loanInformation->uuid . '-Requirements.zip';
                
        
                // Create a new ZipArchive instance
                $zip = new ZipArchive;
        
                // Open the zip archive for writing
                if ($zip->open(storage_path($zipFileName), ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
                    // Add each image to the zip file
                    foreach ($imageFilePaths as $imagePath) {
                        // Check if the image file exists
                        if (file_exists($imagePath)) {
                            // Add the image file to the zip archive
                            $zip->addFile($imagePath, basename($imagePath));
                        }
                    }
                    // Close the zip archive
                    $zip->close();
                } else {
                    // Return an error response if the zip archive cannot be created
                    return response()->json(['error' => 'Unable to create zip archive'], 500);
                }
        
                // Return the zip file as a download response
                return response()->download(storage_path($zipFileName))->deleteFileAfterSend();
            
    }
}
