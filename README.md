# InitigerCo Site Bundle

Simple bundle to enable multi-domain support for Symfony 3 Framework.

## Installation

Installation is simple 4 steps:

- Add composer package to your project.

```
composer require mikalai-okun/initigerco-site-bundle
```

- Add to your **AppKernel.php** file:
```
new InitigerCo\Bundle\SiteBundle\InitigerCoSiteBundle(),
```

- Edit your **parameters.yml**, by adding:
```
site_base_host: '127.0.0.1:8080' # Add your domain and port(optinal) Don't include http
```

- Update your database schema. 
```
php bin/console doctrine:schema:update
```

You would need add record in your database with default site information, please check fixture example below.

**All Done.**

You can optionally use [Doctrine Migrations](https://github.com/doctrine/DoctrineMigrationsBundle)
and/or [Fixture generator](https://github.com/nelmio/alice)

For Fixtures this is snippet for main site record:
```$xslt
InitigerCo\Bundle\SiteBundle\Entity\Site:
  Site0:
      name: "Default Site"
      domain: "127.0.0.1:8080" # Note - this should match with site_base_host in parameters.yml
      protocol: 'http://'
      description: 'Default Mandatory Website'
      theme: 'Default'
      isMain: true
```