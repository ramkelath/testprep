# DDL for table sessions
# ------------------------------------------------------------

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  `updated_on` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# DDL for table users
# ------------------------------------------------------------

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nid` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(65) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(65) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `level` enum('user','admin') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `twostep` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


# DDL for table question
# ------------------------------------------------------------

CREATE TABLE `question` (
 `question_id` int(11) NOT NULL,
 `intro_text` text NOT NULL,
 `question_text` text NOT NULL,
 `parent_question_id` int(11) NOT NULL,
 `area` text NOT NULL,
 `correct_answer` text NOT NULL,
 `wrong_answer_1` text NOT NULL,
 `wrong_answer_2` text NOT NULL,
 `wrong_answer_3` text NOT NULL,
 `wrong_answer_4` text NOT NULL,
 `wrong_answer_5` text NOT NULL,
 `notes` int(11) NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# DDL for table correct_answer
# -------------------------------------------------------------
CREATE TABLE `testprep`.`answer` (
  `answer_id` INT NOT NULL,
  `user_id` INT NULL,
  `test_id` INT NULL,
  `question_id` INT NULL,
  `response` VARCHAR(450) NULL,
  `correct` TINYINT NULL,
  PRIMARY KEY (`answer_id`),
  UNIQUE KEY `test_question_id` (`test_id`,'question_id')
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;