## connecting to server

```
ssh-keygen -t rsa -f ~/.ssh/my-ssh -C username
ssh -i ~/.ssh/my-ssh username@ip

# filezilla
> New Site > sftp > use ip, :22 > ask for password
> Edit > Settings > sftp > priv key
```

sudo apt install -y apache2
sudo add-apt-repository ppa:certbot/certbot
sudo apt-get -y update
sudo apt-get install -y python-certbot-apache

```
apt install -y apache2 apache2-utils mysql-client mysql-server

sudo mysql_secure_installation

apt install -y php7.0 libapache2-mod-php7.0 graphviz aspell php7.0-pspell php7.0-curl php7.0-gd php7.0-intl php7.0-mysql php7.0-xml php7.0-xmlrpc php7.0-ldap php7.0-zip php7.0-cli php7.0-cgi
```

sudo a2enmod proxy
sudo a2enmod proxy_http
sudo a2enmod proxy_balancer
sudo a2enmod lbmethod_byrequests
sudo systemctl restart apache2

[install docker](https://docs.docker.com/engine/installation/linux/docker-ce/ubuntu/#install-using-the-repository)

```
docker network create --driver bridge reverse-proxy
```

edit /etc/hosts
127.0.0.1 abc.com
127.0.0.1 app.abc.com

```
cd /etc/apache2/sites-available
sudo mv 000-default.conf abc.com.conf
sudo rm -rf ../sites-enabled/*
sudo a2ensite abc.com.conf
apachectl configtest
```

edit abc.com.conf

```
<VirtualHost *:80>
        ServerAdmin webmaster@localhost
        DocumentRoot /var/www/html

        ErrorLog ${APACHE_LOG_DIR}/error.log
        CustomLog ${APACHE_LOG_DIR}/access.log combined

</VirtualHost>

# vim: syntax=apache ts=4 sw=4 sts=4 sr noet
```

sudo certbot --authenticator standalone --installer apache -d abc.com --pre-hook "service apache2 stop" --post-hook "service apache2 start"

cd /etc/apache2/sites-available && sudo touch python.abc.com

```
<VirtualHost *:80>
	RewriteEngine On
	ServerName python.abc.com
	RewriteRule /(.*) http://localhost:8000/$1 [proxy,last]
	ProxyPass / http://localhost:8000
	ProxyPassReverse / http://localhost:8000
</VirtualHost>
```

sudo a2ensite python.abc.com

## backing up moodle

1. copy sourcecode
2. copy moodledata
3. get db dump `mysqldump -u xxxx -p db_name > dump.sql`
