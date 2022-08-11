<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            "How many pets do you have? What breed, weight, age?",
            "Is this a rental unit for you? How many occupants will move in with you? If it’s for someone else, how many occupants will be occupying the unit?",
            // "What date do you want to move in?",
            // "What length of a lease are you seeking? 6 months, 12 months?",
            // "Why are you moving?",
            // "Are you able to complete a tenant credit check?",
            // "Are you able to verify your income on the application with documentation?",
            // "Are you able to provide 2-3 work references?",
            // "Are you able to provide 2-3 landlord references?",
            // "Do you require parking?",
            // "Are you able to pay the security deposit (last month’s rent) and first month’s rent when you sign the lease? ",
            // "Property maintenance inspections are completed x number of times per year to comply with my insurance requirements. Are you ok with this? ",
            // "Are you aware that tenant insurance is a requirement?",
            // "Do you have any questions or concerns?",
        ];

        foreach ($questions as $question) {
            Question::factory()->create([
                'question' => $question
            ]);
        }
    }
}
