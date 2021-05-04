<?php

namespace App\Http\Livewire;

use App\Appraisalscore;
use Livewire\Component;

class Scorestaff extends Component
{

    public $showform=false;

    public $publicationscore,
    $productionscore,
    $adminresponscore,
    $qualificationscore,
    $abilityscore,
    $servicelengthscore,
    $totalscore=0;

    

    public function mount(){
        $this->totalscore=0;
    }

    // public function addScore(){
    //     $this->validate([
    //         'publicationscore'=>'required|numeric|between:1,20',
    //         'productionscore'=>'required|numeric|between:1,25',
    //         'adminresponscore'=>'required|numeric|between:1,10',
    //         'qualificationscore'=>'required|numeric|between:1,10',
    //         'abilityscore'=>'required|numeric|between:1,15',
    //         'servicelengthscore'=>'required|numeric|between:1,20',
    //     ]);

    //     // Appraisalscore::create([]);

    // }

    
    public function render()
    {
        $this->totalscore=($this->publicationscore+$this->productionscore+$this->adminresponscore+$this->qualificationscore+$this->abilityscore+$this->servicelengthscore);
        
        return view('livewire.scorestaff');
    }
}
