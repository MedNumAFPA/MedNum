<?php

namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]

class Link
{

    public string $color = '';
    public string $href = '';
}