# Redirect

URL redirector using Redis key-value database and Apache Server with htaccess

Any URL redirected by the htaccess file to the will be checked by redis if there is a corresponding value, if any, will redirect the visitor to the URL specified in the database.

## Configuring

### Redis

If it is not installed, first you need to install the Redis database.
You can find instructions on how to do it on the [official website/](https://redis.io/).

In Debian/Ubuntu run the command:
	
	sudo apt install redis-server

### Htaccess

The .htaccess file must be enabled in the [Apache settings/](https://httpd.apache.org/docs/2.4/howto/htaccess.html/)

The file should look like this:

	RewriteEngine on

	RewriteBase /
	RewriteCond %{SCRIPT_FILENAME} !-f
	RewriteCond %{SCRIPT_FILENAME} !-d
	RewriteCond %{SCRIPT_FILENAME} !-l

	RewriteRule ^(.*)$ index.php?url=$1 [NC]

If the project is not in the root folder of the domain, 
you need to add the path to the file:

	RewriteRule ^(.*)$ project/index.php?url=$1 [NC]

