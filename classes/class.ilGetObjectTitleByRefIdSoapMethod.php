<?php

/**
 * Class ilTestSoapHookPlugin
 *
 * Example plugin for the Soap plugin slot.
 *
 * @author Stefan Wanzenried <sw@studer-raimann.ch>
 */
class ilGetObjectTitleByRefIdSoapMethod extends ilAbstractSoapMethod {

	/**
	 * @inheritdoc
	 */
	public function getName() : string
    {
		return 'getObjectTitleByRefId';
	}

	/**
	 * @inheritdoc
	 */
	public function getInputParams() : array
    {
		return array(
			'sid' => 'xsd:string',
			'ref_id' => 'xsd:int',
		);
	}

	/**
	 * @inheritdoc
	 */
	public function getOutputParams() : array
    {
		return array(
			'title' => 'xsd:string',
		);
	}

	/**
	 * @inheritdoc
	 */
	public function getServiceNamespace() : string
    {
		return 'urn:sample';
	}

	/**
	 * @inheritdoc
	 */
	public function getDocumentation() : string
    {
		return "Returns the title of an object by the given Ref-ID - just for demo purposes!";
	}

	/**
	 * @inheritdoc
	 */
	public function execute(array $params)
    {
		$this->checkParameters($params);
		$session_id = (isset($params[0])) ? $params[0] : '';
		$ref_id = (isset($params[1])) ? (int)$params[1] : 0;
		$this->initIliasAndCheckSession($session_id); // Throws exception if session is not valid
		if (!$ref_id) {
			throw new ilSoapPluginException("No valid Ref-Id provided");
		}
		$obj_id = ilObject::_lookupObjId($ref_id);
		if (!$obj_id) {
			throw new ilSoapPluginException("Could not load object");
		}
		return ilObject::_lookupTitle($obj_id);
	}

}