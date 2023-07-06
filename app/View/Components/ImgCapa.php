<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ImgCapa extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $postId = null
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $src = 'uploads/post-'.$this->postId.'/capa.jpg';

        if (!is_file(public_path($src))) {
            $src = 'capa-padrao.jpg';
        }

        return view('components.img-capa')
            ->with('src', $src);
    }
}
