<?php

declare(strict_types=1);

namespace App;

class SubstitutionEncodingAlgorithm implements EncodingAlgorithm
{
    private array $substitutions;

    /**
     * @param array<string> $substitutions
     */
    public function __construct(array $substitutions)
    {
        $this->substitutions = [];
    }

    /**
     * Encodes text by substituting character with another one provided in the pair.
     * For example pair "ab" defines all "a" chars will be replaced with "b" and all "b" chars will be replaced with "a"
     * Examples:
     *      substitutions = ["ab"], input = "aabbcc", output = "bbaacc"
     *      substitutions = ["ab", "cd"], input = "adam", output = "bcbm"
     */
    public function encode(string $text): string
    {
        /**
         * @todo: Implement it
         */

        return '';
    }
}
