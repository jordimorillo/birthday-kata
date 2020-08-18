<?php


namespace Src\Domain;


use Src\Domain\Exceptions\EmailNotValid;
use Src\Infrastructure\StringValueObject;

class Email implements StringValueObject
{
    private string $email;

    /**
     * Email constructor.
     * @param string $email
     * @throws EmailNotValid
     */
    public function __construct(string $email) {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new EmailNotValid('The email '.$email.' is not a valid');
        }
        $this->email = $email;
    }

    public function __toString(): string
    {
        return $this->email;
    }
}