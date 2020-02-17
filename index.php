<?php
// Query params are:  

require_once dirname(__FILE__) . '/kclick_client.php';
$client = new KClickClient('http://asiatrends.pro/api.php?', 'ymgmf5clwvdnkmdc5psnpdxskzsbmznb');
$client->sendAllParams();       // to send all params from page query
$client->forceRedirectOffer();       // redirect to offer if an offer is chosen
// $client->param('sub_id_5', '123'); // you can send any params
// $client->keyword('PASTE_KEYWORD');  // send custom keyword
// $client->currentPageAsReferrer(); // to send current page URL as click referrer
// $client->debug();              // to enable debug mode and show the errors
// $client->execute();             // request to api, show the output and continue
$client->executeAndBreak();     // to stop page execution if there is redirect or some output
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Κρέμα Σπρέυ Arthro">
<meta property="og:type" content="website">
<meta property="og:description" content="Κοινή κρέμα ψεκασμού">
<link rel="stylesheet" href="css/styles.css">
<link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700&display=swap&subset=cyrillic,cyrillic-ext" rel="stylesheet"> 
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
<meta name="apple-mobile-web-app-capable" content="no">
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" /> 

</head>
<body>

<nav>
    <div class="container">
        <div class="logo"><img src="images/Logo.png" alt="" /></div>
      
        <div class="phoneMobile">
		   <a onClick="document.getElementById('form-index').submit();return false;" href="/step2/"> <img class="pull-right" src="images/trolley_icon.png" alt="" /></a>

		</div>
    </div>
    <div class="clear"></div>
</nav>
<form name="form-index" id="form-index" action="/step2/" method="post" >
	<input id="shipping_fname" type="hidden" name="shipping_fname" value="NULL" />
    <input id="shipping_email" type="hidden" name="shipping_email" value="NULL" />
</form>

<div class="clear"></div>
	<div id="sectionOne" class="section col-12 clearfix top">
		<div class="container">
            <div class="col-4" id="space">
                <img src="images/TUVW.png" alt="" class="tuv">
                <img src="images/iso.png" alt="" class="iso">
            </div>
            <div class="col-4">
                <div class="box">

                    <p class="bottom-right__text">ΩΡΑ ΑΡΙΣΤΕΡΑ ΜΕΧΡΙ ΧΡΕΩΣΗ ΕΚΠΤΩΣΗΣ:</p>
                    <div class="banner_buy">
                        <ul class="time fitshop-order-countdown">
                            <li class="order-countdown-hours" id="hours_bottom"></li>
                            <li class="order-countdown-hours" id="minutes_bottom"></li>
                            <li class="order-countdown-hours" id="seconds_bottom"></li>
                        </ul>
                        <br>
                        Εκπτωτική τιμή: &ndash; <span id="promoTotal" class="textbuy2">39 Euro</span>
                    </div>
                    <button class="rushOrder" onClick="document.getElementById('form-index').submit();" type="submit">ΠΑΡΑΓΓΕΙΛΕ ΤΩΡΑ</button>
                </div>
            </div>
        </div>
        <div class="clear"></div>
	</div>
    <div id="sectionThree" class="section col-12 clearfix">
        <div class="container">
                <h1 class="text-center">ΠΩΣ ΝΑ ΕΡΘΕΙ Η <span>ARTHROMED</span> είναι τόσο δημοφιλής;</h1>
                <div class="opinion">
                <img src="images/icon_01.jpg" alt="" class="pull-left">
                <h1>Είναι εύκολο στη χρήση</h1>
            </div>
            <div class="opinion">
                <img src="images/icon_02.jpg" alt="" class="pull-left">
                <h1>Επαναφέρει την ευελιξία των αρθρώσεων</h1>
            </div>
            <div class="opinion">
                <img src="images/icon_03.jpg" alt="" class="pull-left">
                <h1>Λειτουργεί γρήγορα</h1>
             </div>
           <div class="opinion">
                <img src="images/icon_04.jpg" alt="" class="pull-left">
               <h1>Είναι για εξωτερική χρήση</h1>
            </div>
            <div class="opinion">
                <img src="images/icon_05.jpg" alt="" class="pull-left">
                <h1>Τα αποτελέσματα είναι αξιοσημείωτα μετά την πρώτη πορεία</h1>
            </div>
            <div class="opinion">
                <img src="images/icon_06.jpg" alt="" class="pull-left">
                <h1>Είναι φιλικό προς το πορτοφόλι</h1>
            </div>
            <button class="rushOrder" onClick="document.getElementById('form-index').submit();" type="submit">ΠΟΛΥ ΘΕΛΩ</button>
        </div>
    </div>
    <div id="sectionFour" class="section col-12 clearfix">
        <div class="container">
        <h1>Πώς μπορεί το προϊόν όχι μόνο να ενισχύσει αλλά και να αποκαταστήσει τις αρθρώσεις;</h1>
                <p><img src="images/moneyback.png" alt=""><strong>Οι αρθρώσεις μας υποβάλλονται καθημερινά σε βαρύ φορτίο</strong></p>
          <p>ArthroMed περιέχει ένα συστατικό που ενισχύει την παραγωγή κολλαγόνου του σώματος. Αυτή η πρωτεΐνη θα αναγεννηθεί και θα αποκαταστήσει τους συνδετικούς ιστούς που είναι επιρρεπείς σε φθορά και σχίσιμο.</p>
          <p><strong>Διατήρηση του ασβεστίου</strong></p>
          <p>Καθώς οι άνθρωποι γερνούν, η οστική απώλεια συμβαίνει προκαλώντας χαμηλότερη πυκνότητα των Το Arthro δεν απομακρύνει το ασβέστιο από το σώμα αλλά το χρησιμοποιεί για να ενισχύσει τις αρθρώσεις και τους τένοντες της σπονδυλικής στήλης, τους χόνδρους σχήματος C και τόσο τα μικρά όσο και τα μεγάλα οστά.</p>
          <p><strong>Πρόληψη</strong></p>
          <p>Ακόμη και αν δεν έχετε σοβαρά προβλήματα, μπορεί να ενισχύσει το σώμα σας και να σας προμηθεύσει με θρεπτικά συστατικά.</p>

        </div>
    </div>
    <div id="sectionSix" class="section col-12 clearfix">
        <div class="container">
        <h1>Τα συστατικά του Arthro είναι φυσικά
        </h1>
            <div class="opinion">
                <img src="images/p1.png" alt="" class="pull-left">
                <h1>ΑΡΝΙΚΑ ΜΟΝΤΑΝΑ</h1>
                <p>Πλούσιο σε μαγγάνιο - απαραίτητο στοιχείο για υγιή οστά.</p>
            </div>
            <div class="opinion">
                <img src="images/p4.png" alt="" class="pull-left">
                <h1>ΚΑΣΤΟΡΕΛΑΙΟ</h1>
                <p>Ένα ισχυρό φάρμακο για τον πόνο των αρθρώσεων, το καστορέλαιο έχει χρησιμοποιηθεί ως φάρμακο φυσικής αρθρίτιδας για ηλικίες.</p>
            </div>
            <div class="opinion">
                <img src="images/p2.png" alt="" class="pull-left">
                <h1>LAVANDULA ANGUSTIFOLIA</h1>
                <p>Επαναφέρει και ενισχύει τις αρθρώσεις σε περιπτώσεις φλεγμονής (αρθρίτιδα) και εκφυλιστικών αλλαγών (αρθρώσεις).</p>
            </div>
            <div class="opinion">
                <img src="images/p3.png" alt="" class="pull-left">
                <h1>ΚΑΜΦΟΡΑ</h1>
                <p>Ανακουφίζει από τη φλεγμονή και τον πόνο αν εκδηλωθούν ασθένειες των αρθρώσεων, των χόνδρων και των τενόντων.</p>
            </div>
    </div>
    <div id="sectionEight" class="section col-12 clearfix">
        <div class="container">
        <h1>Πραγματικοί άνθρωποι - πραγματικά αποτελέσματα!
