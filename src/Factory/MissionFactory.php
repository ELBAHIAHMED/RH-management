<?php

namespace App\Factory;

use App\Entity\Mission;
use App\Repository\MissionRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @method static Mission|Proxy createOne(array $attributes = [])
 * @method static Mission[]|Proxy[] createMany(int $number, $attributes = [])
 * @method static Mission|Proxy find($criteria)
 * @method static Mission|Proxy findOrCreate(array $attributes)
 * @method static Mission|Proxy first(string $sortedField = 'id')
 * @method static Mission|Proxy last(string $sortedField = 'id')
 * @method static Mission|Proxy random(array $attributes = [])
 * @method static Mission|Proxy randomOrCreate(array $attributes = [])
 * @method static Mission[]|Proxy[] all()
 * @method static Mission[]|Proxy[] findBy(array $attributes)
 * @method static Mission[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Mission[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static MissionRepository|RepositoryProxy repository()
 * @method Mission|Proxy create($attributes = [])
 */
final class MissionFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://github.com/zenstruck/foundry#factories-as-services)
    }

    protected function getDefaults(): array
    {
        return [
            // TODO add your default values here (https://github.com/zenstruck/foundry#model-factories)
            'employeeIdMiss' => self::faker()->numberBetween(1,1),
            'clientName' => self::faker()->name(),
            'joinDate' => self::faker()->name(),
        ];
    }

    protected function initialize(): self
    {
        // see https://github.com/zenstruck/foundry#initialization
        return $this
            // ->afterInstantiate(function(Mission $mission) {})
        ;
    }

    protected static function getClass(): string
    {
        return Mission::class;
    }
}
