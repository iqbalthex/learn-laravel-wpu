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

    \App\Models\Post::factory(20)->create();

    \App\Models\User::factory(3)->create();

    \App\Models\User::create([
      'name' => '123',
      'username' => '123',
      'email' => 'iqbal.thex@gmail.com',
      'password' => bcrypt('123456'),
    ]);

    // \App\Models\User::factory()->create([
        // 'name' => 'Test User',
        // 'email' => 'test@example.com',
    // ]);
  }
}
