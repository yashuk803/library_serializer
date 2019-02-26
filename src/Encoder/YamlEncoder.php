<?php

namespace Yashuk803\Serializer\Encoder;

use Symfony\Component\Yaml\Yaml;

class YamlEncoder implements EncoderInterface
{
    public function encode(array $data = [])
    {
        return Yaml::dump($data, 2, 4, Yaml::DUMP_OBJECT);
    }

}