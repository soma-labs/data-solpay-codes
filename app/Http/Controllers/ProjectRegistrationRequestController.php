<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRegistrationRequestRequest;
use App\Models\ProjectRegistrationRequest;

class ProjectRegistrationRequestController extends Controller
{
    public function store(StoreProjectRegistrationRequestRequest $request)
    {
        $projectRegistrationRequestData = $request->validated();
        ProjectRegistrationRequest::create(
            [
                'title' => $projectRegistrationRequestData['title'],
                'description' => $projectRegistrationRequestData['description'],
                'contact' => $projectRegistrationRequestData['contact'],
            ]
        );

        return response()->json(
            [
                'success' => true
            ]
        );
    }
}
