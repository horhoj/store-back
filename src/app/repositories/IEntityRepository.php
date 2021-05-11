<?php

namespace App\repositories;

use App\Types\APIIndexRequestParams;

interface IEntityRepository
{
    public function getList(APIIndexRequestParams $APIIndexRequestParams): array;

    public function get($id): array;

    public function update($id, $data): array;

    public function store($data): array;

    public function delete($id): array;
}
