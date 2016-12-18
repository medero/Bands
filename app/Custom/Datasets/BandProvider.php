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
        'The Rolling Stones',
        'Nirvana',
        'Pink Floyd',
        'Lynyrd Skynyrd',
        'The Eagles',
        'The Jackson 5',
        'The Who',
        'Metallica',
        'Guns n Roses',
        'Black Sabbath',
    );


    public function bandname() {
        return static::randomElement(static::$bandNames);
    }

    /*
    public function companyName()
    {
        $format = static::randomElement(static::$companyNameFormats);

        return $this->generator->parse($format);
    }
     */

}
