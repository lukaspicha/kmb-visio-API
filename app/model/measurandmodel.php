<?php

namespace app\model;
	
	class Measurand_Model extends Base_Model {

		public function __construct() {
			parent::__construct("measurands");
		}

		public function getName() {
			return $this->db_row->name;
		}

		public function getUnit() {
			return $this->db_$row->unit;
		}

	}