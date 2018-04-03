<?php

namespace AnswerMe;

use Illuminate\Database\Eloquent\Model;

class UserNotification extends Model
{
  protected $table = 'notify_users';
  public $timestamps = false;
  protected $fillable = ['is_seen'];
}
