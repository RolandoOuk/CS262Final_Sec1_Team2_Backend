<?php

namespace App\Http\Controllers;
use App\Models\Category_User;
use App\Models\UserCvInfo;
use App\Models\Template;
use App\Models\Admin;
use App\Models\UserResume;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller


{

    public function allCvs()
    {
        $cvs = UserResume::all();

        return view('backend.all_cvs', compact('cvs'));
    }
    
    public function home()
    {
        // Total users
        $totalUsers = Category_User::count();

        // Total CVs created
        $totalCvInfos = UserResume::count();

        // Total templates
        $totalTemplates = Template::count();

        // CVs created by date
        $cvData = UserResume::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
                            ->groupBy(DB::raw('DATE(created_at)'))
                            ->orderBy(DB::raw('DATE(created_at)'))
                            ->get();

        return view('backend.dashboard', compact('totalUsers', 'totalCvInfos', 'totalTemplates', 'cvData'));
    }   
    public function showProfile()
    {
        $user = Auth::user()->load('resumes.template');

        return view('profile', compact('user'));
    }

    public function template()
    {
        return view('backend.templateb'); // Adjust to your view path
    }

    public function user(){
        $user = Category_User::get(); // Use plural variable name for collection
        
        return view('backend.user', compact('user'));
    }

    // Upload profile pic
    public function uploadProfilePicture(Request $request)
    {
        $request->validate([
            'profile_pic' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
        ]);

        $user = auth()->user(); // Assuming authentication is required
        $imageName = 'profile_' . time() . '.' . $request->profile_pic->extension();

        $request->profile_pic->move(public_path('storage'), $imageName);

        // Update user's profile picture in the database
        $user->profile_pic = $imageName;
        $user->save();

        return redirect()->back()->with('success', 'Profile picture updated successfully.');
    }



    // UPDATE FUNCTION

    public function update(Request $request, $user_id)
    {


        $user = Category_User::findOrFail($user_id);

        // Handle profile picture upload
        if ($request->hasFile('profile_pic')) {
            if ($user->profile_pic) {
                Storage::disk('public')->delete($user->profile_pic);
            }

            $file = $request->file('profile_pic');
            $path = $file->store('profile_pics', 'public');
            $user->profile_pic = $path;
        }

        // Update user details
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash password if present
        ]);

        return redirect()->route('admin.user')->with('status', 'User edited successfully');
        
    }

    // DELETE FUNCTION
    public function delete(int $user_id){
        $user = Category_User::findOrFail($user_id);

        // Delete profile picture from storage if exists
        if ($user->profile_pic) {
            Storage::disk('public')->delete($user->profile_pic);
        }

        $user->delete();

        return redirect()->route('user')->with('status', 'User deleted successfully');
    }

    // VIEW EDIT PAGE

    public function edit(int $user_id){
        $user = Category_User::findOrFail($user_id);
        
        return view('backend.edit', compact('user'));
        
    }


    // Login for admin page

    public function showLoginForm(){
        return view('login'); 
    }
    public function login(Request $request)
    {
        // Validate the form data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
    
        // Check if the user is an admin
        $admin = Admin::where('email', $credentials['email'])->first();
    
        if (!$admin || !Hash::check($credentials['password'], $admin->password)) {
            // Invalid credentials provided
            return redirect()->route('login')->withErrors(['email' => 'Invalid credentials'])->withInput();
        }
    
        // Attempt to log the admin in using the admin guard
        if (Auth::guard('admin')->loginUsingId($admin->id)) {
            return redirect('/admin/dashboard');
        }
    
        // Failed to log in admin
        return redirect()->route('login')->withErrors(['email' => 'Invalid credentials'])->withInput();
    }
    
    // Logout 
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login'); // Redirect to home or login page after logout
    }

    public function register(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Create a new admin record
        $admin = Admin::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Optionally, you can log in the admin after registration
        // Auth::login($admin);

        // Redirect to admin dashboard or login page
        return redirect()->route('admin.login')->with('success', 'Admin registered successfully. You can now login.');
    }
}
