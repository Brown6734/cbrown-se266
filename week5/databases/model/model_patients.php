<?php

    include (__DIR__ . '/db.php');

    function getPatients() {
        global $db;

        $results = [];

        $stmt = $db->prepare("SELECT * FROM patients ORDER BY patientFirstName");

        if ($stmt->execute() && $stmt->rowCount() > 0){
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return ($results);
    }

    function getPatient($id) {
        global $db;

        $result = [];
        
        $stmt = $db->prepare("SELECT * FROM patients WHERE id = :i");

        $binds = array(
            ":i" => $id,
        );

        if ($stmt->execute($binds) && $stmt->rowCount() > 0){
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        return ($result);
    }

    function addPatient ($pFirst, $pLast, $pMarried, $pBirth){
        global $db;

        $result = "";
        $sql = "INSERT INTO patients set patientFirstName = :pFirst, patientLastName = :pLast, patientMarried = :pMarried, patientBirthDate = :pBirth";
        $stmt = $db->prepare($sql);

        $binds = array(
            ":pFirst" => $pFirst,
            ":pLast" => $pLast,
            ":pMarried" => $pMarried,
            ":pBirth" => $pBirth,
        );

        if ($stmt->execute($binds) && $stmt->rowCount () > 0){
            $result = 'Date Added';
        }

        return ($result);
    }

    function updatePatient ($id, $pFirst, $pLast, $pMarried, $pBirth){
        global $db;

        $result = "";
        $sql = "UPDATE patients SET patientFirstName = :pFirst, patientLastName = :pLast, patientMarried = :pMarried, patientBirthDate = :pBirth WHERE id = :id";
        $stmt = $db->prepare($sql);

        $binds = array(
            ":id" => $id,
            ":pFirst" => $pFirst,
            ":pLast" => $pLast,
            ":pMarried" => $pMarried,
            ":pBirth" => $pBirth,
        );

        if ($stmt->execute($binds) && $stmt->rowCount () > 0){
            $result = 'Data Added';
        }

        return ($result);
    }

    function deletePatient ($id){
        global $db;

        $results = "Data was not deleted";
        $stmt = $db->prepare("DELETE FROM patients WHERE id = :id");

        $stmt->bindValue(':id', $id);

        if ($stmt->execute() && $stmt->rowCount () > 0 ){
            $results = "Data Deleted";
        }

        return ($results);
    }



?>