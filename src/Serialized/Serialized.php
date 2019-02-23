<?php

namespace ITEA\App\Serialized;

use ITEA\App\Encoder\EncoderInterface;
use ITEA\App\Metadata\Metadata;

class Serialized
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

    private $encoders;

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
        $this->encoders = $encoders;
    }

    public function serialize()
    {
        return $this->encoders->encode($this->data);
    }

    /**
     * @return  array
     */

    private function getArrays($data)
    {
        if(is_object($data)) {
            $classMetadata = new Metadata($data);
            $data = $classMetadata->getSerealizeObject();
        }
        return $data;
    }
}