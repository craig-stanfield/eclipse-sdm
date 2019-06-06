#Eclipse Structured Data Markup

######Contributors: CraigStanfield
######Donate link: http://eclipse-creative.com/
######Tags: Structured Data, LD+JSON, SEO Tools
######Requires at least: 3.0.1
######Tested up to: 4.8
######Stable tag: 4.7.1
######License: GPLv2 or later<
######License URI: http://www.gnu.org/licenses/gpl-2.0.html
######Eclipse SDM creates structured data markup fields with ACF
___
## Description

> **[Silver Bullet Pro](https://eclipse-creative.com "Take your business to new heights")** |

Welcome to the Eclipse SDM Plugin for Wordpress by Eclipse Creative Consultants Ltd. This plugin is intended to plug
the gaps left by other SEO plugins (We have Yoast on almost all our sites) This plugin is still in the early days of
it's life and new features are expected to be added quickly.

Eclipse SDM primary function is creation of ld+json scripts using ACF (v5 and above). The resulting scripts can be
included in pages as needed.

Eclipse SDM is used to add LocalBusiness type to the home page by default but can be expanded to suit other needs

## Installation

This section describes how to install the plugin and get it working.

e.g.

1. Upload `eclipse-sdm.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Click the Eclipse SDM menu option and fill the options.
4. Reload required frontend page, markup will be included and can be tested at https://search.google.com/structured-data/testing-tool/u/0/

## Frequently Asked Questions

**1 How do you create a new SDM and add to a specific page?**

This version auto builds the acf tables needed and the schema data can be entered in the Eclipse SDM options page
to add a schema script to a page include the following:

> echo do_shortcode("[ecl-sdm schema=standard]");

valid values for the schema attributes are as follows

>standard - this creates an organisation and any local businesses. This is the default suggested value.

>organisation - this crates only organisation (english spelling)

>people - this creates a schema of all people entered with contact points

>local_business - this creates a schema of just local businesses

>all - this creates a schema for organisation, all people and all local businesses

Once the do shortcode snippet is inserted it will generate the required script inline. I recommend using the header
at the end of the head section so it exists on all pages. The shortcode snippet can be included anywhere on any page.

**2 How do i use the search and replace?**

Enter the search and replace data to the Search and Replace settings page in wordpress.

in any templates you need to add the functionality add a sar class to the region which produces the content to use the functionality.
eg. a defult wordpress page.php contains:
``` php
<?php
/**
 * page.php
 */
get_header();
$templateDirectory = get_template_directory_uri();
$title = get_field('page_title');
?>
<div class="page__banner">
    <?php get_template_part('partials/page-banner'); ?>
</div>

<div class="page__container__wrapper policy-page row">
	<h1><?php echo $title; ?></h1>
    <?php if(have_posts()) {
        while (have_posts()) {
            the_post();
            get_template_part('content', 'page');
        }
    } ?>
</div>

<?php get_footer() ?>
```

we can add sar right after row in the page container div
``` php
<?php
/**
 * page.php
 */
get_header();
$templateDirectory = get_template_directory_uri();
$title = get_field('page_title');
?>
<div class="page__banner">
    <?php get_template_part('partials/page-banner'); ?>
</div>

<div class="page__container__wrapper policy-page row sar">
	<h1><?php echo $title; ?></h1>
    <?php if(have_posts()) {
        while (have_posts()) {
            the_post();
            get_template_part('content', 'page');
        }
    } ?>
</div>

<?php get_footer() ?>
```

**3 How to use Q and A feature?**

This feature currently only works with taxonomy category. The following needs to be at the top of your category.php file:
```
$term                 = get_queried_object();
$rows                 = get_field( "faqpage_mainentity", $term );

$schema               = array();
$schema['@context']   = "https://schema.org";
$schema['type']       = "FAQPage";
$schema['mainEntity'] = array();
$qandas = '';
foreach ( $rows as $row ) {
    $question               = $row['name'];
    $answer                 = $row['text'];
    $schema['mainEntity'][] = array(
        "@type" => "Question",
        "name"  => $question,
        "acceptedAnswer" => array(
            "@type" => "Answer",
            "text"  => $answer
        ),
    );
    $qandas  .= '
        <h2>' . $question . '</h2>
        <p>' . $answer . '</p>';
}

$ldjson = json_encode( $schema );
echo '<script type="application/ld+json">' . $ldjson . '</script>';
```
Near the end of this file we need to echo the questions and answers by adding the following
```
<?php echo $qandas; // Q and A section if available ?>
```

### Screenshots

1. This screen shot description corresponds to screenshot-1.(png|jpg|jpeg|gif). Note that the screenshot is taken from
the /assets directory or the directory that contains the stable readme.txt (tags or trunk). Screenshots in the /assets
directory take precedence. For example, `/assets/screenshot-1.png` would win over `/tags/4.3/screenshot-1.png`
(or jpg, jpeg, gif).
2. This is the second screen shot

### Changelog

> 2.1.2

Added category Q & A schema and functionality.

> 2.1.1

Refactor how scripts are added (acf repeaters) bug fixes. new shortcode method added to replace manual script adding

> 2.0.0

Search and Replace functionality added

>0.1.0

* This is the first release of this plugin.

### Upgrade Notice

> 2.1.2

No notices however the Q and A feature will only work with taxonomy category scenarios. This will be expanded in the next release

> 2.1.1

This release needs you to remove and acf objects called Eclipse SDM or Search & Replace. The code will create its own tables and you wont be able to edit them from the acf page.

> Arbitrary section

You may provide arbitrary sections, in the same format as the ones above.  This may be of use for extremely complicated
plugins where more information needs to be conveyed that doesn't fit into the categories of "description" or
"installation."  Arbitrary sections will be shown below the built-in sections outlined above.

> Eclipse Toolbox

####Features:

1. LocalBusiness SDM for home page
2. Custom SDM on custom pages (wip)
3. Search and replace functionality

####Upcoming features:

 1. Add any sdm type to required page using flexible content from acf


[markdown syntax]: http://daringfireball.net/projects/markdown/syntax
            "Markdown is what the parser uses to process much of the readme file"

Markdown uses email style notation for blockquotes and I've been told:
> Asterisks for *emphasis*. Double it up  for **strong**.

`<?php code(); // goes in backticks ?>`
