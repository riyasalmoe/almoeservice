select * from engineers;
select * from make;
select * from docnums;
select * from dailyservicereport where Engineer='Glenn' order by `date`;
select * from dailyservicereport where Engineer='Geo' order by `date`;

select * from view_all_engineers;
select * from view_all_makes;
select * from view_all_docnums;
select * from view_yearly_jobcards_glenn;
select * from view_yearly_jobcards_geo;
select * from view_all_jobcards_monthyear;

--select DOCNO+1 from view_all_docnums;

-- delete from dailyservicereport;
--  delete from dailyservicereport where `client name` = "Lunch";


  