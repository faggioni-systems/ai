<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GithubIssue extends Model
{
    protected $fillable = [
        'title',
        'body',
        'url'
    ];
}
