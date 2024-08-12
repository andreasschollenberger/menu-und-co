<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $users = 
            [
                'first_name' => 'Menü und Co',
                'last_name' => 'Admin',
                'email' => 'andreasschollenberger@gmail.com',
                'password' => Hash::make('password1234'),
                'type' => 'admin',
            ];

        \App\Models\User::create($users);



        $dishes = [
            "Vorspeise",
            "Hauptgericht",
            "Dessert",
            "Suppe",
            "Salat",
            "Beilage",
            "Kinder-Menü",
            "Gebäck",
            "Drinks"
          ];

        foreach ($dishes as $dish) {
            \App\Models\Dishes::create([
                'name' => $dish
            ]);
        }

        $recipes_groups = [
            "Vegan",
            "Vegetarisch",
            "Fleisch",
            "K.A."
          ];

        foreach ($recipes_groups as $recipes_group) {
            \App\Models\RecipesGroups::create([
                'name' => $recipes_group
            ]);
        }

        $countries = ['k.A.', 'Schweiz', 'Deutschland', 'Östereich', 'Afghanistan', 'Ägypten', 
        'Åland', 'Albanien', '	Algerien', 'Amerikanische Jungferninseln', 'Amerikanisch-Samoa', 'Andorra', 'Angola', 
        'Anguilla', 'Antarktika', 'Antigua und Barbuda', 'Äquatorialguinea', 'Argentinien', 'Armenien', 
        'Aruba', 'Aserbaidschan', 'Äthiopien', 'Australien', 'Bahamas', 'Bahrain', 
        'Bangladesch', 'Barbados', 'Bassas da India', 'Belarus', 'Belgien', 
        'Belize', 'Benin', 'Bermuda', 'Bhutan', 'Bolivien', 'Bosnien und Herzegowina', 
        'Botsuana', 'Bouvetinsel', 'Brasilien', 'Britische Jungferninseln', 'Britisches Territorium im Indischen Ozean', 'Brunei Darussalam', 
        'Bulgarien', 'Burkina Faso', 'Burundi', 'Cabo Verde', '	Chile', 'China', 'Clipperton', 'Cookinseln', 'Costa Rica', 'Côte d Ivoire',
        'Dänemark', 'Dominica', 'Dominikanische Republik', 'Dschibuti', 'Ecuador',
        'El Salvador', 'Eritrea', 'Estland', 'Eswatini', 'Falklandinseln', 'Färöer', 'Fidschi', 'Finnland', 'Frankreich', 'Französisch-Guayana', 'Französisch-Polynesien', 'Gabun',
        'Gambia', 'Gazastreifen', 'Georgien', 'Ghana', 'Gibraltar', 'Glorieuses', 'Grenada', 'Griechenland',
        'Grönland', 'Großbritannien', 'Guadeloupe', 'Guam', 'Guatemala', 'Guernsey', 'Guinea', 'Guinea-Bissau', 'Guyana',
        'Haiti', 'Heard und McDonaldinseln', 'Honduras', 'Hongkong', 'Indien', 'Indonesien', 'Insel Man', 'Irak', 'Iran', 'Irland', 'Island', 'Israel', 'Italien', 'Jamaika', 'Japan', 'Jemen', 'Jersey',
        'Jordanien', 'Juan de Nova', 'Kaimaninseln', 'Kambodscha', 'Kamerun', 'Kanada', 'Kasachstan', 'Katar', 'Kenia', 'Kirgisistan', 'Kiribati', 'Kokosinseln (Keelinginseln)', 'Kolumbien', 'Komoren', 'Kongo', 'Korea, Demokratische Volksrepublik', 'Korea, Republik', 
        'Kosovo', 'Kroatien', 'Kuba', 'Kuwait', 'Laos', 'Lesotho', 'Lettland', 'Libanon', '	Liberia', 'Libyen', 'Liechtenstein', 'Litauen', 'Luxemburg', 'Macau', 'Madagaskar', 'Malawi', 'Malaysia',
        'Malediven', 'Mali', 'Malta', 'Marokko', 'Marshallinseln', 'Martinique', 'Mauretanien', 'Mauritius', 'Mayotte', 'Mexiko', 'Mikronesien', 'Moldau', 'Monaco', 'Mongolei', 'Montenegro', 'Montserrat', 'Mosambik',
        'Myanmar', 'Namibia', '	Nauru', 'Nepal', 'Neukaledonien', 'Neuseeland', 'Nicaragua', 'Niederlande', 'Niger', 'Nigeria', 'Niue', 'Nördliche Marianen', 'Nordmazedonien', 'Norfolkinsel', 'Norwegen', 'Oman', 'Pakistan',
        'Palau', 'Panama', 'Papua-Neuguinea', 'Paraguay', 'Peru', '	Philippinen', 'Pitcairninseln', 'Polen', 'Portugal', 'Puerto Rico', 'Réunion', 'Ruanda', 'Rumänien', 'Russische Föderation', 'Saint-Martin', 'Salomonen', 'Sambia',
        'Samoa', 'San Marino', 'São Tomé und Príncipe', 'Saudi-Arabien', 'Schweden', 'Senegal', 'Serbien', 'Serbien und Montenegro', 'Seychellen', 'Sierra Leone', 'Simbabwe', 'Singapur', 'Slowakei', 'Slowenien', 'Somalia', 'Spanien', 'Spitzbergen',
        'Sri Lanka', 'St. Barthélemy', 'St. Helena, Ascension und Tristan da Cunha', 'St. Kitts und Nevis', 'St. Lucia', 'St. Pierre und Miquelon', 'St. Vincent und die Grenadinen', 'Südafrika', 'Sudan', 'Südgeorgien', 'Südsudan', 'Suriname', 'Syrien', 'Tadschikistan', 'Taiwan', 'Tansania', 'Thailand',
        'Timor-Leste', 'Togo', 'Tokelau', 'Tonga', 'Trinidad und Tobago', 'Tromelin', 'Tschad', 'Tschechische Republik', 'Tunesien', 'Türkei', 'Turkmenistan', 'Turks- und Caicosinseln', 'Tuvalu', 'Uganda', 'Ukraine', 'Ungarn', 'Uruguay',
        'Usbekistan', 'Vanuatu', 'Vatikanstadt', 'Venezuela', 'Vereinigte Arabische Emirate', 'USA', 'Vietnam', 'Wallis und Futuna', 'Weihnachtsinsel', 'Westjordanland', 'Westsahara', 'Zentralafrikanische Republik', 'Zypern'];
       
        foreach ($countries as $country) {
            \App\Models\Countries::create([
                'name' => $country
            ]);
        }

        $allergies = [
            "Glutenhaltige Getreide",
            "Milch (einschließlich Laktose)",
            "Eier",
            "Sojabohnen",
            "Erdnuss",
            "Hartschalenobst (Nüsse)",
            "Fisch",
            "Krebstiere",
            "Sellerie",
            "Senf",
            "Sesam-Samen",
            "Schwefeldioxid (Trocken Obst, Obstsäfte, Marmeladen...)",
            "Sulfate (Äpfel, Reis, Zwiebeln, Kohl, sowie Wein)",
            "Lupine (Mehl, Nudeln, Kaffee-, Milch- und Fleischersatz)",
            "Weichtiere (Schnecken, Muscheln, Tintenfische...)",
            "Hausgrillenpulver (Kekse, Saucen, Pizzas...)"
          ];

            foreach ($allergies as $allergy) {
                \App\Models\Allergy::create([
                    'name' => $allergy
                ]);
            }

        $vitamins = [
            "Vitamin A: Leber, Milchprodukte, Eigelb, buntes Gemüse wie z.B. Karotten, Spinat",
            "Vitamin D: Fisch, Milch, Eier, Avocado, Butter, Champignons",
            "Vitamin E: Pflanzenöle und -fette, Nüsse, Vollkorngetreide",
            "Vitamin K: Grünes Gemüse, Kohl, Salat, Kresse, Hähnchenfleisch",
            "Vitamin B1: Kartoffeln, Fleisch, Hülsenfrüchte, Weizenkeime",
            "Vitamin B2: Milchprodukte, Vollkorngetreide, Fleisch, Fisch, dunkles Blattgemüse",
            "Vitamin B3: Bierhefe, Fisch, Geflügel, Eier, Erdnüsse, Erbsen",
            "Vitamin B5: Leber, Vollkorngetreide, Kohl, Fleisch, Nüsse",
            "Vitamin B6: Bananen, Nüsse, Vollkorngetreide, Leber, Kartoffeln",
            "Vitamin B7: Eigelb, Haferflocken, Sojabohnen, Naturreis, Erdnüsse",
            "Vitamin B9: Grünes Blattgemüse, Leber, Weizenkeime, Fisch, Fleisch",
            "Vitamin B12: Eigelb, Fisch, Leber, Milchprodukte",
            "Vitamin C: Zitrusfrüchte, Paprika, Tomaten, Hagebutte, Sanddorn"
          ];

          foreach ($vitamins as $vitamin) {
            \App\Models\Vitamin::create([
                'name' => $vitamin
            ]);
        
        }
    }

}