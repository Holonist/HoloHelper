<?php

namespace Holonaut\HoloHelper;

use Illuminate\Support\Facades\Cache;

class HoloHelper
{
	public static function cached(string $key, \Closure $function, int $duration) {
		if (Cache::has($key)) {
			return Cache::get($key);
		}

		// execute the function to generate our result
		$result = $function();

		// store the result
		Cache::put($key, $result, $duration);
		
		return $result;
	}
}