<?php


namespace Tests\Fixtures;


use DateTime;

class Dates
{
    public static function today(): DateTime
    {
        return new DateTime('now');
    }
}