<?php

use PHPUnit\Framework\TestCase;

require 'src/EmployeeProvider.php';

class EmployeeProviderTest extends TestCase
{
    public function testGetByCurrentBirthday()
    {
        $current_date = new \DateTime;  // Calculate the current timestamp once
        $current_month = $current_date->format('m');
        $current_day = $current_date->format('d');
        $list_employees = [
            ['first_name' => 'Bob', 'date_of_birth' => $current_day . '/' . $current_month .  '/1985'],
            ['first_name' => 'Eve', 'date_of_birth' => $current_day . '/' . $current_month . '/1998'],
            ['first_name' => 'Frank', 'date_of_birth' => ''],
            ['first_name' => 'Grace', 'date_of_birth' => '15/13/1990'],
            ['first_name' => 'Harry', 'date_of_birth' => '30-03-1975'],
        ];
        $expected = [
            ['first_name' => 'Bob', 'date_of_birth' => $current_day . '/' . $current_month . '/1985'],
            ['first_name' => 'Eve', 'date_of_birth' => $current_day . '/' . $current_month . '/1998'],
        ];

        // Call the method being tested 
        $actual = EmployeeProvider::getByCurrentBirthDay($list_employees);
        // Assert that the result is as expected
        $this->assertEquals($expected, $actual);
    }
}
