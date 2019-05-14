#Photo Auction</br>
##Web Application</br>
#####Designed using HTML, PHP, SQL & Bootstrap</br>
####To install the database with test data:</br>
(visit the sql directory for the .sql files)</br>

#####Access monitor:</br>
mysql -u [username] -p;</br>

######Method 1:</br>
1) Install photo\_auctions.sql -> source photo_auctions;</br>

######Method 2</br>
(intsall each script separately):</br>
</br>
1) Install Create\_Table\_Member.sql -> source Create\_Table\_Member.sql;</br>
2) Install Entry\_List.sql -> source Entry\_List.sql;</br>
3) Install Project\_1\_image\_values.sql -> source Project\_1\_image\_values.sql;</br>

#####For the following commands, exit the MySQL monitor:</br>

######Command used to dump the database:</br>
mysqldump -u [username] -p [database] > db\_project\_backup.sql</br>

######Command used to restore the dumped database:</br>
mysql -u [username] -p -h localhost [database] < db\_project\_backup.sql

#####Existing accounts:</br>
(use the account information below to surf the web app)</br>

######Seller account:</br>
Email: visualsofupal@gmail.com</br>
Password: vou123</br>

######Buyer account:</br>
Email: j@nw.got.com</br>
Password: j123</br>