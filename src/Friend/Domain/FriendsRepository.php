<?php


namespace Src\Friend\Domain;


use DateTime;

interface FriendsRepository
{
    /**
     * @param DateTime $birthday
     * @return Friend[]
     */
    public function findByBirthday(DateTime $birthday): array;
}