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

class Gamuza_Utils_Block_Adminhtml_Sales_Order_View
extends Mage_Adminhtml_Block_Sales_Order_View
{
    public function __construct()
    {
        parent::__construct();

        if (Mage::helper ('core')->isModuleEnabled ('Gamuza_Labels')
            && Mage::getStoreConfig('labels/settings/active')
            && $this->getOrder()->hasInvoices ())
        {
            $this->_addButton('order_label', array(
                'label'     => Mage::helper('labels')->__('Label'),
                'onclick'   => "popWin ('" . $this->getLabelUrl () . "', '','width=400,height=585,resizable=no,scrollbars=no')",
                'class'     => 'go'
            ));
        }
    }

    public function getLabelUrl()
    {
        return $this->getUrl('labels/adminhtml_labels/carrier');
    }
}

