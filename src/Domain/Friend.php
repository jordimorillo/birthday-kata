<?php


namespace Src\Domain;


use DateTime;

class Friend
{
    private string $firstName;
    private string $lastName;
    private DateTime $birthDate;
    /**
     * @var Email
     */
    private Email $email;

    public function __construct(string $firstName, string $lastName, DateTime $birthDate, Email $email) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthDate = $birthDate;
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return DateTime
     */
    public function getBirthDate(): DateTime
    {
        return $this->birthDate;
    }

    /**
     * @return Email
     */
    public function getEmail(): Email
    {
        return $this->email;
    }
}