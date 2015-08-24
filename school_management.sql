-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2015 at 07:19 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `school_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `level` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`, `level`) VALUES
(1, 'Mr. Admin Saheb', 'admin@gmail.com', '123', '1'),
(2, 'admin2', 'admin2@gmail.com', '123', '1');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `attendance_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 undefined , 1 present , 2  absent',
  `student_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=414 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `status`, `student_id`, `date`) VALUES
(382, 1, 6, '2015-07-29'),
(383, 2, 10, '2015-07-29'),
(384, 1, 12, '2015-07-29'),
(385, 2, 13, '2015-07-29'),
(386, 1, 14, '2015-07-29'),
(387, 1, 6, '2015-08-02'),
(388, 2, 10, '2015-08-02'),
(389, 1, 12, '2015-08-02'),
(390, 1, 13, '2015-08-02'),
(391, 1, 14, '2015-08-02'),
(392, 0, 10, '1970-01-01'),
(393, 0, 12, '1970-01-01'),
(394, 0, 13, '1970-01-01'),
(395, 0, 14, '1970-01-01'),
(396, 0, 15, '1970-01-01'),
(397, 0, 10, '2015-08-08'),
(398, 0, 12, '2015-08-08'),
(399, 0, 13, '2015-08-08'),
(400, 0, 14, '2015-08-08'),
(401, 0, 15, '2015-08-08'),
(402, 0, 10, '2015-08-17'),
(403, 0, 12, '2015-08-17'),
(404, 0, 13, '2015-08-17'),
(405, 0, 14, '2015-08-17'),
(406, 0, 15, '2015-08-17'),
(407, 0, 7, '2015-08-20'),
(408, 0, 8, '2015-08-20'),
(409, 1, 10, '2015-08-20'),
(410, 2, 12, '2015-08-20'),
(411, 1, 13, '2015-08-20'),
(412, 2, 14, '2015-08-20'),
(413, 2, 15, '2015-08-20');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `book_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `author` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL,
  `price` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `class_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `name_numeric` longtext COLLATE utf8_unicode_ci NOT NULL,
  `teacher_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `name`, `name_numeric`, `teacher_id`) VALUES
(1, 'Ten', '10', 1),
(2, 'Nine', '9', 2),
(3, 'Eight', '8', 2),
(4, 'Seven', '7', 0),
(5, 'Six', '6', 0);

-- --------------------------------------------------------

--
-- Table structure for table `class_routine`
--

CREATE TABLE IF NOT EXISTS `class_routine` (
  `class_routine_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `dep_id` int(11) NOT NULL DEFAULT '0',
  `sec_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `time_start` int(11) NOT NULL,
  `time_start_min` int(11) NOT NULL DEFAULT '0',
  `start_format` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `time_end` int(11) NOT NULL,
  `time_end_min` int(11) NOT NULL DEFAULT '0',
  `end_format` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `day` longtext COLLATE utf8_unicode_ci NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `class_routine`
--

INSERT INTO `class_routine` (`class_routine_id`, `class_id`, `dep_id`, `sec_id`, `subject_id`, `time_start`, `time_start_min`, `start_format`, `time_end`, `time_end_min`, `end_format`, `day`, `teacher_id`) VALUES
(1, 2, 1, 4, 2, 18, 0, '', 19, 0, '', 'sunday', 0),
(6, 2, 1, 4, 2, 9, 0, 'am', 10, 0, 'am', 'friday', 0),
(7, 2, 1, 4, 1, 11, 0, 'am', 12, 0, 'am', 'friday', 0),
(8, 2, 1, 4, 1, 9, 0, 'am', 10, 0, 'am', 'thursday', 5),
(9, 2, 1, 4, 1, 9, 0, 'am', 10, 0, 'am', 'thursday', 2),
(10, 2, 1, 4, 2, 9, 0, 'pm', 10, 30, 'pm', 'thursday', 0),
(12, 1, 0, 0, 1, 0, 0, 'am', 0, 0, 'am', 'sunday', 1),
(13, 2, 0, 0, 1, 0, 0, 'am', 0, 0, 'am', 'sunday', 1),
(14, 2, 1, 4, 1, 6, 0, 'pm', 7, 0, 'pm', 'tuesday', 3),
(15, 2, 1, 4, 1, 14, 0, 'pm', 15, 0, 'pm', 'friday', 2),
(18, 1, 1, 5, 2, 16, 0, '', 17, 0, '', 'monday', 1),
(19, 1, 1, 5, 2, 11, 0, '', 13, 0, '', 'wednesday', 6);

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `doc_type` varchar(30) NOT NULL,
  `file_name` longtext NOT NULL,
  `file_location` longtext NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`id`, `role`, `user_id`, `doc_type`, `file_name`, `file_location`, `date`) VALUES
(1, 1, 0, 'Domicile', '', 'uploads/doc//2015-07-27-13-02-50.docx', '2015-07-27'),
(2, 1, 10, 'Transfer Certificate', '', 'uploads/doc//2015-07-27-13-06-26.doc', '2015-07-27'),
(5, 1, 12, 'Transfer Certificate', '2015-07-27-13-49-35.docx', 'uploads/doc/student/2015-07-27-13-49-35.docx', '2015-07-27'),
(6, 1, 12, 'Transfer Certificate', '2015-07-28-10-53-16.jpg', 'uploads/doc/student/2015-07-28-10-53-16.jpg', '2015-07-28'),
(7, 1, 12, 'Domicile', '2015-07-28-10-56-21.docx', 'uploads/doc/student/2015-07-28-10-56-21.docx', '2015-07-28'),
(9, 1, 12, 'Application', '2015-07-28-11-13-35.docx', 'uploads/doc/student/2015-07-28-11-13-35.docx', '2015-07-28'),
(13, 4, 1, 'Application', '2015-07-29-08-53-28.docx', 'uploads/doc/staff/2015-07-29-08-53-28.docx', '2015-07-29'),
(14, 2, 1, 'Character Certificate', '2015-07-29-08-55-22.docx', 'uploads/doc/teacher/2015-07-29-08-55-22.docx', '2015-07-29'),
(15, 2, 1, 'Domicile', '2015-07-29-08-57-26.docx', 'uploads/doc/teacher/2015-07-29-08-57-26.docx', '2015-07-29'),
(16, 2, 1, 'Application', '2015-07-29-08-58-25.docx', 'uploads/doc/teacher/2015-07-29-08-58-25.docx', '2015-07-29'),
(17, 4, 1, 'Transfer Certificate', '2015-08-05-12-49-48.txt', 'uploads/doc/staff/2015-08-05-12-49-48.txt', '2015-08-05');

-- --------------------------------------------------------

--
-- Table structure for table `dormitory`
--

CREATE TABLE IF NOT EXISTS `dormitory` (
  `dormitory_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `number_of_room` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE IF NOT EXISTS `exam` (
  `exam_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date` longtext COLLATE utf8_unicode_ci NOT NULL,
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`exam_id`, `name`, `date`, `comment`) VALUES
(1, '1st Term 2015', '07/02/2015', 'Upcoming');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE IF NOT EXISTS `grade` (
  `grade_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `grade_point` longtext COLLATE utf8_unicode_ci NOT NULL,
  `mark_from` int(11) NOT NULL,
  `mark_upto` int(11) NOT NULL,
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`grade_id`, `name`, `grade_point`, `mark_from`, `mark_upto`, `comment`) VALUES
(1, 'A+', '5.00', 80, 100, ''),
(2, 'A', '4.00', 70, 80, '');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `invoice_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `amount_paid` longtext COLLATE utf8_unicode_ci NOT NULL,
  `due` longtext COLLATE utf8_unicode_ci NOT NULL,
  `creation_timestamp` int(11) NOT NULL,
  `payment_timestamp` longtext COLLATE utf8_unicode_ci NOT NULL,
  `payment_method` longtext COLLATE utf8_unicode_ci NOT NULL,
  `payment_details` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'paid or unpaid'
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `student_id`, `title`, `description`, `amount`, `amount_paid`, `due`, `creation_timestamp`, `payment_timestamp`, `payment_method`, `payment_details`, `status`) VALUES
(1, 1, 'fee', 'etert', 150, '150', '0', 1433282400, '', '', '', 'paid'),
(2, 6, 'Taka', '', 120, '', '120', 1433196000, '', '', '', 'unpaid'),
(3, 12, 'exam_fee', '', 200, '100', '100', 1439157600, '', '', '', 'partial'),
(4, 12, 'exam_fee', '', 200, '100', '100', 1439157600, '', '1', '', 'partial'),
(5, 12, 'exam_fee', '', 200, '100', '100', 1439157600, '', '1', '', 'partial'),
(6, 12, 'monthly_fee', 'sdfg', 300, '200', '100', 1439244000, '', 'cash', '', 'partial'),
(7, 12, 'monthly_fee', 'sdfg', 300, '200', '100', 1439244000, '', 'cash', '', 'partial');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `phrase_id` int(11) NOT NULL,
  `phrase` longtext COLLATE utf8_unicode_ci NOT NULL,
  `english` longtext COLLATE utf8_unicode_ci NOT NULL,
  `Bangla` longtext COLLATE utf8_unicode_ci NOT NULL,
  `Arabic` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=308 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`phrase_id`, `phrase`, `english`, `Bangla`, `Arabic`) VALUES
