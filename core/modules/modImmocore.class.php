<?php

declare(strict_types=1);

require_once DOL_DOCUMENT_ROOT . '/core/modules/DolibarrModules.class.php';

class modImmocore extends DolibarrModules
{
    public function __construct($db)
    {
        global $langs, $conf;
        $this->db = $db;
        $this->numero = 700000;
        $this->rights_class = 'immocore';
        $this->family = "other";
        $this->module_position = '90';
        $this->name = preg_replace('/^mod/i', '', get_class($this));
        $this->description = "Module de base pour la gestion immobiliere";
        $this->version = '1.0.0';
        $this->const_name = 'MAIN_MODULE_' . strtoupper($this->name);
        $this->picto = 'company';
        $this->module_parts = array();
        $this->dirs = array();
        $this->config_page_url = array("");
        $this->depends = array();
        $this->requiredby = array();
        $this->conflictwith = array();
        $this->langfiles = array("immocore");
        $this->phpmin = array(8, 1);
        $this->need_dolibarr_version = array(23, 0);
        $this->warnings_activation = array();
        $this->warnings_activation_ext = array();

        $this->const = array();
        $this->tabs = array();
        $this->dictionaries = array();

        $this->menu = array();
        $r = 0;
        $this->menu[$r] = array(
            'fk_menu' => '',
            'type' => 'top',
            'titre' => 'Immobilier',
            'mainmenu' => 'immobilier',
            'leftmenu' => '',
            'url' => '/custom/immocore/index.php',
            'langs' => 'immocore',
            'position' => 700000,
            'perms' => '1',
            'target' => '',
            'user' => 2,
        );
        $r++;

        $this->rights = array();
        $this->rights_class = 'immocore';
        $r = 0;
        $this->rights[$r][0] = 700000001;
        $this->rights[$r][1] = 'Lire la configuration immobiliere';
        $this->rights[$r][3] = 0;
        $this->rights[$r][4] = 'read';
        $r++;
        $this->rights[$r][0] = 700000002;
        $this->rights[$r][1] = 'Configurer les modules immobiliers';
        $this->rights[$r][3] = 0;
        $this->rights[$r][4] = 'write';
    }

    public function init($options = ''): int
    {
        $sql = array();
        return $this->_init($sql, $options);
    }

    public function remove($options = ''): int
    {
        $sql = array();
        return $this->_remove($sql, $options);
    }
}
