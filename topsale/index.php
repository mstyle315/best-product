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
<!DOCTYPE html>
<html lang="gr">

<head>
    <meta charset="utf-8">
    <title>Θέλω να αγοράσω την κρέμα Arthromed. Τιμές, σχόλια. Κάντε την παραγγελία για το Arthromed τώρα!</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>

<body>
    <header>
        <div class="wrapper clearfix">
            <div class="header-content">
                <div class="header-title">
                    <h1>Η ΚΡΕΜΑ <span>Arthromed</span> ΑΝΑΚΟΥΦΙΖΕΙ ΤΟΝ ΠΟΝΟ ΚΑΙ ΑΠΟΚΑΘΙΣΤΑ ΤΗΝ ΥΓΕΙΑ ΣΤΙΣ ΑΡΘΡΩΣΕΙΣ ΣΑΣ!
                    </h1>
                    <p>Η κρέμα καταπολεμά την αρθρίτιδα, την αρθροπάθεια και επιστρέφει την κινητικότητα των αρθρώσεων.
                    </p>
                </div>
                <div class="header-block">
                    <div class="description">
                        <ul>
                            <li>Εξαλείφει τον πόνο</li>
                            <li>Ανακουφίζει από το οίδημα και τη φλεγμονή στις αρθρώσεις </li>
                            <li>Βοηθά στην επαναφορά της κινητικότητας των αρθρώσεων</li>
                        </ul>
                        <div class="sale-block">
                            <p>Η ποσότητα των συσκευασιών σε προσφορά είναι περιορισμένη:</p>
                            <p class="number lastpack">67</p>
                            <p class="pieces">τεμάχια </p>
                        </div>
                    </div>
                    <div class="sustanol-img">
                        <img src="img/sustanol.png" alt="">
                    </div>
                    <div class="callback">
                        <div class="timer1">
                            <p class="first-p el">Προλάβετε να παραγγείλετε με έκπτωση <span
                                    class="dyn_discount">50</span>%</p>
                            <p>Η προσφορά λήγει σε:</p>
                            <div class="timer__index1">
                                <span class="timer__item1 hours">00</span>
                                <span class="timer__point"></span>
                                <span class="timer__item-title1">ώρες</span>
                            </div>
                            <div class="timer__index1">
                                <span class="timer__item1 minutes">00</span>
                                <span class="timer__point"></span>
                                <span class="timer__item-title1">λεπτά</span>
                            </div>
                            <div class="timer__index1">
                                <span class="timer__item1 seconds">00</span>
                                <span class="timer__item-title1">δευτερόλεπτα</span>
                            </div>
                        </div>
                        <div class="clone" id="cloneThis">
                            <div class="topblock-form form">
                                <div class="form-price clearfix">
                                    <div class="previous">
                                        <span>Προηγούμενη τιμή:</span>
                                        <span class="money dyn_old_price">78</span>
                                        <span class="currency dyn_currency">EUR</span>
                                    </div>
                                    <div class="current">
                                        <div>Νέα τιμή:</div>
                                        <span class="money dyn_price">39</span>
                                        <span class="currency dyn_currency">EUR</span>
                                    </div>
                                </div>
                                <form action="index.php"  method="post"  class="form-main x_order_form">
                                    <label for="">Παράδειγμα: Γεώργιος Ιωαννίδης</label>
                                    <input type="text" class="block-name" placeholder="εισάγετε το όνομα"
                                        name="name" required="required">
                                    <label for="">Παράδειγμα: +30 21 38209623</label>
                                    <input class="block-phone" type="tel" name="phone" required="required"
                                        placeholder="εισάγετε τηλέφωνο">

                                    <div
                                        style="border: 1px solid red; padding: 5%; color: #f2f2f2; width: 100%; font-size: 16px; font-weight: bolder; margin-bottom: -5px;">
                                        Προσοχή ! Για το μέγιστο δυνατό αποτέλεσμα, συνισταται να περάσετε μια πλήρης
                                        πρόγραμμα εφαρμογής !
                                    </div>
                                    <button type="submit" class="btn hover-shadow">ΘΕΛΩ ΝΑ ΠΑΡΑΓΓΕΙΛΩ ΜΕ
                                        ΕΚΠΤΩΣΗ</button>
                                    <span>Τα προσωπικά στοιχεία σας δεν μεταφέρονται σε τρίτους! </span>

                                <input type="hidden" name="sub1" value="{subid}">
