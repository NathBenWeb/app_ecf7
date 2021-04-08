<?php

class GradeModel extends Driver{

    public function getGrades(){
        $sql = "SELECT * FROM grades ORDER BY id_g";

        $result = $this->getRequest($sql);

        $rows = $result->fetchAll(PDO::FETCH_OBJ);

        $tabGrade = [];

        foreach($rows as $row){
            $grade = new Grade();
            $grade->setId_g($row->id_g);
            $grade->setName_grade($row->name_grade);
            array_push($tabGrade, $grade);
        }
        return $tabGrade;

    }

    public function deleteGrade($id){
        $sql = "DELETE FROM grades WHERE id_g = :id";
        $result = $this -> getRequest($sql, ["id" => $id]);
        $nb = $result -> rowCount();
        return $nb;
    }

    public function gradeItem($id){
        $sql = "SELECT * FROM grades WHERE id_g = :id";
        $result = $this -> getRequest($sql, ["id" => $id]);
        if($result -> rowCount() > 0){

            $row = $result->fetch(PDO::FETCH_OBJ);

            $grade = new Grade();
            $grade -> setId_g($row->id_g);
            $grade -> setName_grade($row->name_grade);
            return $grade;
        }
    }

    public function updateGrade(Grade $grade){
        $sql = "UPDATE grades
        SET name_grade = :name
        WHERE id_g = :id";
        $result = $this -> getRequest($sql, ["name" => $grade -> getName_grade(), "id" => $grade -> getId_g()]);

        if($result -> rowCount() > 0){
            $nb = $result -> rowCount();
            return $nb;
        }
    }

    public function insertGrade(Grade $grade){
        $sql = "INSERT INTO grades(name_grade) VALUES (:name)";

        $result = $this -> getRequest($sql, array("name" => $grade -> getName_grade()));
            return $result;
    }
}