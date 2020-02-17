<?php
$api = [
    'key' => '912',
    'secret' => 'a9d4439bd2330fc973dbae0b67bea569',
    'flow_url' => 'https://leadrock.com/URL-7594E-2D90B'
];

function send_the_order($post, $api)
{
    $params = [
        'flow_url' => $api['flow_url'],
        'user_phone' => $post['phone'],
        'user_name' => $post['name'],
        'other' => $post['other'],
        'ip' => $_SERVER['REMOTE_ADDR'],
        'ua' => $_SERVER['HTTP_USER_AGENT'],
        'api_key' => $api['key'],
        'sub1' => $post['sub1'],
        'sub2' => $post['sub2'],
        'sub3' => $post['sub3'],
        'sub4' => $post['sub4'],
        'sub5' => $post['sub5'],
        'ajax' => 1,
    ];
    $url = 'https://leadrock.com/api/v2/lead/save';

    $trackUrl = $params['flow_url'] . (strpos($params['flow_url'], '?') === false ? '?' : '&') . http_build_query($params);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $trackUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    $params['track_id'] = curl_exec($ch);

    $params['sign'] = sha1(http_build_query($params) . $api['secret']);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
    curl_exec($ch);
    curl_close($ch);

    header('Location: ' . (empty($post['success_page']) ? '/confirm.html' : $post['success_page']));
}

if (!empty($_POST['phone'])) {
    send_the_order($_REQUEST, $api);
}

if (!empty($_GET)) {
?>
    <script type="text/javascript">
        window.onload = function() {
            let forms = document.getElementsByTagName("form");
            for(let i=0; i<form action="index.php" s.length; i++) {
                let form = forms[i];
                form.setAttribute('action', form.getAttribute('action') + "?<?php echo http_build_query($_GET)?>");
                form.setAttribute('method', 'post');
            }
        };
    </script>
<?php
}

