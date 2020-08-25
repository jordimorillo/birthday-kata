<?php


namespace Src\Friend\Infrastructure\Repositories;


use DateTime;
use Src\Friend\Domain\Email;
use Src\Friend\Domain\Exceptions\EmailNotValid;
use Src\Friend\Domain\Friend;
use Src\Friend\Domain\FriendsRepository;

class FriendsInFilesystem implements FriendsRepository
{
    private array $friends;

    /**
     * FriendsInFilesystem constructor.
     * @param string $absolutePathToFriendsFile
     * @throws EmailNotValid
     */
    public function __construct(string $absolutePathToFriendsFile)
    {
        $rawFileContent = file_get_contents($absolutePathToFriendsFile);
        $rows = explode("\r\n", $rawFileContent);
        $friends = [];
        foreach($rows as $key => $rawRow) {
            if($key === 0) {
                continue;
            }
            [$row['last_name'], $row['first_name'], $row['date_of_birth'], $row['email']] = explode(", ", $rawRow);
            $friends[] = $this->friendFromRow($row);
        }
        $this->friends = $friends;
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

    /**
     * @param $row
     * @return Friend
     * @throws EmailNotValid
     */
    private function friendFromRow($row): Friend
    {
        return new Friend(
            $row['first_name'],
            $row['last_name'],
            new DateTime($row['date_of_birth']),
            new Email($row['email'])
        );
    }
}