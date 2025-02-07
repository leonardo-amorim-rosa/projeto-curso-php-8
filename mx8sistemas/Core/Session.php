<?php

namespace mx8sistemas\Core;

/**
 * Session utility class
 *
 * @author leoam
 */
class Session
{
    public function __construct()
    {
        if (!session_id()) {
            session_start();
        }
    }
    
    public function create(string $key, mixed $value): Session
    {
        $_SESSION[$key] = (is_array($value) ? (object)$value : $value);
        return $this;
    }
    
    public function clear(string $key): Session
    {
        unset($_SESSION[$key]);
        return $this;
    }
    
    public function load(): ?object
    {
        return (object) $_SESSION;
    }
    
    public function check(string $key): bool
    {
        return isset($_SESSION[$key]);
    }
    
    public function delete(): Session
    {
        session_destroy();
        return $this;
    }
}
