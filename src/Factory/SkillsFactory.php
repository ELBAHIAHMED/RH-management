<?php

namespace App\Factory;

use App\Entity\Skills;
use App\Repository\SkillsRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @method static Skills|Proxy createOne(array $attributes = [])
 * @method static Skills[]|Proxy[] createMany(int $number, $attributes = [])
 * @method static Skills|Proxy find($criteria)
 * @method static Skills|Proxy findOrCreate(array $attributes)
 * @method static Skills|Proxy first(string $sortedField = 'id')
 * @method static Skills|Proxy last(string $sortedField = 'id')
 * @method static Skills|Proxy random(array $attributes = [])
 * @method static Skills|Proxy randomOrCreate(array $attributes = [])
 * @method static Skills[]|Proxy[] all()
 * @method static Skills[]|Proxy[] findBy(array $attributes)
 * @method static Skills[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Skills[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static SkillsRepository|RepositoryProxy repository()
 * @method Skills|Proxy create($attributes = [])
 */
final class SkillsFactory extends ModelFactory
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
            'fist' => self::faker()->word(5),
            'employeeIdSkills'=>self::faker()->numberBetween(1,1),
            'firstPerc' => self::faker()->numberBetween(30,99),
            'second' => self::faker()->word(5),
            'third' => self::faker()->word(5),
            'fourth' => self::faker()->word(5),
            'secondPercent' => self::faker()->numberBetween(30,99),
            'thirdPerc' => self::faker()->numberBetween(30,99),
            'fourthPerc' => self::faker()->numberBetween(30,99),
        ];
    }

    protected function initialize(): self
    {
        // see https://github.com/zenstruck/foundry#initialization
        return $this
            // ->afterInstantiate(function(Skills $skills) {})
        ;
    }

    protected static function getClass(): string
    {
        return Skills::class;
    }
}
