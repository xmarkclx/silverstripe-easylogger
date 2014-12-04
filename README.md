Silverstripe Easy Logger Module
=======================
Module used to easily log stuff for debugging purposes.

#Configuration#
Default log file is (base_url)/notification.log
Use custom logger feature to customize log file location

##How to use##
###Log message###
EasyLogger::logThis('message');

###Log variable###
EasyLogger::logThisVariable(var);

###Custom logger with###
$logger = new EasyLogger('dir/filename');
$loggger->log('message');
