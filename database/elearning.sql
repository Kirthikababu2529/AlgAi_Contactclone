-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2024 at 09:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `analytics`
--

CREATE TABLE `analytics` (
  `reportname` varchar(225) DEFAULT NULL,
  `reporttype` varchar(225) DEFAULT NULL,
  `date` varchar(225) DEFAULT NULL,
  `description` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `analytics`
--

INSERT INTO `analytics` (`reportname`, `reporttype`, `date`, `description`) VALUES
('dger', 'passed', '0566-04-23', 'wferjf'),
('sfg', 'ongoing', '0004-03-12', 'dddddddddddddddddddddddd'),
('gdh', 'passed', '0056-04-12', 'dgttetr');

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

CREATE TABLE `assessment` (
  `assessmentname` varchar(225) DEFAULT NULL,
  `assessmenttype` varchar(225) DEFAULT NULL,
  `date` varchar(225) DEFAULT NULL,
  `totalmarks` varchar(225) DEFAULT NULL,
  `description` varchar(225) DEFAULT NULL,
  `studentname` varchar(225) DEFAULT NULL,
  `studentid` varchar(225) DEFAULT NULL,
  `grade` varchar(225) DEFAULT NULL,
  `feedback` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`assessmentname`, `assessmenttype`, `date`, `totalmarks`, `description`, `studentname`, `studentid`, `grade`, `feedback`) VALUES
('ygy', 'quiz', '0567-04-23', '65', 'jnjhnjhn', NULL, NULL, NULL, NULL),
(NULL, NULL, NULL, NULL, NULL, 'gjh', '6544f', '65', 'hfghtyh');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `class` varchar(225) DEFAULT NULL,
  `date` varchar(225) DEFAULT NULL,
  `studentname` varchar(225) DEFAULT NULL,
  `studentid` varchar(225) DEFAULT NULL,
  `present` varchar(225) DEFAULT NULL,
  `absent` varchar(225) DEFAULT NULL,
  `late` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`class`, `date`, `studentname`, `studentid`, `present`, `absent`, `late`) VALUES
