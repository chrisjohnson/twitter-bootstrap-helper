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
?>
<?php echo "<?php echo \$this->element('TwitterBootstrap.breadcrumb'); ?>\n"; ?>
<div class="<?php echo $pluralVar; ?> form">
<?php echo "<?php\n".
	"\techo \$this->TwitterBootstrap->create('{$modelClass}', array('class' => 'validate form-horizontal'));\n" .
	"\t// this is done to setup the FormHelper insteance to the correct model\n" .
	"\t\$this->Form->create('{$modelClass}');\n" .
	"\t?>\n"; ?>
	<fieldset>
		<legend><?php printf("<?php echo __('%s %s'); ?>", Inflector::humanize($action), $singularHumanName); ?></legend>
<?php
		echo "\t<?php\n";
		foreach ($fields as $field) {
			if (strpos($action, 'add') !== false && $field == $primaryKey) {
				continue;
			} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
				echo "\t\techo \$this->TwitterBootstrap->input('{$field}', array(" .
					"\n\t'label' => '" .  Inflector::humanize($field) . "'," .
					"\n\t'input' => \$this->Form->text('{$field}')," .
					"\n\t'help_inline' => ''," .
					"\n\t'help_block' => ''," .
					"\n\t));\n";
			}
		}
		if (!empty($associations['hasAndBelongsToMany'])) {
			foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
				echo "\t\techo \$this->Form->input('{$assocName}');\n";
			}
		}
		echo "\t?>\n";
?>
	</fieldset>
	<div class="form-actions">
		<button class="btn btn-primary btn-large" type="submit">Submit</button>
		<div class="btn-group">
			<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
				Action
				<span class="caret"></span>
			</a>
			<ul class="dropdown-menu">
				<!-- dropdown menu links -->
				<?php if (strpos($action, 'add') === false): ?>
					<li><?php echo "<?php echo \$this->Form->postLink(__('Delete'), array('action' => 'delete', \$this->Form->value('{$modelClass}.{$primaryKey}')), null, __('Are you sure you want to delete # %s?', \$this->Form->value('{$modelClass}.{$primaryKey}'))); ?>"; ?></li>
				<?php endif; ?>
				<li><?php echo "<?php echo \$this->Html->link(__('List " . $pluralHumanName . "'), array('action' => 'index')); ?>"; ?></li>
				<?php
				$done = array();
				foreach ($associations as $type => $data) {
					foreach ($data as $alias => $details) {
						if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
							echo "\t\t<li><?php echo \$this->Html->link(__('List " . Inflector::humanize($details['controller']) . "'), array('controller' => '{$details['controller']}', 'action' => 'index')); ?> </li>\n";
							echo "\t\t<li><?php echo \$this->Html->link(__('New " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'add')); ?> </li>\n";
							$done[] = $details['controller'];
						}
					}
				}
				?>
			</ul>
		</div>
	</div>
</div>

