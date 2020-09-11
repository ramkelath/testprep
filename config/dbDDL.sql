# DDL for table sessions
# ------------------------------------------------------------

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  `updated_on` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# DDL for table user
# ------------------------------------------------------------

CREATE TABLE `user` (
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
  `question_id` int NOT NULL AUTO_INCREMENT,
  `intro_text` text COLLATE utf8_unicode_ci NOT NULL,
  `question_text` text COLLATE utf8_unicode_ci NOT NULL,
  `parent_question_id` int NOT NULL,
  `group_code` text COLLATE utf8_unicode_ci NOT NULL,
  `area` text COLLATE utf8_unicode_ci NOT NULL,
  `type` text COLLATE utf8_unicode_ci NOT NULL,
  `correct_answer` text COLLATE utf8_unicode_ci NOT NULL,
  `wrong_answer_1` text COLLATE utf8_unicode_ci NOT NULL,
  `wrong_answer_2` text COLLATE utf8_unicode_ci NOT NULL,
  `wrong_answer_3` text COLLATE utf8_unicode_ci NOT NULL,
  `wrong_answer_4` text COLLATE utf8_unicode_ci,
  `wrong_answer_5` text COLLATE utf8_unicode_ci,
  `notes` text COLLATE utf8_unicode_ci,
  `source` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# DDL for table answer
# -------------------------------------------------------------

CREATE TABLE `answer` (
  `user_id` int DEFAULT NULL,
  `test_id` int DEFAULT NULL,
  `question_id` int DEFAULT NULL,
  `response` varchar(450) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `correct` tinyint DEFAULT NULL,
  `taken_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `user_test_question` (`user_id`,`test_id`,`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
