<?php

namespace App\View\Components\ArchiveRegistrar;

use App\Models\Quota;
use App\Models\Registrar;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class Index extends Component
{
    public array $fields = [
        'name' => 'name',
        'nim' => 'nim',
        'nik' => 'nik',
    ];
    public array $columns = ['name', 'nim', 'nik'];
    public LengthAwarePaginator $paginator;

    public function __construct(Quota $quota)
    {
        /** @var Builder|EloquentBuilder */
        $query = Registrar::query()->where('quota_id', $quota->id);
        $request = request();
        $this->columns = $request->query('columns', $this->columns);
        $this->paginator = $query->paginate(10);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.archive-registrar.index', [
            'paginator' => $this->paginator,
            'fields' => $this->fields,
            'columns' => $this->columns,
        ]);
    }
}
