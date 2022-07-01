<?php

namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['id','user_id','product_id','qty'];
    public $incrementing = false;
    protected $table = 'cart';

    public static function set($data) {

		if (array_key_exists('id', $data)) {
			$cart = Cart::find($data['id']);
		} else {
			$cart = new Cart();
		}
		$cart->session_id = $data['session_id'];
		$cart->user_id = $data['user_id'];
		$cart->product_id = $data['product_id'];
		$cart->qty = $data['qty'];

		$cart = $cart->save();

		return json_encode($data);
		//return $this->sendResponse(new CartResource($cart), 'Cart updated successfully.');
    
    }

	public static function deleteCartItems($id) {

		$cartitem        = Cart::find($id);
		Cart::where('id', $id)->update(['bin' => '1']);
		return true;
	}


}
