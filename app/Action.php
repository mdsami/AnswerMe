<?php

namespace AnswerMe;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
  protected $table = 'actions';
  const UPDATED_AT = NULL;
  protected $fillable = ['type', 'users_id', 'target_users_id', 'is_ghost'];
}
