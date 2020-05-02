<?php

require '../Database.php';
require '../models/Messwerte.php';

/**
 * Class messwerte_controller is used to extract data from the DB and convert it into a convenient format
 */
class messwerte_controller {


    /**
     * selects data based on a time frame and orders it by time
     * (if one record per month, then find an average of all records for this month)
     * @param null $year
     * @return false|string|null
     */
    function getFirstGraphData($year = NULL) {

        if ($year == NULL)
            $year = 2019;
        $query = "SELECT
                        extract(year from datum) as year,
                        extract(month from datum) as month,
                        AVG(aussentemperatur) as aussentemperatur,
                        AVG(niederschlag) as niederschlag
                  FROM messwerte
                  WHERE extract(year from datum)={$year}
                  GROUP BY 1, 2";

        return $this->prepareJson($this->executeQuery($query));
    }

    /**
     * selects 20 last records from messwerte and orders them by time
     *
     * @param null $type
     * @return false|string|null
     */
    function getSecondGraphData($type = NULL) {

        if ($type == NULL)
            $type = 'zulauf';
        $query = "SELECT
                     datum as datum,
                     {$type}_ka as {$type}_ka,
                     temperatur_{$type}_ka as temperatur_{$type}_ka,
                     ph_{$type}_ka as ph_{$type}_ka,
                     leitfaehigkeit_{$type}_ka as leitfaehigkeit_{$type}_ka
                  FROM messwerte
                  ORDER BY datum DESC
                  LIMIT 20";

        return $this->prepareJson($this->executeQuery($query));
    }

    /**
     * selects monthly averaged records where month and year are specified
     * @param null $year
     * @param null $month
     * @return false|string|null
     */
    function getThirdGraphData($year = NULL, $month = NULL) {
        if ($year == NULL)
            $year = 2019;
        if ($month == NULL)
            $year = 1;
        $query = "SELECT
                        AVG(aussentemperatur) as aussentemperatur,
                        AVG(temperatur_zulauf_ka) as temperatur_zulauf_ka,
                        AVG(temperatur_ablauf_ka) as temperatur_ablauf_ka
                  FROM messwerte
                  WHERE extract(year from datum)={$year}
				  AND extract(month from datum)={$month}";

        return $this->prepareJson($this->executeQuery($query));
    }

    /**
     * executes a given query in a string format
     * @param $query
     * @return false|resource
     */
    private function executeQuery($query) {
        $result = pg_query($query) or die('Error message: ' . pg_last_error());
        return $result;
    }

    /**
     * converts result from string into JSON
     * @param $result
     * @return false|string|null
     */
    private function prepareJson($result) {
        $messwerten = array();

        if ($result) {
            while ($row = pg_fetch_assoc($result)) {
                $messwerten[] = new Messwerte($row);
            }
            return json_encode($messwerten, JSON_UNESCAPED_UNICODE);
        } else {
            return null;
        }
    }
}