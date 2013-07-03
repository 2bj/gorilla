<?php

if ( ! function_exists('is_iterable'))
{
	/**
	 * Determine if a given variable is iterable
	 *
	 * @param  mixed $variable
	 * @return bool
	 */
	function is_iterable($var)
	{
		return (is_array($var) or $var instanceof Traversable);
	}
}

if ( ! function_exists('is_json'))
{
	/**
	 * Determine if a given string is json encoded
	 * 
	 * @param  string $string
	 * @return bool
	 */
	function is_json($string)
	{
		json_decode($string);
		return json_last_error() === JSON_ERROR_NONE;
	}
}

if ( ! function_exists('is_serialized'))
{
	/**
	 * Determine if a given string is serialized
	 * 
	 * @param  string $string
	 * @return bool
	 */
	function is_serialized($string)
	{
		$array = @unserialize($string);
		return ! ($array === false and $string !== 'b:0;');
	}
}

if ( ! function_exists('is_html'))
{
	/**
	 * Determine if a given string is json encoded
	 * 
	 * @param  string $string
	 * @return bool
	 */
	function is_html($string)
	{
		return strlen(strip_tags($string)) < strlen($string);
	}
}

if ( ! function_exists('gravatar'))
{
	/**
	 * Generate a URL to a Gravatar profile
	 *
	 * @param  string  $email
	 * @param  integer $size
	 * @return string
	 */
	function gravatar($email, $size = 40)
	{
		return "http://www.gravatar.com/avatar/" . md5(strtolower(trim($email))) . "?s=" . $size;
	}
}

if ( ! function_exists('g_asset'))
{
	/**
	 * Asset URL
	 *
	 * @param  string  $url
	 * @return string
	 */
	function g_asset($url)
	{
		return app('gorilla.asset')->url($url);
	}
}

if ( ! function_exists('g_style'))
{
	/**
	 * CSS tag
	 *
	 * @param  string  $url
	 * @param  array   $attributes
	 * @return string
	 */
	function g_style($url, $attributes = array())
	{
		return app('gorilla.asset')->style($url, $attributes);
	}
}

if ( ! function_exists('g_script'))
{
	/**
	 * Javascript tag
	 *
	 * @param  string  $url
	 * @param  array   $attributes
	 * @return string
	 */
	function g_script($url, $attributes = array())
	{
		return app('gorilla.asset')->script($url, $attributes);
	}
}

if ( ! function_exists('g_image'))
{
	/**
	 * Image tag
	 *
	 * @param  string  $url
	 * @param  string  $alt
	 * @param  array   $attributes
	 * @return string
	 */
	function g_image($url, $alt = null, $attributes = array())
	{
		return app('gorilla.asset')->image($url, $alt, $attributes);
	}
}

if ( ! function_exists('format_size'))
{
	/**
	 * Format Size Unit
	 *
	 * @param  int $bytes
	 * @return string
	 */
	function format_size($bytes)
	{
		return Gorilla\Media::formatSize($bytes);
	}
}