<?php
/**
* 2007-2024 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2024 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined('_PS_VERSION_')) {
    exit;
}

class RegisterPlus extends Module
{
    protected $config_form = false;

    public function __construct()
    {
        $this->name = 'registerplus';
        $this->tab = 'administration';
        $this->version = '1.0.0';
        $this->author = 'Sebastian Luna';
        $this->need_instance = 0;

        parent::__construct();

        $this->displayName = $this->l('Registro con más caracteres');
        $this->description = $this->l('Aumentar el numero de caracteres a 512 al nombre y apellidos en el registro de usuarios.');


        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => '8.0');
    }

    public function install()
    {
        include(dirname(__FILE__).'/sql/install.php');

        return parent::install() &&
           $this->registerOverride('/classes/form/CustomerForm.php');

    }

    public function uninstall()
    {
        include(dirname(__FILE__).'/sql/uninstall.php');

        return parent::uninstall();
    }

}
