Fix session issue on linux:
/etc/httpd/conf.d/php.conf is overriding the 'session.save_path' from default php.ini
Yet, user does not have write access on the directory, thus simply comment out the override.
Solution:
https://serverfault.com/questions/558641/aws-ec2-php-session-start-with-permission-denied



MySQL:

Useful Command:
http://g2pc1.bu.edu/~qzpeng/manual/MySQL%20Commands.htm
https://www.tutorialrepublic.com/php-tutorial/php-mysql-connect.php

Fail to connect sql
Warning: mysql_connect(): [2002] No such file or directory (trying to connect via unix:///tmp/mysql.sock)
Solution:
1 check mysql running
2 Set "mysql.default_socket" value in /etc/php.ini:
https://stackoverflow.com/questions/4219970/warning-mysql-connect-2002-no-such-file-or-directory-trying-to-connect-vi


mysqli_connect(): (HY000/2054): Server sent charset unknown to the client.
Solution:
https://stackoverflow.com/questions/3513773/change-mysql-default-character-set-to-utf-8-in-my-cnf


Warning: mysqli_connect(): The server requested authentication method unknown to the client
&
change mysql password
Solution:
https://stackoverflow.com/a/52364450/4894370
https://stackoverflow.com/a/53881212/4894370

1.
create database cmpe272
2.
CREATE TABLE `user` (
  `firstName` char(255) NOT NULL,
  `lastName` char(255) NOT NULL,
  `email` char(255) NOT NULL,
  `address` char(255) NOT NULL,
  `homePhone` char(255) NOT NULL,
  `cellPhone` char(255) NOT NULL
) ENGINE=InnoDB ;
