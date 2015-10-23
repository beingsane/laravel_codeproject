<?php

namespace CodeProject\Services;


use CodeProject\Repositories\ProjectRepository;
use CodeProject\Validators\ProjectValidator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Prettus\Validator\Exceptions\ValidatorException;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProjectService
{

    /**
     * @var ProjectRepository
     */
    private $repository;
    /**
     * @var ProjectValidator
     */
    private $validator;

    /**
     * @param ProjectRepository $repository
     * @param ProjectValidator $validator
     */
    public function __construct(ProjectRepository $repository, ProjectValidator $validator)
    {

        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function create(array $data){
        try{
            $this->validator->with($data)->passesOrFail();
            return $this->repository->create($data);
        } catch (ValidatorException $e) {
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }

    public function update(array $data, $id){
        try{
            $this->validator->with($data)->passesOrFail();
            return $this->repository->update($data, $id);
        } catch (ValidatorException $e) {
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }

    public function all()
    {
        return $this->repository->with(['owner', 'client'])->all();
    }

    public function find($id)
    {
        return $this->repository->with(['owner', 'client'])->find($id);
    }

    public function showMembers($id)
    {
        try {
            //return $this->repository->with(['members'])->find($id);
            return response()->json($this->repository->find($id)->members->all());
        } catch(ModelNotFoundException $ex) {
            return [
                'error' => true,
                'message' => 'ID not found'
            ];
        }
    }

    /**
     * @param $id
     * @param $memberId
     * @return array|mixed
     */
    public function addMember($id, $memberId)
    {
        try {
            //$user->roles()->attach($roleId, ['expires' => $expires]);
            $this->repository->find($id)->members()->attach($memberId);
            return "Concluido";
        } catch (ModelNotFoundException $e) {
            return [
                'error' => true,
                'message' => 'ID not found'
            ];
        }
    }

    public function removeMember($id, $memberId)
    {
        try {
            //$user->roles()->detach($roleId);
            //$this->repository->find($id)->members()->detach($memberId);
            $this->repository->with(['members'])->find($id)->detach($memberId);
            return response()->json([
                'error' => false,
                'message' => [
                    'removeMember' => "Member ID {$memberId} removed"
                ]
            ]);
        } catch(ModelNotFoundException $ex) {
            return [
                'error' => true,
                'message' => 'ID not found'
            ];
        }
    }

    public function isMember($id, $memberId)
    {
        try {
            $member = $this->repository->find($id)->members()->find($memberId);
            if(!$member) {
                return response()->json([
                    'error' => true,
                    'message' => [
                        'isMember' => "Member ID {$memberId} is not a member in this project"
                    ]
                ]);
            }
            return response()->json([
                'error' => false,
                'message' => [
                    'isMember' => "{$member->name} is a member in this project"
                ]
            ]);
        } catch(ModelNotFoundException $ex) {
            return [
                'error' => true,
                'message' => 'ID not found'
            ];
        }
    }

    public function createFile(array $data)
    {
        Storage::put($data['name'].".".$data['extension'], File::get($data['file']));
    }
}