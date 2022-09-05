<?php

namespace App\Data;

class CheckInData
{
    public ?string $sequenceGroup;

    public ?int $attendanceId;

    public bool $hasGift = true;

    public ?array $notes = [];

    public function __construct($sequenceGroup, $attendanceId, $hasGift, $notes)
    {
        $this->sequenceGroup = $sequenceGroup;
        $this->attendanceId = $attendanceId;
        $this->hasGift = $hasGift;
        $this->notes = $notes;
    }

    public static function fromFilament(array $data)
    {
        return new self($data['sequence_group'], $data['attendance_id'], $data['has_gift']);
    }

    public static function fromArray(array $data)
    {
        return new self($data['sequence_group'], $data['attendance_id'], $data['has_gift'], $data['notes']);
    }
}
