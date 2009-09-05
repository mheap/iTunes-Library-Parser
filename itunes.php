<?php

class track {}
class iTunesLibrary{ 
	private $_tracks; 

	function __construct($path){	
		$str = file_get_contents($path);
		$l = simplexml_load_string($str);

		foreach ($l->dict->dict->dict as $track){
	
			preg_match_all("/<key>(.*)<\/key><.*>(.*)<\/.*>/", $track->asXML(), $m);
			$t = new track();
			foreach ($m[1] as $k => $v){
				$t->{str_replace(" ", "_", $v)} = strval($m[2][$k]);
			}

			$this->addTrack($t);
		}

	}

	function getTracks(){ return $this->_tracks; } 
	function addTrack($__t){ $this->_tracks[] = $__t;} 
	function removeTrack($__k){ unset($this->_tracks[$__k]); }
}
