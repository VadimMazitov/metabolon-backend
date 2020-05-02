<?php


class Messwerte implements JsonSerializable
{
    /**
     * primary key
     */
    public $id;

    /**
     * date of measurement
     */
    public $datum;

    /*
     * PostgreSQL does not support AVG(Date)
     * Therefore, we have to return them manually one-by-one
     */
    public $day;
    public $month;
    public $year;

    /**
     * precipitation
     */
    public $niederschlag;

    /**
     * ambient temperature
     */
    public $aussentemperatur;

    /**
     * inflow to the wastewater treatment plant
     */
     public $zulauf_ka;

    /**
     * pH value of the inflow water
     */
    public $ph_zulauf_ka;

    /**
     * Temperature of the incoming wastewater
     */
    public $temperatur_zulauf_ka;

    /**
     * conductivity of the incoming wastewater
     */
    public $leitfaehigkeit_zulauf_ka;

    /**
     * outflow of the wastewater treatment plant
     */
    public $ablauf_ka;

    /**
     * pH value in the outflow of the plant
     */
    public $ph_ablauf_ka;

    /**
     * temperature in the outflow of the plant
     */
    public $temperatur_ablauf_ka;

    /**
     * conductivity in the outflow of the plant
     */
    public $leitfaehigkeit_ablauf_ka;

    /**
     * amount of precipitant
     */
    public $faellmittelmenge_fecl3;

    public function __construct(array $data)
    {

        $this->id = $data['id'];
        $this->datum = $data['datum'];
        $this->day = $data['day'];
        $this->month = $data['month'];
        $this->year = $data['year'];
        $this->niederschlag = $data['niederschlag'];
        $this->aussentemperatur = $data['aussentemperatur'];
        $this->zulauf_ka = $data['zulauf_ka'];
        $this->ph_zulauf_ka = $data['ph_zulauf_ka'];
        $this->temperatur_zulauf_ka = $data['temperatur_zulauf_ka'];
        $this->leitfaehigkeit_zulauf_ka = $data['leitfaehigkeit_zulauf_ka'];
        $this->ablauf_ka = $data['ablauf_ka'];
        $this->ph_ablauf_ka = $data['ph_ablauf_ka'];
        $this->temperatur_ablauf_ka = $data['temperatur_ablauf_ka'];
        $this->leitfaehigkeit_ablauf_ka = $data['leitfaehigkeit_ablauf_ka'];
        $this->faellmittelmenge_fecl3 = $data['faellmittelmenge_fecl3'];
    }

    /*
    * Json_encode does not ignore value, if it is null or empty string
    * https://groups.google.com/forum/#!topic/php-json/5H6_SWPt-DU
    */
    public function jsonSerialize()
    {
        $json = [];
        if ($id = $this->getId())
            $json['id'] = $id;
        if ($datum =$this->getDatum())
            $json['datum'] = $datum;
        if ($day =$this->getDay())
            $json['day'] = $day;
        if ($month =$this->getMonth())
            $json['month'] = $month;
        if ($year =$this->getYear())
            $json['year'] = $year;
        if ($niederschlag = $this->getNiederschlag())
            $json['niederschlag'] = $niederschlag;
        if ($aussentemperatur = $this->getAussentemperatur())
            $json['aussentemperatur'] = $aussentemperatur;
        if ($zulauf_ka = $this->getZulaufKa())
            $json['zulauf_ka'] = $zulauf_ka;
        if ($ph_zulauf_ka = $this->getPhZulaufKa())
            $json['ph_zulauf_ka'] = $ph_zulauf_ka;
        if ($temperatur_zulauf_ka = $this->getTemperaturZulaufKa())
            $json['temperatur_zulauf_ka'] = $temperatur_zulauf_ka;
        if ($leitfaehigkeit_zulauf_ka = $this->getLeitfaehigkeitZulaufKa())
            $json['leitfaehigkeit_zulauf_ka'] = $leitfaehigkeit_zulauf_ka;
        if ($ablauf_ka = $this->getAblaufKa())
            $json['ablauf_ka'] = $ablauf_ka;
        if ($ph_ablauf_ka = $this->getPhAblaufKa())
            $json['ph_ablauf_ka'] = $ph_ablauf_ka;
        if ($temperatur_ablauf_ka = $this->getTemperaturAblaufKa())
            $json['temperatur_ablauf_ka'] = $temperatur_ablauf_ka;
        if ($leitfaehigkeit_ablauf_ka = $this->getLeitfaehigkeitAblaufKa())
            $json['leitfaehigkeit_ablauf_ka'] = $leitfaehigkeit_ablauf_ka;
        if ($faellmittelmenge_fecl3 = $this->getFaellmittelmengeFecl3())
            $json['faellmittelmenge_fecl3'] = $faellmittelmenge_fecl3;
        return $json;
    }

