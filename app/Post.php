<?php

namespace AnswerMe;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $table = 'posts';
  public $timestamps = false;

  public function Category(){
    return $this->belongsTo('AnswerMe\Category', 'categories_id');
  }

  public function Likes(){
    return $this->belongsToMany('AnswerMe\User', 'posts_likes', 'posts_id', 'users_id');
  }

  public function Shares(){
    return $this->belongsToMany('AnswerMe\User', 'posts_shares', 'posts_id', 'users_id');
  }

  public function Comments(){
    return $this->hasMany('AnswerMe\Comment', 'posts_id');
  }
}
