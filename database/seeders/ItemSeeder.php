<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $item = new Item();
        // $item->name = "Iphone";
        // // $item->detail = "Help me pls";
        // // $item->location = "SC45 KU";
        // // $item->status = "รอคืนของ";
        // $item->save();
        Item::factory(50)->create();
    }
}
