<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Παραγγελία ARTHROMed</title>

    <meta name="apple-mobile-web-app-capable" content="no">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
	<link rel="icon" href="../favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" /> 
    <link rel='stylesheet' type='text/css' href='../css/stylesStep2.css' />
    <link rel='stylesheet' type='text/css' href='../css/form.css' />
    <link rel="stylesheet" type="text/css" href="../css/jquery-ui.min.css">

    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/template_validator.js"></script>
    <script type="text/javascript" src="../js/time.js"></script>
    <script type="text/javascript" src="../js/jquery.zip.js"></script>
    <script type="text/javascript" src="../js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../js/cities.js"></script>
    <script type="text/javascript" src="../js/barangay.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            //только цифры в номере телефона
			$('[name=billing_phone]').bind("change keyup input click", function() {
			if (this.value.match(/[^0-9]/g)) {
			this.value = this.value.replace(/[^0-9]/g, '');
			}
			});
        });
    </script>
    <script type="text/javascript">
    var prices = [
            '39 Euro', '78 Euro', '₱&nbsp;4,490.00'
            ];

    var quants = [
            '1', '3', '5'
        ];

    var full_prices = [
            '78 Euro', '156 Euro', '₱&nbsp;8,980.00'
        ];  

    var discount = [
            '78 Euro', '156 Euro', '₱&nbsp;4,490.00'
        ];

    var shipping_prices = [
            '₱&nbsp;0.00', '₱&nbsp;0.00', '₱&nbsp;0.00'
        ];

        var qunats_promo = ['1','2+1','3+2'];
var click;
    $(document).ready(function(){
    $(".pBoxActive").find(".selectP").html("Selected Package");
    $('.save0').html("" + discount[0] );
    $('.save1').html("" + discount[1] );
    $('.save2').html("" + discount[2] );
    $('#form-selector-quant').on('mousedown' , function (){
    click = false;
});
    $('#form-selector-quant').on('change' , function(){
    var selValue = $('#form-selector-quant').val()
    if(!click){
        $('.box_'+selValue+'_button').click();
      }
  });
    }); 
    $(function () {
        product_selection_click(0);
    });     
    function product_selection_click(id) {
    $('#product_selection').val(id);
    
    $('.selectP').on({click: function(){
            var $this = $(this);
            
            $(".pricesHolder > div").removeClass('pBoxActive');
            $(".pBox").find(".selectP").html("Select this package");
            $this.html("Selected Package")
                    .parents('.pBox').addClass('pBoxActive');
            } })    
        $('#quantity').html(quants[id] + ' month supply');
        $('#full_price').html(full_prices[id]);
        $('#quantity').html( qunats_promo[id] );
        $('.total').html( (prices[id]) );
        $('#discount').html( "- " + discount[id] );
        $('#shipping').html(shipping_prices[id]);
        click = true;
    $('#form-selector-quant').val(id);
    }
</script>



</head>
<body oncontextmenu="return false" ondragstart="return false;" ondrop="return false;">


<div id="home" class="sections">
    <div class="container top">
        <div id="section2">
            <div class="container">
                <div id="innerContent">
                    <div class="fLeft pricesHolder">

                        <div class="pBox pBoxActive">
                            <img src="../images/hotoffer.png" class="hot" alt="" />
                            <div class="pNav pNav2">ΑΓΟΡΑ 1
                                <div class="pNavR">ΕΛΕΥΘΕΡΗ ΝΑΥΤΙΛΙΑ</div>
                            </div>
                            <div class="prodBox"><img src="../images/product_s.png" alt=""></div>
                            <div class="pContent">
                                <p>Κανονική τιμή:
                                    <span class="priceOld">78 Euro</span><br>
                                    <span class="green">μόνο <span class="priceNew">39 Euro</span>
                                </p>
                                <div class="star">SAVE<br />
                                    <span class="save0 lineH36 f12"></span>
                                </div>
                                <button class="selectP box_0_button" id="lastButton" onClick="product_selection_click(0);">ΕΠΙΛΕΓΜΕΝΗ ΣΥΣΚΕΥΑΣΙΑ</button>
                            </div>
                        </div><!--productBox 1-->

                        <div class="pBox">
                            <div class="pNav">ΑΓΟΡΑ 2 παίρνω <div id="text"><h1 class="free-sign-text">1 Ελε<span id="offset">ύθε</span>ρος</h1></div>
                                
                            </div>
                            <div class="prodBox"><img src="../images/product_s.png" alt=""> <img src="../images/product_s.png" alt=""><img class="plus" src="../images/product_s_pl.png" alt="" /></div>
                            <div class="pContent">
                                <p>Κανονική τιμή: <span class="priceOld">156 Euro</span><br>
                                    <span class="green">μόνο <span class="priceNew">78 Euro</span></span>
                                </p>
                                <div class="star">SAVE<br />
                                    <span class="save1 lineH36 f12"></span>
                                </div>
                                <div class="pNavR">ΕΛΕΥΘΕΡΗ ΝΑΥΤΙΛΙΑ</div>
                                <button class="selectP box_1_button" onClick="product_selection_click(1);">ΕΠΙΛΕΓΜΕΝΗ ΣΥΣΚΕΥΑΣΙΑ</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="formContainer">
            
