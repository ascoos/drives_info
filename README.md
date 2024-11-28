# How to use the package.

This package displays a list of the disk drivers you have on your system.

Creates a box-style formatted table that displays both the disk and the total, used, and free space on it.

You can easily integrate it into any code as long as you follow the instructions below in the details and have Ascoos Framework 24 installed.

Unfortunately, the configuration in `/conf/config.php` must be done manually.


## Installation

Download and install Ascoos Framework 24 from [Github](https://github.com/ascoos/afw) - [PHPClasses](https://www.phpclasses.org/package/13408.html) - [Sourceforge](https://sourceforge.net/p/ascoos-fw/).

In the index.php file, adjust the path to match the path where the Ascoos Framework 24 is located.

```php
// Load Ascoos Framework 24.
require_once "[YOUR ROOT SITE PATH]/afw/autoload.php";
```

## Configure the package
````
    conf/config.php
````

- Change the presets according to your needs.

```
[
    'lang'              => 'en',        // Current Language of package
    'show_title'        => true,        // Show Title in block element.
    'show_total_size'   => true,		// Show Disk Drive total size
    'theme'             => 'cleargray'  // Theme. 'default' or 'cleargray'
];
```  

Now you can run it either through another cms, or as a standalone one, like the example that came with the package.

--- 