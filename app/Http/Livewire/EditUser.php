<?php

namespace App\Http\Livewire;

use App\Models\employees;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditUser extends Component
{
    use WithFileUploads;
    public $name,$phone,$image,$newimage,$empid;
    public function mount($empid){
        $emp = employees::find($empid);
        $this->name = $emp->name;
        $this->phone = $emp->phone;
        $this->image = $emp->image;
    }


    public function updated($fields){
        $this->validateOnly($fields,[
            'name' => 'required|min:5',
            'phone' => 'required|min:7|max:10',
        ]);

        if($this->newimage) {
            $this->validateOnly($fields,[
                'newimage' => 'required|mimes:jpeg,png',
            ]);
        }

    }


    public function updateUser(){

        $this->validate([
            'name' => 'required|min:5',
            'phone' => 'required|min:7|max:10',
        ]);

        if($this->newimage) {
            $this->validate([
                'newimage' => 'required|mimes:jpeg,png',
            ]);
        }

        $emp = employees::find($this->empid);
        $emp->name = $this->name;
        $emp->phone = $this->phone;
        if($this->newimage){
            $imgname = Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAs('emp_images',$imgname);
            $emp->image = $imgname;
        }
        $emp->save();
        Session::flash('msg','Record updated!');
        return $this->redirect('/show-users');

    }

    public function render()
    {
        return view('livewire.edit-user')->layout('layouts.base');
    }
}
