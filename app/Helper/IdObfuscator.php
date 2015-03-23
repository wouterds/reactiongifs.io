<?php namespace App\Helper;

class IdObfuscator
{
	private static $MAXINT = 2147483647;
	private static $PRIME = 846239461;
	private static $PRIMEINV = 120600301;
	private static $RANDXOR = 384482484;

	public static function encode($id) {
		if ($id > self::$MAXINT) {
			throw new Exception('ID IS BIGGER THAN MAX INT');
		}

		if ($id <= 0) {
			throw new Exception('ID IS SMALLER THAN 0');
		}

		return intval((($id * self::$PRIME) & self::$MAXINT) ^ self::$RANDXOR);
	}

	public static function encodeMultiple($ids) {
		foreach ($ids as &$id) {
			$id = self::encode($id);
		}

		return $ids;
	}

	public static function decode($obfuscatedId) {
		return intval((($obfuscatedId ^ self::$RANDXOR) * self::$PRIMEINV) & self::$MAXINT);
	}

	public static function decodeMultiple($ids) {
		foreach ($ids as &$id) {
			$id = self::decode($id);
		}

		return $ids;
	}
}
