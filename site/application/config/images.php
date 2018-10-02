<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

$config['images_root'] = realpath("")."/uploads/"; 
$config['images_url'] = site_url().'uploads/';
$config['images_thumbs'] = array(
	"55x55", "120x120","170x200","370x200","350x350","977x220","180x180"
);

$config['images_nocrop'] = array(
	"250x46"
);
