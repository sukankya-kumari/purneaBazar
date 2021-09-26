<?php

namespace App\Http\Livewire;

use App\Models\BItem;
use App\Models\Business;
use App\Models\Review;
use Livewire\Component;

class Searchdata extends Component
{   
    public $search;
    public function render()
    {

        $data = Business::all();
        return view('livewire.searchdata',["data"=>$data,"item"=>BItem::where("b_name","LIKE","%$this->search%")->orWhere("address","LIKE","%$this->search%")->get()]);
    }
}
