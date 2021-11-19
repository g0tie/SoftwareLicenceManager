<h1>SoftwareLicense Manager</h1>

A web interface and api to generate, activate and verify product license key. 
Made in PHP with Laravel

<h2>Usage</h2>

<h3>Connect with an account or create one</h3>

Login           |  register
:-------------------------:|:-------------------------:
 ![image](https://user-images.githubusercontent.com/56622131/142602360-8c88facd-4ac3-4f55-ac99-427ecb4c8eb5.png) | ![image](https://user-images.githubusercontent.com/56622131/142602401-2f55b9c5-08cc-497b-88f2-599798a97633.png)
  

<h3>Key gen</3>
A key is automatically generated at registration 
You can activate it via the button

![image](https://user-images.githubusercontent.com/56622131/142602596-cd9c1a2a-d6c3-4e5c-99bd-e6673a041e4e.png)


When your key is activated a message will apear 
![image](https://user-images.githubusercontent.com/56622131/142602869-e2c61c19-0c0d-4918-a834-89e2a6128a6f.png)


<h2>Installation</h2>

You need composer and npm to install this project

```bash
//Install dependencies
composer install
npm install && npm run dev
```

```php
//migrate database
php artisan migrate

//generate app key
php artisan key:generate
```
