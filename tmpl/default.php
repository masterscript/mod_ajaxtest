<?php defined('_JEXEC') or die;

/**
 * File       default.php
 * Created    27/06/16 10:50 PM
 * Author     Sergey Gorbov | mastescript@gmail.com |
 * Support    https://github.com/masterscript
 * Copyright  Copyright (C) 2016  llc. All Rights Reserved.
 * License    GNU General Public License version 2, or later.
 */

?>
<form>
	<input type="text" name="data">
	<input type="submit" class="find" value="<?php echo JText::_('MOD_SESSION_INPUT_FIND') ?>" />
	<input type="submit" class="add" value="<?php echo JText::_('MOD_SESSION_INPUT_ADD') ?>" />
	<input type="submit" class="delete" value="<?php echo JText::_('MOD_SESSION_INPUT_DELETE') ?>" />
	<input type="submit" class="destroy" value="<?php echo JText::_('MOD_SESSION_INPUT_DESTROY') ?>" />
</form>
<div class="status"></div>