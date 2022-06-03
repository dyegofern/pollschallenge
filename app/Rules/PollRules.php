<?php

namespace App\Rules;


class PollRules
{

    protected static $rules = [
        'poll_description' => 'required|max:255',
        'options.*' => 'required|string|distinct',
    ];


    /**
     * Return default rules
     *
     * @return array
     */
    public static function rules()
    {

        return [
            'poll_description' => self::$rules['poll_description'],
            'options.*' => self::$rules['options.*']
        ];
    }


    /**
     * Return default messages
     *
     * @return array
     */
    public static function messages()
    {

        return [];
    }
}
