<?php
    CLASS SessionLoader  {
        FUNCTION sessionStart() {
            session_start();
            $_SESSION["dev-systems_visited"] = 1;
        }
        FUNCTION getSession() {
            return session_id();
        }
        FUNCTION sessionStop() {
            if (session_status() === 2 && $this->is_session_started() === TRUE) {
                session_destroy();
            }
        }

        FUNCTION sessionLogout() {
            if (session_status() === 2 && $this->is_session_started() === TRUE && $this->is_session_logedin() === TRUE && $this->is_session_logedout() === TRUE) {
                unset($_SESSION);
                $this->sessionStop();
            }
        }

        FUNCTION is_session_started() {
            if (session_status() === 2 && isset($_SESSION["dev-systems_visited"]) && $_SESSION["dev-systems_visited"] === 1) {
                return TRUE;
            }
            return FALSE;
        }

        FUNCTION is_session_logedin() {
            if (session_status() === 2 && isset($_SESSION["dev-systems_logedin"]) && $_SESSION["dev-systems_logedin"] === 1) {
                return TRUE;
            }
            return FALSE;
        }

        FUNCTION is_session_logedout() {
            if (session_status() === 2 && isset($_SESSION["dev-systems_logedout"]) && $_SESSION["dev-systems_logedout"] === 1) {
                return TRUE;
            }
            return FALSE;
        }
    }
?>