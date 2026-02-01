# laravel12-darkmode

Efficient Laravel 12 dark mode toggle that actually works throughout all page content.

## TLDR

1. Copy the Dark Mode JavaScript files
2. Update the resources/css/app.css with the dark configuration
3. See the provided example blade layouts.
4. Ensure the listener code is after the content is loaded.
5. Run `npm build`
6. Optionally clear the project cache with:
   1. `php artisan view:clear`
   2. or `php artisan optimize:clear`
    
See [app.css] (resources/css/app.css) for the config option missing from the majority of search and "AI" offerings.

## Unnecessary Configurations

The default Laravel 12 configurations provide the majority of changes.

1. `resources/css/app.css`
   1. requires a single line to be added.
   2. do not alter the import statements.
   3. does not require `@source` to be modified
2. postcss.config.js is not needed
3. tailwind.config.js is not needed

## Warning

It is highly recommended to remove any previous dark mode implementation attempts suggested from so-called AI, or other sources, as many may have provided complicated, non-functional guidance.

Many of these "guides" call for additional software, extensive configurations, etc. etc. This is not necessary.

## Purpose

To clearly communicate the necessary configuration To provide a functional example of Tailwind CSS 4 dark mode toggle. This solution addressed the complaints of the *broken* Tailwind CSS 4 dark mode toggle stemming from two primary positions:

- Increased difficulty in implementation over the previous Tailwind version.
- Limited functionality:
    -   Only changes the background.
    -   Does not affect page contents.

## Provides

The provided configuration files are included as well as actual working examples of full content dark mode toggle as stand-alone or `vite` imports.

## Additional Comment

The `app.js` and `bootstrap.js` files are included for clarity. No changes were made to them for this implementation.

## Requirements

This was performed on a clean install Laravel, version 12.49.0, with Tailwind CSS@4.1.18 and can be easily implemented on any comparable system. 

## Project configuration

```bash
npm list

─ @tailwindcss/vite@4.1.18
├── axios@1.13.4
├── concurrently@9.2.1
├── laravel-vite-plugin@2.1.0
├── tailwindcss@4.1.18
└── vite@7.3.1
```

Composer.json --- clean Laravel 12 install, nothing added
```json
{
    "$schema": "https://getcomposer.org/schema.json",
    "name": "laravel/laravel",
    "type": "project",
    "description": "The skeleton application for the Laravel framework.",
    "keywords": [
        "laravel",
        "framework"
    ],
    "license": "MIT",
    "require": {
        "php": "^8.2",
        "laravel/framework": "^12.0",
        "laravel/tinker": "^2.10.1"
    },
    "require-dev": {
        "fakerphp/faker": "^1.23",
        "laravel/boost": "^2.0",
        "laravel/pail": "^1.2.2",
        "laravel/pint": "^1.24",
        "laravel/sail": "^1.41",
        "mockery/mockery": "^1.6",
        "nunomaduro/collision": "^8.6",
        "pestphp/pest": "^4.3",
        "pestphp/pest-plugin-laravel": "^4.0"
    },
    "autoload": {
        "psr-4": {
            "App\\": "app/",
            "Database\\Factories\\": "database/factories/",
            "Database\\Seeders\\": "database/seeders/"
        }
    },
    "autoload-dev": {
        "psr-4": {
            "Tests\\": "tests/"
        }
    },
    "scripts": {
        "setup": [
            "composer install",
            "@php -r \"file_exists('.env') || copy('.env.example', '.env');\"",
            "@php artisan key:generate",
            "@php artisan migrate --force",
            "npm install",
            "npm run build"
        ],
        "dev": [
            "Composer\\Config::disableProcessTimeout",
            "npx concurrently -c \"#93c5fd,#c4b5fd,#fb7185,#fdba74\" \"php artisan serve\" \"php artisan queue:listen --tries=1 --timeout=0\" \"php artisan pail --timeout=0\" \"npm run dev\" --names=server,queue,logs,vite --kill-others"
        ],
        "test": [
            "@php artisan config:clear --ansi",
            "@php artisan test"
        ],
        "post-autoload-dump": [
            "Illuminate\\Foundation\\ComposerScripts::postAutoloadDump",
            "@php artisan package:discover --ansi"
        ],
        "post-update-cmd": [
            "@php artisan vendor:publish --tag=laravel-assets --ansi --force",
            "@php artisan boost:update --ansi"
        ],
        "post-root-package-install": [
            "@php -r \"file_exists('.env') || copy('.env.example', '.env');\""
        ],
        "post-create-project-cmd": [
            "@php artisan key:generate --ansi",
            "@php -r \"file_exists('database/database.sqlite') || touch('database/database.sqlite');\"",
            "@php artisan migrate --graceful --ansi"
        ],
        "pre-package-uninstall": [
            "Illuminate\\Foundation\\ComposerScripts::prePackageUninstall"
        ]
    },
    "extra": {
        "laravel": {
            "dont-discover": []
        }
    },
    "config": {
        "optimize-autoloader": true,
        "preferred-install": "dist",
        "sort-packages": true,
        "allow-plugins": {
            "pestphp/pest-plugin": true,
            "php-http/discovery": true
        }
    },
    "minimum-stability": "stable",
    "prefer-stable": true
}
````

```bash
composer show

