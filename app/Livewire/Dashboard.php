<?php

namespace App\Livewire;

use App\Models\Payment;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.admin')]
class Dashboard extends Component
{
    use WithPagination;

    #[Title('Dashboard')]
    public function render()
    {
        $member = User::member()->paginate(10, pageName: 'mahasiswa');
        $preMember = User::preMember()->paginate(10, pageName: 'calon');
        $applicant = User::applicant()->paginate(10, pageName: 'pendaftar');
        $counts = [
            'applicant' => [
                'total' => User::applicant()->count(),
                'label' => 'Pendaftar',
                'route' => '#',
                'can' => ['admin']
            ],
            'member' => [
                'total' => User::member()->count(),
                'label' => 'Mahasiswa',
                'route' => route('mahasiswa.index'),
                'can' => ['admin']
            ],
            'preMember' => [
                'total' => User::preMember()->count(),
                'label' => 'Calon Mahasiswa',
                'route' => '#',
                'can' => ['admin']
            ],
            'unpaid' => [
                'total' => Payment::unpaid()->count(),
                'label' => 'Belum Bayar',
                'route' => '#',
                'can' => ['admin', 'member', 'pre-member', 'applicant']
            ],
            'paid' => [
                'total' => Payment::paid()->count(),
                'label' => 'Sudah Bayar',
                'route' => '#',
                'can' => ['admin', 'member', 'pre-member', 'applicant']
            ],
        ];
        return view('livewire.dashboard')->with(compact('member', 'preMember', 'applicant', 'counts'));
    }
}
