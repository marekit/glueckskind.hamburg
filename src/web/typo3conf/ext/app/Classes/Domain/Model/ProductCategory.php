<?php
namespace Ek\App\Domain\Model;

use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class ProductCategory extends BasicEntity
{
    const PRODUCT_STORAGE_IDENTIFIER = 'productsAndCategories';

    /**
     * EmbroiderThemeCategory constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->initStorageObjects();
        $this->setPid($this->settings['storagePids'][self::PRODUCT_STORAGE_IDENTIFIER]);
    }

    /**
     * Initializes all ObjectStorage properties.
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->products = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->image = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * @var string
     * @validate NotEmpty
     */
    protected $title;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $image;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ek\App\Domain\Model\Product>
     * @lazy
     */
    protected $products;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $image
     */
    public function getImage(): ObjectStorage
    {
        return $this->image;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * Adds a product
     *
     * @param \Ek\App\Domain\Model\Product $product
     *
     * @return void
     */
    public function addProduct(\Ek\App\Domain\Model\Product $product)
    {
        $this->products->attach($product);
    }

    /**
     * Removes a product
     *
     * @param \Ek\App\Domain\Model\Product $productToRemove The product to be removed
     *
     * @return void
     */
    public function removeProduct(\Ek\App\Domain\Model\Product $productToRemove)
    {
        $this->products->detach($productToRemove);
    }

    /**
     * Returns the products
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ek\App\Domain\Model\Product> $products
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Sets the products
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ek\App\Domain\Model\Product> $products
     * @return void
     */
    public function setProducts(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $products)
    {
        $this->products = $products;
    }
}
