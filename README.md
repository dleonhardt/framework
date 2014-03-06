## Framework

A simple PHP framework for use in smaller, less complex applications. It is built to be object-oriented, but purposely does not follow the MVC design pattern to keep it simple and flexible.

## Installation

There are two installation options available:

- [Download the latest release](https://github.com/dleonhardt/framework/archive/master.zip)
- Clone the repo: `git clone https://github.com/dleonhardt/framework.git`

### Files included

Within the download you will find the following directories and files:

```
framework/
├── application/
│   ├── classes/
│   │   └── UserExample.php
│   ├── autoload.php
│   ├── config.php
│   ├── database.php
│   └── start.php
└── public/
    ├── .htaccess
    └── index.php
```

## Getting started

To create a new page, you will need to include the following code at the top:

`require_once __DIR__.'/../application/start.php';`

Next, you will need to pull in any classes that you will be using in the page. To add a class, add the following code after the `require_once` statement mentioned above:

`use Application\Classes\**ClassNameGoesHere**;`

Finally, create a new object of the class that you just included.

`$**any_variable_name** = new **ClassNameGoesHere**;`

For more information on [Classes](#classes), see the section below.

### Classes

In the `/application/classes/` directory you will find a Class example file named `UserExample.php`. All Classes will need to go in this same directory. You may also remove the `UserExample.php` file if you do not need it for a reference when you're making your own Classes. If you would like to start a Class from scratch, you will need to do the following steps.

First, add the following namespace to the top of the page:

`namespace Application\Classes;`

After that, you will need to define the Class.

```
class **ClassNameGoesHere** {
  
}
```

Inside the Class's body you create functions to be used within your pages. For more information on this, please see the `UserExample.php' file.

Finally, you will need to add a `use` statement and create a new instance of that object on the page in which you'd like to use the Class on.

This is explained further in the [Getting started](#getting-started) section.

### Database setup

If you'd like to use a database in your application, you will need to do some minor configuration first. As of right now the only database environment that is supported is MySQL. To configure a MySQL database, you will need to go to the `/application` directory and open the file `database.php`. Then, edit the following fields:

```
namespace Application;

use PDO;

class Database {
	
  private static $conn = NULL;
	private $db;
	
	const DB_HOST = '**localhost**';
	const DB_NAME = '**test**';
	const DB_USER = '**root**';
	const DB_PASS = '**root**';
```

Next, you will need to include `use Application\Database;` below the namespace in the class that you will be using to interact with the database.

Finally, add the following at the top inside of the class definition:

```
private $db;
	
public function __construct() {
	$this->db = Database::getConnection();
}
```

For more information, see the `/application/classes/UserExample.php` as an example to see how it is used.

## Author

Dave Leonhardt (<http://twitter.com/dave_leonhardt>)