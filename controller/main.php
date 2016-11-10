<?php
/**
*
* @package phpBB Extension - opensearch
* @copyright (c) 2016 tas2580 (https://tas2580.net)
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/
namespace tas2580\opensearch\controller;

use Symfony\Component\HttpFoundation\Response;

class main
{

	/** @var \phpbb\config\config */
	protected $config;

	/** @var string php_ext */
	protected $php_ext;

	/** @var \phpbb\template\template */
	protected $template;

	/**
	 * Constructor
	 *
	 * @param \phpbb\config\config		$config
	 * @param string					$php_ext
	 * @param \phpbb\template\template	$template
	 */
	public function __construct(\phpbb\config\config $config, $php_ext, \phpbb\template\template $template)
	{
		$this->config = $config;
		$this->php_ext = $php_ext;
		$this->template = $template;
	}

	/**
	* Controller for route /paypal
	*
	* @return \Symfony\Component\HttpFoundation\Response A Symfony Response object
	*/
	public function xml()
	{
		$xml = '<?xml version="1.0" encoding="UTF-8"?>';
		$xml .= '<OpenSearchDescription xmlns="http://a9.com/-/spec/opensearch/1.1/" xmlns:moz="http://www.mozilla.org/2006/browser/search/">';
		$xml .= '<ShortName>' . $this->config['sitename'] . '</ShortName>';
		$xml .= '<Description>' . $this->config['site_desc'] . '</Description>';
		$xml .= '<InputEncoding>UTF-8</InputEncoding>';
	//	$xml .= '<Image height="16" width="16" type="image/vnd.microsoft.icon">favicon.ico</Image>';
		$xml .= '<Url type="text/html" template="' . generate_board_url() . '/search.' . $this->php_ext . '?keywords={searchTerms}" />';
		$xml .= '<moz:SearchForm>' . generate_board_url() . '/search.' . $this->php_ext . '</moz:SearchForm>';
		$xml .= '</OpenSearchDescription>';

		$headers = array(
			'Content-Type'		=> 'application/xml; charset=UTF-8',
		);
		return new Response($xml, '200', $headers);
	}
}
