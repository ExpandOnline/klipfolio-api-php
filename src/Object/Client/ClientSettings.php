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
    const LOCALE = 'dpn.env.date.language.tag';

    const FIRSTRUN_SHOW_TRIAL_TOUR = ''; //deprecated

    const FIRSTRUN_SHOW_KLIP_TOUR = 'firstrun.addKlipTour.show';
    const FIRSTRUN_SHOW_EDITOR_TOUR = 'firstrun.editorTour.show';
    const FIRSTRUN_SHOW_WELCOME_TOUR = 'firstrun.welcomeTour.show';
    const FIRSTRUN_SHOW_ADD_DASHBOARD_TOUR = 'firstrun.addDashboardTour.show';
    const FIRSTRUN_SHOW_DASHBOARD_PANEL_TOUR = 'firstrun.dashboardPanelTour.show';
    const FIRSTRUN_SHOW_CONNECT_DATA_TOUR = 'firstrun.connectDataTour.show';
    const FIRSTRUN_SHOW_KLIP_GALLERY_TOUR = 'firstrun.klipGalleryTour.show';
    const FIRSTRUN_INVITE_USERS_TOUR = 'firstrun.inviteUsersTour.show';
    const FIRSTRUN_EDITOR_FORMAT_FORMULA_TOUR = 'firstrun.editorFormatFormulaTour.show';
    const FIRSTRUN_MOBILE_BANNER = 'firstrun.mobileBanner.show';

    private function setProperty($property, $value)
    {
        $this->{$property} = $value;
    }

    /**
     * @param $property
     * @return mixed
     */
    public function getProperty($property)
    {
        return $this->data[$property];
    }

    public function setBrandEnabled($enabled)
    {
        $this->setProperty(static::BRAND_ENABLED, $enabled);
    }

    public function isBrandEnabled()
    {
        return (bool)$this->data[static::BRAND_ENABLED];
    }

    public function setDatasourceBlacklist($blacklist)
    {
        $this->setProperty(static::DATASOURCE_BLACKLIST, $blacklist);
    }

    public function getDatasourceBlacklist($blacklist)
    {
        return $this->data[static::DATASOURCE_BLACKLIST];
    }

    public function setShowTours($enabled)
    {
        foreach ([static::FIRSTRUN_SHOW_KLIP_TOUR,
                     static::FIRSTRUN_SHOW_EDITOR_TOUR,
                     static::FIRSTRUN_SHOW_WELCOME_TOUR,
                     static::FIRSTRUN_SHOW_ADD_DASHBOARD_TOUR,
                     static::FIRSTRUN_SHOW_DASHBOARD_PANEL_TOUR,
                     static::FIRSTRUN_SHOW_CONNECT_DATA_TOUR,
                     static::FIRSTRUN_SHOW_KLIP_GALLERY_TOUR,
                     static::FIRSTRUN_INVITE_USERS_TOUR,
                     static::FIRSTRUN_EDITOR_FORMAT_FORMULA_TOUR,
                     static::FIRSTRUN_MOBILE_BANNER] as $field) {
            $this->setProperty($field, $enabled);
        }
    }

    /**
     * @param $enabled
     * @deprecated firstrun.trialTour.show is no longer supported by Klipfolio
     */
    public function setShowTrialTour($enabled)
    {
        $this->setProperty(static::FIRSTRUN_SHOW_TRIAL_TOUR, $enabled);
    }

    /**
     * @deprecated firstrun.trialTour.show is no longer supported by Klipfolio
     * @return mixed
     */
    public function getShowTrialTour()
    {
        return $this->data[static::FIRSTRUN_SHOW_TRIAL_TOUR];
    }

    public function setShowKlipTour($enabled)
    {
        $this->setProperty(static::FIRSTRUN_SHOW_KLIP_TOUR, $enabled);
    }

    public function getShowKlipTour()
    {
        return $this->data[static::FIRSTRUN_SHOW_KLIP_TOUR];
    }

    public function setShowEditorTour($enabled)
    {
        $this->setProperty(static::FIRSTRUN_SHOW_EDITOR_TOUR, $enabled);
    }

    public function getShowEditorTour()
    {
        return $this->data[static::FIRSTRUN_SHOW_EDITOR_TOUR];
    }

    public function setLocale($locale)
    {
        $this->setProperty(static::LOCALE, $locale);
    }

    public function getLocale()
    {
        return $this->data[static::LOCALE];
    }
}