    /**
     * @return mixed
     */
    public function getFaellmittelmengeFecl3()
    {
        return $this->faellmittelmenge_fecl3;
    }

    /**
     * @param mixed $faellmittelmenge_fecl3
     */
    public function setFaellmittelmengeFecl3($faellmittelmenge_fecl3)
    {
        $this->faellmittelmenge_fecl3 = $faellmittelmenge_fecl3;
    }

    /**
     * @return mixed
     */
    public function getAblaufKa()
    {
        return $this->ablauf_ka;
    }

    /**
     * @param mixed $ablauf_ka
     */
    public function setAblaufKa($ablauf_ka)
    {
        $this->ablauf_ka = $ablauf_ka;
    }

    /**
     * @return mixed
     */
    public function getPhAblaufKa()
    {
        return $this->ph_ablauf_ka;
    }

    /**
     * @param mixed $ph_ablauf_ka
     */
    public function setPhAblaufKa($ph_ablauf_ka)
    {
        $this->ph_ablauf_ka = $ph_ablauf_ka;
    }

    /**
     * @return mixed
     */
    public function getTemperaturAblaufKa()
    {
        return $this->temperatur_ablauf_ka;
    }

    /**
     * @param mixed $temperatur_ablauf_ka
     */
    public function setTemperaturAblaufKa($temperatur_ablauf_ka)
    {
        $this->temperatur_ablauf_ka = $temperatur_ablauf_ka;
    }

    /**
     * @return mixed
     */
    public function getLeitfaehigkeitAblaufKa()
    {
        return $this->leitfaehigkeit_ablauf_ka;
    }

    /**
     * @param mixed $leitfaehigkeit_ablauf_ka
     */
    public function setLeitfaehigkeitAblaufKa($leitfaehigkeit_ablauf_ka)
    {
        $this->leitfaehigkeit_ablauf_ka = $leitfaehigkeit_ablauf_ka;
    }

    /**
     * @return mixed
     */
    public function getZulaufKa()
    {
        return $this->zulauf_ka;
    }

    /**
     * @param mixed $zulauf_ka
     */
    public function setZulaufKa($zulauf_ka)
    {
        $this->zulauf_ka = $zulauf_ka;
    }

    /**
     * @return mixed
     */
    public function getPhZulaufKa()
    {
        return $this->ph_zulauf_ka;
    }

    /**
     * @param mixed $ph_zulauf_ka
     */
    public function setPhZulaufKa($ph_zulauf_ka)
    {
        $this->ph_zulauf_ka = $ph_zulauf_ka;
    }

    /**
     * @return mixed
     */
    public function getTemperaturZulaufKa()
    {
        return $this->temperatur_zulauf_ka;
    }

    /**
     * @param mixed $temperatur_zulauf_ka
     */
    public function setTemperaturZulaufKa($temperatur_zulauf_ka)
    {
        $this->temperatur_zulauf_ka = $temperatur_zulauf_ka;
    }

    /**
     * @return mixed
     */
    public function getLeitfaehigkeitZulaufKa()
    {
        return $this->leitfaehigkeit_zulauf_ka;
    }

    /**
     * @param mixed $leitfaehigkeit_zulauf_ka
     */
    public function setLeitfaehigkeitZulaufKa($leitfaehigkeit_zulauf_ka)
    {
        $this->leitfaehigkeit_zulauf_ka = $leitfaehigkeit_zulauf_ka;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDatum()
    {
        return $this->datum;
    }

    /**
     * @param mixed $datum
     */
    public function setDatum($datum)
    {
        $this->datum = $datum;
    }

    /**
     * @return mixed
     */
    public function getNiederschlag()
    {
        return $this->niederschlag;
    }

    /**
     * @param mixed $niederschlag
     */
    public function setNiederschlag($niederschlag)
    {
        $this->niederschlag = $niederschlag;
    }

    /**
     * @return mixed
     */
    public function getAussentemperatur()
    {
        return $this->aussentemperatur;
    }

    /**
     * @param mixed $aussentemperatur
     */
    public function setAussentemperatur($aussentemperatur)
    {
        $this->aussentemperatur = $aussentemperatur;
    }

    /**
     * @return mixed
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @param mixed $day
     */
    public function setDay($day)
    {
        $this->day = $day;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @return mixed
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * @param mixed $month
     */
    public function setMonth($month)
    {
        $this->month = $month;
    }


}