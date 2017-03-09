<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$attributes = array();

if ($item->anchor_title)
{
	$attributes['title'] = $item->anchor_title;
}

if ($item->anchor_css)
{
	$attributes['class'] = $item->anchor_css;
}

if ($item->anchor_rel)
{
	$attributes['rel'] = $item->anchor_rel;
}

$linktype = $item->title;

if ($item->menu_image)
{
	$linktype = JHtml::_('image', $item->menu_image, $item->title);

	if ($item->params->get('menu_text', 1))
	{
		$linktype .= '<span class="image-title">' . $item->title . '</span>';
	}
}

$link = $item->flink;

if ($item->parent)
{
	// No real link for drop downs, so don't tell the browser to request a new page
	$link = "#";

	// add caret to indicate dropdown
	$linktype .= ' <span class="caret"></span>';

	if ($attributes['class'])
	{
		$attributes['class'] .= 'dropdown-toggle';
	}
	else
	{
		$attributes['class'] = 'dropdown-toggle';
	}

	// add some bootstrap attributes for drop downs
	$attributes['data-toggle']   = 'dropdown';
	$attributes['role']          = 'button';
	$attributes['aria-haspopup'] = 'false';
	$attributes['aria-expanded'] = 'false';
}
else
{
	if ($item->browserNav == 1)
	{
		$attributes['target'] = '_blank';
	}
	elseif ($item->browserNav == 2)
	{
		$options = 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes';

		$attributes['onclick'] = "window.open(this.href, 'targetWindow', '" . $options . "'); return false;";
	}
}
echo JHtml::_('link', JFilterOutput::ampReplace(htmlspecialchars($link)), $linktype, $attributes);
