<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    public function add ($id)
    {
        $userid = Auth::id();
        $check = DB::table('wishlists')->where('user_id',$userid)->where('product_id',$id)->first();
        $data = array(
            'user_id'=> $userid,
            'product_id'=>$id
        );
        if(Auth::check()){
            if ($check) {
                return Response::json(['error'=>'Product Already Has on your wishlist']);
            } else {
                DB::table('wishlists')->insert($data);
                return Response::json(['success'=>'Product Added on wishlist']);
            }
            

        }else{
           return Response::json(['error'=>'At first login your account']);
        }
    }
}
