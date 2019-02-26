<?php

namespace Yashuk803\Serializer\Encoder;

interface EncoderInterface {

    /**
     * Encodes data
     *
     * @param array  $data
     *
     * @return string
     *
     */
    public function encode(array $data = []);
}