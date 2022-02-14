<?php

namespace Database\Seeders;

use App\Models\EBook;
use Illuminate\Database\Seeder;

class EBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        EBook::create([
            'title'=>'Promp Cromp',
            'author'=>'Dr. Mac Hees',
            'description'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque ad corrupti aliquam consequuntur obcaecati vero?'
        ]);

        EBook::create([
            'title'=>'Pop Corn',
            'author'=>'Mr. Spagett',
            'description'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque ad corrupti aliquam consequuntur obcaecati vero?'
        ]);

        EBook::create([
            'title'=>'Omni Corn',
            'author'=>'Coo Vidd',
            'description'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque ad corrupti aliquam consequuntur obcaecati vero?'
        ]);
    }
}
