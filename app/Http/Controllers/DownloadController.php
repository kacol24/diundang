<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function __invoke()
    {
        $guestCode = request('guest');
        $invitation = Invitation::firstWhere('guest_code', $guestCode);

        return response()
            ->download(
                $invitation->qr_invitation_path,
                "[$guestCode] Invitation, The Wedding of Kevin & Fernanda, 24-09-2022.jpg"
            );
    }

    public function print()
    {
        $invitations = Invitation::query();

        if (request()->has('invitations')) {
            $invitationIds = explode(',', request('invitations'));
            $invitations->whereIn('id', $invitationIds);
        }

        $invitations = $invitations->get();
        $paper = request('paper');
        $break = request('break');

        $paperSizes = [
            'A3'           => [
                'paper'             => '297mm 420mm',
                'break'             => [
                    'x' => 8,
                ],
                'break_with_margin' => [
                    'x' => 8,
                ],
            ],
            'A4'           => [
                'paper'             => '210mm 297mm',
                'break'             => [
                    'x' => 6,
                ],
                'break_with_margin' => [
                    'x' => 8,
                ],
            ],
            'A3_LANDSCAPE' => [
                'paper'             => '420mm 297mm',
                'break'             => [
                    'x' => 12,
                ],
                'break_with_margin' => [
                    'x' => 8,
                ],
            ],
            'A4_LANDSCAPE' => [
                'paper'             => '297mm 210mm',
                'break'             => [
                    'x' => 8,
                ],
                'break_with_margin' => [
                    'x' => 8,
                ],
            ],
        ];

        return view('qr', compact('invitations', 'paper', 'break', 'paperSizes'));
    }
}
