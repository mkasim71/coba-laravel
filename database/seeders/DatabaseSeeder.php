<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // User::create([
        //     'name' => 'Muhammad Kasim',
        //     'email' => 'mkasim77@gmail.com',
        //     'password' => bcrypt('123456')
        // ]);

        // User::create([
        //     'name' => 'Dini Praptiwi',
        //     'email' => 'dini@gmail.com',
        //     'password' => bcrypt('123456')
        // ]);

        User::factory(3)->create();

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::factory(20)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum pertama',
        //     'body' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. </p><p>Sint placeat dolor deserunt ipsa vel quisquam, consectetur vero quam praesentium debitis nisi necessitatibus explicabo temporibus facere rem, omnis totam optio? Distinctio dolores dolorem facilis voluptas dicta explicabo, alias quas neque esse vel, commodi quos possimus repellendus odit incidunt reprehenderit sit delectus culpa iusto itaque fugiat at, minima aut! Impedit ad, ullam odio saepe tempore dolorum quidem, sequi facilis praesentium nihil facere sed, laboriosam illo laudantium.</p> <p>Non perferendis voluptatum expedita tempora! Culpa assumenda minima facilis unde minus exercitationem dicta ad consequatur quasi. </p><p>Eaque facilis, dolor consequuntur beatae ipsam fuga itaque sit accusantium temporibus, adipisci, numquam voluptatem libero saepe enim quisquam ipsum! Sed itaque omnis enim dignissimos distinctio rem praesentium illo nihil, a amet similique minus, pariatur nisi culpa sequi eum doloremque quos, beatae vitae. Id dolor debitis vitae omnis architecto voluptatum saepe ducimus quidem! Ea animi dolores eum, tempore distinctio provident sint?</p>',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum kedua',
        //     'body' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. </p><p>Sint placeat dolor deserunt ipsa vel quisquam, consectetur vero quam praesentium debitis nisi necessitatibus explicabo temporibus facere rem, omnis totam optio? Distinctio dolores dolorem facilis voluptas dicta explicabo, alias quas neque esse vel, commodi quos possimus repellendus odit incidunt reprehenderit sit delectus culpa iusto itaque fugiat at, minima aut! Impedit ad, ullam odio saepe tempore dolorum quidem, sequi facilis praesentium nihil facere sed, laboriosam illo laudantium.</p> <p>Non perferendis voluptatum expedita tempora! Culpa assumenda minima facilis unde minus exercitationem dicta ad consequatur quasi. </p><p>Eaque facilis, dolor consequuntur beatae ipsam fuga itaque sit accusantium temporibus, adipisci, numquam voluptatem libero saepe enim quisquam ipsum! Sed itaque omnis enim dignissimos distinctio rem praesentium illo nihil, a amet similique minus, pariatur nisi culpa sequi eum doloremque quos, beatae vitae. Id dolor debitis vitae omnis architecto voluptatum saepe ducimus quidem! Ea animi dolores eum, tempore distinctio provident sint?</p>',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum ketiga',
        //     'body' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. </p><p>Sint placeat dolor deserunt ipsa vel quisquam, consectetur vero quam praesentium debitis nisi necessitatibus explicabo temporibus facere rem, omnis totam optio? Distinctio dolores dolorem facilis voluptas dicta explicabo, alias quas neque esse vel, commodi quos possimus repellendus odit incidunt reprehenderit sit delectus culpa iusto itaque fugiat at, minima aut! Impedit ad, ullam odio saepe tempore dolorum quidem, sequi facilis praesentium nihil facere sed, laboriosam illo laudantium.</p> <p>Non perferendis voluptatum expedita tempora! Culpa assumenda minima facilis unde minus exercitationem dicta ad consequatur quasi. </p><p>Eaque facilis, dolor consequuntur beatae ipsam fuga itaque sit accusantium temporibus, adipisci, numquam voluptatem libero saepe enim quisquam ipsum! Sed itaque omnis enim dignissimos distinctio rem praesentium illo nihil, a amet similique minus, pariatur nisi culpa sequi eum doloremque quos, beatae vitae. Id dolor debitis vitae omnis architecto voluptatum saepe ducimus quidem! Ea animi dolores eum, tempore distinctio provident sint?</p>',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);

        // Post::create([
        //     'title' => 'Judul Keempat',
        //     'slug' => 'judul-keempat',
        //     'excerpt' => 'Lorem ipsum kempat',
        //     'body' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. </p><p>Sint placeat dolor deserunt ipsa vel quisquam, consectetur vero quam praesentium debitis nisi necessitatibus explicabo temporibus facere rem, omnis totam optio? Distinctio dolores dolorem facilis voluptas dicta explicabo, alias quas neque esse vel, commodi quos possimus repellendus odit incidunt reprehenderit sit delectus culpa iusto itaque fugiat at, minima aut! Impedit ad, ullam odio saepe tempore dolorum quidem, sequi facilis praesentium nihil facere sed, laboriosam illo laudantium.</p> <p>Non perferendis voluptatum expedita tempora! Culpa assumenda minima facilis unde minus exercitationem dicta ad consequatur quasi. </p><p>Eaque facilis, dolor consequuntur beatae ipsam fuga itaque sit accusantium temporibus, adipisci, numquam voluptatem libero saepe enim quisquam ipsum! Sed itaque omnis enim dignissimos distinctio rem praesentium illo nihil, a amet similique minus, pariatur nisi culpa sequi eum doloremque quos, beatae vitae. Id dolor debitis vitae omnis architecto voluptatum saepe ducimus quidem! Ea animi dolores eum, tempore distinctio provident sint?</p>',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);


    }
}
