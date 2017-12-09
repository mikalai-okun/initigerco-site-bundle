# InitigerCo Site Bundle

Simple bundle to enable multi-domain support for Symfony 3 Framework.

## Installation

Installation is simple 3 steps:

- Add composer package to your project.

```$xslt
composer require mikalai-okun/initigerco-site-bundle
```

- Edit your Parameter, by adding:
```$xslt
site_base_host: '127.0.0.1:8080' # Add your domain and port(optinal) Don't include http
```

- Update your database schema. 
```$xslt
php bin/console doctrine:schema:update
```

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