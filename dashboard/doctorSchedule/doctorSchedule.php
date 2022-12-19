<?php
class DoctorSchedule
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function addDoctorSchedule($doctor_id, $date, $start_date, $end_date)
    {
        if (isset($doctor_id) && isset($date) && isset($start_date) && isset($end_date)) {
            $available = 1;
            $this->db->con->query("INSERT INTO doctorschedule(doctor_id, date, start_date, end_date, available) VALUES($doctor_id, $date, $start_date, $end_date, $available)");
        }
    }
    public function getData()
    {
        $result = $this->db->con->query("SELECT * FROM doctorschedule");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function deleteDoctorSchedule($item_id = null)
    {
        if ($item_id != null) {
            $this->db->con->query("DELETE FROM doctorschedule WHERE id={$item_id}");
        }
    }
    public function updateDoctorSchedule($item_id = null)
    {
        if ($item_id != null) {
            $available = 0;

            $this->db->con->query("UPDATE doctorschedule SET available={$available} WHERE id={$item_id}");
        }
    }
}
