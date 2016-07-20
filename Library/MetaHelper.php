<?php

abstract class MetaHelper
{
    private static $title = 'My project';

    /**
     * @return string
     */
    public static function getTitle()
    {
        return self::$title;
    }

    /**
     * @param string $title
     */
    public static function setTitle($title)
    {
        self::$title = $title;
    }

    public static function addTitle($title)
    {
        self::$title .= ' - ' . $title;
    }
    
}