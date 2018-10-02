<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

$config['facebook_app_id'] = '1712182102430519'; 
$config['facebook_app_secret'] = '063004717a525049a2a9ce218c0e4b86'; 
//$config['facebook_client_secret'] = 'kU_ZgmsCJ7VWAQxy-4kFZYY5'; 
$config['facebook_app_redirect_uri'] = site_url().'authentication/facebook';
$config['facebook_default_graph_version'] = 'v2.10';
