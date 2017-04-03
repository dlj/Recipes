<?php
class objectDefinition
{
    function __construct($input = null) {
        if (!property_exists($this,"id"))
            throw new Exception('Object must contain id field');

        if ($input != null && count($input) > 0) 
        {
            $this->fromArray($input);
        }
    }

    function fromArray($ary)
    {
        foreach ($ary as $key => $value) {        
            $this->$key = $value;
        }
    }
}
?>