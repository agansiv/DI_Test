<?php
include 'index.php';
include 'db_connect.php';
$connect = odbc_connect("SIT", "palagi01", "s1mple01");
# query the users table for name and surname
$sqlop = new db_connect();
$result = $sqlop->db('SELECT  * FROM DI_test_records_V where rownum<2');
# perform the query
#$result = odbc_exec($connect, $query);

$xml = new DOMDocument("1.0","utf-8");
$xml->formatOutput =true;
#$root = $xml->createElementNS('http://www.cancerresearchuk.org/di/r17/supplier/newdonate');
$gen=$xml->createElementNS("http://www.cancerresearchuk.org/di/r17/supplier/generic","batch");
$xml->appendChild($gen);
$id=$xml->createElement("id","testval");
$gen->appendChild($id);
$ltran=$xml->createElement("listOfTransaction");
$gen->appendChild($ltran);
$tran=$xml->createElement("transaction");
$ltran->appendChild($tran);
while($row=odbc_fetch_row($result)){
	$Trefe=$xml->createElement("reference",odbc_result($result, 1));
	$tran->appendChild($Trefe);
	$supporter=$xml->createElement("supporter");
	$tran->appendChild($supporter);
	$dob = $xml->createElement("dateOfBirth",odbc_result($result, 2));
	$supporter->appendChild($dob);
	$pExtRef = $xml->createElement("primaryExternalReferenceId",odbc_result($result, 3));
	$supporter->appendChild($pExtRef);
	$PDataSo = $xml->createElement("primaryDataSourceCode","testval");
	$supporter->appendChild($PDataSo);
	$fore=$xml->createElement("forename","testval");
	$supporter->appendChild($fore);
	$SSdate = $xml->createElement("startDate","testval");
	$supporter->appendChild($SSdate);
	$SSource=$xml->createElement("source","testval");
	$supporter->appendChild($SSource);
	$SStatus=$xml->createElement("statusCode","testval");
	$supporter->appendChild($SStatus);
	$SStDate=$xml->createElement("statusDate","testval");
	$supporter->appendChild($SStDate);
	$suffix=$xml->createElement("suffix","testval");
	$supporter->appendChild($suffix);
	$surname=$xml->createElement("surname","testval");
	$supporter->appendChild($surname);
	$Title=$xml->createElement("title","testval");
	$supporter->appendChild($Title);
	$nonTaxPayerFlag=$xml->createElement("nonTaxPayerFlag","testval");
	$supporter->appendChild($nonTaxPayerFlag);
	$nonTaxPayerStartDate=$xml->createElement("nonTaxPayerStartDate","testval");
	$supporter->appendChild($nonTaxPayerStartDate);
	$dateOfDeath=$xml->createElement("dateOfDeath","testval");
	$supporter->appendChild($dateOfDeath);
	$deathNotificationDate=$xml->createElement("deathNotificationDate","testval");
	$supporter->appendChild($deathNotificationDate);
	$maritalStatus=$xml->createElement("maritalStatus","testval");
	$supporter->appendChild($maritalStatus);
	$address=$xml->createElement("address");
	$supporter->appendChild($address);
	$addressLine1=$xml->createElement("addressLine1","testval");
	$address->appendChild($addressLine1);
	$addressLine2=$xml->createElement("addressLine2","testval");
	$address->appendChild($addressLine2);
	$addressLine3=$xml->createElement("addressLine3","testval");
	$address->appendChild($addressLine3);
	$addressLine4=$xml->createElement("addressLine4","testval");
	$address->appendChild($addressLine4);
	$cherishedAddressHouseName=$xml->createElement("cherishedAddressHouseName","testval");
	$address->appendChild($cherishedAddressHouseName);
	$city=$xml->createElement("city","testval");
	$address->appendChild($city);
	$country=$xml->createElement("country","testval");
	$address->appendChild($country);
	$postalCode=$xml->createElement("postalCode","testval");
	$address->appendChild($postalCode);
	$startDate=$xml->createElement("startDate","testval");
	$address->appendChild($startDate);
	$validationStatus=$xml->createElement("validationStatus","testval");
	$address->appendChild($validationStatus);
	$newAddressIndicator=$xml->createElement("newAddressIndicator","testval");
	$address->appendChild($newAddressIndicator);
	$secondaryAddresses=$xml->createElement("secondaryAddresses");
	$supporter->appendChild($secondaryAddresses);
	$saddresses=$xml->createElement("address");
	$secondaryAddresses->appendChild($saddresses);
	$saddressLine1=$xml->createElement("addressLine1","testval");
	$saddresses->appendChild($saddressLine1);
	$saddressLine2=$xml->createElement("addressLine2","testval");
	$saddresses->appendChild($saddressLine2);
	$saddressLine3=$xml->createElement("addressLine3","testval");
	$saddresses->appendChild($saddressLine3);
	$saddressLine4=$xml->createElement("addressLine4","testval");
	$saddresses->appendChild($saddressLine4);
	$scherishedAddressHouseName=$xml->createElement("cherishedAddressHouseName","testval");
	$saddresses->appendChild($scherishedAddressHouseName);
	$scity=$xml->createElement("city","testval");
	$saddresses->appendChild($scity);
	$scountry=$xml->createElement("country","testval");
	$saddresses->appendChild($scountry);
	$spostalCode=$xml->createElement("postalCode","testval");
	$saddresses->appendChild($spostalCode);
	$astartDate=$xml->createElement("startDate","testval");
	$saddresses->appendChild($astartDate);
	$svalidationStatus=$xml->createElement("validationStatus","testval");
	$saddresses->appendChild($svalidationStatus);
	$snewAddressIndicator=$xml->createElement("newAddressIndicator","testval");
	$saddresses->appendChild($snewAddressIndicator);
	$contactInfoP=$xml->createElement("contactInfo-Phone");
	$supporter->appendChild($contactInfoP);
	$phoneNumber=$xml->createElement("phoneNumber","testval");
	$contactInfoP->appendChild($phoneNumber);
	$contactInfoE=$xml->createElement("contactInfo-Email");
	$supporter->appendChild($contactInfoE);
	$emailAddress=$xml->createElement("emailAddress","testval");
	$contactInfoE->appendChild($emailAddress);
	$contactInfoM=$xml->createElement("contactInfo-Mobile");
	$supporter->appendChild($contactInfoM);
	$mobileNumber=$xml->createElement("mobileNumber","testval");
	$contactInfoM->appendChild($mobileNumber);
	$giftAidDeclaration=$xml->createElement("giftAidDeclaration");
	$supporter->appendChild($giftAidDeclaration);
	$confirmedOn=$xml->createElement("confirmedOn","testval");
	$giftAidDeclaration->appendChild($confirmedOn);
	$declarationDate=$xml->createElement("declarationDate","testval");
	$giftAidDeclaration->appendChild($declarationDate);
	$letterCode=$xml->createElement("letterCode","testval");
	$giftAidDeclaration->appendChild($letterCode);
	$method=$xml->createElement("method","testval");
	$giftAidDeclaration->appendChild($method);
	$greference=$xml->createElement("reference","testval");
	$giftAidDeclaration->appendChild($greference);
	$gsource=$xml->createElement("source","testval");
	$giftAidDeclaration->appendChild($gsource);
	$gstartDate=$xml->createElement("startDate","testval");
	$giftAidDeclaration->appendChild($gstartDate);
	$gadType=$xml->createElement("gadType","testval");
	$giftAidDeclaration->appendChild($gadType);
	$directDebit=$xml->createElement("directDebit");
	$supporter->appendChild($directDebit);
	$accountName=$xml->createElement("accountName","testval");
	$directDebit->appendChild($accountName);
	$amount=$xml->createElement("amount","testval");
	$directDebit->appendChild($amount);
	$bankAccountNumber=$xml->createElement("bankAccountNumber","testval");
	$directDebit->appendChild($bankAccountNumber);
	$bankSortCode=$xml->createElement("bankSortCode","testval");
	$directDebit->appendChild($bankSortCode);
	$bankAccountCode=$xml->createElement("bankAccountCode","testval");
	$directDebit->appendChild($bankAccountCode);
	$frequency=$xml->createElement("frequency","testval");
	$directDebit->appendChild($frequency);
	$product=$xml->createElement("product","testval");
	$directDebit->appendChild($product);
	$dreference=$xml->createElement("reference","testval");
	$directDebit->appendChild($dreference);
	$resCode=$xml->createElement("resCode","testval");
	$directDebit->appendChild($resCode);
	$dsource=$xml->createElement("source","testval");
	$directDebit->appendChild($dsource);
	$dataSource=$xml->createElement("dataSource","testval");
	$directDebit->appendChild($dataSource);
	$paymentDay=$xml->createElement("paymentDay","testval");
	$directDebit->appendChild($paymentDay);
	$dstartDate=$xml->createElement("startDate","testval");
	$directDebit->appendChild($dstartDate);
	$toBeGiftAided=$xml->createElement("toBeGiftAided","testval");
	$directDebit->appendChild($toBeGiftAided);
	$letterCodeGAD=$xml->createElement("letterCodeGAD","testval");
	$directDebit->appendChild($letterCodeGAD);	
	$methodGAD=$xml->createElement("methodGAD","testval");
	$directDebit->appendChild($methodGAD);
	$motivation=$xml->createElement("motivation","testval");
	$directDebit->appendChild($motivation);
	$inMemoryName=$xml->createElement("inMemoryName","testval");
	$directDebit->appendChild($inMemoryName);
	$gadType=$xml->createElement("gadType","testval");
	$directDebit->appendChild($gadType);
	#Payments
	$listOfDonations=$xml->createElement("listOfDonations");
	$supporter->appendChild($listOfDonations);
	$donations=$xml->createElement("donations");
	$listOfDonations->appendChild($donations);
	$amount=$xml->createElement("amount","testval");
	$donations->appendChild($amount);
	$bankAccountCode=$xml->createElement("bankAccountCode","testval");
	$donations->appendChild($bankAccountCode);
	$DdataSource=$xml->createElement("dataSource","testval");
	$donations->appendChild($DdataSource);
	$dateReceived=$xml->createElement("dateReceived","testval");
	$donations->appendChild($dateReceived);
	$donationType=$xml->createElement("donationType","testval");
	$donations->appendChild($donationType);
	$DeventCode=$xml->createElement("eventCode","testval");
	$donations->appendChild($DeventCode);
	$financialPaymentReference=$xml->createElement("financialPaymentReference","testval");
	$donations->appendChild($financialPaymentReference);
	$DletterCode=$xml->createElement("letterCode","testval");
	$donations->appendChild($DletterCode);
	$DresCode=$xml->createElement("resCode","testval");
	$donations->appendChild($DresCode);
	$paymentMethod=$xml->createElement("paymentMethod","testval");
	$donations->appendChild($paymentMethod);
	$paymentStatus=$xml->createElement("paymentStatus","testval");
	$donations->appendChild($paymentStatus);
	$personalGiftAid=$xml->createElement("personalGiftAid","testval");
	$donations->appendChild($personalGiftAid);
	$Dproduct=$xml->createElement("product","testval");
	$donations->appendChild($Dproduct);
	$Dsource=$xml->createElement("source","testval");
	$donations->appendChild($Dsource);
	$DwebPageId=$xml->createElement("webPageId","testval");
	$donations->appendChild($DwebPageId);
	$originatorPaymentID=$xml->createElement("originatorPaymentID","testval");
	$donations->appendChild($originatorPaymentID);
	$DtoBeGiftAided=$xml->createElement("toBeGiftAided","testval");
	$donations->appendChild($DtoBeGiftAided);
	$DletterCodeGAD=$xml->createElement("letterCodeGAD","testval");
	$donations->appendChild($Dproduct);
	$DmethodGAD=$xml->createElement("methodGAD","testval");
	$donations->appendChild($DmethodGAD);
	$Dmotivation=$xml->createElement("motivation","testval");
	$donations->appendChild($Dmotivation);
	$DinMemoryName=$xml->createElement("inMemoryName","testval");
	$donations->appendChild($DinMemoryName);
	$celebrantDataSource=$xml->createElement("celebrantDataSource","testval");
	$donations->appendChild($celebrantDataSource);
	$celebrantExternalReference=$xml->createElement("celebrantExternalReference","testval");
	$donations->appendChild($celebrantExternalReference);
	$paymentProviderTransactionId=$xml->createElement("paymentProviderTransactionId","testval");
	$donations->appendChild($paymentProviderTransactionId);
	$DgadType=$xml->createElement("gadType","testval");
	$donations->appendChild($DgadType);
	#Suppressions
	$listOfSuppressionsPreferences=$xml->createElement("listOfSuppressionsPreferences");
	$supporter->appendChild($listOfSuppressionsPreferences);
	$suppressionsPreferences=$xml->createElement("suppressionsPreferences");
	$listOfSuppressionsPreferences->appendChild($suppressionsPreferences);
	$SendDate=$xml->createElement("endDate","testval");
	$suppressionsPreferences->appendChild($SendDate);
	$SstartDate=$xml->createElement("startDate","testval");
	$suppressionsPreferences->appendChild($SstartDate);
	$suppressionPreferenceCode=$xml->createElement("suppressionPreferenceCode","testval");
	$suppressionsPreferences->appendChild($suppressionPreferenceCode);
	$Ssource=$xml->createElement("source","testval");
	$suppressionsPreferences->appendChild($Ssource);
	#Campaign
	$listOfCampaignMembership=$xml->createElement("listOfCampaignMembership");
	$supporter->appendChild($listOfCampaignMembership);
	$campaignMembership=$xml->createElement("campaignMembership");
	$listOfCampaignMembership->appendChild($campaignMembership);
	$campaignCode=$xml->createElement("campaignCode","testval");
	$campaignMembership->appendChild($campaignCode);
	$contactedOn=$xml->createElement("contactedOn","testval");
	$campaignMembership->appendChild($contactedOn);
	$outcome=$xml->createElement("outcome","testval");
	$campaignMembership->appendChild($outcome);
	$versionCode=$xml->createElement("versionCode","testval");
	$campaignMembership->appendChild($versionCode);
	$campaignRecipientToken=$xml->createElement("campaignRecipientToken","testval");
	$campaignMembership->appendChild($campaignRecipientToken);
	#Actitvites
	$listOfMailingActivities=$xml->createElement("listOfMailingActivities");
	$supporter->appendChild($listOfMailingActivities);
	$mailingActivities=$xml->createElement("mailingActivities");
	$listOfMailingActivities->appendChild($mailingActivities);
	$category=$xml->createElement("category","testval");
	$mailingActivities->appendChild($category);
	$ACTendDate=$xml->createElement("endDate","testval");
	$mailingActivities->appendChild($ACTendDate);
	$ACTletterCode=$xml->createElement("letterCode","testval");
	$mailingActivities->appendChild($ACTletterCode);
	$originatorActivityID=$xml->createElement("originatorActivityID","testval");
	$mailingActivities->appendChild($originatorActivityID);
	#Event Registration
	$listOfEventRegistration=$xml->createElement("listOfEventRegistration");
	$supporter->appendChild($listOfEventRegistration);
	$eventRegistration=$xml->createElement("eventRegistration");
	$listOfEventRegistration->appendChild($eventRegistration);
	$EVTeventCode=$xml->createElement("eventCode","testval");
	$eventRegistration->appendChild($EVTeventCode);
	$registrationNumber=$xml->createElement("registrationNumber","testval");
	$eventRegistration->appendChild($registrationNumber);
	$entryType=$xml->createElement("entryType","testval");
	$eventRegistration->appendChild($entryType);
	$entryFeeStatus=$xml->createElement("entryFeeStatus","testval");
	$eventRegistration->appendChild($entryFeeStatus);
	$cancerType=$xml->createElement("cancerType","testval");
	$eventRegistration->appendChild($cancerType);
	$fundraisingPageId=$xml->createElement("fundraisingPageId","testval");
	$eventRegistration->appendChild($fundraisingPageId);
	$fundraisingPageType=$xml->createElement("fundraisingPageType","testval");
	$eventRegistration->appendChild($fundraisingPageType);
	$fundraisingPageUrl=$xml->createElement("fundraisingPageUrl","testval");
	$eventRegistration->appendChild($fundraisingPageUrl);
	$howHeardAbout=$xml->createElement("howHeardAbout","testval");
	$eventRegistration->appendChild($howHeardAbout);
	$inviteSource=$xml->createElement("inviteSource","testval");
	$eventRegistration->appendChild($inviteSource);
	$motivation=$xml->createElement("motivation","testval");
	$eventRegistration->appendChild($motivation);
	$participationType=$xml->createElement("participationType","testval");
	$eventRegistration->appendChild($participationType);
	$placeType=$xml->createElement("placeType","testval");
	$eventRegistration->appendChild($placeType);
	$pledgeAmount=$xml->createElement("pledgeAmount","testval");
	$eventRegistration->appendChild($pledgeAmount);
	$EVTregistered=$xml->createElement("registered","testval");
	$eventRegistration->appendChild($EVTregistered);
	$registrationStatus=$xml->createElement("registrationStatus","testval");
	$eventRegistration->appendChild($registrationStatus);
	$supporterRegistrationType=$xml->createElement("supporterRegistrationType","testval");
	$eventRegistration->appendChild($supporterRegistrationType);
	$survivorshipActivities=$xml->createElement("survivorshipActivities","testval");
	$eventRegistration->appendChild($survivorshipActivities);
	$runningNumber=$xml->createElement("runningNumber","testval");
	$eventRegistration->appendChild($runningNumber);
	$groupName=$xml->createElement("groupName","testval");
	$eventRegistration->appendChild($groupName);
	$groupRole=$xml->createElement("groupRole","testval");
	$eventRegistration->appendChild($groupRole);
	$emergencyContactName=$xml->createElement("emergencyContactName","testval");
	$eventRegistration->appendChild($emergencyContactName);
	$emergencyContactNumber=$xml->createElement("emergencyContactNumber","testval");
	$eventRegistration->appendChild($emergencyContactNumber);
	$EVTchannel=$xml->createElement("channel","testval");
	$eventRegistration->appendChild($EVTchannel);
	$EVTsource=$xml->createElement("source","testval");
	$eventRegistration->appendChild($EVTsource);
	#standing orders
	$standingOrders=$xml->createElement("standingOrders");
	$supporter->appendChild($standingOrders);
	$SOamount=$xml->createElement("amount","testval");
	$standingOrders->appendChild($SOamount);	
	$SOaccountName=$xml->createElement("accountName","testval");
	$standingOrders->appendChild($SOaccountName);
	$SObankAccountNumber=$xml->createElement("bankAccountNumber","testval");
	$standingOrders->appendChild($SObankAccountNumber);
	$SObankSortCode=$xml->createElement("bankSortCode","testval");
	$standingOrders->appendChild($SObankSortCode);
	$SOcrukBankAccountCode=$xml->createElement("crukBankAccountCode","testval");
	$standingOrders->appendChild($SOcrukBankAccountCode);
	$SOfrequency=$xml->createElement("frequency","testval");
	$standingOrders->appendChild($SOfrequency);	
	$SOreference=$xml->createElement("reference","testval");
	$standingOrders->appendChild($SOreference);
	$SOsource=$xml->createElement("source","testval");
	$standingOrders->appendChild($SOsource);
	$SOstartDate=$xml->createElement("startDate","testval");
	$standingOrders->appendChild($SOstartDate);
	#Profiling Info
	$listOfProfilingInfo=$xml->createElement("listOfProfilingInfo");
	$supporter->appendChild($listOfProfilingInfo);
	$profilingInfo=$xml->createElement("profilingInfo");
	$listOfProfilingInfo->appendChild($profilingInfo);
	$codeLevel1=$xml->createElement("codeLevel1","testval");
	$profilingInfo->appendChild($codeLevel1);
	$codeLevel2=$xml->createElement("codeLevel2","testval");
	$profilingInfo->appendChild($codeLevel2);
	$Profsource=$xml->createElement("source","testval");
	$profilingInfo->appendChild($Profsource);
	$Profcomments=$xml->createElement("comments","testval");
	$profilingInfo->appendChild($Profcomments);
	$ProfstartDate=$xml->createElement("startDate","testval");
	$profilingInfo->appendChild($ProfstartDate);
	$siebelAttribute1=$xml->createElement("siebelAttribute1","testval");
	$profilingInfo->appendChild($siebelAttribute1);
	$siebelAttribute6=$xml->createElement("siebelAttribute6","testval");
	$profilingInfo->appendChild($siebelAttribute6);
	#Opportunity
	$listOfOpportunity=$xml->createElement("listOfOpportunity");
	$supporter->appendChild($listOfOpportunity);
	$opportunity=$xml->createElement("opportunity");
	$listOfOpportunity->appendChild($opportunity);
	$OptydataSource=$xml->createElement("dataSource","testval");
	$opportunity->appendChild($OptydataSource);
	$OptycrukReference=$xml->createElement("crukReference","testval");
	$opportunity->appendChild($OptycrukReference);
	$OptyexternalReference=$xml->createElement("externalReference","testval");
	$opportunity->appendChild($OptyexternalReference);
	$Optydepartment=$xml->createElement("department","testval");
	$opportunity->appendChild($Optydepartment);
	$journey=$xml->createElement("journey","testval");
	$opportunity->appendChild($journey);
	$stage=$xml->createElement("stage","testval");
	$opportunity->appendChild($stage);
	$Optysource=$xml->createElement("source","testval");
	$opportunity->appendChild($Optysource);
	$OptystartDate=$xml->createElement("startDate","testval");
	$opportunity->appendChild($OptystartDate);
	$optydescription=$xml->createElement("description","testval");
	$opportunity->appendChild($optydescription);
	$optylikelihood=$xml->createElement("likelihood","testval");
	$opportunity->appendChild($optylikelihood);
	$currency=$xml->createElement("currency","testval");
	$opportunity->appendChild($currency);
	#opty Product
	$listOfOpportunityProduct=$xml->createElement("listOfOpportunityProduct");
	$opportunity->appendChild($listOfOpportunityProduct);
	$opportunityProduct=$xml->createElement("opportunityProduct");
	$listOfOpportunityProduct->appendChild($opportunityProduct);
	$OProddataSource=$xml->createElement("dataSource","testval");
	$opportunityProduct->appendChild($OProddataSource);
	$OProdcrukReference=$xml->createElement("crukReference","testval");
	$opportunityProduct->appendChild($OProdcrukReference);
	$OProdexternalReference=$xml->createElement("externalReference","testval");
	$opportunityProduct->appendChild($OProdexternalReference);
	$OproddataSource=$xml->createElement("dataSource","testval");
	$opportunityProduct->appendChild($OproddataSource);
	$OpproductCode=$xml->createElement("productCode","testval");
	$opportunityProduct->appendChild($OpproductCode);
	$targetAmount=$xml->createElement("targetAmount","testval");
	$opportunityProduct->appendChild($targetAmount);
	$askAmount=$xml->createElement("askAmount","testval");
	$opportunityProduct->appendChild($askAmount);
	$askDate=$xml->createElement("askDate","testval");
	$opportunityProduct->appendChild($askDate);
	$percentage=$xml->createElement("percentage","testval");
	$opportunityProduct->appendChild($percentage);
	$agreedAmount=$xml->createElement("agreedAmount","testval");
	$opportunityProduct->appendChild($agreedAmount);
	$expectedDate=$xml->createElement("expectedDate","testval");
	$opportunityProduct->appendChild($expectedDate);
	$notes=$xml->createElement("notes","testval");
	$opportunityProduct->appendChild($notes);
	$OprodresCode=$xml->createElement("resCode","testval");
	$opportunityProduct->appendChild($OprodresCode);
	$motivation=$xml->createElement("motivation","testval");
	$opportunityProduct->appendChild($motivation);
	$inMemoryName=$xml->createElement("inMemoryName","testval");
	$opportunityProduct->appendChild($inMemoryName);
	#OpportunityActivities
	$listOfOpportunityActivities=$xml->createElement("listOfOpportunityActivities");
	$opportunity->appendChild($listOfOpportunityActivities);
	$opportunityActivities=$xml->createElement("opportunityActivities");
	$listOfOpportunityActivities->appendChild($opportunityActivities);
	$OpadataSource=$xml->createElement("dataSource","testval");
	$opportunityActivities->appendChild($OpadataSource);
	$Opatype=$xml->createElement("type","testval");
	$opportunityActivities->appendChild($Opatype);
	$subType=$xml->createElement("subType","testval");
	$opportunityActivities->appendChild($subType);
	$Opacategory=$xml->createElement("category","testval");
	$opportunityActivities->appendChild($Opacategory);
	$OpasubCategory=$xml->createElement("subCategory","testval");
	$opportunityActivities->appendChild($OpasubCategory);
	$Opadescription=$xml->createElement("description","testval");
	$opportunityActivities->appendChild($Opadescription);
	$Opacomments=$xml->createElement("comments","testval");
	$opportunityActivities->appendChild($Opacomments);
	$completedDate=$xml->createElement("completedDate","testval");
	$opportunityActivities->appendChild($completedDate);
	$Opastatus=$xml->createElement("status","testval");
	$opportunityActivities->appendChild($Opastatus);
	$OpastartDate=$xml->createElement("startDate","testval");
	$opportunityActivities->appendChild($OpastartDate);
	$OpaendDate=$xml->createElement("endDate","testval");
	$opportunityActivities->appendChild($OpaendDate);
	$Opasource=$xml->createElement("source","testval");
	$opportunityActivities->appendChild($Opasource);
}
#echo odbc_num_rows(odbc_exec($connect, $cou));
#echo "<xml>".$xml->saveXML()."</xml>";
$xml->formatOutput =true;
$xml->save("report.xml");
?>