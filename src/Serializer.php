<?php

namespace Yashuk803\Serializer;

use Yashuk803\Serializer\Encoder\EncoderInterface;
use Yashuk803\Serializer\Metadata\Metadata;

class Serializer
{
    /**
     * @var mixed;
     *
     */
    private $data;

    /**
     * @var EncoderInterface;
     *
     */
    private $encoder;

    /**
     * @param array|object $data
     * @param EncoderInterface  $encoders
     */
    public function __construct($data, $encoders)
    {

        if(!(is_array($data) || is_object($data))) {
            throw new \InvalidArgumentException(\sprintf('This argument "%s" must be have type Array or Object.', $data));
        }

        if(!($encoders instanceof EncoderInterface)) {
            throw new \InvalidArgumentException(\sprintf('The class "%s" does not implement "%s"', \get_class($encoders), EncoderInterface::class));

        }

        $this->data = $this->getArrays($data);
        $this->encoder = $encoders;
    }

    public function serialize()
    {
        return $this->encoder->encode($this->data);
    }

    /**
     * @return  array
     */
    private function getArrays($data)
    {
        if(is_object($data)) {
            $classMetadata = new Metadata($data);
            $data = $classMetadata->getData();
        }
        return $data;
    }
}