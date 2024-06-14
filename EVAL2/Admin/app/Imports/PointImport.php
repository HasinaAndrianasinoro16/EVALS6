<?php

namespace App\Imports;

use App\Models\Point;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PointImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Point([
            'rang' => $row['classement'],
            'valeur' => $row['points'],
        ]);
    }
}
