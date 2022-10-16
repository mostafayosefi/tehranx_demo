-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 02, 2022 at 11:22 AM
-- Server version: 10.5.16-MariaDB-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tehranxe_payment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tell` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `status`, `address`, `image`, `tell`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'مدیریت سایت', 'admin@gmail.com', 'active', 'address', '/upload/images/admins/1656264928teamwork-unity.jpg', '09137775568', 'admin', '$2y$10$.BaqBC3ph5mwcZvPeH6D.egrddbiKci8Inir7iE6E1J2RQdAHftk.', NULL, '2022-06-26 16:20:54', '2022-06-26 17:35:46');

-- --------------------------------------------------------

--
-- Table structure for table `authentications`
--

CREATE TABLE `authentications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_code_verify` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verify` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `tell` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tell_code_verify` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tell_verify` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `tells` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tells_verify` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `cardmelli` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cardmelli_verify` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `selfi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selfi_verify` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `passport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_verify` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_verify` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `tells_code_verify` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authentications`
--

INSERT INTO `authentications` (`id`, `user_id`, `email`, `email_code_verify`, `email_verify`, `tell`, `tell_code_verify`, `tell_verify`, `tells`, `tells_verify`, `cardmelli`, `cardmelli_verify`, `selfi`, `selfi_verify`, `passport`, `passport_verify`, `document`, `document_verify`, `created_at`, `updated_at`, `status`, `tells_code_verify`) VALUES
(1, 1, 'mustafa1390@gmail.com', '853123', 'active', '09137775568', '994930', 'active', NULL, 'inactive', NULL, 'inactive', NULL, 'inactive', NULL, 'inactive', NULL, 'inactive', '2022-07-31 16:42:54', '2022-09-03 12:06:32', 'inactive', NULL),
(2, 4, 'pouyanfarzad@gmail.com', NULL, 'inactive', '09153036296', NULL, 'inactive', NULL, 'inactive', NULL, 'inactive', NULL, 'inactive', NULL, 'inactive', NULL, 'inactive', '2022-08-05 18:18:49', '2022-08-05 18:18:49', 'inactive', NULL),
(3, 5, 'Ranjbar.iau@gmail.com', NULL, 'inactive', '09353646702', NULL, 'inactive', NULL, 'inactive', NULL, 'inactive', NULL, 'inactive', NULL, 'inactive', NULL, 'inactive', '2022-08-06 08:35:47', '2022-08-06 08:35:47', 'inactive', NULL),
(4, 2, 'polodi@gmail.com', NULL, 'inactive', '09345553696', NULL, 'inactive', NULL, 'inactive', NULL, 'inactive', NULL, 'inactive', NULL, 'inactive', NULL, 'inactive', '2022-08-07 11:08:13', '2022-08-07 11:08:13', 'inactive', NULL),
(5, 6, 'bestmosi@gmail.com', NULL, 'inactive', '09126008606', NULL, 'inactive', NULL, 'inactive', NULL, 'inactive', NULL, 'inactive', NULL, 'inactive', NULL, 'inactive', '2022-08-08 09:02:15', '2022-08-08 09:02:15', 'inactive', NULL),
(6, 7, 'sepehri302@gmail.com', NULL, 'inactive', '09300221020', NULL, 'inactive', NULL, 'inactive', NULL, 'inactive', NULL, 'inactive', NULL, 'inactive', NULL, 'inactive', '2022-08-13 06:23:53', '2022-08-13 06:23:53', 'inactive', NULL),
(7, 9, 'mustafa13930@gmail.com', NULL, 'inactive', '09384762355', NULL, 'inactive', NULL, 'inactive', NULL, 'inactive', NULL, 'inactive', NULL, 'inactive', NULL, 'inactive', '2022-08-19 12:14:50', '2022-08-19 12:14:50', 'inactive', NULL),
(8, 10, 'mustafa13454390@gmail.com', NULL, 'inactive', '09364762275', NULL, 'inactive', '02191090711', 'active', NULL, 'inactive', NULL, 'inactive', NULL, 'inactive', NULL, 'inactive', '2022-08-19 16:23:16', '2022-09-25 09:00:39', 'inactive', NULL),
(9, 3, 'atlasimehmet99@gmail.com', NULL, 'inactive', '09134055584', '210606', 'active', NULL, 'inactive', NULL, 'inactive', NULL, 'inactive', NULL, 'inactive', NULL, 'inactive', '2022-08-20 08:04:51', '2022-09-15 20:32:49', 'inactive', NULL),
(11, 12, 'binturkish01@gmail.com', '993432', 'active', '09194148009', '692231', 'active', '02191090711', 'active', NULL, 'inactive', '/upload/images/selfi/166244660102_Bankkart_Combo_Platinum-cc534b10-9757-4877-96e7-c93c69510397.jpg', 'waiting', NULL, 'inactive', '/upload/images/document/166244660812-hours-clock-arrow-icons-delivery-service-online-deal-on-transparent-PNG.png', 'active', '2022-09-06 06:41:07', '2022-09-25 09:01:36', 'inactive', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'بانک ملی', '/upload/images/banks/1662784235بانک+ملی+ایران.jpg', 'active', '2022-09-10 04:30:35', '2022-09-10 04:30:35');

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shaba` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `default` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `bank_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comids`
--

CREATE TABLE `comids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `link`, `rate`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 'دلار', 'USD', '336000', 'active', '/upload/images/currencies/1656351794US-dollar-icon.png', '2022-06-27 17:43:15', '2022-06-27 17:52:01'),
(2, 'لیر', 'TL', '25600', 'active', '/upload/images/currencies/1656352927tl.webp', '2022-06-27 18:02:07', '2022-06-27 18:07:16'),
(3, 'یورو', 'eur', '320150', 'active', '', '2022-07-27 08:04:13', '2022-07-27 08:04:13');

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subgroup` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `short` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form_currency_id` int(11) DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `text` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `money` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `form_template_id` bigint(20) UNSIGNED NOT NULL,
  `typeservice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `name`, `form_subcategory_id`, `group`, `subgroup`, `link`, `status`, `short`, `form_currency_id`, `price`, `text`, `money`, `image`, `created_at`, `updated_at`, `form_template_id`, `typeservice`) VALUES
(2, 'خرید(شارژ) پی پال از تهرانیکس', 3, 'group_paypal', 'subgroup_paypal', 'buy_charge_paypal', 'active', 'شارژ یا انتقال وجه به حساب پی پال تنها در صورتی که حساب مقصد وریفای یا تایید شده باشد، امکان پذیر است.', 1, '0', '<p>شارژ یا انتقال وجه به حساب پی پال تنها در صورتی که حساب مقصد وریفای یا تایید شده باشد، امکان پذیر است. کارمزد انتقال پی پال ۳ الی ۷ درصد است که از حساب دریافت کننده کسر میشد، این مبلغ با توجه به کشور اکانت پی پال متفاوت است. درصورتی که قصد دارید مبلغ دقیقی به حساب پی پال مقصد واریز شود، هزینه کارمزد انتقال را در مبلغ نهایی محاسبه نمایید. در صورتی که قصد ریفاند کردن مبلغ را دارید، حتما با هماهنگی قبلی ایرانیکارت باشد و به هیج عنوان مبلغ ارزی را بدون هماهنگی به حساب های ما برگشت نزنید. دقت نمایید در صورت ریفاند کردن تراکنش بدون هماهنگی، ایرانیکارت مسئولیت آن را نخواهد پذیرفت. توجه داشتید باشید ممکن است برخی تراکنش ها با توجه به سیاست های شبکه پی پال از یک روز تا ۲۱ روز در اکانت گیرنده بصورت on hold نمایش داده شود و بعد از زمانی که توسط پی پال مشخص می شود قابل دسترس و استفاده است. انتقال وجه بصورت دلار و یورو انجام می شود و جهت انتقال وجه به ارز های دیگر (پوند، دلار کانادا، دلار استرالیا، &hellip;) می بایست از طریق پنل کاربری خود در سایت ایرانیکات از قسمت پشتیبانی - ارسال تیکت؛ مقدار مبلغی که قصد واریز کردن آن را دارید را اطلاع دهید پس از ثبت، درخواست شما توسط کارشناسان بخش کیف پول الکترونیک بررسی شده و معادل دلار آن به را شما اعلام می کنند. و سپس می توانید درخواست خود را ثبت نمایید درصورتی که قصد انتقال وجه به حساب پی پال از طریق لینک پی پال (PayPal.me/example) را داشته باشید می بایست در قسمت توضیحات لینک پی پالی که قصد ارسال به آن را دارید را وارد نمایید و همچنین در قسمت حساب پی پال آدرس ایمیل example@email.com را وارد نمایید کلیه درخواست های شارژ(خرید) پی پال از ایرانیکارت به صورت services item(goods and services) انجام میشود که در این روش کارمزد شبکه پی پال از گیرنده کسر خواهد شد و در صورتی که کاربری قصد انتقال مبلغ به صورت friend and family را دارد قبل از ثبت درخواست حتما از طریق تیکت از کارشناسان بخش کیف پول الکترونیک استعلام گرفته و در صورت تایید درخواست خود را ثبت بفرمایید. توجه داشته باشید که برای درخواست&zwnj;های فرند و فمیلی ۵ دلار هزینه انتقال به صورت فرند و فمیلی را به مبلغ نهایی خود اضافه کرده و حتما در قسمت توضیحات ذکر شود که به صورت فرند و فمیلی انتقال داده شود.</p>', '0', '/upload/images/forms/16578984278acc6e53-8921-3984-a0bf-77f530445c01.png', '2022-07-03 15:06:28', '2022-07-15 15:23:24', 2, '1'),
(3, 'دبیت کارت', 4, 'group_debit-card', 'subgroup_debit-card', 'debit-card', 'active', 'حساب بانکی شما همراه با یک دبیت کارت از شبکه ویزا از زراعت بانک کشور ترکیه افتتاح می شود.\r\nسطح کارت الکترون میباشد.\r\nنام شما روی کارت ثبت نمیشود.', 1, '65520000', '<p><span data-v-56da923f=\"\">حساب بانکی شما همراه با یک دبیت کارت از شبکه ویزا از زراعت بانک کشور ترکیه افتتاح می شود.<br />سطح کارت الکترون میباشد.<br />نام شما روی کارت ثبت نمیشود.<br />ارز پایه کارت لیر است.<br />حساب مادام العمر است و کارت بانکی نیز تاریخ انقضای ۸ ساله دارد.<br />افتتاح حساب بانکی بر پایه یورو، پوند، فرانک سوییس و لیر است که برای هر نوع حساب شماره IBAN و کد سوئیفت جداگانه ایجاد می شود.<br />حساب ها دارای اینترنت بانک و موبایل بانک و اس ام اس بانک هستند .<br />برای افتتاح حساب نیاز به بلوکه کردن مبلغی نمیباشد.<br />جهت افتتاح حساب بانکی در ترکیه حضور شخص حقیقی (با همراه داشتن پاسپورت با اعتبار حداقل ۶ ماه) در استانبول به مدت ۳ روز الزامی می باشد.</span></p>', '195', '', '2022-07-11 15:44:03', '2022-07-11 15:44:03', 3, '1'),
(4, 'شارژ پی پال (friend and family)', 3, 'group_Paypal-Friend-Family', 'subgroup_Paypal-Friend-Family', 'Paypal-Friend-Family', 'active', 'توجه داشته باشید همه ی حساب های پی پال قابلیت دریافت از طریق friend and family را ندارند و در صورتی که حساب پی پال گیرنده شما پذیرنده این شرایط هست، ثبت درخواست خود را انجام دهید.', 1, '1680000', '<p><span data-v-56da923f=\"\">توجه داشته باشید همه ی حساب های پی پال قابلیت دریافت از طریق friend and family را ندارند و در صورتی که حساب پی پال گیرنده شما پذیرنده این شرایط هست، ثبت درخواست خود را انجام دهید. <br /><br />با توجه به اینکه در انتقال وجه به صورت friend and family پس از نهایی شدن تراکنش امکان برگشت و کنسل کردن نیست، لطفا در وارد کردن مبلغ و آدرس کیف پول پی پال گیرنده دقت بفرمایید. <br /><br />کارمزد انتقال پی پال به صورت friend and family به طور میانگین ۵ دلار می&zwnj;باشد که این هزینه به مبلغ نهایی شما اضافه شده است.</span></p>', '5', '/upload/images/forms/16578982158acc6e53-8921-3984-a0bf-77f530445c01.png', '2022-07-15 15:16:55', '2022-07-15 15:16:55', 2, '1'),
(5, 'فروش پی پال به تهرانیکس', 3, 'group_salePaypal', 'subgroup_salePaypal', 'salePaypal', 'active', 'خرید پی پال از مشتری\r\n\r\n\r\nخرید پی پل فقط در صورتی که حساب های وریفای شده باشد انجام می شود.', 1, '0', '<p><span data-v-56da923f=\"\">خرید پی پال از مشتری<br /><br /><br />خرید پی پل فقط در صورتی که حساب های وریفای شده باشد انجام می شود.<br /><br /><br />اولویت خرید از کاربرانی است، که حساب پی پل آنها توسط مجموعه تهرانیکس ایجاد شده باشد.<br /><br /><br />روش نقد کردن به این صورت میباشد که می بایست میزان ارز مورد نیاز را به حساب پی پال اعلام شده از سوی ما منتقل کرده سپس اسکرین شات از رسید پرداخت ارسال نمایید و با توجه به نرخی که در سایت می باشد با شما تسویه ریالی میشود ، برای اطلاعات بیشتر با شماره های ثابت شرکت تماس حاصل فرمایید. <br /><br /><br />برای تبدیل موجودی پی پال می بایست از طریق پنل کاربری خود در سایت ایرانیکات از قسمت پشتیبانی - ارسال تیکت ؛ مقدار مبلغی که قصد نقد کردن آن را دارید را اطلاع دهید پس از ثبت، درخواست شما توسط کارشناسان بخش کیف پول الکترونیک بررسی شده و نام شما در لیست انتظار قرار گرفته میگیرد و در صورتی که نیاز به خرید پی پال داشتیم با شما تماس خواهیم گرفت.<br /><br />با توجه به تعداد بالای درخواست های فروش پی پال به تهرانیکس، و متناسب نبودن میزان عرضه و تقاضای پی پال مدت زمان جهت نقد کردن یک تا هفت روز کاری میباشد . <br /><br />در صورتی که در آمد از سایت های معتبر دارید و نیاز به اکانت پی پال جهت واریز به آن را دارید می توانید از اکانت پی پال مجموعه استفاده کنید جهت این کار درخواست خود را از طریق پنل کاربری (قسمت پشتیبانی، ارسال تیکت جدید ) ثبت نمایید تا اطلاعات حساب توسط کارشناس مربوطه برای شما ارسال شود .<br /><br /><br />واریز به حساب پی پال مجموعه فقط در صورتی که حساب ها وریفای شده و از سایت های معتبر و شناخته شده باشد انجام می شود. و در صورتی که واریز از سوی شخص باشد امکان ارسال حساب پی پال مجموعه وجود ندارد</span></p>', '0', '/upload/images/forms/16578999818acc6e53-8921-3984-a0bf-77f530445c01.png', '2022-07-15 15:46:21', '2022-07-15 15:46:21', 2, '1'),
(6, 'خرید وب مانی از تهرانیکس', 5, 'group_buywebmoney', 'subgroup_buywebmoney', 'buywebmoney', 'active', 'به منظور استفاده از خدمات شارژ وب مانی، پیش از هر چیز می بایست نسبت به تایید هویت خود در پنل کاربری - قسمت تایید مدارک اقدام کنید. و در صورتی که تمام مدارک تایید نشوند درخواست شما انجام نخواهد شد', 1, '0', '<p><span data-v-56da923f=\"\">به منظور استفاده از خدمات شارژ وب مانی، پیش از هر چیز می بایست نسبت به تایید هویت خود در پنل کاربری - قسمت تایید مدارک اقدام کنید. و در صورتی که تمام مدارک تایید نشوند درخواست شما انجام نخواهد شد<br /><br />در صورت تمایل به ارسال وجه با کد امنیتی یا توضیحات ، می توانید در زمان ثبت درخواست از قسمت توضیحات عبارت مورد نظر را وارد نمایید<br /><br />شماره کیف پول دلاری وب مانی با حرف Z آغاز می شود.<br /><br />سقف خرید وب مانی از تهرانیکس در هر پارت ۱۷۵۰ دلار است و هر پنل کاربری در هر ۲۴ ساعت مجاز به ثبت ۲ درخواست ۱۷۵۰ دلاری می&zwnj;باشد و در صورتی که بیش از ۲ بار ثبت درخواست انجام دهید، درخواست دوم به بعد شما روز بعد و همچنین با نرخ روز محاسبه و انجام می&zwnj;شود.<br /><br />با توجه به سقف و محدودیت حساب های وب مانی درصورتی که مبلغ ثبت درخواست شما بیشتر از سقف مجاز اکانت باشد، تا مبلغی که حساب اجازه انتقال دهد اکانت شما شارژ و مابقی مبلغ به حساب بانکی شما برگشت داده می&zwnj;شود. لازم به ذکر است که تسویه ریالی ۱ الی ۳ روز کاری انجام می&zwnj;گردد.<br /><br />هزینه انتقال در وب مانی 0.8 درصد است که از ارسال کننده کسر می&zwnj;شود. به این نکته دقت کنید که هزینه انتقال در مبلغ نهایی شما محاسبه شده است.<br /><br />سفارش های وبمانی بین ۵ تا ۳۰ دقیقه انجام می شود.</span></p>', '0', '/upload/images/forms/1657900794ae8aca0b-015c-3c4a-9cbf-7ba64935741d.png', '2022-07-15 15:59:54', '2022-07-15 15:59:54', 2, '1'),
(7, 'فروش وب مانی به تهرانیکس', 5, 'group_saleWebmoney', 'subgroup_saleWebmoney', 'saleWebmoney', 'active', 'برای تبدیل موجودی وب مانی می بایست از طریق پنل کاربری خود در سایت ایرانیکات از قسمت پشتیبانی - ارسال تیکت ؛ مقدار مبلغی که قصد نقد کردن آن را دارید را اطلاع دهید پس از ثبت، درخواست شما توسط کارشناسان بخش کیف پول الکترونیک بررسی شده ,نرخ و آدرس کیف پول را اعلام می کنند و هنگامی که پول را واریز کردید لازم است رسید ارایه شود. پس از واریز مبلغ ، 1 الی 3 روز کاری با شما تسویه ریالی خواهد شد.', 1, '0', '<p><span data-v-56da923f=\"\">برای تبدیل موجودی وب مانی می بایست از طریق پنل کاربری خود در سایت ایرانیکات از قسمت پشتیبانی - ارسال تیکت ؛ مقدار مبلغی که قصد نقد کردن آن را دارید را اطلاع دهید پس از ثبت، درخواست شما توسط کارشناسان بخش کیف پول الکترونیک بررسی شده ,نرخ و آدرس کیف پول را اعلام می کنند و هنگامی که پول را واریز کردید لازم است رسید ارایه شود. پس از واریز مبلغ ، 1 الی 3 روز کاری با شما تسویه ریالی خواهد شد.<br /><br />دقت نمایید در هنگام انتقال دقیقا عبارت گفته شده توسط کارشناسان را برای توضیح (Note, Description, Comment یا Transfer Details) وارد نمایید در غیر این صورت امکان تسویه ریالی نخواهد بود.<br /><br />ارسال را به صورت نرمال انجام دهید و از وارد کردن کد حفاظتی جدا خودداری نمایید <br /><br />پس از ثبت، درخواست شما توسط همکاران ما بررسی شده و در صورت تایید انتقال، پس از گذشت 1 الی 3 روز کاری معادل ریالی آن به حساب بانکی شما که در بخش حسابداری ثبت کرده اید، واریز خواهد شد. چنان چه هنوز اطلاعات حساب بانکی خود را در سیستم ثبت نکرده اید، به بخش حسابداری - ثبت حساب بانکی مراجعه کرده و اطلاعات مورد نیاز را ارسال کنید.<br /><br /><br />لطفا پس از ثبت درخواست برای پیگیری درخواست خود از طریق منوی پشتیبانی و ارسال تیکت ، با پشتیبانان ما در ارتباط باشید.</span></p>', '0', '/upload/images/forms/1657901212ae8aca0b-015c-3c4a-9cbf-7ba64935741d.png', '2022-07-15 16:06:53', '2022-07-15 16:06:53', 2, '1'),
(8, 'خرید پرفکت مانی از تهرانیکس', 6, 'group_BuyPerfectmoney', 'subgroup_BuyPerfectmoney', 'BuyPerfectmoney', 'active', 'به منظور استفاده از خدمات شارژ پرفکت مانی، پیش از هر چیز می بایست نسبت به تایید هویت خود در پنل کاربری - قسمت تایید مدارک اقدام کنید. و در صورتی که تمام مدارک تایید نشوند درخواست شما انجام نخواهد شد.', 1, '0', '<p><span data-v-56da923f=\"\">به منظور استفاده از خدمات شارژ پرفکت مانی، پیش از هر چیز می بایست نسبت به تایید هویت خود در پنل کاربری - قسمت تایید مدارک اقدام کنید. و در صورتی که تمام مدارک تایید نشوند درخواست شما انجام نخواهد شد.<br /><br />در صورت تمایل به خرید ووچر پرفکت مانی میتوانید از بخش خرید ووچر پرفکت مانی از ایرانیکارت اقدام به خرید ووچر نمایید.<br /><br />شماره کیف پول دلاری پرفکت مانی با حرف U آغاز می شود.<br /><br />سقف خرید پرفکت مانی از ایرانیکارت در هر پارت ۱۷۵۰ دلار است و هر پنل کاربری در هر ۲۴ ساعت مجاز به ثبت ۲ درخواست ۱۷۵۰ دلاری می&zwnj;باشد. در صورتی که بیش از ۲ بار ثبت درخواست انجام دهید، درخواست دوم به بعد شما روز بعد و همچنین با نرخ روز محاسبه و انجام می&zwnj;شود.<br /><br />کارمزد شبکه پرفکت مانی معادل ۰.5 درصدی است که از ارسال کننده کسر می&zwnj;شود. به این دقت توجه داشته باشید که هزینه انتقال به مبلغ نهایی شما اضافه می&zwnj;گردد.</span></p>', '0', '/upload/images/forms/1657902713bbedcd92-56d3-360e-a0aa-6c6d995c7776.png', '2022-07-15 16:31:53', '2022-07-15 16:31:54', 2, '1'),
(9, 'خرید ووچر پرفکت مانی از تهرانیکس', 6, 'group_BuyPerfectmoneyvoucher', 'subgroup_BuyPerfectmoneyvoucher', 'BuyPerfectmoneyvoucher', 'active', 'به منظور استفاده از خدمات ووچر پرفکت مانی، پیش از هر چیز می بایست نسبت به تایید هویت خود در پنل کاربری - قسمت تایید مدارک اقدام کنید. و در صورتی که تمام مدارک تایید نشوند درخواست شما انجام نخواهد شد', 1, '0', '<div class=\"row w-100 mx-0\" data-v-ea9b42a4=\"\">\r\n<div class=\"mb-2 col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12\" data-v-ea9b42a4=\"\">\r\n<div class=\"form-group\" data-v-ea9b42a4=\"\">\r\n<div class=\"card mb-3\">\r\n<div class=\"card\">\r\n<div id=\"headingOne\" class=\"card-header\"></div>\r\n<div id=\"collapse01\" class=\"collapse show\">\r\n<div class=\"card-body\">\r\n<p>به منظور استفاده از خدمات ووچر پرفکت مانی، پیش از هر چیز می بایست نسبت به تایید هویت خود در پنل کاربری - قسمت تایید مدارک اقدام کنید. و در صورتی که تمام مدارک تایید نشوند درخواست شما انجام نخواهد شد<br /><br />در صورتیکه ووچر پرفکت مانی میخواهید میتوانید در این بخش ثبت درخواست نمایید . برای درخواست شارژ حساب پرفکت مانی میتوانید از بخش خرید پرفکت مانی از تهرانیکس استفاده نمایید.<br /><br /><br />سقف خرید پرفکت مانی از تهرانیکس در هر پارت ۱۷۵۰ دلار است و هر پنل کاربری در هر ۲۴ ساعت مجاز به ثبت ۲ درخواست ۱۷۵۰ دلاری می&zwnj;باشد. در صورتی که بیش از ۲ بار ثبت درخواست انجام دهید، درخواست دوم به بعد شما روز بعد و همچنین با نرخ روز محاسبه و انجام می&zwnj;شود.<br /><br />کارمزد شبکه پرفکت مانی معادل ۰.5 درصدی است که از ارسال کننده کسر می&zwnj;شود. به این دقت توجه داشته باشید که هزینه انتقال به مبلغ نهایی شما اضافه می&zwnj;گردد.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', '0', '/upload/images/forms/1657903450bbedcd92-56d3-360e-a0aa-6c6d995c7776.png', '2022-07-15 16:44:10', '2022-07-15 16:44:10', 2, '1'),
(10, 'فروش پرفکت مانی به تهرانیکس', 6, 'group_salePerfectmoney', 'subgroup_salePerfectmoney', 'salePerfectmoney', 'active', 'برای تبدیل موجودی پرفکت مانی می بایست از طریق پنل کاربری خود در سایت تهرانیکس از قسمت پشتیبانی - ارسال تیکت ؛ مقدار مبلغی که قصد نقد کردن آن را دارید را اطلاع دهید', 1, '0', '<div class=\"row w-100 mx-0\" data-v-ea9b42a4=\"\">\r\n<div class=\"mb-2 col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12\" data-v-ea9b42a4=\"\">\r\n<div class=\"form-group\" data-v-ea9b42a4=\"\">\r\n<div class=\"card mb-3\">\r\n<div class=\"card\">\r\n<div id=\"headingOne\" class=\"card-header\"></div>\r\n<div id=\"collapse01\" class=\"collapse show\">\r\n<div class=\"card-body\">\r\n<p>برای تبدیل موجودی پرفکت مانی می بایست از طریق پنل کاربری خود در سایت تهرانیکس از قسمت پشتیبانی - ارسال تیکت ؛ مقدار مبلغی که قصد نقد کردن آن را دارید را اطلاع دهید پس از ثبت، درخواست شما توسط کارشناسان بخش کیف پول الکترونیک بررسی شده ,نرخ و آدرس کیف پول را اعلام می کنند و هنگامی که پول را واریز کردید لازم است رسید ارایه شود. پس از واریز مبلغ ، 1 الی 3 روز کاری با شما تسویه ریالی خواهد شد.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', '0', '/upload/images/forms/1657903760bbedcd92-56d3-360e-a0aa-6c6d995c7776.png', '2022-07-15 16:49:20', '2022-07-15 16:49:20', 2, '1'),
(11, 'خرید اسکریل از تهرانیکس', 7, 'group_buySkrill', 'subgroup_buySkrill', 'buySkrill', 'active', 'شارژ یا انتقال وجه به حساب اسکریل تنها در صورتی که حساب مقصد وریفای یا تایید شده باشد، انجام می شود.', 1, '0', '<p><span data-v-56da923f=\"\">شارژ یا انتقال وجه به حساب اسکریل تنها در صورتی که حساب مقصد وریفای یا تایید شده باشد، انجام می شود.<br />در ارسال آدرس حساب مقصد (آدرس ایمیل که همان آدرس حساب اسکریل شخص گیرنده خواهد بود)، دقت نمایید. در صورت ثبت اطلاعات نادرست، مبلغ پرداختی قابل بازگشت نخواهد بود.</span></p>', '0', '/upload/images/forms/1657984741b0102ee9-ca7a-3dd1-9fb8-f327cac23d01.png', '2022-07-16 15:19:01', '2022-07-16 17:14:37', 2, '1'),
(12, 'پرداخت در کلیه سایت های بین المللی', 12, 'group_international-purchase', 'subgroup_international-purchase', 'international-purchase', 'active', 'توجه داشته باشید پرداخت شما در صورت صحیح بودن اطلاعاتی که وارد می کنید بین یک تا پنج ساعت کاری انجام می شود.\r\nکارمزد خرید اینترنتی متغیر است و بستگی به مبلغ دارد .', 1, '0', '<p><span data-v-56da923f=\"\">توجه داشته باشید پرداخت شما در صورت صحیح بودن اطلاعاتی که وارد می کنید بین یک تا پنج ساعت کاری انجام می شود. <br />کارمزد خرید اینترنتی متغیر است و بستگی به مبلغ دارد . <br />اگر اطلاعات ارسالی شما صحیح نباشد تایم انجام درخواست شما از زمانی محاسبه می شود که اطلاعات صحیح را از طریق بخش پشتیبانی پنل ارسال می کنید.<br />توجه داشته باشید برخی سایت ها بر روی برخی ip ها مالیات یا کارمزد بیشتری دارند و ممکن است در هزینه نهایی درخواست شما تاثیر گذار باشد.<br />بدون هماهنگی و اطلاع قبلی به هیچ عنوان پولی به حساب های ایرانیکارت ریفاند (برگشت ) نکنید . ایرانیکارت پیگیری ریفاند را نهایتا تا سه ماه بعد از انجام خرید انجام می دهد و مسئولیتی در مورد ریفاند های بدون هماهنگی ندارد.<br />برخی پرداخت ها بخاطر مبلغ یا نوع پرداخت نیاز به زمان بیشتری برای انجام دارد لطفا به این موضوع دقت کنید.&zwj;<br />درخواست هایی که فقط درگاه پی پل دارند و ادرس ارسالی به ایران دارند قابل انجام نیستند.<br />برگشت وجه با نرخ خرید دلار اسکناس روز برگشت محاسبه می شود و کارمزد ما نیز برای خرید هایی که انجام می شوند و سپس برگشت میشوند سوخت میشود.<br />قبل از ثبت درخواست قوانین و مقررات بخش خرید را کاملا مطالعه کنید.</span></p>', '0', '/upload/images/forms/1664091938icon02.png', '2022-07-22 19:55:35', '2022-09-25 07:45:38', 4, '1'),
(13, 'ICF', 12, 'group_icf', 'subgroup_icf', 'ICF', 'active', NULL, 1, '0', '<p><span data-v-56da923f=\"\"><label data-v-68111c57=\"\">ارائه خدمات ICF<br /></label></span></p>', '0', '/upload/images/forms/1658520706adfbbbcd-da04-35a7-aef4-47791ed41c34.png', '2022-07-22 20:11:46', '2022-07-22 20:11:46', 4, '1'),
(15, 'اکانت Gold XBOX', 12, 'group_gold-xbox', 'subgroup_gold-xbox', 'gold-xbox', 'active', 'اکانت Gold XBOX', 1, '0', '<h2 class=\"main-title\">اکانت Gold XBOX</h2>\r\n<p>&nbsp;</p>', '0', '/upload/images/forms/165864023655f3efd5-f3ea-3734-841c-b4eab2e11fc0.png', '2022-07-24 05:23:56', '2022-07-24 05:23:56', 4, '1'),
(16, 'اکانت Steam', 12, 'group_steam', 'subgroup_steam', 'steam', 'active', 'اکانت Steam', 1, '0', 'اکانت Steam', '0', '/upload/images/forms/165864214795a78ec5-1b24-37fc-9fe6-510c02a2e8be.png', '2022-07-24 05:55:47', '2022-07-24 05:55:47', 4, '1'),
(17, 'اکانت Zoom', 12, 'group_Zoom', 'subgroup_Zoom', 'Zoom', 'active', 'اکانت Zoom', 1, '0', 'اکانت Zoom', '0', '/upload/images/forms/1658642612fe9f1ea1-8811-3d45-a378-6e4ba5b9156d.png', '2022-07-24 06:03:32', '2022-07-24 06:03:32', 4, '1'),
(18, 'اکانت Grammarly', 12, 'group_Grammarly', 'subgroup_Grammarly', 'Grammarly', 'active', 'اکانت Grammarly', 1, '0', 'اکانت Grammarly', '0', '/upload/images/forms/16586430861b8c9da9-fcb1-3623-87ea-bc05d2832bfe.png', '2022-07-24 06:11:26', '2022-07-24 06:11:26', 4, '1'),
(19, 'اکانت MQL5', 12, 'group_MQL5', 'subgroup_MQL5', 'MQL5', 'active', 'اکانت MQL5', 1, '0', 'اکانت MQL5', '0', '/upload/images/forms/1658643475adfd4108-755f-3f93-8b02-beac8561bad8.png', '2022-07-24 06:17:55', '2022-07-24 06:17:55', 4, '1'),
(20, 'اکانت IMDB', 12, 'group_IMDB', 'subgroup_IMDB', 'IMDB', 'active', 'اکانت IMDB', 1, '0', 'اکانت IMDB', '0', '/upload/images/forms/1658643752ec8d82da-136b-33e2-b766-306aaea789b0.png', '2022-07-24 06:22:32', '2022-07-24 06:22:32', 4, '1'),
(21, 'اکانت Netflix', 12, 'group_Netflix', 'subgroup_Netflix', 'Netflix', 'active', 'اکانت Netflix', 1, '0', 'اکانت Netflix', '0', '/upload/images/forms/165864402425353e48-d7f9-343c-96af-332031b4f4e8.png', '2022-07-24 06:27:04', '2022-07-24 06:27:04', 4, '1'),
(22, 'اکانت Freepik', 12, 'group_Freepik', 'subgroup_Freepik', 'Freepik', 'active', 'اکانت Freepik', 1, '0', 'اکانت Freepik', '0', '/upload/images/forms/1658644277d6eebf2c-aa56-39cd-aaa7-072ff83476ea.png', '2022-07-24 06:31:17', '2022-07-24 06:31:17', 4, '1'),
(23, 'اکانت Game Pass XBOX', 12, 'group_gamepass-xbox', 'subgroup_gamepass-xbox', 'gamepass-xbox', 'active', 'اکانت Game Pass XBOX', 1, '0', 'اکانت Game Pass XBOX', '0', '/upload/images/forms/165864450721306942-3a59-3bf6-b3a7-9661f8203279.png', '2022-07-24 06:35:07', '2022-07-24 06:35:07', 4, '1'),
(24, 'اکانت HBO', 12, 'group_HBO', 'subgroup_HBO', 'HBO', 'active', 'اکانت HBO', 1, '0', 'اکانت HBO', '0', '/upload/images/forms/165864521387677e81-f342-3490-89fa-afb509e6f988.png', '2022-07-24 06:46:53', '2022-07-24 06:46:53', 4, '1'),
(25, 'اکانت Dashlane', 12, 'group_Dashlane', 'subgroup_Dashlane', 'Dashlane', 'active', 'اکانت Dashlane', 1, '0', 'اکانت Dashlane', '0', '/upload/images/forms/16586455445dc0b2c2-77d6-3115-86fb-0d7e0e5bd971.png', '2022-07-24 06:52:24', '2022-07-24 06:52:24', 4, '1'),
(26, 'اکانت Scribd', 12, 'group_Scribd', 'subgroup_Scribd', 'Scribd', 'active', 'اکانت Scribd', 1, '0', 'اکانت Scribd', '0', '/upload/images/forms/16586458066d4f262c-3dec-3cf2-b203-8c24301de85c.png', '2022-07-24 06:56:46', '2022-07-24 06:56:46', 4, '1'),
(27, 'اکانت Deezer', 12, 'group_Deezer', 'subgroup_Deezer', 'Deezer', 'active', 'اکانت Deezer', 1, '0', 'اکانت Deezer', '0', '/upload/images/forms/16586464343b383d91-ebf3-37e9-8c32-0e6885f81f8b.png', '2022-07-24 07:07:14', '2022-07-24 07:07:14', 4, '1'),
(28, 'اکانت DETready', 12, 'group_detready', 'subgroup_detready', 'detready', 'active', 'اکانت DETready', 1, '0', 'اکانت DETready', '0', '/upload/images/forms/16586466632b75afc7-1c3f-3242-802e-e904f3ccca22.png', '2022-07-24 07:11:03', '2022-07-24 07:11:03', 4, '1'),
(29, 'اکانت mailerlite', 12, 'group_mailerlite', 'subgroup_mailerlite', 'mailerlite', 'active', 'اکانت mailerlite', 1, '0', 'اکانت mailerlite', '0', '/upload/images/forms/1658647568cc46de32-4f12-3bf7-8fa0-0de69d6790fd.png', '2022-07-24 07:26:08', '2022-07-24 07:26:08', 4, '1'),
(30, 'اکانت Azure + شماره اسکایپ یکماهه', 12, 'group_azure-skype1', 'subgroup_azure-skype1', 'azure-skype1', 'active', 'اکانت Azure + شماره اسکایپ یکماهه', 1, '0', 'اکانت Azure + شماره اسکایپ یکماهه', '0', '/upload/images/forms/1658647833cc138e37-7093-3b77-a870-f07adbdefd8c.png', '2022-07-24 07:30:33', '2022-07-24 07:30:33', 4, '1'),
(31, 'ICF', 12, 'group_icf', 'subgroup_icf', 'icf', 'active', 'ICF', 1, '0', 'ICF', '0', '/upload/images/forms/1658648143adfbbbcd-da04-35a7-aef4-47791ed41c34.png', '2022-07-24 07:35:43', '2022-07-24 07:35:43', 4, '1'),
(32, 'بلیط قطار', 13, 'group_train', 'subgroup_train', 'train', 'active', 'بلیط قطار', 1, '0', 'بلیط قطار', '0', '/upload/images/forms/1658651090161ee850-ea5f-3113-9475-5af8a6b7ccd7.png', '2022-07-24 08:24:50', '2022-07-24 08:24:50', 4, '1'),
(33, 'رزرو هتل بین المللی', 13, 'group_hotel-booking', 'subgroup_hotel-booking', 'hotel-booking', 'active', 'رزرو هتل بین المللی', 1, '0', 'رزرو هتل بین المللی', '0', '/upload/images/forms/1658651708c22afeda-9fd2-3a65-a1a5-a8403c215a7d.png', '2022-07-24 08:35:08', '2022-07-24 08:35:08', 4, '1'),
(34, 'پرداخت هزینه ویزا و سفارت', 13, 'group_پرداخت هزینه ویزا و سفارت', 'subgroup_پرداخت هزینه ویزا و سفارت', 'پرداخت هزینه ویزا و سفارت', 'active', 'پرداخت هزینه ویزا و سفارت', 1, '0', 'پرداخت هزینه ویزا و سفارت', '0', '/upload/images/forms/1658652229fbff9114-7d5f-3c2d-a87b-d50eca02d6b4.png', '2022-07-24 08:43:49', '2022-07-24 08:43:49', 4, '1'),
(35, 'رزرو خانه از AirBNB', 13, 'group_airbnb', 'subgroup_airbnb', 'airbnb', 'active', 'رزرو خانه از AirBNB', 1, '0', 'رزرو خانه از AirBNB', '0', '/upload/images/forms/16586587466e740de1-5357-39d1-bf6b-f0aa5d4b3eb3.png', '2022-07-24 10:32:26', '2022-07-24 10:32:26', 4, '1'),
(36, 'بلیط نمایشگاه، کنسرت و رویدادهای بین المللی', 13, 'group_events', 'subgroup_events', 'events', 'active', 'بلیط نمایشگاه، کنسرت و رویدادهای بین المللی', 1, '0', 'بلیط نمایشگاه، کنسرت و رویدادهای بین المللی', '0', '/upload/images/forms/1658659224462b782c-0134-3c81-97d6-04977a3dc688.png', '2022-07-24 10:40:24', '2022-07-24 10:40:24', 4, '1'),
(37, 'بلیط فوتبال و مسابقات ورزشی خارجی', 13, 'group_sport-champaign', 'subgroup_sport-champaign', 'sport-champaign', 'active', 'بلیط فوتبال و مسابقات ورزشی خارجی', 1, '0', 'بلیط فوتبال و مسابقات ورزشی خارجی', '0', '/upload/images/forms/16586594594137a14d-6e51-332a-b4d4-c434e6acc3c0.png', '2022-07-24 10:44:19', '2022-07-24 10:44:19', 4, '1'),
(38, 'بلیط تاکسی و ترانسفر', 13, 'group_taxi', 'subgroup_taxi', 'taxi', 'active', 'بلیط تاکسی و ترانسفر', 1, '0', 'بلیط تاکسی و ترانسفر', '0', '/upload/images/forms/16586596663b6d0715-acd8-3ba6-bfaf-1b14a43db4bb.png', '2022-07-24 10:47:46', '2022-07-24 10:47:46', 4, '1'),
(39, 'بلیط اتوبوس', 13, 'group_bus', 'subgroup_bus', 'bus', 'active', 'بلیط اتوبوس', 1, '0', 'بلیط اتوبوس', '0', '/upload/images/forms/1658660000534f9085-778c-33cb-bb6a-115e12f3391e.png', '2022-07-24 10:53:20', '2022-07-24 10:53:20', 4, '1'),
(40, 'بلیط کشتی', 13, 'group_ship', 'subgroup_ship', 'ship', 'active', 'بلیط کشتی', 1, '0', 'بلیط کشتی', '0', '/upload/images/forms/1658660319d578bdfc-9232-304c-970d-6ba7c8aa272f.png', '2022-07-24 10:58:39', '2022-07-24 10:58:39', 4, '1'),
(41, 'اکانت Booking.com', 13, 'group_Bookingcom-Account', 'subgroup_Bookingcom-Account', 'Bookingcom-Account', 'active', 'اکانت Booking.com', 1, '0', 'اکانت Booking.com', '0', '/upload/images/forms/16586606794d99cbb2-d6a5-3468-8bcb-8185cb092471.png', '2022-07-24 11:04:39', '2022-07-24 11:04:39', 4, '1'),
(42, 'بلیط هواپیما', 13, 'group_airplane', 'subgroup_airplane', 'airplane', 'active', 'بلیط هواپیما', 1, '0', 'بلیط هواپیما', '0', '/upload/images/forms/165866096599c8efc4-4940-3afa-837b-a8c272d4381b.png', '2022-07-24 11:09:25', '2022-07-24 11:09:25', 4, '1'),
(43, 'آزمون IMAT', 14, 'group_imat-test', 'subgroup_imat-test', 'imat-test', 'active', 'آزمون IMAT', 1, '0', 'آزمون IMAT', '0', '/upload/images/forms/1658726814ca8f106b-f366-3c57-b141-113a4bf0250b.png', '2022-07-25 05:26:54', '2022-07-25 05:26:54', 4, '1'),
(44, 'آزمون Prometric', 14, 'group_prometric-test', 'subgroup_prometric-test', 'prometric-test', 'active', 'آزمون Prometric', 1, '0', 'آزمون Prometric', '0', '/upload/images/forms/1658727052c5719f65-c953-3b48-9f4f-4269392ce1c4.png', '2022-07-25 05:30:52', '2022-07-25 05:30:52', 4, '1'),
(45, 'آزمون CFA', 14, 'group_cfa-test', 'subgroup_cfa-test', 'cfa-test', 'active', 'آزمون CFA', 1, '0', 'آزمون CFA', '0', '/upload/images/forms/165872729888b019cc-cb79-3213-8794-fac3eb6efb3c.png', '2022-07-25 05:34:58', '2022-07-25 05:34:58', 4, '1'),
(46, 'آزمون USMLE', 14, 'group_usmle-test', 'subgroup_usmle-test', 'usmle-test', 'active', 'آزمون USMLE', 1, '0', 'آزمون USMLE', '0', '/upload/images/forms/1658727502e3aa5778-7ffa-3ecb-a3f4-ccfa851f12c1.png', '2022-07-25 05:38:22', '2022-07-25 05:38:22', 4, '1'),
(47, 'آزمون SAT', 14, 'group_sat-test', 'subgroup_sat-test', 'sat-test', 'active', 'آزمون SAT', 1, '0', 'آزمون SAT', '0', '/upload/images/forms/165872771608746f1d-45e8-3b02-86c7-35f9075dffad.png', '2022-07-25 05:41:56', '2022-07-25 05:41:56', 4, '1'),
(48, 'آزمون PMP', 14, 'group_pmp-test', 'subgroup_pmp-test', 'pmp-test', 'active', 'آزمون PMP', 1, '0', 'آزمون PMP', '0', '/upload/images/forms/16587279200c6badeb-7c2d-3ffd-9d12-aecfaf90f927.png', '2022-07-25 05:45:20', '2022-07-25 05:45:20', 4, '1'),
(49, 'آزمون NAATI', 14, 'group_naati-test', 'subgroup_naati-test', 'naati-test', 'active', 'آزمون NAATI', 1, '0', 'آزمون NAATI', '0', '/upload/images/forms/16587281227b8465c7-25ed-3628-b4fe-cce137cc90e1.png', '2022-07-25 05:48:42', '2022-07-25 05:48:42', 4, '1'),
(50, 'آزمون IELTS Indicator', 14, 'group_ielts-indicator-test', 'subgroup_ielts-indicator-test', 'ielts-indicator-test', 'active', 'آزمون IELTS Indicator', 1, '0', 'آزمون IELTS Indicator', '0', '/upload/images/forms/16587283426ff972fd-dac2-3dee-891d-2a4cc78f7de0.png', '2022-07-25 05:52:22', '2022-07-25 05:52:22', 4, '1'),
(51, 'آزمون PTE', 14, 'group_pte-test', 'subgroup_pte-test', 'pte-test', 'active', 'آزمون PTE', 1, '0', 'آزمون PTE', '0', '/upload/images/forms/1658728538beabe8ea-de39-323d-9712-493b8c1bf680.png', '2022-07-25 05:55:38', '2022-07-25 05:55:38', 4, '1'),
(52, 'آزمون GRE', 14, 'group_gre-test', 'subgroup_gre-test', 'gre-test', 'active', 'آزمون GRE', 1, '0', 'آزمون GRE', '0', '/upload/images/forms/1658728712d3f2d496-bfbd-31eb-8d30-e35d1f0599ad.png', '2022-07-25 05:58:32', '2022-07-25 05:58:32', 4, '1'),
(53, 'آزمون IELTS', 14, 'group_ielts-test', 'subgroup_ielts-test', 'ielts-test', 'active', 'آزمون IELTS', 1, '0', 'آزمون IELTS', '0', '/upload/images/forms/16587289093f7b5eca-fd1c-30a8-b2ff-489d08fb228e.png', '2022-07-25 06:01:49', '2022-07-25 06:01:49', 4, '1'),
(54, 'آزمون TOEFL', 14, 'group_toefl-test', 'subgroup_toefl-test', 'toefl-test', 'active', 'آزمون TOEFL', 1, '0', 'آزمون TOEFL', '0', '/upload/images/forms/1658729156e06be1bf-8b69-3271-a13b-5b6543372614.png', '2022-07-25 06:05:56', '2022-07-25 06:05:56', 4, '1'),
(55, 'آزمون Duolingo', 14, 'group_Duolingo-test', 'subgroup_Duolingo-test', 'Duolingo-test', 'active', 'آزمون Duolingo', 1, '0', 'آزمون Duolingo', '0', '/upload/images/forms/165872934648c65a43-9ed0-3e77-a806-98ae9a3e060d.png', '2022-07-25 06:09:06', '2022-07-25 06:09:06', 4, '1'),
(56, 'خرید اکانت ahrefs', 15, 'group_ahrefs-account', 'subgroup_ahrefs-account', 'ahrefs-account', 'active', 'خرید اکانت ahrefs', 1, '0', 'خرید اکانت ahrefs', '0', '/upload/images/forms/16587314832fdc8d1b-5d9b-3d71-870d-e26ba9d990f7.png', '2022-07-25 06:44:43', '2022-07-25 06:44:43', 4, '1'),
(57, 'خرید اکانت SEMrush', 15, 'group_semrush-account', 'subgroup_semrush-account', 'semrush-account', 'active', 'خرید اکانت SEMrush', 1, '0', 'خرید اکانت SEMrush', '0', '/upload/images/forms/1658731917ef113632-7eac-36c6-b30c-16156d0f29f5.png', '2022-07-25 06:51:57', '2022-07-25 06:51:57', 4, '1'),
(58, 'خرید اکانت KWFinder', 15, 'group_kwfinder-account', 'subgroup_kwfinder-account', 'kwfinder-account', 'active', 'خرید اکانت KWFinder', 1, '0', 'خرید اکانت KWFinder', '0', '', '2022-07-25 06:55:24', '2022-07-25 06:55:24', 4, '1'),
(59, 'خرید اکانت KWFinder', 15, 'group_kwfinder-account', 'subgroup_kwfinder-account', 'kwfinder-account', 'active', 'خرید اکانت KWFinder', 1, '0', 'خرید اکانت KWFinder', '0', '/upload/images/forms/16587323660abbdcd2-71b3-3d20-9141-d6107b6fd446.png', '2022-07-25 06:59:26', '2022-07-25 06:59:26', 4, '1'),
(60, 'خرید اکانت WooRank', 15, 'group_woorank-account', 'subgroup_woorank-account', 'woorank-account', 'active', 'خرید اکانت WooRank', 1, '0', 'خرید اکانت WooRank', '0', '/upload/images/forms/1658732569103df21d-1a02-3a5b-b86f-6e1811a12307.png', '2022-07-25 07:02:49', '2022-07-25 07:02:49', 4, '1'),
(61, 'خرید اکانت Moz Pro', 15, 'group_moz-account', 'subgroup_moz-account', 'moz-account', 'active', 'خرید اکانت Moz Pro', 1, '0', 'خرید اکانت Moz Pro', '0', '/upload/images/forms/1658732787a0ea6bee-808e-345f-b227-615ebdfe8bea.png', '2022-07-25 07:06:27', '2022-07-25 07:06:27', 4, '1'),
(62, 'اکانت یکساله TradingView Premium', 16, 'group_tradingview-premium-1year', 'subgroup_tradingview-premium-1year', 'tradingview-premium-1year', 'active', 'اکانت یکساله TradingView Premium', 1, '0', 'اکانت یکساله TradingView Premium', '0', '/upload/images/forms/16587331608a916815-ffb2-34fb-8491-1658f2ee7a9a.png', '2022-07-25 07:12:40', '2022-07-25 07:12:40', 4, '1'),
(63, 'اکانت یکساله TradingView Pro Plus', 16, 'group_tradingview-pro-plus-1year', 'subgroup_tradingview-pro-plus-1year', 'tradingview-pro-plus-1year', 'active', 'اکانت یکساله TradingView Pro Plus', 1, '0', 'اکانت یکساله TradingView Pro Plus', '0', '/upload/images/forms/165873335207a50655-229e-31f0-8c30-7bac48cd51c6.png', '2022-07-25 07:15:52', '2022-07-25 07:15:52', 4, '1'),
(64, 'اکانت یکساله TradingView Pro', 16, 'group_tradingview-pro-1year', 'subgroup_tradingview-pro-1year', 'tradingview-pro-1year', 'active', 'اکانت یکساله TradingView Pro', 1, '0', 'اکانت یکساله TradingView Pro', '0', '/upload/images/forms/165873350369d76a09-deec-313c-96fa-db45d0834279.png', '2022-07-25 07:18:23', '2022-07-25 07:18:23', 4, '1'),
(65, 'اکانت سه ماهه TradingView Premium', 16, 'group_tradingview-premium-3month', 'subgroup_tradingview-premium-3month', 'tradingview-premium-3month', 'active', 'اکانت سه ماهه TradingView Premium', 1, '0', 'اکانت سه ماهه TradingView Premium', '0', '/upload/images/forms/165873363769d76a09-deec-313c-96fa-db45d0834279.png', '2022-07-25 07:20:37', '2022-07-25 07:20:37', 4, '1'),
(66, 'اکانت سه ماهه TradingView Pro Plus', 16, 'group_tradingview-pro-plus-3month', 'subgroup_tradingview-pro-plus-3month', 'tradingview-pro-plus-3month', 'active', 'اکانت سه ماهه TradingView Pro Plus', 1, '0', 'اکانت سه ماهه TradingView Pro Plus', '0', '/upload/images/forms/165873378425a81aac-e661-3765-842e-a9930725684e.png', '2022-07-25 07:23:04', '2022-07-25 07:23:04', 4, '1'),
(67, 'اکانت سه ماهه TradingView Pro', 16, 'group_tradingview-pro-3month', 'subgroup_tradingview-pro-3month', 'tradingview-pro-3month', 'active', 'اکانت سه ماهه TradingView Pro', 1, '10076640', '<p>اکانت سه ماهه TradingView Pro</p>', '29.99', '/upload/images/forms/1658733929c8fdeba0-50ba-3fc0-b846-51cef7885512.png', '2022-07-25 07:25:29', '2022-09-25 09:14:48', 4, '1'),
(68, 'اکانت لینکدین Recruiter Lite یک ساله', 17, 'group_linkdin-recruiter-lite-1y', 'subgroup_linkdin-recruiter-lite-1y', 'linkdin-recruiter-lite-1y', 'active', 'اکانت لینکدین Recruiter Lite یک ساله', 1, '0', 'اکانت لینکدین Recruiter Lite یک ساله', '0', '/upload/images/forms/16587343597b316dd1-1434-3459-9b5e-aa50d5ef3f56.png', '2022-07-25 07:32:39', '2022-07-25 07:32:39', 4, '1'),
(69, 'اکانت لینکدین Recruiter Lite یک ماهه', 17, 'group_linkdin-recruiter-lite-1m', 'subgroup_linkdin-recruiter-lite-1m', 'linkdin-recruiter-lite-1m', 'active', 'اکانت لینکدین Recruiter Lite یک ماهه', 1, '0', 'اکانت لینکدین Recruiter Lite یک ماهه', '0', '/upload/images/forms/16587345167b316dd1-1434-3459-9b5e-aa50d5ef3f56.png', '2022-07-25 07:35:16', '2022-07-25 07:35:16', 4, '1'),
(70, 'اکانت لینکدین Sales Navigator یک ساله', 17, 'group_linkdin-sales-navigator-1y', 'subgroup_linkdin-sales-navigator-1y', 'linkdin-sales-navigator-1y', 'active', 'اکانت لینکدین Sales Navigator یک ساله', 1, '0', 'اکانت لینکدین Sales Navigator یک ساله', '0', '/upload/images/forms/1658734665088fb413-1143-3a50-94a8-9b92f1fb129e.png', '2022-07-25 07:37:45', '2022-07-25 07:37:45', 4, '1'),
(71, 'اکانت لینکدین Sales Navigator یک ماهه', 17, 'group_linkdin-sales-navigator-1m', 'subgroup_linkdin-sales-navigator-1m', 'linkdin-sales-navigator-1m', 'active', 'اکانت لینکدین Sales Navigator یک ماهه', 1, '0', 'اکانت لینکدین Sales Navigator یک ماهه', '0', '/upload/images/forms/1658734818088fb413-1143-3a50-94a8-9b92f1fb129e.png', '2022-07-25 07:40:18', '2022-07-25 07:40:18', 4, '1'),
(72, 'اکانت لینکدین Business Plus یک ساله', 17, 'group_linkdin-business-plus-1y', 'subgroup_linkdin-business-plus-1y', 'linkdin-business-plus-1y', 'active', 'اکانت لینکدین Business Plus یک ساله', 1, '0', 'اکانت لینکدین Business Plus یک ساله', '0', '/upload/images/forms/165873496096fe94ce-2e96-3ed6-bac8-14f04372f780.png', '2022-07-25 07:42:40', '2022-07-25 07:42:40', 4, '1'),
(73, 'اکانت لینکدین Business Plus یک ماهه', 17, 'group_linkdin-business-plus-1m', 'subgroup_linkdin-business-plus-1m', 'linkdin-business-plus-1m', 'active', 'اکانت لینکدین Business Plus یک ماهه', 1, '0', 'اکانت لینکدین Business Plus یک ماهه', '0', '/upload/images/forms/165873511496fe94ce-2e96-3ed6-bac8-14f04372f780.png', '2022-07-25 07:45:15', '2022-07-25 07:45:15', 4, '1'),
(74, 'اکانت لینکدین Job Seeker یک ساله', 17, 'group_linkdin-job-seeker-1y', 'subgroup_linkdin-job-seeker-1y', 'linkdin-job-seeker-1y', 'active', 'اکانت لینکدین Job Seeker یک ساله', 1, '0', 'اکانت لینکدین Job Seeker یک ساله', '0', '/upload/images/forms/16587352580bedd851-0c72-3715-82df-db0af68ea01a.png', '2022-07-25 07:47:38', '2022-07-25 07:47:38', 4, '1'),
(75, 'اکانت لینکدین Job Seeker یک ماهه', 17, 'group_linkdin-job-seeker-1m', 'subgroup_linkdin-job-seeker-1m', 'linkdin-job-seeker-1m', 'active', 'اکانت لینکدین Job Seeker یک ماهه', 1, '0', 'اکانت لینکدین Job Seeker یک ماهه', '0', '/upload/images/forms/16587353800bedd851-0c72-3715-82df-db0af68ea01a.png', '2022-07-25 07:49:40', '2022-07-25 07:49:40', 4, '1'),
(76, 'اکانت تریال یک ماهه Canva', 18, 'group_canva-trial', 'subgroup_canva-trial', 'canva-trial', 'active', 'اکانت تریال یک ماهه Canva', 1, '0', 'اکانت تریال یک ماهه Canva', '0', '/upload/images/forms/165873568746ee1aaa-dd14-3074-8d77-d8cb038d660c.png', '2022-07-25 07:54:47', '2022-07-25 07:54:47', 4, '1'),
(77, 'اکانت یکساله Canva', 18, 'group_canva-yearly', 'subgroup_canva-yearly', 'canva-yearly', 'active', 'اکانت یکساله Canva', 1, '0', 'اکانت یکساله Canva', '0', '/upload/images/forms/16587358404f08e246-3a71-301b-9f8c-4dba857a29e8.png', '2022-07-25 07:57:20', '2022-07-25 07:57:20', 4, '1'),
(78, 'اکانت یک ماهه Canva', 18, 'group_canva-1month', 'subgroup_canva-1month', 'canva-1month', 'active', 'اکانت یک ماهه Canva', 1, '0', 'اکانت یک ماهه Canva', '0', '/upload/images/forms/1658736072ebfb497a-b164-3229-a349-7f73aa7baa14.png', '2022-07-25 08:01:12', '2022-07-25 08:01:12', 4, '1'),
(79, 'اکانت یکساله Disney Plus', 19, 'group_DisneyPlus-1y', 'subgroup_DisneyPlus-1y', 'DisneyPlus-1y', 'active', 'اکانت یکساله Disney Plus', 1, '0', 'اکانت یکساله Disney Plus', '0', '/upload/images/forms/1658736349d41e7540-3ad1-39f3-89aa-5246d61c4428.png', '2022-07-25 08:05:49', '2022-07-25 08:05:49', 4, '1'),
(80, 'اکانت یک ماهه Disney Plus', 19, 'group_DisneyPlus-1m', 'subgroup_DisneyPlus-1m', 'DisneyPlus-1m', 'active', 'اکانت یک ماهه Disney Plus', 1, '0', 'اکانت یک ماهه Disney Plus', '0', '/upload/images/forms/165873661960db8959-1c46-3b63-952f-83c6950edffa.png', '2022-07-25 08:10:19', '2022-07-25 08:10:19', 4, '1'),
(81, 'اکانت یکساله PlayStation Plus Premium', 20, 'group_playstation-plus-premium-1year', 'subgroup_playstation-plus-premium-1year', 'playstation-plus-premium-1year', 'active', 'اکانت یکساله PlayStation Plus Premium', 1, '0', 'اکانت یکساله PlayStation Plus Premium', '0', '/upload/images/forms/165873817267349cda-14a4-39b4-8725-f3681baf0aba.png', '2022-07-25 08:36:12', '2022-07-25 08:36:12', 4, '1'),
(82, 'اکانت سه ماهه PlayStation Plus Premium', 20, 'group_playstation-plus-premium-3month', 'subgroup_playstation-plus-premium-3month', 'playstation-plus-premium-3month', 'active', 'اکانت سه ماهه PlayStation Plus Premium', 1, '0', 'اکانت سه ماهه PlayStation Plus Premium', '0', '/upload/images/forms/1658738316da5d1341-5cca-31da-a5a4-d27c2924410e.png', '2022-07-25 08:38:36', '2022-07-25 08:38:36', 4, '1'),
(83, 'اکانت یک ماهه PlayStation Plus Premium', 20, 'group_playstation-plus-premium-1month', 'subgroup_playstation-plus-premium-1month', 'playstation-plus-premium-1month', 'active', 'اکانت یک ماهه PlayStation Plus Premium', 1, '0', 'اکانت یک ماهه PlayStation Plus Premium', '0', '/upload/images/forms/1658738446945a2ada-e2b1-38cc-aa03-84c6cc4d5132.png', '2022-07-25 08:40:46', '2022-07-25 08:40:46', 4, '1'),
(84, 'اکانت یکساله PlayStation Plus Extra', 20, 'group_playstation-plus-extra-1year', 'subgroup_playstation-plus-extra-1year', 'playstation-plus-extra-1year', 'active', 'اکانت یکساله PlayStation Plus Extra', 1, '0', 'اکانت یکساله PlayStation Plus Extra', '0', '/upload/images/forms/165873858389b428c9-7c38-3b9e-b040-8fb01d85d1fa.png', '2022-07-25 08:43:03', '2022-07-25 08:43:03', 4, '1'),
(85, 'اکانت سه ماهه PlayStation Plus Extra', 20, 'group_playstation-plus-extra-3month', 'subgroup_playstation-plus-extra-3month', 'playstation-plus-extra-3month', 'active', 'اکانت سه ماهه PlayStation Plus Extra', 1, '0', 'اکانت سه ماهه PlayStation Plus Extra', '0', '/upload/images/forms/165873875229bc97a9-1778-3166-92a5-2feeca06c2f2.png', '2022-07-25 08:45:52', '2022-07-25 08:45:52', 4, '1'),
(86, 'اکانت یک ماهه PlayStation Plus Extra', 20, 'group_playstation-plus-extra-1month', 'subgroup_playstation-plus-extra-1month', 'playstation-plus-extra-1month', 'active', 'اکانت یک ماهه PlayStation Plus Extra', 1, '0', 'اکانت یک ماهه PlayStation Plus Extra', '0', '/upload/images/forms/1658738923d26b7f73-2fe8-3f29-814c-980215035751.png', '2022-07-25 08:48:43', '2022-07-25 08:48:43', 4, '1'),
(87, 'اکانت یکساله PlayStation Plus Essential', 20, 'group_playstation-plus-essential-1year', 'subgroup_playstation-plus-essential-1year', 'playstation-plus-essential-1year', 'active', 'اکانت یکساله PlayStation Plus Essential', 1, '0', 'اکانت یکساله PlayStation Plus Essential', '0', '/upload/images/forms/16587390610cd703e7-bd68-3291-b94b-7cd02c1b75fd.png', '2022-07-25 08:51:01', '2022-07-25 08:51:01', 4, '1'),
(88, 'اکانت سه ماهه PlayStation Plus Essential', 20, 'group_playstation-plus-essential-3month', 'subgroup_playstation-plus-essential-3month', 'playstation-plus-essential-3month', 'active', 'اکانت سه ماهه PlayStation Plus Essential', 1, '0', 'اکانت سه ماهه PlayStation Plus Essential', '0', '/upload/images/forms/1658739208a68d9b58-85ce-37a1-a688-cad56e557814.png', '2022-07-25 08:53:28', '2022-07-25 08:53:28', 4, '1'),
(89, 'اکانت یک ماهه PlayStation Plus Essential', 20, 'group_playstation-plus-essential-1month', 'subgroup_playstation-plus-essential-1month', 'playstation-plus-essential-1month', 'active', 'اکانت یک ماهه PlayStation Plus Essential', 1, '0', 'اکانت یک ماهه PlayStation Plus Essential', '0', '/upload/images/forms/1658739347005c2347-6417-3ec9-a814-4e66e309072e.png', '2022-07-25 08:55:47', '2022-07-25 08:55:47', 4, '1'),
(90, 'اکانت یکساله Skype', 21, 'group_Skype-1-year', 'subgroup_Skype-1-year', 'Skype-1-year', 'active', 'اکانت یکساله Skype', 1, '0', 'اکانت یکساله Skype', '0', '/upload/images/forms/165873958060a8616c-8a14-3b1a-9575-039174fce62c.png', '2022-07-25 08:59:40', '2022-07-25 08:59:40', 4, '1'),
(91, 'اکانت سه ماهه Skype', 21, 'group_Skype-3-Month', 'subgroup_Skype-3-Month', 'Skype-3-Month', 'active', 'اکانت سه ماهه Skype', 1, '0', 'اکانت سه ماهه Skype', '0', '/upload/images/forms/165873975017d2c768-d980-3853-a4f3-b24dce6901da.png', '2022-07-25 09:02:30', '2022-07-25 09:02:30', 4, '1'),
(92, 'اکانت یک ماهه Skype', 21, 'group_Onlineshopping/Skype-1-Month', 'subgroup_Onlineshopping/Skype-1-Month', 'Onlineshopping/Skype-1-Month', 'active', 'اکانت یک ماهه Skype', 1, '0', 'اکانت یک ماهه Skype', '0', '/upload/images/forms/1658739920e443f0e9-8727-3f6a-9c77-6a1bda2698d2.png', '2022-07-25 09:05:20', '2022-07-25 09:05:20', 4, '1'),
(93, 'Skype', 22, 'group_Skype-gift-card', 'subgroup_Skype-gift-card', 'Skype-gift-card', 'active', 'Skype', 1, '0', 'Skype', '0', '/upload/images/forms/16587692069b3d5bdd-b7d7-38ca-8fc9-8978407df258.png', '2022-07-25 17:13:26', '2022-07-25 17:13:26', 1, '1'),
(94, 'Netflix', 22, 'group_netflix', 'subgroup_netflix', 'netflix', 'active', 'Netflix', 1, '0', 'Netflix', '0', '/upload/images/forms/16587693145ce03fbe-122e-37a9-b31e-ab6c92a4ac25.png', '2022-07-25 17:15:14', '2022-07-25 17:15:14', 1, '1'),
(95, 'Spotify', 22, 'group_Spotify', 'subgroup_Spotify', 'Spotify', 'active', 'Spotify', 1, '0', 'Spotify', '0', '/upload/images/forms/165882153371c590b2-6edd-3316-a9d1-af513a09c70d.png', '2022-07-26 07:45:33', '2022-07-26 07:45:33', 1, '1'),
(96, 'Amazon', 22, 'group_amazon-gift-card', 'subgroup_amazon-gift-card', 'amazon-gift-card', 'active', 'Amazon', 1, '0', 'Amazon', '0', '/upload/images/forms/16588216147663f660-8888-3d69-a6c3-d60b563e8f3f.png', '2022-07-26 07:46:54', '2022-07-26 07:46:54', 1, '1'),
(97, 'Apple', 22, 'group_apple', 'subgroup_apple', 'apple', 'active', 'Apple', 1, '0', 'Apple', '0', '/upload/images/forms/165882168803341152-c91a-377f-b601-f05d9a7f5d40.png', '2022-07-26 07:48:08', '2022-07-26 07:48:08', 1, '1'),
(98, 'Target', 22, 'group_target', 'subgroup_target', 'target', 'active', 'Target', 1, '0', 'Target', '0', '/upload/images/forms/16588217597ea95ac7-1348-3a8f-b9a3-fd3c1156a892.png', '2022-07-26 07:49:19', '2022-07-26 07:49:19', 1, '1'),
(99, 'Hulu', 22, 'group_hulu', 'subgroup_hulu', 'hulu', 'active', 'Hulu', 1, '0', 'Hulu', '0', '/upload/images/forms/1658821884611fa9d9-dec8-3286-bd00-b963a67d2249.png', '2022-07-26 07:51:24', '2022-07-26 07:51:24', 1, '1'),
(100, 'Karma Koin', 22, 'group_karmakoingift', 'subgroup_karmakoingift', 'karmakoingift', 'active', 'Karma Koin', 1, '0', 'Karma Koin', '0', '/upload/images/forms/1658821952a342f859-4d52-3629-b4e2-1ee47efce07c.png', '2022-07-26 07:52:32', '2022-07-26 07:52:32', 1, '1'),
(101, 'OpenBucks', 22, 'group_openbucks', 'subgroup_openbucks', 'openbucks', 'active', 'OpenBucks', 1, '0', 'OpenBucks', '0', '/upload/images/forms/16588220211828ef70-c80b-35aa-8413-e037d776c75b.png', '2022-07-26 07:53:41', '2022-07-26 07:53:41', 1, '1'),
(102, 'Apple Music', 22, 'group_apple-music', 'subgroup_apple-music', 'apple-music', 'active', 'Apple Music', 1, '0', 'Apple Music', '0', '/upload/images/forms/165882209958655bbf-23c4-3527-80e3-a886a79c1be9.png', '2022-07-26 07:54:59', '2022-07-26 07:54:59', 1, '1'),
(103, 'Battle.net', 23, 'group_battlenet-gift', 'subgroup_battlenet-gift', 'battlenet-gift', 'active', 'Battle.net', 1, '0', 'Battle.net', '0', '/upload/images/forms/165882232099a9453f-6433-3dc4-b486-66ad842e3dbc.png', '2022-07-26 07:58:40', '2022-07-26 07:58:40', 1, '1'),
(104, 'Twitch', 22, 'group_twitch', 'subgroup_twitch', 'twitch', 'active', 'Twitch', 1, '0', 'Twitch', '0', '/upload/images/forms/16588224874795b305-c92b-3970-a71d-e9bdfadfad69.png', '2022-07-26 08:01:27', '2022-07-26 08:01:27', 1, '1'),
(105, 'Origin', 23, 'group_origin-gift-card', 'subgroup_origin-gift-card', 'origin-gift-card', 'active', 'Origin', 1, '0', 'Origin', '0', '/upload/images/forms/16588228062d5b2119-f1e8-39ed-9d3a-d7436b71cc29.png', '2022-07-26 08:06:46', '2022-07-26 08:06:46', 1, '1'),
(106, 'Razer Gold', 23, 'group_razer-gold-gift', 'subgroup_razer-gold-gift', 'razer-gold-gift', 'active', 'Razer Gold', 1, '0', 'Razer Gold', '0', '/upload/images/forms/16588228927f3e7d1d-f858-3263-8f18-6f6fb9875c70.png', '2022-07-26 08:08:12', '2022-07-26 08:08:12', 1, '1'),
(107, 'Steam', 23, 'group_Steam', 'subgroup_Steam', 'Steam', 'active', 'Steam', 1, '0', 'Steam', '0', '/upload/images/forms/165882309522dff54d-a7ad-3d71-bcfd-4aebb4b4ff9f.png', '2022-07-26 08:11:35', '2022-07-26 08:11:35', 1, '1'),
(108, 'PlayStation', 23, 'group_playstation', 'subgroup_playstation', 'playstation', 'active', 'PlayStation', 1, '0', 'PlayStation', '0', '/upload/images/forms/16588231914179455d-766e-3e8d-be30-33e41767aacb.png', '2022-07-26 08:13:11', '2022-07-26 08:13:11', 1, '1'),
(109, 'Xbox', 23, 'group_xbox', 'subgroup_xbox', 'xbox', 'active', 'Xbox', 1, '0', 'Xbox', '0', '/upload/images/forms/16588232906e8cabb3-e744-3039-a979-5868b1a73f2b.png', '2022-07-26 08:14:50', '2022-07-26 08:14:50', 1, '1'),
(110, 'Minecraft Java Edition', 23, 'group_minecraft-java-edition', 'subgroup_minecraft-java-edition', 'minecraft-java-edition', 'active', 'Minecraft Java Edition', 1, '0', 'Minecraft Java Edition', '0', '', '2022-07-26 09:23:57', '2022-07-26 09:23:57', 1, '1'),
(111, 'Minecraft Coins', 23, 'group_minecraft-coins', 'subgroup_minecraft-coins', 'minecraft-coins', 'active', 'Minecraft Coins', 1, '0', 'Minecraft Coins', '0', '/upload/images/forms/16588275106fc445f9-0faa-33d3-a283-6268d254ac15.png', '2022-07-26 09:25:10', '2022-07-26 09:25:10', 1, '1'),
(112, 'EA Play', 23, 'group_eaplay', 'subgroup_eaplay', 'eaplay', 'active', 'EA Play', 1, '0', 'EA Play', '0', '/upload/images/forms/1658827593eca03bad-383a-35f6-9f39-e738112285de.png', '2022-07-26 09:26:33', '2022-07-26 09:26:33', 1, '1'),
(113, 'XBOX Live Gold', 23, 'group_xbox-live-gold', 'subgroup_xbox-live-gold', 'xbox-live-gold', 'active', 'XBOX Live Gold', 1, '0', 'XBOX Live Gold', '0', '/upload/images/forms/1658827665a87ff9d6-6d33-3c94-aa6d-f53b242a01d0.png', '2022-07-26 09:27:45', '2022-07-26 09:27:45', 1, '1'),
(114, 'RIOT ACCESS', 23, 'group_riot-access', 'subgroup_riot-access', 'riot-access', 'active', 'RIOT ACCESS', 1, '0', 'RIOT ACCESS', '0', '/upload/images/forms/1658827740df30173b-2725-3bb1-bc71-96651df7cea6.png', '2022-07-26 09:29:00', '2022-07-26 09:29:00', 1, '1'),
(115, 'Valorant', 23, 'group_valorant', 'subgroup_valorant', 'valorant', 'active', 'Valorant', 1, '0', 'Valorant', '0', '/upload/images/forms/16588278325e1772fb-8305-30ec-bbfd-5c573dc394bd.png', '2022-07-26 09:30:32', '2022-07-26 09:30:32', 1, '1'),
(116, 'League of Legends', 23, 'group_league-of-legends', 'subgroup_league-of-legends', 'league-of-legends', 'active', 'League of Legends', 1, '0', 'League of Legends', '0', '/upload/images/forms/16588279083a2ec6e8-0bd1-375f-b8ea-24ff3ecdbd2d.png', '2022-07-26 09:31:48', '2022-07-26 09:31:48', 1, '1'),
(117, 'Xbox game pass ultimate', 23, 'group_game-pass-ultimate', 'subgroup_game-pass-ultimate', 'game-pass-ultimate', 'active', 'Xbox game pass ultimate', 1, '0', 'Xbox game pass ultimate', '0', '/upload/images/forms/1658827992a3941f24-9c82-30a1-aa93-6fa86e239e75.png', '2022-07-26 09:33:12', '2022-07-26 09:33:12', 1, '1'),
(118, 'Roblox', 23, 'group_roblox-gift', 'subgroup_roblox-gift', 'roblox-gift', 'active', 'Roblox', 1, '0', 'Roblox', '0', '/upload/images/forms/16588280588ceee92c-8dc0-3c78-b102-e30975f0eac9.png', '2022-07-26 09:34:18', '2022-07-26 09:34:18', 1, '1'),
(119, 'Nintendo', 23, 'group_nintendo-gift', 'subgroup_nintendo-gift', 'nintendo-gift', 'active', 'Nintendo', 1, '0', 'Nintendo', '0', '/upload/images/forms/16588281252e24ae2b-86c2-3c9c-bff0-5dceb273796b.png', '2022-07-26 09:35:25', '2022-07-26 09:35:25', 1, '1'),
(120, 'Free Fire', 23, 'group_freefire', 'subgroup_freefire', 'freefire', 'active', 'Free Fire', 1, '0', 'Free Fire', '0', '/upload/images/forms/1658828189ff185af7-e770-3b71-8053-be022c65540e.png', '2022-07-26 09:36:29', '2022-07-26 09:36:29', 1, '1'),
(121, 'GameStop', 23, 'group_gamestop', 'subgroup_gamestop', 'gamestop', 'active', 'GameStop', 1, '0', 'GameStop', '0', '/upload/images/forms/16588282644d3d88b3-3c36-3189-b469-f2e348516c8d.png', '2022-07-26 09:37:44', '2022-07-26 09:37:44', 1, '1'),
(122, 'PUBG', 23, 'group_pubg-gift', 'subgroup_pubg-gift', 'pubg-gift', 'active', 'PUBG', 1, '0', 'PUBG', '0', '/upload/images/forms/16588283305ebe746e-f177-3524-9f79-08aa78a28844.png', '2022-07-26 09:38:50', '2022-07-26 09:38:50', 1, '1'),
(123, 'PlayStation Plus', 23, 'group_playstationplus', 'subgroup_playstationplus', 'playstationplus', 'active', 'PlayStation Plus', 1, '0', 'PlayStation Plus', '0', '/upload/images/forms/1658828395fa9def74-987b-3a2f-a9ba-a4b437110d08.png', '2022-07-26 09:39:55', '2022-07-26 09:39:55', 1, '1'),
(124, 'افتتاح حساب پی پال آسیایی با کارت اعتباری 1 ساله', 24, 'group_paypal-verified', 'subgroup_paypal-verified', 'paypal-verified', 'active', 'افتتاح حساب پی پال آسیایی با کارت اعتباری 1 ساله', 1, '16464000', 'افتتاح حساب پی پال آسیایی با کارت اعتباری 1 ساله', '49', '/upload/images/forms/1658899337eaf33cd1-b8a8-3b65-a182-73f9a5990c78.png', '2022-07-27 05:22:17', '2022-07-27 05:22:17', 5, '1'),
(125, 'افتتاح حساب پی پال اروپایی + کارت ۵ ساله', 24, 'group_paypal-eur-5years-card', 'subgroup_paypal-eur-5years-card', 'paypal-eur-5years-card', 'active', 'افتتاح حساب پی پال اروپایی + کارت ۵ ساله', 1, '29904000', 'افتتاح حساب پی پال اروپایی + کارت ۵ ساله', '89', '', '2022-07-27 06:09:58', '2022-07-27 06:09:58', 5, '1');
INSERT INTO `forms` (`id`, `name`, `form_subcategory_id`, `group`, `subgroup`, `link`, `status`, `short`, `form_currency_id`, `price`, `text`, `money`, `image`, `created_at`, `updated_at`, `form_template_id`, `typeservice`) VALUES
(126, 'افتتاح حساب پی پال اروپایی با کارت اعتباری 1 ساله', 24, 'group_paypal-eur', 'subgroup_paypal-eur', 'paypal-eur', 'active', 'افتتاح حساب پی پال اروپایی با کارت اعتباری 1 ساله', 1, '23184000', 'افتتاح حساب پی پال اروپایی با کارت اعتباری 1 ساله', '69', '/upload/images/forms/1658902288bf1fbd30-a3b9-39e9-bfa5-aa4f8bbe334f.png', '2022-07-27 06:11:28', '2022-07-27 06:11:28', 5, '1'),
(127, 'افتتاح اکانت پی پال آسیایی با کارت اعتباری ۵ ساله + VPS سه ماهه', 24, 'group_full-paypal-account--vps-3month', 'subgroup_full-paypal-account--vps-3month', 'full-paypal-account--vps-3month', 'active', 'افتتاح اکانت پی پال آسیایی با کارت اعتباری ۵ ساله + VPS سه ماهه', 1, '29904000', 'افتتاح اکانت پی پال آسیایی با کارت اعتباری ۵ ساله + VPS سه ماهه', '89', '/upload/images/forms/1658902407fdb588ab-6295-3c8a-afe5-6eba3bb73548.png', '2022-07-27 06:13:27', '2022-07-27 06:13:27', 5, '1'),
(128, 'افتتاح اکانت پی پال آسیایی با کارت اعتباری ۱ ساله + VPS سه ماهه', 24, 'group_paypal-account-vps-3month', 'subgroup_paypal-account-vps-3month', 'paypal-account-vps-3month', 'active', 'افتتاح اکانت پی پال آسیایی با کارت اعتباری ۱ ساله + VPS سه ماهه', 1, '26544000', 'افتتاح اکانت پی پال آسیایی با کارت اعتباری ۱ ساله + VPS سه ماهه', '79', '/upload/images/forms/1658902514fdb588ab-6295-3c8a-afe5-6eba3bb73548.png', '2022-07-27 06:15:14', '2022-07-27 06:15:14', 5, '1'),
(129, 'افتتاح اکانت پی پال آسیایی با کارت اعتباری ۱ ساله + VPS یک ماهه', 24, 'group_paypal-account-vps-1month', 'subgroup_paypal-account-vps-1month', 'paypal-account-vps-1month', 'active', 'افتتاح اکانت پی پال آسیایی با کارت اعتباری ۱ ساله + VPS یک ماهه', 1, '19824000', 'افتتاح اکانت پی پال آسیایی با کارت اعتباری ۱ ساله + VPS یک ماهه', '59', '/upload/images/forms/1658902604f132dd43-1657-3d2b-a255-d83b90307062.png', '2022-07-27 06:16:44', '2022-07-27 06:16:44', 5, '1'),
(130, 'افتتاح اکانت پی پال آسیایی با کارت اعتباری 5 ساله', 24, 'group_longpaypalaccount', 'subgroup_longpaypalaccount', 'longpaypalaccount', 'active', 'افتتاح اکانت پی پال آسیایی با کارت اعتباری 5 ساله', 1, '26544000', 'افتتاح اکانت پی پال آسیایی با کارت اعتباری 5 ساله', '79', '/upload/images/forms/1658902683195b075f-1a55-3c4e-a59a-749fb5f86430.png', '2022-07-27 06:18:03', '2022-07-27 06:18:03', 5, '1'),
(131, 'شماره مجازی مخصوص پی پال', 24, 'group_virtual-number-fo-paypal', 'subgroup_virtual-number-fo-paypal', 'virtual-number-fo-paypal', 'active', 'شماره مجازی مخصوص پی پال', 1, '3360000', 'شماره مجازی مخصوص پی پال', '10', '/upload/images/forms/1658902778067b4132-d16f-3704-935f-5e6bb93deb83.png', '2022-07-27 06:19:38', '2022-07-27 06:19:38', 5, '1'),
(132, 'باز کردن اکانت لیمیت شده پی پال مشتریان غیر ایرانیکارت', 24, 'group_unblock-paypal-acc-non-clients', 'subgroup_unblock-paypal-acc-non-clients', 'unblock-paypal-acc-non-clients', 'active', 'باز کردن اکانت لیمیت شده پی پال مشتریان غیر ایرانیکارت', 1, '15120000', 'باز کردن اکانت لیمیت شده پی پال مشتریان غیر ایرانیکارت', '45', '/upload/images/forms/1658902885eaf33cd1-b8a8-3b65-a182-73f9a5990c78.png', '2022-07-27 06:21:25', '2022-07-27 06:21:25', 6, '1'),
(133, 'باز کردن اکانت لیمیت شده پی پال مشتریان ایرانیکارت', 24, 'group_unblock-paypal-acc', 'subgroup_unblock-paypal-acc', 'unblock-paypal-acc', 'active', 'باز کردن اکانت لیمیت شده پی پال مشتریان ایرانیکارت', 1, '3360000', 'باز کردن اکانت لیمیت شده پی پال مشتریان ایرانیکارت', '10', '/upload/images/forms/1658902977eaf33cd1-b8a8-3b65-a182-73f9a5990c78.png', '2022-07-27 06:22:57', '2022-07-27 06:22:57', 6, '1'),
(134, 'اکانت ترایال یک ماهه Hulu', 25, 'group_hulu', 'subgroup_hulu', 'hulu', 'active', 'اکانت ترایال یک ماهه Hulu', 1, '1680000', 'اکانت ترایال یک ماهه Hulu', '5', '/upload/images/forms/1658904194c1794f5d-7842-3158-a065-da38cdc11042.png', '2022-07-27 06:43:14', '2022-07-27 06:43:14', 6, '1'),
(135, 'اکانت ترایال یک ماهه Linkedin', 25, 'group_Linkedin', 'subgroup_Linkedin', 'Linkedin', 'active', 'اکانت ترایال یک ماهه Linkedin', 1, '1680000', 'اکانت ترایال یک ماهه Linkedin', '5', '/upload/images/forms/1658904303ee97960f-efd9-3dfe-b8b5-974c7d9247f3.png', '2022-07-27 06:45:03', '2022-07-27 06:45:05', 6, '1'),
(136, 'Linkedin', 25, 'group_youtube-trial', 'subgroup_youtube-trial', 'youtube-trial', 'active', 'Linkedin', 1, '1680000', 'Linkedin', '5', '/upload/images/forms/1658904442f83eae53-f877-3840-9bf3-a14057e2db03.png', '2022-07-27 06:47:22', '2022-07-27 06:47:22', 5, '1'),
(137, 'اکانت ترایال یک ماهه Spotify خانواده (پرمیوم)', 25, 'group_Service', 'subgroup_Service', 'Service', 'active', 'اکانت ترایال یک ماهه Spotify خانواده (پرمیوم)', 1, '1680000', 'اکانت ترایال یک ماهه Spotify خانواده (پرمیوم)', '5', '/upload/images/forms/16589045513deba859-f1c7-3847-abc4-d213e1fc88ed.png', '2022-07-27 06:49:11', '2022-07-27 06:49:11', 5, '1'),
(138, 'اکانت ترایال یک ماهه TradingView', 25, 'group_TradingView', 'subgroup_TradingView', 'TradingView', 'active', 'اکانت ترایال یک ماهه TradingView', 1, '1680000', 'اکانت ترایال یک ماهه TradingView', '5', '/upload/images/forms/165890484712a03578-8def-3cdf-8ee4-d61c78499595.png', '2022-07-27 06:54:07', '2022-07-27 06:54:07', 6, '1'),
(139, 'اکانت ترایال یک ماهه SoundCloud', 25, 'group_SoundCloud-Trial', 'subgroup_SoundCloud-Trial', 'SoundCloud-Trial', 'active', 'اکانت ترایال یک ماهه SoundCloud', 1, '1680000', 'اکانت ترایال یک ماهه SoundCloud', '5', '/upload/images/forms/165890500116370865-5ee6-3d88-bf3d-011206e5f36c.png', '2022-07-27 06:56:41', '2022-07-27 06:56:41', 6, '1'),
(140, 'اکانت ترایال یک ماهه Spotify', 25, 'group_Spotify-Trial', 'subgroup_Spotify-Trial', 'Spotify-Trial', 'active', 'اکانت ترایال یک ماهه Spotify', 1, '1680000', 'اکانت ترایال یک ماهه Spotify', '5', '/upload/images/forms/1658905143540e0031-0fdf-3b6b-9512-34fbd1d15b9a.png', '2022-07-27 06:59:03', '2022-07-27 06:59:03', 5, '1'),
(141, 'اکانت ترایال سایت مورد نظر شما', 25, 'group_trial', 'subgroup_trial', 'trial', 'active', 'اکانت ترایال سایت مورد نظر شما', 1, '1680000', 'اکانت ترایال سایت مورد نظر شما', '5', '/upload/images/forms/1658905289bc4c08ac-b5aa-30f2-b694-2e40921010f9.png', '2022-07-27 07:01:29', '2022-07-27 07:01:29', 5, '1'),
(142, 'اکانت دولوپر اپل + VPS + سیم‌کارت', 26, 'group_apple-developer-account', 'subgroup_apple-developer-account', 'apple-developer-account', 'active', 'اکانت دولوپر اپل + VPS + سیم‌کارت', 1, '80304000', 'اکانت دولوپر اپل + VPS + سیم‌کارت', '239', '/upload/images/forms/1658905465d0aa1296-aaab-3df2-96dc-bf0d94587db0.png', '2022-07-27 07:04:25', '2022-07-27 07:04:25', 5, '1'),
(143, 'اکانت کانتریبیوتر شاتراستاک', 26, 'group_shutterstock', 'subgroup_shutterstock', 'shutterstock', 'active', 'اکانت کانتریبیوتر شاتراستاک', 1, '26544000', 'اکانت کانتریبیوتر شاتراستاک', '79', '/upload/images/forms/165890553683c486fa-5186-31c0-98a6-c6641a166939.png', '2022-07-27 07:05:36', '2022-07-27 07:05:36', 5, '1'),
(144, 'ارتقا اکانت وب مانی از الیاس به فرمال', 26, 'group_upgrade-webmoney', 'subgroup_upgrade-webmoney', 'upgrade-webmoney', 'active', 'ارتقا اکانت وب مانی از الیاس به فرمال', 1, '2688000', 'ارتقا اکانت وب مانی از الیاس به فرمال', '8', '/upload/images/forms/16589056099cfc7db9-191f-3905-8ba8-546c0f103983.png', '2022-07-27 07:06:49', '2022-07-27 07:06:49', 5, '1'),
(145, 'افتتاح حساب Payeer', 26, 'group_payeer-verified', 'subgroup_payeer-verified', 'payeer-verified', 'active', 'افتتاح حساب Payeer', 1, '9744000', 'افتتاح حساب Payeer', '29', '/upload/images/forms/165890567787d0eef3-ee0d-3c0a-8832-8d8a4cd2d44e.png', '2022-07-27 07:07:57', '2022-07-27 07:07:57', 5, '1'),
(146, 'اکانت دولوپر گوگل', 26, 'group_google-developer-account', 'subgroup_google-developer-account', 'google-developer-account', 'active', 'اکانت دولوپر گوگل', 1, '29904000', 'اکانت دولوپر گوگل', '89', '/upload/images/forms/16589057554fc9ad7a-3a27-3300-ac01-7054218d8f1b.png', '2022-07-27 07:09:15', '2022-07-27 07:09:15', 5, '1'),
(147, 'افتتاح حساب پرفکت مانی', 26, 'group_perfect-money-account', 'subgroup_perfect-money-account', 'perfect-money-account', 'active', 'افتتاح حساب پرفکت مانی', 1, '9744000', 'افتتاح حساب پرفکت مانی', '29', '/upload/images/forms/1658905857e82e3842-1636-3f5c-bf48-e34910eea29a.png', '2022-07-27 07:10:57', '2022-07-27 07:10:57', 5, '1'),
(148, 'افتتاح حساب وب مانی (فرمال پاسپورت)', 26, 'group_webmoney-account', 'subgroup_webmoney-account', 'webmoney-account', 'active', 'افتتاح حساب وب مانی (فرمال پاسپورت)', 1, '3696000', 'افتتاح حساب وب مانی (فرمال پاسپورت)', '11', '/upload/images/forms/1658905933209be722-559c-3bc3-a815-59584e31eb44.png', '2022-07-27 07:12:13', '2022-07-27 07:12:13', 5, '1'),
(149, 'افتتاح اکانت Razer امریکا + شماره مجازی امریکا و 1200 Silver point', 27, 'group_razer-us-with-virtual-number', 'subgroup_razer-us-with-virtual-number', 'razer-us-with-virtual-number', 'active', 'افتتاح اکانت Razer امریکا + شماره مجازی امریکا و 1200 Silver point', 1, '6384000', 'افتتاح اکانت Razer امریکا + شماره مجازی امریکا و 1200 Silver point', '19', '/upload/images/forms/16589061002df95687-a58a-397b-bf19-fbb07cd4d6e1.png', '2022-07-27 07:15:00', '2022-07-27 07:15:00', 6, '1'),
(150, 'شارژ سیم کارت بین المللی EE', 27, 'group_simcard-ee-charge', 'subgroup_simcard-ee-charge', 'simcard-ee-charge', 'active', 'شارژ سیم کارت بین المللی EE', 1, '1680000', 'شارژ سیم کارت بین المللی EE', '5', '/upload/images/forms/165890618123d5cd47-7dcd-3aee-9936-56dee4926480.png', '2022-07-27 07:16:21', '2022-07-27 07:16:21', 6, '1'),
(151, 'شارژ سیم کارت استونی', 27, 'group_simcard-st-charge', 'subgroup_simcard-st-charge', 'simcard-st-charge', 'active', 'شارژ سیم کارت استونی', 1, '0', 'شارژ سیم کارت استونی', '0', '/upload/images/forms/1658906376812606cb-1003-301a-a9a4-56f04484d41f.png', '2022-07-27 07:19:36', '2022-07-27 07:19:36', 6, '1'),
(152, 'سیم کارت فیزیکی استونی', 27, 'group_simcard-st', 'subgroup_simcard-st', 'simcard-st', 'active', 'سیم کارت فیزیکی استونی', 1, '14784000', 'سیم کارت فیزیکی استونی', '44', '/upload/images/forms/1658906486fa0a5acf-555d-3ff0-baee-159b01659c7f.png', '2022-07-27 07:21:26', '2022-07-27 07:21:26', 6, '1'),
(153, 'سیم کارت بین المللی EE', 27, 'group_simcard-EE', 'subgroup_simcard-EE', 'simcard-EE', 'active', 'سیم کارت بین المللی EE', 1, '9744000', 'سیم کارت بین المللی EE', '29', '/upload/images/forms/1658907806fa364fb6-71bf-3611-8eb5-f85641aafadf.png', '2022-07-27 07:43:26', '2022-07-27 07:43:26', 6, '1'),
(154, 'ووچر آزمون PTE', 27, 'group_pte-voucher', 'subgroup_pte-voucher', 'pte-voucher', 'active', 'ووچر آزمون PTE', 2, '55040000', 'ووچر آزمون PTE', '2150', '/upload/images/forms/1658907954755e6128-43c4-32b9-9360-c6f9e1bbb08c.png', '2022-07-27 07:45:54', '2022-07-27 07:45:54', 5, '1'),
(155, 'ووچر آزمون GRE', 27, 'group_GRE-Voucher', 'subgroup_GRE-Voucher', 'GRE-Voucher', 'active', 'ووچر آزمون GRE', 1, '73920000', 'ووچر آزمون GRE', '220', '/upload/images/forms/1658908067887449b5-678f-3d39-9b79-ef90a2e73c47.png', '2022-07-27 07:47:47', '2022-07-27 07:47:47', 5, '1'),
(156, 'ووچر آزمون TOEFL', 27, 'group_TOEFL-Voucher', 'subgroup_TOEFL-Voucher', 'TOEFL-Voucher', 'active', 'ووچر آزمون TOEFL', 1, '89040000', 'ووچر آزمون TOEFL', '265', '/upload/images/forms/165890818057f44f10-b081-3c1d-8f9f-172e226a53ab.png', '2022-07-27 07:49:40', '2022-07-27 07:49:40', 5, '1'),
(157, 'شماره مجازی امریکا', 27, 'group_USA-Virtual-Number', 'subgroup_USA-Virtual-Number', 'USA-Virtual-Number', 'active', 'شماره مجازی امریکا', 1, '3696000', 'شماره مجازی امریکا', '11', '/upload/images/forms/16589083096c40f24b-5d24-3f7d-b2a1-31dbe302f929.png', '2022-07-27 07:51:49', '2022-07-27 07:51:49', 5, '1'),
(158, 'الیپال جوی Ellipal Joy', 28, 'group_ellipal-joy', 'subgroup_ellipal-joy', 'ellipal-joy', 'active', 'الیپال جوی Ellipal Joy', 1, '19824000', 'الیپال جوی Ellipal Joy', '59', '/upload/images/forms/16589085206ede79e0-273a-3502-83c8-a4fe40ba74a3.png', '2022-07-27 07:55:20', '2022-07-27 07:55:20', 6, '1'),
(159, 'محافظ فلزی عبارات بازیابی الیپال Ellipal Mnemonic Metal', 28, 'group_ellipal-mnemonic-metal', 'subgroup_ellipal-mnemonic-metal', 'ellipal-mnemonic-metal', 'active', 'محافظ فلزی عبارات بازیابی الیپال Ellipal Mnemonic Metal', 1, '23184000', 'محافظ فلزی عبارات بازیابی الیپال Ellipal Mnemonic Metal', '69', '/upload/images/forms/1658908598529086bb-2d8d-33ff-85bc-0b9c80cbd4a8.png', '2022-07-27 07:56:38', '2022-07-27 07:56:38', 6, '1'),
(160, 'Ledger Nano S Plus', 28, 'group_ledger-nano-s-plus', 'subgroup_ledger-nano-s-plus', 'ledger-nano-s-plus', 'active', 'Ledger Nano S Plus', 1, '31920000', 'Ledger Nano S Plus', '95', '/upload/images/forms/16589086785583d86b-9938-30d5-a892-b2d65c02de9b.png', '2022-07-27 07:57:58', '2022-07-27 07:57:58', 6, '1'),
(161, 'Ledger Nano X جعبه سیاه', 28, 'group_ledger-nano-x-2022', 'subgroup_ledger-nano-x-2022', 'ledger-nano-x-2022', 'active', 'Ledger Nano X جعبه سیاه', 1, '52080000', 'Ledger Nano X جعبه سیاه', '155', '/upload/images/forms/16589087625583d86b-9938-30d5-a892-b2d65c02de9b.png', '2022-07-27 07:59:22', '2022-07-27 07:59:22', 6, '1'),
(162, 'Safepal', 28, 'group_safepal', 'subgroup_safepal', 'safepal', 'active', 'Safepal', 1, '19824000', 'Safepal', '59', '/upload/images/forms/1658908873c69e90a7-fd30-37c7-9537-ab49bb216fc1.png', '2022-07-27 08:01:13', '2022-07-27 08:01:13', 6, '1'),
(163, 'Ledger Nano S France', 28, 'group_ledger-nano-s-france', 'subgroup_ledger-nano-s-france', 'ledger-nano-s-france', 'active', 'Ledger Nano S France', 1, '19824000', 'Ledger Nano S France', '59', '/upload/images/forms/16589089525583d86b-9938-30d5-a892-b2d65c02de9b.png', '2022-07-27 08:02:32', '2022-07-27 08:02:32', 6, '1'),
(164, 'هودلر دیسک', 28, 'group_hodlr-disk', 'subgroup_hodlr-disk', 'hodlr-disk', 'active', 'هودلر دیسک', 1, '50064000', 'هودلر دیسک', '149', '/upload/images/forms/165890903137f158b1-5089-3a13-8506-a156deb7a4f5.png', '2022-07-27 08:03:51', '2022-07-27 08:03:51', 6, '1'),
(165, 'ELLIPAL Titan', 28, 'group_ellipal-titan', 'subgroup_ellipal-titan', 'ellipal-titan', 'active', 'ELLIPAL Titan', 1, '50400000', 'ELLIPAL Titan', '150', '/upload/images/forms/1658909117715ea0a5-6b29-342f-a4ad-3aa548abc145.png', '2022-07-27 08:05:17', '2022-07-27 08:05:17', 6, '1'),
(166, 'CoolWallet S x Binance Chain', 28, 'group_coolWallet-s-binance-chainw', 'subgroup_coolWallet-s-binance-chainw', 'coolWallet-s-binance-chainw', 'active', 'CoolWallet S x Binance Chain', 1, '17472000', 'CoolWallet S x Binance Chain', '52', '/upload/images/forms/16589092007f180750-9ff2-3638-99e6-9252f3f2a7a6.png', '2022-07-27 08:06:40', '2022-07-27 08:06:40', 6, '1'),
(167, 'CoolWallet S x MyEtherWallet', 28, 'group_coolwallet-s--myetherwallet', 'subgroup_coolwallet-s--myetherwallet', 'coolwallet-s--myetherwallet', 'active', 'CoolWallet S x MyEtherWallet', 1, '17472000', 'CoolWallet S x MyEtherWallet', '52', '/upload/images/forms/16589092797f180750-9ff2-3638-99e6-9252f3f2a7a6.png', '2022-07-27 08:07:59', '2022-07-27 08:07:59', 6, '1'),
(168, 'JuBiter Blade', 28, 'group_JuBiter-blade', 'subgroup_JuBiter-blade', 'JuBiter-blade', 'active', 'JuBiter Blade', 1, '47040000', 'JuBiter Blade', '140', '/upload/images/forms/1658909352322f9465-d0f5-34c5-9383-bf9c895fd059.png', '2022-07-27 08:09:12', '2022-07-27 08:09:12', 6, '1'),
(169, 'پکیج کیف پول Cool Wallet S و Cool Wallet Pro', 28, 'group_cool-wallet-package', 'subgroup_cool-wallet-package', 'cool-wallet-package', 'active', 'پکیج کیف پول Cool Wallet S و Cool Wallet Pro', 1, '59472000', 'پکیج کیف پول Cool Wallet S و Cool Wallet Pro', '177', '/upload/images/forms/16589094387f180750-9ff2-3638-99e6-9252f3f2a7a6.png', '2022-07-27 08:10:38', '2022-07-27 08:10:38', 6, '1'),
(170, 'پکیج کیف پول Cool Wallet S و Nano S', 28, 'group_cool-wallet-nano-s', 'subgroup_cool-wallet-nano-s', 'cool-wallet-nano-s', 'active', 'پکیج کیف پول Cool Wallet S و Nano S', 1, '38976000', 'پکیج کیف پول Cool Wallet S و Nano S', '116', '/upload/images/forms/165890957279839af2-02e8-3e85-bdaf-e0353d36358a.png', '2022-07-27 08:12:52', '2022-07-27 08:12:52', 6, '1'),
(171, 'پکیج کیف پول Nano X و Nano S رنگی', 28, 'group_nano-x-nano-s-c', 'subgroup_nano-x-nano-s-c', 'nano-x-nano-s-c', 'active', 'پکیج کیف پول Nano X و Nano S رنگی', 1, '71232000', 'پکیج کیف پول Nano X و Nano S رنگی', '212', '/upload/images/forms/16589096585583d86b-9938-30d5-a892-b2d65c02de9b.png', '2022-07-27 08:14:18', '2022-07-27 08:14:18', 6, '1'),
(172, 'پکیج کیف پول Nano S و Nano S رنگی', 28, 'group_nano-s-nano-s-c', 'subgroup_nano-s-nano-s-c', 'nano-s-nano-s-c', 'active', 'پکیج کیف پول Nano S و Nano S رنگی', 1, '38976000', 'پکیج کیف پول Nano S و Nano S رنگی', '116', '/upload/images/forms/16589097635583d86b-9938-30d5-a892-b2d65c02de9b.png', '2022-07-27 08:16:03', '2022-07-27 08:16:03', 6, '1'),
(173, 'پکیج کیف پول Nano S و Nano X', 28, 'group_nano-s-nano-x', 'subgroup_nano-s-nano-x', 'nano-s-nano-x', 'active', 'پکیج کیف پول Nano S و Nano X', 1, '71232000', 'پکیج کیف پول Nano S و Nano X', '212', '/upload/images/forms/16589098455583d86b-9938-30d5-a892-b2d65c02de9b.png', '2022-07-27 08:17:25', '2022-07-27 08:17:25', 6, '1'),
(174, 'دو عدد Ledger Nano S', 28, 'group_nano-s-package', 'subgroup_nano-s-package', 'nano-s-package', 'active', 'دو عدد Ledger Nano S', 1, '38976000', 'دو عدد Ledger Nano S', '116', '/upload/images/forms/16589099145583d86b-9938-30d5-a892-b2d65c02de9b.png', '2022-07-27 08:18:34', '2022-07-27 08:18:34', 6, '1'),
(175, 'Digital Bitbox', 28, 'group_Digital-Bitbox', 'subgroup_Digital-Bitbox', 'Digital-Bitbox', 'active', 'Digital Bitbox', 1, '52080000', 'Digital Bitbox', '155', '/upload/images/forms/1658910003d309a012-29d0-3be5-8f1a-7f83bb3112d2.png', '2022-07-27 08:20:03', '2022-07-27 08:20:03', 6, '1'),
(176, 'CoolWallet Pro', 28, 'group_CoolWalletPro', 'subgroup_CoolWalletPro', 'CoolWalletPro', 'active', 'CoolWallet Pro', 1, '43008000', 'CoolWallet Pro', '128', '/upload/images/forms/1658910075e36294b3-249d-3910-b943-30254226d1fb.png', '2022-07-27 08:21:15', '2022-07-27 08:21:15', 6, '1'),
(177, 'CoolWallet S طرح خاورمیانه', 28, 'group_CoolWallet-S-middleeast', 'subgroup_CoolWallet-S-middleeast', 'CoolWallet-S-middleeast', 'active', 'CoolWallet S طرح خاورمیانه', 1, '17472000', 'CoolWallet S طرح خاورمیانه', '52', '/upload/images/forms/16589101572b38ae23-2f23-3211-acbd-d16e2a520e1c.png', '2022-07-27 08:22:37', '2022-07-27 08:22:37', 6, '1'),
(178, 'SecuX W20', 28, 'group_SecuX-W20', 'subgroup_SecuX-W20', 'SecuX-W20', 'active', 'SecuX W20', 1, '55440000', 'SecuX W20', '165', '/upload/images/forms/1658910241ff6d5751-b423-3951-ad25-86cf8d9e6c2e.png', '2022-07-27 08:24:01', '2022-07-27 08:24:01', 6, '1'),
(179, 'SecuX V20', 28, 'group_SecuX-V20', 'subgroup_SecuX-V20', 'SecuX-V20', 'active', 'SecuX V20', 1, '77280000', 'SecuX V20', '230', '/upload/images/forms/1658910312257f97b1-3b00-3f5b-8c11-4961eea60003.png', '2022-07-27 08:25:12', '2022-07-27 08:25:12', 6, '1'),
(180, 'CoolWallet S', 28, 'group_CoolWallet-S', 'subgroup_CoolWallet-S', 'CoolWallet-S', 'active', 'CoolWallet S', 1, '17472000', 'CoolWallet S', '52', '/upload/images/forms/1658910377de7c736e-0cd4-3eca-9b0a-4d8883cc7818.png', '2022-07-27 08:26:17', '2022-07-27 08:26:17', 6, '1'),
(181, 'Keepkey رنگی', 28, 'group_Keepkey-colorful', 'subgroup_Keepkey-colorful', 'Keepkey-colorful', 'active', 'Keepkey رنگی', 1, '19824000', 'Keepkey رنگی', '59', '/upload/images/forms/1658910460290d5b3a-1c34-346e-b795-77b20d79f37a.png', '2022-07-27 08:27:40', '2022-07-27 08:27:40', 6, '1'),
(182, 'Trezor One', 28, 'group_trezor-one', 'subgroup_trezor-one', 'trezor-one', 'active', 'Trezor One', 1, '23856000', 'Trezor One', '71', '/upload/images/forms/1658910545741423c3-58a1-339d-a2a6-7d1b9b72fefd.png', '2022-07-27 08:29:05', '2022-07-27 08:29:05', 6, '1'),
(183, 'Trezor T', 28, 'group_trezor-t', 'subgroup_trezor-t', 'trezor-t', 'active', 'Trezor T', 1, '62160000', 'Trezor T', '185', '/upload/images/forms/1658910643741423c3-58a1-339d-a2a6-7d1b9b72fefd.png', '2022-07-27 08:30:43', '2022-07-27 08:30:43', 6, '1'),
(184, 'KeepKey', 28, 'group_keepkey', 'subgroup_keepkey', 'keepkey', 'active', 'KeepKey', 1, '19824000', 'KeepKey', '59', '/upload/images/forms/16589107289b7caa22-de92-38e8-9430-67d853462917.png', '2022-07-27 08:32:08', '2022-07-27 08:32:08', 6, '1'),
(185, 'Ledger Nano S رنگی فرانسه', 28, 'group_ledger-nano-s-colorful', 'subgroup_ledger-nano-s-colorful', 'ledger-nano-s-colorful', 'active', 'Ledger Nano S رنگی فرانسه', 1, '19824000', 'Ledger Nano S رنگی فرانسه', '59', '/upload/images/forms/16589108135583d86b-9938-30d5-a892-b2d65c02de9b.png', '2022-07-27 08:33:33', '2022-07-27 08:33:33', 6, '1'),
(186, 'سرور مجازی ترید پلن ۱', 29, 'group_vps-trade1', 'subgroup_vps-trade1', 'vps-trade1', 'active', 'سرور مجازی ترید پلن ۱', 1, '3696000', 'سرور مجازی ترید پلن ۱', '11', '/upload/images/forms/1658917500ebb92fdc-cef9-391f-85c4-b95974240237.png', '2022-07-27 10:25:00', '2022-07-27 10:25:00', 5, '1'),
(187, 'سرور مجازی ترید پلن 2', 29, 'group_vps-trade2', 'subgroup_vps-trade2', 'vps-trade2', 'active', 'سرور مجازی ترید پلن 2', 1, '5040000', 'سرور مجازی ترید پلن 2', '15', '/upload/images/forms/16589175814505932d-f89b-3d93-bd09-1e3588249fc5.png', '2022-07-27 10:26:21', '2022-07-27 10:26:21', 5, '1'),
(188, 'سرور مجازی ترید پلن 3', 29, 'group_vps-trade3', 'subgroup_vps-trade3', 'vps-trade3', 'active', 'سرور مجازی ترید پلن 3', 1, '6720000', 'سرور مجازی ترید پلن 3', '20', '/upload/images/forms/1658917659c83f9266-cc29-381a-a113-24a314283b04.png', '2022-07-27 10:27:39', '2022-07-27 10:27:39', 5, '1'),
(189, 'سرور مجازی ترید پلن 4', 29, 'group_vps-trade4', 'subgroup_vps-trade4', 'vps-trade4', 'active', 'سرور مجازی ترید پلن 4', 1, '8400000', 'سرور مجازی ترید پلن 4', '25', '/upload/images/forms/1658917735843324e0-4939-3ff6-9bc3-9fe55f98520b.png', '2022-07-27 10:28:55', '2022-07-27 10:28:55', 5, '1'),
(190, 'سرور مجازی یک ماهه رومانی', 29, 'group_vps-romania', 'subgroup_vps-romania', 'vps-romania', 'active', 'سرور مجازی یک ماهه رومانی', 1, '2688000', 'سرور مجازی یک ماهه رومانی', '8', '/upload/images/forms/1658917855acfdbe72-6779-3dfc-abf0-7fa13e317656.png', '2022-07-27 10:30:55', '2022-07-27 10:30:55', 5, '1'),
(191, 'سرور مجازی یک ماهه رومانی', 29, 'group_vps-romania', 'subgroup_vps-romania', 'vps-romania', 'active', 'سرور مجازی یک ماهه رومانی', 1, '2688000', 'سرور مجازی یک ماهه رومانی', '8', '/upload/images/forms/1658918038acfdbe72-6779-3dfc-abf0-7fa13e317656.png', '2022-07-27 10:33:58', '2022-07-27 10:33:58', 5, '1'),
(192, 'سرور مجازی یک ماهه هنگ کنگ', 29, 'group_vps-hongkong', 'subgroup_vps-hongkong', 'vps-hongkong', 'active', 'سرور مجازی یک ماهه هنگ کنگ', 1, '2688000', 'سرور مجازی یک ماهه هنگ کنگ', '8', '/upload/images/forms/1658918155664b1011-0c46-3662-be49-2feaf14ebd1b.png', '2022-07-27 10:35:55', '2022-07-27 10:35:55', 5, '1'),
(193, 'سرور مجازی یک روزه', 29, 'group_vps-1day', 'subgroup_vps-1day', 'vps-1day', 'active', 'سرور مجازی یک روزه', 1, '672000', 'سرور مجازی یک روزه', '2', '/upload/images/forms/165891828673aa5e0e-21e5-3487-b3ec-4716298982af.png', '2022-07-27 10:38:06', '2022-07-27 10:38:06', 5, '1'),
(194, 'سرور مجازی پنج روزه', 29, 'group_vps-5day', 'subgroup_vps-5day', 'vps-5day', 'active', 'سرور مجازی پنج روزه', 1, '1008000', 'سرور مجازی پنج روزه', '3', '/upload/images/forms/1658918366b4335f6e-446d-3ed1-992b-3cf4d70acc31.png', '2022-07-27 10:39:26', '2022-07-27 10:39:26', 5, '1'),
(195, 'سرور مجازی یک ماهه ایتالیا', 29, 'group_vps-italy', 'subgroup_vps-italy', 'vps-italy', 'active', 'سرور مجازی یک ماهه ایتالیا', 1, '5040000', 'سرور مجازی یک ماهه ایتالیا', '15', '/upload/images/forms/165891844911be9717-0fd3-37a2-bb59-30b128a0d7eb.png', '2022-07-27 10:40:49', '2022-07-27 10:40:49', 5, '1'),
(196, 'سرور مجازی یک ماهه اسپانیا', 29, 'group_vps-spain', 'subgroup_vps-spain', 'vps-spain', 'active', 'سرور مجازی یک ماهه اسپانیا', 1, '5040000', 'سرور مجازی یک ماهه اسپانیا', '15', '/upload/images/forms/1658918513d1901d82-d53d-3249-9544-ead390143a34.png', '2022-07-27 10:41:53', '2022-07-27 10:41:53', 5, '1'),
(197, 'سرور مجازی یک ماهه جمهوری چک', 29, 'group_vps-czechia', 'subgroup_vps-czechia', 'vps-czechia', 'active', 'سرور مجازی یک ماهه جمهوری چک', 1, '5040000', 'سرور مجازی یک ماهه جمهوری چک', '15', '/upload/images/forms/1658918579c3c27cfc-3bff-3145-91ac-7bc911c7bdf3.png', '2022-07-27 10:42:59', '2022-07-27 10:42:59', 5, '1'),
(198, 'سرور مجازی یک ماهه فنلاند', 29, 'group_vps-finland', 'subgroup_vps-finland', 'vps-finland', 'active', 'سرور مجازی یک ماهه فنلاند', 1, '3360000', 'سرور مجازی یک ماهه فنلاند', '10', '/upload/images/forms/165891871164df1ef6-9ed8-370d-9e7f-0933c6c8b95e.png', '2022-07-27 10:45:11', '2022-07-27 10:45:11', 5, '1'),
(199, 'سرور مجازی یک ماهه اتریش', 29, 'group_vps-austria', 'subgroup_vps-austria', 'vps-austria', 'active', 'سرور مجازی یک ماهه اتریش', 1, '2688000', 'سرور مجازی یک ماهه اتریش', '8', '/upload/images/forms/1658918783d6abe73b-0ab8-3b78-bd7c-7744646d6f4b.png', '2022-07-27 10:46:23', '2022-07-27 10:46:23', 5, '1'),
(200, 'سرور مجازی یک ماهه سوئد', 29, 'group_vps-sweden', 'subgroup_vps-sweden', 'vps-sweden', 'active', 'سرور مجازی یک ماهه سوئد', 1, '4368000', 'سرور مجازی یک ماهه سوئد', '13', '/upload/images/forms/1658918857106c2c84-a190-3def-b9d5-72c7d1e961d3.png', '2022-07-27 10:47:37', '2022-07-27 10:47:37', 5, '1'),
(201, 'سرور مجازی یک ماهه سوئیس', 29, 'group_vps-switzerland', 'subgroup_vps-switzerland', 'vps-switzerland', 'active', 'سرور مجازی یک ماهه سوئیس', 1, '2688000', 'سرور مجازی یک ماهه سوئیس', '8', '/upload/images/forms/16589189286093e0cf-1f8c-3276-9298-3a8e1a737bc0.png', '2022-07-27 10:48:48', '2022-07-27 10:48:48', 5, '1'),
(202, 'سرور مجازی یک ماهه مالزی', 29, 'group_vps-malaysia', 'subgroup_vps-malaysia', 'vps-malaysia', 'active', 'سرور مجازی یک ماهه مالزی', 1, '7056000', 'سرور مجازی یک ماهه مالزی', '21', '/upload/images/forms/165891899764870199-4482-3343-b2e4-38fad3de3bd0.png', '2022-07-27 10:49:57', '2022-07-27 10:49:57', 5, '1'),
(203, 'سرور مجازی یک ماهه ترکیه', 29, 'group_vps-turkey', 'subgroup_vps-turkey', 'vps-turkey', 'active', 'سرور مجازی یک ماهه ترکیه', 1, '7056000', 'سرور مجازی یک ماهه ترکیه', '21', '/upload/images/forms/16589190709df34f1f-8322-3a65-95f5-d26dcc76c2ae.png', '2022-07-27 10:51:10', '2022-07-27 10:51:10', 5, '1'),
(204, 'سرور مجازی یک ماهه امارات', 29, 'group_vps-uae', 'subgroup_vps-uae', 'vps-uae', 'active', 'سرور مجازی یک ماهه امارات', 1, '7056000', 'سرور مجازی یک ماهه امارات', '21', '/upload/images/forms/16589191416098f4ca-632a-3ca9-bdc4-92c67b1ca5c5.png', '2022-07-27 10:52:21', '2022-07-27 10:52:21', 5, '1'),
(205, 'سرور مجازی یک ماهه روسیه', 29, 'group_vps-russia', 'subgroup_vps-russia', 'vps-russia', 'active', 'سرور مجازی یک ماهه روسیه', 1, '2688000', 'سرور مجازی یک ماهه روسیه', '8', '/upload/images/forms/1658919228973a4bec-e7aa-3904-99ec-a66f686db6b6.png', '2022-07-27 10:53:48', '2022-07-27 10:53:48', 5, '1'),
(206, 'سرور مجازی یک ماهه سنگاپور', 29, 'group_vps-singapore', 'subgroup_vps-singapore', 'vps-singapore', 'active', 'سرور مجازی یک ماهه سنگاپور', 1, '2688000', 'سرور مجازی یک ماهه سنگاپور', '8', '/upload/images/forms/1658919298b44b36bd-16d2-30ef-91f0-b4a375dde022.png', '2022-07-27 10:54:58', '2022-07-27 10:54:58', 5, '1'),
(207, 'سرور مجازی یک ماهه دانمارک', 29, 'group_vps-denmark', 'subgroup_vps-denmark', 'vps-denmark', 'active', 'سرور مجازی یک ماهه دانمارک', 1, '2688000', 'سرور مجازی یک ماهه دانمارک', '8', '/upload/images/forms/16589193786d7c1305-b8a0-3497-a02e-162e6895b870.png', '2022-07-27 10:56:18', '2022-07-27 10:56:18', 5, '1'),
(208, 'سرور مجازی یک ماهه هلند', 29, 'group_vps-netherlands', 'subgroup_vps-netherlands', 'vps-netherlands', 'active', 'سرور مجازی یک ماهه هلند', 1, '2688000', 'سرور مجازی یک ماهه هلند', '8', '/upload/images/forms/16589195624c54651d-3b47-3730-9e1f-45fd90acd7b9.png', '2022-07-27 10:59:22', '2022-07-27 10:59:22', 5, '1'),
(209, 'سرور مجازی یک ماهه فرانسه', 29, 'group_vps-france', 'subgroup_vps-france', 'vps-france', 'active', 'سرور مجازی یک ماهه فرانسه', 1, '2688000', 'سرور مجازی یک ماهه فرانسه', '8', '/upload/images/forms/1658919642c9452aff-b587-376f-b5ff-77de98eaa407.png', '2022-07-27 11:00:42', '2022-07-27 11:00:42', 5, '1'),
(210, 'سرور مجازی یک ماهه آلمان', 29, 'group_vps-germany', 'subgroup_vps-germany', 'vps-germany', 'active', 'سرور مجازی یک ماهه آلمان', 1, '2688000', 'سرور مجازی یک ماهه آلمان', '8', '/upload/images/forms/1658919729cf7647b5-aef2-3aa3-aa43-43fe64e9f7ee.png', '2022-07-27 11:02:09', '2022-07-27 11:02:09', 5, '1'),
(211, 'سرور مجازی یک ماهه استرالیا', 29, 'group_vps-australia', 'subgroup_vps-australia', 'vps-australia', 'active', 'سرور مجازی یک ماهه استرالیا', 1, '2688000', 'سرور مجازی یک ماهه استرالیا', '8', '/upload/images/forms/165891980041bd6857-84dc-33ca-a40b-a6c2c46ffc26.png', '2022-07-27 11:03:20', '2022-07-27 11:03:20', 5, '1'),
(212, 'سرور مجازی یک ماهه کانادا', 29, 'group_vps-canada', 'subgroup_vps-canada', 'vps-canada', 'active', 'سرور مجازی یک ماهه کانادا', 1, '2688000', 'سرور مجازی یک ماهه کانادا', '8', '/upload/images/forms/16589198636a921d95-6d13-3213-b5ce-2ee63967586c.png', '2022-07-27 11:04:23', '2022-07-27 11:04:23', 5, '1'),
(213, 'سرور مجازی یک ماهه آمریکا', 29, 'group_vps-usa', 'subgroup_vps-usa', 'vps-usa', 'active', 'سرور مجازی یک ماهه آمریکا', 1, '2688000', 'سرور مجازی یک ماهه آمریکا', '8', '/upload/images/forms/1658919929939a9bf4-f50e-3206-9a71-bd661cc14a43.png', '2022-07-27 11:05:29', '2022-07-27 11:05:29', 5, '1'),
(214, 'سرور مجازی یک ماهه انگلیس', 29, 'group_vps-uk', 'subgroup_vps-uk', 'vps-uk', 'active', 'سرور مجازی یک ماهه انگلیس', 1, '2688000', 'سرور مجازی یک ماهه انگلیس', '8', '/upload/images/forms/16589200021dbfaf17-5f5f-3bac-a8d8-ca8a706020ce.png', '2022-07-27 11:06:42', '2022-07-27 11:06:42', 5, '1'),
(215, 'کردیت کارت ترکیه', 4, 'group_Credit', 'subgroup_Credit', 'Credit', 'active', 'کردیت کارت ترکیه', 1, '67200000', 'کردیت کارت ترکیه', '200', '/upload/images/forms/1659786277domain.jpg', '2022-08-06 11:44:37', '2022-08-06 11:44:37', 1, '1'),
(216, 'پرداخت در کلیه سایت های بین المللی', 12, 'group_all_payment', 'subgroup_all_payment', 'all_payment', 'active', 'پرداخت در کلیه سایت های بین المللی', 1, '0', 'پرداخت در کلیه سایت های بین المللی', NULL, '', '2022-09-25 07:10:55', '2022-09-25 07:10:55', 4, '1');

-- --------------------------------------------------------

--
-- Table structure for table `form_categories`
--

CREATE TABLE `form_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `text` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_categories`
--

INSERT INTO `form_categories` (`id`, `name`, `link`, `status`, `text`, `image`, `created_at`, `updated_at`) VALUES
(1, 'گیفت کارتها', 'giftcards', 'inactive', NULL, NULL, '2022-06-26 16:51:06', '2022-09-24 12:07:07'),
(2, 'محصولات پول الکترونیک', 'Money', 'active', 'محصولات پول الکترونیک', '/upload/images/form_categories/1656859390money.jpg', '2022-07-03 14:43:11', '2022-07-03 14:43:11'),
(3, 'ویزا، مسترکارت', 'VisaMasterCard', 'active', 'VisaMasterCard', '', '2022-07-11 15:34:08', '2022-07-11 15:34:08'),
(4, 'پرداخت های بین المللی', 'Internet_payments', 'active', 'کلیه محصولات پرداخت بین المللی', '/upload/images/form_categories/1658518540internet-payment-gateway-in-pakistan.jpg', '2022-07-22 19:35:41', '2022-09-25 07:29:35'),
(5, 'سرویس', 'Service', 'active', 'سرویس', '', '2022-07-26 17:31:13', '2022-07-26 17:31:13');

-- --------------------------------------------------------

--
-- Table structure for table `form_coloumns`
--

CREATE TABLE `form_coloumns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form_id` bigint(20) UNSIGNED NOT NULL,
  `form_field_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` int(11) NOT NULL,
  `new_priority` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_coloumns`
