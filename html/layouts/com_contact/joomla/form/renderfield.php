<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

extract($displayData);
$fieldType = $options['fieldType'];

/**
 * Layout variables
 * ---------------------
 *    $options         : (array)  Optional parameters
 *    $label           : (string) The html code for the label (not required if $options['hiddenLabel'] is true)
 *    $input           : (string) The input field html code
 */

/**
 * @TODO:
 *
 * As mentioned in #8473 (https://github.com/joomla/joomla-cms/pull/8473), ...
 * as long as we cannot access the field properties properly, this seems to
 * be the way to go for now.
 *
 * On a side note: Parsing html is seldom a good idea.
 * https://stackoverflow.com/questions/1732348/regex-match-open-tags-except-xhtml-self-contained-tags/1732454#1732454
 */

$typeOfSpacer = (strpos($label, 'spacer-lbl') !== false);

if (!$typeOfSpacer && $fieldType !== "Checkbox")
{
	$label = preg_replace('/class=\"([^\"]+)\"/i', 'class="col-sm-2 $1"', $label, 1);
}
if ($fieldType !== "Captcha")
{
	$input = preg_replace('/class=\"([^\"]+)\"/i', 'class="form-control $1"', $input, 1);
}
?>

<div class="form-group">
	<?php if ($typeOfSpacer): ?>
		<?php if (empty($options['hiddenLabel'])) : ?>
            <div class="col-xs-12 spacer"><?php echo $label; ?></div>
		<?php endif; ?>
	<?php elseif ($fieldType === "Checkbox") : ?>
        <div class="col-xs-12">
			<?php echo $input; ?>
			<?php if (empty($options['hiddenLabel'])) : ?>
				<?php echo $label; ?>
			<?php endif; ?>
        </div>
	<?php elseif ($fieldType === "Captcha") : ?>
        <div class="col-xs-12">
			<?php echo $input; ?>
        </div>
	<?php else: ?>
		<?php if (empty($options['hiddenLabel'])) : ?>
			<?php echo $label; ?>
		<?php endif; ?>
        <div class="col-sm-10">
			<?php echo $input; ?>
        </div>
	<?php endif; ?>
</div>