<?php


namespace App\Services\Entity;

use Illuminate\Http\Request;

class EntityRepository
{
    const KEY_SORT_FIELD = 'sort-field';
    const KEY_SORT_REVERSE = 'sort-reverse';
    const KEY_FIND_FIELD = 'find-field';
    const KEY_FIND_VALUE = 'find-value';
    const KEY_PER_PAGE = 'per-page';
    /**
     * @var Request
     */
    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getEntityList($entity)
    {
        return $entity
            ->where(
                $this->request->query(self::KEY_FIND_FIELD) ?? 'id',
                'like',
                '%' . ($this->request->query(self::KEY_FIND_VALUE) ?? '') . '%'
            )
            ->orderBy(
                $this->request->query(self::KEY_SORT_FIELD) ?? 'id',
                $this->request->query(self::KEY_SORT_REVERSE) === '1' ? 'desc' : 'asc'
            )
            ->paginate(
                $this->request->query(self::KEY_PER_PAGE) ?? 10
            );
    }

    public function getEntityItem($Entity, $id)
    {
        return $Entity::findOrFail($id);
    }
}
