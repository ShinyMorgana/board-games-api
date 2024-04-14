<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BoardGameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Assuming all authenticated users can create a board game
        // Modify this if there are more specific requirements
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'min_players' => 'required|integer|min:1',
            'max_players' => 'required|integer|min:1|gte:min_players',
            // Add more fields and rules as necessary
        ];
    }

    /**
     * Messages for validation errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'The name of the board game is required.',
            'min_players.required' => 'You must specify the minimum number of players.',
            'max_players.required' => 'You must specify the maximum number of players.',
            'max_players.gte' => 'The maximum number of players must be greater than or equal to the minimum number of players.',
            // Add more custom messages as necessary
        ];
    }

    /**
     * Attributes that have a specific format.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'min_players' => 'minimum players',
            'max_players' => 'maximum players',
            // Define other attributes if necessary
        ];
    }
}
