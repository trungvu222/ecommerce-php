<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public static function getAll()
    {
        return \Cart::instance('default')->content();
    }

    public static function add( $request )
    {
        $product = Product::where('slug', $request->slug)->first();
        \Cart::instance( $request->cart_type )->add($product->id, $product->title, 1, $product->netPrice(), ['slug' => $product->slug])->associate(Product::class);
        
        if( $request->cart_type == 'wishlist' )
            return response()->json( ['success' => 1, 'message' => 'Sản phẩm đã được thêm vào yêu thích'] );
        else
            return response()->json( ['success' => 1, 'message' => 'Sản phẩm đã được thêm vào giỏ hàng'] );
    }

    public static function remove( $rowId, $cart_type )
    {
        \Cart::instance( $cart_type )->remove($rowId);
        
        if( $cart_type == 'wishlist' )
            return response()->json( ['success' => 1, 'message' => 'Sản phẩm đã được xóa khỏi yêu thích'] );
        else
            return response()->json( ['success' => 1, 'message' => 'Sản phẩm đã được xóa khỏi giỏ hàng'] );
    }

    public static function updateCart( $request )
    {
        foreach( json_decode($request->rows) as $key => $rowId)
            \Cart::instance( $request->cart_type )->update($rowId, json_decode($request->qtys)[$key]);
        
        if( $request->cart_type == 'wishlist' )
            return response()->json( ['success' => 1, 'message' => 'Sản phẩm yêu thích đã được cập nhật'] );
        else
            return response()->json( ['success' => 1, 'message' => 'Giỏ hàng đã được cập nhật'] );
    }
}
