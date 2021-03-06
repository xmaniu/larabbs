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
//            'https://cdn.learnku.com/uploads/images/201710/14/1/s5ehp11z6s.png',
//            'https://cdn.learnku.com/uploads/images/201710/14/1/Lhd1SHqu86.png',
//            'https://cdn.learnku.com/uploads/images/201710/14/1/LOnMrqbHJn.png',
//            'https://cdn.learnku.com/uploads/images/201710/14/1/xAuDMxteQy.png',
//            'https://cdn.learnku.com/uploads/images/201710/14/1/ZqM7iaP4CR.png',
//            'https://cdn.learnku.com/uploads/images/201710/14/1/NDnzMutoxX.png',
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
        $user->avatar = 'http://larabbs.com/uploads/images/avatars/1.jpg';
        $user->save();

        // 初始化用户角色，将 1 号用户指派为『站长』
        $user->assignRole('Founder');

        // 将 2 号用户指派为『管理员』
        $user = User::find(2);
        $user->assignRole('Maintainer');
    }
}
