<?php

use Illuminate\Database\Seeder;
use App\Band;

class AlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Need to reference the same instance of $faker
        // factory('App\Album', 25)->create();
        
        $albumsFile = base_path().'/data/albums.json';

        if ( $json = $this->loadJson($albumsFile) ) {
            $this->createFromJson($json);
        } else {
            $this->createFromFactory();
        }


    }

    /*
     * Attempt to load a json file
     * @param string $file
     * @return mixed
     */
    private function loadJson($file) {

        $contents = File::get($file);

        if ( !$contents ) {
            return false;
        }

        $json = json_decode($contents, true);

        return $json;

    }

    /*
     * Seed from JSON data
     * @param array $json
     * @parse string $contents
     */
    public function createFromJson($json) {
        $faker = Faker\Factory::create();
        $faker->addProvider(new App\Custom\Datasets\AlbumProvider($faker));

        foreach ($json as $row ) {

            $band_id = App\Band::get()->where('name', $row['band_name'])->pluck('id')->first();

            if ( !$band_id ) {
                throw new \Exception('Could not find band.');
            }
            
            $release_date = $row['release_date'];

            // get the date the band started
            $temp = App\Band::where('id', $band_id)->get()->pluck('start_date')->all();
            $start_date = $temp[0];

            if ( $row['release_date'] == '' || $row['release_date'] == 'N/A' ) {
                // make the release date of the album between when the band formed and now, otherwise we have release dates prior to the bands debut
                $release_date = $faker->dateTimeBetween($start_date, 'now');
                $release_date = $release_date->format('Y-m-d');
            } else {
                $release_date = date('Y-m-d', strtotime($release_date));
            }

            // not logical to have a recording date after the release date.. so make it 3-9 months prior
            $recorded = new DateTime($release_date);
            $period = new DateInterval('P' . (rand(3,9)) . 'M');
            $recorded->sub($period);

            $recorded_date = $recorded->format('Y-m-d');

            App\Album::create([
                'name' => $row['name'],
                'band_id' => $band_id,
                'recorded_date' => $recorded_date,
                'release_date' => $release_date,
                'number_of_tracks' => $row['number_of_tracks'] ? $row['number_of_tracks'] : rand(5,10),
                'label' => $row['label'] && $row['label'] != 'N/A' ? $row['label'] : $faker->company,
                'producer' => $faker->name,
                'genre' => $row['genre'] && $row['label'] != 'N/A' ? $row['genre'] : $faker->genre(),
            ]);
        }
    }

    /*
     * Create entirely from faker
     */
    private function createFromFactory() {
        $faker = Faker\Factory::create();
        $faker->addProvider(new App\Custom\Datasets\AlbumProvider($faker));

        // the limit corresponds to the # of unique album names defined in App/Custom/Datasets/AlbumProvider
        for ( $i = 0; $i<20; $i++ ) {
            $band_id = App\Band::all()->random()->id;

            // get the date the band started
            $temp = App\Band::where('id', $band_id)->get()->pluck('start_date')->all();
            $start_date = $temp[0];

            // make the release date of the album between when the band formed and now, otherwise we have release dates prior to the bands debut
            $release_date = $faker->dateTimeBetween($start_date, 'now');
            $release_date = $release_date->format('Y-m-d');

            // not logical to have a recording date after the release date.. so make it 3-9 months prior
            $recorded = new DateTime($release_date);
            $period = new DateInterval('P' . (rand(3,9)) . 'M');
            $recorded->sub($period);

            $recorded_date = $recorded->format('Y-m-d');

            App\Album::create([
                'name' => $faker->unique()->album(),
                'band_id' => $band_id,
                'recorded_date' => $recorded_date,
                'release_date' => $release_date,
                'number_of_tracks' => rand(8, 15),
                'label' => $faker->company,
                'producer' => $faker->name,
                'genre' => $faker->genre(),
            ]);
        }
    }
}