brianium/paratest                   7.16.1  Parallel testing for PHP
brick/math                          0.14.2  Arbitrary-precision arithmetic library
carbonphp/carbon-doctrine-types     3.2.0   Types to use Carbon in Doctrine
dflydev/dot-access-data             3.0.3   Given a deep data structure, access data by dot notation.
doctrine/deprecations               1.1.5   A small layer on top of trigger_error(E_USER_DEPRECATED) or PSR-3 logging with options to disable all deprecations o...
doctrine/inflector                  2.1.0   PHP Doctrine Inflector is a small library that can perform string manipulations with regard to upper/lowercase and s...
doctrine/lexer                      3.0.1   PHP Doctrine Lexer parser library that can be used in Top-Down, Recursive Descent Parsers.
dragonmantank/cron-expression       3.6.0   CRON for PHP: Calculate the next or previous run date and determine if a CRON expression is due
egulias/email-validator             4.0.4   A library for validating emails against several RFCs
fakerphp/faker                      1.24.1  Faker is a PHP library that generates fake data for you.
fidry/cpu-core-counter              1.3.0   Tiny utility to get the number of CPU cores.
filp/whoops                         2.18.4  php error handling for cool kids
fruitcake/php-cors                  1.4.0   Cross-origin resource sharing library for the Symfony HttpFoundation
graham-campbell/result-type         1.1.4   An Implementation Of The Result Type
guzzlehttp/guzzle                   7.10.0  Guzzle is a PHP HTTP client library
guzzlehttp/promises                 2.3.0   Guzzle promises library
guzzlehttp/psr7                     2.8.0   PSR-7 message implementation that also provides common utility methods
guzzlehttp/uri-template             1.0.5   A polyfill class for uri_template of PHP
hamcrest/hamcrest-php               2.1.1   This is the PHP port of Hamcrest Matchers
jean85/pretty-package-versions      2.1.1   A library to get pretty versions strings of installed dependencies
laravel/boost                       2.0.4   Laravel Boost accelerates AI-assisted development by providing the essential context and structure that AI needs to ...
laravel/framework                   12.49.0 The Laravel Framework.
laravel/mcp                         0.5.3   Rapidly build MCP servers for your Laravel applications.
laravel/pail                        1.2.4   Easily delve into your Laravel application's log files directly from the command line.
laravel/pint                        1.27.0  An opinionated code formatter for PHP.
laravel/prompts                     0.3.11  Add beautiful and user-friendly forms to your command-line applications.
laravel/roster                      0.2.9   Detect packages & approaches in use within a Laravel project
laravel/sail                        1.52.0  Docker files for running a basic Laravel application.
laravel/serializable-closure        2.0.8   Laravel Serializable Closure provides an easy and secure way to serialize closures in PHP.
laravel/tinker                      2.11.0  Powerful REPL for the Laravel framework.
league/commonmark                   2.8.0   Highly-extensible PHP Markdown parser which fully supports the CommonMark spec and GitHub-Flavored Markdown (GFM)
league/config                       1.2.0   Define configuration arrays with strict schemas and access values with dot notation
league/flysystem                    3.31.0  File storage abstraction for PHP
league/flysystem-local              3.31.0  Local filesystem adapter for Flysystem.
league/mime-type-detection          1.16.0  Mime-type detection for Flysystem
league/uri                          7.8.0   URI manipulation library
league/uri-interfaces               7.8.0   Common tools for parsing and resolving RFC3987/RFC3986 URI
mockery/mockery                     1.6.12  Mockery is a simple yet flexible PHP mock object framework
monolog/monolog                     3.10.0  Sends your logs to files, sockets, inboxes, databases and various web services
myclabs/deep-copy                   1.13.4  Create deep copies (clones) of your objects
nesbot/carbon                       3.11.1  An API extension for DateTime that supports 281 different languages.
nette/schema                        1.3.3   📐 Nette Schema: validating data structures against a given Schema.
nette/utils                         4.1.1   🛠  Nette Utils: lightweight utilities for string & array manipulation, image handling, safe JSON encoding/decoding, ...
nikic/php-parser                    5.7.0   A PHP parser written in PHP
nunomaduro/collision                8.8.3   Cli error handling for console/command-line PHP applications.
nunomaduro/termwind                 2.3.3   Its like Tailwind CSS, but for the console.
pestphp/pest                        4.3.2   The elegant PHP Testing Framework.
pestphp/pest-plugin                 4.0.0   The Pest plugin manager
pestphp/pest-plugin-arch            4.0.0   The Arch plugin for Pest PHP.
pestphp/pest-plugin-laravel         4.0.0   The Pest Laravel Plugin
pestphp/pest-plugin-mutate          4.0.1   Mutates your code to find untested cases
pestphp/pest-plugin-profanity       4.2.1   The Pest Profanity Plugin
phar-io/manifest                    2.0.4   Component for reading phar.io manifest information from a PHP Archive (PHAR)
phar-io/version                     3.2.1   Library for handling version information and constraints
phpdocumentor/reflection-common     2.2.0   Common reflection classes used by phpdocumentor to reflect the code structure
phpdocumentor/reflection-docblock   5.6.6   With this component, a library can provide support for annotations via DocBlocks or otherwise retrieve information t...
phpdocumentor/type-resolver         1.12.0  A PSR-5 based resolver of Class names, Types and Structural Element Names
phpoption/phpoption                 1.9.5   Option Type for PHP
phpstan/phpdoc-parser               2.3.2   PHPDoc parser with support for nullable, intersection and generic types
phpunit/php-code-coverage           12.5.2  Library that provides collection, processing, and rendering functionality for PHP code coverage information.
phpunit/php-file-iterator           6.0.0   FilterIterator implementation that filters files based on a list of suffixes.
phpunit/php-invoker                 6.0.0   Invoke callables with a timeout
phpunit/php-text-template           5.0.0   Simple template engine.
phpunit/php-timer                   8.0.0   Utility class for timing
phpunit/phpunit                     12.5.8  The PHP Unit Testing framework.
psr/clock                           1.0.0   Common interface for reading the clock.
psr/container                       2.0.2   Common Container Interface (PHP FIG PSR-11)
psr/event-dispatcher                1.0.0   Standard interfaces for event handling.
psr/http-client                     1.0.3   Common interface for HTTP clients
psr/http-factory                    1.1.0   PSR-17: Common interfaces for PSR-7 HTTP message factories
psr/http-message                    2.0     Common interface for HTTP messages
psr/log                             3.0.2   Common interface for logging libraries
psr/simple-cache                    3.0.0   Common interfaces for simple caching
psy/psysh                           0.12.19 An interactive shell for modern PHP.
ralouphie/getallheaders             3.0.3   A polyfill for getallheaders.
ramsey/collection                   2.1.1   A PHP library for representing and manipulating collections.
ramsey/uuid                         4.9.2   A PHP library for generating and working with universally unique identifiers (UUIDs).
sebastian/cli-parser                4.2.0   Library for parsing CLI options
sebastian/comparator                7.1.4   Provides the functionality to compare PHP values for equality
sebastian/complexity                5.0.0   Library for calculating the complexity of PHP code units
sebastian/diff                      7.0.0   Diff implementation
sebastian/environment               8.0.3   Provides functionality to handle HHVM/PHP environments
sebastian/exporter                  7.0.2   Provides the functionality to export PHP variables for visualization
sebastian/global-state              8.0.2   Snapshotting of global state
sebastian/lines-of-code             4.0.0   Library for counting the lines of code in PHP source code
sebastian/object-enumerator         7.0.0   Traverses array structures and object graphs to enumerate all referenced objects
sebastian/object-reflector          5.0.0   Allows reflection of object attributes, including inherited and non-public ones
sebastian/recursion-context         7.0.1   Provides functionality to recursively process PHP variables
sebastian/type                      6.0.3   Collection of value objects that represent the types of the PHP type system
sebastian/version                   6.0.0   Library that helps with managing the version number of Git-hosted PHP projects
staabm/side-effects-detector        1.0.5   A static analysis tool to detect side effects in PHP code
symfony/clock                       8.0.0   Decouples applications from the system clock
symfony/console                     7.4.4   Eases the creation of beautiful and testable command line interfaces
symfony/css-selector                8.0.0   Converts CSS selectors to XPath expressions
symfony/deprecation-contracts       3.6.0   A generic function and convention to trigger deprecation notices
symfony/error-handler               7.4.4   Provides tools to manage errors and ease debugging PHP code
symfony/event-dispatcher            8.0.4   Provides tools that allow your application components to communicate with each other by dispatching events and liste...
symfony/event-dispatcher-contracts  3.6.0   Generic abstractions related to dispatching event
symfony/finder                      7.4.5   Finds files and directories via an intuitive fluent interface
symfony/http-foundation             7.4.5   Defines an object-oriented layer for the HTTP specification
symfony/http-kernel                 7.4.5   Provides a structured process for converting a Request into a Response
symfony/mailer                      7.4.4   Helps sending emails
symfony/mime                        7.4.5   Allows manipulating MIME messages
symfony/polyfill-ctype              1.33.0  Symfony polyfill for ctype functions
symfony/polyfill-intl-grapheme      1.33.0  Symfony polyfill for intl's grapheme_* functions
symfony/polyfill-intl-idn           1.33.0  Symfony polyfill for intl's idn_to_ascii and idn_to_utf8 functions
symfony/polyfill-intl-normalizer    1.33.0  Symfony polyfill for intl's Normalizer class and related functions
symfony/polyfill-mbstring           1.33.0  Symfony polyfill for the Mbstring extension
symfony/polyfill-php80              1.33.0  Symfony polyfill backporting some PHP 8.0+ features to lower PHP versions
symfony/polyfill-php83              1.33.0  Symfony polyfill backporting some PHP 8.3+ features to lower PHP versions
symfony/polyfill-php84              1.33.0  Symfony polyfill backporting some PHP 8.4+ features to lower PHP versions
symfony/polyfill-php85              1.33.0  Symfony polyfill backporting some PHP 8.5+ features to lower PHP versions
symfony/polyfill-uuid               1.33.0  Symfony polyfill for uuid functions
symfony/process                     7.4.5   Executes commands in sub-processes
symfony/routing                     7.4.4   Maps an HTTP request to a set of configuration variables
symfony/service-contracts           3.6.1   Generic abstractions related to writing services
symfony/string                      8.0.4   Provides an object-oriented API to strings and deals with bytes, UTF-8 code points and grapheme clusters in a unifie...
symfony/translation                 8.0.4   Provides tools to internationalize your application
symfony/translation-contracts       3.6.1   Generic abstractions related to translation
symfony/uid                         7.4.4   Provides an object-oriented API to generate and represent UIDs
symfony/var-dumper                  7.4.4   Provides mechanisms for walking through any arbitrary PHP variable
symfony/yaml                        7.4.1   Loads and dumps YAML files
ta-tikoma/phpunit-architecture-test 0.8.6   Methods for testing application architecture
theseer/tokenizer                   2.0.1   A small library for converting tokenized PHP source code into XML and potentially other formats
tijsverkoyen/css-to-inline-styles   2.4.0   CssToInlineStyles is a class that enables you to convert HTML-pages/files into HTML-pages/files with inline styles. ...
vlucas/phpdotenv                    5.6.3   Loads environment variables from `.env` to `getenv()`, `$_ENV` and `$_SERVER` automagically.
voku/portable-ascii                 2.0.3   Portable ASCII library - performance optimized (ascii) string functions for php.
webmozart/assert                    2.1.2   Assertions to validate method input/output with nice error messages.
```

```bash
php -v

PHP 8.5.2 (cli) (built: Jan 14 2026 16:37:32) (NTS)
Copyright (c) The PHP Group
Zend Engine v4.5.2, Copyright (c) Zend Technologies
    with Xdebug v3.5.0, Copyright (c) 2002-2025, by Derick Rethans
    with Zend OPcache v8.5.2, Copyright (c), by Zend Technologies
```

```bash
uname -a

 Linux forge 6.18.6-arch1-1 #1 SMP PREEMPT_DYNAMIC Sun, 18 Jan 2026 00:34:07 +0000 x86_64 GNU/Linux
```
