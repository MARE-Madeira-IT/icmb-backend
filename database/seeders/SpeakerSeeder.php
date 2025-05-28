<?php

namespace Database\Seeders;

use App\Models\Speaker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpeakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Speaker::create([
            'user_id' => 2,
            'name' => 'Lisa Drake',
            'country' => 'United States',
            'role' => 'Global Marine Development Manager',
            'institution' => 'Marine Field Services & Monitoring at SGS',
            'description' => 'Lisa and her colleagues on the global marine team develop new services and coordinate with 40 local affiliates to ensure that vessel owners, port operators, and coastal managers meet their compliance requirements (e.g., by sampling and analyzing ballast water) and decarbonization goals (e.g., by testing emissions of biofuels). She received a Bachelor of Science degree in Zoology from The Ohio State University and Master and PhD degrees in Oceanography from Old Dominion University. She has served as a Technical Advisor on various delegations to the IMO, as founder and Past President of the Society for the Study of Marine Bioinvasions, and as a member of the Women’s International Shipping and Trading Association (WISTA) International Environmental Committee and the Florida chapter.',
            'image' => 'speakers/lisa_drake.jpg',
            'secundary_image' => 'speakers/lisa_drake.png',
            'linkedin' => 'https://www.linkedin.com/in/lisa-drake-phd/',
        ]);

        Speaker::create([
            'user_id' => 3,
            'name' => 'Ross Cuthbert',
            'country' => 'Ireland',
            'role' => 'Lecturer in Environmental Change Biology ',
            'institution' => "Queen's University Belfast",
            'description' => "Dr. Ross Cuthbert's research quantifies and predicts the impacts of biological invasions on ecosystems, economies, and health to improve management strategies. He also develops approaches to better understand the spatial and temporal dynamics of invasions and their impacts. He previously held Fellowships funded by the Leverhulme Trust (Queen’s University Belfast) and Alexander von Humboldt Foundation (GEOMAR Helmholtz Centre for Ocean Research Kiel). He serves on the Editorial Boards of Marine Biology and NeoBiota.",
            'image' => 'speakers/ross_cuthbert.jpg',
            'secundary_image' => 'speakers/ross_cuthbert.png',
            'bluesky' => 'https://bsky.app/profile/rosscuthbert.bsky.social',
            'linkedin' => 'https://www.linkedin.com/in/ross-cuthbert-2a8b0b87/',
            'website' => 'https://www.researchgate.net/profile/Ross-Cuthbert',
        ]);

        Speaker::create([
            'user_id' => 4,
            'name' => 'Amy Freestone',
            'country' => 'United States',
            'role' => 'Principal Investigator',
            'institution' => 'Smithsonian Environmental Research Center',
            'description' => 'Amy’s research bridges community ecology and macroecology to disentangle the drivers that shape natural communities in a changing world. Using experimental field approaches in benthic marine systems, she examines the impact of species interactions on community assembly and ecosystem function, particularly resistance to invasion by non-native species, and how these processes influence patterns of community structure and diversity in space and time. One of her principal interests lies in understanding how these dynamics change across broad biogeographic gradients that define our biosphere, such as latitude. Therefore, her field studies span the subarctic to the tropics.',
            'image' => 'speakers/amy_freestone.jpg',
            'secundary_image' => 'speakers/amy_freestone.png',
            'facebook' => 'https://www.facebook.com/people/SERC-Marine-Invasions-Research-Laboratory/61568543737837/',
            'instagram' => 'www.instagram.com/sercinvasions/',
            'website' => 'https://serc.si.edu/staff/amy-freestone',
        ]);

        Speaker::create([
            'user_id' => 5,
            'name' => 'Ana Cristina Cardoso',
            'country' => 'Portugal',
            'role' => 'Researche Officer',
            'institution' => 'European Commission Joint Research Centre',
            'description' => 'Since 2012, Ana has coordinated the European Alien Species Information Network (EASIN), an initiative of the JRC, informing policy and management decisions to mitigate the impacts of non-indigenous species (NIS) on native ecosystems and human activities. Her work has been instrumental in shaping the technical requirements of the EU Marine Strategy Framework Directive and ensuring that the directive is implemented effectively to protect European marine ecosystems, focusing on pressure from NIS.',
            'image' => 'speakers/ana_cardoso.jpg',
            'secundary_image' => 'speakers/ana_cardoso.png',
            'facebook' => 'https://www.facebook.com/EUAliens',
            'x' => 'https://twitter.com/EU_Aliens',
            'website' => 'https://easin.jrc.ec.europa.eu/',
            'website2' => 'https://ec.europa.eu/jrc/en',
        ]);

        Speaker::create([
            'user_id' => 6,
            'name' => 'Taeko Kimura',
            'country' => 'Japan',
            'role' => 'Professor',
            'institution' => 'Mie University',
            'description' => 'Dr. Taeko Kimura specializes in marine ecology, with a focus on the ecology of benthic alien species. She has clarified the larval ecology and population dynamics of alien mussel, Xenostrobus securis. In addition, based on the results of genetic research on invasive alien mussel, Limnoperna fortunei, it was possible to estimate their native range and invasion routes. She had participated in a project on the intercontinental transfer of marine organisms due to ballast water and hull fouling on large cargo ships. Recently, she has been conducting ecological research on alien crabs and sea slugs in Nagoya Port, the largest trading port in Japan. Taeko is also the chairperson of the Nature Environment Conservation Committee of the Japanese Association of Benthology. The committee is involved in various activities related to the conservation of marine benthic organisms.',
            'image' => 'speakers/taeko_kimura.jpg',
            'secundary_image' => 'speakers/taeko_kimura.png',
            'website' => 'https://www.researchgate.net/profile/Taeko-Kimura',
        ]);

        Speaker::create([
            'user_id' => 7,
            'name' => 'Graeme Inglis',
            'country' => 'New Zealand',
            'role' => 'Chief Science Advisor',
            'institution' => 'NIWA',
            'description' => 'Dr Inglis is Chief Science Advisor at the National Institute of Water & Atmospheric Research (NIWA). He has published more than 200 peer-reviewed papers and technical reports across a range of disciplines, including invasive species management, environmental monitoring and assessment, marine tourism and ecology. Graeme led the design and implementation of New Zealand’s national series of port baseline surveys for introduced marine species and its programme of targeted surveillance for high-risk marine pests that has now run successfully for almost 25 years. He has led national and international research programmes on risk assessment, surveillance and control of invasive marine species and has provided technical training and advice on marine pests and their management in New Zealand, Australia, the Middle East, Southeast Asia, the Pacific, South America, and Europe. Graeme holds a Ph.D. in marine ecology from the University of Sydney, Australia, and a B.Sc. (Hons) in Zoology from the University of Canterbury, New Zealand.',
            'image' => 'speakers/graeme_inglis.jpg',
            'secundary_image' => 'speakers/graeme_inglis.png',
            'linkedin' => 'https://www.linkedin.com/in/graeme-inglis-62605525a',
            'website' => 'https://niwa.co.nz/people/graeme-inglis',
        ]);
    }
}