</h1>
            <div class="opinion">
                <img src="images/woman.jpg" alt="" class="pull-left">
                <h1>Angela Santosi</h1>
                <p class="title-story">ευτυχισμένη μητέρα δύο παιδιών</p>
                <br>
                <p class="white">
Αν και δεν είμαι απολύτως απαλλαγμένος από τον πόνο, θα ήθελα ακόμα να μοιραστώ τη θετική μου εμπειρία με την ArthroMed .. Έπρεπε να σταματήσω τη δουλειά μου εξαιτίας της προοδευτικής αρθρώσεως στις μικρές αρθρώσεις και την αρθρίτιδα. Έπρεπε να λαμβάνω ενέσεις τρεις φορές την ημέρα και έπαιρνα επίσης παυσίπονα. Είχα δοκιμάσει τόσες πολλές φαρμακευτικές αγωγές κατά τη διάρκεια αυτού του έτους της αγωνίας ότι είναι φρικτό ακόμη και να τις απαριθμήσω. Εκτός από τον τακτικό πόνο, η απόγνωση και η απελπισία αυξάνονταν. Δεν πίστευα ότι αυτό το κράτος θα τελείωσε ποτέ, γι 'αυτό αγόρασα την ArthroNEO, έχοντας εξετάσει τις απόψεις εκείνων που είχαν ήδη δοκιμάσει την αποτελεσματικότητά της ».</p>
            </div>
        </div>
    </div>
    <div id="sectionNine" class="section col-12 clearfix">
        <div class="container">
            <div class="use">
            </div>
            <div class="box">     
                <p class="bottom-right__text">
Η ΧΡΗΣΗ ΤΟΥ ARTHRONEO ΕΙΝΑΙ ΑΣΘΕΝΗ ΚΑΙ ΕΥΚΟΛΗ. ΜΟΛΙΣ:</p>
                <div class="check-ct">
                    <img src="images/check.jpg" alt="" class="pull-left check">
                    <h1>Ανακινήστε πριν από τη χρήση.</h1>
                </div>
                <div class="check-ct">
                    <img src="images/check.jpg" alt="" class="pull-left check">
                    <h1>Κρατήστε 15 cm μακριά από την προς επεξεργασία περιοχή και ψεκάστε 2-3 φορές.</h1>
                </div>
                <div class="check-ct">
                    <img src="images/check.jpg" alt="" class="pull-left check">
                    <h1>Πλύνετε τα χέρια μετά τη χρήση!</h1>
                </div>
                <div class="check-ct">
                    <img src="images/check.jpg" alt="" class="pull-left check">
                    <h1>Επαναλάβετε τρεις φορές την ημέρα!</h1>
                </div>

                <button class="rushOrder" onClick="document.getElementById('form-index').submit();" type="submit">Ελέγξτε τις τιμές
</button>
            </div>
        </div>
    </div>
        </div>
    <div class="clear"></div>
<footer>
    <p>ST. GERARDE LTD, PO Box 832, Orion Mall, Palm Street, Victoria, Mahé, Seychelles</p>
    <p><a href="/policy" target="_blank">πολιτική απορρήτου</a></p>      
</footer>




       
</body>
</html>