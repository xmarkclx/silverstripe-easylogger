Silverstripe Easy Logger Module
=======================
Module used to easily log stuff easily for whatever purpose you can imagine.

This isn't meant to be Silverstripe specific. But was made while working on a SS project.

The reason for adding multiple log files is that you can segregate stuff you want to log easily.
sales.log
foodEaten.log
etc.

The reason this was made is to make it easy for us to see what is going on in the code asap, so we can just call EasyLogger::logThis('message') or EasyLogger::logThisVariable($a).

#Configuration#
Default log file is (base_url)/notification.log
Use custom logger feature to customize log file location

##How to use##
###Log message###
EasyLogger::logThis('message');

###Log variable###
EasyLogger::logThisVariable($var);

###Custom logger###
$logger = new EasyLogger('dir/filename');

$loggger->log('message');
