
create table DI_REF_DATA (Entity varchar2(100),Field varchar2(100),VALUE VARCHAR2(100));


create table DI_REF_TEST_AUTOMATE (TEST_ID varchar2(20),Entity varchar2(100),Field varchar2(100),Type varchar2(100),SUPPLIER varchar2(100));



create table DI_REF_ENTITY (
Test_ID varchar2(100),
SUPP_dateOfBirth VARCHAR2(100),
SUPP_primaryExternalRefId VARCHAR2(100),
SUPP_secondaryExternalRefId VARCHAR2(100),
SUPP_primaryDataSourceCode VARCHAR2(100),
SUPP_secondaryDataSourceCode VARCHAR2(100),
SUPP_forename VARCHAR2(100),
SUPP_gender VARCHAR2(100),
SUPP_initial VARCHAR2(100),
SUPP_startDate VARCHAR2(100),
SUPP_source VARCHAR2(100),
SUPP_statusCode VARCHAR2(100),
SUPP_statusDate VARCHAR2(100),
SUPP_suffix VARCHAR2(100),
SUPP_supporterURN VARCHAR2(100),
SUPP_surname VARCHAR2(100),
SUPP_title VARCHAR2(100),
SUPP_changeofNameIndicator VARCHAR2(100),
SUPP_nonTaxPayerFlag VARCHAR2(100),
SUPP_nonTaxPayerStartDate VARCHAR2(100),
SUPP_dateOfDeath VARCHAR2(100),
SUPP_deathNotificationDate VARCHAR2(100),
SUPP_maritalStatus VARCHAR2(100),
ADDR_addressLine1 VARCHAR2(100),
ADDR_addressLine2 VARCHAR2(100),
ADDR_addressLine3 VARCHAR2(100),
ADDR_addressLine4 VARCHAR2(100),
ADDR_cherishedAddressHN VARCHAR2(100),
ADDR_city VARCHAR2(100),
ADDR_country VARCHAR2(100),
ADDR_county VARCHAR2(100),
ADDR_postalCode VARCHAR2(100),
ADDR_startDate VARCHAR2(100),
ADDR_validationStatus VARCHAR2(100),
ADDR_newAddressIndicator VARCHAR2(100),
SEC_ADDR_addressLine1 VARCHAR2(100),
SEC_ADDR_addressLine2 VARCHAR2(100),
SEC_ADDR_addressLine3 VARCHAR2(100),
SEC_ADDR_addressLine4 VARCHAR2(100),
SEC_ADDR_cherishedAddressHN VARCHAR2(100),
SEC_ADDR_city VARCHAR2(100),
SEC_ADDR_country VARCHAR2(100),
SEC_ADDR_county VARCHAR2(100),
SEC_ADDR_postalCode VARCHAR2(100),
SEC_ADDR_startDate VARCHAR2(100),
SEC_ADDR_validationStatus VARCHAR2(100),
SEC_ADDR_newAddressIndicator VARCHAR2(100)
);


