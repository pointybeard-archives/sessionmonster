<?php

	Final Class datasourceSessionmonster_showsessionparam Extends DataSource{

		function about(){
			return array(
					 'name' => 'Session Monster: Show Session Parameters',
					 'author' => array(
							'name' => 'Symphony Team',
							'website' => 'http://symphony21.com',
							'email' => 'team@symphony21.com'),
					 'version' => '1.0',
					 'release-date' => '2008-05-12');
		}


		public function grab(){

			session_start();

			$xml = new XMLElement('session-monster');

			if(!is_array($_SESSION[__SYM_COOKIE_PREFIX__ . '-sessionmonster']) || empty($_SESSION[__SYM_COOKIE_PREFIX__ . '-sessionmonster'])) return NULL;

			$count = 0;

			foreach($_SESSION[__SYM_COOKIE_PREFIX__ . '-sessionmonster'] as $key => $val){
				if(strlen($val) <= 0) continue;
				$xml->appendChild(new XMLElement('item', $val, array('name' => $key)));
				$count++;
	        }

	    	return ($count == 0 ? NULL : $xml);

		}
	}
