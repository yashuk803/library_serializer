<?php
/**
 * Created by PhpStorm.
 * User: masha
 * Date: 23.02.19
 * Time: 16:03
 */

namespace ITEA\App\Encoder;

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
        return json_encode($data);
    }
}