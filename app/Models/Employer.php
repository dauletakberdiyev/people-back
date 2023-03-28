<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;
    protected $table = 'employer';
    protected $fillable = [
        'name',
        'web_site',
        'position',
        'employment',
        'city',
        'salary',
        'experience',
        'position_desc',
        'first_last_name',
        'phone',
        'email',
        'logo'
    ];
}
