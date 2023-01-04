<?php

require_once __DIR__ . '/../model/ParticipantsModel.php';

class ParticipantsController
{

    public function createParticipants($nom, $prenom, $entreprise)
    {
        $participants = new ParticipantsModel($nom, $prenom, $entreprise);
        $participants->create();
    }

    public function getParticipants()
    {
        $participants = ParticipantsModel::findAll();
        return $participants;
    }

    public function getOneParticipants($id)
    {
        $participants = ParticipantsModel::findById($id);
        return $participants;
    }
}
