<?php


namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Services\Entity\EntityRepository;
use Illuminate\Http\Request;

abstract class AbstractAPIController extends Controller
{

    private $entity;

    private EntityRepository $entityRepository;

    public function __construct(
        EntityRepository $entityRepository,
        $entity
    )
    {
        $this->entityRepository = $entityRepository;
        $this->entity = $entity;
    }

    public function index()
    {
        return $this->entityRepository->getEntityList($this->entity);
    }


    public function store(Request $request)
    {
//        return
    }


    public function show(int $id)
    {
        return $this->entityRepository->getEntityItem($this->entity, $id);
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }


}
