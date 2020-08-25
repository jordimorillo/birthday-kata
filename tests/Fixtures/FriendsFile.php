<?php


namespace Tests\Fixtures;


class FriendsFile
{
    public static function clone(): void
    {
        $sourceFriendsFile =  __DIR__ . '/../../storage/friends.txt';
        $testFriendsFile =  __DIR__ . '/../../storage/friends_test.txt';
        exec('cp ' . $sourceFriendsFile . ' ' . $testFriendsFile);
    }

    public static function clear(): void
    {
        $testFriendsFile =  __DIR__ . '/../../storage/friends_test.txt';
        exec('rm ' . $testFriendsFile);
    }
}