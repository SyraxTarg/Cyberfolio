<?php


namespace App\DataFixtures;

use App\Entity\CentresInteret;
use App\Entity\Competence;
use App\Entity\Experience;
use App\Entity\Formation;
use App\Entity\Profile;
use App\Entity\Project;
use App\Entity\Technology;
use App\Entity\User;
use App\Entity\Country;
use App\Entity\Author;
use App\Entity\Cover;
use App\Entity\Genre;
use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private function camelToSnake(string $input): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $input));
    }

    private function snakeToCamel(string $input): string
    {
        return lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $input))));
    }

    public function load(ObjectManager $manager): void
    {
        $usersData = [
            [
                'Id' => '1',
                'LastName' => 'Amadio',
                'FirstName' => 'Philippe',
                'Email' => 'amadio@mailbox.com',
                'Password' => '$2y$13$HlA2hgjXCBifJVPSoE8BfuFAx1ben5s.7Nj0Zo3HetTRhq85wtecW',
                'Roles' => '["ROLE_USER"]',
                'BirthdayDate' => '1983-03-16',
                'CreatedAt' => '2024-02-03 16:33:45',
                'UpdatedAt' => '2024-02-03 16:33:45',
                'ProfileId' => '1'
            ],
            [
                'Id' => '2',
                'LastName' => 'Dubois',
                'FirstName' => 'Marie',
                'Email' => 'marie.dubois@mailbox.com',
                'Password' => '$2y$13$Hv8WjvjXQLifAPSoE9BguCAx2ben8d.8Nk1Go4ZHetZRuq95xucJH',
                'Roles' => '["ROLE_USER", "ROLE_ADMIN"]',
                'BirthdayDate' => '1990-07-22',
                'CreatedAt' => '2024-02-01 10:12:00',
                'UpdatedAt' => '2024-02-02 12:34:56',
                'ProfileId' => '2'
            ],
            [
                'Id' => '3',
                'LastName' => 'Nguyen',
                'FirstName' => 'Jean',
                'Email' => 'jean.nguyen@mailbox.com',
                'Password' => '$2y$13$Jk9QfvjXWDifKPNoE9XgufDAx3len9t.3Nk3Io9PHetTRxr87ctJH',
                'Roles' => '["ROLE_USER"]',
                'BirthdayDate' => '1988-01-15',
                'CreatedAt' => '2024-02-03 08:45:00',
                'UpdatedAt' => '2024-02-03 09:30:00',
                'ProfileId' => '3'
            ],
            [
                'Id' => '4',
                'LastName' => 'Smith',
                'FirstName' => 'John',
                'Email' => 'john.smith@mailbox.com',
                'Password' => '$2y$13$Il6KqvjXFDgfXPSoE8TquCEx4ren7v.6Nk2Go7NHetMRqz88ntKH',
                'Roles' => '["ROLE_USER"]',
                'BirthdayDate' => '1985-11-30',
                'CreatedAt' => '2024-02-02 15:23:00',
                'UpdatedAt' => '2024-02-02 15:30:00',
                'ProfileId' => '4'
            ],
            [
                'Id' => '5',
                'LastName' => 'Lopez',
                'FirstName' => 'Isabelle',
                'Email' => 'isabelle.lopez@mailbox.com',
                'Password' => '$2y$13$Xj2PvwjXFBifAPPoT9CqvfGAx6cen8f.8Nk4Mo6QHetTRyr89xtKL',
                'Roles' => '["ROLE_USER"]',
                'BirthdayDate' => '1995-06-18',
                'CreatedAt' => '2024-02-03 11:00:00',
                'UpdatedAt' => '2024-02-03 11:45:00',
                'ProfileId' => '5'
            ],
            [
                'Id' => '6',
                'LastName' => 'Martin',
                'FirstName' => 'Claire',
                'Email' => 'claire.martin@mailbox.com',
                'Password' => '$2y$13$Hq9KfvjXZFdgjKPPoT8CguEGAx5len8g.9Nk4So6AHetURqr88ytKL',
                'Roles' => '["ROLE_USER"]',
                'BirthdayDate' => '1992-12-05',
                'CreatedAt' => '2024-02-03 09:00:00',
                'UpdatedAt' => '2024-02-03 09:15:00',
                'ProfileId' => '6'
            ],
            [
                'Id' => '7',
                'LastName' => 'Lemoine',
                'FirstName' => 'Antoine',
                'Email' => 'antoine.lemoine@mailbox.com',
                'Password' => '$2y$13$Yj7PvwjXGDdfHPQoN9TqufBAx4ren9c.8Nk6Ho5PHetTRyr77ntHL',
                'Roles' => '["ROLE_USER", "ROLE_MANAGER"]',
                'BirthdayDate' => '1980-05-12',
                'CreatedAt' => '2024-02-02 18:00:00',
                'UpdatedAt' => '2024-02-02 18:30:00',
                'ProfileId' => '7'
            ],
            [
                'Id' => '8',
                'LastName' => 'Fernandez',
                'FirstName' => 'Laura',
                'Email' => 'laura.fernandez@mailbox.com',
                'Password' => '$2y$13$Xv6PwqjXFBifAPSoE8BquDFAx4ren7d.8Nk6Io4QHetTRxr67ctJL',
                'Roles' => '["ROLE_USER"]',
                'BirthdayDate' => '1993-09-10',
                'CreatedAt' => '2024-02-01 20:00:00',
                'UpdatedAt' => '2024-02-01 20:30:00',
                'ProfileId' => '8'
            ],
            [
                'Id' => '9',
                'LastName' => 'Garcia',
                'FirstName' => 'Pedro',
                'Email' => 'pedro.garcia@mailbox.com',
                'Password' => '$2y$13$Tl7PvwjXFBgfWPQoT9BqufDAx5len9a.7Nk7Ho4QHetTRmr87dtLL',
                'Roles' => '["ROLE_USER"]',
                'BirthdayDate' => '1987-04-25',
                'CreatedAt' => '2024-02-03 07:00:00',
                'UpdatedAt' => '2024-02-03 07:45:00',
                'ProfileId' => '9'
            ],
            [
                'Id' => '10',
                'LastName' => 'Rossi',
                'FirstName' => 'Valentina',
                'Email' => 'valentina.rossi@mailbox.com',
                'Password' => '$2y$13$Hl8LvwjXCBifPPSoT9DqufGAx4ren8b.7Nk7Io5PHetTRpr88htML',
                'Roles' => '["ROLE_USER"]',
                'BirthdayDate' => '1996-01-08',
                'CreatedAt' => '2024-02-01 21:00:00',
                'UpdatedAt' => '2024-02-01 21:45:00',
                'ProfileId' => '10'
            ],
            [
                'Id' => '11',
                'LastName' => 'Bennett',
                'FirstName' => 'James',
                'Email' => 'james.bennett@mailbox.com',
                'Password' => '$2y$13$Hl6PvwjXCBdfHPQoE9TguEGAx5len9f.8Nk8Jo5QHetTRyr79ctRL',
                'Roles' => '["ROLE_USER", "ROLE_MANAGER"]',
                'BirthdayDate' => '1990-08-30',
                'CreatedAt' => '2024-02-01 14:00:00',
                'UpdatedAt' => '2024-02-01 14:30:00',
                'ProfileId' => '11'
            ],
            [
                'Id' => '12',
                'LastName' => 'Müller',
                'FirstName' => 'Sophie',
                'Email' => 'sophie.muller@mailbox.com',
                'Password' => '$2y$13$Ll7OvwjXABifSPQoE8AguCGAx6len8d.8Nk5Mo4PHetTRwr89ntLL',
                'Roles' => '["ROLE_USER"]',
                'BirthdayDate' => '1997-03-14',
                'CreatedAt' => '2024-02-03 06:00:00',
                'UpdatedAt' => '2024-02-03 06:15:00',
                'ProfileId' => '12'
            ],
            [
                'Id' => '13',
                'LastName' => 'Weber',
                'FirstName' => 'Karl',
                'Email' => 'karl.weber@mailbox.com',
                'Password' => '$2y$13$Ml7NvwjXGDgfXPNoT9EguEGAx4ren7e.9Nk6Io3PHetTRsr67ctJL',
                'Roles' => '["ROLE_USER"]',
                'BirthdayDate' => '1989-10-23',
                'CreatedAt' => '2024-02-02 10:00:00',
                'UpdatedAt' => '2024-02-02 10:30:00',
                'ProfileId' => '13'
            ],
            [
                'Id' => '14',
                'LastName' => 'White',
                'FirstName' => 'Anna',
                'Email' => 'anna.white@mailbox.com',
                'Password' => '$2y$13$Hl8PvwjXDBifUPSoE9AguBFAx5len7c.8Nk9Io4PHetTRpr67dtJL',
                'Roles' => '["ROLE_USER"]',
                'BirthdayDate' => '1991-02-07',
                'CreatedAt' => '2024-02-02 11:00:00',
                'UpdatedAt' => '2024-02-02 11:15:00',
                'ProfileId' => '14'
            ],
        ];


        $profilesDatas = [
            ['Id' => '1', 'telephone' => '0632145578', 'profilePicture' => 'default.jpg'],
            ['Id' => '2', 'telephone' => '0632145579', 'profilePicture' => 'default.jpg'],
            ['Id' => '3', 'telephone' => '0632145580', 'profilePicture' => 'default.jpg'],
            ['Id' => '4', 'telephone' => '0632145581', 'profilePicture' => 'default.jpg'],
            ['Id' => '5', 'telephone' => '0632145582', 'profilePicture' => 'default.jpg'],
            ['Id' => '6', 'telephone' => '0632145583', 'profilePicture' => 'default.jpg'],
            ['Id' => '7', 'telephone' => '0632145584', 'profilePicture' => 'default.jpg'],
            ['Id' => '8', 'telephone' => '0632145585', 'profilePicture' => 'default.jpg'],
            ['Id' => '9', 'telephone' => '0632145586', 'profilePicture' => 'default.jpg'],
            ['Id' => '10', 'telephone' => '0632145587', 'profilePicture' => 'default.jpg'],
            ['Id' => '11', 'telephone' => '0632145588', 'profilePicture' => 'default.jpg'],
            ['Id' => '12', 'telephone' => '0632145589', 'profilePicture' => 'default.jpg'],
            ['Id' => '13', 'telephone' => '0632145590', 'profilePicture' => 'default.jpg'],
            ['Id' => '14', 'telephone' => '0632145591', 'profilePicture' => 'default.jpg'],
        ];



        $projectDatas = [
            [
                'Id' => '1',
                'Title' => 'Projet 1',
                'Description' => 'Ceci est une description quelconque pour un projet qui a été fait en 2013',
                'Screenshot' => 'default.jpg',
                'UserId' => '1',
                'CreatedAt' => '2024-02-03 16:33:45',
                'link' => 'https://github.com/project'
            ],
            [
                'Id' => '2',
                'Title' => 'Projet 2',
                'Description' => 'Une description pour le second projet réalisé récemment.',
                'Screenshot' => 'default.jpg',
                'UserId' => '2',
                'CreatedAt' => '2024-02-04 10:15:30',
                'link' => 'https://github.com/project'
            ],
            [
                'Id' => '3',
                'Title' => 'Projet 3',
                'Description' => 'Un projet imaginatif construit en 2020.',
                'Screenshot' => 'default.jpg',
                'UserId' => '3',
                'CreatedAt' => '2024-02-05 12:20:15',
                'link' => 'https://github.com/project'
            ],
            [
                'Id' => '4',
                'Title' => 'Projet 4',
                'Description' => 'Ceci est une description pour un projet innovant.',
                'Screenshot' => 'default.jpg',
                'UserId' => '4',
                'CreatedAt' => '2024-02-06 09:45:00',
                'link' => 'https://github.com/project'
            ],
            [
                'Id' => '5',
                'Title' => 'Projet 5',
                'Description' => 'Un projet exceptionnel achevé en 2022.',
                'Screenshot' => 'default.jpg',
                'UserId' => '5',
                'CreatedAt' => '2024-02-07 18:00:25',
                'link' => 'https://github.com/project'
            ],
            [
                'Id' => '6',
                'Title' => 'Projet 6',
                'Description' => 'Un projet captivant concernant la science.',
                'Screenshot' => 'default.jpg',
                'UserId' => '6',
                'CreatedAt' => '2024-02-08 14:30:10',
                'link' => 'https://github.com/project'
            ],
            [
                'Id' => '7',
                'Title' => 'Projet 7',
                'Description' => 'Projet passionnant réalisé pour l\'éducation.',
                'Screenshot' => 'default.jpg',
                'UserId' => '7',
                'CreatedAt' => '2024-02-09 16:00:45',
                'link' => 'https://github.com/project'
            ],
            [
                'Id' => '8',
                'Title' => 'Projet 8',
                'Description' => 'Un projet fascinant terminé en 2019.',
                'Screenshot' => 'default.jpg',
                'UserId' => '8',
                'CreatedAt' => '2024-02-10 17:45:35',
                'link' => 'https://github.com/project'
            ],
            [
                'Id' => '9',
                'Title' => 'Projet 9',
                'Description' => 'Un projet technologique conçu récemment.',
                'Screenshot' => 'default.jpg',
                'UserId' => '9',
                'CreatedAt' => '2024-02-11 13:20:50',
                'link' => 'https://github.com/project'
            ],
            [
                'Id' => '10',
                'Title' => 'Projet 10',
                'Description' => 'Ceci est une description pour un projet d\'art.',
                'Screenshot' => 'default.jpg',
                'UserId' => '10',
                'CreatedAt' => '2024-02-12 20:15:15',
                'link' => 'https://github.com/project'
            ],
            [
                'Id' => '11',
                'Title' => 'Projet 11',
                'Description' => 'Un projet d\'écriture achevé récemment.',
                'Screenshot' => 'default.jpg',
                'UserId' => '11',
                'CreatedAt' => '2024-02-13 11:30:05',
                'link' => 'https://github.com/project'
            ],
            [
                'Id' => '12',
                'Title' => 'Projet 12',
                'Description' => 'Un projet d\'exploration achevé en 2018.',
                'Screenshot' => 'default.jpg',
                'UserId' => '12',
                'CreatedAt' => '2024-02-14 08:40:00',
                'link' => 'https://github.com/project'
            ],
            [
                'Id' => '13',
                'Title' => 'Projet 13',
                'Description' => 'Ceci est une description pour un projet ambitieux.',
                'Screenshot' => 'default.jpg',
                'UserId' => '13',
                'CreatedAt' => '2024-02-15 19:05:45',
                'link' => 'https://github.com/project'
            ],
            [
                'Id' => '14',
                'Title' => 'Projet 14',
                'Description' => 'Un projet social réalisé récemment.',
                'Screenshot' => 'default.jpg',
                'UserId' => '14',
                'CreatedAt' => '2024-02-16 10:10:10',
                'link' => 'https://github.com/project'
            ],
            [
                'Id' => '15',
                'Title' => 'Projet 15',
                'Description' => 'Un projet collaboratif achevé en 2023.',
                'Screenshot' => 'default.jpg',
                'UserId' => '1',
                'CreatedAt' => '2024-02-17 12:25:25',
                'link' => 'https://github.com/project'
            ],
            [
                'Id' => '16',
                'Title' => 'Projet 16',
                'Description' => 'Un projet académique construit en 2020.',
                'Screenshot' => 'default.jpg',
                'UserId' => '2',
                'CreatedAt' => '2024-02-18 09:15:15',
                'link' => 'https://github.com/project'
            ],
            [
                'Id' => '17',
                'Title' => 'Projet 17',
                'Description' => 'Un projet informatique achevé récemment.',
                'Screenshot' => 'default.jpg',
                'UserId' => '3',
                'CreatedAt' => '2024-02-19 14:40:40',
                'link' => 'https://github.com/project'
            ],
            [
                'Id' => '18',
                'Title' => 'Projet 18',
                'Description' => 'Un projet créatif conçu en 2021.',
                'Screenshot' => 'default.jpg',
                'UserId' => '4',
                'CreatedAt' => '2024-02-20 16:50:50',
                'link' => 'https://github.com/project'
            ],
            [
                'Id' => '19',
                'Title' => 'Projet 19',
                'Description' => 'Un projet communautaire réalisé en 2023.',
                'Screenshot' => 'default.jpg',
                'UserId' => '5',
                'CreatedAt' => '2024-02-21 18:30:30',
                'link' => 'https://github.com/project'
            ],
            [
                'Id' => '20',
                'Title' => 'Projet 20',
                'Description' => 'Un projet écologique terminé en 2022.',
                'Screenshot' => 'default.jpg',
                'UserId' => '6',
                'CreatedAt' => '2024-02-22 20:45:15',
                'link' => 'https://github.com/project'
            ],
        ];


        $technologiesDatas = [
            ['Id' => '1', 'Name' => 'JavaScript', 'Logo' => 'js.png', 'Version' => '2.3'],
            ['Id' => '2', 'Name' => 'Python', 'Logo' => 'python.png', 'Version' => '3.9'],
            ['Id' => '3', 'Name' => 'Java', 'Logo' => 'default.png', 'Version' => '11.0'],
            ['Id' => '4', 'Name' => 'C++', 'Logo' => 'c++.png', 'Version' => '17.0'],
            ['Id' => '5', 'Name' => 'PHP', 'Logo' => 'php.png', 'Version' => '8.1'],
            ['Id' => '6', 'Name' => 'Ruby', 'Logo' => 'default.png', 'Version' => '3.0'],
            ['Id' => '7', 'Name' => 'C#', 'Logo' => 'default.png', 'Version' => '10.0'],
            ['Id' => '8', 'Name' => 'Swift', 'Logo' => 'default.png', 'Version' => '5.5'],
            ['Id' => '9', 'Name' => 'Kotlin', 'Logo' => 'default.png', 'Version' => '1.6'],
            ['Id' => '10', 'Name' => 'TypeScript', 'Logo' => 'default.png', 'Version' => '4.5'],
            ['Id' => '11', 'Name' => 'Go', 'Logo' => 'default.png', 'Version' => '1.18'],
            ['Id' => '12', 'Name' => 'Rust', 'Logo' => 'default.png', 'Version' => '1.60'],
            ['Id' => '13', 'Name' => 'Perl', 'Logo' => 'default.png', 'Version' => '5.34'],
            ['Id' => '14', 'Name' => 'Scala', 'Logo' => 'default.png', 'Version' => '3.1'],
            ['Id' => '15', 'Name' => 'HTML', 'Logo' => 'html.png', 'Version' => '5.0'],
            ['Id' => '16', 'Name' => 'CSS', 'Logo' => 'css.png', 'Version' => '3.0'],
            ['Id' => '17', 'Name' => 'SQL', 'Logo' => 'default.png', 'Version' => '2022'],
            ['Id' => '18', 'Name' => 'R', 'Logo' => 'default.png', 'Version' => '4.2'],
            ['Id' => '19', 'Name' => 'Dart', 'Logo' => 'default.png', 'Version' => '2.17'],
            ['Id' => '20', 'Name' => 'Shell', 'Logo' => 'default.png', 'Version' => '5.1'],
        ];

        $projectTechnologiesDatas = [
            ['TechnologyId' => '1', 'ProjectId' => '1'],
            ['TechnologyId' => '2', 'ProjectId' => '1'],
            ['TechnologyId' => '3', 'ProjectId' => '2'],
            ['TechnologyId' => '4', 'ProjectId' => '2'],
            ['TechnologyId' => '5', 'ProjectId' => '3'],
            ['TechnologyId' => '6', 'ProjectId' => '3'],
            ['TechnologyId' => '7', 'ProjectId' => '4'],
            ['TechnologyId' => '8', 'ProjectId' => '4'],
            ['TechnologyId' => '9', 'ProjectId' => '5'],
            ['TechnologyId' => '10', 'ProjectId' => '5'],
            ['TechnologyId' => '11', 'ProjectId' => '6'],
            ['TechnologyId' => '12', 'ProjectId' => '6'],
            ['TechnologyId' => '13', 'ProjectId' => '7'],
            ['TechnologyId' => '14', 'ProjectId' => '7'],
            ['TechnologyId' => '15', 'ProjectId' => '8'],
            ['TechnologyId' => '16', 'ProjectId' => '8'],
            ['TechnologyId' => '17', 'ProjectId' => '9'],
            ['TechnologyId' => '18', 'ProjectId' => '9'],
            ['TechnologyId' => '19', 'ProjectId' => '10'],
            ['TechnologyId' => '20', 'ProjectId' => '10'],
            ['TechnologyId' => '1', 'ProjectId' => '11'],
            ['TechnologyId' => '2', 'ProjectId' => '12'],
            ['TechnologyId' => '3', 'ProjectId' => '13'],
            ['TechnologyId' => '4', 'ProjectId' => '14'],
            ['TechnologyId' => '5', 'ProjectId' => '15'],
            ['TechnologyId' => '6', 'ProjectId' => '16'],
            ['TechnologyId' => '7', 'ProjectId' => '17'],
            ['TechnologyId' => '8', 'ProjectId' => '18'],
            ['TechnologyId' => '9', 'ProjectId' => '19'],
            ['TechnologyId' => '10', 'ProjectId' => '20'],
        ];

        $centresInteretsDatas = [
            ['Id' => '1', 'centreInteret' => 'Poterie'],
            ['Id' => '2', 'centreInteret' => 'Lecture'],
            ['Id' => '3', 'centreInteret' => 'Photographie'],
            ['Id' => '4', 'centreInteret' => 'Voyages'],
            ['Id' => '5', 'centreInteret' => 'Cuisine'],
            ['Id' => '6', 'centreInteret' => 'Randonnée'],
            ['Id' => '7', 'centreInteret' => 'Jardinage'],
            ['Id' => '8', 'centreInteret' => 'Peinture'],
            ['Id' => '9', 'centreInteret' => 'Musique'],
            ['Id' => '10', 'centreInteret' => 'Sports'],
            ['Id' => '11', 'centreInteret' => 'Jeux vidéo'],
            ['Id' => '12', 'centreInteret' => 'Danse'],
            ['Id' => '13', 'centreInteret' => 'Écriture'],
            ['Id' => '14', 'centreInteret' => 'Bricolage'],
            ['Id' => '15', 'centreInteret' => 'Astronomie'],
            ['Id' => '16', 'centreInteret' => 'Couture'],
            ['Id' => '17', 'centreInteret' => 'Pêche'],
            ['Id' => '18', 'centreInteret' => 'Théâtre'],
            ['Id' => '19', 'centreInteret' => 'Méditation'],
            ['Id' => '20', 'centreInteret' => 'Échecs'],
        ];

        $competencesDatas = [
            ['Id' => '1', 'competence' => 'Communication d’entreprise', 'hardSkill' => 'false'],
            ['Id' => '2', 'competence' => 'Programmation Python', 'hardSkill' => 'true'],
            ['Id' => '3', 'competence' => 'Gestion de projet', 'hardSkill' => 'false'],
            ['Id' => '4', 'competence' => 'Analyse de données', 'hardSkill' => 'true'],
            ['Id' => '5', 'competence' => 'Rédaction technique', 'hardSkill' => 'true'],
            ['Id' => '6', 'competence' => 'Négociation', 'hardSkill' => 'false'],
            ['Id' => '7', 'competence' => 'Design graphique', 'hardSkill' => 'true'],
            ['Id' => '8', 'competence' => 'Service client', 'hardSkill' => 'false'],
            ['Id' => '9', 'competence' => 'Marketing numérique', 'hardSkill' => 'true'],
            ['Id' => '10', 'competence' => 'Leadership', 'hardSkill' => 'false'],
            ['Id' => '11', 'competence' => 'Développement web', 'hardSkill' => 'true'],
            ['Id' => '12', 'competence' => 'Formation d’équipe', 'hardSkill' => 'false'],
            ['Id' => '13', 'competence' => 'SEO et référencement', 'hardSkill' => 'true'],
            ['Id' => '14', 'competence' => 'Adaptabilité', 'hardSkill' => 'false'],
            ['Id' => '15', 'competence' => 'Gestion financière', 'hardSkill' => 'true'],
            ['Id' => '16', 'competence' => 'Prise de parole en public', 'hardSkill' => 'false'],
            ['Id' => '17', 'competence' => 'Analyse statistique', 'hardSkill' => 'true'],
            ['Id' => '18', 'competence' => 'Travail d’équipe', 'hardSkill' => 'false'],
            ['Id' => '19', 'competence' => 'Automatisation des processus', 'hardSkill' => 'true'],
            ['Id' => '20', 'competence' => 'Résolution de conflits', 'hardSkill' => 'false'],
        ];

        $centresInteretsProfileDatas = [
            ['profileId' => '1', 'centreInteretsId' => '1'],
            ['profileId' => '1', 'centreInteretsId' => '2'],
            ['profileId' => '2', 'centreInteretsId' => '3'],
            ['profileId' => '2', 'centreInteretsId' => '4'],
            ['profileId' => '3', 'centreInteretsId' => '5'],
            ['profileId' => '3', 'centreInteretsId' => '1'],
            ['profileId' => '4', 'centreInteretsId' => '6'],
            ['profileId' => '4', 'centreInteretsId' => '2'],
            ['profileId' => '5', 'centreInteretsId' => '7'],
            ['profileId' => '5', 'centreInteretsId' => '3'],
            ['profileId' => '6', 'centreInteretsId' => '8'],
            ['profileId' => '6', 'centreInteretsId' => '4'],
            ['profileId' => '7', 'centreInteretsId' => '9'],
            ['profileId' => '7', 'centreInteretsId' => '1'],
            ['profileId' => '8', 'centreInteretsId' => '10'],
            ['profileId' => '8', 'centreInteretsId' => '5'],
            ['profileId' => '9', 'centreInteretsId' => '11'],
            ['profileId' => '9', 'centreInteretsId' => '6'],
            ['profileId' => '10', 'centreInteretsId' => '12'],
            ['profileId' => '10', 'centreInteretsId' => '7'],
            ['profileId' => '11', 'centreInteretsId' => '13'],
            ['profileId' => '11', 'centreInteretsId' => '8'],
            ['profileId' => '12', 'centreInteretsId' => '14'],
            ['profileId' => '12', 'centreInteretsId' => '9'],
            ['profileId' => '13', 'centreInteretsId' => '10'],
            ['profileId' => '13', 'centreInteretsId' => '1'],
            ['profileId' => '14', 'centreInteretsId' => '11'],
            ['profileId' => '14', 'centreInteretsId' => '2'],
        ];

        $competenceProfileDatas = [
            ['profileId' => '1', 'competenceId' => '1'],
            ['profileId' => '1', 'competenceId' => '2'],
            ['profileId' => '2', 'competenceId' => '3'],
            ['profileId' => '2', 'competenceId' => '4'],
            ['profileId' => '3', 'competenceId' => '5'],
            ['profileId' => '3', 'competenceId' => '1'],
            ['profileId' => '4', 'competenceId' => '6'],
            ['profileId' => '4', 'competenceId' => '2'],
            ['profileId' => '5', 'competenceId' => '7'],
            ['profileId' => '5', 'competenceId' => '3'],
            ['profileId' => '6', 'competenceId' => '8'],
            ['profileId' => '6', 'competenceId' => '4'],
            ['profileId' => '7', 'competenceId' => '9'],
            ['profileId' => '7', 'competenceId' => '1'],
            ['profileId' => '8', 'competenceId' => '10'],
            ['profileId' => '8', 'competenceId' => '5'],
            ['profileId' => '9', 'competenceId' => '11'],
            ['profileId' => '9', 'competenceId' => '6'],
            ['profileId' => '10', 'competenceId' => '12'],
            ['profileId' => '10', 'competenceId' => '7'],
            ['profileId' => '11', 'competenceId' => '13'],
            ['profileId' => '11', 'competenceId' => '8'],
            ['profileId' => '12', 'competenceId' => '14'],
            ['profileId' => '12', 'competenceId' => '9'],
            ['profileId' => '13', 'competenceId' => '10'],
            ['profileId' => '13', 'competenceId' => '1'],
            ['profileId' => '14', 'competenceId' => '11'],
            ['profileId' => '14', 'competenceId' => '2'],
        ];

        $experienceDatas = [
            ['Id' => '1', 'titre' => 'Vente en magasin', 'description' => 'vendeur en magasin', 'lieu' => 'Bordeaux (33)', 'profileId' => '1'],
            ['Id' => '2', 'titre' => 'Développeur web', 'description' => 'Création de sites internet', 'lieu' => 'Paris (75)', 'profileId' => '1'],
            ['Id' => '3', 'titre' => 'Assistant administratif', 'description' => 'Gestion des dossiers', 'lieu' => 'Lyon (69)', 'profileId' => '2'],
            ['Id' => '4', 'titre' => 'Chef de projet', 'description' => 'Coordination de projets', 'lieu' => 'Marseille (13)', 'profileId' => '3'],
            ['Id' => '5', 'titre' => 'Enseignant', 'description' => 'Cours de mathématiques', 'lieu' => 'Toulouse (31)', 'profileId' => '4'],
            ['Id' => '6', 'titre' => 'Consultant en marketing', 'description' => 'Stratégies marketing', 'lieu' => 'Nantes (44)', 'profileId' => '5'],
            ['Id' => '7', 'titre' => 'Technicien informatique', 'description' => 'Maintenance réseau', 'lieu' => 'Strasbourg (67)', 'profileId' => '6'],
            ['Id' => '8', 'titre' => 'Responsable RH', 'description' => 'Gestion du personnel', 'lieu' => 'Rennes (35)', 'profileId' => '7'],
            ['Id' => '9', 'titre' => 'Ingénieur logiciel', 'description' => 'Développement de logiciels', 'lieu' => 'Lille (59)', 'profileId' => '8'],
            ['Id' => '10', 'titre' => 'Graphiste', 'description' => 'Création de visuels', 'lieu' => 'Nice (06)', 'profileId' => '9'],
            ['Id' => '11', 'titre' => 'Électricien', 'description' => 'Installation électrique', 'lieu' => 'Montpellier (34)', 'profileId' => '10'],
            ['Id' => '12', 'titre' => 'Médecin généraliste', 'description' => 'Soins aux patients', 'lieu' => 'Brest (29)', 'profileId' => '11'],
            ['Id' => '13', 'titre' => 'Comptable', 'description' => 'Gestion des finances', 'lieu' => 'Orléans (45)', 'profileId' => '12'],
            ['Id' => '14', 'titre' => 'Architecte', 'description' => 'Conception de bâtiments', 'lieu' => 'Dijon (21)', 'profileId' => '13'],
            ['Id' => '15', 'titre' => 'Journaliste', 'description' => 'Rédaction d’articles', 'lieu' => 'Reims (51)', 'profileId' => '14'],
            ['Id' => '16', 'titre' => 'Livreur', 'description' => 'Livraisons à domicile', 'lieu' => 'Clermont-Ferrand (63)', 'profileId' => '1'],
        ];

        $formationDatas = [
            ['Id' => '1', 'diplome' => 'Bac général', 'etablissement' => 'Lycée VDG', 'lieu' => 'Marmande', 'description' => 'AMC et NSI', 'profileId' => '1'],
            ['Id' => '2', 'diplome' => 'BTS Informatique', 'etablissement' => 'IUT Bordeaux', 'lieu' => 'Bordeaux', 'description' => 'Développement web', 'profileId' => '1'],
            ['Id' => '3', 'diplome' => 'Licence en gestion', 'etablissement' => 'Université de Lyon', 'lieu' => 'Lyon', 'description' => 'Spécialité finances', 'profileId' => '2'],
            ['Id' => '4', 'diplome' => 'Master en management', 'etablissement' => 'HEC Paris', 'lieu' => 'Paris', 'description' => 'Management stratégique', 'profileId' => '3'],
            ['Id' => '5', 'diplome' => 'BEP Électricité', 'etablissement' => 'CFA Toulouse', 'lieu' => 'Toulouse', 'description' => 'Formation en électricité générale', 'profileId' => '4'],
            ['Id' => '6', 'diplome' => 'Licence Marketing', 'etablissement' => 'Université de Nantes', 'lieu' => 'Nantes', 'description' => 'Marketing digital', 'profileId' => '5'],
            ['Id' => '7', 'diplome' => 'DUT Réseaux et Télécoms', 'etablissement' => 'IUT Strasbourg', 'lieu' => 'Strasbourg', 'description' => 'Formation en réseaux informatiques', 'profileId' => '6'],
            ['Id' => '8', 'diplome' => 'Master RH', 'etablissement' => 'Université Rennes 2', 'lieu' => 'Rennes', 'description' => 'Gestion des ressources humaines', 'profileId' => '7'],
            ['Id' => '9', 'diplome' => 'Ingénieur informatique', 'etablissement' => 'Polytech Lille', 'lieu' => 'Lille', 'description' => 'Spécialité développement logiciel', 'profileId' => '8'],
            ['Id' => '10', 'diplome' => 'BTS Design Graphique', 'etablissement' => 'École des Arts', 'lieu' => 'Nice', 'description' => 'Conception visuelle', 'profileId' => '9'],
            ['Id' => '11', 'diplome' => 'CAP Électricien', 'etablissement' => 'CFA Montpellier', 'lieu' => 'Montpellier', 'description' => 'Techniques de base en électricité', 'profileId' => '10'],
            ['Id' => '12', 'diplome' => 'Doctorat Médecine', 'etablissement' => 'Université de Brest', 'lieu' => 'Brest', 'description' => 'Pratiques générales', 'profileId' => '11'],
            ['Id' => '13', 'diplome' => 'Master Comptabilité', 'etablissement' => 'Université d’Orléans', 'lieu' => 'Orléans', 'description' => 'Expertise comptable', 'profileId' => '12'],
            ['Id' => '14', 'diplome' => 'Diplôme d’architecture', 'etablissement' => 'École Nationale Supérieure d’Architecture', 'lieu' => 'Dijon', 'description' => 'Conception architecturale', 'profileId' => '13'],
            ['Id' => '15', 'diplome' => 'Licence Journalisme', 'etablissement' => 'Université Reims', 'lieu' => 'Reims', 'description' => 'Techniques de rédaction', 'profileId' => '14'],
        ];








        /**
         * ---------- Create Profiles
         */

        foreach ($profilesDatas as $profilesData) {
            $profile = new Profile();
            $profile->setTelephone($profilesData['telephone']);
            $profile->setProfilePicture($profilesData["profilePicture"]);

            $manager->persist($profile);
        }
        $manager->flush();

        /**
         * ---------- Create Users
         */

        foreach ($usersData as $userData) {
            $user = new User();

            $profile = $manager->getRepository(Profile::class)->find($userData['ProfileId']);
            $user->setEmail($userData['Email']);
            $user->setPassword($userData['Password']);
            $user->setRoles(['ROLE_USER']);
            $user->setLastName($userData['LastName']);
            $user->setFirstName($userData['FirstName']);
            $user->setBirthdayDate(new \DateTime($userData['BirthdayDate']));
            $user->setCreatedAt(new \DateTime());
            $user->setUpdatedAt(new \DateTime());
            $profile = $manager->getRepository(Profile::class)->find($userData['ProfileId']);
            $profile->setUser($user);

            $manager->persist($user);
        }
        $manager->flush();


        /**
         * ---------- Create Projects
         */

        foreach ($projectDatas as $projectData) {
            $project = new Project();

            $project->setTitle($projectData['Title']);
            $project->setDescription($projectData['Description']);
            $project->setScreenshot($projectData['Screenshot']);
            $project->setLink($projectData['link']);
            $user = $manager->getRepository(User::class)->find($projectData['UserId']);
            $project->setUser($user);
            $project->setCreatedAt(new \DateTime());

            $manager->persist($project);
        }
        $manager->flush();

        /**
         * ---------- Create Technologies
         */

        foreach ($technologiesDatas as $technologiesData) {
            $tech = new Technology();

            $tech->setName($technologiesData['Name']);
            $tech->setLogo($technologiesData['Logo']);
            $tech->setVersion($technologiesData['Version']);

            $manager->persist($tech);
        }
        $manager->flush();

        /**
         * ---------- Create Project-Technologies
         */

        foreach ($projectTechnologiesDatas as $projectTechnologiesData) {
            $tech = $manager->getRepository(Technology::class)->find($projectTechnologiesData['TechnologyId']);
            $project = $manager->getRepository(Project::class)->find($projectTechnologiesData['ProjectId']);
            $project->addTechnology($tech);

            $manager->persist($project);
        }
        $manager->flush();

        /**
         * ---------- Create CentresInteret
         */

        foreach ($centresInteretsDatas as $centresInteretsData) {
            $centre = new CentresInteret();
            $centre->setCentreInteret($centresInteretsData['centreInteret']);
            $manager->persist($centre);
        }
        $manager->flush();

        /**
         * ---------- Create Compétences
         */

        foreach ($competencesDatas as $competencesData) {
            $competence = new Competence();
            $competence->setCompetence($competencesData['competence']);
            $competence->setHardSkill($competencesData['hardSkill']);
            $manager->persist($competence);
        }
        $manager->flush();

        /**
         * ---------- Create CI-Profiles
         */

        foreach ($centresInteretsProfileDatas as $centresInteretsProfileData) {
            $profile = $manager->getRepository(Profile::class)->find($centresInteretsProfileData['profileId']);
            $ci = $manager->getRepository(CentresInteret::class)->find($centresInteretsProfileData['centreInteretsId']);
            $profile->addCentresInteret($ci);

            $manager->persist($profile);
        }
        $manager->flush();


        /**
         * ---------- Create Competence-Profiles
         */

        foreach ($competenceProfileDatas as $competenceProfileData) {
            $profile = $manager->getRepository(Profile::class)->find($competenceProfileData['profileId']);
            $competence = $manager->getRepository(Competence::class)->find($competenceProfileData['competenceId']);
            $profile->addCompetence($competence);

            $manager->persist($profile);
        }
        $manager->flush();


        /**
         * ---------- Create Experience
         */

        foreach ($experienceDatas as $experienceData) {
            $experience = new Experience();
            $experience->setTitre($experienceData['titre']);
            $experience->setDescription($experienceData['description']);
            $experience->setLieu($experienceData['lieu']);
            $experience->setDate(new \DateTime());
            $profile = $manager->getRepository(Profile::class)->find($experienceData['profileId']);
            $experience->setProfile($profile);
            $manager->persist($experience);
        }
        $manager->flush();


        /**
         * ---------- Create Formations
         */

        foreach ($formationDatas as $formationData) {
            $formation = new Formation();
            $formation->setDiplome($formationData['diplome']);
            $formation->setDescription($formationData['description']);
            $formation->setDate(new \DateTime());
            $formation->setLieu($formationData['lieu']);
            $formation->setEtablissement($formationData['etablissement']);
            $profile = $manager->getRepository(Profile::class)->find($formationData['profileId']);
            $formation->setProfile($profile);
            $manager->persist($formation);
        }
        $manager->flush();

    }
}
