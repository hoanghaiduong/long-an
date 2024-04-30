<?php



use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_roles')->insert([
            'id' => 1,
            'name' => 'Master Admin',
        ]);

        DB::table('admin_roles')->insert([
            'id' => 2,
            'name' => 'Employee',
        ]);
        DB::table('admins')->insert([
            'id' => 1,
            'name' => 'Master Admin',
            'phone' => '01759412381',
            'email' => 'admin@admin.com',
            'admin_role_id' => 1,
            'image' => 'def.png',
            'password' => bcrypt(12345678),
            'remember_token' => Str::random(10),
        ]);
        DB::table('post_types')->insert([
            'id' => 1,
            'name' => 'Tin Tức',
        ]);

        DB::table('post_types')->insert([
            'id' => 2,
            'name' => 'Sự kiện',
        ]);
        DB::table('sellers')->insert([
            'f_name' => 'al imrun',
            'l_name' => 'khandakar',
            'phone' => '01759412381',
            'email' => 'seller@seller.com',
            'image' => 'def.png',
            'password' => bcrypt(12345678),
            'status' => 'pending',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('business_settings')->insert([
            'id' => 1,
            'type' => 'system_default_currency',
            'value' => 1,
        ]);
        // $this->call([
        //     AdminRoleTable::class,
        //     // \AdminRoleTable::class,
        //     // \AdminTable::class,
        //     // \SellerTableSeeder::class,
        //     // \PostTypeTable::class
        // ]);
    }
}
