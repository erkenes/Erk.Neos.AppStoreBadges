<?php
namespace Erk\Neos\AppStoreBadges\Eel\Helper;

use Neos\Eel\ProtectedContextAwareInterface;
use Neos\Flow\Annotations as Flow;
use Neos\Flow\I18n\Locale;
use Neos\Flow\I18n\Service;

class LocaleHelper  implements ProtectedContextAwareInterface
{
    /**
     * @Flow\Inject
     * @var Service
     */
    protected $localizationService;


    /**
     * Get the current locale
     *
     * @return string
     */
    public function getCurrentLocale(): string
    {
        $locale = $this->localizationService->getConfiguration()->getCurrentLocale();

        if (!$locale instanceof Locale) {
            $locale = $this->localizationService->getConfiguration()->getDefaultLocale();
        }

        return $locale->getLanguage();
    }

    /**
     * All methods are considered safe
     *
     * @param string $methodName
     * @return boolean
     */
    public function allowsCallOfMethod($methodName)
    {
        return true;
    }
}
