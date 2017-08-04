<?php
namespace Ek\App\Domain\Model;

use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class EmbroiderThemeCategory extends BasicEntity
{
    const PRODUCT_STORAGE_IDENTIFIER = 'embroiderThemesAndCategories';

    /**
     * Embroidertheme constructor.
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
        $this->embroiderThemes = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ek\App\Domain\Model\EmbroiderTheme>
     * @lazy
     */
    protected $embroiderThemes;

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
     * Adds an embroider theme
     *
     * @param \Ek\App\Domain\Model\EmbroiderTheme $embroiderTheme
     *
     * @return void
     */
    public function addEmbroiderTheme(\Ek\App\Domain\Model\EmbroiderTheme $embroiderTheme)
    {
        $this->embroiderThemes->attach($embroiderTheme);
    }

    /**
     * Removes an embroider theme
     *
     * @param \Ek\App\Domain\Model\EmbroiderTheme $embroiderThemeToRemove The embroider theme to be removed
     *
     * @return void
     */
    public function removeEmbroiderTheme(\Ek\App\Domain\Model\EmbroiderTheme $embroiderThemeToRemove)
    {
        $this->embroiderThemes->detach($embroiderThemeToRemove);
    }

    /**
     * Returns the embroider themes
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ek\App\Domain\Model\EmbroiderTheme> $embroiderThemes
     */
    public function getEmbroiderThemes()
    {
        return $this->embroiderThemes;
    }

    /**
     * Sets the embroider themes
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ek\App\Domain\Model\EmbroiderTheme> $embroiderThemes
     * @return void
     */
    public function setEmbroiderThemes(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $embroiderThemes)
    {
        $this->embroiderThemes = $embroiderThemes;
    }
}
