<?php
class Appointment
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    public function addAppointment($patient_id, $doctor_id, $appointment_id, $Symptom,$comment)
    {
        if (isset($patient_id) && isset($doctor_id) && isset($appointment_id) && isset($Symptom)) {
            $this->db->con->query("INSERT INTO appointment(patient_id, doctor_id, appointment_id, Symptom, comment) VALUES($patient_id, $doctor_id, $appointment_id, $Symptom, $comment)");
        }
    }
    public function getData()
    {
        $result = $this->db->con->query("SELECT * FROM appointment");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function deleteAppointment($item_id = null)
    {
        if ($item_id != null) {
            $this->db->con->query("DELETE FROM appointment WHERE id={$item_id}");
        }
    }
}
