<?php

namespace Tests\Unit;

use DateTime;
use PHPUnit\Framework\TestCase;
use Src\Friend\Domain\FriendsRepository;
use Src\Friend\Infrastructure\Repositories\FriendsInFilesystem;
use Src\Friend\Infrastructure\Repositories\FriendsInMemory;
use Tests\Fixtures\Friends;
use Tests\Fixtures\FriendsFile;

class FriendsRepositoryTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        FriendsFile::clone();
    }

    public function tearDown(): void
    {
        FriendsFile::clear();
        parent::tearDown();
    }

    public function friendsRepositoryProvider(): array
    {
        return [
            'In Memory' => [new FriendsInMemory($this->preloadFriendsInMemory())],
            'In Filesystem' => [new FriendsInFilesystem(__DIR__ . '/../../storage/friends.txt')]
        ];
    }

    /**
     * @dataProvider friendsRepositoryProvider
     * @param FriendsRepository $friendsRepository
     */
    public function testCanObtainFriendsByBirthdayDate(FriendsRepository $friendsRepository): void
    {
        $aFriend = Friends::aFriendFromFile();
        $testDate = new DateTime('1982-10-08 00:00:00');
        $friends = $friendsRepository->findByBirthday($testDate);
        self::assertIsArray($friends);
        self::assertCount(1, $friends);
        self::assertEquals($aFriend, reset($friends));
    }

    /**
     * @return array
     */
    public function preloadFriendsInMemory(): array
    {
        $aFriendFromFile = Friends::aFriendFromFile();
        return [(string)$aFriendFromFile->getEmail() => $aFriendFromFile];
    }
}