<?php
 
if (!defined('BASEPATH')) exit('No direct script access allowed');

function assets_url($file_path){
	$CI =& get_instance();
	
	$actualThemePath = APPPATH.'../assets/'.$file_path;
	
	if (file_exists($actualThemePath)){
		return site_url('assets/'.$file_path);
	} else {
		return site_url('assets/'.$file_path);
	}
	
}
