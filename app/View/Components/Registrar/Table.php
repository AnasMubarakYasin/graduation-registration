<?php

namespace App\View\Components\Registrar;

use App\Models\Registrar;
use Closure;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Table extends Component
{
    /**
     * Create a new component instance.
     * @param EloquentCollection<Registrar>
     * @return void
     */
    public function __construct(public array|EloquentCollection $data = [], public Closure|null $edit = null, public Closure|null $validate = null)
    {
        //
    }

    public function route_validate(Registrar $item)
    {
        if ($this->validate) {
            return $this->validate->call($this, $item);
        }
        return route('resources.registrar.show_validate', ['registrar' => $item]);
    }
    public function route_edit(Registrar $item)
    {
        if ($this->edit) {
            return $this->edit->call($this, $item);
        }
        return route('resources.registrar.edit', ['registrar' => $item]);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.registrar.table', ['data' => $this->data]);
    }
}
