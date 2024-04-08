-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2022 at 10:10 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `insijam`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_arabic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_arabic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_arabic` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `article_tag`
--

CREATE TABLE `article_tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `article_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `challenge`
--

CREATE TABLE `challenge` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_english` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_arabic` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_arabic` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_english` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `challenge`
--

INSERT INTO `challenge` (`id`, `title_english`, `title_arabic`, `description_arabic`, `description_english`, `created_at`, `updated_at`) VALUES
(4, 'ywieu', 'rgwkhe', 'bfkjw', 'fjfhkjdlk', '2022-11-17 12:42:01', '2022-11-17 12:42:01');

-- --------------------------------------------------------

--
-- Table structure for table `challenges_link`
--

CREATE TABLE `challenges_link` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_arabic` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_english` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_link` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` enum('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36','37','38','39','40','41','42','43','44','45','46','47','48','49','50','51','52','53','54','55','56','57','58','59','60','61','62','63','64','65','66','67','68','69','70','71','72','73','74','75','76','77','78','79','80','81','82','83','84','85','86','87','88','89','90','91','92','93','94','95','96','97','98','99','100') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `point` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `challenge_id` bigint(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `challenges_link`
--

INSERT INTO `challenges_link` (`id`, `title_arabic`, `title_english`, `video_link`, `day`, `point`, `challenge_id`, `created_at`, `updated_at`) VALUES
(8, 'wkjfek', 'vfbkjsk', 'bfs', '1', '', 4, '2022-11-17 13:19:57', '2022-11-17 13:19:57');

-- --------------------------------------------------------

--
-- Table structure for table `challenge_achievements`
--

CREATE TABLE `challenge_achievements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_arabic` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message_arabic` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `challenge_skills`
--

CREATE TABLE `challenge_skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_arabic` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `challenge_videos`
--

CREATE TABLE `challenge_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enlighting_challenge_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_arabic` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `channel_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel_name_arabic` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_arabic` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` int(11) NOT NULL,
  `achievement_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `achievement_name_arabic` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `achievement_message` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `achievement_message_arabic` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `achievement_badge_url` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_arabic` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_arabic` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_name_arabic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag_arabic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_arabic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `discounte_type` enum('fixed','percentage') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fixed',
  `discounted_price` int(11) DEFAULT NULL,
  `total_points` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_name_arabic`, `tag`, `tag_arabic`, `description`, `description_arabic`, `price`, `discounte_type`, `discounted_price`, `total_points`, `created_at`, `updated_at`) VALUES
(6, 'Find the Harmony', 'انسجمي مع نفسك', 'womanhoood-harmony-men and woman-stress-balance-forgiveness-happiness-self-love', 'المرأة-الانسجام-المرأة والرجل-التوتر-المسامحة-السعادة-حب الذات-التوازن', 'After years of coaching, coach Dalal has taken the main areas of her coaching and placed them in an online course for you to learn and transform from the comfort of your home. Great value, easy to understand, and effective.', 'هل ترغبين بالسعادة؟ هل تودين أن تتعرفي على نفسك؟ هل ترغبين بتحسين علاقتك مع الآخرين؟ بعد سنوات من الخبرة وتدريب الآلاف من النساء في مجال العلاقات، ورغبة مني في مساندتكم لتحقيق الإنسجام في حياتكم يسعدني أن أقدم لكم كورس بعنوان انسجمي مع نفسك، وفي هذه الدور', '100.00', 'fixed', 10, 100, '2022-11-17 07:26:55', '2022-11-17 07:26:55'),
(7, 'Forgiveness', 'المسامحة', 'forgiveness-forgive-forgiving', 'المسامحة-سامحي', 'In this course Coach Dalal Al-janaie discusses the idea of forgiveness and introduces exercises that can help in your journey of forgiving both yourself and others.', 'في هذا الكورس تناقش الأستاذة دلال الجناعي موضوع المسامحة وكيفية تفعيلها في شتى جوانب الحياة. الكورس يتضمن تمرينات تساعدك في رحلة مسامحة نفسك والآخرين.', '0.00', 'fixed', 0, 0, '2022-11-18 05:59:30', '2022-11-18 05:59:30'),
(8, 'Stress', 'التوتر', 'Stress-body-woman-men-anxious-anxiety-panic', 'قلق-توتر-رجل-مرأة', 'In this course Coach Dalal Al-janaie discusses the idea of stress and the ways to deal with it. The course also sheds some light on how men and women are different when it comes to dealing with stress and anxiety.', 'في هذا الكورس تناقش الأستاذة دلال الجناعي موضوع التوتر والطرق المختلفة للتعامل معه. الكورس أيضًا يطرح الضوء على الطرق التي يختلف بها الرجل والمرأة في التعامل مع القلق والتوتر.', '0.00', 'fixed', 0, 0, '2022-11-18 06:04:15', '2022-11-18 06:04:15'),
(9, 'Thoughts', 'الأفكار', 'thoughts-fear-reality-thinking-feelings-idea-truth', 'الأفكار-فكرة-الحقيقة-الواقع-المشاعر-الخوف', 'In this course Coach Dalal Al-janaie discusses the idea of thoughts and how much they can affect us on daily basis. It also discusses how thoughts can be fake and how to find the truth among all of that.', 'في هذا الكورس تناقش الأستاذة دلال الجناعي موضوع الأفكار وكيف تؤثر على الإنسان سواء بالسلب أوالإيجاب..', '0.00', 'fixed', 0, 0, '2022-11-18 06:09:22', '2022-11-18 06:09:22'),
(10, 'Money', 'المال', 'money-spending-finance-financial literacy-wealth', 'المال-الصرف-الثراء-ثقافة مالية-الماديات', 'In this course Coach Dalal Al-janaie introduces the topic of money and how one can be aware of their perspective on financial matters and the way they deal with money.', 'في هذا الكورس تناقش الأستاذة دلال الجناعي موضوع المال وكيفية الوعي بالأمور المادية في الحياة والتعامل معها بأفضل طريقة ممكنة..', '0.00', 'fixed', 0, 0, '2022-11-18 06:14:31', '2022-11-18 06:14:31'),
(11, 'Balance', 'التوازن', 'balance-life-work-money-energy-health-gratitude', 'توازن- التوازن-عجلة الحياة-سعادة-صحة-مال-عمل-روحانية', 'In this course Coach Dalal Al-janaie introduces the topic of balance and how one can balance different aspects and variables to carry out a stable, well-balanced life.', 'في هذا الكورس تناقش الأستاذة دلال الجناعي موضوع التوازن وكيف يمكننا أن نوازن الأمور المختلفة في الحياة للوصول إلى السعادة والاستقرار..', '0.00', 'fixed', 0, 0, '2022-11-18 06:24:56', '2022-11-18 06:24:56'),
(12, 'The Art of Relationships', 'فن العلاقة', 'anger-need-want-art-relationship-balance-happy-contempt-defense', '-غضب-حب-علاقة-فن-احتقار-دفاعية-توازن-سعادة', 'In this course Coach Dalal Al-janaie discusses the art of relationship, what to expect from a relationship, how to know where you currently stand in a relationship, and how to deal with dysfunctional relationships.', 'في هذا الكورس تناقش الأستاذة دلال الجناعي فن العلاقة والطرق المختلفة للتعامل مع العلاقات ومعرفة ما المخزى من العلاقة وكيفية التعامل مع العلاقات المختلة..', '0.00', 'fixed', 0, 0, '2022-11-18 06:35:47', '2022-11-18 06:35:47'),
(13, 'The Meaning of Love', 'معنى الحب', 'Love-Heartbreak-Heart-Relationships-Attachement-loss-Avoidant', 'حب-تعلق-انكسار-قرب-فقد-علاقات', 'In this course Coach Dalal Al-janaie discusses the meaning of love and how one can precieve love and understand the differentv types of attachement in relationships.', 'في هذا الكورس تناقش الأستاذة دلال الجناعي معنى الحب وكيف يمكننا التعامل معه وفهم أنواع التعلق المختلفة في العلاقات..', '0.00', 'fixed', 0, 0, '2022-11-18 06:48:27', '2022-11-18 06:48:27'),
(14, 'Rejection', 'الرفض', 'Rejection-childhood-thoughts-judgement-reflection', 'الرفض-الطفولة-الأفكار-الحكم-الانعكاس', 'In this course Coach Dalal Al-janaie discusses the topic of rejection and how to tackle it.', 'في هذا الكورس تناقش الأستاذة دلال الجناعي موضوع الرفض وكيفية التعامل معه..', '0.00', 'fixed', 0, 0, '2022-11-18 07:04:23', '2022-11-18 07:04:23'),
(15, 'Happiness', 'السعادة', 'happy-happiness-love-god-frienship-support-travel-gratitude', 'السعادة-سعادة-الصداقة-الله-الاستسلام-الامتنان-السفر-الدعم-المواساة', 'In this course Coach Dalal Al-janaie discusses the topic of Happiness and what is needed in order to be happy in life.', 'في هذا الكورس تناقش الأستاذة دلال الجناعي السعادة وما الذي نحتاج إلى فعله للوصول إلى السعادة..', '0.00', 'fixed', 0, 0, '2022-11-18 07:24:52', '2022-11-18 07:24:52'),
(16, 'Femininity', 'الأنوثة', 'Feminine-femininty-woman-womanhood-love-life-musculine-balance', 'الأنوثة-الأنثى-أنثى-الذكورة-التوازن', 'In this course Coach Dalal Al-janaie discusses the topic of Femininty and what it might mean to different people.', 'في هذا الكورس تناقش الأستاذة دلال الجناعي موضوع الأنوثة وما الذي قد يعنيه لكِ ولغيرك..', '0.00', 'fixed', 0, 0, '2022-11-18 08:40:27', '2022-11-18 08:40:27'),
(17, 'Who Are You?', 'منو أنتِ؟', 'self-knowledge-childhood-job-life-belief-fault-worth-bright-dark-accept', 'نفس-ذات-علم-تطوير-مظلم-مشرق-خطأ-استحقاق-طفولة-عمل-شخصية', 'In this course Coach Dalal Al-Janaie tackles the topic of self knowledge and how can one have awareness to see both the good and the bad in oneself and in others.', 'في هذا الكورس تناقس المدربة دلال الجناعي موضوع معرفة الذات والشخصية وكيفية التعامل مع الجانب المظلم والمشرق في التكوين الشخصي للفرد.', '0.00', 'fixed', 0, 0, '2022-11-18 08:57:43', '2022-11-18 08:57:43'),
(18, 'Karisma', 'الكاريزما', 'karisma-happy-truth-presence-emotions-aware', 'كاريزما-فهم-ادراك-مشاعر-حضور-حقيقي', 'In this course Coach Dalal Al-Janaie discusses the topic of Karisma and its importance in life, she also discusses several ways that can help you in becoming a Karismatic person.', 'في هذا الكورس تناقش المدربة دلال الجناعي موضوع الكاريزما واهميته في الحياة، وطرق مختلفة قد تساعدك أن تصبح شخصًا ذا كاريزما', '0.00', 'fixed', 0, 0, '2022-11-18 09:15:29', '2022-11-18 09:15:29');

-- --------------------------------------------------------

--
-- Table structure for table `course_chapters`
--

CREATE TABLE `course_chapters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_chapters`
--

