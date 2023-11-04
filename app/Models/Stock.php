<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'detail',
        'fee',
        'img_path'
    ];

    public function store($request) {
        $inputs = $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'fee' => 'required',
            'img_path' => 'required',
        ]);

        $this->name = $inputs['name'];
        $this->detail = $inputs['detail'];
        $this->fee = $inputs['fee'];
        $originalName = $request->file('img_path')->getClientOriginalName();
        $name = date('Yms_His').'_'.$originalName;
        $request->file('img_path')->move('storage/images',$name);
        $this->img_path = $name;
        $this->save();
    }
}

/*
***必須***
コマンド:sail artisan storage:link
[public/storage] link has been connected to [storage/app/public]
storageとpublicを共有させる
*/
