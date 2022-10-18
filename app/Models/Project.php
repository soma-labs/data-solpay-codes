<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperProject
 */
class Project extends Model
{
    public $fillable = [
        'owner',
        'candy_machine_id',
        'title',
        'description',
        'url',
        'image_url',
    ];
}
