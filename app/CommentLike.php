<?php

namespace AnswerMe;

use Illuminate\Database\Eloquent\Model;

class CommentLike extends Model
{
  protected $table = 'comments_likes';
  public $timestamps = false;
  protected $fillable = ['users_id', 'comments_id', 'type'];
  //protected $primaryKey = ['users_id', 'comments_id'];
}
