<?php
/**
 * CakeTime utility class file.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Utility
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Multibyte', 'I18n');

/**
 * Time Helper class for easy use of time data.
 *
 * Manipulation of time data.
 *
 * @package       Cake.Utility
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/time.html
 */
class CakeTime {

/**
 * The format to use when formatting a time using `CakeTime::nice()`
 *
 * The format should use the locale strings as defined in the PHP docs under
 * `strftime` (http://php.net/manual/en/function.strftime.php)
 *
 * @var string
 * @see CakeTime::format()
 */
	public static $niceFormat = '%a, %b %eS %Y, %H:%M';

/**
 * The format to use when formatting a time using `CakeTime::timeAgoInWords()`
 * and the difference is more than `CakeTime::$wordEnd`
 *
 * @var string
 * @see CakeTime::timeAgoInWords()
 */
	public static $wordFormat = 'j/n/y';

/**
 * The format to use when formatting a time using `CakeTime::niceShort()`
 * and the difference is between 3 and 7 days
 *
 * @var string
 * @see CakeTime::niceShort()
 */
	public static $niceShortFormat = '%d/%m, %H:%M';

/**
 * The format to use when formatting a time using `CakeTime::timeAgoInWords()`
 * and the difference is less than `CakeTime::$wordEnd`
 *
 * @var array
 * @see CakeTime::timeAgoInWords()
 */
	public static $wordAccuracy = array(
		'year' => "day",
		'month' => "day",
		'week' => "day",
		'day' => "hour",
		'hour' => "minute",
		'minute' => "minute",
		'second' => "second",
	);

/**
 * The end of relative time telling
 *
 * @var string
 * @see CakeTime::timeAgoInWords()
 */
	public static $wordEnd = '+1 month';

/**
 * Temporary variable containing timestamp value, used internally convertSpecifiers()
 */
	protected static $_time = null;

/**
 * Magic set method for backward compatibility.
 *
 * Used by TimeHelper to modify static variables in CakeTime
 */
	public function __set($name, $value) {
		switch ($name) {
			case 'niceFormat':
				self::${$name} = $value;
				break;
			default:
				break;
		}
	}

/**
 * Magic set method for backward compatibility.
 *
 * Used by TimeHelper to get static variables in CakeTime
 */
	public function __get($name) {
		switch ($name) {
			case 'niceFormat':
				return self::${$name};
				break;
			default:
				return null;
				break;
		}
	}

/**
 * Converts a string representing the format for the function strftime and returns a
 * windows safe and i18n aware format.
 *
 * @param string $format Format with specifiers for strftime function.
 *    Accepts the special specifier %S which mimics the modifier S for date()
 * @param string $time UNIX timestamp
 * @return string windows safe and date() function compatible format for strftime
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/time.html#formatting
 */
	public static function convertSpecifiers($format, $time = null) {
		if (!$time) {
			$time = time();
		}
		self::$_time = $time;
		return preg_replace_callback('/\%(\w+)/', array('CakeTime', '_translateSpecifier'), $format);
	}

/**
 * Auxiliary function to translate a matched specifier element from a regular expression into
 * a windows safe and i18n aware specifier
 *
 * @param array $specifier match from regular expression
 * @return string converted element
 */
	protected static function _translateSpecifier($specifier) {
		switch ($specifier[1]) {
			case 'a':
				$abday = __dc('cake', 'abday', 5);
				if (is_array($abday)) {
					return $abday[date('w', self::$_time)];
				}
				break;
			case 'A':
				$day = __dc('cake', 'day', 5);
				if (is_array($day)) {
					return $day[date('w', self::$_time)];
				}
				break;
			case 'c':
				$format = __dc('cake', 'd_t_fmt', 5);
				if ($format != 'd_t_fmt') {
					return self::convertSpecifiers($format, self::$_time);
				}
				break;
			case 'C':
				return sprintf("%02d", date('Y', self::$_time) / 100);
			case 'D':
				return '%m/%d/%y';
			case 'e':
				if (DS === '/') {
					return '%e';
				}
				$day = date('j', self::$_time);
				if ($day < 10) {
					$day = ' ' . $day;
				}
				return $day;
			case 'eS' :
				return date('jS', self::$_time);
			case 'b':
			case 'h':
				$months = __dc('cake', 'abmon', 5);
				if (is_array($months)) {
					return $months[date('n', self::$_time) - 1];
				}
				return '%b';
			case 'B':
				$months = __dc('cake', 'mon', 5);
				if (is_array($months)) {
					return $months[date('n', self::$_time) - 1];
				}
				break;
			case 'n':
				return "\n";
			case 'p':
			case 'P':
				$default = array('am' => 0, 'pm' => 1);
				$meridiem = $default[date('a', self::$_time)];
				$format = __dc('cake', 'am_pm', 5);
				if (is_array($format)) {
					$meridiem = $format[$meridiem];
					return ($specifier[1] == 'P') ? strtolower($meridiem) : strtoupper($meridiem);
				}
				break;
			case 'r':
				$complete = __dc('cake', 't_fmt_ampm', 5);
				if ($complete != 't_fmt_ampm') {
					return str_replace('%p', self::_translateSpecifier(array('%p', 'p')), $complete);
				}
				break;
			case 'R':
				return date('H:i', self::$_time);
			case 't':
				return "\t";
			case 'T':
				return '%H:%M:%S';
			case 'u':
				return ($weekDay = date('w', self::$_time)) ? $weekDay : 7;
			case 'x':
				$format = __dc('cake', 'd_fmt', 5);
				if ($format != 'd_fmt') {
					return self::convertSpecifiers($format, self::$_time);
				}
				break;
			case 'X':
				$format = __dc('cake', 't_fmt', 5);
				if ($format != 't_fmt') {
					return self::convertSpecifiers($format, self::$_time);
				}
				break;
		}
		return $specifier[0];
	}

/**
 * Converts given time (in server's time zone) to user's local time, given his/her timezone.
 *
 * @param string $serverTime UNIX timestamp
 * @param string|DateTimeZone $timezone User's timezone string or DateTimeZone object
 * @return integer UNIX timestamp
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/time.html#formatting
 */
	public static function convert($serverTime, $timezone) {
		static $serverTimezone = null;
		if (is_null($serverTimezone) || (date_default_timezone_get() !== $serverTimezone->getName())) {
			$serverTimezone = new DateTimeZone(date_default_timezone_get());
		}
		$serverOffset = $serverTimezone->getOffset(new DateTime('@' . $serverTime));
		$gmtTime = $serverTime - $serverOffset;
		if (is_numeric($timezone)) {
			$userOffset = $timezone * (60 * 60);
		} else {
			$timezone = self::timezone($timezone);
			$userOffset = $timezone->getOffset(new DateTime('@' . $gmtTime));
		}
		$userTime = $gmtTime + $userOffset;
		return (int)$userTime;
	}

/**
 * Returns a timezone object from a string or the user's timezone object
 *
 * @param string|DateTimeZone $timezone Timezone string or DateTimeZone object
 * 	If null it tries to get timezone from 'Config.timezone' config var
 * @return DateTimeZone Timezone object
 */
	public static function timezone($timezone = null) {
		static $tz = null;

		if (is_object($timezone)) {
			if ($tz === null || $tz->getName() !== $timezone->getName()) {
				$tz = $timezone;
			}
		} else {
			if ($timezone === null) {
				$timezone = Configure::read('Config.timezone');
				if ($timezone === null) {
					$timezone = date_default_timezone_get();
				}
			}

			if ($tz === null || $tz->getName() !== $timezone) {
				$tz = new DateTimeZone($timezone);
			}
		}

		return $tz;
	}

/**
 * Returns server's offset from GMT in seconds.
 *
 * @return integer Offset
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/time.html#formatting
 */
	public static function serverOffset() {
		return date('Z', time());
	}

/**
 * Returns a UNIX timestamp, given either a UNIX timestamp or a valid strtotime() date string.
 *
 * @param integer|string|DateTime $dateString UNIX timestamp, strtotime() valid string or DateTime object
 * @param string|DateTimeZone $timezone Timezone string or DateTimeZone object
 * @return string Parsed timestamp
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/time.html#formatting
 */
	public static function fromString($dateString, $timezone = null) {
		if (empty($dateString)) {
			return false;
		}

		if (is_integer($dateString) || is_numeric($dateString)) {
			$date = intval($dateString);
		} elseif (is_object($dateString) && $dateString instanceof DateTime) {
			$dateString->setTimezone(new DateTimeZone(date_default_timezone_get()));
			$date = (int)$dateString->format('U') + $dateString->getOffset();
		} else {
			$date = strtotime($dateString);
		}

		if ($timezone === null) {
			$timezone = Configure::read('Config.timezone');
		}

		if ($timezone !== null) {
			return self::convert($date, $timezone);
		}
		if ($date === -1) {
			return false;
		}
		return $date;
	}

/**
 * Returns a nicely formatted date string for given Datetime string.
 *
 * See http://php.net/manual/en/function.strftime.php for information on formatting
 * using locale strings.
 *
 * @param integer|string|DateTime $dateString UNIX timestamp, strtotime() valid string or DateTime object
 * @param string|DateTimeZone $timezone Timezone string or DateTimeZone object
 * @param string $format The format to use. If null, `TimeHelper::$niceFormat` is used
 * @return string Formatted date string
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/time.html#formatting
 */
	public static function nice($dateString = null, $timezone = null, $format = null) {
		if (!$dateString) {
			$dateString = time();
		}
		$date = self::fromString($dateString, $timezone);

		if (!$format) {
			$format = self::$niceFormat;
		}
		$format = self::convertSpecifiers($format, $date);
		return self::_strftime($format, $date);
	}

/**
 * Returns a formatted descriptive date string for given datetime string.
 *
 * If the given date is today, the returned string could be "Today, 16:54".
 * If the given date is tomorrow, the returned string could be "Tomorrow, 16:54".
 * If the given date was yesterday, the returned string could be "Yesterday, 16:54".
 * If the given date is within next or last week, the returned string could be "On Thursday, 16:54".
 * If $dateString's year is the current year, the returned string does not
 * include mention of the year.
 *
 * @param integer|string|DateTime $dateString UNIX timestamp, strtotime() valid string or DateTime object
 * @param string|DateTimeZone $timezone Timezone string or DateTimeZone object
 * @return string Described, relative date string
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/time.html#formatting
 */
	public static function niceShort($dateString = null, $timezone = null) {
		if (!$dateString) {
			$dateString = time();
		}
		$date = self::fromString($dateString, $timezone);

		$y = self::isThisYear($date) ? '' : ' %Y';

		$d = self::_strftime("%w", $date);
		$day = array(
			__d('cake', 'Sunday'),
			__d('cake', 'Monday'),
			__d('cake', 'Tuesday'),
			__d('cake', 'Wednesday'),
			__d('cake', 'Thursday'),
			__d('cake', 'Friday'),
			__d('cake', 'Saturday')
		);

		if (self::isToday($dateString, $timezone)) {
			$ret = __d('cake', 'Today, %s', self::_strftime("%H:%M", $date));
		} elseif (self::wasYesterday($dateString, $timezone)) {
			$ret = __d('cake', 'Yesterday, %s', self::_strftime("%H:%M", $date));
		} elseif (self::isTomorrow($dateString, $timezone)) {
			$ret = __d('cake', 'Tomorrow, %s', self::_strftime("%H:%M", $date));
		} elseif (self::wasWithinLast('7 days', $dateString, $timezone)) {
			$ret = sprintf('%s %s', $day[$d], self::_strftime(self::$niceShortFormat, $date));
		} elseif (self::isWithinNext('7 days', $dateString, $timezone)) {
			$ret = __d('cake', 'On %s %s', $day[$d], self::_strftime(self::$niceShortFormat, $date));
		} else {
			$format = self::convertSpecifiers("%b %eS{$y}, %H:%M", $date);
			$ret = self::_strftime($format, $date);
		}
		return $ret;
	}

/**
 * Returns a partial SQL string to search for all records between two dates.
 *
 * @param integer|string|DateTime $begin UNIX timestamp, strtotime() valid string or DateTime object
 * @param integer|string|DateTime $end UNIX timestamp, strtotime() valid string or DateTime object
 * @param string $fieldName Name of database field to compare with
 * @param string|DateTimeZone $timezone Timezone string or DateTimeZone object
 * @return string Partial SQL string.
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/time.html#formatting
 */
	public static function daysAsSql($begin, $end, $fieldName, $timezone = null) {
		$begin = self::fromString($begin, $timezone);
		$end = self::fromString($end, $timezone);
		$begin = date('Y-m-d', $begin) . ' 00:00:00';
		$end = date('Y-m-d', $end) . ' 23:59:59';

		return "($fieldName >= '$begin') AND ($fieldName <= '$end')";
	}

/**
 * Returns a partial SQL string to search for all records between two times
 * occurring on the same day.
 *
 * @param integer|string|DateTime $dateString UNIX timestamp, strtotime() valid string or DateTime object
 * @param string $fieldName Name of database field to compare with
 * @param string|DateTimeZone $timezone Timezone string or DateTimeZone object
 * @return string Partial SQL string.
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/time.html#formatting
 */
	public static function dayAsSql($dateString, $fieldName, $timezone = null) {
		return self::daysAsSql($dateString, $dateString, $fieldName);
	}

/**
 * Returns true if given datetime string is today.
 *
 * @param integer|string|DateTime $dateString UNIX timestamp, strtotime() valid string or DateTime object
 * @param string|DateTimeZone $timezone Timezone string or DateTimeZone object
 * @return boolean True if datetime string is today
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/time.html#testing-time
 */
	public static function isToday($dateString, $timezone = null) {
		$date = self::fromString($dateString, $timezone);
		return date('Y-m-d', $date) == date('Y-m-d', time());
	}

/**
 * Returns true if given datetime string is within this week.
 *
 * @param integer|string|DateTime $dateString UNIX timestamp, strtotime() valid string or DateTime object
 * @param string|DateTimeZone $timezone Timezone string or DateTimeZone object
 * @return boolean True if datetime string is within current week
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/time.html#testing-time
 */
	public static function isThisWeek($dateString, $timezone = null) {
		$date = self::fromString($dateString, $timezone);
		return date('W o', $date) == date('W o', time());
	}

/**
 * Returns true if given datetime string is within this month
 * @param integer|string|DateTime $dateString UNIX timestamp, strtotime() valid string or DateTime object
 * @param string|DateTimeZone $timezone Timezone string or DateTimeZone object
 * @return boolean True if datetime string is within current month
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/time.html#testing-time
 */
	public static function isThisMonth($dateString, $timezone = null) {
		$date = self::fromString($dateString);
		return date('m Y', $date) == date('m Y', time());
	}

/**
 * Returns true if given datetime string is within current year.
 *
 * @param integer|string|DateTime $dateString UNIX timestamp, strtotime() valid string or DateTime object
 * @param string|DateTimeZone $timezone Timezone string or DateTimeZone object
 * @return boolean True if datetime string is within current year
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/time.html#testing-time
 */
	public static function isThisYear($dateString, $timezone = null) {
		$date = self::fromString($dateString, $timezone);
		return date('Y', $date) == date('Y', time());
	}

/**
 * Returns true if given datetime string was yesterday.
 *
 * @param integer|string|DateTime $dateString UNIX timestamp, strtotime() valid string or DateTime object
 * @param string|DateTimeZone $timezone Timezone string or DateTimeZone object
 * @return boolean True if datetime string was yesterday
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/time.html#testing-time
 *
 */
	public static function wasYesterday($dateString, $timezone = null) {
		$date = self::fromString($dateString, $timezone);
		return date('Y-m-d', $date) == date('Y-m-d', strtotime('yesterday'));
	}

/**
 * Returns true if given datetime string is tomorrow.
 *
 * @param integer|string|DateTime $dateString UNIX timestamp, strtotime() valid string or DateTime object
 * @param string|DateTimeZone $timezone Timezone string or DateTimeZone object
 * @return boolean True if datetime string was yesterday
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/time.html#testing-time
 */
	public static function isTomorrow($dateString, $timezone = null) {
		$date = self::fromString($dateString, $timezone);
		return date('Y-m-d', $date) == date('Y-m-d', strtotime('tomorrow'));
	}

/**
 * Returns the quarter
 *
 * @param integer|string|DateTime $dateString UNIX timestamp, strtotime() valid string or DateTime object
 * @param boolean $range if true returns a range in Y-m-d format
 * @return mixed 1, 2, 3, or 4 quarter of year or array if $range true
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/time.html#formatting
 */
	public static function toQuarter($dateString, $range = false) {
		$time = self::fromString($dateString);
		$date = ceil(date('m', $time) / 3);

		if ($range === true) {
			$range = 'Y-m-d';
		}

		if ($range !== false) {
			$year = date('Y', $time);

			switch ($date) {
				case 1:
					$date = array($year . '-01-01', $year . '-03-31');
					break;
				case 2:
					$date = array($year . '-04-01', $year . '-06-30');
					break;
				case 3:
					$date = array($year . '-07-01', $year . '-09-30');
					break;
				case 4:
					$date = array($year . '-10-01', $year . '-12-31');
					break;
			}
		}
		return $date;
	}

/**
 * Returns a UNIX timestamp from a textual datetime description. Wrapper for PHP function strtotime().
 * @param integer|string|DateTime $dateString UNIX timestamp, strtotime() valid string or DateTime object
 * @param string|DateTimeZone $timezone Timezone string or DateTimeZone object
 * @return integer Unix timestamp
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/time.html#formatting
 */
	public static function toUnix($dateString, $timezone = null) {
		return self::fromString($dateString, $timezone);
	}

/**
 * Returns a formatted date in server's timezone.
 *
 * If a DateTime object is given or the dateString has a timezone
 * segment, the timezone parameter will be ignored.
 *
 * If no timezone parameter is given and no DateTime object, the passed $dateString will be
 * considered to be in the UTC timezone.
 *
 * @param integer|string|DateTime $dateString UNIX timestamp, strtotime() valid string or DateTime object
 * @param string|DateTimeZone $timezone Timezone string or DateTimeZone object
 * @param string $format date format string
 * @return mixed Formatted date
 */
	public static function toServer($dateString, $timezone = null, $format = 'Y-m-d H:i:s') {
		if ($timezone === null) {
			$timezone = new DateTimeZone('UTC');
		} elseif (is_string($timezone)) {
			$timezone = new DateTimeZone($timezone);
		} elseif (!($timezone instanceof DateTimeZone)) {
			return false;
		}

		if ($dateString instanceof DateTime) {
			$date = $dateString;
		} elseif (is_integer($dateString) || is_numeric($dateString)) {
			$dateString = (int)$dateString;

			$date = new DateTime('@' . $dateString);
			$date->setTimezone($timezone);
		} else {
			$date = new DateTime($dateString, $timezone);
		}

		$date->setTimezone(new DateTimeZone(date_default_timezone_get()));
		return $date->format($format);
	}

/**
 * Returns a date formatted for Atom RSS feeds.
 *
 * @param string $dateString Datetime string or Unix timestamp
 * @param string|DateTimeZone $timezone Timezone string or DateTimeZone object
 * @return string Formatted date string
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/time.html#formatting
 */
	public static function toAtom($dateString, $timezone = null) {
		$date = self::fromString($dateString, $timezone);
		return date('Y-m-d\TH:i:s\Z', $date);
	}

/**
 * Formats date for RSS feeds
 *
 * @param integer|string|DateTime $dateString UNIX timestamp, strtotime() valid string or DateTime object
 * @param string|DateTimeZone $timezone Timezone string or DateTimeZone object
 * @return string Formatted date string
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/time.html#formatting
 */
	public static function toRSS($dateString, $timezone = null) {
		$date = self::fromString($dateString, $timezone);

		if (!is_null($timezone)) {
			if (is_numeric($timezone)) {
				$userOffset = $timezone;
			} else {
				if (!is_object($timezone)) {
					$timezone = new DateTimeZone($timezone);
				}
				$currentDate = new DateTime('@' . $date);
				$currentDate->setTimezone($timezone);
				$userOffset = $timezone->getOffset($currentDate) / 60 / 60;
			}
			if ($userOffset == 0) {
				$timezone = '+0000';
			} else {
				$hours = (int)floor(abs($userOffset));
				$minutes = (int)(fmod(abs($userOffset), $hours) * 60);
				$timezone = ($userOffset < 0 ? '-' : '+') . str_pad($hours, 2, '0', STR_PAD_LEFT) . str_pad($minutes, 2, '0', STR_PAD_LEFT);
			}
			return date('D, d M Y H:i:s', $date) . ' ' . $timezone;
		}
		return date("r", $date);
	}

/**
 * Returns either a relative date or a formatted date depending
 * on the difference between the current time and given datetime.
 * $datetime should be in a *strtotime* - parsable format, like MySQL's datetime datatype.
 *
 * ### Options:
 *
 * - `format` => a fall back format if the relative time is longer than the duration specified by end
 * - `accuracy` => Specifies how accurate the date should be described (array)
 *    - year =>   The format if years > 0   (default "day")
 *    - month =>  The format if months > 0  (default "day")
 *    - week =>   The format if weeks > 0   (default "day")
 *    - day =>    The format if weeks > 0   (default "hour")
 *    - hour =>   The format if hours > 0   (default "minute")
 *    - minute => The format if minutes > 0 (default "minute")
 *    - second => The format if seconds > 0 (default "second")
 * - `end` => The end of relative time telling
 * - `userOffset` => Users offset from GMT (in hours) *Deprecated* use timezone intead.
 * - `timezone` => The user timezone the timestamp should be formatted in.
 *
 * Relative dates look something like this:
 *
 * - 3 weeks, 4 days ago
 * - 15 seconds ago
 *
 * Default date formatting is d/m/yy e.g: on 18/2/09
 *
 * The returned string includes 'ago' or 'on' and assumes you'll properly add a word
 * like 'Posted ' before the function output.
 *
 * NOTE: If the difference is one week or more, the lowest level of accuracy is day
 *
 * @param integer|string|DateTime $dateTime Datetime UNIX timestamp, strtotime() valid string or DateTime object
 * @param array $options Default format if timestamp is used in $dateString
 * @return string Relative time string.
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/time.html#formatting
 */
	public static function timeAgoInWords($dateTime, $options = array()) {
		$timezone = null;
		$format = self::$wordFormat;
		$end = self::$wordEnd;
		$accuracy = self::$wordAccuracy;

		if (is_array($options)) {
			if (isset($options['userOffset'])) {
				$timezone = $options['userOffset'];
			} elseif (isset($options['timezone'])) {
				$timezone = $options['timezone'];
			}

			if (isset($options['accuracy'])) {
				if (is_array($options['accuracy'])) {
					$accuracy = array_merge($accuracy, $options['accuracy']);
				} else {
					foreach ($accuracy as $key => $level) {
						$accuracy[$key] = $options['accuracy'];
					}
				}
			}

			if (isset($options['format'])) {
				$format = $options['format'];
				unset($options['format']);
			}
			if (isset($options['end'])) {
				$end = $options['end'];
				unset($options['end']);
			}
		} else {
			$format = $options;
		}

		$now = self::fromString(time(), $timezone);
		$inSeconds = self::fromString($dateTime, $timezone);
		$backwards = ($inSeconds > $now);

		if ($backwards) {
			$futureTime = $inSeconds;
			$pastTime = $now;
		} else {
			$futureTime = $now;
			$pastTime = $inSeconds;
		}
		$diff = $futureTime - $pastTime;

		// If more than a week, then take into account the length of months
		if ($diff >= 604800) {
			list($future['H'], $future['i'], $future['s'], $future['d'], $future['m'], $future['Y']) = explode('/', date('H/i/s/d/m/Y', $futureTime));

			list($past['H'], $past['i'], $past['s'], $past['d'], $past['m'], $past['Y']) = explode('/', date('H/i/s/d/m/Y', $pastTime));
			$years = $months = $weeks = $days = $hours = $minutes = $seconds = 0;

			$years = $future['Y'] - $past['Y'];
			$months = $future['m'] + ((12 * $years) - $past['m']);

			if ($months >= 12) {
				$years = floor($months / 12);
				$months = $months - ($years * 12);
			}
			if ($future['m'] < $past['m'] && $future['Y'] - $past['Y'] == 1) {
				$years--;
			}

			if ($future['d'] >= $past['d']) {
				$days = $future['d'] - $past['d'];
			} else {
				$daysInPastMonth = date('t', $pastTime);
				$daysInFutureMonth = date('t', mktime(0, 0, 0, $future['m'] - 1, 1, $future['Y']));

				if (!$backwards) {
					$days = ($daysInPastMonth - $past['d']) + $future['d'];
				} else {
					$days = ($daysInFutureMonth - $past['d']) + $future['d'];
				}

				if ($future['m'] != $past['m']) {
					$months--;
				}
			}

			if ($months == 0 && $years >= 1 && $diff < ($years * 31536000)) {
				$months = 11;
				$years--;
			}

			if ($months >= 12) {
				$years = $years + 1;
				$months = $months - 12;
			}

			if ($days >= 7) {
				$weeks = floor($days / 7);
				$days = $days - ($weeks * 7);
			}
		} else {
			$years = $months = $weeks = 0;
			$days = floor($diff / 86400);

			$diff = $diff - ($days * 86400);

			$hours = floor($diff / 3600);
			$diff = $diff - ($hours * 3600);

			$minutes = floor($diff / 60);
			$diff = $diff - ($minutes * 60);
			$seconds = $diff;
		}
		$relativeDate = '';
		$diff = $futureTime - $pastTime;

		if ($diff > abs($now - self::fromString($end))) {
			$relativeDate = __d('cake', 'on %s', date($format, $inSeconds));
		} else {
			if ($years > 0) {
				$f = $accuracy['year'];
			} elseif (abs($months) > 0) {
				$f = $accuracy['month'];
			} elseif (abs($weeks) > 0) {
				$f = $accuracy['week'];
			} elseif (abs($days) > 0) {
				$f = $accuracy['day'];
			} elseif (abs($hours) > 0) {
				$f = $accuracy['hour'];
			} elseif (abs($minutes) > 0) {
				$f = $accuracy['minute'];
			} else {
				$f = $accuracy['second'];
			}

			$f = str_replace(array('year', 'month', 'week', 'day', 'hour', 'minute', 'second'), array(1, 2, 3, 4, 5, 6, 7), $f);

			$relativeDate .= $f >= 1 && $years > 0 ? ($relativeDate ? ', ' : '') . __dn('cake', '%d year', '%d years', $years, $years) : '';
			$relativeDate .= $f >= 2 && $months > 0 ? ($relativeDate ? ', ' : '') . __dn('cake', '%d month', '%d months', $months, $months) : '';
			$relativeDate .= $f >= 3 && $weeks > 0 ? ($relativeDate ? ', ' : '') . __dn('cake', '%d week', '%d weeks', $weeks, $weeks) : '';
			$relativeDate .= $f >= 4 && $days > 0 ? ($relativeDate ? ', ' : '') . __dn('cake', '%d day', '%d days', $days, $days) : '';
			$relativeDate .= $f >= 5 && $hours > 0 ? ($relativeDate ? ', ' : '') . __dn('cake', '%d hour', '%d hours', $hours, $hours) : '';
			$relativeDate .= $f >= 6 && $minutes > 0 ? ($relativeDate ? ', ' : '') . __dn('cake', '%d minute', '%d minutes', $minutes, $minutes) : '';
			$relativeDate .= $f >= 7 && $seconds > 0 ? ($relativeDate ? ', ' : '') . __dn('cake', '%d second', '%d seconds', $seconds, $seconds) : '';

			if (!$backwards) {
				$relativeDate = __d('cake', '%s ago', $relativeDate);
			}
		}

		// If within the last or next 7 days
		if (self::wasWithinLast('7 days', $dateTime, $timezone) || self::isWithinNext('7 days', $dateTime, $timezone)) {
			$relativeDate = self::niceShort($dateTime , $timezone);
		}

		// If now
		if ($diff == 0) {
			$relativeDate = __d('cake', 'just now', 'just now');
		}
		return $relativeDate;
	}

/**
 * Returns true if specified datetime was within the interval specified, else false.
 *
 * @param string|integer $timeInterval the numeric value with space then time type.
 *    Example of valid types: 6 hours, 2 days, 1 minute.
 * @param integer|string|DateTime $dateString UNIX timestamp, strtotime() valid string or DateTime object
 * @param string|DateTimeZone $timezone Timezone string or DateTimeZone object
 * @return boolean
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/time.html#testing-time
 */
	public static function wasWithinLast($timeInterval, $dateString, $timezone = null) {
		$tmp = str_replace(' ', '', $timeInterval);
		if (is_numeric($tmp)) {
			$timeInterval = $tmp . ' ' . __d('cake', 'days');
		}

		$date = self::fromString($dateString, $timezone);
		$interval = self::fromString('-' . $timeInterval);

		if ($date >= $interval && $date <= time()) {
			return true;
		}
		return false;
	}

/**
 * Returns true if specified datetime is within the interval specified, else false.
 *
 * @param string|integer $timeInterval the numeric value with space then time type.
 *    Example of valid types: 6 hours, 2 days, 1 minute.
 * @param integer|string|DateTime $dateString UNIX timestamp, strtotime() valid string or DateTime object
 * @param string|DateTimeZone $timezone Timezone string or DateTimeZone object
 * @return boolean
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/time.html#testing-time
 */
	public static function isWithinNext($timeInterval, $dateString, $timezone = null) {
		$tmp = str_replace(' ', '', $timeInterval);
		if (is_numeric($tmp)) {
			$timeInterval = $tmp . ' ' . __d('cake', 'days');
		}

		$date = self::fromString($dateString, $timezone);
		$interval = self::fromString('+' . $timeInterval);

		if ($date <= $interval && $date >= time()) {
			return true;
		}
		return false;
	}

/**
 * Returns gmt as a UNIX timestamp.
 *
 * @param integer|string|DateTime $dateString UNIX timestamp, strtotime() valid string or DateTime object
 * @return integer UNIX timestamp
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/time.html#formatting
 */
	public static function gmt($dateString = null) {
		if ($dateString != null) {
			$time = self::fromString($dateString);
		} else {
			$time = time();
		}
		$hour = intval(date("G", $time));
		$minute = intval(date("i", $time));
		$second = intval(date("s", $time));
		$month = intval(date("n", $time));
		$day = intval(date("j", $time));
		$year = intval(date("Y", $time));
		return gmmktime($hour, $minute, $second, $month, $day, $year);
	}

/**
 * Returns a formatted date string, given either a UNIX timestamp or a valid strtotime() date string.
 * This function also accepts a time string and a format string as first and second parameters.
 * In that case this function behaves as a wrapper for TimeHelper::i18nFormat()
 *
 * @param integer|string|DateTime $format date format string (or UNIX timestamp, strtotime() valid string or DateTime object)
 * @param integer|string|DateTime $date UNIX timestamp, strtotime() valid string or DateTime object (or a date format string)
 * @param boolean $invalid flag to ignore results of fromString == false
 * @param string|DateTimeZone $timezone Timezone string or DateTimeZone object
 * @return string Formatted date string
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/time.html#formatting
 */
	public static function format($format, $date = null, $invalid = false, $timezone = null) {
		$time = self::fromString($date, $timezone);
		$_time = is_numeric($time) ? false : self::fromString($format, $timezone);

		if (is_numeric($_time) && $time === false) {
			$format = $date;
			return self::i18nFormat($_time, $format, $invalid, $timezone);
		}
		if ($time === false && $invalid !== false) {
			return $invalid;
		}
		return date($format, $time);
	}

/**
 * Returns a formatted date string, given either a UNIX timestamp or a valid strtotime() date string.
 * It take in account the default date format for the current language if a LC_TIME file is used.
 *
 * @param integer|string|DateTime $date UNIX timestamp, strtotime() valid string or DateTime object
 * @param string $format strftime format string.
 * @param boolean $invalid flag to ignore results of fromString == false
 * @param string|DateTimeZone $timezone Timezone string or DateTimeZone object
 * @return string Formatted and translated date string
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/time.html#formatting
 */
	public static function i18nFormat($date, $format = null, $invalid = false, $timezone = null) {
		$date = self::fromString($date, $timezone);
		if ($date === false && $invalid !== false) {
			return $invalid;
		}
		if (empty($format)) {
			$format = '%x';
		}
		$format = self::convertSpecifiers($format, $date);
		return self::_strftime($format, $date);
	}

/**
 * Get list of timezone identifiers
 *
 * @param integer|string $filter A regex to filter identifer
 * 	Or one of DateTimeZone class constants (PHP 5.3 and above)
 * @param string $country A two-letter ISO 3166-1 compatible country code.
 * 	This option is only used when $filter is set to DateTimeZone::PER_COUNTRY (available only in PHP 5.3 and above)
 * @param boolean $group If true (default value) groups the identifiers list by primary region
 * @return array List of timezone identifiers
 * @since 2.2
 */
	public static function listTimezones($filter = null, $country = null, $group = true) {
		$regex = null;
		if (is_string($filter)) {
			$regex = $filter;
			$filter = null;
		}
		if (version_compare(PHP_VERSION, '5.3.0', '<')) {
			if ($regex === null) {
				$regex = '#^((Africa|America|Antartica|Arctic|Asia|Atlantic|Australia|Europe|Indian|Pacific)/|UTC)#';
			}
			$identifiers = DateTimeZone::listIdentifiers();
		} else {
			if ($filter === null) {
				$filter = DateTimeZone::ALL;
			}
			$identifiers = DateTimeZone::listIdentifiers($filter, $country);
		}

		if ($regex) {
			foreach ($identifiers as $key => $tz) {
				if (!preg_match($regex, $tz)) {
					unset($identifiers[$key]);
				}
			}
		}

		if ($group) {
			$return = array();
			foreach ($identifiers as $key => $tz) {
				$item = explode('/', $tz, 2);
				if (isset($item[1])) {
					$return[$item[0]][$tz] = $item[1];
				} else {
					$return[$item[0]] = array($tz => $item[0]);
				}
			}
			return $return;
		} else {
			return array_combine($identifiers, $identifiers);
		}
	}

/**
 * Multibyte wrapper for strftime.
 *
 * Handles utf8_encoding the result of strftime when necessary.
 *
 * @param string $format Format string.
 * @param integer $date Timestamp to format.
 * @return string formatted string with correct encoding.
 */
	protected static function _strftime($format, $date) {
		$format = strftime($format, $date);
		$encoding = Configure::read('App.encoding');

		if (!empty($encoding) && $encoding === 'UTF-8') {
			if (function_exists('mb_check_encoding')) {
				$valid = mb_check_encoding($format, $encoding);
			} else {
				$valid = !Multibyte::checkMultibyte($format);
			}
			if (!$valid) {
				$format = utf8_encode($format);
			}
		}
		return $format;
	}

}
