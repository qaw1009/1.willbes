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

use Monolog\ResettableInterface;

/**
 * Adds a unique identifier into records
 *
 * @author Simon Mönch <sm@webfactory.de>
 */
class UidProcessor implements ProcessorInterface, ResettableInterface
{
    private $uid;

    public function __construct(int $length = 7)
    {
        if ($length > 32 || $length < 1) {
            throw new \InvalidArgumentException('The uid length must be an integer between 1 and 32');
        }

        $this->uid = $this->generateUid($length);
    }

    public function __invoke(array $record): array
    {
        $record['extra']['uid'] = $this->uid;

        return $record;
    }

    public function getUid(): string
    {
        return $this->uid;
    }

    public function reset()
    {
        $this->uid = $this->generateUid(strlen($this->uid));
    }

    private function generateUid(int $length): string
    {
        return substr(bin2hex(random_bytes((int) ceil($length / 2))), 0, $length);
    }
}
