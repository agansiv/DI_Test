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
  select round(dbms_random.value(1,90000000000)) into retval from DI_REF_DATA where field = vfield;
 elsif str_type= 'AlphaNumeric' then
  select dbms_random.string('U', 5)||round(dbms_random.value(1,90000000000)) into retval from dual;
  elsif str_type= 'Static' then
  select value into retval from DI_REF_DATA where field = vfield;
  end if;
  return retval;
  END;
  /



  CREATE OR REPLACE FORCE VIEW "PALAGI01"."DI_TEST_RECORDS_V" ("TEST_ID", "PRIEXTREFID", "PRIDATASOURCE", "FORENAME", "STARTDATE", "SOURCE", "STATUS", "STATUSDATE", "SURNAME", "TITLE", "ADDRESSLINE1", "CITY", "COUNTRY", "POSTALCODE", "ADDR_STARTDATE", "VALIDATIONSTATUS") AS 
  SELECT e.test_id,
generate(case when PRIEXTREFID ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='priExtRefId') else '' end,'PRIEXTREFID') PRIEXTREFID,
generate(case when priDataSource ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='priDataSource') else '' end,'priDataSource') priDataSource,
generate(case when forename ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='Forename') else '' end,'forename') forename,
generate(case when startDate ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='startDate') else '' end,'startDate') startDate,
generate(case when source ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='source') else '' end,'source') source,
generate(case when Status ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='Status') else '' end,'Status') Status,
generate(case when statusDate ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='statusDate') else '' end,'statusDate') statusDate,
generate(case when surname ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='surname') else '' end,'surname') surname,
generate(case when Title ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='Title') else '' end,'Title') Title,
generate(case when addressLine1 ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='addressLine1') else '' end,'addressLine1') addressLine1,
generate(case when city ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='city') else '' end,'city') city,
generate(case when country ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='country') else '' end,'country') country,
generate(case when postalCode ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='postalCode') else '' end,'postalCode') postalCode,
generate(case when addr_startDate ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='addr_startDate') else '' end,'addr_startDate') addr_startDate,
generate(case when validationStatus ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='validationStatus') else '' end,'validationStatus') validationStatus
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

