<?php
/*
 * Gamuza Utils - Basic features for magento platform.
 * Copyright (C) 2013 Gamuza Technologies (http://www.gamuza.com.br/)
 * Author: Eneias Ramos de Melo <eneias@gamuza.com.br>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Library General Public
 * License as published by the Free Software Foundation; either
 * version 2 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Library General Public License for more details.
 *
 * You should have received a copy of the GNU Library General Public
 * License along with this library; if not, write to the
 * Free Software Foundation, Inc., 51 Franklin St, Fifth Floor,
 * Boston, MA  02110-1301, USA.
 */

/*
 * See the AUTHORS file for a list of people on the Gamuza Team.
 * See the ChangeLog files for a list of changes.
 * These files are distributed with Gamuza_Utils at http://code.google.com/p/gamuzaopen/.
 */

class Gamuza_Utils_Helper_Data
extends Mage_Core_Helper_Abstract
{
    public function getYesNo ()
    {
        return array (1 => Mage::helper('utils')->__('Enabled'), 0 => Mage::helper('utils')->__('Disabled'));
    }

	public function getCurrencySymbol ()
	{
	    return Mage::app()->getLocale()->currency (Mage::app()->getStore()->getCurrentCurrencyCode())->getSymbol();
	}

	public function toOptions (Mage_Core_Model_Mysql4_Collection_Abstract $collection, array $fields)
	{
	    $key = key ($fields);
	    $value = $fields [$key];
	    
	    $data = $collection->toArray (array ($key, $value));
	    
	    $result = '';
	    foreach ($data ['items'] as $item) $result [$item [$key]] = $item [$value];
	    
	    return $result;
	}
}
