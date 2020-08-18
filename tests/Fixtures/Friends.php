<?php


namespace Tests\Fixtures;


use Src\Domain\Friend;

class Friends
{
    /**
     * @return Friend
     */
    public static function aFriend(): Friend
    {
        return new Friend();
    }
}