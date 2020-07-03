<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
   protected $fillable =[
   		'id','project', 'tracker', 'status', 'priority', 'subject', 'assignee', 'updated'
   ];
   public $timestamps=false;
   // protected $user =[
   // 		'id','name', 'email', 'status', 'priority', 'subject', 'assignee', 'updated'
   // ];
}
