<?php
return [
    'welcome' => [
        'dashboard' => 'Tableau de bord',
        'domains' => 'Domaines',
        'measures' => 'Mesures de sécurité',
        'controls' => 'Controls',
        'action_plans' => "Plans d'action",
        'next_controls' => 'Contrôles plannifiés les 30 prochains jours',
        'control_status' => 'Etat des contrôles',
        'control_planning' => 'Planning des contrôles',
    ],
    'action' => [
        'index' => 'Liste des plans d\'action',
        'show' => 'Plan d\'action',
        'fields' => [
            'clause' => 'Clause',
            'name' => 'Nom',
            'action' => 'Plan d\'action',
            'plan_date' => 'Date de plannification',
            'next_date' => 'Date de revue',
            'note' => 'Score',
            'objective' => 'Objectif',
            'observation' => 'Observation',
            'action_plan' => 'Plan d\'actions'
        ],
    ],
    'attribute' => [
       'fields' => [
            'name' => 'Nom',
            'values' => 'Valeurs',
        ],
        'add' => 'Ajouter un attribut',
        'edit' => 'Modifier un attribut',
        'show' => 'Attribut',
        'index' => 'Liste des attributs',
        'choose' => 'Choisir un attribut',
        'title' => 'Attribut'
     ],
    'control' => [
        'description' => '',
        'fields' => [
            'action_plan' => 'Plan d\'actions',
            'attributes' => 'Attributs',
            'input' => 'Données',
            'choose_domain' => 'Choisir un domaine',
            'choose_period' => 'Choisir une periode',
            'choose_attribute' => 'Choisir un attribut',
            'clause' => 'Clause',
            'domain' => 'Domaine',
            'indicator' => 'Fonction',
            'measure' => 'Mesure',
            'model' => 'Modèle',
            'name' => 'Nom',
            'next' => 'Suivant',
            'note' => 'Note',
            'objective' => 'Objectif',
            'observations' => 'Observations',
            'plan_date' => 'Date de plannification',
            'period' => 'Période',
            'periodicity' => 'Périodicité',
            'planned' => 'Planifié',
            'realisation_date' => 'Date de réalisation',
            'realized' => 'Réalisé',
            'evidence' => 'Preuves',
            'score' => 'Score',
            'status' => 'Etat',
            'status_done' => 'Fait',
            'status_todo' => 'A faire',
            'status_all' => 'Tous',
        ],
        'checklist' => 'Fiche de contrôle',
        'list' => 'Liste des contrôles',
        'edit' => 'Modifier un contrôle de sécurité',
        'history' => 'Planning',
        'make' => 'Réaliser un contrôle',
        'plan' => 'Plannifier un contrôle',
        'radar' => 'Etat des contrôles de sécurité',
        'title' => 'Contrôles',
        'title_singular' => 'Contrôle',
    ],
    'measure' => [
        'title' => 'Mesure',
        'fields' => [
            'domain' => 'Domaine',
            'clause' => 'Clause',
            'name' => 'Nom',
            'objective' => 'Description',
            'input' => 'Données',
            'attributes' => 'Attributs',
            'model' => 'Modèle',
            'indicator' => 'Indicateur (Rouge, Orange, Vert)',
            'action_plan' => 'Plan d\'action',
            'owner' => 'Responsable',
            'periodicity' => 'Périodicité',
        ],
        'show' => 'Mesure de sécurité',
        'index' => 'Liste des mesures de sécurité',
        'create' => 'Ajouter une mesure de sécurité',
        'edit' => 'Modifier une mesure de sécurité',
        'plan' => 'Plannifier un contrôle'
    ],
    'domain' => [
        'fields' => [
            'name' => 'Nom',
            'description' => 'Description',
        ],
        'add' => 'Ajouter un domaine',
        'edit' => 'Modifier un domaine',
        'show' => 'Domaine',
        'index' => 'Liste des domaines',
        'choose' => 'Choisir un domaine',
        'title' => 'Domaine'
    ],
    'document' => [
        'title' => 'Document',
        'description' => 'Description',
        'list' => 'Liste des documents',
        'index' => 'Documents',
        'fields' => [
            'name' => 'Nom',
            'control' => 'Contrôle',
            'size' => 'Taille',
            'hash' => 'Hash',
        ],
        'model' => [
            'control' => 'Modèle de Contrôle',
            'report' => 'Rapport de pilotage',

        ],
        'count' => 'Nombre de documents',
        'total_size' => 'Taille totale',
    ],
    'exports' => [
        'index' => 'Exporter des données',
        'start' => 'Début',
        'end' => 'Fin',
        'report_title' => 'Rapport',
        'steering' => 'Rapport de pilotage du SMSI',
        'data_export_title' => 'Exportation des données',
        'domains_export'=> 'Exportation des domaines',
        'measures_export' => 'Exportation des mesures de sécurité',
        'controls_export' => 'Exportation des contrôles',
    ],
    'login' => [
        'title' => 'Entrez un mot de passe',
        'identification' => 'Identification',
        'connection' => 'Connexion',
    ],
    'user' => [
        'index' => 'Liste des utilisateurs',
        'edit' => 'Modifier un utilisateur',
        'add' => 'Ajouter un utilisateur',
        'fields' => [
            'login' => 'Login',
            'name' => 'Nom',
            'title' => 'Titre',
            'role' => 'Role',
            'password' => 'Password',
            'email' => 'eMail',
            'language' => 'Langue',
        ],
        'roles' => [
            'admin' => 'Administrateur',
            'user' => 'Utilisateur',
            'auditor' => 'Auditeur'
        ],
    ],
];
