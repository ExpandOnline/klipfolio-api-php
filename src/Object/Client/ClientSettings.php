<?php namespace ExpandOnline\KlipfolioApi\Object\Client;

use ExpandOnline\KlipfolioApi\Object\BaseApiResource;

/**
 * Class ClientProperty
 * @package ExpandOnline\KlipfolioApi\Object\ClientProprty
 *
 * @property array properties
 */
class ClientSettings extends BaseApiResource
{

    const BRAND_ENABLED = 'brand.parent.enabled';
    const DATASOURCE_BLACKLIST = 'datasource.blacklist';
    const FIRSTRUN_SHOW_TRIAL_TOUR = 'firstrun.trialTour.show';
    const FIRSTRUN_SHOW_KLIP_TOUR = 'firstrun.addKlipTour.show';
    const FIRSTRUN_SHOW_EDITOR_TOUR = 'firstrun.editorTour.show';
    const LOCALE = 'dpn.env.date.language.tag';

    public function setBrandEnabled($enabled)
    {
        $this->data[static::BRAND_ENABLED] = $enabled;
    }

    public function isBrandEnabled()
    {
        return (bool)$this->data[static::BRAND_ENABLED];
    }

    public function setDatasourceBlacklist($blacklist)
    {
        $this->data[static::DATASOURCE_BLACKLIST] = $blacklist;
    }

    public function getDatasourceBlacklist($blacklist)
    {
        return $this->data[static::DATASOURCE_BLACKLIST];
    }

    public function setShowTrialTour($enabled)
    {
        $this->data[static::FIRSTRUN_SHOW_TRIAL_TOUR] = $enabled;
    }

    public function getShowTrialTour()
    {
        return $this->data[static::FIRSTRUN_SHOW_TRIAL_TOUR];
    }

    public function setShowKlipTour($enabled)
    {
        $this->data[static::FIRSTRUN_SHOW_KLIP_TOUR] = $enabled;
    }

    public function getShowKlipTour()
    {
        return $this->data[static::FIRSTRUN_SHOW_KLIP_TOUR];
    }

    public function setShowEditorTour($enabled)
    {
        $this->data[static::FIRSTRUN_SHOW_EDITOR_TOUR] = $enabled;
    }

    public function getShowEditorTour()
    {
        return $this->data[static::FIRSTRUN_SHOW_EDITOR_TOUR];
    }

    public function setLocale($locale)
    {
        $this->data[static::LOCALE] = $locale;
    }

    public function getLocale()
    {
        return $this->data[static::LOCALE];
    }
}