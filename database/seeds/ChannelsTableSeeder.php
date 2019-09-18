<?php
use DiscussIt\Channel;
use Illuminate\Database\Seeder;
class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channels = ['Laravel 5.8', 'Vue JS 3', 'Angular 7', 'Node JS'];
        foreach ($channels as $channel) {
            Channel::create([
                'name' => $channel,
                'slug' => str_slug($channel)
            ]);
        }
    }
}
