<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(Faker\Generator::class);

        $avatars = [
            'http://larabbs.com/uploads/images/avatars/1.jpg',
            'http://larabbs.com/uploads/images/avatars/2.jpg',
            'http://larabbs.com/uploads/images/avatars/3.jpg',
            'http://larabbs.com/uploads/images/avatars/4.jpg',
            'http://larabbs.com/uploads/images/avatars/5.jpg',
            'http://larabbs.com/uploads/images/avatars/6.jpg',
            'http://larabbs.com/uploads/images/avatars/7.jpg',
            'http://larabbs.com/uploads/images/avatars/8.jpg',
            'http://larabbs.com/uploads/images/avatars/9.jpg',
            'http://larabbs.com/uploads/images/avatars/10.jpg',
        ];

        $users = factory(User::class)
            ->times(10)
            ->make()
            ->each(function ($user,$index) use($faker,$avatars){
            $user->avatar = $faker->randomElement($avatars);
        });

        $user_array = $users->makeVisible(['password', 'remember_token'])->toArray();

        User::insert($user_array);

        $user = User::find(1);
        $user->name = 'xmaniu';
        $user->email = '858566651@qq.com';
        $user->avatar = 'https://cdn.learnku.com/uploads/images/201710/14/1/ZqM7iaP4CR.png';
        $user->save();
    }
}
