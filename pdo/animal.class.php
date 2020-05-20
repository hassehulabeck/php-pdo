<?php

class Animal
{

    public $name;
    public $specimens;
    public $category;
    public $category_id;
    public $area_id;

    public function getForm()
    {
        $returString = "";
        foreach ($this as $key => $value) {
            $returString .= "<label for='" . $key . "'>" . $key . "</label>
                             <input type='text' name='" . $key . "' value='" . $value . "'><br />";
        }
        return $returString;
    }
}
