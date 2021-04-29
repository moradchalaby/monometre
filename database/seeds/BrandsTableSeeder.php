<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lorem = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec pellentesque rutrum elit nec euismod. Nunc auctor, turpis vitae bibendum pharetra, odio risus accumsan nisi, et mollis leo ex at nisl. Suspendisse vitae euismod nibh. Curabitur sit amet felis est. In nunc arcu, fringilla at lectus varius, fermentum tempus enim. Cras faucibus molestie purus, placerat faucibus mauris rhoncus vitae. Morbi ut blandit turpis. Integer urna elit, malesuada ac lacinia ut, finibus finibus ligula. Quisque vitae dapibus libero, ac aliquam nulla. Suspendisse pellentesque ligula eu ultricies varius. Quisque euismod ullamcorper elementum. Sed ut rutrum purus. Morbi id dui at odio imperdiet semper at in dolor.

Sed tempor, nibh nec pharetra cursus, nibh ex hendrerit metus, vitae laoreet ante justo quis nibh. Aenean faucibus quam ut orci lobortis rutrum. Pellentesque tempor diam nibh, vitae imperdiet arcu luctus vitae. Nulla quam purus, viverra id egestas eu, sagittis et lacus. Aenean dignissim vel diam non cursus. Proin sit amet dolor nulla. Vivamus rutrum tortor fringilla lacus ornare, ut mollis neque lacinia. Nulla facilisi. Aliquam luctus purus ac felis tincidunt placerat. Suspendisse commodo augue urna, non fringilla erat volutpat ac.

Integer eu justo erat. Suspendisse mauris urna, ultrices sit amet nisl ac, suscipit venenatis magna. Donec at arcu id diam pretium mollis in et sapien. Fusce mauris purus, facilisis eu turpis nec, sodales laoreet velit. Donec at eros eros. Nullam eget tincidunt enim. Proin dignissim eget ex sit amet faucibus. Curabitur tempus, lacus eu pellentesque condimentum, lacus ex convallis risus, nec congue eros mi vel justo. Suspendisse eget nisl vitae massa feugiat elementum non eu odio.

Vivamus a sapien ac erat euismod vehicula ac vel dolor. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi vestibulum augue nisl. Aliquam at ex porta arcu varius eleifend. Maecenas lobortis dolor augue, vitae interdum odio vehicula sed. Etiam mattis augue eget nulla dictum accumsan. Quisque a accumsan quam. Mauris tristique tempor nisl sed iaculis. Etiam hendrerit eleifend diam vel ullamcorper. Quisque eget blandit lectus, vitae pellentesque sapien. Nam egestas dolor odio, id ullamcorper magna elementum in. Donec dictum mauris ac est cursus pellentesque. Proin aliquet sed ligula vel condimentum. Phasellus posuere quam quis vehicula suscipit. Donec quis ornare tortor. Mauris eu dignissim est, at malesuada diam.

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed egestas metus et massa sollicitudin, nec porta quam pretium. Phasellus at turpis mi. Etiam mi risus, pharetra vitae enim eu, luctus fringilla tortor. Etiam consequat dolor quis erat interdum faucibus. Ut ullamcorper eleifend enim pulvinar fringilla. Pellentesque interdum ullamcorper risus, egestas pulvinar odio sagittis eget. In dignissim neque vel velit posuere consequat. Fusce vehicula risus magna, ac tempus tellus fringilla a. Phasellus sollicitudin sit amet justo euismod faucibus. Cras id gravida orci. Nam finibus non sem eget pharetra. Donec auctor felis sit amet volutpat aliquet. Fusce porta, enim id congue tincidunt, augue odio posuere ipsum, eget lobortis lorem lectus a sapien. Vestibulum lobortis velit id sapien gravida, vitae gravida sapien elementum.';


        DB::table('brands')->insert(
            [
                [
                    'brand_title' => 'BAYMAK KOMBİ',
                    'brand_slug' => 'baymak-kombi',
                    'brand_file' => '60859262d4a25.png',
                    'brand_must' => 1,
                    'brand_category' => 1,
                    'brand_content' => $lorem,
                    'brand_status' => '1'
                ],
                [
                    'brand_title' => 'Brand Title 02',
                    'brand_slug' => 'brand-title-02',
                    'brand_file' => '608596c24e2e1.jpg',
                    'brand_must' => 2,
                    'brand_category' => 2,
                    'brand_content' => $lorem,
                    'brand_status' => '1'
                ],
                [
                    'brand_title' => 'Brand Title 03',
                    'brand_slug' => 'brand-title-03',
                    'brand_file' => '608596ce13265.png',
                    'brand_must' => 3,
                    'brand_category' => 3,
                    'brand_content' => $lorem,
                    'brand_status' => '1'
                ],
                [
                    'brand_title' => 'GFS FLEX SYSTEM',
                    'brand_slug' => 'gfs-flexy-system',
                    'brand_file' => '6085e8de703d7.png',
                    'brand_must' => 2,
                    'brand_category' => 2,
                    'brand_content' => $lorem,
                    'brand_status' => '1'
                ],
                [
                    'brand_title' => 'VIESSMAN KOMBİ',
                    'brand_slug' => 'viessman-kombi',
                    'brand_file' => '6085970647151.png',
                    'brand_must' => 3,
                    'brand_category' => 3,
                    'brand_content' => $lorem,
                    'brand_status' => '1'
                ],
                [
                    'brand_title' => 'Brand Title 04',
                    'brand_slug' => 'brand-title-04',
                    'brand_file' => '6085969f35628.png',
                    'brand_must' => 4,
                    'brand_category' => 4,
                    'brand_content' => $lorem,
                    'brand_status' => '1'
                ],
                [
                    'brand_title' => 'Brand Title 05',
                    'brand_slug' => 'brand-title-05',
                    'brand_file' => '6085973e37e78.png',
                    'brand_must' => 5,
                    'brand_category' => 5,
                    'brand_content' => $lorem,
                    'brand_status' => '1'
                ],
                [
                    'brand_title' => 'Brand Title 06',
                    'brand_slug' => 'brand-title-06',
                    'brand_file' => '60859712bc476.jpg',
                    'brand_must' => 6,
                    'brand_category' => 6,
                    'brand_content' => $lorem,
                    'brand_status' => '1'
                ]

            ]
        );
    }
}
