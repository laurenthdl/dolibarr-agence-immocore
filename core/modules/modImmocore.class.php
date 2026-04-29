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
        $this->description = "Module de base pour la gestion immobilière";
        $this->version = '1.0.0';
        $this->const_name = 'MAIN_MODULE_' . strtoupper($this->name);
        $this->picto = 'company';
        $this->module_parts = array();
        $this->dirs = array();
        $this->config_page_url = array("immocore@immobilier");
        $this->depends = array();
        $this->requiredby = array();
        $this->conflictwith = array();
        $this->langfiles = array("immocore@immobilier");
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
            'fk_menu' => 'fk_mainmenu=immobilier',
            'type' => 'top',
            'titre' => 'Immobilier - Core',
            'mainmenu' => 'immobilier',
            'leftmenu' => 'immocore',
            'url' => '/custom/immocore/index.php',
            'langs' => 'immocore@immobilier',
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
        $this->rights[$r][1] = 'Lire les Immobilier - Core';
        $this->rights[$r][3] = 0;
        $this->rights[$r][4] = 'read';
        $r++;
        $this->rights[$r][0] = 700000002;
        $this->rights[$r][1] = 'Créer/Modifier les Immobilier - Core';
        $this->rights[$r][3] = 0;
        $this->rights[$r][4] = 'write';
        $r++;
        $this->rights[$r][0] = 700000003;
        $this->rights[$r][1] = 'Supprimer les Immobilier - Core';
        $this->rights[$r][3] = 0;
        $this->rights[$r][4] = 'delete';
    }

    public function init($options = ''): int
    {
        return $this->_init($sql, $options);
    }

    public function remove($options = ''): int
    {
        $sql = array();
        return $this->_remove($sql, $options);
    }
}
