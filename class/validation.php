<?php
    class Validation
        {
            private $data;
            private $error = [];
            public function __construct($data)
                {
                    $this->date = $data;
                }
            public function isAlpha($champ, $errorMsg)
                {
                    if(!preg_match("/^[a-zA-Z0-9_]+$/", $this->getChamp($champ)))
                        {
                            $this->error[$champ] = $errorMsg;
                        }
                }
            public function isUniq($champ, $bdd, $table, $errorMsg)
                {
                    $unique = $bdd->query("SELECT id FROM $table WHERE $champ = ?", [$this->getChamp($champ)])->fetch();
                    if($unique)
                        {
                            $this->error[$champ] = $errorMsg;
                        }
                }
            public function isEmail($champ, $errorMsg)
                {
                    if(!filter_var($this->getChamp($champ), FILTER_VALIDATE_EMAIL))
                        {
                            $this->error[$champ] = $errorMsg;
                        }
                }
            public function isConfirm($champ, $errorMsg)
                {
                    $valeur = $this->getChamp($champ);
                    if(!empty($valeur) || $valeur != $this->getChamp($champ . '_confirm'))
                        {
                            $this->error[$champ] = $errorMsg;
                        }
                }
            public function isValid()
                {
                    return empty($this->error);
                }
            //Fonctions GET
            private function getChamp($champ)
                {
                    if(!isset($this->data[$champ]))
                        {
                            return null;
                        }
                    return $this->data[$champ];
                }
            public function getError()
                {
                    return $this->error;
                }
        }
?>