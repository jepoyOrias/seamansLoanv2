<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonalInformationRequest;
use App\Models\PersonalInformation;
use Illuminate\Http\Request;

class PersonalInformationController extends Controller
{
    
    public function updatePersonalInformation(PersonalInformationRequest $request, $id)
    {
        // Retrieve the PersonalInformation instance by its ID
        $personalInformation = PersonalInformation::findOrFail($id);
    
        // Update the personal information fields with the validated data from the request
        $personalInformation->update($request->validated());
    
        // Optionally, you can return a response indicating the success of the update
        return response()->json(['message' => 'Personal information updated successfully'], 200);
    }

}
