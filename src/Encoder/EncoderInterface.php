<?php

namespace ITEA\Serializer\Encoder;

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