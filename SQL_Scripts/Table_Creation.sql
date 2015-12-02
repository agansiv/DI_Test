---table creation 

CREATE TABLE DI_REF_DATA 
(
  ENTITY VARCHAR2(100 BYTE) 
, FIELD VARCHAR2(100 BYTE) 
, VALUE VARCHAR2(100 BYTE) 
) ;


  CREATE TABLE DI_REF_ENTITY
   (	"TEST_ID" VARCHAR2(100 BYTE), 
	"PRIEXTREFID" VARCHAR2(100 BYTE), 
	"PRIDATASOURCE" VARCHAR2(100 BYTE), 
	"FORENAME" VARCHAR2(100 BYTE), 
	"STARTDATE" VARCHAR2(100 BYTE), 
	"SOURCE" VARCHAR2(100 BYTE), 
	"STATUS" VARCHAR2(100 BYTE), 
	"STATUSDATE" VARCHAR2(100 BYTE), 
	"SURNAME" VARCHAR2(100 BYTE), 
	"TITLE" VARCHAR2(100 BYTE), 
	"ADDRESSLINE1" VARCHAR2(100 BYTE), 
	"CITY" VARCHAR2(100 BYTE), 
	"COUNTRY" VARCHAR2(100 BYTE), 
	"POSTALCODE" VARCHAR2(100 BYTE), 
	"ADDR_STARTDATE" VARCHAR2(100 BYTE), 
	"VALIDATIONSTATUS" VARCHAR2(100 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 5242880 NEXT 5242880 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "BKP_TBS" ;
  
  
  CREATE TABLE "PALAGI01"."DI_REF_TEST_AUTOMATE" 
   (	"TEST_ID" VARCHAR2(20 BYTE), 
	"ENTITY" VARCHAR2(100 BYTE), 
	"FIELD" VARCHAR2(100 BYTE), 
	"TYPE" VARCHAR2(100 BYTE), 
	"SUPPLIER" VARCHAR2(100 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 5242880 NEXT 5242880 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "BKP_TBS" ;

  CREATE OR REPLACE TRIGGER "PALAGI01"."ENTITY_INSERT" 
before INSERT
   ON DI_REF_TEST_AUTOMATE
   FOR EACH ROW
DECLARE
 v_field varchar2(100);
 v_test_id varchar2(100);
 v_str varchar2(500);
 v_coun integer := 0;
BEGIN
  select :new.Field,:new.TEST_ID into v_field,v_test_id from dual;
  select count(*) into v_coun from DI_REF_ENTITY where test_id=v_test_id;
  if v_coun>0 then
  v_str := 'update DI_REF_ENTITY set '||v_field||' = ''Y'' where test_id='''||v_test_id||'''';
  else
  v_str := 'INSERT INTO DI_REF_ENTITY(Test_ID,'||v_field||') values ('||v_test_id||',''Y'')';
  end if;
  execute immediate (v_str);
  --insert into temp values (v_str);
END;
/
ALTER TRIGGER "PALAGI01"."ENTITY_INSERT" ENABLE;



create or replace FUNCTION generate (str_type VARCHAR2,vfield varchar2)
RETURN VARCHAR2 IS
retval VARCHAR2(2000);
Begin
 if str_type= 'Alpa' then
 select dbms_random.string('L', 15) into retval from dual;
 elsif str_type= 'Numeric' then
  select round(dbms_random.value(1,90000000000)) into retval from dual;
 elsif str_type= 'AlphaNumeric' then
  select dbms_random.string('U', 5)||round(dbms_random.value(1,90000000000)) into retval from dual;
  elsif str_type= 'Static' then
  select value into retval from DI_REF_DATA where field = vfield;
  end if;
  return retval;
  END;
  /



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




  CREATE TABLE "PALAGI01"."DI_TEST_RECORDS" 
   (	"TEST_ID" VARCHAR2(100 BYTE), 
	"PRIEXTREFID" VARCHAR2(4000 BYTE), 
	"PRIDATASOURCE" VARCHAR2(4000 BYTE), 
	"FORENAME" VARCHAR2(4000 BYTE), 
	"STARTDATE" VARCHAR2(4000 BYTE), 
	"SOURCE" VARCHAR2(4000 BYTE), 
	"STATUS" VARCHAR2(4000 BYTE), 
	"STATUSDATE" VARCHAR2(4000 BYTE), 
	"SURNAME" VARCHAR2(4000 BYTE), 
	"TITLE" VARCHAR2(4000 BYTE), 
	"ADDRESSLINE1" VARCHAR2(4000 BYTE), 
	"CITY" VARCHAR2(4000 BYTE), 
	"COUNTRY" VARCHAR2(4000 BYTE), 
	"POSTALCODE" VARCHAR2(4000 BYTE), 
	"ADDR_STARTDATE" VARCHAR2(4000 BYTE), 
	"VALIDATIONSTATUS" VARCHAR2(4000 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 5242880 NEXT 5242880 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "BKP_TBS" ;

commit;

