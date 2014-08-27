<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// CodeIgniter i18n library by Jérôme Jaglale
// http://maestric.com/en/doc/php/codeigniter_i18n
// version 10 - May 10, 2012

class MY_Lang extends CI_Lang {

	/**************************************************
	 configuration
	***************************************************/
	
	var $languages = array();

	// special URIs (not localized)
	var $special = array (
		//""
	);
	
	// where to redirect if no language in URI
	var $default_uri = ''; 

	/**************************************************/
	
	
	function __construct()
	{
		parent::__construct();		
		
		global $CFG;
		global $URI;
		global $RTR;
		
		$this->languages = $CFG->item('languages');
		
		$segment = $URI->segment(1);
		
		//languages
		
		if (isset($this->languages[$segment]))	// URI with language -> ok
		{
			$language = $this->languages[$segment];
			$CFG->set_item('language', $language);
			$CFG->set_item('language_section', $segment);
		}
		else if($this->is_special($segment)) // special URI -> no redirect
		{
			return;
		}
		else
		{
			// set default language
			$CFG->set_item('language', $this->languages[$this->default_lang()]);
		}
	}
	
	// get current language
	// ex: return 'en' if language in CI config is 'english' 
	function lang()
	{
		global $CFG;		
		$language = $CFG->item('language');
		
		$lang = array_search($language, $this->languages);
		if ($lang)
		{
			return $lang;
		}
		
		return NULL;	// this should not happen
	}
	
	function is_special($uri)
	{
		$exploded = explode('/', $uri);
		if (in_array($exploded[0], $this->special))
		{
			return TRUE;
		}
		if(isset($this->languages[$uri]))
		{
			return TRUE;
		}
		return FALSE;
	}
	
	function switch_uri($lang)
	{
		$CI =& get_instance();

		$uri = $CI->uri->uri_string();
		if ($uri != "")
		{
			$exploded = explode('/', $uri);
			if($exploded[0] == $this->lang())
			{
				$exploded[0] = $lang;
			}
			$uri = implode('/',$exploded);
		}
		return $uri;
	}
	
	// is there a language segment in this $uri?
	function has_language($uri)
	{
		$first_segment = NULL;
		
		$exploded = explode('/', $uri);
		if(isset($exploded[0]))
		{
			if($exploded[0] != '')
			{
				$first_segment = $exploded[0];
			}
			else if(isset($exploded[1]) && $exploded[1] != '')
			{
				$first_segment = $exploded[1];
			}
		}
		
		if($first_segment != NULL)
		{
			return isset($this->languages[$first_segment]);
		}
		
		return FALSE;
	}
	
	// default language: first element of $this->languages
	function default_lang()
	{
		foreach ($this->languages as $lang => $language)
		{
			return $lang;
		}
	}
	
	// check if default lang is current now
	function is_default_lang()
	{
		global $CFG;
		
		if ($CFG->item('language') == $this->languages[$this->default_lang()])
			return true;
		
		return false;
	}
	
	// add language segment to $uri (if appropriate)
	function localized($uri)
	{
		if($this->has_language($uri)
				|| $this->is_special($uri)
				|| preg_match('/(.+)\.[a-zA-Z0-9]{2,4}$/', $uri)
				|| $this->is_default_lang()
				)
		{
			// we don't need a language segment because:
			// - there's already one or
			// - it's a special uri (set in $special) or
			// - that's a link to a file
			// - current language may be default
		}
		else
		{
			$uri = $this->lang() . '/' . $uri;
		}
		
		return $uri;
	}
	
	/**
	 * Fetch a single line of text from the language array
	 *
	 * @access	public
	 * @param	string	$line	the language line
	 * @return	string
	 */
	function line($line = '')
	{
		$value = ($line == '' OR ! isset($this->language[$line])) ? $line : $this->language[$line];

		// Because killer robots like unicorns!
		if ( $value == $line )
		{
			log_message('debug', 'Could not find the language line "'.$line.'"');
		}

		return $value;
	}
	
}

/* End of file */
