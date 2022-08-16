<?php

namespace App\Imports;

use App\Events\InvitationCreated;
use App\Models\Group;
use App\Models\Invitation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class InvitationsImport implements ToModel, WithHeadingRow
{
    /**
     * @param  array  $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $groupMapper = [
            'Pihak Kevin' => 'Keluarga Kevin',
            'Pihak Nanda' => 'Keluarga Nanda',
        ];

        $group = Group::where('name', $groupMapper[$row['pihak']])->first();

        return new Invitation([
            'name'       => $row['name'] ?? 'Mr. / Mrs. / Ms.',
            'guests'     => (int) $row['guests'],
            'is_family'  => $row['as_family'] == 'checked',
            'is_teapai'  => $row['tea_pai'] == 'checked',
            'group_id'   => optional($group)->id,
            'guest_code' => Invitation::generateGuestCode(),
        ]);
    }
}
