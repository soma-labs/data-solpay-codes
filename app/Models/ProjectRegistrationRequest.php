<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectRegistrationRequest extends Model
{
    public $fillable = [
        'title',
        'description',
        'contact',
    ];
}
