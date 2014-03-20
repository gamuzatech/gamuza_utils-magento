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

$installer = $this;
$installer->startSetup();
$sqlBlock = <<<SQLBLOCK
CREATE TABLE gamuza_carriers
(
    id int(11) unsigned NOT NULL AUTO_INCREMENT,
    name char(255) CHARACTER SET utf8 NOT NULL,
    description char(255) CHARACTER SET utf8 NOT NULL,
    PRIMARY KEY (id),
    UNIQUE KEY name (name),
    KEY description (description)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=7;
INSERT INTO gamuza_carriers (id, name, description) VALUES
(1, 'sedex', 'Transportadora Sedex'),
(2, 'esedex', 'Transportadora e-Sedex'),
(3, 'pac', 'Transportadora PAC'),
(4, 'expressdelivery', 'Transportadora Entrega Expressa'),
(5, 'plus', 'Transportadora Plus'),
(6, 'retire', 'Cliente Retira na Loja');
SQLBLOCK;
$installer->run($sqlBlock);
//demo
//Mage::getModel('core/url_rewrite')->setId(null);
//demo
$installer->endSetup();
