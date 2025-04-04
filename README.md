# Install  

Required: installed Docker, Docker Compose.  

## 1  
If PHP and composer are not installed locally
```
docker run --rm -v $(pwd):/app composer install --ignore-platform-reqs
```
If installed PHP and composer
```
composer install
```
## 2  
Start sail
```
./vendor/bin/sail up -d && ./vendor/bin/sail ps
```
## 3  
Build Resources  
```
./vendor/bin/sail npm i
./vendor/bin/sail npm run build
```  
```
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan db:seed
```  
## Use
```
http://localhost/
```
Default users.  
admin: admin@local.local   
user: user@local.local  

Password for all: password  
  
