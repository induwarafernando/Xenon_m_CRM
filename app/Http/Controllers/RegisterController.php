<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Merchandizer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller{
    public function create(){
        return view('register');
    }
    protected function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:merchandizers'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'location' => ['required', 'string'],
            'logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg'], // Validate the uploaded file
        ]);
        $logoPath = '';
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $filename = time(). '.'. $logo->getClientOriginalExtension();
            $path = $logo->storeAs('logos', $filename);
            $logoPath = Storage::url($path);
        }
        Merchandizer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'location' => $request->location,
            'logo' => $logoPath,
        ]);
        return redirect()->route('login')->with('success', 'Your account has been created successfully!');
    }
    public function showRegistrationForm()
    {
        return view('auth.merchandizer-register');
    }
    
}
