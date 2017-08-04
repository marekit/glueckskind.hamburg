<?php
namespace Ek\App\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\Repository;
use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;

class ProductRepository extends Repository
{
    /**
     * Init
     */
    public function initializeObject()
    {
        /** @var Typo3QuerySettings $querySettings */
        $querySettings = $this->objectManager->get(Typo3QuerySettings::class);
        $querySettings->setRespectStoragePage(false);
        $querySettings->setRespectSysLanguage(true);
        $this->setDefaultQuerySettings($querySettings);
    }
}
