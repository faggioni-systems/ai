<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GithubIssue extends Model
{
    protected $fillable = [
        'github_id',
        'title',
        'body',
        'url'
    ];
}
