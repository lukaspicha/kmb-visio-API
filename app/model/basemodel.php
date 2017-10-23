<?php

namespace app\model;


	abstract class Base_Model implements I_Model {
		
		private $table_name;
		private $connection;
		protected $db_row;

		public function __construct(string $table_name) {
			$config = require_once("./config/database.php");
			$this->table_name = $table_name;
			$this->connection = new \Pixie\Connection('mysql', $config[CONNECTION]);
		
		}

		public function load(int $id) {
			$query_builder = new \Pixie\QueryBuilder\QueryBuilderHandler($this->connection);
			$db_row = $query_builder->table($this->table_name)
								->where("id", "=", $id)
								->get();

			if($db_row) {
				$this->db_row = $db_row[0];
			}
			else {
				throw new \Exception("Invalid {$id} in table {$this->table_name}");
			}
			
		}

		public function getId($id) {
			return $this->db_row->id;
		}

		public  function __toString() {
			return json_encode($this->db_row);
		}
	}