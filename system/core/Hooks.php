<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Hooks {


	public $enabled = FALSE;

	
	public $hooks =	array();

	/**
	 * Array with class objects to use hooks methods
	 *
	 * @var array
	 */
	protected $_objects = array();

	/**
	 * In progress flag
	 *
	 * Determines whether hook is in progress, used to prevent infinte loops
	 *
	 * @var	bool
	 */
	protected $_in_progress = FALSE;

	/**
	 * Class constructor
	 *
	 * @return	void
	 */
	public function __construct()
	{
		$CFG =& load_class('Config', 'core');
		log_message('info', 'Hooks Class Initialized');

		// If hooks are not enabled in the config file
		// there is nothing else to do
		if ($CFG->item('enable_hooks') === FALSE)
		{
			return;
		}

		// Grab the "hooks" definition file.
		if (file_exists(APPPATH.'config/hooks.php'))
		{
			include(APPPATH.'config/hooks.php');
		}

		if (file_exists(APPPATH.'config/'.ENVIRONMENT.'/hooks.php'))
		{
			include(APPPATH.'config/'.ENVIRONMENT.'/hooks.php');
		}

		// If there are no hooks, we're done.
		if ( ! isset($hook) OR ! is_array($hook))
		{
			return;
		}

		$this->hooks =& $hook;
		$this->enabled = TRUE;
	}

	// --------------------------------------------------------------------

	public function call_hook($which = '')
	{
		if ( ! $this->enabled OR ! isset($this->hooks[$which]))
		{
			return FALSE;
		}

		if (is_array($this->hooks[$which]) && ! isset($this->hooks[$which]['function']))
		{
			foreach ($this->hooks[$which] as $val)
			{
				$this->_run_hook($val);
			}
		}
		else
		{
			$this->_run_hook($this->hooks[$which]);
		}

		return TRUE;
	}

	// --------------------------------------------------------------------

	protected function _run_hook($data)
	{
		// Closures/lambda functions and array($object, 'method') callables
		if (is_callable($data))
		{
			is_array($data)
				? $data[0]->{$data[1]}()
				: $data();

			return TRUE;
		}
		elseif ( ! is_array($data))
		{
			return FALSE;
		}

		if ($this->_in_progress === TRUE)
		{
			return;
		}

		

		if ( ! isset($data['filepath'], $data['filename']))
		{
			return FALSE;
		}

		$filepath = APPPATH.$data['filepath'].'/'.$data['filename'];

		if ( ! file_exists($filepath))
		{
			return FALSE;
		}

		// Determine and class and/or function names
		$class		= empty($data['class']) ? FALSE : $data['class'];
		$function	= empty($data['function']) ? FALSE : $data['function'];
		$params		= isset($data['params']) ? $data['params'] : '';

		if (empty($function))
		{
			return FALSE;
		}

		// Set the _in_progress flag
		$this->_in_progress = TRUE;

		// Call the requested class and/or function
		if ($class !== FALSE)
		{
			// The object is stored?
			if (isset($this->_objects[$class]))
			{
				if (method_exists($this->_objects[$class], $function))
				{
					$this->_objects[$class]->$function($params);
				}
				else
				{
					return $this->_in_progress = FALSE;
				}
			}
			else
			{
				class_exists($class, FALSE) OR require_once($filepath);

				if ( ! class_exists($class, FALSE) OR ! method_exists($class, $function))
				{
					return $this->_in_progress = FALSE;
				}

				// Store the object and execute the method
				$this->_objects[$class] = new $class();
				$this->_objects[$class]->$function($params);
			}
		}
		else
		{
			function_exists($function) OR require_once($filepath);

			if ( ! function_exists($function))
			{
				return $this->_in_progress = FALSE;
			}

			$function($params);
		}

		$this->_in_progress = FALSE;
		return TRUE;
	}

}
