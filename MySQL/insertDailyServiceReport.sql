CREATE DEFINER = 'root'@'localhost'
PROCEDURE insertDailyServiceReport(IN in_CPNO VARCHAR(255), IN in_ORDNO VARCHAR(255), 
  IN in_ENDUSER VARCHAR(255), IN in_MACMODEL VARCHAR(255), IN in_SERIALNO VARCHAR(255), 
  IN in_WEXPIRY DATE, IN in_REMARKS VARCHAR(255), IN in_SALESMAN VARCHAR(255), 
  IN in_INVNO VARCHAR(255), IN in_LPONO VARCHAR(255))
BEGIN

DECLARE EXIT HANDLER FOR 1062
SELECT
  CONCAT_WS(',', in_CPNO, ' Duplicate security code / machine serial number found!, Coverplus failed to register!') AS msg;

DECLARE EXIT HANDLER FOR SQLSTATE '23000'
SELECT
  CONCAT_WS(',', in_CPNO, ' Duplicate security code / machine serial number found!, Coverplus failed to register!') AS msg;

INSERT INTO `almoeservice`.`dailyservicereport_v2`
(`Engineer`,
`JobDate`,
`JobNumber`,
`ClientName`,
`SITENAME`,
`Product`,
`Vendor`,
`ServiceType`,
`TimeIN`,
`TimeOUT`,
`JobStatus`,
`NonClosureReason`,
`Remarks`,
`KMStart`,
`KMEnd`,
`SalesRep`,
`Location`,
`Area / City`,
`NatureOfJob`,
`CostCentre`,
`Day`,
`Actual Hours`,
`School ID - SLP`,
`Column1`)
VALUES
();


SELECT
  CONCAT_WS(',', in_CPNO, ' Uploaded successfully.') AS msg;

END