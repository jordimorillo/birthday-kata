<?php


namespace Tests\Fixtures;


use Faker\Factory;
use Src\Domain\Email;
use Src\Domain\Exceptions\EmailNotValid;
use Src\Domain\Friend;

class Friends
{
    /**
     * @return Friend
     * @throws EmailNotValid
     */
    public static function aFriend(): Friend
    {
        $fake = Factory::create();
        return new Friend(
            $fake->firstName,
            $fake->lastName,
            Dates::today(),
            new Email($fake->email)
        );
    }
}