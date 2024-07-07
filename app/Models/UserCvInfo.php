<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCvInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_resume_id',
        'field_name',
        'field_value',
    ];

    // Define relationship with UserResume model
    public function userResume()
    {
        return $this->belongsTo(UserResume::class, 'user_resume_id');
    }
}
