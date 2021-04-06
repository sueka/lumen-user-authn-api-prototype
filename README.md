# lumen-user-service-prototype (Lusp)

A RESTful User Service API and its implementation.

## How-tos

To Xdebug Lusp, run `xon` and edit /etc/php/7.4/cli/conf.d/20-xdebug.ini on Homestead VM from `a` to `b`:

``` diff
--- a
+++ b
@@ -1,5 +1,7 @@
 zend_extension=xdebug.so
 xdebug.remote_enable = 1
+xdebug.remote_autostart = 1
 xdebug.remote_connect_back = 1
+xdebug.remote_host = 10.0.2.2
 xdebug.remote_port = 9000
 xdebug.max_nesting_level = 512
```

Then execute `sudo service php7.4-fpm restart` if needed.

## License

[CC0](./LICENSE) unless otherwise specified.
