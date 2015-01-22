<?php
namespace Teto\Functools\DataStructure;

/**
 * Cons cell
 *
 * @package    Teto
 * @subpackage Functools
 * @author     USAMI Kenta <tadsan@zonu.me>
 * @copyright  2015 USAMI Kenta
 * @license    http://www.apache.org/licenses/LICENSE-2.0
 */
final class Cons implements \ArrayAccess
{
    /** @var mixed */
    private $car;

    /** @var mixed */
    private $cdr;

    /**
     * @param mixed $car
     * @param mixed $cdr
     */
    public function __construct($car, $cdr)
    {
        $this->car = $car;
        $this->cdr = $cdr;
    }

    public function __get($offset) { return $this->$offset; }

    /**
     * @param int $offset
     */
    public function offsetExists($offset)
    {
        if ($offset == 0) { return isset($this->car); }
        if ($offset == 1) { return isset($this->cdr[0]); }

        return isset($this->cdr[$offset - 1]);
    }

    /**
     * Lisp nth
     *
     * @param int $offset
     */
    public function offsetGet($offset)
    {
        if ($offset === 0) { return $this->car; }
        if ($offset === 1) { return $this->cdr[0]; }

        return $this->cdr[$offset - 1];
    }

    public function offsetSet($_offset, $_value)
    {
        throw new \LogicException;
    }

    public function offsetUnset($_offset) {}
}
