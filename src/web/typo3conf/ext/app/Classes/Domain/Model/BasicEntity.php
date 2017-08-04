<?php
namespace Ek\App\Domain\Model;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManager;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Object\ObjectManager;

class BasicEntity extends AbstractEntity
{
    /** @var ConfigurationManagerInterface */
    protected $configurationManager;

    /** @var ObjectManager */
    protected $objectManager;

    /** @var array  */
    protected $settings = [];

    public function __construct()
    {
        $this->objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        $this->configurationManager = $this->objectManager->get(ConfigurationManager::class);

        $this->settings = $this->configurationManager->getConfiguration(
            \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS
        );
    }
}
