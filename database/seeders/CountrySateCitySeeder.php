<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class CountrySateCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*------------------------------------------
        --------------------------------------------
        US Country Data
        --------------------------------------------
        --------------------------------------------*/
        $country = Country::create(['name' => 'United State']);
  
        $state = State::create(['country_id' => $country->id, 'state' => 'Florida']);
  
        City::create(['state_id' => $state->id, 'city' => 'Miami']);
        City::create(['state_id' => $state->id, 'city' => 'Tampa']);
  
        /*------------------------------------------
        --------------------------------------------
        India Country Data
        --------------------------------------------
        --------------------------------------------*/
        $country = Country::create(['name' => 'India']);
  
        $state = State::create(['country_id' => $country->id, 'state' => 'Gujarat']);
  
        City::create(['state_id' => $state->id, 'city' => 'Rajkot']);
        City::create(['state_id' => $state->id, 'city' => 'Surat']);
    }
}
