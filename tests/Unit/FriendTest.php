<?php


namespace Tests\Unit;


use PHPUnit\Framework\TestCase;
use Src\Friend\Domain\Exceptions\EmailNotValid;
use Src\Friend\Domain\Friend;
use Tests\Fixtures\Dates;
use Tests\Fixtures\Friends;

class FriendTest extends TestCase
{
    /**
     * @throws EmailNotValid
     */
    public function testCanBeInstantiated(): void
    {
        self::assertInstanceOf(Friend::class, Friends::aFriend());
    }

    /**
     * @throws EmailNotValid
     */
    public function testCanKnowIfTodayIsAFriendBirthday(): void
    {
        $aFriend = Friends::aFriend();
        $aDate = Dates::today();
        self::assertTrue($aFriend->isBirthday($aDate));
    }
}