('BIO101', '2024-06-27', 'John Doe', '123456', '1', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(225) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image_path` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `created_at`, `image_path`) VALUES
(1, 'This AI model is helping researchers detect disease based on coughs', 'From cough to speech and even breath, the sounds our bodies make are filled with information about our health. Subtle clues hidden within these bioacoustic sounds hold the potential to revolutionize how we screen, diagnose, monitor and manage a wide range of health conditions like tuberculosis (TB) or chronic obstructive pulmonary disease (COPD). As researchers at Google, we recognize the potential of sound as a useful health signal, and also that smartphone microphones are widely accessible. To that end, we’ve been exploring ways to use AI to extract health insights from acoustic data.\r\n\r\nEarlier this year, we introduced Health Acoustic Representations, or HeAR, a bioacoustic foundation model designed to help researchers build models that can listen to human sounds and flag early signs of disease. The Google Research team trained HeAR on 300 million pieces of audio data curated from a diverse and de-identified dataset, and we trained the cough model in particular using roughly 100 million cough sounds.\r\n\r\nHeAR learns to discern patterns within health-related sounds, creating a powerful foundation for medical audio analysis. We found that, on average, HeAR ranks higher than other models on a wide range of tasks and for generalizing across microphones, demonstrating its superior ability to capture meaningful patterns in health-related acoustic data. Models trained using HeAR also achieved high performance with less training data, a crucial factor in the often data-scarce world of healthcare research.', '0000-00-00 00:00:00', ''),
(2, 'This AI model is helping researchers detect disease based on coughs', 'From cough to speech and even breath, the sounds our bodies make are filled with information about our health. Subtle clues hidden within these bioacoustic sounds hold the potential to revolutionize how we screen, diagnose, monitor and manage a wide range of health conditions like tuberculosis (TB) or chronic obstructive pulmonary disease (COPD). As researchers at Google, we recognize the potential of sound as a useful health signal, and also that smartphone microphones are widely accessible. To that end, we’ve been exploring ways to use AI to extract health insights from acoustic data.\r\n\r\nEarlier this year, we introduced Health Acoustic Representations, or HeAR, a bioacoustic foundation model designed to help researchers build models that can listen to human sounds and flag early signs of disease. The Google Research team trained HeAR on 300 million pieces of audio data curated from a diverse and de-identified dataset, and we trained the cough model in particular using roughly 100 million cough sounds.\r\n\r\nHeAR learns to discern patterns within health-related sounds, creating a powerful foundation for medical audio analysis. We found that, on average, HeAR ranks higher than other models on a wide range of tasks and for generalizing across microphones, demonstrating its superior ability to capture meaningful patterns in health-related acoustic data. Models trained using HeAR also achieved high performance with less training data, a crucial factor in the often data-scarce world of healthcare research.', '2024-08-16 08:36:43', '66bf40d3af215.jpg'),
(3, 'This AI model is helping researchers detect disease based on coughs', 'From cough to speech and even breath, the sounds our bodies make are filled with information about our health. Subtle clues hidden within these bioacoustic sounds hold the potential to revolutionize how we screen, diagnose, monitor and manage a wide range of health conditions like tuberculosis (TB) or chronic obstructive pulmonary disease (COPD). As researchers at Google, we recognize the potential of sound as a useful health signal, and also that smartphone microphones are widely accessible. To that end, we’ve been exploring ways to use AI to extract health insights from acoustic data.\r\n\r\nEarlier this year, we introduced Health Acoustic Representations, or HeAR, a bioacoustic foundation model designed to help researchers build models that can listen to human sounds and flag early signs of disease. The Google Research team trained HeAR on 300 million pieces of audio data curated from a diverse and de-identified dataset, and we trained the cough model in particular using roughly 100 million cough sounds.\r\n\r\nHeAR learns to discern patterns within health-related sounds, creating a powerful foundation for medical audio analysis. We found that, on average, HeAR ranks higher than other models on a wide range of tasks and for generalizing across microphones, demonstrating its superior ability to capture meaningful patterns in health-related acoustic data. Models trained using HeAR also achieved high performance with less training data, a crucial factor in the often data-scarce world of healthcare research.', '2024-08-16 08:41:12', '66bf41e0b6d60.jpg'),
(4, 'This AI model is helping researchers detect disease based on coughs', 'From cough to speech and even breath, the sounds our bodies make are filled with information about our health. Subtle clues hidden within these bioacoustic sounds hold the potential to revolutionize how we screen, diagnose, monitor and manage a wide range of health conditions like tuberculosis (TB) or chronic obstructive pulmonary disease (COPD). As researchers at Google, we recognize the potential of sound as a useful health signal, and also that smartphone microphones are widely accessible. To that end, we’ve been exploring ways to use AI to extract health insights from acoustic data.\r\n\r\nEarlier this year, we introduced Health Acoustic Representations, or HeAR, a bioacoustic foundation model designed to help researchers build models that can listen to human sounds and flag early signs of disease. The Google Research team trained HeAR on 300 million pieces of audio data curated from a diverse and de-identified dataset, and we trained the cough model in particular using roughly 100 million cough sounds.\r\n\r\nHeAR learns to discern patterns within health-related sounds, creating a powerful foundation for medical audio analysis. We found that, on average, HeAR ranks higher than other models on a wide range of tasks and for generalizing across microphones, demonstrating its superior ability to capture meaningful patterns in health-related acoustic data. Models trained using HeAR also achieved high performance with less training data, a crucial factor in the often data-scarce world of healthcare research.', '2024-08-16 09:02:11', 'uploads/blogs/66bf46cb7cc74.jpg'),
(5, 'This AI model is helping researchers detect disease based on coughs', 'From cough to speech and even breath, the sounds our bodies make are filled with information about our health. Subtle clues hidden within these bioacoustic sounds hold the potential to revolutionize how we screen, diagnose, monitor and manage a wide range of health conditions like tuberculosis (TB) or chronic obstructive pulmonary disease (COPD). As researchers at Google, we recognize the potential of sound as a useful health signal, and also that smartphone microphones are widely accessible. To that end, we’ve been exploring ways to use AI to extract health insights from acoustic data.\r\n\r\nEarlier this year, we introduced Health Acoustic Representations, or HeAR, a bioacoustic foundation model designed to help researchers build models that can listen to human sounds and flag early signs of disease. The Google Research team trained HeAR on 300 million pieces of audio data curated from a diverse and de-identified dataset, and we trained the cough model in particular using roughly 100 million cough sounds.\r\n\r\nHeAR learns to discern patterns within health-related sounds, creating a powerful foundation for medical audio analysis. We found that, on average, HeAR ranks higher than other models on a wide range of tasks and for generalizing across microphones, demonstrating its superior ability to capture meaningful patterns in health-related acoustic data. Models trained using HeAR also achieved high performance with less training data, a crucial factor in the often data-scarce world of healthcare research.', '2024-08-19 10:23:10', 'uploads/blogs/66c34e4674f17.jpg'),
(6, 'This AI model is helping researchers detect disease based on coughs', 'From cough to speech and even breath, the sounds our bodies make are filled with information about our health. Subtle clues hidden within these bioacoustic sounds hold the potential to revolutionize how we screen, diagnose, monitor and manage a wide range of health conditions like tuberculosis (TB) or chronic obstructive pulmonary disease (COPD). As researchers at Google, we recognize the potential of sound as a useful health signal, and also that smartphone microphones are widely accessible. To that end, we’ve been exploring ways to use AI to extract health insights from acoustic data.\r\n\r\nEarlier this year, we introduced Health Acoustic Representations, or HeAR, a bioacoustic foundation model designed to help researchers build models that can listen to human sounds and flag early signs of disease. The Google Research team trained HeAR on 300 million pieces of audio data curated from a diverse and de-identified dataset, and we trained the cough model in particular using roughly 100 million cough sounds.\r\n\r\nHeAR learns to discern patterns within health-related sounds, creating a powerful foundation for medical audio analysis. We found that, on average, HeAR ranks higher than other models on a wide range of tasks and for generalizing across microphones, demonstrating its superior ability to capture meaningful patterns in health-related acoustic data. Models trained using HeAR also achieved high performance with less training data, a crucial factor in the often data-scarce world of healthcare research.', '2024-08-19 10:25:05', 'uploads/blogs/66c34eb92f8b6.png'),
(7, 'This AI model is helping researchers detect disease based on coughs', 'From cough to speech and even breath, the sounds our bodies make are filled with information about our health. Subtle clues hidden within these bioacoustic sounds hold the potential to revolutionize how we screen, diagnose, monitor and manage a wide range of health conditions like tuberculosis (TB) or chronic obstructive pulmonary disease (COPD). As researchers at Google, we recognize the potential of sound as a useful health signal, and also that smartphone microphones are widely accessible. To that end, we’ve been exploring ways to use AI to extract health insights from acoustic data.\r\n\r\nEarlier this year, we introduced Health Acoustic Representations, or HeAR, a bioacoustic foundation model designed to help researchers build models that can listen to human sounds and flag early signs of disease. The Google Research team trained HeAR on 300 million pieces of audio data curated from a diverse and de-identified dataset, and we trained the cough model in particular using roughly 100 million cough sounds.\r\n\r\nHeAR learns to discern patterns within health-related sounds, creating a powerful foundation for medical audio analysis. We found that, on average, HeAR ranks higher than other models on a wide range of tasks and for generalizing across microphones, demonstrating its superior ability to capture meaningful patterns in health-related acoustic data. Models trained using HeAR also achieved high performance with less training data, a crucial factor in the often data-scarce world of healthcare research.', '2024-08-19 10:27:26', 'uploads/blogs/66c34f468eb68.png'),
(8, 'This AI model is helping researchers detect disease based on coughs', 'From cough to speech and even breath, the sounds our bodies make are filled with information about our health. Subtle clues hidden within these bioacoustic sounds hold the potential to revolutionize how we screen, diagnose, monitor and manage a wide range of health conditions like tuberculosis (TB) or chronic obstructive pulmonary disease (COPD). As researchers at Google, we recognize the potential of sound as a useful health signal, and also that smartphone microphones are widely accessible. To that end, we’ve been exploring ways to use AI to extract health insights from acoustic data.\r\n\r\nEarlier this year, we introduced Health Acoustic Representations, or HeAR, a bioacoustic foundation model designed to help researchers build models that can listen to human sounds and flag early signs of disease. The Google Research team trained HeAR on 300 million pieces of audio data curated from a diverse and de-identified dataset, and we trained the cough model in particular using roughly 100 million cough sounds.\r\n\r\nHeAR learns to discern patterns within health-related sounds, creating a powerful foundation for medical audio analysis. We found that, on average, HeAR ranks higher than other models on a wide range of tasks and for generalizing across microphones, demonstrating its superior ability to capture meaningful patterns in health-related acoustic data. Models trained using HeAR also achieved high performance with less training data, a crucial factor in the often data-scarce world of healthcare research.', '2024-08-20 00:16:45', 'uploads/blogs/66c411a50f91a.jpg'),
(9, '3 things parents and students told us about how generative AI can support learning', 'Given education’s critical role in human development, it’s imperative that any use of generative AI to boost the teaching and learning process for students be done in a way that is thoughtful and collaborative.\r\n\r\nThat’s why Google for Education prioritizes the input of teachers, students, parents and administrators when leveraging generative AI capabilities and features.\r\n\r\nListening to our communities to better understand their needs allows us to create more helpful products that truly benefit students and educators. To help do that, we partnered with Google’s Responsible AI (RAI) and Technology & Society research teams to engage with high school students and their parents to learn how generative AI is shaping their learning experience.\r\n\r\nHere are some things parents and students told us about how generative AI supports their learning:\r\n\r\nReal-time feedback for parents. By providing an up-to-the-minute window into how their children are doing in their coursework, parents can intervene more quickly where needed, understand where they might be pushing too hard, and know where they should put their focus in the future.\r\nEnhanced learning about unfamiliar subjects. Generative AI can supplement classroom instruction to help students go deeper and gain additional context around subjects that are new to them.\r\nCustomized pathways for people with learning differences. Generative AI can customize a number of learning pathways as it analyzes an individual’s learning patterns and personalizes educational material that takes cognitive abilities into account.', '2024-08-20 02:09:29', 'uploads/blogs/66c42c11175c8.gif'),
(10, 'This AI model is helping researchers detect disease based on coughs', 'From cough to speech and even breath, the sounds our bodies make are filled with information about our health. Subtle clues hidden within these bioacoustic sounds hold the potential to revolutionize how we screen, diagnose, monitor and manage a wide range of health conditions like tuberculosis (TB) or chronic obstructive pulmonary disease (COPD). As researchers at Google, we recognize the potential of sound as a useful health signal, and also that smartphone microphones are widely accessible. To that end, we’ve been exploring ways to use AI to extract health insights from acoustic data.\r\n\r\nEarlier this year, we introduced Health Acoustic Representations, or HeAR, a bioacoustic foundation model designed to help researchers build models that can listen to human sounds and flag early signs of disease. The Google Research team trained HeAR on 300 million pieces of audio data curated from a diverse and de-identified dataset, and we trained the cough model in particular using roughly 100 million cough sounds.\r\n\r\nHeAR learns to discern patterns within health-related sounds, creating a powerful foundation for medical audio analysis. We found that, on average, HeAR ranks higher than other models on a wide range of tasks and for generalizing across microphones, demonstrating its superior ability to capture meaningful patterns in health-related acoustic data. Models trained using HeAR also achieved high performance with less training data, a crucial factor in the often data-scarce world of healthcare research.', '2024-08-20 02:11:56', 'uploads/blogs/66c42ca435050.jpg'),
(12, 'trial 10', 'this is trial 10', '2024-08-20 08:48:48', 'uploads\\ab8bf46553b414be57f12b544e07d3e2.jpeg'),
(13, 'How AI is changing the world?', '\r\nWhat\'s the future of AI? How will AI change the world?\r\nArtificial intelligence is here. And it’s transforming how we live and work. But what’s the future of AI? How will AI change the world?\r\n\r\nCurrently, we are surrounded by this technology. AI is powering voice assistants like Siri and Alexa. It recommends TV shows that you love on Netflix. It also helps you find the quickest route home on Google Maps. \r\n\r\nWhen it comes to businesses, AI is helping automate tasks, streamline processes, increase productivity, boost sales and revenue, cut costs, and improve customer relationships.\r\n\r\nAI gives machines the ability to think and act like humans. With each passing day, it’s becoming more capable of doing smart things. That’s why the global AI market is expected to grow and reach USD 1.81 trillion by 2030. That’s really huge!\r\n\r\nIn this blog post, we will explore the future of AI and see how it’s transforming different industries. This will help you prepare and be relevant in the coming days.\r\n\r\n \r\n\r\nThe Evolution of AI\r\nFrom Alan Turing imagining machines could think and John McCarthy using the term “artificial intelligence” for the first in the 1950s, AI has come a long way.\r\n\r\nThings were simple back then – programs like Arthur Samuel’s checkers-playing computer in 1952. But with time, the technology became more advanced.\r\n\r\nLike in the 1990s, IBM’s Deep Blue supercomputer shocked the world by defeating chess grandmaster Garry Kasparov. Around the same time, AI-powered speech recognition and natural language processing started to emerge. This was the foundation on which today’s voice assistants and chatbots stand.\r\n\r\nThen, in the 2010s, deep learning came into the picture. This is a type of AI that’s inspired by the human brain, and it’s incredibly good at finding patterns in huge amounts of data. This has supercharged AI, making it smarter and more capable than ever before. \r\n\r\nNow, AI is so powerful that it’s writing code (like OpenAI’s Codex), creating images from text prompts (like OpenAI’s Dall-E), and even helping scientists discover new drugs (like DeepMind’s AlphaFold predicting protein structures). \r\n\r\nNo surprise, the GenAI tool, ChatGPT, broke all the records in 2022 and reached 1 million users in just 5 days. All these are just the beginning – the future of AI is brighter and more exciting. \r\n\r\n \r\n\r\nFuture of Artificial Intelligence in Different Industries\r\nA PWC study predicts that AI could contribute up to USD 15.7 trillion to the global economy by the end of this decade. Although there are certain advantages and disadvantages to AI, it is certainly going to be more powerful in the future. In the following sections, we will discuss the impact of AI in different industries to understand how AI will change the world.\r\n\r\n \r\n\r\n1. Future of AI in Entertainment\r\nAI is making a big transformation in the entertainment industry. It’s already used by Netflix and Spotify to make smart, personalized recommendations. In fact, Netflix admits its AI-powered recommendations system is worth USD 1 billion in revenue annually.\r\n\r\nIn the present times, GenAI tools can be used to write scripts, compose music, and even generate realistic visual arts within seconds. \r\n\r\nTools like OpenAI’s Sora can generate videos from text prompts. That’s something revolutionary. It can help filmmakers generate complex scenes without spending thousands of dollars. We can also expect AI-generated actors who can act and perform stunts just like human actors.\r\n\r\nAlso, in the future, AI tools can make it easier for anyone to create high-quality content. If you have good judgment and an understanding of art, you may use AI to create your own movies or music from text prompts. So, entertainment will be more personalized.\r\n\r\n \r\n\r\n2. Future of AI in Education\r\nAI is making education more personalized, engaging, and effective. It can create smart tutoring systems that enhance the classroom experience and learning outcomes.\r\n\r\nAI is helping create powerful learning platforms that can analyze how students learn, recommend resources, and provide feedback. For example, Thinkster Math is an AI-powered app that creates more personalized lesson plans for students.\r\n\r\nAI can also help with automated grading by evaluating and assigning scores to each student’s exam papers within seconds. This will free up human teachers and help them focus on teaching and mentoring. \r\n\r\nIn the coming days, AI can enable virtual tutors who will be available around the clock. These teaching assistants will understand students’ strengths and weaknesses, help them clear doubts, and let them study at their own pace. They can also recommend courses and help students make the right career decisions.\r\n\r\n \r\n\r\n3. Future of AI in Manufacturing\r\n\r\nAI-powered machines and robots can create a more efficient, productive, and safer workplace. These robots can do all those laborious, repetitive, and risky tasks, freeing up human workers to focus on creative work.\r\n\r\nCurrently, AI helps in predictive maintenance. This involves analyzing data from sensors to predict when machines might need maintenance. It helps companies fix problems before they cause costly breakdowns and downtimes. \r\n\r\nAI also enhances the quality control system. AI-powered vision systems can inspect products with incredible speed and accuracy, catching defects that human inspectors might miss. This can improve product quality and reduce waste.\r\n\r\nThe global AI in manufacturing market size is expected to be valued at around USD 68.36 billion by 2032, growing at a CAGR of 33.5% from 2023 to 2032.\r\n\r\nSo in the coming days, we can expect amazing things like automatic running factories. AI can control everything from production schedules to inventory management. This could lead to 24/7 production, faster turnaround times, and significant cost savings. \r\n\r\nAI can also help manufacturers generate creative product designs, create hyper-personalized products, and embrace sustainable manufacturing by optimizing energy use and reducing waste.\r\n\r\n \r\n\r\n4. Future of AI in Healthcare\r\nFrom diagnosis and treatment to patient care and research, AI can have a significantly positive impact on the healthcare industry.\r\n\r\nCurrently, AI helps a lot in disease diagnosis. It can analyze medical images like X-rays and scans and spot the smallest of details. This can lead to faster, more accurate diagnoses for diseases like cancer and heart conditions. AI is also helping in drug discovery, personalized treatment, and robot-assisted surgeries.\r\n\r\nIn the coming days, you can expect virtual health assistants who can answer your health questions, monitor your symptoms, and even schedule appointments with your doctor. Since these assistants can alert us to potential problems before they become serious, they could help us avoid deadly diseases.\r\n\r\nAI will also get better at predictive analytics. It can analyze health data to predict who’s at risk for certain diseases. This could potentially save countless lives.\r\n\r\n \r\n\r\n5. Future of AI in Finance\r\nAI is making managing and investing money more easy and effective. It’s helping in fraud detection by analyzing transactions 24/7 to spot suspicious activity.\r\n\r\nAI is also helping in algorithmic trading. AI-powered algorithms are making quick trades, analyzing market trends, and executing complex strategies for you even when you don’t know much about trading.\r\n\r\nIn the coming days, you can expect AI-powered financial advisors who understand your financial goals and create personalized investment portfolios. They can pay your bills, manage your budget, analyze your spending habits and income, and provide unique recommendations. \r\n\r\nThese assistants can assess risk, predict market trends, and identify potential investment opportunities. This could help more people to take control of their finances and build a better future, even if they have limited financial literacy.\r\n', '2024-08-21 01:24:39', 'uploads\\photo.jfif'),
(15, 'Which State Management is preferred to learn first as a beginner in Flutter?', 'Flutter is a Cross-platform mobile application framework powered by dart programming language developed by Google.', '2024-08-24 03:09:12', 'uploads/blogs/66c980106617a.png');

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE `classroom` (
  `classname` varchar(225) DEFAULT NULL,
  `classcode` varchar(225) DEFAULT NULL,
  `schedule` varchar(225) DEFAULT NULL,
  `classdesc` varchar(225) DEFAULT NULL,
  `classmaterial` varchar(225) DEFAULT NULL,
  `announcement` varchar(225) DEFAULT NULL,
  `content` varchar(225) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `room_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`classname`, `classcode`, `schedule`, `classdesc`, `classmaterial`, `announcement`, `content`, `email`, `room_link`) VALUES
