<?php
/**
 * RecordAdminCreateForm extension - An extension to enable the creation of any RA record from any page. Made with [http://www.organicdesign.co.nz/Template:Extension Template:Extension].
 *{{php}}{{Category:Extensions|RecordAdminCreateForm}}{{Category:Jack}}
 * See http://www.mediawiki.org/wiki/Extension:RecordAdminCreateForm for installation and usage details
 *
 * @package MediaWiki
 * @subpackage Extensions
 * @author [http://www.organicdesign.co.nz/wiki/User:Jack User:Jack]
 * @copyright © 2008 [http://www.organicdesign.co.nz/wiki/User:Jack User:Jack]
 * @licence GNU General Public Licence 2.0 or later
 */
if (!defined('MEDIAWIKI')) die('Not an entry point.');
 
define('RECORDADMINCREATEFORM_VERSION', '1.0.0, 2009-11-11');
 
$wgExtensionFunctions[]        = 'efSetupRecordAdminCreateForm';

$wgExtensionCredits['parserhook'][] = array(
	'name'        => 'RecordAdminCreateForm',
	'author'      => '[http://www.organicdesign.co.nz/wiki/User:Jack User:Jack]',
	'description' => 'An extension to enable the creation of any RA record from any page. Made with [http://www.organicdesign.co.nz/Template:Extension Template:Extension].',
	'url'         => 'http://www.organicdesign.co.nz/Extension:RecordAdminCreateForm',
	'version'     => RECORDADMINCREATEFORM_VERSION
	);
 
/**
 * Function called from the hook BeforePageDisplay, creates a form which links to a new RA form page with title and type arguments in the url.
 */

function efRecordAdminCreateForm (&$out) {
	
	$out->mBodytext .= "<script type='text/javascript'>
		function RACreateNewRecord(form) {
			var ranewurl = '$wgServerName/wiki/index.php?title=Special:RecordAdmin&wpTitle=';
			ranewurl += document.getElementById('wpTitle').value;
			ranewurl += '&wpType=';
			ranewurl += document.getElementById('wpType').value;
			window.open(ranewurl);
		}
		</script>
		<div class = 'RACreateForm'>
			<form onsubmit='return RACreateNewRecord(this)'>Title:&nbsp;&nbsp;
				<input id='wpTitle' name='wpTitle' />&nbsp;&nbsp;&nbsp;&nbsp;
					<select id='wpType' name='wpType'>
						<option>Activity</option>
						<option>Department</option>
						<option>Issue</option>
						<option>Organisation</option>
						<option>Person</option>
						<option>Project</option>
						<option>Role</option>
						<option>SOP</option>
					</select>&nbsp;&nbsp;&nbsp;&nbsp;
				<input type='submit' value='Create Record' />
			</form>
		</div>";

	return true;
}

/**
 * Setup function
 */
 
function efSetupRecordAdminCreateForm() {
	global $wgHooks;
	$wgHooks['BeforePageDisplay'][] = 'efRecordAdminCreateForm';
}

