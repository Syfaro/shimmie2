<?php

/**
 * Name: Client Certificate Auth
 * Author: Syfaro <syfaro@foxpaw.in>
 * Link: https://syfaro.net
 * License: GPLv2
 * Description: Client certificate authentication
 */
class Update extends Extension {
	public function onInitExt(InitExtEvent $event) {
		global $config;
		$config->set_default_bool('enable_cert_auth', false);
	}

	public function onSetupBuilding(SetupBuildingEvent $event) {
		$sb = new SetupBlock('Client Certificate Authentication');
		$sb->add_bool_option('enable_cert_auth', 'Enable: ');
		$event->panel->add_block($sb);
	}

	public function onAdminBuilding(AdminBuildingEvent $event) {
		global $config;
		if($config->get_string('transload_engine') !== 'none'){
			$this->theme->display_admin_block();
		}
	}
}
