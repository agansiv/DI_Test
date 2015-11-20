create table DI_REF_STATIC (Entity varchar2(100),Field varchar2(100));

create table DI_REF_DYNAMIC (Entity varchar2(100),Field varchar2(100));

create table DI_REF_DATA (Entity varchar2(100),Field varchar2(100),VALUE VARCHAR2(100));

create table DI_REF_TEST_AUTOMATE (TEST_ID varchar2(20),Entity varchar2(100),Field varchar2(100),Type varchar2(100),SUPPLIER varchar2(100));

create table DI_REF_ENTITY (FORENAME varchar2(100),Title varchar2(100));


insert into DI_REF_DYNAMIC VALUES ('SUPPORTER','Forename');


insert into DI_REF_DATA VALUES ('SUPPORTER','Title','Mr');

insert into DI_REF_DATA VALUES ('SUPPORTER','Status','Live');


insert into DI_REF_ENTITY VALUES ('Forename','Title');


insert into DI_REF_ENTITY VALUES ('Y','Y','N','2');


insert into DI_REF_TEST_AUTOMATE VALUES ('1','SUPPORTER','Forename','Dynamic','core');

insert into DI_REF_TEST_AUTOMATE VALUES ('1','SUPPORTER','Title','Static','core');

insert into DI_REF_TEST_AUTOMATE VALUES ('1','SUPPORTER','Status','Static','core');

insert into DI_REF_TEST_AUTOMATE VALUES ('2','SUPPORTER','Forename','Dynamic','core');

insert into DI_REF_TEST_AUTOMATE VALUES ('2','SUPPORTER','Title','Static','core');



select * from DI_REF_TEST_AUTOMATE;

select dbms_random.string('L', 15) str from dual;


select abs(dbms_random.random) from dual;


update DI_REF_TEST_AUTOMATE set field='Status' where field='Status';

select *
from
DI_REF_TEST_AUTOMATE;

select 
(select a.field from DI_REF_TEST_AUTOMATE a where a.field=e.forename) as forename ,
(select a.field from DI_REF_TEST_AUTOMATE a where a.field=e.title) as Title 
from DI_REF_ENTITY e;

SELECT *
from DI_REF_ENTITY e;


select 
AU.TEST_ID,
FIELD,
CASE WHEN TYPE='Dynamic' then dbms_random.string('L', 15) else (SELECT A.VALUE FROM DI_REF_STATIC A WHERE A.FIELD=AU.FIELD) END
from
DI_REF_TEST_AUTOMATE AU;



SELECT e.test_id,
generate(case when forename ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='Forename') else '' end,'Forename') forename,
generate(case when Title ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='Title') else '' end,'Title') Title,
generate(case when Status ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='Status') else '' end,'Status') Status
from DI_REF_ENTITY e;


select * from DI_REF_TEST_AUTOMATE;




create table  DI_test_records_t as
SELECT e.test_id,
generate(case when forename ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='Forename') else '' end,'Forename') forename,
generate(case when Title ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='Title') else '' end,'Title') Title,
generate(case when Status ='Y' then (select type from DI_REF_TEST_AUTOMATE au where au.test_id=e.test_id and field='Status') else '' end,'Status') Status
from DI_REF_ENTITY e;

insert into DI_test_records_t  select * from DI_test_records;

truncate table DI_test_records_t;
select * from DI_test_records_t;


CREATE OR REPLACE TRIGGER en_u
AFTER UPDATE
   ON DI_REF_TEST_AUTOMATE
   FOR EACH ROW
   
DECLARE
   v_username varchar2(10);
   
BEGIN

   -- Find username of person performing UPDATE into table
   --SELECT user INTO v_username
   --FROM dual;
   
  update DI_REF_ENTITY set status='Y' where test_id='1';
     
END;






