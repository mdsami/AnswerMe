<?php

namespace AnswerMe;

use Illuminate\Database\Eloquent\Model;

class PostShare extends Model
{
  protected $table = 'posts_shares';
  public $timestamps = false;
  protected $fillable = ['users_id', 'posts_id'];
}