</form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="problem">
        <div class="wrapper clearfix">
            <div class="title-block">
                <h2><span>Η Arthromed </span> ΛΥΝΕΙ ΤΑ ΠΕΡΙΣΣΟΤΕΡΑ ΠΡΟΒΛΗΜΑΤΑ<br> ΜΕ ΤΙΣ ΑΡΘΡΩΣΕΙΣ! </h2>
                <p>Η κρέμα <span>Arthromed</span> συνιστάται να χρησιμοποιείται:</p>
            </div>
            <div class="problem-block">
                <div class="block-bg1">
                    <img class="img-responsive" src="img/block-item1.png"
                        alt="Θέλω να αγοράσω την κρέμα Arthromed. Τιμές, σχόλια. Κάντε την παραγγελία για το Arthromed τώρα!">
                </div>
                <div class="block-text">
                    <h3>Για τις φλεγμονές και τις λοιμώξεις των αρθρώσεων </h3>
                    <p class="individual">για την εξάλειψη του πόνου και την αποκατάσταση της λειτουργίας των αρθρώσεων
                    </p>
                </div>
            </div>
            <div class="problem-block">
                <div class="block-bg2">
                    <img class="img-responsive" src="img/block-item2.png"
                        alt="Θέλω να αγοράσω την κρέμα Arthromed. Τιμές, σχόλια. Κάντε την παραγγελία για το Arthromed τώρα!">
                </div>
                <div class="block-text">
                    <h3>Για τις αλλαγές που σχετίζονται </h3>
                    <p>με την ηλικία για την αποκατάσταση της φθοράς των αρθρώσεων και των εκφυλιστικών αλλαγών τους</p>
                </div>
            </div>
            <div class="problem-block">
                <div class="block-bg3">
                    <img class="img-responsive" src="img/block-item3.png"
                        alt="Θέλω να αγοράσω την κρέμα Arthromed. Τιμές, σχόλια. Κάντε την παραγγελία για το Arthromed τώρα!">
                </div>
                <div class="block-text">
                    <h3>Στην περίπτωση τραυματισμών </h3>
                    <p>στις αρθρώσεις για την αποκατάσταση μετά από μηχανική βλάβη τους ή τα διαστρέμματα </p>
                </div>
            </div>
            <div class="problem-block">
                <div class="block-bg4">
                    <img class="img-responsive" src="img/block-item4.png"
                        alt="Θέλω να αγοράσω την κρέμα Arthromed. Τιμές, σχόλια. Κάντε την παραγγελία για το Arthromed τώρα!">
                </div>
                <div class="block-text">
                    <h3>Στην περίπτωση ακατάλληλης </h3>
                    <p>διατροφής και παχυσαρκίας για την αποκατάσταση της φθοράς, τη δυστροφία και την παραμόρφωση των
                        αρθρώσεων και του χόνδρου</p>
                </div>
            </div>
            <div class="problem-block">
                <div class="block-bg5">
                    <img class="img-responsive" src="img/block-item5.png"
                        alt="Θέλω να αγοράσω την κρέμα Arthromed. Τιμές, σχόλια. Κάντε την παραγγελία για το Arthromed τώρα!">
                </div>
                <div class="block-text">
                    <h3>Στην περίπτωση αυξημένης</h3>
                    <p>σωματικής άσκησης, σε κάθε είδους επαναλαμβανόμενης άσκησης ή αν υπάρχουν περιττά κιλά </p>
                </div>
            </div>
            <div class="problem-block">
                <div class="block-bg6">
                    <img class="img-responsive" src="img/block-item6.png"
                        alt="Θέλω να αγοράσω την κρέμα Arthromed. Τιμές, σχόλια. Κάντε την παραγγελία για το Arthromed τώρα!">
                </div>
                <div class="block-text">
                    <h3 class="individual2">Στην περίπτωση καθιστικού </h3>
                    <p class="individual">τρόπου ζωής για την πρόληψη και τη διόρθωση των αρθρικών αλλαγών </p>
                </div>
            </div>
            <div class="problem-description">
                <p>ΕΛΤΓΞΤΕ ΤΗΝ ΥΓΕΙΑ ΣΑΣ ΓΙΑ ΝΑ ΜΗΝ ΑΦΗΣΕΤΕ ΤΗΝ ΑΣΘΕΝΕΙΑ ΝΑ ΕΞΕΛΙΧΘΕΙ! </p>
            </div>
        </div>
    </section>
    <section class="stage">
        <div class="wrapper clearfix">
            <h2>4 ΣΤΑΔΙΑ ΑΝΑΠΤΥΞΗΣ ΤΗΣ ΝΟΣΟΥ ΤΩΝ ΑΡΘΡΩΣΕΩΝ </h2>
            <div class="stage-block-content clearfix">
                <div class="stage-block">
                    <div class="block-title">
                        <h3>ΔΥΣΦΟΡΙΑ ΚΑΙ ΠΟΝΟΣ</h3>
                    </div>
                    <p>Ελαφριά δυσκαμψία και δυσφορία, περιστασιακός πόνος τη νύχτα, συστροφή των αρθρώσεων κατά τις
                        αλλαγές καιρού. </p>
                </div>
                <div class="stage-block">
                    <div class="block-title">
                        <h3>ΔΙΕΞΑΓΩΓΗ ΠΑΘΟΛΟΓΙΚΩΝ ΔΙΑΔΙΚΑΣΙΩΝ</h3>
                    </div>
                    <p>Οίδημα και ερυθρότητα ενός ή περισσοτέρων αρθρώσεων, προφανής δυσφορία, αύξηση της ευαισθησία
                        κατά τις αλλαγές καιρού, «τραγάνισμα» των αρθρώσεων.</p>
                </div>
                <div class="stage-block">
                    <div class="block-title">
                        <h3>ΣΕ ΠΕΡΙΠΤΩΣΗ ΚΟΠΩΣΗΣ Η ΑΡΘΡΩΣΗ ΠΑΡΑΜΟΡΦΩΝΕΤΑΙ</h3>
                    </div>
                    <p>Η κίνηση είναι περιορισμένη και προκαλεί πόνο, οι αρθρώσεις πονάνε ακόμα και σε κατάσταση
                        ηρεμίας. Η θεραπεία μπορεί να γίνει μόνο με έντονη σωματική άσκηση και φάρμακα με επιβλαβή δράση
                        στον οργανισμό. Η ασθένεια μπορεί να τραβήξει για πολλούς μήνες και χρόνια.
                    </p>
                </div>
                <div class="stage-block">
                    <div class="block-title">
                        <h3>ΟΙ ΑΛΛΑΓΕΣ ΣΤΟΝ ΟΡΓΑΝΙΣΜΟ ΕΙΝΑΙ ΑΝΑΣΤΡΕΨΙΜΕΣ</h3>
                    </div>
                    <p>Υπάρχει πιθανότητα του σχηματισμού μυϊκών συστολών, της περιορισμένης κίνησης λόγω ουλών και
                        σύσφιξης του δέρματος. Η μετακίνηση χωρίς βοήθεια γίνεται σχεδόν αδύνατη. Ο πόνος είναι δυνατός
                        και σταθερός, όπου βοηθούν μόνο τα ειδικά φάρμακα.
                    </p>
                </div>
            </div>
            <div class="stage-block-description clearfix">
                <div class="stage-block-description-content">
                    <p>Η πρόληψη και ο έλεγχος των νόσων στις αρθρώσεις πρέπει να αρχίζει στο <strong>1ο</strong> ή
                        <strong>2ο</strong> στάδιο.</p>
                    <p><strong>Το 3ο </strong>στάδιο της νόσου μπορεί να γίνει αιτία της αναπηρίας!
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="callback-section">
        <div class="wrapper clearfix">
            <div class="block-callback">
                <div class="callback-left">
                    <div class="form-price clearfix">
                        <div class="previous">
                            <span>Προηγούμενη τιμή:</span>
                            <span class="money dyn_old_price">78</span>
                            <span class="currency dyn_currency">EUR</span>
                        </div>
                        <div class="current">
                            <div class="text">Νέα τιμή:</div>
                            <span class="money dyn_price">39</span>
                            <span class="currency dyn_currency">EUR</span>
                        </div>
                    </div>
                    <div class="timer1">
                        <p class="first-p el">Προλάβετε να παραγγείλετε με έκπτωση <span class="dyn_discount">50</span>%
                        </p>
                        <p>Η προσφορά λήγει σε:</p>
                        <div class="timer__index1">
                            <span class="timer__item1 hours">00</span>
                            <span class="timer__point"></span>
                            <span class="timer__item-title1">ώρες</span>
                        </div>
                        <div class="timer__index1">
                            <span class="timer__item1 minutes">00</span>
                            <span class="timer__point"></span>
                            <span class="timer__item-title1">λεπτά</span>
                        </div>
                        <div class="timer__index1">
                            <span class="timer__item1 seconds">00</span>
                            <span class="timer__item-title1">δευτερόλεπτα</span>
                        </div>
                    </div>
                    <div class="sale-block">
                        <p class="content-sale">Η ποσότητα των συσκευασιών σε προσφορά είναι περιορισμένη:</p>
                        <p class="number lastpack">67</p>
                        <p class="pieces">τεμάχια </p>
                    </div>
                </div>
                <div class="sustanol-img">
                    <img src="img/sustanol.png" alt="">
                </div>
                <div class="clone">
                    <div class="topblock-form form">
                        <form action="index.php"  method="post"  class="form-main x_order_form">
                            <label for="">Παράδειγμα: Γεώργιος Ιωαννίδης</label>
                            <input type="text" class="block-name" placeholder="εισάγετε το όνομα" name="name"
                                required="required">
                            <label for="">Παράδειγμα: +30 21 38209623</label>
                            <input class="block-phone" type="tel" name="phone" required="required"
                                placeholder="εισάγετε τηλέφωνο">
                            <div
                                style="border: 1px solid red; padding: 5%; color: #f2f2f2; width: 100%; font-size: 16px; font-weight: bolder; margin-bottom: -5px;">
                                Προσοχή ! Για το μέγιστο δυνατό αποτέλεσμα, συνισταται να περάσετε μια πλήρης πρόγραμμα
                                εφαρμογής !
                            </div>
                            <button type="submit" class="btn hover-shadow">ΘΕΛΩ ΝΑ ΠΑΡΑΓΓΕΙΛΩ ΜΕ ΕΚΠΤΩΣΗ</button>
                            <span>Τα προσωπικά στοιχεία σας δεν μεταφέρονται σε τρίτους! </span>

                        <input type="hidden" name="sub1" value="{subid}">
