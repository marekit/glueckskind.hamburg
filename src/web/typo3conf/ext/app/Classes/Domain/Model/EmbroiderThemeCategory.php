<?php
namespace Ek\App\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class EmbroiderThemeCategory extends AbstractEntity
{
    const STORAGE_PID = 2;

    /**
     * EmbroiderThemeCategory constructor.
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
        $this->embroiderThemes = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
    public function addEmbroiderTheme(\Ek\App\Domain\Model\EmbroiderTheme $embroiderTheme) {
        $this->embroiderThemes->attach($embroiderTheme);
    }

    /**
     * Removes an embroider theme
     *
     * @param \Ek\App\Domain\Model\EmbroiderTheme $embroiderThemeToRemove The embroider theme to be removed
     *
     * @return void
     */
    public function removeEmbroiderTheme(\Ek\App\Domain\Model\EmbroiderTheme $embroiderThemeToRemove) {
        $this->embroiderThemes->detach($embroiderThemeToRemove);
    }

    /**
     * Returns the embroider themes
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ek\App\Domain\Model\EmbroiderTheme> $embroiderThemes
     */
    public function getEmbroiderThemes() {
        return $this->embroiderThemes;
    }

    /**
     * Sets the embroider themes
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Ek\App\Domain\Model\EmbroiderTheme> $embroiderThemes
     * @return void
     */
    public function setEmbroiderThemes(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $embroiderThemes) {
        $this->embroiderThemes = $embroiderThemes;
    }
}