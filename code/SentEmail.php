<?php

/**
 * Defines a record that stores an email that was sent via {@link Permamail}
 *
 * @author Uncle Cheese <unclecheese@leftandmain.com>
 * @package  silverstripe-permamail
 */
class SentEmail extends DataObject {

	private static $db = array (
		'To' => 'Varchar',
		'From' => 'Varchar',
		'Subject' => 'Varchar',
		'Body' => 'HTMLText',
		'CC' => 'Text',
		'BCC' => 'Text',
		'MessageID' => 'Varchar'
	);

	private static $summary_fields = array (
		'Created.Nice' => 'Date',
		'To' => 'To',
		'Subject' => 'Subject'
	);

	private static $default_sort = 'Created DESC';

	/**
	 * Gets a list of form fields for editing the record.
	 * These records should never be edited, so a readonly list of fields
	 * is forced.
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$f = FieldList::create(
			ReadonlyField::create('To'),
			ReadonlyField::create('Subject'),
			ReadonlyField::create('BCC'),
			ReadonlyField::create('CC')
		);

		return $f;
	}

	/**
	 * Defines the view permission
	 * @param  Member $member
	 * @return boolean
	 */
	public function canView($member = null) {
		return Permission::check('CMS_ACCESS_CMSMain');
	}

	/**
	 * Defines the edit permission
	 * @param  Member $member
	 * @return boolean
	 */
	public function canEdit($member = null) {
		return false;
	}

	/**
	 * Defines the create permission
	 * @param  Member $member
	 * @return boolean
	 */
	public function canCreate($member = null) {
		return false;
	}

	/**
	 * Defines the delete permission
	 * @param  Member $member
	 * @return boolean
	 */
	public function canDelete($member = null) {
		return Permission::check('CMS_ACCESS_CMSMain');
	}
}