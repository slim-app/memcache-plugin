<?php
namespace SlimPlugin\Memcache;
class Memcache
{
	static private $useM = false;
	public function __construct()
	{
		$use = true;
		if(!class_exists("Memcached"))
		{
			$use = false;
		}
		if($use == true)
		{
			self::$useM = true;
			$self->mc = new \Memcached();
			$self->mc->addServer("127.0.0.1", 11211);
		}
	}
	public function set($key, $value, $expire = 0)
	{
		if(self::$useM==true)
		{
			$self->mc->set($key, $value, $expire);
		}
	}
	public function get($key)
	{
		if(self::$useM==false)
		{
			return false;
		}
		return $self->mc->get($key);
	}
}
