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

class Gamuza_Utils_Block_Adminhtml_System_Config_Form_Field_Export_Esedex
extends Mage_Adminhtml_Block_System_Config_Form_Field
{
    protected function _getElementHtml (Varien_Data_Form_Element_Abstract $element)
    {
        $this->setElement ($element);

        $buttonBlock = $this->getLayout()->createBlock('adminhtml/widget_button');

        $params = array(
            'website' => $buttonBlock->getRequest()->getParam('website'),
            'store' => $buttonBlock->getRequest()->getParam('store')
        );

        $data = array(
            'label'     => Mage::helper('freight')->__('Export e-Sedex to CSV'),
            'onclick'   => "setLocation('" . Mage::helper('adminhtml')->getUrl('freight/adminhtml_freights/export', $params) . "carrier/esedex')",
            'class'     => chr(0),
        );

        $html = $buttonBlock->setData($data)->toHtml();

        return $html;
    }
}
