<?php

namespace app\model;
	interface I_Model {

		function load(int $id);

		function __toString();
	}