<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class ListaCategorias extends Component
{
    private static ?array $categorias = null;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.lista-categorias')
            ->with('categorias', $this->buscaCategorias());
    }

    /**
     * Carrega informações das cattegorias em memoria
     * @return array
     */
    private function buscaCategorias(): array
    {
        if (is_null(self::$categorias)) {
            self::$categorias = DB::table('categorias', 'a')
                ->leftJoin('posts as b', 'a.id', '=', 'b.categoria_id')
                ->select(
                    'a.id',
                    'a.descricao',
                    DB::raw('COUNT(b.id) as posts_count')
                )
                ->groupBy('a.id', 'a.descricao')
                ->get()
                ->toArray();
        }

        return self::$categorias;
    }
}
