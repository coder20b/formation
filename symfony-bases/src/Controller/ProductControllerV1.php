<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Repository\ProductRepository;

class ProductControllerV1 extends AbstractController
{
    /**
     * @Route("/product", name="create_product")
     */
    public function createProduct(ValidatorInterface $validator): Response
    {
        // INJECTION DE DEPENDANCE
        // => SYMFONY CREE L'OBJET $validator POUR NOUS
        // ET FOURNIT L'OBJET EN PARAMETRE DE LA METHODE
        // (ON NE FAIT LE new POUR CREER L'OBJET...)

        // SCENARIO: CREATE

        // ETAPE 1: JE RANGE MES INFOS DANS UN OBJET
        $product = new Product();           // JE CREE UN OBJET A PARTIR DE LA CLASSE Product
        $product->setName('Keyboard');      // JE PASSE PAR LES SETTERS POUR STOCKER LES INFOS DANS LES PROPRIETES DE L'OBJET
        $product->setPrice(1999);
        $product->setDescription('Ergonomic and stylish!');

        // ETAPE 2: PERSISTENCE ENTRE PHP ET SQL
        // => SYNCHRONISER LA DATABASE AVEC LES INFOS PHP

        // VERIF DES ERREURS DANS L'OBJET $product
        $errors = $validator->validate($product);
        if (count($errors) == 0) 
        {
            // you can fetch the EntityManager via $this->getDoctrine()
            // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
            $entityManager = $this->getDoctrine()->getManager();
            // tell Doctrine you want to (eventually) save the Product (no queries yet)
            $entityManager->persist($product);
            // actually executes the queries (i.e. the INSERT query)
            $entityManager->flush();    // LE INSERT SQL VA CREER UN NOUVEL id 
                                        // ET SYMFONY SYNCHRONISE NOTRE OBJET $product AVEC CET id
            // ENSUITE, JE PEUX UTILISER LA METHODE GETTER getId POUR OBTENIR L'id DE LA LIGNE AJOUTE

            return new Response('Saved new product with id '.$product->getId());
        }
        else
        {
            // ERREUR DE VALIDATION
            return new Response((string) $errors, 400);
        }
    }


    /**
     * @Route("/productV2/{id}", name="product_showV2")
     */
    public function showV2(Product $product): Response
    {
        // use the Product!
        // ...
        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
        // ET ENSUITE ON PEUT UTILISER LES METHODES GETTERS POUR RECUPERER LES INFOS SQL
        return new Response('Check out this great product: '.$product->getName());
    }

    /**
     * @Route("/product/{id}", name="product_showV1")
     */
    public function show(int $id): Response
    {
        // DANS LE NAVIGATEUR, ON DEMANDE CETTE URL
        // http://localhost:8888/symfony/public/product/2
        // DANS SYMFONY, ON A UNE ROUTE PARAMETREE
        // @Route("/product/{id}", name="product_show")
        // => SYMFONY VA APPELER LA METHODE show(2)
        // => EN PHP, ON AURA COMME PARAMETRE $id = 2 

        // ENSUITE, ON PEUT UTILISER $id POUR FAIRE UNE REQUETE SELECT
        // => find($id)
        // SYMFONY VA CREER LA REQUETE SQL
        // SELECT * FROM product WHERE id = 2
        // => ET ENSUITE, SYMFONY RECUPERE LES INFOS SQL DANS L'OBJET $product
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
        // ET ENSUITE ON PEUT UTILISER LES METHODES GETTERS POUR RECUPERER LES INFOS SQL
        return new Response('Check out this great product: '.$product->getName());

        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }


    /**
     * @Route("/product/edit/{id}")
     */
    public function update(int $id): Response
    {
        // DANS LE NAVIGATEUR, ON DEMANDE COMME URL
        // http://localhost:8888/symfony/public/product/edit/3
        // DANS SYMFONY, ON A UNE ROUTE AVEC PARAMETRE
        //      * @Route("/product/edit/{id}")
        // => SYMFONY APPELLE LA METHODE update(3)
        // => DANS LA METHODE JE PEUX UTILISER LE PARAMETRE $id=3

        // JE PEUX $id POUR RETROUVER LA BONNE LIGNE SQL AVEC find
        $entityManager = $this->getDoctrine()->getManager();
        $product = $entityManager->getRepository(Product::class)->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        // ENSUITE JE PEUX UTILISER LES METHODES SETTERS POUR MODIFIER LES INFORMATIONS
        $product->setName('New product name!');

        // ENFIN ON SYNCHRONISE LA TABLE SQL AVEC flush
        $entityManager->flush();

        // ON FAIT UNE REDIRECTION VERS LA ROUTE product_show
        return $this->redirectToRoute('product_show', [
            'id' => $product->getId()
        ]);
    }


    /**
     * @Route("/product/delete/{id}", name="product_deleteV1")
     */
    public function delete(int $id): Response
    {
        // DANS LE NAVIGATEUR, ON DEMANDE CETTE URL
        // http://localhost:8888/symfony/public/product/delete/2
        // DANS SYMFONY, ON A UNE ROUTE PARAMETREE
        // @Route("/product/delete/{id}", name="product_delete")
        // => SYMFONY VA APPELER LA METHODE delete(2)
        // => EN PHP, ON AURA COMME PARAMETRE $id = 2 

        // ENSUITE, ON PEUT UTILISER $id POUR FAIRE UNE REQUETE SELECT
        // => find($id)
        // SYMFONY VA CREER LA REQUETE SQL
        // SELECT * FROM product WHERE id = 2
        // => ET ENSUITE, SYMFONY RECUPERE LES INFOS SQL DANS L'OBJET $product
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
        // ET ENSUITE ON PEUT UTILISER LES METHODES GETTERS POUR RECUPERER LES INFOS SQL
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($product);
        $entityManager->flush();

        return new Response('ligne supprimée: ' . $id);

    }

}

