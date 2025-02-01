<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopPublicController extends Controller {
    public function show(Request $request, $shopName) {
        // Récupérer la boutique par son nom
        $shop = Shop::where('name', $shopName)->with('user')->first();

        if (!$shop) {
            abort(404, "Boutique non trouvée");
        }

        // Récupérer l’utilisateur associé
        $user = $shop->user;

        // Afficher une vue simple avec les informations
        return view('shop.public', compact('shop', 'user'));
    }
}
