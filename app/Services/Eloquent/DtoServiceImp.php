<?php


namespace App\Services\Eloquent;

use App\Enums\CommonStatus;
use App\Models\User;
use App\Services\Interfaces\DtoService;

class DtoServiceImp implements DtoService
{

    public function userDto(User $user)
    {
        $result = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
            'status' => $user->status,
            'status_title' => CommonStatus::getDescription($user->status),
            'avatar' => $user->avatar,
            'dob' => $user->dob,
//            'account' => null
        ];
//        if ($user->relationLoaded('account') && $user->account) {
//            $result['account'] = $user->account;
//        }
        return $result;
    }
}