(1, 'login', 'login', 'লগিন করুণ', ''),
(2, 'account_type', 'account type', 'এ্যাকাউন্টের ধরন', ''),
(3, 'admin', 'Admin', 'এ্যাডমিন', ''),
(4, 'teacher', 'Teacher', 'শিক্ষক', ''),
(5, 'student', 'Student', 'ছাত্র/ছাত্রী', ''),
(6, 'parent', 'Parent', 'অভিভাবক', ''),
(7, 'email', 'email', 'ইমেইল', ''),
(8, 'password', 'password', 'পাসওয়ার্ড', ''),
(9, 'forgot_password ?', 'forgot password ?', 'পাসওয়ার্ড ভুলে গেছেন?', ''),
(10, 'reset_password', 'reset password', 'পাসওয়ার্ড রিসেট করুণ', ''),
(11, 'reset', 'reset', '', ''),
(12, 'admin_dashboard', 'Admin Dashboard', 'এ্যাডমিন ড্যাশবোর্ড', ''),
(13, 'account', 'Account', 'এ্যাকাউন্ট', ''),
(14, 'profile', 'profile', 'প্রোফাইল', ''),
(15, 'change_password', 'change password', 'পাসওয়ার্ড পরিবর্তন করুন', ''),
(16, 'logout', 'Logout', 'লগআউট করুণ', ''),
(17, 'panel', 'panel', 'প্যানেল', ''),
(18, 'dashboard_help', 'dashboard help', 'ড্যাশবোর্ড সাহায্য', ''),
(19, 'dashboard', 'Dashboard', 'ড্যাশবোর্ড', ''),
(20, 'student_help', 'student help', 'ছাত্র/ছাত্রীর জন্য প্রয়োজনীয় সাহায্য', ''),
(21, 'teacher_help', 'teacher help', 'শিক্ষকের জন্য প্রয়োজনীয় সাহায্য', ''),
(22, 'subject_help', 'subject help', 'পাঠ্যবিষয় এর জন্য প্রয়োজনীয় সাহায্য', ''),
(23, 'subject', 'Subject', 'পাঠ্যবিষয়', ''),
(24, 'class_help', 'class help', 'ক্লাস সাহায্য', ''),
(25, 'class', 'Class', 'ক্লাস', ''),
(26, 'exam_help', 'exam help', 'পরিক্ষার জন্য প্রয়োজনীয় সাহায্য', ''),
(27, 'exam', 'Exam', 'পরীক্ষা', ''),
(28, 'marks_help', 'marks help', 'নম্বরের জন্য প্রয়োজনীয় তথ্য', ''),
(29, 'marks-attendance', 'marks-attendance', '', ''),
(30, 'grade_help', 'grade help', 'গ্রেড এর জন্য প্রয়োজনীয় সাহায্য', ''),
(31, 'exam-grade', 'exam-grade', 'পরীক্ষার-গ্রেড', ''),
(32, 'class_routine_help', 'class routine help', 'ক্লাস রুটিন সাহায্য', ''),
(33, 'class_routine', 'Class Routine', 'ক্লাস রুটিন', ''),
(34, 'invoice_help', 'invoice help', 'রশিদের জন্য প্রয়োজনীয় সাহায্য', ''),
(35, 'payment', 'Payment', 'পেমেন্ট', ''),
(36, 'book_help', 'book help', 'বই এর জন্য প্রয়োজনীয় সাহায্য', ''),
(37, 'library', 'Library', 'লাইব্রেরি', ''),
(38, 'transport_help', 'transport help', 'যাতায়াত এর জন্য প্রয়োজনীয় সাহায্য', ''),
(39, 'transport', 'transport', 'যাতায়াত', ''),
(40, 'dormitory_help', 'dormitory help', 'ছাত্রাবাস এর জন্য প্রয়োজনীয় সাহায্য', ''),
(41, 'dormitory', 'dormitory', 'ছাত্রাবাস', ''),
(42, 'noticeboard_help', 'noticeboard help', 'নোটিশবোর্ড এর জন্য প্রয়োজনীয় সাহায্য', ''),
(43, 'noticeboard-event', 'noticeboard-event', '', ''),
(44, 'bed_ward_help', 'bed ward help', '', ''),
(45, 'settings', 'Settings', 'সেটিংস', ''),
(46, 'system_settings', 'system settings', 'সিস্টেম সেটিংস', ''),
(47, 'manage_language', 'manage language', 'ভাষা পরিবর্তন করুণ', ''),
(48, 'backup_restore', 'backup restore', 'পুনরুদ্ধার', ''),
(49, 'profile_help', 'profile help', 'প্রোফাইলের জন্য প্রয়োজনীয় সাহায্য', ''),
(50, 'manage_student', 'manage student', 'ছাত্রের তথ্য পরিবর্তন করুণ', ''),
(51, 'manage_teacher', 'Manage Teacher', 'শিক্ষকের তথ্য পরিবর্তন করুণ', ''),
(52, 'noticeboard', 'Noticeboard', 'নোটিশবোর্ড', ''),
(53, 'language', 'language', 'ভাষা', ''),
(54, 'backup', 'backup', 'সংরক্ষণ করুন', ''),
(55, 'calendar_schedule', 'calendar schedule', 'ক্যালেন্ডার সময়সূচী', ''),
(56, 'select_a_class', 'Select a class', 'ক্লাস নির্বাচন করুণ', ''),
(58, 'add_student', 'add student', 'স্টুডেন্ট যোগ করুন', ''),
(59, 'roll', 'roll', 'রোল', ''),
(60, 'photo', 'photo', 'ছবি', ''),
(61, 'student_name', 'student name', 'ছাত্র/ছাত্রীর নাম', ''),
(62, 'address', 'address', 'ঠিকানা', ''),
(63, 'options', 'options', 'অপশন', ''),
(64, 'marksheet', 'marksheet', 'মার্ক শিট', ''),
(65, 'id_card', 'id card', 'আইডি কার্ড', ''),
(66, 'edit', 'Edit', 'পরিবর্তন করুন', ''),
(67, 'delete', 'Delete', 'মুছে ফেলুন', ''),
(68, 'personal_profile', 'personal profile', 'নিজস্ব প্রোফাইল', ''),
(69, 'academic_result', 'academic result', 'এ্যাকাডেমিক রেজাল্ট', ''),
(71, 'birthday', 'birthday', 'জন্মদিন', ''),
(72, 'sex', 'sex', 'লিঙ্গ', ''),
(73, 'male', 'male', 'পুরুষ', ''),
(74, 'female', 'female', 'মহিলা', ''),
(75, 'religion', 'religion', 'ধর্ম', ''),
(76, 'blood_group', 'blood group', 'রক্তের গ্রুপ', ''),
(77, 'phone', 'phone', 'ফোন', ''),
(78, 'father_name', 'father name', 'পিতার নাম', ''),
(79, 'mother_name', 'mother name', 'মাতার নাম', ''),
(80, 'edit_student', 'edit student', 'ছাত্রের/ছাত্রীর তথ্য পরিবর্তন করুন', ''),
(81, 'teacher_list', 'teacher list', 'শিক্ষকের লিস্ট', ''),
(82, 'add_teacher', 'add teacher', 'শিক্ষক যোগ করুন', ''),
(83, 'teacher_name', 'teacher name', 'শিক্ষকের নাম', ''),
(84, 'edit_teacher', 'edit teacher', 'শিক্ষকের তথ্য পরিবর্তন করুন', ''),
(85, 'manage_parent', 'manage parent', 'অভিভাবক এর তথ্য পরিবর্তন করুণ', ''),
(86, 'parent_list', 'parent list', 'অভিভাবকের লিস্ট', ''),
(87, 'parent_name', 'parent name', 'অভিভাবকের নাম', ''),
(88, 'relation_with_student', 'relation with student', 'ছাত্রের সাথে সম্পর্ক', ''),
(89, 'parent_email', 'parent email', 'অভিভাবকের ইমেইল', ''),
(90, 'parent_phone', 'parent phone', 'অভিভাবকের ফোন নাম্বার', ''),
(91, 'parrent_address', 'parrent address', 'অভিভাবকের ঠিকানা', ''),
(92, 'parrent_occupation', 'parrent occupation', 'অভিভাবকের বৃত্তি', ''),
(93, 'add', 'add', 'যোগ করুন', ''),
(94, 'parent_of', 'parent of', 'যে ছাত্রের অভিভাবক', ''),
(95, 'profession', 'profession', 'পেশা', ''),
(96, 'edit_parent', 'edit parent', 'অভিভাবকের তথ্য পরিবর্তন করুন', ''),
(97, 'add_parent', 'add parent', 'অভিভাবক যোগ করুন', ''),
(98, 'manage_subject', 'manage subject', 'পাঠ্যবিষয়ের তথ্য পরিবর্তন করুণ', ''),
(99, 'subject_list', 'Subject List', 'পাঠ্যবিষয় এর লিস্ট', ''),
(100, 'add_subject', 'add subject', 'পাঠ্যবিষয় যোগ করুন', ''),
(101, 'subject_name', 'subject name', 'পাঠ্যবিষয় এর নাম', ''),
(102, 'edit_subject', 'edit subject', 'পাঠ্যবিষয় এর তথ্য পরিবর্তন করুন', ''),
(103, 'manage_class', 'manage class', 'ক্লাস পরিবর্তন করুণ', ''),
(104, 'class_list', 'class list', 'ক্লাস লিস্ট', ''),
(105, 'add_class', 'add class', 'ক্লাস যোগ করুন', ''),
(269, 'class_name', '', 'ক্লাসের নাম', ''),
(107, 'numeric_name', 'numeric name', 'সংখ্যায় নাম', ''),
(108, 'name_numeric', 'name numeric', 'সংখ্যায় নাম', ''),
(109, 'edit_class', 'edit class', 'ক্লাস এর তথ্য পরিবর্তন করুন', ''),
(110, 'manage_exam', 'manage exam', 'পরীক্ষা পরিবর্তন করুণ', ''),
(111, 'exam_list', 'Exam List', 'পরীক্ষার লিস্ট', ''),
(112, 'add_exam', 'add exam', 'পরীক্ষা যোগ করুন', ''),
(113, 'exam_name', 'exam name', 'পরীক্ষার নাম', ''),
(114, 'date', 'date', 'তারিখ', ''),
(115, 'comment', 'comment', ' মন্তব্য', ''),
(116, 'edit_exam', 'edit exam', 'পরীক্ষার তথ্য পরিবর্তন করুন', ''),
(117, 'manage_exam_marks', 'manage exam marks', 'পরীক্ষার মার্ক্স পরিবর্তন করুণ', ''),
(118, 'manage_marks', 'manage marks', 'মার্ক্স পরিবর্তন করুণ', ''),
(119, 'select_exam', 'Select exam', 'পরিক্ষা নির্বাচন করুণ', ''),
(120, 'select_class', 'Select class', 'ক্লাস নির্বাচন করুণ', ''),
(121, 'select_subject', 'Select subject', 'পাঠ্যবিষয় নির্বাচন করুণ', ''),
(122, 'select_an_exam', 'Select an exam', 'পরীক্ষা নির্বাচন করুণ', ''),
(123, 'mark_obtained', 'mark obtained', 'নম্বর পেয়েছে', ''),
(124, 'attendance', 'attendance', 'উপস্থিতি', ''),
(125, 'manage_grade', 'Manage Grade', 'গ্রেড পরিবর্তন করুণ', ''),
(126, 'grade_list', 'grade list', 'গ্রেড লিস্ট', ''),
(127, 'add_grade', 'add grade', 'গ্রেড যোগ করুন', ''),
(128, 'grade_name', 'grade name', 'গ্রেড এর নাম', ''),
(129, 'grade_point', 'grade point', 'গ্রেড পয়েন্ট', ''),
(130, 'mark_from', 'mark from', 'নম্বর ফর্ম', ''),
(131, 'mark_upto', 'mark upto', '', ''),
(132, 'edit_grade', 'edit grade', 'গ্রেড এর তথ্য পরিবর্তন করুন', ''),
(133, 'manage_class_routine', 'Manage Class Routine', 'ক্লাস রুটিন পরিবর্তন করুণ', ''),
(134, 'class_routine_list', 'class routine list', 'ক্লাস রুটিন লিস্ট', ''),
(135, 'add_class_routine', 'Add Class Rout', 'ক্লাস রুটিন যোগ করুন', ''),
(136, 'day', 'day', 'দিন', ''),
(137, 'starting_time', 'starting time', 'শুরুর সময়', ''),
(138, 'ending_time', 'ending time', 'শেষের সময় ', ''),
(139, 'edit_class_routine', 'edit class routine', 'ক্লাস রুটিন এর তথ্য পরিবর্তন করুন', ''),
(140, 'manage_invoice/payment', 'manage invoice/payment', 'রশিদ/পেমেন্ট পরিবর্তন করুণ', ''),
(141, 'invoice/payment_list', 'invoice/payment list', 'রশিদ/পেমেন্ট লিস্ট', ''),
(142, 'add_invoice/payment', 'add invoice/payment', ' যোগ/পেমেন্ট করুন', ''),
(143, 'title', 'title', 'টাইটেল', ''),
(144, 'description', 'description', 'বর্ণনা', ''),
(145, 'amount', 'amount', 'পরিমান', ''),
(146, 'status', 'status', 'স্ট্যাটাস', ''),
(147, 'view_invoice', 'view invoice', 'রশিদ দেখুন', ''),
(148, 'paid', 'paid', 'পরিশোধ করা হয়েছে', ''),
(149, 'unpaid', 'unpaid', 'পরিশোধ করা হয়নি', ''),
(150, 'add_invoice', 'add invoice', 'রশিদ যোগ করুন', ''),
(151, 'payment_to', 'payment to', '', ''),
(152, 'bill_to', 'bill to', '', ''),
(153, 'invoice_title', 'invoice title', 'রশিদের টাইটেল', ''),
(154, 'invoice_id', 'invoice id', 'রশিদের আইডি', ''),
(155, 'edit_invoice', 'edit invoice', 'রশিদ এর তথ্য পরিবর্তন করুন', ''),
(156, 'manage_library_books', 'manage library books', 'লাইব্রেরির বই পরিবর্তন করুণ', ''),
(157, 'book_list', 'book list', 'সমগ্র বই', ''),
(158, 'add_book', 'add book', 'বই যোগ করুন', ''),
(159, 'book_name', 'book name', 'বই এর নাম', ''),
(160, 'author', 'author', 'লেখক', ''),
(161, 'price', 'price', 'দাম', ''),
(162, 'available', 'available', 'উপস্থিত', ''),
(163, 'unavailable', 'unavailable', 'নেই', ''),
(164, 'edit_book', 'edit book', 'বই এর তথ্য পরিবর্তন করুন', ''),
(165, 'manage_transport', 'manage transport', 'যাতায়াতের তথ্য পরিবর্তন করুণ', ''),
(166, 'transport_list', 'transport list', 'যাতায়াত এর লিস্ট', ''),
(167, 'add_transport', 'add transport', 'যাতায়াত যোগ করুন', ''),
(168, 'route_name', 'route name', '', ''),
(169, 'number_of_vehicle', 'number of vehicle', 'সর্বমোট পরিবহণ', ''),
(170, 'route_fare', 'route fare', 'যাতায়াত ভাড়া', ''),
(171, 'edit_transport', 'edit transport', 'যাতায়াতের তথ্য পরিবর্তন করুন', ''),
(172, 'manage_dormitory', 'manage dormitory', 'ছাত্রাবাস পরিবর্তন করুণ', ''),
(173, 'dormitory_list', 'dormitory list', 'ছাত্রাবাস লিস্ট', ''),
(174, 'add_dormitory', 'add dormitory', 'ছাত্রাবাস যোগ করুন', ''),
(175, 'dormitory_name', 'dormitory name', 'ছাত্রাবাসের নাম', ''),
(176, 'number_of_room', 'number of room', '', ''),
(177, 'manage_noticeboard', 'manage noticeboard', 'নোটিশবোর্ড পরিবর্তন করুণ', ''),
(178, 'noticeboard_list', 'noticeboard list', 'নোটিশবোর্ড এর লিস্ট', ''),
(179, 'add_noticeboard', 'add noticeboard', 'নোটিশবোর্ড যোগ করুন', ''),
(180, 'notice', 'notice', 'নোটিশ', ''),
(181, 'add_notice', 'add notice', 'নোটিশ যোগ করুন', ''),
(182, 'edit_noticeboard', 'edit noticeboard', 'নোটিশবোর্ড এর তথ্য পরিবর্তন করুন', ''),
(183, 'system_name', 'system name', 'সিস্টেম নাম', ''),
(184, 'save', 'save', 'সেভ করুণ', ''),
(185, 'system_title', 'system title', 'সিস্টেম টাইটেল', ''),
(186, 'paypal_email', 'paypal email', 'পেপাল এর ইমেইল', ''),
(187, 'currency', 'currency', 'মুদ্রা', ''),
(188, 'phrase_list', 'phrase list', 'শব্দগুচ্ছের লিস্ট', ''),
(189, 'add_phrase', 'add phrase', 'শব্দ গুচ্ছ যোগ করুন', ''),
(190, 'add_language', 'add language', 'ভাষা যোগ করুন', ''),
(191, 'phrase', 'phrase', 'শব্দগুচ্ছ', ''),
(192, 'manage_backup_restore', 'manage backup restore', 'ব্যাক-আপ পরিবর্তন করুণ', ''),
(193, 'restore', 'restore', 'পুনুরুদ্ধার', ''),
(194, 'mark', 'mark', 'নম্বর', ''),
(195, 'grade', 'grade', 'গ্রেড', ''),
(196, 'invoice', 'invoice', 'রশিদ', ''),
(197, 'book', 'book', 'বই', ''),
(198, 'all', 'all', 'সব', ''),
(199, 'upload_&_restore_from_backup', 'upload & restore from backup', '', ''),
(200, 'manage_profile', 'manage profile', 'প্রোফাইলের তথ্য পরিবর্তন করুণ', ''),
(201, 'update_profile', 'update profile', 'প্রোফাইল আপডেট করুণ', ''),
(202, 'new_password', 'new password', 'নতুন পাসওয়ার্ড', ''),
(203, 'confirm_new_password', 'confirm new password', 'নতুন পাসওয়ার্ড নিশিত করুন', ''),
(204, 'update_password', 'update password', 'পাসওয়ার্ড আপডেট করুণ', ''),
(205, 'teacher_dashboard', 'teacher dashboard', 'শিক্ষকের ড্যাশবোর্ড', ''),
(206, 'backup_restore_help', 'backup restore help', 'পুনরুদ্ধার সাহায্য', ''),
(207, 'student_dashboard', 'student dashboard', 'ছাত্র/ছাত্রীর ড্যাশবোর্ড', ''),
(208, 'parent_dashboard', 'parent dashboard', 'অভিভাবকের ড্যাশবোর্ড', ''),
(209, 'view_marks', 'view marks', 'মার্ক্স দেখুন', ''),
(210, 'delete_language', 'delete language', 'ভাষা মুছে ফেলুন', ''),
(211, 'settings_updated', 'settings updated', 'সেটিংস আপডেট করা হয়েছে', ''),
(212, 'update_phrase', 'update phrase', 'শব্দগুচ্ছ হালনাগাদ করুন', ''),
(213, 'login_failed', 'login failed', 'লগিন হয়নি', ''),
(214, 'live_chat', 'live chat', '', ''),
(215, 'client 1', 'client 1', '', ''),
(216, 'buyer', 'buyer', 'ক্রেতা', ''),
(217, 'purchase_code', 'purchase code', 'ক্রয়কৃত লাইসেন্স নম্বর', ''),
(218, 'system_email', 'system email', 'সিস্টেম ইমেইল', ''),
(219, 'option', 'option', 'অপশন', ''),
(220, 'edit_phrase', 'edit phrase', 'শব্দ গুচ্ছ তথ্য পরিবর্তন করুন', ''),
(221, 'marks', '', 'নম্বর', ''),
(222, 'message', '', 'মেসেজ', ''),
(223, 'manage_message', '', 'মেসেজ হালনাগাদ করুণ', ''),
(226, 'notice_updated', '', 'নোটিশ আপডেট করা হয়েছে', ''),
(227, 'payment_cancelled', '', 'পেমেন্ট বাতিল করা হয়েছে', ''),
(230, 'payment_successfull', '', 'পেমেন্ট হয়েছে', ''),
(231, 'admit_student', '', 'স্টুডেন্ট ভর্তি', ''),
(232, 'student_information', '', 'ছাত্র/ছাত্রীর তথ্য', ''),
(233, 'student_marksheet', '', 'ছাত্র/ছাত্রীর মার্কশিট', ''),
(234, 'daily_attendance', '', 'প্রতিদিনের উপস্থিতি', ''),
(235, 'exam_grades', '', 'পরীক্ষার গ্রেড', ''),
(236, 'general_settings', '', 'সাধারণ সেটিংস', ''),
(237, 'language_settings', '', 'ভাষা সেটিংস', ''),
(238, 'edit_profile', '', 'প্রোফাইলের তথ্য পরিবর্তন করুন', ''),
(239, 'event_schedule', '', 'এভেন্টের সময়সূচি', ''),
(240, 'cancel', '', 'বাতিল', ''),
(241, 'addmission_form', '', 'ভর্তি ফর্ম', ''),
(242, 'value_required', '', 'তথ্য পূরণ করতে হবে', ''),
(243, 'select', 'Select', '', ''),
(244, 'gender', 'Gender', 'লিঙ্গ', ''),
(245, 'add_new_student', '', 'নতুন স্টুডেন্ট যোগ করুন', ''),
(246, 'language_list', '', 'ভাষার লিস্ট', ''),
(247, 'text_align', '', '', ''),
(248, 'section', 'Section', 'সেকশন', ''),
(249, 'add_section', 'Add Section', 'সেকশন যোগ করুন', ''),
(250, 'section_list', 'Section List', 'সেকশন লিস্ট', ''),
(251, 'section_name', 'Section Name', 'সেকশন এর নাম', ''),
(252, 'edit_section', 'Edit Section', 'সেকশনের তথ্য পরিবর্তন করুন', ''),
(253, 'student_list', 'Student List', 'ছাত্র/ছাত্রীর লিস্ট', ''),
(254, 'group', 'Group', 'গ্রুপ', ''),
(255, 'science', 'Science', '', ''),
(256, 'arts', 'Arts', '', ''),
(257, 'commerce', 'Commerce', '', ''),
(258, 'no_group', 'No Group', '', ''),
(259, 'parents_list', 'Parents List', 'অভিভাবক লিস্ট', ''),
(261, 'section_information', '', 'সেকশন এর তথ্য', ''),
(262, 'admission', '', 'ভর্তি', ''),
(263, 'Staff', '', 'স্টাফ', ''),
(264, 'Routine List', '', 'রুটিন লিস্ট', ''),
(265, 'add_payment', '', 'পেমেন্ট যোগ করুন', ''),
(266, 'payment_list', '', 'পেমেন্ট লিস্ট', ''),
(267, 'what', '', 'কি?', ''),
(268, 'name', '', 'নাম', ''),
(270, 'manage_daily_attendance', '', 'প্রতিদিনের উপস্থিতি পরিবর্তন করুণ', ''),
(271, 'manage_attendance', '', 'উপস্থিতি পরিবর্তন করুন', ''),
(272, 'invoice_informations', '', 'রশিদের জন্য প্রয়োজনীয় তথ্য', ''),
(273, 'get_invoice_list_list', '', '', ''),
(274, 'select_date', 'Select date', 'তারিখ নির্বাচন করুণ', ''),
(275, 'select_month', '', 'মাস নির্বাচন করুণ', ''),
(276, 'select_year', '', 'সাল নির্বাচন করুণ', ''),
(277, 'no_optional', '', '', ''),
(278, 'total', '', 'সর্বমোট', ''),
(279, 'Taka', '', 'টাকা', ''),
(280, 'take_payment', '', 'টাকা দেয়া হয়েছে', ''),
(281, 'fee', '', 'ফি', ''),
(282, 'exam_fee', '', 'পরীক্ষা ফি', ''),
(283, 'monthly_fee', '', 'মাসিক বেতন', ''),
(284, 'total_number_of_students', '', 'সর্বমোট ছাত্র/ছাত্রী', ''),
(285, 'teachers', 'Teachers', 'শিক্ষক-শিক্ষিকা', ''),
(286, 'total_number_of_teachers', '', 'সর্বমোট শিক্ষক-শিক্ষিকা', ''),
(287, 'parents', '', 'অভিভাবক', ''),
(288, 'total_number_of_parents', '', 'সর্বমোট অভিভাবক', ''),
(289, 'total_present_student_today', '', 'আজকের উপস্থিত ছাত্র/ছাত্রী', ''),
(290, 'Read More', '', 'আরও পড়ুন', ''),
(292, 'select_group', '', '', ''),
(293, 'select_section', '', '', ''),
(296, 'add_new_teacher', '', '', ''),
(297, 'document', '', '', ''),
(294, 'view_notice', '', '', ''),
(295, 'are_you_sure', 'Are You Sure', 'আপনি কি নিশ্চিত', ''),
(298, 'private_messaging', '', '', ''),
(299, 'messages', '', '', ''),
(300, 'new_message', '', '', ''),
(301, 'add_new_staff', '', '', ''),
(302, 'joindate', '', '', ''),
(303, 'position', '', '', ''),
(304, 'salary', '', '', ''),
(305, 'staff_add', '', '', ''),
(306, 'class_teacher', 'Class Teacher', 'শ্রেণী-শিক্ষক', ''),
(307, 'optional_subject', 'Optional Subject', 'চতুর্থ বিষয়', '');

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

