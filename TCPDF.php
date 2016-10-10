<?php

namespace Elibyy\TCPDF;

use Config;

class TCPDF
{
	protected static $format;
	
	protected $app;
	/** @var  TCPDFHelper */
	protected $tcpdf;

	public function __construct($app, $config = 'tcpdf')
	{
		$this->app = $app;
		//dd($config);
		$this->reset($config);
	}

	public function reset($config)
	{
		$this->tcpdf = new TCPDFHelper(
			$config == 'tcpdf' ? Config::get($config . '.page_orientation', 'P') : Config::get($config . '.page_orientation', 'L'),
			Config::get($config . '.page_unit', 'mm'),
			static::$format ? static::$format : Config::get('tcpdf.page_format', 'A4'),
			Config::get($config . '.unicode', true),
			Config::get($config . '.encoding', 'UTF-8')
		);
	}

	public static function changeFormat($format)
	{
		static::$format = $format;
	}

	public function __call($method, $args)
	{
		if (method_exists($this->tcpdf, $method)) {
			return call_user_func_array([$this->tcpdf, $method], $args);
		}
		throw new \RuntimeException(sprintf('the method %s does not exists in TCPDF', $method));
	}

	public function setHeaderCallback($headerCallback)
	{
		$this->tcpdf->setHeaderCallback($headerCallback);
	}

	public function setFooterCallback($footerCallback)
	{
		$this->tcpdf->setFooterCallback($footerCallback);
	}
}
