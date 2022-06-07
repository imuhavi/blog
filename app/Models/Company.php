<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
