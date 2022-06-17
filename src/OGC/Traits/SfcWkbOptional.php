<?php

namespace TontonsB\SF\OGC\Traits;

use TontonsB\SF\OGC\Contracts\Polygon;

/**
 * Implements constructors according to
 * Table 6 — Optional SQL functions for constructing a geometric object given
 * its Well-known Binary Representation
 * of "OpenGIS® Implementation Standard for Geographic information - Simple
 * feature access - Part 2: SQL option" Version 1.1.0
 */
trait SfcWkbOptional
{
	/**
	 * Create a Polygon from MultiLineString WKB.
	 *
	 * If SRID is omitted, we will also omit it.
	 */
	public static function bdPolyFromWKB(string $WKBMultiLineString, int $SRID = null): Polygon
	{
		return is_null($SRID)
			? static::polygonFromMethod('ST_BdPolyFromWKB', $WKBMultiLineString)
			: static::polygonFromMethod('ST_BdPolyFromWKB', $WKBMultiLineString, $SRID);
	}

	// TODO: bdMPolyFromWKB
}