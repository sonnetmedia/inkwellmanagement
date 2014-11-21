<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/*
|--------------------------------------------------------------------------
| ExpressionEngine Config Items
|--------------------------------------------------------------------------
|
| The following items are for use with ExpressionEngine.  The rest of
| the config items are for use with CodeIgniter.
|
*/

$config['system_folder'] = "eecp";
$config['multiple_sites_enabled'] = "n";



/* General
-------------------------------------------------------------------*/
$config['is_system_on'] = "y";
$config['site_index'] = "";
$config['site_url'] = "http://inkwellmanagement.dev";
$config['server_path'] = $_SERVER['DOCUMENT_ROOT'];
$config['cp_url'] = $config['site_url']."/admin.php";
$config['app_version'] = "292";
$config['install_lock'] = "";
$config['license_number'] = "7383-0929-9108-0241";
$config['debug'] = "1";
$config['doc_url'] = "http://ellislab.com/expressionengine/user-guide/";
$config['site_label'] = 'Inkwell Management';
$config['site_name'] = "default_site";
$config['gzip_output'] = "y";
$config['cp_theme'] = "default";
$config['autosave_interval_seconds'] = '30';
$config['autosave_prune_hours'] = '6';


/* Cookie settings
-------------------------------------------------------------------*/
$config['cookie_path'] = "";
$config['cookie_domain'] = ".inkwellmanagement.dev";
$config['cookie_prefix'] = "";




/* Misc directory paths and urls
-------------------------------------------------------------------*/
$config['theme_folder_path'] = $config['server_path']."/themes/";
$config['theme_folder_url'] = $config['site_url']."/themes/";
$config['captcha_path'] = $config['server_path']."/images/captchas/";
$config['captcha_url'] = $config['site_url']."/images/captchas/";

$config['enable_emoticons'] = "n";


/* Templates Preferences
-------------------------------------------------------------------*/
$config['save_tmpl_files'] = "y";
$config['tmpl_file_basepath'] = "../templates";


/* Member directory paths and urls
-------------------------------------------------------------------*/
$config['avatar_url'] = $config['site_url']."/images/avatars/";
$config['avatar_path'] = $config['server_path']."/images/avatars/";
$config['photo_url'] = $config['site_url']."/images/member_photos/";
$config['photo_path'] = $config['server_path']."/images/member_photos/";
$config['sig_img_url'] = $config['site_url']."/images/uploads/signature_attachments/";
$config['sig_img_path'] = $config['server_path']."/images/signature_attachments/";
$config['prv_msg_upload_path'] = $config['server_path']."/images/pm_attachments/";



$config['allow_extensions'] = "y";
$config['login_reminder'] = "y";

/* Extreme traffic options - http://expressionengine.com/docs/general/handling_extreme_traffic.html
-------------------------------------------------------------------*/

$config['enable_online_user_tracking'] = "n"; 	// (y/n) - Corresponds to Enable Online User Tracking
$config['enable_hit_tracking'] = "n"; 			// (y/n) - Corresponds to Enable Template Hit Tracking
$config['enable_entry_view_tracking'] = "n";   // (y/n) - Corresponds to Enable Weblog Entry View Tracking
$config['log_referrers']	= "n";             // (y/n) - Corresponds to Enable Referrer Logging?
$config['dynamic_tracking_disabling'] = "";   // (numeric) - Corresponds to Suspend ALL tracking when number of online visitors exceeds:
$config['disable_all_tracking'] = "n";  // (y/n) - Emergency preference which when set to 'y' will disable all of the above.
$config['enable_db_caching'] = "n";
$config['enable_sql_caching'] = "n";
$config['disable_tag_caching'] = "y";


/* Global Channel Preferences
-------------------------------------------------------------------*/
$config['use_category_name'] = "y";
$config['reserved_category_word'] = "category";
$config['word_separator'] = "dash";
$config['enable_image_resizing'] = "n";
$config['auto_convert_high_ascii'] = "n";


/* Member Preferences
-------------------------------------------------------------------*/
$config['profile_trigger'] = "asdflhasdfmnaasdgasfgl87asdh";
$config['allow_member_registration'] = "n";


/* Enable some hidden variables - http://expressionengine.com/wiki/Hidden_Configuration_Variables/
-------------------------------------------------------------------*/
$config['hidden_template_indicator'] = "_";
//
$config['view_comment_chars'] = '50';


/* modules
--------------------------------------------------------------------*/
$config['ed_server_path'] = $config['server_path'];
$config['ed_cache_path'] = $config['server_path'].'/images/cache/';
$config['moblog_allow_nontextareas'] = 'y';





$config['emoticon_url'] = "http://inkwellmanagement.com/images/smileys/";
$config['cookie_httponly'] = 'y';
$config['cp_session_type'] = 'c';
$config['website_session_type'] = 'c';
$config['license_contact'] = 'budparr@sonnetmedia.net';

