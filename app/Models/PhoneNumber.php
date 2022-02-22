<?php

namespace App\Models;

class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    /**
     * @see list of Ukraine mobile formats (2017-08-08), International format ONLY
     */
    protected static $formats = [

        // International format (mobile)
        '+38050#######',
        '+38066#######',
        '+38068#######',
        '+38096#######',
        '+38067#######',
        '+38091#######',
        '+38092#######',
        '+38093#######',
        '+38094#######',
        '+38095#######',
        '+38096#######',
        '+38097#######',
        '+38098#######',
        '+38063#######',
        '+38099#######',
    ];
}
