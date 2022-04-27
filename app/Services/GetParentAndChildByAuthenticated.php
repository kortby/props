<?php

namespace App\Services;

class GetParentAndChildByAuthenticated
{
     public function handle() {

         return array_merge([auth()->user()->id] , auth()->user()->childs->pluck('id')->toArray());

     }

}
