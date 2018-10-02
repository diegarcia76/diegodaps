<?php
// models/DM_Models.php

namespace models;

Class My_Models
{
	
	public function __get($property)
    {
		$getMethod = 'get'.ucfirst($property);
		if (method_exists($this, $getMethod)){
			return $this->$getMethod();
		} else {
				
			if (property_exists($this, $property)){
				if (!is_object($this->$property))
					if (preg_match('!\S!u', $this->$property)) {
						return $this->$property;
					} else return convert_accented_characters(utf8_encode($this->$property));
				return $this->$property;
			} else {
				echo "$property no estÃ¡ difinido en ".get_class($this);
				return false;
			}
			
		}
    }
    
	public function __set($property, $value)
    {
        if (property_exists($this, $property)){
	        $this->$property = $value;
		} else {
			echo "$property no estÃ¡ difinido en ".get_class($this);
			die();
			return false;
		}
    } 
}
?>
