<?php

namespace App\Custom\Datasets;

/**
 * Provider for the Faker generator
 */
class BandProvider extends \Faker\Provider\Base
{

    protected static $bandNames = array(
        'The Beatles', 
        'Led Zeppelin', 
        'Pink Floyd', 
        'The Eagles', 
        'Metallica', 
        'The Who', 
        'Lynyrd Skynyrd', 
        'Guns n Roses', 
    );

    public function bandname() {
        return static::randomElement(static::$bandNames);
    }

}
