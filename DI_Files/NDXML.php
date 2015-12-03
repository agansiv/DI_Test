<?php
Class NewDonate {
	public function ND($query) {

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
				$gen=$xml->createElementNS("http://www.cancerresearchuk.org/di/r17/supplier/newdonate","transaction");
				$xml->appendChild($gen);
				$Trefe=$xml->createElement("reference","testval");
				$gen->appendChild($Trefe);
			While($row=odbc_fetch_row($result)){
					$supporter=$xml->createElement("supporter");
					$gen->appendChild($supporter);
					$pExtRef = $xml->createElement("primaryExternalReferenceId",odbc_result($result, "SUPP_primaryExternalRefId"));
					$supporter->appendChild($pExtRef);
					$PDataSo = $xml->createElement("primaryDataSourceCode",odbc_result($result, "SUPP_primaryDataSourceCode"));
					$supporter->appendChild($PDataSo);
					$fore=$xml->createElement("forename",odbc_result($result, "SUPP_forename"));
					$supporter->appendChild($fore);
					$SSdate = $xml->createElement("startDate",odbc_result($result, "SUPP_startDate"));
					$supporter->appendChild($SSdate);
					$SSource=$xml->createElement("source",odbc_result($result, "SUPP_source"));
					$supporter->appendChild($SSource);
					$SStatus=$xml->createElement("statusCode",odbc_result($result, "SUPP_statusCode"));
					$supporter->appendChild($SStatus);
					$SStDate=$xml->createElement("statusDate",odbc_result($result, "SUPP_statusDate"));
					$supporter->appendChild($SStDate);
					$surname=$xml->createElement("surname",odbc_result($result, "SUPP_surname"));
					$supporter->appendChild($surname);
					$Title=$xml->createElement("title",odbc_result($result, "SUPP_title"));
					$supporter->appendChild($Title);
					#Address
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
					#Contact Info
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
					$dsource=$xml->createElement("source",odbc_result($result,"DD_source"));
					$directDebit->appendChild($dsource);
					$paymentDay=$xml->createElement("paymentDay",odbc_result($result,"DD_paymentDay"));
					$directDebit->appendChild($paymentDay);
					$toBeGiftAided=$xml->createElement("toBeGiftAided",odbc_result($result,"DD_toBeGiftAided"));
					$directDebit->appendChild($toBeGiftAided);
					$letterCodeGAD=$xml->createElement("letterCodeGAD",odbc_result($result,"DD_letterCodeGAD"));
					$directDebit->appendChild($letterCodeGAD);	
					$methodGAD=$xml->createElement("methodGAD",odbc_result($result,"DD_methodGAD"));
					$directDebit->appendChild($methodGAD);
					$inMemoryName=$xml->createElement("inMemoryName",odbc_result($result,"DD_inMemoryName"));
					$directDebit->appendChild($inMemoryName);
					$motivation=$xml->createElement("motivation",odbc_result($result,"DD_motivation"));
					$directDebit->appendChild($motivation);
					$dataSource=$xml->createElement("dataSource",odbc_result($result,"DD_dataSource"));
					$directDebit->appendChild($dataSource);
					$resCode=$xml->createElement("resCode",odbc_result($result,"DD_resCode"));
					$directDebit->appendChild($resCode);
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
					$financialPaymentReference=$xml->createElement("financialPaymentReference",odbc_result($result,"Don_financialPaymentReference"));
					$donations->appendChild($financialPaymentReference);
					$DletterCode=$xml->createElement("letterCode",odbc_result($result,"Don_letterCode"));
					$donations->appendChild($DletterCode);
					$paymentMethod=$xml->createElement("paymentMethod",odbc_result($result,"Don_paymentMethod"));
					$donations->appendChild($paymentMethod);
					$paymentStatus=$xml->createElement("paymentStatus",odbc_result($result,"Don_paymentStatus"));
					$donations->appendChild($paymentStatus);
					$personalGiftAid=$xml->createElement("personalGiftAid",odbc_result($result,"Don_personalGiftAid"));
					$donations->appendChild($personalGiftAid);
					$Dproduct=$xml->createElement("product",odbc_result($result,"Don_product"));
					$donations->appendChild($Dproduct);
					$Dsource=$xml->createElement("source",odbc_result($result,"Don_source"));
					$donations->appendChild($Dsource);
					$DthankingStatus=$xml->createElement("thankingStatus",odbc_result($result,"Don_webPageId"));
					$donations->appendChild($DthankingStatus);
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
					$paymentProviderTransactionId=$xml->createElement("paymentProviderTransactionId",odbc_result($result,"Don_paymentProviderTransactId"));
					$donations->appendChild($paymentProviderTransactionId);
					$DresCode=$xml->createElement("resCode",odbc_result($result,"DD_resCode"));
					$donations->appendChild($DresCode);
					$DgadType=$xml->createElement("gadType",odbc_result($result,"Don_gadType"));
					$donations->appendChild($DgadType);
					$DeventCode=$xml->createElement("eventCode",odbc_result($result,"Don_eventCode"));
					$donations->appendChild($DeventCode);
					#Suppressions
					$listOfSuppressionsPreferences=$xml->createElement("listOfSuppressionsPreferences");
					$supporter->appendChild($listOfSuppressionsPreferences);
					$suppressionsPreferences=$xml->createElement("suppressionsPreferences");
					$listOfSuppressionsPreferences->appendChild($suppressionsPreferences);
					$SstartDate=$xml->createElement("startDate",odbc_result($result,"SuppPre_startDate"));
					$suppressionsPreferences->appendChild($SstartDate);
					$suppressionPreferenceCode=$xml->createElement("suppressionPreferenceCode",odbc_result($result,"SuppPre_suppressionPreCode"));
					$suppressionsPreferences->appendChild($suppressionPreferenceCode);
					$Ssource=$xml->createElement("source",odbc_result($result,"SuppPre_source"));
					$suppressionsPreferences->appendChild($Ssource);
					#Actitvites
					$listOfMailingActivities=$xml->createElement("listOfMailingActivities");
					$supporter->appendChild($listOfMailingActivities);
					$mailingActivities=$xml->createElement("mailingActivities");
					$listOfMailingActivities->appendChild($mailingActivities);
					$originatorActivityID=$xml->createElement("originatorActivityID",odbc_result($result,"Act_originatorActivityID"));
					$mailingActivities->appendChild($originatorActivityID);
					$category=$xml->createElement("category",odbc_result($result,"Act_category"));
					$mailingActivities->appendChild($category);
					$ACTendDate=$xml->createElement("endDate",odbc_result($result,"Act_endDate"));
					$mailingActivities->appendChild($ACTendDate);
					$ACTletterCode=$xml->createElement("letterCode",odbc_result($result,"Act_letterCode"));
					$mailingActivities->appendChild($ACTletterCode);
					
					
								}
				#echo odbc_num_rows(odbc_exec($connect, $cou));
				#echo "<xml>".$xml->saveXML()."</xml>";
				$xml->formatOutput =true;
				$xml->save("reportND.xml");
		}
}
?>