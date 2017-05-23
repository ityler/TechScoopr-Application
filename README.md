# TechScoopr-Application

Technology news aggregator and viewer

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

Web server
CodeIgniter V2.2.6+
MySQL or other CI compatible database


### Installing

Guide to get a development environment running

Download CodeIgniter


If you intend to use a database, open the application/config/database.php file with a text editor and set your database settings.

```
Via https://www.codeigniter.com/user_guide/installation/downloads.html

```

Unzip the package with the unarchiver of your choice.

```
Upload the CodeIgniter folders and files to your server. Normally the index.php file will be at your root.

```

Open the application/config/config.php file with a text editor and set your base URL. If you intend to use encryption or sessions, set your encryption key.

```
application/config/config.php

```

## Roadmap

```
Change user account system to social login
```
Twitter, Facebook, G+, etc...

```
Refresh user interface (sidebar)
```
Allow more control of sources and 'tags' that appear for every user

```
Parse each article content rather than open article via modal window (resolve cross-origin issue)
```
Need to modify news fetch and parse routines

## Built With

* [Bootstrap](http://getbootstrap.com/) - HTML CSS Framework
* [CodeIgniter](https://www.codeigniter.com//) - PHP MVC Web Framework

## Contributing

Please feel free to fork the project and create a pull request. Any and all contributions are welcome.

## Authors

* **Tyler Normile** - *Initial work* - [Tyler Normile](https://github.com/ityler)

See also the list of [contributors](https://github.com/ityler/TechScoopr-Application/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details
