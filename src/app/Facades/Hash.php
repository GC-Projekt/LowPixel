<?php


namespace App\Facades;

use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Str;

/**
 * Hasher implementation that supports
 * the AuthMe SHA256 hash.
 *
 * @package App\Facades
 *
 * @author Mia <vottus@vott.us>
 * @createdAt 24/04/2021 22:50
 */
class Hash extends Facade implements Hasher {

    const SALT_LENGTH = 16;

    /**
     * Gets the name of the Facade.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'shaHash';
    }

    /**
     * Returns the information about the hash.
     *
     * Array shape:
     * [
     *   "rawHash" => // the raw hash,
     *   "salt" => // the salt
     * ]
     *
     * Returns null if the hash is invalid.
     *
     * @param string $hashedValue
     * @return array|null
     */
    public function info($hashedValue): ?array
    {
        $parts = explode('$', $hashedValue);
        return count($parts) === 4 ? [
            "rawHash" => $parts[2],
            "salt" => $parts[3]
        ] : null;
    }

    /**
     * Makes a hash with a random salt.
     *
     * Additionally, you can pass a salt in the
     * options array.
     *
     * Options shape (optional):
     * [
     *   "salt" => // Specify the salt
     * ]
     *
     * @param string $value
     * @param array $options
     * @return string
     */
    public function make($value, array $options = []): string
    {
        $salt = Str::random(self::SALT_LENGTH);
        return '$SHA$' . $salt . '$' . hash('sha256', hash('sha256', $value) . $salt);
    }

    /**
     * Checks whether the password matches the hash.
     *
     * This is done by hashing the password again with the
     * same salt that the hash has. If both hashes match,
     * the password is correct.
     *
     * Returns false if the hash is invalid.
     *
     * @param string $value
     * @param string $hashedValue
     * @param array $options
     * @return bool
     */
    public function check($value, $hashedValue, array $options = []): bool
    {
        $split = explode('$', $hashedValue);
        if (count($split) !== 4) return false; // Invalid hash

        $hashAndSalt = $split[3];
        $salt = array_key_exists("salt", $options) && is_string($options["salt"])
            ? $options["salt"]
            : $split[2];

        return $hashAndSalt === $this->make($value, [ "salt" => $salt ]);
    }

    /**
     * This function always returns false as the hash
     * never needs rehash.
     *
     * @param string $hashedValue
     * @param array $options
     * @return bool
     */
    public function needsRehash($hashedValue, array $options = []): bool
    {
        return false;
    }
}
