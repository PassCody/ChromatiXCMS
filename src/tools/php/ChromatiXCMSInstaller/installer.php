<?php
    if (is_array($_POST) && !empty($_POST)) {
        foreach ($_POST as $key => $value) {
            if (!isset($value) && empty($value)) {
                header('Location: ../../../../../index.php/?install_error');
            }
        }
        $installation = new Installation();
        $installation->setPostRequest($_POST);
        $paths = Array();
        $paths[0] = "../";
        $paths[1] = "../../";
        $paths[2] = "../../../";
        $paths[3] = "../../../../";
        for ($i = 0; $i <= sizeof($paths)-1; $i++) {
            $installation->writeForbiddenAccessHTML($paths[$i]);
        }
        $installation->writeConfig($paths[1]);
        $installation->createSQLDataBase();
        $installation->completeInstall();
        header('Location: ../../../../../index.php');
    }
    else {
        header('Location: ../../../../../index.php/?install_error');
    }

    CLASS Installation {
        private $postRequest;        
        FUNCTION writeConfig($path) {
            if(!file_exists($path."config")) {
                mkdir($path."config",6777, TRUE);
            }
            $file = fopen($path.'config/config.php', 'w');
            fwrite($file, "<?php
            /* General Stuff */
                \$d_name            = '".$this->getPostRequest()['domain_name']."';             /* Domain */
                \$p_name            = '".$this->getPostRequest()['project_name']."';            /* Project Name */
            /* Database Connection */
                \$db_ip             = '".$this->getPostRequest()['db_ip']."';                   /* DataBase IP */
                \$db_port           = '".$this->getPostRequest()['db_port']."';                 /* DataBase Port */
                \$db_user           = '".$this->getPostRequest()['db_user']."';                 /* DataBase User */
                \$db_password       = '".$this->getPostRequest()['db_key']."';                  /* DataBase Password */
                \$db_name           = '".$this->getPostRequest()['db_name']."';                 /* DataBase Name */
                
            /* Priavate Stuff For Law Stuff */
                \$f_name            = '".$this->getPostRequest()['f_name']."';                  /* First Name */
                \$l_name            = '".$this->getPostRequest()['l_name']."';                  /* Last Name */
                \$street            = '".$this->getPostRequest()['street']."';                  /* Street and House Number */
                \$p_code            = '".$this->getPostRequest()['p_code']."';                  /* Post Code & State*/
                \$country           = '".$this->getPostRequest()['country']."';                 /* country */
                \$e_mail            = '".$this->getPostRequest()['e_mail']."';                  /* Contact E-Mail */
?>");
        }

        FUNCTION writeForbiddenAccessHTML($path) {
            $file = fopen($path.'/index.html', 'w');
            fwrite($file, "<!DOCTYPE html>
            <html>
                <head>
                    <title>Error 404</title>
                    <?xml version='1.0' encoding='UTF-8'?>
                    <link rev='made' href='mailto:".$this->getPostRequest()['e_mail']."' />
                    <style type='text/css'><!--/*-->
                        <![CDATA[/*><!--*/ 
                        body { color: #000000; background-color: #FFFFFF; }
                        a:link { color: #0000CC; }
                        p, address {margin-left: 3em;}
                        span {font-size: smaller;}
                        /*]]>*/-->
                    </style>
                </head>
                <body>
                    <center>
                        <h1>ERROR 404 PAGE NOT FOUND</h1>
                        Don't worry, this isn't the end.<br>
                        Click to the Back Button<br>
                        <button onclick='location.href=\"../\"'>Back to Start</button>
                    </center>
                </body>
            </html>
            ");
        }

        FUNCTION createSQLDataBase() {
            $ip = $this->getPostRequest()['db_ip'].":".$this->getPostRequest()['db_port'];
            $user = $this->getPostRequest()['db_user'];
            $password = $this->getPostRequest()['db_key'];
            $db = new mysqli($ip, $user, $password, '');
            if(!$db) {
                exit('Error connecting to database'); //Should be a message a typical user could understand in production
            }
            $this->createDataBase($db);
            $this->useDataBase($db);
            $this->createMembersTable($db);
            $this->createPermissionsTable($db);
            $this->createNewsTable($db);
            $this->createMatchesTable($db);
            $this->createTeamTable($db);
            $this->createDownloadsTable($db);
            $this->createContactTable($db);
            $this->createSponsorsTable($db);
            $this->createShoutboxTable($db);
            $this->insertPermissions($db);
            mysqli_close($db);
        }

        FUNCTION createDataBase($db) {
            $db_name = $this->getPostRequest()['db_name'];
            $query = "CREATE DATABASE IF NOT EXISTS $db_name";
            $resault = mysqli_query($db, $query);
        }

        FUNCTION useDataBase($db) {
            $query = "USE ".$this->getPostRequest()['db_name']."";
            $resault = mysqli_query($db, $query);
        }

        FUNCTION createMembersTable($db) {
            $query = "CREATE TABLE IF NOT EXISTS `members` (
                `entryid` BIGINT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                `username` VARCHAR(32) NOT NULL,
                `password` VARCHAR(40) NOT NULL,
                `e_mail` VARCHAR(255) NOT NULL,
                `register_date` VARCHAR(19) NOT NULL,
                `last_login_date` VARCHAR(19) NOT NULL,
                `register_ip` VARCHAR(15) NOT NULL,
                `last_login_ip` VARCHAR(15) DEFAULT '0.0.0.0',
                `staff_id` BIGINT(20) NOT NULL,
                `permissions` BIGINT(20) NOT NULL,
                `steam_id` VARCHAR(255) NOT NULL,
                `banned` SMALLINT(6) NOT NULL,
                `session_id` VARCHAR(255) NOT NULL
            ) ENGINE=INNODB DEFAULT CHARSET=latin1;";
            $resault = mysqli_query($db, $query);
        }

        FUNCTION createPermissionsTable($db) {
            $query = "CREATE TABLE IF NOT EXISTS `permissions` (
                `entryid` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                `permissions` bigint(20) NOT NULL,
                `name` varchar(255) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
            $resault = mysqli_query($db, $query);
        }
        FUNCTION createNewsTable($db) {
            $query = "CREATE TABLE IF NOT EXISTS `news` (
                `entryid` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                `content` varchar(8000) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
            $resault = mysqli_query($db, $query);
        }
        FUNCTION createMatchesTable($db) {
            $query = "CREATE TABLE IF NOT EXISTS `matches` (
                `home_team` varchar(255) NOT NULL,
                `guest_team` varchar(255) NOT NULL,
                `points` varchar(5) NOT NULL,
                `map_one_name` varchar(255) NOT NULL,
                `map_one_points` varchar(5) NOT NULL,
                `map_two_name` varchar(255) NOT NULL,
                `map_two_points` varchar(5) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
            $resault = mysqli_query($db, $query);
        }
        FUNCTION createTeamTable($db) {
            $query = "CREATE TABLE IF NOT EXISTS `team` (
                `entryid` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                `content` varchar(8000) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
            $resault = mysqli_query($db, $query);
        }
        FUNCTION createDownloadsTable($db) {
            $query = "CREATE TABLE IF NOT EXISTS `downloads` (
                `entryid` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                `content` varchar(8000) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
            $resault = mysqli_query($db, $query);
        }
        FUNCTION createContactTable($db) {
            $query = "CREATE TABLE IF NOT EXISTS `contact` (
                `entryid` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                `content` varchar(8000) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
            $resault = mysqli_query($db, $query);
        }
        FUNCTION createSponsorsTable($db) {
            $query = "CREATE TABLE IF NOT EXISTS `sponsors` (
                `entryid` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                `content` varchar(8000) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
            $resault = mysqli_query($db, $query);
        }
        FUNCTION createShoutboxTable($db) {
            $query = "CREATE TABLE IF NOT EXISTS `shoutbox` (
                `entryid` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                `text` varchar(500) NOT NULL,
                `user` varchar(32) NOT NULL,
                `date_time` datetime NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
            $resault = mysqli_query($db, $query);
        }

        FUNCTION insertPermissions($db) {
            $query = "INSERT INTO `permissions` (`entryid`, `permissions`, `name`) VALUES
            (1, 0, 'User'),
            (2, 1, 'Member'),
            (3, 2, 'VIP'),
            (4, 3, 'Moderator'),
            (5, 4, 'Supporter'),
            (6, 5, 'Team Leader'),
            (7, 6, 'Admin'),
            (8, 7, 'Owner');";
            $resault = mysqli_query($db, $query);
        }

        FUNCTION setPostRequest($postRequest) {
            $this->postRequest = $postRequest;
        }

        FUNCTION getPostRequest() {
            return $this->postRequest;
        }

        FUNCTION completeInstall() {
            unlink("../ChromatiXCMSInstaller.php");
            unlink("installer.php");
            unlink("../ChromatiXCMSInstaller");
        }
    }
?>