CREATE TABLE IF NOT EXISTS `mark` (
  `mark_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `mark_obtained` int(11) NOT NULL DEFAULT '0',
  `mark_total` int(11) NOT NULL DEFAULT '100',
  `attendance` int(11) NOT NULL DEFAULT '0',
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mark`
--

INSERT INTO `mark` (`mark_id`, `student_id`, `subject_id`, `class_id`, `exam_id`, `mark_obtained`, `mark_total`, `attendance`, `comment`) VALUES
(1, 4, 2, 2, 1, 0, 100, 0, ''),
(2, 5, 2, 2, 1, 0, 100, 0, ''),
(3, 6, 2, 2, 1, 94, 100, 0, ''),
(4, 7, 2, 2, 1, 0, 100, 0, ''),
(5, 8, 2, 2, 1, 0, 100, 0, ''),
(6, 9, 2, 2, 1, 0, 100, 0, ''),
(7, 10, 2, 2, 1, 80, 100, 0, ''),
(8, 12, 2, 2, 1, 74, 100, 10, ''),
(9, 13, 2, 2, 1, 86, 100, 15, ''),
(10, 6, 3, 2, 1, 70, 100, 0, ''),
(11, 10, 3, 2, 1, 80, 100, 0, ''),
(12, 12, 3, 2, 1, 90, 100, 0, ''),
(13, 13, 3, 2, 1, 100, 100, 0, ''),
(14, 14, 3, 2, 1, 0, 100, 0, ''),
(15, 1, 1, 1, 1, 0, 100, 0, ''),
(16, 2, 1, 1, 1, 0, 100, 0, ''),
(17, 3, 1, 1, 1, 0, 100, 0, ''),
(18, 15, 3, 2, 1, 0, 100, 0, ''),
(19, 4, 5, 2, 1, 10, 100, 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `message_id` int(11) NOT NULL,
  `message_thread_code` longtext NOT NULL,
  `message` longtext NOT NULL,
  `sender` longtext NOT NULL,
  `timestamp` longtext NOT NULL,
  `read_status` int(11) NOT NULL DEFAULT '0' COMMENT '0 unread 1 read'
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `message_thread_code`, `message`, `sender`, `timestamp`, `read_status`) VALUES
(1, 'c899211fdfdc59c', 'This is demo text for you!', 'student-1', '1435643045', 1),
(2, 'c899211fdfdc59c', 'Thank you for your text. ', 'admin-1', '1435643102', 0),
(3, 'edd5a06827b1203', 'hgvj', 'admin-1', '1435822629', 0),
(4, '2460d860d9baab2', 'sefdszrg', 'admin-1', '1436162062', 0),
(5, '4cd8ae1ee936459', 'kufnso adfjo ', 'Admin-', '1437888357', 0),
(6, 'aaadec63691aa29', 'hgfffg', 'student-', '1437888753', 0),
(7, 'c51db40c2be9ff0', 'xcgxcg', 'Admin-', '1437889219', 0),
(8, 'aaadec63691aa29', 'what''s up', 'student-', '1437889318', 0),
(9, 'aaadec63691aa29', 'abc', 'student-', '1437889513', 0);

-- --------------------------------------------------------

--
-- Table structure for table `message_thread`
--

CREATE TABLE IF NOT EXISTS `message_thread` (
  `message_thread_id` int(11) NOT NULL,
  `message_thread_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sender` longtext COLLATE utf8_unicode_ci NOT NULL,
  `reciever` longtext COLLATE utf8_unicode_ci NOT NULL,
  `last_message_timestamp` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `message_thread`
--

INSERT INTO `message_thread` (`message_thread_id`, `message_thread_code`, `sender`, `reciever`, `last_message_timestamp`) VALUES
(1, 'c899211fdfdc59c', 'student-1', 'admin-1', ''),
(2, 'edd5a06827b1203', 'admin-1', 'teacher-1', ''),
(3, '2460d860d9baab2', 'admin-1', 'student-2', ''),
(4, '4cd8ae1ee936459', 'Admin-', 'student-6', ''),
(5, 'aaadec63691aa29', 'student-', 'admin-1', ''),
(6, 'c51db40c2be9ff0', 'Admin-', 'student-2', '');

-- --------------------------------------------------------

--
-- Table structure for table `noticeboard`
--

CREATE TABLE IF NOT EXISTS `noticeboard` (
  `notice_id` int(11) NOT NULL,
  `is_event` int(11) NOT NULL DEFAULT '0',
  `notice_title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `notice` text COLLATE utf8_unicode_ci NOT NULL,
  `create_timestamp` int(100) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `noticeboard`
--

INSERT INTO `noticeboard` (`notice_id`, `is_event`, `notice_title`, `notice`, `create_timestamp`, `date`) VALUES
(15, 0, 'Watery Desktop 3D ওয়ালপেপার দিয়ে মনে হবে যেন পানিতে ভাসছে', '<p style="margin-bottom: 6px; color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; line-height: 19.3199996948242px;">ডেস্কটপ</p><p style="margin-top: 6px; margin-bottom: 6px; color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; line-height: 19.3199996948242px;"></p><p style="margin-top: 6px; margin-bottom: 6px; display: inline; color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; line-height: 19.3199996948242px;">যারা ডেস্কটপকে একটু ভিন্ন আমেজে সাজাতে চান তাদের জন্য দারুন দারুন কিছু এ্যানিমেটেড ওয়ালপেপার শেয়ার করতে চাই। যা ব্যবহার করে আপনিও বেশ মজা পাবেন। আমি যে এ্যানিমেটেড ওয়ালপেপার কথা বলছি সেটা পানিতে ভেসে বেড়াবে আপনার ডেস্কটপ। কি বিশ্বাস হচ্ছে না?</p>', 0, '2015-08-05'),
(14, 1, 'উইন্ডোজ ৭ এবং ৮ এর জন্য আপনি নিজেই থীম তৈরি করুন', '<span style="color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; line-height: 19.3199996948242px;">না ভাই আপনাদের ধারনা একদম ভুল এটার জন্য কোন সফটওয়্যার লাগবে না এবং আপনি যে ভাবছেন থীম তৈরি তাও আবার উইন্ডোজ এর জন্য তাহলে বলি সেটাও না এটা তৈরি করা খুব সোজা আমার নীচের ছোট্ট স্টেপ গুলো দেখুন আর করুন আপনিও বলবেন এটা কোন পোস্ট</span>                                                ', 1439935200, '2015-08-05');

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE IF NOT EXISTS `parent` (
  `parent_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `student_id` int(11) NOT NULL,
  `relation_with_student` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `profession` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`parent_id`, `name`, `email`, `password`, `student_id`, `relation_with_student`, `phone`, `mobile`, `address`, `profession`) VALUES
(1, 'Piku', 'p@gmail.com', '123', 10, 'Uncle', '234234', '', 'adsfaf f ', 'Businessman'),
(2, '', '', '', 13, 'Father', '', '0', '', 'Business');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(11) NOT NULL,
  `payment_type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `transaction_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `method` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `sec_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `dep_id` int(11) NOT NULL DEFAULT '0',
  `sec_name` varchar(20) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`sec_id`, `class_id`, `dep_id`, `sec_name`, `teacher_id`) VALUES
(2, 3, 0, 'Sta', 0),
(4, 2, 1, 'Star', 0),
(5, 1, 1, 'Piku', 0),
(6, 2, 1, 'Green', 0),
(7, 1, 1, 'Barishal', 0),
(8, 4, 0, 'Parrot', 0),
(9, 2, 1, 'Ping Pong', 5);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `settings_id` int(11) NOT NULL,
  `type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `type`, `description`) VALUES
(1, 'system_name', 'CSMS'),
(2, 'system_title', 'Cenaxis School Management System'),
(3, 'address', 'Dhaka, Bangladesh'),
(4, 'phone', '+88013574846'),
(5, 'paypal_email', 'paypal@cenaxis.net'),
(6, 'currency', 'usd'),
(7, 'system_email', 'school@cenaxis.net'),
(8, 'buyer', 'cenaxis'),
(9, 'purchase_code', '0'),
(11, 'language', 'Bangla'),
(12, 'text_align', '0');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `birthday` varchar(50) NOT NULL,
  `joindate` varchar(50) NOT NULL,
  `position` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` longtext NOT NULL,
  `phone` int(30) NOT NULL,
  `salary` float NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `name`, `birthday`, `joindate`, `position`, `gender`, `address`, `phone`, `salary`, `status`) VALUES
(1, 'Rahim', '07/14/2015', '07/28/2015', '', 'male', 'adsfasf', 23424, 5000, 'available'),
(2, 'Karim', '', '', '', '', '', 0, 0, 'available'),
(3, '123', '', '', '', '', '', 0, 0, 'available'),
(4, 'Kamal', '05/12/2015', '06/25/2015', 'driver', 'male', 'adfaf', 3232434, 5000, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `birthday` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sex` longtext COLLATE utf8_unicode_ci NOT NULL,
  `religion` longtext COLLATE utf8_unicode_ci NOT NULL,
  `blood_group` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `father_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `mother_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `dep_id` int(11) NOT NULL DEFAULT '0',
  `sec_id` int(11) NOT NULL,
  `optional_sub_id` int(11) NOT NULL DEFAULT '0',
  `roll` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `transport_id` int(11) NOT NULL,
  `dormitory_id` int(11) NOT NULL,
  `dormitory_room_number` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `name`, `birthday`, `sex`, `religion`, `blood_group`, `address`, `phone`, `email`, `password`, `father_name`, `mother_name`, `class_id`, `dep_id`, `sec_id`, `optional_sub_id`, `roll`, `status`, `transport_id`, `dormitory_id`, `dormitory_room_number`) VALUES
