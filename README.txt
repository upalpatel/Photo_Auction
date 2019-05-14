To install the database with test data:
(visit the sql directory for the .sql files)

Access monitor:
mysql -u [username] -p;

Method 1:
1) Install photo_auctions.sql -> source photo_auctions;

Method 2 (intsall each script separately):
1) Install Create_Table_Member.sql -> source Create_Table_Member.sql;
2) Install Entry_List.sql -> source Entry_List.sql;
3) Install Project_1_image_values.sql -> source Project_1_image_values.sql;

For the following commands, exit the MySQL monitor:

Command used to dump the database:
mysqldump -u [username] -p [database] > db_project_backup.sql

Command used to restore the dumped database:
mysql -u [username] -p -h localhost [database] < db_project_backup.sql

Existing accounts:
(use the account information below to surf the web app)

Seller account:
Email: visualsofupal@gmail.com
Password: vou123

Buyer account:
Email: j@nw.got.com
Password: j123