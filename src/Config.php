<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://hyperf.org
 * @document https://wiki.hyperf.org
 * @contact  group@hyperf.org
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

namespace Hyperf\Config;

use Hyperf\Contract\ConfigInterface;
use Hyperf\Utils\Arr;

class Config implements ConfigInterface
{
    /**
     * @var array
     */
    private $configs = [];

    public function __construct(array $configs)
    {
        $this->configs = $configs;
    }

    /**
     * Finds an entry of the container by its identifier and returns it.
     *
     * @param string $key Identifier of the entry to look for.
     * @param mixed $default Default value of the entry when does not found.
     * @return mixed Entry.
     */
    public function get(string $key, $default = null)
    {
        return Arr::get($this->configs, $key, $default);
    }

    /**
     * Returns true if the container can return an entry for the given identifier.
     * Returns false otherwise.
     *
     * @param string $key Identifier of the entry to look for.
     * @return bool
     */
    public function has(string $key)
    {
        return Arr::has($this->configs, $key);
    }

    /**
     * Set a value to the container by its identifier.
     *
     * @param string $key Identifier of the entry to set.
     * @param mixed $value The value that save to container.
     * @return void
     */
    public function set(string $key, $value)
    {
        Arr::set($this->configs, $key, $value);
    }
}
