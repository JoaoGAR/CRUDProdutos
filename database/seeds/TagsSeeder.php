<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('tags')->truncate();
        $this->createTags();
    }


    private function createTags()
    {
        Tag::create([
            'name' => 'HD'
            ]);

        Tag::create([
            'name' => 'Memória RAM'
            ]);

        Tag::create([
            'name' => 'Desktop'
            ]);

        Tag::create([
            'name' => 'Notebook'
            ]);

        Tag::create([
            'name' => 'Processador'
            ]);

        $this->command->info('Demo Tag createds!');
    }
}
