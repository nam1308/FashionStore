<?php

namespace App\View\Components;

use http\Env\Request;
use Illuminate\View\Component;
use App\Model\uploadImage;

class UploadMedia extends Component
{
    public $name;
    public $multiple;
    public $width;
    public $height;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name = 'image', $multiple = true, $width = 200, $height = 200)
    {
        $this->name = $name;
        $this->multiple = $multiple;
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.upload-media');
    }
}
