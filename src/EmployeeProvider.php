<?php
class EmployeeProvider
{

    public static function all()
    {
        $employees = [];
        $file_path = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'employees.txt';
        $file = fopen($file_path, 'r');

        // Read the header row
        $header = fgetcsv($file);

        // Loop through the remaining rows
        while ($row = fgetcsv($file)) {
            // Access the data for each row using array indexing
            if (count($row) != count($header)) {
                continue;
            }
            $employee = [];
            foreach ($header as $key => $elem) {
                $employee[trim($elem)] = trim($row[$key]);
            }
            $employees[] = $employee;
        }
        fclose($file);
        return $employees;
    }

    public static function getByCurrentBirthDay($list_employees = null)
    {

        if ($list_employees == null)
            $list_employees = self::all();

        $current_date = new DateTime;  // Calculate the current timestamp once
        $current_month = $current_date->format('m');
        $current_day = $current_date->format('d');


        // Use array_filter to filter the employees based on their date of birth
        $filtered_employees = array_filter($list_employees, function ($employee) use ($current_month, $current_day) {
            if (empty($employee['date_of_birth'])) return false;

            $date_str = $employee['date_of_birth'];
            $format = 'd/m/Y';
            $date = DateTime::createFromFormat($format, $date_str);

            if ($date !== false) {
                $month = $date->format('m');
                $day = $date->format('d');
                $date_of_birth = $date->getTimestamp();
                return ($date_of_birth !== false) && ($month == $current_month) && ($day == $current_day);
            }
            return false;
        });
        return $filtered_employees;
    }
}
