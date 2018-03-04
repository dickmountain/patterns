<?php

namespace App\Config;

use App\Config\Contracts\ParserInterface;

class Config
{
	private $parser;
	protected $config;

	public function __construct(ParserInterface $parser)
	{
		$this->setParser($parser);
	}

	public function setParser(ParserInterface $parser) : void
	{
		$this->parser = $parser;
	}

	public function load(string $file) : void
	{
		$this->config = $this->parser->parse($file);
	}

	public function get(string $key, string $default = null) : string
	{
		$keys = explode('.', $key);
		$config = $this->config;

		foreach($keys as $key){
			$config = $config[$key] ?? $default;

			if($config == $default) break;
		}

		return $config;
	}
}