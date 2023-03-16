<?php

require 'Notification.php';

class App
{
    public static function run()
    {
        $list_employees = EmployeeProvider::getByCurrentBirthDay();
        Notification::send($list_employees);
    }
}
App::run();
