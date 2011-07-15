<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$plugin_info = array(
		'pi_name'			=> 'Call Php',
		'pi_version'		=> '1.0',
		'pi_author'			=> 'Christopher Reding',
		'pi_author_url'		=> 'http://christopherreding.com/',
		'pi_description'	=> 'Tag for calling php functions.',
		'pi_usage'			=> CallPhp::usage()
	);
					
/**
 * Str_rexp
 * @package			ExpressionEngine
 * @category		Plugin
 * @author			Christopher Reding
 * @copyright		Copyright (c) 2011, Christopher Reding
 * @link			http://christopherreding.com
 */
					
class CallPhp {
  
	var $return_data = '';
	
	function CallPhp()
	{
		//ExpressionEngine super object
		$this->EE =& get_instance();
		
		$method = $this->EE->TMPL->fetch_param('method', '');
		$params   = $this->EE->TMPL->fetch_param('params', array());
		$tag_data = $this->EE->TMPL->tagdata;
		 
		$params = str_replace(array('[', ']'), array('',''), $params );

		if( function_exists( $method ) )
		{	
			if( !is_array($params) )
				$params = explode('|', $params );
			
			if( $tag_data !== "" )
				array_push( $params, $tag_data );
			
			$data = call_user_func_array($method, $params );
			
			//Output transformed string
			$this->return_data = $data;
		}else{
			$this->return_data = "Invalid Function Call";
		}
		
	}

	// --------------------------------------------------------------------
	/**
	 * Usage
	 *
	 * This function describes how the plugin is used.
	 *
	 * @access	public
	 * @return	string
	 */	
  
	function usage()
	{
	  ob_start(); 
	  ?>
	  
	  PHP functions are selected using the method param 
	  
	  	method="str_replace"
	  	
	  You can add parameters to the function call by separating the params with a | 
	  you can optionally wrap the params in square braces [] if you want to preserve 
	  a space at the beginning of the string.
	  
	  	params="[param1|param2|param3]"
	 
	  To replace all spaces in a string using str_replace use this. We are passing three params here
	  the first is a space, the second is an empty string, the third is the string to search.
	  
	  {exp:callphp method="str_replace" params="[ ||The quick brown fox jumped over the lazy dog" }
	  
	  You can get the date like the
	  
	  {exp:callphp method="date" params="m-d-Y"}
	  
	  call strtotime
	  
	  {exp:callphp method="strtotime" params="Monday January 1, 2011"}
	  
	  You can also use the tag data as a param. When you use tag data it adds it as a param 
	  to the end of the array, therefore if you wanted to just use the tagdata you wouldn't 
	  declare the params in the tag.
	  
	  {exp:callphp method="strtotime"}
	  	Monday January 1, 2011
	  {/exp:callphp}
	  
	  <?php
	  $buffer = ob_get_contents();
	  	
	  ob_end_clean(); 
	  
	  return $buffer;
	}

}
/* End of file pi.str_rexp.php */ 
/* Location: ./system/expressionengine/third_party/str_rexp/pi.str_rexp.php */ 