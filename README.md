# phpBB 3.2 PhpBB Extension - marttiphpbb Scss Theme Dev

[Topic on phpBB.com](https://www.phpbb.com/community/viewtopic.php?f=456)

![Edit A](doc/edit_a.png)

![Edit B](doc/edit_b.png)

## Requirements

* phpBB 3.2.3+
* PHP 7.1+
* The [Codemirror helper extension](https://github.com/marttiphpbb/phpbb-ext-codemirror)
* Run `composer update` in order to install the [leafo/scssphp](http://leafo.github.io/scssphp/) scss compiler.

## Quick Install

You can install this on the latest release of phpBB 3.2 by following the steps below:

* Create `marttiphpbb/scssthemedev` in the `ext` directory.
* Download and unpack the repository into `ext/marttiphpbb/scssthemedev`
* Enable `Scss Theme Dev` in the ACP at `Customise -> Manage extensions`.
* You can start editing in the ACP at `Extensions` -> `Scss Theme Dev`.

## Uninstall

* Disable `Scss Theme Dev` in the ACP at `Customise -> Extension Management -> Extensions`.
* To permanently uninstall, click `Delete Data` (the `store/marttiphpbb/scssthemedev` directory will be removed automatically). Optionally delete the `/ext/marttiphpbb/scssthemedev` directory.

## Support

* Report bugs and other issues to the [Issue Tracker](https://github.com/marttiphpbb/phpbb-ext-scssthemedev/issues).

## License

[GPL-2.0](license.txt)
