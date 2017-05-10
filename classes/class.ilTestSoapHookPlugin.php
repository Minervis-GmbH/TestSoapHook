<?php
require_once('./Services/WebServices/SOAP/classes/class.ilSoapHookPlugin.php');
require_once(__DIR__ . '/class.ilGetObjectTitleByRefIdSoapMethod.php');

/**
 * /**
 * Class ilTestSoapHookPlugin
 *
 * Example plugin for the Soap plugin slot.
 * This plugin registers a new soap method "getObjectTitleByRefId" to the internal SOAP server.
 * Note: The new SOAP method is only available under the ILIAS client where this plugin is installed.
 * The soap endpoint MUST include the client-ID as get parameter, it thus becomes:
 * http://your-ilias-domain.com/webservice/soap/server.php?client_id=<client_id>
 *
 * @author Stefan Wanzenried <sw@studer-raimann.ch>
 */
class ilTestSoapHookPlugin extends ilSoapHookPlugin {


	public function getPluginName() {
		return 'TestSoapHook';
	}

	/**
	 * @inheritdoc
	 */
	public function getSoapMethods() {
		return array(
			new ilGetObjectTitleByRefIdSoapMethod()
		);
	}

	/**
	 * @inheritdoc
	 */
	public function getWsdlTypes() {
		return array();
	}
}