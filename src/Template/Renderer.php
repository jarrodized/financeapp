<?php declare(strict_types = 1);

namespace Finances\Template;

interface Renderer
{
    public function render($template, $data = array()) : string;
}