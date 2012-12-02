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
<div class="<?php echo $pluralVar; ?> index">
	<h2><?php echo "<?php echo __('{$pluralHumanName}'); ?>"; ?></h2>
	<table class="table table-bordered table-striped">
	<tr>
	<?php  foreach ($fields as $field): ?>
		<th><?php echo "<?php echo \$this->Paginator->sort('{$field}'); ?>"; ?></th>
	<?php endforeach; ?>
		<th class="actions"><?php echo "<?php echo __('Actions'); ?>"; ?></th>
	</tr>
	<?php
	echo "<?php
	foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
	echo "\t<tr>\n";
		foreach ($fields as $field) {
			$isKey = false;
			if (!empty($associations['belongsTo'])) {
				foreach ($associations['belongsTo'] as $alias => $details) {
					if ($field === $details['foreignKey']) {
						$isKey = true;
						echo "\t\t<td>" .
							"\n\t\t\t<strong>" .
							"\n\t\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>" .
							"\n\t\t\t</strong>" .
							"\n\t\t</td>\n";
						break;
					}
				}
			}
			if ($isKey !== true) {
				// TODO: standardize different display types, eg: date
				echo "\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
			}
		}
		// actions as a drop down menu
		echo "\t\t<td class=\"actions\">\n";
		echo "\t\t\t<div class=\"btn-group\">\n";
		echo "\t\t\t\t<a class=\"btn dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">Action <span class=\"caret\"></span></a>\n";
		echo "\t\t\t\t<ul class=\"dropdown-menu\">\n";
		echo "\t\t\t\t\t<li><?php echo \$this->Html->link(__('View'), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?></li>\n";
	 	echo "\t\t\t\t\t<li><?php echo \$this->Html->link(__('Edit'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?></li>\n";
	 	echo "\t\t\t\t\t<li><?php echo \$this->Form->postLink(__('Delete'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), null, __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?></li>\n";
		echo "\t\t\t\t</ul>\n";
		echo "\t\t\t</div>\n";
		echo "\t\t</td>\n";
	echo "\t</tr>\n";
	echo "<?php endforeach; ?>\n";
	?>
	</table>
	<?php echo "<?php echo \$this->element('TwitterBootstrap.pagination'); ?>\n"; ?>
</div>
<div class="end-of-page-actions">
	<div class="btn-group">
		<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
			Action
			<span class="caret"></span>
		</a>
		<ul class="dropdown-menu">
			<li><?php echo "<?php echo \$this->Html->link(__('New " . $singularHumanName . "'), array('action' => 'add')); ?>"; ?></li>
			<?php
				$done = array();
				foreach ($associations as $type => $data) {
					foreach ($data as $alias => $details) {
						if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
							echo "\t\t\t<li><?php echo \$this->Html->link(__('List " . Inflector::humanize($details['controller']) . "'), array('controller' => '{$details['controller']}', 'action' => 'index')); ?> </li>\n";
							echo "\t\t\t<li><?php echo \$this->Html->link(__('New " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'add')); ?> </li>\n";
							$done[] = $details['controller'];
						}
					}
				}
			?>
		</ul>
	</div>
</div>
