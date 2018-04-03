<?php

namespace AnswerMe;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
  protected $table = 'notifications';
  public $timestamps = false;
  protected $fillable = ['is_seen'];
}
