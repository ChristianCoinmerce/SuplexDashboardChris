<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Posts class instance will refer to posts table in database
class Posts extends Model
{
  //restricts columns from modifying
  protected $guarded = [];

  // posts has many comments
  // returns all comments on that post

