<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginSecurity extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
