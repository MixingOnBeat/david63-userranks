<?php

/**
*
* @package User Ranks Extension
* @copyright (c) 2015 david63
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace david63\userranks;

/**
* Extension class for stop forum spam
*/

class ext extends \phpbb\extension\base
{
	const USER_RANKS_VERSION = '2.1.0';

	/**
	* Enable extension if phpBB version requirement is met
	*
	* @var string Require 3.2.0-a1 due to updated 3.2 syntax
	*
	* @return bool
	* @access public
	*/
	public function is_enableable()
	{
		$config = $this->container->get('config');

		if (!phpbb_version_compare($config['version'], '3.2.0', '>='))
		{
			$this->container->get('language')->add_lang('ext_userranks', 'david63/userranks');
			trigger_error($this->container->get('language')->lang('VERSION_32') . adm_back_link(append_sid('index.' . $this->container->getParameter('core.php_ext'), 'i=acp_extensions&amp;mode=main')), E_USER_WARNING);
		}
		else
		{
			return true;
		}
	}
}
