-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生時間： 2015-11-08 12:36:36
-- 伺服器版本: 5.6.25-log
-- PHP 版本： 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `ienglish_tutors`
--

-- --------------------------------------------------------

--
-- 資料表結構 `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `Id` int(10) NOT NULL,
  `Title` varchar(225) NOT NULL,
  `StartAt` datetime NOT NULL,
  `EndAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `course_files`
--

CREATE TABLE IF NOT EXISTS `course_files` (
  `Id` int(11) NOT NULL,
  `C_Id` int(11) NOT NULL,
  `Path` varchar(225) NOT NULL,
  `Name` varchar(225) NOT NULL,
  `Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `language`
--

INSERT INTO `language` (`Id`, `Name`) VALUES
(1, 'en-US'),
(2, 'zh-TW');

-- --------------------------------------------------------

--
-- 資料表結構 `language_usage`
--

CREATE TABLE IF NOT EXISTS `language_usage` (
  `Id` int(11) NOT NULL,
  `L_Id` int(11) NOT NULL,
  `IsScript` tinyint(1) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `VarName` varchar(50) NOT NULL,
  `Content` text NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `language_usage`
--

INSERT INTO `language_usage` (`Id`, `L_Id`, `IsScript`, `Name`, `VarName`, `Content`, `Date`) VALUES
(1, 2, 1, 'Home:Lobby', 'LobbyJson', '{\n  Slides: [\n    { src: "/assets/images/Home/0.jpg" },\n    { src: "/assets/images/Home/1.jpg" },\n    { src: "/assets/images/Home/2.jpg" },\n    { src: "/assets/images/Home/3.jpg" },\n    { src: "/assets/images/Home/4.jpg" }\n  ],\n  Header: {\n    Brand: "愛力克美語",\n    Language: "語系",\n    Nav: [\n      { Text: "關於", Target: "#" },\n      { Text: "課程", Target: "#courses" },\n      { Text: "師資", Target: "#teacher" },\n      { Text: "聯絡我們", Target: "#contactus" },\n      { Text: "服務據點", Target: "#location" },\n      { Text: "開發團隊", Target: "#developers" }\n    ]\n  },\n  AboutUs: {\n    Title: "享受學習!",\n    Content: "我們課程全美語沒有中文，讓學生能與外師零距離互動，使每位學生有機會開口說英語。營造全美語教學環境，我們堅持學習品質，採用一對一或一對二教學。"\n  },\n  Courses: {\n    Title: "課程",\n    Content: "適合對象: 6歲以上/國高中生/準備出國留學或深造/社會人士/個人進修...",\n    Classes: [{\n      Title: "一對一",\n      Price: "$500 / hr",\n      Detail: [\n        "聽說讀寫",\n        "生活會話",\n        "英語面試",\n        "醫學英語",\n        "全民英檢",\n        "多益/雅思/托福"\n      ]\n    },{\n      Title: "一對二",\n      Price: "$350 / hr",\n      Detail: [\n        "聽說讀寫",\n        "生活會話",\n        "英語面試",\n        "醫學英語",\n        "全民英檢",\n        "多益/雅思/托福",\n        "可應個人需求可調整"\n      ]\n    }]\n  },\n  Teacher: {\n    Title: "個人家教",\n    Content: "推薦專才專任之講師，完整規劃資訊。"\n  },\n  ContactUs: {\n    Title: "與我聯繫",\n    Content: "有任何問題嗎？歡迎來信告知。",\n    Send: "傳送",\n    YourName: "您的大名",\n    YourEmail: "您的 Email",\n    Subject: "主旨",\n    YourMessage: "請輸入訊息"\n  },\n  Location: {\n    Phone: "0985 006 329",\n    Address: "830 高雄市鳳山區林森路315號"\n  },\n  Developers: {\n    Title: "開發團隊",\n    Content: "架構出易於維護兼具美感的前後台網站、版面規劃與設計、網站數據分析、電商實務工作經驗。"\n  },\n  Copyright: "Copyright © 2015 Wilson Weng. All rights reserved",\n  Modal: {\n    SendEmailSuccessTitle: "成功",\n    SendEmailSuccess: "發送成功，會盡快回覆您，謝謝！",\n    SendEmailFailureTitle: "失敗",\n    SendEmailFailure: "伺服器發生錯誤，請稍後再試。"\n  }\n}', '2015-11-06 17:07:20'),
(3, 2, 1, 'WebPortal:Login', 'LoginJson', '{\n    Text: {\n        Title: "已擁有會員?",\n        Login: "登入",\n        Register: "註冊",\n        CreateAcc: "加入會員",\n        Remember: "Remember me",\n        Statement: "按下 \\"註冊\\" 表示同意條款內文",\n        Email: "Email",\n        Password: "Password",\n        Owner: "網站擁有者",\n        Developer: "發開者",\n        RegisterKey: "註冊碼"\n    },\n    Modal: {\n        SuccessTitle: "歡迎回來!",\n        SuccessContent: "跳轉中...",\n        ErrorTitle: "發生錯誤!",\n        ErrorContent: "請重新嘗試登入."\n    }\n}', '2015-11-05 13:51:43'),
(4, 1, 1, 'WebPortal:Login', 'LoginJson', '{\n    Text: {\n        Title: "Have an Account?",\n        Login: "Login",\n        Register: "Register",\n        CreateAcc: "Create Account",\n        Remember: "Remember me",\n        Statement: "By clicking on \\"Register\\" you agree to The Company''s'' Terms and Conditions",\n        Email: "Email",\n        Password: "Password",\n        Owner: "Owner",\n        Developer: "Developer",\n        RegisterKey: "Register Key"\n    },\n    Modal: {\n        SuccessTitle: "Congratulations!",\n        SuccessContent: "Redirect...",\n        ErrorTitle: "Error!",\n        ErrorContent: "Please try again."\n    }\n}', '2015-11-05 13:43:56'),
(5, 1, 1, 'WebPortal:Index', 'IndexJson', '{\n  Text: {\n    Title: "WebPortal"\n  },\n  Link: {\n    Title: "WebPortal"\n  },\n  Modal: {\n    SuccessTitle: "Success!",\n    SuccessContent: "Redirect to Login..."\n  },\n  SideBarMenu: [{\n    Label: "DASHBOARDS",\n    Button: [{\n      Text: "Email",\n      Link: "WebPortal/MailServerSetting",\n      Icon: "fa fa-envelope-o"\n    }, {\n      Text: "View Resources",\n      Link: "WebPortal/ViewResources",\n      Icon: "fa fa-globe"\n    }, {\n      Text: "Members",\n      Link: "WebPortal/Members",\n      Icon: "fa fa-users"\n    }, {\n      Text: "File Manage",\n      Link: "WebPortal/FileManage",\n      Icon: "fa fa-server"\n    }]\n  }, {\n    Label: "MORE",\n    Button: [{\n      Text: "Asset Refresh",\n      Icon: "fa fa-refresh",\n      Func: "Refresh"\n    }, {\n      Text: "Logout",\n      Icon: "fa fa-sign-out",\n      Func: "SignOut"\n    }]\n  }],\n    Overview: [{\n      Col4: {\n        Img: "hostgator.png"\n      },\n      Col8: {\n        Title: "Platform",\n        Desc: "This website is running on HostGator."\n      }\n    },{\n      Col4: {\n        Title: "Server Side",\n        Desc: "The server side coding with PHP."\n      },\n      Col8: {\n        Img: "php.png"\n      }\n    },{\n      Col4: {\n        Img: "codeigniter.png"\n      },\n      Col8: {\n        Title: "PHP Framework",\n        Desc: "The MVC Framework for PHP."\n      }\n    },{\n      Col4: {\n        Title: "Front-End Framework",\n        Desc: "The MVC Framework for front-end."\n      },\n      Col8: {\n        Img: "angularjs.png"\n      }\n    },{\n      Col4: {\n        Img: "bower.png"\n      },\n      Col8: {\n        Title: "Front-End Tool",\n        Desc: "The tool managed web front-end library & package."\n      }\n    },{\n      Col4: {\n        Img: "gulp.png"\n      },\n      Col8: {\n        Title: "Front-End Tool",\n        Desc: "Automate and enhance your workflow."\n      }\n    }]\n}', '2015-09-03 13:18:01'),
(6, 2, 1, 'WebPortal:Index', 'IndexJson', '{\n  Text: {\n    Title: "網站管理後台"\n  },\n  Link: {\n    Title: "WebPortal"\n  },\n  Modal: {\n    SuccessTitle: "登出成功!",\n    SuccessContent: "跳轉至登入頁中..."\n  },\n  SideBarMenu: [{\n    Label: "基本設定",\n    Button: [{\n      Text: "Email",\n      Link: "WebPortal/MailServerSetting",\n      Icon: "fa fa-envelope-o"\n    },{\n      Text: "頁面資源",\n      Link: "WebPortal/ViewResources",\n      Icon: "fa fa-globe"\n    },{\n      Text: "成員",\n      Link: "WebPortal/Members",\n      Icon: "fa fa-users"\n    },{\n      Text: "檔案管理",\n      Link: "WebPortal/FileManage",\n      Icon: "fa fa-server"\n    }]\n  }, {\n    Label: "更多",\n    Button: [{\n      Text: "重新編譯",\n      Icon: "fa fa-refresh",\n      Func: "Refresh"\n    },{\n      Text: "登出",\n      Icon: "fa fa-sign-out",\n      Func: "SignOut"\n    }]\n  }],\n    Overview: [{\n      Col4: {\n        Img: "hostgator.png"\n      },\n      Col8: {\n        Title: "運行平台",\n        Desc: "此網站運行在 HostGator."\n      }\n    },{\n      Col4: {\n        Title: "後端",\n        Desc: "後端語言使用 PHP 編寫."\n      },\n      Col8: {\n        Img: "php.png"\n      }\n    },{\n      Col4: {\n        Img: "codeigniter.png"\n      },\n      Col8: {\n        Title: "PHP 框架",\n        Desc: "Codeigniter MVC 框架."\n      }\n    },{\n      Col4: {\n        Title: "前端框架",\n        Desc: "Angularjs MVC 框架."\n      },\n      Col8: {\n        Img: "angularjs.png"\n      }\n    },{\n      Col4: {\n        Img: "bower.png"\n      },\n      Col8: {\n        Title: "前端工具",\n        Desc: "管理前端 Library 與 套件包."\n      }\n    },{\n      Col4: {\n        Img: "gulp.png"\n      },\n      Col8: {\n        Title: "前端工具",\n        Desc: "建構自動化前端流程."\n      }\n    }]\n}', '2015-09-13 13:08:50'),
(7, 1, 1, 'WebPortal:MailServerSetting', 'MailServerSettingJson', '{\n  Text: {\n    Title: "MAIL SERVER SETTING",\n    Description: "Gmail.smtp for localhost / HostGator.smtp for HostGator",\n    Account: "Account",\n    Password: "Password",\n    Save: "Save changes",\n    SuccessMsg: "Well done! You successfully change the mail server setting.",\n    ErrorMsg: "Oh snap! Change a few things up and try submitting again."\n  }\n}', '2015-08-24 16:38:47'),
(8, 2, 1, 'WebPortal:MailServerSetting', 'MailServerSettingJson', '{\n  Text: {\n    Title: "郵件伺服器設置",\n    Description: "Gmail.smtp for 本地端 / HostGator.smtp for HostGator",\n    Account: "帳號",\n    Password: "密碼",\n    Save: "儲存",\n    SuccessMsg: "恭喜! 成功修改了郵件伺服器設定.",\n    ErrorMsg: "遺憾! 請等待數分鐘後才重新設定."\n  }\n}', '2015-08-24 16:38:56'),
(9, 1, 1, 'WebPortal:ViewResources', 'ViewResourcesJson', '{\n Text: {\n   Content: "Content",\n   Save: "Save",\n   Lang: "Languages"\n }\n}', '2015-08-24 16:09:41'),
(10, 2, 1, 'WebPortal:ViewResources', 'ViewResourcesJson', '{\r\n Text: {\r\n   Content: "內容",\r\n   Save: "儲存",\r\n   Lang: "語系"\r\n }\r\n}', '2015-08-24 16:11:29'),
(11, 1, 1, 'WebPortal:Members', 'MembersJson', '{\n  Text: {\n    GitHub: "GitHub",\n    Facebook: "Facebook",\n    Email: "Email",\n    Edit: "Edit",\n    DisplayName: "Display Name",\n    Description: "Description",\n    Picture: "Picture",\n    Back: "Back",\n    Update: "Update",\n    UploadTip: "Drop Images files here. Max Size: 1MB"\n  }\n}', '2015-08-29 11:31:55'),
(12, 2, 1, 'WebPortal:Members', 'MembersJson', '{\n  Text: {\n    GitHub: "GitHub",\n    Facebook: "Facebook",\n    Email: "Email",\n    Edit: "編輯",\n    DisplayName: "暱稱",\n    Description: "描述",\n    Picture: "照片",\n    Back: "返回",\n    Update: "更新",\n    UploadTip: "拖曳圖片至區域或點擊此區域. 上傳限制: 1MB"\n  }\n}', '2015-08-29 11:34:00'),
(13, 1, 1, 'WebPortal:FileManage', 'FileManageJson', '{\n  Text: {\n    Add: "Add",\n    Previous: "Previous",\n    Today: "Today",\n    Next: "Next",\n    Year: "Year",\n    Month: "Month",\n    Week: "Week",\n    Day: "Day",\n    UploadTip: "Drop files here or click to upload, Max Size: 10MB, Support: .gif|.jpg|.png|.pdf|.docx|.pptx"\n  },\n  NewCourse: {\n    Name: "Name",\n    Title: "Add New Course",\n    StartsAt: "Starts at",\n    EndsAt: "Ends at",\n    Create: "Create",\n    Done: "Done"\n  },\n  EditCourse: {\n    Name: "Name",\n    Title: "Edit Course",\n    StartsAt: "Starts at",\n    EndsAt: "Ends at",\n    Edit: "Edit",\n    Done: "Done"\n  },\n  DeleteCourse: {\n    Title: "Delete Course",\n    Delete: "Delete",\n    Tip: "The action cannot not be undo, are you sure?",\n    Done: "Done"\n  }\n}', '2015-09-30 14:12:14'),
(14, 2, 1, 'WebPortal:FileManage', 'FileManageJson', '{\n  Text: {\n    Add: "新增",\n    Previous: "Previous",\n    Today: "今天",\n    Next: "Next",\n    Year: "年",\n    Month: "月",\n    Week: "週",\n    Day: "日",\n    UploadTip: "拖曳檔案或點擊此區域, 上傳限制: 10MB. 支持檔案類型: .gif|.jpg|.png|.pdf|.docx|.pptx"\n  },\n  NewCourse: {\n    Name: "名稱",\n    Title: "新增一門課程",\n    StartsAt: "開始於",\n    EndsAt: "結束於",\n    Create: "新增",\n    Done: "完成"\n  },\n  EditCourse: {\n    Name: "名稱",\n    Title: "編輯課程",\n    StartsAt: "開始於",\n    EndsAt: "結束於",\n    Edit: "修改",\n    Done: "完成"\n  },\n  DeleteCourse: {\n    Title: "刪除課程",\n    Delete: "確認刪除",\n    Tip: "刪除後無法還原, 確認要刪除嗎?",\n    Done: "完成"\n  }\n}', '2015-09-30 14:12:20'),
(15, 1, 1, 'Home:Lobby', 'LobbyJson', '{\n  Slides: [\n    { src: "/assets/images/Home/0.jpg" },\n    { src: "/assets/images/Home/1.jpg" },\n    { src: "/assets/images/Home/2.jpg" },\n    { src: "/assets/images/Home/3.jpg" },\n    { src: "/assets/images/Home/4.jpg" }\n  ],\n  Header: {\n    Brand: "Eric''s English",\n    Language: "Languages",\n    Nav: [\n      { Text: "About Us", Target: "#" },\n      { Text: "Courses", Target: "#courses" },\n      { Text: "Teacher", Target: "#teacher" },\n      { Text: "Contact Us", Target: "#contactus" },\n      { Text: "Location", Target: "#location" },\n      { Text: "Development Team", Target: "#developers" }\n    ]\n  },\n  AboutUs: {\n    Title: "ENJOY STUDYING!",\n    Content: "We no Chinese language courses nationwide, so that students can interact with the external division distance, so that every student has the opportunity to speak English. Create the nation''s language teaching environment, we insist on the quality of learning, the use of one or one-to-two."\n  },\n  Courses: {\n    Title: "CLASSES",\n    Content: "Suitable for: 6 years and older / country high school / preparing to study abroad or for further study / public / personal training ...",\n    Classes: [{\n      Title: "One on One",\n      Price: "$500 / hr",\n      Detail: [\n        "Speaking and writing",\n        "Live session",\n        "English interview",\n        "Medical English",\n        "GEPT",\n        "TOEIC / IELTS / TOEFL"\n      ]\n    },{\n      Title: "One on Two",\n      Price: "$350 / hr",\n      Detail: [\n        "Speaking and writing",\n        "Live session",\n        "English interview",\n        "Medical English",\n        "GEPT",\n        "TOEIC / IELTS / TOEFL",\n        "Can be adjusted for personal needs"\n      ]\n    }]\n  },\n  Teacher: {\n    Title: "PERSONAL TUTOR",\n    Content: "Professionals recommend the full-time instructor, complete planning information."\n  },\n  ContactUs: {\n    Title: "GET IN TOUCH",\n    Content: "Have any question? Send us a email.",\n    Send: "SEND",\n    YourName: "Your Name",\n    YourEmail: "Your Email",\n    Subject: "Subject",\n    YourMessage: "Please Input your message."\n  },\n  Location: {\n    Phone: "0985 006 329",\n    Address: "830 高雄市鳳山區林森路315號"\n  },\n  Developers: {\n    Title: "Development Team",\n    Content: "Architecture easy to maintain the beauty of the front and back of both sites, layout planning and design, site data analysis, the electricity supplier practical work experience."\n  },\n  Copyright: "Copyright © 2015 Wilson Weng. All rights reserved",\n  Modal: {\n    SendEmailSuccessTitle: "SUCCESS",\n    SendEmailSuccess: "Sent successfully, will contact you soon, thank you!",\n    SendEmailFailureTitle: "FAILURE",\n    SendEmailFailure: "A server error occurred, please try again later."\n  }\n}', '2015-11-06 17:01:46');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `Id` int(11) NOT NULL,
  `R_Id` int(2) NOT NULL,
  `Username` varchar(70) NOT NULL,
  `Password` varchar(128) NOT NULL,
  `Picture` varchar(15) DEFAULT NULL,
  `DisplayName` varchar(30) DEFAULT NULL,
  `Description` text,
  `GitHub` varchar(50) DEFAULT NULL,
  `Facebook` varchar(50) DEFAULT NULL,
  `LastLogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `metadata`
--

CREATE TABLE IF NOT EXISTS `metadata` (
  `Id` int(11) NOT NULL,
  `Title` varchar(30) NOT NULL,
  `ContentType` varchar(30) NOT NULL,
  `Viewport` varchar(60) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Keywords` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `metadata`
--

INSERT INTO `metadata` (`Id`, `Title`, `ContentType`, `Viewport`, `Description`, `Keywords`) VALUES
(1, '愛力克美語 - ienglishtutors.com', 'text/html; charset=UTF-8', 'width=device-width, initial-scale=1.0,user-scalable=no', '課程採全美語沒有中文,營造全美語教學環境,採一對一或二教學', '英文, 英語, 家教, 高雄, 外籍, 一對一, 鳳山, Kaohsiung, english, tutor, ienglishtutors');

-- --------------------------------------------------------

--
-- 資料表結構 `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `Id` int(11) NOT NULL,
  `Role` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `role`
--

INSERT INTO `role` (`Id`, `Role`) VALUES
(1, 'Owner'),
(2, 'Developer');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- 資料表索引 `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`Id`);

--
-- 資料表索引 `course_files`
--
ALTER TABLE `course_files`
  ADD PRIMARY KEY (`Id`);

--
-- 資料表索引 `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`Id`);

--
-- 資料表索引 `language_usage`
--
ALTER TABLE `language_usage`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id` (`Id`),
  ADD KEY `L_Id` (`L_Id`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`),
  ADD KEY `Id_2` (`Id`),
  ADD KEY `R_Id` (`R_Id`);

--
-- 資料表索引 `metadata`
--
ALTER TABLE `metadata`
  ADD PRIMARY KEY (`Id`);

--
-- 資料表索引 `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`Id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `course`
--
ALTER TABLE `course`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `course_files`
--
ALTER TABLE `course_files`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `language`
--
ALTER TABLE `language`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- 使用資料表 AUTO_INCREMENT `language_usage`
--
ALTER TABLE `language_usage`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- 使用資料表 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `metadata`
--
ALTER TABLE `metadata`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- 使用資料表 AUTO_INCREMENT `role`
--
ALTER TABLE `role`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `language_usage`
--
ALTER TABLE `language_usage`
  ADD CONSTRAINT `language_usage_ibfk_1` FOREIGN KEY (`L_Id`) REFERENCES `language` (`Id`);

--
-- 資料表的 Constraints `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`R_Id`) REFERENCES `role` (`Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
