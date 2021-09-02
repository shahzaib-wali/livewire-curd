<?php

namespace App\Http\Livewire;

use App\Models\employees;
use Livewire\Component;

class Show extends Component
{
    public $empid;

    public function deleteUser($empid){
        employees::destroy($empid);
        session()->flash('msg','Deleted');
    }

    public function render()
    {
        $emps = employees::paginate(2);
        return view('livewire.show',compact('emps'))->layout('layouts.base');
    }


}
