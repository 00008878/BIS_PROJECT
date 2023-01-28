<?php

namespace App\Http\Controllers;

use App\Enums\Files\FileTypesEnum;
use App\Models\File;
use App\UseCases\Identification\CheckIdentificationUseCase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PassportController extends Controller
{
    public function checkIdentification(Request $request, CheckIdentificationUseCase $checkIdentificationUseCase): JsonResponse
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->input('image')->extension();

        $request->input('image')->move(public_path('images'), $imageName);

        $file = new File();
        $file->client_id = $request->input('client_id');
        $file->file_name = $imageName;
        $file->file_type = $request->input('file_type');
        $file->save();

        $checkIdentified = $checkIdentificationUseCase->execute($file);

        if ($checkIdentified === 1) {
            return response()->json(['message' => 'registration completed']);
        }

        return response()->json(['message' => 'upload photo again']);
    }
}