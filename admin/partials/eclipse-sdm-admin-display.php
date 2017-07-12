<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://eclipse-creative.com/
 * @since      1.0.0
 *
 * @package    Eclipse_SDM
 * @subpackage eclipse-sdm/admin/partials
 */
echo "ADMIN PAGE SETTINGS STUFF";
//$options = get_option('LocalBusiness');

if (isset($_POST["update_settings"])) {
    // Do the saving
    $esAuto        = $_POST['es_auto'];
    update_option('es_auto', $esAuto);

    $esScript       = $_POST['es_script'];
    update_option('es_script', $esScript);

    $esCurrencies  = $_POST['es_currencies'];
    update_option("es_currencies", $esCurrencies);

    $esOpening     = esc_attr($_POST['es_opening']);
    update_option("es_opening", $esOpening);

    $esPayment     = esc_attr($_POST['es_payment']);
    update_option("es_payment", $esPayment);

    $esAddress     = esc_attr($_POST['es_address']);
    update_option("es_address", $esAddress);

    $esFax         = esc_attr($_POST['es_fax']);
    update_option("es_fax", $esFax);

    $esLogo        = esc_attr($_POST['es_logo']);
    update_option("es_logo", $esLogo);

    $esPhoto       = esc_attr($_POST['es_photo']);
    update_option("es_photo", $esPhoto);

    $esLogo        = esc_attr($_POST['es_logo']);
    update_option("es_logo", $esLogo);

    $esPhone       = esc_attr($_POST['es_phone']);
    update_option("es_phone", $esPhone);

    $esEmail       = esc_attr($_POST['es_email']);
    update_option("es_email", $esEmail);

    $esName        = esc_attr($_POST['es_name']);
    update_option("es_name", $esName);

    $esDescription = esc_attr($_POST['es_phone']);
    update_option("es_phone", $esPhone);

    $esImage = esc_attr($_POST['es_image']);
    update_option("es_image", $esImage);

    $esUrl = esc_attr($_POST['es_url']);
    update_option("es_url", $esUrl);

    echo '
<div id="message" class="updated">Settings have been successfully updated.</div>
    ';
}

