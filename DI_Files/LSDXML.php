<?php
Class LSDs {
	public function LSD($query) {

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
				$gen=$xml->createElementNS("http://www.cancerresearchuk.org/di/r19/supplier/lsd","batch");
				$xml->appendChild($gen);
				$id=$xml->createElement("id",date('YmdHis'));
				$gen->appendChild($id);
				$ltran=$xml->createElement("listOfTransaction");
				$gen->appendChild($ltran);
				$tran=$xml->createElement("transaction");
				$ltran->appendChild($tran);
				while($row=odbc_fetch_row($result)){
					$Trefe=$xml->createElement("externalTransactionId",date('YmdHis'));
					$tran->appendChild($Trefe);
					$supporter=$xml->createElement("supporter");
					$tran->appendChild($supporter);
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
					$SuppURN=$xml->createElement("supporterURN",odbc_result($result, "SUPP_supporterURN"));
					$supporter->appendChild($SuppURN);
					$surname=$xml->createElement("surname",odbc_result($result, "SUPP_surname"));
					$supporter->appendChild($surname);
					$lsdFlag=$xml->createElement("lsdFlag",odbc_result($result, "SUPP_lsdFlag"));
					$supporter->appendChild($lsdFlag);
					$lsdIdentifier=$xml->createElement("lsdIdentifier",odbc_result($result, "SUPP_lsdIdentifier"));
					$supporter->appendChild($lsdIdentifier);
					$lsdType=$xml->createElement("lsdType",odbc_result($result, "SUPP_lsdType"));
					$supporter->appendChild($lsdType);
					#Contact Info
					$contactInfoE=$xml->createElement("contactInfo-Email");
					$supporter->appendChild($contactInfoE);
					$emailAddress=$xml->createElement("emailAddress",odbc_result($result,"CONINFO_emailAddress"));
					$contactInfoE->appendChild($emailAddress);
					$contactInfoM=$xml->createElement("contactInfo-Mobile");
					$supporter->appendChild($contactInfoM);
					$mobileNumber=$xml->createElement("mobileNumber",odbc_result($result,"CONINFO_mobileNumber"));
					$contactInfoM->appendChild($mobileNumber);
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
					$dateReceived=$xml->createElement("dateReceived",odbc_result($result,"Don_dateReceived")."T13:11:20");
					$donations->appendChild($dateReceived);
					$donationType=$xml->createElement("donationType",odbc_result($result,"Don_donationType"));
					$donations->appendChild($donationType);
					$financialPaymentReference=$xml->createElement("financialPaymentReference",odbc_result($result,"Don_financialPaymentReference"));
					$donations->appendChild($financialPaymentReference);
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
					$originatorPaymentID=$xml->createElement("originatorPaymentID",odbc_result($result,"Don_originatorPaymentID"));
					$donations->appendChild($originatorPaymentID);
					$DreasonNotGiftAid=$xml->createElement("reasonNotGiftAid",odbc_result($result,"Don_toBeGiftAided"));
					$donations->appendChild($DreasonNotGiftAid);
					$shortCode=$xml->createElement("shortCode",odbc_result($result,"Don_shortCode"));
					$donations->appendChild($shortCode);
					$statusDelay=$xml->createElement("statusDelay",odbc_result($result,"Don_statusDelay"));
					$donations->appendChild($statusDelay);
					$statusDelayUnit=$xml->createElement("statusDelayUnit",odbc_result($result,"Don_statusDelayUnit"));
					$donations->appendChild($statusDelayUnit);
					$mobileOperator=$xml->createElement("mobileOperator",odbc_result($result,"Don_mobileOperator"));
					$donations->appendChild($mobileOperator);
					$keyword=$xml->createElement("keyword",odbc_result($result,"Don_keyword"));
					$donations->appendChild($keyword);
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
					#Campaign
					$listOfCampaignMembership=$xml->createElement("listOfCampaignMembership");
					$supporter->appendChild($listOfCampaignMembership);
					$campaignMembership=$xml->createElement("campaignMembership");
					$listOfCampaignMembership->appendChild($campaignMembership);
					$campaignCode=$xml->createElement("campaignCode",odbc_result($result,"Camp_campaignCode"));
					$campaignMembership->appendChild($campaignCode);
					$outcome=$xml->createElement("outcome",odbc_result($result,"Camp_outcome"));
					$campaignMembership->appendChild($outcome);
					$versionCode=$xml->createElement("versionCode",odbc_result($result,"Camp_versionCode"));
					$campaignMembership->appendChild($versionCode);
					$campaignRecipientToken=$xml->createElement("campaignRecipientToken",substr(odbc_result($result,"Camp_campaignRecipient"),-5));
					$campaignMembership->appendChild($campaignRecipientToken);
					
				}
				#echo odbc_num_rows(odbc_exec($connect, $cou));
				#echo "<xml>".$xml->saveXML()."</xml>";
				$xml->formatOutput =true;
				$xml->save("reportLSD.xml");
		}
}
?>