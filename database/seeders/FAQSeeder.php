<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('faq')->insert([
            'question' => 'How do I register?',
            'answer' => '
                <p>
                    To register, you need to go to the registration page and fill out the form.
                </p>
            ',
        ]);
        DB::table('faq')->insert([
            'question' => 'How do I log in?',
            'answer' => '
                <p>
                    To log in, you need to go to the login page and fill out the form.
                </p>
            ',
        ]);
    }
}