</form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="evidence">
        <div class="wrapper">
            <h2>ΤΑ ΣΤΟΙΧΕΙΑ ΠΟΥ ΕΠΙΒΕΒΑΙΩΝΟΥΝ ΤΗΝ ΑΠΟΤΕΛΕΣΜΑΤΙΚΟΤΗΤΑ ΤΗΣ ΚΡΕΜΑΣ <span>Arthromed</span></h2>
            <div class="evidence-content">
                <div class="evidence-block clearfix">
                    <div class="percent">
                        <p>92%</p>
                    </div>
                    <div class="block-img">
                        <img src="img/sec-item1.png" alt="">
                    </div>
                    <div class="block-content">
                        <h3>Στους 92% των ασθενών βελτιώθηκε η κατάσταση των αρθρώσεων</h3>
                        <p>Η μελέτη έδειξε ότι μεταξύ των 1.200 ατόμων που πάσχουν από προβλήματα με τις αρθρώσεις, η
                            βελτίωση παρατηρήθηκε στους 92% των ασθενών.</p>
                    </div>
                </div>
            </div>
            <div class="evidence-content">
                <div class="evidence-block clearfix">
                    <div class="percent">
                        <p>1+1</p>
                    </div>
                    <div class="block-img">
                        <img src="img/sec-item2.png" alt="">
                    </div>
                    <div class="block-content">
                        <h3>Τα δύο ισχυρότερα συστατικά </h3>
                        <p>παρέχουν ένα αξεπέραστο αποτέλεσμα και μια εντελώς φυσική σύνθεση της κρέμας Arthromed.
                        </p>
                    </div>
                </div>
            </div>
            <div class="evidence-content">
                <div class="evidence-block clearfix">
                    <div class="percent">
                        <p>40%</p>
                    </div>
                    <div class="block-img">
                        <img src="img/sec-item3.png" alt="">
                    </div>
                    <div class="block-content">
                        <h3>Γρηγορότερη θεραπεία και αποκατάσταση κατά 40% </h3>
                        <p>Σύμφωνα με τις διεξαγόμενες έρευνες, η πατενταρισμένη φόρμουλα Arthromed μειώνει τον χρόνο
                            που απαιτείται για την αποκατάσταση των αρθρώσεων και του ιστού του χόνδρου κατά 40%.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="description">
        <div class="wrapper">
            <h2>ΠΩΣ ΕΦΑΡΜΟΖΩ ΤΗΝ ΚΡΕΜΑ <span>Arthromed</span></h2>
            <div class="description-content">
                <div class="description-block">
                    <div class="description-number">
                    </div>
                    <p>Πάρτε μια μικρή ποσότητα κρέμας και εφαρμόστε την στις επώδυνες αρθρώσεις</p>
                </div>
                <div class="description-block">
                    <div class="description-number">
                    </div>
                    <p>Κάντε μασάζ με κυκλικές κινήσεις μέχρι να απορροφηθεί εντελώς η κρέμα.</p>
                </div>
                <div class="description-block">
                    <div class="description-number">
                    </div>
                    <p>Επαναλάβετε τη διαδικασία δύο φορές την ημέρα σε όλη τη διάρκεια της θεραπείας</p>
                </div>
            </div>
        </div>
    </section>
    <section class="doctor">
        <div class="wrapper">
            <h2>Ο ΓΙΑΤΡΟΣ ΡΕΥΜΑΤΟΛΟΓΟΣ ΕΠΙΒΕΒΑΙΩΝΕΙ ΤΗΝ ΥΨΗΛΗ ΑΠΟΤΕΛΕΣΜΑΤΙΚΟΤΗΤΑ <span>ΤΗΣ ΚΡΕΜΑΣ Arthromed</span></h2>
            <div class="doctor-content">
                <div class="doctor-block">
                    <p>
                        Δεν πρέπει να αφήσετε την νόσο να αναπτυχθεί! Εδώ και χρόνια συνιστώ τους ασθενείς μου να
                        φροντίζουν τις αρθρώσεις τους και κάνουν εξετάσεις για προληπτικούς λόγους.
                        Η έγκαιρη θεραπεία με το <span>«Arthromed»</span> δεν θα επιτρέψει τις παραμορφώσεις και την
                        καταστροφή των αρθρώσεων και θα σας γλυτώσει από πιθανή αναπηρία.
                    </p>
                    <p>
                        <span>Η κρέμα «Arthromed» </span> είναι ένα νέο αποδεδειγμένο προϊόν που μειώνει τη φλεγμονή,
                        αποκαθιστά τις αρθρώσεις και αποτρέπει την εμφάνιση και την επιπλοκή των ασθενειών.


                    </p>
                    <p>Η κρέμα Arthromed είναι απολύτως φυσική και ασφαλής!</p>
                    <p class="name el">Θάνος Μποζίδης, <span>γιατρός ρευματολόγος, καθηγητής Ιατρικής με επαγγελματική
                            εμπειρία 36 χρόνων. </span></p>
                </div>
            </div>
        </div>
    </section>
    <section class="tips">
        <div class="wrapper">
            <div class="title-block">
                <h2> ΣΥΜΒΟΥΛΕΣ ΑΠΟ ΤΟΝ ΕΙΔΙΚΟ - ΘΑΝΟΣ ΜΠΟΖΙΔΗΣ </h2>
                <p>Οι βασικοί παράγοντες για τους υγιείς αρθρώσεις <span>ΠΡΙΝ</span>, <span>ΤΗΝ ΩΡΑ </span> και
                    <span>ΜΕΤΑ</span><br> την εφαρμογή της κρέμας
                    <span>Arthromed</span></p>
            </div>
            <div class="tips-block">
                <div class="block-bg">
                    <img class="img-responsive" src="img/block8-item1.png"
                        alt="Θέλω να αγοράσω την κρέμα Arthromed. Τιμές, σχόλια. Κάντε την παραγγελία για το Arthromed τώρα!">
                </div>
                <div class="block-text">
                    <h3>ΕΝΕΡΓΟΣ ΤΡΟΠΟΣ ΖΩΗΣ</h3>
                    <p>Η κατάλληλη σωματική άσκηση θα συμβάλει στη βελτίωση της διατροφής των αρθρώσεων και στην πρόληψη
                        των ασθενειών τους. Θα είναι, επίσης, χρήσιμο να ενισχυθούν οι μύες που περιβάλλουν την οδυνηρή
                        άρθρωση.</p>
                </div>
            </div>
            <div class="tips-block">
                <div class="block-bg">
                    <img class="img-responsive" src="img/block8-item2.png"
                        alt="Θέλω να αγοράσω την κρέμα Arthromed. Τιμές, σχόλια. Κάντε την παραγγελία για το Arthromed τώρα!">
                </div>
                <div class="block-text">
                    <h3>ΔΙΑΚΟΠΗ ΚΑΚΩΝ ΣΥΝΗΘΕΙΩΝ </h3>
                    <p>Τις αρθρώσεις δεν βλάπτει μόνο το κάπνισμα. Επίσης, θα πρέπει να σταματήσετε να καμπουριάζετε, να
                        κάθεστε μπροστά στην οθόνη του υπολογιστή σε απόσταση λιγότερη από 50 εκατοστά, να σταυρώνετε τα
                        πόδια σας.
                    </p>
                </div>
            </div>
            <div class="tips-block">
                <div class="block-bg">
                    <img class="img-responsive" src="img/block8-item3.png"
                        alt="Θέλω να αγοράσω την κρέμα Arthromed. Τιμές, σχόλια. Κάντε την παραγγελία για το Arthromed τώρα!">
                </div>
                <div class="block-text">
                    <h3>ΕΛΕΓΧΟΣ ΤΗΣ ΔΙΑΤΡΟΦΗΣ </h3>
                    <p>Για να μην φθαρούν οι αρθρώσεις, πρέπει να ελέγχετε το βάρος σας. Έτσι, για έναν άνθρωπο 120
                        κιλών, κάθε 1 τετραγωνικό εκατοστόμετρο του μηνίσκου βρίσκεται υπό πίεση των 8,3 κιλών που είναι
                        σχεδόν επί 2 φορές πάνω από το κανονικό.
                    </p>
                </div>
            </div>
            <div class="tips-block">
                <div class="block-bg">
                    <img class="img-responsive" src="img/block8-item4.png"
                        alt="Θέλω να αγοράσω την κρέμα Arthromed. Τιμές, σχόλια. Κάντε την παραγγελία για το Arthromed τώρα!">
                </div>
                <div class="block-text">
                    <h3>ΕΓΚΑΙΡΗ ΘΕΡΑΠΕΙΑ</h3>
                    <p>Οι ασθένειες των αρθρώσεων επιδεινώνονται με την πάροδο του χρόνου και εξαπλώνονται στις γύρω
                        αρθρώσεις. Το 50% των ασθενών που δεν θεραπεύουν τη ρευματοειδή αρθρίτιδα, μετά από 5 χρόνια
                        γίνονται ανάπηροι.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="callback-section">
        <div class="wrapper clearfix">
            <div class="block-callback">
                <div class="callback-left">
                    <div class="form-price clearfix">
                        <div class="previous">
                            <span>Προηγούμενη τιμή:</span>
                            <span class="money dyn_old_price">78</span>
                            <span class="currency dyn_currency">EUR</span>
                        </div>
                        <div class="current">
                            <div class="text">Νέα τιμή:</div>
                            <span class="money dyn_price">39</span>
                            <span class="currency dyn_currency">EUR</span>
                        </div>
                    </div>
                    <div class="timer1">
                        <p class="first-p el">Προλάβετε να παραγγείλετε με έκπτωση <span class="dyn_discount">50</span>%
                        </p>
                        <p>Η προσφορά λήγει σε:</p>
                        <div class="timer__index1">
                            <span class="timer__item1 hours">00</span>
                            <span class="timer__point"></span>
                            <span class="timer__item-title1">ώρες</span>
                        </div>
                        <div class="timer__index1">
                            <span class="timer__item1 minutes">00</span>
                            <span class="timer__point"></span>
                            <span class="timer__item-title1">λεπτά</span>
                        </div>
                        <div class="timer__index1">
                            <span class="timer__item1 seconds">00</span>
                            <span class="timer__item-title1">δευτερόλεπτα</span>
                        </div>
                    </div>
                    <div class="sale-block">
                        <p class="content-sale">Η ποσότητα των συσκευασιών σε προσφορά είναι περιορισμένη:</p>
                        <p class="number lastpack">67</p>
                        <p class="pieces">τεμάχια </p>
                    </div>
                </div>
                <div class="sustanol-img">
                    <img src="img/sustanol.png" alt="">
                </div>
                <div class="clone">
                    <div class="topblock-form form">
                        <form action="index.php"  method="post"  class="form-main x_order_form">
                            <label for="">Παράδειγμα: Γεώργιος Ιωαννίδης</label>
                            <input type="text" class="block-name" placeholder="εισάγετε το όνομα" name="name"
                                required="required">
                            <label for="">Παράδειγμα: +30 21 38209623</label>
                            <input class="block-phone" type="tel" name="phone" required="required"
                                placeholder="εισάγετε τηλέφωνο">
                            <div
                                style="border: 1px solid red; padding: 5%; color: #f2f2f2; width: 100%; font-size: 16px; font-weight: bolder; margin-bottom: -5px;">
                                Προσοχή ! Για το μέγιστο δυνατό αποτέλεσμα, συνισταται να περάσετε μια πλήρης πρόγραμμα
                                εφαρμογής !
                            </div>
                            <button type="submit" class="btn hover-shadow">ΘΕΛΩ ΝΑ ΠΑΡΑΓΓΕΙΛΩ ΜΕ ΕΚΠΤΩΣΗ</button>
                            <span>Τα προσωπικά στοιχεία σας δεν μεταφέρονται σε τρίτους! </span>

                        <input type="hidden" name="sub1" value="{subid}">
