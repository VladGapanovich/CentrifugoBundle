<?php
/*
 * This file is part of the FreshCentrifugoBundle.
 *
 * (c) Artem Henvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Fresh\CentrifugoBundle\Token;

/**
 * JwtPayloadForPrivateChannel.
 *
 * @see https://centrifugal.github.io/centrifugo/server/private_channels/#claims
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
final class JwtPayloadForPrivateChannel extends AbstractJwtPayload
{
    /** @var string */
    private $client;

    /** @var string */
    private $channel;

    /** @var bool|null */
    private $eto;

    /**
     * @param string      $client
     * @param string      $channel
     * @param array       $info
     * @param int|null    $expirationTime
     * @param string|null $base64info
     * @param bool        $eto
     */
    public function __construct(string $client, string $channel, array $info = [], ?int $expirationTime = null, ?string $base64info = null, bool $eto = null)
    {
        $this->client = $client;
        $this->channel = $channel;
        $this->eto = $eto;

        parent::__construct($info, $expirationTime, $base64info);
    }

    /**
     * @return string
     */
    public function getClient(): string
    {
        return $this->client;
    }

    /**
     * @return string
     */
    public function getChannel(): string
    {
        return $this->channel;
    }

    /**
     * @return bool|null
     */
    public function isEto(): ?bool
    {
        return $this->eto;
    }

    /**
     * @return array
     */
    public function getPayloadData(): array
    {
        $data = [
            'client' => $this->getClient(),
            'channel' => $this->getChannel(),
        ];

        if (null !== $this->getExpirationTime()) {
            $data['exp'] = $this->getExpirationTime();
        }

        if (!empty($this->getInfo())) {
            $data['info'] = $this->getInfo();
        }

        if (null !== $this->getBase64Info()) {
            $data['b64info'] = $this->getBase64Info();
        }

        if (null !== $this->isEto()) {
            $data['eto'] = $this->isEto();
        }

        return $data;
    }
}
