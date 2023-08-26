<?php
    CLASS ChromatiXCMSInstaller {
        
        FUNCTION main($super) {
            $installPath = $super->getPath()."ChromatiXCMSInstaller/installer.php";
            echo('
            <center>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm"></div>
                        <div class="col-sm-2">
                                <label class="mode_type" id="mode_type_text" for="mode_type">
                                    Switch to Darkmode
                                </label>
                                <label class="mode_type_switch" name="mode_type" id="mode_type_switch">
                                    <input type="checkbox" class="mode_type_checkbox mode_type_input" name="mode_type" id="mode_type_checkbox mode_type_input">
                                    <span class="mode_type_slider mode_type_round" name="mode_type" id="mode_type_slider mode_type_round"></span>
                                </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="container-fluid">
                            <form action="'.$installPath.'" method="post" autocomplete="off">
                                <div class="row">
                                    <h3 id="domain-Settings">Domain Settings</h3>
                                    <div class="col-sm"></div>
                                    <div class="col-sm-2" for="domain_name">
                                        <label for="domain_name" id="domain_name">
                                            Domain:
                                        </label>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="domain_name" id="domain_name">
                                    </div>
                                    <div class="col-sm"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm"></div>
                                    <div class="col-sm-2" for="project_name">
                                        <label for="project_name" id="project_name">
                                            Project Name:
                                        </label>
                                    </div>
                                    <div class="col-sm-2">
                                    <input type="text" name="project_name" id="project_name">
                                    </div>
                                    <div class="col-sm"></div>
                                </div>
                                <hr>
                                <div class="row">
                                    <h3 id="database-Settings">Database Settings</h3>
                                    <div class="col-sm"></div>
                                    <div class="col-sm-2" for="db_ip">
                                        <label for="db_ip" id="db_ip">
                                            DataBase IP:
                                        </label>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="db_ip" id="db_ip">
                                    </div>
                                    <div class="col-sm"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm"></div>
                                    <div class="col-sm-2" for="db_port">
                                        <label for="db_port" id="db_port">
                                            DataBase Port:
                                        </label>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="db_port" id="db_port">
                                    </div>
                                    <div class="col-sm"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm"></div>
                                    <div class="col-sm-2" for="db_user">
                                        <label for="db_user" id="db_user">
                                            DataBase User:
                                        </label>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="db_user" id="db_user">
                                    </div>
                                    <div class="col-sm"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm"></div>
                                    <div class="col-sm-2" for="db_key">
                                        <label for="db_key" id="db_key">
                                            DataBase Password:
                                        </label>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="db_key" id="db_key">
                                    </div>
                                    <div class="col-sm"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm"></div>
                                    <div class="col-sm-2" for="db_name">
                                        <label for="db_name" id="db_name">
                                        DataBase Name:
                                        </label>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="db_name" id="db_name">
                                    </div>
                                    <div class="col-sm"></div>
                                </div>
                                <hr>
                                <div class="row">
                                    <h3 id="private-Stuff">Private Stuff:</h3>
                                    <div class="col-sm"></div>
                                    <div class="col-sm-2" for="f_name">
                                        <label for="f_name" id="f_name">
                                        First Name:
                                        </label>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="f_name" id="f_name">
                                    </div>
                                    <div class="col-sm"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm"></div>
                                    <div class="col-sm-2" for="l_name">
                                        <label for="l_name" id="l_name">
                                        Last Name:
                                        </label>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="l_name" id="l_name">
                                    </div>
                                    <div class="col-sm"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm"></div>
                                    <div class="col-sm-2" for="street">
                                        <label for="street" id="street">
                                        Street & House Number:
                                        </label>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="street" id="street">
                                    </div>
                                    <div class="col-sm"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm"></div>
                                    <div class="col-sm-2" for="p_code">
                                        <label for="p_code" id="p_code">
                                        Post Code & State:
                                        </label>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="p_code" id="p_code">
                                    </div>
                                    <div class="col-sm"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm"></div>
                                    <div class="col-sm-2" for="country">
                                        <label for="country" id="country">
                                        Country:
                                        </label>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="country" id="country">
                                    </div>
                                    <div class="col-sm"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm"></div>
                                    <div class="col-sm-2" for="e_mail">
                                        <label for="e_mail" id="e_mail">
                                        Contact E-Mail:
                                        </label>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="e_mail" id="e_mail">
                                    </div>
                                    <div class="col-sm"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm"></div>
                                    <div class="col-sm-2" for="e_mail">
                                        <button type="submit" class="btn btn-success ">Install Config</button>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                    </div>
                                    <div class="col-sm"></div>
                                </div>
                            </form>
                                <table>
                                    <tr>
                                        <td>
                                            
                                        </td>
                                        <td>
                                            
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </center>
            ');
        }
    }
?>