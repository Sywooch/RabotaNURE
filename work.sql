-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Дек 22 2014 г., 21:55
-- Версия сервера: 5.5.25
-- Версия PHP: 5.4.34

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `work`
--

-- --------------------------------------------------------

--
-- Структура таблицы `application`
--

CREATE TABLE IF NOT EXISTS `application` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `short_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `public_info` text NOT NULL,
  `practice` tinyint(1) NOT NULL,
  `official_sponsor` tinyint(1) NOT NULL,
  `multimedia_presentation` tinyint(1) NOT NULL,
  `info_email` varchar(255) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `sponsorship_value` int(11) DEFAULT NULL,
  `sponsorship_position` int(11) DEFAULT NULL,
  `idCompany` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idCompany` (`idCompany`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `application`
--

INSERT INTO `application` (`id`, `name`, `short_name`, `description`, `address`, `email`, `website`, `public_info`, `practice`, `official_sponsor`, `multimedia_presentation`, `info_email`, `contact_name`, `sponsorship_value`, `sponsorship_position`, `idCompany`) VALUES
(1, '123', '123', '132', '13', '123@aa', 'http://www.ddd.ru', '123', 1, 1, 1, '123@qa', '132', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `application_contact`
--

CREATE TABLE IF NOT EXISTS `application_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idApplication` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idApplication` (`idApplication`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `application_job`
--

CREATE TABLE IF NOT EXISTS `application_job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idApplication` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idApplication` (`idApplication`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Программист С#'),
(2, 'Программист С++'),
(3, 'Программист С'),
(4, 'Программист JavaScript'),
(5, 'Программист Java'),
(6, 'Программист iOS'),
(7, 'Программист PHP'),
(8, 'Программист Python'),
(9, 'Программист Ruby'),
(10, 'Программист Delphi'),
(11, 'Программист 1C'),
(12, 'Программист Perl'),
(13, 'Системный администратор'),
(14, 'Администратор баз данных'),
(15, 'Менеджер проектов'),
(16, 'Архитектор ПО'),
(17, 'Front-end разработчик'),
(18, 'HTML-верстальщик'),
(19, 'Техническая поддержка'),
(20, 'QA-инженер');

-- --------------------------------------------------------

--
-- Структура таблицы `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `idUser` int(11) NOT NULL,
  `website` varchar(255) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `logo_path` varchar(255) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `mainPhotoId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mainPhotoId` (`mainPhotoId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source` varchar(255) NOT NULL,
  `target` varchar(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`id`, `source`, `target`, `name`) VALUES
(1, 'http://www.zfort.com.ua/images/logo.png', 'news', 'zfort_group_start'),
(2, 'http://www.zfort.com.ua/images/logo.png', 'news', 'zfort_group'),
(3, 'http://www.coremedia.com/image/view/-/26426/data/4/-/_ohdnutz/-/header-logo.png', 'news', 'junior_technical_support');

-- --------------------------------------------------------

--
-- Структура таблицы `job`
--

CREATE TABLE IF NOT EXISTS `job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCompany` int(11) NOT NULL,
  `idCategory` int(11) NOT NULL,
  `speciality` varchar(255) NOT NULL COMMENT 'Необходимые специальности',
  `position` varchar(100) NOT NULL COMMENT 'Занимаемая позиция',
  `min_payment` decimal(10,2) NOT NULL COMMENT 'Минимальная заработная плата ($)',
  `education` varchar(100) NOT NULL COMMENT 'Необходимое образование (полное, неполное | среднее, высшее ...)',
  `mode` varchar(100) NOT NULL COMMENT 'Режим работы (удаленный ...)',
  `schedule` varchar(100) NOT NULL COMMENT 'График работы (полный рабочий день, гибкий график ...)',
  `type` varchar(100) NOT NULL COMMENT 'Тип работы (временная, постоянная, одноразовая)',
  `description` text NOT NULL,
  `date` varchar(10) NOT NULL,
  `status` int(11) NOT NULL COMMENT 'Статус вакансии (0 - not seen, 1 - approved, 2 - banned)',
  PRIMARY KEY (`id`),
  KEY `idCompany` (`idCompany`),
  KEY `idCategory` (`idCategory`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `position` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `menu_item`
--

CREATE TABLE IF NOT EXISTS `menu_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `href` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `lang` varchar(3) NOT NULL,
  `idMenu` int(11) NOT NULL,
  `position` int(11) NOT NULL COMMENT 'Приоритет - позиция в меню',
  PRIMARY KEY (`id`),
  KEY `idMenu` (`idMenu`),
  KEY `idMenu_2` (`idMenu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `text` text NOT NULL,
  `date` varchar(10) NOT NULL,
  `lang` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `name`, `title`, `description`, `text`, `date`, `lang`) VALUES
(19, 'zfort_group', '«Один рабочий день в компании Zfort Group» – послесловие', '<p>В рамках месяца карьеры в ХНУРЭ компания Zfort Group решила провести неординарное мероприятие, которое позволило победителям конкурса на один день стать сотрудником компании. В минувшую пятницу пятеро счастливчиков, победивших в конкурсе от Zfort Group, пришли к нам в офис &laquo;на работу&raquo;.&nbsp;</p>\r\n', '<p>Как мы уже анонсировали ранее, в рамках месяца карьеры в ХНУРЭ компания Zfort Group решила провести неординарное мероприятие, которое позволило победителям конкурса на один день стать сотрудником компании.&nbsp;Подробнее читайте о конкурсе и подготовке к этому дню в предыдущем&nbsp;посте нашего блога.</p>\r\n\r\n<p>В минувшую пятницу пятеро счастливчиков, победивших в конкурсе от Zfort Group, пришли к нам в офис &laquo;на работу&raquo;. Как и любого нового сотрудника, ребят встретил наш HR-отдел, подарил подарочный набор новобранца и провел экскурсию по всему офису.</p>\r\n\r\n<p>После небольшой вступительной презентации компании и чашечки бодрящего кофе юные айтишники разошлись по своим новым отделам. К каждому студенту был прикреплен опытный куратор, который в течении всего дня вводил в курс дела, знакомил с рабочими процессами и даже давал небольшие задания.</p>\r\n\r\n<p>За целый день гости Zfort Group успели не только обогатиться новыми знаниями, но еще и поиграть в настольный футбол и теннис, пообщаться за обедом со многими сотрудниками компании, а вечером наш отдел проектных менеджеров пригласил всех студентов на свой тим-билдинг.</p>\r\n\r\n<p>Лучше самих гостей нашей компании вряд ли кто-либо расскажет о впечатлениях от одного рабочего дня в Zfort Group, поэтому предлагаем прочитать отзывы ребят и посмотреть небольшой фото отчет.</p>\r\n\r\n<p>&laquo;Мероприятие просто отличное! Все супер интересно. Не знаю даже, чего не хватает &ndash; все идеально. Почувствовал себя реальным сотрудником компании:)&raquo; -&nbsp;Крамаренко Юрий, студент ХНУРЭ.</p>\r\n\r\n<p><img alt="" src="http://www.zfort.com.ua/blog/wp-content/uploads/2014/03/odin-rabochiy-den-v-Zfort-Group5.jpg" style="height:624px; width:950px" /></p>\r\n\r\n<p>&laquo;Итак, вот и подходит к концу мой рабочий день в компании Zfort Group. Хотелось бы поблагодарить команду Zfort Group, принимавшую участие в организации и проведении такого неординарного и интересного мероприятия. Нас тепло встретили и показали все закоулки по-настоящему чудесного офиса. Данное мероприятие подарило мне много ярких впечатлений, познакомило и позволило увидеть изнутри &laquo;конвейер&raquo; программных продуктов под названием Zfort Group.</p>\r\n\r\n<p>Искренне удивил, в хорошем смысле этого слова, интерьер офиса. В будущем надеюсь вернуться сюда и продолжить своё общение с коллективом компании, но уже в качестве интерна или разработчика.&raquo;</p>\r\n\r\n<p>С благодарностью,&nbsp;Даниил Качанов, студент ХНУРЭ.</p>\r\n\r\n<p><img alt="" src="http://www.zfort.com.ua/blog/wp-content/uploads/2014/03/odin-rabochiy-den-v-Zfort-Group1.jpg" style="height:643px; width:950px" /></p>\r\n\r\n<p>&laquo;Первым делом хотелось бы поблагодарить того человека, который выдвинул идею о проведении конкурса для студентов ХИРЭ, результатами которого стал &laquo;Один рабочий день в компании Zfort Group&raquo;. Очень приятно, что я оказался одним из тех пяти счастливчиков, которым повезло к вам попасть. Нас пригласили на 21 число на весь день в офис в соответствующий отдел (я попал в отдел тестирования). День начался в 11 утра. Мы пришли, в офис, нас встретили, рассказали наш распорядок дня и выпив кофе/чай мы разошлись по нашим отделам. Моим начальником и &laquo;старшим братом&raquo; оказался Алексей Среда &ndash; очень профессиональный и технически подкованный &nbsp;человек. Сразу видно &ndash; человек не зря занимает свое место &ndash; он соответствует своей должности. Первым моим заданием было изучение корпоративного средства получения информации Enterprise. Данное ПО понравилось своей лаконичностью, простотой и полнотой. Далее было вникание в суть тестирования. Мне показали основные инструменты организации работы тестировщика, что не могло не заинтересовать, т. к. в этом деле я новичок. После был обед. В дружной команде сотрудников мы не чувствовали себя лишними, нас приняли как родных, как часть команды. Плотно покушав и отдохнув мы продолжили работать. Там уже ближе был вечер и тим-билдинг. Спасибо за эту возможность.&raquo; -&nbsp;Боило Александр, студент университета им. Каразина и ХНУРЭ.</p>\r\n\r\n<p><img alt="" src="http://www.zfort.com.ua/blog/wp-content/uploads/2014/03/odin-rabochiy-den-v-Zfort-Group6.jpg" style="height:628px; width:950px" /></p>\r\n\r\n<p>&laquo;Очень, очень понравилось! Действительно почувствовал себя ПМ-ом. Обстановка и атмосфера в компании очень классная. Время просто идёт с удовольствием! Дружелюбное окружение, всё доступно, понятно и с улыбкой объясняют, очень хотелось бы у вас работать=) Спасибо вам!&raquo; -&nbsp;Алябьев Андрей, студент ХПИ.</p>\r\n\r\n<p><img alt="" src="http://www.zfort.com.ua/blog/wp-content/uploads/2014/03/odin-rabochiy-den-v-Zfort-Group4.jpg" style="height:541px; width:950px" /></p>\r\n\r\n<p>&laquo;Один рабочий день в Zfort! Сказать могу от себя много чего, но расскажу вкратце. Меня приветливо встретили и начали показывать офис компании, где, что и как функционирует, меня впечатлило. Пространства вполне достаточно, приятный интерьер помещения. Огромный конференц-зал с круглым столом. Столовая с кофе и конфетами, где меня накормили и напоили кофе:) Люди все приветливые и с чувством юмора. Проведение одного рабочего дня в Zfort &ndash; это самый лучший способ познакомиться с компанией и посмотреть, как все работает изнутри. В общем, мой рабочий день в компании оставил море положительных впечатлений! Если у кого-то выпадет шанс попасть на такой ивент &ndash; воспользуйтесь им!&raquo; -&nbsp;Никита Мозговой, студент ХНУРЭ.</p>\r\n\r\n<p><img alt="" src="http://www.zfort.com.ua/blog/wp-content/uploads/2014/03/odin-rabochiy-den-v-Zfort-Group2.jpg" style="height:642px; width:950px" /><img alt="" src="http://www.zfort.com.ua/blog/wp-content/uploads/2014/03/odin-rabochiy-den-v-Zfort-Group3.jpg" style="height:598px; width:950px" /></p>\r\n\r\n<p>Хотелось бы сердечно поблагодарить Центр Карьеры ХНУРЭ за оказанную поддержку и помощь в организации и проведении этого мероприятия. И, конечно же, спасибо нашим дорогим студентам, которые пока что только на один день, но стали полноценными сотрудниками нашей компании. Ребята, возвращайтесь!</p>\r\n\r\n<p><img alt="" src="http://www.zfort.com.ua/blog/wp-content/uploads/2014/03/odin-rabochiy-den-v-Zfort-Group.jpg" style="height:647px; width:950px" /></p>\r\n', '08.09.2014', 'ru'),
(20, 'zfort_group', 'Без назви', 'На жаль, на даний момент переклад відсутній.', 'На жаль, на даний момент переклад відсутній.', '08.09.2014', 'ua'),
(21, 'zfort_group', 'No name', 'Sorry, there is no translation for now.', 'Sorry, there is no translation for now.', '08.09.2014', 'en'),
(22, 'zfort_group_start', 'Один рабочий день в компании Zfort Group', '<p>К месяцу карьеры в одном из профильных ВУЗов Харькова &ndash; ХНУРЭ, компания Zfort Group подошла достаточно нестандартно. Часто после многих ярмарок вакансий мы осознаем, что большинство студентов могут с трудом представить, что же на самом деле значит работа в настоящей IT-компании.Как это неудивительно, но студенты любят интересоваться, как проходит рабочий день айтишника, какой график, что за проекты и заказчики.</p>\r\n', '<p>К месяцу карьеры в одном из профильных ВУЗов Харькова &ndash; ХНУРЭ, компания Zfort Group подошла достаточно нестандартно. Часто после многих ярмарок вакансий мы осознаем, что большинство студентов могут с трудом представить, что же на самом деле значит работа в настоящей IT-компании.Как это неудивительно, но студенты любят интересоваться, как проходит рабочий день айтишника, какой график, что за проекты и заказчики.</p>\r\n\r\n<p>Немного посовещавшись мы приняли решение провести среди студентов небольшое соревнование, победители которого получили сертификат на &laquo;Один рабочий день в компании Zfort Group&raquo;. Но обо всем по порядку.</p>\r\n\r\n<p>В конце прошлой недели сотрудники нашей компании отправились в ХНУРЭ, где должны были провести IT-соревнование, чтобы выявить счастливчиков, которые получат оригинальные сертификаты.</p>\r\n\r\n<p>Наши технические специалисты грамотно разработали задания, чтобы юные айтишники не только проявили свои знания, но и сами получили удовольствие от решения задач.</p>\r\n\r\n<p>Поскольку подобного рода мероприятия мы еще не проводили, то немного переживали, насколько заинтересует наш конкурс студентов. Но как только вошли в аудиторию, поняли, что переживать не стоит. Аудитория была заполнена студентами, которые с нетерпением и любопытством готовы были проявить себя.</p>\r\n\r\n<p><img alt="" src="http://www.zfort.com.ua/blog/wp-content/uploads/2014/03/knure-competition.jpg" style="height:629px; width:950px" /></p>\r\n\r\n<p>После того, как задание было решено, наш технический специалист приступил к проверке, а тем временем представители HR-отдела рассказали о Zfort Group,&nbsp;программах интернатуры&nbsp;и ответили на все вопросы студентов.</p>\r\n\r\n<p>Буквально через несколько минут мы узнали победителей конкурса, которым были вручены наши уникальные сертификаты. Победители были выявлены в следующих номинациях: 2 проектных менеджера, 1 QA, 1 back end разработчик и 1 front end разработчик.</p>\r\n\r\n<p><img alt="" src="http://www.zfort.com.ua/blog/wp-content/uploads/2014/03/knure-competition2.jpg" style="height:634px; width:950px" /><img alt="" src="http://www.zfort.com.ua/blog/wp-content/uploads/2014/03/knure-competition3.jpg" style="height:644px; width:950px" /><img alt="" src="http://www.zfort.com.ua/blog/wp-content/uploads/2014/03/knure-competition4.jpg" style="height:644px; width:950px" /></p>\r\n\r\n<p>Что же теперь ждет наших победителей? Что означает &ndash; &laquo;Один рабочий день в компании Zfort Group&raquo;?<br />\r\nСтуденты на один день превратятся в полноценных сотрудников компании. Придя на &laquo;работу&raquo;, они получат наш классический пакет для новобранцев с различными подарками. После этого будет проведена экскурсия по офису и знакомство с кураторами каждого нового &laquo;сотрудника&raquo;. В течении дня ребят ждет полноценный рабочий день &ndash; знакомство со структурой и внутренней системой компании, участие в рабочих встречах, чай/кофе, игра в настольный теннис и футбол, обед и многое другое. Студенты будут иметь возможность просто завалить вопросами наших опытных сотрудников за целый день. Мы обязательно проведем совместную фото сессию и в конце дня пожелаем скорейшего возвращения в компанию Zfort Group уже в качестве полноценных сотрудников.</p>\r\n\r\n<p>Подобный эксперимент мы проводим впервые, и если он пройдет успешно, в чем мы, собственно, не сомневаемся, то это мероприятие сделаем ежегодным для разных ВУЗов Харькова.</p>\r\n\r\n<p>В ближайшем времени ждите детальный отчет о том, как же прошел &laquo;Один рабочий день в компании Zfort Group&raquo;.</p>\r\n', '08.09.2014', 'ru'),
(23, 'zfort_group_start', 'Без назви', '<p>На жаль, на даний момент переклад відсутній.</p>\r\n', '<p>На жаль, на даний момент переклад відсутній.</p>\r\n', '08.09.2014', 'ua'),
(24, 'zfort_group_start', 'No name', '<p>Sorry, there is no translation for now.</p>\r\n', '<p>Sorry, there is no translation for now.</p>\r\n', '08.09.2014', 'en'),
(25, 'junior_technical_support', 'Молодший техничний консультант', '<p>Разом з нашими замовниками і партнерами, які відповідають за реалізацію замовлень, ти розробляєш інтернет сторінки, відомі по всій Німеччині.&nbsp;Ти працюваєш з нашою інноваційною системою управління змістом (ContentManagementSystem) і пристосовувати її до вимог та бажань наших замовників.<br />\r\nТехнічний консультант&nbsp;&ndash; це знавець продуктy, архітектор програмного забезпечення, розробник та консультант, який має вільний графік, в незалежності від проекту та працює разом з нашими замовниками та партнерами. До того ж&nbsp;ти вносиш свої знання та попередній досвід в проекти для покращення наших продуктів.</p>\r\n', '<p>Разом з нашими замовниками і партнерами, які відповідають за реалізацію замовлень, ти розробляєш інтернет сторінки, відомі по всій Німеччині.&nbsp;Ти працюваєш з нашою інноваційною системою управління змістом (ContentManagementSystem) і пристосовувати її до вимог та бажань наших замовників.<br />\r\nТехнічний консультант&nbsp;&ndash; це знавець продуктy, архітектор програмного забезпечення, розробник та консультант, який має вільний графік, в незалежності від проекту та працює разом з нашими замовниками та партнерами. До того ж&nbsp;ти вносиш свої знання та попередній досвід в проекти для покращення наших продуктів.</p>\r\n\r\n<p><strong>Що для цього потрібно?</strong><br />\r\n&nbsp;<br />\r\nВідмінно закінчена вища технічна освіта(переважно ком&#39;ютерні науки та інформаційні технології)<br />\r\nХороші практичні знання в сфері Інтернету та стандартних програм: Java, JSP, Spring, JavaScript, CSS, REST.<br />\r\nІнтерес до інновацій та нових трендів технологій (NoSQL- база данних, RIAs, Cloud-Technologies)<br />\r\nОрієнтація на замовника та важливість результатів виконаної роботи.<br />\r\nДосвід у ІТ-планування проектів(від від класичного проект-менеджменту(РМР) до Scrum)<br />\r\nБажання подорожувати<br />\r\nВідмінне володіння англійською та німецькою мовами.<br />\r\nВміння абстракно мислити, готовність розвиватися та працювати творчо<br />\r\nВміння себе проявити та координувати роботу в колективі,а також наявність комунікативних навичок</p>\r\n\r\n<p><strong>Ми пропонуємо:</strong><br />\r\n&nbsp;<br />\r\nХочеш отримати задоволення від роботи, де панує тепла атмосфера, повага та немає проблем зкерівництвом? Де гумор і професіоналізм невід&rsquo;ємні речі,а свобода дій і відповідальність взаємопов&rsquo;язані? CoreMedia&nbsp;пропонує цікаві проекти в технічній сфері, дружній колектив, підвищення кваліфікації та відповідну заробітну плату.<br />\r\n&nbsp;</p>\r\n\r\n<h3>Співробітники CoreMedia<br />\r\n&nbsp;<br />\r\n<strong><em>Наші консультанти Марія та Бьйорн розповідають про свій досвід&hellip;</em></strong></h3>\r\n\r\n<p><br />\r\n<strong>Ваші обов&rsquo;язки на підприємстві CoreMedia?</strong><br />\r\n<em>Марія:</em> Реалізація інтернет &ndash; порталів для наших замовників та підтримка відділу продаж. Я працюю в&nbsp;в області інтернет технологій таCoreMediaCMS. Крім того,&nbsp;я тісно співпрацюю з фахівцями наших замовників та партнерів.<br />\r\n<em>Бьйорн:</em>&nbsp;Моя робота &ndash; це постійні зміни. На даний момент я працюю технічним керівником проектів.&nbsp;Я відповідаю за дизайн замовлень та їх послідовне монтування. До моїх обов&rsquo;язків належить&nbsp;участь у зібраннях та оформлення документів.Крім всієї цієї роботи, я займаюся програмуванням проетів.</p>\r\n\r\n<p><br />\r\n<strong>Як виглядає твій робочий день?</strong><br />\r\n<em>Марія:</em> Мій робочий тиждень починається з відрядження, наприклад: в понеділок яїду дозамовника на його робочe місцe (Бонн, Дармштат, Мюнхен и т.д). На протязі&nbsp;чотирьох днів ми працюємо над нашим проектом і в четвер ввечері я повертаюсь в Гамбург, де наступного дня я обмінююся знаннями та досвідом зі своїми колегами.<br />\r\n<em>Бьйорн:</em>&nbsp;Мій робочий день починається з чашки кави, потім ранкове засідання працівників нашого офісу, знову кава, обід, засідання, ще одна кружка кави і кінець робочого дня&nbsp;J. Між цими важливими справами я вирішую завданнящодо проектів, в яких ми беремо участь.<br />\r\n&nbsp;<br />\r\n<strong>Якими, на вашу думку, якостями має володіти успішний технічний консультант?</strong><br />\r\n<em>Марія:</em> Хороші знання в області Javaінтернет розробки, бажання подорожувати, підтримання дружня атмосфера в колективі,&nbsp;співпраця з іншими підприємствами та зацікавленість їхніми проектами.<br />\r\n<em>Бьйорн:</em>&nbsp;Щирість, привітність, ентузіазм, впевненість в своїх силах та вміння при неохідності попросити допомоги.<br />\r\n&nbsp;<br />\r\n<strong>Що запам&rsquo;яталось тобі найбільше в діяльності підприємства CoreMedia?</strong><br />\r\n<em>Марія:</em> Успішним проектом нашого підприємства було відновлення інтернет сторінки найпопулярнішої газети Німеччини, Bild.deв березні 2011 року.&nbsp;Також мені запам&rsquo;ятавсякорпоратив нашого підприємства влітку 2009 року під девізом &laquo;Дикі 70-ті&raquo;.<br />\r\n<em>Бьйорн:</em>&nbsp;Надзвичайно цікаво спостерігати, як наш проект передається в руки замовника і починає функціонувати. Досить часто ми пересвідчуємося в багатофункціональних властивостях нашої роботи. Приємно бачити, що наші проекти дають змогу надалі креативно працювати замовникам.<br />\r\n&nbsp;<br />\r\nПідприємство Coremedia&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />\r\n&nbsp;Людвіг-Ерхард-Cтрасе 18&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />\r\n20459 Гамбург, Німеччина&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />\r\nТел: +49( 040)325587602<br />\r\nFax: +49 (040)325587999<br />\r\nE-Mail адреса: tetiana.kostiuk@coremedia.com<br />\r\n&nbsp;</p>\r\n', '08.09.2014', 'ru'),
(26, 'junior_technical_support', 'Без назви', 'На жаль, на даний момент переклад відсутній.', 'На жаль, на даний момент переклад відсутній.', '08.09.2014', 'ua'),
(27, 'junior_technical_support', 'No name', 'Sorry, there is no translation for now.', 'Sorry, there is no translation for now.', '08.09.2014', 'en');

-- --------------------------------------------------------

--
-- Структура таблицы `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `lang` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Дамп данных таблицы `page`
--

INSERT INTO `page` (`id`, `name`, `title`, `text`, `lang`) VALUES
(15, 'about_us', 'О нашем центре', '<h2 style="text-align: center;">&quot;Центр -&nbsp;Карьера&quot;</h2>\r\n\r\n<h3 style="text-align: center;">Харьковского национального университета&nbsp;радиоэлектроники</h3>\r\n\r\n<p><strong>Цель:</strong>&nbsp; Помочь студентам и выпускникам вузов создать и эффективно выполнить личный план развития профессиональной&nbsp;&nbsp;карьеры.</p>\r\n\r\n<p><strong>Задачи:</strong>&nbsp; Анализ тенденций развития рынка труда и предоставление образовательных услуг студентам и выпускникам вузов в виде консультаций, тестирования, тренингов по технологии поиска работы в рыночных условиях, а также специализированных курсов по профессиональным вопросам.</p>\r\n\r\n<p>Создание и поддержка информационных ресурсов профессиональной карьеры и трудоустройства, в т. ч. компьютерных баз данных, печатных изданий, источников в Интернет.</p>\r\n\r\n<p>Организация прямых контактов с работодателями, поддержка конкурсных отборов кандидатов, и другие формы содействия трудоустройству.</p>\r\n\r\n<p><strong>Услуги:</strong></p>\r\n\r\n<p>Карьера-центр предлагает свои услуги:</p>\r\n\r\n<ul>\r\n	<li>Студентам и выпускникам вузов</li>\r\n	<li>Предприятиям, фирмам, организациям</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>СТУДЕНТАМ И ВЫПУСКНИКАМ ВУЗОВ</h3>\r\n\r\n<p><strong><em>Провести профессиональное самооценивание</em></strong></p>\r\n\r\n<p>Проведение консультаций, проведение индивидуального тестирования и анализ его результатов.</p>\r\n\r\n<p><strong><em>Разработать план развития профессиональной карьеры</em></strong></p>\r\n\r\n<p>Обучение умению определить ближайшую и перспективную цель, определить пути достижения цели, сделать обоснованный профессиональный выбор.</p>\r\n\r\n<p><strong><em>Приобрести дополнительные профессиональные знания и навыки, необходимые для будущего места работы</em></strong></p>\r\n\r\n<p>Обучение на дополнительных специализированных факультативах, выполнение профессиональных проектов во время учебы.</p>\r\n\r\n<p><strong><em>Достать информацию относительно возможного трудоустройства или последующей учебы</em></strong></p>\r\n\r\n<p>Использование компьютерных баз данных центра, печатных изданий, ресурсов Интернета.</p>\r\n\r\n<p><strong><em>Эффективно подать себя как кандидата</em></strong></p>\r\n\r\n<p>Тренинги по технологии поиска работы, обучение правилам подготовки профессионального резюме, деловых документов, прохождения собеседований и тестов, формирования профессионального имиджа.</p>\r\n\r\n<p><strong><em>Встретиться с представителями будущего места работы или учебы</em></strong></p>\r\n\r\n<p>Организация прямых контактов с работодателями или представителями учебных заведений.</p>\r\n\r\n<p><strong><em>Начать работу по специальности</em></strong></p>\r\n\r\n<p>Проведение конкурсных отборов специалистов на заказ работодателей.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>ПРЕДПРИЯТИЯМ, ФИРМАМ, ОРГАНИЗАЦИЯМ</h3>\r\n\r\n<p><strong><em>Содействие в конкурсном отборе специалистов</em></strong></p>\r\n\r\n<p>Информирование о вакансиях предприятий, отбор кандидатов, тестирование, организация собеседований, поддержка&nbsp;всех состояний конкурсного отбора.</p>\r\n\r\n<p><strong><em>Целевую подготовку специалистов</em></strong></p>\r\n\r\n<p>Организация дополнительных специализированных курсов на заказ предприятий, отбор кандидатов среди студентов.</p>\r\n\r\n<p><strong><em>Предоставление информации о предприятии студентам и выпускникам вузов</em></strong></p>\r\n\r\n<p>Введение данных о предприятии к информационной системе центру, формирование пакета материалов о предприятии.</p>\r\n', 'ru'),
(16, 'about_us', 'Про наш центр', '<h2 style="text-align: center;">&quot;Центр -&nbsp;Кар&#39;єра&quot;</h2>\r\n\r\n<h3 style="text-align: center;">Харківського національного університету радіоелектроніки</h3>\r\n\r\n<p><strong>Мета:</strong>&nbsp; Допомогти студентам і випускникам вузів створити і ефективно виконати особистий план розвитку професійної&nbsp; кар&#39;єри.</p>\r\n\r\n<p><strong>Завдання:</strong>&nbsp;Аналіз тенденцій розвитку ринку праці і надання освітніх послуг студентам і випускникам вузів у вигляді консультацій, тестування, тренінгів за технологією пошуку роботи в ринкових умовах, а також спеціалізованих курсів з професійних питань.&nbsp; Створення і підтримка інформаційних ресурсів професійної кар&#39;єри і працевлаштування, в т.ч. комп&#39;ютерних баз даних, друкарських видань, джерел в Інтернет.&nbsp; Організація прямих контактів з працедавцями, підтримка конкурсних відборів кандидатів, і інші форми сприяння працевлаштуванню.</p>\r\n\r\n<p><strong>Послуги:</strong></p>\r\n\r\n<p>Кар&#39;єра-центр пропонує свої послуги:</p>\r\n\r\n<ul>\r\n	<li>Студентам та випускникам вузів</li>\r\n	<li>Підприємствам, фірмам, організаціям</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>СТУДЕНТАМ&nbsp;ТА ВИПУСКНИКАМ ВУЗІВ</h3>\r\n\r\n<p><em><strong>Провести професійну самооцінку</strong></em></p>\r\n\r\n<p>Проведення консультацій, проведення індивідуального тестування&nbsp;та аналіз&nbsp;його результатів.</p>\r\n\r\n<p><em><strong>Разрабити план развитку професійної кар&#39;єри</strong></em></p>\r\n\r\n<p>Навчання умінню визначити найближчу і перспективну мету, визначити шляхи досягнення мети, зробити обгрунтований професійний вибір..</p>\r\n\r\n<p><em><strong>Придбати додаткові професійні знання&nbsp;і навики, необхідні для&nbsp;майбутнього месця праці</strong></em></p>\r\n\r\n<p>Навчання на додаткових спеціалізованих факультативах, виконання професійних проектів під час навчання.</p>\r\n\r\n<p><em><strong>Дістати інформацію щодо можливого працевлаштування або подальшого навчання</strong></em></p>\r\n\r\n<p>Використання комп&#39;ютерних баз даних центру, друкарських видань, ресурсів інтернету&nbsp;</p>\r\n\r\n<p><em><strong>Эфективно подати себе&nbsp;як кандидата</strong></em></p>\r\n\r\n<p>Тренінги по технології пошуку роботи, навчання правилам підготовки професійного резюме, ділових документів, проходження співбесід і тестів, формування професійного іміджу.</p>\r\n\r\n<p><em><strong>Зустрітися з представниками майбутнього місця роботи або навчання</strong></em></p>\r\n\r\n<p>Організація прямих контактів з працедавцями або представниками учбових закладів.</p>\r\n\r\n<p><em><strong>Почати роботу за фахом</strong></em></p>\r\n\r\n<p>Проведення конкурсних відборів фахівців на замовлення працедавців.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>ПІДПРИЄМСТВАМ, ФІРМАМ, ОРГАНІЗАЦІЯМ</h3>\r\n\r\n<p><em><strong>Сприяння в конкурсному відборі фахівців</strong></em></p>\r\n\r\n<p>Інформування про вакансії підприємств, відбір кандидатів, тестування, організація співбесід, підтримка&nbsp;&nbsp; всіх станів конкурсного відбору.</p>\r\n\r\n<p><em><strong>Цільову підготовку фахівців</strong></em></p>\r\n\r\n<p>Організація додаткових спеціалізованих курсів на замовлення підприємств, відбір кандидатів серед студентів.</p>\r\n\r\n<p><em><strong>Надання інформації про підприємство студентам і випускникам вузів</strong></em></p>\r\n\r\n<p>Введення даних про підприємство до інформаційної системи центру, формування пакету матеріалів про підприємство.</p>\r\n', 'ua'),
(17, 'about_us', 'About our center', '<h2 style="text-align: center;">&nbsp;Career - Center</h2>\r\n\r\n<h3 style="text-align: center;">Kharkov national university of radioelectronics</h3>\r\n\r\n<p><strong>Purpose:&nbsp;</strong>&nbsp;To help students and graduating students of&nbsp;universities to create and effectively fulfil the personal plan of development of professional&nbsp; career.</p>\r\n\r\n<p><strong>Tasks:</strong>&nbsp; Analysis of progress of labour-market trends and grant of educational services students and graduating students of universities as consultations, testing, trainings on technology of search of work in market conditions, and also the specialized courses on professional questions.</p>\r\n\r\n<p>Creation and support of informative resources of professional career and employment, including computer databases, printing editions, sources in the Internet.</p>\r\n\r\n<p>Organization of direct contacts with employers, support of competitive selections of candidates, and other forms of assistance employment.</p>\r\n\r\n<p><strong>Services:</strong></p>\r\n\r\n<p>The Career-Center comes forward:</p>\r\n\r\n<ul>\r\n	<li>To the students and graduating students of universities</li>\r\n	<li>To the enterprises, firms, organizations</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>TO THE STUDENTS AND GRADUATING STUDENTS OF UNIVERSITIES&nbsp;</h3>\r\n\r\n<p><em><strong>To conduct a professional self-certification</strong></em></p>\r\n\r\n<p>Conducting of consultations, conducting of the individual testing and analysis of his results.</p>\r\n\r\n<p><em><strong>To develop the plan of development of professional career</strong></em></p>\r\n\r\n<p>Teaching ability to define the nearest and perspective purpuse, define the ways of achivement of purpuse, do the grounded professional choice.&nbsp;</p>\r\n\r\n<p><em><strong>To purchase additional professional knowledges and skills, necessary for future job</strong></em></p>\r\n\r\n<p>Teaching on additional specialized faculty, implementation of professional projects during studies.</p>\r\n\r\n<p><em><strong>To get information on possible employment or subsequent studies</strong></em></p>\r\n\r\n<p>Use of computer databases center, printing editions, resourses of the internet.&nbsp;</p>\r\n\r\n<p><em><strong>Effectively to give itself as a candidate</strong></em></p>\r\n\r\n<p>Trainings for technologies of search of work, teaching the rules of preparation of professional resume, business documents, passing of interview and tests, forming of professional image.</p>\r\n\r\n<p><em><strong>To meet with the representatives of future job or studies</strong></em></p>\r\n\r\n<p>Organization of direct contacts with employers or representatives of educational establishments.</p>\r\n\r\n<p><em><strong>To set to work on speciality</strong></em></p>\r\n\r\n<p>Conducting of competitive selections of specialists on the order of employers.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>TO&nbsp;THE ENTERPRISES, FIRMS, ORGANIZATIONS</h3>\r\n\r\n<p><em><strong>Assistance in the competitive selection of specialists</strong></em></p>\r\n\r\n<p>Informing about the vacancies of enterprises, selection of candidates, testing, organization of interview, support&nbsp;&nbsp; of all of the states of competitive selection.</p>\r\n\r\n<p><em><strong>Having a special purpose preparation of specialists</strong></em></p>\r\n\r\n<p>Organization of the additional specialized courses on the order of enterprises, selection of candidates among students.</p>\r\n\r\n<p><em><strong>Grant information about an enterprise to the students and graduating students of university</strong></em></p>\r\n\r\n<p>Introduction of information about an enterprise to the informative system to the center, packet of materials assembly about an enterprise.</p>\r\n', 'en');

-- --------------------------------------------------------

--
-- Структура таблицы `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `path` varchar(255) NOT NULL,
  `idGallery` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idGallery` (`idGallery`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `resume`
--

CREATE TABLE IF NOT EXISTS `resume` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `idStudent` int(11) NOT NULL COMMENT 'Студент',
  `goal` text NOT NULL COMMENT 'Цель',
  `experience` text NOT NULL COMMENT 'Опыт работы',
  `education` text NOT NULL COMMENT 'Образование',
  `knowledge` text NOT NULL COMMENT 'Профессиональные навыки и знания',
  `language` text NOT NULL COMMENT 'Знание языков',
  `personal` text NOT NULL COMMENT 'Личные качества',
  `other` text COMMENT 'Прочее',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idStudent` (`idStudent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `speciality`
--

CREATE TABLE IF NOT EXISTS `speciality` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `idUser` int(11) NOT NULL,
  `ticket` varchar(20) DEFAULT NULL,
  `group` varchar(10) DEFAULT NULL,
  `birth_date` date NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `student`
--

INSERT INTO `student` (`idUser`, `ticket`, `group`, `birth_date`) VALUES
(4, '', '', '1995-11-18');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `skype` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0 - not seen, 1 - approved, 2 - declined, 3 - banned',
  `role` int(11) NOT NULL COMMENT '1 - student, 2 - company, 10 - admin',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `name`, `email`, `date`, `skype`, `phone`, `address`, `status`, `role`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', 'admin@email.com', '2014-12-21', NULL, NULL, NULL, 1, 10),
(4, 'student', '204036a1ef6e7360e536300ea78c6aeb4a9333dd', 'Test Student', 'student@example.com', '2014-12-22', 'student', '', '', 0, 1);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`idCompany`) REFERENCES `company` (`idUser`);

--
-- Ограничения внешнего ключа таблицы `application_contact`
--
ALTER TABLE `application_contact`
  ADD CONSTRAINT `application_contact_ibfk_1` FOREIGN KEY (`idApplication`) REFERENCES `application` (`id`);

--
-- Ограничения внешнего ключа таблицы `application_job`
--
ALTER TABLE `application_job`
  ADD CONSTRAINT `application_job_ibfk_1` FOREIGN KEY (`idApplication`) REFERENCES `application` (`id`);

--
-- Ограничения внешнего ключа таблицы `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_ibfk_3` FOREIGN KEY (`idCompany`) REFERENCES `company` (`idUser`),
  ADD CONSTRAINT `job_ibfk_2` FOREIGN KEY (`idCategory`) REFERENCES `category` (`id`);

--
-- Ограничения внешнего ключа таблицы `menu_item`
--
ALTER TABLE `menu_item`
  ADD CONSTRAINT `menu_item_ibfk_1` FOREIGN KEY (`idMenu`) REFERENCES `menu` (`id`);

--
-- Ограничения внешнего ключа таблицы `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`idGallery`) REFERENCES `gallery` (`id`);

--
-- Ограничения внешнего ключа таблицы `resume`
--
ALTER TABLE `resume`
  ADD CONSTRAINT `resume_ibfk_1` FOREIGN KEY (`idStudent`) REFERENCES `student` (`idUser`);

--
-- Ограничения внешнего ключа таблицы `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
