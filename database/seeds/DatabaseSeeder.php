<?php

use Illuminate\Database\Seeder;
use App\User;
use App\School;
use App\Student;
use Faker\Generator as Faker;

class DatabaseSeeder extends Seeder
{
    public function __construct(Faker $faker) {
        $this->faker = $faker;
    }

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Example User',
            'email' => $this->faker->email,
            'password' => bcrypt('test'),
        ]);

        factory(School::class, 10)
            ->create()
            ->each(function($school) use($user) {
                $school->users()->attach($user);

                factory(Student::class, 10000)->create([
                    'school_id' => $school->id
                ]);
            });
    }
}
