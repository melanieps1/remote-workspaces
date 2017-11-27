<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class WorkspacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
      DB::table('workspaces')->insert([
        'name' => 'Awesome Inc',
        'category_id' => '2',
        'submitted_by_id' => '1',
        'description' => 'Awesome Inc exists to create and grow high tech startups.  We do this by hosting community events, leading technology education courses and offering a shared workspace environment.',
        'website' => 'https://www.awesomeinc.org/',
        'address' => '348 E Main St, Lexington, KY 40507',
        'latitude' => '38.042160',
        'longitude' => '-84.492538',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

      DB::table('workspaces')->insert([
        'name' => 'West Sixth Brewing',
        'category_id' => '7',
        'submitted_by_id' => '2',
        'description' => 'Craft brewery with free Saturday tours plus a taproom & beer garden with rotating microbrews on tap.',
        'website' => 'https://www.westsixth.com/',
        'address' => '501 W 6th St #100, Lexington, KY 40508',
        'latitude' => '38.059781',
        'longitude' => '-84.491893',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

      DB::table('workspaces')->insert([
        'name' => 'William T Young Library',
        'category_id' => '4',
        'submitted_by_id' => '3',
        'description' => 'The William T. Young Library, located on the campus of the University of Kentucky in Lexington, is named for William T. Young, a prominent local businessman.',
        'website' => '',
        'address' => '401 Hilltop Ave, Lexington, KY 40506',
        'latitude' => '38.032872',
        'longitude' => '-84.501718',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

      DB::table('workspaces')->insert([
        'name' => 'Pearl St Mall',
        'category_id' => '8',
        'submitted_by_id' => '4',
        'description' => 'Outdoor pedestrian mall with shops, restaurants and ample bench seating.  With outstanding shopping, lodging, restaurants, services and entertainment & events, not to mention the best people watching in the state, Downtown Boulder offers authentic experiences for everyone.',
        'website' => 'www.boulderdowntown.com',
        'address' => 'Pearl St, Boulder, CO 80302',
        'latitude' => '40.018439',
        'longitude' => '-105.277361',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

      DB::table('workspaces')->insert([
        'name' => 'The Cup',
        'category_id' => '1',
        'submitted_by_id' => '1',
        'description' => 'Serving fair-trade organic coffee, breakfast bagels, and sandwiches, homemade cookies and other delicious treats. Drop by and enjoy the free wireless internet, the quiet meeting room and the sophisticated atmosphere.',
        'website' => 'https://www.boulderdowntown.com/go/the-cup-espresso-cafe',
        'address' => '1521 Pearl St, Boulder, CO 80302',
        'latitude' => '40.019125',
        'longitude' => '-105.275422',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

      DB::table('workspaces')->insert([
        'name' => 'Boulder Public Library',
        'category_id' => '4',
        'submitted_by_id' => '2',
        'description' => 'The main branch of public libraries in Boulder, CO.',
        'website' => 'www.boulderlibrary.org',
        'address' => '1001 Arapahoe Ave, Boulder, CO 80302',
        'latitude' => '40.013900',
        'longitude' => '-105.281747',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

      DB::table('workspaces')->insert([
        'name' => 'Union Station',
        'category_id' => '8',
        'submitted_by_id' => '3',
        'description' => 'Trendy public transportation hub in downtown Denver.',
        'website' => 'https://unionstationindenver.com/',
        'address' => '1701 WYNKOOP, DENVER, CO 80202',
        'latitude' => '39.753122',
        'longitude' => '-105.000145',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

      DB::table('workspaces')->insert([
        'name' => 'Casa Zen Guesthouse & Yoga Center',
        'category_id' => '9',
        'submitted_by_id' => '4',
        'description' => 'Since 2004, Casa Zen Guest House & Yoga Center has been a home away from home for thousands of guests from all over the world. Located at the southern tip of the Nicoya Peninsula in the tropical paradise of Costa Rica (recently voted the Happiest Place on Earth!), we are only 50 meters from the warm waters and beautiful white sand beaches of Mal País and Santa Teresa, and close to many fantastic restaurants, supermarkets and shops in town.
					Our friendly boutique hostel is surrounded by a lush garden, ideally situated between the two main surf breaks of Playa Carmen and Santa Teresa. Whether you are a beginner surfer or a seasoned pro, you are sure to find your perfect wave. Enjoy the breathtaking sunsets from the pristine beach just a few minutes walk from your room, or spend the afternoon beneath the shade of a palm tree while the waves crash in front of you. The ocean is always just a few steps away, and when it’s time to take a break from the sunshine, drift off in one of our cozy hammocks or have a cold drink in our rancho.',
        'website' => 'http://zencostarica.com/',
        'address' => 'Casa Zen Beach Access Rd, Puntarenas Province, Costa Rica',
        'latitude' => '9.634975',
        'longitude' => '-85.160209',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

    }
}
