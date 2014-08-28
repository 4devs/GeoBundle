Getting Started With GeoBundle
===========================================

## Installation and usage

Installation and usage is a quick:

1. Download GeoBundle using composer
2. Enable the Bundle
3. Use the bundle


### Step 1: Download GeoBundle using composer

Add GeoBundle in your composer.json:

```js
{
    "require": {
        "fdevs/geo-bundle": "*"
    }
}
```

Now tell composer to download the bundle by running the command:

``` bash
$ php composer.phar update fdevs/geo-bundle
```

Composer will install the bundle to your project's `vendor/fdevs` directory.


### Step 2: Enable the bundle

Enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new FDevs\GeoBundle\FDevsGeoBundle(),
    );
}
```

``` yml
// app/config/routing.yml
f_devs_geo:
    resource: "@FDevsGeoBundle/Resources/config/routing.xml"
    prefix:   /{_locale}
```


### Step 3: Use the bundle

add field in your model

``` xml
<document name="Acme\DemoBundle\Model\Document">
    <!--...-->
    <embed-one target-document="FDevs\GeoBundle\Model\Point" field="point"/>
    <indexes>
        <index>
            <key name="point" order="2dsphere"/>
        </index>
    </indexes>
</document>
```

use in form

``` php
//src/Acme/DemoBundle/Form/Type/DemoType.php
class DemoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('point', 'fdevs_geo_point');
    }
}
```

