<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlbumsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'name' => 'required|min:1', // 1 since a band name could be as short as "U2", and technically its possible to have a 1 letter name?

            //'band_id' => 'required|exists:bands,id',

            'band_id' => 'integer',

            'recorded_date' => 'date',

            'release_date' => 'date',

            'number_of_tracks' => 'integer',

            'label' => 'string',

            'producer' => 'string',

            'genre' => 'string',

        ];
    }
}
