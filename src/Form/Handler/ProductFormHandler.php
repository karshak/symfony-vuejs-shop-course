<?php

namespace App\Form\Handler;

use App\Entity\Product;
use App\Utils\File\FileSaver;
use App\Utils\Manager\ProductManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Form;

class ProductFormHandler
{
    /**
     * @var FileSaver
     */
    private $fileSaver;

    /**
     * @var ProductManager
     */
    private ProductManager $productManager;

    public function __construct(ProductManager $productManager, FileSaver $fileSaver)
    {
        $this->fileSaver = $fileSaver;
        $this->productManager = $productManager;
    }

    public function processEditForm(Product $product, Form $form)
    {
        $this->productManager->save($product);

        $newImageFile = $form->get('newImage')->getData();

        $tempImageFilename = $newImageFile
            ? $this->fileSaver->saveUploadedFileIntoTemp($newImageFile)
            : null;

        $this->productManager->updateProductImages($product, $tempImageFilename);

        // TODO: ADD A NEW IMAGE WITH DIFFERENT SIZES TO THE PRODUCT
        // 1. save product changes (+)
        // 2. save uploaded file into temp folder

        // 3. work with product (addProductImage) and ProductImage
        // 3.1 get path of folder with image of product

        // 3.2 work with ProductImage
        // 3.2.1 Resize and save image into folder (BIG, MID, SM)
        // 3.2.2 Create ProductImage and return it to Product

        // 3.3 save Product with new ProductImage

        dd($tempImageFilename);

        $this->productManager->save($product);

        return $product;
    }
}