<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorepostRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Storage;

class StoreController extends Controller
{
    public function store_show()
    {
        $product_list = Product::where('user_id',Auth::id())->get('type');
        return view('store', compact('product_list'));
    }

    public function product_post()
    {
        return view('store_product_post');
    }

    public function product_create(Request $request){
        //画像フォームでリクエストした画像を取得
        $img = $request->file('img_path');
        //storage > public > img配下に画像が保存される
        $path = $img->store('img','public');
            
        Product::create([
                'type' => $request->type,
                'img_path' => $path,
                'product_explanation' => $request->product_explanation,
                'user_id' => $request->user_id
            ]);
            
            $request->session()->regenerateToken();
            //リダイレクト
            return redirect()->route('product_post');
    }
    
    public function product_update(Request $request, $id)
    {
        // 選択された記事データを取得
        $product = Product::find($id);

        // 編集処理実行
        $product->fill($request->all())->save();

        return redirect()->route('store_show');
    }

    public function product_list($type)
    {
        $product_type = Product::where('type', $type)->get();
        return view('product_list', compact('product_type'));
    }
    
    public function product_change($id)
    {
        $product_id = Product::find($id);
        return view('product_change', compact('product_id'));
    }

    public function product_destroy($id)
    {
        // 選択された記事データを取得
        $product = Product::find($id);

        // 削除処理実行
        $product->delete();

        // 記事一覧画面へ
        return redirect()->route('store_show');
    }

    public function product_popularity()
    {
        return view('product_popularity');
    }
}
