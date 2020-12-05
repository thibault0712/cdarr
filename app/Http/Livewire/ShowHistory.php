<?php

namespace App\Http\Livewire;

use App\Models\Transcode;
use Livewire\Component;
use Livewire\WithPagination;

class ShowHistory extends Component
{
    use WithPagination;

    protected $listeners = [
        'echo:public,TranscodeFinished' => 'refreshTable'
    ];

    public function refreshTable()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.show-history',[
            'transcodes' => Transcode::whereIn('status', ['failed', 'finished'])->paginate(25)
        ]);
    }
}
