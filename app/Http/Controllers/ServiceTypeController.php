<?php

namespace App\Http\Controllers;

use App\Models\ServiceType;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;

class ServiceTypeController extends Controller
{
    public function servicesView(Request $request): Factory|View|Application
    {
        $types = ServiceType::query()
            ->get();

        return view('services', ['types' => $types]);
    }
}
