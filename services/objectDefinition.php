<?php
class objectDefinition
{
    function __construct() {
        if (!property_exists($this,"id"))
            throw new Exception('Object must contain id field');
    }

    public function fromArray($ary)
    {
        foreach ($ary as $key => $value) {        
            $this->$key = $value;
    }
}
}
?>