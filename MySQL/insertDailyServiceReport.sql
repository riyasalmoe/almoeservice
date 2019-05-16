CREATE DEFINER = 'root'@'localhost'
PROCEDURE insertDailyServiceReport(
  IN_Engineer VARCHAR(100),IN_JobDate DATE,IN_JobNumber INT(11),
  IN_ClientName VARCHAR(100),IN_SITENAME VARCHAR(100),
  IN_Product VARCHAR(100),IN_Vendor VARCHAR(100),IN_ServiceType VARCHAR(100),
  IN_TimeIN TIME,IN_TimeOUT TIME,IN_JobStatus VARCHAR(100),
  IN_NonClosureReason VARCHAR(100),IN_Remarks VARCHAR(100),IN_KMStart VARCHAR(100),
  IN_KMEnd VARCHAR(100),IN_SalesRep VARCHAR(100),IN_Location VARCHAR(100),IN_AreaCity VARCHAR(100),
  IN_NatureOfJob VARCHAR(100),IN_CostCentre VARCHAR(100),IN_Day VARCHAR(100),
  IN_ActualHours DOUBLE(10, 3),IN_SchoolIDSLP VARCHAR(50)
  )
BEGIN

DECLARE EXIT HANDLER FOR 1062
SELECT
  CONCAT_WS(',', in_CPNO, ' Duplicate security code / machine serial number found!, Coverplus failed to register!') AS msg;

DECLARE EXIT HANDLER FOR SQLSTATE '23000'
SELECT
  CONCAT_WS(',', in_CPNO, ' Duplicate security code / machine serial number found!, Coverplus failed to register!') AS msg;

INSERT INTO `almoeservice`.`dailyservicereport_v2`
(`Engineer`,`JobDate`,`JobNumber`,`ClientName`,`SITENAME`,`Product`,`Vendor`,
`ServiceType`,`TimeIN`,`TimeOUT`,`JobStatus`,`NonClosureReason`,`Remarks`,
`KMStart`,`KMEnd`,`SalesRep`,`Location`,`AreaCity`,`NatureOfJob`,`CostCentre`,
`Day`,`ActualHours`,`SchoolIDSLP`)
VALUES
(
  IN_Engineer ,IN_JobDate,IN_JobNumber ,
  IN_ClientName ,IN_SITENAME ,
  IN_Product ,IN_Vendor ,IN_ServiceType ,
  IN_TimeIN,IN_TimeOUT,IN_JobStatus ,
  IN_NonClosureReason ,IN_Remarks ,IN_KMStart ,
  IN_KMEnd ,IN_SalesRep ,IN_Location ,IN_AreaCity ,
  IN_NatureOfJob ,IN_CostCentre ,IN_Day ,
  IN_ActualHours,IN_SchoolIDSLP  
  );


SELECT
  CONCAT_WS(',', in_CPNO, ' Uploaded successfully.') AS msg;

END