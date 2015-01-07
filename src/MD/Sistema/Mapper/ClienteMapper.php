<?php

namespace MD\Sistema\Mapper;

use MD\Sistema\Entity\Cliente;

class ClienteMapper {

    public function insert(Cliente $cliente)
    {
        return [
            'nome' => 'Cliente X',
            'email' => 'email@clientex.com'
        ];
    }

} 