('ihkjr', 'djhdj', 'khdh', 'jhdjhw', NULL, NULL, NULL, '', ''),
(NULL, NULL, NULL, NULL, NULL, 'utuy', 'jguyg', '', ''),
('bio', '8EzE3YJg', '10:30', 'bio', NULL, NULL, NULL, '', 'https://localhost:8080/join/8EzE3YJg'),
(NULL, NULL, NULL, NULL, 'uploads/pd.php', NULL, NULL, '', ''),
(NULL, NULL, NULL, NULL, 'uploads/resume.pdf', NULL, NULL, '', ''),
(NULL, NULL, NULL, NULL, 'uploads/resume.pdf', NULL, NULL, '', ''),
(NULL, NULL, NULL, NULL, NULL, 'hi', 'hi', '', ''),
(NULL, NULL, NULL, NULL, 'uploads/resume.pdf', NULL, NULL, '', ''),
('bio', 'duKYWqzB', '10:30', 'hi', NULL, NULL, NULL, '', 'https://etutor.algaitech.com/join/4z4iSROU'),
(NULL, NULL, NULL, NULL, NULL, 'hi', 'hlo', '', ''),
(NULL, NULL, NULL, NULL, NULL, 'hi', 'hi', 'karthick@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `courseman`
--

CREATE TABLE `courseman` (
  `id` int(225) NOT NULL,
  `subjectname` varchar(225) DEFAULT NULL,
  `subjectcode` varchar(225) DEFAULT NULL,
  `dept` varchar(225) DEFAULT NULL,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `subjectdesc` varchar(225) DEFAULT NULL,
  `weekdays` varchar(225) DEFAULT NULL,
  `price` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coursemmt`
--

CREATE TABLE `coursemmt` (
  `subjectname` varchar(225) DEFAULT NULL,
  `subjectcode` varchar(225) DEFAULT NULL,
  `dept` varchar(225) DEFAULT NULL,
  `startdate` varchar(225) DEFAULT NULL,
  `enddate` varchar(225) DEFAULT NULL,
  `subjectdesc` varchar(225) DEFAULT NULL,
  `price` varchar(225) DEFAULT NULL,
  `weekdays` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coursemmt`
--

INSERT INTO `coursemmt` (`subjectname`, `subjectcode`, `dept`, `startdate`, `enddate`, `subjectdesc`, `price`, `weekdays`) VALUES
('tamil', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('eng', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('eng', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('jtggfdc', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('utyrtr', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('iyu', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('jhgy', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('English', 'PM4532', 'science', '0456-03-12', '54321-06-07', 'fghjkiuytrewasxcvb', '7654', 'Monday, Tuesday'),
('hftfyu', 'yyhuyh', 'ugygh', 'iu', '765', 'yugyg', '543', 'monday, tuesday'),
('yuyy', '8yuyuyh', 'utghn', '5678', '765', 'cvhjm,jk,', '654', 'monday'),
('jghj', 'ihuhjojk', 'joikooi', 'lkb', '567', 'jhgcvhj67', '67', 'monday');

-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

CREATE TABLE `personal_info` (
  `id` int(225) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `profile_image` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(225) NOT NULL,
  `student_email` varchar(225) DEFAULT NULL,
  `teacher_email` varchar(225) DEFAULT NULL,
  `rating` int(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `student_email`, `teacher_email`, `rating`) VALUES
(15, 'abcd@gmail.com', 'ashwin@gmail.com', 2),
(19, 'abcd@gmail.com', 'harikrishnan97905@gmail.com', 2),
(21, 'sahana@gmail.com', 'ashwin@gmail.com', 3),
(22, 'john@gmail.com', 'harikrishnan97905@gmail.com', 4),
(23, 'priya@gmail.com', 'ashwin@gmail.com', 3),
(24, 'sathya@gmail.com', 'krishan@gmail.com', 1),
(25, 'jebi@gmail.com', 'ashwin@gmail.com', 5),
(26, 'mira@gmail.com', 'ashwin@gmail.com', 5),
(27, 'sanjana@gmail.com', 'ashwin@gmail.com', 5),
(28, 'suba@gmail.com', 'krishan@gmail.com', 1),
(29, 'jana@gmail.com', 'harikrishnan97905@gmail.com', 5),
(30, 'Arjun@gmail.com', 'ashwin@gmail.com', 5),
(31, 'hasini@gmail.com', 'ashwin@gmail.com', 3),
(32, 'gopi@gmail.com', 'harikrishnan97905@gmail.com', 2),
(33, 'sachin@gmail.com', 'ashwin@gmail.com', 2),
(34, 'manoj@gmail.com', 'ashwin@gmail.com', 2),
(35, 'megala@gmail.com', 'ashwin@gmail.com', 4),
(36, 'preethi@gmail.com', 'harikrishnan97905@gmail.com', 2),
(38, 'abcd@gmail.com', 'ashwin@gmail.com', 1),
(39, 'abcd@gmail.com', 'krishan@gmail.com', 3),
(40, 'abcd@gmail.com', 'krishan@gmail.com', 3),
(41, 'abcd@gmail.com', 'harikrishnan97905@gmail.com', 4),
(42, 'abcd@gmail.com', 'krishan@gmail.com', 5),
(43, 'poorni@gmail.com', 'undefined', 1),
(44, 'poorni@gmail.com', 'undefined', 1),
(45, 'poorni@gmail.com', 'undefined', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `firstname` varchar(225) DEFAULT NULL,
  `middlename` varchar(225) DEFAULT NULL,
  `lastname` varchar(225) DEFAULT NULL,
  `designation` varchar(225) DEFAULT NULL,
  `qualification` varchar(225) DEFAULT NULL,
  `expertise` varchar(225) DEFAULT NULL,
  `placeofbirth` varchar(225) DEFAULT NULL,
  `dob` varchar(225) DEFAULT NULL,
  `gender` varchar(225) DEFAULT NULL,
  `idcard` varchar(225) DEFAULT NULL,
  `telephone1` varchar(225) DEFAULT NULL,
  `telephone2` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`firstname`, `middlename`, `lastname`, `designation`, `qualification`, `expertise`, `placeofbirth`, `dob`, `gender`, `idcard`, `telephone1`, `telephone2`, `email`) VALUES
('poornima', 'A', 'A', 'software', 'BE', 'development', 'chennai', '12-12-2002', 'female', '12345', '1234567890', '1234567890', 'poornima@gmail.com'),
('poorni1', 'poorni', 'poorni', 'development', 'BE', 'Development', 'chennai', '12-12-2002', 'female', '123', '1234567890', '1234567890', 'poorn@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `teacher2`
--

CREATE TABLE `teacher2` (
  `id` int(25) NOT NULL,
  `firstname` varchar(225) DEFAULT NULL,
  `middlename` varchar(225) DEFAULT NULL,
  `lastname` varchar(225) DEFAULT NULL,
  `designation` varchar(225) DEFAULT NULL,
  `qualification` varchar(225) DEFAULT NULL,
  `expertise` varchar(225) DEFAULT NULL,
  `experience` varchar(225) DEFAULT NULL,
  `dob` varchar(225) DEFAULT NULL,
  `languagesknown` varchar(225) DEFAULT NULL,
  `total_students` int(255) NOT NULL DEFAULT 0,
  `average_rating` int(255) NOT NULL DEFAULT 0,
  `gender` varchar(225) DEFAULT NULL,
  `idcard` varchar(225) DEFAULT NULL,
  `telephone1` varchar(225) DEFAULT NULL,
  `telephone2` varchar(225) DEFAULT 'NIL',
  `email` varchar(225) DEFAULT NULL,
  `profileDP` varchar(255) DEFAULT NULL,
  `profile` varchar(255) NOT NULL DEFAULT 'Teacher',
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher2`
--

INSERT INTO `teacher2` (`id`, `firstname`, `middlename`, `lastname`, `designation`, `qualification`, `expertise`, `experience`, `dob`, `languagesknown`, `total_students`, `average_rating`, `gender`, `idcard`, `telephone1`, `telephone2`, `email`, `profileDP`, `profile`, `password`) VALUES
(1, 'HARI', 'KRISHNAN', 'P', 'eqee', 'qedqd', 'qeqre', 'dd', '0006-05-31', NULL, 0, 0, 'tery', 'qdwe', '09790540974', '09790540974', 'harikrishnan97905@gmail.com', NULL, 'Teacher', NULL),
(2, 'Jebin Daniel', 'iuy', 'P', 'eqee', 'qedqd', 'qeqre', 'dd', '6789-05-31', NULL, 0, 0, 'tery', 'qdwe', '09790540974', '09790540974', 'harikrishnan97905@gmail.com', NULL, 'Teacher', NULL),
(3, 'Jebin Daniel', 'iuy', 'P', 'eqee', 'qedqd', 'qeqre', 'dd', '6789-05-31', NULL, 0, 0, 'tery', 'qdwe', '09790540974', '09790540974', 'harikrishnan97905@gmail.com', NULL, 'Teacher', NULL),
(4, 'Jebin Daniel', 'iuy', 'P', 'eqee', 'qedqd', 'qeqre', 'dd', '6789-05-31', NULL, 0, 0, 'tery', 'qdwe', '09790540974', '09790540974', 'harikrishnan97905@gmail.com', NULL, 'Teacher', NULL),
(5, 'Jebin Daniel', 'iuy', 'P', 'eqee', 'qedqd', 'qeqre', 'dd', '6789-05-31', NULL, 0, 0, 'tery', 'qdwe', '09790540974', '09790540974', 'harikrishnan97905@gmail.com', NULL, 'Teacher', NULL),
(6, 'Jebin Daniel', 'iuy', 'P', 'eqee', 'qedqd', 'qeqre', 'dd', '6789-05-31', NULL, 0, 0, 'tery', 'qdwe', '09790540974', '09790540974', 'harikrishnan97905@gmail.com', NULL, 'Teacher', NULL),
(7, 'Jebin Daniel', 'iuy', 'P', 'eqee', 'qedqd', 'qeqre', 'dd', '6789-05-31', NULL, 0, 0, 'tery', 'qdwe', '09790540974', '09790540974', 'harikrishnan97905@gmail.com', NULL, 'Teacher', NULL),
(8, 'Jebin Daniel', 'iuy', 'P', 'eqee', 'qedqd', 'qeqre', 'dd', '6789-05-31', NULL, 0, 0, 'tery', 'qdwe', '09790540974', '09790540974', 'harikrishnan97905@gmail.com', NULL, 'Teacher', NULL),
(9, 'Jebin Daniel', 'iuy', 'P', 'eqee', 'qedqd', 'qeqre', 'dd', '6789-05-31', NULL, 0, 0, 'tery', 'qdwe', '09790540974', '09790540974', 'harikrishnan97905@gmail.com', NULL, 'Teacher', NULL),
(10, 'Jebin Daniel', 'iuy', 'P', 'eqee', 'qedqd', 'qeqre', 'dd', '6789-05-31', NULL, 0, 0, 'tery', 'qdwe', '09790540974', '09790540974', 'harikrishnan97905@gmail.com', NULL, 'Teacher', NULL),
(11, 'jhgg', 'khjhh', 'hhjuh', 'iiuhk', 'iyg', 'kjhky', 'uhguyu', '0443-05-06', NULL, 0, 0, 'khug', 'uyhuh', 'khh', 'jhuh', 'harikrishnan97905@gmail.com', NULL, 'Teacher', NULL),
(12, 'uy6trewaq', 'KRISHNAN', 'P', 'eqee', 'qedqd', 'kjhky', 'uhguyu', '0004-05-08', '', 0, 0, 'tery', 'qdwe', '09790540974', '765432', 'harikrishnan97905@gmail.com', NULL, 'Teacher', NULL),
(13, 'HARI', 'KRISHNAN', 'P', 'iy', 'jh', 'h', 'h', '0065-06-07', 'd', 0, 0, 'g', 'g', '09790540974', 'g', 'harikrishnan97905@gmail.com', NULL, 'Teacher', NULL),
(14, 'abc', 'edf', 'def', 'teacher', 'bsc', 'ssd', '56', '2002-02-11', 'sad', 0, 0, 'male', 'asdf', '04426491113', '07667034570', 'info@pit.ac.in', NULL, 'Teacher', '12345678'),
(15, 'abd', 'edf', 'def', 'teacher', 'bsc', 'ssd', '56', '2002-02-11', 'sad', 0, 0, 'male', 'asdf', '04426491113', '07667034570', 'info@pit.ac.in', NULL, 'Teacher', '123'),
(16, 'abd', 'edf', 'def', 'teacher', 'bsc', 'ssd', '56', '2002-02-11', 'sad', 0, 0, 'male', 'asdf', '04426491113', '07667034570', 'info@pit.ac.in', '', 'Teacher', '123'),
(17, 'abd', 'edf', 'def', 'teacher', 'bsc', 'ssd', '56', '1997-11-19', 'sad', 0, 0, 'male', 'asdf', '04426491113', '07667034570', 'info@pit.ac.in', 'profileDP/Screenshot 2024-03-19 190221.png', 'Teacher', '123'),
(18, 'abc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 'NIL', 'abcd@gmail.com', 'uploads/DP/66bf6c727596b.png', 'teacher', '123'),
(19, 'abc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 'NIL', 'abcd@gmail.com', 'uploads/DP/66bf6cd9467a2.png', 'teacher', '1234'),
(25, 'KARTHICK KUMAR SM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 'NIL', 'kaththikarthi75@gmail.com', 'uploads/DP/66bf799043d3c.png', 'teacher', '12'),
(27, 'Karthick', 'KUMAR', 'SM', '', 'bsc', 'social', '4', '2024-08-24', 'Tamil,English,Hindi', 0, 0, 'male', 'uploads/idcard/66c967cd9b25c_AlgAI logo.png', '915053509', '', 'karthick@gmail.com', 'uploads/DP/66c96da1b071f_icon4 (1).png', 'teacher', '123');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL DEFAULT '1970-01-01',
  `institution` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `profile` varchar(20) NOT NULL,
  `profilepic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `gender`, `dob`, `institution`, `city`, `district`, `state`, `profile`, `profilepic`) VALUES
(1, 'Jebin Daniel R', 'harikrishnan97905@gmail.com', '$2y$10$nYQUl74Ljz3owxzTu0gST.mRuPJ8VblDgSpkh5QvnrvAFvgIlCuX.', '', '1970-01-01', '', '', '', '', 'teacher', NULL),
(2, 'Jebin Daniel R', 'harikrishnan97905@gmail.com', '$2y$10$L/KEmlxtIdDqe5gbdxXaw.1ppzqIaaTTVrtXPcm.F7SjDha1Kalb6', '', '1970-01-01', '', '', '', '', 'student', NULL),
(3, 'Jebin', 'jebinderil@gmail.com', 'qwerty', '', '1970-01-01', '', '', '', '', 'student', NULL),
(4, 'ijk', 'jebinderil@gmail.com', '1234', '', '1970-01-01', '', '', '', '', 'student', NULL),
(5, 'Jebin Daniel R', 'blessygrace001@gmail.com', 'rewq', '', '1970-01-01', '', '', '', '', 'teacher', NULL),
(6, 'gersson', 'abc@gmail.com', 'azsxdc', '', '1970-01-01', '', '', '', '', 'teacher', NULL),
(10, 'Karthick Kumar SM', 'kk@gmail.com', '123', 'male', '2024-08-21', 'PIT', 'Poonamallee', 'Thiruvallur', 'TamilNadu', 'student', 'uploads/DP/66c4e9ca55433.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courseman`
--
ALTER TABLE `courseman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_info`
--
ALTER TABLE `personal_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher2`
--
ALTER TABLE `teacher2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `courseman`
--
ALTER TABLE `courseman`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_info`
--
ALTER TABLE `personal_info`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `teacher2`
--
ALTER TABLE `teacher2`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
