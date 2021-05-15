<?php

namespace App\repositories;

use App\Types\APIIndexRequestParams;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractEntityRepository
{
    protected Model $entity;

    protected array $searchFields = [];

    public function getList(APIIndexRequestParams $APIIndexRequestParams): array
    {
        $entity = clone $this->entity;
        foreach ($this->searchFields as $searchField) {
            $entity = $entity->orWhere(
                $searchField,
                'like',
                "%" . $APIIndexRequestParams->getSearch() . "%"
            );
        }

        return $entity
            ->orderBy(
                $APIIndexRequestParams->getSortField(),
                $APIIndexRequestParams->getSortAsc() === '1' ? 'asc' : 'desc'
            )
            ->paginate($APIIndexRequestParams->getPerPage())
            ->toArray();
    }

    public function get($id): array
    {
        $entity = clone $this->entity;

        return $entity->findOrFail($id)->toArray();
    }

    public function update($id, $data): array
    {
        $entities = clone $this->entity;
        $entity = $entities->findOrFail($id);
        $entity->fill($data);
        $entity->save();

        return ['status' => 'ok'];
    }
    public function store($data): array
    {
        $entity = new $this->entity();
        $entity->fill($data);
        $entity->save();

        return [
            'id' => $entity->id
        ];
    }

    public function delete($id): array
    {
        $this->entity->findOrFail($id)->delete();

        return [
            'id' => $id
        ];
    }
}
