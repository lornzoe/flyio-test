<?php

namespace App\Http\Controllers;

use App\Lib\MonthStatus;
use App\Models\JuryMember;
use App\Models\Month;
use Livewire\Component;

/**
 *
 */
class MainController extends Component
{
    /**
     * @var bool
     */
    public bool $nominationExists = false;

    /**
     * @var bool
     */
    public bool $votingExists = false;

    /**
     * @var bool
     */
    public bool $juryExists = false;


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $this->nominationExists = Month::where('status', MonthStatus::NOMINATING)->exists();
        $this->votingExists = Month::where('status', MonthStatus::VOTING)->exists();
        $this->juryExists = Month::where('status', MonthStatus::JURY)->exists();

        return view('main');
    }
}
