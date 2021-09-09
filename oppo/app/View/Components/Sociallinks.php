<?php

namespace App\View\Components;

use App\Models\settingweb;
use Illuminate\View\Component;

class Sociallinks extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()

    {
        $data['sett']= settingweb::select('facebook','instagram','youtube','linkedin')->first();
        return view('components.sociallinks')->with($data);
    }
}
