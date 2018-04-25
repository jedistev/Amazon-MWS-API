<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<br>
<br>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-1">
      </div>
      <div class="col-md-10">
    
<?php
/** 
 *  PHP Version 5
 *
 *  @category    Amazon
 *  @package     MarketplaceWebService
 *  @copyright   Copyright 2009 Amazon Technologies, Inc.
 *  @link        http://aws.amazon.com
 *  @license     http://aws.amazon.com/apache2.0  Apache License, Version 2.0
 *  @version     2009-01-01
 */
/******************************************************************************* 

 *  Marketplace Web Service PHP5 Library
 *  Generated: Thu May 07 13:07:36 PDT 2009
 * 
 */

/**
 * Get Report  Sample
 */

include_once ('.config.inc.php'); 

/************************************************************************
* Uncomment to configure the client instance. Configuration settings
* are:
*
* - MWS endpoint URL
* - Proxy host and port.
* - MaxErrorRetry.
***********************************************************************/
// IMPORTANT: Uncomment the approiate line for the country you wish to
// sell in:
// United States:
//$serviceUrl = "https://mws.amazonservices.com";
// United Kingdom
$serviceUrl = "https://mws.amazonservices.co.uk";
// Germany
//$serviceUrl = "https://mws.amazonservices.de";
// France
//$serviceUrl = "https://mws.amazonservices.fr";
// Italy
//$serviceUrl = "https://mws.amazonservices.it";
// Japan
//$serviceUrl = "https://mws.amazonservices.jp";
// China
//$serviceUrl = "https://mws.amazonservices.com.cn";
// Canada
//$serviceUrl = "https://mws.amazonservices.ca";
// India
//$serviceUrl = "https://mws.amazonservices.in";

$config = array (
  'ServiceURL' => $serviceUrl,
  'ProxyHost' => null,
  'ProxyPort' => -1,
  'MaxErrorRetry' => 3,
);

/************************************************************************
 * Instantiate Implementation of MarketplaceWebService
 * 
 * AWS_ACCESS_KEY_ID and AWS_SECRET_ACCESS_KEY constants 
 * are defined in the .config.inc.php located in the same 
 * directory as this sample
 ***********************************************************************/
 $service = new MarketplaceWebService_Client(
     AWS_ACCESS_KEY_ID, 
     AWS_SECRET_ACCESS_KEY, 
     $config,
     APPLICATION_NAME,
     APPLICATION_VERSION);
 
/************************************************************************
 * Uncomment to try out Mock Service that simulates MarketplaceWebService
 * responses without calling MarketplaceWebService service.
 *
 * Responses are loaded from local XML files. You can tweak XML files to
 * experiment with various outputs during development
 *
 * XML files available under MarketplaceWebService/Mock tree
 *
 ***********************************************************************/
 // $service = new MarketplaceWebService_Mock();

/************************************************************************
 * Setup request parameters and uncomment invoke to try out 
 * sample for Get Report Action
 ***********************************************************************/
 // @TODO: set request. Action can be passed as MarketplaceWebService_Model_GetReportRequest
 // object or array of parameters
 $reportId = '<ReportID Insert Here>'; //reportID can be found in Amazon Stratchpad
 
 
 $parameters = array (
   'Merchant' => MERCHANT_ID,
   'Report' => @fopen('php://memory', 'rw+'),
   'ReportId' => $reportId,
//   'MWSAuthToken' => '<MWS Auth Token>', // Optional
 );
$request = new MarketplaceWebService_Model_GetReportRequest($parameters);
$request = new MarketplaceWebService_Model_GetReportRequest();
$request->setMerchant(MERCHANT_ID);
$request->setReport(@fopen('php://memory', 'rw+'));
$request->setReportId($reportId);
$request->setMWSAuthToken('<MWS Auth Token>'); // Optional
 
invokeGetReport($service, $request);

/**
* Get Report Action Sample
* The GetReport operation returns the contents of a report. Reports can potentially be
* very large (>100MB) which is why we only return one report at a time, and in a
* streaming fashion.
*   
* @param MarketplaceWebService_Interface $service instance of MarketplaceWebService_Interface
* @param mixed $request MarketplaceWebService_Model_GetReport or array of parameters
*/
  function invokeGetReport(MarketplaceWebService_Interface $service, $request) 
  {
      try {
              $response = $service->getReport($request);
                echo ("<table class='table table-bordered table-striped table-hover table-condensed table-responsive'>\n");
                echo ("<thead>");
                echo ("<tr> ");
                echo ("<th >Settlement ID</th> ");
                echo ("<td>");
                echo ("Settlement ID Report display here");
                echo ("</td></tr>");
                echo ("<tr> ");
                echo ("<th>GetReportResponse\n</th> ");
                echo ("<td>");
                if ($response->isSetGetReportResult()) {
                  $getReportResult = $response->getGetReportResult(); 
                  echo ("            GetReport");
                echo ("</td></tr>");
              }
                //Report Content
                echo ("<tr> ");
                echo ("<th>Settlement ID</th> ");
                echo ("<td>");
                echo (stream_get_contents($request->getReport()) . "\n");
                echo ("</td></tr>");    
              } catch (MarketplaceWebService_Exception $ex) {
                echo("Caught Exception: " . $ex->getMessage() . "\n");
                echo("Response Status Code: " . $ex->getStatusCode() . "\n");
                echo("Error Code: " . $ex->getErrorCode() . "\n");
                echo("Error Type: " . $ex->getErrorType() . "\n");
                echo("Request ID: " . $ex->getRequestId() . "\n");
                echo("XML: " . $ex->getXML() . "\n");
                echo("ResponseHeaderMetadata: " . $ex->getResponseHeaderMetadata() . "\n");
                echo ("</td></tr>"); 
                echo ("</table>\n");
          }
      
  }
 
?>                                                                       
      </div>
      <div class="col-md-1">
      </div>
  </div>
</div>