(1, 'Nazim', '01/30/2000', 'male', '', '', 'afdd ffafa', '32423', 'nazim@gmail.com', '123', '', '', '1', 0, 0, 0, '3', '', 0, 0, ''),
(2, 'Demo Hassan', '07/12/1995', 'male', '', '', 'Mirpur, Dhaka.', '123123', 'demo@gmail.com', '123', '', '', '1', 0, 0, 0, '2', '', 0, 0, ''),
(3, 'Lorem Babu', '02/15/1994', 'male', '', '', 'Niketon', '123123', 'lorembabu@outlook.com', '123', '', '', '1', 0, 0, 0, '2', '', 0, 0, ''),
(4, 'Saiful Ipsum', '03/20/1996', 'male', '', '', 'Dhaka', '123123', 'saifulipsum@gmail.com', '123', '', '', '2', 0, 0, 0, '2', '', 0, 0, ''),
(5, 'Afnan', '07/15/2015', 'male', '', '', 'adf afaf', '234234', 'afnan@gmail.com', '123', '', '', '2', 0, 1, 0, '5', '', 0, 0, ''),
(7, 'b', '06/10/2014', 'male', '', '', 'Dhaka, Bangladesh', '234234', 'b@gmail.com', '123', '', '', '2', 1, 0, 0, '1', '', 0, 0, ''),
(8, 'c', '06/07/2015', 'male', '', '', 'Dhaka, Bangladesh', '234234', 'c@gmail.com', '123', '', '', '2', 1, 0, 0, '1', '', 0, 0, ''),
(9, 'd', '06/10/2014', 'male', '', '', '', '', '', '', '', '', '2', 1, 6, 0, '2', '', 0, 0, ''),
(10, 'd', '06/10/2014', 'male', '', '', 'adfs', '234234', 'd@gmail.com', '', '', '', '2', 1, 4, 0, '12', 'available', 0, 0, ''),
(11, 'Sharif', '06/10/2014', 'male', '', '', 'Dhaka, Bangladesh', '234234', 'sharif@gmail.com', '123', '', '', '3', 0, 0, 0, '2', '', 0, 0, ''),
(12, 'Pintu', '07/06/2015', 'male', '', '', 'dsf', '23', 'pintu@gmail.com', '123', '', '', '2', 1, 4, 0, '10', 'available', 0, 0, ''),
(13, 'Atik', '07/16/2015', 'male', '', '', 'asdf', '234', 'atik@gmail.com', '123', '', '', '2', 1, 4, 0, '12', 'Not Available', 0, 0, ''),
(14, 'Manik', '07/16/2015', 'male', '', '', 'asdf', '24', 'manik@gmail.com', '123', '', '', '2', 1, 4, 0, '19', 'available', 0, 0, ''),
(15, 'Afnan Ahmed', '06/13/1994', 'male', '', '', 'ad fafa', '234234', 'afnan1@gmail.com', '123', '', '', '2', 1, 4, 0, '10', 'available', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `subject_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` int(11) NOT NULL,
  `dep_id` int(11) NOT NULL DEFAULT '0',
  `sec_id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `name`, `class_id`, `dep_id`, `sec_id`, `teacher_id`) VALUES
(1, 'Bengali', 1, 0, 0, 1),
(2, 'English 1st ', 2, 3, 0, 8),
(3, 'Bangla 1st paper', 2, 1, 4, 3),
(4, 'Social Science', 2, 2, 0, 2),
(5, 'অসামাজিক বিজ্ঞান', 2, 1, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `teacher_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `birthday` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `join_date` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sex` longtext COLLATE utf8_unicode_ci NOT NULL,
  `designation` longtext COLLATE utf8_unicode_ci NOT NULL,
  `qualification` longtext COLLATE utf8_unicode_ci NOT NULL,
  `prev_ex` longtext COLLATE utf8_unicode_ci NOT NULL,
  `religion` longtext COLLATE utf8_unicode_ci NOT NULL,
  `nationality` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `blood_group` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `t_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `name`, `birthday`, `join_date`, `sex`, `designation`, `qualification`, `prev_ex`, `religion`, `nationality`, `blood_group`, `address`, `phone`, `email`, `password`, `t_status`) VALUES
