<?php
/**
 * Created by PhpStorm.
 * User: masha
 * Date: 23.02.19
 * Time: 16:05
 */

namespace ITEA\App\Encoder;

class YamlEncoder implements EncoderInterface
{
    /**
     * Yaml Encoder data
     *
     * @param array  $data
     *
     * @return string
     *
     */
    public function encode(array $data = [])
    {
        return yaml_emit($data);
    }
}