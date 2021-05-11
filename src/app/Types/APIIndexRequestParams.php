<?php

namespace App\Types;

use Illuminate\Http\Request;

class APIIndexRequestParams
{
    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getSearch(): string
    {
        return $this->request['search'] ?? '';
    }

    public function getSortField(): string
    {
        return $this->request['sort_field'] ?? 'id';
    }

    public function getSortAsc(): string
    {
        return $this->request['sort_asc'] ?? '1';
    }

    public function getPerPage(): int
    {
        return $this->request['per_page'] ?? 10;
    }
}
