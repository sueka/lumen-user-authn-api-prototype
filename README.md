# Lusp

A RESTful User Service API and its implementation.

## How-tos

### Start development environment

#### Prerequisites

- `composer`
- `vagrant`

---

To start a local development environment using Homestead at _https://homestead.test_, first add the following entry to your _/etc/hosts_ or _C:\Windows\System32\drivers\etc\hosts_:

```
192.168.56.56	homestead.test
```

Run the following commands to create _Homestead.yaml_:

``` sh
composer install
vendor/bin/homestead make --ip 192.168.56.56
```

Then ensure _.env_ have values like:

``` Shell
APP_URL=https://homestead.test
GITHUB_CLIENT_ID=0123456789abcdef0123
GITHUB_CLIENT_SECRET=0123456789abcdef0123456789abcdef01234567
```

And run finally

``` sh
vagrant up --provision
```

### Xdebug

To Xdebug Lusp, run `xon` and then edit _/etc/php/8.1/cli/conf.d/20-xdebug.ini_ from `a` to `b` on your Homestead VM:

``` diff
--- a
+++ b
@@ -1,5 +1,7 @@
 zend_extension=xdebug.so
 xdebug.mode = debug
+xdebug.start_with_request = yes
 xdebug.discover_client_host = true
+xdebug.client_host = 10.0.2.2
 xdebug.client_port = 9003
 xdebug.max_nesting_level = 512
```

Then execute `systemctl restart php8.1-fpm.service`.

## License

[CC0](./LICENSE)

The worktree to the commit d72e3a8 has been licensed under [MIT](./LICENSE.Laravel).
