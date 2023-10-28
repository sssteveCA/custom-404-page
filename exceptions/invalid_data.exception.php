<?php

namespace CustomErrorPage\Exceptions;

use Exception;

/**
 * Thrown when the provided data are invalid
 */
class InvalidDataException extends Exception{

    public function __construct($exmsg="", $val = 0, Exception $old = null) {
        parent::__construct($exmsg, $val, $old);
    }

    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}