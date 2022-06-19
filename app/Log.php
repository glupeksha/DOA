<?php
namespace App;

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Log {

	protected static $instance;

	

	/**
	 * Method to return the Monolog instance
	 *
	 * @return \Monolog\Logger
	 */
	static public function getLogger()
	{
		
		if (! self::$instance) {
			self::configureInstance();
		}

		return self::$instance;
	}

	/**
	 * Configure Monolog to use a rotating files system.
	 *
	 * @return Logger
	 */
	protected static function configureInstance()
	{
		$dir=APP_ROOT.'/storage/logs/app_logger.log';

		// Create the logger
        $logger = new Logger('app_logger');
        $logger->pushHandler(new StreamHandler($dir, Level::Debug));
        $logger->debug('Started logging at '.$dir,['file'=>__FILE__,'method' => __METHOD__ ]);

		
		self::$instance = $logger;
	}

	public static function debug($message, array $context = []){
		self::getLogger()->debug($message, $context);
	}

	public static function info($message, array $context = []){
		self::getLogger()->info($message, $context);
	}

	public static function notice($message, array $context = []){
		self::getLogger()->notice($message, $context);
	}

	public static function warning($message, array $context = []){
		self::getLogger()->warning($message, $context);
	}

	public static function error($message, array $context = []){
		self::getLogger()->error($message, $context);
	}

	public static function critical($message, array $context = []){
		self::getLogger()->addCritical($message, $context);
	}

	public static function alert($message, array $context = []){
		self::getLogger()->alert($message, $context);
	}

	public static function emergency($message, array $context = []){
		self::getLogger()->emergency($message, $context);
	}

}