<?php

namespace AnswerMe;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  protected $table = 'users';
  public $timestamps = false;

  public function Posts($isGhost = NULL){
    $posts = $this->hasMany('AnswerMe\Post', 'users_id');
    if($isGhost != NULL){ $posts = $posts->where('is_ghost', $isGhost); }
    return $posts;
  }

  public function Comments($isGhost = NULL){
    $comments = $this->hasMany('AnswerMe\Comment', 'users_id');
    if($isGhost != NULL){ $comments = $comments->where('is_ghost', $isGhost); }
    return $comments;
  }

  public function Followers(){
    return $this->hasMany('AnswerMe\Action', 'target_users_id')->where('type', 'follow');
  }

  public function Followings(){
    return $this->hasMany('AnswerMe\Action', 'users_id')->where('type', 'follow');
  }

  public function Blocked(){
    return $this->belongsToMany('AnswerMe\User', 'actions', 'users_id', 'target_users_id')->where('type', 'block');
  }

  public function Notifications(){
    return $this->belongsToMany('AnswerMe\Notification', 'notify_users', 'users_id', 'notifications_id');
  }

}
