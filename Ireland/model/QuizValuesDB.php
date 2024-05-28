<?php 

class QuizValuesDB{

    private $QuizValuesData;

    public function __construct($configFile){

        if($ini = parse_ini_file($configFile)){
            $connectionString = "mysql:host=" . $ini['servername'] . ";port=" . $ini['port'] . ";dbname=" . $ini['database'];

            $QuizValuesPDO = new PDO($connectionString, $ini['username'], $ini['password']);

            $QuizValuesPDO->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            $QuizValuesPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->QuizValuesData = $QuizValuesPDO;
        }
        else{
            throw new Exception("<h2>Creation of database object failed!</h2>", 0, null);
        }
    }

    public function getQuizValues(){
        $results = [];
        $QuizValuesTable = $this->QuizValuesData;

        $stmt = $QuizValuesTable->prepare("SELECT * FROM QuizValues ORDER BY question");

        if ($stmt->execute() && $stmt->rowCount() > 0){
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return ($results);
    }

    public function addQuizValue($question, $correctAnswer, $wrongAnswer1, $wrongAnswer2, $wrongAnswer3){
        $addSucessful = false;
        $QuizValuesTable = $this->QuizValuesData;

        $stmt = $QuizValuesTable->prepare("INSERT INTO QuizValues SET question = :question, correctAnswer = :correctAnswer, wrongAnswer1 = :wrongAnswer1, wrongAnswer2 = :wrongAnswer2, wrongAnswer3 = :wrongAnswer3");

        $boundParams = array(
            ":question" => $question,
            ":correctAnswer" => $correctAnswer,
            ":wrongAnswer1" => $wrongAnswer1,
            ":wrongAnswer2" => $wrongAnswer2,
            ":wrongAnswer3" => $wrongAnswer3
        );

        $addSucessful = ($stmt->execute($boundParams) && $stmt->rowCount() > 0);

        return $addSucessful;
    }

    public function updateQuizValue($QuizID, $question, $correctAnswer, $wrongAnswer1, $wrongAnswer2, $wrongAnswer3){
        $updateSucessful = false;
        $QuizValuesTable = $this->QuizValuesData;

        $stmt = $QuizValuesTable->prepare("UPDATE QuizValues SET question = :question, correctAnswer = :correctAnswer, wrongAnswer1 = :wrongAnswer1, wrongAnswer2 = :wrongAnswer2, wrongAnswer3 = :wrongAnswer3 WHERE QuizID = :QuizID");

        $stmt->bindValue(":QuizID", $QuizID);
        $stmt->bindValue(":question", $question);
        $stmt->bindValue(":correctAnswer", $correctAnswer);
        $stmt->bindValue(":wrongAnswer1", $wrongAnswer1);
        $stmt->bindValue(":wrongAnswer2", $wrongAnswer2);
        $stmt->bindValue(":wrongAnswer3", $wrongAnswer3);

        $updateSucessful = ($stmt->execute() && $stmt->rowCount() > 0);

        return $updateSucessful;
    }

    public function deleteQuizValue ($QuizID){
        $deleteSucessful = false;
        $QuizValuesTable = $this->QuizValuesData;

        $stmt = $QuizValuesTable->prepare("DELETE FROM QuizValues WHERE QuizID = :QuizID");

        $stmt->bindValue(":QuizID", $QuizID);

        $deleteSucessful = ($stmt->execute() && $stmt->rowCount() > 0);

        return $deleteSucessful;
    }

    public function getQuizValue($QuizID){
        $results = [];
        $QuizValuesTable = $this->QuizValuesData;

        $stmt = $QuizValuesTable->prepare("SELECT * FROM QuizValues WHERE QuizID = :QuizID");

        $stmt->bindValue(":QuizID", $QuizID);

        if ($stmt->execute() && $stmt->rowCount() > 0){
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        return $results;
    }

    protected function getDatabaseRef(){
        return $this->QuizValuesData;
    }

    public function __destruct(){
        $this->QuizValuesData = null;
    }   
}

?>