create OR REPLACE FORCE VIEW  DI_test_records_V as
SELECT e.test_id,
generate(case when SUPP_dateOfBirth ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='SUPP_dateOfBirth' ) else '' end,'SUPP_dateOfBirth' ) SUPP_dateOfBirth ,
generate(case when SUPP_primaryExternalRefId ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='SUPP_primaryExternalRefId' ) else '' end,'SUPP_primaryExternalRefId' ) SUPP_primaryExternalRefId ,
generate(case when SUPP_secondaryExternalRefId ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='SUPP_secondaryExternalRefId' ) else '' end,'SUPP_secondaryExternalRefId' ) SUPP_secondaryExternalRefId ,
generate(case when SUPP_primaryDataSourceCode ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='SUPP_primaryDataSourceCode' ) else '' end,'SUPP_primaryDataSourceCode' ) SUPP_primaryDataSourceCode ,
generate(case when SUPP_secondaryDataSourceCode ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='SUPP_secondaryDataSourceCode' ) else '' end,'SUPP_secondaryDataSourceCode' ) SUPP_secondaryDataSourceCode ,
generate(case when SUPP_forename ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='SUPP_forename' ) else '' end,'SUPP_forename' ) SUPP_forename ,
generate(case when SUPP_gender ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='SUPP_gender' ) else '' end,'SUPP_gender' ) SUPP_gender ,
generate(case when SUPP_initial ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='SUPP_initial' ) else '' end,'SUPP_initial' ) SUPP_initial ,
generate(case when SUPP_startDate ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='SUPP_startDate' ) else '' end,'SUPP_startDate' ) SUPP_startDate ,
generate(case when SUPP_source ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='SUPP_source' ) else '' end,'SUPP_source' ) SUPP_source ,
generate(case when SUPP_statusCode ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='SUPP_statusCode' ) else '' end,'SUPP_statusCode' ) SUPP_statusCode ,
generate(case when SUPP_statusDate ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='SUPP_statusDate' ) else '' end,'SUPP_statusDate' ) SUPP_statusDate ,
generate(case when SUPP_suffix ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='SUPP_suffix' ) else '' end,'SUPP_suffix' ) SUPP_suffix ,
generate(case when SUPP_supporterURN ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='SUPP_supporterURN' ) else '' end,'SUPP_supporterURN' ) SUPP_supporterURN ,
generate(case when SUPP_surname ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='SUPP_surname' ) else '' end,'SUPP_surname' ) SUPP_surname ,
generate(case when SUPP_title ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='SUPP_title' ) else '' end,'SUPP_title' ) SUPP_title ,
generate(case when SUPP_changeofNameIndicator ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='SUPP_changeofNameIndicator' ) else '' end,'SUPP_changeofNameIndicator' ) SUPP_changeofNameIndicator ,
generate(case when SUPP_nonTaxPayerFlag ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='SUPP_nonTaxPayerFlag' ) else '' end,'SUPP_nonTaxPayerFlag' ) SUPP_nonTaxPayerFlag ,
generate(case when SUPP_nonTaxPayerStartDate ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='SUPP_nonTaxPayerStartDate' ) else '' end,'SUPP_nonTaxPayerStartDate' ) SUPP_nonTaxPayerStartDate ,
generate(case when SUPP_dateOfDeath ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='SUPP_dateOfDeath' ) else '' end,'SUPP_dateOfDeath' ) SUPP_dateOfDeath ,
generate(case when SUPP_deathNotificationDate ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='SUPP_deathNotificationDate' ) else '' end,'SUPP_deathNotificationDate' ) SUPP_deathNotificationDate ,
generate(case when SUPP_maritalStatus ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='SUPP_maritalStatus' ) else '' end,'SUPP_maritalStatus' ) SUPP_maritalStatus ,
generate(case when ADDR_addressLine1 ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='ADDR_addressLine1' ) else '' end,'ADDR_addressLine1' ) ADDR_addressLine1 ,
generate(case when ADDR_addressLine2 ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='ADDR_addressLine2' ) else '' end,'ADDR_addressLine2' ) ADDR_addressLine2 ,
generate(case when ADDR_addressLine3 ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='ADDR_addressLine3' ) else '' end,'ADDR_addressLine3' ) ADDR_addressLine3 ,
generate(case when ADDR_addressLine4 ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='ADDR_addressLine4' ) else '' end,'ADDR_addressLine4' ) ADDR_addressLine4 ,
generate(case when ADDR_cherishedAddressHN ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='ADDR_cherishedAddressHN' ) else '' end,'ADDR_cherishedAddressHN' ) ADDR_cherishedAddressHN ,
generate(case when ADDR_city ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='ADDR_city' ) else '' end,'ADDR_city' ) ADDR_city ,
generate(case when ADDR_country ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='ADDR_country' ) else '' end,'ADDR_country' ) ADDR_country ,
generate(case when ADDR_county ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='ADDR_county' ) else '' end,'ADDR_county' ) ADDR_county ,
generate(case when ADDR_postalCode ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='ADDR_postalCode' ) else '' end,'ADDR_postalCode' ) ADDR_postalCode ,
generate(case when ADDR_startDate ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='ADDR_startDate' ) else '' end,'ADDR_startDate' ) ADDR_startDate ,
generate(case when ADDR_validationStatus ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='ADDR_validationStatus' ) else '' end,'ADDR_validationStatus' ) ADDR_validationStatus ,
generate(case when ADDR_newAddressIndicator ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='ADDR_newAddressIndicator' ) else '' end,'ADDR_newAddressIndicator' ) ADDR_newAddressIndicator ,
generate(case when SEC_ADDR_addressLine1 ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='SEC_ADDR_addressLine1' ) else '' end,'SEC_ADDR_addressLine1' ) SEC_ADDR_addressLine1 ,
generate(case when SEC_ADDR_addressLine2 ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='SEC_ADDR_addressLine2' ) else '' end,'SEC_ADDR_addressLine2' ) SEC_ADDR_addressLine2 ,
generate(case when SEC_ADDR_addressLine3 ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='SEC_ADDR_addressLine3' ) else '' end,'SEC_ADDR_addressLine3' ) SEC_ADDR_addressLine3 ,
generate(case when SEC_ADDR_addressLine4 ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='SEC_ADDR_addressLine4' ) else '' end,'SEC_ADDR_addressLine4' ) SEC_ADDR_addressLine4 ,
generate(case when SEC_ADDR_cherishedAddressHN ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='SEC_ADDR_cherishedAddressHN' ) else '' end,'SEC_ADDR_cherishedAddressHN' ) SEC_ADDR_cherishedAddressHN ,
generate(case when SEC_ADDR_city ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='SEC_ADDR_city' ) else '' end,'SEC_ADDR_city' ) SEC_ADDR_city ,
generate(case when SEC_ADDR_country ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='SEC_ADDR_country' ) else '' end,'SEC_ADDR_country' ) SEC_ADDR_country ,
generate(case when SEC_ADDR_county ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='SEC_ADDR_county' ) else '' end,'SEC_ADDR_county' ) SEC_ADDR_county ,
generate(case when SEC_ADDR_postalCode ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='SEC_ADDR_postalCode' ) else '' end,'SEC_ADDR_postalCode' ) SEC_ADDR_postalCode ,
generate(case when SEC_ADDR_startDate ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='SEC_ADDR_startDate' ) else '' end,'SEC_ADDR_startDate' ) SEC_ADDR_startDate ,
generate(case when SEC_ADDR_validationStatus ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='SEC_ADDR_validationStatus' ) else '' end,'SEC_ADDR_validationStatus' ) SEC_ADDR_validationStatus ,
generate(case when SEC_ADDR_newAddressIndicator ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='SEC_ADDR_newAddressIndicator' ) else '' end,'SEC_ADDR_newAddressIndicator' ) SEC_ADDR_newAddressIndicator 
from DI_REF_ENTITY e;

