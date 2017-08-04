<?php
namespace Ek\App\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class EmbroiderTheme extends AbstractEntity
{
    const STORAGE_PID = 2;

    /**
     * Embroidertheme constructor.
     *
     * @param int $pid
     */
    public function __construct($pid = self::STORAGE_PID)
    {
        $this->initStorageObjects();
        $this->setPid($pid);
    }

    /**
     * Initializes all ObjectStorage properties.
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->embroiderThemeCategories = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ek\App\Domain\Model\EmbroiderThemeCategory>
     * @lazy
     */
    protected $embroiderThemeCategories;

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
     * Adds a Embroider theme category
     *
     * @param \EK\App\Domain\Model\EmbroiderThemeCategory $EmbroiderThemeCategory
     * @return void
     */
    public function addCategory(\EK\App\Domain\Model\EmbroiderThemeCategory $EmbroiderThemeCategory)
    {
        $this->embroiderThemeCategories->attach($EmbroiderThemeCategory);
    }

    /**
     * Removes a Category
     *
     * @param \EK\App\Domain\Model\EmbroiderThemeCategory $EmbroiderThemeCategoryToRemove The Category to be removed
     * @return void
     */
    public function removeCategory(\EK\App\Domain\Model\EmbroiderThemeCategory $EmbroiderThemeCategoryToRemove)
    {
        $this->embroiderThemeCategories->detach($EmbroiderThemeCategoryToRemove);
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ek\App\Domain\Model\EmbroiderThemeCategory> $embroiderThemeCategories
     */
    public function getEmbroiderThemeCategories(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage
    {
        return $this->embroiderThemeCategories;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ek\App\Domain\Model\EmbroiderThemeCategory> $embroiderThemeCategories
     */
    public function setEmbroiderThemeCategory(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $embroiderThemeCategories)
    {
        $this->embroiderThemeCategories = $embroiderThemeCategories;
    }
}
