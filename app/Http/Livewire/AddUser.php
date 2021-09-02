<?php

namespace App\Http\Livewire;

use App\Models\employees;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithFileUploads;
class AddUser extends Component
{
    use WithFileUploads;
    public $name,$phone,$image;

    public function updated($fields){
        $this->validateOnly($fields,[
            'name' => 'required|min:5',
            'phone' => 'required|min:7|max:10',
            'image' => 'required|mimes:jpeg,png',
        ]);
    }


    public function addUser(){
        $this->validate([
            'name' => 'required|min:5',
            'phone' => 'required|min:7|max:10',
            'image' => 'required|mimes:jpeg,png',
        ]);

        $emp = new employees();
           $emp->name = $this->name;
           $emp->phone = $this->phone;
           $imgname = Carbon::now()->timestamp.'.'.$this->image->extension();
           $this->image->storeAs('emp_images',$imgname);
           $emp->image = $imgname;
           $emp->save();
           Session::flash('msg','Record Saved!');
           return $this->redirect('/show-users');

    }

    public function render()
    {
        return view('livewire.add-user')->layout('layouts.base');
    }
}
