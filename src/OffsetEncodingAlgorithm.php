<?php

declare(strict_types=1);

namespace App;

class OffsetEncodingAlgorithm implements EncodingAlgorithm
{
    /**
     * Lookup string
     */
    public const CHARACTERS = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    private int $offset;

    public function __construct(int $offset = 13)
    {
        $this->offset = $offset;
    }

    /**
     * Encodes text by shifting each character (existing in the lookup string) by an offset (provided in the constructor)
     * Examples:
     *      offset = 1, input = "a", output = "b"
     *      offset = 2, input = "z", output = "B"
     *      offset = 1, input = "Z", output = "a"
     */
    public function encode(string $text): string
    {
        $out = [];
        $characters = mb_str_split(self::CHARACTERS);
        $charactersLength = count($characters);

        foreach (mb_str_split($text) as $char) {
           if (false === in_array($char, $characters, true)){
               $out[] = $char;
               continue;
           }

           $charCode = (ord($char) + $this->offset) % $charactersLength;

           $out[] = chr($charCode);
        }

        return implode($out);
    }
}
