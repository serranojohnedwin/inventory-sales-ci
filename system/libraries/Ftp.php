<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CI_FTP {

	/**
	 * FTP Server hostname
	 *
	 * @var	string
	 */
	public $hostname = '';

	/**
	 * FTP Username
	 *
	 * @var	string
	 */
	public $username = '';

	/**
	 * FTP Password
	 *
	 * @var	string
	 */
	public $password = '';

	/**
	 * FTP Server port
	 *
	 * @var	int
	 */
	public $port = 21;

	/**
	 * Passive mode flag
	 *
	 * @var	bool
	 */
	public $passive = TRUE;

	/**
	 * Debug flag
	 *
	 * Specifies whether to display error messages.
	 *
	 * @var	bool
	 */
	public $debug = FALSE;

	// --------------------------------------------------------------------

	/**
	 * Connection ID
	 *
	 * @var	resource
	 */
	protected $conn_id;

	// --------------------------------------------------------------------

	/**
	 * Constructor
	 *
	 * @param	array	$config
	 * @return	void
	 */
	public function __construct($config = array())
	{
		empty($config) OR $this->initialize($config);
		log_message('info', 'FTP Class Initialized');
	}

	// --------------------------------------------------------------------

	/**
	 * Initialize preferences
	 *
	 * @param	array	$config
	 * @return	void
	 */
	public function initialize($config = array())
	{
		foreach ($config as $key => $val)
		{
			if (isset($this->$key))
			{
				$this->$key = $val;
			}
		}

		// Prep the hostname
		$this->hostname = preg_replace('|.+?://|', '', $this->hostname);
	}

	// --------------------------------------------------------------------

	/**
	 * FTP Connect
	 *
	 * @param	array	 $config	Connection values
	 * @return	bool
	 */
	public function connect($config = array())
	{
		if (count($config) > 0)
		{
			$this->initialize($config);
		}

		if (FALSE === ($this->conn_id = @ftp_connect($this->hostname, $this->port)))
		{
			if ($this->debug === TRUE)
			{
				$this->_error('ftp_unable_to_connect');
			}

			return FALSE;
		}

		if ( ! $this->_login())
		{
			if ($this->debug === TRUE)
			{
				$this->_error('ftp_unable_to_login');
			}

			return FALSE;
		}

		// Set passive mode if needed
		if ($this->passive === TRUE)
		{
			ftp_pasv($this->conn_id, TRUE);
		}

		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * FTP Login
	 *
	 * @return	bool
	 */
	protected function _login()
	{
		return @ftp_login($this->conn_id, $this->username, $this->password);
	}

	// --------------------------------------------------------------------

	/**
	 * Validates the connection ID
	 *
	 * @return	bool
	 */
	protected function _is_conn()
	{
		if ( ! is_resource($this->conn_id))
		{
			if ($this->debug === TRUE)
			{
				$this->_error('ftp_no_connection');
			}

			return FALSE;
		}

		return TRUE;
	}

	// --------------------------------------------------------------------

	
	public function changedir($path, $suppress_debug = FALSE)
	{
		if ( ! $this->_is_conn())
		{
			return FALSE;
		}

		$result = @ftp_chdir($this->conn_id, $path);

		if ($result === FALSE)
		{
			if ($this->debug === TRUE && $suppress_debug === FALSE)
			{
				$this->_error('ftp_unable_to_changedir');
			}

			return FALSE;
		}

		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Create a directory
	 *
	 * @param	string	$path
	 * @param	int	$permissions
	 * @return	bool
	 */
	public function mkdir($path, $permissions = NULL)
	{
		if ($path === '' OR ! $this->_is_conn())
		{
			return FALSE;
		}

		$result = @ftp_mkdir($this->conn_id, $path);

		if ($result === FALSE)
		{
			if ($this->debug === TRUE)
			{
				$this->_error('ftp_unable_to_mkdir');
			}

			return FALSE;
		}

		// Set file permissions if needed
		if ($permissions !== NULL)
		{
			$this->chmod($path, (int) $permissions);
		}

		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Upload a file to the server
	 *
	 * @param	string	$locpath
	 * @param	string	$rempath
	 * @param	string	$mode
	 * @param	int	$permissions
	 * @return	bool
	 */
	public function upload($locpath, $rempath, $mode = 'auto', $permissions = NULL)
	{
		if ( ! $this->_is_conn())
		{
			return FALSE;
		}

		if ( ! file_exists($locpath))
		{
			$this->_error('ftp_no_source_file');
			return FALSE;
		}

		// Set the mode if not specified
		if ($mode === 'auto')
		{
			// Get the file extension so we can set the upload type
			$ext = $this->_getext($locpath);
			$mode = $this->_settype($ext);
		}

		$mode = ($mode === 'ascii') ? FTP_ASCII : FTP_BINARY;

		$result = @ftp_put($this->conn_id, $rempath, $locpath, $mode);

		if ($result === FALSE)
		{
			if ($this->debug === TRUE)
			{
				$this->_error('ftp_unable_to_upload');
			}

			return FALSE;
		}

		// Set file permissions if needed
		if ($permissions !== NULL)
		{
			$this->chmod($rempath, (int) $permissions);
		}

		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Download a file from a remote server to the local server
	 *
	 * @param	string	$rempath
	 * @param	string	$locpath
	 * @param	string	$mode
	 * @return	bool
	 */
	public function download($rempath, $locpath, $mode = 'auto')
	{
		if ( ! $this->_is_conn())
		{
			return FALSE;
		}

		// Set the mode if not specified
		if ($mode === 'auto')
		{
			// Get the file extension so we can set the upload type
			$ext = $this->_getext($rempath);
			$mode = $this->_settype($ext);
		}

		$mode = ($mode === 'ascii') ? FTP_ASCII : FTP_BINARY;

		$result = @ftp_get($this->conn_id, $locpath, $rempath, $mode);

		if ($result === FALSE)
		{
			if ($this->debug === TRUE)
			{
				$this->_error('ftp_unable_to_download');
			}

			return FALSE;
		}

		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Rename (or move) a file
	 *
	 * @param	string	$old_file
	 * @param	string	$new_file
	 * @param	bool	$move
	 * @return	bool
	 */
	public function rename($old_file, $new_file, $move = FALSE)
	{
		if ( ! $this->_is_conn())
		{
			return FALSE;
		}

		$result = @ftp_rename($this->conn_id, $old_file, $new_file);

		if ($result === FALSE)
		{
			if ($this->debug === TRUE)
			{
				$this->_error('ftp_unable_to_'.($move === FALSE ? 'rename' : 'move'));
			}

			return FALSE;
		}

		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Move a file
	 *
	 * @param	string	$old_file
	 * @param	string	$new_file
	 * @return	bool
	 */
	public function move($old_file, $new_file)
	{
		return $this->rename($old_file, $new_file, TRUE);
	}

	// --------------------------------------------------------------------

	/**
	 * Rename (or move) a file
	 *
	 * @param	string	$filepath
	 * @return	bool
	 */
	public function delete_file($filepath)
	{
		if ( ! $this->_is_conn())
		{
			return FALSE;
		}

		$result = @ftp_delete($this->conn_id, $filepath);

		if ($result === FALSE)
		{
			if ($this->debug === TRUE)
			{
				$this->_error('ftp_unable_to_delete');
			}

			return FALSE;
		}

		return TRUE;
	}

	// --------------------------------------------------------------------

	
	public function delete_dir($filepath)
	{
		if ( ! $this->_is_conn())
		{
			return FALSE;
		}

		
		$filepath = preg_replace('/(.+?)\/*$/', '\\1/', $filepath);

		$list = $this->list_files($filepath);
		if ( ! empty($list))
		{
			for ($i = 0, $c = count($list); $i < $c; $i++)
			{
				
				if ( ! preg_match('#/\.\.?$#', $list[$i]) && ! @ftp_delete($this->conn_id, $list[$i]))
				{
					$this->delete_dir($filepath.$list[$i]);
				}
			}
		}

		if (@ftp_rmdir($this->conn_id, $filepath) === FALSE)
		{
			if ($this->debug === TRUE)
			{
				$this->_error('ftp_unable_to_delete');
			}

			return FALSE;
		}

		return TRUE;
	}

	// --------------------------------------------------------------------

	public function chmod($path, $perm)
	{
		if ( ! $this->_is_conn())
		{
			return FALSE;
		}

		if (@ftp_chmod($this->conn_id, $perm, $path) === FALSE)
		{
			if ($this->debug === TRUE)
			{
				$this->_error('ftp_unable_to_chmod');
			}

			return FALSE;
		}

		return TRUE;
	}

	// --------------------------------------------------------------------

	public function list_files($path = '.')
	{
		return $this->_is_conn()
			? ftp_nlist($this->conn_id, $path)
			: FALSE;
	}

	// ------------------------------------------------------------------------

	
	public function mirror($locpath, $rempath)
	{
		if ( ! $this->_is_conn())
		{
			return FALSE;
		}


		if ($fp = @opendir($locpath))
		{
			
			if ( ! $this->changedir($rempath, TRUE) && ( ! $this->mkdir($rempath) OR ! $this->changedir($rempath)))
			{
				return FALSE;
			}

		
			while (FALSE !== ($file = readdir($fp)))
			{
				if (is_dir($locpath.$file) && $file[0] !== '.')
				{
					$this->mirror($locpath.$file.'/', $rempath.$file.'/');
				}
				elseif ($file[0] !== '.')
				{
					
					$ext = $this->_getext($file);
					$mode = $this->_settype($ext);

					$this->upload($locpath.$file, $rempath.$file, $mode);
				}
			}

			return TRUE;
		}

		return FALSE;
	}

	// --------------------------------------------------------------------

	
	protected function _getext($filename)
	{
		return (($dot = strrpos($filename, '.')) === FALSE)
			? 'txt'
			: substr($filename, $dot + 1);
	}

	// --------------------------------------------------------------------

	
	protected function _settype($ext)
	{
		return in_array($ext, array('txt', 'text', 'php', 'phps', 'php4', 'js', 'css', 'htm', 'html', 'phtml', 'shtml', 'log', 'xml'), TRUE)
			? 'ascii'
			: 'binary';
	}

	// ------------------------------------------------------------------------

	
	public function close()
	{
		return $this->_is_conn()
			? @ftp_close($this->conn_id)
			: FALSE;
	}

	// ------------------------------------------------------------------------

	
	protected function _error($line)
	{
		$CI =& get_instance();
		$CI->lang->load('ftp');
		show_error($CI->lang->line($line));
	}

}
