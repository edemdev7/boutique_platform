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

        return view('shop.create', compact('shops'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255|unique:shops,name',
        ]);

        $shop = Shop::create([
            'user_id' => Auth::id(),
            'name'    => $request->name,
        ]);

        return redirect()->route('shop.deployed', ['shopName' => $shop->name]);
    }

    
    public function deployed($shopName) {
        return view('shop.deployed', compact('shopName'));
    }
    
}