// END EE config items



$config['upload_preferences'] = array(
    2 => array(                                                            // ID of upload destination
        'name'        => 'Author Photos',                          // Display name in control panel
        'server_path' => '../content/images/authors/', // Server path to upload directory
        'url'         => '/images/authors/'      // URL of upload directory
    ),
    3 => array(                                                            // ID of upload destination
        'name'        => 'Covers',                          // Display name in control panel
        'server_path' => '../content/images/covers/', // Server path to upload directory
        'url'         => '/images/covers/'      // URL of upload directory
    ),
    4 => array(                                                            // ID of upload destination
        'name'        => '-Uploads (general)',                          // Display name in control panel
        'server_path' => '../content/images/uploads/', // Server path to upload directory
        'url'         => '/images/uploads/'      // URL of upload directory
    ),
    7 => array(                                                            // ID of upload destination
        'name'        => 'Site',                          // Display name in control panel
        'server_path' => '../content/static/images/global/', // Server path to upload directory
        'url'         => '/static/images/global/'      // URL of upload directory
    ),
    8 => array(                                                            // ID of upload destination
        'name'        => 'test',                          // Display name in control panel
        'server_path' => '../content/images/test/', // Server path to upload directory
        'url'         => '/images/images/test/'      // URL of upload directory
    )

  );





/*
|--------------------------------------------------------------------------
| Base Site URL
|--------------------------------------------------------------------------
|
| URL to your CodeIgniter root. Typically this will be your base URL,
| WITH a trailing slash:
|
|	http://example.com/
|
*/
$config['base_url']	= 'http://inkwellmanagement.dev';

/*
|--------------------------------------------------------------------------
| Index File
|--------------------------------------------------------------------------
|
| Typically this will be your index.php file, unless you've renamed it to
| something else. If you are using mod_rewrite to remove the page set this
| variable so that it is blank.
|
*/
$config['index_page'] = "";

/*
|--------------------------------------------------------------------------
| URI PROTOCOL
|--------------------------------------------------------------------------
|
| This item determines which server global should be used to retrieve the
| URI string.  The default setting of "AUTO" works for most servers.
| If your links do not seem to work, try one of the other delicious flavors:
|
| 'AUTO'			Default - auto detects
| 'PATH_INFO'		Uses the PATH_INFO
| 'QUERY_STRING'	Uses the QUERY_STRING
| 'REQUEST_URI'		Uses the REQUEST_URI
| 'ORIG_PATH_INFO'	Uses the ORIG_PATH_INFO
|
*/
$config['uri_protocol']	= 'AUTO';

/*
|--------------------------------------------------------------------------
| URL suffix
|--------------------------------------------------------------------------
|
| This option allows you to add a suffix to all URLs generated by CodeIgniter.
| For more information please see the user guide:
|
| http://codeigniter.com/user_guide/general/urls.html
*/

$config['url_suffix'] = '';

/*
|--------------------------------------------------------------------------
| Default Language
|--------------------------------------------------------------------------
|
| This determines which set of language files should be used. Make sure
| there is an available translation if you intend to use something other
| than english.
|
*/
$config['language']	= 'english';

/*
|--------------------------------------------------------------------------
| Default Character Set
|--------------------------------------------------------------------------
|
| This determines which character set is used by default in various methods
| that require a character set to be provided.
|
*/
$config['charset'] = 'UTF-8';

/*
|--------------------------------------------------------------------------
| Enable/Disable System Hooks
|--------------------------------------------------------------------------
|
| If you would like to use the "hooks" feature you must enable it by
| setting this variable to TRUE (boolean).  See the user guide for details.
|
*/
$config['enable_hooks'] = FALSE;


/*
|--------------------------------------------------------------------------
| Class Extension Prefix
|--------------------------------------------------------------------------
|
| This item allows you to set the filename/classname prefix when extending
| native libraries.  For more information please see the user guide:
|
| http://codeigniter.com/user_guide/general/core_classes.html
| http://codeigniter.com/user_guide/general/creating_libraries.html
|
*/
$config['subclass_prefix'] = 'EE_';


/*
|--------------------------------------------------------------------------
| Allowed URL Characters
|--------------------------------------------------------------------------
|
| This lets you specify which characters are permitted within your URLs.
| When someone tries to submit a URL with disallowed characters they will
| get a warning message.
|
| As a security measure you are STRONGLY encouraged to restrict URLs to
| as few characters as possible.  By default only these are allowed: a-z 0-9~%.:_-
|
| Leave blank to allow all characters -- but only if you are insane.
|
| DO NOT CHANGE THIS UNLESS YOU FULLY UNDERSTAND THE REPERCUSSIONS!!
|
*/
$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\\-';


