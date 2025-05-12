<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public $title;
    public $text;
    public $image;
    public $buttonText;
    public $buttonLink;

    public function __construct($title, $text, $image, $buttonText = 'Go somewhere', $buttonLink = '#')
    {
        $this->title = $title;
        $this->text = $text;
        $this->image = $image;
        $this->buttonText = $buttonText;
        $this->buttonLink = $buttonLink;
    }

    public function render()
    {
        return view('components.card');
    }
}
