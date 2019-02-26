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

./test/Person.php

```php
<?php

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
* For serializer object or array yaml format use component 
[symfony/yaml](https://github.com/symfony/yaml)

In file ./bin/console.php

```php
#!/usr/bin/env php
<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Yashuk803\Serializer\Test\Person;
use Yashuk803\Serializer\Serializer;
use Yashuk803\Serializer\Encoder\JsonEncoder;
use Yashuk803\Serializer\Encoder\YamlEncoder;

$person = new Person('Marina', 'Bulick');
$person->setAge(30);


$serialized = new Serializer($person, new YamlEncoder());
$serialized->serialize();
//!php/object "O:28:\"ITEA\\Serializer\\tests\\Person\":3:{s:39:\"\0ITEA\\Serializer\\tests\\Person\0firstName\";s:6:\"Marina\";s:38:\"\0ITEA\\Serializer\\tests\\Person\0lastName\";s:6:\"Bulick\";s:33:\"\0ITEA\\Serializer\\tests\\Person\0age\";i:30;}"



$serialized = new Serializer($person, new JsonEncoder());
$serialized->serialize();
/*"---
firstName: Marina
lastName: Bulick
age: 30
...
"
 */
```