$esAuto        = get_option('es_auto', 1);
$esScript      = stripslashes(str_replace('/', '', get_option('es_script', '')));
$esCurrencies  = get_option('es_currencies', array('GBP'));
$esOpening     = get_option('es_opening', 'Mo-Fr 09:00-17:00');
$esPayment     = get_option('es_payment', 'Cash, Credit Card');
$esAddress     = get_option('es_address', 'house, somewhere, sometown, PO57CODE');
$esFax         = get_option('es_fax', '00000000000');
$esLogo        = get_option('es_logo', '/library/img/logo.gif');
$esPhoto       = get_option('es_photo', '/library/img/photo.gif');
$esPhone       = get_option('es_phone', '00000000000');
$esEmail       = get_option('es_email', get_bloginfo('admin_email'));
$esName        = get_option('es_name', get_bloginfo('name'));
$esDescription = get_option('es_description', get_bloginfo('description'));
$esImage = get_option('es_image', get_bloginfo('description'));
$esUrl = get_option('es_url', get_bloginfo('url'));
$currencies    = array("GBP"=>"Pound Sterling", "USD"=>"US Dollar", "EUR"=>"Euro", "AFA"=>"Afghani", "AFN"=>"Afghani", "ALK"=>"Albanian old lek", "ALL"=>"Lek", "DZD"=>"Algerian Dinar", "ADF"=>"Andorran Franc", "ADP"=>"Andorran Peseta", "AOR"=>"Angolan Kwanza Readjustado", "AON"=>"Angolan New Kwanza", "AOA"=>"Kwanza", "XCD"=>"East Caribbean Dollar", "ARA"=>"Argentine austral", "ARS"=>"Argentine Peso", "ARL"=>"Argentine peso ley", "ARM"=>"Argentine peso moneda nacional","ARP"=>"Peso argentino","AMD"=>"Armenian Dram","AWG"=>"Aruban Guilder","AUD"=>"Australian Dollar","ATS"=>"Austrian Schilling","AZM"=>"Azerbaijani manat","AZN"=>"Azerbaijanian Manat","BSD"=>"Bahamian Dollar","BHD"=>"Bahraini Dinar","BDT"=>"Taka","BBD"=>"Barbados Dollar","BYR"=>"Belarussian Ruble","BEC"=>"Belgian Franc (convertible)","BEF"=>"Belgian Franc (currency union with LUF)","BEL"=>"Belgian Franc (financial)","BZD"=>"Belize Dollar","XOF"=>"CFA Franc BCEAO","BMD"=>"Bermudian Dollar","INR"=>"Indian Rupee","BTN"=>"Ngultrum","BOP"=>"Bolivian peso","BOB"=>"Boliviano","BOV"=>"Mvdol","BAM"=>"Convertible Marks","BWP"=>"Pula","NOK"=>"Norwegian Krone","BRC"=>"Brazilian cruzado","BRB"=>"Brazilian cruzeiro","BRL"=>"Brazilian Real","BND"=>"Brunei Dollar","BGN"=>"Bulgarian Lev","BGJ"=>"Bulgarian lev A/52","BGK"=>"Bulgarian lev A/62","BGL"=>"Bulgarian lev A/99","BIF"=>"Burundi Franc","KHR"=>"Riel","XAF"=>"CFA Franc BEAC","CAD"=>"Canadian Dollar","CVE"=>"Cape Verde Escudo","KYD"=>"Cayman Islands Dollar","CLP"=>"Chilean Peso","CLF"=>"Unidades de fomento","CNX"=>"Chinese People's Bank dollar","CNY"=>"Yuan Renminbi","COP"=>"Colombian Peso","COU"=>"Unidad de Valor real","KMF"=>"Comoro Franc","CDF"=>"Franc Congolais","NZD"=>"New Zealand Dollar","CRC"=>"Costa Rican Colon","HRK"=>"Croatian Kuna","CUP"=>"Cuban Peso","CYP"=>"Cyprus Pound","CZK"=>"Czech Koruna","CSK"=>"Czechoslovak koruna","CSJ"=>"Czechoslovak koruna A/53","DKK"=>"Danish Krone","DJF"=>"Djibouti Franc","DOP"=>"Dominican Peso","ECS"=>"Ecuador sucre","EGP"=>"Egyptian Pound","SVC"=>"Salvadoran colón","EQE"=>"Equatorial Guinean ekwele","ERN"=>"Nakfa","EEK"=>"Kroon","ETB"=>"Ethiopian Birr","FKP"=>"Falkland Island Pound","FJD"=>"Fiji Dollar","FIM"=>"Finnish Markka","FRF"=>"French Franc","XFO"=>"Gold-Franc","XPF"=>"CFP Franc","GMD"=>"Dalasi","GEL"=>"Lari","DDM"=>"East German Mark of the GDR (East Germany)","DEM"=>"Deutsche Mark","GHS"=>"Ghana Cedi","GHC"=>"Ghanaian cedi","GIP"=>"Gibraltar Pound","GRD"=>"Greek Drachma","GTQ"=>"Quetzal","GNF"=>"Guinea Franc","GNE"=>"Guinean syli","GWP"=>"Guinea-Bissau Peso","GYD"=>"Guyana Dollar","HTG"=>"Gourde","HNL"=>"Lempira","HKD"=>"Hong Kong Dollar","HUF"=>"Forint","ISK"=>"Iceland Krona","ISJ"=>"Icelandic old krona","IDR"=>"Rupiah","IRR"=>"Iranian Rial","IQD"=>"Iraqi Dinar","IEP"=>"Irish Pound (Punt in Irish language)","ILP"=>"Israeli lira","ILR"=>"Israeli old sheqel","ILS"=>"New Israeli Sheqel","ITL"=>"Italian Lira","JMD"=>"Jamaican Dollar","JPY"=>"Yen","JOD"=>"Jordanian Dinar","KZT"=>"Tenge","KES"=>"Kenyan Shilling","KPW"=>"North Korean Won","KRW"=>"Won","KWD"=>"Kuwaiti Dinar","KGS"=>"Som","LAK"=>"Kip","LAJ"=>"Lao kip","LVL"=>"Latvian Lats","LBP"=>"Lebanese Pound","LSL"=>"Loti","ZAR"=>"Rand","LRD"=>"Liberian Dollar","LYD"=>"Libyan Dinar","CHF"=>"Swiss Franc","LTL"=>"Lithuanian Litas","LUF"=>"Luxembourg Franc (currency union with BEF)","MOP"=>"Pataca","MKD"=>"Denar","MKN"=>"Former Yugoslav Republic of Macedonia denar A/93","MGA"=>"Malagasy Ariary","MGF"=>"Malagasy franc","MWK"=>"Kwacha","MYR"=>"Malaysian Ringgit","MVQ"=>"Maldive rupee","MVR"=>"Rufiyaa","MAF"=>"Mali franc","MTL"=>"Maltese Lira","MRO"=>"Ouguiya","MUR"=>"Mauritius Rupee","MXN"=>"Mexican Peso","MXP"=>"Mexican peso","MXV"=>"Mexican Unidad de Inversion (UDI)","MDL"=>"Moldovan Leu","MCF"=>"Monegasque franc (currency union with FRF)","MNT"=>"Tugrik","MAD"=>"Moroccan Dirham","MZN"=>"Metical","MZM"=>"Mozambican metical","MMK"=>"Kyat","NAD"=>"Namibia Dollar","NPR"=>"Nepalese Rupee","NLG"=>"Netherlands Guilder","ANG"=>"Netherlands Antillian Guilder","NIO"=>"Cordoba Oro","NGN"=>"Naira","OMR"=>"Rial Omani","PKR"=>"Pakistan Rupee","PAB"=>"Balboa","PGK"=>"Kina","PYG"=>"Guarani","YDD"=>"South Yemeni dinar","PEN"=>"Nuevo Sol","PEI"=>"Peruvian inti","PEH"=>"Peruvian sol","PHP"=>"Philippine Peso","PLZ"=>"Polish zloty A/94","PLN"=>"Zloty","PTE"=>"Portuguese Escudo","TPE"=>"Portuguese Timorese escudo","QAR"=>"Qatari Rial","RON"=>"New Leu","ROL"=>"Romanian leu A/05","ROK"=>"Romanian leu A/52","RUB"=>"Russian Ruble","RWF"=>"Rwanda Franc","SHP"=>"Saint Helena Pound","WST"=>"Tala","STD"=>"Dobra","SAR"=>"Saudi Riyal","RSD"=>"Serbian Dinar","CSD"=>"Serbian Dinar","SCR"=>"Seychelles Rupee","SLL"=>"Leone","SGD"=>"Singapore Dollar","SKK"=>"Slovak Koruna","SIT"=>"Slovenian Tolar","SBD"=>"Solomon Islands Dollar","SOS"=>"Somali Shilling","ZAL"=>"South African financial rand (Funds code) (discont","ESP"=>"Spanish Peseta","ESA"=>"Spanish peseta (account A)","ESB"=>"Spanish peseta (account B)","LKR"=>"Sri Lanka Rupee","SDD"=>"Sudanese Dinar","SDP"=>"Sudanese Pound","SDG"=>"Sudanese Pound","SRD"=>"Surinam Dollar","SRG"=>"Suriname guilder","SZL"=>"Lilangeni","SEK"=>"Swedish Krona","CHE"=>"WIR Euro","CHW"=>"WIR Franc","SYP"=>"Syrian Pound","TWD"=>"New Taiwan Dollar","TJS"=>"Somoni","TJR"=>"Tajikistan ruble","TZS"=>"Tanzanian Shilling","THB"=>"Baht","TOP"=>"Pa'anga","TTD"=>"Trinidata and Tobago Dollar","TND"=>"Tunisian Dinar","TRY"=>"New Turkish Lira","TRL"=>"Turkish lira A/05","TMM"=>"Manat","RUR"=>"Russian rubleA/97","SUR"=>"Soviet Union ruble","UGX"=>"Uganda Shilling","UGS"=>"Ugandan shilling A/87","UAH"=>"Hryvnia","UAK"=>"Ukrainian karbovanets","AED"=>"UAE Dirham","USS"=>"US Dollar (Same Day)","UYU"=>"Peso Uruguayo","UYN"=>"Uruguay old peso","UYI"=>"Uruguay Peso en Unidades Indexadas","UZS"=>"Uzbekistan Sum","VUV"=>"Vatu","VEF"=>"Bolivar Fuerte","VEB"=>"Venezuelan Bolivar","VND"=>"Dong","VNC"=>"Vietnamese old dong","YER"=>"Yemeni Rial","YUD"=>"Yugoslav Dinar","YUM"=>"Yugoslav dinar (new)","ZRN"=>"Zairean New Zaire","ZRZ"=>"Zairean Zaire","ZMK"=>"Kwacha","ZWD"=>"Zimbabwe Dollar","ZWC"=>"Zimbabwe Rhodesian dollar");
if ($esAuto) {
    $scr = 'none';
    $aut = 'block';
} else {
    $scr = 'block';
    $aut = 'none';
}
?>
<script type="text/javascript">
    /* Link Validate for admin */
    jQuery(document).ready(function(){
        jQuery(".es-tab").hide();
        jQuery("#div-es-links").show();
        jQuery(".es-tab-links").click(function(){
            var divid=jQuery(this).attr("id");
            jQuery(".es-tab-links").removeClass("active");
            jQuery(".es-tab").hide();
            jQuery("#"+divid).addClass("active");
            jQuery("#div-"+divid).fadeIn();
        });

        jQuery("#es-settings-form-admin .button-primary").click(function(){
            var $el = jQuery("#es_active");
            var $vlue = jQuery("#es_rewrite_text").val();
            var lvActive ="";
            /*if((!$el[0].checked) && $vlue=="")
             {
             alert("Please enable plugin");
             return false;
             }*/

            if(($el[0].checked) && $vlue=="")
            {
                jQuery("#es_rewrite_text").css("border","1px solid red");
                jQuery("#adminurl").append(" <strong style='color:red;'>Please enter admin url slug</strong>");
                return false;
            }

            if(($el[0].checked) && lvActive==""){
                //alert(lvActive);
                if (confirm("1. Have you updated your permalink settings?\n\n2. Have you checked writable permission on htaccess file?\n\nIf your answer is YES then Click OK to continue")){
                    return true;
                }else
                {
                    return false;
                }
            }
            var seoUrlVal=jQuery("#check_permalink").val();
            var htaccessWriteable ="0";
            var hostIP ="127.0.0.1";
            //	alert(hostIP);
            if(seoUrlVal=="no")
            {
                alert("Please update permalinks before activate the plugin. permalinks option should not be default!.");
                document.location.href="http://seddon.dev/wp-admin/options-permalink.php";
                return false;
            }
            /*else if(htaccessWriteable=="0" && hostIP!="127.0.0.1"){
             alert("Error : .htaccess file is not exist OR may be htaccess file is not writable, So please double check it before enable the plugin");
             return false;
             }*/
            else
            {
                return true;
            }
        });

        jQuery('#modusOperandi').change(function() {
            if (this.value == 1) {
                // Show the hidden delete option
                jQuery('.remove').show();
            } else {
                // Hide the hidden delete option
                jQuery('.remove').hide();
            }
        }).change();

        // This function is for when the checkbox changes so we hide the relevent section
        jQuery('#es_auto').change(function() {
            if (jQuery(this).is(":checked")) {
                jQuery('#show-hide-script').hide();
                jQuery('#show-hide-auto').show();
                return;
            }
            jQuery('#show-hide-script').show();
            jQuery('#show-hide-auto').hide();
        });
    })
