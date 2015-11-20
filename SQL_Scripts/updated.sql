
create table DI_REF_DATA (Entity varchar2(100),Field varchar2(100),VALUE VARCHAR2(100));


create table DI_REF_TEST_AUTOMATE (TEST_ID varchar2(20),Entity varchar2(100),Field varchar2(100),Type varchar2(100),SUPPLIER varchar2(100));


create table DI_REF_ENTITY (
Test_ID varchar2(100),
priExtRefId varchar2(100),
priDataSource varchar2(100),
Forename varchar2(100),
startDate varchar2(100),
source varchar2(100),
Status varchar2(100),
statusDate varchar2(100),
surname varchar2(100),
Title varchar2(100),
addressLine1 varchar2(100),
city varchar2(100),
country varchar2(100),
postalCode varchar2(100),
addr_startDate varchar2(100),
validationStatus varchar2(100));



CREATE OR REPLACE TRIGGER entity_update
AFTER UPDATE
   ON DI_REF_TEST_AUTOMATE
   FOR EACH ROW
DECLARE
   v_username varchar2(10);
BEGIN
  update DI_REF_ENTITY set status='Y' where test_id='1';
END;


create sequence di_test_seq start with 1 increment by 1 nocache;

 CREATE TABLE DI_TEST_RECORDS_ALL
     (	
	ID NUMBER,
	TEST_ID VARCHAR2(100 BYTE), 
	PRIEXTREFID VARCHAR2(4000 BYTE), 
	PRIDATASOURCE VARCHAR2(4000 BYTE), 
	FORENAME VARCHAR2(4000 BYTE), 
	STARTDATE VARCHAR2(4000 BYTE), 
	SOURCE VARCHAR2(4000 BYTE), 
	STATUS VARCHAR2(4000 BYTE), 
	STATUSDATE VARCHAR2(4000 BYTE), 
	SURNAME VARCHAR2(4000 BYTE), 
	TITLE VARCHAR2(4000 BYTE), 
	ADDRESSLINE1 VARCHAR2(4000 BYTE), 
	CITY VARCHAR2(4000 BYTE), 
	COUNTRY VARCHAR2(4000 BYTE), 
	POSTALCODE VARCHAR2(4000 BYTE), 
	ADDR_STARTDATE VARCHAR2(4000 BYTE), 
	VALIDATIONSTATUS VARCHAR2(4000 BYTE)
   ) ;





CREATE OR REPLACE TRIGGER entity_insert
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
  

----DI Reference data

insert into DI_REF_DATA VALUES ('SUPPORTER','priDataSource','ND');

insert into DI_REF_DATA VALUES ('SUPPORTER','startDate','2015-01-17T13:11:20');

insert into DI_REF_DATA VALUES ('SUPPORTER','source','E13DM1001');

insert into DI_REF_DATA VALUES ('SUPPORTER','Status','Live');

insert into DI_REF_DATA VALUES ('SUPPORTER','statusDate','2015-01-17');

insert into DI_REF_DATA VALUES ('SUPPORTER','Title','Mr');


insert into DI_REF_DATA VALUES ('ADDRESS','addressLine1','10 Culver Lane');

insert into DI_REF_DATA VALUES ('ADDRESS','city','London');

insert into DI_REF_DATA VALUES ('ADDRESS','country','United Kingdom');

insert into DI_REF_DATA VALUES ('ADDRESS','postalCode','RG14 6YH');

insert into DI_REF_DATA VALUES ('ADDRESS','addr_startDate','2014-12-02');

insert into DI_REF_DATA VALUES ('ADDRESS','validationStatus','NV');



  
  

------test scenario data 

insert into DI_REF_TEST_AUTOMATE VALUES ('1','SUPPORTER','priExtRefId','AlphaNumeric','core');

insert into DI_REF_TEST_AUTOMATE VALUES ('1','SUPPORTER','priDataSource','Static','core');

insert into DI_REF_TEST_AUTOMATE VALUES ('1','SUPPORTER','Forename','Alpa','core');

insert into DI_REF_TEST_AUTOMATE VALUES ('1','SUPPORTER','startDate','Static','core');

insert into DI_REF_TEST_AUTOMATE VALUES ('1','SUPPORTER','source','Static','core');

insert into DI_REF_TEST_AUTOMATE VALUES ('1','SUPPORTER','Status','Static','core');

insert into DI_REF_TEST_AUTOMATE VALUES ('1','SUPPORTER','statusDate','Static','core');

insert into DI_REF_TEST_AUTOMATE VALUES ('1','SUPPORTER','surname','Alpa','core');

insert into DI_REF_TEST_AUTOMATE VALUES ('1','SUPPORTER','Title','Static','core');

insert into DI_REF_TEST_AUTOMATE VALUES ('1','ADDRESS','addressLine1','Static','core');

insert into DI_REF_TEST_AUTOMATE VALUES ('1','ADDRESS','city','Static','core');

insert into DI_REF_TEST_AUTOMATE VALUES ('1','ADDRESS','country','Static','core');

insert into DI_REF_TEST_AUTOMATE VALUES ('1','ADDRESS','postalCode','Static','core');

insert into DI_REF_TEST_AUTOMATE VALUES ('1','ADDRESS','addr_startDate','Static','core');

insert into DI_REF_TEST_AUTOMATE VALUES ('1','ADDRESS','validationStatus','Static','core');

create view  DI_test_records as
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



