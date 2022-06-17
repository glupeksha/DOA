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
		var_dump($instance);
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
		$dir='../storage/logs/app_logger.log';
		var_dump($dir);
		if (!file_exists($dir)){
			mkdir($dir, 0777, true);
		}

		// Create the logger
        $logger = new Logger('app_logger');
        $logger->pushHandler(new StreamHandler($dir, Level::Debug));
        $logger->info('My logger is now ready');

		
		self::$instance = $logger;
	}

	public static function debug($message, array $context = []){
		self::getLogger()->addDebug($message, $context);
	}

	public static function info($message, array $context = []){
		self::getLogger()->addInfo($message, $context);
	}

	public static function notice($message, array $context = []){
		self::getLogger()->addNotice($message, $context);
	}

	public static function warning($message, array $context = []){
		self::getLogger()->addWarning($message, $context);
	}

	public static function error($message, array $context = []){
		var_dump($error);
		self::getLogger()->addError($message, $context);
	}

	public static function critical($message, array $context = []){
		self::getLogger()->addCritical($message, $context);
	}

	public static function alert($message, array $context = []){
		self::getLogger()->addAlert($message, $context);
	}

	public static function emergency($message, array $context = []){
		self::getLogger()->addEmergency($message, $context);
	}

}