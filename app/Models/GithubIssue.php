<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class GithubIssue extends Model
{
    use Notifiable;

    protected $fillable = [
        'github_id',
        'title',
        'body',
        'url'
    ];
}
