<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;
use App\UseCases\Identification\CheckIdentificationUseCase;

class FileController extends Controller
{
    public function uploadPassportView(): Factory|View|Application
    {
        return view('upload-passport');
    }

    public function checkIdentification(Request $request, int $client_id, CheckIdentificationUseCase $checkIdentificationUseCase): RedirectResponse
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->guessExtension();

        $request->image->move(public_path('images'), $imageName);

        $file = new File();
        $file->client_id = $client_id;
        $file->file_name = $imageName;
        $file->file_type = $request->input('file_type');
        $file->save();

        $checkIdentified = $checkIdentificationUseCase->execute($file);

        if ($checkIdentified === 1) {
            return redirect()->route('home');
        }

        return redirect()->route('upload.passport', ['client_id' => $client_id]);
    }
}
