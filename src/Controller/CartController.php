<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\CartService;

class CartController extends AbstractController
{
    private $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    /**
     * Ajouter un article au panier
     * @Route("/add-to-cart/{productId}", name="add_to_cart")
     */
    public function addToCart(Request $request): Response
    {
        // Logique pour ajouter l'article au panier
        // ...
    
        // Récupérer les articles du panier après les avoir modifiés
        $cartItems = $this->cartService->getCartItems();
    
        // Passer les données à la vue
        return $this->renderCartView($cartItems);
    }
    

    /**
     * Afficher le contenu du panier
     * @Route("/cart", name="cart_show")
     */
    public function show(): Response
{
    // Logique pour récupérer les articles du panier depuis votre service
    $cartItems = $this->cartService->getCartItems();

    // Comptez les articles dans le panier
    $cartItemCount = count($cartItems);

    // Définir la variable isCartOpen en fonction de votre logique
    $isCartOpen = true; // Par exemple, si le panier est ouvert

    // Passer les données à la vue
    return $this->render('cart/show.html.twig', [
        'cartItems' => $cartItems,
        'cartItemCount' => $cartItemCount,
        'isCartOpen' => $isCartOpen, // Assurez-vous de transmettre la variable à la vue
    ]);
}


    /**
     * Méthode privée pour rendre la vue du panier avec le comptage d'articles
     */
    private function renderCartView(array $cartItems): Response
    {
        // Comptez les articles dans le panier
        $cartItemCount = count($cartItems);

        // Passer les données à la vue
        return $this->render('cart/show.html.twig', [
            'cartItems' => $cartItems,
            'cartItemCount' => $cartItemCount,
        ]);
    }
}
