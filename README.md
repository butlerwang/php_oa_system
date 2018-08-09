# php_oa_system
php oa system

## docker install

```bash  
git clone https://github.com/butlerwang/php_oa_system.git

docker run --name php_oa_system -d -it -v php_oa_system:/var/www/example.com/public_html -p 80:80 butlerwang/butler_lamp:201808081515 /bin/bash
```
