Library Serializer
===============

With the Serializer library it's possible to handle serializing data structures, including object graphs, into array structures


Installation
------------

For creating new project based on this template just execute the following command

```
$ git clone https://github.com/yashuk803/library_serializer.git

$ composer install
```

Usage
-----

1. Create Object which you want serialize
2. In folder bin/console.php use your Object and class encoder JsonEncoder or YamlEncoder
3. use method serialize() than get json_encode or yaml_encode format;

Exemple
----------------

```
./src/Person.php

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
```
In file ./bin/console.php
```
#!/usr/bin/env php
<?php

require_once __DIR__ . '/../vendor/autoload.php';

use ITEA\App\Person;
use ITEA\App\Serialized\Serialized;
use ITEA\App\Encoder\JsonEncoder;
use ITEA\App\Encoder\YamlEncoder;

$person = new Person('Marina', 'Bulick');
$person->setAge(30);


$serialized = new Serialized($person, new YamlEncoder());
$serialized->serialize();
//"{"firstName":"Marina","lastName":"Bulick","age":30}"



$serialized = new Serialized($person, new JsonEncoder());
$serialized->serialize();
/*"---
firstName: Marina
lastName: Bulick
age: 30
...
"
 */
```

