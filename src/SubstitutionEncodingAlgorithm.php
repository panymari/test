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
        $this->substitutions = $substitutions;

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
        $newString    = '';

        $splittedText = str_split($text);

        foreach ($splittedText as $char) {
            $wasChanged = false;
            foreach ($this->substitutions as $rule) {
                $chars = str_split($rule);
                if ($char == $chars[0]) {
                    $newString  .= $chars[1];
                    $wasChanged = true;
                } else {
                    if ($char == $chars[1]) {
                        $newString  .= $chars[0];
                        $wasChanged = true;
                    }
                }
            }
            if (!$wasChanged) {
                $newString .= $char;
            }
        }

        return $newString;
    }
}
