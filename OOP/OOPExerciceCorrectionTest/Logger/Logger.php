<?php

class Logger
{
    private $buffer;
    private $handler;
    
    public function __construct(string $path)
    {
        $this->buffer = fopen('php://memory', 'r+');
        $this->handler = $path;
    }
    
    public function write($message)
    {
        fwrite($this->buffer, $message);
    }
    
    public function __destruct()
    {
        rewind($this->buffer);
        file_put_contents($this->handler, stream_get_contents($this->buffer));
        fclose($this->buffer);
    }
}
