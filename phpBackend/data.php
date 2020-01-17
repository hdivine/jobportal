<?php 

class Data extends Execute {

    private $con;


    public function requires($sql, $sqlParam) {
        $this->getParam($sql, $sqlParam);
    }

    public function inserOrDel() {
        $this->exec();
    }

    // private function closeMe() {
    //     $this->con->close();
    // }


    public function select() {
        $this->con = $this->exec();

        $data = [];
        while ($row = $this->con->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }

        // $this->closeMe();

        return $data;
    

    }

}