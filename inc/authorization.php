<?php
    class Authorization{
        private $admin = array("timeline.php", "create_case.php");
        private $ceo = array("timeline.php");
        private $coo = array("timeline.php");
        private $hod = array("timeline.php", "create_case.php");
        private $manager = array("timeline.php", "create_case.php");
        private $specialist = array("timeline.php", "create_case.php");
        private $supervisor = array("timeline.php", "create_case.php");
        private $teammember = array("timeline.php", "create_case.php");
        private $rep = array("timeline.php", "create_case.php");
        private $spectator = array("timeline.php", "create_case.php");

        private $auth = array($this->admin, $this->ceo, $this->coo, $this->hod, $this->manager, $this->specialist, $this->supervisor, $this->teammember, $this->rep, $this->spectator);

        function authorization_control($page, $who){
            return in_array($page, $this->auth[$who]);
        }
    }
?>