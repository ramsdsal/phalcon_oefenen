Phalcon - 2017

Ik heb dit project gecreeerd om eerst contact met Phalcon framework te doen en te kunnen oefenen.

Workshop management

1 - Je kan een workshop creeren, updaten en deleten.
2 - Per workshop je kan studenten invoegen en deleten.

Deze zijn de belangrijke functionaliteiten.

WORKSHOP db

CREATE TABLE `workshop` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `students` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

STUDENT db

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `workshop_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
