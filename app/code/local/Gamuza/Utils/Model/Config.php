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

class Gamuza_Utils_Model_Config
extends Mage_Core_Model_Abstract
{
    public function getYesNo ()
    {
        return Mage::helper('utils')->getYesNo ();
    }
    
    public function getAllWebsites ()
    {
	return Mage::app ()->getWebsites (true);
    }
    
    public function getAllStores ()
    {
	$stores = array ();
	
        $websites = $this->getAllWebsites ();
        foreach ($websites as $_website) $stores = array_merge ($stores, $_website->getStores ());
        
        return $stores;
    }

    public function getActualWebsite ()
    {
	return Mage::app ()->getWebsite ();
    }

    public function getActualStore ()
    {
	return Mage::app ()->getStore ();
    }

    /* by: website_id, code, ... */
    public function getWebsite ($by = 'website_id', $search)
    {
	$websites = $this->getAllWebsites ();
	foreach ($websites as $_website)
	{
	    if (!strcmp ($_website->getData ($by), $search)) return $_website;
	}
    }

    /* by: store_id, code, ... */
    public function getStore ($by = 'store_id', $search)
    {
	$stores = $this->getAllStores ();
	foreach ($stores as $_store)
	{
	    if (!strcmp ($_store->getData ($by), $search)) return $_store;
	}
    }

    public function getCarrier ($carrier)
    {
	$collection = Mage::getModel ('utils/carriers')->getCollection();
	$collection->getSelect ()->where ("name = '{$carrier}'");
	$collection->load ();
	
	return $collection->getFirstItem ();
    }
    
    public function toOptions (Mage_Core_Model_Mysql4_Collection_Abstract $collection, array $fields)
    {
	return Mage::helper ('utils')->toOptions ($collection, $fields);
    }

    public function getEavAttributeOptionValue ($attribute_id, $option_id, $store_id)
    {
	    $collection = Mage::getResourceModel ('eav/entity_attribute_option_collection')
                      ->setPositionOrder ('asc')
                      ->setAttributeFilter ($attribute_id)
                      ->setStoreFilter ($store_id)
                      ->addFieldToFilter ('main_table.option_id', array ('eq' => $option_id))
                      ->load (false);

        return count ($collection) ? $collection->getFirstItem ()->getValue () : NULL;
    }
    
    function getTableName ($alias)
    {
        return $this->getCoreResource ()->getTableName ($alias);
    }
    
    function getCoreResource ()
    {
        return Mage::getSingleton ('core/resource');
    }
}

