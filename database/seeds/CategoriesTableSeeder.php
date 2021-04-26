<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('categories')->insert(
            [
                [
                    'category_title' => 'KOMBİ',
                    'category_slug' => 'kombi',
                    'category_must' => 1,
                    'category_status' => '1'
                ],
                [
                    'category_title' => 'BORU',
                    'category_slug' => 'boru',
                    'category_must' => 1,
                    'category_status' => '1'
                ],
                [
                    'category_title' => 'VANA',
                    'category_slug' => 'vana',
                    'category_must' => 1,
                    'category_status' => '1'
                ],
                [
                    'category_title' => 'ÖLÇÜM CİHAZLARI',
                    'category_slug' => 'olcum-cihazlari',
                    'category_must' => 1,
                    'category_status' => '1'
                ],
                [
                    'category_title' => 'KUMANDA',
                    'category_slug' => 'kumanda',
                    'category_must' => 1,
                    'category_status' => '1'
                ],
                [
                    'category_title' => 'KATEGORİ 1',
                    'category_slug' => 'kategori-1',
                    'category_must' => 1,
                    'category_status' => '1'
                ],
                [
                    'category_title' => 'KATEGORİ 2',
                    'category_slug' => 'kategori-2',
                    'category_must' => 1,
                    'category_status' => '1'
                ],
                [
                    'category_title' => 'KATEGORİ 3',
                    'category_slug' => 'kategori-3',
                    'category_must' => 1,
                    'category_status' => '1'
                ]

            ]
        );
    }
}
