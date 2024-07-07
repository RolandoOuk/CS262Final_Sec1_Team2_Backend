<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// Auth
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;



class Category_User extends Model implements Authenticatable
{
    use AuthenticatableTrait;
    use HasFactory;
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'user';

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'email',
        'password',
        'profile_pic'
    ];
    
    protected $primaryKey = 'user_id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;

    // Define relationship with UserResume model
    public function resumes()
    {
        return $this->hasMany(UserResume::class, 'user_id');
    }

}

