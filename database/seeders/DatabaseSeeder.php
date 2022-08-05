<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'name' => 'John',
            'email'=> 'john@gmail.com'
        ]);
        Listing::factory(6)->create([
            'user_id' => $user ->id
        ]);

    //    Listing::create([
    //    'title' => 'Laravel Senior Developer',
    //    'tags'     => 'Laravel,Javascript',
    //    'location' => 'California',
    //    'email' => 'sam@gmail.com',
    //    'website' => 'https://www.samblog.com',
    //    'company' => 'Bytesberry',
    //    'description' => 'Laravel includes a simple method of seeding your database with test data using seed
    //     classes. All seed classes are stored in the database/seeds directory. Seed classes may have
    //     any name you wish, but probably should follow some sensible convention, such as UsersTableSeeder, etc.' 
    //    ]);
    //    Listing::create([
    //     'title' => 'Php Senior Developer',
    //     'tags'     => 'Php,Javascript',
    //     'location' => 'Washington',
    //     'email' => 'emilly@gmail.com',
    //     'website' => 'https://www.emillylog.com',
    //     'company' => 'Netspeq',
    //     'description' => 'PHP is a general-purpose scripting language geared
    //      toward web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in
    //       1994' 
    //     ]);
    }
}
