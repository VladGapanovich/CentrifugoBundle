# CentrifugoBundle [WIP]

📦 Provides communication with web-socket server [Centrifugo](https://centrifugal.github.io/centrifugo/) in [Symfony](https://symfony.com/) applications.

## Features ⚙️

- [x] Compatible with latest [Centrifugo 2.4](https://github.com/centrifugal/centrifugo/releases/tag/v2.4.0) 🚀
- [x] Wrapper over [Centrifugo HTTP API](https://centrifugal.github.io/centrifugo/server/http_api/) 🧥
- [ ] @todo Json Web Token generation for anonymous, authenticated users and _private channels_ 🗝️
- [x] [Batch request](./Resources/docs/centrifugo_service_methods.md#batch-request) in [JSON streaming format](https://en.wikipedia.org/wiki/JSON_streaming) 💪
- [x] [Console commands](./Resources/docs/console_commands.md "Console commands") ⚒️️
- [ ] @todo Integration into Symfony Web-Profiler 🎛️

## Installation 🌱

```bash
$ composer req fresh/centrifugo-bundle='~1.0'
```

By default, [Symfony Flex](https://flex.symfony.com/) adds this bundle to the `config/bundles.php` file and adds required environment variables into `.env` file.
In case when you ignored `contrib-recipe` during bundle installation it would not be done. Then you have to do this manually.

#### Check the `config/bundles.php` file

```php
# config/bundles.php

return [
    // Other bundles...
    Fresh\CentrifugoBundle\FreshCentrifugoBundle::class => ['all' => true],
    // Other bundles...
];
```

#### Check the `.env` file and add you configuration

```yaml
# .env

###> fresh/centrifugo-bundle ###
CENTRIFUGO_API_KEY=secret-api-key
CENTRIFUGO_API_ENDPOINT=http://centrifugo:8000/api
CENTRIFUGO_SECRET=secret
###< fresh/centrifugo-bundle ###
```

## Using 🧑‍🎓

```php
<?php
declare(strict_types=1);

namespace App\Service;

use Fresh\CentrifugoBundle\Service\Centrifugo;

class YourService
{
    /** @var Centrifugo */
    private $centrifugo;    

    /**
     * @param Centrifugo $centrifugo
     */
    public function __construct(Centrifugo $centrifugo)
    {
        $this->centrifugo = $centrifugo;
    }

    public function example(): void
    {
        $this->centrifugo->publish(['foo' => 'bar'], 'channelA');
    }
}
```

ℹ️ [More examples of using Centrifugo service](./Resources/docs/centrifugo_service_methods.md "More examples of using Centrifugo service")

## Console commands ⚒️

* `centrifugo:publish`
* `centrifugo:broadcast`
* `centrifugo:unsubscribe`
* `centrifugo:disconnect`
* `centrifugo:presence`
* `centrifugo:presence-stats`
* `centrifugo:history`
* `centrifugo:history-remove`
* `centrifugo:channels`
* `centrifugo:info`

ℹ️ [More examples of using console commands](./Resources/docs/console_commands.md "More examples of using console commands")

## Contributing 🤝

Read the [CONTRIBUTING](https://github.com/fre5h/CentrifugoBundle/blob/master/.github/CONTRIBUTING.md) file.