(1, 'Sayem', '07/15/2015', '123', 'male', 'sd', '', 'asdf', 'Muslim', 'Bangladeshi', 'AB+', 'adsfaf f ', '234234', 's@gmail.com', '123', 'available'),
(2, 'Mubarak', '', '02/05/1980', 'male', '', '', 'no', '', 'Bangladeshi', '', 'afd af a ', '2342342', 'm@gmail.com', '123', 'available'),
(3, 'Avijit', '', '06/10/2014', 'male', 'asa', 'adf', '', 'male', 'Bangladeshi', '', 'adf', '234234', 'avijit@gmail.com', '123', 'available'),
(5, 'Arif', '', '02/05/1980', 'male', 'adsf', 'asdf', '', 'male', 'Bangladeshi', '', 'Dhaka, Bangladesh', '234234', 'arif@gmail.com', '123', 'available'),
(6, 'Tabin', '', '02/05/1980', 'male', 'asa', 'adf', 'adfa adf adf adsf af', 'male', 'Bangladeshi', '', 'Dhaka, Bangladesh', '234234', 'tabin@gmail.com', '123', 'available'),
(8, 'Saif', '', '02/05/1980', 'male', 'adf', 'af', 'adf', 'Muslim', 'Bangladeshi', 'AB+', 'af', '234234', 'saif@gmail.com', '123', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE IF NOT EXISTS `transport` (
  `transport_id` int(11) NOT NULL,
  `route_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `number_of_vehicle` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `route_fare` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `class_routine`
--
ALTER TABLE `class_routine`
  ADD PRIMARY KEY (`class_routine_id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dormitory`
--
ALTER TABLE `dormitory`
  ADD PRIMARY KEY (`dormitory_id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`phrase_id`);

--
-- Indexes for table `mark`
--
ALTER TABLE `mark`
  ADD PRIMARY KEY (`mark_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `message_thread`
--
ALTER TABLE `message_thread`
  ADD PRIMARY KEY (`message_thread_id`);

--
-- Indexes for table `noticeboard`
--
ALTER TABLE `noticeboard`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`parent_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`sec_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`transport_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=414;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `class_routine`
--
ALTER TABLE `class_routine`
  MODIFY `class_routine_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `dormitory`
--
ALTER TABLE `dormitory`
  MODIFY `dormitory_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `phrase_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=308;
--
-- AUTO_INCREMENT for table `mark`
--
ALTER TABLE `mark`
  MODIFY `mark_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `message_thread`
--
ALTER TABLE `message_thread`
  MODIFY `message_thread_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `noticeboard`
--
ALTER TABLE `noticeboard`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `sec_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `transport`
--
ALTER TABLE `transport`
  MODIFY `transport_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
