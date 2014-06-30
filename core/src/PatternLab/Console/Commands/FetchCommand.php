<?php

/*!
 * Console Fetch Command Class
 *
 * Copyright (c) 2014 Dave Olsen, http://dmolsen.com
 * Licensed under the MIT license
 *
 */

namespace PatternLab\Console\Commands;

use \PatternLab\Config;
use \PatternLab\Console;
use \PatternLab\Console\Command;
use \PatternLab\Fetch;

class FetchCommand extends Command {
	
	public function __construct() {
		
		parent::__construct();
		
		$this->command = "f";
		
		Console::setCommand($this->command,"fetch","Fetch a package","The fetch command grabs a package from GitHub and installs the package and any package dependencies.");
		
		$fetch = new Fetch();
		$fetch->loadRules();
		foreach ($fetch->rules as $rule) {
			$rule->setCommandOption($this->command);
		}
		
	}
	
	public function run() {
		
		// run the fetch command
		$f = new Fetch();
		$f->fetch();
		
	}
	
}
