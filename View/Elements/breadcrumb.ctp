<?php
/**
 * Standard breadcrumbs, autoset based on controller and action (and prefixes)
 *
 * you can optionally configured with parameter passed to this element...
 * but if you do so, you might be better off just assigning yourself with
 * $this->TwitterBootstrap->addCrumb()
 *
 * @param array $crumbs (optional) overwrites the basic crumbs
 * @param array $extra_crumbs (optional) additional to the basic crumbs
 * @param array $parent (optional) additional to the basic crumbs, right before the current controller
 * @param array $beforeAction (optional) additional to the basic crumbs, right before the current action
 *
 * Examples:
 * $this->element('TwitterBootstrap.breadcrumb')
 * $this->element('TwitterBootstrap.breadcrumb', array('parent' => array('Edit' => array('action' => 'edit', $event['Event']['id']))))
 * $this->element('TwitterBootstrap.breadcrumb', array('crumbs' => array(
 * 		'Root' => array('action' => 'root'),
 * 		'Parent Page ABC' => array('action' => 'some_action', 'some_param'),
 * 		'Current Page' => '#',
 * 		)));
 */
if (!isset($crumbs)) {
	// auto-determine basic crumbs
	$crumbs = array();
	if (array_key_exists('admin', $this->params) && $this->params['admin']) {
		$crumbs['Admin'] = '/admin/';
	}
	$action = str_replace($this->params['prefix'] . '_', '', $this->params['action']);
	if (!empty($parent) && is_array($parent)) {
		$crumbs = array_merge($crumbs, $parent);
	}
	if ($action=='index') {
		$crumbs[Inflector::Humanize($this->params['controller'])] = '#';
		if (!empty($beforeAction) && is_array($beforeAction)) {
			$crumbs = array_merge($crumbs, $beforeAction);
		}
	} else {
		$crumbs[Inflector::Humanize($this->params['controller'])] = array('controller' => $this->params['controller'], 'action' => 'index');
		if (!empty($beforeAction) && is_array($beforeAction)) {
			$crumbs = array_merge($crumbs, $beforeAction);
		}
		$crumbs[Inflector::Humanize($action)] = '#';
	}
	if (isset($current) && is_string($current) && !empty($current)) {
		array_pop($crumbs);
		$crumbs[$current] = '#';
	}
}
if (isset($extra_crumbs) && is_array($extra_crumbs)) {
	$crumbs = array_merge($crumbs, $extra_crumbs);
}
if (!empty($crumbs)) {
	foreach ($crumbs as $text => $url) {
		if ($text == "Admin") {
			echo $this->TwitterBootstrap->addCrumb("<span class='label'>".strtoupper($text)."</span>", $url, array('escape' => false));
		} else {
			echo $this->TwitterBootstrap->addCrumb($text, $url);
		}
	}
	echo $this->TwitterBootstrap->breadcrumbs();
}
