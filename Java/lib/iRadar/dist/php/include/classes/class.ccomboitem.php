<?php
/*
** Zabbix
** Copyright (C) 2001-2014 Zabbix SIA
**
** This program is free software; you can redistribute it and/or modify
** it under the terms of the GNU General Public License as published by
** the Free Software Foundation; either version 2 of the License, or
** (at your option) any later version.
**
** This program is distributed in the hope that it will be useful,
** but WITHOUT ANY WARRANTY; without even the implied warranty of
** MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
** GNU General Public License for more details.
**
** You should have received a copy of the GNU General Public License
** along with this program; if not, write to the Free Software
** Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
**/


class CComboItem extends CTag {

	public function __construct($value, $caption = null, $selected = null, $enabled = null) {
		parent::__construct("option", "yes");
		tag_body_start = "";
		setAttribute("value", $value);
		addItem($caption);
		setSelected($selected);
		setEnabled($enabled);
	}

	public function setValue($value) {
		return Nest.value(attributes,"value").$() = $value;
	}

	public function getValue() {
		return getAttribute("value");
	}

	public function setCaption($value = null) {
		addItem(nbsp($value));
	}

	public function setSelected($value = "yes") {
		if ((is_string($value) && ($value == "yes" || $value == "selected" || $value == "on")) || (is_int($value) && $value <> 0)) {
			return Nest.value(attributes,"selected").$() = "selected";
		}
		removeAttribute("selected");
	}
}