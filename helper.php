<?php defined('_JEXEC') or die;

/**
 * File       helper.php
 * Created    27/06/16 10:50 PM
 * Author     Sergey Gorbov | mastescript@gmail.com |
 * Support    https://github.com/mastescript
 * Copyright  Copyright (C) 2016  llc. All Rights Reserved.
 * License    GNU General Public License version 2, or later.
 */

class modSessionHelper {

	public static function getAjax() {

		// Get module parameters
                $db = JFactory::getDbo();
		jimport('joomla.application.module.helper');
		$input  = JFactory::getApplication()->input;
//		$module = JModuleHelper::getModule('session');
		$module = JModuleHelper::getModule('ajaxtest');
		$params = new JRegistry();
		$params->loadString($module->params);
		$node        = $params->get('node', 'data');
		$session     = JFactory::getSession();
		$sessionData = $session->get($node);

		if (is_null($sessionData)) {
			$sessionData = array();
			$session->set($node, $sessionData);
		}

		if ($input->get('cmd')) {
			$cmd  = $input->get('cmd');
			$data = $input->get('data');

			switch ($cmd) {

				case "find" :
						break;

				case "add" :
						$query = $db->getQuery(true);
						$columns = array('hello', 'lang'); // Insert columns.
						$values = array( $db->Quote($data), $db->Quote('en-GB-1') ); // Insert values.
						$query
						    ->insert($db->quoteName('#__helloworld'))
						    ->columns($db->quoteName($columns))
						    ->values(implode(',', $values));

						$db->setQuery($query);
						$db->execute();
						break;

				case "delete" :
						$query = $db->getQuery(true);
						$query
						    ->delete($db->quoteName('#__helloworld'))
						    ->where('hello = ' . $db->Quote($data));
						$db->setQuery($query);
						$db->execute();
						break;

				case "destroy" :
						$query = $db->getQuery(true);
						$query
						    ->delete($db->quoteName('#__helloworld'));
//						    ->where('hello = ' . $db->Quote($data));
						$db->setQuery($query);
						$db->execute();
						break;

				case "debug" :
						die('<pre>' . print_r($sessionData, TRUE) . '</pre>');
						break;
			}

			$query = $db->getQuery(true);
			$query
			    ->select($db->quoteName('id'))
			    ->from($db->quoteName('#__helloworld'))
			    ->where('hello = ' . $db->Quote($data));
			$db->setQuery($query);

			$result = $db->loadAssocList();
//			$result = $db->loadResult();
			return $result;
		}
	}
}