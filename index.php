<?php
declare(strict_types=1);
require_once __DIR__ . '/../../main.inc.php';
require_once DOL_DOCUMENT_ROOT . '/core/lib/admin.lib.php';
$langs->load("immocore@immocore");
if (!$user->admin) accessforbidden();

$action = GETPOST('action', 'aZ09');
if ($action === 'save') {
    $mods = GETPOST('modules', 'array');
    $all = ['immobien','immoclient','immolocatif','immovente','immoreno','immosyndic','immomarche','immodjamo','immorapports'];
    foreach ($all as $m) {
        $v = in_array($m, $mods) ? '1' : '0';
        dolibarr_set_const($db, 'IMMO_ACTIVATE_' . strtoupper($m), $v, 'chaine', 0, '', $conf->entity);
    }
    setEventMessages($langs->trans("SetupSaved"), null, 'mesgs');
    header("Location: " . $_SERVER["PHP_SELF"]); exit;
}

llxHeader('', 'Configuration Immobilier');
print load_fiche_titre('Configuration Immobilier', '', 'title_setup.png');
print '<form method="POST">';
print '<input type="hidden" name="token" value="' . newToken() . '">';
print '<input type="hidden" name="action" value="save">';
print '<table class="noborder centpercent">';
print '<tr class="liste_titre"><td>Module</td><td class="center">Activer</td></tr>';
$modules = ['immobien'=>'Biens','immoclient'=>'Clients','immolocatif'=>'Location','immovente'=>'Vente','immoreno'=>'Renovation','immosyndic'=>'Syndic','immomarche'=>'Etude de marche','immodjamo'=>'Paiement Djamo','immorapports'=>'Rapports'];
foreach ($modules as $k=>$l) {
    $active = !empty($conf->global->{'IMMO_ACTIVATE_' . strtoupper($k)});
    print '<tr class="oddeven"><td>' . $l . '</td><td class="center"><input type="checkbox" name="modules[]" value="' . $k . '"' . ($active?' checked':'') . '></td></tr>';
}
print '</table>';
print '<div class="center"><input type="submit" class="button" value="Enregistrer"></div>';
print '</form>';
llxFooter();
