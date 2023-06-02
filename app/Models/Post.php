<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\ {
  Factories\HasFactory,
  Builder as Query,
  Model,
  Relations\BelongsTo,
};

class Post extends Model {
  use HasFactory, Sluggable;

  // protected $fillable = ['title', 'excerpt', 'body'];
  /**
   * @var array<string> $guarded
   * @var array<string> $with
   */
  protected $guarded = ['id'];
  protected $with = ['author', 'category'];

  /**
   * @return Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function author(): BelongsTo {
    return $this->belongsTo(User::class, 'user_id');
  }

  /**
   * @return Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function category(): BelongsTo {
    return $this->belongsTo(Category::class);
  }

  /**
   * @param  Illuminate\Database\Eloquent\Builder $query
   * @param  array<string, string>                $filters
   * @return void
   */
  public function scopeFilter(Query $query, array $filters=[]): void {
    $query->when($filters['search'] ?? false, fn ($query, $keyword) => $query
      ->where('title', 'like', "%$keyword%")
      ->orWhere('body', 'like', "%$keyword%")
    );

    $query->when($filters['category'] ?? false, fn ($query, $category) => $query
      ->whereHas('category', fn ($query) => $query->where('slug', $category))
    );

    $query->when($filters['author'] ?? false, fn ($query, $author) => $query
      ->whereHas('author', fn ($query) => $query->where('username', $author))
    );
  }

  /**
   * Set the default field for route model binding.
   */
  public function getRouteKeyName(): string {
    return 'slug';
  }

  /**
   * Return the sluggable configuration array for this model.
   *
   * @return array
   */
  public function sluggable(): array {
    return [
      'slug' => [
        'source' => 'title',
      ],
    ];
  }
}
