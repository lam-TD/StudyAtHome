<?php

namespace App\Commons;

class ConvertByte
{
    public static function humanReadableBytes($bytes, $precision = 2): string
    {
        $byteUnit = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
        $bytePrecision = [0, 0, 1, 2, 2, 3, 3, 4, 4];
        $byteNext = 1024;
        for ($i = 0; ($bytes / $byteNext) >= 0.9 && $i < count($byteUnit); $i++) {
            $bytes /= $byteNext;
        }

        return round($bytes, is_null($precision) ? $bytePrecision[$i] : $precision).' '.$byteUnit[$i];
    }
}
