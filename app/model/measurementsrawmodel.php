<?php

namespace app\model;

	class MeasurementsRaw_Model extends Base_Model {

		private $location;
		private $device;
		private $measurand;

		public function __construct() {
			parent::__construct("measurements_raw");
		}

		public function load(int $id) {
			parent::load($id);


			// {TODO} nějakým způsobem optimalizovat
			$location = new Location_Model();
			$location->load($this->db_row->locations_id);
			$this->location = $location;
			$this->db_row->{"location"} = json_decode($this->location->toJson());

			$device = new Device_Model();
			$device->load($this->db_row->devices_id);
			$this->device = $device;
			$this->db_row->{"device"} = json_decode($this->device->toJson());

			$measurand = new Measurand_Model();
			$measurand->load($this->db_row->measurands_id);
			$this->measurand = $measurand;
			$this->db_row->{"measurand"} = json_decode($this->measurand->toJson());
		}

		public function getLocation() {
			return $this->location;
		}

		public function getDevice() {
			return $this->device;
		}

		public function getMeasurand() {
			return $this->measurand;
		}

		public function getMeasuredValue() {
			return $this->db_row->hodnota;
		}

		public function getCreated() {
			return new \DateTime($this->db_row->created);
		}

	}