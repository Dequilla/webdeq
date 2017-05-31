# Webdeq
This project is mostly for fun, i will be developing a MVC-framework for maintaining a website for myself. But you are welcome to use the framework to, as long as you follow the licensing rules.

## Licensing
Do whatever you want but I want my name and a link to my github staying there, and it should be stated if the distributed version is modified by any means.

Edwin Wallin.  
Github: [https://github.com/Dequilla](https://github.com/Dequilla)  
Website: [http://dequilla.com](http://dequilla.com) or [http://edwinwallin.com](http://edwinwallin.com)  
Email: [edwin.wallin@dequilla.com](edwin.wallin@dequilla.com)  

Pontus Nilsson.  
Github: [https://github.com/tazthemaniac](https://github.com/tazthemaniac)  
Website: [http://pontusnilsson.com](http://pontusnilsson.com) or [http://tazthemaniac.com](http://tazthemaniac.com)  
Email: [pontus_nilsson_92@hotmail.com](pontus_nilsson_92@hotmail.com)

## Installing
**Requires a PHP enabled server (only tested on PHP7 and nginx server)**  
Clone or download the project and set your servers webroot to webdeqs public folder (or symlink to it) and it should work.
[Download](https://github.com/Dequilla/webdeq/releases)  
[Clone](https://github.com/Dequilla/webdeq)

### Apache - Nginx
If you are using Apache there is a htaccess file included, however if you are using nginx you will need this in your sites file:
```
# nginx configuration
location / {
  if (!-e $request_filename){
    rewrite ^/([0-9a-zA-Z\/\.\-]+) /index.php;
  }
}
```

## Usage
### Routes
In `saved/page/pages/routes.php` you can set your urls, example: `'/home' => 'home.php'`.  
The files you reference to (in this case, `home.php`) in your urls, shuld be located in (or in a subdirectory of) the `saved/page/pages` directory.

### Pages
The `saved/page/pages` directory contain the files you reference to in your `routes.php` file. they contain the code that the web browser will read. These files can also contain links to template files.

### Templates
Templates are stored in the `saved/page/templates` directory, they are files that can be included in your pages.  

#### Example
In the file `saved/page/pages/index.php` you can include the files `saved/page/templates/header.php` and `saved/page/templates/footer.php` by typing `<+header();` and `<+footer();` without the .php extention.
**(Do not forget the <+ note the (); or it wont work )**

File: `saved/page/pages/index.php`
```
<+header();
  <h1>Some text</h1>
<+footer();
```
File: `saved/page/templates/header.php`
```
<html>
<head>
  <title>Page Title</header>
</head>
<body>
```
File: `saved/page/templates/footer.php`
```
</body>
</html>
```
Generated file (the file loaded by the browser): `saved/page/generated/index.php`
```
<html>
<head>
  <title>Page Title</header>
</head>
<body>
  <h1>Some text</h1>
</body>
</html>
```

### Logging
Logging currently takes care of itself, to logg something in your own code use `require_once('../http/utility/logger.php');` and use
one of two functions: `deq_log_message` or `deq_log_error` with error string as parameter, it automaticly saves the request IP and what time and date it logged on.
The logs are available in `saved/logs`.

### Settings
There are currently a few settings available in `http/settings/settings.php`.

`CACHING_ENABLED`: Sets wether to always generate new pages or if it saves generated pages **(Take note that if you set this to true it wont currently know wether you have to regenerate the page after changes so you'll have to manually delete the old page if you update it)** .

`LOGGING_ENABLED`: Set to true to log, false to not log.

`LOG_DIR`: The directory which the logger saves the logs to.

`DEFAULT_TIMEZONE`: Sets what timezone you want the system to operate from.

