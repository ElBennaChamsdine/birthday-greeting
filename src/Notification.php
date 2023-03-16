<?php

require 'EmployeeProvider.php';

class Notification
{

    public static function send($list_employees)
    {

        foreach ($list_employees as $employee) {

            if ($employee['notification_type'] == "email") {

                self::sendEmail($employee);
            } else if ($employee['notification_type'] == "sms") {

                self::sendSms($employee);
            } else if ($employee['notification_type'] == "smsemail") {

                self::sendEmail($employee);
                self::sendSms($employee);
            }
        }
    }

    public static function sendEmail($employee)
    {
        echo "Sending email to : " . $employee["email"];
        echo "Title: Joyeux Anniversaire !";
        echo "Bonjour " . $employee["first_name"] . ",\nJoyeux Anniversaire !\nA bientôt,";
        echo "-------------------------\n";
    }

    public static function sendSms($employee)
    {
        echo "Sending Sms to : " . $employee["phone_number"];
        echo "Title: Joyeux Anniversaire !";
        echo "Bonjour " . $employee["first_name"] . ",\nJoyeux Anniversaire !\nA bientôt,";
        echo "-------------------------\n";
    }
}
