<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for( $i = 0; $i <= 100; $i++ )
        {
            $faker = Faker::create();
            $student = new Student;
            $student->name = $faker->name;
            $student->email = $faker->email;
            $student->state = $faker->state;
            $student->phone = $faker->phoneNumber;
            $student->save();

        }

    }
}
