<?php

namespace App\Service;

use App\Entity\CartItem; // Assurez-vous d'importer la classe CartItem

class CartService
{
    private $cartItems = []; // Initialisez le panier comme un tableau vide

    public function addToCart(CartItem $item): void
    {
        // Ajoutez l'article au panier
        $this->cartItems[] = $item;
    }

    public function removeFromCart(CartItem $itemToRemove): void
    {
        // Supprimez l'article du panier
        $this->cartItems = array_filter($this->cartItems, function (CartItem $item) use ($itemToRemove) {
            return $item !== $itemToRemove;
        });
    }

    public function getCartItems(): array
    {
        // Récupérez les articles actuellement présents dans le panier
        return $this->cartItems;
    }

    // Vous pouvez ajouter d'autres méthodes pour mettre à jour ou manipuler le panier
}
