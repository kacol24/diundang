<?php

namespace App\Imports;

use App\Events\InvitationCreated;
use App\Models\Group;
use App\Models\Invitation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class InvitationsImport implements ToModel, WithHeadingRow
{
    protected $groupId;

    protected $seatingId;

    public function __construct($groupId = null, $seatingId = null)
    {
        $this->groupId = $groupId;
        $this->seatingId = $seatingId;
    }

    /**
     * @param  array  $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Invitation([
            'name'       => $row['name'] ?? 'Mr. / Mrs. / Ms.',
            'guests'     => $row['guests'] ?? 2,
            'is_family'  => $row['as_family'] == 'checked',
            'is_teapai'  => $row['tea_pai'] == 'checked',
            'group_id'   => $this->groupId,
            'seating_id' => $this->seatingId,
            'guest_code' => Invitation::generateGuestCode(),
        ]);
    }
}
