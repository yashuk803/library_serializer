<?php
namespace Yashuk803\Serializer\Test;

use Yashuk803\Serializer\Exception\InvalidAgeOfPersonException;

class Person
{
    const MAX_POSSIBLE_AGE = 150;
    private $firstName;
    private $lastName;
    private $age;
    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }
    public function __get($name)
    {
        $getter = 'get' . \ucfirst($name);
        if (\method_exists($this, $getter)) {
            return $this->$getter();
        }
    }
    public function getFirstName()
    {
        return $this->firstName;
    }
    public function getLastName()
    {
        return $this->lastName;
    }
    public function setAge($age)
    {
        if ($age > self::MAX_POSSIBLE_AGE) {
            throw new InvalidAgeOfPersonException($age);
        }
        $this->age = $age;
    }
    public function getAge()
    {
        return $this->age;
    }
    public function __toString()
    {
        return $this->firstName . ' ' . $this->lastName;
    }
}