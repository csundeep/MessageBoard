<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Post;
use App\Comments;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UserDataSeeder');
        $this->call('PostDataSeeder');
        $this->call('CommentDataSeeder');
    }
}

class UserDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        User::create([
            'first_name'=>'Daisy',
            'last_name'=>'Johnson',
            'email'=>'Daisy@gmail.com',
            'password'=>'12345'
        ]);
        User::create([
            'first_name'=>'Jemma',
            'last_name'=>'Simmons',
            'email'=>'Jemma@gmail.com',
            'password'=>'12345'
        ]);
        User::create([
            'first_name'=>'oliver',
            'last_name'=>'queen',
            'email'=>'oliver@gmail.com',
            'password'=>'12345'
        ]);
    }
}

class PostDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->delete();
        Post::create([
            'post_title'=>'what is null pointer exception',
            'description'=>'its an exception',
            'user_id'=>'1',
        ]);

        Post::create([
            'post_title'=>'what is null pointer exception',
            'description'=>'its an exception',
            'user_id'=>'1',
        ]);
    }
}

class CommentDataSeeder extends Seeder
{

    public function run()
    {
        DB::table('comments')->delete();
        Comments::create([
            'comment'=>'ya its correct',
            'user_id'=>'1',
            'post_id'=>'1'
        ]);
    }
}
