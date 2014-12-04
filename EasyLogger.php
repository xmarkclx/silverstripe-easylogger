<?php

class EasyLogger{
    #TODO: Better microseconds support http://stackoverflow.com/questions/169428/php-datetime-microseconds-always-returns-0
    public static $log_file;
    private $file;

    function __construct($log_file = 'notification.log'){
        // Open file
        $this->file = fopen(BASE_PATH.'/'.$log_file, 'a');
    }

    public static function logThisVariable($var){
        EasyLogger::logThis(var_export($var, true));
    }

    public static function serializeThisVariable($var){
        EasyLogger::logThis(serialize($var));
    }

    public static function logThis($message){
        $log_file = 'notification.log';
        $file = fopen(BASE_PATH.'/'.$log_file, 'a');
        $date = new DateTime('now');
        $txt = $date->format('d-m-Y H:i:s').' '. utf8_encode($message)."\n";
        $txt.= '===================================='."\n";
        fwrite($file, $txt);
        fclose($file);
    }

    public function log($message){
        //
        $date = new DateTime('now');
        $txt = $date->format('d-m-Y H:i:s').' '.$message."\n";
        $txt.= '===================================='."\n";
        fwrite($this->file, $txt);
    }

    public function __destruct(){
        fclose($this->file);
    }
}