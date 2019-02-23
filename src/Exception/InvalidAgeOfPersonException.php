<?php
namespace ITEA\App\Exception;

class InvalidAgeOfPersonException extends \DomainException
{
    public function __construct($age)
    {
        parent::__construct('Person cannot have age ' . $age, 0, null);
    }
}