<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder as Query;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
  use HasFactory;

  // protected $fillable = ['title', 'excerpt', 'body'];
  protected $guarded = ['id'];
  protected $with = ['author', 'category'];

  public function author(): BelongsTo {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function category(): BelongsTo {
    return $this->belongsTo(Category::class);
  }

  public function scopeFilter(Query $query, array $filters=[]): void {
    $query->when($filters['search'] ?? false, fn ($query, $keyword) => $query
      ->where('title', 'like', "%$keyword%")
      ->orWhere('body', 'like', "%$keyword%")
    );

    $query->when($filters['category'] ?? false, fn ($query, $category) => $query
      ->whereHas('category', fn ($query) => $query->where('slug', $category))
    );

    $query->when($filters['author'] ?? false, function ($query, $author) {
      $query->whereHas('author', fn ($query) => $query->where('username', $author));
    });
  }
}
