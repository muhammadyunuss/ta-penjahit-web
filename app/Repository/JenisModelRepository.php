<?php

namespace App\Repository;

class JenisModelRepository
{
    public function getAll()
    {
        $data['jenisModel'] = [
            '1' => 'Pria',
            '2' => 'Wanita'
        ];

        return $data;
    }
}

