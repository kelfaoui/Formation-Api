<?php

require_once __DIR__ . '/../model/FormationsModel.php';

class FormationsController
{

    public function createFormations($nom, $beginDate, $date_debut, $max_participants, $prix)
    {
        $formations = new FormationsModel($nom, $beginDate, $date_debut, $max_participants, $prix);
        $formations->create();
    }

    public function getFormations()
    {
        $formations = FormationsModel::findAll();
        echo'<pre>';print_r($formations);die();

        return $formations;
    }

    public function getOneFormations($id)
    {
        $formations = FormationsModel::findById($id);
        return $formations;
    }
}
