<?php

namespace App\Form\Handler;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Form;

class ProductFormHandler
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {

        $this->entityManager = $entityManager;
    }

    public function processEditForm(Product $product, Form $form)
    {
        $this->entityManager->persist($product);

        // TODO: ADD A NEW IMAGE WITH DIFFERENT SIZES TO THE PRODUCT
        // 1. save product changes (+)
        // 2. save uploaded file into temp folder

        // 3. work with product (addProductImage) and ProductImage
        // 3.1 get path of folder with image of product

        // 3.2 work with ProductImage
        // 3.2.1 Resize and save image into folder (BIG, MID, SM)
        // 3.2.2 Create ProductImage and return it to Product

        // 3.3 save Product with new ProductImage

        dd($product, $form->get('newImage')->getData());

        $this->entityManager->flush();

        return $product;
    }
}