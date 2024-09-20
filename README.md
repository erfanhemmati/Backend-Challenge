# Backend Service Challenge

This is a PHP backend service to manage user transactions and generate reports. The service uses PSR-4 autoloading and Composer packages, including Faker for generating random user data and Symfony Cache for caching reports. The project also supports running commands via CLI.

## Installation

### Prerequisites

- PHP version 7.4 or higher
- Composer

### Setup

1. Clone the repository or download the files.

   ```bash
   git clone git@github.com:erfanhemmati/Backend-Challenge.git
   cd Backend-Challenge
   
2. Install composer dependencies.

    ```bash
   compose install
   
3. Generate the Composer autoloader.

    ```bash
   composer du

### Usage

1. Populating Users

```
require __DIR__ . '/../../vendor/autoload.php';

use App\Services\UserService;

$userService = new UserService();
$userService->populateUsers(10);

print_r($userService->getUsers());   
```

Also you can use PHP-cli command for Populating Users instruction.

```bash
php app/Console/Command.php
```

2. Performing Transactions

```
use App\Services\TransactionService;

$transactionService = new TransactionService();
$transactionService->performTransaction($userService->getUsers()[0], 50, '2024-09-20');
```

3. Generating Reports

```
use App\Services\ReportService;

$reportService = new ReportService();

// Generate a daily report for a specific user
$dailyUserReport = $reportService->getDailyUserReport($userService->getUsers()[0]->id, '2024-09-20', $transactionService->getTransactions());
echo "Daily User Report: " . $dailyUserReport;

// Generate a daily total report for all users
$dailyTotalReport = $reportService->getDailyTotalReport('2024-09-20', $transactionService->getTransactions());
echo "Daily Total Report: " . $dailyTotalReport;
```