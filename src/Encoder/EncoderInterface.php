<?php

namespace ITEA\Serializer\App\Encoder;

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