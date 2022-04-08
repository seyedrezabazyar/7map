<?php

$databaseConfig = (object)[
    'host' => 'localhost',
    'user' => 'root',
    'password' => 'root',
    'db' => '7Map',
];

$admins = [
    'admin' => '$2y$10$BFJK6ko7suHje7yrELgecOmeT4v4rtuU2hgKGz094XQIhlmGsc1UW', # password = 123456
    'seyedrezabazyar' => '$2y$10$p8eVbiuq3klWKLVoghhsDupH4ScHyOvc88.vF7emmNjBwthBAhIN6' # password = seyedrezabazyar
];

// echo password_hash('123456', PASSWORD_BCRYPT);
