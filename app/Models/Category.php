<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
  Factories\HasFactory,
  Model,
  Relations\HasMany
};

class Category extends Model
{
  use HasFactory;

  /**
   * @var array<string> $guarded
   */
  protected $guarded = ['id'];

  /**
   * @return Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function posts(): HasMany {
    return $this->hasMany(Post::class);
    
  }
}
