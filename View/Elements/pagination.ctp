<?php
/**
 * Standard pagination
 *
 * configured by optionally passed params, but defaults should be fine most of the time
 * @param int $numbersToDisplay
 * @param boolean $showEmptyPrev
 * @param boolean $showEmptyNext
 * @param boolean $showResultsPerPage
 * @param boolean $showPagesOf
 * @param boolean $showTotal
 * @param string $showTotalLabel 'total'
 * @param boolean $showPagination (if not specified, we only show if there's a next or a prev)
 *
 */
$numbersToDisplay = (isset($numbersToDisplay) ? $numbersToDisplay : 8);
$showEmptyPrev = (isset($showEmptyPrev) ? $showEmptyPrev : false);
$showEmptyNext = (isset($showEmptyNext) ? $showEmptyNext : false);
$showResultsPerPage = (isset($showResultsPerPage) ? $showResultsPerPage : false);
$showPagesOf = (isset($showPagesOf) ? $showPagesOf : true);
$showTotal = (isset($showTotal) ? $showTotal : true);
$showTotalPage = (isset($showTotalPage) ? $showTotalPage : true);
$showTotalLabel = (isset($showTotalLabel) ? $showTotalLabel : 'total');
$showPagination = (isset($showPagination) ? $showPagination : $this->Paginator->hasPrev() || $this->Paginator->hasNext());
if (!empty($this->params['prefix']) && $this->params['prefix']=='admin') {
	$showPagination = $showTotal = true;
}
$params = $this->Paginator->params();
?>
<?php if ($showPagination): ?>
	<ul class="pagination">
			<?php if ($showEmptyPrev || $this->Paginator->hasPrev()): ?>
				<?php if ($params['pageCount'] > 10 && $params['page'] > 5): ?>
					<li><?php echo $this->Paginator->link('&larr; First', array('page' => 1), array('rel' => 'noindex')); ?></li>
				<?php endif; ?>
				<?php echo $this->Paginator->prev('&larr; Previous',
					array('tag' => 'li', 'rel' => 'noindex'), null,
					array('tag' => 'a')); ?>
			<?php endif; ?>
			<?php if (!empty($numbersToDisplay)): ?>
				<?php echo $this->Paginator->numbers(array('separator' => false, 'currentClass' => 'active', 'tag' => 'li', 'modulus' => $numbersToDisplay, 'currentTag' => 'a', 'rel' => 'noindex'),
					array('tag' => 'li'), null,
					array('tag' => 'a')); ?>
			<?php endif; ?>
			<?php if ($showEmptyNext || $this->Paginator->hasNext()): ?>
				<?php echo $this->Paginator->next('Next &rarr;',
					array('tag' => 'li', 'rel' => 'noindex'), null,
					array('tag' => 'a', null)); ?>
				<?php if ($params['pageCount'] > 10): ?>
					<li><?php echo $this->Paginator->link('Last &rarr;', array('page' => $params['pageCount']), array('rel' => 'noindex')); ?></li>
				<?php endif; ?>
			<?php endif; ?>
			<?php if ($showTotal): ?>
				<li class="total"><span><?php echo $showTotalLabel.": ".$params['count']; ?></span></li>
			<?php endif; ?>
			<?php if ($showPagesOf): ?>
				<li class="pages-of"><span>
					<?php if ($showTotalPage): ?>
						page: <?php echo $this->Paginator->counter(); ?>
					<?php endif; ?>
					<?php
					if (isset($params['count']) && !empty($params['count'])):
						if ($params['count'] == 1 && $params['pageCount'] == 1 && $params['current'] > $params['count']) {
							$params['count'] = $params['current'];
						}
						?>
						&nbsp;
					<?php endif; ?>
				</span></li>
			<?php endif; ?>
			<?php if ($showResultsPerPage): ?>
				<li><?php echo $this->Paginator->link(25, array('page' => 1, 'limit' => 25), array('title' => "number of results per page")); ?></li>
				<li><?php echo $this->Paginator->link(100, array('page' => 1, 'limit' => 100), array('title' => "number of results per page")); ?></li>
				<?php if (isset($params['count']) && $params['count'] > 200): ?>
					<li><?php echo $this->Paginator->link(200, array('page' => 1, 'limit' => 200), array('title' => "number of results per page")); ?></li>
				<?php endif; ?>
				<?php if (isset($params['count']) && $params['count'] > 400): ?>
					<li><?php echo $this->Paginator->link(400, array('page' => 1, 'limit' => 400), array('title' => "number of results per page")); ?></li>
				<?php endif; ?>
			<?php endif; ?>
	</ul>
<?php endif; ?>
