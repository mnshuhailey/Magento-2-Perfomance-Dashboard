Performance Dashboard Extension for Magento 2
=====================

The Performance Dashboard Extension by MNShuhailey adds a screen to the Magento Store Admin called "Performance Dashboard". In this screen you get a clear overview of areas where the performance of your Magento 2 can be improved.

# Install via Composer #

```
composer require MNShuhailey/performance-dashboard
php bin/magento module:enable MNShuhailey_PerformanceDashboard
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy --area adminhtml
```

# Usage #

* In Admin go to *_System > Tools > Performance Dashboard_*.

# Uninstall #
```
php bin/magento module:disable MNShuhailey_PerformanceDashboard
composer remove MNShuhailey/performance-dashboard
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy --area adminhtml
```

# Screenshot #

# Description #

Based on this list we have created a dashboard which automatically tests these various config settings and other setup choices.
Checks executed:

* Is PHP 7 in use?
* Is HTTP/2 in use?
* Are the PHP perfomance settings correct?
* Is Magento in Production mode?
* Is the Magento Cache stored in Redis?
* Is the Full Page Cache stored in Redis?
* Are all caches enabled?
* Are sessions stored in Redis or Memcached?
* A check which logs CMS and Catalog pages which can't be cached in full-page-cache because of `cacheable="false"`.
* Is Composer's autoloader optimized?
* Is the Full Page Cache using Varnish?
* For Magento < 2.2:
  * If not on HTTP/2:
    * Is JavaScript bundling enabled?
    * Is merging JavaScript files enabled?
    * Is merging CSS files enabled?
  * Is minify of JavaScript files enabled?
  * Is minify of CSS files enabled?
  * Is minify of HTML enabled?
* Asynchronous sending of sales emails enabled?
* All indexes set to Asynchronous?
