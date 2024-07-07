<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserResume;
use App\Models\UserCvInfo;

class ResumeController extends Controller
{
    public function storeCvInfo(Request $request)
    {
        // Validate input to ensure user_resume_id is present
        $request->validate([
            'user_resume_id' => 'required|integer',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'address' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|email',
            'start_end_date' => 'required|string',
            'job_title' => 'required|string',
            'qualification' => 'required|string',
            'university' => 'required|string',
            'graduation_year' => 'required|string',
            'major' => 'required|string',
            'languages' => 'required|string',
            'skills' => 'required|string',
            'summary' => 'required|string',
            'education_details' => 'required|string',
            'experience_details' => 'required|string',
            'references' => 'required|string',
        ]);

        // Retrieve the user_resume_id
        $user_resume_id = $request->input('user_resume_id');

        // Collect form data except the token and user_resume_id
        $fields = $request->except(['_token', 'user_resume_id']);

        // Store or update each field in user_cv_infos table with the provided user_resume_id
        foreach ($fields as $key => $value) {
            UserCvInfo::updateOrCreate(
                ['user_resume_id' => $user_resume_id, 'field_name' => $key],
                ['field_value' => $value, 'updated_at' => now(), 'created_at' => now()]
            );
        }

        // Redirect to view the resume or another appropriate route
        return redirect()->route('view_resume', ['user_resume_id' => $user_resume_id]);
    }

    public function viewResume($user_resume_id)
    {
        // Fetch all cvInfos related to the user_resume_id
        $userCvInfos = UserCvInfo::where('user_resume_id', $user_resume_id)->get();
    
        // Fetch the user_resume with associated template_id
        $userResume = UserResume::findOrFail($user_resume_id);
    
        // Determine which template to load based on template_id
        $template = 'template1'; // Default template if template_id is not set or invalid
    
        switch ($userResume->template_id) {
            case 2:
                $template = 'template2';
                break;
            case 3:
                $template = 'template3';
                break;
            // Add cases for more templates as needed
            default:
                $template = 'template1';
                break;
        }
    
        // Load the appropriate view based on the template
        return view($template, compact('userCvInfos', 'userResume'));
    }
    public function deleteCV($user_resume_id)
    {
        // Find the resume by user_resume_id
        $resume = UserResume::findOrFail($user_resume_id);
        
        // Delete the resume
        $resume->delete();

        // Redirect back with a success message
        return redirect()->route('all_cvs')->with('success', 'Resume deleted successfully');
    }
}