<form name="orderform" id="orderform" action="/confirm.html" method="post" onsubmit="return template_validator({'billing_fname':{'mask':/\S/,'hint':'Enter first name and last name!'},'billing_street':{'mask':/\S/,'hint':'Enter your address!'},'billing_city':{'mask':/\S/,'hint':'Enter city!'},'billing_state':{'mask':/\S/,'hint':'Enter your Province!'},'billing_email':{'mask':/^(([^&lt;&gt;()[\]\\.,;:\s@\&quot;]+(\.[^&lt;&gt;()[\]\\.,;:\s@\&quot;]+)*)|(\.+\&quot;))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,'hint':'Enter valid e-mail!'},'billing_phone':{'mask':/^[0-9- \+\(\)]+$/,'hint':'Enter a valid Telephone number.'}})">


	<input type="hidden" value="0" id="product_selection" name="product_selection"/>
	<input type="hidden" value="On" id="sameshipping" name="sameshipping"/>

	<label for="billing_fname">Ονομα επίθετο</label>
	<input id="billing_fname" type="text" name="billing_fname" placeholder="Ονομα επίθετο"/>
	<input type="hidden" value="-" id="billing_zip" name="billing_zip"/>
	<label for="billing_street">Πλήρης διεύθυνση</label>
	<input id="billing_street" type="text" name="billing_street" placeholder="Πλήρης διεύθυνση" value=""/>

	<label for="billing_city">πόλη</label>
	<input id="billing_city" type="text" name="billing_city" placeholder="πόλη" value=""/>




        <!--<label for="billing_email">Email</label>
        <input id="billing_email" placeholder="Email" type="text" name="billing_email"/>-->
    

	<label for="billing_phone">Αριθμός κινητού</label>
	<input id="shipping_areacode" type="text" disabled="disabled" value="+30" name="areacode"/><input id="billing_phone" type="text" name="billing_phone" placeholder="Αριθμός κινητού" value=""/>


	<br class="clear"/>
	<button class="rushOrder" type="submit">ΡΟΥΧ ΜΟΥ ΠΑΡΑΓΓΕΛΙΑ</button>

	<table id="showProductSelect" class="center">
				<tr>
					<td>Κανονική τιμή:</td>
					<td id="full_price" class="stricken"/>
				</tr>
				<tr>
					<td>Εκπτωτική τιμή:</td>
					<td class="total"/>
				</tr>
				<tr>
					<td>Εκπτωση</td>
					<td id="discount">-</td>
				</tr>
				<tr class="green">
            		<td>Ποσότητα</td>
            		<td>
            		<select id="form-selector-quant">
            		    <option value="0"> 1 </option>
            		    <option value="1"> 2 + 1 Ελεύθερος </option>
            		</select>
            		</td>
          		</tr>
				<tr class="green" id="totalStep2">
					<td>Σύνολο:</td>
					<td class="total f30"/>
				</tr>
			</table>
</form>

            
        </div><!--formContainer-->

    </div><!--top-->

    <div class="freeShipping">
        <h3>ΕΛΕΥΘΕΡΗ ΝΑΥΤΙΛΙΑ</h3>
        <p>Μόλις κάνατε μια απόφαση που θα αλλάξει τη ζωή σας προς το καλύτερο. Το ArthroMed θα παραδοθεί στην πόρτα σας σε 2-7 εργάσιμες ημέρες. Τα καλά νέα; Δεν θα χρειαστεί να πληρώσετε τίποτα πριν ο courier ανακάμψει στην πόρτα σας με το προϊόν. Μόνο τότε θα πληρώσετε μόνο την τιμή του προϊόντος και τίποτα για την παράδοση. Η παράδοση είναι σε εμάς. Οι παραδόσεις συμβαίνουν κατά τις συνήθεις ώρες εργασίας, οπότε βεβαιωθείτε ότι εσείς ή ο αντιπρόσωπός σας είναι διαθέσιμος στη θέση που αναφέρατε στη φόρμα παραγγελίας.</p>
    </div>

    <div class="section2">
        <div class="contentBox2"> <img src="../images/guarantee.png" alt="" class="smallimg">
            <p class="bold">100% ΕΓΓΥΗΣΗ ΠΙΣΤΩΣΗΣ ΧΡΗΜΑΤΩΝ</p>
            <p>Εάν δεν είστε ικανοποιημένοι με το προϊόν, επιστρέψτε το και θα δώσουμε τα χρήματά σας πίσω - χωρίς ερωτήσεις.</p>
        </div>
    </div>
    <div class="section2">
        <div class="contentBox2"> <img src="../images/delivery.png" alt="" class="smallimg">
            <p class="bold">Η ΠΑΡΑΔΟΣΗ ΕΙΝΑΙ ΔΩΡΕΑΝ</p>
            <p>Αυτή η τιμή περιλαμβάνει όλους τους φόρους και τον ΦΠΑ και η παράδοση είναι δωρεάν. Το προϊόν θα παραδοθεί στην πόρτα σας εντός 2-7 εργάσιμων ημερών από την ημερομηνία κατάθεσης της παραγγελίας σας μέσω αυτής της ιστοσελίδας.</p>
        </div>
    </div>
    <div class="section2">
        <div class="contentBox2"> <img src="../images/money.png" alt="" class="smallimg">
            <p class="bold">ΜΕΘΟΔΟΣ ΠΛΗΡΩΜΗΣ</p>
            <p>Ο τρόπος πληρωμής είναι με αντικαταβολή - δεν πληρώνετε τίποτα εκ των προτέρων. Η παράδοση του προϊόντος είναι δωρεάν.</p>
        </div>
    </div>

</div>
<br>
<p align="center"><a href="../policy" target="_blank">πολιτική απορρήτου</a></p>
</body>
</html>