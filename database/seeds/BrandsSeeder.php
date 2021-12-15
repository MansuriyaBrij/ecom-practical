<?php

use Illuminate\Database\Seeder;
use App\Brands;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $count = 10;
        factory(Brands::class, $count)->create();
    }
}
