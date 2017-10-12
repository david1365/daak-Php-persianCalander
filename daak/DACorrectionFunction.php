<?php
	/**
     * باقیمانده صحیح
     * @param int $a عدد اول
     * @param int $b عدد دوم
     * @return باقیمانده صحیح 
     */
	function modulus( $a, $b )
	{
		return $a < 0 ? $b - ( abs( $a ) % $b ) : $a % $b;
	}
?>