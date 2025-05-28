<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function ViewHomePage()
    {
        $services = Service::orderBy('created_at', 'asc')->get();
        return view('User.Home', compact('services'));
    }

    public function ViewDatenschutz()
    {
        return view('User.Datenschutz');
    }

    public function ViewImpressum()
    {
        return view('User.Impressum');
    }
}
