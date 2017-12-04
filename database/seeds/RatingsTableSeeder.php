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
        'review' => 'See there how easy that is. We wash our brush with odorless thinner. Think about a cloud. Just float around and be there.

        Every time you practice, you learn more. Only eight colors that you need. Learn when to stop. In life you need colors. If you did not have baby clouds, you would not have big clouds.

        As trees get older they lose their chlorophyll. Every single thing in the world has its own personality - and it is up to you to make friends with the little rascals.',
        'wifi_rating' => '8',
        'location_rating' => '7',
        'noise_rating' => '10',
        'outlets_rating' => '10',
        'seating_rating' => '6',
        'hours_rating' => '9',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

      DB::table('ratings')->insert([
        'user_id' => '2',
        'workspace_id' => '7',
        'review' => 'You can get away with a lot. Do not be afraid to make these big decisions. Once you start, they sort of just make themselves. All you have to learn here is how to have fun. How do you make a round circle with a square knife? That is your challenge for the day. This is an example of what you can do with just a few things, a little imagination and a happy dream in your heart. Making all those little fluffies that live in the clouds.
',
        'wifi_rating' => '3',
        'location_rating' => '7',
        'noise_rating' => '9',
        'outlets_rating' => '9',
        'seating_rating' => '7',
        'hours_rating' => '4',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

      DB::table('ratings')->insert([
        'user_id' => '3',
        'workspace_id' => '6',
        'review' => 'You better get your coat out, this is going to be a cold painting. Look around, look at what we have. Beauty is everywhere, you only have to look to see it. I really recommend you use odorless thinner or your spouse is gonna run you right out into the yard and you will be working by yourself.

        Everything is happy if you choose to make it that way. This is your world. We are trying to teach you a technique here and how to use it. Every single thing in the world has its own personality - and it is up to you to make friends with the little rascals. Anyone can paint.

        That is the way I look when I get home late; black and blue. Just beat the devil out of it. All you need to paint is a few tools, a little instruction, and a vision in your mind. We will play with clouds today.',
        'wifi_rating' => '10',
        'location_rating' => '7',
        'noise_rating' => '8',
        'outlets_rating' => '9',
        'seating_rating' => '5',
        'hours_rating' => '8',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

      DB::table('ratings')->insert([
        'user_id' => '4',
        'workspace_id' => '5',
        'review' => 'If I paint something, I do not want to have to explain what it is. Let us put some happy little clouds in our world. We artists are a different breed of people. We are a happy bunch. Happy painting, God bless. Put light against light - you have nothing. Put dark against dark - you have nothing. It is the contrast of light and dark that each give the other one meaning. Absolutely no pressure. You are just a whisper floating across a mountain.',
        'wifi_rating' => '4',
        'location_rating' => '7',
        'noise_rating' => '7',
        'outlets_rating' => '8',
        'seating_rating' => '7',
        'hours_rating' => '6',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

      DB::table('ratings')->insert([
        'user_id' => '1',
        'workspace_id' => '4',
        'review' => 'Every day I learn. We will throw some old gray clouds in here just sneaking around and having fun. It is beautiful - and we have not even done anything to it yet. God gave you this gift of imagination. Use it. This is your world.

        We must be quiet, soft and gentle. Anytime you learn something your time and energy are not wasted. From all of us here, I want to wish you happy painting and God bless, my friends. You want your tree to have some character. Make it special. Use your imagination, let it go.

        Clouds are free. They just float around the sky all day and have fun. Learn when to stop. I am sort of a softy, I could not shoot Bambi except with a camera. Those great big fluffy clouds. Talk to trees, look at the birds. Whatever it takes. Brown is such a nice color.',
        'wifi_rating' => '9',
        'location_rating' => '7',
        'noise_rating' => '6',
        'outlets_rating' => '7',
        'seating_rating' => '9',
        'hours_rating' => '2',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

      DB::table('ratings')->insert([
        'user_id' => '1',
        'workspace_id' => '3',
        'review' => 'A happy cloud. Decide where your cloud lives. Maybe he lives right in here. Let us get crazy. See there, told you that would be easy.

        You need the dark in order to show the light. If what you are doing does not make you happy - you are doing the wrong thing. You can create anything that makes you happy. Get away from those little Christmas tree things we used to make in school. In this world, everything can be happy.

        Remember how free clouds are.',
        'wifi_rating' => '8',
        'location_rating' => '7',
        'noise_rating' => '10',
        'outlets_rating' => '8',
        'seating_rating' => '6',
        'hours_rating' => '9',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

      DB::table('ratings')->insert([
        'user_id' => '2',
        'workspace_id' => '2',
        'review' => 'Sometimes you learn more from your mistakes than you do from your masterpieces. You got your heavy coat out yet? It is getting colder. Even trees need a friend. We all need friends. Now we do not want him to get lonely, so we will give him a little friend. Trees grow however makes them happy.',
        'wifi_rating' => '3',
        'location_rating' => '7',
        'noise_rating' => '9',
        'outlets_rating' => '9',
        'seating_rating' => '7',
        'hours_rating' => '4',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

      DB::table('ratings')->insert([
        'user_id' => '3',
        'workspace_id' => '1',
        'review' => 'Let us put some happy little clouds in our world. Maybe there was an old trapper that lived out here and maybe one day he went to check his beaver traps, and maybe he fell into the river and drowned. Anytime you learn something your time and energy are not wasted. Every day I learn.

        Do not kill all your dark areas - you need them to show the light. Almost everything is going to happen for you automatically - you do not have to spend any time working or worrying. We are trying to teach you a technique here and how to use it. In your imagination you can go anywhere you want. This is your world. This painting comes right out of your heart.',
        'wifi_rating' => '10',
        'location_rating' => '7',
        'noise_rating' => '8',
        'outlets_rating' => '7',
        'seating_rating' => '7',
        'hours_rating' => '8',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

      DB::table('ratings')->insert([
        'user_id' => '1',
        'workspace_id' => '1',
        'review' => 'You can do anything here. So do not worry about it. I really believe that if you practice enough you could paint the Mona Lisa with a two-inch brush. Exercising the imagination, experimenting with talents, being creative; these things, to me, are truly the windows to your soul. Volunteering your time; it pays you and your whole community fantastic dividends. The more we do this - the more it will do good things to our heart. Sometimes you learn more from your mistakes than you do from your masterpieces.',
        'wifi_rating' => '9',
        'location_rating' => '7',
        'noise_rating' => '6',
        'outlets_rating' => '10',
        'seating_rating' => '9',
        'hours_rating' => '2',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);

    }
}
