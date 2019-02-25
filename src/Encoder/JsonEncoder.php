<?php
/**
 * Created by PhpStorm.
 * User: masha
 * Date: 23.02.19
 * Time: 16:03
 */

namespace ITEA\Serializer\App\Encoder;

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
        if(!(is_array($data) || is_object($data))) {
            throw new \InvalidArgumentException(\sprintf('This argument "%s" must be have type Array or Object.', $data));
        }

        return json_encode($data);
    }
}