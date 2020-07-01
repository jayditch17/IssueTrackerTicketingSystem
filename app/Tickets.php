<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
   protected $fillable =[
   		'id','project', 'tracker', 'status', 'priority', 'subject', 'assignee', 'updated'
   ];
}
