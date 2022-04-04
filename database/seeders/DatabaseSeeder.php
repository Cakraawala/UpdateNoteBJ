<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        DB::table('update')->insert([
            'title' => 'update windows 8 pro max',
            'version' => '8.696969'
        ]);
        DB::table('update')->insert([
            'title' => 'uasda',
            'version' => '6969'
        ]);
        // DB::table('update')->insert([
        //     'title' => 'asdasdasd',
        //     'version' => 'asdasd'
        // ]);

        DB::table('features')->insert([
            'feature' => 'anticheat',
            'note_id' => '1'
        ]);

        DB::table('features')->insert([
            'feature' => 'antibanned',
            'note_id' => '1'
        ]);
        DB::table('features')->insert([
            'feature' => 'lol',
            'note_id' => '1'
        ]);

        DB::table('features')->insert([
            'feature' => 'laugh out load',
            'note_id' => '1'
        ]);
        DB::table('features')->insert([
            'feature' => 'lalala',
            'note_id' => '2'
        ]);
        DB::table('features')->insert([
            'feature' => 'lololo',
            'note_id' => '2'
        ]);

        DB::table('features')->insert([
            'feature' => 'lslsls',
            'note_id' => '2'
        ]);
    }
}
