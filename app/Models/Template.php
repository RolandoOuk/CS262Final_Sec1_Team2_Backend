<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'tem_title', 'blade_file'];

    // Define relationship with UserResume model
    public function userResumes()
    {
        return $this->hasMany(UserResume::class, 'template_id');
    }


}
