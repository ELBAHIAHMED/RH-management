<?php

namespace App\Factory;

use App\Entity\Education;
use App\Repository\EducationRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @method static Education|Proxy createOne(array $attributes = [])
 * @method static Education[]|Proxy[] createMany(int $number, $attributes = [])
 * @method static Education|Proxy find($criteria)
 * @method static Education|Proxy findOrCreate(array $attributes)
 * @method static Education|Proxy first(string $sortedField = 'id')
 * @method static Education|Proxy last(string $sortedField = 'id')
 * @method static Education|Proxy random(array $attributes = [])
 * @method static Education|Proxy randomOrCreate(array $attributes = [])
 * @method static Education[]|Proxy[] all()
 * @method static Education[]|Proxy[] findBy(array $attributes)
 * @method static Education[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Education[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static EducationRepository|RepositoryProxy repository()
 * @method Education|Proxy create($attributes = [])
 */
final class EducationFactory extends ModelFactory
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
            'employeeIdEduc' => self::faker()->numberBetween(1,1),
            'elementarySchool' => self::faker()->realText(40),
            'highSchool' => self::faker()->realText(40),
            'college' => self::faker()->realText(40),
            'university' => self::faker()->realText(40),
            'master' => self::faker()->realText(40),
            'elementarySchool1' => self::faker()->realText(40),
            'highSchool1' => self::faker()->realText(40),
            'college1' => self::faker()->realText(40),
            'university1' => self::faker()->realText(40),
            'master1' => self::faker()->realText(40),
        ];
    }

    protected function initialize(): self
    {
        // see https://github.com/zenstruck/foundry#initialization
        return $this
            // ->afterInstantiate(function(Education $education) {})
        ;
    }

    protected static function getClass(): string
    {
        return Education::class;
    }
}
