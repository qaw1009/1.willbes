<?php declare(strict_types=1);

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog\Processor;

/**
 * Injects url/method and remote IP of the current web request in all records
 *
 * @author Jordi Boggiano <j.boggiano@seld.be>
 */
class WebProcessor implements ProcessorInterface
{
    /**
     * @var array|\ArrayAccess
     */
    protected $serverData;

    /**
     * Default fields
     *
     * Array is structured as [key in record.extra => key in $serverData]
     *
     * @var array
     */
    protected $extraFields = [
        'url'         => 'REQUEST_URI',
        'ip'          => 'REMOTE_ADDR',
        'http_method' => 'REQUEST_METHOD',
        'server'      => 'SERVER_NAME',
        'referrer'    => 'HTTP_REFERER',
    ];

    /**
     * @param array|\ArrayAccess|null $serverData  Array or object w/ ArrayAccess that provides access to the $_SERVER data
     * @param array|null              $extraFields Field names and the related key inside $serverData to be added. If not provided it defaults to: url, ip, http_method, server, referrer
     */
    public function __construct($serverData = null, array $extraFields = null)
    {
        if (null === $serverData) {
            $this->serverData = &$_SERVER;
        } elseif (is_array($serverData) || $serverData instanceof \ArrayAccess) {
            $this->serverData = $serverData;
        } else {
            throw new \UnexpectedValueException('$serverData must be an array or object implementing ArrayAccess.');
        }

        if (null !== $extraFields) {
            if (isset($extraFields[0])) {
                foreach (array_keys($this->extraFields) as $fieldName) {
                    if (!in_array($fieldName, $extraFields)) {
                        unset($this->extraFields[$fieldName]);
                    }
                }
            } else {
                $this->extraFields = $extraFields;
            }
        }
    }

    public function __invoke(array $record): array
    {
        // skip processing if for some reason request data
        // is not present (CLI or wonky SAPIs)
        if (!isset($this->serverData['REQUEST_URI'])) {
            return $record;
        }

        $record['extra'] = $this->appendExtraFields($record['extra']);

        return $record;
    }

    public function addExtraField(string $extraName, string $serverName): self
    {
        $this->extraFields[$extraName] = $serverName;

        return $this;
    }

    private function appendExtraFields(array $extra): array
    {
        foreach ($this->extraFields as $extraName => $serverName) {
            $extra[$extraName] = $this->serverData[$serverName] ?? null;
        }

        if (isset($this->serverData['UNIQUE_ID'])) {
            $extra['unique_id'] = $this->serverData['UNIQUE_ID'];
        }

        return $extra;
    }
}
