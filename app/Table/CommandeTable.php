<?php

namespace App\Table;

use Core\Table\Table;

class CommandeTable extends Table
{
    protected $table = "commandes";

    public function informations($id)
    {
        return $this->query(
            "
        SELECT *
        FROM commandes
        WHERE id = ?
        ",
            [$id],
            true
        );
    }

}