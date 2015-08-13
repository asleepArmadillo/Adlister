<?php
class Log
{
    private $fileName;
    private $handle;

    public function __construct($prefix = 'log') 
    {

        $this->setFilename($prefix);


        $this->handle = fopen($this->fileName, 'a');
    }

    public function __destruct()
    {
        fclose($this->handle);
    }

    protected function setFilename($prefix = 'log')
    {
        if (is_string($prefix)) {
            $this->fileName = "logs/$prefix-" . date('Y-m-d') . ".log";
        } else {
            die('Prefix is not a string.');
        }

        if (!(touch($this->fileName) && is_writable($this->fileName))) {
            die('Filename cannot be written to.');
        }


    }

    public function message($logLevel, $message)
    {
        date_default_timezone_set('America/Chicago');

        $message = date('Y-m-d') . "   " . date('H:i:s') . "   [{$logLevel}] $message";
        fwrite($this->handle, $message . PHP_EOL);
    }

    public function info($info)
    {
        return $this->message("INFO", $info);
    }

    public function error($error)
    {
        return $this->message("ERROR", $error);
    }
}
?>