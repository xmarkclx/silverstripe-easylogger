Silverstripe Easy Logger Module
=======================
Module used to easily log stuff easily for whatever purpose you can imagine.

This isn't meant to be Silverstripe specific. But was made while working on a SS project.

There is a default log file called 'notification.log' that gets
created when you use the quick log functions, i.e. EasyLogger::qLog().
The reason for adding multiple log files is that you can segregate stuff you want to log easily.
<pre>
sales.log
foodEaten.log
etc.
</pre>

The reason this was made is to make it easy for us to see what is going 
on in the code asap, so we can just call EasyLogger::qLog('message') 
or EasyLogger::quickLogCaller($a) to see a backtrace.

#Configuration#
Default log file is (base_url)/notification.log
Use custom logger feature to customize log file location

##How to use##
###Log message###
EasyLogger::qLog('message');

###Log variable###
EasyLogger::qLog($var);

### Log with call trace###
EasyLogger::quickLogCaller($stuff);

###Custom logger###
$logger = new EasyLogger('dir/filename');

$loggger->log('message');
