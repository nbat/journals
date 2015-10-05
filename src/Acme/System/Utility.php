<?php

namespace Acme\System;

abstract class Utility
{
    static function CreateSlug($string)
    {
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($string));
        return $slug;
    }
}