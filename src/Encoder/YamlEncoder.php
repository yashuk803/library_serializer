<?php

namespace ITEA\Serializer\App\Encoder;

use ITEA\Serializer\Encoder\EncoderInterface;
use Symfony\Component\Yaml\Yaml;

class YamlEncoder implements EncoderInterface
{
    public function encode(array $data = [])
    {
        return Yaml::dump($data, 2, 4, Yaml::DUMP_OBJECT);
    }

}