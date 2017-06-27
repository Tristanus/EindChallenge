CREATE DATABASE IF NOT EXISTS `framework` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `framework`;

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_firstname` varchar(50) DEFAULT NULL,
  `student_lastname` varchar(50) DEFAULT NULL,
  `student_gender` enum('male','female') NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `students` (`student_id`, `student_firstname`, `student_lastname`, `student_gender`) VALUES
(1, 'Pietje', 'Puk', 'male');
