<?php

// app/Http/Controllers/Admin/MerchandizerController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Merchandizer;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class MerchandizerController extends Controller
{
    public function index()
    {
        $merchandizers = Merchandizer::all();
        return view('merchandizers', compact('merchandizers'));
    }

    public function create()
    {
        return view('admin.merchandizers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:merchandizers',
        ]);

        Merchandizer::create($request->all());

        return redirect()->route('admin.merchandizers')
            ->with('success', 'Merchandizer created successfully');
    }

    // Implement edit, update, and delete methods as needed
}
