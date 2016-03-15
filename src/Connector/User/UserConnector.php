<?php namespace ExpandOnline\KlipfolioApi\Connector\User;

use ExpandOnline\KlipfolioApi\Connector\BaseApiResourceConnector;
use ExpandOnline\KlipfolioApi\Object\User\User;

class UserConnector extends BaseApiResourceConnector
{
    /**
     * @param string $option
     * @return string
     */
    public function getEndpoint($option = '')
    {
        if ($option == 'id') {
            return 'users/' . $this->getId();
        }

        return 'users';
    }

    /**
     * @return bool
     */
    public function canRead()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function canCreate()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function canUpdate()
    {
        return true;
    }

    protected function getObjectName()
    {
        return User::class;
    }
}