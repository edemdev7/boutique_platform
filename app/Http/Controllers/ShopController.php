<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;

class ShopController extends Controller {
    public function createForm() {
        $shops = Shop::where('user_id', Auth::id())
                     ->orderBy('created_at', 'desc')
                     ->limit(10)
                     ->get();
                     
        $baseUrl = config('app.url');
        return view('shop.create', compact('shops', 'baseUrl'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255|unique:shops,name|alpha_dash',
        ]);

        $shop = Shop::create([
            'user_id' => Auth::id(),
            'name'    => $request->name,
            'url'     => $this->generateShopUrl($request->name)
        ]);

        return redirect()->route('shop.deployed', ['shopName' => $shop->name]);
    }

    private function generateShopUrl($shopName) {
        // j'utilise un sous-chemin au lieu d'un sous-domaine
        return '/shops/' . $shopName;
    }
    
    public function deployed($shopName) {
        $shop = Shop::where('name', $shopName)->firstOrFail();
        $shopUrl = url($shop->url);
        return view('shop.deployed', compact('shopName', 'shopUrl'));
    }
}