INSERT INTO `course_chapters` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'chapter_one', NULL, NULL),
(2, 'chapter_two', NULL, NULL),
(3, 'chapter_three', NULL, NULL),
(4, 'chapter_four', NULL, NULL),
(5, 'chapter_five', NULL, NULL),
(6, 'chapter_6', NULL, NULL),
(7, 'chapter_seven', NULL, NULL),
(8, 'chapter_eight', NULL, NULL),
(9, 'chapter_nine', NULL, NULL),
(10, 'chapter_ten', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_links`
--

CREATE TABLE `course_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `chapter_id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_arabic` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_links`
--

INSERT INTO `course_links` (`id`, `course_id`, `chapter_id`, `name`, `name_arabic`, `link`, `points`, `created_at`, `updated_at`) VALUES
(10, 6, 1, 'Course Introduction', 'مقدمة البرنامج', 'https://drive.google.com/file/d/1JFJOjjYCUej2R8FRcebC11br3fp70A3Q/view?usp=sharing', NULL, '2022-11-17 07:41:41', '2022-11-17 07:41:41'),
(12, 6, 1, 'Women\'s Role in the Present Times', 'مهام المرأة في الزمن الحالي', 'https://drive.google.com/file/d/1wh1bCIH1EVuFYtzbhZn861IATtko4hkh/view?usp=sharing', 0, '2022-11-17 07:41:41', '2022-11-17 07:41:41'),
(13, 6, 1, 'Men and Stress', 'الرجل والتوتر', 'https://drive.google.com/file/d/1evhjgyXn0iFo8_pvpzneIASgCowAq1iF/view?usp=sharing', 0, '2022-11-17 07:41:41', '2022-11-17 07:41:41'),
(14, 6, 1, 'Understanding Stress and its Effects on the Body', 'فهم التوتر وأثره على الجسم', 'https://drive.google.com/file/d/1pLbhc-fvoepqGGGcqdMl_JupXBeofvbr/view?usp=sharing', 0, '2022-11-17 07:41:41', '2022-11-17 07:41:41'),
(15, 6, 1, 'Stress Symptoms', 'أعراض التوتر على الجسم', 'https://drive.google.com/file/d/15aFhTEfUsSrK5XQhfbbhER38ap5_exvY/view?usp=sharing', 0, '2022-11-17 07:41:41', '2022-11-17 07:41:41'),
(16, 6, 1, 'Difference Between Men and Woman in Stress - Men/', 'الفرق بين الرجل والمرأة والتوتر – الرجل', 'https://drive.google.com/file/d/1iKjvGNm6J7Hn8HiuAwllFHs_KjK955VP/view?usp=sharing', 0, '2022-11-17 07:41:41', '2022-11-17 07:41:41'),
(17, 6, 1, 'Difference Between Men and Woman in Stress - Women', 'الفرق بين الرجل والمرأة والتوتر – المرأة', 'https://drive.google.com/file/d/1-eKCuCTUeVlRdPKXJ8Zqrpdeor1-ysvt/view?usp=sharing', 0, '2022-11-17 07:41:41', '2022-11-17 07:41:41'),
(18, 6, 1, 'How Can You Deal With Stress?/كيف تتعاملين مع التوتر؟', 'كيف تتعاملين مع التوتر؟', 'https://drive.google.com/file/d/1dcP7zT1qfnEukwHUUewew7WQ6cDsY4A-/view?usp=sharing', 0, '2022-11-17 07:41:41', '2022-11-17 07:41:41'),
(19, 6, 1, 'Your Choices Change Your Life', 'اختياراتك تغيير حياتك', 'https://drive.google.com/file/d/1Po7Bu_AWNsFVhGLTz0znAfP7eXjxjzS9/view?usp=sharing', 0, '2022-11-17 07:41:41', '2022-11-17 07:41:41'),
(33, 6, 2, 'Life Balance', 'التوازن للحياة', 'https://drive.google.com/file/d/1yyLG8tQZchFCIpjAs_RWFOND4zoK16uD/view?usp=sharing', 0, '2022-11-17 12:07:33', '2022-11-17 12:07:33'),
(34, 6, 2, 'Work', 'العمل', 'https://drive.google.com/file/d/1HVRMED54uZDSgifmefV9b9_6TLMy9Q8k/view?usp=sharing', 0, '2022-11-17 12:07:33', '2022-11-17 12:07:33'),
(35, 6, 2, 'Money', 'المال', 'https://drive.google.com/file/d/15lqZxx6a5jok59_k0XcOLfR7UwTPoLCr/view?usp=sharing', 0, '2022-11-17 12:07:33', '2022-11-17 12:07:33'),
(36, 6, 2, 'Self-Development', 'تطوير الذات', 'https://drive.google.com/file/d/1PrvCTru9WY7bj4_Y-rjdO83uyzFVKyFq/view?usp=sharing', 0, '2022-11-17 12:07:33', '2022-11-17 12:07:33'),
(37, 6, 2, 'Health', 'الصحة', 'https://drive.google.com/file/d/1O0Kast7_i9dmIzG1llfqzIcJegobgMrw/view?usp=sharing', 0, '2022-11-17 12:07:33', '2022-11-17 12:07:33'),
(38, 6, 2, 'Family', 'العائلة', 'https://drive.google.com/file/d/1gL4cCZlpq7_hMa01v6kMq_XL2VSttFjk/view?usp=sharing', 0, '2022-11-17 12:07:33', '2022-11-17 12:07:33'),
(39, 6, 2, 'Relationships', 'العلاقات', 'https://drive.google.com/file/d/1XC5KzAuyPRmEFZ0eW-r2i45X7u6hrzKd/view?usp=sharing', 0, '2022-11-17 12:07:33', '2022-11-17 12:07:33'),
(40, 6, 2, 'Social Life', 'الحياة الاجتماعية', 'https://drive.google.com/file/d/1zUWfsxrvWFHhXC88yRQaeu_IvB8qNRhu/view?usp=sharing', 0, '2022-11-17 12:07:33', '2022-11-17 12:07:33'),
(41, 6, 2, 'Perspective', 'المنظور', 'https://drive.google.com/file/d/1aBk82d1nJ80qF6kA0jT-IyOeQlVY3aeS/view?usp=sharing', 0, '2022-11-17 12:07:33', '2022-11-17 12:07:33'),
(42, 6, 2, 'Life Wheel', 'عجلة الحياة', 'https://drive.google.com/file/d/1MJBn-44rwJvUI8rsFMQp20nKOPa0j-oX/view?usp=sharing', 0, '2022-11-17 12:07:33', '2022-11-17 12:07:33'),
(43, 6, 2, 'The Current State of the Relationship', 'الوضع الحالي بالعلاقة', 'https://drive.google.com/file/d/11q2BFuLPoiVCiJrnkcqv2nY27GQtwBq5/view?usp=sharing', 0, '2022-11-17 12:07:33', '2022-11-17 12:07:33'),
(44, 6, 2, 'Feelings Today', 'المشاعر اليوم', 'https://drive.google.com/file/d/1-5vteEYNhPEQom7IY8dt8tjq3xyKgca3/view?usp=sharing', 0, '2022-11-17 12:07:33', '2022-11-17 12:07:33'),
(46, 6, 3, 'The Current State of the Relationship', 'الوضع الحالي بالعلاقة', 'https://drive.google.com/file/d/11q2BFuLPoiVCiJrnkcqv2nY27GQtwBq5/view?usp=sharing', 0, '2022-11-18 05:49:55', '2022-11-18 05:49:55'),
(47, 6, 3, 'Feelings Today', 'المشاعر اليوم', 'https://drive.google.com/file/d/1-5vteEYNhPEQom7IY8dt8tjq3xyKgca3/view?usp=sharing', 0, '2022-11-18 05:49:55', '2022-11-18 05:49:55'),
(48, 6, 3, 'Do Not Be Afraid', 'لا تخافين', 'https://drive.google.com/file/d/1kVGnnYTOiVlyKiuyVVz7nRjp68KrrK7i/view?usp=sharing', 0, '2022-11-18 05:49:55', '2022-11-18 05:49:55'),
(49, 6, 3, 'Sadness', 'الزعل', 'https://drive.google.com/file/d/1T_Ya-GQBO7TIx0xWVzsxXVK_eHxukblU/view?usp=sharing', 0, '2022-11-18 05:49:55', '2022-11-18 05:49:55'),
(50, 6, 3, 'The Meaning of Forgiveness', 'معنى المسامحة', 'https://drive.google.com/file/d/11tybZ0Fap0hWyOlO8k4log5uxt4r5Srr/view?usp=sharing', 0, '2022-11-18 05:49:55', '2022-11-18 05:49:55'),
(51, 6, 3, 'Understanding  the \"Love Letters\" Exercise', 'فهم تمرين رسائل الحب', 'https://drive.google.com/file/d/1PyoVs5l35bpBzXnpLpbuHeSAsEa2a_XC/view?usp=sharing', 0, '2022-11-18 05:49:55', '2022-11-18 05:49:55'),
(52, 6, 3, 'Love Letters Exercise-1', 'تمرين رسائل الحب -1', 'https://drive.google.com/file/d/1MtPK8eaZmFYxkoa-bj2yPmAupmEGaLCA/view?usp=sharing', 0, '2022-11-18 05:49:55', '2022-11-18 05:49:55'),
(53, 6, 3, 'Love Letters Exercise-2', 'تمرين رسائل الحب -2', 'https://drive.google.com/file/d/1BXMD6xGJdhHXLWaQAmemjxYPqMfZjRTw/view?usp=sharing', 0, '2022-11-18 05:49:55', '2022-11-18 05:49:55'),
(54, 6, 3, 'Love Letters Exercise-3', 'تمرين رسائل الحب -3', 'https://drive.google.com/file/d/1ALCfEl9iwomngi1bkkyCRDd0wjfXAh_t/view?usp=sharing', 0, '2022-11-18 05:49:55', '2022-11-18 05:49:55'),
(55, 6, 3, 'Understanding the Letters and the Discussion', 'فهم الرسائل والنقاش', 'https://drive.google.com/file/d/1pF2_Ayzo8iFfiht3jICcLJI8VaHc-dt4/view?usp=sharing', 0, '2022-11-18 05:49:55', '2022-11-18 05:49:55'),
(56, 6, 4, 'Relationship Balance', 'التوازن بالعلاقة', 'https://drive.google.com/file/d/1celRBLDw3ZmaHs8uJTFA1VMvx4OrC8dl/view?usp=sharing', 0, '2022-11-18 05:49:55', '2022-11-18 05:49:55'),
(57, 6, 4, 'Happiness', 'السعادة', 'https://drive.google.com/file/d/11ysDYwS1aar0SBoOmefZmUVF8BeUGpZR/view?usp=sharing', 0, '2022-11-18 05:49:55', '2022-11-18 05:49:55'),
(58, 6, 4, 'Who is Responsible for Your Happiness?', 'من مسؤول عن سعادتك؟', 'https://drive.google.com/file/d/1NwbDEPG1ia-2zd4vUtPyrR9jH3SYPL1m/view?usp=sharing', 0, '2022-11-18 05:49:55', '2022-11-18 05:49:55'),
(59, 6, 4, 'Where is Happiness', 'وين السعادة', 'https://drive.google.com/file/d/1KWbYX50kUiyxlm_LsbGCyq8BBcL3UIrD/view?usp=sharing', 0, '2022-11-18 05:49:55', '2022-11-18 05:49:55'),
(60, 6, 4, 'Love Yourself', 'أحبي نفسك', 'https://drive.google.com/file/d/1TDx_6Tu_NLDvvanRb4I0xqr_Il1l2489/view?usp=sharing', 0, '2022-11-18 05:49:55', '2022-11-18 05:49:55'),
(61, 6, 4, 'Perfectionism', 'المثالية', 'https://drive.google.com/file/d/1ynjcW6hHvCP0TOALvW8EQkC-2BEZV7YN/view?usp=sharing', 0, '2022-11-18 05:57:11', '2022-11-18 05:57:11'),
(62, 6, 4, 'Your Beliefs-1', 'معتقداتك -1', 'https://drive.google.com/file/d/1Yn9eRqp8r5U7JdenBQuB23_WczC4r6cW/view?usp=sharing', 0, '2022-11-18 05:57:11', '2022-11-18 05:57:11'),
(63, 6, 4, 'Your Beliefs-2', 'معتقداتك -2', 'https://drive.google.com/file/d/1-ER_y8rSA3hm6T0gwl-lzAgJYaNXpORR/view?usp=sharing', 0, '2022-11-18 05:57:11', '2022-11-18 05:57:11'),
(64, 6, 4, 'Where are the Thoughts?', 'أين الأفكار؟', 'https://drive.google.com/file/d/11iqIRWlPvmeRnlK1bVkzp2HrP6ABDeX1/view?usp=sharing', 0, '2022-11-18 05:57:11', '2022-11-18 05:57:11'),
(65, 6, 4, 'Your Thoughts Affect Your Life-1', 'أفكارك تؤثر على حياتك -1', 'https://drive.google.com/file/d/1yTKl3J8VRAD6dIbeTqsUnWioZBD1f5XN/view?usp=sharing', 0, '2022-11-18 05:57:11', '2022-11-18 05:57:11'),
(66, 6, 4, 'Your Thoughts Affect Your Life-2', 'أفكارك تؤثر على حياتك -2', 'https://drive.google.com/file/d/1T_CyZQkQA1t3zlck5eGg9CaorZw9GR4v/view?usp=sharing', 0, '2022-11-18 05:57:11', '2022-11-18 05:57:11'),
(67, 6, 4, 'The Mirror Exercise', 'تمرين المنظرة', 'https://drive.google.com/file/d/1PlIqbvl5SXyj7jATamKvYyn3cCgmuzqE/view?usp=sharing', 0, '2022-11-18 05:57:11', '2022-11-18 05:57:11'),
(68, 6, 4, 'Balance Summary', 'تلخيص التوازن', 'https://drive.google.com/file/d/1WdEXBF6rTdy3u0-7AOYLG4zqk_8LpzcP/view?usp=sharing', 0, '2022-11-18 05:57:11', '2022-11-18 05:57:11'),
(69, 6, 5, 'End', 'الخاتمة', 'https://drive.google.com/file/d/101mORznCEIWLzAVIAw5kZyCk76kpuvgy/view?usp=sharing', 0, '2022-11-18 05:57:11', '2022-11-18 05:57:11'),
(70, 7, 1, 'Course Introduction', 'مقدمة البرنامج', 'https://www.loom.com/share/25d5da49f13f476f8bd0ac327001ad3c?sharedAppSource=personal_library', 0, '2022-11-18 06:03:00', '2022-11-18 06:03:00'),
(71, 7, 1, 'Finding the Gift -1', 'فهم الهدية -1', 'https://www.loom.com/share/5199f5dbf2e142b3a1234867198e9665?sharedAppSource=personal_library', 0, '2022-11-18 06:03:00', '2022-11-18 06:03:00'),
(72, 7, 1, 'Finding the Gift -2', 'فهم الهدية -2', 'https://www.loom.com/share/93c5b2d7566c4a4fb32ac73cc126202d?sharedAppSource=personal_library', 0, '2022-11-18 06:03:00', '2022-11-18 06:03:00'),
(73, 7, 1, 'Forgiveness Exercise Introduction-1', 'استعداد تمرين المسامحة-1', 'https://www.loom.com/share/f746282327e144409edfabed68df225d?sharedAppSource=personal_library', 0, '2022-11-18 06:03:00', '2022-11-18 06:03:00'),
(74, 7, 1, 'Forgiveness Exercise Introduction-2', 'استعداد تمرين المسامحة-2', 'https://www.loom.com/share/d3ebd5a4a7fc43cfbb39a2dcfdfd3726?sharedAppSource=personal_library', 0, '2022-11-18 06:03:00', '2022-11-18 06:03:00'),
(75, 7, 1, 'Forgiveness Exercise', 'تمرين المسامحة', 'https://www.loom.com/share/eeef527aef1945a1bd0fc2f07f79acd0?sharedAppSource=personal_library', 0, '2022-11-18 06:03:00', '2022-11-18 06:03:00'),
(76, 8, 1, 'Course Introduction', 'مقدمة البرنامج', 'https://www.loom.com/share/6f042fac7a1c42988087c8c44dd1628d?sharedAppSource=personal_library', 0, '2022-11-18 06:07:42', '2022-11-18 06:07:42'),
(77, 8, 1, 'Stress and Women', 'المرأة والتوتر', 'https://www.loom.com/share/c16a384931a843bbbdce89d6674a3af9?sharedAppSource=personal_library', 0, '2022-11-18 06:07:42', '2022-11-18 06:07:42'),
(78, 8, 1, 'Stress and Men', 'الرجل والتوتر', 'https://www.loom.com/share/30ad12ba11fb4f438bdab1362e0ecc96?sharedAppSource=personal_library', 0, '2022-11-18 06:07:42', '2022-11-18 06:07:42'),
(79, 8, 1, 'Stress and Your Body', 'التوتر والجسد', 'https://www.loom.com/share/8b46d2d9d51a400da07009eeb5646c71?sharedAppSource=personal_library', 0, '2022-11-18 06:07:42', '2022-11-18 06:07:42'),
(80, 8, 1, 'Deal with Stress-1', 'تعاملي مع التوتر-1', 'https://www.loom.com/share/0574096e5bbb48bea5b4aefc1ffa38e5?sharedAppSource=personal_library', 0, '2022-11-18 06:07:42', '2022-11-18 06:07:42'),
(81, 8, 1, 'Deal with Stress-2', 'تعاملي مع التوتر-2', 'https://www.loom.com/share/8b807149da964cc0a0c9afcbeacd1214?sharedAppSource=personal_library', 0, '2022-11-18 06:07:42', '2022-11-18 06:07:42'),
(82, 8, 1, 'Deal with Stress-3', 'تعاملي مع التوتر-3', 'https://www.loom.com/share/5603c4142e124666948b96408fe39a12?sharedAppSource=personal_library', 0, '2022-11-18 06:07:42', '2022-11-18 06:07:42'),
(83, 9, 1, 'Course Introduction', 'مقدمة البرنامج', 'https://www.loom.com/share/f7ddf62595cb444d990a36ed0dc83178?sharedAppSource=personal_library', 0, '2022-11-18 06:13:15', '2022-11-18 06:13:15'),
(84, 9, 1, 'Thoughts', 'الأفكار', 'https://www.loom.com/share/874dddea616a4d9b99a1df4c0b5199a0?sharedAppSource=personal_library', 0, '2022-11-18 06:13:15', '2022-11-18 06:13:15'),
(85, 9, 1, 'Thinking Rate', 'نسبة التفكير', 'https://www.loom.com/share/d960c835c9564f148653b7dbbd451193?sharedAppSource=personal_library', 0, '2022-11-18 06:13:15', '2022-11-18 06:13:15'),
(86, 9, 1, 'What are Thoughts?', 'ما هي الأفكار؟', 'https://www.loom.com/share/55418a1626bf407ea4cb21abcf35d083?sharedAppSource=personal_library', 0, '2022-11-18 06:13:15', '2022-11-18 06:13:15'),
(87, 9, 1, 'What is Reality?', 'ما هو الواقع؟', 'https://www.loom.com/share/09e9a91bb8ab4dd5afdd42f9cac13c3e?sharedAppSource=personal_library', 0, '2022-11-18 06:13:15', '2022-11-18 06:13:15'),
(88, 9, 1, 'With Time', 'مع الوقت', 'https://www.loom.com/share/98edb73441d641eabd7ba7fbac16eebf?sharedAppSource=personal_library', 0, '2022-11-18 06:13:15', '2022-11-18 06:13:15'),
(89, 9, 1, 'Recurring Feelings', 'مشاعر متكررة', 'https://www.loom.com/share/39633019c13a40f1a5b81902028669d6?sharedAppSource=personal_library', 0, '2022-11-18 06:13:15', '2022-11-18 06:13:15'),
(90, 9, 1, 'Where is the Truth?', 'أين الحقيقة؟', 'https://www.loom.com/share/f537503f08aa487f91ad6f88443502b8?sharedAppSource=personal_library', 0, '2022-11-18 06:13:15', '2022-11-18 06:13:15'),
(91, 9, 1, 'Fear of Change', 'خوف التغيير', 'https://www.loom.com/share/aa4d115be7fe4223b5b489dfc9802940?sharedAppSource=personal_library', 0, '2022-11-18 06:13:15', '2022-11-18 06:13:15'),
(92, 10, 1, 'Course Introduction', 'مقدمة البرنامج', 'https://www.loom.com/share/bf486b24eee44d918687a9b163af198a?sharedAppSource=personal_library', 0, '2022-11-18 06:23:44', '2022-11-18 06:23:44'),
(93, 10, 1, 'Wealth', 'الثراء', 'https://www.loom.com/share/bc883620cd5a414e8465e3b1b15a49a7?sharedAppSource=personal_library', 0, '2022-11-18 06:23:44', '2022-11-18 06:23:44'),
(94, 10, 1, 'Characteristics of Wealthy People', 'مواصفات الأغنياء', 'https://www.loom.com/share/d3bb936e82bd4f03b03e3de8e8ece561?sharedAppSource=personal_library', 0, '2022-11-18 06:23:44', '2022-11-18 06:23:44'),
(95, 10, 1, 'Beliefs about Money', 'المعتقدات عن المال', 'https://www.loom.com/share/a3cbad0653174436a376e57d434f6f13?sharedAppSource=personal_library', 0, '2022-11-18 06:23:44', '2022-11-18 06:23:44'),
(96, 10, 1, 'Money & Childhood', 'التعامل المالي في الطفولة', 'https://www.loom.com/share/60ed45b38dab4f3686bdd413caba09d5?sharedAppSource=personal_library', 0, '2022-11-18 06:23:44', '2022-11-18 06:23:44'),
(97, 10, 1, 'Language Programming', 'البرمجة اللغوية', 'https://www.loom.com/share/da66a210f41646049825f32cad3d325c?sharedAppSource=personal_library', 0, '2022-11-18 06:23:44', '2022-11-18 06:23:44'),
(98, 10, 1, 'Practical Programming', 'البرمجة الفعلية', 'https://www.loom.com/share/737c00d70c394eec9c53171953b2c838?sharedAppSource=personal_library', 0, '2022-11-18 06:23:44', '2022-11-18 06:23:44'),
(99, 10, 0, 'Results', 'النتيجة', 'https://www.loom.com/share/721ab00aee094befa64291cbd16c77b0?sharedAppSource=personal_library', 0, '2022-11-18 06:23:44', '2022-11-18 06:23:44'),
(100, 10, 1, 'What Did You Realize?', 'ما الذي اتضح؟', 'https://www.loom.com/share/7ff53709afef48b1919f499bf0e672d3?sharedAppSource=personal_library', 0, '2022-11-18 06:23:44', '2022-11-18 06:23:44'),
(101, 10, 1, 'Meeting', 'مقابلة', 'https://www.loom.com/share/bd044912b3674a1c8a5b8653277519c4?sharedAppSource=personal_library', 0, '2022-11-18 06:23:44', '2022-11-18 06:23:44'),
(102, 10, 2, 'Introduction', 'مقدمة', 'https://www.loom.com/share/83898b66d77047e69463605f71d4dd8b?sharedAppSource=personal_library', 0, '2022-11-18 06:23:44', '2022-11-18 06:23:44'),
(103, 10, 2, 'Pyramid-1', 'الهرم-1', 'https://www.loom.com/share/198be6c3412141cf9b47b8b8057d2818?sharedAppSource=personal_library', 0, '2022-11-18 06:23:44', '2022-11-18 06:23:44'),
(104, 10, 2, 'Pyramid-2', 'الهرم-2', 'https://www.loom.com/share/c9765fd6ab114b9fb9d4a9d86d61b659?sharedAppSource=personal_library', 0, '2022-11-18 06:23:44', '2022-11-18 06:23:44'),
(105, 10, 2, 'Pyramid-3', 'الهرم-3', 'https://www.loom.com/share/1665768e97294e44bdf2cf33b786f141?sharedAppSource=personal_library', 0, '2022-11-18 06:23:44', '2022-11-18 06:23:44'),
(106, 10, 2, 'Pyramid-4', 'الهرم-4', 'https://www.loom.com/share/a712fab42a9846dfbcc2381824c0357b?sharedAppSource=personal_library', 0, '2022-11-18 06:23:44', '2022-11-18 06:23:44'),
(107, 10, 2, 'Pyramid-5', 'الهرم-5', 'https://www.loom.com/share/e974016017ae47c09f9bdf1833b3c66f?sharedAppSource=personal_library', 0, '2022-11-18 06:23:44', '2022-11-18 06:23:44'),
(108, 10, 2, 'Understanding the Basics', 'فهم الأساس', 'https://www.loom.com/share/3a9b2537ccf4444e94dde21b796daaeb?sharedAppSource=personal_library', 0, '2022-11-18 06:23:44', '2022-11-18 06:23:44'),
(109, 10, 2, 'Division', 'تقسيمة', 'https://www.loom.com/share/11998d7d4dde4ab993abef495c8670c6?sharedAppSource=personal_library', 0, '2022-11-18 06:23:44', '2022-11-18 06:23:44'),
(110, 10, 2, 'Spending Types', 'أنواع الصرف', 'https://www.loom.com/share/0336cf4f77f74644b784ab3a62f81b1e?sharedAppSource=personal_library', 0, '2022-11-18 06:23:44', '2022-11-18 06:23:44'),
(111, 10, 2, 'Perspective', 'نظرة', 'https://www.loom.com/share/9fbceede4e7647ddb845672e197be02c?sharedAppSource=personal_library', 0, '2022-11-18 06:23:44', '2022-11-18 06:23:44'),
(112, 11, 1, 'Course Introduction', 'مقدمة البرنامج', 'https://www.loom.com/share/b82c7014cf3a488c828a17ff0eb4b0ab?sharedAppSource=personal_library', 0, '2022-11-18 06:33:22', '2022-11-18 06:33:22'),
(113, 11, 1, 'Balance', 'التوازن', 'https://www.loom.com/share/599674b62d494cec85c0da65df956e8d?sharedAppSource=personal_library', 0, '2022-11-18 06:33:22', '2022-11-18 06:33:22'),
(114, 11, 1, 'Spirituality', 'الروحانية', 'https://www.loom.com/share/c72012deb8bd45b6b92f34b415530b3b?sharedAppSource=personal_library', 0, '2022-11-18 06:33:22', '2022-11-18 06:33:22'),
(115, 11, 1, 'Energy', 'طاقتك', 'https://www.loom.com/share/b02de93c26324764878172134d327cb9?sharedAppSource=personal_library', 0, '2022-11-18 06:33:22', '2022-11-18 06:33:22'),
(116, 11, 1, 'Health', 'الصحة', 'https://www.loom.com/share/22f7b9791e7340b4ad231fc78d5ae4a9?sharedAppSource=personal_library', 0, '2022-11-18 06:33:22', '2022-11-18 06:33:22'),
(117, 11, 1, 'Work', 'العمل', 'https://www.loom.com/share/e0d5cb6d57d3481ea00528b6716ade56?sharedAppSource=personal_library', 0, '2022-11-18 06:33:22', '2022-11-18 06:33:22'),
(118, 11, 1, 'The Wheel of Life', 'عجلة الحياة', 'https://www.loom.com/share/7118c81af02144eb8bb5c27414036c70?sharedAppSource=personal_library', 0, '2022-11-18 06:33:22', '2022-11-18 06:33:22'),
(119, 11, 1, 'Enjoy the Journey', 'استمتعي بالرحلة', 'https://www.loom.com/share/745ece8eed58418ba33ef6436902ebdb?sharedAppSource=personal_library', 0, '2022-11-18 06:33:22', '2022-11-18 06:33:22'),
(120, 11, 1, 'Meditation', 'تأمل', 'https://www.loom.com/share/3596e763fb3b42ebb174464324f9f565?sharedAppSource=personal_library', 0, '2022-11-18 06:33:22', '2022-11-18 06:33:22'),
(121, 11, 1, 'Post-Meditation', 'ما بعد تمرين التأمل', 'https://www.loom.com/share/bf467af0b52b4a50abc4d802bbdc6eb0?sharedAppSource=personal_library', 0, '2022-11-18 06:33:22', '2022-11-18 06:33:22'),
(122, 11, 2, 'Introduction', 'مقدمة', 'https://www.loom.com/share/21e699522dc741f186c665e0f7e44d72?sharedAppSource=personal_library', 0, '2022-11-18 06:33:22', '2022-11-18 06:33:22'),
(123, 11, 2, 'Physical Side', 'الجانب الجسدي', 'https://www.loom.com/share/33fb9a25a09e422ca27cc2a8c881881d?sharedAppSource=personal_library', 0, '2022-11-18 06:33:22', '2022-11-18 06:33:22'),
(124, 11, 2, 'Psychological Side', 'الجانب النفسي', 'https://www.loom.com/share/e719bc6012af486d9e8b5725d6507e96?sharedAppSource=personal_library', 0, '2022-11-18 06:33:22', '2022-11-18 06:33:22'),
(125, 11, 2, 'Emotional Side', 'الجانب النفسي', 'https://www.loom.com/share/09a35c9d1a544b098af70385cdd34d18?sharedAppSource=personal_library', 0, '2022-11-18 06:33:22', '2022-11-18 06:33:22'),
(126, 11, 2, 'Let\'s Start', 'لنبدأ العمل', 'https://www.loom.com/share/e2e2a19b3f584a8bb203c9f2c2b9ded2?sharedAppSource=personal_library', 0, '2022-11-18 06:33:22', '2022-11-18 06:33:22'),
(127, 11, 2, 'Where Will You Focus?', 'أين ستركزين؟', 'https://www.loom.com/share/b101230155db4d7d9af42e54051e4a81?sharedAppSource=personal_library', 0, '2022-11-18 06:33:22', '2022-11-18 06:33:22'),
(128, 11, 2, 'Serious Work', 'العمل بجدية', 'https://www.loom.com/share/0c35f07ca6fb4e44885c68fe627b3bd4?sharedAppSource=personal_library', 0, '2022-11-18 06:33:22', '2022-11-18 06:33:22'),
(129, 11, 2, 'Avoid Distraction', 'تجنبي التشتت', 'https://www.loom.com/share/141b86637a694bbb9da35c8e64229010?sharedAppSource=personal_library', 0, '2022-11-18 06:33:22', '2022-11-18 06:33:22'),
(130, 12, 1, 'Course Introduction', 'مقدمة البرنامج', 'https://www.loom.com/share/7deccb63b2344fd89e71a5735441dc59?sharedAppSource=personal_library', 0, '2022-11-18 06:46:15', '2022-11-18 06:46:15'),
(131, 12, 1, 'Current State', 'الوضع الحالي', 'https://www.loom.com/share/7ced1387902b4e2fb32909bfef824d4e?sharedAppSource=personal_library', 0, '2022-11-18 06:46:15', '2022-11-18 06:46:15'),
(132, 12, 1, 'Anger', 'الغضب', 'https://www.loom.com/share/d41126c0319d4da8b1f4e8a30c52b0fe?sharedAppSource=personal_library', 0, '2022-11-18 06:46:15', '2022-11-18 06:46:15'),
(133, 12, 1, 'What Do You Want?', 'ماذا تريدين؟', 'https://www.loom.com/share/19d9ed7786e74e9e9bbb728c15db0245?sharedAppSource=personal_library', 0, '2022-11-18 06:46:15', '2022-11-18 06:46:15'),
(134, 12, 1, 'Self-Love', 'حب الذات', 'https://www.loom.com/share/0959210ef6484be09a705ae1e804a85f?sharedAppSource=personal_library', 0, '2022-11-18 06:46:15', '2022-11-18 06:46:15'),
(135, 12, 1, 'Meaning of \"Relationship\"', 'معنى العلاقة', 'https://www.loom.com/share/5f21b69516714b90ae41df927f02208d?sharedAppSource=personal_library', 0, '2022-11-18 06:46:15', '2022-11-18 06:46:15'),
(136, 12, 1, 'Relationship Outline/رسم العلاقة', 'رسم العلاقة', 'https://www.loom.com/share/0d58b9b7e5514ff995832df6885ae81c?sharedAppSource=personal_library', 0, '2022-11-18 06:46:15', '2022-11-18 06:46:15'),
(137, 12, 1, 'Now What?', 'ماذا الآن؟', 'https://www.loom.com/share/d9edeee03bfe47c9853459cff2c5ce41?sharedAppSource=personal_library', 0, '2022-11-18 06:46:15', '2022-11-18 06:46:15'),
(138, 12, 1, 'Who is in Your Relationship?', 'من في علاقتك؟', 'https://www.loom.com/share/13a6aebc420f42f182b87127fd3175ff?sharedAppSource=personal_library', 0, '2022-11-18 06:46:15', '2022-11-18 06:46:15'),
(139, 12, 2, 'Introduction', 'مقدمة', 'https://www.loom.com/share/22ad5c0668d54fab882d4a15278393ac?sharedAppSource=personal_library', 0, '2022-11-18 06:46:15', '2022-11-18 06:46:15'),
(140, 12, 2, 'Do You Want the Relationship to Flourish?', 'هل تريدين ازدهار العلاقة؟', 'https://www.loom.com/share/6c98f832c1dd4ee6ba23cf01763730ba?sharedAppSource=personal_library', 0, '2022-11-18 06:46:15', '2022-11-18 06:46:15'),
(141, 12, 2, 'Do You Want the Relationship to Flourish? 2', 'هل تريدين ازدهار العلاقة؟ 2', 'https://www.loom.com/share/29ca8316302b42609076065607e241f2?sharedAppSource=personal_library', 0, '2022-11-18 06:46:15', '2022-11-18 06:46:15'),
(142, 12, 2, 'How Do You Invest Into the Relationship?', 'ما الطاقة التي تضعها في العلاقة؟', 'https://www.loom.com/share/0d0f800ea1fd4c21af1efd3f77932e61?sharedAppSource=personal_library', 0, '2022-11-18 06:46:15', '2022-11-18 06:46:15'),
(143, 12, 2, '4 Signs of Dysfunctional Relationships', 'العلامات الأربعة للعلاقات المختلة', 'https://www.loom.com/share/0c4303a967cd4cc3bad04732552180da?sharedAppSource=personal_library', 0, '2022-11-18 06:46:15', '2022-11-18 06:46:15'),
(144, 12, 2, 'Criticism', 'الانتقاد', 'https://www.loom.com/share/b536626cda7e41bbb19f47267d555c45?sharedAppSource=personal_library', 0, '2022-11-18 06:46:15', '2022-11-18 06:46:15'),
(145, 12, 2, 'Contempt', 'الاحتقار', 'https://www.loom.com/share/02f5e19d1fc5433a93d1eacc60531a3c?sharedAppSource=personal_library', 0, '2022-11-18 06:46:15', '2022-11-18 06:46:15'),
(146, 12, 2, 'Defensiveness', 'الدفاعية', 'https://www.loom.com/share/5b281589c4d74d0aa69644074af30321?sharedAppSource=personal_library', 0, '2022-11-18 06:46:15', '2022-11-18 06:46:15'),
(147, 12, 2, 'Stonewalling', 'احتكار الكلام', 'https://www.loom.com/share/2015e28f377d44bda47d8c43140dd187?sharedAppSource=personal_library', 0, '2022-11-18 06:46:15', '2022-11-18 06:46:15'),
(148, 12, 2, 'The Point System', 'نظام النقاط', 'https://www.loom.com/share/7953f91cfe3c40c6b25aeabca82abf88?sharedAppSource=personal_library', 0, '2022-11-18 06:46:15', '2022-11-18 06:46:15'),
(149, 12, 2, 'Relationship Imbalances', 'خلل في توازن العلاقة', 'https://www.loom.com/share/08e94407f72847c0b18d3f073dcd24de?sharedAppSource=personal_library', 0, '2022-11-18 06:46:15', '2022-11-18 06:46:15'),
(150, 12, 2, 'What Do You Expect?', 'ما هي توقعاتك؟', 'https://www.loom.com/share/a90e76d381ae43d59b67d6cbf874ff94?sharedAppSource=personal_library', 0, '2022-11-18 06:46:15', '2022-11-18 06:46:15'),
(151, 12, 2, 'Meditation', 'تأمل', 'https://www.loom.com/share/180e0f1e838e4fc998c6af2e1896c4cf?sharedAppSource=personal_library', 0, '2022-11-18 06:46:15', '2022-11-18 06:46:15'),
(152, 13, 1, 'Course Introduction', 'مقدمة البرنامج', 'https://www.loom.com/share/8dd98042238a40a5b21c247458e6a40e?sharedAppSource=personal_library', 0, '2022-11-18 07:02:58', '2022-11-18 07:02:58'),
(153, 13, 1, 'What is Love?', 'ما هو الحب؟', 'https://www.loom.com/share/6b39698e0a8b45a2b20814a1d7294f47?sharedAppSource=personal_library', 0, '2022-11-18 07:02:58', '2022-11-18 07:02:58'),
(154, 13, 1, 'What is Your Experience with Love?', 'ما هي تجربتك مع الحب؟', 'https://www.loom.com/share/b81cc951712d4cdf8d4236ec5b1caf91?sharedAppSource=personal_library', 0, '2022-11-18 07:02:58', '2022-11-18 07:02:58'),
(155, 13, 1, 'How Many Times Your Hurt Got Broken?', 'كم مرة انكسر قلبك؟', 'https://www.loom.com/share/6580d594cf9245daa98599dcdc77baed?sharedAppSource=personal_library', 0, '2022-11-18 07:02:58', '2022-11-18 07:02:58'),
(156, 13, 1, 'What are the Examples of Love You See?', 'ما أمثلة الحب التي تراها؟', 'https://www.loom.com/share/ed37683b29b04aa6bcfbe1cbcc305d11?sharedAppSource=personal_library', 0, '2022-11-18 07:02:58', '2022-11-18 07:02:58'),
(157, 13, 1, 'What Do You Think About When You Think About Love?', 'ما هي أفكارك عندما تفكر بالحب؟', 'https://www.loom.com/share/188a13bd8fe64df5a443fbb6c0542d5a?sharedAppSource=personal_library', 0, '2022-11-18 07:02:58', '2022-11-18 07:02:58'),
(158, 13, 1, 'Do You Want Love?', 'هل تريدين الحب؟', 'https://www.loom.com/share/62e1516d0a404c51815f6ec1fdd968e3?sharedAppSource=personal_library', 0, '2022-11-18 07:02:58', '2022-11-18 07:02:58'),
(159, 13, 1, 'Do You Trust Others?', 'هل تثقين بالآخرين؟', 'https://www.loom.com/share/72c1c6358ac74477b695a4f0d9a700aa?sharedAppSource=personal_library', 0, '2022-11-18 07:02:58', '2022-11-18 07:02:58'),
(160, 13, 1, 'Is it Really Love?', 'هل هو فعلا حب؟', 'https://www.loom.com/share/25f3bc29fec1496e8f03c49fb8995c8d?sharedAppSource=personal_library', 0, '2022-11-18 07:02:58', '2022-11-18 07:02:58'),
(161, 13, 1, 'Excitement', 'الفتنة', 'https://www.loom.com/share/f6403a1929074ab2930032db56bebdff?sharedAppSource=personal_library', 0, '2022-11-18 07:02:58', '2022-11-18 07:02:58'),
(162, 13, 1, 'Empty Love', 'علاقة فارغة من الحب', 'https://www.loom.com/share/d371566a7ad5438fb3bb99605088373f?sharedAppSource=personal_library', 0, '2022-11-18 07:02:58', '2022-11-18 07:02:58'),
(163, 13, 1, 'Simple Love', 'الحب البسيط', 'https://www.loom.com/share/b2e12ece101b42e1a854e9b03d00203e?sharedAppSource=personal_library', 0, '2022-11-18 07:02:58', '2022-11-18 07:02:58'),
(164, 13, 1, 'Intimacy', 'ألفة', 'https://www.loom.com/share/8eea33f3588a4e5ca642bbee49a8e9ad?sharedAppSource=personal_library', 0, '2022-11-18 07:02:58', '2022-11-18 07:02:58'),
(165, 13, 1, 'Where Are You?', 'أين أنت؟', 'https://www.loom.com/share/1ee92d3a7c8e4f90b1bb3ba834b80685?sharedAppSource=personal_library', 0, '2022-11-18 07:02:58', '2022-11-18 07:02:58'),
(166, 13, 2, 'Course Introduction', 'مقدمة البرنامج', 'https://www.loom.com/share/a31936f52f5b4925a5f5a41ebd72679b?sharedAppSource=personal_library', 0, '2022-11-18 07:02:58', '2022-11-18 07:02:58'),
(167, 13, 2, 'What is Attachement?', 'ما هو التعلق؟', 'https://www.loom.com/share/477a3f569a9947ee85d81c4c57bf2e1f?sharedAppSource=personal_library', 0, '2022-11-18 07:02:58', '2022-11-18 07:02:58'),
(168, 13, 2, 'Anxious Attachement 1', 'المتعلق القلق 1', 'https://www.loom.com/share/4389d48f4e374b68b83ef51c108982e4?sharedAppSource=personal_library', 0, '2022-11-18 07:02:58', '2022-11-18 07:02:58'),
(169, 13, 2, 'Anxious Attachement 2', 'المتعلق القلق 2', 'https://www.loom.com/share/d0ca953020d94c07ba464774602eb947?sharedAppSource=personal_library', 0, '2022-11-18 07:02:58', '2022-11-18 07:02:58'),
(170, 13, 2, 'Fearful Attachement', 'المتعلق الخائف', 'https://www.loom.com/share/ae660b4615e243c7b7f32f0173b75447?sharedAppSource=personal_library', 0, '2022-11-18 07:02:58', '2022-11-18 07:02:58'),
(171, 13, 2, 'Avoidant Attachement', 'المتعلق المتفادي', 'https://www.loom.com/share/b0a37c7912cc40a5abd96852a9112221?sharedAppSource=personal_library', 0, '2022-11-18 07:02:58', '2022-11-18 07:02:58'),
(172, 13, 2, 'Avoidant Attachement 2', 'المتعلق المتفادي 2', 'https://www.loom.com/share/e81af170e8d54830beaed19ada910991?sharedAppSource=personal_library', 0, '2022-11-18 07:02:58', '2022-11-18 07:02:58'),
(173, 13, 2, 'Stable Attachement', 'المتعلق المستقر', 'https://www.loom.com/share/156c4472454e42da8e4bdb2a6a5590ce?sharedAppSource=personal_library', 0, '2022-11-18 07:02:58', '2022-11-18 07:02:58'),
(174, 13, 2, 'Stable Attachement 2', 'المتعلق المستقر 2', 'https://www.loom.com/share/fc3564f924734169a58a2f5bb6380f94?sharedAppSource=personal_library', 0, '2022-11-18 07:02:58', '2022-11-18 07:02:58'),
(175, 13, 2, 'Stable Attachement 3', 'المتعلق المستقر 3', 'https://www.loom.com/share/239b5da01f0a402fa3b9aa0bc29c2330?sharedAppSource=personal_library', 0, '2022-11-18 07:02:58', '2022-11-18 07:02:58'),
(176, 13, 2, 'Stable Attachement 4', 'المتعلق المستقر 4', 'https://www.loom.com/share/1943281ec6c2424bb3e5b4d511540c46?sharedAppSource=personal_library', 0, '2022-11-18 07:02:58', '2022-11-18 07:02:58'),
(177, 13, 2, 'Stable Attachement 5', 'المتعلق المستقر 5', 'https://www.loom.com/share/f48c2a27a1ef48afade7efe0f91974a2?sharedAppSource=personal_library', 0, '2022-11-18 07:02:58', '2022-11-18 07:02:58'),
(178, 13, 2, 'Trust', 'الثقة', 'https://www.loom.com/share/bc34964cee944141bfa5b5cb6a864fd6?sharedAppSource=personal_library', 0, '2022-11-18 07:02:58', '2022-11-18 07:02:58'),
(179, 13, 2, 'Loss & Getting Closer to People', 'الفقد والقرب', 'https://www.loom.com/share/6dee89ce3d2d4bedb342eb5780d944b6?sharedAppSource=personal_library', 0, '2022-11-18 07:02:58', '2022-11-18 07:02:58'),
(180, 13, 2, 'Attachement Signs', 'علامات التعلق', 'https://www.loom.com/share/1fb6f327af98443792c200e97b5fe8d5?sharedAppSource=personal_library', 0, '2022-11-18 07:02:58', '2022-11-18 07:02:58'),
(181, 13, 2, 'How to Reach Love?', 'كيف أصل إلى الحب؟', 'https://www.loom.com/share/7c35c849bf9b44a7a5c5a095897f17fd?sharedAppSource=personal_library', 0, '2022-11-18 07:02:58', '2022-11-18 07:02:58'),
(182, 13, 2, 'What Does Love Need?', 'إلى ما يحتاج الحب', 'https://www.loom.com/share/4d938e6e05ac4bb385980c7f6cace80b?sharedAppSource=personal_library', 0, '2022-11-18 07:02:58', '2022-11-18 07:02:58'),
(183, 13, 2, 'Integrated Love', 'حب متكامل', 'https://www.loom.com/share/2833b172ec404637ab0229c2e799b4d9?sharedAppSource=personal_library', 0, '2022-11-18 07:02:58', '2022-11-18 07:02:58'),
(184, 14, 1, 'Course Introduction', 'مقدمة البرنامج', 'https://www.loom.com/share/602dd4571f9348dba2464e2a15ddd31f?sharedAppSource=personal_library', 0, '2022-11-18 07:22:32', '2022-11-18 07:22:32'),
(185, 14, 1, 'Rejection Types', 'ما أنواع الرفض؟', 'https://www.loom.com/share/4f7fe09185c84513a86bd224a3f0b4a3?sharedAppSource=personal_library', 0, '2022-11-18 07:22:32', '2022-11-18 07:22:32'),
(186, 14, 1, 'How Does Rejection Affect You?', 'ما أثر الرفض عليك؟', 'https://www.loom.com/share/3ca528b3d2a44f719d630342eb52cdac?sharedAppSource=personal_library', 0, '2022-11-18 07:22:32', '2022-11-18 07:22:32'),
(187, 14, 1, 'Tell Me About Your Childhood', 'أخبريني عن طفولتك', 'https://www.loom.com/share/f0d179060d544ed8842a61a6bb88875a?sharedAppSource=personal_library', 0, '2022-11-18 07:22:32', '2022-11-18 07:22:32'),
(188, 14, 1, 'Engraved Memories', 'ما المواقف المحفورة في الذكريات', 'https://www.loom.com/share/cb38f6df3f544b419f136a486df26a73?sharedAppSource=personal_library', 0, '2022-11-18 07:22:32', '2022-11-18 07:22:32'),
(189, 14, 1, 'How Does it Affect You', 'ما أثره عليك', 'https://www.loom.com/share/43244e57dda348caa246deca97d22a85?sharedAppSource=personal_library', 0, '2022-11-18 07:22:32', '2022-11-18 07:22:32'),
(190, 14, 1, 'Your Thoughts', 'ما هي الأفكار التي تراودك؟', 'https://www.loom.com/share/9b441f0e861b481ab597b6ce6a6c050b?sharedAppSource=personal_library', 0, '2022-11-18 07:22:32', '2022-11-18 07:22:32'),
(191, 14, 1, 'How Does Rejection Affect Your Life?', 'ما أثر الرفض على حياتك؟', 'https://www.loom.com/share/590e86803d05452f9687140043044250?sharedAppSource=personal_library', 0, '2022-11-18 07:22:32', '2022-11-18 07:22:32'),
(192, 14, 1, 'Judgement', 'الحكم', 'https://www.loom.com/share/076946c701cc49f7b896ec81e51a7aeb?sharedAppSource=personal_library', 0, '2022-11-18 07:22:32', '2022-11-18 07:22:32'),
(193, 14, 1, 'What Would You Change?', 'ماذا تختار تغييره؟', 'https://www.loom.com/share/7a6063bfd5fa4887bb262bebcd25f001?sharedAppSource=personal_library', 0, '2022-11-18 07:22:32', '2022-11-18 07:22:32'),
(194, 14, 2, 'Course Introduction', 'مقدمة البرنامج', 'https://www.loom.com/share/47f57cb8b3c641d8a6e84bf4005d1d90?sharedAppSource=personal_library', 0, '2022-11-18 07:22:32', '2022-11-18 07:22:32'),
(195, 14, 2, 'Why Rejection?', 'لماذا الرفض؟', 'https://www.loom.com/share/c563aaba0d764faeade9765c90185a72?sharedAppSource=personal_library', 0, '2022-11-18 07:22:32', '2022-11-18 07:22:32'),
(196, 14, 2, 'Reflection Law', 'قانون الانعكاس', 'https://www.loom.com/share/ae9a1da80c1c4596bbed328b568d3c04?sharedAppSource=personal_library', 0, '2022-11-18 07:22:32', '2022-11-18 07:22:32'),
(197, 14, 2, 'Parts of Ourselves', 'أجزاء من أنفسنا', 'https://www.loom.com/share/f034e5309fd54701b3ce983c7a639d1a?sharedAppSource=personal_library', 0, '2022-11-18 07:22:32', '2022-11-18 07:22:32'),
(198, 14, 2, 'Parts of Ourselves 2', 'أجزاء من أنفسنا 2', 'https://www.loom.com/share/a43ea9cb1a7f4e389fd4fbc572045ec4?sharedAppSource=personal_library', 0, '2022-11-18 07:22:32', '2022-11-18 07:22:32'),
(199, 14, 2, 'Their Childhood', 'طفولتهم', 'https://www.loom.com/share/f7ce1adad7de4e18a42baf100c7fbcf4?sharedAppSource=personal_library', 0, '2022-11-18 07:22:32', '2022-11-18 07:22:32'),
(200, 14, 2, 'Why Rejection? 2', 'لماذا الرفض؟ 2', 'https://www.loom.com/share/044ad21572344673be6c80bc47c9d25f?sharedAppSource=personal_library', 0, '2022-11-18 07:22:32', '2022-11-18 07:22:32'),
(201, 14, 2, 'Why Rejection? 3', 'لماذا الرفض؟ 3', 'https://www.loom.com/share/8e67f165a7974afd802fcd172c766de9?sharedAppSource=personal_library', 0, '2022-11-18 07:22:32', '2022-11-18 07:22:32'),
(202, 14, 2, 'Where is the Remote?', 'أين الريموت', 'https://www.loom.com/share/914051599b8a40b882aa38982555c763?sharedAppSource=personal_library', 0, '2022-11-18 07:22:32', '2022-11-18 07:22:32'),
(203, 14, 2, 'Where Are You?', 'أين أنت؟', 'https://www.loom.com/share/b181cce83aff4e0e82f12df245decf4b?sharedAppSource=personal_library', 0, '2022-11-18 07:22:32', '2022-11-18 07:22:32'),
(204, 14, 2, 'Meditation', 'التأمل', 'https://www.loom.com/share/7aeec4305cee42f1ae01dbe576145935?sharedAppSource=personal_library', 0, '2022-11-18 07:22:32', '2022-11-18 07:22:32'),
(205, 14, 2, 'Meditation 2', 'التأمل 2', 'https://www.loom.com/share/e1e493f3f3224e58abe47c5e63b5c00f?sharedAppSource=personal_library', 0, '2022-11-18 07:22:32', '2022-11-18 07:22:32'),
(206, 14, 2, 'Meditation 3', 'التأمل 3', 'https://www.loom.com/share/8691942f3f6341b3a245e0ea59c29b13?sharedAppSource=personal_library', 0, '2022-11-18 07:22:32', '2022-11-18 07:22:32'),
(207, 15, 1, 'Course Introduction', 'مقدمة البرنامج', 'https://www.loom.com/share/0cba0cd0e1724695b4c76b4f8933aa76?sharedAppSource=personal_library', 0, '2022-11-18 07:35:27', '2022-11-18 07:35:27'),
(208, 15, 1, 'What is Happiness?', 'ما السعادة؟', 'https://www.loom.com/share/95b5a6b7a33743afa9665d5eaf189e1c?sharedAppSource=personal_library', 0, '2022-11-18 07:35:27', '2022-11-18 07:35:27'),
(209, 15, 1, 'What is Happiness? 2', 'ما السعادة؟ 2', 'https://www.loom.com/share/d273012ba6fb463a8644f465cc3ed442?sharedAppSource=personal_library', 0, '2022-11-18 07:35:27', '2022-11-18 07:35:27'),
(210, 15, 1, 'Traveling & Love', 'السفر والحب', 'https://www.loom.com/share/5f83744c4dcd462d9ec3135e9bfa5729?sharedAppSource=personal_library', 0, '2022-11-18 07:35:27', '2022-11-18 07:35:27'),
(211, 15, 1, 'Marriage & Family', 'الزواج والعائلة', 'https://www.loom.com/share/66d511a7252e4a91a03bc4c8d77a0d27?sharedAppSource=personal_library', 0, '2022-11-18 07:35:27', '2022-11-18 07:35:27'),
(212, 15, 1, 'What Would Make You Happy?', 'ما الذي قد يسعدك أنتِ؟', 'https://www.loom.com/share/a89d76e80fd9460f9f5214738549da97?sharedAppSource=personal_library', 0, '2022-11-18 07:35:27', '2022-11-18 07:35:27'),
(213, 15, 1, 'What are the Basis of Happiness?', 'ما هي أسس السعادة', 'https://www.loom.com/share/d99d665a8e0f4b86ba928b83b6a81968?sharedAppSource=personal_library', 0, '2022-11-18 07:35:27', '2022-11-18 07:35:27'),
(214, 15, 1, 'Self-Appreciation', 'تقبل النفس', 'https://www.loom.com/share/1dd3ff1625fc4ef79f0bbc6b6e4f8afa?sharedAppSource=personal_library', 0, '2022-11-18 07:35:27', '2022-11-18 07:35:27'),
(215, 15, 1, 'Self-Mercy', 'رحمة نفسك', 'https://www.loom.com/share/df273527f1334df296666af3ece05dd3?sharedAppSource=personal_library', 0, '2022-11-18 07:35:27', '2022-11-18 07:35:27'),
(216, 15, 1, 'Love', 'الحب', 'https://www.loom.com/share/faee665c70ec4ff1bfb17c47b7033155?sharedAppSource=personal_library', 0, '2022-11-18 07:35:27', '2022-11-18 07:35:27'),
(217, 15, 1, 'Femininity', 'الأنوثة', 'https://www.loom.com/share/133298cea7d6471e8fb1a2a8cbe0d5b5?sharedAppSource=personal_library', 0, '2022-11-18 07:35:27', '2022-11-18 07:35:27'),
(218, 15, 1, 'Submission to God', 'الاستسلام إلى الله', 'https://www.loom.com/share/54e0e8c561fc4b0db00a3d9e0cccdb8f?sharedAppSource=personal_library', 0, '2022-11-18 07:35:27', '2022-11-18 07:35:27'),
(219, 15, 1, 'Thinking & Gratitude', 'التفكير والامتنان', 'https://www.loom.com/share/f951aeee41d8475f8425c7d28a770869?sharedAppSource=personal_library', 0, '2022-11-18 07:35:27', '2022-11-18 07:35:27'),
(220, 15, 1, 'Accept', 'اسمحي', 'https://www.loom.com/share/268ba1a6f67b4fa9acdee14e4fe4958e?sharedAppSource=personal_library', 0, '2022-11-18 07:35:27', '2022-11-18 07:35:27'),
(221, 15, 2, 'Course Introduction', 'مقدمة البرنامج', 'https://www.loom.com/share/182f8c6ac31641b0945033f5258db92f?sharedAppSource=personal_library', 0, '2022-11-18 07:35:27', '2022-11-18 07:35:27'),
(222, 15, 2, 'Recap', 'مراجعة سريعة', 'https://www.loom.com/share/aa05672add8a48c0ae6024a2d1dab761?sharedAppSource=personal_library', 0, '2022-11-18 07:35:27', '2022-11-18 07:35:27'),
(223, 15, 2, 'Gene', 'الوراثة', 'https://www.loom.com/share/a6e7440be23d46f4b5dca4316ffdae02?sharedAppSource=personal_library', 0, '2022-11-18 07:35:27', '2022-11-18 07:35:27'),
(224, 15, 2, 'Friends', 'الأصدقاء', 'https://www.loom.com/share/2951cd5b93e44249ade9eea4a73351be?sharedAppSource=personal_library', 0, '2022-11-18 07:35:27', '2022-11-18 07:35:27'),
(225, 15, 2, 'Health', 'الصحة', 'https://www.loom.com/share/53b43fab36974b06aa9a2a3cf0f4242a?sharedAppSource=personal_library', 0, '2022-11-18 07:35:27', '2022-11-18 07:35:27'),
(226, 15, 2, 'Knowledge', 'العلم', 'https://www.loom.com/share/dd83dea956d94a80b8cd5634221c4c74?sharedAppSource=personal_library', 0, '2022-11-18 07:35:27', '2022-11-18 07:35:27'),
(227, 15, 2, 'Support', 'الدعم', 'https://www.loom.com/share/7cb23a04402a4413905804a14855b407?sharedAppSource=personal_library', 0, '2022-11-18 07:35:27', '2022-11-18 07:35:27'),
(228, 15, 2, 'Achievement', 'العمل والإنجاز', 'https://www.loom.com/share/116fd65c08ac4876982087b10536ace0?sharedAppSource=personal_library', 0, '2022-11-18 07:35:27', '2022-11-18 07:35:27'),
(229, 15, 2, 'The Circle of Happiness', 'دائرة السعادة', 'https://www.loom.com/share/d329b55e235b4ae6ac67d1a018e5b03e?sharedAppSource=personal_library', 0, '2022-11-18 07:35:27', '2022-11-18 07:35:27'),
(230, 15, 2, 'Fear of Happiness', 'خوف من السعادة', 'https://www.loom.com/share/ed4a1cbcb3cc4491acda6fc8169ef5a5?sharedAppSource=personal_library', 0, '2022-11-18 07:35:27', '2022-11-18 07:35:27'),
(231, 15, 2, 'Meditation', 'التأمل', 'https://www.loom.com/share/bc4ddcce8e6040ea8d73f27e58839093?sharedAppSource=personal_library', 0, '2022-11-18 07:35:27', '2022-11-18 07:35:27'),
(232, 16, 1, 'Course Introduction', 'مقدمة البرنامج', 'https://www.loom.com/share/ca24b50884b549cd9b884d4ae1ea0d62?sharedAppSource=personal_library', 0, '2022-11-18 08:56:34', '2022-11-18 08:56:34'),
(233, 16, 1, 'What Does Femininty Mean to You?', 'ما معنى الأنوثة بالنسبة لك؟', 'https://www.loom.com/share/85367ecad2d541b994c47cbc88459359?sharedAppSource=personal_library', 0, '2022-11-18 08:56:34', '2022-11-18 08:56:34'),
(234, 16, 1, 'Weak Woman', 'المرأة الضعيفة', 'https://www.loom.com/share/63bf08d1a1864fa8a891edcc3568921d?sharedAppSource=personal_library', 0, '2022-11-18 08:56:34', '2022-11-18 08:56:34'),
(235, 16, 1, 'The Looks', 'المظاهر الخارجية', 'https://www.loom.com/share/ebcc3316c9a1428fbe799ea4f892d01f?sharedAppSource=personal_library', 0, '2022-11-18 08:56:34', '2022-11-18 08:56:34'),
(236, 16, 1, 'Dancing', 'الرقص', 'https://www.loom.com/share/a323c004e5514e4889181a790eaf2af8?sharedAppSource=personal_library', 0, '2022-11-18 08:56:34', '2022-11-18 08:56:34'),
(237, 16, 1, 'Mystery', 'الغموض', 'https://www.loom.com/share/df6069fbec854d4dab5cd991827c9766?sharedAppSource=personal_library', 0, '2022-11-18 08:56:34', '2022-11-18 08:56:34'),
(238, 16, 1, 'Can Feminity..', 'هل ممكن الأنوثة...', 'https://www.loom.com/share/e2f06bde49e74b9ea2681ae9420d8925?sharedAppSource=personal_library', 0, '2022-11-18 08:56:34', '2022-11-18 08:56:34'),
(239, 16, 1, 'Meaning from Society', 'ما المعنى الذي اكتسبته من المجتمع؟', 'https://www.loom.com/share/63070de2ecbc4a3d8e91c6ff4af52ce6?sharedAppSource=personal_library', 0, '2022-11-18 08:56:34', '2022-11-18 08:56:34'),
(240, 16, 1, 'Trouble-Maker', 'مصدر مشاكل', 'https://www.loom.com/share/fbefbccec8ad41c79f6d2498e1b90388?sharedAppSource=personal_library', 0, '2022-11-18 08:56:34', '2022-11-18 08:56:34'),
(241, 16, 1, 'Not Responsible', 'ما هي قد المسؤولية', 'https://www.loom.com/share/81392152774a4b01b68b87e921f42cd2?sharedAppSource=personal_library', 0, '2022-11-18 08:56:34', '2022-11-18 08:56:34'),
(242, 16, 1, 'Hate From Women', 'كره من النساء', 'https://www.loom.com/share/010ebccc18dd4574b8806accfe119bb9?sharedAppSource=personal_library', 0, '2022-11-18 08:56:34', '2022-11-18 08:56:34'),
(243, 16, 1, 'Femininty Balance', 'توازن الأنوثة', 'https://www.loom.com/share/3db862ef026f439c96bb5bc142b6bee1?sharedAppSource=personal_library', 0, '2022-11-18 08:56:34', '2022-11-18 08:56:34'),
(244, 16, 1, 'Femininty Balance 2', 'توازن الأنوثة 2', 'https://www.loom.com/share/35136d39ee5849d9be7db983538bdb44?sharedAppSource=personal_library', 0, '2022-11-18 08:56:34', '2022-11-18 08:56:34'),
(245, 16, 1, 'Enjoying the Moment', 'الاستمتاع باللحظة', 'https://www.loom.com/share/5315e86dfabe497a9db4cab98140a28c?sharedAppSource=personal_library', 0, '2022-11-18 08:56:34', '2022-11-18 08:56:34'),
(246, 16, 1, 'Your Relationship with Your Body', 'علاقتك مع جسمك', 'https://www.loom.com/share/7cc8c42928344cc49faee3face95b6ca?sharedAppSource=personal_library', 0, '2022-11-18 08:56:34', '2022-11-18 08:56:34'),
(247, 16, 1, 'Your Relationship with Your Body2', 'علاقتك مع جسمك 2', 'https://www.loom.com/share/813eaf2613b44ff5a28466d0fdeb6a30?sharedAppSource=personal_library', 0, '2022-11-18 08:56:34', '2022-11-18 08:56:34'),
(248, 16, 1, 'Your Relationship with Your Body 3', 'علاقتك مع جسمك 3', 'https://www.loom.com/share/0b7ed837446c4f3697eb6fc6f5d6736a?sharedAppSource=personal_library', 0, '2022-11-18 08:56:34', '2022-11-18 08:56:34'),
(249, 16, 1, 'Comparison', 'المقارنات', 'https://www.loom.com/share/9667a0726636429d94b749e7c38f8396?sharedAppSource=personal_library', 0, '2022-11-18 08:56:34', '2022-11-18 08:56:34'),
(250, 16, 1, 'End', 'النهاية', 'https://www.loom.com/share/ed7f8e2209114608bcd136defbffeb4d?sharedAppSource=personal_library', 0, '2022-11-18 08:56:34', '2022-11-18 08:56:34'),
(251, 16, 2, 'Course Introduction', 'مقدمة البرنامج', 'https://www.loom.com/share/076252b6d4224bdd8dc5b8dd29b61139?sharedAppSource=personal_library', 0, '2022-11-18 08:56:34', '2022-11-18 08:56:34'),
(252, 16, 2, 'Communication', 'التواصل', 'https://www.loom.com/share/6f55188c051b4fd09d75246ec8cbbde1?sharedAppSource=personal_library', 0, '2022-11-18 08:56:34', '2022-11-18 08:56:34'),
(253, 16, 2, 'Blocked Heart', 'قلبك مسكر؟', 'https://www.loom.com/share/802f0607ba2642b7966f48655350c2c2?sharedAppSource=personal_library', 0, '2022-11-18 08:56:34', '2022-11-18 08:56:34'),
(254, 16, 2, 'Elsewhere', 'في مكان آخر', 'https://www.loom.com/share/943f310974c8447eb5870a3aea644366?sharedAppSource=personal_library', 0, '2022-11-18 08:56:34', '2022-11-18 08:56:34'),
(255, 16, 2, 'Alone Time', 'وقت لنفسك', 'https://www.loom.com/share/35daaf1a19c1415ea73bc85d84987056?sharedAppSource=personal_library', 0, '2022-11-18 08:56:34', '2022-11-18 08:56:34'),
(256, 16, 2, 'Coffee', 'القهوة', 'https://www.loom.com/share/0c7d0ddef50149b2b819108b66c06223?sharedAppSource=personal_library', 0, '2022-11-18 08:56:34', '2022-11-18 08:56:34'),
(257, 16, 2, 'Yoga', 'اليوغا', 'https://www.loom.com/share/12132e33d8da4b3ebc7084097994b278?sharedAppSource=personal_library', 0, '2022-11-18 08:56:34', '2022-11-18 08:56:34'),
(258, 16, 2, 'Family', 'الأهل', 'https://www.loom.com/share/8f053b7c52f743faa7bcedd1723e3383?sharedAppSource=personal_library', 0, '2022-11-18 08:56:34', '2022-11-18 08:56:34'),
(259, 16, 2, 'Friends', 'الأصدقاء', 'https://www.loom.com/share/db2aa5cc7cf744f7a971eb915ec75095?sharedAppSource=personal_library', 0, '2022-11-18 08:56:34', '2022-11-18 08:56:34'),
(260, 16, 2, 'Sleeping', 'النوم', 'https://www.loom.com/share/4f1b5b5552684ab8b49f2f1a7dd21895?sharedAppSource=personal_library', 0, '2022-11-18 08:56:34', '2022-11-18 08:56:34'),
(261, 16, 2, 'Food', 'الأكل', 'https://www.loom.com/share/8d64f77fe4354c918bde0b669b4f86f5?sharedAppSource=personal_library', 0, '2022-11-18 08:56:34', '2022-11-18 08:56:34'),
(262, 16, 2, 'No', 'لا', 'https://www.loom.com/share/b3b5d8c84f6547359d5f796ba85b865b?sharedAppSource=personal_library', 0, '2022-11-18 08:56:34', '2022-11-18 08:56:34'),
(263, 16, 2, 'WorkBook', 'دفتر التمارين', 'https://www.loom.com/share/c548a11f133d4b148fd7ecddf099954b?sharedAppSource=personal_library', 0, '2022-11-18 08:56:34', '2022-11-18 08:56:34'),
(264, 16, 2, 'Where are You?', 'أين أنتِ؟', 'https://www.loom.com/share/6d7b31eb397b4e93b0dece65f19effda?sharedAppSource=personal_library', 0, '2022-11-18 08:56:34', '2022-11-18 08:56:34'),
(265, 16, 2, 'Femininty & Masculinity Balance', 'توازن الذكورة والأنوثة', 'https://www.loom.com/share/e4bfc62cd5f14a50814a6c58ed98e848?sharedAppSource=personal_library', 0, '2022-11-18 08:56:34', '2022-11-18 08:56:34'),
(266, 16, 2, 'Low Masculinity', 'ذكورة واطية', 'https://www.loom.com/share/cf5b55a7271346cf8c4decfff7a92865?sharedAppSource=personal_library', 0, '2022-11-18 08:56:34', '2022-11-18 08:56:34'),
(267, 16, 2, 'High Masculinity', 'ذكورة عالية', 'https://www.loom.com/share/732fd9fdb9514e8dbdd938543fdc888e?sharedAppSource=personal_library', 0, '2022-11-18 08:56:34', '2022-11-18 08:56:34'),
(268, 16, 2, 'Where are You?', 'أين أنتِ؟', 'https://www.loom.com/share/3ccbbec22db840578101d40b2e5ae87f?sharedAppSource=personal_library', 0, '2022-11-18 08:56:34', '2022-11-18 08:56:34'),
(269, 16, 2, 'Meditation', 'تأمل', 'https://www.loom.com/share/2e40f77a78da44ce8833d36f1ec4f8cb?sharedAppSource=personal_library', 0, '2022-11-18 08:56:34', '2022-11-18 08:56:34'),
(270, 17, 1, 'Course Introduction', 'مقدمة البرنامج', 'https://www.loom.com/share/4c8003e91ef44dd7ac36c55ecdaa51ad?sharedAppSource=personal_library', 0, '2022-11-18 09:14:26', '2022-11-18 09:14:26'),
(271, 17, 1, 'Are You Your Circumstances?', 'هل أنتِ ظروفك؟', 'https://www.loom.com/share/bbe20aa0d5d942cb90292f80b62be835?sharedAppSource=personal_library', 0, '2022-11-18 09:14:26', '2022-11-18 09:14:26'),
(272, 17, 1, 'Childhood', 'الطفولة', 'https://www.loom.com/share/c32f901d3a034992800c19bdc959b9ad?sharedAppSource=personal_library', 0, '2022-11-18 09:14:26', '2022-11-18 09:14:26'),
(273, 17, 1, 'I Am My Job', 'أنا وظيفتي', 'https://www.loom.com/share/8adfdb3def7c47bc8db0d3a98e2a8bec?sharedAppSource=personal_library', 0, '2022-11-18 09:14:26', '2022-11-18 09:14:26'),
(274, 17, 1, 'Are You Your Family?', 'هل أنتِ عائلتك؟', 'https://www.loom.com/share/376d17649e334c43a1178c40d1c024f2?sharedAppSource=personal_library', 0, '2022-11-18 09:14:26', '2022-11-18 09:14:26'),
(275, 17, 1, 'Limited Beliefs', 'تقييد المعتقدات', 'https://www.loom.com/share/4003ea9701b24db9a18401107f58ae54?sharedAppSource=personal_library', 0, '2022-11-18 09:14:26', '2022-11-18 09:14:26'),
(276, 17, 1, 'Beliefs About Yourself', 'معتقداتك عن نفسك', 'https://www.loom.com/share/e3ec5182620e45e0871c5069a0900162?sharedAppSource=personal_library', 0, '2022-11-18 09:14:26', '2022-11-18 09:14:26'),
(277, 17, 1, 'Your Fault', 'العيب فيك', 'https://www.loom.com/share/d1e5c49a222c4459ad72fff413119b36?sharedAppSource=personal_library', 0, '2022-11-18 09:14:26', '2022-11-18 09:14:26'),
(278, 17, 1, 'Worthiness', 'الاستحقاق', 'https://www.loom.com/share/c4d12f028a1548e180281afef64664b3?sharedAppSource=personal_library', 0, '2022-11-18 09:14:26', '2022-11-18 09:14:26'),
(279, 17, 1, 'Inability', 'العجز', 'https://www.loom.com/share/a199ac90e7fd4f858c2a681c8473aed6?sharedAppSource=personal_library', 0, '2022-11-18 09:14:26', '2022-11-18 09:14:26'),
(280, 17, 1, 'People\'s Views', 'نظرة الناس لك', 'https://www.loom.com/share/13da46aa073544af96e46091f3c8a16e?sharedAppSource=personal_library', 0, '2022-11-18 09:14:26', '2022-11-18 09:14:26'),
(281, 17, 1, 'What\'s Clear?', 'ما أصبح واضحا؟', 'https://www.loom.com/share/f1a1bb9bd89240458e43ee60f58de1a3?sharedAppSource=personal_library', 0, '2022-11-18 09:14:26', '2022-11-18 09:14:26'),
(282, 17, 2, 'Course Introduction', 'مقدمة البرنامج', 'https://www.loom.com/share/c8fc2af39d2449fc9cb00b84a9aab114?sharedAppSource=personal_library', 0, '2022-11-18 09:14:26', '2022-11-18 09:14:26');
INSERT INTO `course_links` (`id`, `course_id`, `chapter_id`, `name`, `name_arabic`, `link`, `points`, `created_at`, `updated_at`) VALUES
(283, 17, 2, 'Who Are You?', 'منو أنتِ؟', 'https://www.loom.com/share/49d4977e5d9148568687b53afc92ad15?sharedAppSource=personal_library', 0, '2022-11-18 09:14:26', '2022-11-18 09:14:26'),
(284, 17, 2, 'I AM Not..', 'أنا لست..', 'https://www.loom.com/share/ea1194e4f9064d3a8a238021b8f9ba7d?sharedAppSource=personal_library', 0, '2022-11-18 09:14:26', '2022-11-18 09:14:26'),
(285, 17, 2, 'You Reject Parts of Yourself?', 'ترفضون أجزاء من ذاتك؟', 'https://www.loom.com/share/34e0a00f6daf4794be518880a07e7c2d?sharedAppSource=personal_library', 0, '2022-11-18 09:14:26', '2022-11-18 09:14:26'),
(286, 17, 2, 'The Bright Side', 'الجانب المشرق', 'https://www.loom.com/share/fe0867f659a342e2aeeded0e4b999410?sharedAppSource=personal_library', 0, '2022-11-18 09:14:26', '2022-11-18 09:14:26'),
(287, 17, 2, 'The Dark Side', 'الجانب المظلم', 'https://www.loom.com/share/99d82ab458b44851b6c8c3eda4b9aada?sharedAppSource=personal_library', 0, '2022-11-18 09:14:26', '2022-11-18 09:14:26'),
(288, 17, 2, 'The Dark Side 2', 'الجانب المظلم 2', 'https://www.loom.com/share/a43fc3cc33c94b6ea035931cb004eb36?sharedAppSource=personal_library', 0, '2022-11-18 09:14:26', '2022-11-18 09:14:26'),
(289, 17, 2, 'Things We Don\'t Like in People', 'أطباع ما نحبها في غيرنا', 'https://www.loom.com/share/910a167111ad4beb98cb1b961f25c05d?sharedAppSource=personal_library', 0, '2022-11-18 09:14:26', '2022-11-18 09:14:26'),
(290, 17, 2, 'Are These Traits Wrong?', 'هل هذه الصفات فعلا خاطئة', 'https://www.loom.com/share/5b4ba3ac74b04fe4a64c04919278f789?sharedAppSource=personal_library', 0, '2022-11-18 09:14:26', '2022-11-18 09:14:26'),
(291, 17, 2, 'Full View', 'نظرة شاملة', 'https://www.loom.com/share/772c2bf87058413bac11c121d22ac853?sharedAppSource=personal_library', 0, '2022-11-18 09:14:26', '2022-11-18 09:14:26'),
(292, 17, 2, 'Self-Acceptance', 'تقبل الذات', 'https://www.loom.com/share/c2b4aee01a4a41758c1136cf7baab0f4?sharedAppSource=personal_library', 0, '2022-11-18 09:14:26', '2022-11-18 09:14:26'),
(293, 18, 1, 'Course Introduction', 'مقدمة البرنامج', 'https://www.loom.com/share/0236e05da6204fe4a63c4be75db171cc?sharedAppSource=personal_library', 0, '2022-11-18 09:40:44', '2022-11-18 09:40:44'),
(294, 18, 1, 'What is the Meaning of Karisma?', 'ما معنى الكاريزما؟', 'https://www.loom.com/share/cf93ead7f3374309a7fe84e66f8a2fd5?sharedAppSource=personal_library', 0, '2022-11-18 09:40:44', '2022-11-18 09:40:44'),
(295, 18, 1, 'Why is Karisma Important?', 'ما أهمية الكاريزما؟', 'https://www.loom.com/share/5914003715ff49c2bbe903dc4b8ec4a9?sharedAppSource=personal_library', 0, '2022-11-18 09:40:44', '2022-11-18 09:40:44'),
(296, 18, 1, 'Happiness', 'السعادة', 'https://www.loom.com/share/52a5217e65c5480ba2227b63aa102629?sharedAppSource=personal_library', 0, '2022-11-18 09:40:44', '2022-11-18 09:40:44'),
(297, 18, 1, 'Truth', 'الحقيقة', 'https://www.loom.com/share/3e959149b5e14601bdade98fed713c1a?sharedAppSource=personal_library', 0, '2022-11-18 09:40:44', '2022-11-18 09:40:44'),
(298, 18, 1, 'Presence', 'حضور', 'https://www.loom.com/share/697c2b54ff17481da71419465d79b86d?sharedAppSource=personal_library', 0, '2022-11-18 09:40:44', '2022-11-18 09:40:44'),
(299, 18, 1, 'Connection', 'تواصل', 'https://www.loom.com/share/0f46fd19d6b54ea8b2d95c68ab1cde64?sharedAppSource=personal_library', 0, '2022-11-18 09:40:44', '2022-11-18 09:40:44'),
(300, 18, 1, 'Warmth', 'دفئ', 'https://www.loom.com/share/ba6610158b3d423da1824df9dd8a08cb?sharedAppSource=personal_library', 0, '2022-11-18 09:40:44', '2022-11-18 09:40:44'),
(301, 18, 1, 'Eye-Contact', 'التواصل بالعين', 'https://www.loom.com/share/086a920d61c34ec7a8964f0816228692?sharedAppSource=personal_library', 0, '2022-11-18 09:40:44', '2022-11-18 09:40:44'),
(302, 18, 1, 'End', 'النهاية', 'https://www.loom.com/share/d6116e0de75b4664afdccdc8f21e54e2?sharedAppSource=personal_library', 0, '2022-11-18 09:40:44', '2022-11-18 09:40:44'),
(303, 18, 2, 'Course Introduction', 'مقدمة البرنامج', 'https://www.loom.com/share/ae74b06fd00545ba8232d1487f8f72a6?sharedAppSource=personal_library', 0, '2022-11-18 09:40:44', '2022-11-18 09:40:44'),
(304, 18, 2, 'Recap', 'مراجعة', 'https://www.loom.com/share/b623aefe4f254b0e8d38e768c1c641de?sharedAppSource=personal_library', 0, '2022-11-18 09:40:44', '2022-11-18 09:40:44'),
(305, 18, 2, 'What is Emotional Intelligence?', 'ما معنى الذكاء العاطفي', 'https://www.loom.com/share/85f11e0018c449ddbf0f8560f5307b9c?sharedAppSource=personal_library', 0, '2022-11-18 09:40:44', '2022-11-18 09:40:44'),
(306, 18, 2, 'Emotional Awareness', 'إدراك المشاعر', 'https://www.loom.com/share/da5eaecf6d2840b0ac586b7d210de7b3?sharedAppSource=personal_library', 0, '2022-11-18 09:40:44', '2022-11-18 09:40:44'),
(307, 18, 2, 'Emotional Thinking', 'التفكير بالعواطف', 'https://www.loom.com/share/55e3c7e2f1ab40108c660a62d9c15225?sharedAppSource=personal_library', 0, '2022-11-18 09:40:44', '2022-11-18 09:40:44'),
(308, 18, 2, 'Understanding Emotions', 'فهم المشاعر', 'https://www.loom.com/share/5797a9f6d15641cdaee56095309693d2?sharedAppSource=personal_library', 0, '2022-11-18 09:40:44', '2022-11-18 09:40:44'),
(309, 18, 2, 'Emotional Managing', 'إدارة العواطف', 'https://www.loom.com/share/4506871957814fdc802ae4167142b819?sharedAppSource=personal_library', 0, '2022-11-18 09:40:44', '2022-11-18 09:40:44'),
(310, 18, 2, 'Understanding Other People\'s Emotions', 'فهم مشاعر الآخرين', 'https://www.loom.com/share/2f9dbcb5903e4de8b5e8fa6031b47926?sharedAppSource=personal_library', 0, '2022-11-18 09:40:44', '2022-11-18 09:40:44'),
(311, 18, 2, 'Eye-Reading', 'التواصل بالعين', 'https://www.loom.com/share/8b7e66a6137440fd99c99e62f3f0fb92?sharedAppSource=personal_library', 0, '2022-11-18 09:40:44', '2022-11-18 09:40:44'),
(312, 18, 2, 'Empathy', 'تعاطف', 'https://www.loom.com/share/1628c0d6407e4d53ad2681577f6f7b9e?sharedAppSource=personal_library', 0, '2022-11-18 09:40:44', '2022-11-18 09:40:44'),
(313, 18, 2, 'Presence', 'حضور', 'https://www.loom.com/share/273bed5692cf4b1abe18183e47c4d59b?sharedAppSource=personal_library', 0, '2022-11-18 09:40:44', '2022-11-18 09:40:44'),
(314, 18, 2, 'Open-Heart', 'القلب المفتوح', 'https://www.loom.com/share/c3328dffe4da4ce7bb4e3cd2668b8297?sharedAppSource=personal_library', 0, '2022-11-18 09:40:44', '2022-11-18 09:40:44'),
(315, 18, 2, 'End', 'النهاية', 'https://www.loom.com/share/199f7988d0954985a0975eb0d636a195?sharedAppSource=personal_library', 0, '2022-11-18 09:40:44', '2022-11-18 09:40:44');

-- --------------------------------------------------------

--
-- Table structure for table `course_ratings`
--

CREATE TABLE `course_ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enlighting_challenges`
--

CREATE TABLE `enlighting_challenges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_arabic` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_arabic` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_days` int(11) NOT NULL,
  `skills` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_registrations`
--

CREATE TABLE `event_registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `follow_author`
--

CREATE TABLE `follow_author` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author_id` tinyint(4) NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `handpicked_for_you`
--

CREATE TABLE `handpicked_for_you` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_english` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_arabic` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_english` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_arabic` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('content','video') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'video',
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `handpicked_for_you`
--

INSERT INTO `handpicked_for_you` (`id`, `title_english`, `title_arabic`, `description_english`, `description_arabic`, `type`, `image`, `created_at`, `updated_at`) VALUES
(4, 'test', 'test', 'test', 'test', 'video', 'images/Fq4WiNHGARU8QojPixCdDbiM7TCtumHqTZ3r8xHv.jpg', '2022-11-17 11:01:02', '2022-11-17 11:01:02'),
(5, 'fbdlc.km,BNS,Z', 'MFEWN', ',NM.SV', 'G,SND.V,M', 'video', 'images/JyjYNRKbYeY1OsWsdHeL0Fj4zbUNxOzFAL7Xcjgz.jpg', '2022-11-19 06:40:08', '2022-11-19 06:40:08');

-- --------------------------------------------------------

--
-- Table structure for table `instagram_videos`
--

CREATE TABLE `instagram_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_arabic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag_arabic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_arabic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instagram_videos`
--

INSERT INTO `instagram_videos` (`id`, `name`, `name_arabic`, `tag`, `tag_arabic`, `description`, `description_arabic`, `created_at`, `updated_at`) VALUES
(5, 'Short Videos', 'فيديوهات قصيرة', 'worth-self-money-love-life-balance-work-spirit-spirituality-past-present-hurt-pain-stress-men-woman', 'استحقاق-الذات-حب الذات-حب-مال-حياة-رجل-انسجام-مرأة-عبادة-تعبد-توازن-توتر-قلق', 'مجموعة من بعض الفيديوهات  القصيرة التي تناقش مجموعة متنوعة من المواضيع.', 'A collection of coach Dalal\'s short videos discussing a wide range of topics', '2022-11-17 10:28:57', '2022-11-17 10:28:57'),
(6, 'Snap Shorts', 'فيديوهات سناب شات', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of coach Dalal\'s short  SnapChat videos discussing a wide range of topics.', 'مجموعة من بعض فيديوهات سناب شات القصيرة التي تناقش مجموعة متنوعة من المواضيع.', '2022-11-18 11:43:22', '2022-11-18 11:43:22'),
(7, 'Inspirational Videos', 'فيديوهات ملهمة', 'videos-shorts-love-life-lonliness-hurt-pain-past', 'الماضي-الجرح-الحياة-الحب-الجرح-المقارنة-الضحية', 'A collection of coach Dalal\'s short videos discussing a wide range of topics.', 'مجموعة من بعض الفيديوهات القصيرة التي تناقش مجموعة متنوعة من المواضيع.', '2022-11-18 11:52:46', '2022-11-18 11:52:46');

-- --------------------------------------------------------

--
-- Table structure for table `instagram_video_links`
--

CREATE TABLE `instagram_video_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_arabic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_video_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instagram_video_links`
--

INSERT INTO `instagram_video_links` (`id`, `name`, `name_arabic`, `link`, `instagram_video_id`, `created_at`, `updated_at`) VALUES
(19, 'Change Journey', 'رحلة التغيير', 'https://drive.google.com/file/d/19aSC5MTWdLKkIyQYLpc6t1whsBOfOYIc/view?usp=sharing', 5, '2022-11-17 10:31:17', '2022-11-17 10:31:17'),
(20, 'Revenge', 'الانتقام', 'https://drive.google.com/file/d/1K8L7OqEa0rxiH-iLVOmJOCrhKVODXPkB/view?usp=sharing', 5, '2022-11-17 10:31:17', '2022-11-17 10:31:17'),
(21, 'Revenge 2', 'الانتقام 2', 'https://drive.google.com/file/d/1WEXKcSCClLey9oecN7Unf6IZ5UGMqg9o/view?usp=sharing', 5, '2022-11-17 10:31:17', '2022-11-17 10:31:17'),
(22, 'I\'m Fine', 'أنا بخير', 'https://drive.google.com/file/d/1d5deKjh5Tf5uTF1zt_OJJC2K19P94l3z/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(23, 'Friends', 'الأصدقاء', 'https://drive.google.com/file/d/1YuJ-cQ9J9wnezbAjW3qvcYDvk-jfsxSK/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(24, 'Woman\'s Day', 'يوم المرأة العالمي', 'https://drive.google.com/file/d/1Qv5zNGtOL7lyPIAEu31zPy3veljPZpZM/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(25, 'Woman\'s Day 2', 'يوم المرأة العالمي 2', 'https://drive.google.com/file/d/1NqtoYQ2vkMBT6PMu-DSZCv9KhJDtnUyu/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(26, 'Happiness Day', 'يوم السعادة العالمي', 'https://drive.google.com/file/d/11l4a4xmCoWCqpcRM5EG81fGVlxELzHi7/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(27, 'He Adds Girls!', 'يضيف بنات!', 'https://drive.google.com/file/d/1p5bejvFv3V5y6ytGKpNE2XAr-OpGLfU3/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(28, 'Where is My Soul Mate?', 'وين توأم روحي؟', 'https://drive.google.com/file/d/17aBUCSQTSKYBpPj5IoSEI_2wrZ6iKJra/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(29, 'Where is My Soul Mate 2?', 'وين توأم روحي؟ 2', 'https://drive.google.com/file/d/1vVQxW8ERgNZxWA3l3UXwCZ0qm2-dGM7f/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(30, 'Is This Reality?', 'هل هذا واقع؟', 'https://drive.google.com/file/d/15HYkIVTOhiFYGzM2p3VPHgH83urlpBBT/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(31, 'Are You There?', 'هل أنتي موجودة؟', 'https://drive.google.com/file/d/1ZtzZmh0FEUH-so0RgCbnFw0BJhdJwX9m/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(32, 'Do I Need a Man', 'هل أحتاج الرجل؟', 'https://drive.google.com/file/d/1Uou1amPl3K1PIKIXJwqk7YDkjavReWly/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(33, 'Advices from Experts', 'نصائح العمالقة', 'https://drive.google.com/file/d/1uYob_XQ1LeIeZ9dUF202wRM417M1qxKM/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(34, 'Who Confesses First', 'منو يقول أحبك الأول', 'https://drive.google.com/file/d/1YG2GUCcM4NqWaB0BwAP2Mx60qIDVL1N7/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(35, 'Should Be', 'مفروض', 'https://drive.google.com/file/d/1Rpabhy-IDh-UdDMdPkxonouyBtNNekvc/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(36, 'Our Mood', 'مزاجنا', 'https://drive.google.com/file/d/1GTcXYjBwYLnNT5dEP1zsqgYO4UAZ309v/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(37, 'When Do We Speak?', 'متى نتكلم؟', 'https://drive.google.com/file/d/1MvbXmYeaSnHwJns-Y8W6h8BN2zlLZBmF/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(38, 'They Didn\'t Defend Me', 'ما دافعوا عني', 'https://drive.google.com/file/d/16ku-NWQFNtewuxxAGSRiQDq0ZAfrdOqY/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(39, 'He\'s Not There', 'ما أحسه معاي', 'https://drive.google.com/file/d/1xNsC_BKWphERtq6CQDLk06ggyDd862G3/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(40, 'He Doesn\'t Talk To Me', 'ليش ما يسولف معاي؟', 'https://drive.google.com/file/d/19ZfpeYOMxV6nvodt8j-3UBGjU5HMjSw-/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(41, 'Why Do I Listen', 'ليش أسمع', 'https://drive.google.com/file/d/1m1G1ezz7bG44PzQvJuV3onIFndEBMOUw/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(42, 'He Has to Understand Me', 'لازم يفهمني', 'https://drive.google.com/file/d/1AQCkjjF0ntoUY3ItOsY_IbHFowcyGc1c/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(43, 'Lost in Translation', 'فرق الترجمة', 'https://drive.google.com/file/d/1brezuc31HOmV8WJdsSXxoNqpcFB9MRun/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(44, 'Different', 'غيري', 'https://drive.google.com/file/d/17njpDYACTPV9HzdLkzfBP9iMRzB7BweF/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(45, 'Your Relationship with Your Phone', 'علاقتك مع تلفونك', 'https://drive.google.com/file/d/1acGf4fJYLBXw1N5kFldHHxBWdM50bppy/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(46, 'Living in the Past', 'عايشة بالماضي', 'https://drive.google.com/file/d/1w9AyqTMyCFyem46dmHUHDy2ZrWb_DqoK/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(47, 'The Way We Talk', 'طريقة الحوار', 'https://drive.google.com/file/d/1k9CJwzqG5otIaWzm8DDLqiNj8_l1ChRn/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(48, 'Relationship Partners', 'أطراف العلاقة', 'https://drive.google.com/file/d/1L2FMP-vDIjIVjuOiOGVsb-xKBrmvG7xP/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(49, 'What is Your Personality', 'شنو هي شخصيتج؟', 'https://drive.google.com/file/d/1UnUOA4YxXhyON8NxCmzrN7PiN4-8x-Wj/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(50, 'What is Your Relationship With Yourself?', 'شنو علاقتج مع نفسج؟', 'https://drive.google.com/file/d/1NnCPZMU3Thja5wMr8kwkphIPWdkDVxYW/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(51, 'How to Forgive Someone That Hurt Me', 'شلون أسامح شخص جرحني؟', 'https://drive.google.com/file/d/1PbX85UHeBZgaLXnwz9i5ebxUEkXJWyq5/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(52, 'How to Love Myself', 'شلون أحب نفسي', 'https://drive.google.com/file/d/1hQmV6GmuIeKzppN3ecd8kQEpGnsbh8fC/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(53, 'How to Accept My Husband\'s Flaws', 'شلون أتقبل عيوب زوجي؟', 'https://drive.google.com/file/d/1655D7H1j5O_OlCwpfWf0a2DBuTDk1EKZ/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(54, 'Angry People in Ramadan', 'الشخص المتنرفز برمضان', 'https://drive.google.com/file/d/1llYkKrkFxSC2n_QbtnFWW1BqpbfEi8WS/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(55, 'Shine Bright', 'شعي سعادة', 'https://drive.google.com/file/d/1OQ32cVLFkctzjFqBxEZNyB5u5XLPD2gA/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(56, 'My Husband Eyes Women', 'زوجي يخز', 'https://drive.google.com/file/d/1G9KTOYMz1rmPwCTUhpnhwrNGW2m7TZ8-/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(57, 'My Husband Eyes Women 2', 'زوجي يخز 2', 'https://drive.google.com/file/d/1WvtLYPe1MvUt2aieeBqROkgxnaDXJ9ld/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(58, 'My Husband Eyes Women 3', 'زوجي يخز 3', 'https://drive.google.com/file/d/1E3A3zO10hdFc0Odj-NceolCtGtw7zr73/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(59, 'My Husband Brings Me Misery', 'زوجي مصدر تعاستي', 'https://drive.google.com/file/d/1Qvp1qeMAy7ltYYcNJn8jYFbAb4JJH_Fg/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(60, 'Secret Marriage', 'زواج المسيار', 'https://drive.google.com/file/d/1cXgptzZg_mz7dPc13cx8dcgEeKo5JLY-/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(61, 'Men From Mars', 'رجال من المريخ', 'https://drive.google.com/file/d/1o2b9TxFkJkJff6ivs1GFdAJwErcSYP3G/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(62, 'One Choice', 'خيار واحد', 'https://drive.google.com/file/d/16clBNlWTVgOrAxAmDV2ZXbn74pRRmL7U/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(63, 'Recurrent Sentence', 'جملة تتكرر', 'https://drive.google.com/file/d/1K_1bLK_HPRIz0xjdlvFsLVKDqKn_6FUW/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(64, 'You Give Your All', 'تعطين كل اللي عندج', 'https://drive.google.com/file/d/1Sk3VARL6DfIuk_smcI1qIFVFZ9zwnbub/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(65, 'You Want to Get Married?', 'تبين تتزوجين؟', 'https://drive.google.com/file/d/1xsFurO1Q5rxIGdET5gMRBmuSEkaIZuUo/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(66, 'I\'ll Marry Again', 'بتزوج عليج', 'https://drive.google.com/file/d/1yLZCi8YjZyH3jBmvMpATXyf1TU9k6W-p/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(67, 'Love Types', 'أنواع الحب', 'https://drive.google.com/file/d/1pz2G97mXQxvCfEFgbLOYY6WCFPpgDTTO/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(68, 'I Am Beautiful', 'أنا جميلة', 'https://drive.google.com/file/d/1VBry1VzWTvArgB3cDeoipnwpBxTtcPwA/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(69, 'I Am What I am', 'انا جذي', 'https://drive.google.com/file/d/1gXJlSRFv3vzjK6VjIpefr0gyBNX8M98c/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(70, 'I Know It All', 'انا الشقردية', 'https://drive.google.com/file/d/1m41FmhBrJnmSSZfko5_B_g3EATFxlUxw/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(71, 'The Weekend', 'الويك إند', 'https://drive.google.com/file/d/1nGiWnJDJPeTpatPd70LZICVRiJC0u2tc/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(72, 'Perfect Time', 'الوقت المثالي', 'https://drive.google.com/file/d/1joJ9fLHW_Gyttq0CIKf73aoSBpnjz6bq/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(73, 'Loneliness', 'الوحدة', 'https://drive.google.com/file/d/152s61K9uv1BcX2E2-nMeggRWkMoqF4gR/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(74, 'Fighting', 'الهواش', 'https://drive.google.com/file/d/1xqWhJdXUXjD455eO1VDRb4Jlpror0PaY/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(75, 'Chasing', 'الملاحقة', 'https://drive.google.com/file/d/1Ip17C2NknBz3gECg6eKJm3lncuyOSfQf/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(76, 'Comparison', 'المقارنات', 'https://drive.google.com/file/d/1LZ6IKB2hTANk0Hn-hziVmyAbPDTwaoY9/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(77, 'Eid and Spendings', 'المصروف والعيد', 'https://drive.google.com/file/d/1r9L9GbHTK0dfo0M_ucuZ0iUVwjLRrtSI/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(78, 'Responsibilty', 'المسؤولية', 'https://drive.google.com/file/d/1GT3MxnU0HtBy23v4XSNBNVuX7wHLKYJ6/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(79, 'Forgiveness', 'المسامحة', 'https://drive.google.com/file/d/1kxYsH-dGFtUtlFYmkRJYPW_5f7yK8fG8/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(80, 'Women and Communication', 'المرأة والتواصل', 'https://drive.google.com/file/d/1V408Q6hLcnou-Wmu6KKE32UlqVB6Vw_6/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(81, 'Fighter 1', 'المحارب 1', 'https://drive.google.com/file/d/10ecgb3-mJHVV7XLgU0jnwWjlQUyjkO84/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(82, 'Fighter 2', 'المحارب 2', 'https://drive.google.com/file/d/1O03w06tAvFWCMSAZ7cwQwLdViB8njsmD/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(83, 'Perfection', 'المثالية', 'https://drive.google.com/file/d/1IYSm-ht1Wn3guy160IXNRfzF1JO7wcdd/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(84, 'Writing', 'الكتابة', 'https://drive.google.com/file/d/1Iq2Nce9rKusxl_W47MCW-8Vq76bNmufy/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(85, 'The Mask', 'القناع', 'https://drive.google.com/file/d/1liumjkU56ZLsZoYBtjscZ92EwTw3p1sM/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(86, 'Jealousy', 'الغيرة', 'https://drive.google.com/file/d/1E5z6UqyoW9TMjWg0_YiIGGGf34vnHwzw/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(87, 'Vacation', 'العطلة', 'https://drive.google.com/file/d/11ZewWca-pH4TaM9c0d-xT55F6P00l5oJ/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(88, 'Divorce', 'الطلاق', 'https://drive.google.com/file/d/1Fo5o6dvgp5wFG7h0Rs5GOK7L3-sLN1DF/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(89, 'Suffocating Friendships', 'الصداقة الخناقة', 'https://drive.google.com/file/d/15g6lVNBPB8sqRZod0HLKOqCWnVWv0xKQ/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(90, 'Driving in Ramadan', 'السياقة في رمضان', 'https://drive.google.com/file/d/10dYj81G6lT39NXn9_dosKCaiIOadszjP/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(91, 'Traveling', 'السفر', 'https://drive.google.com/file/d/1mEZO33b9K5bmIHqkFPdko1-aiTAOKQdL/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(92, 'Happiness', 'السعادة', 'https://drive.google.com/file/d/1x8gRgbshqAzpORDm0khSt1779-MBTmGr/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(93, 'Marriage and Technology', 'الزواج والتكنولوجيا', 'https://drive.google.com/file/d/1ormIYNv3NhkdWaBZGbRQ1Tnu82GsPVbB/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(94, 'Marriage and Technology 2', 'الرجال من المريخ 2', 'https://drive.google.com/file/d/1uz1C8a9QWLecr6g8H6K72fTUowDyXQfg/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(95, 'Cheating', 'الخيانة/', 'https://drive.google.com/file/d/142wo5OTTaGSKd8CAF4dvvzlN-pd81Rnp/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(96, 'Fear', 'الخوف', 'https://drive.google.com/file/d/1D3g3aMfz2G7VfxajMDb3eMZefSk7F01F/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(97, 'Fear 2', 'الخوف 2', 'https://drive.google.com/file/d/16XDOZA71VeZ20EvHQR6c7cX_Stabr7KS/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(98, 'High-Maintenance Step Mom', 'الخالة الصعبة', 'https://drive.google.com/file/d/1n35eDx-NEoq2DDZo2hPa-By2tMPFbYgU/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(99, 'High-Maintenance Step Mom 2', 'الخالة الصعبة 2', 'https://drive.google.com/file/d/1f7-DYPL8iMbwKr_DVQmGfpxSzOuLV7I_/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(100, 'High-Maintenance Step Mom 3', 'الخالة الصعبة 3', 'https://drive.google.com/file/d/1m0B52m_wLp8aHLQg3LOglf7ZwDVCMSNE/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(101, 'Back Talking', 'الحش', 'https://drive.google.com/file/d/19EmqHUAb9zEGkhLsgJIDAk4U2m-23qLI/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(102, 'Freedom', 'الحرية 1', 'https://drive.google.com/file/d/1gYJefQUSmmEw0DwfmF-VJK9oiM0KarW2/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(103, 'Freedom 2', 'الحرية 2', 'https://drive.google.com/file/d/1IMIkh655SsoUazcASCzqwwLWLzWv1HDM/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(104, 'Conditional Love', 'الحب المشروط', 'https://drive.google.com/file/d/16sU7v8dtlmIIPt-uLxLgybCBEsGh0tSC/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(105, 'Extremism', 'التطرف', 'https://drive.google.com/file/d/12v75ZcHvaUFZkyzhvCx819rnnTkUbx2n/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(106, 'Forgiveness', 'التسامح 1', 'https://drive.google.com/file/d/10UpZrfykm51Wb-CWKinnLkPRuZ-bwHao/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(107, 'Forgiveness 2', 'التسامح 2', 'https://drive.google.com/file/d/1hKbiCvBDYL0BNSlNwwvSyraJxz_l8C8n/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(108, 'Forgiveness 3', 'التسامح 3', 'https://drive.google.com/file/d/1GzqkKm8KBvQJHbnmzV9bxmMV9DY1AobJ/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(109, 'Femininity', 'الانوثة', 'https://drive.google.com/file/d/13Jy1DIBGsBvSfJMIMyHZHEExJZyMkgo9/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(110, 'Femininty 2', 'الأنوثة 2', 'https://drive.google.com/file/d/1DvYhVS7j4Qh_kpX7JLRnRCj__Yi-na1t/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(111, 'Emotional Abuse', 'الاضطهاد النفسي', 'https://drive.google.com/file/d/1EymOw6RfHivALK4yhNStqq93BbCdvuH5/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(112, 'Friends 2', 'الأصدقاء 2', 'https://drive.google.com/file/d/16KtBo-273hx0igJhaq3hhhIRJa_VgGwe/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(113, 'Taking Responsibilty', 'أخذ مسؤولية افعالنا', 'https://drive.google.com/file/d/1AebUwLvbjc6VihO1WlDaCryI_dT49i15/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(114, 'I Love Him More', 'أحبه أكثر مما يحبني', 'https://drive.google.com/file/d/1nJf4ELWCVTg2_BqLjJoqLKikKHplPz5w/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(115, 'Decision Making', 'اتخاذ القرار 1', 'https://drive.google.com/file/d/1h-mq_ysxq5BIPZHFb5r2UnLCzer_ZrPY/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(116, 'Decision Making 2', 'اتخاذ القرار 2', 'https://drive.google.com/file/d/1IlMTX7ZZ9aB4l5Dkk5Em0seByxLMqVea/view?usp=sharing', 5, '2022-11-18 11:42:06', '2022-11-18 11:42:06'),
(117, 'Is he Really  Divorced?', 'هل هو فعلا مطلق؟', 'https://drive.google.com/file/d/1WKudrZ7hTYWx87l8APr624i2RWvZM9Mu/view?usp=sharing', 6, '2022-11-18 11:51:34', '2022-11-18 11:51:34'),
(118, 'Do You Know yourself', 'هل إنتي تعرفين نفسج؟', 'https://drive.google.com/file/d/1lzHrTPwHggthUrs2sjvWkI-RwCRLuNMF/view?usp=sharing', 6, '2022-11-18 11:51:34', '2022-11-18 11:51:34'),
(119, 'I Have To Be Perfect', 'لازم أصير مثالية', 'https://drive.google.com/file/d/1uMKZTZQ8MCo8fbf-xEfd0yQMBKcPwc21/view?usp=sharing', 6, '2022-11-18 11:51:34', '2022-11-18 11:51:34'),
(120, 'SnapChat Relationships', 'علاقة سناب', 'https://drive.google.com/file/d/1bGT14-1Z_ibQyxqet7AwhEhsHO-aZ7yT/view?usp=sharing', 6, '2022-11-18 11:51:34', '2022-11-18 11:51:34'),
(121, 'No Compatability with Partners', 'عدم الانسجام مع الزوج', 'https://drive.google.com/file/d/1FT_FJtqU3t9wrmYovXuEYUqKrbiiOVuh/view?usp=sharing', 6, '2022-11-18 11:51:34', '2022-11-18 11:51:34'),
(122, 'Flirting Husband', 'طايحة الميانة', 'https://drive.google.com/file/d/1uIjA3U2UIrk7NhnQSBjncSFCUR_nhleZ/view?usp=sharing', 6, '2022-11-18 11:51:34', '2022-11-18 11:51:34'),
(123, 'How to Know That I have a Problem', 'شلون أعرف إني عندي مشكلة؟', 'https://drive.google.com/file/d/1AAvMCUfcZSP9IbJOYGNW2c7DcQjpqtKP/view?usp=sharing', 6, '2022-11-18 11:51:34', '2022-11-18 11:51:34'),
(124, 'My Husband Loves Another Woman', 'زوجي يحب واحدة ثانية', 'https://drive.google.com/file/d/1Dr0Q59a8U6ssv12li5GKnhf31HE63fEE/view?usp=sharing', 6, '2022-11-18 11:51:34', '2022-11-18 11:51:34'),
(125, 'My Husband Makes Me Miserable', 'زوجي سبب تعاستي', 'https://drive.google.com/file/d/1a-0vKGSncRstx8bRywRtvS9H4Vvw_Tnp/view?usp=sharing', 6, '2022-11-18 11:51:34', '2022-11-18 11:51:34'),
(126, 'I\'m not Married Yet', 'رفيجتي تزوجت وأنا لأ', 'https://drive.google.com/file/d/1xlL1ICE5XHHJwDeQddzHqQzp-fwyWAJ3/view?usp=sharing', 6, '2022-11-18 11:51:34', '2022-11-18 11:51:34'),
(127, 'Punishment', 'العقاب', 'https://drive.google.com/file/d/1xlL1ICE5XHHJwDeQddzHqQzp-fwyWAJ3/view?usp=sharing', 6, '2022-11-18 11:51:34', '2022-11-18 11:51:34'),
(128, 'Ignorant Wife', 'الزوجة البايعة', 'https://drive.google.com/file/d/1pUDZaaPbHVFifVcwe33qYhq_JQcbjBK-/view?usp=sharing', 6, '2022-11-18 11:51:34', '2022-11-18 11:51:34'),
(129, 'Unhappy Husband', 'الزوج اللي مو سعيد', 'https://drive.google.com/file/d/1L0HFtzfRTb0tD-SxzGPFO8_pK1szJ-o0/view?usp=sharing', 6, '2022-11-18 11:51:34', '2022-11-18 11:51:34'),
(130, 'Grocery Store in Ramadan', 'الجمعية برمضان', 'https://drive.google.com/file/d/1g8qW3t6lnI_3v6pt8KmUOqjD4UI0ctYD/view?usp=sharing', 6, '2022-11-18 11:51:34', '2022-11-18 11:51:34'),
(131, 'Constant Change', 'الثبات على التغيير', 'https://drive.google.com/file/d/1WbYg9D2ZCrhgjXlKNz0Ni-MR-MHcsDVZ/view?usp=sharing', 6, '2022-11-18 11:51:34', '2022-11-18 11:51:34'),
(132, 'Expectations', 'التوقعات', 'https://drive.google.com/file/d/1w22_gqW-cXo8Gal_-romEt-XmEmQe1MO/view?usp=sharing', 6, '2022-11-18 11:51:34', '2022-11-18 11:51:34'),
(133, 'Communication & Women', 'التواصل عند المرأة', 'https://drive.google.com/file/d/1atBmzH_AaTwRmqrxL_IAZbgt1NzDWnFC/view?usp=sharing', 6, '2022-11-18 11:51:34', '2022-11-18 11:51:34'),
(134, 'Forgiveness in Ramadan', 'التسامح في رمضان', 'https://drive.google.com/file/d/1pVlZKaGFK3I1yJIV3iRqDbsXFC78-vjp/view?usp=sharing', 6, '2022-11-18 11:51:34', '2022-11-18 11:51:34'),
(135, 'Destructive People', 'الأشخاص المدمرين في حياتنا', 'https://drive.google.com/file/d/1dZE0zHJTcJkRZjmQxWT8AI5QxTAb9_7n/view?usp=sharing', 6, '2022-11-18 11:51:34', '2022-11-18 11:51:34'),
(136, 'Taking Responsibilty', 'أخذ المسؤولية في حياتنا', 'https://drive.google.com/file/d/1htWRlUZM2WWB89E0KQoJCCKhhsJBq6qy/view?usp=sharing', 6, '2022-11-18 11:51:34', '2022-11-18 11:51:34'),
(137, 'Comparison', 'هوس المقارنة', 'https://drive.google.com/file/d/1eZG0JIHTDWAEoPrhjkHOielg02ErxNCi/view?usp=sharing', 7, '2022-11-18 11:55:34', '2022-11-18 11:55:34'),
(138, 'Open your Heart', 'فتحي قلبج', 'https://drive.google.com/file/d/1JOHeOiJSFnEFAzcewj27aLYMSdadfWLh/view?usp=sharing', 7, '2022-11-18 11:55:34', '2022-11-18 11:55:34'),
(139, 'Are You Living Life?', 'عايشة حياتج؟', 'https://drive.google.com/file/d/1M5h8JNEuZCpirtSYt-ynRYmdKsbHPqTm/view?usp=sharing', 7, '2022-11-18 11:55:34', '2022-11-18 11:55:34'),
(140, 'Your Ex', 'شريك حياتك السابق', 'https://drive.google.com/file/d/1wJc_NIQmQgZ8EVORleT3ELfW4EmVJBGz/view?usp=sharing', 7, '2022-11-18 11:55:34', '2022-11-18 11:55:34'),
(141, 'Playing Victim', 'دور الضحية', 'https://drive.google.com/file/d/1Iw6H0I3r-XmkEqHYO2uVxsbeXt7162Of/view?usp=sharing', 7, '2022-11-18 11:55:34', '2022-11-18 11:55:34'),
(142, 'Loneliness', 'الوحدة', 'https://drive.google.com/file/d/1M7cPyudW8rN3K5fUo_qK5iNGBKwv0Yzj/view?usp=sharing', 7, '2022-11-18 11:55:34', '2022-11-18 11:55:34'),
(143, 'Love', 'الحب', 'https://drive.google.com/file/d/11CRbD8EZlybvMIze7EQK49zSv-Yp6gTJ/view?usp=sharing', 7, '2022-11-18 11:55:34', '2022-11-18 11:55:34'),
(144, 'Hurt', 'الجرح', 'https://drive.google.com/file/d/11Kcc2SVOYFN_NpGopQEZHgAI15Dw9uyp/view?usp=sharing', 7, '2022-11-18 11:55:34', '2022-11-18 11:55:34');

-- --------------------------------------------------------

--
-- Table structure for table `live_video`
--

CREATE TABLE `live_video` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_arabic` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_english` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_arabic` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_english` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_arabic` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `live_videos`
--

CREATE TABLE `live_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_english` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_arabic` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_english` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_arabic` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_english` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_arabic` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `chapter_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `live_videos`
--

INSERT INTO `live_videos` (`id`, `name_english`, `name_arabic`, `tag_english`, `tag_arabic`, `description_english`, `description_arabic`, `link`, `chapter_id`, `created_at`, `updated_at`) VALUES
(6, 'Make it Clear', 'حطي النقاط على الحروف', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', 'https://drive.google.com/file/d/1zZjmdq_WK5ROQovyqA6LmeaNiNvJWHYz/view?usp=sharing', 'https://drive.google.com/file/d/1zZjmdq_WK5ROQovyqA6LmeaNiNvJWHYz/view?usp=sharing', 1, '2022-11-17 09:24:02', '2022-11-17 09:24:02'),
(9, 'Discover Fear and Take Responsibilty', 'كشفي الخوف وأخذي مسؤولية حياتك', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/16IWjy8isli_qNUEGuVdS1j-itaZxZH2S/view?usp=sharing', 1, '2022-11-18 09:47:32', '2022-11-18 09:47:32'),
(10, 'This Year\'s Different', 'هالسنة غير', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1vF9uHq69gnlguFneypbNELyoM8c1-CRA/view?usp=sharing', 1, '2022-11-18 09:48:53', '2022-11-18 09:48:53'),
(11, 'The Shock of Change', 'صدمة التغيير', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1c6q2arC5K5AnFpqFLK866vVs2sROsw_x/view?usp=sharing', 1, '2022-11-18 09:56:33', '2022-11-18 09:56:33'),
(12, 'Time to Let go', 'حان وقت رحيلهم', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1bWOh12kf21h5LUm0yOsuAMGgSdD38xrH/view?usp=sharing', 1, '2022-11-18 09:57:38', '2022-11-18 09:57:38'),
(13, 'Break Hesitation Today', 'كسري التردد اليوم', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/104XHbHkuUiK-NStergG5lBqMz3dV2uJp/view?usp=sharing', 1, '2022-11-18 09:58:24', '2022-11-18 09:58:24'),
(14, 'Break Fear Today', 'كسري الخوف اليوم', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1WI4676slvp8uj2mWp6-I9rJgUeWGOCEX/view?usp=sharing', 1, '2022-11-18 09:59:25', '2022-11-18 09:59:25'),
(15, 'First Step in Taking Decisions', 'الخطوة الأولى لاتخاذ القرار', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/175NrEEhGyfa9cfZINQrafghUtNqpid4L/view?usp=sharing', 1, '2022-11-18 10:00:14', '2022-11-18 10:00:14'),
(16, 'Decisions and Self-Love', 'القرارات وحب الذات', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1rXKoUCySoj4yLNvFI-38twvIi182Zyrj/view?usp=sharing', 1, '2022-11-18 10:00:59', '2022-11-18 10:00:59'),
(17, 'See the Truth', 'شوفي الحقيقة', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1pMwD1QMVKfQOwzHXnOTAnVfjxuceUMTO/view?usp=sharing', 1, '2022-11-18 10:01:38', '2022-11-18 10:01:38'),
(18, 'Don\'t Go Away', 'لا تبعد عني', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1jg80FwvbPODCLGLznzqlkHdu-q2P7bJD/view?usp=sharing', 1, '2022-11-18 10:02:18', '2022-11-18 10:02:18'),
(19, 'Friends and Reflections', 'الأصدقاء والانعكاس', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1BH_29gjEikwP6Zb6E-geFTVlF6gcRLJn/view?usp=sharing', 1, '2022-11-18 10:05:43', '2022-11-18 10:05:43'),
(20, 'Attachement and Lies', 'التعلق والكذبات', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1etoSULOTa33rROKcZuizbGJELYqw6wMZ/view?usp=sharing', 1, '2022-11-18 10:06:22', '2022-11-18 10:06:22'),
(21, 'Know', 'اعرف', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1o3AHa_32fDFFNAhmgndA3KrmQt_9QMf7/view?usp=sharing', 1, '2022-11-18 10:07:15', '2022-11-18 10:07:15'),
(22, 'I Do My Part', 'أسوي اللي علي بالكامل', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1JV_DFsnhwVvGBR6GplMEeyXEFHjm3ExS/view?usp=sharing', 1, '2022-11-18 10:08:24', '2022-11-18 10:08:24'),
(23, 'Wrong Beliefs', 'المعتقدات الخاطئة', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1cyoH7hedNFsX3KC_roVKgmaPmABMJFho/view?usp=sharing', 1, '2022-11-18 10:09:48', '2022-11-18 10:09:48'),
(24, 'Breaking Attachements and Living the Moment', 'فك التعلق والعيش في اللحظة', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1miF25GltenmSoGdoOf6lZR1sjQpRzZLJ/view?usp=sharing', 1, '2022-11-18 10:11:48', '2022-11-18 10:11:48'),
(25, 'Making Peace', 'التصالح', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1QSt0KSujCwFE1jAqTM6keg69lTHZA0rh/view?usp=sharing', 1, '2022-11-18 10:12:26', '2022-11-18 10:12:26'),
(26, 'Narcissistic Husband', 'الزوج النرجسي', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1MkY5G2g37ENLWWMWUb6yzaaVhgSm2geG/view?usp=sharing', 1, '2022-11-18 10:13:06', '2022-11-18 10:13:06'),
(27, 'Dealing with Toxic Behaviours', 'كيف نتعامل مع الاطباع السامة', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1XRcbTN2ypHBpy6SoQswb8cJYwA5lKeZP/view?usp=sharing', 1, '2022-11-18 10:13:44', '2022-11-18 10:13:44'),
(28, 'How to Hold the Remote in a Toxic Relationship', 'كيف نمسك الريموت في العلاقة السامة', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1fFjfHsfU6ZrvAFn5FRLyDWgiY79taK2X/view?usp=sharing', 1, '2022-11-18 10:14:37', '2022-11-18 10:14:37'),
(29, 'Toxic Relationships', 'العلاقات السامة', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1Ev8xmxPBTr7gnb_ERV5JKIk8k5WZ0yiR/view?usp=sharing', 1, '2022-11-18 10:15:53', '2022-11-18 10:15:53'),
(30, 'Dealing  With Two-Faced People', 'التعامل مع الإنسان ذو الوجهين', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1m3SHY53cUqEREuK_08vYldpPrNXz1g23/view?usp=sharing', 1, '2022-11-18 10:16:41', '2022-11-18 10:16:41'),
(31, 'What Do I Want', 'ماذا أريد؟', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1NiSKADVPWYfzxHcI3Q_icChdP8Z7J24N/view?usp=sharing', 1, '2022-11-18 10:17:24', '2022-11-18 10:17:24'),
(32, 'Dealing with Relationships and Childhood', 'التعامل مع العلاقات والطفولة', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/11LxlALnLTxzLGnLWz1tDNlBWD0eF7vYx/view?usp=sharing', 1, '2022-11-18 10:18:03', '2022-11-18 10:18:03'),
(33, 'Childhood and Goals', 'الطفولة والأهداف', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1K6GGBJt0rokSZb3K42byK7iMXD8YWWTv/view?usp=sharing', 1, '2022-11-18 10:19:05', '2022-11-18 10:19:05'),
(34, 'How to Choose the Right Guy', 'كيف نختار الرجل الصح', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1xh3AhjOyXz4IDHowVMxghDkTvbQ1cAR-/view?usp=sharing', 1, '2022-11-18 10:19:43', '2022-11-18 10:19:43'),
(35, '3 Truths About Love', '3 حقائق عن الحب', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1FMKynWwwiIoSLsAYllq4yUtmpEpFt2XI/view?usp=sharing', 1, '2022-11-18 10:20:22', '2022-11-18 10:20:22'),
(36, '3 كذبات عن الحب', '3 Lies About Love', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1NCFcwOjDTr8R33gKASfGj6SfiK9Euqm9/view?usp=sharing', 1, '2022-11-18 10:21:18', '2022-11-18 10:21:18'),
(37, 'Where is the Remote?', 'وين الريموت؟', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1j7fNh7QeBJx1rU-vqk2ZrPal3xnMOK-d/view?usp=sharing', 1, '2022-11-18 10:30:26', '2022-11-18 10:30:26'),
(38, 'Boosting Achievements', 'تعزيز الإنجازات', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1gdGyPeemz11u73pQL4XmQSjfYLDW1Db9/view?usp=sharing', 1, '2022-11-18 10:31:00', '2022-11-18 10:31:00'),
(39, 'Beneficial Thoughts', 'الأفكار اللي تخدم', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1gIKucPZ_SvYKRiDGvk6otVV7nLGdeoTX/view?usp=sharing', 1, '2022-11-18 10:31:38', '2022-11-18 10:31:38'),
(40, 'Anger, Friends, and Self Love', 'الغضب والأصدقاء وحب الذات', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1kWxC24zBUBISHr7Vvd-hwVAWmH-2JnvQ/view?usp=sharing', 1, '2022-11-18 10:32:17', '2022-11-18 10:32:17'),
(41, 'Self-Love', 'حب الذات', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1NWMTi3_bLX1gapNOBNLuVAceCls4uunl/view?usp=sharing', 1, '2022-11-18 10:33:07', '2022-11-18 10:33:07'),
(42, 'New Beginning', 'بداية جديدة', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1D3Gz_cKBvniQKdWKJuErWRul9cI4G1WK/view?usp=sharing', 1, '2022-11-18 10:33:53', '2022-11-18 10:33:53'),
(43, 'How to Start Anew?', 'كيف نبدي بداية جديدة؟', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1DiB1kFdfdYCXX_V3PA4oZeUDEctM_hte/view?usp=sharing', 1, '2022-11-18 10:34:46', '2022-11-18 10:34:46'),
(44, 'Separation', 'الانفصال', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1nMRtSK_iSsh6170mJpyspJMlI0FpbFQR/view?usp=sharing', 1, '2022-11-18 10:35:25', '2022-11-18 10:35:25'),
(45, 'Goals and Accepting Reality', 'الأهداف وتقبل الواقع', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1JGs3eklPEAZqoyUqzMi70OSwrThipDkm/view?usp=sharing', 1, '2022-11-18 10:36:08', '2022-11-18 10:36:08'),
(46, 'Confrontation and Reliance', 'المواجهة والتوكل', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1OxPM7trHZNzKWNI0cdwwKjasu25Xx9R8/view?usp=sharing', 1, '2022-11-18 10:36:47', '2022-11-18 10:36:47'),
(47, 'How Do I Reach My Goal?', 'كيف أوصل لهدفي؟', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1CAcRMFrjFw71LfAOcuuSJsINDaYvABny/view?usp=sharing', 1, '2022-11-18 10:37:44', '2022-11-18 10:37:44'),
(48, 'What is Reality?', 'ما هو الواقع؟', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1kk-vqQ0mHP4u3qbwHfXeGlh61w7-8YLz/view?usp=sharing', 1, '2022-11-18 10:38:20', '2022-11-18 10:38:20'),
(49, 'How to Change?', 'كيف أتغير؟', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1AFytCttekVFgOh_siYG3hnUKfXwjLdtX/view?usp=sharing', 1, '2022-11-18 10:39:09', '2022-11-18 10:39:09'),
(50, 'How To Forgive?', 'كيف أسامح؟', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/18d5fsI6YYoq9Os58ncZb8VSiFcA6ZcLu/view?usp=sharing', 1, '2022-11-18 10:40:41', '2022-11-18 10:40:41'),
(51, 'I Don\'t Want People to Affect Me', 'ما أبي أتأثر من الناس', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1x7zj-gvqQhmZ56Nl9LMlCvs8k2EM9y7b/view?usp=sharing', 1, '2022-11-18 10:41:45', '2022-11-18 10:41:45'),
(52, 'Allow Fun to Enter Your Life', 'اسمحي للوناسة تدش حياتك', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/10Sw2AvHFwo_W4N_bUpsFbm04Juw9v1q3/view?usp=sharing', 1, '2022-11-18 10:42:28', '2022-11-18 10:42:28'),
(53, 'I Need Someone to Compensate Me', '\"أحتاج أحد يعوضني\"', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1sZUSpatciQYLblhEphSeMQlqBY53z9eB/view?usp=sharing', 1, '2022-11-18 10:44:45', '2022-11-18 10:44:45'),
(54, 'Second Marriage', 'الزواج الثاني', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1C5ITWMfQfAo_HmfAmTIcfzVLnf8vcyC4/view?usp=sharing', 1, '2022-11-18 10:45:30', '2022-11-18 10:45:30'),
(55, 'Dealing with People and Holding the Remote', 'التعامل مع الناس ومسك الريموت', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1oCDPQhf-I3Nar9vjCDJ19F7yICJ5jeAA/view?usp=sharing', 1, '2022-11-18 10:48:53', '2022-11-18 10:48:53'),
(56, 'The Stories We Tell', 'القصص اللي نقصها', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1YsAvlKFw0i0Kb4BftBvmEWEXGIN6I6Iu/view?usp=sharing', 1, '2022-11-18 10:51:28', '2022-11-18 10:51:28'),
(57, 'Questions and Answers', 'أسئلة وأجوبة', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of all the live video sessions discussing a wide range of topics by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1e5ofwpbuVjD2zYhLAy72zORpj_FicFVZ/view?usp=sharing', 1, '2022-11-18 10:52:06', '2022-11-18 10:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `live_video_chapter`
--

CREATE TABLE `live_video_chapter` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chapter_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `live_video_chapter`
--

INSERT INTO `live_video_chapter` (`id`, `chapter_name`, `created_at`, `updated_at`) VALUES
(1, 'chapter one', NULL, NULL),
(2, 'chapter two', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login_securities`
--

CREATE TABLE `login_securities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `google2fa_enable` tinyint(1) NOT NULL DEFAULT 0,
  `google2fa_secret` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_19_054241_create_permission_tables', 1),
(5, '2021_06_21_083551_create_moduals_table', 1),
(6, '2021_06_22_094023_create_settings_table', 1),
(7, '2021_07_02_154516_create_login_securities_table', 1),
(8, '2022_05_23_172500_create_plants_table', 1),
(9, '2015_08_04_130507_create_article_tag_table', 2),
(10, '2015_08_04_131626_create_tags_table', 2),
(11, '2022_10_18_121442_create_pages_table', 2),
(12, '2022_10_18_132745_create_courses_table', 2),
(14, '2022_10_19_071724_create_live_video_chapter_table', 2),
(16, '2022_10_21_063856_create_instagram_videos_table', 2),
(17, '2022_10_21_063913_create_instagram_video_links_table', 2),
(20, '2022_10_25_071326_create_tv_shows_table', 2),
(21, '2022_10_25_071411_create_tv_show_channels_table', 2),
(22, '2022_10_25_071711_create_tv_show_names_table', 2),
(23, '2022_10_25_072018_create_tv_show_links_table', 2),
(26, '2022_10_27_171216_create_tv_interviews_table', 2),
(27, '2022_10_27_171335_create_tv_interview_channels_table', 2),
(28, '2022_10_27_171427_create_tv_interview_shows_table', 2),
(29, '2022_10_27_171454_create_tv_interview_topics_table', 2),
(30, '2022_10_28_110918_create_purchases_table', 2),
(31, '2022_10_28_110940_create_purchase_details_table', 2),
(32, '2022_10_28_131656_create_events_table', 2),
(33, '2022_10_28_132039_create_event_registrations_table', 2),
(34, '2022_10_29_054332_create_moods_table', 2),
(35, '2022_10_29_054424_create_mood_categories_table', 2),
(36, '2022_10_29_054437_create_mood_sub_categories_table', 2),
(37, '2022_10_29_054515_create_user_moods_table', 2),
(38, '2022_10_29_111230_create_about_table', 2),
(39, '2022_10_31_065413_create_wishlists_table', 2),
(40, '2022_11_01_115500_create_articles_table', 2),
(41, '2022_11_01_125124_create_follow_author_table', 2),
(42, '2022_11_02_063946_create_quotes_table', 2),
(43, '2022_11_02_071155_create_course_chapters_table', 2),
(45, '2022_11_07_063552_create_ratings_table', 2),
(46, '2022_11_08_105424_create_carts_table', 2),
(51, '2022_10_19_071636_create_live_videos_table', 4),
(52, '2022_10_19_072153_create_live_video_table', 5),
(56, '2022_10_21_111002_create_testimonial_videos_table', 6),
(57, '2022_10_21_111156_create_testimonial_video_type_table', 6),
(58, '2022_10_25_115517_create_podcasts_table', 7),
(59, '2022_11_12_134049_create_tv_interview_table', 8),
(60, '2022_11_12_180838_create_tv_show_table', 9),
(61, '2022_11_02_071314_create_course_links_table', 10),
(62, '2022_11_07_063552_create_course_ratings_table', 10),
(63, '2022_11_11_055816_create_enlighting_challenges_table', 11),
(64, '2022_11_11_062723_create_challenge_skills_table', 11),
(65, '2022_11_11_063414_create_challenge_videos_table', 11),
(66, '2022_11_11_064124_create_challenge_achievements_table', 11),
(67, '2022_11_11_064135_create_user_challenges_table', 11),
(68, '2022_11_11_072847_create_user_challenge_informations_table', 11),
(69, '2022_11_15_155947_create_handpicked_for_you_table', 11),
(70, '2022_11_16_113658_create_challenge_table', 12),
(71, '2022_11_16_175544_create_challenges_link_table', 13),
(72, '2022_11_14_093745_create_collections_table', 14),
(73, '2022_11_14_124614_create_user_live_videos_table', 14),
(74, '2022_11_15_125409_create_user_courses', 14),
(75, '2022_11_15_125420_create_user_course_links', 14);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `moduals`
--

CREATE TABLE `moduals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `moduals`
--

INSERT INTO `moduals` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'user', '2022-11-08 00:25:24', '2022-11-08 00:25:24'),
(2, 'role', '2022-11-08 00:25:24', '2022-11-08 00:25:24'),
(3, 'module', '2022-11-08 00:25:24', '2022-11-08 00:25:24'),
(4, 'setting', '2022-11-08 00:25:24', '2022-11-08 00:25:24'),
(5, 'crud', '2022-11-08 00:25:24', '2022-11-08 00:25:24'),
(6, 'langauge', '2022-11-08 00:25:24', '2022-11-08 00:25:24'),
(7, 'permission', '2022-11-08 00:25:24', '2022-11-08 00:25:24'),
(8, 'Course Video', '2022-11-15 09:04:32', '2022-11-15 09:04:32'),
(9, 'Challenge', '2022-11-19 06:10:41', '2022-11-19 06:10:41');

-- --------------------------------------------------------

--
-- Table structure for table `moods`
--

CREATE TABLE `moods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mood_categories`
--

CREATE TABLE `mood_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mood_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mood_sub_categories`
--

CREATE TABLE `mood_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mood_id` bigint(20) UNSIGNED NOT NULL,
  `mood_category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$UhU9YTKxnYcDN2ccTGZeouePUDA9NX/gxm4jbMTPCRtMIdZgga1dW', '2022-11-09 11:39:53');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'web',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'manage-permission', 'web', '2022-11-08 00:25:23', '2022-11-08 00:25:23'),
(2, 'create-permission', 'web', '2022-11-08 00:25:23', '2022-11-08 00:25:23'),
(3, 'edit-permission', 'web', '2022-11-08 00:25:23', '2022-11-08 00:25:23'),
(4, 'delete-permission', 'web', '2022-11-08 00:25:23', '2022-11-08 00:25:23'),
(5, 'manage-role', 'web', '2022-11-08 00:25:23', '2022-11-08 00:25:23'),
(6, 'create-role', 'web', '2022-11-08 00:25:23', '2022-11-08 00:25:23'),
(7, 'edit-role', 'web', '2022-11-08 00:25:23', '2022-11-08 00:25:23'),
(8, 'delete-role', 'web', '2022-11-08 00:25:23', '2022-11-08 00:25:23'),
(9, 'show-role', 'web', '2022-11-08 00:25:23', '2022-11-08 00:25:23'),
(10, 'manage-user', 'web', '2022-11-08 00:25:23', '2022-11-08 00:25:23'),
(11, 'create-user', 'web', '2022-11-08 00:25:23', '2022-11-08 00:25:23'),
(12, 'edit-user', 'web', '2022-11-08 00:25:23', '2022-11-08 00:25:23'),
(13, 'delete-user', 'web', '2022-11-08 00:25:23', '2022-11-08 00:25:23'),
(14, 'show-user', 'web', '2022-11-08 00:25:23', '2022-11-08 00:25:23'),
(15, 'manage-module', 'web', '2022-11-08 00:25:23', '2022-11-08 00:25:23'),
(16, 'create-module', 'web', '2022-11-08 00:25:23', '2022-11-08 00:25:23'),
(17, 'delete-module', 'web', '2022-11-08 00:25:23', '2022-11-08 00:25:23'),
(18, 'show-module', 'web', '2022-11-08 00:25:23', '2022-11-08 00:25:23'),
(19, 'edit-module', 'web', '2022-11-08 00:25:23', '2022-11-08 00:25:23'),
(20, 'manage-setting', 'web', '2022-11-08 00:25:23', '2022-11-08 00:25:23'),
(21, 'manage-crud', 'web', '2022-11-08 00:25:23', '2022-11-08 00:25:23'),
(22, 'manage-langauge', 'web', '2022-11-08 00:25:23', '2022-11-08 00:25:23'),
(23, 'create-langauge', 'web', '2022-11-08 00:25:23', '2022-11-08 00:25:23'),
(24, 'delete-langauge', 'web', '2022-11-08 00:25:23', '2022-11-08 00:25:23'),
(25, 'show-langauge', 'web', '2022-11-08 00:25:23', '2022-11-08 00:25:23'),
(26, 'edit-langauge', 'web', '2022-11-08 00:25:23', '2022-11-08 00:25:23'),
(27, 'manage-Course Video', 'web', NULL, NULL),
(28, 'create-Course Video', 'web', NULL, NULL),
(29, 'delete-Course Video', 'web', NULL, NULL),
(30, 'show-Course Video', 'web', NULL, NULL),
(31, 'edit-Course Video', 'web', NULL, NULL),
(32, 'manage-Challenge', 'web', NULL, NULL),
(33, 'create-Challenge', 'web', NULL, NULL),
(34, 'delete-Challenge', 'web', NULL, NULL),
(35, 'show-Challenge', 'web', NULL, NULL),
(36, 'edit-Challenge', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `plants`
--

CREATE TABLE `plants` (
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `podcasts`
--

CREATE TABLE `podcasts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teaser_english` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teaser_arabic` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_english` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_arabic` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_english` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_arabic` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `podcasts`
--

INSERT INTO `podcasts` (`id`, `teaser_english`, `teaser_arabic`, `description_english`, `description_arabic`, `tag_english`, `tag_arabic`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Love Yourself', 'أحبي نفسك', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach', './يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1OZflDavdKQESYFv5B6u6qGvPH6Ni_0pv/view?usp=sharing', '2022-11-12 06:50:36', '2022-11-12 06:50:36'),
(2, 'Be Grateful', 'كوني ممتنة وراضية', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/19wC6b-GDpuJXMeaE2TIFTlDWew8jhpdS/view?usp=sharing', '2022-11-18 11:57:25', '2022-11-18 11:57:25'),
(3, 'Wake Up', 'اصحي يا نايمة', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1e5xOlb0HnWkH3EFd6OqWfzffWM4OSGO6/view?usp=sharing', '2022-11-18 11:59:02', '2022-11-18 11:59:02'),
(4, 'The 5 Big Lies', 'خمسة كذبات تدمرك', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1K29009er3fAQxsvmvkDIVwDiznRZQ4qY/view?usp=sharing', '2022-11-18 12:00:17', '2022-11-18 12:00:17'),
(5, 'Change Your Life', 'غيري حياتك للأفضل', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1jWGyoHjEecbgksoHvL6DWPEOapC53gDr/view?usp=sharing', '2022-11-18 12:01:46', '2022-11-18 12:01:46'),
(6, 'Listen to Your Feelings', 'سمعي أحاسيسك', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1lbajvw1qo4qptzMCTElep4Ij2cX4yqh5/view?usp=sharing', '2022-11-18 12:02:34', '2022-11-18 12:02:34'),
(7, 'Control Your Life', 'تحكمي بحياتك', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1-3nK1YsCrA3FhfFSClVGzUF59kXq_Tqp/view?usp=sharing', '2022-11-18 12:03:26', '2022-11-18 12:03:26'),
(8, 'Beauty Isn\'t Enough', 'جمالك مو كفاية', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/124CQCAqOquKXoRUMX92VZTchKcnIxXqx/view?usp=sharing', '2022-11-18 12:03:58', '2022-11-18 12:03:58'),
(9, 'Married Men', 'تحبين واحد متزوج', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1iBNwT76tckGVL6248OXjapltNDXKGzs0/view?usp=sharing', '2022-11-18 12:04:33', '2022-11-18 12:04:33'),
(10, 'Move On', 'ما راح يرد', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1g1_zZ_o2tZt1deW1b7feR2SGHuK_bMv3/view?usp=sharing', '2022-11-18 12:05:04', '2022-11-18 12:05:04'),
(11, 'Forgive Them', 'سامحيهم', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1FDHUTkhogmgY0BT7EFn8jOIeAQytwo0U/view?usp=sharing', '2022-11-18 12:05:45', '2022-11-18 12:05:45'),
(12, 'Your Relationship With Your Mother', 'علاقتك مع أمك', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1DGqmILmpRUs6IyZ98FrO6keuX0_ZUFnP/view?usp=sharing', '2022-11-18 12:06:20', '2022-11-18 12:06:20'),
(13, 'Depression', 'اكتشفي الاكتئاب', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1TTy36IxORcVyZU4Oq5Tg-YYL3gxiZp3w/view?usp=sharing', '2022-11-18 12:06:55', '2022-11-18 12:06:55'),
(14, 'Travel Mates', 'العلاقات في السفر', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1462rwKj71HVaH00maibzPPRRVyaAMLP0/view?usp=sharing', '2022-11-18 12:07:32', '2022-11-18 12:07:32'),
(15, 'Get Ready for Ramadan', 'استعدي لشهر رمضان', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1NJSNsSyekxymFPsfnQ6USWIZZX3P2t2h/view?usp=sharing', '2022-11-18 12:08:01', '2022-11-18 12:08:01'),
(16, 'Your Life Perspective', 'نظرتك لحياتك', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1IAY2Qu5Unf3UjdbzRL9y0XleZXOOlYVW/view?usp=sharing', '2022-11-18 12:08:57', '2022-11-18 12:08:57'),
(17, 'Loneliness', 'الوحدة', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1R_zL82rk0JFJo0QZqVs2R-Er0F0kR5T_/view?usp=sharing', '2022-11-18 12:09:32', '2022-11-18 12:09:32'),
(18, 'What Are You Waiting For?', 'شنو ناطرة', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1kOSXt122NguQLNDbQp9__qMcmFgjX4pL/view?usp=sharing', '2022-11-18 12:10:40', '2022-11-18 12:10:40'),
(19, 'Emotional Abuse', 'الاضطهاد العاطفي', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1sY6Lr1tc1mFbb8Z_7sh9BCNMBAk_rOXH/view?usp=sharing', '2022-11-18 12:11:22', '2022-11-18 12:11:22'),
(20, 'Pain & Time', 'الجرح والوقت', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1QpZWp3LOKdPmyEGM_kp1fQLLyKYUIc67/view?usp=sharing', '2022-11-18 12:12:12', '2022-11-18 12:12:12'),
(21, 'Why the Silence', 'ليش ساكتة', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/16MJ-wPDPQN6y0b2WZqacouev0-0z6Ext/view?usp=sharing', '2022-11-18 12:13:02', '2022-11-18 12:13:02'),
(22, 'Sacrifice', 'التضحية وأنواعها', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1SiXadAEzbeThyRBTJOCdrcD4x6FpKWJM/view?usp=sharing', '2022-11-18 12:13:32', '2022-11-18 12:13:32'),
(23, 'Who Are You?', 'منو إنت؟', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1Ob0FoqnBx2t0UtL8jt9n-rfLYeWh-k7F/view?usp=sharing', '2022-11-18 12:14:08', '2022-11-18 12:14:08'),
(24, 'Friendship & Happiness', 'الصداقة والسعادة', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1Kn0Z-rMNXvY_DpOdUrMx0exEJBYmaKNy/view?usp=sharing', '2022-11-18 12:14:51', '2022-11-18 12:14:51'),
(25, 'Perfectionism', 'المثالية وحياتك', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1EnTZW1z-JguXjjagydJdVghROhKdjcI7/view?usp=sharing', '2022-11-18 12:15:33', '2022-11-18 12:15:33'),
(26, 'Regret', 'الندم', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1-jDHsfghvvS6MjWMih3R9PudylVyQHZX/view?usp=sharing', '2022-11-18 12:16:08', '2022-11-18 12:16:08'),
(27, 'Closing Doors', 'تسكر الباب', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1asQLS72kN3EWTF_QKcbbvgyMPkBws2nx/view?usp=sharing', '2022-11-18 12:16:44', '2022-11-18 12:16:44'),
(28, 'Change Like a Butterfly', 'الفراشة والتغيير', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1Sxc9RRhxk543Qunh2v67ruCXUQ2ybrp6/view?usp=sharing', '2022-11-18 12:17:17', '2022-11-18 12:17:17'),
(29, 'Your Boundaries', 'اكتشفي حدودك', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1m8QcpyCismgh6rbg-o_IKLNxhNeQt4YQ/view?usp=sharing', '2022-11-18 12:17:56', '2022-11-18 12:17:56'),
(30, 'You & Drugs', 'حسي في طعم الحياة', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/13v8i-5K_obMF7eEUTJIhbRQqJdJofcqA/view?usp=sharing', '2022-11-18 12:18:31', '2022-11-18 12:18:31'),
(31, 'You & Wars', 'أنت والحرب', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/136l-Ac-VhNrlykic1OxijyFrH8ZHG96c/view?usp=sharing', '2022-11-18 12:19:07', '2022-11-18 12:19:07'),
(32, 'Careless Mothers', 'الأم واللامبالاة', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1FlK2weGdWwRvuNEd1IKujmjIl4kQPM5E/view?usp=sharing', '2022-11-18 12:19:44', '2022-11-18 12:19:44'),
(33, 'Happiness', 'تبين السعادة', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1xVVD1FEb_46BjyyWmn8AoK9Nn6svT7RY/view?usp=sharing', '2022-11-18 12:20:18', '2022-11-18 12:20:18'),
(34, 'You Vs. Your Phone', 'علاقتك وموبايلك', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/13P_IcbWwi3HGNx3aPiBoM-9uFM4aGxWF/view?usp=sharing', '2022-11-18 12:20:58', '2022-11-18 12:20:58'),
(35, 'Scarcity', 'من الدوامة إلى الوفرة', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/14J0yhtr4TVwddmiJVp68fRadMz76JB0z/view?usp=sharing', '2022-11-18 12:21:40', '2022-11-18 12:21:40'),
(36, 'Your Stories', 'القصص اللي تقصينها', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1tGYvNlBHmqyhifVsQ_BDaYxNc76GoH_M/view?usp=sharing', '2022-11-18 12:23:33', '2022-11-18 12:23:33'),
(37, 'Your Time is Important', 'وقتك مهم', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/19j3nMYCcv_upvUpE4rLVVGqrUOV8-gyp/view?usp=sharing', '2022-11-18 12:24:07', '2022-11-18 12:24:07'),
(38, 'Rejection', 'الرفض', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1foy63StpXUmylSc-KWYctbBJGVnt5yoW/view?usp=sharing', '2022-11-18 12:24:42', '2022-11-18 12:24:42'),
(39, 'Masks', 'الأقنعة', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/19xgxR2lUDd7XGeREmd60a2QnImYT66qv/view?usp=sharing', '2022-11-18 12:25:17', '2022-11-18 12:25:17'),
(40, 'Hesitation', 'التردد', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/14LnqtkAWcawquN8scxwvcwnonCkVE6Xq/view?usp=sharing', '2022-11-18 12:26:07', '2022-11-18 12:26:07'),
(41, 'Giving Up', 'الاستسلام', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1T9bzWHhdVv0N9E548bd6A678bV7hk4rl/view?usp=sharing', '2022-11-18 12:26:41', '2022-11-18 12:26:41'),
(42, 'Comparing to Others', 'المقارنة مع الغير', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1jQvdXpPvb2wyWuS3F60EIh1r0lVwZwzZ/view?usp=sharing', '2022-11-18 12:27:12', '2022-11-18 12:27:12'),
(43, 'Confidence', 'الثقة بالنفس', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1T1l8sbYEYYZM63MsJHcgJzQSLIrXe2oB/view?usp=sharing', '2022-11-18 12:27:43', '2022-11-18 12:27:43'),
(44, 'Childhood & Beliefs', 'الطفولة والمعتقدات', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1goLcR3ocv3leAaJO15gWwe6m1xL2uQnU/view?usp=sharing', '2022-11-18 12:28:21', '2022-11-18 12:28:21'),
(45, 'Break It', 'كسريه', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1vEy4tDvIwmRTN7_hi1QqusuxNrrxuqPi/view?usp=sharing', '2022-11-18 12:29:11', '2022-11-18 12:29:11'),
(46, 'First Love', 'الحب الأول', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1oRzf0zmh25qH4ZQniZDe0KCk6CUOd6YY/view?usp=sharing', '2022-11-18 12:29:57', '2022-11-18 12:29:57'),
(47, 'The Five Love Languages', 'لغات الحب الخمس', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1aBT_g_IuX0QwNB83_l_MtBLks6GPgHKV/view?usp=sharing', '2022-11-18 12:30:27', '2022-11-18 12:30:27'),
(48, 'Selfishness', 'الأنانية', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/11YlvgSWArZW7MStx9qU28AfoLSoO2zJl/view?usp=sharing', '2022-11-18 12:31:07', '2022-11-18 12:31:07'),
(49, 'Happiness Hormone', 'هرمون السعادة', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1fnaHkreVQLZTb3Taiw98M3BkX4X96tF5/view?usp=sharing', '2022-11-18 12:31:44', '2022-11-18 12:31:44'),
(50, 'The Jealous Sister', 'الأخت الغيورة', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1JecU_wS72yzSsVvZNpwGJ_pJ1s26t8ZD/view?usp=sharing', '2022-11-18 12:32:17', '2022-11-18 12:32:17'),
(51, 'Meditation', 'التأمل', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/18p5dB8G9CxdVCQKLevqMdVy7zkXUpSP5/view?usp=sharing', '2022-11-18 12:33:07', '2022-11-18 12:33:07'),
(52, '5 Lies About Your Partner', 'خمس كذبات لشريك الحياة', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1TGaOk33cYEYXlgQI2Gy2pKH_xiCUHVnI/view?usp=sharing', '2022-11-18 12:33:41', '2022-11-18 12:33:41'),
(53, 'Change Your Day', 'غيري يومك', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1Ix5Npwtn-HKnxXvlG7ItwBX39XK3mdn0/view?usp=sharing', '2022-11-18 12:34:21', '2022-11-18 12:34:21'),
(54, 'You Deserve Love', 'تستحقين الحب', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1j-ppYTg1YK3QPzmuIFBYxU8Tr0lU4xl7/view?usp=sharing', '2022-11-18 12:36:17', '2022-11-18 12:36:17');
INSERT INTO `podcasts` (`id`, `teaser_english`, `teaser_arabic`, `description_english`, `description_arabic`, `tag_english`, `tag_arabic`, `link`, `created_at`, `updated_at`) VALUES
(55, 'Relationships Detox', 'ديتوكس العلاقات', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1BrOjXD3iMu_Lehwl0xyn3EhMUtgoYmnb/view?usp=sharing', '2022-11-18 12:36:46', '2022-11-18 12:36:46'),
(56, 'Declutter Your Life', 'رتبي حياتك', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1TIqaq-H5kS_mAP5aq3io0d3nPQw-cgZg/view?usp=sharing', '2022-11-18 12:37:20', '2022-11-18 12:37:20'),
(57, 'Abundance', 'إلى الوفرة', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/10WIF4eTfSdeZT8by6A6bcqrs2fakLXXu/view?usp=sharing', '2022-11-18 12:37:54', '2022-11-18 12:37:54'),
(58, 'Kindness', 'الطيبة', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1IvitPDa92ZoXU6Gi_oTdNIPWQplFNVYx/view?usp=sharing', '2022-11-18 12:38:30', '2022-11-18 12:38:30'),
(59, '5 Lies About Divorce', 'خمس كذبات عن المطلقة', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1Ys2TZdgjKp7dX8N65f3bIxYuzENSVQW1/view?usp=sharing', '2022-11-18 12:39:17', '2022-11-18 12:39:17'),
(60, 'Summer', 'الصيف', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1Q3rGep0od8g0DVAASQOawtbFGCMOBZcW/view?usp=sharing', '2022-11-18 12:39:47', '2022-11-18 12:39:47'),
(61, 'Hormones', 'هرمونات', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1vNwBowXyK-vVOq-iFYaaocGP3PtwWaKn/view?usp=sharing', '2022-11-18 12:40:24', '2022-11-18 12:40:24'),
(62, 'Eid', 'العيد', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1R9KK9cLbV0e_IF5kU4CQ-2RmdGA6uYHm/view?usp=sharing', '2022-11-18 12:40:54', '2022-11-18 12:40:54'),
(63, 'Bullying', 'التنمر', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1MUcc21SjLpYIi2HFqjn-uMKyElogoN62/view?usp=sharing', '2022-11-18 12:41:34', '2022-11-18 12:41:34'),
(64, 'Open Your Heart', 'فتحي قلبج', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1yqPyVN73iG-OoGB39Mgb7FvGoYkDlers/view?usp=sharing', '2022-11-18 12:42:19', '2022-11-18 12:42:19'),
(65, 'Sexual Harassment', 'التحرش الجنسي', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1a0Rl0tnqZYitiIPSrT0Nd7WEu7Yu973_/view?usp=sharing', '2022-11-18 12:42:53', '2022-11-18 12:42:53'),
(66, 'You Are Special', 'أنت مميزة', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/16gDIak4WKEdTXhkDrvj5XDTG-IsB2RRY/view?usp=sharing', '2022-11-18 12:43:29', '2022-11-18 12:43:29'),
(67, 'Escaping Reality', 'الهروب من الواقع', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1AlezObcApMdI3A3ec1wATpGzu4TTKI8e/view?usp=sharing', '2022-11-18 12:44:10', '2022-11-18 12:44:10'),
(68, 'Greetings Drama', 'دراما السلام', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1-_0DuSy7yQiTrbzqdeAj4CuDAd55kQQ1/view?usp=sharing', '2022-11-18 12:44:43', '2022-11-18 12:44:43'),
(69, 'Freedom', 'الحرية', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1nTe_e4uLse6YtRISwe2NQomWVSZzgpuv/view?usp=sharing', '2022-11-18 12:45:18', '2022-11-18 12:45:18'),
(70, 'Being Harsh on Kids', 'شد الأطفال', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1-CO6tXY_Hh6T-xiDDaEJgIU4xGjRniPi/view?usp=sharing', '2022-11-18 12:45:50', '2022-11-18 12:45:50'),
(71, 'Self-Blame', 'شكثر تلومين نفسج؟', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1eb7nE99BWOC3GRQ9DR5GLL8yBlODuHiC/view?usp=sharing', '2022-11-18 12:46:18', '2022-11-18 12:46:18'),
(72, 'Choice Correctly', 'اختاري صح', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/15u8fVOUGw3gVv7QhGPW-VQIyjyWK8MnT/view?usp=sharing', '2022-11-18 12:46:48', '2022-11-18 12:46:48'),
(73, 'Play Time', 'وقت اللعب', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1lnLFPbgjRRbd0ljm3YqtiJ2uyKd9zDAt/view?usp=sharing', '2022-11-18 12:47:17', '2022-11-18 12:47:17'),
(74, 'Hygiene is Important', 'النظافة مهمة', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/12DtxP2nysM5u9TAVRXrn8ZuxGN1gwth8/view?usp=sharing', '2022-11-18 12:47:42', '2022-11-18 12:47:42'),
(75, 'You & Food', 'أنت والأكل', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1aHdthKgFcL8WxZJCQ29p65dsPCJBZtjL/view?usp=sharing', '2022-11-18 12:48:19', '2022-11-18 12:48:19'),
(76, 'You Sure Know?', 'أكيد تعرفين؟', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1DUJwvAcd_1EjIzhCkG-5ghT_ZxLq7Ip4/view?usp=sharing', '2022-11-18 12:48:55', '2022-11-18 12:48:55'),
(77, 'Future', 'المستقبل', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1IE4F4mxPkNjVaUJrr_8b9rypXPqXGZ29/view?usp=sharing', '2022-11-18 12:51:32', '2022-11-18 12:51:32'),
(78, 'Gratitude', 'الحمد', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1-eMj18MxWS3B3nIx_UkUwmsnlV-S6IQn/view?usp=sharing', '2022-11-18 12:52:26', '2022-11-18 12:52:26'),
(79, 'Self-Development', 'تطوير الذات', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/14OiPxoIIEw-Uxwu9BVhyFnEbm9dqsFqm/view?usp=sharing', '2022-11-18 12:54:42', '2022-11-18 12:54:42'),
(80, 'Focus on Your Life', 'ركزي في حياتك', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1zCyx-8yR0-l9ObosqXw9c1VxaWiP-O-z/view?usp=sharing', '2022-11-18 12:56:39', '2022-11-18 12:56:39'),
(81, 'The Meaning of Love', 'معنى الحب', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1cBJU1FHNqlResKlHpsAYCnnqJ8UoVHy0/view?usp=sharing', '2022-11-18 12:57:10', '2022-11-18 12:57:10'),
(82, 'Listen', 'سمعي', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1Pra0ZMYVoksp36fVFtKrb87m6G5-4xHT/view?usp=sharing', '2022-11-18 12:57:48', '2022-11-18 12:57:48'),
(83, 'Promises', 'الوعود', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1gaXL8tujsbkxHsVohpb_ZD3eizMR2CLm/view?usp=sharing', '2022-11-18 12:59:09', '2022-11-18 12:59:09'),
(84, 'The Friend\'s Advice', 'نصيحة الصديقة', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1JCB6S3nPLjArL7iwSgw7j4OuDYBI-dK4/view?usp=sharing', '2022-11-18 12:59:37', '2022-11-18 12:59:37'),
(85, 'Stalking', 'المراقبة', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1fPuSrEtzZ0UHKpM2008ssG64lv2-7PPs/view?usp=sharing', '2022-11-18 13:00:07', '2022-11-18 13:00:07'),
(86, 'Friendship', 'الصداقة', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1Cb0PH7m2oZpPRrYZxQlMhB-kh44c0hK3/view?usp=sharing', '2022-11-18 13:00:48', '2022-11-18 13:00:48'),
(87, 'Proud to be a Woman', 'فخورة بكوني امرأة', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/189V6t3IoLwJZpWNEoII5T0TNuam0wa3r/view?usp=sharing', '2022-11-18 13:01:24', '2022-11-18 13:01:24'),
(88, 'You Really Cannot?', 'صج ما تقدرين؟', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1gzH3qBtoENSLV8kaqwciO43mdHahiIxs/view?usp=sharing', '2022-11-18 13:02:00', '2022-11-18 13:02:00'),
(89, 'Mother\'s Day', 'عيد الأم', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1zQMWLtQQH4kdkvOIj9hDbY7JomdA56gX/view?usp=sharing', '2022-11-18 13:02:26', '2022-11-18 13:02:26'),
(90, 'Find Harmony', 'انسجمي مع نفسك', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1Lt2-Nd8sCAJeOUGQ7Skn9I9dmjCT28MV/view?usp=sharing', '2022-11-18 13:02:54', '2022-11-18 13:02:54'),
(91, 'You & Money', 'أنت والفلوس', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1HR1L_Rd75OQRK2XD5scb9x6q4t7nuxR6/view?usp=sharing', '2022-11-18 13:03:37', '2022-11-18 13:03:37'),
(92, 'Slow Down', 'بطئي حياتك', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/19Z9fjXVouxpqm1adAqWwLNxxthUOLMqO/view?usp=sharing', '2022-11-18 13:04:06', '2022-11-18 13:04:06'),
(93, 'You Want to Get Married - 1', 'تبين تتزوجين؟ (الجزء الأول)', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1vOSH5hd0SMo1YRFhOP76UCnMcTW6Ei6J/view?usp=sharing', '2022-11-18 13:04:38', '2022-11-18 13:04:38'),
(94, 'You Want to Get Married - 2', 'تبين تتزوجين؟ (الجزء الثاني)', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1me1BRNvVf5eDjVmMxu6MS0r76EPzxRbl/view?usp=sharing', '2022-11-18 13:05:06', '2022-11-18 13:05:06'),
(95, 'Enjoy Your Summer', 'صيفي بسعادة', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1II1hZVpaYMwwmwfwc7d8GWSBpoDY6_Qo/view?usp=sharing', '2022-11-18 13:05:39', '2022-11-18 13:05:39'),
(96, 'Judgement', 'الحكم على الآخرين', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/14lIYxWmvUL_5uKHZV7dFv5IQv7nCvbnR/view?usp=sharing', '2022-11-18 13:06:14', '2022-11-18 13:06:14'),
(97, 'How to Love Yourself?', 'شلون تحبين نفسج؟', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/15zeFa4MTvkeO6AAvRc-oPXglh_nlZIe3/view?usp=sharing', '2022-11-18 13:06:45', '2022-11-18 13:06:45'),
(98, 'Friendship & Sharing', 'الصديقة والمشاركة', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1FfH6FPUkyT7NLD6qLRfujgsc4eHhQ4zI/view?usp=sharing', '2022-11-18 13:10:55', '2022-11-18 13:10:55'),
(99, 'Diagnosis', 'التشخيص', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1cVU1oT4jidNUrLkJGfVEw_cfrN4ghXlK/view?usp=sharing', '2022-11-18 13:11:37', '2022-11-18 13:11:37'),
(100, 'Secrets You Cannot Hide', 'أسرار ماتنخش', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/13GuT2C2A-dWE5vDNrGQxYpm2WS-iBlqg/view?usp=sharing', '2022-11-18 13:12:17', '2022-11-18 13:12:17'),
(101, 'I\'m Like Her', 'أسرار ماتنخش', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/13GuT2C2A-dWE5vDNrGQxYpm2WS-iBlqg/view?usp=sharing', '2022-11-18 16:54:10', '2022-11-18 16:54:10'),
(102, 'I\'m Like Her', 'أنا مثل فلانة', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1j0Q4geC3B-VdT60Gs2ZBjKybYPo7n8UN/view?usp=sharing', '2022-11-18 16:55:00', '2022-11-18 16:55:00'),
(103, 'Outbursts of Anger', 'النزره', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1PS5wgChEjt2bNZXJ2Dmri4EFOgAjEcZ5/view?usp=sharing', '2022-11-18 16:55:31', '2022-11-18 16:55:31'),
(104, 'You Are Not Their Mom', 'أنت مو أمهم', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/14OJFsvM2cZkTPi7ZDB0kROChcDwialeX/view?usp=sharing', '2022-11-18 16:56:12', '2022-11-18 16:56:12'),
(105, 'Take Responsibilty', 'اخذي المسئولية', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1U5KCraGh_YVB6GVXJ0nd_e6oV9p520x_/view?usp=sharing', '2022-11-18 16:56:39', '2022-11-18 16:56:39'),
(106, 'Say No', 'قولي لا', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1TujAuhkxqllkSomnNqB2bYW2uKKTU_Gv/view?usp=sharing', '2022-11-18 16:57:36', '2022-11-18 16:57:36'),
(107, 'Back From Vacation', 'الردة من السفر', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1acBHPQqQJfnl0piw8QzIpE0F6Ig7KkWS/view?usp=sharing', '2022-11-18 16:58:03', '2022-11-18 16:58:03'),
(108, 'Your Financial Life - 1', 'شخصيتك المالية (الجزء الأول)', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1ntLzHSl_fMNS_SPBX8rqcy1ZtYDiJpD2/view?usp=sharing', '2022-11-18 17:00:32', '2022-11-18 17:00:32');
INSERT INTO `podcasts` (`id`, `teaser_english`, `teaser_arabic`, `description_english`, `description_arabic`, `tag_english`, `tag_arabic`, `link`, `created_at`, `updated_at`) VALUES
(109, 'Your Financial Life - 2', 'شخصيتك المالية (الجزء الثاني)', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1MeY7_3RIBOSsBThl4rvP8N0SjxpUqWgp/view?usp=sharing', '2022-11-18 17:01:04', '2022-11-18 17:01:04'),
(110, 'Your Financial Life - 3', 'شخصيتك المالية (الجزء الثالث)', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1Y_0FBO-Du0kfA_us9BKRHwXEoRedRf0V/view?usp=sharing', '2022-11-18 17:01:35', '2022-11-18 17:01:35'),
(111, 'Gratefulness & Relationships', 'الإمتنان والعلاقات', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1p6MIwpS0U8XwGPIcl8THQikzp0PNdcTE/view?usp=sharing', '2022-11-18 17:02:02', '2022-11-18 17:02:02'),
(112, 'Perception of Others', 'منظورك لغيرك', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1C3dxC7DJYH0nNtq8OUXdNZBzTLFh1y3l/view?usp=sharing', '2022-11-18 17:02:31', '2022-11-18 17:02:31'),
(113, 'Fight Correctly', 'تهاوشي صح', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1-3EHnt3JhlE0tS3W9HZGL_ae-jYJ2vCe/view?usp=sharing', '2022-11-18 17:02:59', '2022-11-18 17:02:59'),
(114, 'Renew Your Energy', 'جددي نشاطك', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1xM8gRR713Eayy23T5YqfpVI9GZp5ECXc/view?usp=sharing', '2022-11-18 17:03:32', '2022-11-18 17:03:32'),
(115, 'Others\'Judgement', 'حكم الآخرين', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1qfg5QMYOPF_yUu_E-tXXKjYNh0JUwxQr/view?usp=sharing', '2022-11-18 17:03:58', '2022-11-18 17:03:58'),
(116, 'Did They Misunderstand?', 'فاهمينج غلط؟', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1l0mvLq_EdM7IkStiQ6kAciqT9yKLnBZA/view?usp=sharing', '2022-11-18 17:04:28', '2022-11-18 17:04:28'),
(117, 'Live Your Life', 'عيشي حياتج', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1YQ7XzVn8673D2qrnKxis_DwYkS5WkdTV/view?usp=sharing', '2022-11-18 17:04:55', '2022-11-18 17:04:55'),
(118, 'I Will Try', 'بحاول', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/17GDv5vOjk7Idgljzo_svxHoVkrYEvQZu/view?usp=sharing', '2022-11-18 17:05:18', '2022-11-18 17:05:18'),
(119, 'Time to Let Go', 'حان وقت رحيلهم', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1Z25Whf2Hqo-lIL9isihsR120lxPgIUTx/view?usp=sharing', '2022-11-18 17:05:48', '2022-11-18 17:05:48'),
(120, 'A Step Forward', 'خطوة إلى الأمام', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1RuKwz7FiRq-quqnucT3PzERdlZskc-0k/view?usp=sharing', '2022-11-18 17:06:15', '2022-11-18 17:06:15'),
(121, 'Blaming Others', 'لوم الآخرين', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1hzbUdK8xX9v0nCF_2wHZN1rRT_GhQbii/view?usp=sharing', '2022-11-18 17:06:56', '2022-11-18 17:06:56'),
(122, 'Failure', 'الفشل', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1jtl3xr4tVoeAMXQZdAiFM0Y810xNrXWd/view?usp=sharing', '2022-11-18 17:07:20', '2022-11-18 17:07:20'),
(123, 'Delaying', 'حقائق التأجيل', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1GzWG1oD-CKGhlB4D5tUsSOe17M0xPViY/view?usp=sharing', '2022-11-18 17:07:51', '2022-11-18 17:07:51'),
(124, 'Is This Love?', 'هذا حب؟', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1bsNakRqe3zgr66Ee1z0ZYtdRoTc2sumF/view?usp=sharing', '2022-11-18 17:08:26', '2022-11-18 17:08:26'),
(125, 'Nothing', 'ولا شيء', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1KZv1VONu2pLO_9Ud2nF12BOmH82oZm-h/view?usp=sharing', '2022-11-18 17:08:52', '2022-11-18 17:08:52'),
(126, 'Get Out of Prison', 'طلعي من السجن', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1DfepAby0brk4VbTctwdHL08SyBoVbIkt/view?usp=sharing', '2022-11-18 17:09:16', '2022-11-18 17:09:16'),
(127, 'Stressed?', 'متوترة؟', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1LGObUGiFYCxCyB06hPHYw2JUD92ZJsoX/view?usp=sharing', '2022-11-18 17:09:36', '2022-11-18 17:09:36'),
(128, 'Work and Worship', 'عمل وعبادة', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1tpDnooSfQGyj0_Yl8GapKKu5_MszwSwr/view?usp=sharing', '2022-11-18 17:10:19', '2022-11-18 17:10:19'),
(129, 'The Meaning of strength', 'معنى القوة', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/19Lssjtw6tIn--Bh7wKBcqYQDbLy9Kocf/view?usp=sharing', '2022-11-18 17:11:17', '2022-11-18 17:11:17'),
(130, 'Feeling Safe', 'إحساس بالأمان', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1wanBKwC-Cx-30bKgz1v3ftq-LUqnAc99/view?usp=sharing', '2022-11-18 17:11:49', '2022-11-18 17:11:49'),
(131, 'Perfection & Covid', 'المثالية والكورونا', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1h3s3_bPhZtv5KnGZPZ3TGh8WRqmEsYuA/view?usp=sharing', '2022-11-18 17:12:16', '2022-11-18 17:12:16'),
(132, 'Stay in Touch', 'ابقي متواصلة', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1EtcVWzagUS7YgLRocMxWyuuykidKRsdW/view?usp=sharing', '2022-11-18 17:12:57', '2022-11-18 17:12:57'),
(133, 'Different Ramadan', 'رمضان هالمرة غير', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1A8iSUbC2U2l3K3psNb8fvtKlMrmy5qmN/view?usp=sharing', '2022-11-18 17:13:30', '2022-11-18 17:13:30'),
(134, 'What Do You Eat', 'عدلي الأكل', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1UJTeh_T2mnXma-zXt5suaDjNSvbDYbxN/view?usp=sharing', '2022-11-18 17:13:57', '2022-11-18 17:13:57'),
(135, 'Doubt', 'الشك', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1MBlQnRy6OUDkHuIBPkDEo8leT-iRWW07/view?usp=sharing', '2022-11-18 17:14:23', '2022-11-18 17:14:23'),
(136, 'Life After the Lockdown', 'الحياة ما بعد الحظر', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1zZgfQ_X9unMuiWDppo95YNwNUGrtzCa1/view?usp=sharing', '2022-11-18 17:14:46', '2022-11-18 17:14:46'),
(137, 'Traits Don Not Change', 'يزول الجبل ولا يزول الطبع', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1u2VJ9vsjW06kETMwgNBdfW0HYIXviDPu/view?usp=sharing', '2022-11-18 17:15:11', '2022-11-18 17:15:11'),
(138, '3 Lies About Self-Love', 'ثلاثة كذبات عن حب الذات', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1QBmsCvWMxSDiUPms6V8VX8r9i0EcCoTR/view?usp=sharing', '2022-11-18 17:15:37', '2022-11-18 17:15:37'),
(139, 'We\'re Not Over Yet', 'ترى ما خلصنا', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1h1nKvU5EtEXdeuIejoGc5m5-NYOH0CQu/view?usp=sharing', '2022-11-18 17:16:04', '2022-11-18 17:16:04'),
(140, 'You\'re Attached to Her?', 'متعلقة فيها؟', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1PHITwq0rMMcjuxKVme_ia11Jh6aVcZVH/view?usp=sharing', '2022-11-18 17:16:36', '2022-11-18 17:16:36'),
(141, 'Do Not Reject It', 'لا ترفضينها', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/14_xc_nv0r43Bkp8S34_ouTmw32Wg3cV0/view?usp=sharing', '2022-11-18 17:17:02', '2022-11-18 17:17:02'),
(142, 'Judging the Book by its Cover', 'الكتاب باين من عنوانه', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/15khH8iEeENl3csdCR60YrqMJpnfwu2Qr/view?usp=sharing', '2022-11-18 17:17:34', '2022-11-18 17:17:34'),
(143, 'Let Me Join', 'شاركوني معاكم', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1BJVeycm_TJThQi0HhqcGWZ09QZQQ4wiE/view?usp=sharing', '2022-11-18 17:18:00', '2022-11-18 17:18:00'),
(144, 'Why are You Not Married?', 'ليش ما تزوجتي؟', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1kWWh8Qqx2pIvvNwmF54YbKxZy1FZu-zi/view?usp=sharing', '2022-11-18 17:18:27', '2022-11-18 17:18:27'),
(145, 'No More Goals', 'لا للأهداف', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/14oGIKRXK3FK2I4pBsLXzc-zsIfeXzjtc/view?usp=sharing', '2022-11-18 17:18:58', '2022-11-18 17:18:58'),
(146, 'The Basics', 'طبقتي الأساسيات؟', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/12pSeYHCVXsi7Xy1RQQ5IQ8XNZjskn6RO/view?usp=sharing', '2022-11-18 17:19:47', '2022-11-18 17:19:47'),
(147, 'Forgive the Most Important Person', 'سامحي أهم واحدة', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/10P-XuZalEAayqqcc90_WewX0N3VryDxx/view?usp=sharing', '2022-11-18 17:20:22', '2022-11-18 17:20:22'),
(148, 'WhatsApp Group Etiquette', 'إتيكيت جروب الواتساب', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1TqZQ1yyvnQtpSbchZtgEDwv10FVQaG6a/view?usp=sharing', '2022-11-18 17:20:47', '2022-11-18 17:20:47'),
(149, 'Divorced Men', 'تفكرين تاخذين واحد مطلق؟', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1Mb4cy5eZbEwHBeQUwLWJxz-G1RGhkz3x/view?usp=sharing', '2022-11-18 17:21:16', '2022-11-18 17:21:16'),
(150, 'Your Life is Bigger', 'حياتج أوسع', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1iLEidS7fF-lzoH5vaocXQ-U-UbzanCDS/view?usp=sharing', '2022-11-18 17:21:57', '2022-11-18 17:21:57'),
(151, 'Stop Saying No', 'بسنا لأ', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1yq97k80DefdazzBib7KT4Sz8fzfQvkNx/view?usp=sharing', '2022-11-18 17:23:30', '2022-11-18 17:23:30'),
(152, 'What Enters?', 'شنو اللي يدخل؟', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1vnDl8y3l8SxWXOhijUJQ3iW-B-hSX8pw/view?usp=sharing', '2022-11-18 17:24:00', '2022-11-18 17:24:00'),
(153, 'Practice Gratitude Correctly', 'مارسي الامتنان صح', 'Insijam Podcast is about helping people to improve or fix their relationship with their partner, family, friend or themselves, it is delivered by Dalal Al-Janaie - certified relationship coach.', 'يدور بودكاست انسجام حول مساعدة الناس على تحسين أو إصلاح علاقتهم مع شركائهم أو أسرتهم أو أصدقائهم أو أنفسهم ، ويتم تقديمه من قبل الأستاذة دلال الجناعي - مدربة علاقات معتمدة.', 'Anger, self love, femininity, coach, hope, selfishness, fear, energy, optimism, love yourself, happiness, contentment, self, love, change, unity, marriage, training, my love, awareness, focus, distrac', 'زعل,حب النفس,حبي نفسج,أنوثة,مدرب,أمل,أنانية,نفسج,خوف,طاقة,تفاؤل,حبي نفسك,سعادة,القناعي,الذات,حب,تغيير,وحدة,زواج,تدريب,حبي,الوعي,التركيز,التشتت,الواقع,المشاعر', 'https://drive.google.com/file/d/1b8NII5GzFEWrDn0k7JFYGmqm7cTTznOO/view?usp=sharing', '2022-11-18 17:24:34', '2022-11-18 17:24:34');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_courses` int(11) NOT NULL,
  `price` decimal(5,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_details`
--

CREATE TABLE `purchase_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'web',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2022-11-08 00:25:23', '2022-11-08 00:25:23'),
(2, 'user', 'web', '2022-11-08 00:25:23', '2022-11-08 00:25:23'),
(3, 'Test', 'web', '2022-11-08 23:50:21', '2022-11-08 23:50:21');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(5, 3),
(6, 1),
(6, 3),
(7, 1),
(8, 1),
(8, 3),
(9, 1),
(9, 3),
(10, 1),
(10, 3),
(11, 1),
(11, 3),
(12, 1),
(12, 3),
(13, 1),
(13, 3),
(14, 1),
(14, 3),
(15, 1),
(15, 3),
(16, 1),
(16, 3),
(17, 1),
(17, 3),
(18, 1),
(18, 3),
(19, 1),
(19, 3),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'app_name', 'Laravel', 1, NULL, NULL),
(2, 'dark_logo', 'C:\\xampp\\tmp\\phpA4F4.tmp', 1, NULL, NULL),
(3, 'authentication', 'deactivate', 1, '2022-11-11 07:21:54', '2022-11-11 07:21:54'),
(4, 'timezone', 'Asia/Kolkata', 1, '2022-11-11 07:21:54', '2022-11-11 07:21:54'),
(5, 'site_date_format', 'd-m-Y', 1, '2022-11-11 07:21:54', '2022-11-11 07:21:54'),
(6, 'default_language', 'en', 1, '2022-11-11 07:21:54', '2022-11-11 07:21:54'),
(7, 'dark_mode', '', 1, '2022-11-11 07:21:54', '2022-11-11 07:21:54'),
(8, 'color', '', 1, '2022-11-11 07:21:54', '2022-11-11 07:21:54'),
(12, 'x', '312', 1, NULL, NULL),
(13, 'y', '295', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonial_videos`
--

CREATE TABLE `testimonial_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_arabic` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_arabic` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testimonial_video_type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonial_videos`
--

INSERT INTO `testimonial_videos` (`id`, `name`, `name_arabic`, `description`, `link`, `designation`, `description_arabic`, `testimonial_video_type_id`, `created_at`, `updated_at`) VALUES
(4, 'Audio Testimonials', 'شهادات صوتية', 'A collection of audio testimonials from previous Insijam clients, talking about their experience with Insijam and how it changed and affected their lives.', 'https://drive.google.com/file/d/1NkjHb7fCSClT2PjMQGWfVPvcSyWwiOMV/view?usp=sharing', 'test', 'A collection of audio testimonials from previous Insijam clients, talking about their experience with Insijam and how it changed and affected their lives.', 1, '2022-11-17 10:33:36', '2022-11-17 10:33:36'),
(5, 'Audio Testimonials', 'شهادات صوتية', 'A collection of audio testimonials from previous Insijam clients, talking about their experience with Insijam and how it changed and affected their lives.', 'https://drive.google.com/file/d/1EaTke_KnnQDjXuag56-CPe-IrICJBUJB/view?usp=sharing', '', '', 1, '2022-11-18 17:27:56', '2022-11-18 17:27:56'),
(6, 'Audio Testimonials', 'شهادات صوتية', 'A collection of audio testimonials from previous Insijam clients, talking about their experience with Insijam and how it changed and affected their lives.', 'https://drive.google.com/file/d/1GVeT93r9DsLGhfWGkef5CG-GZQPF2r9E/view?usp=sharing', '', '', 1, '2022-11-18 17:28:51', '2022-11-18 17:28:51'),
(7, 'Audio Testimonials', 'شهادات صوتية', 'A collection of audio testimonials from previous Insijam clients, talking about their experience with Insijam and how it changed and affected their lives.', 'https://drive.google.com/file/d/1IK3HWAJegkSQIYawC3apuxFy-ENrwrx-/view?usp=sharing', '', '', 1, '2022-11-18 17:29:43', '2022-11-18 17:29:43'),
(8, 'Audio Testimonials', 'شهادات صوتية', 'A collection of audio testimonials from previous Insijam clients, talking about their experience with Insijam and how it changed and affected their lives.', 'https://drive.google.com/file/d/1gA3zf2LTHbpL8YMp9NzGTAMZ3frluA74/view?usp=sharing', '', '', 1, '2022-11-18 17:30:09', '2022-11-18 17:30:09'),
(9, 'Audio Testimonials', 'شهادات صوتية', 'A collection of audio testimonials from previous Insijam clients, talking about their experience with Insijam and how it changed and affected their lives.', 'https://drive.google.com/file/d/1bJq1iG_-gGmHicM_WSNWNflXLCxwPx1T/view?usp=sharing', '', '', 1, '2022-11-18 17:30:29', '2022-11-18 17:30:29'),
(10, 'Audio Testimonials', 'شهادات صوتية', 'A collection of audio testimonials from previous Insijam clients, talking about their experience with Insijam and how it changed and affected their lives.', 'https://drive.google.com/file/d/1PmA95O0lMFe64TqM7TPdDSMXRZ5I3Cej/view?usp=sharing', '', '', 1, '2022-11-18 17:30:51', '2022-11-18 17:30:51'),
(11, 'Audio Testimonials', 'شهادات صوتية', 'A collection of audio testimonials from previous Insijam clients, talking about their experience with Insijam and how it changed and affected their lives.', 'https://drive.google.com/file/d/1kanYrBsKs-h_9-nilwWDII3EDyBUGujW/view?usp=sharing', '', '', 1, '2022-11-18 17:31:18', '2022-11-18 17:31:18'),
(12, 'Audio Testimonials', 'شهادات صوتية', 'A collection of audio testimonials from previous Insijam clients, talking about their experience with Insijam and how it changed and affected their lives.', 'https://drive.google.com/file/d/1q99EkQn_HabDIBKqZt49W5RqiKt_p9gt/view?usp=sharing', '', '', 1, '2022-11-18 17:31:38', '2022-11-18 17:31:38'),
(13, 'Audio Testimonials', 'شهادات صوتية', 'A collection of audio testimonials from previous Insijam clients, talking about their experience with Insijam and how it changed and affected their lives.', 'https://drive.google.com/file/d/18TdDM7ZhnfLak8XigTVpWeI3ZYFDYts4/view?usp=sharing', '', '', 1, '2022-11-18 17:32:03', '2022-11-18 17:32:03'),
(14, 'Audio Testimonials', 'شهادات صوتية', 'A collection of audio testimonials from previous Insijam clients, talking about their experience with Insijam and how it changed and affected their lives.', 'https://drive.google.com/file/d/1oHcPxHwsfOAjl5eprTQuzBn9JsRHOOK_/view?usp=sharing', '', '', 1, '2022-11-18 17:32:26', '2022-11-18 17:32:26'),
(15, 'Video Testimonials', 'شهادات مصورة', 'A collection of video testimonials from previous Insijam clients, talking about their experience with Insijam and how it changed and affected their lives.', 'https://drive.google.com/file/d/1YReGCmzaUi3npnvo-STYXO3Q5cmyMWsI/view?usp=sharing', '', '', 2, '2022-11-18 17:33:07', '2022-11-18 17:33:07'),
(16, 'Video Testimonials', 'شهادات مصورة', 'A collection of video testimonials from previous Insijam clients, talking about their experience with Insijam and how it changed and affected their lives.', 'https://drive.google.com/file/d/1qi5ecE4ue-KQnrNWELj6OGnY3cXbiUWS/view?usp=sharing', '', '', 2, '2022-11-18 17:33:39', '2022-11-18 17:33:39');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial_video_type`
--

CREATE TABLE `testimonial_video_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonial_video_type`
--

INSERT INTO `testimonial_video_type` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'audio', NULL, NULL),
(2, 'video', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tv_interview`
--

CREATE TABLE `tv_interview` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic_english` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `channel_arabic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic_arabic` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `channel_english` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_english` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_arabic` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_english` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_arabic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_arabic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tv_interview`
--

INSERT INTO `tv_interview` (`id`, `topic_english`, `channel_arabic`, `topic_arabic`, `channel_english`, `show_english`, `show_arabic`, `tag_english`, `tag_arabic`, `description`, `description_arabic`, `link`, `created_at`, `updated_at`) VALUES
(6, 'Self-Love', 'راديو نبض الكويت', 'حب الذات', 'Q8 Pulse Radio', 'Doha Al Oud', 'الضحى العود', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of coach Dalal TV and Radio interviews, both localy and internationaly.', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'https://drive.google.com/file/d/1CB6IHlL3uvYMPfDl368zfRV0HBlGPLsY/view?usp=sharing', '2022-11-17 10:35:52', '2022-11-17 10:40:16'),
(7, 'Insijam Journey', 'راديو منبر الحرية', 'رحلة انسجام', 'HR Live Radio', '', '', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of coach Dalal TV and Radio interviews, both localy and internationaly.', NULL, 'https://drive.google.com/file/d/1VrJv81MMbt_9es1DZKZ1nxeEOT92kHg2/view?usp=sharing', '2022-11-18 17:40:11', '2022-11-18 17:40:11'),
(8, 'Does True Friendship Still Exist?', 'قناة العربي', 'هل ما زالت توجد صداقة حقيقية؟', 'Al-Arabi', 'Good Morning', 'صباح النور', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of coach Dalal TV and Radio interviews, both localy and internationaly.', NULL, 'https://drive.google.com/file/d/1EP0f3MeSvAY8mfZdisXfndGfQBePkT4j/view?usp=sharing', '2022-11-18 17:43:20', '2022-11-18 17:43:20'),
(9, 'Difference Between Isolation and Solitude', 'قناة المجلس', 'الفرق بين العزلة والانفراد بالنفس', 'Al-Majles TV', 'Kuwait Today', 'برنامج كويت اليوم', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of coach Dalal TV and Radio interviews, both localy and internationaly.', NULL, 'https://drive.google.com/file/d/1mAwN9su70vfp9pHb-yHlLyv25Jo4Mzc8/view?usp=sharing', '2022-11-18 17:45:24', '2022-11-18 17:45:24'),
(10, 'Eid During the Pandemic', 'تلفزيون دولة الكويت', 'فرحة العيد خلال جائحة كورونا', 'Kuwait TV', 'Doha Al Eid', 'ضحى العيد', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of coach Dalal TV and Radio interviews, both localy and internationaly.', NULL, 'https://drive.google.com/file/d/1CxVavr_87_K92uFoVG0lVJm3yp82kHC8/view?usp=sharing', '2022-11-18 17:47:22', '2022-11-18 17:47:22'),
(11, 'The Role of a Life Coach in a Woman\'s Life', 'قناة الراي', 'دور مدربة الحياة في حياة المرأة', 'Al-Rai TV', 'to 10', 'برنامج عشر إلا عش0', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of coach Dalal TV and Radio interviews, both localy and internationaly.', NULL, 'https://drive.google.com/file/d/1VvZaWd8K0UE30luecndNrT2738CuMSks/view?usp=sharing', '2022-11-18 17:48:46', '2022-11-18 17:48:46'),
(12, 'Feeling Guilty', 'قناة العربي', 'الإحساس بالذنب', 'Al-Arabi', 'Good Morning', 'صباح النور', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of coach Dalal TV and Radio interviews, both localy and internationaly.', NULL, 'https://drive.google.com/file/d/13gbSdbyS-HnCtCMDT0GGXKj188NeN-ZD/view?usp=sharing', '2022-11-18 17:50:24', '2022-11-18 17:50:24'),
(13, 'Sacrifice', 'إذاعة دولة الكويت', 'التضحية', 'Kuwait Radio', 'Tuesday Break', 'استراحة الثلاثاء', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of coach Dalal TV and Radio interviews, both localy and internationaly.', NULL, 'https://drive.google.com/file/d/1hlmOVsXY-QNlFQKAQQNvRFHjZL7UUOld/view?usp=sharing', '2022-11-18 17:51:40', '2022-11-18 17:51:40'),
(14, 'Mother Happiness', 'قناة المجلس', 'سعادة الأم', 'Al-Majles TV', 'Kuwait Today', 'برنامج كويت اليوم', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of coach Dalal TV and Radio interviews, both localy and internationaly.', NULL, 'https://drive.google.com/file/d/1zqSwU9xF5nETmp1A8_HApsVG2UeFSMg5/view?usp=sharing', '2022-11-18 17:56:45', '2022-11-18 17:56:45'),
(15, 'Setting Goals for the New Year', 'قناة المجلس', 'تحديد الأهداف للسنة الجديدة', 'Al-Majles TV', 'Kuwait Today', 'برنامج كويت اليوم', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of coach Dalal TV and Radio interviews, both localy and internationaly.', NULL, 'https://drive.google.com/file/d/1IXqu0d30mm1yjByd8KMad4qMWhIzTED4/view?usp=sharing', '2022-11-18 17:57:40', '2022-11-18 17:57:40'),
(16, 'Fear', 'تلفزيون دولة الكويت', 'الخوف', 'Kuwait TV', 'Shai Al Doha', 'برنامج شاي الضحى', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of coach Dalal TV and Radio interviews, both localy and internationaly.', NULL, 'https://drive.google.com/file/d/1bzoP-T3OAiVetE6O10B52Hvw0F5fFWoe/view?usp=sharing', '2022-11-18 17:58:27', '2022-11-18 17:58:27'),
(17, 'Financial Personalities and their Effects', 'قناة المجلس', 'الشخصيات المالية وتأثيرها على العلاقات', 'Al-Majles TV', 'Kuwait Today', 'برنامج كويت اليوم', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of coach Dalal TV and Radio interviews, both localy and internationaly.', NULL, 'https://drive.google.com/file/d/1SR8SaR20qNhzA1wghbyrzm8FKSQXHqK4/view?usp=sharing', '2022-11-18 17:59:28', '2022-11-18 17:59:28'),
(18, 'Traveling', 'القبس الالكتروني', 'السفر', 'Al-Qabas TV', '', '', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of coach Dalal TV and Radio interviews, both localy and internationaly.', NULL, 'https://drive.google.com/file/d/1WpQu4uoR7b4jn8BW8Qdo637QqJKf_A4Y/view?usp=sharing', '2022-11-18 18:00:11', '2022-11-18 18:00:11'),
(19, 'Self-Love', 'قناة المجلس', 'حب الذات', 'Al-Majles TV', 'Kuwait Today', 'برنامج كويت اليوم', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', '', NULL, 'https://drive.google.com/file/d/1jm6fYlOdqca5hBSbcOsbr_9tbx8JkVws/view?usp=sharing', '2022-11-18 18:01:05', '2022-11-18 18:01:05'),
(20, 'Husbands and Mother\'s in Law', 'تلفزيون دولة الكويت', 'علاقة الزوجة بأم الزوج', 'Kuwait TV', 'Friday Gathering', 'يمعة الجمعة', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of coach Dalal TV and Radio interviews, both localy and internationaly.', NULL, 'https://drive.google.com/file/d/1TmIQZ1sTXCLLS427n0AbPBwJRTdIjeNr/view?usp=sharing', '2022-11-18 18:01:57', '2022-11-18 18:01:57'),
(21, 'Worthiness in Love', 'تلفزيون دولة الكويت', 'الاستحقاق في الحب', 'Kuwait TV', 'Shai Al Doha', 'برنامج شاي الضحى', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of coach Dalal TV and Radio interviews, both localy and internationaly.', NULL, 'https://drive.google.com/file/d/1aplmYgdNIJCXAAYrQg4yEgC2BQiQms5z/view?usp=sharing', '2022-11-18 18:02:43', '2022-11-18 18:02:43'),
(22, 'What is a Life Coach 1', 'قناة الراي', 'ما هو مدرب الحياة 1', 'Al-Rai TV', 'Masai', 'برنامج مسائي', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of coach Dalal TV and Radio interviews, both localy and internationaly.', NULL, 'https://drive.google.com/file/d/1u8Q24zwOr6Kfvsca5uE2_uprZSuBPuh2/view?usp=sharing', '2022-11-18 18:03:48', '2022-11-18 18:03:48'),
(23, 'What is a Life Coach 2', 'قناة الراي', 'ما هو مدرب الحياة 2', 'Al-Rai TV', 'Masai', 'برنامج مسائي', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of coach Dalal TV and Radio interviews, both localy and internationaly.', NULL, 'https://drive.google.com/file/d/1qm9jV39XGDbCEYeIx32HdOPCR6Rp5lNF/view?usp=sharing', '2022-11-18 18:04:50', '2022-11-18 18:04:50'),
(24, 'Marriage Between Reality and Imagination', 'قناة المجلس', 'الزواج بين الواقع والخيال', 'Al-Majles TV', 'Kuwait Today', 'برنامج كويت اليوم', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of coach Dalal TV and Radio interviews, both localy and internationaly.', NULL, 'https://drive.google.com/file/d/1AbTaPBhMDE9_zLO_c7uPSID8UTMYm9mw/view?usp=sharing', '2022-11-18 18:06:21', '2022-11-18 18:06:21'),
(25, 'Femininity', 'قناة المجلس', 'الأنوثة', 'Al-Majles TV', 'Kuwait Today', 'برنامج كويت اليوم', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of coach Dalal TV and Radio interviews, both localy and internationaly.', NULL, 'https://drive.google.com/file/d/1Bcg6U3sYSWL0evvWvUdZ2pq4gRQeOohm/view?usp=sharing', '2022-11-18 18:07:19', '2022-11-18 18:07:19'),
(26, 'Beliefs and Happiness', 'تلفزيون دولة الكويت', 'القناعات والسعادة', 'Kuwait TV', 'Life Keys', 'برنامج مفاتيح الحياة', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of coach Dalal TV and Radio interviews, both localy and internationaly.', NULL, 'https://drive.google.com/file/d/1VjtV4VES6d9rV_n1kyRA5lALbBFqLHFU/view?usp=sharing', '2022-11-18 18:08:21', '2022-11-18 18:08:21'),
(27, 'The Importance of a Life Coach', 'تلفزيون دولة الكويت', 'أهمية مدرب الحياة', 'Kuwait TV', 'Café Shababy', 'برنامج كافيه شبابي', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of coach Dalal TV and Radio interviews, both localy and internationaly.', NULL, 'https://drive.google.com/file/d/1WXaAkpG8ozn9Z4uo79ouP7is53FuL9FO/view?usp=sharing', '2022-11-18 18:09:06', '2022-11-18 18:09:06'),
(28, 'The Role of a Life Coach', 'تلفزيون دولة الكويت', 'دور مدرب الحياة', 'Kuwait TV', 'Shabab Q8 TV', 'برنامج شباب قول وفعل', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of coach Dalal TV and Radio interviews, both localy and internationaly.', NULL, 'https://drive.google.com/file/d/1HNr6hCyCZ-Eotk8GYTOdu9hWi-GMYKnk/view?usp=sharing', '2022-11-18 18:09:52', '2022-11-18 18:09:52'),
(29, 'Ways to Relax and Be Happu', 'قناة العدالة', 'طرق الاسترخاء والسعادة', 'Al-Adala TV', 'With Nadia Safr', 'مع نادية صفر', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of coach Dalal TV and Radio interviews, both localy and internationaly.', NULL, 'https://drive.google.com/file/d/1C0jIK20u-hus2oj5LoEhYxeI2cogPmg4/view?usp=sharing', '2022-11-18 18:10:47', '2022-11-18 18:10:47'),
(30, 'Making Use of Free Time', 'قناة الراي', 'استغلال وقت الفراغ', 'Al-Rai TV', 'Raykom Shabab', 'رايكم شباب', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of coach Dalal TV and Radio interviews, both localy and internationaly.', NULL, 'https://drive.google.com/file/d/1n76NzVCSnEe72hal_m3imTZlyl-A_uBT/view?usp=sharing', '2022-11-18 18:12:46', '2022-11-18 18:12:46'),
(31, 'The Role of a Life Coach', 'قناة الوطن', 'دور مدرب الحياة', 'Al-Watan TV', 'Sawalef Hareem', 'برنامج سوالف حريم', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of coach Dalal TV and Radio interviews, both localy and internationaly.', NULL, 'https://drive.google.com/file/d/1UQTbIHYi9M20_jAbA3WqcCfxbuPN4-HS/view?usp=sharing', '2022-11-18 18:14:30', '2022-11-18 18:14:30'),
(32, 'Magnify the Love in Your Marriage', 'راديو السيف', 'ضاعف الحب في زواجك', 'Al-Seif TV', '', '', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of coach Dalal TV and Radio interviews, both localy and internationaly.', NULL, 'https://drive.google.com/file/d/18AFx4eXecfhE2CaHij0P7t91IRsT1awv/view?usp=sharing', '2022-11-18 18:15:24', '2022-11-18 18:15:24'),
(33, 'The Importance of a Life Coach', 'قناة الشاهد', 'معنى وأهمية مدرب الحياة', 'Al-Shahed TV', 'Shabab Al-Yoom', 'برنامج شباب اليوم', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of coach Dalal TV and Radio interviews, both localy and internationaly.', NULL, 'https://drive.google.com/file/d/1cHjLgPmO-Y_FUDd40ZsqXGo-5ltP-1dK/view?usp=sharing', '2022-11-18 18:16:52', '2022-11-18 18:16:52'),
(34, 'Discussion About Coaching', 'تلفزيون دولة الكويت', 'حوار عن التدريب', 'Kuwait TV', 'Beitak', 'بيتك', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of coach Dalal TV and Radio interviews, both localy and internationaly.', NULL, 'https://drive.google.com/file/d/18nOxNNIJYr1ZLkeqH1IH2fKPqqnNvOZA/view?usp=sharing', '2022-11-18 18:17:46', '2022-11-18 18:17:46');

-- --------------------------------------------------------

--
-- Table structure for table `tv_interviews`
--

CREATE TABLE `tv_interviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_arabic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_arabic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_arabic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tv_interview_channels`
--

CREATE TABLE `tv_interview_channels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `channel_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `channel_name_arabic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tv_interview_shows`
--

CREATE TABLE `tv_interview_shows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `show_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_name_arabic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tv_interview_topics`
--

CREATE TABLE `tv_interview_topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tv_interview_id` bigint(20) UNSIGNED NOT NULL,
  `channel_id` bigint(20) UNSIGNED NOT NULL,
  `show_id` bigint(20) UNSIGNED NOT NULL,
  `topic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic_arabic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tv_show`
--

CREATE TABLE `tv_show` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic_english` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic_arabic` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `channel_english` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `channel_arabic` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_english` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_arabic` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_english` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_arabic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_arabic` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tv_show`
--

INSERT INTO `tv_show` (`id`, `topic_english`, `topic_arabic`, `channel_english`, `channel_arabic`, `show_english`, `show_arabic`, `tag_english`, `tag_arabic`, `description`, `description_arabic`, `link`, `created_at`, `updated_at`) VALUES
(2, 'Stress and Driving', 'التوتر في السياقة', 'Al-Watan TV', 'قناة الوطن', 'Color Your Life', 'فقرة لون حياتك', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of TV shows hosted by coach Dalal Al-Janaie', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'https://drive.google.com/file/d/1vWOUjNPHSuMDfzX1dCE2qQ8F9nIv9nG4/view?usp=sharing', '2022-11-17 10:47:52', '2022-11-17 10:47:52'),
(3, 'Comparison', 'المقارنة', 'Al-Watan TV', 'قناة الوطن', 'Color Your Life', 'فقرة لون حياتك', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of TV shows hosted by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/17uXwdYfuwk9J17RuWAIK2pGcuNJ_C_xm/view?usp=sharing', '2022-11-19 05:09:48', '2022-11-19 05:09:48'),
(4, 'The Importance of Good Sleep', 'أهمية النوم بطريقة صحيحة', 'Al-Watan TV', 'قناة الوطن', 'Color Your Life', 'فقرة لون حياتك', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of TV shows hosted by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1vIXH8P8RStDzshD9ejeBvF8f6INTYaag/view?usp=sharing', '2022-11-19 05:11:12', '2022-11-19 05:11:12'),
(5, 'Between Reality and Imagination', 'بين الخيال والواقع', 'Al-Watan TV', 'قناة الوطن', 'Color Your Life', 'فقرة لون حياتك/', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of TV shows hosted by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1yfyb1OIHBZBr-mF1LiD4VyfGP2B_8gqd/view?usp=sharing', '2022-11-19 05:12:17', '2022-11-19 05:12:17'),
(6, 'The Words You Say', 'الكلام اللي تقولينه', 'Al-Watan TV', 'قناة الوطن', 'Color Your Life', 'فقرة لون حياتك', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of TV shows hosted by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1PoNkmQ6EzROOBAdC-g55Uz3PtOQMzu77/view?usp=sharing', '2022-11-19 05:13:18', '2022-11-19 05:13:18'),
(7, 'Interview With Fatima Al-Mosawy', 'لقاء  مع فاطمة الموسوي', 'Kuwait TV', 'تلفزيون دولة الكويت', 'Success and Happiness', 'فقرة السعادة والنجاح', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of TV shows hosted by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/12kRIXUPGYpO2GxBiFsbmdCfbcnqyozlf/view?usp=sharing', '2022-11-19 05:14:21', '2022-11-19 05:14:21'),
(8, 'Interview With Ali Al-Jazzaf', 'لقاء مع علي الجزاف', 'Kuwait TV', 'تلفزيون دولة الكويت', 'Success and Happiness', 'فقرة السعادة والنجاح', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of TV shows hosted by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1wixWxAl0sDwWoqOgayUXAbaqKgxAImqT/view?usp=sharing', '2022-11-19 05:15:59', '2022-11-19 05:15:59'),
(9, 'Interview With Dawood Maarafi', 'لقاء مع داوود معرفي', 'Kuwait TV', 'تلفزيون دولة الكويت', 'Success and Happiness', 'فقرة السعادة والنجاح', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of TV shows hosted by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1xgR1T7KXbwzM1KEYi0F1MDqBn9g5if6V/view?usp=sharing', '2022-11-19 05:16:54', '2022-11-19 05:23:59'),
(10, 'Interview With Yousef Al-Jinaee', 'لقاء مع يوسف القناعي', 'Kuwait TV', 'تلفزيون دولة الكويت', 'Success and Happiness', 'فقرة السعادة والنجاح', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of TV shows hosted by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1rz25A4L_USwiYcF0oSs9N8xzVGrD3H23/view?usp=sharing', '2022-11-19 05:17:58', '2022-11-19 05:17:58'),
(11, 'Interview With His and Hers Blog', 'لقاء مع أصحاب مدونة له ولها', 'Kuwait TV', 'تلفزيون دولة الكويت', 'Success and Happiness', 'فقرة السعادة والنجاح', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of TV shows hosted by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1GVOwjiXb1QVOM1Z_48ZbgrGwukhn3wlX/view?usp=sharing', '2022-11-19 05:18:55', '2022-11-19 05:18:55'),
(12, 'Intevriew With Dr. Mariam Sohail', 'لقاء مع د. مريم سهيل', 'Kuwait TV', 'تلفزيون دولة الكويت', 'Success and Happiness', 'فقرة السعادة والنجاح', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of TV shows hosted by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1JhrI2XVP_z91Tz3OKrQmtq1y5p0xtjoB/view?usp=sharing', '2022-11-19 05:19:54', '2022-11-19 05:19:54'),
(13, 'Interview with Khaled Al-Klayeb', 'لقاء مع خالد الكليب', 'Kuwait TV', 'تلفزيون دولة الكويت', 'Success and Happiness', 'فقرة السعادة والنجاح', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of TV shows hosted by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/15yqhc3G_FsnkBrhDinBBVg5tgv6ydAFg/view?usp=sharing', '2022-11-19 05:20:54', '2022-11-19 05:20:54'),
(14, 'Interview With Amira Al-Shaalan', 'لقاء مع أميرة الشعلان', 'Kuwait TV', 'تلفزيون دولة الكويت', 'Success and Happiness', 'فقرة السعادة والنجاح', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of TV shows hosted by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1Y_QrCZ-nippV6witRjbB_74BPPSyncrz/view?usp=sharing', '2022-11-19 05:21:50', '2022-11-19 05:21:50'),
(15, 'Interview with Dr. Nada Al-Ragm', 'لقاء مع د. ندى الرقم', 'Kuwait TV', 'تلفزيون دولة الكويت', 'Success and Happiness', 'فقرة السعادة والنجاح', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of TV shows hosted by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1uceotOUUxnZEMraQs4ZsYn_qPt2dQA6q/view?usp=sharing', '2022-11-19 05:22:32', '2022-11-19 05:22:32'),
(16, 'Interview with Hamad Al-Klayeb', 'لقاء مع حمد الكليب', 'Kuwait TV', 'تلفزيون دولة الكويت', 'Success and Happiness', 'فقرة السعادة والنجاح', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of TV shows hosted by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1VWzEHV2A9EqGWroghtbA1lToMgma662P/view?usp=sharing', '2022-11-19 05:23:21', '2022-11-19 05:23:21'),
(17, 'Interview with Aisha Al-Humaidhi', 'لقاء مع عايشة الحميضي', 'Kuwait TV', 'تلفزيون دولة الكويت', 'Success and Happiness', 'فقرة السعادة والنجاح', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of TV shows hosted by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1ayZVj3VjOaBqyuwiOCNzT4u2Jpgx4nWT/view?usp=sharing', '2022-11-19 05:24:53', '2022-11-19 05:24:53'),
(18, 'Interview with Blue Circle Team', 'لقاء مع فريق Blue Circle', 'Kuwait TV', 'تلفزيون دولة الكويت', 'Success and Happiness', 'فقرة السعادة والنجاح', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of TV shows hosted by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1KWk7YyP0gAmLTqZcds7bgA5BcfM8R7uY/view?usp=sharing', '2022-11-19 05:25:36', '2022-11-19 05:25:36'),
(19, 'Interview with Founderr of Dawrat.com', 'لقاء مع مؤسس موقع دورات', 'Kuwait TV', 'تلفزيون دولة الكويت', 'Success and Happiness', 'فقرة السعادة والنجاح', 'Divorce-love-ramadan-snapchat-love-self-love-relationships-harmony-partners', 'الطلاق-الانسجام-رمضان-سناب شات-الحب-حب الذات-العلاقات-شريك الحياة', 'A collection of TV shows hosted by coach Dalal Al-Janaie', '', 'https://drive.google.com/file/d/1w5loYloxGzPMv5ueKpoA-YsWUBAwKHNu/view?usp=sharing', '2022-11-19 05:26:20', '2022-11-19 05:26:20');

-- --------------------------------------------------------

--
-- Table structure for table `tv_shows`
--

CREATE TABLE `tv_shows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_arabic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_arabic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_arabic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tv_show_channels`
--

CREATE TABLE `tv_show_channels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `channel_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `channel_name_arabic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tv_show_links`
--

CREATE TABLE `tv_show_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tv_show_id` bigint(20) UNSIGNED NOT NULL,
  `tv_show_name_id` bigint(20) UNSIGNED NOT NULL,
  `tv_show_channel_id` bigint(20) UNSIGNED NOT NULL,
  `topic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic_arabic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tv_show_names`
--

CREATE TABLE `tv_show_names` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `show_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_name_arabic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `gender` enum('null','male','female') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` enum('null','<20','21-25','26-30','31-35','36-40','41-50','51-60','60-75') COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `gender`, `age`, `password`, `type`, `lang`, `created_by`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, NULL, 'null', '$2y$10$UkjrPVXSXTkq7mMltxe.qOelix5L7CPa8R8KQ6FQ/mB9ilnWDltDy', 'admin', 'en', 0, 'WhatsApp Image 2022-11-09 at 17.24.47_1667995220.jpg', NULL, '2022-11-08 00:25:24', '2022-11-10 05:28:14'),
(3, 'User', 'user@gmail.com', NULL, NULL, 'null', '$2y$10$UkjrPVXSXTkq7mMltxe.qOelix5L7CPa8R8KQ6FQ/mB9ilnWDltDy', 'Test', '', 0, NULL, NULL, '2022-11-08 23:51:44', '2022-11-08 23:51:44');

-- --------------------------------------------------------

--
-- Table structure for table `user_challenges`
--

CREATE TABLE `user_challenges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `englighting_challenge_id` bigint(20) UNSIGNED NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `points` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_challenge_informations`
--

CREATE TABLE `user_challenge_informations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_challenge_id` bigint(20) UNSIGNED NOT NULL,
  `challenge_video_id` bigint(20) UNSIGNED NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `points` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_courses`
--

CREATE TABLE `user_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_course_links`
--

CREATE TABLE `user_course_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_course_id` bigint(20) UNSIGNED NOT NULL,
  `course_link_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `points` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_live_videos`
--

CREATE TABLE `user_live_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `live_video_id` bigint(20) UNSIGNED NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_moods`
--

CREATE TABLE `user_moods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `mood_id` bigint(20) UNSIGNED NOT NULL,
  `mood_category_id` bigint(20) UNSIGNED NOT NULL,
  `mood_sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_tag`
--
ALTER TABLE `article_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_course_id_foreign` (`course_id`);

--
-- Indexes for table `challenge`
--
ALTER TABLE `challenge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `challenges_link`
--
ALTER TABLE `challenges_link`
  ADD PRIMARY KEY (`id`),
  ADD KEY `challenge_id_foreign` (`challenge_id`);

--
-- Indexes for table `challenge_achievements`
--
ALTER TABLE `challenge_achievements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `challenge_skills`
--
ALTER TABLE `challenge_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `challenge_videos`
--
ALTER TABLE `challenge_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `challenge_videos_enlighting_challenge_id_foreign` (`enlighting_challenge_id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_chapters`
--
ALTER TABLE `course_chapters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_links`
--
ALTER TABLE `course_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_links_course_id_foreign` (`course_id`);

--
-- Indexes for table `course_ratings`
--
ALTER TABLE `course_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_ratings_user_id_foreign` (`user_id`),
  ADD KEY `course_ratings_course_id_foreign` (`course_id`);

--
-- Indexes for table `enlighting_challenges`
--
ALTER TABLE `enlighting_challenges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_registrations`
--
ALTER TABLE `event_registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_registrations_event_id_foreign` (`event_id`),
  ADD KEY `event_registrations_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `follow_author`
--
ALTER TABLE `follow_author`
  ADD PRIMARY KEY (`id`),
  ADD KEY `follow_author_user_id_foreign` (`user_id`);

--
-- Indexes for table `handpicked_for_you`
--
ALTER TABLE `handpicked_for_you`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instagram_videos`
--
ALTER TABLE `instagram_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instagram_video_links`
--
ALTER TABLE `instagram_video_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instagram_video_links_instagram_video_id_foreign` (`instagram_video_id`);

--
-- Indexes for table `live_video`
--
ALTER TABLE `live_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `live_videos`
--
ALTER TABLE `live_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `live_videos_chapter_id_foreign` (`chapter_id`);

--
-- Indexes for table `live_video_chapter`
--
ALTER TABLE `live_video_chapter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_securities`
--
ALTER TABLE `login_securities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `moduals`
--
ALTER TABLE `moduals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moods`
--
ALTER TABLE `moods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mood_categories`
--
ALTER TABLE `mood_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mood_categories_mood_id_foreign` (`mood_id`);

--
-- Indexes for table `mood_sub_categories`
--
ALTER TABLE `mood_sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mood_sub_categories_mood_id_foreign` (`mood_id`),
  ADD KEY `mood_sub_categories_mood_category_id_foreign` (`mood_category_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plants`
--
ALTER TABLE `plants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `podcasts`
--
ALTER TABLE `podcasts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_user_id_foreign` (`user_id`);

--
-- Indexes for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_details_purchase_id_foreign` (`purchase_id`),
  ADD KEY `purchase_details_course_id_foreign` (`course_id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quotes_user_id_foreign` (`user_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_user_id_foreign` (`user_id`),
  ADD KEY `ratings_course_id_foreign` (`course_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_name_created_by_unique` (`name`,`created_by`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial_videos`
--
ALTER TABLE `testimonial_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testimonial_video_type_id_foreign` (`testimonial_video_type_id`);

--
-- Indexes for table `testimonial_video_type`
--
ALTER TABLE `testimonial_video_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tv_interview`
--
ALTER TABLE `tv_interview`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tv_interviews`
--
ALTER TABLE `tv_interviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tv_interview_channels`
--
ALTER TABLE `tv_interview_channels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tv_interview_shows`
--
ALTER TABLE `tv_interview_shows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tv_interview_topics`
--
ALTER TABLE `tv_interview_topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tv_interview_topics_tv_interview_id_foreign` (`tv_interview_id`),
  ADD KEY `tv_interview_topics_channel_id_foreign` (`channel_id`),
  ADD KEY `tv_interview_topics_show_id_foreign` (`show_id`);

--
-- Indexes for table `tv_show`
--
ALTER TABLE `tv_show`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tv_shows`
--
ALTER TABLE `tv_shows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tv_show_channels`
--
ALTER TABLE `tv_show_channels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tv_show_links`
--
ALTER TABLE `tv_show_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tv_show_links_tv_show_id_foreign` (`tv_show_id`),
  ADD KEY `tv_show_links_tv_show_name_id_foreign` (`tv_show_name_id`),
  ADD KEY `tv_show_links_tv_show_channel_id_foreign` (`tv_show_channel_id`);

--
-- Indexes for table `tv_show_names`
--
ALTER TABLE `tv_show_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_challenges`
--
ALTER TABLE `user_challenges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_challenges_user_id_foreign` (`user_id`),
  ADD KEY `user_challenges_englighting_challenge_id_foreign` (`englighting_challenge_id`);

--
-- Indexes for table `user_challenge_informations`
--
ALTER TABLE `user_challenge_informations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_challenge_informations_user_id_foreign` (`user_id`),
  ADD KEY `user_challenge_informations_user_challenge_id_foreign` (`user_challenge_id`),
  ADD KEY `user_challenge_informations_challenge_video_id_foreign` (`challenge_video_id`);

--
-- Indexes for table `user_courses`
--
ALTER TABLE `user_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_courses_user_id_foreign` (`user_id`),
  ADD KEY `user_courses_course_id_foreign` (`course_id`);

--
-- Indexes for table `user_course_links`
--
ALTER TABLE `user_course_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_course_links_user_course_id_foreign` (`user_course_id`),
  ADD KEY `user_course_links_course_link_id_foreign` (`course_link_id`),
  ADD KEY `user_course_links_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_live_videos`
--
ALTER TABLE `user_live_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_live_videos_user_id_foreign` (`user_id`),
  ADD KEY `user_live_videos_live_video_id_foreign` (`live_video_id`);

--
-- Indexes for table `user_moods`
--
ALTER TABLE `user_moods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_moods_user_id_foreign` (`user_id`),
  ADD KEY `user_moods_mood_id_foreign` (`mood_id`),
  ADD KEY `user_moods_mood_category_id_foreign` (`mood_category_id`),
  ADD KEY `user_moods_mood_sub_category_id_foreign` (`mood_sub_category_id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_course_id_foreign` (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `article_tag`
--
ALTER TABLE `article_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `challenge`
--
ALTER TABLE `challenge`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `challenges_link`
--
ALTER TABLE `challenges_link`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `challenge_achievements`
--
ALTER TABLE `challenge_achievements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `challenge_skills`
--
ALTER TABLE `challenge_skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `challenge_videos`
--
ALTER TABLE `challenge_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `course_chapters`
--
ALTER TABLE `course_chapters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `course_links`
--
ALTER TABLE `course_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=316;

--
-- AUTO_INCREMENT for table `course_ratings`
--
ALTER TABLE `course_ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enlighting_challenges`
--
ALTER TABLE `enlighting_challenges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_registrations`
--
ALTER TABLE `event_registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `follow_author`
--
ALTER TABLE `follow_author`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `handpicked_for_you`
--
ALTER TABLE `handpicked_for_you`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `instagram_videos`
--
ALTER TABLE `instagram_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `instagram_video_links`
--
ALTER TABLE `instagram_video_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `live_video`
--
ALTER TABLE `live_video`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `live_videos`
--
ALTER TABLE `live_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `live_video_chapter`
--
ALTER TABLE `live_video_chapter`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_securities`
--
ALTER TABLE `login_securities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `moduals`
--
ALTER TABLE `moduals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `moods`
--
ALTER TABLE `moods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mood_categories`
--
ALTER TABLE `mood_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mood_sub_categories`
--
ALTER TABLE `mood_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `plants`
--
ALTER TABLE `plants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `podcasts`
--
ALTER TABLE `podcasts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_details`
--
ALTER TABLE `purchase_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonial_videos`
--
ALTER TABLE `testimonial_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `testimonial_video_type`
--
ALTER TABLE `testimonial_video_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tv_interview`
--
ALTER TABLE `tv_interview`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tv_interviews`
--
ALTER TABLE `tv_interviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tv_interview_channels`
--
ALTER TABLE `tv_interview_channels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tv_interview_shows`
--
ALTER TABLE `tv_interview_shows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tv_interview_topics`
--
ALTER TABLE `tv_interview_topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tv_show`
--
ALTER TABLE `tv_show`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tv_shows`
--
ALTER TABLE `tv_shows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tv_show_channels`
--
ALTER TABLE `tv_show_channels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tv_show_links`
--
ALTER TABLE `tv_show_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tv_show_names`
--
ALTER TABLE `tv_show_names`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_challenges`
--
ALTER TABLE `user_challenges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_challenge_informations`
--
ALTER TABLE `user_challenge_informations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_courses`
--
ALTER TABLE `user_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_course_links`
--
ALTER TABLE `user_course_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_live_videos`
--
ALTER TABLE `user_live_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_moods`
--
ALTER TABLE `user_moods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `challenges_link`
--
ALTER TABLE `challenges_link`
  ADD CONSTRAINT `challenge_id_foreign` FOREIGN KEY (`challenge_id`) REFERENCES `challenge` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `challenge_videos`
--
ALTER TABLE `challenge_videos`
  ADD CONSTRAINT `challenge_videos_enlighting_challenge_id_foreign` FOREIGN KEY (`enlighting_challenge_id`) REFERENCES `enlighting_challenges` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_links`
--
ALTER TABLE `course_links`
  ADD CONSTRAINT `course_links_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_ratings`
--
ALTER TABLE `course_ratings`
  ADD CONSTRAINT `course_ratings_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_registrations`
--
ALTER TABLE `event_registrations`
  ADD CONSTRAINT `event_registrations_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_registrations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `follow_author`
--
ALTER TABLE `follow_author`
  ADD CONSTRAINT `follow_author_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `instagram_video_links`
--
ALTER TABLE `instagram_video_links`
  ADD CONSTRAINT `instagram_video_links_instagram_video_id_foreign` FOREIGN KEY (`instagram_video_id`) REFERENCES `instagram_videos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `live_videos`
--
ALTER TABLE `live_videos`
  ADD CONSTRAINT `live_videos_chapter_id_foreign` FOREIGN KEY (`chapter_id`) REFERENCES `live_video_chapter` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mood_categories`
--
ALTER TABLE `mood_categories`
  ADD CONSTRAINT `mood_categories_mood_id_foreign` FOREIGN KEY (`mood_id`) REFERENCES `moods` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mood_sub_categories`
--
ALTER TABLE `mood_sub_categories`
  ADD CONSTRAINT `mood_sub_categories_mood_category_id_foreign` FOREIGN KEY (`mood_category_id`) REFERENCES `mood_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mood_sub_categories_mood_id_foreign` FOREIGN KEY (`mood_id`) REFERENCES `moods` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD CONSTRAINT `purchase_details_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchase_details_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quotes`
--
ALTER TABLE `quotes`
  ADD CONSTRAINT `quotes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `testimonial_videos`
--
ALTER TABLE `testimonial_videos`
  ADD CONSTRAINT `testimonial_video_type_id_foreign` FOREIGN KEY (`testimonial_video_type_id`) REFERENCES `testimonial_video_type` (`id`);

--
-- Constraints for table `tv_interview_topics`
--
ALTER TABLE `tv_interview_topics`
  ADD CONSTRAINT `tv_interview_topics_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `tv_interview_channels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tv_interview_topics_show_id_foreign` FOREIGN KEY (`show_id`) REFERENCES `tv_interview_shows` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tv_interview_topics_tv_interview_id_foreign` FOREIGN KEY (`tv_interview_id`) REFERENCES `tv_interviews` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tv_show_links`
--
ALTER TABLE `tv_show_links`
  ADD CONSTRAINT `tv_show_links_tv_show_channel_id_foreign` FOREIGN KEY (`tv_show_channel_id`) REFERENCES `tv_show_channels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tv_show_links_tv_show_id_foreign` FOREIGN KEY (`tv_show_id`) REFERENCES `tv_shows` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tv_show_links_tv_show_name_id_foreign` FOREIGN KEY (`tv_show_name_id`) REFERENCES `tv_show_names` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_challenges`
--
ALTER TABLE `user_challenges`
  ADD CONSTRAINT `user_challenges_englighting_challenge_id_foreign` FOREIGN KEY (`englighting_challenge_id`) REFERENCES `enlighting_challenges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_challenges_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_challenge_informations`
--
ALTER TABLE `user_challenge_informations`
  ADD CONSTRAINT `user_challenge_informations_challenge_video_id_foreign` FOREIGN KEY (`challenge_video_id`) REFERENCES `challenge_videos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_challenge_informations_user_challenge_id_foreign` FOREIGN KEY (`user_challenge_id`) REFERENCES `user_challenges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_challenge_informations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_courses`
--
ALTER TABLE `user_courses`
  ADD CONSTRAINT `user_courses_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_courses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_course_links`
--
ALTER TABLE `user_course_links`
  ADD CONSTRAINT `user_course_links_course_link_id_foreign` FOREIGN KEY (`course_link_id`) REFERENCES `course_links` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_course_links_user_course_id_foreign` FOREIGN KEY (`user_course_id`) REFERENCES `user_courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_course_links_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_live_videos`
--
ALTER TABLE `user_live_videos`
  ADD CONSTRAINT `user_live_videos_live_video_id_foreign` FOREIGN KEY (`live_video_id`) REFERENCES `live_videos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_live_videos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_moods`
--
ALTER TABLE `user_moods`
  ADD CONSTRAINT `user_moods_mood_category_id_foreign` FOREIGN KEY (`mood_category_id`) REFERENCES `mood_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_moods_mood_id_foreign` FOREIGN KEY (`mood_id`) REFERENCES `moods` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_moods_mood_sub_category_id_foreign` FOREIGN KEY (`mood_sub_category_id`) REFERENCES `mood_sub_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_moods_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
