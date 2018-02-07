<?php
/**
 * Created by PhpStorm.
 * User: nathanaelmrejen
 * Date: 07/02/2018
 * Time: 11:30
 */

namespace DI\PlatformBundle\Antispam;


class DIAntispam
{
    private $_mailer;
    private $_locale;
    private $_minlenght;

    /**
     * DIAntispam constructor.
     * @param $_mailer
     * @param $_locale
     * @param $_minlenght
     */
    public function __construct(\Swift_Mailer $_mailer, $_locale, $_minlenght)
    {
        $this->_mailer = $_mailer;
        $this->_locale = $_locale;
        $this->_minlenght = (int) $_minlenght;
    }


    public function isSpam($text) {
        return strlen($text) < $this->_minlenght;
    }


}