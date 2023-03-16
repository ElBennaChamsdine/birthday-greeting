# birthday-greeting
This is a simple PHP application that reads a list of employees from a CSV file and sends them a birthday message if their birthday is today. The app supports sending notifications via email, SMS, or both.

## Usage
To use the app, simply call the App::run() method:

App::run();

This will fetch the list of employees whose birthday is today and send them a notification using the Notification class.

## Classes
The app is made up of three classes:

### App
The App class is responsible for running the app. It has a single static method run() that fetches the list of employees whose birthday is today and sends them a notification using the Notification class.

### EmployeeProvider
The EmployeeProvider class provides methods for fetching the list of employees from the CSV file. It has two static methods:

* all(): Returns an array containing all the employees in the CSV file.
* getByCurrentBirthDay($list_employees = null): Returns an array containing the employees whose birthday is today. If $list_employees is provided, it filters the employees in that list instead of fetching all the employees from the CSV file.
### Notification
The Notification class is responsible for sending the birthday messages to the employees. It has three static methods:

* send($list_employees): Sends the birthday messages to the employees in the $list_employees array. The messages are sent via email, SMS, or both depending on the notification_type field in each employee's record.
* sendEmail($employee): Sends an email birthday message to the given employee.
* sendSms($employee): Sends an SMS birthday message to the given employee.

## Tests
The application includes a PHPUnit test that can be run using the phpunit command. The test is located in the EmployeeProviderTest file, which contains a class that extends TestCase. The testGetByCurrentBirthday method tests the getByCurrentBirthDay method of the EmployeeProvider class. It tests that the method correctly filters a list of employees to return only those whose birthday is today.

To run the test, navigate to the root directory of the project in your terminal and run the following command:

phpunit EmployeeProviderTest.php

The test should pass if everything is working correctly.
