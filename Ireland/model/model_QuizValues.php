<?php 
    include (__DIR__ . '/QuizValuesDB.php');

    function getQuizValues(){
        global $db;
        $results = [];

        $stmt = $db->prepare("SELECT QuizID, question, correctAnswer, wrongAnswer1, wrongAnswer2, wrongAnswer3, FactsID, UserID FROM QuizValues");

        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return ($results);

    }

    function addQuizValue($question, $correctAnswer, $wrongAnswer1, $wrongAnswer2, $wrongAnswer3){
        global $db;

        $result = "";

        $sql = "INSERT INTO QuizValues set question = :question, correctAnswer = :correctAnswer, wrongAnswer1 = :wrongAnswer1, wrongAnswer2 = :wrongAnswer2, wrongAnswer3 = :wrongAnswer3";
        $stmt = $db->prepare($sql);

        $binds = array(
            ":question" => $question,
            ":correctAnswer" => $correctAnswer,
            ":wrongAnswer1" => $wrongAnswer1,
            ":wrongAnswer2" => $wrongAnswer2,
            ":wrongAnswer3" => $wrongAnswer3
        );

        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $result = "Question Added";
        }

        return ($result);
    }

    function updateQuizValue($QuizID, $question, $correctAnswer, $wrongAnswer1, $wrongAnswer2, $wrongAnswer3){
        global $db;
        $results = "";
        $sql = "UPDATE QuizValues set question = :question, correctAnswer = :correctAnswer, wrongAnswer1 = :wrongAnswer1, wrongAnswer2 = :wrongAnswer2, wrongAnswer3 = :wrongAnswer3 WHERE QuizID = :QuizID";

        $stmt = $db->prepare($sql);
        $stmt->bindValue(":QuizID", $QuizID);
        $stmt->bindValue(":question", $question);
        $stmt->bindValue(":correctAnswer", $correctAnswer);
        $stmt->bindValue(":wrongAnswer1", $wrongAnswer1);
        $stmt->bindValue(":wrongAnswer2", $wrongAnswer2);
        $stmt->bindValue(":wrongAnswer3", $wrongAnswer3);

        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = "Question Updated";
        }

        return ($results);
    }

    function deleteQuizValue($QuizID){
        global $db;
        $results = "Question was not deleted";
        $stmt = $db->prepare("DELETE FROM QuizValues WHERE QuizID = :QuizID");

        $stmt->bindValue(":QuizID", $QuizID);

        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = "Question Deleted";
        }

        return ($results);
    }

    function getQuizValue($QuizID){
        global $db;
        $results = [];

        $stmt = $db->prepare("SELECT * FROM QuizValues WHERE QuizID = :QuizID");

        $stmt->bindValue(":QuizID", $QuizID);

        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        return ($results);
    }

    function searchQuizValues($question, $correctAnswer){
        global $db;
        $binds = array();
        $sql = "SELECT * FROM QuizValues WHERE 0=0";

        if ($question != "") {
            $sql .= " AND question LIKE :question";
            $binds[":question"] = "%$question%";
        }

        if ($correctAnswer != "") {
            $sql .= " AND correctAnswer LIKE :correctAnswer";
            $binds[":correctAnswer"] = "%$correctAnswer%";
        }

        $sql .= " ORDER BY question";

        $results = array();
        $stmt = $db->prepare($sql);

        if($stmt->execute($binds) && $stmt->rowCount() > 0){
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return ($results);
    }

    // function login($username, $password){
    //     global $db;
    //     $result = [];

    //     $stmt = $db->prepare("SELECT * FROM Users WHERE username = :username AND password=sha1(:password)");
    //     $stmt->bindValue(":username", $username);
    //     $stmt->bindValue(":password", $password);

    //     if ($stmt->execute() && $stmt->rowCount() > 0) {
    //         $result = $stmt->fetch(PDO::FETCH_ASSOC);
    //     }

    //     return ($result);
    
    // }
?>