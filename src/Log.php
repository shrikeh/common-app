<?php

declare(strict_types=1);

namespace RpHaven\App;

use Psr\Log\InvalidArgumentException;
use RpHaven\App\Log\Context;
use RpHaven\App\Log\Level;

interface Log
{
    /**
     * System is unusable.
     *
     * @param string|\Stringable $message
     * @param Context ...$contexts
     * @return void
     */
    public function emergency(string|\Stringable $message, Context... $contexts): void;

    /**
     * Action must be taken immediately.
     *
     * Example: Entire website down, database unavailable, etc. This should
     * trigger the SMS alerts and wake you up.
     *
     * @param string|\Stringable $message
     * @param Context ...$contexts
     * @return void
     */
    public function alert(string|\Stringable $message, Context... $contexts): void;

    /**
     * Critical conditions.
     *
     * Example: Application component unavailable, unexpected exception.
     *
     * @param string|\Stringable $message
     * @param Context ...$contexts
     * @return void
     */
    public function critical(string|\Stringable $message, Context... $contexts): void;

    /**
     * Runtime errors that do not require immediate action but should typically
     * be logged and monitored.
     *
     * @param string|\Stringable $message
     * @param Context ...$contexts
     * @return void
     */
    public function error(string|\Stringable $message, Context... $contexts): void;

    /**
     * Exceptional occurrences that are not errors.
     *
     * Example: Use of deprecated APIs, poor use of an API, undesirable things
     * that are not necessarily wrong.
     *
     * @param string|\Stringable $message
     * @param Context ...$contexts
     * @return void
     */
    public function warning(string|\Stringable $message, Context... $contexts): void;

    /**
     * Normal but significant events.
     *
     * @param string|\Stringable $message
     * @param Context ...$contexts
     * @return void
     */
    public function notice(string|\Stringable $message, Context... $contexts): void;

    /**
     * Interesting events.
     *
     * Example: User logs in, SQL logs.
     *
     * @param string|\Stringable $message
     * @param Context ...$contexts
     * @return void
     */
    public function info(string|\Stringable $message, Context... $contexts): void;

    /**
     * Detailed debug information.
     *
     * @param string|\Stringable $message
     * @param Context ...$contexts
     * @return void
     */
    public function debug(string|\Stringable $message, Context... $contexts): void;

    /**
     * Logs with an arbitrary level.
     *
     * @param mixed $level
     * @param string|\Stringable $message
     * @param Context ...$contexts
     * @return void
     *
     * @throws InvalidArgumentException
     */
    public function log(Level $level, string|\Stringable $message, Context ...$contexts): void;
}