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

class Gamuza_Utils_Block_About
extends Mage_Adminhtml_Block_System_Config_Form_Fieldset
{
    public function render (Varien_Data_Form_Element_Abstract $element)
    {
        $logo = $this->getSkinUrl ('images/gamuza/utils/gamuza-magento-modules.png');

$htmlBlock = <<<HTMLBLOCK
<table>
  <tr>
    <td width="50%" style="vertical-align:middle; text-align:justify;">
      <h2>Módulos para a plataforma Magento by Gamuza</h2>
      <h3>O que é o Magento?</h3>
      <p>
A plataforma Magento atende a mais de 110.000 lojas virtuais em todo o mundo e é suportada por um ecossistema global de parceiros de solução e desenvolvedores.
Somente a plataforma Magento oferece um alto grau de flexibilidade e controle sobre a experiência do usuário, catálogo de produtos, gerenciamento vendas, estoque e muitas outras funcionalidades para melhorar a sua loja online.
</p>

<h3>Porque preciso de módulos?</h3>
<p>
Devido a essa flexibilidade, é possível extender inúmeras funcionalidades da plataforma Magento para simplificar o dia-a-dia usando módulos customizados para essas tarefas.
E a Gamuza possui uma divisão especializada na criação de módulos poderosos, simples e intuitivos para a plataforma Magento.
</p>

<h3>Como eu aumento as funcionalidades da minha loja virtual?</h3>
<p>
Aumente todo o potencial de suas vendas e de sua plataforma Magento com funcionalidades específicas para seu segmento de negócio.
</p>

<a href="http://magento.gamuza.com.br/" target="_blank">Veja como é bem simples e tudo funciona perfeitamente.</a>
    </td>
    <td width="50%" style="vertical-align:middle; text-align:center;">
      <img src="{$logo}" />
    </td>
  </tr>
</table>
HTMLBLOCK;

        return $htmlBlock;
    }
}
