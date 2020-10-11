

Fix session issue on linux:
/etc/httpd/conf.d/php.conf is overriding the 'session.save_path' from default php.ini
Yet, user does not have write access on the directory, thus simply comment out the override.
https://serverfault.com/questions/558641/aws-ec2-php-session-start-with-permission-denied
