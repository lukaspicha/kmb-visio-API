<?php
	function myAutoload($class) {

		$exploded_class_name = explode("_", $class);


		if($exploded_class_name[1] == "Model")	{
			$exploded = explode("\\", $exploded_class_name[0]);
			require("app/model/" . strtolower($exploded[2]) . "model.php");	
		}
	}

	spl_autoload_register("myAutoload");