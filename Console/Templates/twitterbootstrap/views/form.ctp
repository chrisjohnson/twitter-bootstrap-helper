<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
$pageTitle = sprintf('%s %s', Inflector::humanize($action), $singularHumanName);
?>
<?php echo "<?php\n".
	"\$this->Meta->add('title', __('{$pageTitle}'));
	"?>\n"; ?>
<?php echo "<?php echo \$this->element('TwitterBootstrap.breadcrumb'); ?>\n"; ?>
<?php echo "<?php\n".
	"echo \$this->TwitterBootstrap->create('{$modelClass}', array(\n" .
	"\t'class' => 'validate form-horizontal {$pluralVar}',\n" .
	"\t'url' => array('action' => \$this->params['action']{$additionalParams}),\n" .
	"\t));\n" .
	"\t// this is done to setup the FormHelper insteance to the correct model\n" .
	"\t\$this->Form->create('{$modelClass}');\n" .
	(strpos($action, 'add') !== false ? '' :
	"\t\$this->Form->hidden('id');\n"
	) .
	"\t?>\n"; ?>
	<fieldset>
		<h2><?php echo "<?php echo __('{$pageTitle}'); ?>"; ?></h2>
<?php
		echo "\t\t<?php\n";
		foreach ($fields as $field) {
			if (strpos($action, 'add') !== false && $field == $primaryKey) {
				continue;
			} elseif (!in_array($field, array('id', 'created', 'modified', 'updated'))) {
				echo "\t\techo \$this->TwitterBootstrap->input('{$field}', array(\n" .
					"\t\t'label' => '" .  Inflector::humanize($field) . "',\n" .
					"\t\t'help_inline' => ''\n," .
					"\t\t));\n";
			}
		}
		if (!empty($associations['hasAndBelongsToMany'])) {
			foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
				echo "\t\t?>\n" .
					"\t\t<div class=\"control-group habtm\">\n" .
					"\t\t\t<label class=\"control-label\">" .  Inflector::humanize($field) . "</label>\n" .
					"\t\t\t<div class=\"controls\">\n" .
					"\t\t\t\t<?php echo \$this->Form->input('{$assocName}'); ?>\n";
					"\t\t\t</div>\n" .
					"\t\t</div>\n" .
					"\t\t<?php\n";
			}
		}
		echo "\t\t?>\n";
?>
	</fieldset>
	<div class="form-actions">
		<button class="btn btn-primary btn-large" type="submit">Submit</button>
		<?php echo "<?php echo \$this->Html->link('Cancel', \$this->here); ?>"; ?>
		<div class="btn-group">
			<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
				Action
				<span class="caret"></span>
			</a>
			<ul class="dropdown-menu">
				<li><?php echo "<?php echo \$this->Html->link('<i class=\"icon-serach\"></i> ' . __('List {$pluralHumanName}'), array('action' => 'index'{$additionalParams}), array('escape' => false));?>";?></li>
				<!-- dropdown menu links -->
<?php if (strpos($action, 'add') === false): ?>
				<li><?php echo "<?php echo \$this->Html->link('<i class=\"icon-eye-open\"></i> ' . __('View'), array('action' => 'view', {$idKeyPK}), array('escape' => false)); ?>";?></li>
				<li><?php echo "<?php echo \$this->Html->link('<i class=\"icon-trash\"></i> ' . __('Delete'), array('action' => 'delete', {$idKeyPK}), array('escape' => false)); ?>";?></li>
<?php endif; ?>
<?php
		$done = array();
		foreach ($associations as $type => $data) {
			foreach ($data as $alias => $details) {
				if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
					echo "\t\t\t\t<li><?php echo \$this->Html->link('<i class=\"icon-search\"></i> ' .__('List " . Inflector::humanize($details['controller']) . "'), array('controller' => '{$details['controller']}', 'action' => 'index')); ?> </li>\n";
					echo "\t\t\t\t<li><?php echo \$this->Html->link('<i class=\"icon-add\"></i> ' . __('New " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'add')); ?> </li>\n";
					$done[] = $details['controller'];
				}
			}
		}
?>
			</ul>
		</div>
	</div>
</div>

