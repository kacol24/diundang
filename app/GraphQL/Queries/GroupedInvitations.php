<?php

namespace App\GraphQL\Queries;

use App\Models\Invitation;
use Illuminate\Support\Arr;

final class GroupedInvitations
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $invitations = Invitation::orderBy('name')->get();

        $grouped = [];

        foreach ($invitations as $invitation) {
            $firstLetter = substr($invitation->name, 0, 1);
            $grouped[strtoupper($firstLetter)][] = $invitation;
        }

        return Arr::map($grouped, function ($value, $key) {
            return [
                'key'         => $key,
                'invitations' => $value,
            ];
        });
    }
}
