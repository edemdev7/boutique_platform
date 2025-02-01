<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopPublicController extends Controller {
    public function show($shopName) {
        $shop = Shop::where('name', $shopName)->with('user')->firstOrFail();
        $user = $shop->user;

        return view('shop.public', compact('shop', 'user'));
    }
}
