# Webdeq
This projct is for fun mostly, will be creating a webframework(probably all messedup looking for a professional) for maintaining a website.

## Licensing
Do whatever you want but I want my name and a link to my github staying there, and it should be stated if the distributed version is modified by any means.


Edwin Wallin

Github: https://github.com/Dequilla

Website: dequilla.com or edwinwallin.com

Email: edwin.wallin@dequilla.com


# Installing
### Requires a server of some sort

Download: https://github.com/Dequilla/webdeq/releases
Clone: https://github.com/Dequilla/webdeq

Clone or download the project and set your desired servers public folder to webdeqs public folder (or symlink) and it should work.

# Usage
## Routes
In `saved/page/pages/routes.php` you can set your urls:
`'/' => 'example.php'` where example.php is a file in `saved/page/pages/routes.php`.
Look at existing examples.

## Templates
In `saved/page/pages/` you can add .php files containing HTML, CSS, JavaScript and php but also
our own includes, `<+example;` where the "example" is the name (without the php extension) in `saved/page/templates/` to include.
Templates are just .php files with normal code in them, look at the existing examples.

## Logging 
Logging currently takes care of itself, to logg something in your own code use `require_once('../http/utility/logger.php');` and use 
one of two functions: `deq_log_message` or `deq_log_error` with error string as paramiter, it automaticly saves the request IP and what time and date it logged on.
The logs are available in `saved/logs/`.

## Settings
There are currently a few settings available in `http/settings/settings.php`.

`CACHING_ENABLED`: Currently useless.
`LOGGING_ENABLED`: set to true to log, false to not log.
`LOG_DIR`: The directory which the logger saves the logs to.
`DEFAULT_TIMEZONE`: Sets what timezone you want the system to operate from.