<?php

/**
 * Random Date
 *
 * PHP version 5.3+
 *
 * Licensed under The MIT License.
 * Redistribution of these files must retain the above copyright notice.
 *
 * @author    Josh Sherman <hello@joshtronic.com>
 * @copyright Copyright 2020 Josh Sherman
 * @license   http://www.opensource.org/licenses/mit-license.html
 * @link      https://github.com/joshtronic/php-randomdate
 */

namespace joshtronic;

class RandomDate
{
    /**
     * Min
     *
     * Minimum timestamp to use when generating time/date. Default value (null)
     * is converted to the Unix Epoch (0).
     *
     * @access private
     * @var null | integer
     */
    private $min = null;

    /**
     * Max
     *
     * Maximum timestamp to use when generating time/date. Default value (null)
     * is converted to the current timestamp.
     *
     * @access private
     * @var null | integer
     */
    private $max = null;

    /**
     * Min
     *
     * Set the minimum timestamp from date/time string.
     *
     * @access public
     * @param string $min
     * @return object
     */
    public function min($min)
    {
        $this->min = strtotime($min);
        return $this;
    }

    /**
     * Max
     *
     * Set the maximum timestamp from date/time string.
     *
     * @access public
     * @param string $max
     * @return object
     */
    public function max($max)
    {
        $this->max = strtotime($max);
        return $this;
    }

    /**
     * Between
     *
     * Set the minimum and maximum timestamps from date/time strings.
     *
     * @access public
     * @param string $min
     * @param string $max
     * @return object
     */
    public function between($min, $max)
    {
        $this->min($min);
        $this->max($max);
        return $this;
    }

    /**
     * Reset
     *
     * Set the minimum and maximum timestamps to their respective defaults.
     *
     * @access public
     * @return object
     */
    public function reset()
    {
        $this->min = null;
        $this->max = null;
        return $this;
    }

    /**
     * Date
     *
     * Returns a string formatted according to the given format string using
     * the given minimum and maximum timestamps.
     *
     * @access public
     * @param string $format `date()` compatible format string.
     * @return string
     */
    public function date($format = 'c')
    {
        $min = ($this->min == null ? 0 : $this->min);
        $max = ($this->max == null ? time() : $this->max);
        return date($format, mt_rand($min, $max));
    }
}

