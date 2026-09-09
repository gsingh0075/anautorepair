<?php

namespace App\Models;

use CodeIgniter\Model;

class FormInquiryModel extends Model
{
    protected $table            = 'form_inquiries';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'name',
        'email',
        'subject',
        'message',
        'phone',
        'inquiry_type',
        'created_at',
    ];
    protected $useTimestamps = false;

    /**
     * @return list<array<string, mixed>>
     */
    public function findFiltered(?int $year = null, ?int $month = null): array
    {
        $builder = $this->builder();

        if ($year !== null) {
            $builder->where('YEAR(created_at)', $year);
        }

        if ($month !== null) {
            $builder->where('MONTH(created_at)', $month);
        }

        return $builder->orderBy('created_at', 'DESC')->get()->getResultArray();
    }
}
