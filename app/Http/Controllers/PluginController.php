<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plugin;

class PluginController extends Controller
{
    public function index()
    {
        $plugins = Plugin::all();
        return view('dashboard', compact('plugins'));
    }

    public function create()
    {
        return view('dashboard');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',

        ]);

        $plugin = Plugin::create($data);

        return redirect()->route('dashboard');
    }
}
