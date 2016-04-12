<?php

/**
 * Class EasyLogger
 * @author Mark Christian D. Lopez <xmarkclx@gmail.com>
 */
class EasyLogger{
    private static $showCallerAndLines = true;

    /** @var EasyLogger $logger */
    private static $logger;
    private $file;

    function __construct($logFile = 'notification.log'){
        $this->file = fopen(BASE_PATH . '/' . $logFile, 'a');
    }

    private static function instantiate(){
        if(!isset(EasyLogger::$logger)) {
            EasyLogger::$logger = new EasyLogger();
        }
    }

    public static function quickLog($message){
        EasyLogger::instantiate();

        if(EasyLogger::$showCallerAndLines) {
            $bt = debug_backtrace();
            $caller = array_shift($bt);
            $debugging = basename($caller['file']) . ':' . $caller['line'];
            EasyLogger::$logger->log($debugging);
        }
        EasyLogger::$logger->log($message);
    }

    public static function qLog($message){
        EasyLogger::instantiate();
        EasyLogger::$logger->log($message);
    }

    public static function quickLogCaller(){
        EasyLogger::instantiate();
        $bt = debug_backtrace();
        $bt = array_shift($bt);
        $caller = array_shift($bt);

        EasyLogger::$logger->log(print_r($caller, true));
    }

    public function logThisVariable($var){
        $this->log(var_export($var, true));
    }

    public function serializeThisVariable($var){
        $this->log(serialize($var));
    }

    public function log($message){
        if(is_string($message)) {
            $date = new DateTime('now');
            $txt = $date->format('d-m-Y H:i:s') . ' ' . $message . "\n";
            fwrite($this->file, $txt);
        }
        else
            $this->log(var_export($message, true));
        return;
    }

    public function __destruct(){
        fclose($this->file);
    }
}

function ecLog($message){
    EasyLogger::quickLog($message);
}
