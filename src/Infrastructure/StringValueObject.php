<?php


namespace Src\Infrastructure;


interface StringValueObject
{
    public function __toString(): string;
}