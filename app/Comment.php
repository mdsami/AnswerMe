<?php

namespace AnswerMe;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $table = 'comments';
  public $timestamps = false;

  public function User(){
    return $this->belongsTo('AnswerMe\User', 'users_id');
  }

  public function Likes(){
    return $this->belongsToMany('AnswerMe\User', 'comments_likes', 'comments_id', 'users_id')->where('type', 'like');
  }

  public function Dislikes(){
    return $this->belongsToMany('AnswerMe\User', 'comments_likes', 'comments_id', 'users_id')->where('type', 'dislike');
  }
}