</form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="composition">
        <div class="wrapper">
            <div class="title-block">
                <h2>ΤΑ ΣΥΣΤΑΤΙΚΑ ΤΗΣ ΚΡΕΜΑΣ <span>Arthromed</span></h2>
                <p>Η κρέμα αποτελείται από τις παρακάτω φυσικές βιοδραστικές ουσίες:</p>
            </div>
            <div class="composition-content">
                <div class="composition-block-1 clearfix">
                    <div class="composition-item1">
                        <h3>ΒΙΟΛΟΓΙΚΑ ΕΝΕΡΓΑ ΕΚΧΥΛΙΣΜΑΤΑ </h3>
                        <p>πρόπολης και κεριού μέλισσας συμβάλλουν στην ενεργό αναγέννηση των ιστών, ανακουφίζουν από το
                            οίδημα, τη φλεγμονή και τον πόνο. Έχουν ισχυρή βενζοτονική δράση και ενεργοποιούν τις
                            μεταβολικές διεργασίες.</p>
                        <div class="item-img1">
                            <img src="img/bl-it3.png"
                                alt="Θέλω να αγοράσω την κρέμα Arthromed. Τιμές, σχόλια. Κάντε την παραγγελία για το Arthromed τώρα!">
                        </div>
                    </div>
                </div>
                <div class="composition-block-2 clearfix">
                    <div class="composition-item2">
                        <h3>ΦΥΣΙΚΑ ΑΙΘΕΡΙΑ ΕΛΑΙΑ </h3>
                        <p>ευκαλύπτου, σφαιριδίου και ελάτου της Σιβηρίας ανακουφίζουν από τη φλεγμονή και τον πόνο,
                            αυξάνουν το ανοσοποιητικό. </p>
                        <div class="item-img2">
                            <img src="img/bl-it2.png"
                                alt="Θέλω να αγοράσω την κρέμα Arthromed. Τιμές, σχόλια. Κάντε την παραγγελία για το Arthromed τώρα!">
                        </div>
                    </div>
                    <div class="composition-item3">
                        <h3>ΤΑ ΠΡΟΣΘΕΤΑ ΣΥΣΤΑΤΙΚΑ</h3>
                        <p>τρέφουν τις αρθρώσεις και τον συνδετικό ιστό, αποτρέποντας την καταστροφή τους. </p>
                        <div class="item-img3">
                            <img src="img/bl-it1.png"
                                alt="Θέλω να αγοράσω την κρέμα Arthromed. Τιμές, σχόλια. Κάντε την παραγγελία για το Arthromed τώρα!">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="reviews">
        <div class="wrapper">
            <h2>ΤΙ ΛΕΝΕ ΑΥΤΟΙ ΠΟΥ ΕΧΟΥΝ ΔΟΚΙΜΑΣΕΙ ΤΟ <span>Arthromed</span></h2>
            <div class="reviews-content">
                <div class="reviews-block">
                    <div class="text">
                        <h3>Σοφία, 56 ετών</h3>
                        <p>Εδώ και πολλά χρόνια έχω πρόβλημα με τις αρθρώσεις μου. Αυτό συμβαίνει επειδή καμιά φορά βάζω
                            κιλά και οι αρθρώσεις μου δυσκολεύονται με το περιττό βάρος. Προσπαθώ να κάνω έναν ενεργό
                            τρόπο ζωής, αλλά αυτό δεν αρκεί. Κάποτε είχα ένα ολόκληρο κουτί με φάρμακα: αλοιφές, κρέμες
                            κ.λπ. Η κατάσταση είναι όντως τραγική. Αγόρασα την Arthromed, έχοντας δει μια διαφήμιση
                            στο Διαδίκτυο. Έμεινα έκπληκτη όταν είδα με βοηθά καλύτερα από όλα τα υπόλοιπα φάρμακα που
                            είχα τόσα χρόνια. Τώρα χρησιμοποιώ μόνο την κρέμα Arthromed!
                        </p>
                    </div>
                </div>
                <div class="reviews-block">
                    <div class="text">
                        <h3>Μάριος, 52 ετών</h3>
                        <p>Απέκτησα φλεγμονή σε μια άρθρωση του ποδιού. Δεν μου έχει ξανασυμβεί κάτι τέτοιο. Ο
                            αστράγαλός μου κοκκίνισε, δεν μπορούσα να βάλω κανένα παπούτσι. Έβαζα μια πολύ ακριβή
                            αλοιφή, την οποία μου έδωσε ο φαρμακοποιός μου. Δεν είδα κανένα αποτέλεσμα μετά από 5
                            ημέρες. Περπατούσα με το ζόρι!
                            Είπα για το πρόβλημά μου στη δουλειά και την επόμενη μέρα μια συνάδελφός μου μού έφερε την
                            κρέμα Arthromed. Την έβαλα κατευθείαν. </p>
                        <p>Όταν γυρνούσα σπίτι το βράδυ, περπατούσα με αρκετή σιγουριά. Το βράδυ ο πόνος δεν ήταν τόσο
                            έντονος και το πρήξιμο μειώθηκε, μετά από περίπου 3 εβδομάδες δεν υπήρχαν ενδείξεις
                            φλεγμονής. Παρήγγειλα την Arthromed στον εαυτό μου, οπότε την έχω πάντα μαζί μου.</p>
                    </div>
                </div>
                <div class="reviews-block">
                    <div class="text">
                        <h3>Νεφέλη, 49 ετών</h3>
                        <p>
                            Είμαι 49 ετών. Τη μισή ζωή μου υποφέρω από τον πόνο στα γόνατά μου. Πάσχω από τη χρόνια
                            πολυαρθρίτιδα. Δοκίμασα πολλά θεραπευτικά προϊόντα. Καλύτερα από όλα με βοηθούσα μια αλοιφή,
                            που έκαιγε το δέρμα, αλλά ο πόνος στις αρθρώσεις περνούσε για ένα διάστημα. Πριν από ένα
                            μήνα, ο σύζυγός μου με έφερε την κρέμα Arthromed. Είπε ότι του άρεσε η συσκευασία. Τον
                            ευχαρίστησα και αποφάσισα να το χρησιμοποιήσω μια φορά και μετά να τον αφήσω στο ράφι. Το
                            βράδυ την έβαλα στα γόνατά μου και πήγα για ύπνο. Το πρωί ξύπνησα ο πόνος μειώθηκε! Μετά από
                            21 μέρες συνειδητοποίησα, ότι οι προβλέψεις του γιατρού μου ότι θα μείνω ανάπηρη, δεν θα
                            πραγματοποιηθούν!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="delivery">
        <div class="wrapper">
            <h2>ΘΑ ΣΤΕΙΛΟΥΜΕ ΤΗΝ ΠΑΡΑΓΓΕΛΙΑ ΣΑΣ ΣΕ ΟΠΟΙΑΔΗΠΟΤΕ ΠΟΛΗ ΤΗΣ ΕΛΛΑΔΑΣ ΜΕΣΑ ΣΕ 1-3 ΗΜΕΡΕΣ ΜΟΝΟ! </h2>
            <div class="delivery-img">
                <img src="img/map_europe.png" alt="">
            </div>
        </div>

    </div>

    <div class="order">
        <div class="wrapper">
            <h2>ΜΠΟΡΕΙΤΕ ΝΑ ΠΑΡΑΓΓΕΙΛΕΤΕ ΤΟ ΓΝΗΣΙΟ <span>Arthromed</span> ΜΟΝΟ ΣΤΗΝ ΙΣΤΟΣΕΛIΔΑ ΜΑΣ.</h2>
            <div class="order-item el">
                <div class="block-img">
                    <img src="img/laptop.png"
                        alt="Θέλω να αγοράσω την κρέμα Arthromed. Τιμές, σχόλια. Κάντε την παραγγελία για το Arthromed τώρα!">
                </div>
                <p>Συμπληρώστε την αίτηση στην ιστοσελίδα και περιμένετε να σας καλέσουμε </p>
            </div>
            <div class="order-item el">
                <div class="block-img">
                    <img src="img/callback.png"
                        alt="Θέλω να αγοράσω την κρέμα Arthromed. Τιμές, σχόλια. Κάντε την παραγγελία για το Arthromed τώρα!">
                </div>
                <p>Επιβεβαιώστε την παραγγελία </p><br>
            </div>
            <div class="order-item el">
                <div class="block-img">
                    <img src="img/moneyl.png"
                        alt="Θέλω να αγοράσω την κρέμα Arthromed. Τιμές, σχόλια. Κάντε την παραγγελία για το Arthromed τώρα!">
                </div>
                <p>Το courier θα σας παραδώσει το <span>Arthromed</span> μέσα σε 1-3 μέρες </p>
            </div>
        </div>
    </div>
    <section class="callback-section">
        <div class="wrapper clearfix">
            <div class="block-callback">
                <div class="callback-left">
                    <div class="form-price clearfix">
                        <div class="previous">
                            <span>Προηγούμενη τιμή:</span>
                            <span class="money dyn_old_price">78</span>
                            <span class="currency dyn_currency">EUR</span>
                        </div>
                        <div class="current">
                            <div class="text">Νέα τιμή:</div>
                            <span class="money dyn_price">39</span>
                            <span class="currency dyn_currency">EUR</span>
                        </div>
                    </div>
                    <div class="timer1">
                        <p class="first-p el">Προλάβετε να παραγγείλετε με έκπτωση <span class="dyn_discount">50</span>%
                        </p>
                        <p>Η προσφορά λήγει σε:</p>
                        <div class="timer__index1">
                            <span class="timer__item1 hours">00</span>
                            <span class="timer__point"></span>
                            <span class="timer__item-title1">ώρες</span>
                        </div>
                        <div class="timer__index1">
                            <span class="timer__item1 minutes">00</span>
                            <span class="timer__point"></span>
                            <span class="timer__item-title1">λεπτά</span>
                        </div>
                        <div class="timer__index1">
                            <span class="timer__item1 seconds">00</span>
                            <span class="timer__item-title1">δευτερόλεπτα</span>
                        </div>
                    </div>
                    <div class="sale-block">
                        <p class="content-sale">Η ποσότητα των συσκευασιών σε προσφορά είναι περιορισμένη:</p>
                        <p class="number lastpack">67</p>
                        <p class="pieces">τεμάχια </p>
                    </div>
                </div>
                <div class="sustanol-img">
                    <img src="img/sustanol.png" alt="">
                </div>
                <div class="clone">
                    <div class="topblock-form form">
                        <form action="index.php"  method="post"  class="form-main x_order_form">
                            <label for="">Παράδειγμα: Γεώργιος Ιωαννίδης</label>
                            <input type="text" class="block-name" placeholder="εισάγετε το όνομα" name="name"
                                required="required">
                            <label for="">Παράδειγμα: +30 21 38209623</label>
                            <input class="block-phone" type="tel" name="phone" required="required"
                                placeholder="εισάγετε τηλέφωνο">
                            <div
                                style="border: 1px solid red; padding: 5%; color: #f2f2f2; width: 100%; font-size: 16px; font-weight: bolder; margin-bottom: -5px;">
                                Προσοχή ! Για το μέγιστο δυνατό αποτέλεσμα, συνισταται να περάσετε μια πλήρης πρόγραμμα
                                εφαρμογής !
                            </div>
                            <button type="submit" class="btn hover-shadow">ΘΕΛΩ ΝΑ ΠΑΡΑΓΓΕΙΛΩ ΜΕ ΕΚΠΤΩΣΗ</button>
                            <span>Τα προσωπικά στοιχεία σας δεν μεταφέρονται σε τρίτους! </span>

                        <input type="hidden" name="sub1" value="{subid}">
