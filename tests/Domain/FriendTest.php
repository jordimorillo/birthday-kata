<?php


namespace Tests\Domain;


use PHPUnit\Framework\TestCase;
use Src\Domain\Friend;
use Tests\Fixtures\Friends;

class FriendTest extends TestCase
{
    public function testCanBeInstantiated(): void
    {
        self::assertInstanceOf(Friend::class, Friends::aFriend());
    }
}