<?php

namespace App\Filament\Pages;

use App\Filament\Resources\InvitationResource;
use App\Filament\Resources\InvitationResource\Pages\ListInvitations;
use App\Imports\InvitationsImport;
use App\Jobs\GenerateQrInvitation;
use App\Models\Invitation;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class Import extends Page
{
    use WithFileUploads;

    public $import;

    protected static ?string $navigationIcon = 'heroicon-o-upload';

    protected static string $view = 'filament.pages.import';

    protected static ?string $navigationGroup = 'Settings';

    public function import()
    {
        Excel::import(new InvitationsImport, $this->import, \Maatwebsite\Excel\Excel::CSV);

        Notification::make()
                    ->title('Success import')
                    ->success()
                    ->send();

        $invitations = Invitation::all();
        foreach ($invitations as $invitation) {
            GenerateQrInvitation::dispatchAfterResponse($invitation);
        }

        $this->redirect('/admin/invitations');
    }
}
