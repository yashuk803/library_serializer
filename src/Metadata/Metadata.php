<?php
namespace ITEA\App\Metadata;

class Metadata
{
    /**
     * @var object
     */

    private $name;

    /**
     * @var \ReflectionClass
     */

    private $reflClass;

    /**
     * @param object $data
     */
    public function __construct($data)
    {
        $this->name = $data;
        $this->reflClass = new \ReflectionClass($data);

    }

    /**
     * @return  array
     */
    public function getSerealizeObject()
    {

        $props = $this->reflClass->getProperties();
        $propsArr = array();
        foreach($props as $prop){

            $reflProp = $this->getMetadataProperty($prop->getName());
            $reflProp->setAccessible(true);
            $propsArr[$prop->getName()] = $reflProp->getValue($this->name);
        }
        return $propsArr;
    }
    /**
     * @return  string
     */
    private function getMetadataProperty($name)
    {
        return $this->reflClass->getProperty($name);
    }

}