<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Rename Perfectcontroller to [Name]
class Pay_pal extends MY_Controller
{

/* model name goes here */
var $mdl_name = 'Mdl_pay_pal';
var $main_controller = 'pay_pal';

var $column_rules = array(
    array('field' => ' ... ', 'label' => ' ... ', 'rules' => ' ... '),
);

function __construct() {
    parent::__construct();

}


/* ===================================================
    Controller functions goes here. Put all DRY
    functions in applications/core/My_Controller.php
   =================================================== */

function apply_payment()
{
    $this->load->module('site_security');
    $paypal_trans_id    = $this->site_security->generate_random_string(30);
 
    return $paypal_trans_id;
}

function paypal_cancelled()
{
echo "<h1>Pay Pal Cancelled.............</h1>";

}
  
function index()
{

// checkArray($_POST,1);

$PayPalMode         = 'sandbox';
$PayPalApiUsername  = 'evelio-facilitator_api1.mailers.com';
$PayPalApiPassword  = '1379724581';
$PayPalApiSignature = 'An5ns1Kso7MWUdW4ErQKJJJ4qi4-A9AWRYQMAG7GiBsnwtALB36lgOxF';
$PayPalCurrencyCode = 'USD';
$PayPalReturnURL    = 'http://www.njpob.com/pay_pal';
$PayPalCancelURL    = 'http://www.njpob.com/paypal_cancelled';
$Signature          = 'd0a7e7997b6d5fcd55f4b5c32611b87cd923e88837b63bf2941ef819dc8ca282';

    if($_POST){
        /* Post Data received from product list page.
           Mainly we need 4 variables from an item, Item Name, Item Price, Item Number and Item Quantity.
           This was edited by Evelio Velez for New Jersey Police Law Enforcement Brotherhood Organization 2-9-2014
        */

        // PayPal required fields
        foreach ($_POST as $key => $value) {
            $key = strtolower($key);
            $_SESSION[$key] = $value;
        }
        $_SESSION["totalamount"] = ( $_POST["itemprice"]*$_POST["itemQty"] );

        /* Data to be sent to paypal  */
        $padata ='&CURRENCYCODE='.urlencode($PayPalCurrencyCode).
                 '&PAYMENTACTION=Sale'.
                 '&ALLOWNOTE=1'.
                 '&PAYMENTREQUEST_0_CURRENCYCODE='.urlencode($PayPalCurrencyCode).
                 '&PAYMENTREQUEST_0_AMT='.urlencode($_SESSION["totalamount"]).
                 '&PAYMENTREQUEST_0_ITEMAMT='.urlencode($_SESSION["totalamount"]).
                 '&L_PAYMENTREQUEST_0_QTY0='. urlencode($_SESSION["itemqty"]).
                 '&L_PAYMENTREQUEST_0_AMT0='.urlencode($_SESSION["itemprice"]).
                 '&L_PAYMENTREQUEST_0_NAME0='.urlencode($_SESSION["itemname"]).
                 '&L_PAYMENTREQUEST_0_NUMBER0='.urlencode($_SESSION["itemnumber"]).
                 '&AMT='.urlencode($_SESSION["totalamount"]).
                 '&RETURNURL='.urlencode($PayPalReturnURL ).
                 '&CANCELURL='.urlencode($PayPalCancelURL); 

        /* We need to execute the "SetExpressCheckOut" method to obtain paypal token */
        $this->load->model("Mdl_pay_pal");
        $httpParsedResponseAr = $this->Mdl_pay_pal->PPHttpPost('SetExpressCheckout', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);

        /* Respond according to message we receive from Paypal */
        if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) ||
           "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"]))
        {

            /* If successful set some session variable we need later when user is redirected back to page from paypal. */
            if($PayPalMode=='sandbox'){
                $paypalmode     =   '.sandbox';
            }else{
                $paypalmode     =   '';
            }

            /* Redirect user to PayPal store with Token received. */
            $paypalurl ='https://www'.$paypalmode.'.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token='.$httpParsedResponseAr["TOKEN"].'';

// checkField($paypalurl,0);

            //$paypalurl ='https://www'.$paypalmode.'.paypal.com/cgi-bin/webscr?cmd=_xclick&token='.$httpParsedResponseAr["TOKEN"].'';
            header('Location: '.$paypalurl);
             
        }else{
            /* Show error message */
            $html_out_mess ='<div style="color:red"><b>Error Response: </b>'.urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]).'</div>';
            echo '<div style="color:red"><b>Error : </b>'.urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]).'</div>';
            echo '<pre>';
            print_r($httpParsedResponseAr);
            echo '</pre>';
            exit();
        }
    }/* End Post Data received from product list page. */


    /* Paypal redirects back to this page using ReturnURL, We should receive TOKEN and Payer ID */
    if(isset($_GET["token"]) && isset($_GET["PayerID"])){
        //we will be using these two variables to execute the "DoExpressCheckoutPayment"
        //Note: we haven't received any payment yet.
checkField('I am here',1);        
        $token = $_GET["token"];
        $playerid = $_GET["PayerID"];
        
        /* get session variables */
        $padata ='&TOKEN='.urlencode($token).
                 '&PAYERID='.urlencode($playerid).
                 '&PAYMENTACTION='.urlencode("SALE").
                 '&AMT='.urlencode($_SESSION["totalamount"]).
                 '&CURRENCYCODE='.urlencode($PayPalCurrencyCode);
                 
        /* We need to execute the "DoExpressCheckoutPayment" at this point to Receive payment from user. */
        $this->load->model("Mdl_pay_pal");
        $httpParsedResponseAr = $this->Mdl_pay_pal->PPHttpPost('DoExpressCheckoutPayment', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);

        //Check if everything went ok..
        if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])){
            /* Sometimes Payment are kept pending even when transaction is complete. 
               May be because of Currency change, or user choose to review each payment etc.
               hence we need to notify user about it and ask him manually approve the transaction
            */

            $transactionID = urlencode($httpParsedResponseAr["TRANSACTIONID"]);
            $nvpStr = "&TRANSACTIONID=".$transactionID;

            $this->load->model("Mdl_pay_pal");
            $httpParsedResponseAr = $this->Mdl_pay_pal->PPHttpPost('GetTransactionDetails', $nvpStr, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);

            if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {

                #### SAVE BUYER INFORMATION IN DATABASE ###
                /* Response from paypal */
                $_SESSION['cc_email'] = rawurldecode($httpParsedResponseAr["EMAIL"]);
                $_SESSION['transactionid'] = rawurldecode($httpParsedResponseAr["TRANSACTIONID"]);

checkArray($_SESSION, 1); 

            } else  {
                echo '<div style="color:red"><b>GetTransactionDetails failed:</b>'.urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]).'</div>';
                echo '<pre>';
                print_r($httpParsedResponseAr);
                echo '</pre>';
                exit();
            }
        }else{
            echo '<div style="color:red"><b>Error:No SUCCESS: </b>'.urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]).'</div>';
            echo '<pre>';
            print_r($httpParsedResponseAr);
            echo '</pre>';
            exit();
            
        }//end Check if everything went ok..

    }// End Paypal redirects

} // end index










/* ===============================================
    Call backs go here...
  =============================================== */




/* ===============================================
    David Connelly's work from perfectcontroller
    is in applications/core/My_Controller.php which
    is extened here.
  =============================================== */


} // End class Controller