?>
<!DOCTYPE html><html lang="en"><head>
    <meta charset="UTF-8">
    <title>ArthroMed</title>
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" type="text/css" href="css/TimeCircles.css">
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&subset=cyrillic" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&subset=cyrillic" rel="stylesheet">
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-W5J6FM9');</script>
</head>
<body>
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W5J6FM9" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<div class="main-wrap">
    <section class="block-1">
        <div class="wrap">
            <div>
                <div class="list-border">
                    <div class="pointer-wrap">
                        <h1>ArthroMed</h1>
                        <h3>ΚΟΙΝΉ ΚΡΈΜΑ<br><span></span></h3>
                        <ul>

                            <li>
                                <b>Εξαλείφει τη φλεγμονή</b>
                                πρήξιμο και ερυθρότητα
                            </li>
                            <li>
                                <b>Επαναφέρει την κινητικότητα</b>
                                αρθρώσεις σε 5-7 ημέρες
                            </li>

                         
                        </ul>
                        <img src="img/product-full.png">
                        <div class="price">
                            <div class="old-price">Παλιά τιμή<span>78 €</span></div>
                            <div class="sale">50%</div>
                            <div class="new-price">Τιμή μετοχών<span>39 €</span></div>
                        </div>
                        <a class="button" href="#order-form">Για παραγγελία</a>
                    </div>
                </div>
                <div class="timer_block">
                    <h4>Μέχρι το τέλος της ενέργειας:</h4>
                    <div class="timer"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="block-2">
        <div class="wrap">
            <h2><span>ArthroMed</span> ΛΎΝΕΙ ΤΑ ΠΕΡΙΣΣΌΤΕΡΑ ΚΟΙΝΆ ΠΡΟΒΛΉΜΑΤΑ</h2>
            <div class="note-block">
                <div class="string">
                    <div class="note-item">
                        <img src="img/note-item-1.png" width="100px">
                        <div>
                            <h4>ΣΕ ΠΕΡΊΠΤΩΣΗ ΦΛΕΓΜΟΝΉΣ Ή ΑΔΙΑΘΕΣΊΑΣ ΣΤΙΣ ΑΡΘΡΏΣΕΙΣ</h4>
                            <p>για την εξάλειψη του πόνου και την αποκατάσταση της λειτουργίας του κοινού</p></div>
                    </div>
                    <div class="note-item">
                        <img src="img/note-item-2.png" width="100px">
                        <div>
                            <h4>ΛΌΓΩ ΜΕΤΑΒΟΛΏΝ ΛΌΓΩ ΗΛΙΚΊΑΣ</h4>
                            <p>για τη θεραπεία των αρθρώσεων που έχουν υποστεί βλάβη από αλλαγές που σχετίζονται με την ηλικία</p></div>
                    </div>

                </div>
                <div class="string">
                    <div class="note-item">
                        <img src="img/note-item-3.png" width="100px">
                        <div>
                            <h4> ΣΕ ΠΕΡΊΠΤΩΣΗ ΚΟΙΝΟΎ ΤΡΑΥΜΑΤΙΣΜΟΎ</h4>
                            <p>για αποκατάσταση σε περίπτωση μηχανικής βλάβης ή τραυματισμών και διαστρέμματος</p></div>
                    </div>
                    <!--<div class="note-item">-->
                        <!--<img src="img/note-item-4.png" width="100px">-->
                        <!--<div>-->
                            <!--<h4>IN CASO DI ALIMENTAZIONE SCORRETTA E OBESITA’</h4>-->
                            <!--<p>in caso di danni, distrofia, o altri malesseri alle articolazioni</p></div>-->
                    <!--</div>-->
                    <div class="note-item">
                        <img src="img/note-item-5.png" width="100px">
                        <div>
                            <h4>σε περίπτωση υπερβολικού φορτίου στις αρθρώσεις</h4>
                            <p>για αθλητές οποιουδήποτε τύπου σε περίπτωση υπέρτασης</p></div>
                    </div>
                </div>
            </div>
    </div></section>
    <section class="block-3">
        <div class="wrap">
            <div>
                <h2><span>Ελαφρύς</span> δεν περνά από μόνη της!</h2>
                <p>Σε αντίθεση με πολλές άλλες ασθένειες (π.χ. κρυολογήματα), ο πόνος στις αρθρώσεις δεν μπορεί να ξεφύγει από μόνη της, αυτό σημαίνει
                    <span>ότι με την πάροδο του χρόνου ο πόνος θα επιδεινωθεί</span> προκαλώντας όλο και περισσότερη δυσφορία.
                    <br><br>
                    Εάν συνεχίσετε να καθυστερείτε τη θεραπεία, το πρόβλημα μπορεί να εξελιχθεί σε τέτοιο επίπεδο ώστε η συντηρητική θεραπεία να καταστεί άχρηστη.
                    <br><br>
                    <span>Στη συνέχεια θα πρέπει να χρησιμοποιήσετε για δαπανηρή χειρουργική επέμβαση.</span> Σε ορισμένες περιπτώσεις μπορεί να απαιτείται ακρωτηριασμός, γεγονός που οδηγεί σε αναπηρία.
                </p>
                <b>ΜΗΝ ΚΑΘΥΣΤΕΡΕΊΤΕ ΤΗ ΘΕΡΑΠΕΊΑ ΈΩΣ ΌΤΟΥ ΕΊΝΑΙ ΠΟΛΎ ΑΡΓΆ!</b>
            </div>
        </div>
    </section>
    <section class="block-4">
        <div class="wrap">
            <div class="note">
                <h2><span>ArthroMed</span> έγκυρη</h2>
                <div class="note-block">

                        <div class="note-item">
                            Δεν υπάρχουν λειτουργίες
                        </div>
                        <div class="note-item">
                            Δεν υπάρχει πόνος
                        </div>

                    <div class="note-item">
                        Καμία απώλεια χρημάτων
                    </div>
                    <div class="row">
                        <img src="img/action-1.png">
                        <img src="img/action-2.png">
                        <img src="img/action-3.png">
                    </div>
                </div>
                <a class="red-button" href="#order-form">
                    Ξεκινήστε την κοινή θεραπεία
                </a>
            </div>
        </div>
    </section>
    <section class="block-5">
        <div class="wrap">
            <div class="graph-block">
                <h2>Αποτελεσματικότητα <span>ArthroMed</span> επιβεβαιώθηκε <span>κλινικές δοκιμές</span></h2>
                <img src="img/graph.png">
                <p>Η αποτελεσματικότητα του ArthroMed για ασθένειες των αρθρώσεων</p>
            </div>
            <div class="note-block">
                <div class="note">
                    <div class="note-item">
                        <span>87%</span>
                        <p>Η ελαστικότητα των σπονδύλων αποκαθίσταται.</p>
                    </div>
                    <div class="note-item">
                        <span>94%</span>
                        <p>Υπήρχαν εμφανείς βελτιώσεις στις αρθρώσεις τις δύο πρώτες ημέρες.</p>
                    </div>
                    <div class="note-item">
                        <span>37%</span>
                        <p>Επιστρέφει στην ενεργό ζωή για 15 ημέρες</p>
                    </div>
                    <div class="note-item">
                        <span>79%</span>
                        <p>Δηλώθηκε: άλλοι<br> σημαίνει να δώσετε το αποτέλεσμα<br> αποτέλεσμα της οποίας </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="block-6">
        <div class="wrap">
            <h2><span><b>Arthro</b>Med</span> <br>
                περιέχει 100% φυσικά συστατικά</h2>
            <div class="row">
                <!--<div class="composition">-->
                <!--<div class="composition-item">-->
                <!--<h3>Экстракт хвоща полевого</h3>-->
                <!--<ul>-->
                <!--<li>Ускоряет регенеративные процессы</li>-->
                <!--<li>Нормализует обмен</li>-->
                <!--</ul>-->
                <!--</div>-->
                <!--<div class="composition-item">-->
                <!--<h3>девясил</h3>-->
                <!--<ul>-->
                <!--<li>Препятствует процессам-->
                <!--разрушения хрящевой ткани-->

                <!--</li>-->
                <!--<li>Подавляет-->
                <!--процесс воспаления-->
                <!--</li>-->
                <!--</ul>-->
                <!--</div>-->
                <!--<div class="composition-item">-->
                <!--<h3>чабрец</h3>-->
                <!--<ul>-->
                <!--<li>Выводит соли-->
                <!--</li>-->
                <!--<li>Обладает длительным-->
                <!--обезболивающим действием-->
                <!--</li>-->
                <!--</ul>-->
                <!--</div>-->
                <!--</div>-->

                <div class="composition composition-2">
                    <div class="composition-item">
                        <h3>Εκχύλισμα φύλλων από κανέλα</h3>
                        <ul>
                            <li>Αφαιρεί τον πόνο όταν μετακινείται και θεραπεύει τον χόνδρο</li>
                            <li>Ενεργοποιεί τη διαδικασία ταχείας αναγέννησης των ιστών των αρθρώσεων</li>
                        </ul>
                    </div>

                    <div class="composition-item">
                        <h3>Kάμφορα</h3>
                        <ul>
                            <li>Έχει αντιφλεγμονώδη δράση.
                            </li>
                            <li>Επηρεάζει το μεταβολισμό και εξαλείφει το οίδημα
                            </li>
                        </ul>
                    </div>
                    <div class="composition-item">
                        <h3>Εκχύλισμα σπόρου ηλίανθου</h3>
                        <ul>
                            <li>Ενυδατώνει τον χόνδρο και αποτρέπει τη βλάβη</li>
                            <li>Σταθεροποιεί και ενισχύει την εσωτερική δομή των αρθρώσεων.</li>
                        </ul>
                    </div>
                    <div class="composition-item">

                        <h3>Νομισματοκοπείο πιπερίνης</h3>
                        <ul>
                            <li>Χαλαρώνει ερεθισμένες περιοχές και ανακουφίζει από τον πόνο.</li>
                            <li>Αποκαθιστά τον χόνδρο των αρθρώσεων</li>
                        </ul>
                    </div>
                </div>
                <div class="product-block">
                    <div class="natural">100% φυσικό προϊόν</div>
                    <img class="product-bottle" src="img/product.png">
                    <!--<img class="product-pack" src="img/product-pack.png">-->
                </div>
            </div>
        </div>
    </section>
    <section class="block-7">
        <div class="wrap">
            <div>
                <h2>"Μπορείτε γρήγορα να απαλλαγείτε από πόνο στις αρθρώσεις και να επιστρέψετε γρήγορα σε μια υγιή ζωή»</h2>
                <div class="note-block">
                    <p>Το χειρότερο είναι ότι αυτά τα προβλήματα μπορούν να οδηγήσουν σε παράλυση ή αναπηρία. Επί του παρόντος υπάρχει μόνο ένα προϊόν που μπορεί να λύσει εντελώς αυτά τα προβλήματα.
                        <span>Αυτό είναι το ArthroMed για αρθρώσεις.</span>
                    </p>
                    <p>
                        Συμβουλεύω τους ασθενείς μου
                        <span>Το μοναδικό προϊόν του ArthroMed που έχει αποτέλεσμα 100%</span>
                        με ασθένειες των αρθρώσεων. Αυτό αποδεικνύεται από τη λήψη κλινικών δοκιμών
                        <span>Το ArthroMed αντιμετωπίζει τις αρθρώσεις σε μια θεραπεία.</span>

                    </p>
                </div>
                <img src="img/expert.png">
                <span>
            Μαρία Σπανίδη
            <br>
            καθηγητής πανεπιστημίου
        </span>
            </div>
        </div>
    </section>
    <section class="block-8">
        <div class="wrap">
            <!--<div>-->
            <!--<h2>СКАЖИ ПРИВЕТ-->
            <!--НОВОЙ ЖИЗНИ!</h2>-->
            <!--<h3>Новая разработка ученых эффективно-->
            <!--борется с заболеваниями суставов</h3>-->
            <!--<p>Открытие ученых из независимого института-->
            <!--в 2012 году стало прорывом в борьбе с артритом и другими заболеваниями суставов.-->
            <!--В лаборатории был создан 100% натуральный комплекс препаратов, который устраняет причины и-->
            <!--беспокоящие симптомы.</p>-->
            <!--</div>-->
            <!--<span></span>-->
            <div>
                <h2>μέθοδο εφαρμογής</h2>
                <ul>
                    <li>
                        <h4>Βήμα 1</h4>
                        <p>Πάρτε 5 γραμμάρια ArthroMed και μασάζ σιγά-σιγά την πληγείσα περιοχή για 5 λεπτά.
                        </p>
                    </li>
                    <li>
                        <h4>Βήμα 2</h4>
                        <p>Συνιστάται η χρήση του ArthroMed τουλάχιστον 4 φορές την ημέρα. Μην τοποθετείτε περισσότερα από 10 γραμμάρια σε κάθε σημείο.</p>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <section class="block-9">
        <div class="wrap">
            <h2>Κριτικές</h2>
            <div class="slider-wrap">
                <div class="">
                    <div class="slider-rev">
                        <div class="slide-block">
                            <img alt="" title="" src="img/rev2.png" width="286" height="286">
                            <div>
                                <p>Όταν ήμουν νέος, πήγα για αθλήματα και τα κοινά προβλήματα ήταν σχεδόν τακτικά.<br><br>

                                    Στη συνέχεια, η κατάσταση άρχισε να επιδεινώνεται με την ηλικία: το πρωί οι αρθρώσεις βλάπτουν. Με τη συμβουλή ενός φίλου, προσπάθησα την ArthroMed και είμαι πολύ ευχαριστημένος.<br><br>

                                    Η επίδραση, ωστόσο, δεν παρατηρήθηκε αμέσως, στην πρώτη κινητικότητα επέστρεψε, μετά από δύο εβδομάδες ο πόνος εξαφανίστηκε.<br><br>
                                </p>
                                <h3>Νικόλαος, 55 ετών</h3>
                            </div>
                        </div>
                        <div class="slide-block">
                            <img alt="" title="" src="img/rev1.png" width="286" height="286">
                            <div>
                                <p>Έχω οστεοχόνδρωση του λαιμού. <br><br>

                                    Χρησιμοποιώ το ArthroMed μόνο για 2 εβδομάδες και οι βελτιώσεις είναι ήδη αισθητές. Ο λαιμός πονάει λιγότερο, παύει να κάνει κλικ, και το κεφάλι δεν πονάει πια.<br><br>

                                    Εάν νωρίτερα δεν μπορούσα να ζήσω μια μέρα χωρίς παυσίπονα, τώρα μπορώ ασφαλώς να κάνω χωρίς τίποτα<br><br>

                                    Κάθε μέρα ο πόνος μειώνεται!<br><br>
                                </p>
                                <h3>Ιωάννης, 49 ετών</h3>
                            </div>
                        </div>
                        <div class="slide-block">
                            <img alt="" title="" src="img/rev3.png" width="286" height="286">
                            <div>
                                <p>Πρόσφατα αγόρασα αυτή την κρέμα για τη γιαγιά μου. <br><br>

                                    Έχει κοινά προβλήματα και είναι συχνά τόσο άσχημα για εκείνη που δεν μπορεί να βγει από το κρεβάτι, με την ArthroMed, αντίθετα, πολύ ήρεμα και ακόμα και αν έχει πόνο, μεταφέρει την κρέμα μαζί της και ο πόνος εγκατέλειψε αμέσως.<br><br>

                                    Είναι σαν μια έγχυση παυσίπονο από έναν οδοντίατρο, δεν αισθάνεστε τίποτα στην αρχή, τότε θα αρχίσετε να αισθάνεστε, αλλά δεν υπάρχει πια πόνος.<br><br>
                                </p>
                                <h3>Ελένη, 30 ετών</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="arrow-left1 slick-arrow" style="display: block;"></span>
                <span class="arrow-right1 slick-arrow" style="display: block;"></span>
            </div>
        </div>
    </section>
    <section class="block-1 bottom-block">
        <div class="wrap">
            <div>
                <div class="list-border">
                    <div class="pointer-wrap">
                        <h1>ArthroMed</h1>
                        <h3>Κρέμα για αρθρώσεις<br><span></span></h3>
                        <form action="index.php"  id="order-form"  method="post">
                            <label>Παράδειγμα: Γεώργιος Ιωαννίδης</label>
                            <input class="name" name="name" placeholder="εισάγετε το όνομα" required>
                            <label>Παράδειγμα: +30 21 38209623</label>
                            <input class="phone" name="phone" placeholder="εισάγετε τηλέφωνο" required>

                        <div class="price">
                            <div class="old-price">Παλιά τιμή<span>78 €</span></div>
                            <div class="sale">50%</div>
                            <div class="new-price">Τιμή μετοχών<span>39 €</span></div>
                        </div>
                        <button type="submit" class="button">Για παραγγελία</button><input type="hidden" name="sub1" value="{subid}">
