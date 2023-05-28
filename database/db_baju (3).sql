-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2023 at 08:12 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_baju`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_category`, `name`) VALUES
(1, 'Pakaian Bayi'),
(2, 'Pakaian Anak-Anak'),
(3, 'Pakaian Remaja'),
(4, 'Pakaian Dewasa'),
(5, 'Pakaian Pria'),
(6, 'Pakaian Wanita');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `Image` text NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `status` enum('available','restock','not_available') NOT NULL DEFAULT 'available',
  `id_category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `name`, `Image`, `price`, `status`, `id_category`) VALUES
(1, 'Baju Polo', 'https://storage.googleapis.com/kagglesdsdata/datasets/139630/329006/fashion-dataset/images/10028.jpg?X-Goog-Algorithm=GOOG4-RSA-SHA256&X-Goog-Credential=databundle-worker-v2%40kaggle-161607.iam.gserviceaccount.com%2F20230525%2Fauto%2Fstorage%2Fgoog4_request&X-Goog-Date=20230525T175332Z&X-Goog-Expires=345600&X-Goog-SignedHeaders=host&X-Goog-Signature=26e287ee3d58909e0edbbb6221b50c4c5173c4e161882400a11348e3a106ab9dba82064b06dfb71b85a42c7dd990b56eeb32a447cfdd3889f2fbd8679841cf7542d573d32262f3811140e441e485fe17ce29df309e287c62ce0c00f5e73ecf518a3b742806ddaed33f94789555c2b82405ff8fa3bad426b0e8af207e3096c7bf4e04b9906f395370ef4b6514b137e60a7026e6f0c6eebf51ed6cee4a781570af71c97f65d87cec4078b28a38c4f9e78ad72dccb1acf2ff5e6a762806deb03638ec94d44aab9be7e8398faff45cb71890169c8109bedbe282c6fce52c81f2522a3e351208ddefb2f34df35bd1025ffd1a02040562738ce320872a92ea325042e3', '100.00', 'not_available', 1),
(2, 'Kemeja Putih', 'https://storage.googleapis.com/kagglesdsdata/datasets/139630/329006/fashion-dataset/images/10190.jpg?X-Goog-Algorithm=GOOG4-RSA-SHA256&X-Goog-Credential=databundle-worker-v2%40kaggle-161607.iam.gserviceaccount.com%2F20230526%2Fauto%2Fstorage%2Fgoog4_request&X-Goog-Date=20230526T060156Z&X-Goog-Expires=345600&X-Goog-SignedHeaders=host&X-Goog-Signature=6a5dccdc5c28ed33b67701556bcb87f6088642a00ae1479b626a8a7f607c232e9b88d7acd12d7cb8dc9f5a42f6114ce271b06f7257830f873874fe7a2939676d56e54ff12b9d399e0a9e773eef8ef5a79dfbcde819d0cc9c155b0b4db0c0e2c1a9d40b8530fc6d9a5d2ca2cc7dcd1c9fbacdae29e660650bd2380596c150704e960a939975c221d050a44b0caf5c97b67de7305bcef4663030281a45b02c6c354373a6a913f7a81d363b65f4994ea2a565e4d7c591ed39aabef0951402b7e03c01784b53a0cb77cbf5a5e9086769803f96a76f746f0a31406d0166c76b19cdfde8c98cf1d92a8d69bf402259fd7f3dfa00138019cff42c5b7d64acbb2f403bb5', '80.00', 'available', 1),
(3, 'Celana Jeans', 'https://storage.googleapis.com/kagglesdsdata/datasets/139630/329006/fashion-dataset/images/10438.jpg?X-Goog-Algorithm=GOOG4-RSA-SHA256&X-Goog-Credential=databundle-worker-v2%40kaggle-161607.iam.gserviceaccount.com%2F20230526%2Fauto%2Fstorage%2Fgoog4_request&X-Goog-Date=20230526T072811Z&X-Goog-Expires=345600&X-Goog-SignedHeaders=host&X-Goog-Signature=435e3e5963d6b001cd2297d16b8803be29a43f57fa47fa54b8a7ef871db6553e88c9c64599e1412df66af854309e3b5ac98e6eae418f5b326f92acff19170762cdfdcb809adcc27dd0b3aabaa5eee1a56390e0fcc7f60bd3aaefd3bcc8c3af5d835db5064410d39ccca42bae787982ab5af7f6e9cacef174de889a79b57db13d46696b2f849b8f0465910a9720640d87927f1bb044a10bd5687c4467e8ea27517431614d8c20b2fdfb35aa509ddb738085e0cc3d8fff49cc517b093f8f11918dc36cb51c6013fe8f20519c3e1ccc9ee938cd50ad2df51ad98de2f620e06b249cc6ba21a6600626211e3ae38cab72a7517019bc8f482724e113189ee889b88b1a', '120.00', 'available', 2),
(4, 'Baju Kaos', 'https://storage.googleapis.com/kagglesdsdata/datasets/139630/329006/fashion-dataset/images/10411.jpg?X-Goog-Algorithm=GOOG4-RSA-SHA256&X-Goog-Credential=databundle-worker-v2%40kaggle-161607.iam.gserviceaccount.com%2F20230526%2Fauto%2Fstorage%2Fgoog4_request&X-Goog-Date=20230526T072806Z&X-Goog-Expires=345600&X-Goog-SignedHeaders=host&X-Goog-Signature=7ed554d631af806c53920133397235dcdc0548496a79dfa4e6fb785aba89b9b105d99df3fedd8a516953e4c3976246b70a6b0e8d7fdb68bc74280f3030eea026a356b298668450b73de5da5b0a009d4bede9cb10e30ced0a04e83731074d8a55def8896585ec46e41e6379d8c6a26ab55f16699ffa1eb24444507ecfb61b0b016b8787214566b58a70deb1f452a6af2cc6b05053fd1e723d3d699823da76bb674a94a99e73bfa0a552d2fd59232a2f5b6bda5c250a07020cea350c302e02bdf67fb7358000689d5ae7702e8dd66c14a820470abca408ba1967e2beaeb68d846105412c498cf8bc93ba28614cd304783b333ec7be8fe37dee2c558a63aaa38449', '60.00', 'available', 1),
(5, 'Jaket Kulit', 'https://storage.googleapis.com/kagglesdsdata/datasets/139630/329006/fashion-dataset/images/11116.jpg?X-Goog-Algorithm=GOOG4-RSA-SHA256&X-Goog-Credential=databundle-worker-v2%40kaggle-161607.iam.gserviceaccount.com%2F20230526%2Fauto%2Fstorage%2Fgoog4_request&X-Goog-Date=20230526T073213Z&X-Goog-Expires=345600&X-Goog-SignedHeaders=host&X-Goog-Signature=29a9a8cb420f65a79ee3ad2d82676721cf5fa5825e6c4441674e88cf6d848e8cabf3f3dcc821bdc4196fad1bc6ca6bbf5dc4ae2d2101dca57344b83a136f40979cdc8d9499a61cb8b6e485f843b7de391ddd6cfe705d02400c2f6713a68c80d84e49897f48d051309106c0f7e7f7b9da96e93e7eed754b9f246bf67f445343dae36e5e46de66f024fde119bf000edbeb8aa1bfc8e066064d4e9043d647a7cf3c2511face93dd6fa2362a97a30c9402d5aad798ae4d52fe124b0cba7cc0ae417868c680ff9019ec92edcbc6de27e4bb734b560c8678104c99196a232100246e18252162ae95ed22437ac7b7bea1271c27b571f1b408bbb1ce8127503db3680b6f', '250.00', 'available', 1),
(6, 'Short Dress Red', 'https://storage.googleapis.com/kagglesdsdata/datasets/139630/329006/fashion-dataset/images/11369.jpg?X-Goog-Algorithm=GOOG4-RSA-SHA256&X-Goog-Credential=databundle-worker-v2%40kaggle-161607.iam.gserviceaccount.com%2F20230526%2Fauto%2Fstorage%2Fgoog4_request&X-Goog-Date=20230526T073345Z&X-Goog-Expires=345600&X-Goog-SignedHeaders=host&X-Goog-Signature=a9db853678eba55833b1ea78eb25fd30f7d235e6925974e17ac8ad4f852142d95e875ae3ea5db6c8537513e98d544cfba368dc7b2fe9669ecc34f85e16ac122fac510330865ac146ff6bded5f207a17114f758a9a83f105150ee516ea7370ec99e9bb3f1c2b86182284f733d3073de4e05a896e829f45ec793dfb6c95e7450591bf3048bd208a788d83a692b76ab18e04eeefc3d5b33672a312cf821403f5c830f4db51b258e2335578b881b9173508be0eb4f8548e829f499624f8a10985492f34d138029793607a5342d684724cddad473c2861656ea84dd3a12a9618ba9c5c3344e7f1cd1acfa64b0c8a12fcda502b300348b75ddad49724faf6f2a529687', '150.00', 'available', 2),
(7, 'Kaos Polos', 'https://storage.googleapis.com/kagglesdsdata/datasets/139630/329006/fashion-dataset/images/11359.jpg?X-Goog-Algorithm=GOOG4-RSA-SHA256&X-Goog-Credential=databundle-worker-v2%40kaggle-161607.iam.gserviceaccount.com%2F20230526%2Fauto%2Fstorage%2Fgoog4_request&X-Goog-Date=20230526T073345Z&X-Goog-Expires=345600&X-Goog-SignedHeaders=host&X-Goog-Signature=4624a6c600aa0b28b20f02c75041956f9c3f83ade6cdd1a27eb8542080e8379e95337f7bec285f428e78ed7e5d2641c55703971b85f28e11a744f06a30cd2ff6749af72b29cda16d9cdcabb32d04a0d0686266fa6d3df825920c1922206d6535f30a12d1eb0fcd769ba3638184aa228d53645d225c12abd3488f951094275fd6d734e5a4d11b9d35a5c4da247beb5772124b26aa07cc0090eb07a16f0b3c55de7f7b4b6aab2261c37f91a646d768d794ed4ac313137fc9ed80fe2a2f0f4ddca21caf51366ef07024532cb4ea2d7dbfe377142edb737244a5b1076a2301f3459da4859bb0270120f357bc8265463c3bf333ed407e01bfa7564a778d0ee940df2b', '40.00', 'available', 1),
(8, 'Jaket Olahraga', 'https://storage.googleapis.com/kagglesdsdata/datasets/139630/329006/fashion-dataset/images/10777.jpg?X-Goog-Algorithm=GOOG4-RSA-SHA256&X-Goog-Credential=databundle-worker-v2%40kaggle-161607.iam.gserviceaccount.com%2F20230526%2Fauto%2Fstorage%2Fgoog4_request&X-Goog-Date=20230526T073055Z&X-Goog-Expires=345600&X-Goog-SignedHeaders=host&X-Goog-Signature=4bd4d4d29029cf45431d93160f63f2726b18ba7aae46ccb28e9222dda047687f0c0d689f332bb9dd136e0321700b2ec8116b39b466abef02094ab648a75b2679fc8c7264496ada48f225d16a8248463047f853d69ff5ff6d6f8839cb8b2475a2a0da3d6eeeeb67001ac26a15e5f86fb7023287830dbffbdd17d0342b7dd18994599339de20f5a19067349091973f26316462d8650f172ea106387a41d85d421de6120bc6ebbd7b49444191c19d7924bad31d58ee19ec7ec92e522eff9f9c07483530d1d53a76cf0f6b317a246a2e64c4092009f32be501eb0fd167786764ea6d00885a2460129a13315a70d860ddd2353404d3ffda6c35e39b2a91bed9bb9cf6', '90.00', 'restock', 3),
(9, 'Rok Pendek Hijau', 'https://storage.googleapis.com/kagglesdsdata/datasets/139630/329006/fashion-dataset/images/11260.jpg?X-Goog-Algorithm=GOOG4-RSA-SHA256&X-Goog-Credential=databundle-worker-v2%40kaggle-161607.iam.gserviceaccount.com%2F20230526%2Fauto%2Fstorage%2Fgoog4_request&X-Goog-Date=20230526T073316Z&X-Goog-Expires=345600&X-Goog-SignedHeaders=host&X-Goog-Signature=2d40fda6df9da757de836f0d18d1496145bfef51789fb0706abafc10e4712f6b5a388b346eb5330162f666792bb7aa0c1cb9a96316aabd5d7e727291bacb1dc4f3f22afa44878301df5a49b7f689d92a7bdefe277ce1a66cc61f5173eca5836ec2d6befe9cf2f7fd35a275da86e4fad90b34a3640c099b1828ae77a8f95dfe9876033ffa2f59d43c5bec39d9c17f2ab917d87526668643a4681903a02c2cb9ecbc4cfe43c1e47f90e1b0dfacd14804c86778ed6a39e7e120122390956edab5720ccae5eb84d3b45e0f633fe691cbf611e36573dcd830c5399b2b5a4f9a552d7322210ea67d6806510eeda569665897c3b8e85a7ca5f64350b74ac1d60eff3de4', '80.00', 'available', 1),
(10, 'Syall Biru', 'https://storage.googleapis.com/kagglesdsdata/datasets/139630/329006/fashion-dataset/images/11142.jpg?X-Goog-Algorithm=GOOG4-RSA-SHA256&X-Goog-Credential=databundle-worker-v2%40kaggle-161607.iam.gserviceaccount.com%2F20230526%2Fauto%2Fstorage%2Fgoog4_request&X-Goog-Date=20230526T073248Z&X-Goog-Expires=345600&X-Goog-SignedHeaders=host&X-Goog-Signature=21f0e2e296240a6d7f0a8fd89a3c0b05f0409cc7079a9840ad1054c25bd806f52676fe46fea3a417f1c1d6b5221161d0865e7cc671b38d7b51d2a2a37bf0ea08c2f048103ec16acc433b573196c45427cd7d8e258e70ecde55b02086e6484fe9db88bf0a382de50c1490bdd00b623440b97fe67dfa9a8c859ea5f89fa465f85ef5532d67d2528b298c4231300089ca705ddcb7500e25ec58b7efcb726109344f69b8d9b9b850ec1bf15d36dd8dd6eecd205c8a64d3283b3239e1bf8cc940fc70e4350c695e6e60a6b6811ee28b112940bf1755c820f3e80dc43bc8653ef59c4e36785a085a4973ff34774ee53b13ead277d93c93c1da1181cb735e551cb7891e', '70.00', 'available', 1),
(11, 'Syall putih', 'https://storage.googleapis.com/kagglesdsdata/datasets/139630/329006/fashion-dataset/images/11140.jpg?X-Goog-Algorithm=GOOG4-RSA-SHA256&X-Goog-Credential=databundle-worker-v2%40kaggle-161607.iam.gserviceaccount.com%2F20230526%2Fauto%2Fstorage%2Fgoog4_request&X-Goog-Date=20230526T073248Z&X-Goog-Expires=345600&X-Goog-SignedHeaders=host&X-Goog-Signature=08fd48d87ac979145f065a14f779fd8d022849f901d0a1bab00a9021560dd1907416a508facf1e91b63cad3d5267f4a57917dd213bcd9fd9c1090b7eab214a4590e08dbeea735e1763a1cc1520716c5506bfdd9817ab79e5c715a58a97d3eec9ea6d5f13b62fa19b676d13235fa331bd74fb44c1a834268a385da36918501c105e69eb10f7b4ab2c14c161e77e9d6909875df89fa6e6622ea5f6ee9db8ac7850a016d5fc89e1366d8e92150cdbea2a90e24e78d48693caac9964a4f9b49383cead24697c24f5f89d9e1c34b0bb1bd7fe65791665c8004345660ccf1913e4336463892d3dfc3eb023f0a1e0b8df0619456b08f7bd30ef2f852ab4fe04d32875c7', '200.00', 'available', 2),
(12, 'Dasi motif Biru', 'https://storage.googleapis.com/kagglesdsdata/datasets/139630/329006/fashion-dataset/images/11159.jpg?X-Goog-Algorithm=GOOG4-RSA-SHA256&X-Goog-Credential=databundle-worker-v2%40kaggle-161607.iam.gserviceaccount.com%2F20230526%2Fauto%2Fstorage%2Fgoog4_request&X-Goog-Date=20230526T073248Z&X-Goog-Expires=345600&X-Goog-SignedHeaders=host&X-Goog-Signature=9ab78034b9a9ca84f310894b38a898b5cdd5a49020f0164047c349cc7f9ddb7d349757218de93dd6ab95dfa0f9edb1a8f7d7aeb3939a898288fbd59bfc3febfc65ffeb723da9c51fe212d9370cea559ba8a667390a1ccead6ad9fe45f8505d2d2a46d7604ad04424e2bd7f18950faa90930d75f245a42babae2ee82cb8dac0526cb06702b6240d8ac0386ca7d3e9451641386657a6ace3b13f90e0b941740ac4212087e6077bf16905620410bbb6f4ad68cde3b7ac7c044d8e43926a9926e5d603103a0432ff0c14c3d41ee8436c304d4b50ef4725a64e510d95d3a07e2d7604e5bc5801640f45a38c5c54ff1c44f97c2b07055355109489010bf7910be65f99', '50.00', 'available', 1),
(13, 'Kemeja Merah', 'https://storage.googleapis.com/kagglesdsdata/datasets/139630/329006/fashion-dataset/images/11167.jpg?X-Goog-Algorithm=GOOG4-RSA-SHA256&X-Goog-Credential=databundle-worker-v2%40kaggle-161607.iam.gserviceaccount.com%2F20230526%2Fauto%2Fstorage%2Fgoog4_request&X-Goog-Date=20230526T073248Z&X-Goog-Expires=345600&X-Goog-SignedHeaders=host&X-Goog-Signature=1497d3d009201d37bee1c9277208e149b0390b6e86d55621aa826c94d681914967714f80254523a6c63a2a87b9d354d093ccec38018e53efc92b4f7521fb7c369a6dba1f27a963f23ee8f7d0c81ab3c2976024c3ef48b6cc2e62755a5731478643dc945fdcf9d3a1bbd4dff1326424f3c6164857cb81f0e9c84e1e17e419821487a994997ddb7ba22b1d15eace7e700a801b4a0648f5e80b86f3d67536a0cd4c3249f31e2f21e341fb2f8c8efe7cfd6b3587a952717b0d6ac2dcee5d31194d1787bc06b37e86291ff3dcf987e61fb7e6a4c864786f8b3a80255065271943dadd2bf8a24b18ea110264ae15b6d0af9d9a2e65d9190199649a95efebd5b4828e31', '75.00', 'available', 2),
(14, 'Kemeja Denim', 'https://storage.googleapis.com/kagglesdsdata/datasets/139630/329006/fashion-dataset/images/11162.jpg?X-Goog-Algorithm=GOOG4-RSA-SHA256&X-Goog-Credential=databundle-worker-v2%40kaggle-161607.iam.gserviceaccount.com%2F20230526%2Fauto%2Fstorage%2Fgoog4_request&X-Goog-Date=20230526T073248Z&X-Goog-Expires=345600&X-Goog-SignedHeaders=host&X-Goog-Signature=47e5b7fc0d5d33792c7b732ee18f240cf024c902868f7cc7c21beb22bed1c92dff58b1291ee9e3fbc4d2ef53e291d0c073c827f19e57537aeaaf42c9f0c1d5df7d2595c58fbb2188648a622b4b564c1c8948c95d755507327e61473fc37da4f25dbcce32167e2e13fb8e063053f8fd8dd906b861e0b4a67b8f58dc77e58e27f51867837e6d1506b8b6040e9f39a24996854eb4b38c4bbb3b4b0bbc568fd0213d2f0f2c2b70700e7f07225b146b473c263a9ce23f9a579ce71af6af594e56a1466b3b192b55fd485d10af05ee4edf3b5c1fbd521ef8ca28e943fafe0f1bdff2fa50dc32fa90f8a4c9aa9eb13eab2b407c26732bb872db4d07d73e51d7eaf9cb0d', '95.00', 'available', 1),
(15, 'Legging Biru', 'https://storage.googleapis.com/kagglesdsdata/datasets/139630/329006/fashion-dataset/images/11126.jpg?X-Goog-Algorithm=GOOG4-RSA-SHA256&X-Goog-Credential=databundle-worker-v2%40kaggle-161607.iam.gserviceaccount.com%2F20230526%2Fauto%2Fstorage%2Fgoog4_request&X-Goog-Date=20230526T073213Z&X-Goog-Expires=345600&X-Goog-SignedHeaders=host&X-Goog-Signature=9fa72d4c00d953038a6e8397c7e00f51a32fe3e3d05faf9963e226e721c0ab1072ff43c29a67db998dc9f2f1e106cc2f68ca22497499845a111dbe0f2474360b7259f0789ea4d8ac7ed0c0d15944879e80b837a8dccfd1d5dd36c86d66e433d8125f882b6add550c6001f063138659baac8fe6dfd8e6c379cdccb684eb3e43043ebebf96017bda19d7397d33c2f4feeb072a9967217c6ee407e4d02ecc8184c95a1e4b18087bd445b3903b7e87e95fd6c9c69cf773cd0d4b16a787246cd73d4434b182c03d489f79625616dce7bb35458356be7d9747b653baff11c4351480de01777ed5b7e5c6f2d2f3bcfeb33b1801ee87dbfdfe347563bdbf0a38449db6dd', '45.00', 'available', 2),
(16, 'Sweater Biru', 'https://storage.googleapis.com/kagglesdsdata/datasets/139630/329006/fashion-dataset/images/11171.jpg?X-Goog-Algorithm=GOOG4-RSA-SHA256&X-Goog-Credential=databundle-worker-v2%40kaggle-161607.iam.gserviceaccount.com%2F20230526%2Fauto%2Fstorage%2Fgoog4_request&X-Goog-Date=20230526T073258Z&X-Goog-Expires=345600&X-Goog-SignedHeaders=host&X-Goog-Signature=4fac5036e9ac126dbe4ccc867c1439d7aff6fcb5ae54ea661826f1e6b0164f58603b9f6a1d0618e5050e1abb257dd88f23b50632a9cb9176c9ff5746f24b5f0bd0df85b84e10a0f4492299cfcf118fd772df992354706b0ea9faa7af67c09b99b81febb6f86f82aa696d7c459ad84468130e68b9ff9d8295de9ca73eac3ecce81de950e1f5f56dbbb469369647c1e711354cae49c9242998a6d70a8a4cda59c2eb8bbf104dff6b9189996e45fd94baa621cee7a3ff4dc6363c22eae21a8b98c7bb80caf86755db1f4e0e8ced0b264dae6a374d6e9bb3b710362597d751a0806ba928c609329f2cdf206923c487a41d5d354f5dabc4c07b2424643854f10a2c44', '85.00', 'available', 1),
(17, 'Celana Jeans Maxi', 'https://storage.googleapis.com/kagglesdsdata/datasets/139630/329006/fashion-dataset/images/11237.jpg?X-Goog-Algorithm=GOOG4-RSA-SHA256&X-Goog-Credential=databundle-worker-v2%40kaggle-161607.iam.gserviceaccount.com%2F20230526%2Fauto%2Fstorage%2Fgoog4_request&X-Goog-Date=20230526T073308Z&X-Goog-Expires=345600&X-Goog-SignedHeaders=host&X-Goog-Signature=10c0cb8dedcd67f724a7dbce90fa76c245d1fc000c04166f4a3cd2085e7b95477849b6bdd7e47a1ad8ec49dda42f69ecf353a0922870a31c70cbef9709546b9cf096b325c99182ffdbd2bba24b086cfc78a7cbe9c860cee4bfb57d28c49912a52f03c89129c396caab843717283f2770e6c30b07880c5faf43c313d3ecb9913ee53539ea87482c9d5ff176959b7b9d6d1aae485109c756e764292f51758c16900558e5656d8abe743291bed3a84cd72e90d6df50cd1eeb89314fb5ca8d409f74c36978a4005aadddb18afcb45062903f5a046c1e62c443d713a1467f12dbfd054637edc012d109ace733a70f9472817a9e458489b873cfffab56cceb84ae23d3', '110.00', 'available', 2),
(19, 'Sweater hitam merah', 'https://storage.googleapis.com/kagglesdsdata/datasets/139630/329006/fashion-dataset/images/11173.jpg?X-Goog-Algorithm=GOOG4-RSA-SHA256&X-Goog-Credential=databundle-worker-v2%40kaggle-161607.iam.gserviceaccount.com%2F20230526%2Fauto%2Fstorage%2Fgoog4_request&X-Goog-Date=20230526T073258Z&X-Goog-Expires=345600&X-Goog-SignedHeaders=host&X-Goog-Signature=709c50ef7a5fe14e5b0cfc16ca887ee6d7d2b51cf88f2691996a94924072a654f14d2618e71c164378bc624c4e0cde599f7b319934b5c0f1b8fa4c2fdc1b8c1bacadf936a8316bf5b2025998cc44ce01800ba89138e28b793e3ed00176ffc933b847b1e01c99a8f95b5043815766e79f76f38e6952ced2d229a74a4c5f196824e2307aad9c056a2e9e356fee1b15450e3bb5b85e1244d6005d380118d1acedd656d80cc15a3b01841b003c058e1be5fadd8ff8c5ee17353b8fe12e82ae9b74fb2dfda63af135f17603deaae7928f107f503fba8127903d8689b93529fa5a21d0c56a9c0678faa4b2ed84208a956c248bb6383832ae382327558e5ece207812e0', '120.00', 'available', 1),
(20, 'Cardigan Panjang', 'https://storage.googleapis.com/kagglesdsdata/datasets/139630/329006/fashion-dataset/images/11368.jpg?X-Goog-Algorithm=GOOG4-RSA-SHA256&X-Goog-Credential=databundle-worker-v2%40kaggle-161607.iam.gserviceaccount.com%2F20230526%2Fauto%2Fstorage%2Fgoog4_request&X-Goog-Date=20230526T073345Z&X-Goog-Expires=345600&X-Goog-SignedHeaders=host&X-Goog-Signature=2be2a5b03eb26da41b78a07f09b1cf4a6d6faf9ffedbb5a167b9112ca5221e1db761a121924111fac51a607f84d30f60d3ad5d3c7a1e2e89af8499a1ebf1575d7cf13c1ae78e8192c4289a6e91c94feebfc1f39c1d7d56c2f52e77fa30e0c3a7f536ee1ab29239a27a6ac610d5cb65d8efc73e03c06a73523a2b839ed51d40198e127bccb3e1c14ea2dbdef70ca44d55856146380ad2ba79a64d3d4067f1536b242d71ac3c2abd0c0174c7c35ce0b5aee62c19314cb5dc5e83f502f5c697970ff0d808ac8f9056f1585ce74bc72447bbb19713e12cddb3c3230a2d053ed0bba647bad01f3e5ba3771f68f7eea3e3682694bac6e1f8ebb8a503d6f2e52dff73a5', '95.00', 'available', 2),
(31, 'White Skirt', 'https://storage.googleapis.com/kagglesdsdata/datasets/139630/329006/fashion-dataset/images/10000.jpg?X-Goog-Algorithm=GOOG4-RSA-SHA256&X-Goog-Credential=databundle-worker-v2%40kaggle-161607.iam.gserviceaccount.com%2F20230524%2Fauto%2Fstorage%2Fgoog4_request&X-Goog-Date=20230524T084832Z&X-Goog-Expires=345600&X-Goog-SignedHeaders=host&X-Goog-Signature=1cde7993e3ab849443b6db7cc4d5a3349ef003f33e0aab996dde9a9895a3bb2c73f9c4bcd5ec1e48c7d161eba2f34c7f162bafe49953b55777a58a836556a10907a77c5ae23beccdce6566433be86859ac830cd425da855dfddd1872ee56f1399213d91928ebc3ae05c5191bbe124e9ce0e08b0bb6205c6f97ff50e63d297fd8dfa960d5ab07e0a607941766d5b1ed990e5f2c4dfcb86c4ee765fff6de83dcdfdfc7096110b353cea3adfdcceac523234af8f7f4e8ede63ef8b62ede77880d9d33e2e183d09fb951b4691c2514200fd15757aefd80e72c5b14e43e5a1a57645e5ad6d0edcd11761009de4adae6a9af996ce77e44b95ded8fdfb0dec25267a8f3', '80.00', 'available', 3),
(34, 'Baju Vestia Zeta ver 3', 'https://cdn.kingteeshops.com/image/2022/05/14/vestia-zeta-holoid-classic-t-shirt-unisex-hoodie.jpg', '80.00', 'available', 1),
(36, 'baju puspita', 'https://cf.shopee.co.id/file/5f64ac2033d28c0e7d0a77fcf4203f8b', '12.00', 'restock', 3),
(38, 'baju mona hoshinova1', 'https://cf.shopee.co.id/file/8b81de9964f9bdcff1920f1d66be8d8c_tn', '10.00', 'available', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `id` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`id`, `id_product`, `size_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 3),
(5, 3, 1),
(6, 3, 2),
(9, 5, 1),
(10, 5, 2),
(11, 6, 2),
(12, 6, 3),
(13, 7, 1),
(14, 7, 3),
(15, 8, 1),
(16, 8, 2),
(17, 9, 2),
(18, 9, 3),
(19, 10, 1),
(20, 10, 2),
(28, 34, 1),
(29, 34, 2),
(30, 34, 3),
(31, 34, 4),
(32, 34, 5),
(35, 38, 1),
(42, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `size_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`size_id`, `name`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL'),
(5, 'XXL');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `size_id` (`size_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`);

--
-- Constraints for table `product_size`
--
ALTER TABLE `product_size`
  ADD CONSTRAINT `product_size_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`),
  ADD CONSTRAINT `product_size_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `size` (`size_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
