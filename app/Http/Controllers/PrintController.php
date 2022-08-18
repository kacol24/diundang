<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function __construct()
    {
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

        $this->paperSizes = $paperSizes;
    }

    public function qr()
    {
        $invitations = Invitation::query();

        if (request()->has('invitations')) {
            $invitationIds = explode(',', request('invitations'));
            $invitations->whereIn('id', $invitationIds);
        }

        $invitations = $invitations->get();
        $paper = request('paper');
        $break = request('break');

        $paperSizes = $this->paperSizes;

        return view('qr', compact('invitations', 'paper', 'break', 'paperSizes'));
    }

    public function label()
    {
        $invitations = Invitation::query();

        if (request()->has('invitations')) {
            $invitationIds = explode(',', request('invitations'));
            $invitations->whereIn('id', $invitationIds);
        }

        $invitations = $invitations->get();
        $paper = request('paper');
        $break = request('break');

        $paperSizes = $this->paperSizes;

        $paperSizes['A4']['break']['x'] = 3;
        $paperSizes['A4']['break_with_margin']['x'] = 3;

        $paperSizes['A3']['break']['x'] = 6;
        $paperSizes['A3']['break']['count'] = 4 * 13;
        $paperSizes['A3']['break_with_margin']['x'] = 3;
        $paperSizes['A3']['break_with_margin']['count'] = 4 * 12;

        $paperSizes['A3_LANDSCAPE']['break']['x'] = 6;
        $paperSizes['A3_LANDSCAPE']['break']['count'] = 6 * 9;
        $paperSizes['A3_LANDSCAPE']['break_with_margin']['x'] = 5;
        $paperSizes['A3_LANDSCAPE']['break_with_margin']['count'] = 6 * 8;

        return view('label', compact('invitations', 'paper', 'break', 'paperSizes'));
    }
}
