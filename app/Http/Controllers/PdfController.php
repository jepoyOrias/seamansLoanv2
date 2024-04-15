<?php

namespace App\Http\Controllers;

use App\Models\LoanInformation;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Arr;
use ZipArchive;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    public function generatePDF(Request $request)
    {
        // Retrieve data from request or database
        $ids = $request->input('ids'); // Assuming you're passing an array of IDs in the request

        // Create an array to store PDF file paths
        $pdfFilePaths = [];

        // Loop through each ID
        foreach ($ids as $id) {
            $borrower = LoanInformation::with([
                'personalInformation',
                'releasing',
                'personalInformation.contactReferences',
                'personalInformation.coborrowers',
                'personalInformation.employerInformation',
                'personalInformation.requirements'
            ])->findOrFail($id);

            $borrowerArray = $borrower->toArray();

            // Generate and save the PDF for the current borrower
            $pdf = PDF::loadView('pdf.applicationFormPDF', ['borrower' => $borrowerArray])->setOption('fontDir', storage_path('/app/fonts'));
            $pdf->setOption(['dpi' => 120 , 'isRemoteEnabled' => true]);
            $pdf->setPaper('Legal', 'portrait');

            // Save the PDF temporarily
            $pdfFilename = $borrowerArray['personal_information']['lastname'] . '-' .
                $borrowerArray['personal_information']['firstname'] . '-' .
                $borrowerArray['personal_information']['middlename'];

            // If suffix is not null, add it to the PDF filename
            if (!empty($borrowerArray['personal_information']['suffix'])) {
                $pdfFilename .= '-' . $borrowerArray['personal_information']['suffix'];
            }

            // Append the file extension
            $pdfFilename .= '-application-form.pdf';

            // Construct the full PDF path
            $pdfPath = 'temp/' . $pdfFilename;
            $pdfFullPath = storage_path($pdfPath);

            // Create the directory if it doesn't exist
            $pdfDirectory = dirname($pdfFullPath);
            if (!file_exists($pdfDirectory)) {
                mkdir($pdfDirectory, 0755, true); // Create the directory recursively
            }

            // Save the PDF
            $pdf->save($pdfFullPath);

            // Add the PDF file path to the array
            $pdfFilePaths[] = $pdfFullPath;
        }

        // Create a zip file
        $zipFileName = 'application-forms.zip';
        $zip = new ZipArchive;
        if ($zip->open(storage_path($zipFileName), ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
            // Add each PDF to the zip file
            foreach ($pdfFilePaths as $pdfFilePath) {
                $zip->addFile($pdfFilePath, basename($pdfFilePath));
            }
            $zip->close();
        }

        // Return the zip file as a download response
        return response()->download(storage_path($zipFileName))->deleteFileAfterSend();
    }
}
