<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        \Menu::make('MyNavBar', function ($menu) {
            $menu->raw('Menu User', ['class' => 'menu-header']); //divide
            
            // menu biasa
            $menu->add('Home', 'home')
            ->append('</span>')
            ->prepend('<i class="fas fa-home"></i> <span>')
            ->link->attr(['class' => 'nav-link']);
            
            // menu dropdown
            $dropdown = $menu->add('<span>Dropdown</span>', ['class' => 'nav-item dropdown'])->prepend('<i class="fas fa-fire"></i>');
            $dropdown->link->attr(['class' => 'nav-link has-dropdown']);
            $dropdown->add('Menu 1');
            $dropdown->add('Menu 2');
            $dropdown->add('Menu 3');

            $menu->add('Profil Sekolah')
            ->append('</span>')
            ->prepend('<i class="fas fa-school"></i> <span>')
            ->link->attr(['class' => 'nav-link']);

        });
        
        return $next($request);
    }
}
