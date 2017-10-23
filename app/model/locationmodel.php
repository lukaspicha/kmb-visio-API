<?php

namespace app\model;
	
	class Location_Model extends Base_Model {

		public function __construct() {
			parent::__construct("locations");
		}

		public function getName() {
			return $this->db_row->name;
		}

		public function getHash() {
			return $this->db_row->hash;
		}

	}