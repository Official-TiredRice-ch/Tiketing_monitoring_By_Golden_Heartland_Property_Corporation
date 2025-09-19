<?php

class Db
{
    // CREATE CONNECTION TO DATABASE
    public function conn()
    {
        try {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "ires";

            $con = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            return $e->getMessage() . $con = NULL;
        } catch (Throwable $t) {
            return $t->getMessage() . $con = NULL;
        }
        return $con;
    }
}
