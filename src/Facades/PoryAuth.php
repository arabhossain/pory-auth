<?php


namespace Pory\Auth\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Auth Module public accessors
 * @method static login(string $username, string $password, bool $rememberMe): bool
 * @method static isAuth(): bool
 * @method static tokenData(): array
 * @method static logout(): bool
 *
 * @method static getProfile()
 */
class PoryAuth extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'poryAuth';
    }
}
