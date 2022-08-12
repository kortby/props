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
            "What date do you want to move in?",
            "What length of a lease are you seeking? 6 months, 12 months?",
            "Why are you moving?",
            "Are you able to complete a tenant credit check?",
            "Are you able to verify your income on the application with documentation?",
            "Are you able to provide 2-3 work references?",
            "Are you able to provide 2-3 landlord references?",
            "Do you require parking?",
            "Are you able to pay the security deposit (last month’s rent) and first month’s rent when you sign the lease? ",
            "Property maintenance inspections are completed x number of times per year to comply with my insurance requirements. Are you ok with this? ",
            "Are you aware that tenant insurance is a requirement?",
            "Do you have any questions or concerns?",
        ];

        $notes = [
            "f you ask people if they have pets, they’ll frequently say no. When you ask the number and specifics of the pets, you’re more likely to get an honest answer.  

            Although tenants may not have any pets of their own, they can still have multiple animals living with them; some tenants pet-sit for friends or relatives who are on vacation or want a break from their furry companions. Couples who have parted ways may also share custody of pets.  
            
            Checking tenant profiles on social media can be a good source for verifying whether your future tenant has pets, as people like to post pictures with their pets.",
            "The Minimum Housing and Health Standards has precise space requirements for the size of sleeping spaces for the number of adults per bedroom, and rules for areas where people sleep that are not considered bedrooms. Although tenants might be happy to have five people sleeping in a one-bedroom apartment, as a landlord, you need to be cautious that you are following the Minimum Housing and Health Standards.  ",
            "Does their answer match the date your unit is available? If so, great. If not, they are free to look for accommodations that fit their schedule. ",
            "Does their answer match with your desired tenancy term? If you’re looking for long-term tenants and the tenant only wants a three-month lease, it’s not a fit. ",
            "This is a telling question – and people frequently don’t hold back. I remember a call from a potential tenant who told me they had sued their previous three landlords. Their answer helps you evaluate whether they would be suitable tenants. ",
            "A credit check is critically important and should always be included. There are a variety of tenant verification services landlords can access, often at reduced rates. Tenant verification services offer complete credit reports you can access within minutes.  ",
            "A recent (30-day) pay stub. Fake pay stubs can be easily generated. Legitimate pay stubs have aligned digits and decimal points, consistent fonts, correct deductions, accurate and complete information (name, address, company, taxes, insurance deductions, and gross pay), and have a professional appearance. 
            A letter/document from a bank manager or accountant verifying funds if the tenant is not working.
            ",
            "People take their personality and ethics to work; a work reference can establish character patterns. On the application, ask for the supervisor’s first and last name and job title. Verify employment references for the supervisors listed on the application by running a Google search on the businesses. Call the number found on the internet rather than the one on the application, and Google the individual references names to cross-reference and validate employment history. ",
            "Landlord references verify whether tenants paid on time and kept the property in good repair. Previous landlords are more likely to provide honest references as opposed to a current landlord who may want to offload a problem tenant. If the tenant has listed a property management company, to verify, Google the property management business and call the number you found on the internet.  ",
            "It’s a good idea to check with the tenant to see if they have a vehicle/vehicles and how many so you know whether you can accommodate their needs. Tenants may require additional parking for quads, Skidoos, trailers, or recreational vehicles.  ",
            "Typically, full payment of the security deposit and the first month’s rent are required. However, some landlords allow tenants to pay installments with specified dates and amounts. If you do, ensure you have the agreement in writing. ",
            "Letting tenants know your goals for the property during their tenancy ensures they are aware you will deal with maintenance issues and maintain the property at a high standard. Confirm you provide 24 hours notice and never schedule inspections on their days of worship. ",
            "Tenant/renters insurance is a valuable tenant safeguard if the property becomes inhabitable due to a fire, flood, or other natural disasters. It also covers property losses, including loss due to theft, negligent destruction of the property, or liability for injuries. ",
            "This question ensures they know and are comfortable with your expectations. Clarifying their questions/concerns brings you that much closer to selecting the best tenants. 

            If tenants argue about your process, politely let them know that you don’t make exceptions; they’re not good candidates for your property; let them move on. ",
        ];

        for ($i = 0; $i < count($notes); $i++) {
            Question::factory()->create([
                'question' => $questions[$i],
                'note' => $notes[$i]
            ]);
        }
    }
}
