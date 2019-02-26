<?php

namespace ITEA\Serializer\Encoder;

use ITEA\Serializer\Exception\EncryptException;

class JsonEncoder implements EncoderInterface
{
    /**
     * Json Encoder data
     *
     * @param array  $data
     *
     * @return string
     *
     */
    public function encode(array $data = [])
    {
        $json = json_encode($data);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new EncryptException('Could not encrypt the data.');
        }
        return $json;
    }
}