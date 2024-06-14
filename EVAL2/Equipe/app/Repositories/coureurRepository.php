<?php

namespace App\Repositories;

use App\Models\coureur;
use App\Repositories\BaseRepository;

class coureurRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nom',
        'numeros',
        'genre',
        'dtn',
        'equipe'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return coureur::class;
    }
}
