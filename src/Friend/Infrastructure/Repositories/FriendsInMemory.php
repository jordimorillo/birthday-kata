<?php


namespace Src\Friend\Infrastructure\Repositories;


use DateTime;
use Src\Friend\Domain\Friend;
use Src\Friend\Domain\FriendsRepository;

class FriendsInMemory implements FriendsRepository
{
    /**
     * @var Friend[]
     */
    private array $friends;

    /**
     * FriendsInMemory constructor.
     * @param array|null $friends
     */
    public function __construct(array $friends = null)
    {
        if($friends === null) {
            $this->friends = [];
        } else {
            $this->friends = $friends;
        }
    }

    /**
     * @param DateTime $birthday
     * @return Friend[]
     */
    public function findByBirthday(DateTime $birthday): array
    {
        return array_filter(
            $this->friends,
            static function ($friend) use ($birthday) {
                return $friend->isBirthday($birthday);
            }
        );
    }
}