# Lusp

A RESTful User Service API and its implementation.

## How-tos

### Start development environment

#### Prerequisites

- `composer`
- `vagrant`

---

To start a local development environment using Homestead at _http://homestead.test_, first add the following entry to your _/etc/hosts_ or _C:\Windows\System32\drivers\etc\hosts_:

```
192.168.10.10 homestead.test
```

Run the following commands to create _Homestead.yaml_:

``` sh
composer install
vendor/bin/homestead make --ip 192.168.10.10
```

Then add lines to _Homestead.yaml_ that looks like

``` yaml
variables:
  - key: APP_URL
    value: http://homestead.test
  - key: GITHUB_CLIENT_ID
    value: 0123456789abcdef0123
  - key: GITHUB_CLIENT_SECRET
    value: 0123456789abcdef0123456789abcdef01234567
```

And run finally

``` sh
composer install
vagrant up --provision
```

### XDebug

To Xdebug Lusp, run `xon` and then edit _/etc/php/8.0/cli/conf.d/20-xdebug.ini_ from `a` to `b` on your Homestead VM:

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

Then execute `systemctl restart php8.0-fpm.service`.

### Upgrade Homestead

When you upgrade Homestead, run `composer update` and then also

``` sh
rm Homestead.yaml Vagrantfile after.sh aliases
vendor/bin/homestead make --ip 192.168.10.10
```

And then restore `variables` in _Homestead.yaml_.

## License

[CC0](./LICENSE) unless otherwise specified.
