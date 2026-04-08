<?php

namespace App\Services\Admin;

use App\Models\Team;
use Illuminate\Support\Facades\DB;

class TeamService
{
    public static function store(array $data){
        try{
            DB::beginTransaction();
            Team::create([
                'name'=>$data['name'],
                'buyer_owner_id'=>$data['buyer_owner_id']
            ]);
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
        }
    }
}
