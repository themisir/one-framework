# What's **one-framework**

OneFramework is a best php mvc framework even. It's free, simple, and small.\
Please follow us on [facebook](https://facebook.com/onedevgroup), [twitter](https://twitter.com/onedevgroup), [instagram](https://twitter.com/onedevgroup), [github](https://github.com/onedevgroup), and on the  [our website](https://onedevgroup.com/).\
\
Author: [Misir Jafarov](https://facebook.com/misir.ceferov) from [OneDev Group](https://onedevgroup.com).

## Intro

### 1. Download the framework

Download the package using git client. Simply clone our .git.

```bash
$ git clone https://github.com/onedevgroup/one-framework.git
```

### 2. Copy files to the server

Copy downloaded (or cloned) files to the main server root

```bash
$ copy one-framework/* my/server/location/
```

### 3. Configure app

Start configuring your web application at `./application/config.php`

## Configuration

You must configure your web application. You can see default `config.php` bellow.

```php
<?php

/*

Name:		OneFramework
Author:		OneDev Group (https://onedevgroup.com/)
License:	Apache 2.0 license

Created by developers for developers with our <3

*/

$config = [
	'debug'		=> false,

	'database'	=> [
		'default'	=> [

			// Fill with your database info
			
			'database_type' => 'mysql',
			'database_name' => 'test',
			'server' => 'localhost',
			'username' => 'root',
			'password' => '',
			'debug_mode' => true
		]
	],

	'path'		=> [
		'static' => 'http://site_host_here/assets/',
		'home' => 'http://site_host_here/'
	],

	'api'		=> [
		'recaptcha' => 'YOUR_RECAPTCHA_SECRET'
	]
];
```

### $config > database - Database configration

This field contains database configration for [medoo](http://medoo.in) database framework. You can find configration value docs from [there](https://medoo.in/api/new).

### $confi > path - Path configration

This item contains required urls.

#### path > static

Static (assets, images, more) files location. Eg: http://example.com/assets/

#### path > home

Home location. Usually main domain name. Used for redirects and more

### $confi >  api - Special api keys, secrets or more

This key contains a api keys, secrets, and more for api requests. Eg: `recaptcha` contains google reCAPTCHA api secret.


**_continued..._**
