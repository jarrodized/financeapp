<?php declare(strict_types = 1);

namespace Finances\Menu;

interface MenuReader
{
    public function readMenu() : array;
}