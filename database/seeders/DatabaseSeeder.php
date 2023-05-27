<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    \App\Models\Category::create([ 'name' => 'Programming', 'slug' => 'programming' ]);
    \App\Models\Category::create([ 'name' => 'Design', 'slug' => 'design' ]);
    \App\Models\Category::create([ 'name' => 'Personal', 'slug' => 'personal' ]);

    for ($i=0; $i<10; $i++) {
      \App\Models\Post::factory()->create(['slug' => "yey$i"]);
    }
    \App\Models\User::factory(3)->create();

    // \App\Models\User::factory()->create([
        // 'name' => 'Test User',
        // 'email' => 'test@example.com',
    // ]);
  }
}
