<?php

namespace app\model;
	
	class Device_Model extends Base_Model {

		public function __construct() {
			parent::__construct("devices");
		}

		public function getName() {
			return $this->db_row->name;
		}

		public function getHash() {
			return $this->db_$row->hash;
		}

	}