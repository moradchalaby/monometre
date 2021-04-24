<?php


use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert(
            [
                [
                    'settings_description'=> 'Başlık',
                    'settings_key' => 'title',
                    'settings_value'=>'Laravel ECMS Learning',
                    'settings_type'=> 'text',
                    'settings_must'=>0,
                    'settings_delete'=> '0',
                    'settings_status'=> '1'
                ],
                [
                    'settings_description'=> 'Açıklama',
                    'settings_key'=>'description',
                    'settings_value'=>'Laravel ECMS Learning Description',
                    'settings_type'=> 'text',
                    'settings_must'=>1,
                    'settings_delete'=> '0',
                    'settings_status'=> '1'
                ],
                [
                    'settings_description'=> 'Logo',
                    'settings_key'=>'logo',
                    'settings_value'=> '608337958c03c.png',
                    'settings_type'=> 'file',
                    'settings_must'=>2,
                    'settings_delete'=> '0',
                    'settings_status'=> '1'
                ],
                [
                    'settings_description'=> 'Icon',
                    'settings_key'=>'icon',
                    'settings_value'=> '6082093d1729f.png',
                    'settings_type'=> 'file',
                    'settings_must'=>3,
                    'settings_delete'=> '0',
                    'settings_status'=> '1'
                ],
                [
                    'settings_description'=> 'Anahtar Kelimeler',
                    'settings_key'=>'keywords',
                    'settings_value'=>'laravel,ecms,murat çelebi',
                    'settings_type'=> 'text',
                    'settings_must'=>4,
                    'settings_delete'=> '0',
                    'settings_status'=> '1'
                ],
                [
                    'settings_description'=> 'Telefon Sabit',
                    'settings_key'=>'phone_sabit',
                    'settings_value'=>'0850 XXX XX XX',
                    'settings_type'=> 'text',
                    'settings_must'=>5,
                    'settings_delete'=> '0',
                    'settings_status'=> '1'
                ],
                [
                    'settings_description'=> 'Telefon GSM',
                    'settings_key'=>'phone_gsm',
                    'settings_value'=>'0850 XXX XX XX',
                    'settings_type'=> 'text',
                    'settings_must'=>6,
                    'settings_delete'=> '0',
                    'settings_status'=> '1'
                ],
                [
                    'settings_description'=> 'Mail',
                    'settings_key'=>'mail',
                    'settings_value'=>'moradchalaby@gmail.com',
                    'settings_type'=> 'text',
                    'settings_must'=>7,
                    'settings_delete'=> '0',
                    'settings_status'=> '1'
                ],
                [
                    'settings_description'=> 'İlçe',
                    'settings_key'=>'ilce',
                    'settings_value'=>'Sancaktepe',
                    'settings_type'=> 'text',
                    'settings_must'=>8,
                    'settings_delete'=> '0',
                    'settings_status'=> '1'
                ],
                [
                    'settings_description'=> 'İl',
                    'settings_key'=>'il',
                    'settings_value'=>'İstanbul',
                    'settings_type'=> 'text',
                    'settings_must'=>9,
                    'settings_delete'=> '0',
                    'settings_status'=> '1'
                ],
                [
                    'settings_description'=> 'Açık Adres',
                    'settings_key'=>'adres',
                    'settings_value'=>'Safa mahllesi, Tayyar sokak no:7',
                    'settings_type'=> 'textarea',
                    'settings_must'=>10,
                    'settings_delete'=> '0',
                    'settings_status'=> '1'
                ]

            ]
        );
    }
}