</form>
                    </div>
                </div>
            </div>
            <div class="polit-priv">
                <p>ST. GERARDE LTD, PO Box 832, Orion Mall, Palm Street, Victoria, Mahé, Seychelles</p>
                <a class="privacy" href="policy_gr.html" target="_blank">Πολιτική Απορρήτου</a>
            </div>
        </div>
    </section>


    <div id="kmacb" class="kmacb__manager kmacb__manager-woman1">
        <a class="kmacb-btn" modal="kmacb-form">
            <div class="kmacb__manager-circle"></div>
            <div class="kmacb__manager-fill"></div>
            <div class="kmacb__manager-border"></div>
            <div class="kmacb__manager-img"></div>
        </a>
    </div>

    <div class="ever-popup">
        <div class="ever-popup__inner">
            <div class="ever-popup__close"></div>
            <div class="clone ever-popup__body">
                <div class="topblock-form form">
                    <div class="form-price clearfix">
                        <div class="previous">
                            <span>Προηγούμενη τιμή:</span>
                            <span class="money dyn_old_price">78</span>
                            <span class="currency dyn_currency">EUR</span>
                        </div>
                        <div class="current">
                            <div>Νέα τιμή:</div>
                            <span class="money dyn_price">39</span>
                            <span class="currency dyn_currency">EUR</span>
                        </div>
                    </div>
                    <form action="index.php"  method="post"  class="form-main x_order_form">
                        <label for="">Παράδειγμα: Γεώργιος Ιωαννίδης</label>
                        <input type="text" class="block-name" placeholder="εισάγετε το όνομα" name="name"
                            required="required">
                        <label for="">Παράδειγμα: +30 21 38209623</label>
                        <input class="block-phone" type="tel" name="phone" required="required"
                            placeholder="εισάγετε τηλέφωνο">
                        <div
                            style="border: 1px solid red; padding: 5%; color: #f2f2f2; width: 100%; font-size: 16px; font-weight: bolder; margin-bottom: -5px;">
                            Προσοχή ! Για το μέγιστο δυνατό αποτέλεσμα, συνισταται να περάσετε μια πλήρης πρόγραμμα
                            εφαρμογής !
                        </div>
                        <button type="submit" class="btn hover-shadow">ΘΕΛΩ ΝΑ ΠΑΡΑΓΓΕΙΛΩ ΜΕ ΕΚΠΤΩΣΗ</button>
                        <span>Τα προσωπικά στοιχεία σας δεν μεταφέρονται σε τρίτους! </span>

                    <input type="hidden" name="sub1" value="{subid}">
</form>
                </div>
            </div>
        </div>
    </div>    
<script type="text/javascript" src="https://cdn.ldrock.com/validator.js"></script>
<script type="text/javascript">
    LeadrockValidator.init({
        geo: {
            iso_code: 'GR'
        }
    });
</script>
</body>

<!--    Feedback-->
<div class="feedback">
    <img src="img/i-phone.png" alt="">
  </div>
  <div class="popup-window hidden">
    <div class="close-popup"></div>
    <form action="index.php"  method="POST" >
      <label for="name2">Παράδειγμα: Γεώργιος Ιωαννίδης</label>
      <input id="name2" type="text" name="name" placeholder="εισάγετε το όνομα" required>
      <label for="phone2">Παράδειγμα: +30 21 38209623</label>
      <input id="phone2" type="tel" name="phone" placeholder="εισάγετε τηλέφωνο" required>
      <button type="submit">ΠΑΡΑΓΓΕΛΊΑ</button>
    <input type="hidden" name="sub1" value="{subid}">
</form>
  </div>
 
<link href="css/custom-styles2.min.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="css/main.min.css">

<script src="js/jquery.min.js"></script>
<script src="js/main.js"></script>

</html>