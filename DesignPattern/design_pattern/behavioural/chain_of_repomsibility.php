<?php
interface Logger
{
    public function log(string $message): void;
}

class EmailLogger implements Logger
{
    private $nextLogger;

    public function setNext(Logger $logger): Logger
    {
        $this->nextLogger = $logger;
        return $logger;
    }

    public function log(string $message): void
    {
        // send email to the admin with the log message
        echo "EmailLogger: Sending email to admin with message: {$message}\n";

        // if there is a next logger, pass the message to it
        if ($this->nextLogger) {
            $this->nextLogger->log($message);
        }
    }
}

class FileLogger implements Logger
{
    private $nextLogger;

    public function setNext(Logger $logger): Logger
    {
        $this->nextLogger = $logger;
        return $logger;
    }

    public function log(string $message): void
    {
        // write the log message to a file
        echo "FileLogger: Writing log message to file: {$message}\n";

        // if there is a next logger, pass the message to it
        if ($this->nextLogger) {
            $this->nextLogger->log($message);
        }
    }
}

class ConsoleLogger implements Logger
{
    private $nextLogger;

    public function setNext(Logger $logger): Logger
    {
        $this->nextLogger = $logger;
        return $logger;
    }

    public function log(string $message): void
    {
        // write the log message to the console
        echo "ConsoleLogger: Writing log message to console: {$message}\n";

        // if there is a next logger, pass the message to it
        if ($this->nextLogger) {
            $this->nextLogger->log($message);
        }
    }
}

// create the loggers
$emailLogger = new EmailLogger();
$fileLogger = new FileLogger();
$consoleLogger = new ConsoleLogger();

// set up the chain of loggers
$emailLogger->setNext($fileLogger)->setNext($consoleLogger);

// log a message
$emailLogger->log("This is a log message.");
