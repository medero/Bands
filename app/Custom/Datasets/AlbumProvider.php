<?php

namespace App\Custom\Datasets;

/**
 * Provider for the Faker generator
 */
class AlbumProvider extends \Faker\Provider\Base
{
    protected static $albumNames = array(
        'Motivating Other People',
        'Found Your Place',
        'All Is Vanity',
        'Kickoff Return',
        'Away All Obstacles',
        'Tobacco Road Twice Blessed',
        'Even When You Feel Wrong',
        'Been a Fine Day',
        'How can you know about death?',
        'Its a good day',
        'The snow is a meltin',
        'Singing in the rain',
        'You are my sunshine',
        '33rd Division',
        'Two Stroke Diesel',
        'Big White Fog',
        'Outline of Technology',
        'The Siren Call of Ghosts',
        'It Comes Soon Enough',
        'Open Hearts',
        'Shire of Bull',
    );

    protected static $genres = array(
        'Pop',
        'Rock',
        'Rap',
    );

    public function album() {
        return static::randomElement(static::$albumNames);
    }

    public function genre() {
        return static::randomElement(static::$genres);
    }

}
