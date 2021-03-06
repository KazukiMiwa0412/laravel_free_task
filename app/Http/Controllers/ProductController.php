<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        //$product->where('pro_id', 1)->update(['file_name' => 'storage/sample_pic.jpg']);
        return view('products.index')->with(['products' => $product->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , Product $product, $dir_path='public/image')
    {
        // $request->imgはformのinputのname='img'の値です
        // ->storeメソッドは別途説明記載します
        $path = $request->img->store($dir_path);
        
        // パスから、最後の「ファイル名.拡張子」の部分だけ取得します 例)sample.jpg
        $filename = basename($path);
        // FileImageをインスタンス化(実体化)します
        $data = new Product;
        // 登録する項目に必要な値を代入します
        $data->file_name = $filename;
        $data->pro_name = $request->pro_name;
        $data->pro_rest = 5;
        // データベースに保存します
        $data->save();

        // 登録後/fileにリダイレクトします その際にフラッシュメッセージを渡します
        return redirect('/products')->with('success', '登録完了しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view("products.show")->with(['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {
        $product = Product::find($id);
        (int)$request->validate([
            'num_of_purchase' => 'required|integer|lt:'.(int)$product->pro_rest
        ]);
        $product->pro_rest=(int)$product->pro_rest-(int)$request->num_of_purchase;
        $product->save();
        return view("products.show")->with(['product'=>$product]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function upload()
    {
        return view('products.upload');
    }
    
    public function search(Request $request)
    {
        $request->validate([
            'search'=>'required'
        ]);
        $product = Product::where('pro_name','like',"%$request->search%")
                        ->orderBy('updated_at', 'ASC')
                        ->paginate(10);
        
        $search_result = $request->search.'の件数は'.$product->total().'件です。';
        return view('products.index')->with(['products' => $product,'search_result'=>$search_result,'search_query'=>$request->search]);  
       
        
    }
    
}