--

INSERT INTO `form_coloumns` (`id`, `form_id`, `form_field_id`, `name`, `place`, `priority`, `new_priority`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'اکانت پی پال مقصد *', NULL, 1, NULL, 'active', '2022-07-07 09:50:15', '2022-07-07 09:50:15'),
(2, 2, 5, 'آیا اکانت پی پال مقصد وریفای شده است:', NULL, 2, NULL, 'active', '2022-07-09 09:15:56', '2022-07-09 09:15:56'),
(3, 2, 6, 'توضیحات', 'توضیحات', 3, NULL, 'active', '2022-07-10 13:15:43', '2022-07-10 13:15:43'),
(4, 3, 5, 'نوع کارت:', NULL, 1, NULL, 'active', '2022-07-11 16:04:18', '2022-07-11 16:04:19'),
(5, 4, 1, 'اکانت پی پال مقصد *', NULL, 1, NULL, 'active', '2022-07-15 15:36:46', '2022-07-15 15:36:47'),
(6, 4, 5, 'آیا اکانت پی پال مقصد وریفای شده است:', NULL, 2, NULL, 'active', '2022-07-15 15:37:11', '2022-07-15 15:37:12'),
(7, 5, 1, 'حساب پی پال', NULL, 1, NULL, 'active', '2022-07-15 15:47:06', '2022-07-15 15:47:06'),
(8, 5, 1, 'منبع پول شما', NULL, 2, NULL, 'active', '2022-07-15 15:47:31', '2022-07-15 15:47:31'),
(9, 5, 5, 'آیا اکانت شما وریفای شده است:', NULL, 3, NULL, 'active', '2022-07-15 15:47:49', '2022-07-15 15:47:49'),
(10, 4, 6, 'توضیحات', NULL, 3, NULL, 'active', '2022-07-15 15:49:34', '2022-07-15 15:49:34'),
(11, 5, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-15 15:49:55', '2022-07-15 15:49:55'),
(12, 6, 1, 'حساب وب مانی *', NULL, 1, NULL, 'active', '2022-07-15 16:00:55', '2022-07-15 16:00:55'),
(13, 6, 5, 'آیا اکانت شما وریفای شده است:', NULL, 2, NULL, 'active', '2022-07-15 16:01:23', '2022-07-15 16:01:23'),
(14, 6, 6, 'توضیحات', NULL, 3, NULL, 'active', '2022-07-15 16:08:12', '2022-07-15 16:08:12'),
(15, 7, 1, 'حساب وب مانی', NULL, 1, NULL, 'active', '2022-07-15 16:08:53', '2022-07-15 16:08:54'),
(16, 7, 1, 'منبع پول شما', NULL, 2, NULL, 'active', '2022-07-15 16:09:17', '2022-07-15 16:09:19'),
(17, 7, 5, 'آیا اکانت شما وریفای شده است:', NULL, 3, NULL, 'active', '2022-07-15 16:09:39', '2022-07-15 16:09:40'),
(18, 7, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-15 16:11:00', '2022-07-15 16:11:00'),
(19, 8, 1, 'حساب پرفکت مانی *', NULL, 1, NULL, 'active', '2022-07-15 16:33:17', '2022-07-15 16:33:17'),
(20, 8, 5, 'آیا اکانت شما وریفای شده است:', NULL, 2, NULL, 'active', '2022-07-15 16:33:56', '2022-07-15 16:33:56'),
(21, 8, 6, 'توضیحات', NULL, 3, NULL, 'active', '2022-07-15 16:37:14', '2022-07-15 16:37:14'),
(22, 9, 6, 'توضیحات', NULL, 1, NULL, 'active', '2022-07-15 16:45:37', '2022-07-15 16:45:37'),
(23, 10, 1, 'حساب پرفکت مانی *', 'u123456', 1, NULL, 'active', '2022-07-15 16:50:06', '2022-07-15 16:50:06'),
(24, 10, 1, 'منبع پول شما', NULL, 2, NULL, 'active', '2022-07-15 16:50:24', '2022-07-15 16:50:24'),
(25, 10, 5, 'آیا اکانت شما وریفای شده است:', NULL, 3, NULL, 'active', '2022-07-15 16:50:43', '2022-07-15 16:50:43'),
(26, 10, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-15 16:51:54', '2022-07-15 16:51:54'),
(27, 11, 1, 'حساب اسکریل *', NULL, 1, NULL, 'active', '2022-07-16 17:12:28', '2022-07-16 17:12:29'),
(28, 11, 5, 'آیا اکانت شما وریفای شده است:', NULL, 2, NULL, 'active', '2022-07-16 17:15:44', '2022-07-16 17:15:44'),
(29, 11, 6, 'توضیحات', NULL, 3, NULL, 'active', '2022-07-16 17:16:22', '2022-07-16 17:16:22'),
(30, 12, 1, 'لینک سایت', 'مثال www.example.com', 1, NULL, 'active', '2022-07-22 20:06:46', '2022-07-22 20:06:47'),
(31, 12, 1, 'نام کاربری شما در سایت مقصد', NULL, 2, NULL, 'active', '2022-07-22 20:07:09', '2022-07-22 20:07:09'),
(32, 12, 3, 'رمز عبور شما در سایت مقصد', NULL, 3, NULL, 'active', '2022-07-22 20:07:36', '2022-07-22 20:07:36'),
(33, 13, 1, 'لینک سایت', NULL, 1, NULL, 'active', '2022-07-22 20:13:06', '2022-07-22 20:13:06'),
(34, 13, 1, 'نام کاربری شما در ICF', NULL, 2, NULL, 'active', '2022-07-22 20:13:30', '2022-07-22 20:13:30'),
(35, 13, 3, 'رمز عبور شما در ICF', NULL, 3, NULL, 'active', '2022-07-22 20:13:57', '2022-07-22 20:13:57'),
(36, 13, 6, 'توضیحات', 'توضیحات بیشتر را در این کادر وارد کنید', 4, NULL, 'active', '2022-07-22 20:15:20', '2022-07-22 20:15:20'),
(40, 15, 1, 'لینک سایت مقصد', NULL, 1, NULL, 'active', '2022-07-24 05:27:15', '2022-07-24 05:27:15'),
(41, 15, 1, 'نام کاربری شما در سایت مقصد', NULL, 2, NULL, 'active', '2022-07-24 05:32:44', '2022-07-24 05:32:44'),
(42, 15, 1, 'رمز عبور شما در سایت مقصد', NULL, 3, NULL, 'active', '2022-07-24 05:33:52', '2022-07-24 05:33:52'),
(43, 15, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-24 05:39:36', '2022-07-24 05:39:36'),
(44, 16, 1, 'نام کاربری شما در Steam', NULL, 1, NULL, 'active', '2022-07-24 05:57:41', '2022-07-24 05:57:41'),
(45, 16, 1, 'رمز عبور شما در Steam', NULL, 2, NULL, 'active', '2022-07-24 05:58:27', '2022-07-24 05:58:27'),
(46, 16, 1, 'خدمات مورد نیاز', NULL, 3, NULL, 'active', '2022-07-24 05:59:07', '2022-07-24 05:59:07'),
(47, 16, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-24 05:59:41', '2022-07-24 05:59:41'),
(48, 17, 1, 'نام کاربری شما در Zoom', NULL, 1, NULL, 'active', '2022-07-24 06:04:34', '2022-07-24 06:04:34'),
(49, 17, 1, 'رمز عبور شما در Zoom', NULL, 2, NULL, 'active', '2022-07-24 06:05:02', '2022-07-24 06:05:02'),
(50, 17, 1, 'خدمات مورد نیاز', NULL, 3, NULL, 'active', '2022-07-24 06:06:06', '2022-07-24 06:06:06'),
(51, 17, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-24 06:06:50', '2022-07-24 06:06:50'),
(52, 18, 1, 'نام کاربری شما در Grammarly', NULL, 1, NULL, 'active', '2022-07-24 06:13:08', '2022-07-24 06:13:08'),
(53, 18, 3, 'رمز عبور شما در Grammarly', NULL, 2, NULL, 'active', '2022-07-24 06:13:41', '2022-07-24 06:13:41'),
(54, 18, 1, 'خدمات مورد نیاز', NULL, 3, NULL, 'active', '2022-07-24 06:14:34', '2022-07-24 06:14:34'),
(55, 18, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-24 06:15:03', '2022-07-24 06:15:04'),
(56, 19, 1, 'نام کاربری شما در MQL5', NULL, 1, NULL, 'active', '2022-07-24 06:18:36', '2022-07-24 06:18:36'),
(57, 19, 3, 'رمز عبور شما در MQL5', NULL, 2, NULL, 'active', '2022-07-24 06:19:17', '2022-07-24 06:19:17'),
(58, 19, 1, 'خدمات مورد نیاز', NULL, 3, NULL, 'active', '2022-07-24 06:19:46', '2022-07-24 06:19:46'),
(59, 19, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-24 06:20:33', '2022-07-24 06:20:33'),
(60, 20, 1, 'نام کاربری شما در IMDB', NULL, 1, NULL, 'active', '2022-07-24 06:23:32', '2022-07-24 06:23:32'),
(61, 20, 3, 'رمز عبور شما در IMDB', NULL, 2, NULL, 'active', '2022-07-24 06:24:12', '2022-07-24 06:24:12'),
(62, 20, 1, 'خدمات مورد نیاز', NULL, 3, NULL, 'active', '2022-07-24 06:24:39', '2022-07-24 06:24:39'),
(63, 20, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-24 06:25:11', '2022-07-24 06:25:11'),
(64, 21, 1, 'نام کاربری شما در Netflix', NULL, 1, NULL, 'active', '2022-07-24 06:28:00', '2022-07-24 06:28:00'),
(65, 21, 3, 'رمز عبور شما در Netflix', NULL, 2, NULL, 'active', '2022-07-24 06:28:33', '2022-07-24 06:28:33'),
(66, 21, 1, 'خدمات مورد نیاز', NULL, 3, NULL, 'active', '2022-07-24 06:29:07', '2022-07-24 06:29:07'),
(67, 21, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-24 06:29:35', '2022-07-24 06:29:35'),
(68, 22, 1, 'نام کاربری شما در Freepik', NULL, 1, NULL, 'active', '2022-07-24 06:32:01', '2022-07-24 06:32:01'),
(69, 22, 3, 'رمز عبور شما در Freepik', NULL, 2, NULL, 'active', '2022-07-24 06:32:34', '2022-07-24 06:32:34'),
(70, 22, 1, 'خدمات مورد نیاز', NULL, 3, NULL, 'active', '2022-07-24 06:33:08', '2022-07-24 06:33:08'),
(71, 22, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-24 06:33:37', '2022-07-24 06:33:37'),
(72, 23, 1, 'لینک سایت مقصد', NULL, 1, NULL, 'active', '2022-07-24 06:35:47', '2022-07-24 06:35:47'),
(73, 23, 1, 'نام کاربری شما در سایت مقصد', NULL, 2, NULL, 'active', '2022-07-24 06:36:17', '2022-07-24 06:36:17'),
(74, 23, 3, 'رمز عبور شما در سایت مقصد', NULL, 3, NULL, 'active', '2022-07-24 06:36:48', '2022-07-24 06:36:48'),
(75, 23, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-24 06:37:19', '2022-07-24 06:37:19'),
(76, 24, 1, 'نام کاربری شما در HBO', NULL, 1, NULL, 'active', '2022-07-24 06:49:40', '2022-07-24 06:49:40'),
(77, 24, 3, 'رمز عبور شما در HBO', NULL, 2, NULL, 'active', '2022-07-24 06:50:12', '2022-07-24 06:50:12'),
(78, 24, 1, 'خدمات مورد نیاز', NULL, 3, NULL, 'active', '2022-07-24 06:50:41', '2022-07-24 06:50:41'),
(79, 24, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-24 06:51:10', '2022-07-24 06:51:10'),
(80, 25, 1, 'نام کاربری شما در Dashlane', NULL, 1, NULL, 'active', '2022-07-24 06:53:13', '2022-07-24 06:53:13'),
(81, 25, 3, 'رمز عبور شما در Dashlane', NULL, 2, NULL, 'active', '2022-07-24 06:53:45', '2022-07-24 06:53:45'),
(82, 25, 1, 'خدمات مورد نیاز', NULL, 3, NULL, 'active', '2022-07-24 06:54:33', '2022-07-24 06:54:33'),
(83, 25, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-24 06:55:06', '2022-07-24 06:55:06'),
(84, 26, 1, 'نام کاربری شما در Scribd', NULL, 1, NULL, 'active', '2022-07-24 06:58:12', '2022-07-24 06:58:12'),
(85, 26, 3, 'رمز عبور شما در Scribd', NULL, 2, NULL, 'active', '2022-07-24 06:59:03', '2022-07-24 06:59:03'),
(86, 26, 1, 'خدمات مورد نیاز', NULL, 3, NULL, 'active', '2022-07-24 06:59:36', '2022-07-24 06:59:36'),
(87, 26, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-24 07:00:07', '2022-07-24 07:00:07'),
(88, 27, 1, 'نام کاربری شما در Deezer', NULL, 1, NULL, 'active', '2022-07-24 07:07:58', '2022-07-24 07:07:58'),
(89, 27, 3, 'رمز عبور شما در Deezer', NULL, 2, NULL, 'active', '2022-07-24 07:08:36', '2022-07-24 07:08:36'),
(90, 27, 1, 'خدمات مورد نیاز', NULL, 3, NULL, 'active', '2022-07-24 07:09:04', '2022-07-24 07:09:04'),
(91, 27, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-24 07:09:39', '2022-07-24 07:09:39'),
(92, 28, 6, 'شرایط و توضیحات', NULL, 1, NULL, 'active', '2022-07-24 07:17:03', '2022-07-24 07:17:03'),
(93, 28, 1, 'نام کاربری شما در DETready', NULL, 2, NULL, 'active', '2022-07-24 07:17:34', '2022-07-24 07:17:34'),
(94, 28, 3, 'نام کاربری شما در DETready', NULL, 3, NULL, 'active', '2022-07-24 07:18:09', '2022-07-24 07:18:09'),
(95, 28, 1, 'طرح انتخابی شما در DETready', NULL, 4, NULL, 'active', '2022-07-24 07:23:46', '2022-07-24 07:23:46'),
(96, 28, 6, 'توضیحات', NULL, 5, NULL, 'active', '2022-07-24 07:24:20', '2022-07-24 07:24:20'),
(97, 29, 1, 'نام کاربری شما در mailerlite', NULL, 1, NULL, 'active', '2022-07-24 07:26:52', '2022-07-24 07:26:52'),
(98, 29, 3, 'رمز عبور شما در mailerlite', NULL, 2, NULL, 'active', '2022-07-24 07:27:43', '2022-07-24 07:27:43'),
(99, 29, 1, 'طرح انتخابی شما در mailerlite', NULL, 3, NULL, 'active', '2022-07-24 07:28:13', '2022-07-24 07:28:13'),
(100, 29, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-24 07:28:46', '2022-07-24 07:28:46'),
(101, 30, 1, 'نام', NULL, 1, NULL, 'active', '2022-07-24 07:32:03', '2022-07-24 07:32:03'),
(102, 30, 1, 'نام خانوادگی', NULL, 2, NULL, 'active', '2022-07-24 07:32:37', '2022-07-24 07:32:37'),
(103, 30, 1, 'جیمیل جدید', NULL, 3, NULL, 'active', '2022-07-24 07:33:04', '2022-07-24 07:33:04'),
(104, 30, 3, 'رمز عبور', NULL, 4, NULL, 'active', '2022-07-24 07:33:42', '2022-07-24 07:33:42'),
(105, 31, 1, 'لینک سایت', NULL, 1, NULL, 'active', '2022-07-24 07:36:29', '2022-07-24 07:36:29'),
(106, 31, 1, 'نام کاربری شما در ICF', NULL, 2, NULL, 'active', '2022-07-24 07:37:02', '2022-07-24 07:37:02'),
(107, 31, 3, 'رمز عبور شما در ICF', NULL, 3, NULL, 'active', '2022-07-24 07:37:31', '2022-07-24 07:37:31'),
(108, 31, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-24 07:38:00', '2022-07-24 07:38:00'),
(117, 33, 1, 'لینک سایت هتل', NULL, 1, NULL, 'active', '2022-07-24 08:36:01', '2022-07-24 08:36:01'),
(118, 33, 8, 'تاریخ Check-in(به میلادی)', NULL, 2, NULL, 'active', '2022-07-24 08:37:09', '2022-09-25 08:47:51'),
(119, 33, 8, 'تاریخ Check-out(به میلادی)', NULL, 3, NULL, 'active', '2022-07-24 08:37:48', '2022-09-25 08:18:00'),
(120, 33, 1, 'نوع اتاق', NULL, 4, NULL, 'active', '2022-07-24 08:38:17', '2022-07-24 08:38:17'),
(121, 33, 1, 'تعداد مسافر را وارد کنید', NULL, 5, NULL, 'active', '2022-07-24 08:39:02', '2022-07-24 08:39:02'),
(122, 33, 1, 'رزرو هتل', NULL, 6, NULL, 'active', '2022-07-24 08:40:43', '2022-07-24 08:40:43'),
(123, 33, 1, 'نام مسافر', NULL, 7, NULL, 'active', '2022-07-24 08:41:12', '2022-07-24 08:41:12'),
(124, 33, 1, 'نام خانوادگی مسافر', NULL, 8, NULL, 'active', '2022-07-24 08:41:50', '2022-07-24 08:41:50'),
(125, 34, 1, 'لینک سایت', NULL, 1, NULL, 'active', '2022-07-24 08:44:28', '2022-07-24 08:44:28'),
(126, 34, 1, 'نام کاربری شما در سایت مقصد', NULL, 2, NULL, 'active', '2022-07-24 08:45:00', '2022-07-24 08:45:00'),
(127, 34, 1, 'رمز عبور شما در سایت مقصد', NULL, 3, NULL, 'active', '2022-07-24 08:45:56', '2022-07-24 08:45:56'),
(128, 34, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-24 08:46:42', '2022-07-24 08:46:42'),
(129, 35, 1, 'لینک خانه مورد نظر', NULL, 1, NULL, 'active', '2022-07-24 10:33:23', '2022-07-24 10:33:23'),
(130, 35, 1, 'تعداد مهمان', NULL, 2, NULL, 'active', '2022-07-24 10:33:52', '2022-07-24 10:33:52'),
(131, 35, 1, 'تاریخ Check-In', NULL, 3, NULL, 'active', '2022-07-24 10:34:40', '2022-07-24 10:34:40'),
(132, 35, 1, 'تاریخ Check-Out', NULL, 4, NULL, 'active', '2022-07-24 10:35:13', '2022-07-24 10:35:13'),
(133, 35, 1, 'نام کاربری شما در airbnb', NULL, 5, NULL, 'active', '2022-07-24 10:35:40', '2022-07-24 10:35:40'),
(134, 35, 1, 'رمزعبور شما در airbnb', NULL, 6, NULL, 'active', '2022-07-24 10:36:14', '2022-07-24 10:36:14'),
(135, 35, 6, 'توضیحات', NULL, 7, NULL, 'active', '2022-07-24 10:36:57', '2022-07-24 10:36:57'),
(136, 36, 1, 'لینک سایت مقصد', NULL, 1, NULL, 'active', '2022-07-24 10:41:14', '2022-07-24 10:41:14'),
(137, 36, 1, 'نام کاربری شما در سایت مقصد', NULL, 2, NULL, 'active', '2022-07-24 10:41:44', '2022-07-24 10:41:44'),
(138, 36, 3, 'رمز عبور شما در سایت مقصد', NULL, 3, NULL, 'active', '2022-07-24 10:42:14', '2022-07-24 10:42:14'),
(139, 36, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-24 10:42:52', '2022-07-24 10:42:52'),
(140, 37, 1, 'لینک سایت مقصد', NULL, 1, NULL, 'active', '2022-07-24 10:45:00', '2022-07-24 10:45:00'),
(141, 37, 1, 'نام کاربری شما در سایت مقصد', NULL, 2, NULL, 'active', '2022-07-24 10:45:31', '2022-07-24 10:45:31'),
(142, 37, 3, 'رمز عبور شما در سایت مقصد', NULL, 3, NULL, 'active', '2022-07-24 10:46:02', '2022-07-24 10:46:02'),
(143, 37, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-24 10:46:31', '2022-07-24 10:46:31'),
(144, 38, 1, 'لینک سایت تاکسی', NULL, 1, NULL, 'active', '2022-07-24 10:48:22', '2022-07-24 10:48:22'),
(145, 38, 1, 'نام کاربری شما در وبسایت مورد نظر', NULL, 2, NULL, 'active', '2022-07-24 10:48:55', '2022-07-24 10:48:55'),
(146, 38, 3, 'رمز عبور شما در وبسایت مورد نظر', NULL, 3, NULL, 'active', '2022-07-24 10:49:23', '2022-07-24 10:49:23'),
(147, 38, 1, 'تاریخ بلیط', NULL, 4, NULL, 'active', '2022-07-24 10:49:52', '2022-07-24 10:49:52'),
(148, 38, 1, 'ساعت بلیط', NULL, 5, NULL, 'active', '2022-07-24 10:50:23', '2022-07-24 10:50:23'),
(149, 38, 1, 'ایستگاه مبدا', NULL, 6, NULL, 'active', '2022-07-24 10:50:52', '2022-07-24 10:50:52'),
(150, 38, 1, 'ایستگاه مقصد', NULL, 7, NULL, 'active', '2022-07-24 10:51:30', '2022-07-24 10:51:30'),
(151, 38, 6, 'توضیحات', NULL, 8, NULL, 'active', '2022-07-24 10:51:58', '2022-07-24 10:51:58'),
(152, 39, 1, 'لینک سایت اتوبوس', NULL, 1, NULL, 'active', '2022-07-24 10:54:06', '2022-07-24 10:54:06'),
(153, 39, 1, 'نام کاربری شما در وبسایت مورد نظر', NULL, 2, NULL, 'active', '2022-07-24 10:54:36', '2022-07-24 10:54:36'),
(154, 39, 3, 'رمز عبور شما در وبسایت مورد نظر', NULL, 3, NULL, 'active', '2022-07-24 10:55:02', '2022-07-24 10:55:02'),
(155, 39, 1, 'تاریخ بلیط', NULL, 4, NULL, 'active', '2022-07-24 10:55:31', '2022-07-24 10:55:31'),
(156, 39, 1, 'ساعت بلیط', NULL, 5, NULL, 'active', '2022-07-24 10:56:00', '2022-07-24 10:56:00'),
(157, 39, 1, 'پایانه مبدا', NULL, 6, NULL, 'active', '2022-07-24 10:56:25', '2022-07-24 10:56:25'),
(158, 39, 1, 'پایانه مقصد', NULL, 7, NULL, 'active', '2022-07-24 10:56:57', '2022-07-24 10:56:57'),
(159, 39, 6, 'توضیحات', NULL, 8, NULL, 'active', '2022-07-24 10:57:22', '2022-07-24 10:57:22'),
(160, 40, 1, 'لینک سایت کشتی', NULL, 1, NULL, 'active', '2022-07-24 10:59:22', '2022-07-24 10:59:22'),
(161, 40, 1, 'نام کاربری شما در وبسایت مورد نظر', NULL, 2, NULL, 'active', '2022-07-24 10:59:48', '2022-07-24 10:59:48'),
(162, 40, 3, 'رمز عبور شما در وبسایت مورد نظر', NULL, 3, NULL, 'active', '2022-07-24 11:00:13', '2022-07-24 11:00:13'),
(163, 40, 1, 'تاریخ بلیط', NULL, 4, NULL, 'active', '2022-07-24 11:00:46', '2022-07-24 11:00:46'),
(164, 40, 1, 'ساعت بلیط', NULL, 5, NULL, 'active', '2022-07-24 11:01:29', '2022-07-24 11:01:29'),
(165, 40, 1, 'پایانه مبدا', NULL, 6, NULL, 'active', '2022-07-24 11:01:58', '2022-07-24 11:01:58'),
(166, 40, 1, 'پایانه مقصد', NULL, 7, NULL, 'active', '2022-07-24 11:02:34', '2022-07-24 11:02:34'),
(167, 40, 6, 'توضیحات', NULL, 8, NULL, 'active', '2022-07-24 11:03:06', '2022-07-24 11:03:06'),
(168, 41, 1, 'نام', NULL, 1, NULL, 'active', '2022-07-24 11:05:44', '2022-07-24 11:05:44'),
(169, 41, 1, 'نام خانوادگی', NULL, 2, NULL, 'active', '2022-07-24 11:06:11', '2022-07-24 11:06:11'),
(170, 41, 1, 'تلفن همراه', NULL, 3, NULL, 'active', '2022-07-24 11:06:39', '2022-07-24 11:06:39'),
(171, 41, 1, 'ایمیل', NULL, 4, NULL, 'active', '2022-07-24 11:07:13', '2022-07-24 11:07:13'),
(172, 41, 1, 'نام کاربری شما در booking', NULL, 5, NULL, 'active', '2022-07-24 11:07:40', '2022-07-24 11:07:40'),
(173, 41, 3, 'رمزعبور شما در booking', NULL, 6, NULL, 'active', '2022-07-24 11:08:07', '2022-07-24 11:08:07'),
(174, 42, 1, 'لینک سایت ایرلاین', NULL, 1, NULL, 'active', '2022-07-24 11:10:12', '2022-07-24 11:10:12'),
(175, 42, 1, 'نام کاربری شما در وبسایت ایرلاین', NULL, 2, NULL, 'active', '2022-07-24 11:10:52', '2022-07-24 11:10:52'),
(176, 42, 3, 'رمز عبور شما در وبسایت ایرلاین', NULL, 3, NULL, 'active', '2022-07-24 11:11:19', '2022-07-24 11:11:19'),
(177, 42, 1, 'تاریخ بلیط', NULL, 4, NULL, 'active', '2022-07-24 11:11:43', '2022-07-24 11:11:43'),
(178, 42, 1, 'ساعت بلیط', NULL, 5, NULL, 'active', '2022-07-24 11:12:12', '2022-07-24 11:12:12'),
(179, 42, 1, 'فرودگاه مبدا', NULL, 6, NULL, 'active', '2022-07-24 11:12:47', '2022-07-24 11:12:47'),
(180, 42, 1, 'فرودگاه مقصد', NULL, 7, NULL, 'active', '2022-07-24 11:13:16', '2022-07-24 11:13:16'),
(181, 42, 6, 'توضیحات', NULL, 8, NULL, 'active', '2022-07-24 11:13:46', '2022-07-24 11:13:46'),
(182, 43, 1, 'نام کاربری شما در IMAT', NULL, 1, NULL, 'active', '2022-07-25 05:27:44', '2022-07-25 05:27:44'),
(183, 43, 3, 'رمز عبور شما در IMAT', NULL, 2, NULL, 'active', '2022-07-25 05:28:13', '2022-07-25 05:28:13'),
(184, 43, 1, 'خدمات مورد نیاز', NULL, 3, NULL, 'active', '2022-07-25 05:28:43', '2022-07-25 05:28:43'),
(185, 43, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-25 05:29:20', '2022-07-25 05:29:20'),
(186, 44, 1, 'نام کاربری شما در Prometric', NULL, 1, NULL, 'active', '2022-07-25 05:31:44', '2022-07-25 05:31:44'),
(187, 44, 3, 'رمز عبور شما در Prometric', NULL, 2, NULL, 'active', '2022-07-25 05:32:27', '2022-07-25 05:32:27'),
(188, 44, 1, 'خدمات مورد نیاز', NULL, 3, NULL, 'active', '2022-07-25 05:32:59', '2022-07-25 05:32:59'),
(189, 44, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-25 05:33:31', '2022-07-25 05:33:31'),
(190, 45, 1, 'نام کاربری شما در CFA', NULL, 1, NULL, 'active', '2022-07-25 05:35:30', '2022-07-25 05:35:30'),
(191, 45, 3, 'رمز عبور شما در CFA', NULL, 2, NULL, 'active', '2022-07-25 05:36:04', '2022-07-25 05:36:04'),
(192, 45, 1, 'خدمات مورد نیاز', NULL, 3, NULL, 'active', '2022-07-25 05:36:33', '2022-07-25 05:36:33'),
(193, 45, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-25 05:37:01', '2022-07-25 05:37:01'),
(194, 46, 1, 'نام کاربری شما در USMLE', NULL, 1, NULL, 'active', '2022-07-25 05:39:05', '2022-07-25 05:39:05'),
(195, 46, 3, 'رمز عبور شما در USMLE', NULL, 2, NULL, 'active', '2022-07-25 05:39:34', '2022-07-25 05:39:34'),
(196, 46, 1, 'خدمات مورد نیاز', NULL, 3, NULL, 'active', '2022-07-25 05:39:59', '2022-07-25 05:39:59'),
(197, 46, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-25 05:40:31', '2022-07-25 05:40:31'),
(198, 47, 1, 'نام کاربری شما در SAT', NULL, 1, NULL, 'active', '2022-07-25 05:42:40', '2022-07-25 05:42:40'),
(199, 47, 3, 'رمز عبور شما در SAT', NULL, 2, NULL, 'active', '2022-07-25 05:43:05', '2022-07-25 05:43:05'),
(200, 47, 1, 'خدمات مورد نیاز', NULL, 3, NULL, 'active', '2022-07-25 05:43:31', '2022-07-25 05:43:31'),
(201, 47, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-25 05:44:00', '2022-07-25 05:44:01'),
(202, 48, 1, 'نام کاربری شما در PMP', NULL, 1, NULL, 'active', '2022-07-25 05:45:55', '2022-07-25 05:45:55'),
(203, 48, 3, 'رمز عبور شما در PMP', NULL, 2, NULL, 'active', '2022-07-25 05:46:36', '2022-07-25 05:46:36'),
(204, 48, 1, 'خدمات مورد نیاز', NULL, 3, NULL, 'active', '2022-07-25 05:47:00', '2022-07-25 05:47:00'),
(205, 48, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-25 05:47:26', '2022-07-25 05:47:26'),
(206, 49, 1, 'نام کاربری شما در NAATI', NULL, 1, NULL, 'active', '2022-07-25 05:49:29', '2022-07-25 05:49:29'),
(207, 49, 3, 'رمز عبور شما در NAATI', NULL, 2, NULL, 'active', '2022-07-25 05:49:55', '2022-07-25 05:49:55'),
(208, 49, 1, 'خدمات مورد نیاز', NULL, 3, NULL, 'active', '2022-07-25 05:50:26', '2022-07-25 05:50:26'),
(209, 49, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-25 05:50:57', '2022-07-25 05:50:57'),
(210, 50, 1, 'نام کاربری شما در IELTS Indicator', NULL, 1, NULL, 'active', '2022-07-25 05:52:59', '2022-07-25 05:52:59'),
(211, 50, 3, 'رمز عبور شما در IELTS Indicator', NULL, 2, NULL, 'active', '2022-07-25 05:53:31', '2022-07-25 05:53:31'),
(212, 50, 1, 'خدمات مورد نیاز', NULL, 3, NULL, 'active', '2022-07-25 05:53:56', '2022-07-25 05:53:56'),
(213, 50, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-25 05:54:24', '2022-07-25 05:54:24'),
(214, 51, 1, 'نام کاربری شما در PTE', NULL, 1, NULL, 'active', '2022-07-25 05:56:08', '2022-07-25 05:56:08'),
(215, 51, 3, 'رمز عبور شما در PTE رمز عبور شما در PTE', NULL, 2, NULL, 'active', '2022-07-25 05:56:35', '2022-07-25 05:56:35'),
(216, 51, 1, 'خدمات مورد نیاز', NULL, 3, NULL, 'active', '2022-07-25 05:57:00', '2022-07-25 05:57:00'),
(217, 51, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-25 05:57:24', '2022-07-25 05:57:24'),
(218, 52, 1, 'نام کاربری شما در GRE', NULL, 1, NULL, 'active', '2022-07-25 05:59:08', '2022-07-25 05:59:08'),
(219, 52, 3, 'رمز عبور شما در GRE', NULL, 2, NULL, 'active', '2022-07-25 05:59:34', '2022-07-25 05:59:34'),
(220, 52, 1, 'خدمات مورد نیاز', NULL, 3, NULL, 'active', '2022-07-25 06:00:01', '2022-07-25 06:00:04'),
(221, 52, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-25 06:00:27', '2022-07-25 06:00:27'),
(222, 53, 1, 'نام کاربری شما در IELTS', NULL, 1, NULL, 'active', '2022-07-25 06:03:07', '2022-07-25 06:03:07'),
(223, 53, 3, 'رمز عبور شما در IELTS', NULL, 2, NULL, 'active', '2022-07-25 06:03:42', '2022-07-25 06:03:42'),
(224, 53, 1, 'خدمات مورد نیاز', NULL, 3, NULL, 'active', '2022-07-25 06:04:11', '2022-07-25 06:04:11'),
(225, 53, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-25 06:04:45', '2022-07-25 06:04:45'),
(226, 54, 1, 'نام کاربری شما در TOEFL', NULL, 1, NULL, 'active', '2022-07-25 06:06:29', '2022-07-25 06:06:29'),
(227, 54, 3, 'رمز عبور شما در TOEFL', NULL, 2, NULL, 'active', '2022-07-25 06:06:55', '2022-07-25 06:06:55'),
(228, 54, 1, 'خدمات مورد نیاز', NULL, 3, NULL, 'active', '2022-07-25 06:07:26', '2022-07-25 06:07:26'),
(229, 54, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-25 06:07:56', '2022-07-25 06:07:56'),
(230, 55, 1, 'نام کاربری شما در Duolingo', NULL, 1, NULL, 'active', '2022-07-25 06:09:40', '2022-07-25 06:09:40'),
(231, 55, 3, 'رمز عبور شما در Duolingo', NULL, 2, NULL, 'active', '2022-07-25 06:10:05', '2022-07-25 06:10:05'),
(232, 55, 1, 'خدمات مورد نیاز', NULL, 3, NULL, 'active', '2022-07-25 06:10:31', '2022-07-25 06:10:31'),
(233, 55, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-25 06:10:59', '2022-07-25 06:10:59'),
(234, 56, 1, 'لینک سایت', NULL, 1, NULL, 'active', '2022-07-25 06:48:49', '2022-07-25 06:48:49'),
(235, 56, 1, 'یوزرنیم شما', NULL, 2, NULL, 'active', '2022-07-25 06:49:35', '2022-07-25 06:49:35'),
(236, 56, 3, 'رمز عبور شما', NULL, 3, NULL, 'active', '2022-07-25 06:50:05', '2022-07-25 06:50:05'),
(237, 56, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-25 06:50:33', '2022-07-25 06:50:33'),
(238, 57, 1, 'لینک سایت', NULL, 1, NULL, 'active', '2022-07-25 06:52:39', '2022-07-25 06:52:39'),
(239, 57, 1, 'یوزرنیم شما', NULL, 2, NULL, 'active', '2022-07-25 06:53:07', '2022-07-25 06:53:07'),
(240, 57, 3, 'رمز عبور شما', NULL, 3, NULL, 'active', '2022-07-25 06:53:40', '2022-07-25 06:53:40'),
(241, 57, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-25 06:54:06', '2022-07-25 06:54:06'),
(242, 59, 1, 'لینک سایت', NULL, 1, NULL, 'active', '2022-07-25 07:00:14', '2022-07-25 07:00:14'),
(243, 59, 1, 'یوزرنیم شما', NULL, 2, NULL, 'active', '2022-07-25 07:00:46', '2022-07-25 07:00:46'),
(244, 59, 3, 'رمز عبور شما', NULL, 3, NULL, 'active', '2022-07-25 07:01:10', '2022-07-25 07:01:10'),
(245, 59, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-25 07:01:40', '2022-07-25 07:01:40'),
(246, 60, 1, 'لینک سایت', NULL, 1, NULL, 'active', '2022-07-25 07:03:22', '2022-07-25 07:03:22'),
(247, 60, 1, 'یوزرنیم شما', NULL, 2, NULL, 'active', '2022-07-25 07:03:45', '2022-07-25 07:03:45'),
(248, 60, 3, 'رمز عبور شما', NULL, 3, NULL, 'active', '2022-07-25 07:04:12', '2022-07-25 07:04:12'),
(249, 60, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-25 07:04:37', '2022-07-25 07:04:37'),
(250, 61, 1, 'لینک سایت', NULL, 1, NULL, 'active', '2022-07-25 07:07:02', '2022-07-25 07:07:02'),
(251, 61, 1, 'یوزرنیم شما', NULL, 2, NULL, 'active', '2022-07-25 07:07:30', '2022-07-25 07:07:30'),
(252, 61, 3, 'رمز عبور شما', NULL, 3, NULL, 'active', '2022-07-25 07:07:52', '2022-07-25 07:07:52'),
(253, 61, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-25 07:08:20', '2022-07-25 07:08:20'),
(254, 62, 1, 'یوزرنیم شما', NULL, 1, NULL, 'active', '2022-07-25 07:13:13', '2022-07-25 07:13:13'),
(255, 62, 3, 'رمز عبور شما', NULL, 2, NULL, 'active', '2022-07-25 07:13:39', '2022-07-25 07:13:39'),
(256, 63, 1, 'یوزرنیم شما', NULL, 1, NULL, 'active', '2022-07-25 07:16:23', '2022-07-25 07:16:23'),
(257, 63, 3, 'رمز عبور شما', NULL, 2, NULL, 'active', '2022-07-25 07:16:49', '2022-07-25 07:16:49'),
(258, 64, 1, 'یوزرنیم شما', NULL, 1, NULL, 'active', '2022-07-25 07:18:49', '2022-07-25 07:18:49'),
(259, 64, 3, 'رمز عبور شما', NULL, 2, NULL, 'active', '2022-07-25 07:19:18', '2022-07-25 07:19:18'),
(260, 65, 1, 'یوزرنیم شما', NULL, 1, NULL, 'active', '2022-07-25 07:21:10', '2022-07-25 07:21:10'),
(261, 65, 3, 'رمز عبور شما', NULL, 2, NULL, 'active', '2022-07-25 07:21:39', '2022-07-25 07:21:39'),
(262, 66, 1, 'یوزرنیم شما', NULL, 1, NULL, 'active', '2022-07-25 07:23:35', '2022-07-25 07:23:35'),
(263, 66, 3, 'رمز عبور شما', NULL, 2, NULL, 'active', '2022-07-25 07:23:57', '2022-07-25 07:23:57'),
(264, 67, 1, 'یوزرنیم شما', NULL, 1, NULL, 'active', '2022-07-25 07:25:59', '2022-07-25 07:25:59'),
(265, 67, 3, 'رمز عبور شما', NULL, 2, NULL, 'active', '2022-07-25 07:26:25', '2022-07-25 07:26:25'),
(266, 68, 1, 'یوزرنیم شما', NULL, 1, NULL, 'active', '2022-07-25 07:33:13', '2022-07-25 07:33:13'),
(267, 68, 3, 'رمز عبور شما', NULL, 2, NULL, 'active', '2022-07-25 07:33:43', '2022-07-25 07:33:43'),
(268, 69, 1, 'یوزرنیم شما', NULL, 1, NULL, 'active', '2022-07-25 07:35:48', '2022-07-25 07:35:48'),
(269, 69, 3, 'رمز عبور شما', NULL, 2, NULL, 'active', '2022-07-25 07:36:15', '2022-07-25 07:36:15'),
(270, 70, 1, 'یوزرنیم شما', NULL, 1, NULL, 'active', '2022-07-25 07:38:16', '2022-07-25 07:38:16'),
(271, 70, 3, 'رمز عبور شما', NULL, 2, NULL, 'active', '2022-07-25 07:38:42', '2022-07-25 07:38:42'),
(272, 71, 1, 'یوزرنیم شما', NULL, 1, NULL, 'active', '2022-07-25 07:40:47', '2022-07-25 07:40:47'),
(273, 71, 3, 'رمز عبور شما', NULL, 2, NULL, 'active', '2022-07-25 07:41:11', '2022-07-25 07:41:11'),
(274, 72, 1, 'یوزرنیم شما', NULL, 1, NULL, 'active', '2022-07-25 07:43:18', '2022-07-25 07:43:18'),
(275, 72, 3, 'رمز عبور شما', NULL, 2, NULL, 'active', '2022-07-25 07:43:51', '2022-07-25 07:43:51'),
(276, 73, 1, 'یوزرنیم شما', NULL, 1, NULL, 'active', '2022-07-25 07:45:43', '2022-07-25 07:45:43'),
(277, 73, 3, 'رمز عبور شما', NULL, 2, NULL, 'active', '2022-07-25 07:46:09', '2022-07-25 07:46:09'),
(278, 74, 1, 'یوزرنیم شما', NULL, 1, NULL, 'active', '2022-07-25 07:48:09', '2022-07-25 07:48:09'),
(279, 74, 3, 'رمز عبور شما', NULL, 2, NULL, 'active', '2022-07-25 07:48:35', '2022-07-25 07:48:35'),
(280, 75, 1, 'یوزرنیم شما', NULL, 1, NULL, 'active', '2022-07-25 07:50:11', '2022-07-25 07:50:11'),
(281, 75, 3, 'رمز عبور شما', NULL, 2, NULL, 'active', '2022-07-25 07:50:40', '2022-07-25 07:50:40'),
(282, 76, 1, 'نام کاربری شما در Canva', NULL, 1, NULL, 'active', '2022-07-25 07:55:16', '2022-07-25 07:55:16'),
(283, 76, 3, 'رمز عبور شما در Canva', NULL, 2, NULL, 'active', '2022-07-25 07:55:44', '2022-07-25 07:55:44'),
(284, 76, 6, 'توضیحات', NULL, 3, NULL, 'active', '2022-07-25 07:56:09', '2022-07-25 07:56:09'),
(285, 77, 1, 'نام کاربری شما در Canva', NULL, 1, NULL, 'active', '2022-07-25 07:58:27', '2022-07-25 07:58:27'),
(286, 77, 3, 'رمز عبور شما در Canva', NULL, 2, NULL, 'active', '2022-07-25 07:59:05', '2022-07-25 07:59:05'),
(287, 77, 6, 'توضیحات', NULL, 3, NULL, 'active', '2022-07-25 07:59:32', '2022-07-25 07:59:32'),
(288, 78, 1, 'نام کاربری شما در Canva', NULL, 1, NULL, 'active', '2022-07-25 08:01:39', '2022-07-25 08:01:39'),
(289, 78, 3, 'رمز عبور شما در Canva', NULL, 2, NULL, 'active', '2022-07-25 08:02:05', '2022-07-25 08:02:05'),
(290, 78, 6, 'توضیحات', NULL, 3, NULL, 'active', '2022-07-25 08:02:32', '2022-07-25 08:02:32'),
(291, 79, 1, 'نام', NULL, 1, NULL, 'active', '2022-07-25 08:06:24', '2022-07-25 08:06:24'),
(292, 79, 1, 'نام خانوادگی', NULL, 2, NULL, 'active', '2022-07-25 08:06:48', '2022-07-25 08:06:48'),
(293, 79, 1, 'تلفن همراه', NULL, 3, NULL, 'active', '2022-07-25 08:07:13', '2022-07-25 08:07:13'),
(294, 79, 1, 'ایمیل جدید', NULL, 4, NULL, 'active', '2022-07-25 08:07:39', '2022-07-25 08:07:39'),
(295, 79, 3, 'رمز عبور ایمیل', NULL, 5, NULL, 'active', '2022-07-25 08:08:30', '2022-07-25 08:08:30'),
(296, 80, 1, 'نام', NULL, 1, NULL, 'active', '2022-07-25 08:10:59', '2022-07-25 08:10:59'),
(297, 80, 1, 'نام خانوادگی', NULL, 2, NULL, 'active', '2022-07-25 08:11:33', '2022-07-25 08:11:33'),
(298, 80, 1, 'تلفن همراه', NULL, 3, NULL, 'active', '2022-07-25 08:12:05', '2022-07-25 08:12:05'),
(299, 80, 1, 'ایمیل جدید', NULL, 4, NULL, 'active', '2022-07-25 08:12:36', '2022-07-25 08:12:36'),
(300, 80, 3, 'رمز عبور ایمیل', NULL, 5, NULL, 'active', '2022-07-25 08:13:17', '2022-07-25 08:13:17'),
(301, 81, 1, 'یوزرنیم شما', NULL, 1, NULL, 'active', '2022-07-25 08:36:44', '2022-07-25 08:36:44'),
(302, 81, 3, 'رمز عبور شما', NULL, 2, NULL, 'active', '2022-07-25 08:37:10', '2022-07-25 08:37:10'),
(303, 82, 1, 'یوزرنیم شما', NULL, 1, NULL, 'active', '2022-07-25 08:39:04', '2022-07-25 08:39:04'),
(304, 82, 3, 'رمز عبور شما', NULL, 2, NULL, 'active', '2022-07-25 08:39:26', '2022-07-25 08:39:26'),
(305, 83, 1, 'یوزرنیم شما', NULL, 1, NULL, 'active', '2022-07-25 08:41:12', '2022-07-25 08:41:12'),
(306, 83, 3, 'رمز عبور شما', NULL, 2, NULL, 'active', '2022-07-25 08:41:42', '2022-07-25 08:41:42'),
(307, 84, 1, 'یوزرنیم شما', NULL, 1, NULL, 'active', '2022-07-25 08:43:33', '2022-07-25 08:43:33'),
(308, 84, 3, 'رمز عبور شما', NULL, 2, NULL, 'active', '2022-07-25 08:43:59', '2022-07-25 08:43:59'),
(309, 85, 1, 'یوزرنیم شما', NULL, 1, NULL, 'active', '2022-07-25 08:46:20', '2022-07-25 08:46:20'),
(310, 85, 3, 'رمز عبور شما', NULL, 2, NULL, 'active', '2022-07-25 08:46:58', '2022-07-25 08:46:58'),
(311, 86, 1, 'یوزرنیم شما', NULL, 1, NULL, 'active', '2022-07-25 08:49:14', '2022-07-25 08:49:14'),
(312, 86, 3, 'رمز عبور شما', NULL, 2, NULL, 'active', '2022-07-25 08:49:40', '2022-07-25 08:49:40'),
(313, 87, 1, 'یوزرنیم شما', NULL, 1, NULL, 'active', '2022-07-25 08:51:48', '2022-07-25 08:51:48'),
(314, 87, 3, 'رمز عبور شما', NULL, 2, NULL, 'active', '2022-07-25 08:52:17', '2022-07-25 08:52:17'),
(315, 88, 1, 'یوزرنیم شما', NULL, 1, NULL, 'active', '2022-07-25 08:54:03', '2022-07-25 08:54:03'),
(316, 88, 3, 'رمز عبور شما', NULL, 2, NULL, 'active', '2022-07-25 08:54:32', '2022-07-25 08:54:32'),
(317, 89, 1, 'یوزرنیم شما', NULL, 1, NULL, 'active', '2022-07-25 08:56:19', '2022-07-25 08:56:19'),
(318, 89, 3, 'رمز عبور شما', NULL, 2, NULL, 'active', '2022-07-25 08:56:46', '2022-07-25 08:56:46'),
(319, 90, 1, 'نام کاربری شما در skype', NULL, 1, NULL, 'active', '2022-07-25 09:00:13', '2022-07-25 09:00:13'),
(320, 90, 3, 'رمزعبور شما در skype', NULL, 2, NULL, 'active', '2022-07-25 09:00:38', '2022-07-25 09:00:38'),
(321, 90, 1, 'خدمات مورد نیاز', NULL, 3, NULL, 'active', '2022-07-25 09:01:00', '2022-07-25 09:01:00'),
(322, 90, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-25 09:01:26', '2022-07-25 09:01:26'),
(323, 91, 1, 'نام کاربری شما در skype', NULL, 1, NULL, 'active', '2022-07-25 09:02:56', '2022-07-25 09:02:56'),
(324, 91, 3, 'رمزعبور شما در skype', NULL, 2, NULL, 'active', '2022-07-25 09:03:24', '2022-07-25 09:03:24'),
(325, 91, 1, 'خدمات مورد نیاز', NULL, 3, NULL, 'active', '2022-07-25 09:03:48', '2022-07-25 09:03:48'),
(326, 91, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-25 09:04:12', '2022-07-25 09:04:12'),
(327, 92, 1, 'نام کاربری شما در skype', NULL, 1, NULL, 'active', '2022-07-25 09:05:47', '2022-07-25 09:05:47'),
(328, 92, 3, 'رمزعبور شما در skype', NULL, 2, NULL, 'active', '2022-07-25 09:06:10', '2022-07-25 09:06:10'),
(329, 92, 1, 'خدمات مورد نیاز', NULL, 3, NULL, 'active', '2022-07-25 09:06:40', '2022-07-25 09:06:40'),
(330, 92, 6, 'توضیحات', NULL, 4, NULL, 'active', '2022-07-25 09:07:07', '2022-07-25 09:07:07');

-- --------------------------------------------------------

--
-- Table structure for table `form_coloumn_mults`
--

CREATE TABLE `form_coloumn_mults` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form_coloumn_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_coloumn_mults`
--

INSERT INTO `form_coloumn_mults` (`id`, `form_coloumn_id`, `name`, `priority`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'بله', 1, 'active', '2022-07-09 09:17:29', '2022-07-09 09:17:29'),
(2, 2, 'خیر', 1, 'active', '2022-07-09 09:17:51', '2022-07-09 09:17:51'),
(3, 2, 'مطمئن نیستم', 1, 'active', '2022-07-09 09:18:11', '2022-07-09 09:18:11'),
(4, 4, 'الکترون', 1, 'active', '2022-07-11 16:04:49', '2022-07-11 16:04:49'),
(5, 6, 'بله', 1, 'active', '2022-07-15 15:37:54', '2022-07-15 15:37:54'),
(6, 6, 'خیر', 1, 'active', '2022-07-15 15:38:24', '2022-07-15 15:38:24'),
(7, 6, 'مطمئن نیستم', 1, 'active', '2022-07-15 15:38:52', '2022-07-15 15:38:52'),
(8, 9, 'بله', 1, 'active', '2022-07-15 15:48:15', '2022-07-15 15:48:15'),
(9, 9, 'خیر', 1, 'active', '2022-07-15 15:48:28', '2022-07-15 15:48:28'),
(10, 9, 'مطمئن نیستم', 1, 'active', '2022-07-15 15:48:47', '2022-07-15 15:48:47'),
(11, 13, 'بله', 1, 'active', '2022-07-15 16:01:54', '2022-07-15 16:01:54'),
(12, 13, 'خیر', 1, 'active', '2022-07-15 16:02:11', '2022-07-15 16:02:11'),
(13, 13, 'مطمئن نیستم', 1, 'active', '2022-07-15 16:02:28', '2022-07-15 16:02:28'),
(14, 17, 'بله', 1, 'active', '2022-07-15 16:09:59', '2022-07-15 16:09:59'),
(15, 17, 'خیر', 1, 'active', '2022-07-15 16:10:12', '2022-07-15 16:10:12'),
(16, 17, 'مطمئن نیستم', 1, 'active', '2022-07-15 16:10:28', '2022-07-15 16:10:28'),
(17, 20, 'بله', 1, 'active', '2022-07-15 16:34:52', '2022-07-15 16:34:52'),
(18, 20, 'خیر', 1, 'active', '2022-07-15 16:35:20', '2022-07-15 16:35:20'),
(19, 20, 'مطمئن نیستم', 1, 'active', '2022-07-15 16:36:29', '2022-07-15 16:36:29'),
(20, 25, 'بله', 1, 'active', '2022-07-15 16:51:02', '2022-07-15 16:51:02'),
(21, 25, 'خیر', 1, 'active', '2022-07-15 16:51:15', '2022-07-15 16:51:15'),
(22, 25, 'مطمئن نیستم', 1, 'active', '2022-07-15 16:51:32', '2022-07-15 16:51:32'),
(23, 28, 'بله', 1, 'active', '2022-07-16 17:16:44', '2022-07-16 17:16:44'),
(24, 28, 'خیر', 1, 'active', '2022-07-16 17:17:02', '2022-07-16 17:17:02'),
(25, 28, 'مطمئن نیستم', 1, 'active', '2022-07-16 17:17:28', '2022-07-16 17:17:28');

-- --------------------------------------------------------

--
-- Table structure for table `form_data`
--

CREATE TABLE `form_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form_coloumn_id` bigint(20) UNSIGNED NOT NULL,
  `form_data_list_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `data` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_data`
--

INSERT INTO `form_data` (`id`, `form_coloumn_id`, `form_data_list_id`, `created_at`, `updated_at`, `data`) VALUES
(14, 30, 10, '2022-08-06 11:40:41', '2022-08-06 11:40:41', 'kkkdm'),
(15, 31, 10, '2022-08-06 11:40:41', '2022-08-06 11:40:41', 'asdad'),
(16, 68, 11, '2022-09-06 06:45:43', '2022-09-06 06:45:43', 'md.dadgostar@gmail.com'),
(17, 70, 11, '2022-09-06 06:45:43', '2022-09-06 06:45:43', NULL),
(18, 71, 11, '2022-09-06 06:45:43', '2022-09-06 06:45:43', NULL),
(19, 68, 12, '2022-09-06 06:46:48', '2022-09-06 06:46:48', NULL),
(20, 70, 12, '2022-09-06 06:46:48', '2022-09-06 06:46:48', NULL),
(21, 71, 12, '2022-09-06 06:46:48', '2022-09-06 06:46:48', NULL),
(22, 30, 13, '2022-09-06 06:47:40', '2022-09-06 06:47:40', NULL),
(23, 31, 13, '2022-09-06 06:47:40', '2022-09-06 06:47:40', NULL),
(24, 30, 14, '2022-09-06 06:48:00', '2022-09-06 06:48:00', NULL),
(25, 31, 14, '2022-09-06 06:48:00', '2022-09-06 06:48:00', NULL),
(26, 23, 15, '2022-09-06 06:48:56', '2022-09-06 06:48:56', NULL),
(27, 24, 15, '2022-09-06 06:48:56', '2022-09-06 06:48:56', 'خودم'),
(28, 25, 15, '2022-09-06 06:48:56', '2022-09-06 06:48:56', '20'),
(29, 26, 15, '2022-09-06 06:48:56', '2022-09-06 06:48:56', NULL),
(30, 1, 16, '2022-09-15 20:34:17', '2022-09-15 20:34:17', 'fdgdfdg'),
(31, 3, 16, '2022-09-15 20:34:17', '2022-09-15 20:34:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `form_data_lists`
--

CREATE TABLE `form_data_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `form_id` bigint(20) UNSIGNED NOT NULL,
  `price_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_data_lists`
--

INSERT INTO `form_data_lists` (`id`, `user_id`, `status`, `created_at`, `updated_at`, `form_id`, `price_id`) VALUES
(9, 1, 'inactive', '2022-07-31 16:36:52', '2022-07-31 16:36:52', 8, 8),
(10, 1, 'inactive', '2022-08-06 11:40:41', '2022-08-06 11:40:41', 12, 9),
(11, 12, 'inactive', '2022-09-06 06:45:43', '2022-09-06 06:45:43', 22, 10),
(12, 12, 'inactive', '2022-09-06 06:46:48', '2022-09-06 06:46:48', 22, 11),
(13, 12, 'inactive', '2022-09-06 06:47:40', '2022-09-06 06:47:40', 12, 12),
(14, 12, 'inactive', '2022-09-06 06:48:00', '2022-09-06 06:48:00', 12, 13),
(15, 12, 'inactive', '2022-09-06 06:48:56', '2022-09-06 06:48:56', 10, 14),
(16, 3, 'inactive', '2022-09-15 20:34:17', '2022-09-15 20:34:17', 2, 15);

-- --------------------------------------------------------

--
-- Table structure for table `form_data_mults`
--

CREATE TABLE `form_data_mults` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form_coloumn_mult_id` bigint(20) UNSIGNED NOT NULL,
  `form_coloumn_id` bigint(20) UNSIGNED NOT NULL,
  `form_data_list_id` bigint(20) UNSIGNED NOT NULL,
  `data` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_data_mults`
--

INSERT INTO `form_data_mults` (`id`, `form_coloumn_mult_id`, `form_coloumn_id`, `form_data_list_id`, `data`, `created_at`, `updated_at`) VALUES
(8, 20, 25, 15, '20', '2022-09-06 06:48:56', '2022-09-06 06:48:56');

-- --------------------------------------------------------

--
-- Table structure for table `form_fields`
--

CREATE TABLE `form_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `multi` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_fields`
--

INSERT INTO `form_fields` (`id`, `name`, `multi`, `created_at`, `updated_at`) VALUES
(1, 'input', 0, '2022-06-23 13:26:59', '2022-06-23 13:26:59'),
(2, 'select', 1, '2022-06-23 13:26:59', '2022-06-23 13:26:59'),
(3, 'password', 0, '2022-06-23 13:26:59', '2022-06-23 13:26:59'),
(4, 'checkbox', 1, '2022-06-23 13:26:59', '2022-06-23 13:26:59'),
(5, 'radiobox', 1, '2022-06-23 13:26:59', '2022-06-23 13:26:59'),
(6, 'textaria', 0, '2022-06-23 13:26:59', '2022-06-23 13:26:59'),
(7, 'datepersian', 1, '2022-06-23 13:26:59', '2022-09-25 08:50:27'),
(8, 'dateenglish', 1, '2022-06-23 13:26:59', '2022-09-25 08:46:50'),
(9, 'price_admin', 1, '2022-06-23 13:26:59', '2022-09-25 08:47:10'),
(10, 'price_user', 1, '2022-06-23 13:26:59', '2022-09-25 08:47:17');

-- --------------------------------------------------------

--
-- Table structure for table `form_subcategories`
--

CREATE TABLE `form_subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_category_id` bigint(20) UNSIGNED NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `text` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_subcategories`
--

INSERT INTO `form_subcategories` (`id`, `name`, `form_category_id`, `link`, `status`, `text`, `image`, `created_at`, `updated_at`) VALUES
(3, 'پی پال', 2, 'paypal', 'active', 'پی پال', '/upload/images/form_subcategories/16579010068acc6e53-8921-3984-a0bf-77f530445c01.png', '2022-07-03 14:57:40', '2022-07-15 16:03:26'),
(4, 'محصولات کارت فیزیکی', 3, 'Physicalcard', 'active', 'محصولات کارت فیزیکی', '', '2022-07-11 15:35:29', '2022-07-11 15:35:29'),
(5, 'وب مانی', 2, 'webmoney', 'active', NULL, '/upload/images/form_subcategories/1657900561ae8aca0b-015c-3c4a-9cbf-7ba64935741d.png', '2022-07-15 15:56:01', '2022-07-15 15:56:01'),
(6, 'پرفکت مانی', 2, 'perfect-money', 'active', NULL, '/upload/images/form_subcategories/1657902426bbedcd92-56d3-360e-a0aa-6c6d995c7776.png', '2022-07-15 16:27:06', '2022-07-15 16:27:06'),
(7, 'اسکریل', 2, 'skrill', 'active', NULL, '/upload/images/form_subcategories/1657984373b0102ee9-ca7a-3dd1-9fb8-f327cac23d01.png', '2022-07-16 15:12:53', '2022-07-16 15:12:53'),
(8, 'پایر', 2, 'payeer', 'active', NULL, '/upload/images/form_subcategories/1657992208c3656ec3-bd7c-39d1-9af6-42c2149320d7.png', '2022-07-16 17:23:28', '2022-07-16 17:23:28'),
(9, 'پایونیر', 2, 'payoneer', 'active', NULL, '/upload/images/form_subcategories/16579924281d0da5a6-53d5-39ea-83ee-f00df6d85c48.png', '2022-07-16 17:27:08', '2022-07-16 17:27:08'),
(10, 'نتلر', 2, 'neteller', 'active', NULL, '/upload/images/form_subcategories/165799249580e6d0ee-11eb-3e1d-b08a-cb644f2155c3.png', '2022-07-16 17:28:15', '2022-07-16 17:28:15'),
(11, 'ادوکش', 2, 'advcash', 'active', NULL, '/upload/images/form_subcategories/165799260707ecc04c-94af-3346-bfd3-0eed64908e2e.png', '2022-07-16 17:30:07', '2022-07-16 17:30:07'),
(12, 'سایتهای بین المللی', 4, 'international-payment', 'active', 'کلیه پرداختهای  سایتهای بین المللی', '/upload/images/form_subcategories/165851881292232e9e-0961-3793-abef-b5a7ea412d39.png', '2022-07-22 19:40:12', '2022-07-22 19:40:12'),
(13, 'خدمات سفر', 4, 'travel', 'active', 'کلیه خدمات سفر', '/upload/images/form_subcategories/165852120809b8e97a-849a-32b8-870a-9440915ad918.png', '2022-07-22 20:20:08', '2022-07-22 20:20:08'),
(14, 'دانشجویی و آزمون‌ بین المللی', 4, 'International-Exams', 'active', 'دانشجویی و آزمون‌ بین المللی', '/upload/images/form_subcategories/16586577661cd9f454-934e-388f-93ef-9b3e40f48634.png', '2022-07-24 10:16:06', '2022-07-24 10:16:06'),
(15, 'ابزارهای سئو', 4, 'seo-tools', 'active', NULL, '/upload/images/form_subcategories/16587310812f716fc0-e416-3c8b-a3d2-61d35b2e1183.png', '2022-07-25 06:38:01', '2022-07-25 06:38:01'),
(16, 'اکانت تریدینگ ویو', 4, 'tradingview', 'active', NULL, '/upload/images/form_subcategories/16587330228ef1f2bb-fe84-33aa-8c51-645d647263ff.png', '2022-07-25 07:10:22', '2022-07-25 07:10:22'),
(17, 'اکانت لینکدین', 4, 'linkedin', 'active', NULL, '/upload/images/form_subcategories/1658734110675760f8-07c1-300d-b289-ca3fec08a7d5.png', '2022-07-25 07:28:30', '2022-07-25 07:28:30'),
(18, 'اکانت کانوا', 4, 'canva', 'active', NULL, '/upload/images/form_subcategories/165873557509426e84-be65-31ac-b3d1-9c6c6fefa203.png', '2022-07-25 07:52:55', '2022-07-25 07:52:55'),
(19, 'اکانت دیزنی پلاس', 4, 'disney-plus', 'active', NULL, '/upload/images/form_subcategories/165873623930e91b24-7d03-3ce6-9115-8519aea2e2f0.png', '2022-07-25 08:03:59', '2022-07-25 08:03:59'),
(20, 'اکانت پلی استیشن پلاس', 4, 'playstation-plus', 'active', NULL, '/upload/images/form_subcategories/1658737011dd0082dd-2002-31f9-b440-84fee2535a9b.png', '2022-07-25 08:16:51', '2022-07-25 08:16:51'),
(21, 'اکانت اسکایپ', 4, 'skype', 'active', NULL, '/upload/images/form_subcategories/1658739493ee486052-0119-3615-8a1d-7140b3b13dd8.png', '2022-07-25 08:58:13', '2022-07-25 08:58:13'),
(22, 'Applications and Web', 1, 'applications', 'active', 'Applications and Web', '/upload/images/form_subcategories/1658768899a2cbba6c-3280-3434-9e3e-5bd801ee78bb.png', '2022-07-25 17:08:19', '2022-07-25 17:08:19'),
(23, 'Games', 1, 'games', 'active', 'Games', '/upload/images/form_subcategories/16587689462c38b082-80fe-3261-99f1-51bebad20eda.png', '2022-07-25 17:09:06', '2022-07-25 17:09:06'),
(24, 'پی پال', 5, 'paypal', 'active', 'پی پال', '/upload/images/form_subcategories/1658856792bf1fbd30-a3b9-39e9-bfa5-aa4f8bbe334f.png', '2022-07-26 17:33:12', '2022-07-26 17:33:12'),
(25, 'اکانتهای ترایال (Trial)', 5, 'trial', 'active', NULL, '/upload/images/form_subcategories/1658903138bc98020f-302e-362c-9413-6cbed04f6839.png', '2022-07-27 06:25:38', '2022-07-27 06:25:38'),
(26, 'اکانت سایت های مختلف', 5, 'accounts', 'active', NULL, '/upload/images/form_subcategories/1658905357a5c6c4d1-ef52-3191-966f-a5c167426f4f.png', '2022-07-27 07:02:37', '2022-07-27 07:02:37'),
(27, 'دیگر سرویس ها', 5, 'other', 'active', NULL, '/upload/images/form_subcategories/16589059978c158cbb-24fe-36e8-b375-cd2c626c80d9.png', '2022-07-27 07:13:17', '2022-07-27 07:13:17'),
(28, 'کیف پول سخت افزاری', 5, 'hardware-wallets', 'active', NULL, '/upload/images/form_subcategories/16589084191d4b02ee-8da9-3ef5-8e4a-7c06ec8b3987.png', '2022-07-27 07:53:39', '2022-07-27 07:53:39'),
(29, 'سرور مجازی', 5, 'vps', 'active', NULL, '/upload/images/form_subcategories/1658910919dd83e1f6-4ced-34ed-9bb1-6d3f3b9f2d34.png', '2022-07-27 08:35:19', '2022-07-27 08:35:19');

-- --------------------------------------------------------

--
-- Table structure for table `form_templates`
--

CREATE TABLE `form_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_templates`
--

INSERT INTO `form_templates` (`id`, `name`, `link`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 'مدال1', 'modal1', 'active', '', '2022-06-26 16:49:52', '2022-06-26 16:49:52'),
(2, 'پول الکترونیک', 'template_money', 'active', '', '2022-07-03 15:03:32', '2022-07-03 15:03:32'),
(3, 'محصولات کارت فیزیکی', 'template_Physicalcard', 'active', '', '2022-07-11 15:39:22', '2022-07-11 15:45:58'),
(4, 'محصولات پرداختهای بین المللی', 'template_InternetPayment', 'active', '', '2022-07-22 19:50:46', '2022-07-22 19:50:46'),
(5, 'سرویس_توضیحات', 'service_desc', 'active', '', '2022-07-26 17:34:03', '2022-07-26 17:34:03'),
(6, 'سرویس_فیلد', 'service_field', 'active', '', '2022-07-26 17:34:33', '2022-07-26 17:34:33');

-- --------------------------------------------------------

--
-- Table structure for table `getwaypayments`
--

CREATE TABLE `getwaypayments` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merchent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `iconfonts`
--

CREATE TABLE `iconfonts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `font` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laws`
--

CREATE TABLE `laws` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loginhistories`
--

CREATE TABLE `loginhistories` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `arou` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
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
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2021_12_20_181221_create_settings_table', 1),
(11, '2021_12_21_131821_create_txtdeses_table', 1),
(12, '2021_12_23_111701_create_mngfinicals_table', 1),
(13, '2021_12_24_125738_create_laws_table', 1),
(14, '2021_12_24_133828_create_getwaypayments_table', 1),
(15, '2021_12_26_064310_create_spotlites_table', 1),
(16, '2021_12_26_091849_create_iconfonts_table', 1),
(17, '2021_12_26_094536_create_comids_table', 1),
(18, '2022_03_02_141454_create_wallets_table', 1),
(19, '2022_03_02_155240_create_tickets_table', 1),
(20, '2022_03_02_181719_create_messages_table', 1),
(21, '2022_05_19_095934_create_admins_table', 1),
(22, '2022_05_19_144811_add_feild_table_users', 1),
(23, '2022_05_19_145600_create_loginhistories_table', 1),
(24, '2022_05_19_162727_create_faqs_table', 1),
(25, '2022_05_19_162933_create_pages_table', 1),
(26, '2022_05_24_212951_add_feild1_table_settings', 1),
(27, '2022_05_29_212803_add_feild1_table_admins', 1),
(28, '2022_05_31_112302_create_form_categories_table', 1),
(29, '2022_05_31_112759_create_form_subcategories_table', 1),
(30, '2022_05_31_115008_create_form_fields_table', 1),
(31, '2022_05_31_115518_create_forms_table', 1),
(32, '2022_05_31_120427_create_form_coloumns_table', 1),
(33, '2022_05_31_122202_create_form_coloumn_mults_table', 1),
(34, '2022_05_31_122816_create_form_data_lists_table', 1),
(35, '2022_05_31_123218_create_form_data_table', 1),
(36, '2022_05_31_124201_create_form_data_mults_table', 1),
(37, '2022_06_17_131724_add_feild_table_formss', 1),
(38, '2022_06_21_194025_add_feild1_table_form_coloumns', 1),
(39, '2022_06_23_232444_add_feild_table_form_data_lists', 1),
(40, '2022_06_25_161605_create_currencies_table', 1),
(41, '2022_06_25_161951_add_treefield_to_forms', 1),
(42, '2022_06_25_162051_add_pricefield_to_form_data_lists', 1),
(43, '2022_06_26_120551_create_form_templates_table', 1),
(44, '2022_06_26_123220_add_fieldtemplate_to_forms', 1),
(45, '2022_06_28_134616_add_fieldtext_to_forms', 2),
(46, '2022_06_30_141914_add_feildformcurrencyid_table_forms', 3),
(47, '2022_06_30_165450_add_feildimage_table_form_categories', 4),
(48, '2022_06_30_165628_add_feildimage_table_form_subcategories', 5),
(49, '2022_06_30_171755_add_feildtext_table_form_subcategories', 6),
(50, '2022_06_30_171854_add_feildtext_table_form_categories', 6),
(51, '2022_07_03_201540_add_feildshort_table_forms', 7),
(52, '2022_07_14_174624_create_prices_table', 8),
(53, '2022_07_14_180642_add_feild_price_id_table_form_data_lists', 9),
(54, '2022_07_15_185535_add_data_form_data_table', 10),
(55, '2022_07_20_091914_add_typeservice_to_forms', 11),
(56, '2022_07_20_153209_create_typeservices_table', 11),
(57, '2022_07_20_161548_create_setting_sms_table', 11),
(58, '2022_07_20_162557_create_notification_services_table', 11),
(59, '2022_07_20_162742_create_notification_types_table', 11),
(60, '2022_07_20_162926_create_notification_lists_table', 11),
(61, '2022_07_20_163801_add_link_to_notification_list', 11),
(62, '2022_07_20_164012_add_link_to_notification_types', 11),
(63, '2022_07_20_164810_create_notification_messages_table', 11),
(64, '2022_07_20_171919_add_setting_id_to_setting_sms', 11),
(65, '2022_07_21_123435_add_text_default_notification_lists_table', 12),
(66, '2022_07_22_130957_create_authentications_table', 13),
(67, '2022_07_22_134919_create_banks_table', 13),
(68, '2022_07_23_152801_create_bank_accounts_table', 14),
(69, '2022_07_23_172657_add_status_to_authentications', 14),
(70, '2022_07_23_173904_add_multifield_to_authentications', 14),
(71, '2022_07_25_154940_create_timelines_table', 14),
(72, '2022_07_26_210544_add_tells_code_verify_authentications_table', 14),
(73, '2022_07_29_193505_create_price_fees_table', 14),
(74, '2022_07_29_200454_create_price_finicals_table', 14),
(75, '2022_07_31_164509_add_field_price_price_finicals', 15),
(76, '2022_09_09_124511_add_image_to_banks_table', 16),
(77, '2022_09_09_154657_add_two_field_to_timelines_table', 16),
(78, '2022_09_09_193150_add_tells_to_users_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `mngfinicals`
--

CREATE TABLE `mngfinicals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rateusd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification_lists`
--

CREATE TABLE `notification_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `notification_service_id` bigint(20) UNSIGNED NOT NULL,
  `notification_type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_default` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_lists`
--

INSERT INTO `notification_lists` (`id`, `name`, `status`, `notification_service_id`, `notification_type_id`, `created_at`, `updated_at`, `link`, `text_default`) VALUES
(1, 'اسمس ثبت نام', 'inactive', 1, 1, NULL, NULL, 'sms_register', 'متن پیش فرض اسمس ثبت نام'),
(2, 'ایمیل ثبت نام', 'inactive', 2, 1, NULL, NULL, 'email_register', 'متن پیش فرض اسمس ثبت نام'),
(3, 'نوتیفیکشن ثبت نام', 'inactive', 3, 1, NULL, NULL, 'notification_sms', 'متن پیش فرض اسمس نوتیفکشن '),
(4, 'اسمس ورود', 'inactive', 1, 2, NULL, NULL, 'sms_login', 'متن پیش فرض اسمس ورود'),
(5, 'ایمیل ورود', 'active', 2, 2, NULL, '2022-07-21 13:11:53', 'email_login', 'متن پیش فرض ایمیل ورود '),
(6, 'نوتیفکشن ورود', 'inactive', 3, 2, NULL, NULL, 'notification_login', 'متن پیش فرض نوتیفکیکشن ورود'),
(7, 'اسمس اعتبارسنجی ورود', 'active', 1, 3, NULL, '2022-08-25 11:21:18', 'sms_verifylogin', 'کد تایید شما :  #verfytell Tehranxe.com خدمات پرداختهای بین المللی'),
(8, 'ایمیل اعتبارسنجی ورود', 'active', 2, 3, NULL, '2022-08-25 11:21:49', 'email_verifylogin', '<p>کد تایید شما :&nbsp; #verfyemail Tehranxe.com خدمات پرداختهای بین المللی</p>'),
(9, 'نوتیفیکشن اعتبارسنجی ورود', 'inactive', 3, 3, NULL, NULL, 'notification_verifylogin', 'متن پیش فرض نوتیفکشن اعتبارسنجی ورود'),
(10, 'اسمس ثبت درخواست', 'inactive', 1, 4, NULL, NULL, 'sms_requestform', 'متن پیش فرض اسمس ثبت درخواست'),
(11, 'ایمیل ثبت درخواست', 'inactive', 2, 4, NULL, NULL, 'email_requestform', 'متن پیش فرض ایمیل ثبت درخواست'),
(12, 'نوتیفیکشن ثبت درخواست', 'inactive', 3, 4, NULL, NULL, 'sms_notification', 'متن پیش فرض نوتیفکشن ثبت درخواست');

-- --------------------------------------------------------

--
-- Table structure for table `notification_messages`
--

CREATE TABLE `notification_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `notification_list_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_messages`
--

INSERT INTO `notification_messages` (`id`, `text`, `user_id`, `notification_list_id`, `created_at`, `updated_at`) VALUES
(1, 'کد تایید شما :   Tehranxe.com خدمات پرداختهای بین المللی', 1, 7, '2022-08-25 11:23:10', '2022-08-25 11:23:10'),
(2, '<p>کد تایید شما :&nbsp; ikb8N Tehranxe.com خدمات پرداختهای بین المللی</p>', 1, 8, '2022-08-25 11:23:10', '2022-08-25 11:23:10'),
(3, 'کد تایید شما :   Tehranxe.com خدمات پرداختهای بین المللی', 1, 7, '2022-08-25 11:40:51', '2022-08-25 11:40:51'),
(4, '<p>کد تایید شما :&nbsp; ikb8N Tehranxe.com خدمات پرداختهای بین المللی</p>', 1, 8, '2022-08-25 11:40:51', '2022-08-25 11:40:51'),
(5, 'کد تایید شما :   Tehranxe.com خدمات پرداختهای بین المللی', 1, 7, '2022-08-25 11:58:03', '2022-08-25 11:58:03'),
(6, '<p>کد تایید شما :&nbsp; ikb8N Tehranxe.com خدمات پرداختهای بین المللی</p>', 1, 8, '2022-08-25 11:58:04', '2022-08-25 11:58:04'),
(7, 'کد تایید شما :   Tehranxe.com خدمات پرداختهای بین المللی', 1, 7, '2022-08-26 06:51:12', '2022-08-26 06:51:12'),
(8, '<p>کد تایید شما :&nbsp; ikb8N Tehranxe.com خدمات پرداختهای بین المللی</p>', 1, 8, '2022-08-26 06:51:13', '2022-08-26 06:51:13'),
(9, 'کد تایید شما :  697460 Tehranxe.com خدمات پرداختهای بین المللی', 1, 7, '2022-08-26 06:53:32', '2022-08-26 06:53:32'),
(10, '<p>کد تایید شما :&nbsp; ikb8N Tehranxe.com خدمات پرداختهای بین المللی</p>', 1, 8, '2022-08-26 06:53:33', '2022-08-26 06:53:33'),
(11, 'کد تایید شما :  241271 Tehranxe.com خدمات پرداختهای بین المللی', 1, 7, '2022-08-26 06:55:33', '2022-08-26 06:55:33'),
(12, '<p>کد تایید شما :&nbsp; ikb8N Tehranxe.com خدمات پرداختهای بین المللی</p>', 1, 8, '2022-08-26 06:55:34', '2022-08-26 06:55:34'),
(13, 'کد تایید شما :  319115 Tehranxe.com خدمات پرداختهای بین المللی', 1, 7, '2022-08-26 06:57:00', '2022-08-26 06:57:00'),
(14, '<p>کد تایید شما :&nbsp; ikb8N Tehranxe.com خدمات پرداختهای بین المللی</p>', 1, 8, '2022-08-26 06:57:01', '2022-08-26 06:57:01'),
(15, 'کد تایید شما :  144804 Tehranxe.com خدمات پرداختهای بین المللی', 1, 7, '2022-08-26 07:02:15', '2022-08-26 07:02:15'),
(16, '<p>کد تایید شما :&nbsp; ikb8N Tehranxe.com خدمات پرداختهای بین المللی</p>', 1, 8, '2022-08-26 07:02:15', '2022-08-26 07:02:15'),
(17, 'کد تایید شما :  453203 Tehranxe.com خدمات پرداختهای بین المللی', 1, 7, '2022-09-02 16:14:41', '2022-09-02 16:14:41'),
(18, '<p>کد تایید شما :&nbsp; 853123 Tehranxe.com خدمات پرداختهای بین المللی</p>', 1, 8, '2022-09-03 12:05:58', '2022-09-03 12:05:58'),
(19, 'کد تایید شما :  863470 Tehranxe.com خدمات پرداختهای بین المللی', 12, 7, '2022-09-06 06:41:07', '2022-09-06 06:41:07'),
(20, '<p>کد تایید شما :&nbsp; 993432 Tehranxe.com خدمات پرداختهای بین المللی</p>', 12, 8, '2022-09-06 06:41:47', '2022-09-06 06:41:47'),
(21, 'کد تایید شما :  139193 Tehranxe.com خدمات پرداختهای بین المللی', 3, 7, '2022-09-15 20:32:22', '2022-09-15 20:32:22');

-- --------------------------------------------------------

--
-- Table structure for table `notification_services`
--

CREATE TABLE `notification_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_services`
--

INSERT INTO `notification_services` (`id`, `name`, `link`, `created_at`, `updated_at`) VALUES
(1, 'اسمس', 'sms', NULL, NULL),
(2, 'ایمیل', 'email', NULL, NULL),
(3, 'نوتیفیکشن', 'notification', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notification_types`
--

CREATE TABLE `notification_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_types`
--

INSERT INTO `notification_types` (`id`, `name`, `created_at`, `updated_at`, `link`) VALUES
(1, 'ثبت نام', NULL, NULL, 'register'),
(2, 'ورود', NULL, NULL, 'login'),
(3, 'اعتبارسنجی ورود', NULL, NULL, 'validation_login'),
(4, 'ثبت درخواست', NULL, NULL, 'request_form');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `money` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `money`, `currency`, `created_at`, `updated_at`) VALUES
(8, '15', '1', '2022-07-31 16:36:52', '2022-07-31 16:36:52'),
(9, '1000', '1', '2022-08-06 11:40:41', '2022-08-06 11:40:41'),
(10, '100', '1', '2022-09-06 06:45:43', '2022-09-06 06:45:43'),
(11, '1000', '1', '2022-09-06 06:46:48', '2022-09-06 06:46:48'),
(12, '1', '1', '2022-09-06 06:47:40', '2022-09-06 06:47:40'),
(13, '3', '1', '2022-09-06 06:47:59', '2022-09-06 06:47:59'),
(14, '1000', '1', '2022-09-06 06:48:56', '2022-09-06 06:48:56'),
(15, '1000', '1', '2022-09-15 20:34:17', '2022-09-15 20:34:17');

-- --------------------------------------------------------

--
-- Table structure for table `price_fees`
--

CREATE TABLE `price_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `currency_id` bigint(20) UNSIGNED NOT NULL,
  `money` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `price_fees`
--

INSERT INTO `price_fees` (`id`, `currency_id`, `money`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, '4', '1344000', NULL, '2022-09-25 07:09:58');

-- --------------------------------------------------------

--
-- Table structure for table `price_finicals`
--

CREATE TABLE `price_finicals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form_data_list_id` bigint(20) UNSIGNED NOT NULL,
  `fee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `price_finicals`
--

INSERT INTO `price_finicals` (`id`, `price`, `form_data_list_id`, `fee`, `sum`, `created_at`, `updated_at`) VALUES
(1, '5040000', 9, '1680000', '6720000', '2022-07-31 16:36:52', '2022-07-31 16:36:52'),
(2, '336000000', 10, '1680000', '337680000', '2022-08-06 11:40:41', '2022-08-06 11:40:41'),
(3, '33600000', 11, '1680000', '35280000', '2022-09-06 06:45:43', '2022-09-06 06:45:43'),
(4, '336000000', 12, '1680000', '337680000', '2022-09-06 06:46:48', '2022-09-06 06:46:48'),
(5, '336000', 13, '1680000', '2016000', '2022-09-06 06:47:40', '2022-09-06 06:47:40'),
(6, '1008000', 14, '1680000', '2688000', '2022-09-06 06:48:00', '2022-09-06 06:48:00'),
(7, '336000000', 15, '1680000', '337680000', '2022-09-06 06:48:56', '2022-09-06 06:48:56'),
(8, '336000000', 16, '1680000', '337680000', '2022-09-15 20:34:17', '2022-09-15 20:34:17');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `textheader` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tell` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyword` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcopy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `analatik` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codetiket` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `template` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `textheader`, `whatsapp`, `instagram`, `facebook`, `twitter`, `youtube`, `tell`, `email`, `address`, `description`, `keyword`, `fcopy`, `analatik`, `codetiket`, `favicon`, `logo`, `_token`, `template`, `api`, `created_at`, `updated_at`) VALUES
(1, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, NULL, '', '', '', NULL, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setting_sms`
--

CREATE TABLE `setting_sms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `setting_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting_sms`
--

INSERT INTO `setting_sms` (`id`, `name`, `api`, `username`, `password`, `token`, `url`, `status`, `created_at`, `updated_at`, `setting_id`) VALUES
(1, 'درگاه پیامک', 'Api', 'UserName', 'Password', 'Token', 'Url', 'active', NULL, '2022-07-21 07:21:53', '1');

-- --------------------------------------------------------

--
-- Table structure for table `spotlites`
--

CREATE TABLE `spotlites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `fromshow` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'read' COMMENT 'read , unread ',
  `toshow` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unread' COMMENT 'read , unread ',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'waiting' COMMENT 'response , waiting , close',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `timelines`
--

CREATE TABLE `timelines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `activition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_data_list_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `showadmin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'unread',
  `showuser` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'unread',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timelines`
--

INSERT INTO `timelines` (`id`, `activition`, `form_data_list_id`, `text`, `flag`, `guard`, `user_id`, `showadmin`, `showuser`, `created_at`, `updated_at`) VALUES
(1, 'selfi', '', '', 'waiting', 'user', 12, 'read', 'unread', '2022-09-06 06:43:21', '2022-09-25 08:07:47'),
(2, 'document', '', '', 'waiting', 'user', 12, 'read', 'unread', '2022-09-06 06:43:28', '2022-09-25 08:07:38'),
(3, 'document', '', 'تایید شد', 'active', 'user', 12, 'read', 'unread', '2022-09-06 06:44:40', '2022-09-25 08:07:38');

-- --------------------------------------------------------

--
-- Table structure for table `txtdeses`
--

CREATE TABLE `txtdeses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `typeserveices`
--

CREATE TABLE `typeserveices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `typeserveices`
--

INSERT INTO `typeserveices` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'buy', NULL, NULL),
(2, 'sell', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tell` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tells` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `referal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `address`, `tell`, `tells`, `image`, `ip`, `status`, `referal`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mustafa1390', NULL, '09137775568', NULL, NULL, NULL, 'active', NULL, 'مصطفی یوسفی', 'mustafa13900@gmail.com', NULL, '$2y$10$FqFLsBe6yop9XJozryf8a.4TbqIUQumfsuI9XpMKaLVd5ueBNFb0q', NULL, '2022-07-03 15:29:12', '2022-09-03 12:06:53'),
(2, 'poldooni', NULL, '09345553696', NULL, NULL, NULL, 'active', NULL, 'محمد', 'polodi@gmail.com', NULL, '$2y$10$muNxi6ycl0YTdrjWhkNnFOdX1XSuptTWNWnYhL67d18C2U.vhAzI6', NULL, '2022-08-01 09:09:28', '2022-08-01 09:09:28'),
(3, 'atlasie', NULL, '09134055584', NULL, NULL, NULL, 'active', NULL, 'ابراهیم اطلسی', 'atlasimehmet99@gmail.com', NULL, '$2y$10$huZX44YU0Y55xPMrluksW.R10aA6KrV8f2KxQUaHeSdOd09osGtRa', NULL, '2022-08-04 15:06:39', '2022-09-15 20:33:23'),
(4, 'pouyan', NULL, '09153036296', NULL, NULL, NULL, 'active', NULL, 'پویان فرزاد', 'pouyanfarzad@gmail.com', NULL, '$2y$10$KRcCb0V9aVyCWXsOmHN0W.kLsI9GNSgaPrVjEvVlbDmN6agrSGjFy', NULL, '2022-08-05 18:18:38', '2022-08-05 18:18:38'),
(5, 'ranjbar.iau@gmail.com', NULL, '09353646702', NULL, NULL, NULL, 'active', NULL, 'اسداله رنجبر', 'Ranjbar.iau@gmail.com', NULL, '$2y$10$KAoylktCrtYOOnTQ4pnfZeTdyuwBqk.VNEQHDV.kuY.wk1QQYxDWW', NULL, '2022-08-06 08:25:17', '2022-08-06 08:25:17'),
(6, 'bestmosi', NULL, '09126008606', NULL, NULL, NULL, 'active', NULL, 'mostafa khalaf nezhad', 'bestmosi@gmail.com', NULL, '$2y$10$gkEoI3GqJoAJ7Xq0uLPJ1eYgP91ZwOVlCFM..tGJ3fxSYtKoeOFiW', NULL, '2022-08-08 08:59:58', '2022-08-08 08:59:58'),
(7, 'samadsepehri', NULL, '09300221020', NULL, NULL, NULL, 'active', NULL, 'صمد سپهری', 'sepehri302@gmail.com', NULL, '$2y$10$dabFsVD3dIOZqUMuydHtg.oAVt3w0ERuTpXQLLkNOWrgOAvO1NWu6', NULL, '2022-08-13 06:23:34', '2022-08-13 06:23:34'),
(9, 'mustafa139740@gmail.com', NULL, '09384762355', NULL, NULL, NULL, 'active', NULL, 'مصطفی جامی', 'mustafa13930@gmail.com', NULL, '$2y$10$JTVlRyh488gI6MRR/p2St.wVbWJY1W4KGV.3KhLwiJ7jD1aItySWC', NULL, '2022-08-19 12:10:17', '2022-08-19 12:10:17'),
(10, 'ellham1390', NULL, '09364762275', NULL, NULL, NULL, 'active', NULL, 'etet', 'mustafa13454390@gmail.com', NULL, '$2y$10$GvjMfx1IBUxgEwUUUDxLFOyv6INR5eA0jiQHhIixcvUV08ODijPJW', NULL, '2022-08-19 16:23:15', '2022-08-19 16:23:15'),
(12, 'md.dadgostar1', NULL, '09194148009', NULL, NULL, NULL, 'active', NULL, 'مهدی دادگستر', 'binturkish01@gmail.com', NULL, '$2y$10$bcAI2kfR.daOyr1VvWuUqeNmgM9czHBdGWVsblXLyEFg7nOLMQwVG', NULL, '2022-09-06 06:41:07', '2022-09-06 06:41:07');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `textadmin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'inc is Increase ,  dec is Decrease',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive' COMMENT 'active , inactive',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `authentications`
--
ALTER TABLE `authentications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `authentications_user_id_foreign` (`user_id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_accounts_user_id_foreign` (`user_id`),
  ADD KEY `bank_accounts_bank_id_foreign` (`bank_id`);

--
-- Indexes for table `comids`
--
ALTER TABLE `comids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forms_form_subcategory_id_foreign` (`form_subcategory_id`),
  ADD KEY `forms_form_template_id_foreign` (`form_template_id`);

--
-- Indexes for table `form_categories`
--
ALTER TABLE `form_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_coloumns`
--
ALTER TABLE `form_coloumns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_coloumns_form_id_foreign` (`form_id`),
  ADD KEY `form_coloumns_form_field_id_foreign` (`form_field_id`);

--
-- Indexes for table `form_coloumn_mults`
--
ALTER TABLE `form_coloumn_mults`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_coloumn_mults_form_coloumn_id_foreign` (`form_coloumn_id`);

--
-- Indexes for table `form_data`
--
ALTER TABLE `form_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_data_form_coloumn_id_foreign` (`form_coloumn_id`),
  ADD KEY `form_data_form_data_list_id_foreign` (`form_data_list_id`);

--
-- Indexes for table `form_data_lists`
--
ALTER TABLE `form_data_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_data_lists_user_id_foreign` (`user_id`),
  ADD KEY `form_data_lists_form_id_foreign` (`form_id`),
  ADD KEY `form_data_lists_price_id_foreign` (`price_id`);

--
-- Indexes for table `form_data_mults`
--
ALTER TABLE `form_data_mults`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_data_mults_form_coloumn_mult_id_foreign` (`form_coloumn_mult_id`),
  ADD KEY `form_data_mults_form_coloumn_id_foreign` (`form_coloumn_id`),
  ADD KEY `form_data_mults_form_data_list_id_foreign` (`form_data_list_id`);

--
-- Indexes for table `form_fields`
--
ALTER TABLE `form_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_subcategories`
--
ALTER TABLE `form_subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_subcategories_form_category_id_foreign` (`form_category_id`);

--
-- Indexes for table `form_templates`
--
ALTER TABLE `form_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `getwaypayments`
--
ALTER TABLE `getwaypayments`
  ADD KEY `getwaypayments_setting_id_index` (`setting_id`);

--
-- Indexes for table `iconfonts`
--
ALTER TABLE `iconfonts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laws`
--
ALTER TABLE `laws`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laws_setting_id_index` (`setting_id`);

--
-- Indexes for table `loginhistories`
--
ALTER TABLE `loginhistories`
  ADD KEY `loginhistories_user_id_index` (`user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_ticket_id_foreign` (`ticket_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mngfinicals`
--
ALTER TABLE `mngfinicals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mngfinicals_setting_id_index` (`setting_id`);

--
-- Indexes for table `notification_lists`
--
ALTER TABLE `notification_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notification_lists_notification_service_id_foreign` (`notification_service_id`),
  ADD KEY `notification_lists_notification_type_id_foreign` (`notification_type_id`);

--
-- Indexes for table `notification_messages`
--
ALTER TABLE `notification_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notification_messages_user_id_foreign` (`user_id`),
  ADD KEY `notification_messages_notification_list_id_foreign` (`notification_list_id`);

--
-- Indexes for table `notification_services`
--
ALTER TABLE `notification_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_types`
--
ALTER TABLE `notification_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price_fees`
--
ALTER TABLE `price_fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `price_fees_currency_id_foreign` (`currency_id`);

--
-- Indexes for table `price_finicals`
--
ALTER TABLE `price_finicals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `price_finicals_form_data_list_id_foreign` (`form_data_list_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_sms`
--
ALTER TABLE `setting_sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spotlites`
--
ALTER TABLE `spotlites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_user_id_foreign` (`user_id`);

--
-- Indexes for table `timelines`
--
ALTER TABLE `timelines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `timelines_user_id_foreign` (`user_id`);

--
-- Indexes for table `txtdeses`
--
ALTER TABLE `txtdeses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typeserveices`
--
ALTER TABLE `typeserveices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallets_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `authentications`
--
ALTER TABLE `authentications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comids`
--
ALTER TABLE `comids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `form_categories`
--
ALTER TABLE `form_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `form_coloumns`
--
ALTER TABLE `form_coloumns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=331;

--
-- AUTO_INCREMENT for table `form_coloumn_mults`
--
ALTER TABLE `form_coloumn_mults`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `form_data`
--
ALTER TABLE `form_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `form_data_lists`
--
ALTER TABLE `form_data_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `form_data_mults`
--
ALTER TABLE `form_data_mults`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `form_fields`
--
ALTER TABLE `form_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `form_subcategories`
--
ALTER TABLE `form_subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `form_templates`
--
ALTER TABLE `form_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `iconfonts`
--
ALTER TABLE `iconfonts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laws`
--
ALTER TABLE `laws`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `mngfinicals`
--
ALTER TABLE `mngfinicals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification_lists`
--
ALTER TABLE `notification_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notification_messages`
--
ALTER TABLE `notification_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `notification_services`
--
ALTER TABLE `notification_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notification_types`
--
ALTER TABLE `notification_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `price_fees`
--
ALTER TABLE `price_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `price_finicals`
--
ALTER TABLE `price_finicals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_sms`
--
ALTER TABLE `setting_sms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `spotlites`
--
ALTER TABLE `spotlites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timelines`
--
ALTER TABLE `timelines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `txtdeses`
--
ALTER TABLE `txtdeses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `typeserveices`
--
ALTER TABLE `typeserveices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authentications`
--
ALTER TABLE `authentications`
  ADD CONSTRAINT `authentications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD CONSTRAINT `bank_accounts_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bank_accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `forms`
--
ALTER TABLE `forms`
  ADD CONSTRAINT `forms_form_subcategory_id_foreign` FOREIGN KEY (`form_subcategory_id`) REFERENCES `form_subcategories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `forms_form_template_id_foreign` FOREIGN KEY (`form_template_id`) REFERENCES `form_templates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form_coloumns`
--
ALTER TABLE `form_coloumns`
  ADD CONSTRAINT `form_coloumns_form_field_id_foreign` FOREIGN KEY (`form_field_id`) REFERENCES `form_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `form_coloumns_form_id_foreign` FOREIGN KEY (`form_id`) REFERENCES `forms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form_coloumn_mults`
--
ALTER TABLE `form_coloumn_mults`
  ADD CONSTRAINT `form_coloumn_mults_form_coloumn_id_foreign` FOREIGN KEY (`form_coloumn_id`) REFERENCES `form_coloumns` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form_data`
--
ALTER TABLE `form_data`
  ADD CONSTRAINT `form_data_form_coloumn_id_foreign` FOREIGN KEY (`form_coloumn_id`) REFERENCES `form_coloumns` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `form_data_form_data_list_id_foreign` FOREIGN KEY (`form_data_list_id`) REFERENCES `form_data_lists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form_data_lists`
--
ALTER TABLE `form_data_lists`
  ADD CONSTRAINT `form_data_lists_form_id_foreign` FOREIGN KEY (`form_id`) REFERENCES `forms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `form_data_lists_price_id_foreign` FOREIGN KEY (`price_id`) REFERENCES `prices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `form_data_lists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form_data_mults`
--
ALTER TABLE `form_data_mults`
  ADD CONSTRAINT `form_data_mults_form_coloumn_id_foreign` FOREIGN KEY (`form_coloumn_id`) REFERENCES `form_coloumns` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `form_data_mults_form_coloumn_mult_id_foreign` FOREIGN KEY (`form_coloumn_mult_id`) REFERENCES `form_coloumn_mults` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `form_data_mults_form_data_list_id_foreign` FOREIGN KEY (`form_data_list_id`) REFERENCES `form_data_lists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form_subcategories`
--
ALTER TABLE `form_subcategories`
  ADD CONSTRAINT `form_subcategories_form_category_id_foreign` FOREIGN KEY (`form_category_id`) REFERENCES `form_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `getwaypayments`
--
ALTER TABLE `getwaypayments`
  ADD CONSTRAINT `getwaypayments_setting_id_foreign` FOREIGN KEY (`setting_id`) REFERENCES `settings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laws`
--
ALTER TABLE `laws`
  ADD CONSTRAINT `laws_setting_id_foreign` FOREIGN KEY (`setting_id`) REFERENCES `settings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loginhistories`
--
ALTER TABLE `loginhistories`
  ADD CONSTRAINT `loginhistories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mngfinicals`
--
ALTER TABLE `mngfinicals`
  ADD CONSTRAINT `mngfinicals_setting_id_foreign` FOREIGN KEY (`setting_id`) REFERENCES `settings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notification_lists`
--
ALTER TABLE `notification_lists`
  ADD CONSTRAINT `notification_lists_notification_service_id_foreign` FOREIGN KEY (`notification_service_id`) REFERENCES `notification_services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notification_lists_notification_type_id_foreign` FOREIGN KEY (`notification_type_id`) REFERENCES `notification_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notification_messages`
--
ALTER TABLE `notification_messages`
  ADD CONSTRAINT `notification_messages_notification_list_id_foreign` FOREIGN KEY (`notification_list_id`) REFERENCES `notification_lists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notification_messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `price_fees`
--
ALTER TABLE `price_fees`
  ADD CONSTRAINT `price_fees_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `price_finicals`
--
ALTER TABLE `price_finicals`
  ADD CONSTRAINT `price_finicals_form_data_list_id_foreign` FOREIGN KEY (`form_data_list_id`) REFERENCES `form_data_lists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `timelines`
--
ALTER TABLE `timelines`
  ADD CONSTRAINT `timelines_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wallets`
--
ALTER TABLE `wallets`
  ADD CONSTRAINT `wallets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
