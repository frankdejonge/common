<?php
/**
 * @package    Fuel\Common
 * @version    2.0
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2013 Fuel Development Team
 * @link       http://fuelphp.com
 */

namespace Fuel\Common;

use Fuel\Dependency\ServiceProvider;

/**
 * ServicesProvider class
 *
 * Defines the services published by this namespace to the DiC
 *
 * @package  Fuel\Common
 *
 * @since  2.0.0
 */
class ServicesProvider extends ServiceProvider
{
	/**
	 * @var  array  list of service names provided by this provider
	 */
	public $provides = array('datacontainer', 'format', 'date');

	/**
	 * Service provider definitions
	 */
	public function provide()
	{
		// \Fuel\Common\DataContainer
		$this->register('datacontainer', function ($dic, array $data = array(), $readOnly = false)
		{
			return new DataContainer($data, $readOnly);
		});

		// \Fuel\Common\Format
		$this->register('format', function ($dic, $data = null, $from_type = null, Array $config = array(), $input = null)
		{
			return new Format($data, $from_type, $config, $input);
		});

		// \Fuel\Common\Date
		$this->register('date', function ($dic, $time = "now", $timezone = null, Array $config = array())
		{
			return new Date($time, $timezone, $config);
		});
	}
}