<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
  use HasFactory;

  protected $fillable = [
    'disable_comment',
    'moderate_comments',
    'email_notification'
  ];

  protected $casts = [
    'email_notification' => 'array'
  ];

  public function user()
  {
    return $this->belongsTo(User::class); // (User::class, 'id_user', '_id');
  }
}
