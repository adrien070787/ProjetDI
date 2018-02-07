<?php
/**
 * Created by PhpStorm.
 * User: nathanaelmrejen
 * Date: 07/02/2018
 * Time: 12:08
 */

namespace DI\PlatformBundle\Twig;

use DI\PlatformBundle\Antispam\DIAntispam;

class AntispamExtension extends \Twig_Extension
{

    private $_diAntispam;

    /**
     * AntispamExtension constructor.
     * @param $_diAntispam
     */
    public function __construct($_diAntispam)
    {
        $this->_diAntispam = $_diAntispam;
    }

    public function getFunctions() {
        return array(new \Twig_SimpleFunction('checkIfSpam', array($this, 'checkifArgumentIsSpam')));
    }

    public function getName() {
        return 'DIAntispam';
    }

    public function checkifArgumentIsSpam($text) {
        return $this->_diAntispam->isSpam($text);
    }


}