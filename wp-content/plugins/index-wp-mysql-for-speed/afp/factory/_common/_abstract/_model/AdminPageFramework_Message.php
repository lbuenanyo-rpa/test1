<?php 
/**
	Admin Page Framework v3.8.34 by Michael Uno 
	Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
	<http://en.michaeluno.jp/index-wp-mysql-for-speed>
	Copyright (c) 2013-2021, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT> */
class Imfs_AdminPageFramework_Message {
    public $aMessages = array();
    public $aDefaults = array('option_updated' => 'The options have been updated.', 'option_cleared' => 'The options have been cleared.', 'export' => 'Export', 'export_options' => 'Export Options', 'import' => 'Import', 'import_options' => 'Import Options', 'submit' => 'Submit', 'import_error' => 'An error occurred while uploading the import file.', 'uploaded_file_type_not_supported' => 'The uploaded file type is not supported: %1$s', 'could_not_load_importing_data' => 'Could not load the importing data.', 'imported_data' => 'The uploaded file has been imported.', 'not_imported_data' => 'No data could be imported.', 'upload_image' => 'Upload Image', 'use_this_image' => 'Use This Image', 'insert_from_url' => 'Insert from URL', 'reset_options' => 'Are you sure you want to reset the options?', 'confirm_perform_task' => 'Please confirm your action.', 'specified_option_been_deleted' => 'The specified options have been deleted.', 'nonce_verification_failed' => 'A problem occurred while processing the form data. Please try again.', 'check_max_input_vars' => 'Not all form fields could not be sent. ' . 'Please check your server settings of PHP <code>max_input_vars</code> and consult the server administrator to increase the value. ' . '<code>max input vars</code>: %1$s. <code>$_POST</code> count: %2$s', 'send_email' => 'Is it okay to send the email?', 'email_sent' => 'The email has been sent.', 'email_scheduled' => 'The email has been scheduled.', 'email_could_not_send' => 'There was a problem sending the email', 'title' => 'Title', 'author' => 'Author', 'categories' => 'Categories', 'tags' => 'Tags', 'comments' => 'Comments', 'date' => 'Date', 'show_all' => 'Show All', 'show_all_authors' => 'Show all Authors', 'powered_by' => 'Thank you for creating with', 'and' => 'and', 'settings' => 'Settings', 'manage' => 'Manage', 'select_image' => 'Select Image', 'upload_file' => 'Upload File', 'use_this_file' => 'Use This File', 'select_file' => 'Select File', 'remove_value' => 'Remove Value', 'select_all' => 'Select All', 'select_none' => 'Select None', 'no_term_found' => 'No term found.', 'select' => 'Select', 'insert' => 'Insert', 'use_this' => 'Use This', 'return_to_library' => 'Return to Library', 'queries_in_seconds' => '%1$s queries in %2$s seconds.', 'out_of_x_memory_used' => '%1$s out of %2$s (%3$s) memory used.', 'peak_memory_usage' => 'Peak memory usage %1$s.', 'initial_memory_usage' => 'Initial memory usage  %1$s.', 'repeatable_section_is_disabled' => 'The ability to repeat sections is disabled.', 'repeatable_field_is_disabled' => 'The ability to repeat fields is disabled.', 'warning_caption' => 'Warning', 'allowed_maximum_number_of_fields' => 'The allowed maximum number of fields is {0}.', 'allowed_minimum_number_of_fields' => 'The allowed minimum number of fields is {0}.', 'add' => 'Add', 'remove' => 'Remove', 'allowed_maximum_number_of_sections' => 'The allowed maximum number of sections is {0}', 'allowed_minimum_number_of_sections' => 'The allowed minimum number of sections is {0}', 'add_section' => 'Add Section', 'remove_section' => 'Remove Section', 'toggle_all' => 'Toggle All', 'toggle_all_collapsible_sections' => 'Toggle all collapsible sections', 'reset' => 'Reset', 'yes' => 'Yes', 'no' => 'No', 'on' => 'On', 'off' => 'Off', 'enabled' => 'Enabled', 'disabled' => 'Disabled', 'supported' => 'Supported', 'not_supported' => 'Not Supported', 'functional' => 'Functional', 'not_functional' => 'Not Functional', 'too_long' => 'Too Long', 'acceptable' => 'Acceptable', 'no_log_found' => 'No log found.', 'method_called_too_early' => 'The method is called too early.', 'debug_info' => 'Debug Info', 'debug' => 'Debug', 'debug_info_will_be_disabled' => 'This information will be disabled when <code>WP_DEBUG</code> is set to <code>false</code> in <code>wp-config.php</code>.', 'click_to_expand' => 'Click here to expand to view the contents.', 'click_to_collapse' => 'Click here to collapse the contents.', 'loading' => 'Loading...', 'please_enable_javascript' => 'Please enable JavaScript for better user experience.', 'submit_confirmation_label' => 'Submit the form.', 'submit_confirmation_error' => 'Please check this box if you want to proceed.', 'import_no_file' => 'No file is selected.',);
    protected $_sTextDomain = 'index-wp-mysql-for-speed';
    static private $_aInstancesByTextDomain = array();
    public static function getInstance($sTextDomain = 'index-wp-mysql-for-speed') {
        $_oInstance = isset(self::$_aInstancesByTextDomain[$sTextDomain]) && (self::$_aInstancesByTextDomain[$sTextDomain] instanceof Imfs_AdminPageFramework_Message) ? self::$_aInstancesByTextDomain[$sTextDomain] : new Imfs_AdminPageFramework_Message($sTextDomain);
        self::$_aInstancesByTextDomain[$sTextDomain] = $_oInstance;
        return self::$_aInstancesByTextDomain[$sTextDomain];
    }
    public static function instantiate($sTextDomain = 'index-wp-mysql-for-speed') {
        return self::getInstance($sTextDomain);
    }
    public function __construct($sTextDomain = 'index-wp-mysql-for-speed') {
        $this->_sTextDomain = $sTextDomain;
        $this->aMessages = array_fill_keys(array_keys($this->aDefaults), null);
    }
    public function getTextDomain() {
        return $this->_sTextDomain;
    }
    public function set($sKey, $sValue) {
        $this->aMessages[$sKey] = $sValue;
    }
    public function get($sKey = '') {
        if (!$sKey) {
            return $this->_getAllMessages();
        }
        return isset($this->aMessages[$sKey]) ? __($this->aMessages[$sKey], $this->_sTextDomain) : __($this->{$sKey}, $this->_sTextDomain);
    }
    private function _getAllMessages() {
        $_aMessages = array();
        foreach ($this->aMessages as $_sLabel => $_sTranslation) {
            $_aMessages[$_sLabel] = $this->get($_sLabel);
        }
        return $_aMessages;
    }
    public function output($sKey) {
        echo $this->get($sKey);
    }
    public function __($sKey) {
        return $this->get($sKey);
    }
    public function _e($sKey) {
        $this->output($sKey);
    }
    public function __get($sPropertyName) {
        return isset($this->aDefaults[$sPropertyName]) ? $this->aDefaults[$sPropertyName] : $sPropertyName;
    }
    private function ___doDummy() {
        /* translators: you can omit translating messages in AdminPageFramework files; they don't appear in this plugin's UI. */
        __('The options have been updated.', 'index-wp-mysql-for-speed');
        __('The options have been cleared.', 'index-wp-mysql-for-speed');
        __('Export', 'index-wp-mysql-for-speed');
        __('Export Options', 'index-wp-mysql-for-speed');
        __('Import', 'index-wp-mysql-for-speed');
        __('Import Options', 'index-wp-mysql-for-speed');
        __('Submit', 'index-wp-mysql-for-speed');
        __('An error occurred while uploading the import file.', 'index-wp-mysql-for-speed');
      /* translators: 1: a file type like jpg or pdf.  */
        __('The uploaded file type is not supported: %1$s', 'index-wp-mysql-for-speed');
        __('Could not load the importing data.', 'index-wp-mysql-for-speed');
        __('The uploaded file has been imported.', 'index-wp-mysql-for-speed');
        __('No data could be imported.', 'index-wp-mysql-for-speed');
        __('Upload Image', 'index-wp-mysql-for-speed');
        __('Use This Image', 'index-wp-mysql-for-speed');
        __('Insert from URL', 'index-wp-mysql-for-speed');
        __('Are you sure you want to reset the options?', 'index-wp-mysql-for-speed');
        __('Please confirm your action.', 'index-wp-mysql-for-speed');
        __('The specified options have been deleted.', 'index-wp-mysql-for-speed');
        __('A problem occurred while processing the form data. Please try again.', 'index-wp-mysql-for-speed');
      /* translators: 1: value of php's max_input_vars setting. 2: number of input vars in present POST operation. Not used in this plugin */
        __('Not all form fields could not be sent. Please check your server settings of PHP <code>max_input_vars</code> and consult the server administrator to increase the value. <code>max input vars</code>: %1$s. <code>$_POST</code> count: %2$s', 'index-wp-mysql-for-speed');
        __('Is it okay to send the email?', 'index-wp-mysql-for-speed');
        __('The email has been sent.', 'index-wp-mysql-for-speed');
        __('The email has been scheduled.', 'index-wp-mysql-for-speed');
        __('There was a problem sending the email', 'index-wp-mysql-for-speed');
        __('Title', 'index-wp-mysql-for-speed');
        __('Author', 'index-wp-mysql-for-speed');
        __('Categories', 'index-wp-mysql-for-speed');
        __('Tags', 'index-wp-mysql-for-speed');
        __('Comments', 'index-wp-mysql-for-speed');
        __('Date', 'index-wp-mysql-for-speed');
        __('Show All', 'index-wp-mysql-for-speed');
        __('Show All Authors', 'index-wp-mysql-for-speed');
        __('Thank you for creating with', 'index-wp-mysql-for-speed');
        __('and', 'index-wp-mysql-for-speed');
        __('Settings', 'index-wp-mysql-for-speed');
        __('Manage', 'index-wp-mysql-for-speed');
        __('Select Image', 'index-wp-mysql-for-speed');
        __('Upload File', 'index-wp-mysql-for-speed');
        __('Use This File', 'index-wp-mysql-for-speed');
        __('Select File', 'index-wp-mysql-for-speed');
        __('Remove Value', 'index-wp-mysql-for-speed');
        __('Select All', 'index-wp-mysql-for-speed');
        __('Select None', 'index-wp-mysql-for-speed');
        __('No term found.', 'index-wp-mysql-for-speed');
        __('Select', 'index-wp-mysql-for-speed');
        __('Insert', 'index-wp-mysql-for-speed');
        __('Use This', 'index-wp-mysql-for-speed');
        __('Return to Library', 'index-wp-mysql-for-speed');
      /* translators: 1: number of queries  2:seconds */
        __('%1$s queries in %2$s seconds.', 'index-wp-mysql-for-speed');
      /* translators: 1: number of megabytes. 2: number of megabytes. 3: percentage */
        __('%1$s out of %2$s MB (%3$s) memory used.', 'index-wp-mysql-for-speed');
      /* translators: 1: number of megabytes */
        __('Peak memory usage %1$s MB.', 'index-wp-mysql-for-speed');
      /* translators: 1: number of megabytes */
        __('Initial memory usage  %1$s MB.', 'index-wp-mysql-for-speed');
      /* translators: {0}: number of fields, a small integer */
        __('The allowed maximum number of fields is {0}.', 'index-wp-mysql-for-speed');
      /* translators: {0}: number of fields, a small integer */
        __('The allowed minimum number of fields is {0}.', 'index-wp-mysql-for-speed');
        __('Add', 'index-wp-mysql-for-speed');
        __('Remove', 'index-wp-mysql-for-speed');
      /* translators: {0}: number of sections, a small integer */
        __('The allowed maximum number of sections is {0}', 'index-wp-mysql-for-speed');
      /* translators: {0}: number of sections, a small integer */
        __('The allowed minimum number of sections is {0}', 'index-wp-mysql-for-speed');
        __('Add Section', 'index-wp-mysql-for-speed');
        __('Remove Section', 'index-wp-mysql-for-speed');
        __('Toggle All', 'index-wp-mysql-for-speed');
        __('Toggle all collapsible sections', 'index-wp-mysql-for-speed');
        __('Reset', 'index-wp-mysql-for-speed');
        __('Yes', 'index-wp-mysql-for-speed');
        __('No', 'index-wp-mysql-for-speed');
        __('On', 'index-wp-mysql-for-speed');
        __('Off', 'index-wp-mysql-for-speed');
        __('Enabled', 'index-wp-mysql-for-speed');
        __('Disabled', 'index-wp-mysql-for-speed');
        __('Supported', 'index-wp-mysql-for-speed');
        __('Not Supported', 'index-wp-mysql-for-speed');
        __('Functional', 'index-wp-mysql-for-speed');
        __('Not Functional', 'index-wp-mysql-for-speed');
        __('Too Long', 'index-wp-mysql-for-speed');
        __('Acceptable', 'index-wp-mysql-for-speed');
        __('No log found.', 'index-wp-mysql-for-speed');
      /* translators: 1: method (subroutine) name in code */
        __('The method is called too early: %1$s', 'index-wp-mysql-for-speed');
        __('Debug Info', 'index-wp-mysql-for-speed');
        __('Click here to expand to view the contents.', 'index-wp-mysql-for-speed');
        __('Click here to collapse the contents.', 'index-wp-mysql-for-speed');
        __('Loading...', 'index-wp-mysql-for-speed');
        __('Please enable JavaScript for better user experience.', 'index-wp-mysql-for-speed');
        __('Debug', 'index-wp-mysql-for-speed');
        __('This information will be disabled when <code>WP_DEBUG</code> is set to <code>false</code> in <code>wp-config.php</code>.', 'index-wp-mysql-for-speed');
        __('The ability to repeat sections is disabled.', 'index-wp-mysql-for-speed');
        __('The ability to repeat fields is disabled.', 'index-wp-mysql-for-speed');
        __('Warning.', 'index-wp-mysql-for-speed');
        __('Submit the form.', 'index-wp-mysql-for-speed');
        __('Please check this box if you want to proceed.', 'index-wp-mysql-for-speed');
        __('No file is selected.', 'index-wp-mysql-for-speed');
    }
    }
    