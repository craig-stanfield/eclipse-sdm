=== Eclipse Structured Data Markup ===
Contributors: CraigStanfield
Donate link: http://eclipse-creative.com/
Tags: Structured Data, LD+JSON, SEO Tools
Requires at least: 3.0.1
Tested up to: 4.8
Stable tag: 4.7.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Eclipse SDM creates structured data markup fields with ACF

== Description ==

> **[Silver Bullet Pro](https://eclipse-creative.com "Take your business to new heights")** |

Welcome to the Eclipse SDM Plugin for Wordpress by Eclipse Creative Consultants Ltd. This plugin is intended to plug
the gaps left by other SEO plugins (We have Yoast on almost all our sites) This plugin is still in the early days of
it's life and new features are expected to be added quickly.

Eclipse SDM primary function is creation of ld+json scripts using ACF (v5 and above). The resulting scripts can be
included in pages as needed.

Eclipse SDM is used to add LocalBusiness type to the home page by default but can be expanded to suit other needs

== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload `eclipse-sdm.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Click the Eclipse SDM menu option and fill the options.
4. Reload required frontend page, markup will be included and can be tested at https://search.google.com/structured-data/testing-tool/u/0/

== Frequently Asked Questions ==

1. How do you create a new SDM and add to a specific page?
* TODO add instructions
add following to homepage template
[code]
$esAuto = get_option('es_auto');
if ($esAuto) {
    $currencies = implode(',', get_option('es_currencies'));
    $template = get_template_directory_uri();
    $schemaArray = array(
        '@context' => 'http://schema.org',
        '@type' => 'LocalBusiness',
        '@id' => '#LocalBusiness',
        'currenciesAccepted' => $currencies,
        'openingHours' => get_option('es_opening'),
        'paymentAccepted' => get_option('es_payment'),
        'address' => get_option('es_address'),
        'faxNumber' => get_option('es_fax'),
        'logo' => $template . get_option('es_logo'),
        'email' => get_option('es_email'),
        'name' => get_option('es_name'),
        'description' => get_option('es_description'),
        'telephone' => get_option('es_phone'),
        'photo' => $template . get_option('es_photo'),
        'image' => $template . get_option('es_image'),
        'url' => get_option('es_url')
    );
    $json = json_encode($schemaArray);
} else {
    $json = stripslashes(str_replace('/', '', get_option('es_script')));
}
?>
<script type="application/ld+json">
    <?php echo $json ?>
</script>
[/code]

== Screenshots ==

1. This screen shot description corresponds to screenshot-1.(png|jpg|jpeg|gif). Note that the screenshot is taken from
the /assets directory or the directory that contains the stable readme.txt (tags or trunk). Screenshots in the /assets
directory take precedence. For example, `/assets/screenshot-1.png` would win over `/tags/4.3/screenshot-1.png`
(or jpg, jpeg, gif).
2. This is the second screen shot

== Changelog ==

= 0.1.0 =
* This is the first release of this plugin.

== Upgrade Notice ==

= 0.1.0 =
This is the release.

== Arbitrary section ==

You may provide arbitrary sections, in the same format as the ones above.  This may be of use for extremely complicated
plugins where more information needs to be conveyed that doesn't fit into the categories of "description" or
"installation."  Arbitrary sections will be shown below the built-in sections outlined above.

== Eclipse Toolbox ==

Features:

1. LocalBusiness SDM for home page
2. custom SDM on custom pages (wip)

Upcoming features:

 1. Add any sdm type to required page











Here's a link to [WordPress](http://wordpress.org/ "Your favorite software") and one to [Markdown's Syntax Documentation][markdown syntax].
Titles are optional, naturally.

[markdown syntax]: http://daringfireball.net/projects/markdown/syntax
            "Markdown is what the parser uses to process much of the readme file"

Markdown uses email style notation for blockquotes and I've been told:
> Asterisks for *emphasis*. Double it up  for **strong**.

`<?php code(); // goes in backticks ?>`