</form>
                    </div>
                </div>
                <div class="timer_block">
                    <h4>Μέχρι το τέλος της ενέργειας:</h4>
                    <div class="timer"></div>
                </div>
            </div>
        </div>
    </section>
    <footer style="text-align: center;">
        <p>ST. GERARDE LTD, PO Box 832, Orion Mall, Palm Street, Victoria, Mahé, Seychelles</p>
        <p><a href="policy_en.html" target="_blank">Πολιτική απορρήτου</a></p>
    </footer>


</div>

<script src="js/jquery.js"></script>
<script src="js/TimeCircles.js"></script>
<script src="js/timer.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/scripts.js"></script>



<div class="callback-btn">
    <img src="img/i-phone.png">
</div>
<div class="callback-form hide">
    <form action="index.php"  class="callbackForm lead_form"  method="post">
        <label for="">Παράδειγμα: Γεώργιος Ιωαννίδης</label>
        <input name="name" class="flow-form-input name" type="text" placeholder="εισάγετε το όνομα" required>
        <label for="">Παράδειγμα: +30 21 38209623</label>
        <input class="flow-form-input phone" type="text" name="phone" placeholder="εισάγετε τηλέφωνο" required>
        <button type="submit" class="orange-btn">
            Για παραγγελία

        </button>
    <input type="hidden" name="sub1" value="{subid}">
