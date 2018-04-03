<?php

namespace AnswerMe;

use Illuminate\Database\Eloquent\Model;

class PostLike extends Model
{
  protected $table = 'posts_likes';
  public $timestamps = false;
  protected $fillable = ['users_id', 'posts_id'];
}