/*
|--------------------------------------------------------------------------
| Enable Query Strings
|--------------------------------------------------------------------------
|
| By default CodeIgniter uses search-engine friendly segment based URLs:
| example.com/who/what/where/
|
| You can optionally enable standard query string based URLs:
| example.com?who=me&what=something&where=here
|
| Options are: TRUE or FALSE (boolean)
|
| The two other items let you set the query string "words" that will
| invoke your controllers and its functions:
| example.com/index.php?c=controller&m=function
|
| Please note that some of the helpers won't work as expected when
| this feature is enabled, since CodeIgniter is designed primarily to
| use segment based URLs.
|
*/
$config['enable_query_strings'] = FALSE;
$config['directory_trigger'] = 'D';
$config['controller_trigger'] = 'C';
$config['function_trigger'] = 'M';

/*
|--------------------------------------------------------------------------
| Error Logging Threshold
|--------------------------------------------------------------------------
|
| If you have enabled error logging, you can set an error threshold to
| determine what gets logged. Threshold options are:
|
|	0 = Disables logging, Error logging TURNED OFF
|	1 = Error Messages (including PHP errors)
|	2 = Debug Messages
|	3 = Informational Messages
|	4 = All Messages
|
| For a live site you'll usually only enable Errors (1) to be logged otherwise
| your log files will fill up very fast.
|
*/
$config['log_threshold'] = 0;

/*
|--------------------------------------------------------------------------
| Error Logging Directory Path
|--------------------------------------------------------------------------
|
| Leave this BLANK unless you would like to set something other than the default
| system/logs/ folder.  Use a full server path with trailing slash.
|
*/
$config['log_path'] = '';

/*
|--------------------------------------------------------------------------
| Date Format for Logs
|--------------------------------------------------------------------------
|
| Each item that is logged has an associated date. You can use PHP date
| codes to set your own date formatting
|
*/
$config['log_date_format'] = 'Y-m-d H:i:s';

/*
|--------------------------------------------------------------------------
| Cache Directory Path
|--------------------------------------------------------------------------
|
| Leave this BLANK unless you would like to set something other than the default
| system/cache/ folder.  Use a full server path with trailing slash.
|
*/
$config['cache_path'] = '';

/*
|--------------------------------------------------------------------------
| Encryption Key
|--------------------------------------------------------------------------
|
| If you use the Encryption class or the Sessions class with encryption
| enabled you MUST set an encryption key.  See the user guide for info.
|
*/
$config['encryption_key'] = "OEMu2MYGlOjdZMFSEDABm4OMhSCeFS";

/*
|--------------------------------------------------------------------------
| Global XSS Filtering
|--------------------------------------------------------------------------
|
| Determines whether the XSS filter is always active when GET, POST or
| COOKIE data is encountered
|
*/
$config['global_xss_filtering'] = FALSE;


/*
|--------------------------------------------------------------------------
| CSRF Protection
|--------------------------------------------------------------------------
|
| Determines whether Cross Site Request Forgery protection is enabled.
| For more info visit the security library page of the user guide
|
*/
$config['csrf_protection'] = FALSE;

/*
|--------------------------------------------------------------------------
| Output Compression
|--------------------------------------------------------------------------
|
| Enables Gzip output compression for faster page loads.  When enabled,
| the output class will test whether your server supports Gzip.
| Even if it does, however, not all browsers support compression
| so enable only if you are reasonably sure your visitors can handle it.
|
| VERY IMPORTANT:  If you are getting a blank page when compression is enabled it
| means you are prematurely outputting something to your browser. It could
| even be a line of whitespace at the end of one of your scripts.  For
| compression to work, nothing can be sent before the output buffer is called
| by the output class.  Do not "echo" any values with compression enabled.
|
*/
$config['compress_output'] = FALSE;

/*
|--------------------------------------------------------------------------
| Master Time Reference
|--------------------------------------------------------------------------
|
| Options are "local" or "gmt".  This pref tells the system whether to use
| your server's local time as the master "now" reference, or convert it to
| GMT.  See the "date helper" page of the user guide for information
| regarding date handling.
|
*/
$config['time_reference'] = 'local';


/*
|--------------------------------------------------------------------------
| Rewrite PHP Short Tags
|--------------------------------------------------------------------------
|
| If your PHP installation does not have short tag support enabled CI
| can rewrite the tags on-the-fly, enabling you to utilize that syntax
| in your view files.  Options are TRUE or FALSE (boolean)
|
*/
$config['rewrite_short_tags'] = TRUE;


/*
|--------------------------------------------------------------------------
| Reverse Proxy IPs
|--------------------------------------------------------------------------
|
| If your server is behind a reverse proxy, you must whitelist the proxy IP
| addresses from which CodeIgniter should trust the HTTP_X_FORWARDED_FOR
| header in order to properly identify the visitor's IP address.
| Comma-delimited, e.g. '10.0.1.200,10.0.1.201'
|
*/
$config['proxy_ips'] = "";


/* End of file config.php */
/* Location: ./system/expressionengine/config/config.php */