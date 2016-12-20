<?php

namespace App\Custom\Scrapers;

class Scraper {

    protected $api_key = 'SECRET';
    protected $endpoint_artist_albums = 'http://api.musicgraph.com/api/v2/artist/%s/albums?api_key=%s';
    protected $endpoint_album = 'http://api.musicgraph.com/api/v2/album/%s?api_key=%s';
    protected $timeout = 10;

    protected $errors;

    protected $json;

    // http://api.musicgraph.com/api/v2/artist/search?api_key=&name=Led%20Zeppelin
    protected $bandNames = array(
        array( 'The Beatles', 'ea2c530f-a6b5-11e0-b446-00251188dd67'),
        array( 'Led Zeppelin', 'edc53fa6-a6b5-11e0-b446-00251188dd67'),
        array( 'Pink Floyd', 'e2661344-a6b5-11e0-b446-00251188dd67'),
        array( 'The Eagles', '715bd22a-f667-27a9-28e9-21cd81a36661'),
        array( 'Metallica', 'e7a06e67-a6b5-11e0-b446-00251188dd67'),
        array( 'The Who', 'e211c27d-a6b5-11e0-b446-00251188dd67'),
        array( 'Lynyrd Skynyrd', '62fa0c62-d3be-78ca-1ea8-60ff0b3efd9d'),
        array( 'Guns n Roses', 'e7823a89-ff2d-88de-dcf4-cdde96713d53'),
    );

    public function getAlbums() {
        $albums = array();
        foreach ($this->bandNames as $band) {
            $url = sprintf( $this->endpoint_artist_albums, $band[1], $this->api_key);
            $response = $this->get( $url );
            $json = $this->parseJSON($response);

            if ( $json['status']['message'] == 'Success' ) {
                // 4 albums max per band
                $max = 4;
                $limit = count($json['data']) < $max ? $count($json['data']) : $max;
                for ( $i = 0; $i<$limit; $i++ ) {
                    $album = $json['data'][$i];

                    var_dump($album);

                    $additional_info = $this->getAdditionalAlbumInfo( $album['id'] );

                    $row = array(
                        'name' => isset($album['title']) ? $album['title'] : 'N/A',
                        'number_of_tracks' => isset($album['number_of_tracks']) ? $album['number_of_tracks'] : '',
                        'band_name' => $band[0],
                        'release_date' => isset($album['release_date']) ? $album['release_date'] : '',
                    );

                    if ( $additional_info ) {
                        $row['label'] = $additional_info['label'];
                        $row['genre'] = $additional_info['genre'];
                    }


                    $this->albums[] = $row;
                    sleep(3);
                }
            }
        }

        if ( count( $this->albums ) > 0 ) {
            #$write =file_put_contents('/home/meder/albums.json', json_encode($this->albums));
            var_dump($write);
        }
    }

    /*
    * Get additional album information
    * @param int $id
    * @return mixed
    */
    private function getAdditionalAlbumInfo($id) {
        $url = sprintf( $this->endpoint_album, $id, $this->api_key);
        $response = $this->get( $url );
        $json = $this->parseJSON($response);

        if ( $json['status']['message'] == 'Success' ) {
            return array(
                'label' => isset($json['data']['label_name']) ? $json['data']['label_name'] : '',
                'genre' => isset($json['data']['main_genre']) ? $json['data']['main_genre'] : '',
            );
        }

        return false;
    }

    /*  
     * Call curl and make a GET request
     * @param string $url
     * @return mixed
     */
    protected function get( $url )
    {
        $curl = curl_init();
        curl_setopt ($curl, CURLOPT_URL, $url);
        curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt ($curl, CURLOPT_TIMEOUT, $this->timeout ); // 20 second timeout
        curl_setopt ($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt ($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, false);


        $result = curl_exec ($curl);

        if ( !curl_errno($curl))
            $info = curl_getinfo($curl);

        curl_close($curl);

        // Only return true if service replies with 200 OK
        if ( $info['http_code'] == 200 ) { 
            return $result;
        }

        $this->errors[] = 'Could not reach server.';

        return false;

    }   

    /*
     * Check if this is actual valid JSON
     * @param string $body
     * @return mixed
     */
    protected function parseJSON( $body )
    {
        $json = json_decode( $body, 1 );

        if ( json_last_error() === JSON_ERROR_NONE ) {

            return $json;
        }

        throw new \Exception('Could not parse JSON');
    }



}
