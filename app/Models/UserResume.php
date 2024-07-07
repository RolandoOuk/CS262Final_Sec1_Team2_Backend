<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserResume extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_resume_id';
    protected $table = 'user_resume';

    protected $fillable = ['user_id', 'template_id'];

    // Define relationship with User model
    public function user()
    {
        return $this->belongsTo(Category_User::class, 'user_id');
    }

    // Define relationship with Template model
    public function template()
    {
        return $this->belongsTo(Template::class, 'template_id');
    }

    // Connect to UserCvInfo model
    public function cvInfos()
    {
        return $this->hasMany(UserCvInfo::class, 'user_resume_id', 'user_resume_id');
    }

    public function resumes()
{
    return $this->hasMany(UserResume::class);
}

// public function template()
// {
//     return $this->belongsTo(Template::class);
// }


}