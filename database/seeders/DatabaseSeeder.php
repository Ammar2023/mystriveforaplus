<?php
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\TuitionPosting;


class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create sample users
        $user1 = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
        ]);

        $user2 = User::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'password' => bcrypt('password'),
        ]);

        // Create sample tuition postings
        $tuitionPosting1 = TuitionPosting::create([
            'subject' => 'Mathematics',
            'tuition_fee' => 50.00,
            'max_students' => 5,
            'tutor_id' => $user1->id,
        ]);

        $tuitionPosting2 = TuitionPosting::create([
            'subject' => 'English',
            'tuition_fee' => 40.00,
            'max_students' => 3,
            'tutor_id' => $user2->id,
        ]);

        // Additional seeding logic goes here
    }
}
