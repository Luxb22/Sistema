<?php
    require_once "models/Work.php";

    class Works {
        public function main(){}

        public function workCreate(){
            $work = new Work(
                1,
                "Alberto"
            );
            $work->createWork();
        }
    }
?>