<?php


namespace App\Services\Eloquent;



use App\Repositories\Interfaces\UserRepository;
use App\Services\Interfaces\UserService;
use Illuminate\Support\Facades\Hash;

class UserServiceImp implements UserService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function list($search, $status, $limit)
    {
        return $this->userRepository->find($search, $status, $limit);
    }

    public function store($data)
    {
        $data['password'] = Hash::make($data['password']);
        return $this->userRepository->create($data);
    }

    public function detail($id)
    {
        return $this->userRepository->findById($id);
    }

    public function save($data, $id)
    {
        if (array_key_exists('password', $data)) {
            $data['password'] = Hash::make($data['password']);
        }
        return $this->userRepository->findByIdAndUpdate($data, $id);
    }

    public function delete($id)
    {
        return $this->userRepository->findByIdAndDelete($id);
    }
}
