<?php
class Etudiants extends Db
{

    public function select()
    {
        $sql = "SELECT * FROM etudiants";
        $result = $this->connect()->query($sql);
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function insert($fields)
    {
        $implodeColumns = implode(', ', array_keys($fields));
        $implodePlaceHolde = implode(", :", array_keys($fields));

        $sql = "INSERT INTO etudiants ($implodeColumns) VALUES (:" . $implodePlaceHolde . ")";

        $stm = $this->connect()->prepare($sql);

        foreach ($fields as $key => $value) {
            $stm->bindValue(':' . $key, $value);
        }
        $stmExe = $stm->execute();

        if ($stmExe) {
            header('Location:index.php');
        }
    }
    public function selectOne($id)
    {
        $sql = "SELECT * FROM etudiants WHERE id=:id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":id",$id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }
    public function update($fields,$id)
    {
        $st = "";
        $counter = 1;
        $total_fields = count($fields);
        foreach ($fields as $key => $value) {
            if ($counter === $total_fields) {
                $set = "$key =:".$key;
                $st = $st.$set;
            } else {
                $set = "$key =:".$key.", ";
                $st = $st.$set;
                $counter++;
            }
        }

        $sql = "";
        $sql.= "UPDATE etudiants SET ".$st;
        $sql.= " WHERE id =".$id;

        $stmt = $this->connect()->prepare($sql);
        foreach ($fields as $key => $value) {
            $stmt->bindValue(":".$key,$value);
            // var_dump($stmt);
            // die();
        }

        $stmExe = $stmt->execute();

        if ($stmExe) {
            header("Location:index.php");
        }
    }
    public function destroy($id){
        $sql = "DELETE FROM etudiants WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":id",$id);
        $stmt->execute();
    }

}
