<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Application as FoundationApplication;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


class HomeController extends Controller
{
    public function index(){
        return Inertia::render('Welcome', [
            'canLogin' => Route::has(name: 'login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => FoundationApplication::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }
}
