# CONTRIBUTING

We're using [Travis CI](https://travis-ci.com) as a continuous integration system.
 
For details, see [`.travis.yml`](../.travis.yml). 
 
## Tests

We are using [`phpspec/phpspec`](https://github.com/phpspec/phpspec) to drive the development.

Run

```
$ make test
```

to run all the specs.

## Coding Standards

We are using [`fabpot/php-cs-fixer`](https://github.com/FriendsOfPHP/PHP-CS-Fixer) to enforce coding standards.

Run

```
$ make cs
```

to automatically fix coding standard violations.

## Extra lazy?

Run

```
$ make
```

to run both coding standards check and tests!
