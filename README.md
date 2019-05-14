# Photo Auction

Web application designed using HTML, PHP, SQL & Bootstrap

## Getting Started

These instructions will help you set up the project on your local machine

### Prerequisites

Install one of the local servers listed below to setup the environment for databases

```
WAMP | LAMP | MAMP | XAMPP 
```

### Installing

To install the database with test data visit the sql directory for the .sql files</br>

###### Access monitor:</br>

```
-> mysql -u [username] -p;
```

###### Method 1:</br>

Install entire database</br>

* Install photo_auctions.sql:</br>

	```
	-> source photo_auctions;
	```

###### Method 2:</br>

Install each script separately</br>

* Install Create_Table\_Member.sql:

	```
	-> source Create_Table_Member.sql;
	```

* Install Entry\_List.sql:


	```
	-> source Entry_List.sql;
	```

* Install Project\_1\_image_values.sql:


	```
	-> source Project_1_image_values.sql;
	```

## Dump & Restore Database

For the following commands, exit the MySQL monitor:

### Command used to dump the database:

```
mysqldump -u [username] -p [database] > db_project_backup.sql
```

### Command used to restore the dumped database:

```
mysql -u [username] -p -h localhost [database] < db_project_backup.sql
```

## Existing Accounts:

Use the account information below to surf the web app</br>

###### Seller Account:
Email: visualsofupal@gmail.com</br>
Password: vou123</br>

###### Buyer Account:
Email: j@nw.got.com</br>
Password: j123</br>