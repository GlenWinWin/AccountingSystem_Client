<?php

use Illuminate\Database\Seeder;

class UserTAbleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // DB::table('users')->insert([
      // 	'email' => 'glenwinbernabe@gmail.com',
      //   'username' => 'admin',
      //   'fname' => 'Glenwin',
      //   'lname' => 'Bernabe',
      // 	'password' => Hash::make('admin'),
      //   'profile_path' => 'assets/images/profile_pictures/admin.png',
      //   'passsword_text' => Crypt::encrypt('admin')
      // 	]);
      // DB::table('users')->insert([
      // 	'email' => 'frankmoses@gmail.com',
      //   'username' => 'd_fmoses',
      //   'fname' => 'Frank',
      //   'lname' => 'Moses',
      //  'name' => 'Frank Moses',
      //   'address' => 'Dublin,Ireland',
      //   'contact' => '09358827769',
      // 	'password' => Hash::make('frank'),
      //   'typeOfUser' => 2,
      //   'totalSales' => 30000,
      //   'profile_path' => 'assets/images/user.png',
      //   'passsword_text' => Crypt::encrypt('frank')
      // 	]);
      // DB::table('items')->insert([
      // 	'item_name' => 'GIDEON SPECTACLES NON ADJUSTABLE - CLEAR',
      //   'item_category' => 0,
      //   'item_sub_category' => 2,
      //   'item_quantity' => 34,
      //   'item_costPrice' => 25.00,
      //   'item_subcostPrice' => 28.75,
      //   'item_sellingPrice' => 100.00,
      // 	]);
      // DB::table('items')->insert([
      //   'item_name' => 'SPIDERKING EAGLE HARDHAT WITH CHINSTRAP',
      //   'item_category' => 0,
      //   'item_sub_category' => 1,
      //   'item_quantity' => 17,
      //   'item_costPrice' => 180.00,
      //   'item_subcostPrice' => 207.00,
      //   'item_sellingPrice' => 280.00,
      //   ]);
      // DB::table('users')->insert([
      // 	'email' => 'marcobarrera@gmail.com',
      //   'username' => 'c_mbarrera',
      //   'fname' => 'Marco',
      //   'lname' => 'Barrera',
      //  'name' => 'Marco Barrera',
      //   'contact' => '09488867723',
      //   'address' => 'Boxing St. Suntukan Manila',
      // 	'password' => Hash::make('marco'),
      //   'profile_path' => 'assets/images/user.png',
      //   'typeOfUser' => 1,
      //   'passsword_text' => Crypt::encrypt('marco')
      // 	]);
      // DB::table('users')->insert([
      //   'email' => 'freedy@gmail.com',
      //   'username' => 'c_frmorales',
      //  'name' => 'Freedy Morales',
      //   'fname' => 'Freedy',
      //   'lname' => 'Morales',
      //   'contact' => '09352347890',
      //   'address' => 'Free Place',
      //   'password' => Hash::make('freedy'),
      //   'profile_path' => 'assets/images/user.png',
      //   'typeOfUser' => 1,
      //   'passsword_text' => Crypt::encrypt('freedy')
      //   ]);
      //   DB::table('manage_privileges')->insert([
      //     'clerk_id' => 3,
      //     'sales_encoding' => 0,
      //     'account_registration' => 0,
      //     'add_clerk' => 0,
      //     'use_inventory' => 0,
      //     'generate_report' => 0
      //     ]);
      //     DB::table('manage_privileges')->insert([
      //       'clerk_id' => 4,
      //       'sales_encoding' => 0,
      //       'account_registration' => 0,
      //       'add_clerk' => 0,
      //       'use_inventory' => 0,
      //       'generate_report' => 0
      //       ]);
          // DB::table('category')->insert([
          //   'category_name' => 'Safety Equipments'
          //   ]);
          DB::table('sub_category')->insert([
            'category_id' => 1,
            'subcategory_name' => 'Head'
          ]);
          DB::table('sub_category')->insert([
            'category_id' => 1,
            'subcategory_name' => 'Eye'
          ]);
          DB::table('sub_category')->insert([
            'category_id' => 1,
            'subcategory_name' => 'Eyewash'
          ]);
          DB::table('sub_category')->insert([
            'category_id' => 1,
            'subcategory_name' => 'Ear'
          ]);
          DB::table('sub_category')->insert([
            'category_id' => 1,
            'subcategory_name' => 'Respiratory'
          ]);
          DB::table('sub_category')->insert([
            'category_id' => 1,
            'subcategory_name' => 'Body'
          ]);
          DB::table('sub_category')->insert([
            'category_id' => 1,
            'subcategory_name' => 'Full'
          ]);
          DB::table('sub_category')->insert([
            'category_id' => 1,
            'subcategory_name' => 'Hand'
          ]);
          DB::table('sub_category')->insert([
            'category_id' => 1,
            'subcategory_name' => 'Safety Shoes'
          ]);
          DB::table('sub_category')->insert([
            'category_id' => 1,
            'subcategory_name' => 'Rescue'
          ]);
    }
}
