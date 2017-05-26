<?php

use Illuminate\Database\Seeder;
use App\Page;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create([
          'machine_name' => 'homepage_main_text',
          'body' => '<h1>Welcome to our Retaurant</h1><h2>WE ARE A BEST QUALITY &amp; TRADITIONAL<br />IRAQI FOOD, SPECIALIZED IN FISH</h2><div class="homepage-fish"><div class="border border-left col-xs-10 col-xs-push-1 col-sm-8 col-sm-push-2">&nbsp;</div><div class="image-wrapper"><img src="/images/homepage_fish.png" /></div></div><p>The work is always in a full swing in out kitchen! Everyone here is on fire<br />when it comes to cooking. Now the world don&#39;t move to the beat of just<br />one drum. What might be right for you may not be right for some.</p><p>No Phone no lights no motor car not a single luxury. Like Robinson Crusoe<br />it&#39;s primitive as can be. Goodbye gray sky hello blue.</p>'
        ]);
    }
}
