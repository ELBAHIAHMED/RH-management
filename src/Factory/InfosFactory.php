<?php

namespace App\Factory;

use App\Entity\Infos;
use App\Repository\InfosRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @method static Infos|Proxy createOne(array $attributes = [])
 * @method static Infos[]|Proxy[] createMany(int $number, $attributes = [])
 * @method static Infos|Proxy find($criteria)
 * @method static Infos|Proxy findOrCreate(array $attributes)
 * @method static Infos|Proxy first(string $sortedField = 'id')
 * @method static Infos|Proxy last(string $sortedField = 'id')
 * @method static Infos|Proxy random(array $attributes = [])
 * @method static Infos|Proxy randomOrCreate(array $attributes = [])
 * @method static Infos[]|Proxy[] all()
 * @method static Infos[]|Proxy[] findBy(array $attributes)
 * @method static Infos[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Infos[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static InfosRepository|RepositoryProxy repository()
 * @method Infos|Proxy create($attributes = [])
 */
final class InfosFactory extends ModelFactory
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
            'name' => self::faker()->name(),
            'birthday' => self::faker()->date('Y-m-d'),
            'address'=>self::faker()->country(),
            'email'=>self::faker()->email(),

            'phone'=>self::faker()->phoneNumber(),
            'role' => self::faker()->jobTitle(),
            'employeeId' => self::faker()->randomNumber(),
            'experience' => self::faker()->numberBetween(1,12),
            'participated' => self::faker()->numberBetween(50,300),
            'awards'=>self::faker()->numberBetween(5,50),
            'joinDate'=>self::faker()->date('Y-m-d',)

        ];
    }

    protected function initialize(): self
    {
        // see https://github.com/zenstruck/foundry#initialization
        return $this
            // ->afterInstantiate(function(Infos $infos) {})
        ;
    }

    protected static function getClass(): string
    {
        return Infos::class;
    }
}
