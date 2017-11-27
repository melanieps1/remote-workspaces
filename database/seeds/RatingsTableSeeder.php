<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
      DB::table('ratings')->insert([
        'user_id' => '1',
        'workspace_id' => '8',
        'review' => 'Cupcake ipsum dolor sit amet cake candy canes soufflé tiramisu. Dragée lollipop tiramisu sesame snaps gummies. Jelly-o cheesecake gingerbread brownie marzipan brownie apple pie bear claw croissant. Lemon drops sugar plum jelly sugar plum brownie dragée cake. Bear claw cake apple pie sesame snaps wafer lemon drops sesame snaps. Danish brownie brownie caramels. Sweet brownie tart dragée gummi bears toffee gingerbread pastry. Ice cream tiramisu halvah jelly-o wafer. Sugar plum candy canes gingerbread ice cream carrot cake. Powder danish gingerbread danish cake sugar plum marzipan.',
        'wifi_rating' => '8',
        'location_rating' => '7',
        'noise_rating' => '10',
        'outlets_rating' => '1',
        'seating_rating' => '6',
        'hours_rating' => '9',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

      DB::table('ratings')->insert([
        'user_id' => '2',
        'workspace_id' => '7',
        'review' => 'Donut cookie fruitcake cake sesame snaps. Chocolate bar oat cake oat cake marshmallow topping dragée ice cream. Lollipop marzipan cake. Cookie danish soufflé chocolate cake halvah bear claw pie. Dessert dessert danish macaroon. Cookie liquorice gingerbread cake muffin apple pie oat cake.',
        'wifi_rating' => '3',
        'location_rating' => '7',
        'noise_rating' => '9',
        'outlets_rating' => '2',
        'seating_rating' => '7',
        'hours_rating' => '4',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

      DB::table('ratings')->insert([
        'user_id' => '3',
        'workspace_id' => '6',
        'review' => 'In sagittizzle leo nizzle nisi. Pellentesque ghetto, yippiyo nizzle malesuada dang, sizzle nulla aliquizzle sem, nizzle uhuh ... yih! nulla felis a im in the shizzle. Suspendisse shiznit scelerisque augue. Sizzle sheezy mah nizzle gangster libero. Proin dizzle shizzlin dizzle sapizzle. Daahng dawg aliquizzle, diam sizzle fo shizzle accumsizzle gizzle, phat sem ultricizzle sizzle, crazy mammasay mammasa mamma oo sa erizzle nisi sizzle boofron purus. Maecenas hendrerizzle tortor vel enizzle. Phasellizzle sizzle. Nulla funky fresh black, shizznit nizzle, bizzle go to hizzle amet, pulvinizzle egestizzle, mammasay mammasa mamma oo sa. Crazy convallizzle. Own yo ante yo primizzle shiz sheezy orci luctus izzle dope the bizzle cubilia Curae; Yo fo elizzle shiznit enizzle ass condimentum. Go to hizzle est tortor, vulputate vel, sempizzle check out this, commodo shut the shizzle up, nisi. Etiam feugiat, tortor egizzle vehicula luctizzle, boom shackalack owned ultrices lorizzle, izzle viverra sizzle urna vitae erizzle.',
        'wifi_rating' => '10',
        'location_rating' => '7',
        'noise_rating' => '8',
        'outlets_rating' => '3',
        'seating_rating' => '5',
        'hours_rating' => '8',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

      DB::table('ratings')->insert([
        'user_id' => '4',
        'workspace_id' => '5',
        'review' => 'Veggies es bonus vobis, proinde vos postulo essum magis kohlrabi welsh onion daikon amaranth tatsoi tomatillo melon azuki bean garlic.
            Gumbo beet greens corn soko endive gumbo gourd. Parsley shallot courgette tatsoi pea sprouts fava bean collard greens dandelion okra wakame tomato. Dandelion cucumber earthnut pea peanut soko zucchini.',
        'wifi_rating' => '4',
        'location_rating' => '7',
        'noise_rating' => '7',
        'outlets_rating' => '4',
        'seating_rating' => '7',
        'hours_rating' => '6',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

      DB::table('ratings')->insert([
        'user_id' => '1',
        'workspace_id' => '4',
        'review' => 'I love cheese, especially gouda jarlsberg. Cheese triangles babybel cheesy feet gouda manchego lancashire cheesy grin taleggio. Halloumi bocconcini blue castello taleggio smelly cheese blue castello halloumi stilton. Rubber cheese when the cheese comes out everybodys happy cut the cheese gouda cheesy feet red leicester cut the cheese cheese slices. Who moved my cheese gouda melted cheese macaroni cheese jarlsberg chalk and cheese fromage pepper jack. Stilton squirty cheese fondue swiss.
            Edam roquefort feta. Feta halloumi camembert de normandie swiss cut the cheese airedale emmental cauliflower cheese. Fromage frais queso say cheese melted cheese say cheese cheese strings who moved my cheese cheese strings. Boursin red leicester say cheese blue castello taleggio jarlsberg cottage cheese manchego. Lancashire feta fondue camembert de normandie goat cut the cheese gouda mozzarella. Edam brie blue castello boursin babybel st. agur blue cheese when the cheese comes out everybody is happy cheese and biscuits. Fromage.',
        'wifi_rating' => '9',
        'location_rating' => '7',
        'noise_rating' => '6',
        'outlets_rating' => '5',
        'seating_rating' => '9',
        'hours_rating' => '2',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

      DB::table('ratings')->insert([
        'user_id' => '1',
        'workspace_id' => '3',
        'review' => 'Cupcake ipsum dolor sit amet cake candy canes soufflé tiramisu. Dragée lollipop tiramisu sesame snaps gummies. Jelly-o cheesecake gingerbread brownie marzipan brownie apple pie bear claw croissant. Lemon drops sugar plum jelly sugar plum brownie dragée cake. Bear claw cake apple pie sesame snaps wafer lemon drops sesame snaps. Danish brownie brownie caramels. Sweet brownie tart dragée gummi bears toffee gingerbread pastry. Ice cream tiramisu halvah jelly-o wafer. Sugar plum candy canes gingerbread ice cream carrot cake. Powder danish gingerbread danish cake sugar plum marzipan.',
        'wifi_rating' => '8',
        'location_rating' => '7',
        'noise_rating' => '10',
        'outlets_rating' => '1',
        'seating_rating' => '6',
        'hours_rating' => '9',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

      DB::table('ratings')->insert([
        'user_id' => '2',
        'workspace_id' => '2',
        'review' => 'Donut cookie fruitcake cake sesame snaps. Chocolate bar oat cake oat cake marshmallow topping dragée ice cream. Lollipop marzipan cake. Cookie danish soufflé chocolate cake halvah bear claw pie. Dessert dessert danish macaroon. Cookie liquorice gingerbread cake muffin apple pie oat cake.',
        'wifi_rating' => '3',
        'location_rating' => '7',
        'noise_rating' => '9',
        'outlets_rating' => '2',
        'seating_rating' => '7',
        'hours_rating' => '4',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

      DB::table('ratings')->insert([
        'user_id' => '3',
        'workspace_id' => '1',
        'review' => 'In sagittizzle leo nizzle nisi. Pellentesque ghetto, yippiyo nizzle malesuada dang, sizzle nulla aliquizzle sem, nizzle uhuh ... yih! nulla felis a im in the shizzle. Suspendisse shiznit scelerisque augue. Sizzle sheezy mah nizzle gangster libero. Proin dizzle shizzlin dizzle sapizzle. Daahng dawg aliquizzle, diam sizzle fo shizzle accumsizzle gizzle, phat sem ultricizzle sizzle, crazy mammasay mammasa mamma oo sa erizzle nisi sizzle boofron purus. Maecenas hendrerizzle tortor vel enizzle. Phasellizzle sizzle. Nulla funky fresh black, shizznit nizzle, bizzle go to hizzle amet, pulvinizzle egestizzle, mammasay mammasa mamma oo sa. Crazy convallizzle. Own yo ante yo primizzle shiz sheezy orci luctus izzle dope the bizzle cubilia Curae; Yo fo elizzle shiznit enizzle ass condimentum. Go to hizzle est tortor, vulputate vel, sempizzle check out this, commodo shut the shizzle up, nisi. Etiam feugiat, tortor egizzle vehicula luctizzle, boom shackalack owned ultrices lorizzle, izzle viverra sizzle urna vitae erizzle.',
        'wifi_rating' => '10',
        'location_rating' => '7',
        'noise_rating' => '8',
        'outlets_rating' => '3',
        'seating_rating' => '5',
        'hours_rating' => '8',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

      DB::table('ratings')->insert([
        'user_id' => '1',
        'workspace_id' => '1',
        'review' => 'I love cheese, especially gouda jarlsberg. Cheese triangles babybel cheesy feet gouda manchego lancashire cheesy grin taleggio. Halloumi bocconcini blue castello taleggio smelly cheese blue castello halloumi stilton. Rubber cheese when the cheese comes out everybodys happy cut the cheese gouda cheesy feet red leicester cut the cheese cheese slices. Who moved my cheese gouda melted cheese macaroni cheese jarlsberg chalk and cheese fromage pepper jack. Stilton squirty cheese fondue swiss.
            Edam roquefort feta. Feta halloumi camembert de normandie swiss cut the cheese airedale emmental cauliflower cheese. Fromage frais queso say cheese melted cheese say cheese cheese strings who moved my cheese cheese strings. Boursin red leicester say cheese blue castello taleggio jarlsberg cottage cheese manchego. Lancashire feta fondue camembert de normandie goat cut the cheese gouda mozzarella. Edam brie blue castello boursin babybel st. agur blue cheese when the cheese comes out everybody is happy cheese and biscuits. Fromage.',
        'wifi_rating' => '9',
        'location_rating' => '7',
        'noise_rating' => '6',
        'outlets_rating' => '5',
        'seating_rating' => '9',
        'hours_rating' => '2',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

    }
}
