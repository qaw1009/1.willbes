<?php declare(strict_types=1);

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog\Handler;

use Monolog\Logger;
use Monolog\Utils;
use Monolog\Formatter\FlowdockFormatter;
use Monolog\Formatter\FormatterInterface;

/**
 * Sends notifications through the Flowdock push API
 *
 * This must be configured with a FlowdockFormatter instance via setFormatter()
 *
 * Notes:
 * API token - Flowdock API token
 *
 * @author Dominik Liebler <liebler.dominik@gmail.com>
 * @see https://www.flowdock.com/api/push
 */
class FlowdockHandler extends SocketHandler
{
    /**
     * @var string
     */
    protected $apiToken;

    /**
     * @param string|int $level  The minimum logging level at which this handler will be triggered
     * @param bool       $bubble Whether the messages that are handled can bubble up the stack or not
     *
     * @throws MissingExtensionException if OpenSSL is missing
     */
    public function __construct(string $apiToken, $level = Logger::DEBUG, bool $bubble = true)
    {
        if (!extension_loaded('openssl')) {
            throw new MissingExtensionException('The OpenSSL PHP extension is required to use the FlowdockHandler');
        }

        parent::__construct('ssl://api.flowdock.com:443', $level, $bubble);
        $this->apiToken = $apiToken;
    }

    /**
     * {@inheritdoc}
     */
    public function setFormatter(FormatterInterface $formatter): HandlerInterface
    {
        if (!$formatter instanceof FlowdockFormatter) {
            throw new \InvalidArgumentException('The FlowdockHandler requires an instance of Monolog\Formatter\FlowdockFormatter to function correctly');
        }

        return parent::setFormatter($formatter);
    }

    /**
     * Gets the default formatter.
     */
    protected function getDefaultFormatter(): FormatterInterface
    {
        throw new \InvalidArgumentException('The FlowdockHandler must be configured (via setFormatter) with an instance of Monolog\Formatter\FlowdockFormatter to function correctly');
    }

    /**
     * {@inheritdoc}
     *
     * @param array $record
     */
    protected function write(array $record): void
    {
        parent::write($record);

        $this->closeSocket();
    }

    /**
     * {@inheritdoc}
     */
    protected function generateDataStream(array $record): string
    {
        $content = $this->buildContent($record);

        return $this->buildHeader($content) . $content;
    }

    /**
     * Builds the body of API call
     */
    private function buildContent(array $record): string
    {
        return Utils::jsonEncode($record['formatted']['flowdock']);
    }

    /**
     * Builds the header of the API Call
     */
    private function buildHeader(string $content): string
    {
        $header = "POST /v1/messages/team_inbox/" . $this->apiToken . " HTTP/1.1\r\n";
        $header .= "Host: api.flowdock.com\r\n";
        $header .= "Content-Type: application/json\r\n";
        $header .= "Content-Length: " . strlen($content) . "\r\n";
        $header .= "\r\n";

        return $header;
    }
}
