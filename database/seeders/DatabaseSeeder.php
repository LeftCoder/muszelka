<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Apartment;
use App\Models\Faq;
use App\Models\Feature;
use App\Models\Image;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Kamil Graczyk',
            'email' => 'kamilgraczyk@o2.pl',
        ]);

        $features = ['wifi', 'tv', 'pralka', 'wyposażona kuchnia'];
        foreach ($features as $feature) {
            Feature::factory()->create(['name' => $feature]);
        }

        Faq::factory()->count(10)->create();

        $apartments = Apartment::factory()->count(10)->create();
        foreach ($apartments as $apartment) {
            $apartment->features()->attach([1, 2, 3, 4]);

            Reservation::factory()
                ->count(3)
                ->for($apartment)
                ->create();

            Image::factory()
                ->count(1)
                ->for($apartment)
                ->create();
        }

        $reservations = Reservation::all();
        $number = 0;
        foreach ($reservations as $reservation) {
            $reservation->number = '#MW/'.date('Y').'/'.sprintf('%04d', ++$number);
            $reservation->save();
        }
    }
}
