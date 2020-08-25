<?php


namespace Tests\Fixtures;


use DateTime;
use Faker\Factory;
use Src\Friend\Domain\Email;
use Src\Friend\Domain\Exceptions\EmailNotValid;
use Src\Friend\Domain\Friend;

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

    /**
     * @return Friend
     */
    public static function aFriendFromFile(): Friend
    {
        return new Friend(
            'John',
            'Doe',
            new DateTime('1982-10-08 00:00:00'),
            new Email('john.doe@foobar.com')
        );
    }
}