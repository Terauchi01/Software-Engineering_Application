<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DeliveryLocationImage;

class UserDeliveryPlaceRequestController extends Controller
{
    public function userDeliveryPlaceRequest (){
        //viewの返すところは適当で良い
        return view('user.UserDeliveryPlaceRequest');
    }
    public function placeRequest (Request $request){
        $userId = Auth::guard('users')->id();
        $request->merge(['user_id' => $userId,'deletion_date' => null]);
        try {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
    
            $imagePath = $request->file('image')->store('images', 'public');
    
            // 画像のパスをデータベースに保存
            DeliveryLocationImage::create([
                'delivery_location_id' => $userId,
                'image_url' => $imagePath,
            ]);
    
    
            return redirect()->route('user.userDeliveryPlaceRequest')->with('success', '登録されました。');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // バリデーションエラーが発生した場合
            return back()->withErrors($e->validator)->withInput();
        }
    }
}
