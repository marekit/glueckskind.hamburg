<?php
namespace Ek\App\Domain\Model;

use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Product extends BasicEntity
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
        $this->image = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->productCategories = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->embroiderThemeSuggestions = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * @var string
     * @validate NotEmpty
     */
    protected $title;

    /**
     * @var string
     */
    protected $teaserText;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $images;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $designSuggestions;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ek\App\Domain\Model\ProductCategory>
     * @lazy
     */
    protected $productCategories;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ek\App\Domain\Model\EmbroiderTheme>
     * @lazy
     */
    protected $embroiderThemeSuggestions;

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
     * @return string
     */
    public function getTeaserText(): string
    {
        return $this->teaserText;
    }

    /**
     * @param string $teaserText
     */
    public function setTeaserText(string $teaserText)
    {
        $this->teaserText = $teaserText;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $images
     */
    public function getImages(): ObjectStorage
    {
        return $this->images;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $images
     */
    public function setImages($images)
    {
        $this->images = $images;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $designSuggestions
     */
    public function getDesignSuggestions(): ObjectStorage
    {
        return $this->designSuggestions;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $designSuggestions
     */
    public function setDesignSuggestions($designSuggestions)
    {
        $this->designSuggestions = $designSuggestions;
    }

    /**
     * Adds a product category
     *
     * @param \Ek\App\Domain\Model\ProductCategory $productCategory
     *
     * @return void
     */
    public function addProductCategory(\Ek\App\Domain\Model\ProductCategory $productCategory)
    {
        $this->productCategories->attach($productCategory);
    }

    /**
     * Removes a product category
     *
     * @param \Ek\App\Domain\Model\ProductCategory $productCategoryToRemove The product category to be removed
     *
     * @return void
     */
    public function removeProduct(\Ek\App\Domain\Model\ProductCategory $productCategoryToRemove)
    {
        $this->productCategories->detach($productCategoryToRemove);
    }

    /**
     * Returns the product categories
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ek\App\Domain\Model\ProductCategory> $productCategories
     */
    public function getProductCategories()
    {
        return $this->productCategories;
    }

    /**
     * Sets the product categories
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ek\App\Domain\Model\Product> $productCategories
     * @return void
     */
    public function setProductCategories(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $productCategories)
    {
        $this->productCategories = $productCategories;
    }

    /**
     * Adds a embroider theme suggestion
     *
     * @param \Ek\App\Domain\Model\EmbroiderTheme $embroiderThemeSuggestion
     *
     * @return void
     */
    public function addEmbroiderThemeSuggestion(\Ek\App\Domain\Model\EmbroiderTheme $embroiderThemeSuggestion)
    {
        $this->embroiderThemeSuggestions->attach($embroiderThemeSuggestion);
    }

    /**
     * Removes a embroider theme suggestion
     *
     * @param \Ek\App\Domain\Model\EmbroiderTheme $embroiderThemeSuggestionToRemove The embroider theme suggestion category to be removed
     *
     * @return void
     */
    public function removeEmbroiderThemeSuggestion(\Ek\App\Domain\Model\EmbroiderTheme $embroiderThemeSuggestionToRemove)
    {
        $this->embroiderThemeSuggestions->detach($embroiderThemeSuggestionToRemove);
    }

    /**
     * Returns the embroider theme suggestions
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ek\App\Domain\Model\EmbroiderTheme> $embroiderThemeSuggestions
     */
    public function getEmbroiderThemeSuggestions()
    {
        return $this->embroiderThemeSuggestions;
    }

    /**
     * Sets the embroider theme suggestions
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ek\App\Domain\Model\EmbroiderTheme> $embroiderThemeSuggestions
     * @return void
     */
    public function setEmbroiderThemeSuggestions(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $embroiderThemeSuggestions)
    {
        $this->embroiderThemeSuggestions = $embroiderThemeSuggestions;
    }
}
