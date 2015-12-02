<?php
Class Generic {
	public function core($query) {

					# query the users table for name and surname
					$sqlop = new db_connect();
					#truncate current table before reloading 
					$sqlop->db('truncate table DI_test_records');
					#insert the records into current table 
					$sqlop->db('insert into DI_test_records select * FROM DI_test_records_v');
					$result = $sqlop->db('SELECT  * FROM DI_test_records where rownum<2');
					# perform the query
					#$result = odbc_exec($connect, $query);


				$xml = new DOMDocument("1.0","utf-8");
				$xml->formatOutput =true;
				#$root = $xml->createElementNS('http://www.cancerresearchuk.org/di/r17/supplier/newdonate');
				$gen=$xml->createElementNS("http://www.cancerresearchuk.org/di/r17/supplier/generic","batch");
				$xml->appendChild($gen);
				$id=$xml->createElement("id",date('YmdHis'));
				$gen->appendChild($id);
				$ltran=$xml->createElement("listOfTransaction");
				$gen->appendChild($ltran);
				$tran=$xml->createElement("transaction");
				$ltran->appendChild($tran);
				while($row=odbc_fetch_row($result)){
					$Trefe=$xml->createElement("reference",date('YmdHis'));
					$tran->appendChild($Trefe);
					$supporter=$xml->createElement("supporter");
					$tran->appendChild($supporter);
					$dob = $xml->createElement("dateOfBirth",odbc_result($result, "SUPP_DATEOFBIRTH"));
					$supporter->appendChild($dob);
					$pExtRef = $xml->createElement("primaryExternalReferenceId",odbc_result($result, "SUPP_primaryExternalRefId"));
					$supporter->appendChild($pExtRef);
					$secondaryExternalReferenceId = $xml->createElement("secondaryExternalReferenceId",odbc_result($result, "SUPP_secondaryExternalRefId"));
					$supporter->appendChild($secondaryExternalReferenceId);
					$PDataSo = $xml->createElement("primaryDataSourceCode",odbc_result($result, "SUPP_primaryDataSourceCode"));
					$supporter->appendChild($PDataSo);
					$secondaryDataSourceCode = $xml->createElement("secondaryDataSourceCode",odbc_result($result, "SUPP_secondaryDataSourceCode"));
					$supporter->appendChild($secondaryDataSourceCode);	
					$fore=$xml->createElement("forename",odbc_result($result, "SUPP_forename"));
					$supporter->appendChild($fore);
					$gender=$xml->createElement("gender",odbc_result($result, "SUPP_gender"));
					$supporter->appendChild($gender);
					$initial=$xml->createElement("initial",odbc_result($result, "SUPP_initial"));
					$supporter->appendChild($initial);
					$SSdate = $xml->createElement("startDate",odbc_result($result, "SUPP_startDate"));
					$supporter->appendChild($SSdate);
					$SSource=$xml->createElement("source",odbc_result($result, "SUPP_source"));
					$supporter->appendChild($SSource);
					$SStatus=$xml->createElement("statusCode",odbc_result($result, "SUPP_statusCode"));
					$supporter->appendChild($SStatus);
					$SStDate=$xml->createElement("statusDate",odbc_result($result, "SUPP_statusDate"));
					$supporter->appendChild($SStDate);
					$suffix=$xml->createElement("suffix",odbc_result($result, "SUPP_suffix"));
					$supporter->appendChild($suffix);
					$SuppURN=$xml->createElement("supporterURN",odbc_result($result, "SUPP_supporterURN"));
					$supporter->appendChild($SuppURN);
					$surname=$xml->createElement("surname",odbc_result($result, "SUPP_surname"));
					$supporter->appendChild($surname);
					$Title=$xml->createElement("title",odbc_result($result, "SUPP_title"));
					$supporter->appendChild($Title);
					$changeofNameIndicator=$xml->createElement("changeofNameIndicator",odbc_result($result, "SUPP_changeofNameIndicator"));
					$supporter->appendChild($changeofNameIndicator);
					$nonTaxPayerFlag=$xml->createElement("nonTaxPayerFlag",odbc_result($result, "SUPP_nonTaxPayerFlag"));
					$supporter->appendChild($nonTaxPayerFlag);
					$nonTaxPayerStartDate=$xml->createElement("nonTaxPayerStartDate",odbc_result($result, "SUPP_nonTaxPayerStartDate"));
					$supporter->appendChild($nonTaxPayerStartDate);
					
					if (!empty(odbc_result($result,"SUPP_dateOfDeath"))) {
					$dateOfDeath=$xml->createElement("dateOfDeath",odbc_result($result, "SUPP_dateOfDeath"));
					$supporter->appendChild($dateOfDeath);
					} 
					if (!empty(odbc_result($result,"SUPP_deathNotificationDate"))) {
					$deathNotificationDate=$xml->createElement("deathNotificationDate",odbc_result($result, "SUPP_deathNotificationDate"));
					$supporter->appendChild($deathNotificationDate);
					} 
					
					$maritalStatus=$xml->createElement("maritalStatus",odbc_result($result, "SUPP_maritalStatus"));
					$supporter->appendChild($maritalStatus);
					$address=$xml->createElement("address");
					$supporter->appendChild($address);
					$addressLine1=$xml->createElement("addressLine1",odbc_result($result, "ADDR_addressLine1"));
					$address->appendChild($addressLine1);
					$addressLine2=$xml->createElement("addressLine2",odbc_result($result, "ADDR_addressLine2"));
					$address->appendChild($addressLine2);
					$addressLine3=$xml->createElement("addressLine3",odbc_result($result, "ADDR_addressLine3"));
					$address->appendChild($addressLine3);
					$addressLine4=$xml->createElement("addressLine4",odbc_result($result, "ADDR_addressLine4"));
					$address->appendChild($addressLine4);
					$cherishedAddressHouseName=$xml->createElement("cherishedAddressHouseName",odbc_result($result, "ADDR_cherishedAddressHN"));
					$address->appendChild($cherishedAddressHouseName);
					$city=$xml->createElement("city",odbc_result($result, "ADDR_city"));
					$address->appendChild($city);
					$country=$xml->createElement("country",odbc_result($result, "ADDR_country"));
					$address->appendChild($country);
					$county=$xml->createElement("county",odbc_result($result, "ADDR_county"));
					$address->appendChild($county);
					$postalCode=$xml->createElement("postalCode",odbc_result($result, "ADDR_postalCode"));
					$address->appendChild($postalCode);
					$startDate=$xml->createElement("startDate",odbc_result($result, "ADDR_startDate"));
					$address->appendChild($startDate);
					$validationStatus=$xml->createElement("validationStatus",odbc_result($result, "ADDR_validationStatus"));
					$address->appendChild($validationStatus);
					$newAddressIndicator=$xml->createElement("newAddressIndicator",odbc_result($result, "ADDR_newAddressIndicator"));
					$address->appendChild($newAddressIndicator);
					$secondaryAddresses=$xml->createElement("secondaryAddresses");
					$supporter->appendChild($secondaryAddresses);
					$saddresses=$xml->createElement("address");
					$secondaryAddresses->appendChild($saddresses);
					$saddressLine1=$xml->createElement("addressLine1",odbc_result($result, "SEC_ADDR_addressLine1"));
					$saddresses->appendChild($saddressLine1);
					$saddressLine2=$xml->createElement("addressLine2",odbc_result($result, "SEC_ADDR_addressLine2"));
					$saddresses->appendChild($saddressLine2);
					$saddressLine3=$xml->createElement("addressLine3",odbc_result($result, "SEC_ADDR_addressLine3"));
					$saddresses->appendChild($saddressLine3);
					$saddressLine4=$xml->createElement("addressLine4",odbc_result($result, "SEC_ADDR_addressLine4"));
					$saddresses->appendChild($saddressLine4);
					$scherishedAddressHouseName=$xml->createElement("cherishedAddressHouseName",odbc_result($result, "SEC_ADDR_cherishedAddressHN"));
					$saddresses->appendChild($scherishedAddressHouseName);
					$scity=$xml->createElement("city",odbc_result($result, "SEC_ADDR_city"));
					$saddresses->appendChild($scity);
					$scountry=$xml->createElement("country",odbc_result($result, "SEC_ADDR_country"));
					$saddresses->appendChild($scountry);
					$scounty=$xml->createElement("county",odbc_result($result, "SEC_ADDR_county"));
					$saddresses->appendChild($scounty);	
					$spostalCode=$xml->createElement("postalCode",odbc_result($result, "SEC_ADDR_postalCode"));
					$saddresses->appendChild($spostalCode);
					$astartDate=$xml->createElement("startDate",odbc_result($result, "SEC_ADDR_startDate"));
					$saddresses->appendChild($astartDate);
					$svalidationStatus=$xml->createElement("validationStatus",odbc_result($result, "SEC_ADDR_validationStatus"));
					$saddresses->appendChild($svalidationStatus);
					$snewAddressIndicator=$xml->createElement("newAddressIndicator",odbc_result($result, "SEC_ADDR_newAddressIndicator"));
					$saddresses->appendChild($snewAddressIndicator);
					$contactInfoP=$xml->createElement("contactInfo-Phone");
					$supporter->appendChild($contactInfoP);
					$phoneNumber=$xml->createElement("phoneNumber",odbc_result($result,"CONINFO_phoneNumber"));
					$contactInfoP->appendChild($phoneNumber);
					$contactInfoE=$xml->createElement("contactInfo-Email");
					$supporter->appendChild($contactInfoE);
					$emailAddress=$xml->createElement("emailAddress",odbc_result($result,"CONINFO_emailAddress"));
					$contactInfoE->appendChild($emailAddress);
					$contactInfoM=$xml->createElement("contactInfo-Mobile");
					$supporter->appendChild($contactInfoM);
					$mobileNumber=$xml->createElement("mobileNumber",odbc_result($result,"CONINFO_mobileNumber"));
					$contactInfoM->appendChild($mobileNumber);
					#GAD
					$giftAidDeclaration=$xml->createElement("giftAidDeclaration");
					$supporter->appendChild($giftAidDeclaration);
					$confirmedOn=$xml->createElement("confirmedOn",odbc_result($result,"GAD_confirmedOn"));
					$giftAidDeclaration->appendChild($confirmedOn);
					$declarationDate=$xml->createElement("declarationDate",odbc_result($result,"GAD_declarationDate"));
					$giftAidDeclaration->appendChild($declarationDate);
					$letterCode=$xml->createElement("letterCode",odbc_result($result,"GAD_letterCode"));
					$giftAidDeclaration->appendChild($letterCode);
					$method=$xml->createElement("method",odbc_result($result,"GAD_method"));
					$giftAidDeclaration->appendChild($method);
					$greference=$xml->createElement("reference",odbc_result($result,"GAD_reference"));
					$giftAidDeclaration->appendChild($greference);
					$gsource=$xml->createElement("source",odbc_result($result,"GAD_source"));
					$giftAidDeclaration->appendChild($gsource);
					$gstartDate=$xml->createElement("startDate",odbc_result($result,"GAD_startDate"));
					$giftAidDeclaration->appendChild($gstartDate);
					$gadType=$xml->createElement("gadType",odbc_result($result,"GAD_gadType"));
					$giftAidDeclaration->appendChild($gadType);
					#DD
					$directDebit=$xml->createElement("directDebit");
					$supporter->appendChild($directDebit);
					$accountName=$xml->createElement("accountName",odbc_result($result,"DD_accountName"));
					$directDebit->appendChild($accountName);
					$amount=$xml->createElement("amount",odbc_result($result,"DD_amount"));
					$directDebit->appendChild($amount);
					$bankAccountNumber=$xml->createElement("bankAccountNumber",odbc_result($result,"DD_bankAccountNumber"));
					$directDebit->appendChild($bankAccountNumber);
					$bankSortCode=$xml->createElement("bankSortCode",odbc_result($result,"DD_bankSortCode"));
					$directDebit->appendChild($bankSortCode);
					$bankAccountCode=$xml->createElement("bankAccountCode-CRUK",odbc_result($result,"DD_bankAccountCodeCRUK"));
					$directDebit->appendChild($bankAccountCode);
					$frequency=$xml->createElement("frequency",odbc_result($result,"DD_frequency"));
					$directDebit->appendChild($frequency);
					$product=$xml->createElement("product",odbc_result($result,"DD_product"));
					$directDebit->appendChild($product);
					$dreference=$xml->createElement("reference",odbc_result($result,"DD_reference"));
					$directDebit->appendChild($dreference);
					$resCode=$xml->createElement("resCode",odbc_result($result,"DD_resCode"));
					$directDebit->appendChild($resCode);
					$dsource=$xml->createElement("source",odbc_result($result,"DD_source"));
					$directDebit->appendChild($dsource);
					$dataSource=$xml->createElement("dataSource",odbc_result($result,"DD_dataSource"));
					$directDebit->appendChild($dataSource);
					$paymentDay=$xml->createElement("paymentDay",odbc_result($result,"DD_paymentDay"));
					$directDebit->appendChild($paymentDay);
					$dstartDate=$xml->createElement("startDate",odbc_result($result,"DD_startDate"));
					$directDebit->appendChild($dstartDate);
					$toBeGiftAided=$xml->createElement("toBeGiftAided",odbc_result($result,"DD_toBeGiftAided"));
					$directDebit->appendChild($toBeGiftAided);
					$letterCodeGAD=$xml->createElement("letterCodeGAD",odbc_result($result,"DD_letterCodeGAD"));
					$directDebit->appendChild($letterCodeGAD);	
					$methodGAD=$xml->createElement("methodGAD",odbc_result($result,"DD_methodGAD"));
					$directDebit->appendChild($methodGAD);
					$motivation=$xml->createElement("motivation",odbc_result($result,"DD_motivation"));
					$directDebit->appendChild($motivation);
					$inMemoryName=$xml->createElement("inMemoryName",odbc_result($result,"DD_inMemoryName"));
					$directDebit->appendChild($inMemoryName);
					$gadType=$xml->createElement("gadType",odbc_result($result,"DD_gadType"));
					$directDebit->appendChild($gadType);
					#Payments
					$listOfDonations=$xml->createElement("listOfDonations");
					$supporter->appendChild($listOfDonations);
					$donations=$xml->createElement("donations");
					$listOfDonations->appendChild($donations);
					$amount=$xml->createElement("amount",odbc_result($result,"Don_amount"));
					$donations->appendChild($amount);
					$bankAccountCode=$xml->createElement("bankAccountCode-CRUK",odbc_result($result,"Don_bankAccountCodeCRUK"));
					$donations->appendChild($bankAccountCode);
					$DdataSource=$xml->createElement("dataSource",odbc_result($result,"Don_dataSource"));
					$donations->appendChild($DdataSource);
					$dateReceived=$xml->createElement("dateReceived",odbc_result($result,"Don_dateReceived"));
					$donations->appendChild($dateReceived);
					$donationType=$xml->createElement("donationType",odbc_result($result,"Don_donationType"));
					$donations->appendChild($donationType);
					$DeventCode=$xml->createElement("eventCode",odbc_result($result,"Don_eventCode"));
					$donations->appendChild($DeventCode);
					$financialPaymentReference=$xml->createElement("financialPaymentReference",odbc_result($result,"Don_financialPaymentReference"));
					$donations->appendChild($financialPaymentReference);
					$DletterCode=$xml->createElement("letterCode",odbc_result($result,"Don_letterCode"));
					$donations->appendChild($DletterCode);
					$DresCode=$xml->createElement("resCode",odbc_result($result,"Don_resCode"));
					$donations->appendChild($DresCode);
					$paymentMethod=$xml->createElement("paymentMethod",odbc_result($result,"Don_paymentMethod"));
					$donations->appendChild($paymentMethod);
					$paymentStatus=$xml->createElement("paymentStatus",odbc_result($result,"Don_paymentStatus"));
					$donations->appendChild($paymentStatus);
					$personalGiftAid=$xml->createElement("personalGiftAid",odbc_result($result,"Don_personalGiftAid"));
					$donations->appendChild($personalGiftAid);
					$reasonNotGiftAid=$xml->createElement("reasonNotGiftAid",odbc_result($result,"Don_reasonNotGiftAid"));
					$donations->appendChild($reasonNotGiftAid);
					$Dproduct=$xml->createElement("product",odbc_result($result,"Don_product"));
					$donations->appendChild($Dproduct);
					$Dsource=$xml->createElement("source",odbc_result($result,"Don_source"));
					$donations->appendChild($Dsource);
					$DwebPageId=$xml->createElement("webPageId",odbc_result($result,"Don_webPageId"));
					$donations->appendChild($DwebPageId);
					$originatorPaymentID=$xml->createElement("originatorPaymentID",odbc_result($result,"Don_originatorPaymentID"));
					$donations->appendChild($originatorPaymentID);
					$DtoBeGiftAided=$xml->createElement("toBeGiftAided",odbc_result($result,"Don_toBeGiftAided"));
					$donations->appendChild($DtoBeGiftAided);
					$DletterCodeGAD=$xml->createElement("letterCodeGAD",odbc_result($result,"Don_letterCodeGAD"));
					$donations->appendChild($DletterCodeGAD);
					$DmethodGAD=$xml->createElement("methodGAD",odbc_result($result,"Don_methodGAD"));
					$donations->appendChild($DmethodGAD);
					$Dmotivation=$xml->createElement("motivation",odbc_result($result,"Don_motivation"));
					$donations->appendChild($Dmotivation);
					$DinMemoryName=$xml->createElement("inMemoryName",odbc_result($result,"Don_inMemoryName"));
					$donations->appendChild($DinMemoryName);
					$celebrantDataSource=$xml->createElement("celebrantDataSource",odbc_result($result,"Don_celebrantDataSource"));
					$donations->appendChild($celebrantDataSource);
					$celebrantExternalReference=$xml->createElement("celebrantExternalReference",odbc_result($result,"Don_celebrantExternalReference"));
					$donations->appendChild($celebrantExternalReference);
					$paymentProviderTransactionId=$xml->createElement("paymentProviderTransactionId",odbc_result($result,"Don_paymentProviderTransactId"));
					$donations->appendChild($paymentProviderTransactionId);
					$DgadType=$xml->createElement("gadType",odbc_result($result,"Don_gadType"));
					$donations->appendChild($DgadType);
					$excludefromAgresso=$xml->createElement("excludefromAgresso",odbc_result($result,"Don_excludefromAgresso"));
					$donations->appendChild($excludefromAgresso);
					#Suppressions
					$listOfSuppressionsPreferences=$xml->createElement("listOfSuppressionsPreferences");
					$supporter->appendChild($listOfSuppressionsPreferences);
					$suppressionsPreferences=$xml->createElement("suppressionsPreferences");
					$listOfSuppressionsPreferences->appendChild($suppressionsPreferences);
					$SendDate=$xml->createElement("endDate",odbc_result($result,"SuppPre_endDate"));
					$suppressionsPreferences->appendChild($SendDate);
					$SstartDate=$xml->createElement("startDate",odbc_result($result,"SuppPre_startDate"));
					$suppressionsPreferences->appendChild($SstartDate);
					$suppressionPreferenceCode=$xml->createElement("suppressionPreferenceCode",odbc_result($result,"SuppPre_suppressionPreCode"));
					$suppressionsPreferences->appendChild($suppressionPreferenceCode);
					$Ssource=$xml->createElement("source",odbc_result($result,"SuppPre_source"));
					$suppressionsPreferences->appendChild($Ssource);
					#Campaign
					$listOfCampaignMembership=$xml->createElement("listOfCampaignMembership");
					$supporter->appendChild($listOfCampaignMembership);
					$campaignMembership=$xml->createElement("campaignMembership");
					$listOfCampaignMembership->appendChild($campaignMembership);
					$campaignCode=$xml->createElement("campaignCode",odbc_result($result,"Camp_campaignCode"));
					$campaignMembership->appendChild($campaignCode);
					$contactedOn=$xml->createElement("contactedOn",odbc_result($result,"Camp_contactedOn"));
					$campaignMembership->appendChild($contactedOn);
					$outcome=$xml->createElement("outcome",odbc_result($result,"Camp_outcome"));
					$campaignMembership->appendChild($outcome);
					$versionCode=$xml->createElement("versionCode",odbc_result($result,"Camp_versionCode"));
					$campaignMembership->appendChild($versionCode);
					$campaignRecipientToken=$xml->createElement("campaignRecipientToken",substr(odbc_result($result,"Camp_campaignRecipient"),-5));
					$campaignMembership->appendChild($campaignRecipientToken);
					#Actitvites
					$listOfMailingActivities=$xml->createElement("listOfMailingActivities");
					$supporter->appendChild($listOfMailingActivities);
					$mailingActivities=$xml->createElement("mailingActivities");
					$listOfMailingActivities->appendChild($mailingActivities);
					$category=$xml->createElement("category",odbc_result($result,"Act_category"));
					$mailingActivities->appendChild($category);
					$ACTendDate=$xml->createElement("endDate",odbc_result($result,"Act_endDate"));
					$mailingActivities->appendChild($ACTendDate);
					$ACTletterCode=$xml->createElement("letterCode",odbc_result($result,"Act_letterCode"));
					$mailingActivities->appendChild($ACTletterCode);
					$originatorActivityID=$xml->createElement("originatorActivityID",odbc_result($result,"Act_originatorActivityID"));
					$mailingActivities->appendChild($originatorActivityID);
					#Event Registration
					$listOfEventRegistration=$xml->createElement("listOfEventRegistration");
					$supporter->appendChild($listOfEventRegistration);
					$eventRegistration=$xml->createElement("eventRegistration");
					$listOfEventRegistration->appendChild($eventRegistration);
					$EVTeventCode=$xml->createElement("eventCode",odbc_result($result,"EVT_eventCode"));
					$eventRegistration->appendChild($EVTeventCode);
					$registrationNumber=$xml->createElement("registrationNumber",odbc_result($result,"EVT_registrationNumber"));
					$eventRegistration->appendChild($registrationNumber);
					$entryType=$xml->createElement("entryType",odbc_result($result,"EVT_entryType"));
					$eventRegistration->appendChild($entryType);
					$entryFeeStatus=$xml->createElement("entryFeeStatus",odbc_result($result,"EVT_entryFeeStatus"));
					$eventRegistration->appendChild($entryFeeStatus);
					$cancerType=$xml->createElement("cancerType",odbc_result($result,"EVT_cancerType"));
					$eventRegistration->appendChild($cancerType);
					$fundraisingPageId=$xml->createElement("fundraisingPageId",odbc_result($result,"EVT_fundraisingPageId"));
					$eventRegistration->appendChild($fundraisingPageId);
					$fundraisingPageType=$xml->createElement("fundraisingPageType",odbc_result($result,"EVT_fundraisingPageType"));
					$eventRegistration->appendChild($fundraisingPageType);
					$fundraisingPageUrl=$xml->createElement("fundraisingPageUrl",odbc_result($result,"EVT_fundraisingPageUrl"));
					$eventRegistration->appendChild($fundraisingPageUrl);
					$howHeardAbout=$xml->createElement("howHeardAbout",odbc_result($result,"EVT_howHeardAbout"));
					$eventRegistration->appendChild($howHeardAbout);
					$inviteSource=$xml->createElement("inviteSource",odbc_result($result,"EVT_inviteSource"));
					$eventRegistration->appendChild($inviteSource);
					$motivation=$xml->createElement("motivation",odbc_result($result,"EVT_motivation"));
					$eventRegistration->appendChild($motivation);
					$participationType=$xml->createElement("participationType",odbc_result($result,"EVT_participationType"));
					$eventRegistration->appendChild($participationType);
					$placeType=$xml->createElement("placeType",odbc_result($result,"EVT_placeType"));
					$eventRegistration->appendChild($placeType);
					$pledgeAmount=$xml->createElement("pledgeAmount",odbc_result($result,"EVT_pledgeAmount"));
					$eventRegistration->appendChild($pledgeAmount);
					$EVTregistered=$xml->createElement("registered",odbc_result($result,"EVT_registered"));
					$eventRegistration->appendChild($EVTregistered);
					$registrationStatus=$xml->createElement("registrationStatus",odbc_result($result,"EVT_registrationStatus"));
					$eventRegistration->appendChild($registrationStatus);
					$supporterRegistrationType=$xml->createElement("supporterRegistrationType",odbc_result($result,"EVT_supporterRegistrationType"));
					$eventRegistration->appendChild($supporterRegistrationType);
					$survivorshipActivities=$xml->createElement("survivorshipActivities",odbc_result($result,"EVT_survivorshipActivities"));
					$eventRegistration->appendChild($survivorshipActivities);
					$runningNumber=$xml->createElement("runningNumber",substr(odbc_result($result,"EVT_runningNumber"),-8));
					$eventRegistration->appendChild($runningNumber);
					$groupName=$xml->createElement("groupName",odbc_result($result,"EVT_groupName"));
					$eventRegistration->appendChild($groupName);
					$groupRole=$xml->createElement("groupRole",odbc_result($result,"EVT_groupRole"));
					$eventRegistration->appendChild($groupRole);
					$emergencyContactName=$xml->createElement("emergencyContactName",odbc_result($result,"EVT_emergencyContactName"));
					$eventRegistration->appendChild($emergencyContactName);
					$emergencyContactNumber=$xml->createElement("emergencyContactNumber",odbc_result($result,"EVT_emergencyContactNumber"));
					$eventRegistration->appendChild($emergencyContactNumber);
					$EVTchannel=$xml->createElement("channel",odbc_result($result,"EVT_channel"));
					$eventRegistration->appendChild($EVTchannel);
					$EVTsource=$xml->createElement("source",odbc_result($result,"EVT_source"));
					$eventRegistration->appendChild($EVTsource);
					#Event Reg Packs
					$listOfRegistrationPack=$xml->createElement("listOfRegistrationPack");
					$eventRegistration->appendChild($listOfRegistrationPack);
					$registrationPack=$xml->createElement("registrationPack");
					$listOfRegistrationPack->appendChild($registrationPack);
					$merchandiseProductCode=$xml->createElement("merchandiseProductCode",odbc_result($result,"EVTPack_merchanProductCode"));
					$registrationPack->appendChild($merchandiseProductCode);
					$quantity=$xml->createElement("quantity",odbc_result($result,"EVTPack_quantity"));
					$registrationPack->appendChild($quantity);
					#standing orders
					$standingOrders=$xml->createElement("standingOrders");
					$supporter->appendChild($standingOrders);
					$SOamount=$xml->createElement("amount",odbc_result($result,"SO_amount"));
					$standingOrders->appendChild($SOamount);	
					$SOaccountName=$xml->createElement("accountName",odbc_result($result,"SO_accountName"));
					$standingOrders->appendChild($SOaccountName);
					$SObankAccountNumber=$xml->createElement("bankAccountNumber",odbc_result($result,"SO_bankAccountNumber"));
					$standingOrders->appendChild($SObankAccountNumber);
					$SObankSortCode=$xml->createElement("bankSortCode",odbc_result($result,"SO_bankSortCode"));
					$standingOrders->appendChild($SObankSortCode);
					$SOcrukBankAccountCode=$xml->createElement("crukBankAccountCode",odbc_result($result,"SO_crukBankAccountCode"));
					$standingOrders->appendChild($SOcrukBankAccountCode);
					$SOfrequency=$xml->createElement("frequency",odbc_result($result,"SO_frequency"));
					$standingOrders->appendChild($SOfrequency);	
					$SOreference=$xml->createElement("reference",odbc_result($result,"SO_reference"));
					$standingOrders->appendChild($SOreference);
					$SOsource=$xml->createElement("source",odbc_result($result,"SO_source"));
					$standingOrders->appendChild($SOsource);
					$SOstartDate=$xml->createElement("startDate",odbc_result($result,"SO_startDate"));
					$standingOrders->appendChild($SOstartDate);
					#Profiling Info
					$listOfProfilingInfo=$xml->createElement("listOfProfilingInfo");
					$supporter->appendChild($listOfProfilingInfo);
					$profilingInfo=$xml->createElement("profilingInfo");
					$listOfProfilingInfo->appendChild($profilingInfo);
					$codeLevel1=$xml->createElement("codeLevel1",odbc_result($result,"Pinfo_codeLevel1"));
					$profilingInfo->appendChild($codeLevel1);
					$codeLevel2=$xml->createElement("codeLevel2",odbc_result($result,"Pinfo_codeLevel2"));
					$profilingInfo->appendChild($codeLevel2);
					$Profsource=$xml->createElement("source",odbc_result($result,"Pinfo_source"));
					$profilingInfo->appendChild($Profsource);
					$Profcomments=$xml->createElement("comments",odbc_result($result,"Pinfo_comments"));
					$profilingInfo->appendChild($Profcomments);
					$ProfstartDate=$xml->createElement("startDate",odbc_result($result,"Pinfo_startDate"));
					$profilingInfo->appendChild($ProfstartDate);
					$ProfendDate=$xml->createElement("endDate",odbc_result($result,"Pinfo_endDate"));
					$profilingInfo->appendChild($ProfendDate);
					$siebelAttribute1=$xml->createElement("siebelAttribute1",odbc_result($result,"Pinfo_siebelAttribute1"));
					$profilingInfo->appendChild($siebelAttribute1);
					$siebelAttribute6=$xml->createElement("siebelAttribute6",odbc_result($result,"Pinfo_siebelAttribute6"));
					$profilingInfo->appendChild($siebelAttribute6);
					#Opportunity
					$listOfOpportunity=$xml->createElement("listOfOpportunity");
					$supporter->appendChild($listOfOpportunity);
					$opportunity=$xml->createElement("opportunity");
					$listOfOpportunity->appendChild($opportunity);
					$OptydataSource=$xml->createElement("dataSource",odbc_result($result,"Oppty_dataSource"));
					$opportunity->appendChild($OptydataSource);
					
					#Choice element on opty 

					if (!empty(odbc_result($result,"Oppty_crukReference")) and   !empty(odbc_result($result,"Oppty_externalReference"))) {
							$OptycrukReference=$xml->createElement("crukReference",odbc_result($result,"Oppty_crukReference"));
							$opportunity->appendChild($OptycrukReference);
							$OptyexternalReference=$xml->createElement("externalReference",odbc_result($result,"Oppty_externalReference"));
							$opportunity->appendChild($OptyexternalReference);
					} 
					elseif (empty(odbc_result($result,"Oppty_crukReference")) and   !empty(odbc_result($result,"Oppty_externalReference"))) {
							$OptyexternalReference=$xml->createElement("externalReference",odbc_result($result,"Oppty_externalReference"));
							$opportunity->appendChild($OptyexternalReference);
					}
					elseif (!empty(odbc_result($result,"Oppty_crukReference")) and   empty(odbc_result($result,"Oppty_externalReference"))) {
							$OptycrukReference=$xml->createElement("crukReference",odbc_result($result,"Oppty_crukReference"));
							$opportunity->appendChild($OptycrukReference);
					}
					elseif (empty(odbc_result($result,"Oppty_crukReference")) and   empty(odbc_result($result,"Oppty_externalReference"))) {
							$OptycrukReference=$xml->createElement("crukReference",odbc_result($result,"Oppty_crukReference"));
							$opportunity->appendChild($OptycrukReference);
							$OptyexternalReference=$xml->createElement("externalReference",odbc_result($result,"Oppty_externalReference"));
							$opportunity->appendChild($OptyexternalReference);
						 }
					
					
					$Optydepartment=$xml->createElement("department",odbc_result($result,"Oppty_department"));
					$opportunity->appendChild($Optydepartment);
					$journey=$xml->createElement("journey",odbc_result($result,"Oppty_journey"));
					$opportunity->appendChild($journey);
					$stage=$xml->createElement("stage",odbc_result($result,"Oppty_stage"));
					$opportunity->appendChild($stage);
					$Optysource=$xml->createElement("source",odbc_result($result,"Oppty_source"));
					$opportunity->appendChild($Optysource);
					$OptystartDate=$xml->createElement("startDate",odbc_result($result,"Oppty_startDate"));
					$opportunity->appendChild($OptystartDate);
					$optydescription=$xml->createElement("description",odbc_result($result,"Oppty_description"));
					$opportunity->appendChild($optydescription);
					$optylikelihood=$xml->createElement("likelihood",odbc_result($result,"Oppty_likelihood"));
					$opportunity->appendChild($optylikelihood);
					$currency=$xml->createElement("currency",odbc_result($result,"Oppty_currency"));
					$opportunity->appendChild($currency);
					$OptyendDate=$xml->createElement("endDate",odbc_result($result,"Oppty_endDate"));
					$opportunity->appendChild($OptyendDate);
					$OreasonForClosure=$xml->createElement("reasonForClosure",odbc_result($result,"Oppty_reasonForClosure"));
					$opportunity->appendChild($OreasonForClosure);
					$OclosureSummary=$xml->createElement("closureSummary",odbc_result($result,"Oppty_closureSummary"));
					$opportunity->appendChild($OclosureSummary);
					#opty Product
					$listOfOpportunityProduct=$xml->createElement("listOfOpportunityProduct");
					$opportunity->appendChild($listOfOpportunityProduct);
					$opportunityProduct=$xml->createElement("opportunityProduct");
					$listOfOpportunityProduct->appendChild($opportunityProduct);
					
					#Choice element on opty Product

					if (!empty(odbc_result($result,"OpptyProd_crukReference")) and   !empty(odbc_result($result,"OpptyProd_externalReference"))) {
							$OProdcrukReference=$xml->createElement("crukReference",odbc_result($result,"OpptyProd_crukReference"));
							$opportunityProduct->appendChild($OProdcrukReference);
							$OProdexternalReference=$xml->createElement("externalReference",odbc_result($result,"OpptyProd_externalReference"));
							$opportunityProduct->appendChild($OProdexternalReference);
					} 
					elseif (empty(odbc_result($result,"OpptyProd_crukReference")) and   !empty(odbc_result($result,"OpptyProd_externalReference")))  {
							$OProdexternalReference=$xml->createElement("externalReference",odbc_result($result,"OpptyProd_externalReference"));
							$opportunityProduct->appendChild($OProdexternalReference);
					}
					elseif (!empty(odbc_result($result,"OpptyProd_crukReference")) and   empty(odbc_result($result,"OpptyProd_externalReference")))  {
							$OProdcrukReference=$xml->createElement("crukReference",odbc_result($result,"OpptyProd_crukReference"));
							$opportunityProduct->appendChild($OProdcrukReference);
					}
					elseif (empty(odbc_result($result,"OpptyProd_crukReference")) and   empty(odbc_result($result,"OpptyProd_externalReference")))  {
							$OProdcrukReference=$xml->createElement("crukReference",odbc_result($result,"OpptyProd_crukReference"));
							$opportunityProduct->appendChild($OProdcrukReference);
							$OProdexternalReference=$xml->createElement("externalReference",odbc_result($result,"OpptyProd_externalReference"));
							$opportunityProduct->appendChild($OProdexternalReference);
						 }
					
					
					$OproddataSource=$xml->createElement("dataSource",odbc_result($result,"OpptyProd_dataSource"));
					$opportunityProduct->appendChild($OproddataSource);
					$OpproductCode=$xml->createElement("productCode",odbc_result($result,"OpptyProd_productCode"));
					$opportunityProduct->appendChild($OpproductCode);
					$targetAmount=$xml->createElement("targetAmount",odbc_result($result,"OpptyProd_targetAmount"));
					$opportunityProduct->appendChild($targetAmount);
					$askAmount=$xml->createElement("askAmount",odbc_result($result,"OpptyProd_askAmount"));
					$opportunityProduct->appendChild($askAmount);
					$askDate=$xml->createElement("askDate",odbc_result($result,"OpptyProd_askDate"));
					$opportunityProduct->appendChild($askDate);
					$percentage=$xml->createElement("percentage",odbc_result($result,"OpptyProd_percentage"));
					$opportunityProduct->appendChild($percentage);
					$agreedAmount=$xml->createElement("agreedAmount",odbc_result($result,"OpptyProd_agreedAmount"));
					$opportunityProduct->appendChild($agreedAmount);
					$expectedDate=$xml->createElement("expectedDate",odbc_result($result,"OpptyProd_expectedDate"));
					$opportunityProduct->appendChild($expectedDate);
					$notes=$xml->createElement("notes",odbc_result($result,"OpptyProd_notes"));
					$opportunityProduct->appendChild($notes);
					$OprodresCode=$xml->createElement("resCode",odbc_result($result,"OpptyProd_resCode"));
					$opportunityProduct->appendChild($OprodresCode);
					$motivation=$xml->createElement("motivation",odbc_result($result,"OpptyProd_motivation"));
					$opportunityProduct->appendChild($motivation);
					$inMemoryName=$xml->createElement("inMemoryName",odbc_result($result,"OpptyProd_inMemoryName"));
					$opportunityProduct->appendChild($inMemoryName);
					#OpportunityActivities
					$listOfOpportunityActivities=$xml->createElement("listOfOpportunityActivities");
					$opportunity->appendChild($listOfOpportunityActivities);
					$opportunityActivities=$xml->createElement("opportunityActivities");
					$listOfOpportunityActivities->appendChild($opportunityActivities);
					
					
					#Choice element on opty Product

					if (!empty(odbc_result($result,"OpptyAct_crukReference")) and   !empty(odbc_result($result,"OpptyAct_externalReference"))) {
							$OActcrukReference=$xml->createElement("crukReference",odbc_result($result,"OpptyAct_crukReference"));
							$opportunityActivities->appendChild($OActcrukReference);
							$OActexternalReference=$xml->createElement("externalReference",odbc_result($result,"OpptyAct_externalReference"));
							$opportunityActivities->appendChild($OActexternalReference);
					} 
					elseif (empty(odbc_result($result,"OpptyAct_crukReference")) and   !empty(odbc_result($result,"OpptyAct_externalReference")))  {
							$OActexternalReference=$xml->createElement("externalReference",odbc_result($result,"OpptyAct_externalReference"));
							$opportunityActivities->appendChild($OActexternalReference);
					}
					elseif (!empty(odbc_result($result,"OpptyAct_crukReference")) and   empty(odbc_result($result,"OpptyAct_externalReference")))  {
							$OActcrukReference=$xml->createElement("crukReference",odbc_result($result,"OpptyAct_crukReference"));
							$opportunityActivities->appendChild($OActcrukReference);
					}
					elseif (empty(odbc_result($result,"OpptyAct_crukReference")) and   empty(odbc_result($result,"OpptyAct_externalReference")))  {
							$OActcrukReference=$xml->createElement("crukReference",odbc_result($result,"OpptyAct_crukReference"));
							$opportunityActivities->appendChild($OActcrukReference);
							$OActexternalReference=$xml->createElement("externalReference",odbc_result($result,"OpptyAct_externalReference"));
							$opportunityActivities->appendChild($OActexternalReference);
						 }
					
					
					
					
					$OpadataSource=$xml->createElement("dataSource",odbc_result($result,"OpptyAct_dataSource"));
					$opportunityActivities->appendChild($OpadataSource);
					$Opatype=$xml->createElement("type",odbc_result($result,"OpptyAct_type"));
					$opportunityActivities->appendChild($Opatype);
					$subType=$xml->createElement("subType",odbc_result($result,"OpptyAct_subType"));
					$opportunityActivities->appendChild($subType);
					$Opacategory=$xml->createElement("category",odbc_result($result,"OpptyAct_category"));
					$opportunityActivities->appendChild($Opacategory);
					$OpasubCategory=$xml->createElement("subCategory",odbc_result($result,"OpptyAct_subCategory"));
					$opportunityActivities->appendChild($OpasubCategory);
					$Opadescription=$xml->createElement("description",odbc_result($result,"OpptyAct_description"));
					$opportunityActivities->appendChild($Opadescription);
					$Opacomments=$xml->createElement("comments",odbc_result($result,"OpptyAct_comments"));
					$opportunityActivities->appendChild($Opacomments);
					$completedDate=$xml->createElement("completedDate",odbc_result($result,"OpptyAct_completedDate"));
					$opportunityActivities->appendChild($completedDate);
					$Opastatus=$xml->createElement("status",odbc_result($result,"OpptyAct_status"));
					$opportunityActivities->appendChild($Opastatus);
					$OpastartDate=$xml->createElement("startDate",odbc_result($result,"OpptyAct_startDate"));
					$opportunityActivities->appendChild($OpastartDate);
					$OpaendDate=$xml->createElement("endDate",odbc_result($result,"OpptyAct_endDate"));
					$opportunityActivities->appendChild($OpaendDate);
					$Opasource=$xml->createElement("source",odbc_result($result,"OpptyAct_source"));
					$opportunityActivities->appendChild($Opasource);
				}
				#echo odbc_num_rows(odbc_exec($connect, $cou));
				#echo "<xml>".$xml->saveXML()."</xml>";
				$xml->formatOutput =true;
				$xml->save("report.xml");
		}
}
?>