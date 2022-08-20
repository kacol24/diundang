<?php

namespace App\Filament\Pages;

use App\Filament\Resources\InvitationResource;
use App\Filament\Resources\InvitationResource\Pages\ListInvitations;
use App\Imports\InvitationsImport;
use App\Jobs\GenerateQrInvitation;
use App\Models\Group;
use App\Models\Invitation;
use App\Models\Seating;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class Import extends Page
{
    use WithFileUploads;

    public $import;

    public $groupId;

    public $seatingId;

    public $groups;

    public $seatings;

    protected static ?string $navigationIcon = 'heroicon-o-upload';

    protected static string $view = 'filament.pages.import';

    protected static ?string $navigationGroup = 'Settings';

    public function mount()
    {
        $this->groups = Group::all()->pluck('group_name', 'id');
        $this->seatings = Seating::all()->pluck('table_dropdown', 'id');
    }

    public function import()
    {
        Excel::import(
            new InvitationsImport($this->groupId, $this->seatingId),
            $this->import,
            \Maatwebsite\Excel\Excel::CSV
        );

        $invitations = Invitation::all();
        foreach ($invitations as $invitation) {
            GenerateQrInvitation::dispatchAfterResponse($invitation);
        }

        Notification::make()
                    ->title('Success import')
                    ->success()
                    ->send();

        $this->redirect('/admin/invitations');
    }
}
