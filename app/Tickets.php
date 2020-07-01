<php 

<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Model
{

    protected $fillable = [
        'id', 'project', 'tracker', 'status', 'priority', 'subject', 'assignee', 'updated'
    ];
}
