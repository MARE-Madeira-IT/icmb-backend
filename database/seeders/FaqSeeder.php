<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faq::create([
            'question' => 'What is the historical meeting attendance?',
            'answer' => 'Previous ICMB conferences have been attended by 150-250 conference participants.',
        ]);

        Faq::create([
            'question' => 'Is there funding available for student travel to the conference?',
            'answer' => 'Applications for student Travel Awards will be open during the call for abstracts (January 6–February 16, 2025). Both current and recently-graduated students are eligible to receive awards. All applicants will be notified of their decision, and we will be working with awardees to disburse their awards on a timeline that minimizes their financial burden of attendance. Awards will be formally presented at the conference.',
        ]);
        Faq::create([
            'question' => 'Is there funding available for early-career researchers to attend the conference?',
            'answer' => 'Applications for early-career researcher Travel Awards will be open during the call for abstracts (January 6–February 16, 2025). We are working with awardees to disburse their awards on a timeline that minimizes their financial burden of attendance. Awards will be formally presented at the conference.',
        ]);
        Faq::create([
            'question' => 'How does SSMB minimize the environmental impact of ICMB meetings?',
            'answer' => 'As scientists, resource managers, and policy makers, protecting the environment is important to us. Please see our environmental pledge for more information.',
        ]);
        Faq::create([
            'question' => 'May I bring a guest to the conference or other events?',
            'answer' => 'Caregiver badges are available for conference attendees who need a caregiver to accompany them. You can make this and other accommodation requests during registration. Children under the age of 5 are welcome at daily conference activities without an additional fee when with a parent/guardian. However, please let us know so that we can be aware of all who may be attending. Children older than 5 are required to be registered. Please contact the conference organizers to arrange attendance. Guests of any age are permitted during the welcome event, poster session, and field trips for a fee. Like all attendees, they are subject to the code of conduct. Daily conference attendance would require registration for any adult guests. If you wish to purchase an additional ticket for the evening events or field trips for an adult guest or child not attending the daily conference events, please contact the conference organizers.',
        ]);
        Faq::create([
            'question' => 'Is childcare provided at the meeting?',
            'answer' => 'Attendees hosted in VidaMar Resort Hotel have free childcare services. In other cases the hotel provides childcare paid service. Please contact the hotel for more information mentioning the conference attendance.',
        ]);
        Faq::create([
            'question' => 'What other considerations are made for parents?',
            'answer' => 'There is no designated lactation and breastfeeding room at the conference venue. However, please contact us as soon as possible if a room is needed and we will do our best to find a suitable solution.',
        ]);
        Faq::create([
            'question' => 'Is ICMB accessible for people with disabilities?',
            'answer' => 'Yes, please let us know during registration which accommodations are needed to make the meeting accessible to you. ICMB organizers will contact individuals directly to learn more about the specifics of what you need. We can provide free caregiver badges upon request. All conference spaces selected are accessible for people with disabilities. Priority seating for wheelchair users and people with disabilities affecting mobility, hearing, or vision will be available in all conference rooms. ICMB encourages anyone whose circumstances are not covered in this FAQ to contact us as soon as possible so that we can do our best to find appropriate solutions. In addition, our guides for presenters and session moderators emphasize steps participants should take to consider the potential needs of their audience and improve the accessibility of their presentations.',
        ]);
        Faq::create([
            'question' => 'Does ICMB support the use of chosen gender pronouns?',
            'answer' => 'Yes! You will have the opportunity to tell us your pronouns during registration and preferred pronouns will be included on conference badges, if desired.',
        ]);
        Faq::create([
            'question' => 'Does ICMB have a code of conduct?',
            'answer' => 'In 2020, the Society for the Study of Marine Bioinvasions adopted a Code of Conduct (available in English and in Spanish). The Code of Conduct must be agreed to upon registration for any SSMB event, and the Code of Conduct applies to everyone associated with the conference, including, but not limited to, local and virtual attendees, volunteers, staff, speakers, organizers, and, to the greatest extent possible, local vendors and service providers.',
        ]);
        Faq::create([
            'question' => 'How do I report a code of conduct violation?',
            'answer' => 'Please email the conference organizers. For more details on reporting and response, see the Code of Conduct text (available in English and in Spanish). All attendees will be given information at registration describing options for reporting incidents in person.',
        ]);
        Faq::create([
            'question' => 'Does ICMB have a social media policy?',
            'answer' => 'ICMB encourages courtesy in communications. When attendees check in at the conference registration desk, they will be given the option of signing a waiver to consent to having their image used for the purpose of promoting this conference on our website and social media accounts. For those who do not consent to have their image used, ICMB will make every effort to honor this. Attendees should be aware that some parts of this event may be open to the public and the news media. ICMB strongly encourages compliance with attendee requests regarding visual media, but does not guarantee it.',
        ]);
    }
}