</script>
<div class="heads">
    <div class="spinner"></div>
</div>
<div class="wrap">
    <form id="eclipse__sdm__settings" action="" method="POST">
        <h1>Eclipse Creative Consultants Ltd. Structured Data Markup</h1>
        <p>&nbsp;</p>
        <div id="es-tab-menu">
            <a id="es-local-business" class="es-tab-links active">LocalBusiness SDM</a>
            <a id="es-general" class="es-tab-links">General Settings</a>
            <!--<a id="es-spare1" class="es-tab-links">Spare1</a>
            <!--<a id="es-spare2" class="es-tab-links">Spare2</a>-->
            <!--<a id="es-spare3" class="es-tab-links">Spare3</a>-->
            <!--<a id="es-spare4" class="es-tab-links">Spare4</a>-->
            <!--<a id="es-spare5" class="es-tab-links">Spare5</a>-->
            <!--<a id="es-spare6" class="es-tab-links">Spare6</a>-->
        </div>
        <div id="div-es-local-business" class="es-tab" style="display: block;">
            <h2>Eclipse DSM LocalBusiness</h2>
            <table class="form-table" width="100%" cellpadding="10">
                <tr>
                    <th scope="row">
                        <label for="es_auto">Use Fields?</label>
                    </th>
                    <td>
                        <input id="es_auto" class="regular-text" name="es_auto" aria-describedby="auto-description" value="Auto"<?php if ($esAuto) echo ' checked="checked"' ?> type="checkbox">
                        <p id="auto-description" class="description">Select this to use field values (otherwise we use the content of the following text area)</p>
                    </td>
                </tr>
            </table>
            <table class="form-table" id="show-hide-script" width="100%" cellpadding="10" style="display: <?php echo $scr ?>;">
                <tr>
                    <th scope="row">
                        <label for="es_script">Manual Script</label>
                    </th>
                    <td>
                        <textarea id="es_script" class="regular-text" name="es_script" aria-describedby="script-description" rows="20"><?php echo $esScript ?></textarea>
                        <p id="script-description" class="description">paste ld+json script here, do not add script tags</p>
                    </td>
                </tr>
            </table>
            <table class="form-table" id="show-hide-auto" width="100%" cellpadding="10" style="display: <?php echo $aut ?>;">
                <tr>
                    <th scope="row">
                        <label for="es_currencies">currenciesAccepted</label>
                    </th>
                    <td>
                        <select name="es_currencies[ ]" multiple="multiple" aria-describedby="currencies-description">
                            <?php foreach ($currencies as $iso => $name) {
                                $line = '<option value="' . $iso . '"';
                                if (is_array($esCurrencies) && in_array($iso, $esCurrencies)) $line .= ' selected="selected"';
                                $line .= '>' . $name . ' - ' . $iso . '</option>' . "\n";
                                echo $line;
                            }
                            ?>
                        </select>
                        <p id="currencies-description" class="description">Please select accepted Currencies (Use shift to select more than one)</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="es_opening">openingHours</label>
                    </th>
                    <td>
                        <input id="es_opening" class="regular_text" name="es_opening" aria-describedby="opening-description" value="<?php echo $esOpening ?>" type="text">
                        <p id="opening-description" class="description">The general opening hours for a business. Opening hours can be specified as a weekly time range, starting with days, then times per day. Multiple days can be listed with commas ',' separating each day. Day or time ranges are specified using a hyphen '-'.
                            Days are specified using the following two-letter combinations: Mo, Tu, We, Th, Fr, Sa, Su.
                            Times are specified using 24:00 time. For example, 3pm is specified as 15:00.</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="es_payment">paymentAccepted</label>
                    </th>
                    <td>
                        <input id="es_payment" class="regular_text" name="es_payment" aria-describedby="payment-description" value="<?php echo $esPayment ?>" type="text">
                        <p id="payment-description" class="description">Please enter payment types accepted ie 'Cash, Credit Card'</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="es_address">address</label>
                    </th>
                    <td>
                        <input id="es_address" class="regular_text" name="es_address" aria-describedby="address-description" value="<?php echo $esAddress ?>" type="text">
                        <p id="address-description" class="description">Physical address of the item.</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="es_fax">faxNumber</label>
                    </th>
                    <td>
                        <input id="es_fax" class="regular_text" name="es_fax" aria-describedby="fax-description" value="<?php echo $esFax ?>" type="text">
                        <p id="fax-description" class="description">The fax number.</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="es_logo">logo</label>
                    </th>
                    <td>
                        <input id="es_logo" class="regular_text" name="es_logo" aria-describedby="logo-description" value="<?php echo $esLogo ?>" type="text">
                        <p id="logo-description" class="description">An associated logo</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="es_photo">photo</label>
                    </th>
                    <td>
                        <input id="es_photo" class="regular_text" name="es_photo" aria-describedby="photo-description" value="<?php echo $esPhoto ?>" type="text">
                        <p id="photo-description" class="description">A photograph of this place.</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="es_phone">telephone</label>
                    </th>
                    <td>
                        <input id="es_phone" class="regular_text" name="es_phone" aria-describedby="phone-description" value="<?php echo $esPhone ?>" type="text">
                        <p id="phone-description" class="description">The telephone number</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="es_email">email</label>
                    </th>
                    <td>
                        <input id="es_email" class="regular_text" name="es_email" aria-describedby="email-description" value="<?php echo $esEmail ?>" type="text">
                        <p id="email-description" class="description">Admin email address.</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="es_name">name</label>
                    </th>
                    <td>
                        <input id="es_name" class="regular_text" name="es_name" aria-describedby="name-description" value="<?php echo $esName ?>" type="text">
                        <p id="name-description" class="description">The name of the website.</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="es_description">description</label>
                    </th>
                    <td>
                        <input id="es_description" class="regular_text" name="es_description" aria-describedby="description-description" value="<?php echo $esDescription ?>" type="text">
                        <p id="description-description" class="description">A description of the item.</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="es_description">image</label>
                    </th>
                    <td>
                        <input id="es_image" class="regular_text" name="es_image" aria-describedby="image-description" value="<?php echo $esImage ?>" type="text">
                        <p id="image-description" class="description">A description of the image.</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="es_url">url</label>
                    </th>
                    <td>
                        <input id="es_url" class="regular_text" name="es_url" aria-describedby="url-description" value="<?php echo $esUrl ?>" type="text">
                        <p id="url-description" class="description">the sites url.</p>
                    </td>
                </tr>
            </table>
        </div>
        <div id="div-es-general" class="es-tab" style="display: none;">
            <h2>Eclipse Toolbox Wordpress Settings</h2><?php wp_nonce_field('update-options') ?>
            <table class="form-table" width="100%" cellpadding="10">
                <tr>
                    <th scope="row">Track Post Types</th>
                    <td scope="row" align="left">
                        <fieldset>
                            <!--<input id="es_parallel" class="regular_text" name="es_parallel" aria-describedby="parallel-description" value="<?php echo $lvParallel ?>" type="text">
                            <p id="parallel-description" class="description">Enter the number of links to test in parallel, suggest between 4 and 20, default is 10</p>-->
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="es_parallel">Links in Parallel</label>
                    </th>
                    <td>
                        <fieldset>
                            <!--<input id="es_parallel" class="regular_text" name="es_parallel" aria-describedby="parallel-description" value="<?php echo $lvParallel ?>" type="text">
                            <p id="parallel-description" class="description">Enter the number of links to test in parallel, suggest between 4 and 20, default is 10</p>-->
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="es_multiplier">MySql Multiplier</label>
                    </th>
                    <td>
                        <fieldset>
                            <!--<input id="es_parallel" class="regular_text" name="es_parallel" aria-describedby="parallel-description" value="<?php echo $lvParallel ?>" type="text">
                            <p id="parallel-description" class="description">Enter the number of links to test in parallel, suggest between 4 and 20, default is 10</p>-->
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        &nbsp;
                    </th>
                    <td><span class="regular_text">Result: 10 x <?php echo 4 ?> = <?php echo 40 ?> rows entered in parallel to the database (default 60)</span></td>
                </tr>
            </table>
        </div>
        <!--<div id="div-es-spare1" class="es-tab" style="display: none;">
            <h2>Spare Tab 1</h2>
        </div>-->
        <!--<div id="div-es-spare2" class="es-tab" style="display: none;">
            <h2>Spare Tab 2</h2>
        </div>-->
        <!--<div id="div-es-spare3" class="es-tab" style="display: none;">
            <h2>Spare Tab 3</h2>
        </div>-->
        <!--<div id="div-es-spare4" class="es-tab" style="display: none;">
            <h2>Spare Tab 4</h2>
        </div>-->
        <!--<div id="div-es-spare5" class="es-tab" style="display: none;">
            <h2>Spare Tab 5</h2>
        </div>-->
        <!--<div id="div-es-spare6" class="es-tab" style="display: none;">
            <h2>Spare Tab 6</h2>
        </div>-->
</div>
<input type="hidden" name="update_settings" value="Y">
<input type="submit" class="button-primary" name="cpt_submit" value="Save Details">
</form>
</div>
