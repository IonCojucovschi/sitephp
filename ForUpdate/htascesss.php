RewriteEngine On
  
    RewriteCond $1 !\.(gif|jpe?g|png)$ [NC]
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$  index.php/$1 [L]