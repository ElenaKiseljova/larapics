<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  use HasFactory;

  protected $fillable = [
    'body',
    'user_id',
    'image_id',
    'approved'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function image()
  {
    return $this->belongsTo(Image::class);
  }

  public function scopeApproved(Builder $query)
  {
    return $query->where('approved', true);
  }

  public function scopeForUser(Builder $query, User $user)
  {
    $imagesId = Image::whereBelongsTo($user)->pluck('id')->all();

    return $query->whereIn('image_id', $imagesId);
  }
}
