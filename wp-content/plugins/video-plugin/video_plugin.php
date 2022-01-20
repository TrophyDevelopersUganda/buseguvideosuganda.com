<?php
/*
Plugin Name: Video Plugin
Plugin URI: https://buseguvideosuganda.com
Description: This Plugin helps people like you to add awesome videos no Youtube required 
Author: Sir Luliba Tonny
Version: 0.0.1
Author URI: https://buseguvideosuganda.com
*/ /*
Video Plugin is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version. Video Plugin is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details. 
You should have received a copy of the GNU General Public License
along with Video Plugin. If not, see https://buseguvideosuganda.com.
*/ 
global $wp_version;
if (!version_compare ($wp_version , "5.8.3", ">="))
{ die("you need at least version 5.8.5 of wordpress to use the Videp Plugin");
}