</form>
    <img src="img/i-cross.svg" width="16px">
</div>


<style>
    .callback-btn {
        background-color: #394a54 !important;
    }

    .callback-form {
        background: #394a54 !important;
    }

    .callback-form form input {
        height: 40px !important;
        border-radius: 30px !important;
        border: 1px dashed #577686 !important;
        margin: 10px 5% !important;
        padding: 15px !important;
        font-size: 22px !important;
        outline: none !important;
        width: 89% !important;
    }

    .callback-form form input.flow-form-input {
        margin: 10px 0 !important;
    }

    .orange-btn {
        display: block !important;
        background: url(img/button.png) 0 5px no-repeat !important;
        width: 100% !important;
        height: 85px !important;
        vertical-align: middle !important;
        margin: 10px auto !important;
        text-align: center !important;
        font-size: 21px !important;
        text-decoration: none !important;
        text-transform: uppercase !important;
        font-family: 'PT Sans', sans-serif !important;
        font-weight: bold !important;
        color: #4d6608 !important;
        cursor: pointer !important;
        border: none !important;
        box-shadow: none !important;
        background-size: 100% 100% !important;
        padding: 0 !important;
    }

    .callback__text{
        color: #fff !important;
    }
</style>


<script type="text/javascript" src="https://cdn.ldrock.com/validator.js"></script>
<script type="text/javascript">
    LeadrockValidator.init({
        geo: {
            iso_code: 'GR'
        }
    });
</script>
</body></html>